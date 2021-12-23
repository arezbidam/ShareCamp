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

class PesananToko extends BaseController
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
        $id_user = session()->get('id');
        $toko = $this->TokoModel->get_toko($id_user);
        $id_toko = $toko['id_toko'];
        $kota = $this->KotaModel->findAll();
        $keyword = $this->request->getVar('keyword');
        $filter_kota = $this->request->getVar('filter_kota');
        $filter_kategori = $this->request->getVar('filter_kategori');
        $filter_harga = $this->request->getVar('filter_harga');
        if ($keyword) {
            $pesanan = $this->PesananModel
                ->join('tb_user', 'tb_pesanan.id_user=tb_user.id_user')
                ->where('tb_pesanan.id_toko', $id_toko)->search($keyword);
            if ($pesanan->paginate(10, 'produk')) {
            } else {
                $this->sweetAlertError("Data " . $keyword . " Tidak Ditemukan");
                return redirect()->to('toko/pesanan');
            }
        } else {
            $pesanan = $this->PesananModel
                ->join('tb_user', 'tb_pesanan.id_user=tb_user.id_user')
                ->where('tb_pesanan.id_toko', $id_toko);
        }

        $data_pesanan = $pesanan->paginate(10, 'produk');

        $id_toko = $toko['id_toko'];
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'pages' => 'toko',
            'title' => 'Toko Saya',
            'kategori' => $this->KategoriModel->findAll(),
            'toko' => $toko,
            'kota' => $kota,
            'pesanan' => $data_pesanan,
            'detail_pesanan' => $this->PesananDetailModel->get_pesanan_toko_detail_by_id_toko($id_toko),
            'pager' => $pesanan->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/toko/pesanan/pesanan', $data);
    }

    public function update_pembayaran()
    {
        $no_pesanan = $this->request->getVar('no_pesanan');
        $jumlah_bayar = $this->request->getVar('jumlah_bayar');
        $pesanan_old = $this->PesananModel->where('no_pesanan', $no_pesanan)->first();
        $new_sudah_bayar = $pesanan_old['sudah_bayar'] + $jumlah_bayar;
        $update = $this->PesananModel->update(['no_pesanan' => $no_pesanan], ['sudah_bayar' => $new_sudah_bayar]);
        if ($update) {
            $this->sweetAlertSuccess("Data Pembayaran " . $no_pesanan . " Berhasil Diupdate");
        } else {
            $this->sweetAlertError("Data Pembayaran " . $no_pesanan . " Gagal Diupdate");
        }
        return redirect()->to('toko/pesanan');
    }

    public function delete()
    {
        $no_pesanan = $this->request->getVar('no_pesanan');
        if ($no_pesanan) {
            $this->PesananModel->transStart();
            $this->PesananModel->delete(['no_pesanan' => $no_pesanan]);
            $this->PesananDetailModel->where(['no_pesanan' => $no_pesanan])->delete();
            $this->PesananModel->transComplete();
            if ($this->PesananModel->transStatus()) {
                $this->sweetAlertSuccess("Data Berhasil Di Hapus.");
            } else {
                $this->sweetAlertError("Data Gagal Di Hapus.");
            }
        } else {
            $this->sweetAlertError("No Pesanan Tidak diketahui (null).");
        }
        return redirect()->to('/toko/pesanan');
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
            'pages' => 'toko',
            'title' => 'Nota Pesanan',
            'kategori' => $this->KategoriModel->findAll(),
            'pesanan' => $pesanan,
            'pesanan_detail' => $pesanan_detail,
            'toko' => $toko,
        ];
        return view('frontend/pesanan/print', $data);
    }
}
