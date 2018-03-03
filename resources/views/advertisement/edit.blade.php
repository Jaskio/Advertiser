<div>

    @php ($ad = $user->advertisements[$index])

    {{ Form::model($ad, ['route' => ['advertisement.update', $ad->id], 'method' => 'PUT', 'files' => true]) }}

        @include('advertisement.fields')
        
    {{ Form::close() }}

    <div>
        @if(session()->has('success_message'))
            <div>
                {{ session()->get('success_message') }}
            </div>
        @endif
    </div>

</div>
