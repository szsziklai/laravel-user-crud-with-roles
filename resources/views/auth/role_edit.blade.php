@extends('layouts.admin_app')

@section('content')

@include('common.back_button', ['prev' => route('role_list')])

@if(isset($data->id))
{!! Form::model($data, array('route' => array('role_post', $data->id))) !!}
@else
{!! Form::model($data, array('route' => array('role_add_post'))) !!}
@endif

<div class="row">
    <div class="col-md-6">
        <fieldset class="border p-3">
            <legend class="scheduler-border">{{ trans('user.roles') }}</legend>
            @include('common.form_elements.translate.text_field', ['field' => 'name', 'trans' => 'user.name', 'data' => $data,'translate' => true])

            @if(isset($data->id))
            <div class="form-group">
                <p>{{ trans('user.slug') }}: {{ $data->slug }}</p>
            </div>
            @else
            @include('common.form_elements.text_field', ['field' => 'slug', 'trans' => 'user.slug'])
            @endif
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset class="border p-3">
            <legend class="scheduler-border">{{ trans('user.permissions') }} <a class="btn btn-outline-secondary btn-sm" href="{{ route('permission_list') }}">{{ trans("user.permissions")  }}</a></legend>
            @if(!empty($permission) && $permission->count())
            @php
            $i = 1
            @endphp
            @foreach($permission as $key => $value)
            @php
            $finded = false
            @endphp
            @if($data && isset($data->permissions))
            @foreach($data->permissions as $p)
            @if($p->id == $value->id)
            @php
            $finded = true
            @endphp    
            @break
            @endif   
            @endforeach
            @endif   
            <div class="form-check">
                {{ Form::checkbox('permissions[]', $value->id ? $value->id : null, $finded, ['id' => 'checbox' . $i, 'class' => 'form-check-input']) }}
                {{ Form::label('checbox' . $i, @locale_trans($value, 'name'), ['class' => 'form-check-label']) }}
            </div>
            @php
            $i++
            @endphp
            @endforeach
            @else
            <p>There are no data.</p>
            @endif    
        </fieldset>
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-group">
            {{ Form::submit(trans('buttons.submit'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection