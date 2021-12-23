<?php

namespace App\Controllers\Frontend;

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
        return view('frontend/auth/sign_in', $data);
    }

    public function signUp()
    {
        $data = [
            'title' => 'Sign Up',
        ];
        return view('frontend/auth/sign_up', $data);
    }

    public function signIn()
    {
        $UserModel = $this->UserModel;
        $LoginModel = $this->LoginModel;
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if ($email && $password) {
            $dataUserLogin = $LoginModel->where('email', $email)->first();
            if ($dataUserLogin) {
                if ($dataUserLogin['password'] != $password) {
                    $this->sweetAlertError("Password anda salah!");
                    return redirect()->to('login');
                }
                if ($dataUserLogin['hak_akses'] != "user") {
                    $this->sweetAlertError("Anda tidak memiliki akses ke halaman ini");
                    return redirect()->to('login');
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
                $this->sweetAlertSuccessLogin("Selamat Datang, " . strtolower($dataUserPersonalInfo['nama']));
                return redirect()->to('/');
            } else {
                $this->sweetAlertError("Email anda salah!");
                return redirect()->to('login');
            }
        }
    }

    public function register()
    {
        $unique_id = $this->kode_otomatis();
        $email = $this->request->getVar('email');

        $data_user = [
            'id_user' => $unique_id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),
            'no_telp' => $this->request->getVar('no_telp'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'no_rek' => $this->request->getVar('no_rek'),
            'nama_bank' => $this->request->getVar('nama_bank'),
            'atas_nama_bank' => $this->request->getVar('atas_nama_bank'),
        ];

        $data_login = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'hak_akses' => 'user',
            'id_user' => $unique_id
        ];


        if ($this->LoginModel->where('email', $email)->first()) {
            $this->sweetAlertSuccess("Oops, Email sudah terdaftar.");
            return redirect()->to('login');
        } else {
            $this->UserModel->insert($data_user);
            $this->LoginModel->insert($data_login);
            $this->UserModel->transComplete();
            if ($this->UserModel->transStatus()) {
                $this->sweetAlertSuccess("Registerred, Silahkan Login.");
                return redirect()->to('login');
            } else {
                $this->sweetAlertSuccess("Gagal, Silahkan coba lagi.");
                return redirect()->to('login');
            }
        }
    }

    function kode_otomatis()
    {
        $today = date("Y-m-d");
        $query = $this->UserModel->query("SELECT max(id_user) as maxNoUrut FROM tb_user WHERE Date_Format(created_at,'%Y-%m-%d') = '$today'");
        $data = $query->getRow();
        $noUrut = (int) substr($data->maxNoUrut, 7, 3);
        $noUrut++;
        $char =  "U" . date("ymd");
        $kode_otomatis = $char . sprintf("%03s", $noUrut);
        return $kode_otomatis;
    }

    public function signOut()
    {
        $this->sweetAlertSuccess("Anda Berhasil Sign-Out");
        session()->destroy();
        return redirect()->to('login');
    }

    public function sweetAlertSuccessLogin($msg)
    {
        session()->setFlashdata('pesan', '
        <script>
            Swal.fire(
            "Berhasil Login!",
            "' . ucwords($msg) . '",
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
