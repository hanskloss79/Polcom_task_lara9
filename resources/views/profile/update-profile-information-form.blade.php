<div class="card mb-4">
    <div class="card-header">
        {{ __('Informacje o profilu') }}
    </div>
    <div class="card-body">
        <p>
            {{ __('Aktualizacja danych konta użytkownika') }}
        </p>
        <div class="mt-3">
            <form action="{{ route('user-profile-information.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwa konta') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') ?? auth()->user()->name }}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('name') ?? auth()->user()->email }}" required
                            autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Zaktualizuj profil') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
