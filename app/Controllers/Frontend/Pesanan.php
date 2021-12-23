<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;
use App\Models\KotaModel;
use App\Models\PesananModel;
use App\Models\PesananDetailModel;

class Pesanan extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->TokoModel = new TokoModel();;
        $this->KotaModel = new KotaModel();;
        $this->ProdukModel = new ProdukModel();;
        $this->PesananModel = new PesananModel();;
        $this->PesananDetailModel = new PesananDetailModel();;
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
            $pesanan = $this->PesananModel
                ->join('tb_toko', 'tb_toko.id_toko=tb_pesanan.id_toko')
                ->where('tb_pesanan.id_user', session()->get('id'))->search($keyword);
            if ($pesanan->paginate(10, 'produk')) {
            } else {
                $this->sweetAlertError("Data " . $keyword . " Tidak Ditemukan");
                return redirect()->to('pesanan');
            }
        } else {
            $pesanan = $this->PesananModel
                ->join('tb_toko', 'tb_toko.id_toko=tb_pesanan.id_toko')
                ->where('tb_pesanan.id_user', session()->get('id'));
        }
        if ($filter_kota && $filter_kategori && $filter_harga) {
            $data_pesanan = $pesanan
                ->where('tb_toko.kota_toko', $filter_kota)
                ->orderBy('harga', $filter_harga)
                ->paginate(10, 'produk');
            if (!$data_pesanan) {
                $this->sweetAlertError("Data Tidak Ditemukan");
                return redirect()->to('pesanan');
            }
        } else {
            $data_pesanan = $pesanan
                ->paginate(10, 'produk');
        }
        $id_user = session()->get('id');
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'pages' => 'pesanan',
            'title' => 'Toko Saya',
            'kategori' => $this->KategoriModel->findAll(),
            'toko' => $toko,
            'kota' => $kota,
            'pesanan' => $data_pesanan,
            'detail_pesanan' => $this->PesananDetailModel->get_pesanan_detail_by_id_user($id_user),
            'pager' => $pesanan->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/pesanan/pesanan', $data);
    }
    public function print()
    {
        $uri = current_url(true);
        $no_pesanan = $uri->getSegment('3');
        $pesanan = $this->PesananModel->get_pesanan_print_by_no_pesanan($no_pesanan);
        $id_toko = $pesanan->id_toko;
        $toko = $this->TokoModel->get_pemilik_toko($id_toko);
        $pesanan_detail = $this->PesananDetailModel->get_pesanan_detail_print_by_no_pesanan($no_pesanan);
        $data = [
            'pages' => 'pesanan',
            'title' => 'Nota Pesanan',
            'kategori' => $this->KategoriModel->findAll(),
            'pesanan' => $pesanan,
            'pesanan_detail' => $pesanan_detail,
            'toko' => $toko,
        ];
        return view('frontend/pesanan/print', $data);
    }
}
