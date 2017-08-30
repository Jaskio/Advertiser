@extends('layouts.app')

@section('content')
    <div class="container">
        
        <!--{{$user}}-->

        {{ Form::model($user, ['route' => ['account.update', $user->id], 'method' => 'PUT']) }}
            {{ Form::text('full_name', null) }}

            {{ Form::email('email', null, ['class' => 'form-control', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) }}
            {{ Form::submit(trans('content/account.save')) }}
        {{ Form::close() }}
        
    </div>
@endsection