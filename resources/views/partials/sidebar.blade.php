

<div>

    @if ( Request::is('advertisement/*') && is_numeric(Request::segment(2)) )
        <div>
            <div>
                <img src="{{ asset($ad->user->avatar_path) }}" style="height:100px; width:80px">
            </div>
            <div>
                {{ $ad->user->full_name }} <br>
                {{ $ad->user->email }}
            </div>
            <br>
            <br>
            <div>
                GOOGLE LOCATION
            </div>
        </div>

    @else

        {{ Form::open(['route' => ['advertisement.filter'], 'method' => 'POST']) }}
            <h2>Pretraga</h2>
            {{ Form::text('search_term', null, ['placeholder' => 'Search...']) }}
            <h2>Kategorije</h2>
            @foreach ($categories as $category)
                <div>
                    <a href="{{ route('advertisement.categories', $category->id) }}">{{ $category->title }}</a>
                </div>
            @endforeach

            @if ( Request::is('advertisement/categories/*') )
                @foreach ($categories[$ads->selected_category]->sub_categories as $sub_category)
                    <div>
                        {{ Form::label($sub_category->title) }}
                        {{ Form::checkbox('sub_category[]', $sub_category->id) }}
                    </div>
                @endforeach
            @endif

            <h2>Cijena</h2>
            <div>
                {{ Form::label('Od') }}
                {{ Form::text('price_from') }} <br>
                {{ Form::label('Do') }}
                {{ Form::text('price_to') }}
            </div>

            {{ Form::submit('Save') }}
        {{ Form::close() }}
        
    @endif

</div>



