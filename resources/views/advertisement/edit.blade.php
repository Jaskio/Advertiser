@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::model($ad, ['route' => ['advertisement.update', $ad->id], 'method' => 'PUT']) }}
            {{ Form::text('title') }}
            {{ Form::text('description') }}
            {{ Form::text('price') }}
            {{ Form::submit(trans('forms.account_save')) }}
        {{ Form::close() }}

    </div>
@endsection