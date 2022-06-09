<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getMessages(Request $request)
    {

        $messages = Message::
            where("receiver_id",$request->id)
            ->get();

        return $messages;
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            "body" => $request->input("body"),
            "receiver_id" => $request->id
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
