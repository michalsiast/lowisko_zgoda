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
                    <form action="{{ route('gallery.items.store', $gallery->id) }}" method="POST" enctype="multipart/form-data" id="galleryForm">
                        @csrf
                        <div class="form-group">
                            <label for="photos">Wybierz zdjęcia (maksymalnie 10):</label>
                            <input type="file" id="photos" name="files[]" class="form-control" multiple>
                            @error('files.*')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj zdjęcia</button>
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
                @foreach($page->gallery->items->reverse() as $item)
                    <div class="col-lg-4" style="margin-top: 15px">
                        <a href="{{renderImage($item->url, 1920, 1080, 'resize')}}">
                            <img style="width: 100%;" src="{{renderImage($item->url, 600, 600, 'fit')}}" alt="">
                        </a>
                    </div>
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
