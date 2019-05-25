@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <app-messages :messages="messages"></app-messages>
                    </div>
                    <div class="panel-footer">
                        <app-chat
                                v-on:messagesent="addMessage"
                                :user="{{ auth()->user() }}"

                        ></app-chat>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection