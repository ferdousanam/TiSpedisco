<?php

namespace App\Http\Controllers\FrontEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }
    public function home()
    {
        return redirect()->route('user.dashboard');
    }
    public function dashboard()
    {
        return view('User.profile.pages.dashboard');
    }
    public function order()
    {
        return view('User.profile.pages.order');
    }
    public function address()
    {
        return view('User.profile.pages.address');
    }
    public function creditCard()
    {
        return view('User.profile.pages.creditCard');
    }
    public function profile()
    {
        return view('User.profile.pages.profile');
    }
    public function passChange()
    {
        return view('User.profile.pages.passChange');
    }
    public function singleUpdate(Request $request)
    {
        $action = $request->action ?? null;
        if (!$action) return;

        $user = auth()->user();
        switch ($action) {
            case 'email':
                // $user->sendEmailVerificationNotification();
                return;
                $validatedData = $request->validate([
                    'email' => ['required', 'string', 'email', 'confirmed', 'max:190', 'unique:users']
                ]);
                $user->update([
                    'email' => $request->email,
                ]);
                break;
            case 'password':                
                $validatedData = $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed']
                ]);
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
                break;
        }
        return back()->with('message', 'Aggiornato con successo.');
    }
    public function fatture()
    {
        return view('User.profile.pages.fatture');
    }
}