<?php

namespace App\Http\Controllers\API;

use App\Message;
use App\Talk;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TalkController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){


        $this->validate(request(), [

            'name' => 'required|unique:talks',
            'description' => 'required',
        ]);

        $user = auth()->user();

        $talk = $user->talkings()->create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,

        ]);

        $talk->users()->sync($request->users_arr);

        http_response_code(201);
        return $talk->fresh();

    }

    public function all(){

        $talks = Talk::latest()->get();

        return view('all_talk', compact('talks'));

    }

    public function chat($slug){

        $user_id = auth()->id();

        $talk = Talk::where('slug', $slug)->first();


         $talkUsers = $talk->users;

         $json = json_decode($talkUsers);

         $status = false;

        foreach($json as $obj){

            if ($obj->id === $user_id){

                $status = true;


            }

        }
        if (!$status){

            abort(404);
        }

        return view('chat', compact('talk'));

    }

}
