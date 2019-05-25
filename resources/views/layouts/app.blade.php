<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
        <nav class="topbar topbar-expand-md">
            <div class="container">

                <div class="topbar-left">
                    <button class="topbar-toggler">☰</button>
                    <a class="topbar-brand" href="index.html">
                        {{--<img class="logo-default" src="assets/img/logo.png" alt="logo">--}}
                        {{--<img class="logo-inverse" src="assets/img/logo-light.png" alt="logo">--}}
                    </a>
                </div>


                <div class="topbar-right">
                    <ul class="topbar-nav nav">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>

                    </ul>

                    <div class="d-inline-flex ml-30">

                        @guest
                            <a class=" btn btn-sm btn-outline btn-success hidden-sm-down" href="{{route('login')}}">Login</a>
                            <a class="btn btn-sm btn-success hidden-sm-down" href="{{route('register')}}">Register</a>
                        @else
                            <a class="nav-link mr-5" href="javascript:;" data-toggle="modal" data-target="#talkModal"> {{ __('Talk') }}</a>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest

                    </div>
                </div>

            </div>
        </nav>

        <app-talk user= "{{auth()->user()}}"></app-talk>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/thesaas.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
