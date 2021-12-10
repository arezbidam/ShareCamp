<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Category extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Category',
            'categories' => $this->CategoriesModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/category/category', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Category',
            'categories' => $this->CategoriesModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/category/add', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_categories' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Caategories',
                ]
            ],
            'keterangan_categories' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/category/add')->withInput();
        } else {
            $saveCategory = $this->CategoriesModel->insert([
                'nama_categories' => $this->request->getVar('nama_categories'),
                'keterangan_categories' => $this->request->getVar('keterangan_categories'),
            ]);
            if ($saveCategory) {
                session()->setFlashdata('pesan', 'Registrasi Toko Berhasil');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
            }
            return redirect()->to('/admin/category');
        }
    }
    public function edit()
    {
        $id_categories = $this->request->getVar('id_categories');
        $data = [
            'title' => 'Category',
            'category' => $this->CategoriesModel->getCategoriesById($id_categories),
        ];
        return view('admin/category/edit', $data);
    }
    public function update()
    {
        if (!$this->validate([
            'nama_categories' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Caategories',
                ]
            ],
            'keterangan_categories' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/admin/category/edit')->withInput();
        } else {
            $saveCategory = $this->CategoriesModel->save([
                'id_categories' => $this->request->getVar('id_categories'),
                'nama_categories' => $this->request->getVar('nama_categories'),
                'keterangan_categories' => $this->request->getVar('keterangan_categories'),
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
            return redirect()->to('/admin/category');
        }
    }
}
