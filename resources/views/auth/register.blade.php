@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="form-register">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Cognome') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" lastname="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birth_date" class="col-md-4 col-form-label text-md-end">{{ __('Anno di nascita') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                        class="form-control @error('birth_date') is-invalid @enderror" birth_date="birth_date"
                                        value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>

                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Indirizzo Email*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Conferma Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"

                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                </div>

                                <p id="error-password"></p>


                            <div class="row mt-4">
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" id="button-register">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-end fs-6 d-flex align-items-center ps-5">
                                    <span>I campi con l'asterisco* sono obbligatori</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const formRegistered = document.getElementById("form-register");
        console.log(formRegistered);
        const button = document.getElementById("button-register");
        console.log(button);

        button.addEventListener("click", function(e) {
            e.preventDefault();
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password-confirm").value;
            const errorPassword = document.getElementById("error-password");

            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;

            if (name === "" || email === "") {
                errorPassword.textContent = "Tutti i campi sono obbligatori"
            } else if (password !== confirmPassword) {
                errorPassword.textContent = "La password non coincide";
            } else {
                formRegistered.submit();
            }

        });
    </script>
@endsection
