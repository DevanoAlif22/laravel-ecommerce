<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {

        return view('products');
    }
    public function detailProduct()
    {

        return view('detailProduct');
    }
    public function baskets()
    {

        return view('baskets');
    }
    public function login()
    {

        return view('auth.login');
    }
    public function register()
    {

        return view('auth.register');
    }
    public function detailUser()
    {

        return view('detailUser');
    }
    public function invoice()
    {

        return view('invoice');
    }
}
