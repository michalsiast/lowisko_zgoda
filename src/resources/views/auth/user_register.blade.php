@extends('default.layout')
@section('content')
    <div class="inner-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="main-heading">
                        <h1>Rejestracja użytkownika</h1>
                        <div class="page-intro">
                            <a href="/">Strona główna</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p>Rejestracja użytkownika</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container contact-page-sec d-flex flex-column align-items-center justify-content-center sp">
        <form id="registrationForm" style="max-width: 700px;" class="form-area" method="POST" action="{{ route('user.register') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="single-input">
                        <label for="name">Nazwa:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        <div id="nameError" class="text-danger"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        <div id="emailError" class="text-danger"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-input">
                        <label for="password">Hasło:</label>
                        <input type="password" id="password" name="password" required>
                        <div id="passwordError" class="text-danger"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-input">
                        <label for="password_confirmation">Potwierdź hasło:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
            </div>
            <div class="space20"></div>
            <button type="submit" class="theme-btn1">Zarejestruj się <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></button>
            <div class="space20"></div>
            <div id="successMessage" class="font-weight-bold font-20 text-center text-success mt-3"></div>
        </form>
    </div>

    @push('scripts.body.bottom')
        <script>
            $(document).ready(function() {
                $('#registrationForm').on('submit', function(e) {
                    e.preventDefault(); // Zatrzymuje standardowe wysyłanie formularza

                    // Czyści poprzednie błędy i wiadomości
                    $('#nameError').text('');
                    $('#emailError').text('');
                    $('#passwordError').text('');
                    $('#successMessage').text('');

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#successMessage').text('Kod weryfikacyjny został wysłany na adres e-mail. Przekierowanie...');

                            setTimeout(function() {
                                window.location.href = "{{ route('user.verify.form') }}";
                            }, 2000);
                            localStorage.setItem('registeredEmail', $('#email').val());
                            window.location.href = "{{ route('user.verify.form') }}";
                            $('#registrationForm')[0].reset();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) { // Kod błędu walidacji
                                var errors = xhr.responseJSON.errors;
                                if (errors.name) {
                                    $('#nameError').text(errors.name[0]);
                                }
                                if (errors.email) {
                                    $('#emailError').text(errors.email[0]);
                                }
                                if (errors.password) {
                                    $('#passwordError').text(errors.password[0]);
                                }
                            } else {
                                $('#successMessage').text('Wystąpił nieoczekiwany błąd. Spróbuj ponownie.');
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
