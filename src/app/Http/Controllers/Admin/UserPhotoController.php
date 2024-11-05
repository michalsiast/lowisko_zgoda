<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo; // Upewnij się, że masz ten model
use App\Models\User; // Upewnij się, że masz ten model
use Illuminate\Http\Request;

class UserPhotoController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie zdjęcia użytkowników
        $photos = Photo::with('user')->get(); // zakładając, że masz relację 'user' w modelu Photo

        return view('admin.user_photos.index', compact('photos'));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        return redirect()->route('admin.userPhotos.index')->with('success', 'Zdjęcie zostało usunięte.');
    }
}
