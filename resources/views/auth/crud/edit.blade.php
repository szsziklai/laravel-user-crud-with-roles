@extends('layouts.admin_app')

@section('content')

@include('common.back_button', ['prev' => route('user_list')])
<div class="row">
    <div class="col-md-6">
        {!! Form::model($data, array('route' => array('user_edit_post', $data->id))) !!}
        <fieldset class="border p-3">
            <legend class="scheduler-border">{{ trans('user.user_details') }}</legend>
            @include('common.form_elements.email_field', ['field' => 'email', 'trans' => 'user.email'])

            @include('common.form_elements.text_field', ['field' => 'firstname', 'trans' => 'user.firstname'])

            @include('common.form_elements.text_field', ['field' => 'lastname', 'trans' => 'user.lastname'])

            @include('common.form_elements.text_field', ['field' => 'phone', 'trans' => 'user.phone'])

            @include('common.form_elements.select_field', ['field' => 'lang', 'trans' => 'user.lang', 'options' => ['en' => trans('locale.en'), 'de' => trans('locale.de'), 'hu' => trans('locale.hu')]])

            <div class="form-group">
                {{ Form::submit(trans('buttons.submit'), ['class' => 'btn btn-primary']) }}
            </div>

            {!! Form::close() !!}
        </fieldset>
    </div>
    <div class="col-md-6">
        {!! Form::open(array('route' => array('user_change_password_post', $data->id), 'method' => 'POST')) !!}
        <fieldset class="border p-3">
            <legend class="scheduler-border">{{ trans('user.change_password') }}</legend>
            @include('common.form_elements.password_field', ['field' => 'current_password', 'trans' => 'user.current_password'])

            @include('common.form_elements.password_field', ['field' => 'password', 'trans' => 'user.password'])

            @include('common.form_elements.password_field', ['field' => 'password_confirmation', 'trans' => 'user.password_confirm'])

            <div class="form-group">
                {{ Form::submit(trans('buttons.submit'), ['class' => 'btn btn-primary']) }}
            </div>

        </fieldset>
        {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        <fieldset class="border p-3">
            <legend class="scheduler-border">{{ trans('user.permissions') }} <a class="btn btn-outline-secondary btn-sm" href="{{ route('role_list') }}">{{ trans("user.roles")  }}</a></legend>
            {!! Form::open(array('route' => array('user_attach_roles', $data->id), 'method' => 'POST')) !!}
            <div class="form-group">
                @if(!empty($roles) && $roles->count())
                @php
                $i = 1
                @endphp
                @foreach($roles as $key => $value)
                @php
                $finded = false
                @endphp
                @if($data && isset($data->roles))
                @foreach($data->roles as $p)
                @if($p->id == $value->id)
                @php
                $finded = true
                @endphp    
                @break
                @endif   
                @endforeach
                @endif
                <div class="form-check">
                    {{ Form::checkbox('roles[]', $value->id ? $value->id : null, $finded, ['id' => 'checbox' . $i, 'class' => 'form-check-input']) }}
                    {{ Form::label('checbox' . $i, @locale_trans($value, 'name'), ['class' => 'form-check-label']) }}
                </div>
                @php
                $i++
                @endphp
                @endforeach
                @else
                <p>There are no data.</p>
                @endif 
            </div>
            <div class="form-group">
                {{ Form::submit(trans('buttons.submit'), ['class' => 'btn btn-primary']) }}
            </div>
            {!! Form::close() !!}
        </fieldset>
    </div>
</div>
@endsection