<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->role != "admin") {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Halaman yang anda cari tidak ada");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // if (session()->role == "user") {
        //     return redirect()->to('/user/dashboard');
        // }
    }
}
