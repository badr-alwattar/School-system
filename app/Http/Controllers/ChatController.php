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
        $user = User::find(Auth::id());
        $message = Message::create([
            'sender' => $request->input('sender'),
            'receiver' => $request->input('receiver'),
            'body' => $request->input('body')
        ]);
        event(new ChatEvent($request->input('body'),$user,'feefef'));
    }

    public function getMessages() {
        $id = Auth::id();
        $message = Message::where('sender', $id)
        ->orwhere('receiver', $id)
        ->get();
        return response()->json($message);
        // return view('chat');
    }

    // public function send() {
        
    //     $message = "hello";
    //     $user = User::find(Auth::id());
    //     $event = event(new ChatEvent($message, $user));
        
    // }


    
}


