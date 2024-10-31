@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])

    <div class="container sp">
        <div class="row">
            <div class="col-6">
                <p>Do Państwa dyspozycji oddajemy Strefę użytkowników na Naszej stronie. W łatwy i szybki sposób można dodać filmy z YouTube o Naszym Gospodarstwie (Łowisko ZGODA).
                    Po zarejestrowaniu się każdy użytkownik otrzymuje profesjonalny panel do zarządzania filmami. Życzymy przyjemnego użytkowania.</p>
            </div>
            <div class="col-6">
                @if(Auth::check())
                    <form method="POST" action="{{ route('user.uploadVideos') }}">
                        @csrf
                        <div class="form-group">
                            <label for="video_urls">Wklej linki do filmów z YouTube (maksymalnie 5, oddzielone przecinkami):</label>
                            <textarea id="video_urls" name="video_urls" class="form-control" rows="5" required></textarea>
                            @error('video_urls')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Prześlij filmy</button>
                    </form>
                @else
                    <p>Aby przesłać filmy, prosimy się <a href="{{ route('user.login') }}">zalogować</a>.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <div class="row">
                @foreach(App\Models\Video::all() as $video)
                    @php
                        $user = App\Models\User::find($video->user_id);
                    @endphp

                    @if($user && $user->is_active && !$user->is_blocked)
                        <div class="col-lg-4">
                            <iframe width="100%" height="250" src="https://www.youtube.com/embed/{{ basename($video->url) }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts.body.bottom')
        <script>
            var lightbox = $('.gallery a').simpleLightbox({});
        </script>
    @endpush
@endsection
