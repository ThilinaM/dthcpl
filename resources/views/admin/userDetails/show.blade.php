@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $userDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.name') }}
                        </th>
                        <td>
                            {{ $userDetail->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.nic') }}
                        </th>
                        <td>
                            {{ $userDetail->nic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.library_card_no') }}
                        </th>
                        <td>
                            {{ $userDetail->library_card_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDetail.fields.mobile') }}
                        </th>
                        <td>
                            {{ $userDetail->mobile }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection