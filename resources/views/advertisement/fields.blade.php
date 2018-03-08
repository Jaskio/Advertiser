<div class="settings__newAdvertItem">
    <fieldset>
        {{ Form::text('title', null, ['placeholder' => trans('content.settings_input_title')]) }}
            <span>
                {{$errors->first('title')}}
            </span>
    </fieldset>
    <fieldset>
        {{ Form::textarea('description', null, ['placeholder' => trans('content.settings_input_desc')]) }}
            <span>
                {{$errors->first('description')}}
            </span>
    </fieldset>
    <fieldset>
        {{ Form::text('price', null, ['placeholder' => trans('content.settings_input_price')]) }}
        <span>
            {{$errors->first('price')}}
        </span>
    </fieldset>
    <fieldset>
        {{ Form::select('sub_category_id', $subcategories->pluck('title'), $selected_subcategory) }}
    </fieldset>
</div>
<div class="settings__newAdvertItem">
    <div class="settings__newAdvertImage">
        <img src="{{ asset($image_url) }}" alt="advertisement_image">
    </div>
    <div class="settings__newAdvertUpload">
        {{ Form::file('img_path') }}   
            <span>
                {{$errors->first('img_path')}}
            </span>
    </div>
</div>

<div class="settings__newAdvertSubmitButton">
    {{ Form::submit(trans('content.settings_saveButton')) }}
</div>