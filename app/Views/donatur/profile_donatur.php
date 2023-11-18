<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Profile Donatur</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Profile Donatur</li>
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
								<?php $gambar = json_decode($donatur['foto']);
								if (isset($gambar)) :
									if (sizeof($gambar) != 0) : ?>
										<img src="<?= base_url() ?>uploads/foto_donatur/<?= $gambar[0] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
									<?php else : ?>
										<img src="<?= base_url() ?>images/default-product.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
									<?php endif; ?>
								<?php else : ?>
									<img src="<?= base_url() ?>images/default-product.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
								<?php endif; ?>
								<div class="mt-3">
									<h4><?= $donatur['nama'] ?></h4>
									<p class="text-secondary mb-1"><?= $donatur['nohp'] ?></p>
								</div>
							</div>
							<hr class="my-4" />
							<div class="d-flex flex-column align-items-center text-center">
								<a href="<?= base_url() ?>donatur/edit?id=<?= $donatur['id'] ?>" class="btn btn-primary px-5 radius-30"><i class='bx bxs-edit'></i> Edit Profile</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="mb-3">
								<div class="row">
									<div class="col-2">
										<label for="rt" class="form-label">RT*</label>
										<input type="text" class="form-control" id="rt" name="rt" value="<?= $donatur['rt'] ?>" placeholder="RT" required disabled>
									</div>
									<div class="col-2">
										<label for="rw" class="form-label">RW*</label>
										<input type="text" class="form-control" id="rw" name="rw" value="<?= $donatur['rw'] ?>" placeholder="RW" required disabled>
									</div>
								</div>
								<div id="validation-rt" class="invalid-feedback"></div>
								<div id="validation-rw" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-6">
										<label for="desa" class="form-label">DESA*</label>
										<input type="text" class="form-control" id="desa" name="desa" value="<?= $donatur['desa'] ?>" placeholder="Data Desa" required disabled>
									</div>
									<div class="col-6">
										<label for="kecamatan" class="form-label">KECAMATAN*</label>
										<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $donatur['kecamatan'] ?>" placeholder="Data Kecamatan" required disabled>
									</div>
								</div>
								<div id="validation-desa" class="invalid-feedback"></div>
								<div id="validation-kecamatan" class="invalid-feedback"></div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-6">
										<label for="kabupaten" class="form-label">KABUPATEN*</label>
										<input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $donatur['kabupaten'] ?>" placeholder="Data Kabupaten" required disabled>
									</div>
									<div class="col-6">
										<label for="provinsi" class="form-label">PROVINSI*</label>
										<input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $donatur['provinsi'] ?>" placeholder="Data provinsi" required disabled>
									</div>
								</div>
								<div id="validation-kabupaten" class="invalid-feedback"></div>
								<div id="validation-provinsi" class="invalid-feedback"></div>
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