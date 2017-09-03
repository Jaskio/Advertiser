@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open(['route' => ['advertisement.store'], 'method' => 'POST']) }}
            {{ Form::text('title') }}
            {{ Form::text('description') }}
            {{ Form::text('price') }}
            {{ Form::text('img_path') }}
            {{ Form::submit(trans('forms.account_save')) }}
        {{ Form::close() }}

    </div>
@endsection