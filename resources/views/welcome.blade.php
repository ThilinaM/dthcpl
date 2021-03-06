<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Center Public library Hettipola</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">

            <div class="">
                <div class="text-center">
                  <div><img src="img/logo.png" style="width: 100px;" alt=""></div>
<div><label for="" class="text-value-lg"><b>Stay Safe! Trace & Beat COVID-19</b></label></div>
<div>Please provide your contact information to protect your family and community from the Covid pandemic. </div>
<div>ඔබේ පවුලේ අය සහ ප්‍රජාව කෝවිඩ් වසංගතයෙන් ආරක්ෂා කර ගැනීමට කරුණාකර ඔබේ සම්බන්ධතා තොරතුරු සපයන්න.</div>
<div>உங்கள் குடும்பத்தையும் சமூகத்தையும் கோவிட் பாண்டமிக் நோயிலிருந்து பாதுகாக்க உங்கள் தொடர்பு தகவலை வழங்கவும்</div>

     
                </div>
                <div class="card-body">
                        <form method="POST" action="file" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="required" for="name">{{ trans('cruds.userDetail.fields.name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.userDetail.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nic">{{ trans('cruds.userDetail.fields.nic') }}</label>
                                <input class="form-control {{ $errors->has('nic') ? 'is-invalid' : '' }}" type="text" name="nic" id="nic" value="{{ old('nic', '') }}">
                                @if($errors->has('nic'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nic') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.userDetail.fields.nic_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="library_card_no">{{ trans('cruds.userDetail.fields.library_card_no') }}</label>
                                <input class="form-control {{ $errors->has('library_card_no') ? 'is-invalid' : '' }}" type="text" name="library_card_no" id="library_card_no" value="{{ old('library_card_no', '') }}">
                                @if($errors->has('library_card_no'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('library_card_no') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.userDetail.fields.library_card_no_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="mobile">{{ trans('cruds.userDetail.fields.mobile') }}</label>
                                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '947') }}">
                                @if($errors->has('mobile'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.userDetail.fields.mobile_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="address">{{ trans('cruds.userDetail.fields.address') }}</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
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
            </div>
        </div>
    </body>
    <footer>
        <div class="text-center" style=" position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;">Design and develop by <a href="https://thilinadharmasena.com/">Thilina Dharmasena </a></div> 
    </footer>
</html>
