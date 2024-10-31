@component('mail::message')
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px; height: auto;">

    # Witaj, {{ $user->name }}!

    Twoje konto zostało pomyślnie aktywowane! Możesz teraz zalogować się do systemu.

    @component('mail::button', ['url' => route('user.login')])
        Zaloguj się
    @endcomponent

    Cieszymy się, że dołączyłeś do naszej społeczności!

    Pozdrawiamy,<br>
    Łowisko ZGODA
@endcomponent
