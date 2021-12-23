<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;
use App\Models\KotaModel;

class Toko extends BaseController
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
        $produk = $this->ProdukModel->get_produk_by_id_toko($toko['id_toko']);
        if ($produk) {
            $data = [
                'pages' => 'toko',
                'title' => 'Toko Saya',
                'kategori' => $this->KategoriModel->findAll(),
                'toko' => $toko,
                'kota' => $kota,
                'produk' => $produk
            ];
        } else {
            $data = [
                'pages' => 'toko',
                'title' => 'Toko Saya',
                'kota' => $kota,
                'toko' => $toko,
                'kategori' => $this->KategoriModel->findAll(),
            ];
        }
        return view('frontend/toko/toko', $data);
    }
    public function create()
    {
        $id_user = $this->request->getVar('id_user');
        $kota = $this->KotaModel->findAll();
        $toko = $this->TokoModel->get_toko($id_user);
        // dd($toko);
        if ($toko) {
            session()->setFlashdata('pesan', 'Anda Sudah Punya Toko');
            return view('toko');
        } else {
            $validation =  \Config\Services::validation();
            $data = [
                'pages' => 'toko',
                'title' => 'Toko Saya',
                'toko' => $toko,
                'kota' => $kota,
                'kategori' => $this->KategoriModel->findAll(),
                'validation' => $validation,
            ];
            return view('frontend/toko/add', $data);
        }
    }
    public function edit()
    {
        $id_toko = $this->request->getVar('id_toko');
        $toko_saya = $this->TokoModel->get_toko_by_id_toko($id_toko);
        $kota = $this->KotaModel->findAll();
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'toko',
            'title' => 'Toko Saya',
            'toko' => $toko_saya,
            'kota' => $kota,
            'kategori' => $this->KategoriModel->findAll(),
            'validation' => $validation,
        ];
        return view('frontend/toko/edit', $data);
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
                'kota_toko' => $this->request->getVar('kota_toko'),
                'no_telp_toko' => $this->request->getVar('no_telp_toko'),
                'deskripsi_toko' => $this->request->getVar('deskripsi_toko'),
                'id_user' => $this->request->getVar('id_user'),
                'status_toko' => "Menunggu Konfirmasi",
            ]);
            if ($createNewToko) {
                $this->sweetAlertSuccess("Registrasi Toko Berhasil");
            } else {
                $this->sweetAlertError("Registrasi Toko Gagal");
            }
            return redirect()->to('/toko');
        }
    }
    public function update()
    {
        if (!$this->validate([
            'nama_toko' => [
                'rules' => 'required',
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
            'kota_toko' => [
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
            return redirect()->to('/toko/edit')->withInput();
        } else {
            $createNewToko = $this->TokoModel->save([
                'id_toko' => $this->request->getVar('id_toko'),
                'nama_toko' => $this->request->getVar('nama_toko'),
                'alamat_toko' => $this->request->getVar('alamat_toko'),
                'kota_toko' => $this->request->getVar('kota_toko'),
                'no_telp_toko' => $this->request->getVar('no_telp_toko'),
                'deskripsi_toko' => $this->request->getVar('deskripsi_toko'),
                'id_user' => $this->request->getVar('id_user'),
            ]);
            if ($createNewToko) {
                $this->sweetAlertSuccess("Update Toko Berhasil");
            } else {
                $this->sweetAlertError("Update Toko Gagal");
            }
            return redirect()->to('/toko');
        }
    }
    public function delete()
    {
        $id_toko = $this->request->getVar('id_toko');
        if ($id_toko) {
            $this->TokoModel->transStart();
            $this->TokoModel->delete(['id_toko' => $id_toko]);
            $this->ProdukModel->where(['id_toko' => $id_toko])->delete();
            $this->TokoModel->transComplete();
            if ($this->TokoModel->transStatus()) {
                $this->sweetAlertSuccess("Data Berhasil Di Hapus.");
            } else {
                $this->sweetAlertError("Data Gagal Di Hapus.");
            }
        } else {
            $this->sweetAlertError("Id Toko Tidak diketahui (null).");
        }
        return redirect()->to('/toko');
    }
}
