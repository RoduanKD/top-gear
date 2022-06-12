<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\MessageReceived;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->content = $request->content;
        $message->save();

        MessageReceived::dispatch($request->email);

        return [
            'message' => 'Done!',
        ];
    }
}
