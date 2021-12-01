<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/logIn-index');
    }

    public function signIn()
    {
        # code...
        $userModel = new UserModel();
        $login = $this->request->getPost('login');  
        $email = $this->request->getVar('email'); 
        if($login = 1) {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            
            if($email == '' or $password == ''){
                $err = 'Silahkan isi form terlebih dahulu.';
            }
            if($err){
                session()->setFlashdata('error', $err);
                return redirect()->to('login');
            }
        }
        // dd($login);
    }

    public function signUp()
    {
        return view('login/signUp-index');
    }
}
