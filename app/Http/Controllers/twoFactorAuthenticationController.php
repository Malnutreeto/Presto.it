<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class twoFactorAuthenticationController extends Controller
{
       
    
    /**
     * Functio return view for enable or disable 2fa
     */
    public function enableOrDisable() {
        return view('auth.two-factor-auth');
    }
}
