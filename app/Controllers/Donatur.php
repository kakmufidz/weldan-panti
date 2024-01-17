<?php

namespace App\Controllers;

use App\Models\Donatur as ModelsDonatur;

class Donatur extends BaseController
{

  function __construct()
  {
    $this->session = session();
    $this->validation = \Config\Services::validation();
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $data = [
      "page_title" => "Data Donatur",
      "session" => $this->session->get()
    ];
    return view('donatur/donatur', $data);
  }

  public function tambah_donatur()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $data = [
      "page_title" => "Tambah Donatur",
      "session" => $this->session->get()
    ];
    return view('donatur/tambah_donatur', $data);
  }

  public function profile()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $mdonatur = new ModelsDonatur();
    $dataDonatur = $mdonatur->where(['id' => $_GET['id'], 'deleted_at' => null])->get()->getRowArray();
    $data = [
      "page_title" => "Profile Donatur",
      "session" => $this->session->get(),
      "donatur" => $dataDonatur
    ];
    return view('donatur/profile_donatur', $data);
  }

  public function edit()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $mdonatur = new ModelsDonatur();
    $dataDonatur = $mdonatur->where(['id' => $_GET['id'], 'deleted_at' => null])->get()->getRowArray();
    $data = [
      "page_title" => "Edit Data Donatur",
      "donatur" => $dataDonatur
    ];
    return view('donatur/edit_donatur', $data);
  }

  public function get_data()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    if ($_GET['act'] == "tabel-donatur") {
      $id_panti = $this->session->get('ID_PANTI');
      $mdonatur = new ModelsDonatur();
      $dataDonatur = $mdonatur->where(['id_panti' => $id_panti, 'deleted_at' => null])->orderBy("id", "desc")->get()->getResultArray();
      $data = [
        "donatur" => $dataDonatur
      ];
      return view('donatur/tabel_donatur', $data);
    }
  }

  public function proses()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    if ($_GET['act'] == "add_donatur") {
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
          'id_panti' => $id_panti,
          'nama' => $_POST['namaDonatur'],
          'nohp' => $_POST['nohp'],
          'alamat' => $_POST['alamat'],
          'rt' => $_POST['rt'],
          'rw' => $_POST['rw'],
          'desa' => $_POST['desa'],
          'kecamatan' => $_POST['kecamatan'],
          'kabupaten' => $_POST['kabupaten'],
          'provinsi' => $_POST['provinsi'],
          'negara' => "Indonesia",
        );
        $mdonatur = new ModelsDonatur();
        $data['insert'] = $mdonatur->save($input_donatur);
        $lastInsertId = $this->db->insertID();
        if (!empty($_FILES['fotoDonatur']['name'])) {
          $files = $this->request->getFiles();
          $nameGambar = [];
          if ($files['fotoDonatur']->isValid() && !$files['fotoDonatur']->hasMoved()) {
            $newName = $files['fotoDonatur']->getRandomName();
            array_push($nameGambar, $newName);
            $files['fotoDonatur']->move(FCPATH . 'uploads/foto_donatur', $newName);
          }
          $this->db->table("donatur")->update(['foto' => json_encode($nameGambar)], ['id' => $lastInsertId]);
        }
      }
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_donatur") {
      $delete =  $this->db->table("donatur")->update(['deleted_at' => date("Y-m-d H:i:s")], ['id' => $_POST['id']]);
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
