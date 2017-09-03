@extends('layouts.app')

@section('content')
    <div class="container">
        
        <!--{{$user}}-->

        {{ Form::model($user, ['route' => ['account.update', $user->id], 'method' => 'PUT']) }}
            {{ Form::text('full_name', null) }}

            {{ Form::email('email', null, ['class' => 'form-control', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) }}
            {{ Form::submit(trans('forms.account_save')) }}
        {{ Form::close() }}

        <a href="{{ route('advertisement.create') }}">create new ad</a>

        @foreach ($user->advertisements as $ad)
            <div>
                {{ Form::open(['route' => ['advertisement.destroy', $ad->id], 'method' => 'DELETE']) }}
                    <h1>{{ $ad->title }}</h1> 
                    <h2>{{ $ad->price }} $</h2>
                    <h3>{{ $ad->description }}</h3>

                    <a href="{{ route('advertisement.show', $ad->id) }}">show</a>
                    <a href="{{ route('advertisement.edit', $ad->id) }}">edit</a>
                    {{ Form::button('delete', ['type' => 'submit']) }}

                {{ Form::close() }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection