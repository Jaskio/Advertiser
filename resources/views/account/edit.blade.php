@extends('layouts.app')

@section('content')
    <div>
        <ul>
            <li>
                <a href="{{ route('profile.edit') }}">
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit', 'adverts') }}">
                    Adverts
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit', 'create-new') }}">Create New</a>
            </li>
        </ul>

        @switch( Request::segment(3) )

            @case('adverts')
                @foreach ($user->advertisements as $ad)
                    <div>
                        {{ Form::open(['route' => ['advertisement.destroy', $ad->id], 'method' => 'DELETE']) }}
                            <h1>{{ $ad->title }}</h1> 
                            <h2>{{ $ad->price }} $</h2>
                            <h3>{{ $ad->description }}</h3>

                            <a href="{{ route('advertisement.show', $ad->id) }}">show</a>
                            <a href="{{ route('profile.edit', ['ad', $ad->id]) }}">edit</a>
                            {{ Form::button('delete', ['type' => 'submit']) }}

                        {{ Form::close() }}
                    </div>
                    <hr>
                @endforeach
            @break

            @case('create-new')
                @include('advertisement.create')
            @break

            @case('ad')
                @include('advertisement.edit', ['index' => Request::segment(4) - 1])
            @break

            @default
            {{ Request::segment(3) }}
                {{ Form::model($user, ['route' => ['account.update', $user->id], 'method' => 'PUT']) }}
                    {{ Form::text('full_name', null) }}

                    {{ Form::email('email', null, ['class' => 'form-control', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) }}
                    {{ Form::submit(trans('forms.account_save')) }}
                {{ Form::close() }}
            @break
       
        @endswitch

    </div>

@endsection