    <div class="card mb-3">
        <div class="card-header">
            {{ __('Uwierzytelnianie dwuetapowe') }}
        </div>
        <div class="card-body">
            <div class="mt-3">
                    @if (auth()->user()->two_factor_secret)
                        <h4 class="text-success">
                        {{ __('Uwierzytelnianie dwuetapowe zostało włączone. Masz dostęp do danych :)') }}
                        </h4>
                    @else
                        <h4 class="text-danger">
                        {{ __('Włącz uwierzytelnianie dwuetapowe aby otrzymać dostęp do danych!!!') }}
                        </h4>
                    @endif
                

                <p class="mt-2">
                    {{ __('Gdy włączone jest uwierzytelnianie dwupoziomowe, 
                    podczas uwierzytelniania zostaniesz poproszony o podanie bezpiecznego, 
                    losowego tokena. Możesz pobrać ten token z aplikacji Google Authenticator 
                    w telefonie.') }}
                </p>

                @if (!auth()->user()->two_factor_secret)
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            {{ __('Włącz uwierzytelnianie dwuetapowe') }}
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Wyłącz uwierzytelnianie dwuetapowe') }}
                        </button>
                    </form>
                    @if (session('status') == 'two-factor-authentication-enabled')

                        <div class="mt-2">
                            {{ __('Uwierzytelnianie dwuetapowe jest teraz włączone. Zeskanuj 
                            poniższy kod QR za pomocą aplikacji uwierzytelniającej w telefonie.') }}
                        </div>

                        <div class="my-2">
                            {!! auth()
                            ->user()
                            ->twoFactorQrCodeSvg() !!}
                        </div>
                    @endif
                    <div class="mt-2">
                        {{ __('Przechowuj te kody odzyskiwania dostępu w bezpiecznym menedżerze haseł. Można ich użyć do odzyskania dostępu do konta w przypadku utraty urządzenia do uwierzytelniania dwuetapowego.') }}
                    </div>
                    <div class="mt-2 p-3 bg-gray">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                        <pre>{{ $code }}</pre>
                @endforeach
            </div>
            <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    {{ __('Ponownie wygeneruj kody odzyskiwania dostępu do konta!!!') }}
                </button>
            </form>
            @endif
        </div>
    </div>
    </div>
