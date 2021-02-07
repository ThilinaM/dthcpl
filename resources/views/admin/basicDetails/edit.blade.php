@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.basicDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.basic-details.update", [$basicDetail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="logo">{{ trans('cruds.basicDetail.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.basicDetail.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.basicDetail.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $basicDetail->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.basicDetail.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.basicDetail.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $basicDetail->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.basicDetail.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('sms_serviceon') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="sms_serviceon" value="0">
                    <input class="form-check-input" type="checkbox" name="sms_serviceon" id="sms_serviceon" value="1" {{ $basicDetail->sms_serviceon || old('sms_serviceon', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sms_serviceon">{{ trans('cruds.basicDetail.fields.sms_serviceon') }}</label>
                </div>
                @if($errors->has('sms_serviceon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_serviceon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.basicDetail.fields.sms_serviceon_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.basic-details.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($basicDetail) && $basicDetail->logo)
      var file = {!! json_encode($basicDetail->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection