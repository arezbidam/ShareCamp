<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\PemesananShareModel;
use App\Models\UserModel;

class Pemesanan extends BaseController
{
  public function __construct()
  {
    $this->UserModel = new UserModel();
    $this->PemesananModel = new PemesananModel();
    $this->PemesananShareModel = new PemesananShareModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar pesanan',
      'data_pemesanan' => $this->PemesananModel->get_pemesanan_by_id_user(session()->get('id')),
    ];
    return view('pages/pemesanan_daftar', $data);
  }

  public function detail($id)
  {
    # code...
    $data = [
      'title' => 'Detail Pesanan',
      'pemesanan' => $this->PemesananModel->get_pemesanan_detail($id),
    ];
    return view('pages/pemesanan_detail', $data);
  }

  public function share_add()
  {
    # code...
    $data = [
      'title' => 'Share',
    ];

    $this->PemesananShareModel->save([
      'id_user_1' => session()->get('id'),
      'id_barang' => $this->request->getVar('id_barang'),
      'id_toko' => null,
    ]);

    return redirect()->to('home');
  }

  public function share_add_2()
  {
    # code...
    $data = [
      'title' => 'Share',
    ];
    // dd($this->request->getVar(''););
    $this->PemesananShareModel->save([
      'id_share' => $this->request->getVar('id_share'),
      'id_user_2' => session()->get('id'),
      'id_barang' => $this->request->getVar('id_barang'),
      'id_toko' => null,
    ]);

    return redirect()->to('home');
  }
}
