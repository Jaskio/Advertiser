@extends('layouts.app')

@section('content')
    <div class="advertList">
    
        @foreach ($ads as $ad)
            <div class="advertList__item">
                <div class="advertList__itemImage">
                    <img src="{{ asset($ad->img_path) }}" alt="advert-img">
                </div>
                <div class="advertList__itemInfo">
                    <h2>{{ $ad->title }}</h2> 
                    <div class="advertList__itemInfoPrice">{{ $ad->price }} $</div>
                </div>
                <a href="{{ route('advertisement.show', $ad->id) }}"></a>
            </div>
        @endforeach
        
    </div>
    <div class="pagination">
        <div class="paginationPages">
            <a href="{{ $ads->previousPageUrl() }}">@lang('pagination.previous')</a>
            <div>{{ $ads->currentPage() }}/{{ $ads->lastPage() }}</div>
            <a href="{{ $ads->nextPageUrl() }}">@lang('pagination.next')</a>
        </div>
    </div>

@endsection
