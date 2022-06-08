<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getMessages(Request $request, $id)
    {
        $user = $request->user()->id;
        $messages = Message::where([['sender_id', '=', $user], ['receiver_id', '=', $id]])
            ->orWhere([['receiver_id', '=', $user], ['sender_id', '=', $id]])
            ->get();

        if (sizeof($messages) > 0) {
            return response()->json($messages, 200);
        } else
            return response()->json([
                []
            ], 200);
    }

    public function sendMessage(Request $request, $id)
    {
        $message = Message::create([
            "body" => $request->input("body"),
            "sender_id" => $request->user()->id,
            "receiver_id" => $id
        ]);

        if ($message) {
            return response()->json([
                "message" => $message
            ], 200);
        } else {
            return response()->json([
                "message" => "Something wrong happend!"
            ], 400);
        }
    }

    
}
