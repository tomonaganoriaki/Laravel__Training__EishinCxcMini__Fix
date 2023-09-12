<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;

class MessageController extends Controller
{

    // public function store(Request $request)
    // {
    //     $message = new Message;
    //     $message->user_id = $request->user()->id;
    //     $message->owner_id = $request->owner_id;
    //     $message->message = $request->message;
    //     $message->save();

    //     event(new MessageSent($message));

    //     return response()->json(['message' => 'Message sent successfully']);
    // }
}
