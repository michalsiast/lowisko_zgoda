@extends('default.layout')

@section('content')
    <div class="inner-hero">
        <div class="container">
            <div class="rwo">
                <div class="col-lg-8 m-auto text-cetner">
                    <div class="main-heading">
                        <h1>Resetowanie hasła</h1>
                        <div class="page-intro">
                            <a href="/">Strona główna</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p>Resetowanie hasła</p>
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
        <h2>Resetowanie hasła</h2>
        <form method="POST" style="max-width: 600px; padding-top: 30px" class="form-area" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-input">
                    <label for="email">Adres e-mail:</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-input">
                    <label for="password">Nowe hasło:</label>
                    <input type="password"  name="password" required>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-input">
                    <label for="password_confirmation">Potwierdź nowe hasło:</label>
                    <input type="password"  name="password_confirmation" required>
                    </div>
                    </div>
            </div>
            <div class="space20"></div>
            <button type="submit" class="theme-btn1">Resetuj hasło <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></button>
        </form>
    </div>
@endsection
