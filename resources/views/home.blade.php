@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('My Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    <center>

                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header"> {{ __('Urra has iniciado Sesión!') }}</div>
                        <div class="card-body">
                          <h5 class="card-title">{{ Auth::user()->name }}</h5>
                          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        </div>
                      </div>
                    </center>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
