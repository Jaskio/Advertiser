@extends('layouts.app')

@section('content')
    <div class="advert">
        <div class="advertItem">
            <div class="advert__back">
                <a href="{{ url()->previous() }}">
                    @lang('content.advert_backButton')
                </a>
            </div>
            <div class="advert__title">
                <h1>{{ $ad->title }} </h1>
            </div>
            <div class="advert__price">
                <h2> @lang('content.advert_price')</h2>
                <p>{{ $ad->price }} $</p>
            </div>
            <div class="advert__desc">
                <h2> @lang('content.advert_desc')</h2>
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