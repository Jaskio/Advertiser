@php 
    $ad = $user->advertisements[$index];
    $selected_subcategory = $ad->sub_category_id - 1;
    $image_url = $ad->img_path;
@endphp

{{ Form::model($ad, ['route' => ['advertisement.update', $ad->id], 'method' => 'PUT', 'files' => true]) }}
    @include('advertisement.fields')
{{ Form::close() }}