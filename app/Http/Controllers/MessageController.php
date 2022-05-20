<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store (Request $request){
        $request->validate([
    'name' => 'required|min:3|max:255|string',
    'email' => 'required|email',
    'phone' => 'required|starts_with:9639|digits_between:12,12',
    'content' => 'required|string|min:5'
    ]);

    $message= new Message();
    $message->name = $request->name;
    $message->email = $request->email;
    $message->content = $request->content;
    $message->phone = $request->phone;
    $message->save();
    return redirect("/#contact");
}

 public function index () {
    $messages = Message::all();

    return view('messages.index', compact('messages'));
}

public function show(Message $message) {
    //لما حطيت نوعها مسج صار فيني استغني عن findOrFail ^
    //هاد الشي اسمو implicit Binding
    // $message = Message::find($id);
    // $message = Message::findOrFail($id);

    return view('messages.show', compact('message'));
}
}
