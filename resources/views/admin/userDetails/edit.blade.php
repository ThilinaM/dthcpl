@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-details.update", [$userDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.userDetail.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $userDetail->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nic">{{ trans('cruds.userDetail.fields.nic') }}</label>
                <input class="form-control {{ $errors->has('nic') ? 'is-invalid' : '' }}" type="text" name="nic" id="nic" value="{{ old('nic', $userDetail->nic) }}">
                @if($errors->has('nic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.nic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="library_card_no">{{ trans('cruds.userDetail.fields.library_card_no') }}</label>
                <input class="form-control {{ $errors->has('library_card_no') ? 'is-invalid' : '' }}" type="text" name="library_card_no" id="library_card_no" value="{{ old('library_card_no', $userDetail->library_card_no) }}">
                @if($errors->has('library_card_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('library_card_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.library_card_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.userDetail.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $userDetail->mobile) }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.userDetail.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $userDetail->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('sms_send') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="sms_send" value="0">
                    <input class="form-check-input" type="checkbox" name="sms_send" id="sms_send" value="1" {{ $userDetail->sms_send || old('sms_send', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sms_send">{{ trans('cruds.userDetail.fields.sms_send') }}</label>
                </div>
                @if($errors->has('sms_send'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_send') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userDetail.fields.sms_send_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection