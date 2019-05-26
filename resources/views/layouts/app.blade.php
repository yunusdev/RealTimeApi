<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thesaas.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
    @yield('styles')

    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav style="background-color: #eee" class="topbar topbar-expand-md">
            <div class="container">

                <div class="topbar-left">
                    <button class="topbar-toggler">☰</button>
                    <a class="topbar-brand" href="{{url('/')}}">
                        <h4>REAL TIME TALK</h4>
                    </a>
                </div>


                <div class="topbar-right">
                    <ul class="topbar-nav nav">
                        @auth
                        <li class="nav-item">{{auth()->user()->name}}</li>
                        @endauth
                    </ul>

                    <div class="d-inline-flex ml-30">

                        @guest
                            <a class=" btn btn-sm btn-outline btn-success hidden-sm-down" href="{{route('login')}}">Login</a>
                            <a class="btn btn-sm btn-success hidden-sm-down" href="{{route('register')}}">Register</a>
                        @else
                            <a class=" btn btn-sm btn-outline-dark mr-5  hidden-sm-down" href="{{route('all_talk')}}"> All Talk</a>
                            <a class=" btn btn-sm btn-info  hidden-sm-down" href="javascript:;" data-toggle="modal" data-target="#talkModal"> {{ __('Create Talk') }}</a>
                            {{--<li>--}}
                                <a class="btn btn-sm btn-info btn-danger hidden-sm-down" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            {{--</li>--}}

                        @endguest

                    </div>
                </div>

            </div>
        </nav>

        <app-talk user= "{{auth()->user()}}"   users_raw = "{{\App\User::all()}}"></app-talk>

        <main class="py-4 mt-50" >
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/core.min.js') }}"></script>

</html>
