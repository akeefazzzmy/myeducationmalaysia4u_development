@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Log Masuk Pengguna') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('new-login:process')}}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                         @if(session('success'))
                         <div class="alert alert-success" role="alert">
                             {{ session('success') }}
                         </div>
                         @endif

                         <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Log Masuk Sebagai') }}</label>
                            <div class="col-md-6">
                                <select name="tahapCapaian" class="form-control" autofocus>
                                    <option selected disabled></option>
                                    @foreach($tahapCapaian as $capaian)
                                    <option value="{{$capaian->id}}">{{$capaian->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                            <div class="col-md-6">
                                {{-- <input id="username" type="text" maxlength="12" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus> --}}
                                <input id="username" type="text" maxlength="12" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Katalaluan') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Log Masuk') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('reset') }}">
                                        {{ __('Lupa Katalaluan?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
