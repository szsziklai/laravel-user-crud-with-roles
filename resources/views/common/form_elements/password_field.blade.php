<div class="form-group">
    {{ Form::label($field, trans($trans)) }}
    {{ Form::password($field, ['class' => $errors->has($field) ? 'form-control is-invalid ' : 'form-control']) }}

    @include('common.form_elements.input_error', ['field' => $field])
</div>