@extends('admin.layout')
@section('content')
    <h1>Filmy użytkowników</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Film</th>
            <th>Email Użytkownika</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>
                    @if (strpos($video->url, 'youtube.com') !== false || strpos($video->url, 'youtu.be') !== false)
                        @php
                            if (preg_match('/(youtu\.be\/|youtube\.com\/(watch\?v=|embed\/|v\/|.+\?v=))([^&?\/]+)/', $video->url, $matches)) {
                                $videoId = $matches[3];
                            } else {
                                $videoId = null;
                            }
                        @endphp

                        @if ($videoId)
                            <iframe width="400" height="250" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <p>Nieprawidłowy link do filmu</p>
                        @endif
                    @else
                        <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                    @endif
                </td>
                <td>
                    {{ $video->user->email }}
                </td>
                <td>
                    <form action="{{ route('admin.user-videos.destroy', $video->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
