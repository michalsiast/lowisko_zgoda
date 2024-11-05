@extends('admin.layout')
@section('content')
    <h1>Filmy użytkowników</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Link do filmu</th>
                <th>Email Użytkownika</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>
                    <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                </td>
                <td>
                    {{ $video->user->email }} <!-- Wyświetlanie e-maila użytkownika -->
                </td>
                <td>
                    <form action="{{ route('admin.user-videos.destroy', $video->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
