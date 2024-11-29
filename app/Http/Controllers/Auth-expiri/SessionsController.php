<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
   /**
 * Handle an authentication attempt.
 *
 * @param  \Illuminate\Http\Request $request
 *
 *
 */

public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('/');
    }
}
public function index(){
    return view('auth.login');
}

public function logout()
{
    Auth::logout();

    return redirect('/');
}
}
