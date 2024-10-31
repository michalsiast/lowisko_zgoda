@extends('default.layout')

@section('content')
    <div class="container">
        <h2>Resetowanie hasła</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Adres e-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Wyślij link do resetowania hasła</button>
        </form>
    </div>
@endsection
