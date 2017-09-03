NAVBAR
    <div>
    @if(Auth::check())
        <div>
            <span>
                <img src="{{ url('/') . Auth::user()->avatar_path }}" alt="no_avatar">
            </span>
            <h3>{{ Auth::user()->name }}</h3>
            <ul>
                <li>
                    <a href="{{ route('account.edit', Auth::user()) }}">@lang('partials/nav.account_settings')</a>
                </li>
                <li>
                    {{ Form::open(['route' => 'logout', 'method' => 'POST']) }}
                        {{ Form::submit(trans('partials/nav.log_out')) }}
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    @else
        <div>
            <div>
                <a href="{{ url('login') }}">@lang('partials/nav.sign_in')</a>
                <a href="{{ url('register') }}">@lang('partials/nav.register')</a>
            </div>
        </div>
    @endif

    </div>