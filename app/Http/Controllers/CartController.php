<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Figure;

class CartController extends Controller
{
 
    public function cart()
    {
        return view('customer.page.cart');
    }
    public function addToCart($figure_id)
    {
        $figure = Figure::findOrFail($figure_id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$figure_id])) {
            $cart[$figure_id]['quantity']++;
        }  else {
            $cart[$figure_id] = [
                "name" => $figure->name,
                "image" => $figure->image,
                "price" => $figure->price,
                "quantity" => $figure->quantity
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Figure add to cart successfully!');
    }
 
    public function update(Request $request)
    {
        if($request->cart_id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->cart_id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->cart_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->cart_id])) {
                unset($cart[$request->cart_id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
