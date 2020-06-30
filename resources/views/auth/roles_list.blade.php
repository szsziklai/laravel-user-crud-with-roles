@extends('layouts.admin_app')

@section('content')

<div class="mx-auto mb-3 mt-3" >
    <a class="btn btn-primary" href="{{ route('role_add') }}">{{ trans('buttons.add') }}</a>
</div>

<table class="table table-bordered mb-3 mt-3">
    <thead>
        <tr>
            <th>{{ trans('user.id') }}</th>
            <th>{{ trans('user.name') }}</th>
            <th>{{ trans('user.slug') }}</th>
            <th width="300px;">{{ trans('buttons.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data) && $data->count())
        @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ @locale_trans($value, 'name') }}</td>
            <td>{{ $value->slug  }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('role_edit', $value->id) }}">{{ trans('buttons.edit') }}</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="10">There are no data.</td>
        </tr>
        @endif
    </tbody>
</table>

{!! $data->links() !!}

@endsection