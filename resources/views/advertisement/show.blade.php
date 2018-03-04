@extends('layouts.app')

@section('content')
    <div class="advert">
        <div class="advertItem">
            <div class="advert__back">
                <a href="{{ url('home') }}">Back</a>
            </div>
            <div class="advert__title">
                <h1>{{ $ad->title }} </h1>
            </div>
            <div class="advert__price">
                <h2>Price:</h2>
                <p>{{ $ad->price }} $</p>
            </div>
            <div class="advert__desc">
                <h2>Description:</h2>
                <p>{{ $ad->description }}</p>
            </div>
        </div>
        <div class="advertItem">
            <div class="advert__image">
                <img src="{{ asset($ad->img_path) }}" alt="no-image">
            </div>
        </div>
    </div>
@endsection