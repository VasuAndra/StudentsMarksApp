<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //log user out and redirect to log in page
    public function logout() {
        Auth::logout();
        return redirect('/home');
    }
}