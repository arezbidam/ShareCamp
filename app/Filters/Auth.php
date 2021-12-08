<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
        if (!session()->get('masuk')) {
            // maka redirct ke halaman login
            session()->setFlashdata('pesan', '
            <script>
            Swal.fire(
                "Oopss!",
                "Anda Tidak Punya Akses Ke Halaman Ini! <br> Silahkan Login Terlebih Dahulu",
                "error"
                ).then(function() {
                    });
                    </script>
                    ');
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
