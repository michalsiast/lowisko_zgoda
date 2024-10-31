@component('mail::message')
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 150px; height: auto;">

    # Witaj!

    Otrzymałeś tę wiadomość, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.

    @component('mail::button', ['url' => $actionUrl])
        Zresetuj Hasło
    @endcomponent

    Ten link do resetowania hasła wygasa za 60 minut.

    Jeśli nie żądałeś zresetowania hasła, nie musisz podejmować żadnych działań.

    Pozdrawiamy,
    Łowisko ZGODA
@endcomponent
