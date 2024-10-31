@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])

    <div class="container sp">
        <div class="row">
            <div class="col-6">
                <p>Do Państwa dyspozycji oddajemy Strefe użytkowników na Naszej stronie, w łatwy i szybki sposób można dodać zdjęcia lub opinie o Naszym Gospodarstwie (Łowisko ZGODA).
                    Po zarejestrowaniu się każdy użytkownik otrzymuje profesjonalny panel do zarządzania zdjęciami. Życzymy przyjemnego użytkowania.</p>
            </div>
            <div class="col-6">
                @if(Auth::check())
                    <form method="POST" action="{{ route('user.uploadPhotos') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="photos">Wybierz zdjęcia (maksymalnie 10):</label>
                            <input type="file" id="photos" name="photos[]" class="form-control" multiple>
                            @error('photos')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('photos.*')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Prześlij zdjęcia</button>
                    </form>
                @else
                    <p>Aby przesłać zdjęcia, prosimy się <a href="{{ route('user.login') }}">zalogować</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class="gallery">
        <div class="container">
            <div class="row">
                @foreach($page->gallery->items as $item)
                    <div class="col-lg-4">
                        <a href="{{renderImage($item->url, 1920, 1080, 'resize')}}">
                            <img style="width: 100%" src="{{renderImage($item->url, 600, 600, 'fit')}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="gallery">
        <div class="container">
            <div class="row">
                @foreach(App\Models\Photo::all() as $photo)
                    @php
                        $user = App\Models\User::find($photo->user_id);
                    @endphp

                    @if($user && $user->is_active && !$user->is_blocked)
                        <div class="col-lg-4">
                            <a href="{{ asset('storage/photos/' . $photo->filename) }}">
                                <img style="aspect-ratio: 1/1;object-fit: cover" src="{{ asset('storage/photos/' . $photo->filename) }}" alt="Zdjęcie użytkownika" class="m-2">
                            </a>
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
