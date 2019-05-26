<?php

namespace App\Http\Controllers\API;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //

    public function home()
    {

        return view('welcome');

    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        $user = auth()->user();

        return Message::with('user', 'talk')->get();
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


        $message = new Message();

        $message->message = $request->message;
        $message->user_id = $user->id;
        $message->talk_id = $request->talk_id;

        $message->save();
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
