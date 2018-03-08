@php
    $selected_subcategory = 0;
    $image_url = '/uploads/advertisements/default.png';
@endphp

{{ Form::open(['route' => ['advertisement.store'], 'method' => 'POST', 'files' => true, 'class' => 'settings__newAdvert']) }}
    @include('advertisement.fields')
{{ Form::close() }}
