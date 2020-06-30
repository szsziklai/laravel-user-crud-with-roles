@extends('layouts.admin_app')

@section('content')

@include('common.back_button', ['prev' => URL::previous()])

<table class="table table-bordered mb-3 mt-3">
    <tr>
        <td>{{ trans('user.email') }}</td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td>{{ trans('user.name') }}</td>
        <td>{{ $data->firstname  }} {{ $data->lastname  }}</td>
    </tr>
    <tr>
        <td>{{ trans('user.lang') }}</td>
        <td>{{ $data->lang }}</td>
    </tr>
    <tr>
        <td>{{ trans('user.roles') }}</td>
        <td>
            @foreach($data->roles as $role)
            <span class="badge badge-primary">{{ $role->name }}</span>
            @endforeach
        </td>
    </tr>
    <tr>
        <td>{{ trans('user.status') }}</td>
        <td>@if($data->deleted_at == null) {{ trans('user.active') }} @else {{ trans('user.deleted') }} @endif</td>
    </tr>
    <tr>
        <td>{{ trans('user.created_at') }}</td>
        <td>{{ $data->created_at }}</td>
    </tr>
    <tr>
        <td>{{ trans('user.updated_at') }}</td>
        <td>{{ $data->updated_at }}</td>
    </tr>

</table>

@endsection