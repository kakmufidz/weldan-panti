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
        helper(['date_helper', 'currency_helper']);
    }

    public function index()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        $data = [
            "page_title" => "Dashboard Manager",
            "session" => $this->session->get()
        ];
        return view('dashboard/dashboard', $data);
    }

    public function get_data()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        if ($_GET['act'] == "reportData") {
            $id_panti = $this->session->get('ID_PANTI');
            $manak = new Anak_asuh();
            $dataAnakAktif = $manak->where(['id_panti' => $id_panti, 'status_anak' => 'Aktif', 'status_panti' => 'Anak Asuh Mukim', 'deleted_at' => null])->get()->getResultArray();
            $dataAnakDalam = $manak->where(['id_panti' => $id_panti, 'status_panti' => 'Anak Asuh Mukim', 'deleted_at' => null])->get()->getResultArray();
            $dataAnakLuar = $manak->where(['id_panti' => $id_panti, 'status_panti' => 'Anak Asuh Luar', 'deleted_at' => null])->get()->getResultArray();
            $mdonatur = new Donatur();
            $dataDonatur = $mdonatur->where(['id_panti' => $id_panti, 'deleted_at' => null])->get()->getResultArray();
            $data = [
                "jumlah_anakAktif" => sizeof($dataAnakAktif),
                "jumlah_anakDalam" => sizeof($dataAnakDalam),
                "jumlah_anakLuar" => sizeof($dataAnakLuar),
                "jumlah_donatur" => sizeof($dataDonatur),
            ];
            return view('dashboard/report_data', $data);
        } elseif ($_GET['act'] == "reportKeuangan") {
            $id_panti = $this->session->get('ID_PANTI');
            $mpemasukan = new Pemasukan();
            $dataJumlahPemasukan = $mpemasukan->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('jumlah')->get()->getRow();
            $dataPemasukanPertama = $mpemasukan->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("id", "ASC")->get()->getRowArray();
            $mpengeluaran = new Pengeluaran();
            $dataTotalPengeluaran = $mpengeluaran->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('total_pengeluaran')->get()->getRow();
            $dataPengeluaranPertama = $mpengeluaran->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("id", "ASC")->get()->getRowArray();

            $total_pemasukan = $dataJumlahPemasukan->jumlah;
            $total_pengeluaran = $dataTotalPengeluaran->total_pengeluaran;
            $saldo_sekarang = $total_pemasukan - $total_pengeluaran;
            $data = [
                "total_pemasukan" => $total_pemasukan,
                "total_pengeluaran" => $total_pengeluaran,
                "saldo_sekarang" => $saldo_sekarang,
                "first_pemasukan" => $dataPemasukanPertama,
                "first_pengeluaran" => $dataPengeluaranPertama
            ];
            return view('dashboard/report_keuangan.php', $data);
        } elseif ($_GET['act'] == "reportRangeKeuangan") {
            if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'] . " 00:00:00";
                $endDate = $_POST['endDate'] . " 23:59:59";
            } else {
                $today = date("Y-m-d");
                $startDate = $today . " 00:00:00";
                $endDate = $today . " 23:59:59";
            }
            $id_panti = $this->session->get('ID_PANTI');
            $mpemasukan = new Pemasukan();
            $dataJumlahPemasukan = $mpemasukan->where('tanggal_pemasukan >=', $startDate)->where('tanggal_pemasukan <=', $endDate)->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('jumlah')->get()->getRow();
            $mpengeluaran = new Pengeluaran();
            $dataTotalPengeluaran = $mpengeluaran->where('tgl_pengeluaran >=', $startDate)->where('tgl_pengeluaran <=', $endDate)->where(['id_panti' => $id_panti, 'deleted_at' => null])->selectSum('total_pengeluaran')->get()->getRow();

            $total_pemasukan = $dataJumlahPemasukan->jumlah;
            $total_pengeluaran = $dataTotalPengeluaran->total_pengeluaran;
            $data = [
                "startDate" => $startDate,
                "endDate" => $endDate,
                "total_pemasukan" => $total_pemasukan,
                "total_pengeluaran" => $total_pengeluaran,
            ];
            return view('dashboard/report_rangekeuangan.php', $data);
        } elseif ($_GET['act'] == "chart_pemasukan") {
            $id_panti = $this->session->get('ID_PANTI');
            $mpemasukan = new Pemasukan();
            $dataPemasukan = $mpemasukan->select("sumber, COUNT(*) as count")->groupBy("sumber")->orderBy("count", "DESC")->where(['id_panti' => $id_panti, 'deleted_at' => null])->limit(4)->get()->getResultArray();
            $data = [
                "trending_pemasukan" => $dataPemasukan,
                "nama" => array_column($dataPemasukan, "sumber"),
                "jumlah" => array_column($dataPemasukan, "count"),
            ];
            echo json_encode($data);
        } elseif ($_GET['act'] == "chart_pengeluaran") {
            $id_panti = $this->session->get('ID_PANTI');
            $mpengeluaran = new Pengeluaran();
            $dataPengeluaran = $mpengeluaran->select("kategori, COUNT(*) as count")->groupBy("kategori")->orderBy("count", "DESC")->where(['id_panti' => $id_panti, 'deleted_at' => null])->limit(4)->get()->getResultArray();
            $data = [
                "trending_pengeluaran" => $dataPengeluaran,
                "nama" => array_column($dataPengeluaran, "kategori"),
                "jumlah" => array_column($dataPengeluaran, "count"),
            ];
            echo json_encode($data);
        }
    }
}
