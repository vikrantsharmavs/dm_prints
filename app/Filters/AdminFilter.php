<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('superAdmin') != true) {
            return redirect()->to(
                site_url('/')
            );
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // $session = session();
        // if ($session->get('logged_in') == TRUE) {
        //     return redirect()->to(site_url('home'));
        // }
    }
}
