@extends('layouts.app')

@section('content')

    <section class="section py-100">
        <div class="container">
            <header class="section-header">
                <small>Oops</small>
                <h2>Page Not Found!</h2>
                <hr>
                <p class="lead">Seems you're looking for something that doesn't exist or you dont have access.</p>
            </header>

            <br>
            <p class="text-center"><a class="btn btn-primary" href="{{url('/')}}">Return to home</a></p>

        </div>
    </section>

@endsection