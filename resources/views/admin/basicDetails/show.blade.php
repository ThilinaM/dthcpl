@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.basicDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.basic-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.basicDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $basicDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.basicDetail.fields.logo') }}
                        </th>
                        <td>
                            @if($basicDetail->logo)
                                <a href="{{ $basicDetail->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $basicDetail->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.basicDetail.fields.name') }}
                        </th>
                        <td>
                            {{ $basicDetail->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.basicDetail.fields.description') }}
                        </th>
                        <td>
                            {{ $basicDetail->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.basic-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection