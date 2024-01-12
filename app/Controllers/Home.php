<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        helper(['date_helper', 'currency_helper']);
    }

    public function index()
    {
        if ($this->session->get('NAMA') !== null)  return redirect()->to(base_url('dashboard'));
        $data = [
            "page_title" => "Smart Panti",
            "session" => $this->session->get()
        ];
        return view('front_page', $data);
    }
}
