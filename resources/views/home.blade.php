@extends('layouts.app')



@section('content')
<div class="container">
   
    <h3 class="text-danger"><strong>Aby móc korzystać z serwisu należy włączyć autentykację dwuetapową w profilu użytkownika</strong></h3>
    <a type="button" href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">{{ __('Edycja profilu użytkownika') }}</a>
    
</div>
@endsection