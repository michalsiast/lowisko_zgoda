@extends('default.layout')

@section('content')
    <div class="container">
        <h2>Resetowanie hasła</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email">Adres e-mail:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Nowe hasło:</label>
                <input type="password" class="form-control" name="password" required>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Potwierdź nowe hasło:</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Resetuj hasło</button>
        </form>
    </div>
@endsection
