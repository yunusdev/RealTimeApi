@extends('layouts.app')

@section('styles')


    <style>
        .pri{
            background: #007bff;
            border: 1px solid #d2d6de;
            color: #fff
        }
    </style>

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <header class="section-header">
                <small><strong>Feature</strong></small>
                <h2>All Talk</h2>
                <hr>
            </header>


            <div class="row gap-y">

                @forelse($talks as $talk)

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="flexbox gap-items-4">

                            <div>
                                <h5><a title="Go to chat room" href="{{route('chat', $talk->slug)}}">{{$talk->name}}</a></h5>
                                <span title="" class="badge-primary badge pull-right">{{$talk->messages->count()}} messages</span>
                                <p>{{str_limit($talk->description), 150}}.</p>

                                <div  class="pull-right mb-5" >
                                    <code style="font-size: 10px">Users Attached</code>


                                </div>

                                @foreach($talk->users as $user)
                                        <span style="color: #0a92cf"><strong><i>{{$user->name}}, </i></strong></span>

                                @endforeach

                            </div>
                        </div>
                    </div>

                @endforeach



            </div>

        </div>
    </section>

@endsection