<div>

    @php ($ad = $user->advertisements[$index])

    {{ Form::model($ad, ['route' => ['advertisement.update', $ad->id], 'method' => 'PUT']) }}

        @include('advertisement.fields')
        
    {{ Form::close() }}

</div>
