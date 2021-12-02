<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CategoriesModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();;
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'isi' => $this->UserModel->findAll(),
            'categories' => $this->CategoriesModel->findAll(),
        ];
        return view('home', $data);
    }
}
