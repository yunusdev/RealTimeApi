@extends('layouts.app')

@section('styles')

    {{--<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">--}}

@endsection

@section('content')

        <header data-overlay="8" class="header header-inverse bg-fixed"
                style="background-image: url({{asset('bg-thunder.jpg')}});">
            <div class="container text-center"><div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <h1>Real Time Chat</h1>
                        <p class="fs-18 opacity-70">A mini website for chatting</p>
                    </div>
                </div>
            </div>
        </header>

    <div class="container mt-20 mb-50">
        <header class="section-header">
            <small><strong>Feature</strong></small>
            <h2>How it works!</h2>
            <hr>
        </header>

        <p style="margin-top: -30px">- Create a User</p>
        <p>- User can create a talk or join a talk created by another user provided the creator of the talk added the user to the list of attendees.
            If you try accessing the url of a talk you arent added to you get redirected to a 404</p>
        <p>- User Also have to manually add himself just like he added others if  he wants to take part in the chat.</p>
        <p>- To create a talk click on the modal on the top right named CREATE TALK (after logging in)</p>
        <p>- All the talks can be found <a href="{{route('all_talk')}}">here</a></p>
        <p>- Clicking on a talk will lead the attendees to the chat room</p>

        <h6 class="mb-3">Test User - Login Details</h6>
        <p>Email: <code>ade@gmail.com</code>, password: <code>adebayo123</code></p>
        <p>Email: <code>oke@gmail.com</code>, password: <code>password123</code></p>
        <p>Email: <code>yunus@gmail.com</code>, password: <code>password123</code></p>
        <p>Email: <code>john@gmail.com</code>, password: <code>password123</code></p>
    </div>


@endsection


@section('scripts')



@endsection