@extends('default.layout')

@section('content')
    <div class="container contact-page-sec d-flex flex-column align-items-center justify-content-center sp">
        <h2 class="mb-4">Weryfikacja konta</h2>
        <form id="verifyForm" style="max-width: 500px;" class="form-area" method="POST" action="{{ route('user.verify') }}">
            @csrf
            <input type="hidden" id="email" name="email">
            <div class="single-input">
                <label for="code">Kod weryfikacyjny:</label>
                <input type="text" id="code" name="code" required>
                <div id="codeError" class="text-danger"></div>
            </div>
            <p class="mt-3">
                Nie otrzymałeś kodu?
                <a href="#" id="resendCodeLink">Wyślij jeszcze raz</a>
            </p>
            <p id="resendMessage" class="mt-2 font-weight-bold"></p>
            <div class="space20"></div>
            <button type="submit" class="theme-btn1">Zweryfikuj konto <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></button>
            <div class="space20"></div>
            <div id="verifyMessage" class="font-weight-bold font-20 text-center mt-3"></div>
        </form>
    </div>

    @push('scripts.body.bottom')
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                const email = localStorage.getItem('registeredEmail');
                if (email) {
                document.getElementById('email').value = email;
            }

                document.getElementById('resendCodeLink').addEventListener('click', function(e) {
                e.preventDefault();

                fetch("{{ route('user.resend.code') }}", {
                method: "POST",
                headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
                body: JSON.stringify({ email: email })
            })
                .then(response => response.json())
                .then(data => {
                const message = document.getElementById('resendMessage');
                if (data.success) {
                message.textContent = data.success;
                message.classList.remove('text-danger');
                message.classList.add('text-success');
            } else {
                message.textContent = data.error || 'Wystąpił błąd.';
                message.classList.remove('text-success');
                message.classList.add('text-danger');
            }
            });
            });
            });

        document.addEventListener('DOMContentLoaded', function () {
                const email = localStorage.getItem('registeredEmail');
                if (email) {
                document.getElementById('email').value = email;
            }
            });

        $(document).ready(function() {
                $('#verifyForm').on('submit', function(e) {
                    e.preventDefault();

                    $('#emailError').text('');
                    $('#codeError').text('');
                    $('#verifyMessage').text('');

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#verifyMessage').text(response.success).addClass('text-success').removeClass('text-danger');
                            $('#verifyForm')[0].reset();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors || {};
                                if (errors.email) {
                                    $('#emailError').text(errors.email[0]);
                                }
                                if (errors.code) {
                                    $('#codeError').text(errors.code[0]);
                                } else if (xhr.responseJSON.error) {
                                    $('#verifyMessage').text(xhr.responseJSON.error).addClass('text-danger').removeClass('text-success');
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
