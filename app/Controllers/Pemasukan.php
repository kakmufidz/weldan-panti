<?php

namespace App\Controllers;

use App\Models\Donatur;
use App\Models\Pemasukan as ModelsPemasukan;

class Pemasukan extends BaseController
{

  function __construct()
  {
    $this->validation = \Config\Services::validation();
    $this->session = session();
    $this->db = \Config\Database::connect();
    helper(['currency_helper', 'date_helper']);
  }

  public function index()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $id_panti = $this->session->get('ID_PANTI');
    $mdonatur = new Donatur();
    $dataDonatur = $mdonatur->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("id", "DESC")->get()->getResultArray();
    $data = [
      "page_title" => "Donasi & Pemasukan",
      "session" => $this->session->get(),
      "donatur" => $dataDonatur
    ];
    return view('pemasukan/pemasukan', $data);
  }

  public function get_data()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());

    if ($_GET['act'] == "tabel-pemasukan") {
      $id_panti = $this->session->get('ID_PANTI');
      $mpemasukan = new ModelsPemasukan();
      $datamPemasukan = $mpemasukan->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("tanggal_pemasukan DESC, id DESC")->get()->getResultArray();
      $data = [
        "pemasukan" => $datamPemasukan
      ];
      return view('pemasukan/tabel_pemasukan', $data);
    }
  }

  public function edit()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $id_panti = $this->session->get('ID_PANTI');
    $mpemasukan = new ModelsPemasukan();
    $datamPemasukan = $mpemasukan->where(['id' => $_GET['id'], 'deleted_at' => null])->get()->getRowArray();
    $mdonatur = new Donatur();
    $dataDonatur = $mdonatur->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("id", "DESC")->get()->getResultArray();
    $data = [
      "page_title" => "Edit Data Pemasukan",
      "pemasukan" => $datamPemasukan,
      "alldonatur" => $dataDonatur
    ];
    return view('pemasukan/edit_pemasukan', $data);
  }

  public function proses()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    if ($_GET['act'] == "add_pemasukan") {
      $validationRule = [
        'tanggal' => [
          'label' => 'Tanggal',
          'rules' => 'required'
        ],
        'sumberPemasukan' => [
          'label' => 'Sumber pemasukan',
          'rules' => 'required'
        ],
        'jumlah' => [
          'label' => 'Jumlah',
          'rules' => 'required|numeric'
        ],
      ];

      if ($_POST['sumberPemasukan'] == "sumber-donatur") {
        $validationRule['idDonatur'] = [
          'label' => 'Donatur',
          'rules' => 'required'
        ];
      } else {
        $validationRule['sumberLainnya'] = [
          'label' => 'Sumber lainnya',
          'rules' => 'required'
        ];
      }

      if (!empty($_FILES['fileUpload']['name'])) {
        $validationRule['fileUpload'] = [
          'label' => 'File',
          'rules' => [
            'mime_in[fileUpload,image/jpg,image/jpeg,image/png,image/webp,application/pdf]',
            'max_size[fileUpload,3024]',
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
        if ($_POST['idDonatur'] == "donatur-baru") {
          $notempty = [];
          foreach ($_POST as $name => $val) {
            if (!empty($val)) {
              array_push($notempty, $name);
            }
          }
          $data = [
            'notempty' => $notempty,
            'errors' => ['idDonatur' => 'Mohon pilih donatur']
          ];
        } else {
          $id_panti = $this->session->get('ID_PANTI');
          if ($_POST['sumberPemasukan'] == "sumber-donatur") {
            $id_donatur = $_POST['idDonatur'];
            $mdonatur = new Donatur();
            $dataDonatur = $mdonatur->where(['id' => $id_donatur, 'deleted_at' => null])->get()->getRowArray();
            $nama = $dataDonatur['nama'];
          } else {
            $id_donatur = null;
            $nama = $_POST['sumberLainnya'];
          }
          $dateParts = explode('/', $_POST['tanggal']);
          $day = $dateParts[0];
          $month = $dateParts[1];
          $year = $dateParts[2];
          $tanggal = $year . "-" . $month . "-" . $day;
          $input_pemasukan = array(
            'id_panti' => $id_panti,
            'sumber' => $_POST['sumberPemasukan'],
            'id_donatur' => $id_donatur,
            'nama' => $nama,
            'tanggal_pemasukan' => date("Y-m-d", strtotime($tanggal)),
            'jumlah' => $_POST['jumlah'],
            'keterangan' => $_POST['keterangan']
          );
          $mpemasukan = new ModelsPemasukan();
          $data['insert'] = $mpemasukan->save($input_pemasukan);
          $lastInsertId = $this->db->insertID();
          if (!empty($_FILES['fileUpload']['name'])) {
            $files = $this->request->getFiles();
            $nameGambar = [];
            if ($files['fileUpload']->isValid() && !$files['fileUpload']->hasMoved()) {
              $newName = $files['fileUpload']->getRandomName();
              array_push($nameGambar, $newName);
              $files['fileUpload']->move(FCPATH . 'uploads/file_pemasukan', $newName);
            }
            $this->db->table("pemasukan")->update(['file' => json_encode($nameGambar)], ['id' => $lastInsertId]);
          }
        }
      }
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_pemasukan") {
      $delete =  $this->db->table("pemasukan")->update(['deleted_at' => date("Y-m-d H:i:s")], ['id' => $_POST['id']]);
      $data = [
        "delete" => $delete
      ];
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_file") {
      $pemasukan = $this->db->table("pemasukan")->select("*")->where("id", $_POST['id'])->get()->getRowArray();
      $file = json_decode($pemasukan['file']);
      foreach ($file as $key => $value) {
        if ($_POST['file'] == $value) {
          unset($file[$key]);
        }
      }
      $updateFile = $this->db->table("pemasukan")->update(['file' => json_encode($file)], ['id' => $_POST['id']]);
      if ($updateFile) {
        $fileName = $_POST['file'];
        $uploadedFilePath = FCPATH . 'uploads/file_pemasukan/' . $fileName;
        if (file_exists($uploadedFilePath)) {
          unlink($uploadedFilePath);
        }
      }
      $data = [
        "update" => $updateFile
      ];
      echo json_encode($data);
    } elseif ($_GET['act'] == "update_pemasukan") {
      $validationRule = [
        'tanggal' => [
          'label' => 'Tanggal',
          'rules' => 'required'
        ],
        'sumberPemasukan' => [
          'label' => 'Sumber pemasukan',
          'rules' => 'required'
        ],
        'jumlah' => [
          'label' => 'Jumlah',
          'rules' => 'required|numeric'
        ],
      ];

      if ($_POST['sumberPemasukan'] == "sumber-donatur") {
        $validationRule['idDonatur'] = [
          'label' => 'Donatur',
          'rules' => 'required'
        ];
      } else {
        $validationRule['sumberLainnya'] = [
          'label' => 'Sumber lainnya',
          'rules' => 'required'
        ];
      }

      if (!empty($_FILES['fileUpload']['name'])) {
        $validationRule['fileUpload'] = [
          'label' => 'File',
          'rules' => [
            'mime_in[fileUpload,image/jpg,image/jpeg,image/png,image/webp,application/pdf]',
            'max_size[fileUpload,3024]',
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
        if ($_POST['idDonatur'] == "donatur-baru") {
          $notempty = [];
          foreach ($_POST as $name => $val) {
            if (!empty($val)) {
              array_push($notempty, $name);
            }
          }
          $data = [
            'notempty' => $notempty,
            'errors' => ['idDonatur' => 'Mohon pilih donatur']
          ];
        } else {
          $id_panti = $this->session->get('ID_PANTI');
          if ($_POST['sumberPemasukan'] == "sumber-donatur") {
            $id_donatur = $_POST['idDonatur'];
            $mdonatur = new Donatur();
            $dataDonatur = $mdonatur->where(['id' => $id_donatur, 'deleted_at' => null])->get()->getRowArray();
            $nama = $dataDonatur['nama'];
          } else {
            $id_donatur = null;
            $nama = $_POST['sumberLainnya'];
          }
          $dateParts = explode('/', $_POST['tanggal']);
          $day = $dateParts[0];
          $month = $dateParts[1];
          $year = $dateParts[2];
          $tanggal = $year . "-" . $month . "-" . $day;
          $input_pemasukan = array(
            'id_panti' => $id_panti,
            'sumber' => $_POST['sumberPemasukan'],
            'id_donatur' => $id_donatur,
            'nama' => $nama,
            'tanggal_pemasukan' => date("Y-m-d", strtotime($tanggal)),
            'jumlah' => $_POST['jumlah'],
            'keterangan' => $_POST['keterangan']
          );
          $updateData = $this->db->table("pemasukan")->update($input_pemasukan, ['id' => $_POST['idPemasukan']]);
          if (!empty($_FILES['fileUpload']['name'])) {
            $files = $this->request->getFiles();
            $nameGambar = [];
            if ($files['fileUpload']->isValid() && !$files['fileUpload']->hasMoved()) {
              $newName = $files['fileUpload']->getRandomName();
              array_push($nameGambar, $newName);
              $files['fileUpload']->move(FCPATH . 'uploads/file_pemasukan', $newName);
            }
            $this->db->table("pemasukan")->update(['file' => json_encode($nameGambar)], ['id' => $_POST['idPemasukan']]);
          }
          $data = [
            "update" => $updateData
          ];
        }
      }
      echo json_encode($data);
    }
  }
}
