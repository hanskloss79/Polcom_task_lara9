@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel użytkownika') }}
                    <a type="button" href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">{{ __('Edycja profilu użytkownika') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4>{{ __('Witaj ') . Auth::user()->name . ' !!!  ' }}</h4>

                    <h6>{{ __('Uwierzytelnianie dwuetapowe ')}} {{ Auth::user()->two_factor_secret=="" ? 'wyłączone' : 'włączone' }}</h6>


                    <form action="{{ route('home') }}" method="get">
                        <label for="perPage">Ilość postów wyświetlanych na stronę:</label>
                        <select class="mx-2" name="perPage" onchange="this.form.submit()">
                            <option value="10" {{ $posts->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $posts->perPage() == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $posts->perPage() == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </form>


                    <table class="table table-bordered">

                        <tr>
                            <th>Nr postu</th>
                            <th>Tytuł</th>
                            <th>Data i godzina utworzenia</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $posts->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection