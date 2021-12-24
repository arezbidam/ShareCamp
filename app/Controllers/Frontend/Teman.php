<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\ShareCampModel;
use App\Models\KotaModel;
use App\Models\JoinShareCampModel;


class Teman extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->KategoriModel = new KategoriModel();;
        $this->ShareCampModel = new ShareCampModel();;
        $this->KotaModel = new KotaModel();;
        $this->JoinShareCampModel = new JoinShareCampModel();;
        $this->ProdukModel = new ProdukModel();;
    }
    public function index()
    {
        // $sharecamp = $this->ShareCampModel->join('tb_user', 'tb_user.id_user=tb_sharecamp.id_user')->orderBy('created_at', 'DESC')->findAll();
        $kota = $this->KotaModel->findAll();
        $filter_kota = $this->request->getVar('filter_kota');
        if ($filter_kota) {
            $data_sharecamp = $this->ShareCampModel
                ->join('tb_user', 'tb_user.id_user=tb_sharecamp.id_user')
                ->where('tb_sharecamp.kota', $filter_kota)
                ->paginate(10, 'sharecamp');
            if (!$data_sharecamp) {
                $this->sweetAlertError("Data Tidak Ditemukan");
                return redirect()->to('cari-teman');
            }
        } else {
            $data_sharecamp = $this->ShareCampModel
                ->join('tb_user', 'tb_user.id_user=tb_sharecamp.id_user')
                ->paginate(10, 'sharecamp');
        }
        $currentPage = $this->request->getVar('page_sharecamp') ? $this->request->getVar('page_sharecamp') : 1;
        $data = [
            'pages' => 'cari-teman',
            'title' => 'Cari Teman',
            'kategori' => $this->KategoriModel->findAll(),
            'kota' => $kota,
            'sharecamp' => $data_sharecamp,
            'join_sharecamp' => $this->JoinShareCampModel->join('tb_user', 'tb_user.id_user=tb_join_sharecamp.id_user')->findAll(),
            'pager' => $data_sharecamp = $this->ShareCampModel->join('tb_user', 'tb_user.id_user=tb_sharecamp.id_user')->pager,
            'currentPage' => $currentPage
        ];
        return view('frontend/teman/teman', $data);
    }
    public function add()
    {
        $kota = $this->KotaModel->findAll();
        $data = [
            'pages' => 'cari-teman',
            'title' => 'Cari Teman',
            'kota' => $kota,
            'kategori' => $this->KategoriModel->findAll(),
        ];
        return view('frontend/teman/add', $data);
    }
    public function save()
    {
        $data = [
            'dari_tgl' => $this->request->getVar('dari_tgl'),
            'sampai_tgl' => $this->request->getVar('sampai_tgl'),
            'tujuan' => $this->request->getVar('tujuan'),
            'kota' => $this->request->getVar('kota'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_user' => $this->request->getVar('id_user'),
        ];
        $new_thread = $this->ShareCampModel->insert($data);
        if ($new_thread) {
            $this->sweetAlertSuccess("Berhasil Membuat Thread Baru");
            return redirect()->to('cari-teman');
        } else {
            $this->sweetAlertError("Gagal Membuat Thread Baru");
            return redirect()->to('cari-teman');
        }
    }
    public function join()
    {
        $data = [
            'no_sharecamp' => $this->request->getVar('no_sharecamp'),
            'id_user' => session()->get('id'),
        ];
        $new_thread = $this->JoinShareCampModel->insert($data);
        if ($new_thread) {
            $this->sweetAlertSuccess("Berhasil Bergabung");
            return redirect()->to('cari-teman');
        } else {
            $this->sweetAlertError("Gagal Bergabung");
            return redirect()->to('cari-teman');
        }
    }
    public function hapus()
    {
        $no_sharecamp = [
            'no_sharecamp' => $this->request->getVar('no_sharecamp'),
        ];
        $this->ShareCampModel->transStart();
        $this->ShareCampModel->where($no_sharecamp)->delete();
        $this->JoinShareCampModel->where($no_sharecamp)->delete();
        $this->ShareCampModel->transComplete();
        if ($this->ShareCampModel->transStatus()) {
            $this->sweetAlertSuccess("Berhasil Hapus");
            return redirect()->to('cari-teman');
        } else {
            $this->sweetAlertError("Gagal Hapus");
            return redirect()->to('cari-teman');
        }
    }
    public function keluar()
    {
        $id_join_sharecamp = [
            'id_join_sharecamp' => $this->request->getVar('id_join_sharecamp'),
        ];
        // dd($id_join_sharecamp);
        $keluar =  $this->JoinShareCampModel->where($id_join_sharecamp)->delete();
        if ($keluar) {
            $this->sweetAlertSuccess("Berhasil Keluar");
            return redirect()->to('cari-teman');
        } else {
            $this->sweetAlertError("Gagal Keluar");
            return redirect()->to('cari-teman');
        }
    }
}
