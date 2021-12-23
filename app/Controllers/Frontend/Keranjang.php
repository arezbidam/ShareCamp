<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\KeranjangModel;
use App\Models\TokoModel;
use App\Models\PesananModel;
use App\Models\PesananDetailModel;

class Keranjang extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->KeranjangModel = new KeranjangModel();;
        $this->TokoModel = new TokoModel();;
        $this->ProdukModel = new ProdukModel();;
        $this->PesananModel = new PesananModel();;
        $this->PesananDetailModel = new PesananDetailModel();;
    }
    public function index()
    {
        $toko = $this->TokoModel->get_toko(session()->get('id'));
        $kota = $this->TokoModel->get_all_toko();
        $keyword = $this->request->getVar('keyword');
        $filter_kota = $this->request->getVar('filter_kota');
        $filter_kategori = $this->request->getVar('filter_kategori');
        $filter_harga = $this->request->getVar('filter_harga');
        if ($keyword) {
            $produk = $this->KeranjangModel
                ->join('tb_produk', 'tb_produk.id_produk=tb_keranjang.id_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_keranjang.id_toko')
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->where('tb_keranjang.id_user', session()->get('id'))->search($keyword);
            if (!$produk) {
                $this->sweetAlertError("Data Tidak Ditemukan");
                return redirect()->to('shop/produk');
            }
        } else {
            $id_user = session()->get('id');
            $produk = $this->KeranjangModel
                ->join('tb_produk', 'tb_produk.id_produk=tb_keranjang.id_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_keranjang.id_toko')
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->where('tb_keranjang.id_user', session()->get('id'));
        }
        if ($filter_kota && $filter_kategori && $filter_harga) {
            $data_produk = $produk
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
                ->paginate(10, 'produk');
        }
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'pages' => 'keranjang',
            'title' => 'Toko Saya',
            'kategori' => $this->KategoriModel->findAll(),
            'toko' => $toko,
            'kota' => $kota,
            'produk' => $data_produk,
            'pager' => $produk->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/keranjang/keranjang', $data);
    }
    public function detail()
    {
        $id_produk = $this->request->getVar('id_produk');;
        $produk = $this->ProdukModel->get_produk_by_id_produk($id_produk);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'keranjang',
            'title' => 'Detail - Barang',
            'validation' => $validation,
            'produk' => $produk,
        ];
        return view('frontend/toko/barang/detail', $data);
    }
    public function add()
    {
        $id_produk = $this->request->getVar('id_produk');
        $jumlah_sewa = $this->request->getVar('jumlah_sewa');
        $tgl_mulai_sewa = $this->request->getVar('tgl_mulai_sewa');
        $tgl_berakhir_sewa = $this->request->getVar('tgl_berakhir_sewa');
        $produk = $this->ProdukModel->where('id_produk', $id_produk)->first();
        $id_toko = $produk['id_toko'];
        $id_user = session()->get('id');
        $addToCart = $this->KeranjangModel->insert([
            'id_user' => $id_user,
            'id_toko' => $id_toko,
            'id_produk' => $id_produk,
            'jumlah_sewa' => $jumlah_sewa,
            'tgl_mulai_sewa' => $tgl_mulai_sewa,
            'tgl_berakhir_sewa' => $tgl_berakhir_sewa,
        ]);
        if ($addToCart) {
            $this->sweetAlertSuccess("Data Berhasil Disimpan Dikeranjang");
        } else {
            $this->sweetAlertError("Data Gagal Disimpan Dikeranjang");
        }
        return redirect()->to('/shop/produk');
    }
    public function checkout()
    {
        $checkbox_id_keranjang = $this->request->getVar('checked_id_produk');

        $array_id_toko = array();
        $no_pemesanan = $this->no_pemesanan();
        $today = date("Y-m-d");
        $total_biaya_pemesanan = 0;
        for ($i = 0; $i < count($checkbox_id_keranjang); $i++) {
            $keranjang = $this->KeranjangModel
                ->where('id_keranjang', $checkbox_id_keranjang[$i])
                ->join('tb_toko', 'tb_keranjang.id_toko=tb_toko.id_toko')
                ->join('tb_user', 'tb_keranjang.id_user=tb_user.id_user')
                ->join('tb_produk', 'tb_keranjang.id_produk=tb_produk.id_produk')
                ->first();
            array_push($array_id_toko, $keranjang['id_toko']);
            $tgl1 = strtotime($keranjang['tgl_mulai_sewa']);
            $tgl2 = strtotime($keranjang['tgl_berakhir_sewa']);
            $selisih = $tgl2 - $tgl1;
            $selesih_hari = $selisih / 60 / 60 / 24;
            $total_biaya_sewa = $keranjang['harga'] * $selesih_hari * $keranjang['jumlah_sewa'];
            $data_pesanan_detail[] = array(
                'no_pesanan' => $no_pemesanan,
                'id_produk' => $keranjang['id_produk'],
                'jumlah_sewa' => $keranjang['jumlah_sewa'],
                'tgl_mulai_sewa' => $keranjang['tgl_mulai_sewa'],
                'tgl_berakhir_sewa' => $keranjang['tgl_berakhir_sewa'],
                'harga_sewa_per_hari' => $keranjang['harga'],
                'lama_sewa' => $selesih_hari,
                'total_biaya_sewa' => $total_biaya_sewa
            );
            $id_toko = $keranjang['id_toko'];
            $id_user = $keranjang['id_user'];
            $total_biaya_pemesanan = $total_biaya_pemesanan + $total_biaya_sewa;
        }
        $data_pesanan = [
            'no_pesanan' => $no_pemesanan,
            'tgl_pesanan' => $today,
            'id_toko' => $id_toko,
            'id_user' => $id_user,
            'total_biaya_pesanan' => $total_biaya_pemesanan,
            'sudah_bayar' => 0,
            'sisa_bayar' => 0,
        ];
        $allValuesAreTheSame = (count(array_unique($array_id_toko)) === 1);
        if ($allValuesAreTheSame) {
            $this->PesananModel->transStart();
            $this->PesananModel->insert($data_pesanan);
            $this->PesananDetailModel->insertBatch($data_pesanan_detail);
            $this->KeranjangModel->whereIn('id_keranjang', $checkbox_id_keranjang)->delete();
            $this->PesananModel->transComplete();
            if ($this->PesananModel->transStatus()) {
                $this->sweetAlertSuccess("Berhasil, Checkout");
                return redirect()->to('/pesanan');
            } else {
                $this->sweetAlertError("Gagal, Checkout");
                return redirect()->to('/keranjang');
            }
        } else {
            $this->sweetAlertError("Checkout Produk harus dari Toko yang sama");
        }
        return redirect()->to('/keranjang');
    }
    function no_pemesanan()
    {
        $today = date("Y-m-d");
        $query = $this->PesananModel->query("SELECT max(no_pesanan) as maxNoUrut FROM tb_pesanan WHERE Date_Format(created_at,'%Y-%m-%d') = '$today'");
        $data = $query->getRow();
        $noUrut = (int) substr($data->maxNoUrut, 7, 3);
        $noUrut++;
        $char =  "P" . date("ymd");
        $no_pemesanan = $char . sprintf("%03s", $noUrut);
        return $no_pemesanan;
    }
}
