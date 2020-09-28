@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- apellido P --}}

                        <div class="form-group row">
                            <label for="apellido_p" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_p" type="text" class="form-control @error('apellido_p') is-invalid @enderror" name="apellido_p" value="{{ old('apellido_p') }}" required autocomplete="apellido_p" autofocus>

                                @error('apellido_p')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- apellido Materno --}}
                        <div class="form-group row">
                            <label for="apellido_m" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_m" type="text" class="form-control @error('apellido_m') is-invalid @enderror" name="apellido_m" value="{{ old('apellido_m') }}" required autocomplete="apellido_m" autofocus>

                                @error('apellido_m')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- Edad --}}
                         <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-2">
                                <input id="edad" type="text" class="form-control @error('edad') is-invalid @enderror" name="edad" value="{{ old('edad') }}" required autocomplete="edad" autofocus>

                                @error('edad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          {{-- Catalogos --}}
                          <div class="form-group row">
                            <label for="estado_civil" class="col-md-4 col-form-label text-md-right">{{ __('Estado Civil') }}</label>

                            <div class="col-md-5">

                                <select id="estado_civil" class="form-control @error('estado_civil') is-invalid @enderror" name="estado_civil">
                                    <option selected>Escoger...</option>
                                     @foreach ($catalogos as $item)
                                      <option value="{{$item->estado_civil}}">{{$item->estado_civil}}</option>
                                     @endforeach
                                  </select>
                                {{-- <input id="nivel_inter" type="text" class="form-control @error('nivel_inter') is-invalid @enderror" name="nivel_inter" value="{{ old('nivel_inter') }}" required autocomplete="nivel_inter" autofocus> --}}
                                @error('estado_civil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Genero --}}

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                            <div class="col-md-5">

                                <select id="genero" class="form-control @error('genero') is-invalid @enderror" name="genero">
                                    <option selected>Escoger...</option>
                                    @foreach ($catalogos as $item)
                                        <option value="{{$item->genero}}">{{$item->genero}}</option>
                                     @endforeach
                                  </select>
                                {{-- <input id="nivel_inter" type="text" class="form-control @error('nivel_inter') is-invalid @enderror" name="nivel_inter" value="{{ old('nivel_inter') }}" required autocomplete="nivel_inter" autofocus> --}}
                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- NIvel Interes --}}
                         <div class="form-group row">
                            <label for="interes_id" class="col-md-4 col-form-label text-md-right">{{ __('Nivel Interes') }}</label>

                            <div class="col-md-5">

                                <select id="interes_id" class="form-control @error('interes_id') is-invalid @enderror" name="interes_id" required autocomplete="interes_id" autofocus>
                                    <option selected>Escoger...</option>
                                    @foreach ($nivel_interes_ as $nivel_intere_ => $id)
                                        <option {{$users->interes_id == $id ? 'selected="selected"' : ''}} value="{{ $id }}">{{$nivel_intere_}}</option>
                                    @endforeach
                                  </select>
                                {{-- <input id="nivel_inter" type="text" class="form-control @error('nivel_inter') is-invalid @enderror" name="nivel_inter" value="{{ old('nivel_inter') }}" required autocomplete="nivel_inter" autofocus> --}}
                                @error('interes_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- tipo de colegiatura --}}
                        <div class="form-group row">
                            <label for="colegiatura_id" class="col-md-4 col-form-label text-md-right">{{ __('Nivel Colegiatura') }}</label>

                            <div class="col-md-5">

                                <select id="colegiatura_id" class="form-control @error('colegiatura_id') is-invalid @enderror" name="colegiatura_id">
                                    {{-- <option selected value="1">Choose...</option> --}}
                                   {{-- @foreach ($nivel_colegiaturas_ as $nivel_colegiatura => $id)
                                     <option {{$users->colegiatura_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}" >{{$nivel_colegiatura}}<option>
                                   @endforeach --}}
                                  </select>
                                {{-- <input id="nivel_inter" type="text" class="form-control @error('nivel_inter') is-invalid @enderror" name="nivel_inter" value="{{ old('nivel_inter') }}" required autocomplete="nivel_inter" autofocus> --}}
                                @error('colegiatura_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


