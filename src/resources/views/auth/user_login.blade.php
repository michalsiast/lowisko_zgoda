@extends('default.layout')
@section('content')
    <div class="container">
        <h2>Logowanie użytkownika</h2>
        <form method="POST" action="{{ route('user.login') }}">
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
@endsection
