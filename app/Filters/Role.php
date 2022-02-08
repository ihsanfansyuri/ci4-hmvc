<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Role implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $admin = array('dashboard', 'pembalap', 'team', 'user');
        $user = array('dashboard', 'pembalap', 'team');
        $currentSegment = $request->uri->getSegment(1);

        $role = session()->get('role');
        if ($role == 'admin' && in_array($currentSegment, $admin)) {
            return;
        } elseif ($role == 'user' && in_array($currentSegment, $user)) {
            return;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Halaman yang anda cari tidak ada');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
