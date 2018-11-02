@extends('layouts.layout')

@section('box-body')

<div class="container-p">
    <div class="row">
        <div class="col-10 txt-2">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <label for="email" class="col-4 txt-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-6">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-4 txt-right">{{ __('Password') }}</label>

                            <div class="col-6">
                                <input id="password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 txt-center">
                                    {{--<input type="checkbox" name="remember" id="remember">--}}

                                    {{--<label for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 txt-center">
                                <button type="submit">
                                    {{ __('Login') }}
                                </button>

                                {{--<a href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
