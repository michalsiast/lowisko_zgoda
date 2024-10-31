@extends('default.layout')
@section('content')
    <div class="inner-hero">
        <div class="container">
            <div class="rwo">
                <div class="col-lg-8 m-auto text-cetner">
                    <div class="main-heading">
                        <h1>Logowanie</h1>
                        <div class="page-intro">
                            <a href="/">Strona główna</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p>Logowanie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/shapes/inner-hero-shape1.png') }}" alt="" class="shape1">
        <img src="{{ asset('images/shapes/inner-hero-shape2.png') }}" alt="" class="shape2">
        <img src="{{ asset('images/shapes/inner-hero-shape3.png') }}" alt="" class="shape3">
    </div>
    <div class="container contact-page-sec d-flex flex-column align-items-center justify-content-center sp">

        <form id="loginForm" style="max-width: 600px;" class="form-area" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="single-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-input">
                        <label for="password">Hasło:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="space20"></div>
            <div id="login-errors" style="color: red;"></div>
            <div class="space20"></div>
            <div class="form-group">
                <a href="{{ route('password.request') }}">Nie pamiętam hasła</a>
            </div>
            <div class="space20"></div>
            <button type="submit" class="theme-btn1">Zaloguj się <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></button>
        </form>
    </div>
    @push('scripts.body.bottom')
        <script>
            $(document).ready(function () {
                $('#loginForm').on('submit', function (e) {
                    e.preventDefault(); // Zapobiega standardowemu wysyłaniu formularza i odświeżaniu strony
                    $('#login-errors').html(''); // Czyści błędy z poprzednich prób
                    $.ajax({
                        url: $(this).attr('action'),
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                window.location.href = "/";
                            }
                        },
                        error: function (xhr) {
                            $('#login-errors').html(''); // Czyści poprzednie błędy przed dodaniem nowych
                            if (xhr.status === 422) { // Kod błędu walidacji
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function (key, value) {
                                    $('#login-errors').append('<p>' + value[0] + '</p>');
                                });
                            } else {
                                $('#login-errors').append('<p>Nieprawidłowy email lub hasło.</p>');
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

