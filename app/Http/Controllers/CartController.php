<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Tampilkan halaman cart
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Tambah produk ke cart
     */
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            $cart[$product->id]['qty']++;

        } else {

            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'size' => $product->size,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with('success', 'Product added to cart.');
    }

    /**
     * Buy Now
     */
    public function buyNow(Product $product)
    {
        $cart = [];

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'size' => $product->size,
            'qty' => 1
        ];

        session()->put('cart', $cart);

        return redirect()->route('checkout');
    }

    /**
     * Tambah quantity
     */
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['qty']++;
        }

        session()->put('cart', $cart);

        return back();
    }

    /**
     * Kurangi quantity
     */
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['qty'] > 1) {

                $cart[$id]['qty']--;

            } else {

                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return back();
    }

    /**
     * Hapus item cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()
            ->with('success', 'Product removed.');
    }

    /**
     * Kosongkan cart
     */
    public function clear()
    {
        session()->forget('cart');

        return back()
            ->with('success', 'Cart cleared.');
    }

    /**
     * Halaman checkout
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });

        $shipping = count($cart) > 0 ? 15000 : 0;

        $total = $subtotal + $shipping;

        return view('checkout', compact(
            'cart',
            'subtotal',
            'shipping',
            'total'
        ));
    }

    public function payment(Request $request)
    {
        $cart = session('cart', []);
    
        if (empty($cart)) {
            return redirect()->route('cart')
                ->with('error', 'Cart is empty');
        }
    
        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });
    
        $shipping = 15000;
    
        $total = $subtotal + $shipping;
    
        DB::beginTransaction();
    
        try {
        
            $status = 'pending';
        
            if ($request->payment_method === 'cod') {
                $status = 'shipped';
            }
        
            $order = Order::create([
            
                'user_id' => Auth::id(),
            
                'order_number' =>
                    'ORD-' . strtoupper(Str::random(8)),
            
                'full_name' => $request->name,
            
                'phone' => $request->phone,
            
                'address' => $request->address,
            
                'city' => $request->city,
            
                'postal_code' => $request->postal_code,
            
                'payment_method' => $request->payment_method,
            
                'subtotal' => $subtotal,
            
                'shipping_fee' => $shipping,
            
                'discount' => 0,
            
                'total' => $total,
            
                'status' => $status,
            ]);
        
            foreach ($cart as $item) {
            
                OrderItem::create([
                
                    'order_id' => $order->id,
                
                    'product_id' => $item['id'],
                
                    'price' => $item['price'],
                
                    'quantity' => $item['qty'],
                ]);
            
                Product::where('id', $item['id'])
                    ->decrement('stock', $item['qty']);
            }
        
            DB::commit();
        
            session()->forget('cart');
        
            return view('payment', [
            
                'order' => $order,
            
                'method' => $request->payment_method,
            
                'total' => $total,
            
            ]);
        
        } catch (\Exception $e) {
        
            DB::rollBack();
        
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}