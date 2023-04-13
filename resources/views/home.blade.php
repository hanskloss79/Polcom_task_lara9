@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Panel użytkownika') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>{{ __('Witaj ') . Auth::user()->name . ' !!!' }}</h3>
                        <h4>{{ __('Uwierzytelnianie dwuetapowe ')}} {{ Auth::user()->two_factor_secret=="" ? 'wyłączone' : 'włączone' }}</h4>
                        <a href="{{ route('profile.edit') }}"
                            class="btn btn-link">{{ __('Edycja profilu użytkownika') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
