@extends('layouts.app')

@section('content')
    <div class="settings">
        <ul class="settings__options">
            <li class="{{ Request::is('profile/edit') ? 'settings__option--active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    @lang('content.settings_tab_1')
                </a>
            </li>
            <li class="{{ Request::is('profile/edit/adverts') ? 'settings__option--active' : '' }}">
                <a href="{{ route('profile.edit', 'adverts') }}">
                    @lang('content.settings_tab_2')
                </a>
            </li>
            <li class="{{ Request::is('profile/edit/create-new') ? 'settings__option--active' : '' }}">
                <a href="{{ route('profile.edit', 'create-new') }}">
                    @lang('content.settings_tab_3')
                </a>
            </li>
        </ul>
        
        <div class="settings__content">
            @if(session()->has('success_message'))
                <div class="settings__successMessage">
                    {{ session()->get('success_message') }}
                </div>
            @endif
        
        @switch( Request::segment(3) )

            @case('adverts')
                <div class="settings__adverts">
                    @foreach ($user->advertisements as $ad)
                        {{ Form::open(['route' => ['advertisement.destroy', $ad->id], 'class' => 'settings__advert', 'method' => 'DELETE']) }}
                            <div class="settings__advertItem">
                                <h2>{{ $ad->title }}</h2> 
                                <div class="settings__advertImage">
                                    <img src="{{ asset($ad->img_path) }}" alt="ad image">
                                </div>
                            </div>
                            <div class="settings__advertItem">
                                <a href="{{ route('advertisement.show', $ad->id) }}">
                                    <button type='button'>
                                        @lang('content.settings_advertButton_view')
                                    </button>
                                </a>
                                <a href="{{ route('profile.edit', ['ad', $ad->id]) }}">
                                    <button type='button'>
                                        @lang('content.settings_advertButton_edit')
                                    </button>
                                </a>
                                {{ Form::button(trans('content.settings_advertButton_delete'), ['type' => 'submit']) }}
                            </div>
                        {{ Form::close() }}
                    @endforeach
                </div>
            @break

            @case('create-new')
                @include('advertisement.create')
            @break

            @case('ad')
                @php
                    $index = 0;
                    foreach($user->advertisements as $key => $value) {
                        if ($value->id == Request::segment(4)) {
                            $index = $key;
                        }
                    }
                @endphp
                @include('advertisement.edit', ['index' => $index])
            @break

            @default
            {{ Request::segment(3) }}

                {{ Form::model($user, ['route' => ['account.update', $user->id], 'method' => 'PUT', 'files' => true, 'class' => 'settings__profile']) }}
                    <div class="settings__profileItem">
                        <fieldset>
                            {{ Form::text('full_name', null, ['placeholder' => trans('content.settings_input_name')]) }}
                                <span>
                                    {{$errors->first('full_name')}}
                                </span>
                        </fieldset>
                        <fieldset>
                            {{ Form::email('email', null, ['placeholder' => trans('content.settings_input_email'), 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$']) }}
                                <span>
                                    {{$errors->first('email')}}
                                </span>
                        </fieldset>
                        <fieldset>
                            {{ Form::password('password',  ['placeholder' => trans('content.settings_input_changePassword')]) }}
                                <span>
                                    {{$errors->first('password')}}
                                </span>
                        </fieldset>
                    </div>
                    <div class="settings__profileItem">
                        <div class="settings__profileImage">
                            <img src="{{ asset($user->avatar_path) }}" alt="avatar">
                        </div>
                        <div class="setings__profileUpload">
                            {{ Form::file('avatar_path') }}   
                                <span>
                                    {{$errors->first('avatar_path')}}
                                </span>
                        </div>
                    </div>
                    <div class="settings__profileSubmitButton">
                        {{ Form::submit(trans('content.settings_saveButton')) }}
                    </div>
                {{ Form::close() }}
            @break
        @endswitch
        </div>
    </div>
@endsection