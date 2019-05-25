<?php

namespace App\Http\Controllers\API;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //

    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        $user = auth()->user();

        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();


//        return $request->message;
        $message = new Message();



        $message->message = $request->message;
        $message->user_id = $user->id;
        $message->talk_id = $request->talk_id;

        $message->save();

//        $message = $user->messages()->create([
//            'message' => $request->input('message')
////            'talk_id' => $request->input('talk_id')
//        ]);
//
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
