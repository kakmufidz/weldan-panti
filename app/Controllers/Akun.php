<?php

namespace App\Controllers;

use App\Models\Manager;
use App\Models\Users;

class Akun extends BaseController
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = session();
        helper(['currency_helper', 'date_helper']);
    }

    public function index()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        $mmanager = new Manager();
        $dataManager = $mmanager->where(array('email' => $this->session->get('EMAIL')))->first();
        $data = [
            "page_title" => "Akun",
            "session" => $this->session->get(),
            "user" => $dataManager
        ];
        return view('akun/akun', $data);
    }

    public function proses()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        if ($_GET['act'] == "update") {
            $validationRule = [
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required'
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required'
                ],
                'no_hp' => [
                    'label' => 'No HP',
                    'rules' => 'required'
                ],
                'password_baru' => [
                    'label' => 'Password Baru',
                    'rules' => 'required'
                ],
                'password_ulang' => [
                    'label' => 'Password Ulang',
                    'rules' => 'required'
                ],
            ];

            $notempty = [];
            foreach ($_POST as $name => $val) {
                if (!empty($val)) {
                    array_push($notempty, $name);
                }
            }
            if (!$this->validate($validationRule)) {
                $data = [
                    'notempty' => $notempty,
                    'errors' => $this->validator->getErrors()
                ];
            } else {
                $mmanager = new Manager();
                $dataManager = $mmanager->where(array('email' => $this->session->get('EMAIL')))->first();
                if (!empty($dataUser)) {
                    $login_data = $dataManager;
                    $verify_pass = password_verify($_POST['password_lama'], $login_data['password']);
                    if ($verify_pass) {
                        $newPassword = password_hash($_POST['password_baru'], PASSWORD_BCRYPT);
                        $updatePassword = $this->db->table("user_manager")->update(['password' => $newPassword], ['id' => $_POST['id']]);
                        $data['update'] = $updatePassword;
                    } else {
                        $data = [
                            'notempty' => $notempty,
                            'errors' => ["password_lama" => "Password lama salah"]
                        ];
                    }
                } else {
                    $data = [
                        'notempty' => $notempty,
                        'errors' => ["password_lama" => "Password lama salah"]
                    ];
                }
            }
            echo json_encode($data);
        }
    }
}
