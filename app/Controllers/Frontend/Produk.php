<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->TokoModel = new TokoModel();;
        $this->ProdukModel = new ProdukModel();;
    }
    public function index()
    {
        $toko = $this->TokoModel->get_toko(session()->get('id'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $produk = $this->ProdukModel
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko')
                ->where('tb_toko.id_user', session()->get('id'))
                ->search($keyword);
            if ($produk->paginate(10, 'produk')) {
            } else {
                $this->sweetAlertError("Data " . $keyword . " Tidak Ditemukan");
                return redirect()->to('shop/produk');
            }
        } else {
            $produk = $this->ProdukModel
                ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.kategori_produk')
                ->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko')
                ->where('tb_toko.id_user', session()->get('id'));
        }
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'pages' => 'toko',
            'title' => 'Toko Saya',
            'kategori' => $this->KategoriModel->findAll(),
            'toko' => $toko,
            'produk' => $produk->paginate(10, 'produk'),
            'pager' => $produk->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/toko/produk/produk', $data);
    }
    public function create()
    {
        $id_user = session()->get('id');
        $toko_saya = $this->TokoModel->get_toko($id_user);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'produk-anda',
            'title' => 'Tambah - Product',
            'validation' => $validation,
            'kategori' => $this->KategoriModel->findAll(),
            'id_toko' => $toko_saya['id_toko'],
        ];
        return view('frontend/toko/produk/add', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk harus diisi',
                ]
            ],
            'img_path' => [
                'rules' => 'max_size[img_path,1024]|is_image[img_path]|mime_in[img_path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stok Produk tidak boleh kosong',
                    'numeric' => 'Stok Produk harus angka'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga Produk tidak boleh kosong',
                    'numeric' => 'Harga Barang harus angka'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Produk tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/toko/produk/create')->withInput();
        } else {
            //ambil gambar
            $img_path = $this->request->getFile('img_path');
            //apakah tidak ada gambar yang diupload
            if ($img_path->getError() == 4) {
                return redirect()->to('/toko/produk/create')->withInput();
            } else {
                $id_toko = $this->request->getVar('id_toko');
                // generate nama foto produk random
                $namaFotoProduk = $id_toko . "_" . $img_path->getRandomName();
                //pindahkan file ke folder img
                $img_path->move('assets/img_produk', $namaFotoProduk);
            }

            $addNewBarang = $this->ProdukModel->insert([
                'nama_produk' => $this->request->getVar('nama_produk'),
                'img_path' => $namaFotoProduk,
                'kategori_produk' => $this->request->getVar('kategori_produk'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'stok' => $this->request->getVar('stok'),
                'harga' => $this->request->getVar('harga'),
                'id_toko' => $this->request->getVar('id_toko'),
                'status' => "Tersedia",
            ]);
            if ($addNewBarang) {
                $this->sweetAlertSuccess("Data Berhasil Di Simpan");
            } else {
                $this->sweetAlertError("Data Gagal Di Tambahkan");
            }
            return redirect()->to('/toko/produk');
        }
    }
    public function detail()
    {
        $id_produk = $this->request->getVar('id_produk');;
        $produk = $this->ProdukModel->get_produk_by_id_produk($id_produk);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'produk-anda',
            'title' => 'Detail - Barang',
            'validation' => $validation,
            'produk' => $produk,
        ];
        return view('frontend/toko/barang/detail', $data);
    }
    public function edit()
    {
        $uri = current_url(true);
        $id_produk = $uri->getSegment('4');
        $produk = $this->ProdukModel->get_produk_by_id_produk($id_produk);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'produk-anda',
            'title' => 'Edit - Barang',
            'validation' => $validation,
            'id_toko' => $produk['id_toko'],
            'kategori' => $this->KategoriModel->findAll(),
            'produk' => $produk,
            'kategori' => $this->KategoriModel->findAll(),
        ];
        return view('frontend/toko/produk/edit', $data);
    }
    public function update()
    {
        $id_produk = $this->request->getVar('id_produk');
        $id_toko = $this->request->getVar('id_toko');
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang harus diisi',
                ]
            ],
            'img_path' => [
                'rules' => 'max_size[img_path,1024]|is_image[img_path]|mime_in[img_path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stok Barang tidak boleh kosong',
                    'numeric' => 'Stok Barang harus angka'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga Barang tidak boleh kosong',
                    'numeric' => 'Harga Barang harus angka'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Barang tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/toko/produk/edit')->withInput();
        } else {
            //ambil gambar
            $img_path = $this->request->getFile('img_path');
            //apakah tidak ada gambar yang diupload
            if ($img_path->getError() == 4) {
                $updateProduk = $this->ProdukModel->update(
                    [
                        'id_produk' => $id_produk
                    ],
                    [
                        'nama_produk' => $this->request->getVar('nama_produk'),
                        'kategori_produk' => $this->request->getVar('kategori_produk'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                        'stok' => $this->request->getVar('stok'),
                        'harga' => $this->request->getVar('harga'),
                        'id_toko' => $this->request->getVar('id_toko'),
                        'status' => "Tersedia",
                    ]
                );
            } else {
                // generate nama foto barang random
                $namaFotoProduk = $id_toko . "_" . $img_path->getRandomName();
                //pindahkan file ke folder img
                $img_path->move('assets/img_produk', $namaFotoProduk);
                $updateProduk = $this->ProdukModel->update(
                    [
                        'id_produk' => $id_produk
                    ],
                    [
                        'id_produk' => $this->request->getVar('id_produk'),
                        'nama_produk' => $this->request->getVar('nama_produk'),
                        'img_path' => $namaFotoProduk,
                        'kategori_produk' => $this->request->getVar('kategori_produk'),
                        'deskripsi' => $this->request->getVar('deskripsi'),
                        'stok' => $this->request->getVar('stok'),
                        'harga' => $this->request->getVar('harga'),
                        'id_toko' => $this->request->getVar('id_toko'),
                        'status' => "Tersedia",
                    ]
                );
            }

            if ($updateProduk) {
                $this->sweetAlertSuccess("Produk Berhasil Diupdate");
            } else {
                $this->sweetAlertError(("Produk Gagal Diupdate"));
            }
            return redirect()->to('/toko/produk');
        }
    }
    public function delete()
    {
        $id_produk = $this->request->getVar('id_produk');
        if ($id_produk) {


            $produk = $this->ProdukModel->where('id_produk', $id_produk)->first();
            if ($produk) {
                $path = 'assets/img_produk/' . $produk['img_path'];
                $hapus_gambar = unlink($path);
                if ($hapus_gambar) {
                    $deleteProduk = $this->ProdukModel->where('id_produk', $id_produk)->delete();
                    if ($deleteProduk) {
                        $this->sweetAlertSuccess("Produk Berhasil Dihapus");
                    } else {
                        $this->sweetAlertError("Produk Gagal Dihapus");
                    }
                } else {
                    $this->sweetAlertError("Gambar Produk Gagal Dihapus");
                }
            } else {
                $this->sweetAlertError("Id Produk Salah, Data Tidak Ditemukan");
            }
        } else {
            $this->sweetAlertError("Ada kesalahan saat passing id produk");
        }
        return redirect()->to('/toko/produk');
    }
}
