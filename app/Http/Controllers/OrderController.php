<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function show($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('order.show', compact('order'));
    }

    public function create()
    {
        // Logic để tạo đơn hàng mới
    }

    public function store(Request $request)
    {
        // Logic để lưu đơn hàng mới vào cơ sở dữ liệu
    }

    public function edit($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
        // Logic để cập nhật thông tin đơn hàng
    }

    public function destroy($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Đơn hàng đã được xoá thành công.');
    }
}
