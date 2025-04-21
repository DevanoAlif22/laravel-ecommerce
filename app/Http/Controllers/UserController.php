<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function acak()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('cms.user.index', compact('users'));
    }
}
