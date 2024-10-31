<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linie językowe walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe zawierają domyślne komunikaty o błędach używane przez
    | klasę walidatora. Niektóre z tych reguł mają wiele wersji, takie jak
    | reguły dotyczące rozmiaru. Możesz dowolnie modyfikować każdy z tych komunikatów.
    |
    */

    'accepted' => 'Pole :attribute musi być zaakceptowane.',
    'active_url' => 'Pole :attribute nie jest prawidłowym adresem URL.',
    'after' => 'Pole :attribute musi być datą po :date.',
    'after_or_equal' => 'Pole :attribute musi być datą po lub równą :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'before' => 'Pole :attribute musi być datą przed :date.',
    'before_or_equal' => 'Pole :attribute musi być datą przed lub równą :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi być między :min a :max.',
        'file' => 'Pole :attribute musi mieć między :min a :max kilobajtów.',
        'string' => 'Pole :attribute musi mieć między :min a :max znaków.',
        'array' => 'Pole :attribute musi mieć od :min do :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi być prawdziwe lub fałszywe.',
    'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
    'date' => 'Pole :attribute nie jest prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute nie pasuje do formatu :format.',
    'different' => 'Pole :attribute i :other muszą się różnić.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć między :min a :max cyfr.',
    'dimensions' => 'Pole :attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma duplikat.',
    'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z następujących: :values.',
    'exists' => 'Wybrane :attribute jest nieprawidłowe.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'file' => 'Pole :attribute musi być większe niż :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć więcej niż :value znaków.',
        'array' => 'Pole :attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'file' => 'Pole :attribute musi być większe lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć więcej lub równo :value znaków.',
        'array' => 'Pole :attribute musi mieć :value elementów lub więcej.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrane :attribute jest nieprawidłowe.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być prawidłowym adresem IP.',
    'ipv4' => 'Pole :attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być prawidłowym adresem IPv6.',
    'json' => 'Pole :attribute musi być prawidłowym ciągiem JSON.',
    'lt' => [
        'numeric' => 'Pole :attribute musi być mniejsze niż :value.',
        'file' => 'Pole :attribute musi być mniejsze niż :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć mniej niż :value znaków.',
        'array' => 'Pole :attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi mieć mniej lub równo :value znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file' => 'Pole :attribute nie może być większe niż :max kilobajtów.',
        'string' => 'Pole :attribute nie może być większe niż :max znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi mieć co najmniej :min.',
        'file' => 'Pole :attribute musi mieć co najmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć co najmniej :min elementów.',
    ],
    'not_in' => 'Wybrane :attribute jest nieprawidłowe.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'password' => 'Hasło jest nieprawidłowe.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other jest :value.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values jest nieobecne.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z :values nie jest obecne.',
    'same' => 'Pole :attribute i :other muszą się zgadzać.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file' => 'Pole :attribute musi mieć :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się od jednego z następujących: :values.',
    'string' => 'Pole :attribute musi być ciągiem.',
    'timezone' => 'Pole :attribute musi być prawidłową strefą.',
    'unique' => 'Pole :attribute zostało już zajęte.',
    'uploaded' => 'Nie udało się przesłać :attribute.',
    'url' => 'Format :attribute jest nieprawidłowy.',
    'uuid' => 'Pole :attribute musi być prawidłowym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe komunikaty walidacji
    |--------------------------------------------------------------------------
    |
    | Tutaj możesz określić niestandardowe komunikaty walidacji dla atrybutów
    | używając konwencji "attribute.rule", aby nazwać linie. To pozwala
    | szybko określić konkretną niestandardową linię językową dla danej reguły atrybutu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe atrybuty walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe są używane do zamiany miejsca na atrybuty
    | na coś bardziej przyjaznego czytelnikowi, na przykład "Adres e-mail"
    | zamiast "email". To po prostu pomaga nam uczynić nasze wiadomości bardziej
    | ekspresyjnymi.
    |
    */

    'attributes' => [],

];
