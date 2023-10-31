<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Profile Anak</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Profile Anak</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<?php $gambar = json_decode($anak['foto']); ?>
								<img src="<?= base_url() ?>/uploads/foto_anak/<?= $gambar[0] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
								<div class="mt-3">
									<h4>NIP: <?= $anak['nip'] ?><br><?= $anak['nama'] ?></h4>
									<p class="text-secondary mb-1"><?= $anak['status_anak'] . ", " . $anak['status_panti'] ?></p>
									<?php
									// The birthdate in the format "YYYY-MM-DD"
									$birthdate = date("Y-m-d", strtotime($anak['tanggal_lahir']));

									// Create a DateTime object for the birthdate
									$birthDate = new DateTime($birthdate);

									// Get the current date
									$currentDate = new DateTime();

									// Calculate the interval between the birthdate and the current date
									$age = $currentDate->diff($birthDate);

									// Access the "years" property of the $age object to get the age
									$ageYears = $age->y;
									$ageMonths = $age->m;
									$ageDays = $age->d;

									// Display the age
									?>
									<p class="text-muted font-size-sm">Umur: <?= $ageYears ?> Tahun <?= $ageMonths ?> Bulan <?= $ageDays ?> Hari</p>
									<!-- <button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button> -->
								</div>
							</div>
							<hr class="my-4" />
							<div class="d-flex flex-column align-items-center text-center">
								<a href="<?= base_url() ?>anak/edit?nip=<?= $anak['nip'] ?>" class="btn btn-primary px-5 radius-30"><i class='bx bxs-edit'></i> Edit Profile</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="mb-3">
								<label for="tempatLahir" class="form-label">Tempat & Tanggal Lahir*</label>
								<div class="row">
									<div class="col-5">
										<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $anak['tempat_lahir'] ?>" placeholder="Masukkan tempat lahir" required disabled>
									</div>
									<div class="col-4">
										<input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?= date("Y-m-d", strtotime($anak['tanggal_lahir'])) ?>" placeholder="Masukkan tanggal lahir" value="<?= date("Y-m-d") ?>" required disabled>
									</div>
								</div>
								<div id="validation-tempatLahir" class="invalid-feedback"></div>
								<div id="validation-tanggalLahir" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-2">
										<label for="rt" class="form-label">RT*</label>
										<input type="text" class="form-control" id="rt" name="rt" value="<?= $anak['rt'] ?>" placeholder="RT" required disabled>
									</div>
									<div class="col-2">
										<label for="rw" class="form-label">RW*</label>
										<input type="text" class="form-control" id="rw" name="rw" value="<?= $anak['rw'] ?>" placeholder="RW" required disabled>
									</div>
								</div>
								<div id="validation-rt" class="invalid-feedback"></div>
								<div id="validation-rw" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-6">
										<label for="desa" class="form-label">DESA*</label>
										<input type="text" class="form-control" id="desa" name="desa" value="<?= $anak['desa'] ?>" placeholder="Masukkan Desa" required disabled>
									</div>
									<div class="col-6">
										<label for="kecamatan" class="form-label">KECAMATAN*</label>
										<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $anak['kecamatan'] ?>" placeholder="Masukkan Kecamatan" required disabled>
									</div>
								</div>
								<div id="validation-desa" class="invalid-feedback"></div>
								<div id="validation-kecamatan" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-6">
										<label for="kabupaten" class="form-label">KABUPATEN*</label>
										<input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $anak['kabupaten'] ?>" placeholder="Masukkan Kabupaten" required disabled>
									</div>
									<div class="col-6">
										<label for="provinsi" class="form-label">PROVINSI*</label>
										<input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $anak['provinsi'] ?>" placeholder="Masukkan provinsi" required disabled>
									</div>
								</div>
								<div id="validation-kabupaten" class="invalid-feedback"></div>
								<div id="validation-provinsi" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<label for="kategoriAnak" class="form-label">KATEGORI ANAK</label>
								<select class="form-select" id="kategoriAnak" name="kategoriAnak" aria-label="Default select example" disabled>
									<?php $kategori = ['Yatim', 'Piatu', 'Yatim-Piatu', 'Dhuafa'];
									foreach ($kategori as $value) :
										$select = ($value == $anak['kategori_anak']) ? "selected" : "";
									?>
										<option value="<?= $value ?>" <?= $select ?>><?= $value ?></option>
									<?php endforeach; ?>
								</select>
								<div id="validation-kategoriAnak" class="invalid-feedback"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>