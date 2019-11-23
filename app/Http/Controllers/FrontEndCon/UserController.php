<?php

namespace App\Http\Controllers\FrontEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified'])->except('emailChange');
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
                // validate input
                $validatedData = $request->validate([
                    'current_email' => ['required', 'string', 'email', 'max:190', 'exists:users,email'],
                    'email' => ['required', 'string', 'email', 'confirmed', 'max:190', 'unique:users']
                ]);
                // validate current email
                if ($validatedData['current_email'] != auth()->user()->email) {
                    return back()->with('message', 'Non puoi cambiare questa email.');
                }
                $this->changeEmail($validatedData, $user);
                // redirect path.
                return back()->with('message', "Lemail verrà modificata dopo la conferma. Le-mail di conferma è stata inviata al tuo attuale indirizzo e-mail.");
                break;
            case 'password':                
                $validatedData = $request->validate([
                    'current_password' => ['required', 'string', 'min:8'],
                    'password' => ['required', 'string', 'min:8', 'confirmed']
                ]);
                if (!\Hash::check($validatedData['current_password'], $user->password)) {
                    return back()->with('errMessage', 'La password non è corretta.');
                }
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
                return back()->with('message', 'La tua password è stata modificata.');
                break;
        }
        return back()->with('message', 'Aggiornato con successo.');
    }
    public function fatture()
    {
        return view('User.profile.pages.fatture');
    }

    public function changeEmail($validatedData, $user)
    {
        // check last try time is over or not. if already passed 60min, return back.
        $changeToken = DB::table('email_resets')
            ->where('email', '=', $validatedData['current_email'])
            ->orderBy('created_at', 'desc')
            ->first();
        if ($changeToken && !(\Carbon\Carbon::now()->isAfter(\Carbon\Carbon::parse($changeToken->created_at)->addMinutes(60)))) {
            // time not expired
            $timeDeff = \Carbon\Carbon::parse($changeToken->created_at)->addMinutes(60)->diffInMinutes(\Carbon\Carbon::now());
            return back()->with('errMessage', 'Non provare troppo presto. Prova almeno ' . $timeDeff . 'minuti dopo.');
        }
        // create token for confirmation link
        $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
        // insert email resets table with user email.
        DB::table('email_resets')->insert([
            'email' => $validatedData['current_email'], 
            'new_email' => $validatedData['email'], 
            'token' => $token,
            'created_at' => \Carbon\Carbon::now(),
        ]);
        // send email with token and active link
        $user->sendEmailChangeNotification($token, $validatedData['email']);
    }

    public function emailChange(Request $request, $token = null)
    {
        $changeToken = DB::table('email_resets')
            ->where('email', '=', $request->email)
            ->where('new_email', '=', $request->new_email)
            ->where('token', '=', $token)
            ->first();
        // validate token, email, new email, expired
        if ($changeToken && !(\Carbon\Carbon::now()->isAfter(\Carbon\Carbon::parse($changeToken->created_at)->addMinutes(60)))) {
            $user = auth()->user();
            if (!$user) abort(404);
            $user->email = $request->new_email;
            $user->save();
            DB::table('email_resets')
                ->where('email', '=', $request->email)
                ->where('new_email', '=', $request->new_email)
                ->where('token', '=', $token)
                ->delete();
            return redirect()->route('user.dashboard');
        }

        abort(404);
        // redirect to home.
    }
}