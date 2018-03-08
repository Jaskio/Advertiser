@extends('layouts.auth')

@section('content')
    <div class="login">
        <div class="login__title">
            <h2>@lang('pages/login.login')</h2>
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/back.png') }}" alt="back">
            </a>
        </div>
        <form class="login__form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="login__formItem">
                <label for="email">@lang('pages/login.email')</label>
                <div class="login__formInput">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <div class="login__formItem">
                <label for="password">@lang('pages/login.password')</label>
                <div class="login__formInput">
                    <input id="password" type="password" name="password" required>
                    <span>
                        {{ $errors->first('email') }}
                    </span>
                    <span>
                        {{ $errors->first('password') }}
                    </span>
                </div>
            </div>
            <div class="login__formSubmitButton">
                <button type="submit">
                    @lang('pages/login.login_btn')
                </button>
            </div>
            <div class="login__formRegisterLink">
                <p>@lang('pages/login.question')</p>
                <a href="register">
                @lang('pages/login.register_link')
                </a>
            </div>
        </form>
    </div>
@endsection
