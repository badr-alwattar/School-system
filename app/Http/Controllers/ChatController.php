<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    
    public function __constructor() {

        $this->middlware('auth');
    }

    public function chat() {
        
        return view('chat');
    }


    public function send(Request $request) {
        // return $request->all();
        $user = User::find(Auth::id());
        // $message = new Message();
        // $message->sender = $request->input('sender');
        // $message->receiver = $request->input('receiver');
        // $message->body = $request->input('message');
        $message = Message::create([
            'sender' => $request->input('sender'),
            'receiver' => $request->input('receiver'),
            'body' => $request->input('body')
        ]);
        event(new ChatEvent($request->input('body'),$user));
        
    }



    // public function send() {
        
    //     $message = "hello";
    //     $user = User::find(Auth::id());
    //     $event = event(new ChatEvent($message, $user));
        
    // }


    
}


