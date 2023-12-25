<?php

namespace App\Controllers;

use App\Models\Anak_asuh;
use App\Models\Donatur;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class Dashboard extends BaseController
{

    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        helper('currency_helper');
    }

    public function index()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        $id_panti = $this->session->get('ID_PANTI');
        $manak = new Anak_asuh();
        $mdonatur = new Donatur();
        $mpemasukan = new Pemasukan();
        $mpengeluaran = new Pengeluaran();
        $dataAnak = $manak->where(['id_panti' => $id_panti, 'status_anak' => 'Aktif', 'deleted_at' => null])->get()->getResultArray();
        $dataDonatur = $mdonatur->where(['id_panti' => $id_panti, 'deleted_at' => null])->get()->getResultArray();
        $dataPemasukan = $mpemasukan->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('jumlah')->get()->getRow();
        $dataPengeluaran = $mpengeluaran->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('total_pengeluaran')->get()->getRow();
        $data = [
            "page_title" => "Dashboard Manager",
            "session" => $this->session->get(),
            "anak" => $dataAnak,
            "donatur" => $dataDonatur,
            "pemasukan" => $dataPemasukan->jumlah,
            "pengeluaran" => $dataPengeluaran->total_pengeluaran,
        ];
        return view('dashboard/dashboard', $data);
    }
}
