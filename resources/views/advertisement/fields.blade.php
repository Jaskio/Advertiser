<fieldset>
    {{ Form::text('title', null, ['placeholder' => 'Title']) }}
        {{$errors->first('title')}}
</fieldset>
<fieldset>
    {{ Form::textarea('description', null, ['placeholder' => 'Description']) }}
        {{$errors->first('description')}}
</fieldset>
<fieldset>
    {{ Form::text('price', null, ['placeholder' => 'Price']) }}
        {{$errors->first('price')}}
</fieldset>
<fieldset>
    <div>
        <img src="{{ asset($image_url) }}" alt="advertisement_image">
    </div>
    {{ Form::file('img_path', ['class' => 'form-control']) }}   

        {{$errors->first('img_path')}}

</fieldset>
<fieldset>
    {{ Form::select('sub_category_id', $subcategories->pluck('title'), $selected_subcategory, ['class' => 'form-control']) }}
</fieldset>
{{ Form::submit(trans('forms.account_save')) }}