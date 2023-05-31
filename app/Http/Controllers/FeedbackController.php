<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Xem danh sách phản hồi
    public function index()
    {
        $feedbacks = Feedback::all();
        
        return view('feedback.index', compact('feedbacks'));
    }

    // Xem chi tiết phản hồi
    public function show($feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);
        
        return view('feedback.show', compact('feedback'));
    }

    // Thêm phản hồi
    public function create(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required',
            'figure_id' => 'required',
            'comment' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->customer_id = $data['customer_id'];
        $feedback->figure_id = $data['figure_id'];
        $feedback->comment = $data['comment'];
        $feedback->save();

        return redirect()->route('feedback.index')->with('success', 'Phản hồi đã được thêm thành công.');
    }

    // Chỉnh sửa phản hồi
    public function update(Request $request, $feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);

        $data = $request->validate([
            'comment' => 'required',
        ]);

        $feedback->comment = $data['comment'];
        $feedback->save();

        return redirect()->route('feedback.index')->with('success', 'Phản hồi đã được cập nhật thành công.');
    }

    // Xoá phản hồi
    public function destroy($feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Phản hồi đã được xoá thành công.');
    }
}
