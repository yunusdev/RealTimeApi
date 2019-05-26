@extends('layouts.app')

@section('content')
    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%; margin: 50px auto">
        <h5 class="text-uppercase text-center">Login</h5>
        <br><br>

        <form method="POST" action="{{ route('login') }}" class="form-type-material">
            @csrf


            <div class="form-group">
                <input type="email" value="{{old('email')}}" class="form-control " name="email" placeholder="Email address" >
                @if ($errors->has('email'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('email') }}</i></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <input type="password" class="form-control " name="password" placeholder="Password" >
                @if ($errors->has('password'))
                    <span  class="help-block" >
                      <strong style="color: #dd4b39; font-size: 12px"><i>{{ $errors->first('email') }}</i></strong>
                </span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
        </form>

        <hr class="w-30">

        <p class="text-center text-muted fs-13 mt-20">Already have an account? <a href="page-login.html">Sign in</a></p>
@endsection
