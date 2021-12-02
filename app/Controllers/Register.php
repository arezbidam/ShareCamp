<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();;
    }
    
    public function index()
    {
      $data_pendaftaran = [
        $email_reg = $this->request->getVar('email'),
        $password_reg = $this->request->getVar('password'),
        $nama_reg = $this->request->getVar('nama'),
      ];
      // dd($this->request->getVar());
      $this->UserModel->save([
        'email' => $email_reg,
        'password' => $password_reg,
        'nama' => $nama_reg,
      ]);

      $data_Session = [
        'id' => $this->UserModel->where('email', $email_reg),
        'email' => $email_reg,
        'password' => $password_reg,
        'nama' => $nama_reg,
      ];
      session()->set($data_Session);
      return redirect()->to('Profile');
    }
}