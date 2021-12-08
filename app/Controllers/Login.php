<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login/logIn-index', $data);
    }

    public function signIn()
    {
        $login = $this->request->getPost('login');
        $email = $this->request->getVar('email');
        $UserModel = $this->UserModel;
        if ($login = 1) {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            if ($email == '' or $password == '') {
                $err = 'Silahkan isi form terlebih dahulu.';
            }

            if (empty($err)) {
                $dataUser = $UserModel->where('email', $email)->first();
                if ($dataUser['password'] != $password) {
                    $err = 'Password Salah';
                }
            }

            if (empty($err)) {
                $data_Session = [
                    'id' => $dataUser['id_user'],
                    'email' => $dataUser['email'],
                    'password' => $dataUser['password'],
                    'nama' => $dataUser['nama'],
                    'masuk' => TRUE
                ];
                session()->set($data_Session);
                return redirect()->to('Home');
            }

            if ($err) {
                session()->setFlashdata('error', $err);
                return redirect()->to('login');
            }
        }
    }

    public function logOut()
    {
        # code...
        session()->destroy();
        return redirect()->to('login');
    }

    public function signUp()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('login/signUp-index', $data);
    }
}
