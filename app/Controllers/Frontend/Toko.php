<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;

class Toko extends BaseController
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
        $produk = $this->ProdukModel->get_produk_by_id_toko($toko['id_toko']);
        if ($produk) {
            $data = [
                'pages' => 'toko',
                'title' => 'Toko Saya',
                'kategori' => $this->KategoriModel->findAll(),
                'toko' => $toko,
                'produk' => $produk
            ];
        } else {
            $data = [
                'pages' => 'toko',
                'title' => 'Toko Saya',
                'toko' => $toko,
                'kategori' => $this->KategoriModel->findAll(),
            ];
        }
        return view('frontend/toko/toko', $data);
    }
    public function create()
    {
        $id_user = $this->request->getVar('id_user');
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
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'toko',
            'title' => 'Toko Saya',
            'toko' => $toko_saya,
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
    public function create_barang()
    {
        $id_user = session()->get('id');
        $toko_saya = $this->TokoModel->get_toko($id_user);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'toko',
            'title' => 'Tambah - Barang',
            'validation' => $validation,
            'id_toko' => $toko_saya['id_toko'],
            'kategori' => $this->kategoriModel->findAll(),
        ];
        return view('frontend/toko/barang/create', $data);
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
            'foto_produk_path' => [
                'rules' => 'max_size[foto_produk_path,1024]|is_image[foto_produk_path]|mime_in[foto_produk_path,image/jpg,image/jpeg,image/png]',
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
            $fileFotoBarang = $this->request->getFile('foto_produk_path');
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

            $addNewBarang = $this->ProdukModel->insert([
                'nama_barang' => $this->request->getVar('nama_barang'),
                'foto_barang_path' => $namaFotoBarang,
                'kategori_barang' => $this->request->getVar('kategori_barang'),
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
        $produk = $this->ProdukModel->get_barang_by_id_barang($id_barang);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'toko',
            'title' => 'Detail - Barang',
            'validation' => $validation,
            'produk' => $produk,
        ];
        return view('frontend/toko/barang/detail', $data);
    }
    public function edit_barang()
    {
        $id_barang = $this->request->getVar('id_barang');;
        $produk = $this->ProdukModel->get_barang_by_id_barang($id_barang);
        $validation =  \Config\Services::validation();
        $data = [
            'pages' => 'toko',
            'title' => 'Edit - Barang',
            'validation' => $validation,
            'produk' => $produk,
            'kategori' => $this->kategoriModel->findAll(),
        ];
        return view('frontend/toko/barang/edit', $data);
    }
    public function update_barang()
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
            $id_barang = $this->request->getVar('id_barang');
            //ambil gambar
            $fileFotoBarang = $this->request->getFile('foto_barang_path');
            //apakah tidak ada gambar yang diupload
            if ($fileFotoBarang->getError() == 4) {
                $updateBarang = $this->ProdukModel->save([
                    'id_barang' => $this->request->getVar('id_barang'),
                    'nama_barang' => $this->request->getVar('nama_barang'),
                    'kategori_barang' => $this->request->getVar('kategori_barang'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'stok' => $this->request->getVar('stok'),
                    'harga' => $this->request->getVar('harga'),
                    'id_toko' => $this->request->getVar('id_toko'),
                    'status' => "Tersedia",
                ]);
            } else {
                $id_toko = $this->request->getVar('id_toko');
                // generate nama foto barang random
                $namaFotoBarang = $id_toko . "_" . $fileFotoBarang->getRandomName();
                //pindahkan file ke folder img
                $fileFotoBarang->move('assets/img_barang', $namaFotoBarang);
                $updateBarang = $this->ProdukModel->update_barang([
                    'id_barang' => $this->request->getVar('id_barang'),
                    'nama_barang' => $this->request->getVar('nama_barang'),
                    'foto_barang_path' => $namaFotoBarang,
                    'kategori_barang' => $this->request->getVar('kategori_barang'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'stok' => $this->request->getVar('stok'),
                    'harga' => $this->request->getVar('harga'),
                    'id_toko' => $this->request->getVar('id_toko'),
                    'status' => "Tersedia",
                ]);
            }

            if ($updateBarang) {
                session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
            } else {
                session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan');
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
            $this->ProdukModel->delete(['id_toko' => $id_toko]);
            $this->TokoModel->transComplete();
            // $this->PesananModel->delete(['id_toko' => $id_toko]);
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
    public function delete_barang()
    {
        $id = $this->request->getVar('id_barang');
        //cari gambar
        $produk = $this->ProdukModel->find($id);
        if ($produk) {
            $path = 'assets/img_barang/' . $produk['foto_barang_path'];
            //hapus gambar
            unlink($path);
        }
        $this->ProdukModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/toko');
    }
}
