<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserVideoController extends Controller
{
    public function index()
    {
        // Pobieranie filmów użytkowników, którzy są aktywni i nie są zablokowani
        $videos = Video::whereHas('user', function ($query) {
            $query->where('is_active', true)->where('is_blocked', false);
        })->with('user')->get(); // Ładowanie użytkowników

        return view('admin.user-videos.index', compact('videos'));
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete(); // Usuwanie filmu z bazy danych

        return redirect()->back()->with('success', 'Film został usunięty.');
    }
}
