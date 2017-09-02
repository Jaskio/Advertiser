@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($ads as $ad)
            <div>
                <h1>{{ $ad->title }}</h1> 
                <h2>{{ $ad->price }} $</h2>
                <h3>{{ $ad->description }}</h3>
                {{ Form::open(['route' => ['advertisement.show', $ad->id], 'method' => 'GET', 'class'=>'test']) }}
                    {{ Form::submit(trans('forms.details_btn')) }}
                {{ Form::close() }}
            </div>
            <hr>
        @endforeach
        
    </div>
@endsection
