@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-8 col-md-6 col-xs-12">
      <center><h3>Nuevo Usuario</h3></center>
      <br>


      {!!Form::open(array('url'=>'users','method'=>'POST', 'autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}
        @csrf
        <div class="content-body">

          <div class="row">


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label for="email">{{ __('Correo') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror

                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="rol">{{ __('Rol') }}</label>
                        <input id="rol" type="text" class="form-control @error('name') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol" autofocus>

                          @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>

                  {!!Form::close()!!}
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </div>
          </div>

@endsection
