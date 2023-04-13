<div class="card mb-4">
    <div class="card-header">
        {{ __('Zmiana hasła') }}
    </div>
    <div class="card-body">
        <p>
            {{ __('Upewnij się, że Twoje konto używa długiego, losowego hasła, aby zachować bezpieczeństwo.') }}
        </p>
        <div class="mt-3">
            <form action="{{ route('user-password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="current_password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Bieżące hasło') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                            required autocomplete="current-password" placeholder="{{ __('Bieżące hasło') }}">

                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nowe hasło') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="{{ __('Nowe hasło') }}">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="confirm_password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Wpisz ponownie nowe hasło') }}</label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="{{ __('Powtórz nowe hasło') }}">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Zapisz zmiany') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
