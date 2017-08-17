@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $ad->title }} </h1>
        <div>
            <img src="{{ url('/') }} {{ $ad->img_path }}" alt="no-image">
        </div>
        <h2 style="color:red">{{ $ad->price }} $</h2>
        <h3>{{ $ad->description }}</h3>

        <a href="{{ url('home') }}">Go back</a>

    </div>
@endsection