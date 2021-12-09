<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
    }
    
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'data_user' => $this->UserModel->where('id_user', session()->get('id'))->first(),
        ];
        // dd($data);
        return view('pages/profile-v', $data);
    }

    public function update($id)
    {
        // $data = [
        //     'id' => $id,
        //     'nama' => $this->request->getVar('nama'),
        //     'no_tlp' => $this->request->getVar('no_tlp'),
        //     'kota' => $this->request->getVar('kota'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];
        $password = $this->UserModel->where('id_user', $id)->first();
        $password = $password['password'];
        // dd($password);
        
        if($this->request->getVar('passwordConfirmation') !== $password){
            session()->setFlashdata('err_pass_confrm', 'Anda salah memasukan password');
        } else {
            // dd($this->request->getVar('nama_bank'));
            $this->UserModel->save([
                'id_user' => $id,
                'nama' => $this->request->getVar('nama'),   
                'no_tlp' => $this->request->getVar('no_tlp'),
                'kota' => $this->request->getVar('kota'),   
                'alamat' => $this->request->getVar('alamat'),
                'no_rek' => $this->request->getVar('no_rek'),
                'nama_bank' => $this->request->getVar('nama_bank'),
                'atas_nama_bank' => $this->request->getVar('atas_nama_bank'),
            ]);

            if ($this->UserModel->affectedRows() > 0) {
                session()->setFlashdata('profile_updated', 'berhasil mengupdate profil');
            } else {
                session()->setFlashdata('err_profile_update', 'Gagal mengupdate profil');
            }
        }

        return redirect()->to('profile');
    }
}