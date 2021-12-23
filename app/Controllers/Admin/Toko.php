<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->TokoModel = new TokoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Toko',
            'toko' => $this->TokoModel->findAll(),
        ];
        return view('admin/toko/toko', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Toko',
            'toko' => $this->TokoModel->findAll(),
        ];
        return view('admin/toko/add', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_toko' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Caategories',
                ]
            ],
            'keterangan_toko' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/toko/add')->withInput();
        } else {
            $saveToko = $this->TokoModel->insert([
                'nama_toko' => $this->request->getVar('nama_toko'),
                'keterangan_toko' => $this->request->getVar('keterangan_toko'),
            ]);
            if ($saveToko) {
                session()->setFlashdata('pesan', 'Registrasi Toko Berhasil');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
            }
            return redirect()->to('/admin/toko');
        }
    }
    public function edit()
    {
        $id_toko = $this->request->getVar('id_toko');
        $data = [
            'title' => 'Toko',
            'Toko' => $this->TokoModel->gettokoById($id_toko),
        ];
        return view('admin/toko/edit', $data);
    }
    public function update()
    {
        if (!$this->validate([
            'nama_toko' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Caategories',
                ]
            ],
            'keterangan_toko' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/toko/edit')->withInput();
        } else {
            $saveToko = $this->TokoModel->save([
                'id_toko' => $this->request->getVar('id_toko'),
                'nama_toko' => $this->request->getVar('nama_toko'),
                'keterangan_toko' => $this->request->getVar('keterangan_toko'),
            ]);
            if ($saveToko) {
                session()->setFlashdata('pesan', '
                <div class="alert alert-success">
                Update Berhasil
                </div>
                ');
            } else {
                session()->setFlashdata('pesan', '
                <div class="alert alert-danger">
                Update Gagal
                </div>
                ');
            }
            return redirect()->to('/admin/toko');
        }
    }
    public function acc()
    {
        $saveToko = $this->TokoModel->save([
            'id_toko' => $this->request->getVar('id_toko'),
            'status_toko' => "APPROVED",
        ]);
        if ($saveToko) {
            session()->setFlashdata('pesan', '
                <div class="alert alert-success">
                Update Berhasil
                </div>
                ');
        } else {
            session()->setFlashdata('pesan', '
                <div class="alert alert-danger">
                Update Gagal
                </div>
                ');
        }
        return redirect()->to('/admin/toko');
    }
    public function tolak()
    {
        $saveToko = $this->TokoModel->save([
            'id_toko' => $this->request->getVar('id_toko'),
            'status_toko' => "DITOLAK",
        ]);
        if ($saveToko) {
            session()->setFlashdata('pesan', '
                <div class="alert alert-success">
                Update Berhasil
                </div>
                ');
        } else {
            session()->setFlashdata('pesan', '
                <div class="alert alert-danger">
                Update Gagal
                </div>
                ');
        }
        return redirect()->to('/admin/toko');
    }
}
