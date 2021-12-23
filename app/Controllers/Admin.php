<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        // dd($data['get_barang_detail']);
        return view('admin/sign_in', $data);
    }

    public function signIn()
    {
        $login = $this->request->getPost('login');
        $email = $this->request->getVar('email');
        $UserModel = $this->UserModel;
        if ($login) {
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


    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->CategoriesModel->findAll(),
            'barang' => $this->BarangModel->findAll(),
            // 'barang_detail' => $this->BarangModel->get_barang_detail(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/dashboard', $data);
    }
    public function category()
    {
        $data = [
            'title' => 'Category',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->CategoriesModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/category', $data);
    }
    public function category_add()
    {
        $data = [
            'title' => 'Category',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->CategoriesModel->findAll(),
        ];
        // dd($data['get_barang_detail']);
        return view('admin/category', $data);
    }
}
