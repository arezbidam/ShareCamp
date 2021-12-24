<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LoginModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->LoginModel = new LoginModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->TokoModel = new TokoModel();;
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
            'data_login' => $this->LoginModel->where('id_user', session()->get('id'))->first(),
        ];
        return view('admin/profile/profile', $data);
    }

    public function updateDataPribadi()
    {
        $id = [
            'id_user' => $this->request->getVar('id_user')
        ];
        $data_pribadi = [
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_ktp' => $this->request->getVar('no_ktp'),
            'kota' => $this->request->getVar('kota'),
            'no_telp' => $this->request->getVar('no_telp'),
        ];
        // dd($data_pribadi);
        $update = $this->UserModel->update($id, $data_pribadi);

        if ($update) {
            $this->sweetAlertSuccess("Berhasil Update Data Pribadi");
        } else {
            $this->sweetAlertError("Gagal Update Data Pribadi");
        }

        return redirect()->to('admin/profile');
    }
    public function updateDataRekening()
    {
        $id = [
            'id_user' => $this->request->getVar('id_user')
        ];
        $data_rekening = [
            'no_rek' => $this->request->getVar('no_rek'),
            'nama_bank' => $this->request->getVar('nama_bank'),
            'atas_nama_bank' => $this->request->getVar('atas_nama_bank'),
        ];

        $this->UserModel->update($id, $data_rekening);

        if ($this->UserModel->affectedRows() > 0) {
            $this->sweetAlertSuccess("Berhasil Update Data Rekening");
        } else {
            $this->sweetAlertError("Gagal Update Data Rekening");
        }

        return redirect()->to('admin/profile');
    }
    public function update_password()
    {
        $password_baru = $this->request->getVar('password_baru');
        $ulangi_password_baru = $this->request->getVar('ulangi_password_baru');
        if ($password_baru != $ulangi_password_baru) {
            $this->sweetAlertError("Password anda tidak sama, silahkan ulangi");
            return redirect()->to('profile');
        } else {
            $where = [
                'id_user' => session()->get('id')
            ];
            $data = [
                'password' => $password_baru
            ];
            $update = $this->LoginModel->update_password($data);
            if ($update) {
                $this->sweetAlertSuccess("Berhasil Ganti Password");
                return redirect()->to('admin/profile');
            } else {
                $this->sweetAlertError("Gagal Ganti Password");
                return redirect()->to('admin/profile');
            }
        }
    }
}
