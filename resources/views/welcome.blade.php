@extends('layouts.app')

@section('styles')

    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>

                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                    <i class="fa fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">



                        </div>
                        <!-- /.card-body -->
                        <app-chat
                                v-on:messagesent="addMessage"
                                :user="{{ auth()->user() }}"

                        ></app-chat>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection