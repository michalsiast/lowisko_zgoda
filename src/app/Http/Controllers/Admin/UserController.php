<?php


namespace App\Http\Controllers\Admin;


use App\Forms\Admin\UserForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivated;
use App\Models\Video;
class UserController extends Controller
{
    public function index() {
        $users = User::where('role', 'user')->get();
        return view('admin.user.index', compact('users'));
    }
    public function show() {
        $form = new UserForm(Auth::user());
        $form->fields['password']['value'] = '';
        $form->fields['password_repeat']['value'] = '';

        return view('admin.user.edit', compact( 'form'));
    }

    public function edit(UserRequest $request) {
        $post = $request->post('users');

        $user = Auth::user();
        $user->name = $post['name'];
        $user->email = $post['email'];
        $user->lang = $post['lang'];
        $user->theme = $post['theme'];

        if($post['password']) {
            $post['password'] = Hash::make($post['password']);

            $user->password = $post['password'];
        }

        $user->save();

        return redirect()->route('admin.user.show');
    }
    public function destroy($id) {
        User::destroy($id); // Usuwa użytkownika o podanym ID
        return redirect()->route('admin.users.index')->with('status', 'Użytkownik został usunięty.');
    }

    public function block($id) {
        $user = User::findOrFail($id);
        $user->is_blocked = true; // Ustawia użytkownika jako zablokowanego
        $user->save();
        return redirect()->route('admin.users.index')->with('status', 'Użytkownik został zablokowany.');
    }

    public function unblock($id) {
        $user = User::findOrFail($id);
        $user->is_blocked = false; // Ustawia użytkownika jako odblokowanego
        $user->save();
        return redirect()->route('admin.users.index')->with('status', 'Użytkownik został odblokowany.');
    }


    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();

        // Wysyłka e-maila z powiadomieniem o aktywacji konta
        Mail::to($user->email)->send(new AccountActivated($user));

        return redirect()->back()->with('status', 'Konto aktywowane. Użytkownik został powiadomiony.');
    }
    public function uploadPhotos(Request $request)
    {
        $request->validate([
            'photos' => 'required|array|max:10', // Maksymalnie 10 plików
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Każdy plik max 2MB
        ]);

        $userId = Auth::id(); // Pobierz ID aktualnie zalogowanego użytkownika

        foreach ($request->file('photos') as $photo) {
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/photos', $filename);

            // Zapisz zdjęcie w bazie danych z user_id
            Photo::create([
                'filename' => $filename,
                'user_id' => $userId, // Bezpośrednio przypisz user_id
            ]);
        }

        return redirect()->back()->with('status', 'Zdjęcia zostały przesłane pomyślnie.');
    }
    public function uploadVideos(Request $request)
    {
        $request->validate([
            'video_urls' => 'required|string', // Walidacja, że musi być ciąg
        ]);

        // Rozdziel linki na tablicę
        $urls = explode(',', $request->video_urls);

        // Sprawdź, czy liczba linków nie przekracza 5
        if (count($urls) > 5) {
            return redirect()->back()->withErrors(['video_urls' => 'Możesz dodać maksymalnie 5 filmów.'])->withInput();
        }

        $userId = Auth::id(); // Pobierz ID aktualnie zalogowanego użytkownika

        foreach ($urls as $url) {
            // Walidacja każdego linku
            $url = trim($url); // Usuń białe znaki
            if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
                return redirect()->back()->withErrors(['video_urls' => 'Nieprawidłowy link do filmu: ' . $url])->withInput();
            }

            // Stwórz nowe wideo w bazie danych
            Video::create([
                'url' => $url,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back()->with('status', 'Filmy zostały dodane pomyślnie.');
    }

}
