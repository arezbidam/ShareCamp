<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LoginModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->LoginModel = new LoginModel();;
    }

    public function index()
    {
        $data = [
            'title' => 'Sign In',
        ];
        return view('admin/auth/sign_in', $data);
    }
    public function signIn()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $UserModel = $this->UserModel;
        $LoginModel = $this->LoginModel;
        if ($email && $password) {
            $dataUserLogin = $LoginModel->where('email', $email)->first();
            if ($dataUserLogin) {
                if ($dataUserLogin['password'] != $password) {
                    $this->sweetAlertError("Password anda salah!");
                    return redirect()->to('admin');
                }
                if ($dataUserLogin['hak_akses'] != "administrator") {
                    $this->sweetAlertError("Anda tidak memiliki akses ke halaman ini");
                    return redirect()->to('admin');
                }
                $id_user = $dataUserLogin['id_user'];
                $dataUserPersonalInfo = $UserModel->where('id_user', $id_user)->first();
                $data_Session = [
                    'id' => $dataUserPersonalInfo['id_user'],
                    'email' => $dataUserLogin['email'],
                    'nama' => ucwords(strtolower($dataUserPersonalInfo['nama'])),
                    'hak_akses' => $dataUserLogin['hak_akses'],
                    'masuk' => TRUE
                ];
                session()->set($data_Session);
                $this->sweetAlertSuccess("Selamat Datang, " . $dataUserPersonalInfo['nama']);
                return redirect()->to('admin/dashboard');
            } else {
                $this->sweetAlertError("Email anda salah!");
                return redirect()->to('admin');
            }
        }
    }

    public function signOut()
    {
        $this->sweetAlertSuccess("Anda Berhasil Sign-Out");
        session()->destroy();
        return redirect()->to('admin');
    }

    public function sweetAlertSuccess($msg)
    {
        session()->setFlashdata('pesan', '
        <script>
            Swal.fire(
            "Success!",
            "' . $msg . '",
            "success"
            ).then(function() {
            });
        </script>');
    }
    public function sweetAlertError($msg)
    {
        session()->setFlashdata('pesan', '
        <script>
            Swal.fire(
            "Oopss!",
            "' . $msg . '",
            "error"
            ).then(function() {
            });
        </script>');
    }
}
