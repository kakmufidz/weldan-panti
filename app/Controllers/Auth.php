<?php

namespace App\Controllers;

use App\Models\Manager;

class Auth extends BaseController
{
    function __construct()
    {
        $this->session = session();
    }
    
    public function login()
    {
        var_dump($_POST);
        die;
        $mmanager = new Manager();
        $dataManager = $mmanager->where(array('email' => $_POST['email']))->first();
        if (!empty($dataManager)) {
            $login_data = $dataManager;
            $verify_pass = password_verify($_POST['password'], $login_data['password']);
            if ($verify_pass) {
                session()->set(array(
                    'NAMA' => $login_data['nama'],
                    'EMAIL' => $login_data['email'],
                    'ID_PANTI' => $login_data['id_panti'],
                    'ROLE' => $login_data['role'],
                    'LOGGED_IN' => TRUE
                ));
                $data['login'] = 'accepted';
            } else {
                $data['error'] = 'Email atau Password Salah';
            }
        } else {
            $data['error'] = 'Email atau Password Salah';
        }
        echo json_encode($data);
    }

    public function logout()
    {
        $array_items = array('NAMA', 'EMAIL', 'ROLE', 'LOGGED_IN');
        $this->session->remove($array_items);
        return redirect()->to(base_url());
    }
}
