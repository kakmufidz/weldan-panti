<?php

namespace App\Controllers;

use App\Models\Anak_asuh;
use App\Models\Dokumen_anak;
use App\Models\Perkembangan_anak;

class Anak extends BaseController
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
      "page_title" => "Data Anak Asuh",
      "session" => $this->session->get()
    ];
    return view('anak/anak', $data);
  }

  public function tambah_anak()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $data = [
      "page_title" => "Tambah Anak Asuh",
      "session" => $this->session->get()
    ];
    return view('anak/tambah_anak', $data);
  }


  public function profile()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $manak = new Anak_asuh();
    $dataAnak = $manak->where(['nip' => $_GET['nip'], 'deleted_at' => null])->get()->getRowArray();
    $mdokanak = new Dokumen_anak();
    $dokAnak = $mdokanak->where(['id_anak' => $dataAnak['id'], 'deleted_at' => null])->orderBy("id", "DESC")->get()->getResultArray();
    $mperkembangananak = new Perkembangan_anak();
    $perkembanganAnak = $mperkembangananak->where(['id_anak' => $dataAnak['id'], 'deleted_at' => null])->orderBy("id", "DESC")->get()->getResultArray();
    $data = [
      "page_title" => "Profile Anak",
      "session" => $this->session->get(),
      "anak" => $dataAnak,
      "dokumen_anak" => $dokAnak,
      "perkembangan_anak" => $perkembanganAnak
    ];
    return view('anak/profile_anak', $data);
  }

  public function edit()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $manak = new Anak_asuh();
    $dataAnak = $manak->where(['nip' => $_GET['nip'], 'deleted_at' => null])->get()->getRowArray();
    $data = [
      "page_title" => "Edit Anak Asuh",
      "anak" => $dataAnak
    ];
    return view('anak/edit_anak', $data);
  }

  public function get_data()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    if ($_GET['act'] == "tabel-anak") {
      $id_panti = $this->session->get('ID_PANTI');
      $manak = new Anak_asuh();
      $dataAnak = $manak->where(['id_panti' => $id_panti, 'deleted_at' => null])->get()->getResultArray();
      $data = [
        "anak_asuh" => $dataAnak
      ];
      return view('anak/tabel_anak_asuh', $data);
    }
  }

  public function addDokumen()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $manak = new Anak_asuh();
    $dataAnak = $manak->where(['nip' => $_GET['nip'], 'deleted_at' => null])->get()->getRowArray();
    $data = [
      "page_title" => "Tambah Dokumen Anak",
      "session" => $this->session->get(),
      "anak" => $dataAnak,
    ];
    return view('anak/add_dokumen', $data);
  }


  public function addPerkembangan()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    $manak = new Anak_asuh();
    $dataAnak = $manak->where(['nip' => $_GET['nip'], 'deleted_at' => null])->get()->getRowArray();
    $data = [
      "page_title" => "Tambah Perkembangan Anak",
      "session" => $this->session->get(),
      "anak" => $dataAnak,
    ];
    return view('anak/add_perkembangan', $data);
  }
  public function proses()
  {
    if ($this->session->get('NAMA') == null)  return redirect()->to(base_url());
    if ($_GET['act'] == "add_anak") {
      $validationRule = [
        'nipAnak' => [
          'label' => 'Nomor Induk Panti',
          'rules' => 'required|is_unique[anak_asuh.nip]'
        ],
        'namaAnak' => [
          'label' => 'Nama anak',
          'rules' => 'required'
        ],
        'tempatLahir' => [
          'label' => 'Tempat lahir',
          'rules' => 'required'
        ],
        'tanggalLahir' => [
          'label' => 'Tanggal lahir',
          'rules' => 'required'
        ],
        'rt' => [
          'label' => 'RT',
          'rules' => 'required'
        ],
        'rw' => [
          'label' => 'RW',
          'rules' => 'required'
        ],
        'desa' => [
          'label' => 'Desa',
          'rules' => 'required'
        ],
        'kecamatan' => [
          'label' => 'Kecamatan',
          'rules' => 'required'
        ],
        'kabupaten' => [
          'label' => 'Kabupaten',
          'rules' => 'required'
        ],
        'provinsi' => [
          'label' => 'Provinsi',
          'rules' => 'required'
        ],
        'kategoriAnak' => [
          'label' => 'Kategori anak',
          'rules' => 'required'
        ],
        'statusPanti' => [
          'label' => 'Status panti',
          'rules' => 'required'
        ],
        'statusAnak' => [
          'label' => 'Status anak',
          'rules' => 'required'
        ],
      ];

      if (!empty($_FILES['fotoAnak']['name'])) {
        $validationRule['fotoAnak'] = [
          'label' => 'Foto',
          'rules' => [
            'mime_in[fotoAnak,image/jpg,image/jpeg,image/png,image/webp]',
            'max_size[fotoAnak,1024]',
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
        $input_anak = array(
          'id_panti' => $id_panti,
          'nip' => $_POST['nipAnak'],
          'nama' => $_POST['namaAnak'],
          'tempat_lahir' => $_POST['tempatLahir'],
          'tanggal_lahir' => $_POST['tanggalLahir'],
          'rt' => $_POST['rt'],
          'rw' => $_POST['rw'],
          'desa' => $_POST['desa'],
          'kecamatan' => $_POST['kecamatan'],
          'kabupaten' => $_POST['kabupaten'],
          'provinsi' => $_POST['provinsi'],
          'negara' => "Indonesia",
          'kategori_anak' => $_POST['kategoriAnak'],
          'status_panti' => $_POST['statusPanti'],
          'status_anak' => $_POST['statusAnak'],
        );
        $manak = new Anak_asuh();
        $data['insert'] = $manak->save($input_anak);
        $lastInsertId = $this->db->insertID();
        if (!empty($_FILES['fotoAnak']['name'])) {
          $files = $this->request->getFiles();
          $nameGambar = [];
          if ($files['fotoAnak']->isValid() && !$files['fotoAnak']->hasMoved()) {
            $newName = $files['fotoAnak']->getRandomName();
            array_push($nameGambar, $newName);
            $files['fotoAnak']->move(FCPATH . 'uploads/foto_anak', $newName);
          }
          $this->db->table("anak_asuh")->update(['foto' => json_encode($nameGambar)], ['id' => $lastInsertId]);
        }
      }
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_anak") {
      $delete =  $this->db->table("anak_asuh")->update(['deleted_at' => date("Y-m-d H:i:s")], ['nip' => $_POST['nip']]);
      $data = [
        "delete" => $delete
      ];
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_foto") {
      $anak = $this->db->table("anak_asuh")->select("*")->where("nip", $_POST['nip'])->get()->getRowArray();
      $gambar = json_decode($anak['foto']);
      foreach ($gambar as $key => $value) {
        if ($_POST['gambar'] == $value) {
          unset($gambar[$key]);
        }
      }
      $updateGambar = $this->db->table("anak_asuh")->update(['foto' => json_encode($gambar)], ['nip' => $_POST['nip']]);
      if ($updateGambar) {
        $fileName = $_POST['gambar'];
        $uploadedFilePath = FCPATH . 'uploads/foto_anak/' . $fileName;
        if (file_exists($uploadedFilePath)) {
          unlink($uploadedFilePath);
        }
      }
      $data = [
        "update" => $updateGambar
      ];
      echo json_encode($data);
    } elseif ($_GET['act'] == "update_anak") {
      $validationRule = [
        'namaAnak' => [
          'label' => 'Nama anak',
          'rules' => 'required'
        ],
        'tempatLahir' => [
          'label' => 'Tempat lahir',
          'rules' => 'required'
        ],
        'tanggalLahir' => [
          'label' => 'Langgal lahir',
          'rules' => 'required'
        ],
        'rt' => [
          'label' => 'RT',
          'rules' => 'required'
        ],
        'rw' => [
          'label' => 'RW',
          'rules' => 'required'
        ],
        'desa' => [
          'label' => 'Desa',
          'rules' => 'required'
        ],
        'kecamatan' => [
          'label' => 'Kecamatan',
          'rules' => 'required'
        ],
        'kabupaten' => [
          'label' => 'Kabupaten',
          'rules' => 'required'
        ],
        'provinsi' => [
          'label' => 'Provinsi',
          'rules' => 'required'
        ],
        'kategoriAnak' => [
          'label' => 'Kategori anak',
          'rules' => 'required'
        ],
        'statusPanti' => [
          'label' => 'Status panti',
          'rules' => 'required'
        ],
        'statusAnak' => [
          'label' => 'Status anak',
          'rules' => 'required'
        ],
      ];

      if (!empty($_FILES['fotoAnak']['name'])) {
        $validationRule['fotoAnak'] = [
          'label' => 'Foto',
          'rules' => [
            'mime_in[fotoAnak,image/jpg,image/jpeg,image/png,image/webp]',
            'max_size[fotoAnak,1024]',
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
        $input_anak = array(
          'id_panti' => $id_panti,
          'nip' => $_POST['nipAnak'],
          'nama' => $_POST['namaAnak'],
          'tempat_lahir' => $_POST['tempatLahir'],
          'tanggal_lahir' => $_POST['tanggalLahir'],
          'rt' => $_POST['rt'],
          'rw' => $_POST['rw'],
          'desa' => $_POST['desa'],
          'kecamatan' => $_POST['kecamatan'],
          'kabupaten' => $_POST['kabupaten'],
          'provinsi' => $_POST['provinsi'],
          'negara' => "Indonesia",
          'kategori_anak' => $_POST['kategoriAnak'],
          'status_panti' => $_POST['statusPanti'],
          'status_anak' => $_POST['statusAnak'],
        );
        $manak = new Anak_asuh();
        $updateData = $this->db->table("anak_asuh")->update($input_anak, ['id' => $_POST['idAnak']]);
        if (!empty($_FILES['fotoAnak']['name'])) {
          $files = $this->request->getFiles();
          $nameGambar = [];
          if ($files['fotoAnak']->isValid() && !$files['fotoAnak']->hasMoved()) {
            $newName = $files['fotoAnak']->getRandomName();
            array_push($nameGambar, $newName);
            $files['fotoAnak']->move(FCPATH . 'uploads/foto_anak', $newName);
          }
          $this->db->table("anak_asuh")->update(['foto' => json_encode($nameGambar)], ['id' => $_POST['idAnak']]);
        }
        $data = [
          "update" => $updateData
        ];
      }
      echo json_encode($data);
    } elseif ($_GET['act'] == "add_dokumen") {
      $validationRule = [
        'judulDokumen' => [
          'label' => 'Judul Dokumen',
          'rules' => 'required'
        ],
        'file' => [
          'label' => 'File Dokumen',
          'rules' => [
            'mime_in[file,image/jpg,image/jpeg,image/png,image/webp,application/pdf]',
            'max_size[file,1024]',
          ],
        ]
      ];

      if (!empty($_FILES['file']['name'])) {
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
        $input_data = array(
          'id_anak' => $_POST['idAnak'],
          'judul' => $_POST['judulDokumen']
        );
        $mdokanak = new Dokumen_anak();
        $data['insert'] = $mdokanak->save($input_data);
        $lastInsertId = $this->db->insertID();
        $files = $this->request->getFiles();
        if ($files['file']->isValid() && !$files['file']->hasMoved()) {
          $newName = $files['file']->getRandomName();
          $files['file']->move(FCPATH . 'uploads/dokumen_anak', $newName);
          $this->db->table("dokumen_anak")->update(['file' => $newName], ['id' => $lastInsertId]);
        }
      }
      echo json_encode($data);
    } elseif ($_GET['act'] == "delete_dokumen") {
      $delete =  $this->db->table("dokumen_anak")->update(['deleted_at' => date("Y-m-d H:i:s")], ['id' => $_POST['id']]);
      $data = [
        "delete" => $delete
      ];
      echo json_encode($data);
    } elseif ($_GET['act'] == "add_perkembangan") {
      $validationRule = [
        'tanggal' => [
          'label' => 'Tanggal & Waktu',
          'rules' => 'required'
        ],
        'tempat' => [
          'label' => 'Tempat',
          'rules' => 'required'
        ],
        'tinggiFisik' => [
          'label' => 'Tinggi Badan',
          'rules' => 'required'
        ],
        'beratFisik' => [
          'label' => 'Berat Badan',
          'rules' => 'required'
        ]
      ];
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
        $tanggal = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $_POST['tanggal'])));
        $input_data = array(
          'id_anak' => $_POST['idAnak'],
          'waktu_rekam' => $tanggal,
          'tempat' => $_POST['tempat'],
          'tinggibadan_fisik' => $_POST['tinggiFisik'],
          'beratbadan_fisik' => $_POST['beratFisik'],
          'tekanandarah_fisik' => $_POST['tekananDarahFisik'],
          'guladarah_fisik' => $_POST['gulaDarahFisik'],
          'kolesterol_fisik' => $_POST['kolesterolFisik'],
          'fungsiparu_fisik' => $_POST['fungsiParuFisik'],
          'keterangan_fisik' => $_POST['keteranganFisik'],
          'percayadiri_pskologis' => $_POST['percayadiri'],
          'mandiri_pskologis' => $_POST['mandiri'],
          'disiplin_pskologis' => $_POST['disiplin'],
          'tanggungjawab_pskologis' => $_POST['tanggungjawab'],
          'keterangan_pskologis' => $_POST['keteranganPsikologis'],
          'penyesuaian_sosial' => $_POST['penyesuaian'],
          'kerjasama_sosial' => $_POST['kerjasama'],
          'sopan_sosial' => $_POST['sopan'],
          'keterangan_sosial' => $_POST['keteranganSosial'],
          'gambaran_masalah' => $_POST['gambaran'],
          'penyelesaian_masalah' => $_POST['penyeselaian'],
          'perubahan_masalah' => $_POST['perubahan'],
          'keterangan_masalah' => $_POST['keteranganPermasalahan']
        );
        $mperkembangananak = new Perkembangan_anak();
        $data['insert'] = $mperkembangananak->save($input_data);
      }
      echo json_encode($data);
    }
  }
}
