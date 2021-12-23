<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->KategoriModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/kategori/kategori', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->KategoriModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/kategori/add', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori',
                ]
            ],
            'keterangan_kategori' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/kategori/add')->withInput();
        } else {
            $saveCategory = $this->KategoriModel->insert([
                'nama_kategori' => $this->request->getVar('nama_kategori'),
                'keterangan_kategori' => $this->request->getVar('keterangan_kategori'),
            ]);
            if ($saveCategory) {
                session()->setFlashdata('pesan', 'Registrasi Toko Berhasil');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
            }
            return redirect()->to('/admin/kategori');
        }
    }
    public function edit()
    {
        $id_kategori = $this->request->getVar('id_kategori');
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->KategoriModel->where('id_kategori', $id_kategori)->first(),
        ];
        return view('admin/kategori/edit', $data);
    }
    public function update()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Caategories',
                ]
            ],
            'keterangan_kategori' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/kategori/edit')->withInput();
        } else {
            $saveCategory = $this->KategoriModel->save([
                'id_kategori' => $this->request->getVar('id_kategori'),
                'nama_kategori' => $this->request->getVar('nama_kategori'),
                'keterangan_kategori' => $this->request->getVar('keterangan_kategori'),
            ]);
            if ($saveCategory) {
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
            return redirect()->to('/admin/kategori');
        }
    }
}
