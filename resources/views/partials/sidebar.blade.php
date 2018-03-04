@if ( Request::is('advertisement/*') && is_numeric(Request::segment(2)) )
    <div>
        <div>
            <img src="{{ asset($ad->user->avatar_path) }}" style="height:100px; width:80px">
        </div>
        <div>
            {{ $ad->user->full_name }} <br>
            {{ $ad->user->email }}
        </div>
    </div>
@else
    {{ Form::open(['route' => ['advertisement.filter'], 'method' => 'POST', 'class' => 'sidebar__form']) }}
        <div class="sidebar__search">
            {{ Form::text('search_term', null, ['placeholder' => 'Search...']) }}
        </div>
        <div class="sidebar__categories">
            <div class="sidebar__categoriesList">
                @foreach ($categories as $category)
                    <a href="{{ route('advertisement.categories', $category->id) }}">
                        <span>{{ $category->title }}</span>
                    </a>
                @endforeach
            </div>
            @if ( Request::is('categories/*') )
                <div class="sidebar__subCategories">
                    @foreach ($categories[$ads->selected_category]->sub_categories as $sub_category)
                        <div class="sidebar__subCategoryItem">
                            {{ Form::label($sub_category->title) }}
                            {{ Form::checkbox('sub_category[]', $sub_category->id) }}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="sidebar__price">
            <h2>Price range</h2>
            <div class="sidebar__priceRange">
                <span>{{ Form::text('price_from', null, ['placeholder' => 'From']) }}</span>
                <span>{{ Form::text('price_to', null, ['placeholder' => 'To']) }}</span>
            </div>
        </div>
        <div class="sidebar__submitButton">
            {{ Form::submit('Search') }}
        </div>
    {{ Form::close() }}
@endif