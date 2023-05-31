<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Figure;

class CartController extends Controller
{
    // Xem giỏ hàng
    public function show($cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $cartItems = CartItem::where('cart_id', $cart_id)->with('figure')->get();
        
        return view('cart.show', compact('cart', 'cartItems'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $figureId = $request->input('figure_id');
        $quantity = $request->input('quantity');

        $cart = Cart::findOrFail($cart_id);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cartItem = CartItem::where('cart_id', $cart_id)->where('figure_id', $figureId)->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại, chỉ cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa tồn tại, tạo mới
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart_id;
            $cartItem->figure_id = $figureId;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.show', ['cart_id' => $cart_id])->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công.');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateQuantity(Request $request)
    {
        $cartItemId = $request->input('cart_item_id');
        $quantity = $request->input('quantity');

        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->route('cart.show', ['cart_id' => $cartItem->cart_id])->with('success', 'Số lượng sản phẩm đã được cập nhật thành công.');
    }

    // Xoá sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request)
    {
        $cartItemId = $request->input('cart_item_id');

        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('cart.show', ['cart_id' => $cartItem->cart_id])->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng thành công.');
    }
}
