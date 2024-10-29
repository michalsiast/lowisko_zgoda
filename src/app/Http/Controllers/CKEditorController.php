<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // Pobieramy plik z żądania
            $file = $request->file('upload');

            // Tworzymy unikalną nazwę dla pliku
            $filename = time() . '_' . $file->getClientOriginalName();

            // Zapisujemy plik w folderze storage/app/public/cke_image
            $path = $file->storeAs('public/cke_image', $filename);

            // Zwracamy publiczny URL do zapisanego pliku
            return response()->json(['url' => Storage::url($path)]);
        }

        // Obsługa błędu, gdy plik nie zostanie przesłany
        return response()->json(['error' => ['message' => 'No file uploaded']], 400);
    }
}
