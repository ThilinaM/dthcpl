@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.basicDetail.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.basic-details.index') }}">
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
                                <tr>
                                    <th>
                                        {{ trans('cruds.basicDetail.fields.sms_serviceon') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $basicDetail->sms_serviceon ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.basic-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection