@extends('default.layout')
@section('content')
    <div class="container">
        <h2>Logowanie użytkownika</h2>

        <div id="login-errors" style="color: red;"></div>

        <form id="loginForm" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
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

