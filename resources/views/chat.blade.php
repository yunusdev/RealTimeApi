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

    <div class="container" style="margin: 50px auto">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <header class="section-header" style="margin-bottom: -40px">
                        <small><strong>Feature</strong></small>
                        <h2>CHAT ROOM</h2>
                        <hr>
                    </header>

                    <h5 >Chats on <strong><i>{{$talk->name}}</i></strong></h5>

                    <p class="lead">{{$talk->description}}</p>
                    <hr>

                    <div class="panel-body">
                        <app-messages :messages= "messages" talk_id="{{$talk->id}}" user_id = "{{auth()->id()}}"></app-messages>
                    </div>
                    <div class="panel-footer">
                        <app-chat
                                v-on:messagesent="addMessage"
                                :user="{{ auth()->user() }}" :talk_id="{{$talk->id}}"

                        ></app-chat>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection