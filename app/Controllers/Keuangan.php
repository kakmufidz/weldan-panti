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

    public function edit()
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
        return view('keuangan/edit_pengeluaran', $data);
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
                'harga' => [
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
        } elseif ($_GET['act'] == "delete_itemPengeluaran") {
            $delete =  $this->db->table("item_pengeluaran")->update(['deleted_at' => date("Y-m-d H:i:s")], ['id' => $_POST['id']]);
            $mitem = new ItemPengeluaran();
            $item = $mitem->where(['id' => $_POST['id']])->get()->getRowArray();
            $dataItem = $mitem->select('total_harga')->where(['id_pengeluaran' => $item['id_pengeluaran'], 'deleted_at' => null])->get()->getResultArray();
            $total = 0;
            foreach ($dataItem as $harga) {
                $total += $harga['total_harga'];
            }
            $updatetotalpengeluaran = $this->db->table("pengeluaran")->update(['total_pengeluaran' => $total], ['id' => $item['id_pengeluaran']]);
            $data = [
                "delete" => $delete
            ];
            echo json_encode($data);
        } elseif ($_GET['act'] == "delete_file") {
            $pengeluaran = $this->db->table("pengeluaran")->select("*")->where("id", $_POST['id'])->get()->getRowArray();
            $file = json_decode($pengeluaran['file']);
            foreach ($file as $key => $value) {
                if ($_POST['file'] == $value) {
                    unset($file[$key]);
                }
            }
            $updateFile = $this->db->table("pengeluaran")->update(['file' => json_encode($file)], ['id' => $_POST['id']]);
            if ($updateFile) {
                $fileName = $_POST['file'];
                $uploadedFilePath = FCPATH . 'uploads/pengeluaran/' . $fileName;
                if (file_exists($uploadedFilePath)) {
                    unlink($uploadedFilePath);
                }
            }
            $data = [
                "update" => $updateFile
            ];
            echo json_encode($data);
        } elseif ($_GET['act'] == "update_pengeluaran") {
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
                'harga' => [
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
                $updateData = $this->db->table("pengeluaran")->update($input_data, ['id' => $_POST['idPengeluaran']]);
                $countItem = sizeof($_POST['item']);
                for ($i = 0; $i < $countItem; $i++) {
                    $item = $_POST['item'][$i];
                    $harga = $_POST['harga'][$i];
                    $jumlah = $_POST['jumlah'][$i];
                    $totalHarga = $_POST['totalHarga'][$i];
                    $data_item = [
                        'id_pengeluaran' => $_POST['idPengeluaran'],
                        'item' => $item,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'total_harga' => $totalHarga,
                    ];
                    if ($_POST['idItemPengeluaran'][$i] == 'new') {
                        $mitem->save($data_item);
                    } else {
                        $this->db->table("item_pengeluaran")->update($data_item, ['id' => $_POST['idItemPengeluaran'][$i]]);
                    }
                }
                if (!empty($_FILES['fileUpload']['name'][0])) {
                    $files = $this->request->getFiles();
                    $pengeluaran = $this->db->table("pengeluaran")->select("*")->where("id", $_POST['idPengeluaran'])->get()->getRowArray();
                    $file = json_decode($pengeluaran['file']);
                    $newFile = (is_array($file)) ? $file : $file = [];
                    foreach ($files['fileUpload'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $newName = $file->getRandomName();
                            array_push($newFile, $newName);
                            $file->move(FCPATH . 'uploads/pengeluaran', $newName);
                        }
                    }
                    $this->db->table("pengeluaran")->update(['file' => json_encode($newFile)], ['id' => $_POST['idPengeluaran']]);
                }
                $data = [
                    "update" => $updateData
                ];
            }
            echo json_encode($data);
        }
    }
}
