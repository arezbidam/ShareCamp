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
        ];
        return view('pages/profile-v', $data);
    }
}