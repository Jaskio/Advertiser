@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($ads as $ad)
            <div>
                <h1>{{ $ad->title }}</h1> 
                <h2>{{ $ad->price }} $</h2>
                <h3>{{ $ad->description }}</h3>
                <a href="{{ route('advertisement.show', $ad->id) }}">@lang('forms.details_btn')</a>
            </div>
            <hr>
        @endforeach
        
    </div>
@endsection
