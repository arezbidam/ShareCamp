<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;
use App\Models\KotaModel;


class Shop extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->TokoModel = new TokoModel();;
        $this->KotaModel = new KotaModel();;
        $this->ProdukModel = new ProdukModel();;
    }
    public function index()
    {
        $toko = $this->TokoModel->get_toko(session()->get('id'));
        $kota = $this->KotaModel->findAll();
        $keyword = $this->request->getVar('keyword');
        $filter_kota = $this->request->getVar('filter_kota');
        $filter_kategori = $this->request->getVar('filter_kategori');
        $filter_harga = $this->request->getVar('filter_harga');
        if ($keyword) {
            $produk = $this->ProdukModel->search($keyword);
            if ($produk->paginate(10, 'produk')) {
            } else {
                $this->sweetAlertError("Data " . $keyword . " Tidak Ditemukan");
                return redirect()->to('shop/produk');
            }
        } else {
            $produk = $this->ProdukModel;
        }
        if ($filter_kota && $filter_kategori && $filter_harga) {
            $data_produk = $produk
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko')
                ->where('tb_toko.kota_toko', $filter_kota)
                ->where('tb_produk.kategori_produk', $filter_kategori)
                ->orderBy('harga', $filter_harga)
                ->paginate(10, 'produk');
            if (!$data_produk) {
                $this->sweetAlertError("Data Tidak Ditemukan");
                return redirect()->to('shop/produk');
            }
        } else {
            $data_produk = $produk
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko')
                ->paginate(10, 'produk');
        }
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'pages' => 'sewa-produk',
            'title' => 'Toko Saya',
            'kategori' => $this->KategoriModel->findAll(),
            'toko' => $toko,
            'kota' => $kota,
            'produk' => $data_produk,
            'pager' => $produk->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/shop/produk', $data);
    }
    public function detail()
    {
        $id_produk = $this->request->getVar('id_produk');;
        $produk = $this->ProdukModel->get_produk_by_id_produk($id_produk);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'sewa-produk',
            'title' => 'Detail - Barang',
            'validation' => $validation,
            'produk' => $produk,
        ];
        return view('frontend/toko/barang/detail', $data);
    }
}
