<?php

namespace App\Controllers;

class TempSession extends BaseController
{
    public function __construct()
    {
    }
    
    public function index()
    {
        $data = [
            'title' => 'Alert',
        ];
        return view('pages/temp_session', $data);
    }
}