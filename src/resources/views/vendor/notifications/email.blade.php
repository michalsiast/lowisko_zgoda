@component('mail::message')
    # Witaj!

    Otrzymałeś tę wiadomość, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.

    @component('mail::button', ['url' => $actionUrl])
        Zresetuj Hasło
    @endcomponent

    Ten link do resetowania hasła wygasa za 60 minut.

    Jeśli nie żądałeś zresetowania hasła, nie musisz podejmować żadnych działań.

    Pozdrawiamy,<br>
    {{ config('app.name') }}
@endcomponent
