<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $currentUser = User::findById($id);
        if (Auth::check()) {
            return view("users.profile.index", ["currentUser" => $currentUser, "user" => Auth::user()]);
        } else {
            return view("users.profile.index", ["currentUser" => $currentUser]);
        }
    }
}
