@extends('layouts.auth')

@section('content')
    <div class="register">
        <div class="register__title">
            <h2>@lang('pages/register.register')</h2>
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/back.png') }}" alt="back">
            </a>
        </div>
        <form class="register__form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="register__formItem">
                <label for="name">@lang('pages/register.name')</label>
                <div class="register__formInput">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span>
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="register__formItem">
                <label for="email">@lang('pages/register.email')</label>
                <div class="register__formInput">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span>
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="register__formInput">
                <label for="password">@lang('pages/register.password')</label>
                <div class="register__formItem">
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span>
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="register__formItem">
                <label for="password-confirm">@lang('pages/register.confirm_password')</label>
                <div class="register__formInput">
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>
            </div>
            <div clasS="register__formSubmitButton">
                <button type="submit">
                    @lang('pages/register.register_btn')
                </button>
            </div>
            <div class="register__formLoginLink">
                <p>@lang('pages/register.question')</p>
                <a href="login">
                    @lang('pages/register.login_link')
                </a>
            </div>
        </form>
    </div>
@endsection
