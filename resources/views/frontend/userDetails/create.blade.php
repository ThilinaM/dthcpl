@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.userDetail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.user-details.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.userDetail.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDetail.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nic">{{ trans('cruds.userDetail.fields.nic') }}</label>
                            <input class="form-control" type="text" name="nic" id="nic" value="{{ old('nic', '') }}">
                            @if($errors->has('nic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDetail.fields.nic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="library_card_no">{{ trans('cruds.userDetail.fields.library_card_no') }}</label>
                            <input class="form-control" type="text" name="library_card_no" id="library_card_no" value="{{ old('library_card_no', '') }}">
                            @if($errors->has('library_card_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('library_card_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDetail.fields.library_card_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.userDetail.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', '947') }}">
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDetail.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.userDetail.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.userDetail.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection