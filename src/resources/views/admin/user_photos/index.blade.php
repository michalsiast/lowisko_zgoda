@extends('admin.layout')

@section('content')
    <div class="container">
        <h1>Zdjęcia Użytkowników</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Email</th>
                <th>Zdjęcie</th>
                <th>Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                @php
                    $user = $photo->user; // zakładając, że masz relację 'user' w modelu Photo
                @endphp
                <tr>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset('storage/photos/' . $photo->filename) }}" alt="Zdjęcie" width="100"></td>
                    <td>
                        <form action="{{ route('admin.userPhotos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć to zdjęcie?');">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
