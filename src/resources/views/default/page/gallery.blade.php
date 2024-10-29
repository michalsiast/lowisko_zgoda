@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])

    <div class="container">
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
            <p>Proszę <a href="{{ route('login') }}">zalogować się</a>, aby przesłać zdjęcia.</p>
        @endif
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
                    <div class="col-lg-4">
                        <a href="{{ asset('storage/photos/' . $photo->filename) }}">
                            <img style="width: 100%" src="{{ asset('storage/photos/' . $photo->filename) }}" alt="">
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
