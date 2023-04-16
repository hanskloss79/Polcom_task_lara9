@extends('layouts.app')



@section('content')
    <div class="container">
        @if(Auth::user()->two_factor_secret=="")
            <h3 class="text-danger"><strong>Aby móc korzystać z serwisu należy włączyć autentykację dwuetapową w profilu użytkownika</strong></h3>
            <a type="button" href="{{ route('profile.edit') }}" 
            class="btn btn-warning btn-sm">{{ __('Edycja profilu użytkownika') }}</a>
        @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Panel użytkownika') }}
                        <a type="button" href="{{ route('profile.edit') }}"
                        class="btn btn-warning btn-sm">{{ __('Edycja profilu użytkownika') }}</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>{{ __('Witaj ') . Auth::user()->name . ' !!!  ' }}</h4>
                        
                        <h6>{{ __('Uwierzytelnianie dwuetapowe ')}} {{ Auth::user()->two_factor_secret=="" ? 'wyłączone' : 'włączone' }}</h6>
                        
                            <?php
                            //$posts = DB::table('posts')
                            //->select('id','title', 'created_at')->where('user_id', Auth::user()->id)
                            //->paginate(10); 
                            session_start();
                            
                            if(!array_key_exists('perPage', $_SESSION))
                            {
                                // domyślnie 10 elementów na stronie
                                $_SESSION['perPage'] = 10;
                            }
                            if (array_key_exists('perPage', $_REQUEST) && $_SESSION['perPage'] != $_REQUEST['perPage'])
                            {
                                $_SESSION['perPage'] = $_REQUEST['perPage']; 
                            }
                            $perPage = $_SESSION['perPage'];
                    
                            $posts = App\Models\Post::where('user_id', Auth::user()->id)->paginate($perPage);
                            // dd($posts);
                            ?>

                            <form action="{{ route('home') }}" method="get">
                                <label for="perPage">Ilość postów wyświetlanych na stronę:</label>
                                <select class="mx-3 my-2"  name="perPage" onchange="this.form.submit()">
                                <option value="10" {{ $posts->perPage() == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $posts->perPage() == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ $posts->perPage() == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $posts->perPage() == 100 ? 'selected' : '' }}>100</option>
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
        @endif
    </div>
@endsection
