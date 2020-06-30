@extends('layouts.admin_app')

@section('content')

<table class="table table-bordered mb-3 mt-3">
    <thead>
        <tr>
            <th>{{ trans('user.email') }}</th>
            <th>{{ trans('user.name') }}</th>
            <th>{{ trans('user.roles') }}</th>
            <th width="300px;">{{ trans('buttons.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data) && $data->count())
        @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->email }}</td>
            <td>{{ $value->firstname  }} {{ $value->lastname  }}</td>
            <td>
                @foreach($value->roles as $role)
                <span class="badge badge-primary">{{ $role->name }}</span>
                @endforeach
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('user_show', $value->id) }}">{{ trans('buttons.show') }}</a>
                <a class="btn btn-warning" href="{{ route('user_edit', $value->id) }}">{{ trans('buttons.edit') }}</a>
                @if($value->deleted_at == null)<a class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal" href="{{ route('user_delete', $value->id) }}">{{ trans('buttons.delete') }}</a> @endif
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
@if($value->deleted_at == null)
<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('user.user_delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ trans('messages.are_you_sure', ['attribute' => $value->firstname . " " . $value->lastname]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('buttons.cancel') }}</button>
                <a href="{{ route('user_delete', $value->id) }}" class="btn btn-primary">{{ trans('buttons.confirm') }}</a>
            </div>
        </div>
    </div>
</div>
@endif
{!! $data->links() !!}

@endsection