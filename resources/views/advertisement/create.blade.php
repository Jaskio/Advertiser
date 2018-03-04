<div>

    @php
        $selected_subcategory = 0;
        $image_url = '/uploads/advertisements/default.png';
    @endphp

    {{ Form::open(['route' => ['advertisement.store'], 'method' => 'POST', 'files' => true]) }}

        @include('advertisement.fields')
        
    {{ Form::close() }}

</div>