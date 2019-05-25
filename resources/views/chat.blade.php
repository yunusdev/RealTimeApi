@extends('layouts.app')

@section('styles')

{{--    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">--}}

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
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <app-messages :messages= "messages" user_id = "{{auth()->id()}}"></app-messages>
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