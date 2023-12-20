<?php

namespace App\Controllers;

use App\Models\ItemPengeluaran;
use App\Models\Pengeluaran;

class Keuangan extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->db = \Config\Database::connect();
        helper('currency_helper');
    }

    public function index()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        $data = [
            "page_title" => "Keuangan",
            "session" => $this->session->get()
        ];
        return view('keuangan/keuangan', $data);
    }

    public function tambah_keuangan()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        $data = [
            "page_title" => "Tambah Data Pengeluaran",
            "session" => $this->session->get()
        ];
        return view('keuangan/tambah_keuangan', $data);
    }

    public function get_data()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        if ($_GET['act'] == "tabel-keuangan") {
            $id_panti = $this->session->get('ID_PANTI');
            $mpengeluaran = new Pengeluaran();
            $dataKeuangan = $mpengeluaran->where(['id_panti' => $id_panti, 'deleted_at' => null])->get()->getResultArray();
            $data = [
                "keuangan" => $dataKeuangan
            ];
            return view('keuangan/tabel_keuangan', $data);
        }
    }

    public function view()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        if (!isset($_GET['id'])) return redirect()->to(base_url());
        $mpengeluaran = new Pengeluaran();
        $mitem = new ItemPengeluaran();
        $dataPengeluaran = $mpengeluaran->where(['id' => $_GET['id'], 'deleted_at' => null])->get()->getRowArray();
        $dataItem = $mitem->where(['id_pengeluaran' => $_GET['id'], 'deleted_at' => null])->get()->getResultArray();
        $data = [
            "page_title" => "Detail Pengeluaran",
            "session" => $this->session->get(),
            "pengeluaran" => $dataPengeluaran,
            "dataItem" => $dataItem,
        ];
        return view('keuangan/view_pengeluaran', $data);
    }

    public function proses()
    {
        if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
        if ($_GET['act'] == "add_pengeluaran") {
            $validationRule = [
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required'
                ],
                'judul' => [
                    'label' => 'Judul',
                    'rules' => 'required'
                ],
                'item' => [
                    'label' => 'Item',
                    'rules' => 'required'
                ],
                'jumlah' => [
                    'label' => 'jumlah',
                    'rules' => 'required'
                ],
            ];

            if (!empty($_FILES['fileUpload']['name'])) {
                $validationRule['fileUpload'] = [
                    'label' => 'File',
                    'rules' => [
                        'mime_in[fileUpload,image/jpg,image/jpeg,image/png,image/webp,application/pdf]',
                        'max_size[fileUpload,1024]',
                    ],
                ];
            }
            if (!$this->validate($validationRule)) {
                $notempty = [];
                foreach ($_POST as $name => $val) {
                    if (!empty($val)) {
                        array_push($notempty, $name);
                    }
                }
                $data = [
                    'notempty' => $notempty,
                    'errors' => $this->validator->getErrors()
                ];
            } else {
                $id_panti = $this->session->get('ID_PANTI');
                $tanggal = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['tanggal'])));
                $input_data = [
                    'id_panti' => $id_panti,
                    'tgl_pengeluaran' => $tanggal,
                    'judul' => $_POST['judul'],
                    'total_pengeluaran' => $_POST['totalPengeluaran'],
                    'keterangan' => $_POST['keterangan'],
                ];
                $mpengeluaran = new Pengeluaran();
                $mitem = new ItemPengeluaran();
                $data['insert'] = $mpengeluaran->save($input_data);
                $lastInsertId = $this->db->insertID();
                $countItem = sizeof($_POST['item']);
                for ($i = 0; $i < $countItem; $i++) {
                    $item = $_POST['item'][$i];
                    $harga = $_POST['harga'][$i];
                    $jumlah = $_POST['jumlah'][$i];
                    $totalHarga = $_POST['totalHarga'][$i];
                    $data_item = [
                        'id_pengeluaran' => $lastInsertId,
                        'item' => $item,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'total_harga' => $totalHarga,
                    ];
                    $mitem->save($data_item);
                }
                if (!empty($_FILES['fileUpload']['name'][0])) {
                    $files = $this->request->getFiles();
                    $nameFile = [];
                    foreach ($files['fileUpload'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $newName = $file->getRandomName();
                            array_push($nameFile, $newName);
                            $file->move(FCPATH . 'uploads/pengeluaran', $newName);
                        }
                    }
                    $this->db->table("pengeluaran")->update(['file' => json_encode($nameFile)], ['id' => $lastInsertId]);
                }
            }
            echo json_encode($data);
        } elseif ($_GET['act'] == "delete_keuangan") {
            $delete =  $this->db->table("pengeluaran")->update(['deleted_at' => date("Y-m-d H:i:s")], ['id' => $_POST['id']]);
            $data = [
                "delete" => $delete
            ];
            echo json_encode($data);
        } elseif ($_GET['act'] == "delete_foto") {
            $donatur = $this->db->table("donatur")->select("*")->where("id", $_POST['id'])->get()->getRowArray();
            $gambar = json_decode($donatur['foto']);
            foreach ($gambar as $key => $value) {
                if ($_POST['gambar'] == $value) {
                    unset($gambar[$key]);
                }
            }
            $updateGambar = $this->db->table("donatur")->update(['foto' => json_encode($gambar)], ['id' => $_POST['id']]);
            if ($updateGambar) {
                $fileName = $_POST['gambar'];
                $uploadedFilePath = FCPATH . 'uploads/foto_donatur/' . $fileName;
                if (file_exists($uploadedFilePath)) {
                    unlink($uploadedFilePath);
                }
            }
            $data = [
                "update" => $updateGambar
            ];
            echo json_encode($data);
        } elseif ($_GET['act'] == "update_donatur") {
            $validationRule = [
                'namaDonatur' => [
                    'label' => 'Nama donatur',
                    'rules' => 'required'
                ]
            ];

            if (!empty($_FILES['fotoDonatur']['name'])) {
                $validationRule['fotoDonatur'] = [
                    'label' => 'Foto',
                    'rules' => [
                        'mime_in[fotoDonatur,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[fotoDonatur,1024]',
                    ],
                ];
            }
            if (!$this->validate($validationRule)) {
                $notempty = [];
                foreach ($_POST as $name => $val) {
                    if (!empty($val)) {
                        array_push($notempty, $name);
                    }
                }
                $data = [
                    'notempty' => $notempty,
                    'errors' => $this->validator->getErrors()
                ];
            } else {
                $id_panti = $this->session->get('ID_PANTI');
                $input_donatur = array(
                    'nama' => $_POST['namaDonatur'],
                    'nohp' => $_POST['nohp'],
                    'rt' => $_POST['rt'],
                    'rw' => $_POST['rw'],
                    'desa' => $_POST['desa'],
                    'kecamatan' => $_POST['kecamatan'],
                    'kabupaten' => $_POST['kabupaten'],
                    'provinsi' => $_POST['provinsi'],
                    'negara' => "Indonesia"
                );
                $mdonatur = new ModelsDonatur();
                $updateData = $this->db->table("donatur")->update($input_donatur, ['id' => $_POST['idDonatur']]);
                if (!empty($_FILES['fotoDonatur']['name'])) {
                    $files = $this->request->getFiles();
                    $nameGambar = [];
                    if ($files['fotoDonatur']->isValid() && !$files['fotoDonatur']->hasMoved()) {
                        $newName = $files['fotoDonatur']->getRandomName();
                        array_push($nameGambar, $newName);
                        $files['fotoDonatur']->move(FCPATH . 'uploads/foto_donatur', $newName);
                    }
                    $this->db->table("donatur")->update(['foto' => json_encode($nameGambar)], ['id' => $_POST['idDonatur']]);
                }
                $data = [
                    "update" => $updateData
                ];
            }
            echo json_encode($data);
        }
    }
}
