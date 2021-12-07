<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\CategoriesModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->CategoriesModel = new CategoriesModel();;
        $this->TokoModel = new TokoModel();;
        $this->BarangModel = new BarangModel();;
    }

    public function index()
    {
        $toko = $this->TokoModel->get_toko(session()->get('id'));
        $barang = $this->BarangModel->get_barang($toko['id_toko']);
        $data = [
            'title' => 'Toko Saya',
            'categories' => $this->CategoriesModel->findAll(),
            'toko' => $toko,
            'barang' => $barang
        ];
        return view('toko/toko_saya', $data);
    }
    public function create()
    {
        $id_user = $this->request->getVar('id_user');
        $toko_saya = $this->TokoModel->get_toko($id_user);
        // dd($toko_saya);
        if ($toko_saya) {
            session()->setFlashdata('pesan', 'Anda Sudah Punya Toko');
            return view('toko');
        } else {
            $validation =  \Config\Services::validation();
            $data = [
                'title' => 'Toko Saya',
                'toko' => $toko_saya,
                'validation' => $validation
            ];
            return view('toko/create', $data);
        }
    }
    public function save()
    {
        if (!$this->validate([
            'id_user' => [
                'rules' => 'required|is_unique[tb_toko.id_user]',
                'errors' => [
                    'required' => 'Id User harus diisi',
                    'is_unique' => 'Anda sudah memiliki Toko'
                ]
            ],
            'nama_toko' => [
                'rules' => 'required|is_unique[tb_toko.nama_toko]',
                'errors' => [
                    'required' => 'Nama Toko harus diisi',
                    'is_unique' => 'Nama Toko sudah digunakan'
                ]
            ],
            'alamat_toko' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Alamat Toko tidak boleh kosong',
                ]
            ],
            'no_telp_toko' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Telepon Toko tidak boleh kosong',
                    'numeric' => 'Nomor Telepon Toko harus angka'
                ]
            ],
            'deskripsi_toko' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Toko harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/toko/create')->withInput();
        } else {
            $createNewToko = $this->TokoModel->insert([
                'nama_toko' => $this->request->getVar('nama_toko'),
                'alamat_toko' => $this->request->getVar('alamat_toko'),
                'no_telp_toko' => $this->request->getVar('no_telp_toko'),
                'deskripsi_toko' => $this->request->getVar('deskripsi_toko'),
                'id_user' => $this->request->getVar('id_user'),
                'status_toko' => "Menunggu Konfirmasi",
            ]);
            if ($createNewToko) {
                session()->setFlashdata('pesan', 'Registrasi Toko Berhasil');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
            }
            return redirect()->to('/toko');
        }
    }
    public function create_barang()
    {
        $id_user = session()->get('id');
        $toko_saya = $this->TokoModel->get_toko($id_user);
        $validation =  \Config\Services::validation();
        $data = [
            'title' => 'Tambah - Barang',
            'validation' => $validation,
            'id_toko' => $toko_saya['id_toko']
        ];
        return view('toko/barang/create', $data);
    }
    public function save_barang()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang harus diisi',
                ]
            ],
            'foto_barang_path' => [
                'rules' => 'max_size[foto_barang_path,1024]|is_image[foto_barang_path]|mime_in[foto_barang_path,image/jpg,image/jpeg,image/png]',
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
            return redirect()->to('/toko/barang/create')->withInput();
        } else {

            //ambil gambar
            $fileFotoBarang = $this->request->getFile('foto_barang_path');
            //apakah tidak ada gambar yang diupload
            if ($fileFotoBarang->getError() == 4) {
                return redirect()->to('/toko/barang/create')->withInput();
            } else {
                $id_toko = $this->request->getVar('id_toko');
                // generate nama foto barang random
                $namaFotoBarang = $id_toko . "_" . $fileFotoBarang->getRandomName();
                //pindahkan file ke folder img
                $fileFotoBarang->move('assets/img_barang', $namaFotoBarang);
            }

            $addNewBarang = $this->BarangModel->insert([
                'nama_barang' => $this->request->getVar('nama_barang'),
                'foto_barang_path' => $namaFotoBarang,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'stok' => $this->request->getVar('stok'),
                'harga' => $this->request->getVar('harga'),
                'id_toko' => $this->request->getVar('id_toko'),
                'status' => "Tersedia",
            ]);
            if ($addNewBarang) {
                session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
            }
            return redirect()->to('/toko');
        }
    }
    public function detail_barang()
    {
        $id_barang = $this->request->getVar('id_barang');;
        $barang = $this->BarangModel->get_barang_by_id_barang($id_barang);
        $validation =  \Config\Services::validation();
        $data = [
            'title' => 'Tambah - Barang',
            'validation' => $validation,
            'barang' => $barang,
        ];
        return view('toko/barang/detail', $data);
    }
}
