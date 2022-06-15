<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Login extends BaseController
{
    public function index()
    {
        $model = new CommonModel();
        $session = session();
        $data['title'] =  title('Login');
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate(
                [
                    'username' =>  ['label' => 'Username', 'rules' => 'trim|required'],
                    'password' => ['label' => 'Password', 'rules' => 'trim|required'],
                ]
            );
            if ($rules == true) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $row =  $model->fetchRow("superadmin", array('username' => $username));
                if (empty($row)) {
                    $session->setFlashdata('error', 'Username is not valid');
                    return view('pages/auth/login', $data);
                } else if (password_verify($password, $row->password)) {
                    $data = array(
                        'username' => $row->username,
                        'superAdmin' => true,
                    );
                    $session->set($data);
                    $session->setFlashdata('msg', 'login successful');
                    return redirect()->to(site_url('dashboard'));
                } else {
                    $session->setFlashdata('error', 'Password is not valid');
                    return view('pages/auth/login', $data);
                }
            } else {
                return view('pages/auth/login', $data);
            }
        } else {
            return view('pages/auth/login', $data);
        }
    }
    public function logout()
    {
        $session = session();
        $data = [
            'username', 'superAdmin'
        ];
        $session->remove($data);
        $session->setFlashdata('logout', 'successfully Logout');
        return redirect()->to(site_url('/'));
    }
}
