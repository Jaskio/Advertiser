<nav style="width:100%;background-color:yellow;height:40px;">
    NAVBAR
        <div style="float:right;margin-right:10px;">
        @if(Auth::check())
            <div>
                <h3>User</h3>
                <ul>
                    <li>
                        {{ Form::open(['route' => 'logout', 'method' => 'POST']) }}
                            {{ Form::submit('Log out') }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
         @else
            <div>
                <div>
                    <a href="{{ url('login') }}">Sign in</a>
                    <a href="{{ url('register') }}">Register</a>
                </div>
            </div>
        @endif

        </div>
</nav>