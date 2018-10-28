@extends('layouts.layout')

@section('box-body')
<div class="container-p">
    <div class="row">
        <div class="col-10 txt-2">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <label for="name" class="col-4 txt-right">{{ __('Name') }}</label>

                            <div class="col-6">
                                <input id="name" name="name" type="text" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <label for="email" class="col-4 txt-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-6">
                                <input id="email" type="email" name="email" required>

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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-4 txt-right">{{ __('Confirm Password') }}</label>

                            <div class="col-6">
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 txt-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
