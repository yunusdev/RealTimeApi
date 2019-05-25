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

    public function store(Request $request){

        $user = auth()->user();

        $talk = $user->talks()->create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name')),
            'description' => $request->input('description'),

        ]);

        return $talk->fresh();

    }

    public function view($slug){


        $talk = Talk::where('slug', $slug)->first();

        return view('chat', compact('talk'));

    }

    public function chat($talk){


    }
}
