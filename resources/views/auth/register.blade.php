@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Log Masuk') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nokp" class="col-md-4 col-form-label text-md-right">{{ __('No. Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="nokp" type="text" maxlength="12" class="form-control @error('nokp') is-invalid @enderror" name="nokp" value="{{ old('nokp') }}" required autocomplete="nokp" autofocus>

                                @error('nokp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Emel') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NoTel" class="col-md-4 col-form-label text-md-right">{{ __('No. Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="NoTel" type="text" class="form-control @error('NoTel') is-invalid @enderror" name="NoTel" value="{{ old('NoTel') }}" required autocomplete="NoTel" placeholder="+601234567890">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row captcha">
                            <span class="col-md-4 text-md-right">{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                            </button>
                       <div class="col-md-5">
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" value="{{ old('captcha') }}" required autocomplete="captcha" placeholder="Sila isi Captcha">
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#reload').click(function()
    {
        $.ajax(
            {
            type: 'GET',
            url: 'reload-captcha',
            success: function (data)
            {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>

</html>
@endsection
