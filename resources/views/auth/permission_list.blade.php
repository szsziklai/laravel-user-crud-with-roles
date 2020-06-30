@extends('layouts.admin_app')

@section('content')

<table class="table table-bordered mb-3 mt-3">
    <thead>
        <tr>
            <th>{{ trans('user.id') }}</th>
            <th>{{ trans('user.name') }}</th>
            <th>{{ trans('user.slug') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data) && $data->count())
        @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->slug  }}</td>
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