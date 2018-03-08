<div class="settings__newAdvertItem">
    <fieldset>
        {{ Form::text('title', null, ['placeholder' => 'Title']) }}
            <span>
                {{$errors->first('title')}}
            </span>
    </fieldset>
    <fieldset>
        {{ Form::textarea('description', null, ['placeholder' => 'Description']) }}
            <span>
                {{$errors->first('description')}}
            </span>
    </fieldset>
    <fieldset>
        {{ Form::text('price', null, ['placeholder' => 'Price']) }}
        <span>
            {{$errors->first('price')}}
        </span>
    </fieldset>
    <fieldset>
        {{ Form::select('sub_category_id', $subcategories->pluck('title'), $selected_subcategory, ['class' => 'form-control']) }}
    </fieldset>
</div>
<div class="settings__newAdvertItem">
    <div class="settings__newAdvertImage">
        <img src="{{ asset($image_url) }}" alt="advertisement_image">
    </div>
    <div class="settings__newAdvertUpload">
        {{ Form::file('img_path', ['class' => 'form-control']) }}   
            <span>
                {{$errors->first('img_path')}}
            </span>
    </div>
</div>

<div class="settings__newAdvertSubmitButton">
    {{ Form::submit(trans('forms.account_save')) }}
</div>