<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
        $this->TokoModel = new TokoModel();
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Toko',
            'toko' => $this->TokoModel->findAll(),
        ];
        return view('admin/toko/toko', $data);
    }
    public function delete()
    {
        $id_toko = [
            'id_toko' => $this->request->getVar('id_toko'),
        ];
        $this->TokoModel->transStart();
        $this->TokoModel->where($id_toko)->delete();
        $this->ProdukModel->where($id_toko)->delete();
        $this->TokoModel->transComplete();
        if ($this->TokoModel->transStatus()) {
            $this->sweetAlertSuccess("Berhasil Hapus Toko");
            return redirect()->to('admin/toko');
        } else {
            $this->sweetAlertError("Gagal Hapus Toko");
            return redirect()->to('admin/toko');
        }
    }
    public function detail()
    {
        $uri = current_url(true);
        $id_toko = $uri->getSegment('3');
        $detail_toko = $this->TokoModel->join('tb_user', 'tb_user.id_user=tb_toko.id_user')->where(['tb_toko.id_toko' => $id_toko])->first();
        $data = [
            'title' => 'Toko',
            'detail_toko' => $detail_toko,
        ];
        return view('admin/toko/detail', $data);
    }
    public function acc()
    {
        $saveToko = $this->TokoModel->save([
            'id_toko' => $this->request->getVar('id_toko'),
            'status_toko' => "APPROVED",
        ]);
        if ($saveToko) {
            session()->setFlashdata('pesan', '
                <div class="alert alert-success">
                Update Berhasil
                </div>
                ');
        } else {
            session()->setFlashdata('pesan', '
                <div class="alert alert-danger">
                Update Gagal
                </div>
                ');
        }
        return redirect()->to('/admin/toko');
    }
    public function tolak()
    {
        $saveToko = $this->TokoModel->save([
            'id_toko' => $this->request->getVar('id_toko'),
            'status_toko' => "DITOLAK",
        ]);
        if ($saveToko) {
            session()->setFlashdata('pesan', '
                <div class="alert alert-success">
                Update Berhasil
                </div>
                ');
        } else {
            session()->setFlashdata('pesan', '
                <div class="alert alert-danger">
                Update Gagal
                </div>
                ');
        }
        return redirect()->to('/admin/toko');
    }
}
