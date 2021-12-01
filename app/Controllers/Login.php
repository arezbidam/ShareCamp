<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login/logIn-index');
    }

    public function signUp()
    {
        return view('login/signUp-index');
    }
}
