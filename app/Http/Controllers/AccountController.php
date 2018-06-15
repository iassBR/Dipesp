<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    protected $redirectPages = [
        'logout' => 'login',
    ];

    public function logout()
    {
        Auth::logout();
        return redirect()->route($this->redirectPages['logout']);
    }
}
