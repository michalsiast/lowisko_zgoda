@extends('admin.layout')

@section('content')
    <div class="container">
        <h1>Zdjęcia dla galerii</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Zdjęcie</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <!-- Kolumna z miniaturką -->
                    <td>
                        <img src="{{ Storage::url($photo->url) }}" alt="Miniaturka" style="width: 200px; height: auto;">
                    </td>

                    <!-- Kolumna z przyciskiem Usuń -->
                    <td>
                        <form action="{{ route('admin.galleryItems.deleteUsers', $photo->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć to zdjęcie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
