<div class="form-group">
    @if(isset($translate) && $translate)
    {{ Form::label($field, trans($trans) . ' [' . Config::get('app.default_translate_locale') .  ']' )}} <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#translate-modal-{{ $field }}">{{ trans("buttons.translate")  }}</button>
    @else
    {{ Form::label($field, trans($trans)) }}
    @endif

    {{ Form::text($field, null, ['class' => $errors->has($field) ? 'form-control is-invalid ' : 'form-control']) }}

    @include('common.form_elements.input_error', ['field' => $field])
    @include('common.form_elements.translate.translate_modal', ['field' => $field, 'data' => $data,'type' => 'textfield'])
</div>