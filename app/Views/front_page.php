<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title><?= $page_title ?></title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
  <!-- JQuery-->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <!--plugins-->
  <link href="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/select2/css/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?= base_url() ?>assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/dark-theme.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/semi-dark.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/header-colors.css" />

  <!-- Smart Panti CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>customcss/smartpanti.css" />
  <style>
  </style>
  <!-- Custom styles for this template -->
  <link href="<?= base_url() ?>assets/css/carousel.css" rel="stylesheet">
</head>

<body>
  <!--start header -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark p-3">
      <div class="container">
        <!-- Button Mobile -->
        <?php if (!empty($session['NAMA'])) : ?>
          <div class="user-box dropdown" id="user_left" style="display: none;">
            <?php
            $path = FCPATH . 'assets/images/avatars/' . $session['NAMA'] . '.png';
            $file_exist = file_exists($path);
            ?>
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if ($file_exist == true) : ?>
                <img src="<?= base_url() ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
              <?php else : ?>
                <div class="user-img widgets-icons-2 bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i></div>
              <?php endif; ?>
              <div class="user-info ps-3" style="text-align: left;">
                <p class="user-name text-white mb-0"><?= $session['NAMA'] ?></p>
                <?php $user_role = ($session['ROLE'] == "LEARNER") ? "" : $session['ROLE'] ?>
                <p class="designattion mb-0"><?= $user_role ?></p>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-center">
              <li><a class="dropdown-item" href="<?= base_url() ?>profile"><i class="bx bx-user"></i><span>Profile</span></a></li>
              <li><a class="dropdown-item" href="<?= base_url() ?>dashboard"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
              <li>
                <div class="dropdown-divider mb-0"></div>
              </li>
              <li><a class="dropdown-item" href="<?= base_url() ?>auth/logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
            </ul>
          </div>
        <?php endif; ?>
        <!-- End Button Mobile -->
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>images/logo-smartpanti-white.png" alt="Smart Panti" class="image-0-0-19 contain-0-0-21" style="background-color: transparent; width:70%">
        </a>
        <!-- Button Mobile -->
        <button class="navbar-toggler" style="border-color: #fff;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- End Button Mobile -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="flex-grow-1 position-relative">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item"> <a class="nav-link active text-white" style="font-size:16px;" aria-current="page" href="<?= base_url() ?>"><i class='bx bx-home-alt me-1'></i>Beranda</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" style="font-size:16px;" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-atom me-1'></i>Fitur</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Administrasi Panti</a></li>
                  <li><a class="dropdown-item" href="#">Manajemen Donasi & Keuangan</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Manajemen Anak Asuh</a></li>
                  <li><a class="dropdown-item" href="#">Manajemen Pengurus</a></li>
                  <li><a class="dropdown-item" href="#">Manajemen Donatur</a></li>
                </ul>
              </li>
              <li class="nav-item"> <a class="nav-link text-white" style="font-size:16px;" href="#"><i class='bx bx-book-reader me-1'></i>Panduan</a></li>
              <li class="nav-item"> <a class="nav-link text-white" style="font-size:16px;" href="#"><i class='bx bx-user me-1'></i>Tentang Smart Panti</a></li>
            </ul>
          </div>
          <div class="top-menu ms-auto">
            <div class="text-center dropdown dropdown-large">
              <?php if (empty($session['NAMA'])) : ?>
                <button type="button" class="btn btn-outline-light me-2" id="btn-masuk" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-user mr-1"></i>MASUK</button>
                <ul class="dropdown-menu dropdown-menu-end mt-3" id="dropdown-masuk">
                  <div class="border p-4 rounded">
                    <div class="text-center">
                      <h3 class="">Masuk</h3>
                      <div class="login-separater text-center"> <span>MASUK DENGAN EMAIL</span>
                        <hr />
                      </div>
                    </div>
                    <div class="form-body">
                      <form class="row g-3" id="form-login">
                        <div class="col-12">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-12">
                          <label for="password" class="form-label">Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            <div id="error-login" class="invalid-feedback"></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Ingat Saya</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" class="btn btn-successv2" id="login"><i class="bx bxs-lock-open"></i>Masuk</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </ul>
                <button type="button" class="btn btn-successv2" data-bs-toggle="modal" data-bs-target="#modal-registrasi-panti"><i class="bx bx-message-square-edit"></i>REGISTRASI</button>
              <?php else : ?>
                <div class="user-box dropdown" id="user_right">
                  <?php
                  $path = FCPATH . 'assets/images/avatars/' . $session['NAMA'] . '.png';
                  $file_exist = file_exists($path);
                  ?>
                  <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if ($file_exist == true) : ?>
                      <img src="<?= base_url() ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                    <?php else : ?>
                      <div class="user-img widgets-icons-2 bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i></div>
                    <?php endif; ?>
                    <div class="user-info ps-3" style="text-align: left;">
                      <p class="user-name text-white mb-0"><?= $session['NAMA'] ?></p>
                      <?php $user_role = ($session['ROLE'] == "LEARNER") ? "" : $session['ROLE'] ?>
                      <p class="designattion mb-0"><?= $user_role ?></p>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-center">
                    <li><a class="dropdown-item" href="<?= base_url() ?>profile"><i class="bx bx-user"></i><span>Profile</span></a></li>
                    <li><a class="dropdown-item" href="<?= base_url() ?>dashboard"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
                    <li>
                      <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url() ?>auth/logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!--end header -->
  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item drk active">
          <img src="<?= base_url() ?>images/bg-image3.webp" alt="Smart Panti" style="object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1 class="text-white">Smart Panti</h1>
              <p>Satu pintu untuk kemudahan Panti Asuhan</p>
              <p><a class=" btn btn-lg btn-successv2" href="#">Tentang Smart Panti</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item drk">
          <img src="<?= base_url() ?>images/bg-image2.webp" alt="Smart Panti" style="object-fit: cover;" aria-hidden="true" focusable="false">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-white">Smart Panti</h1>
              <p>Manajemen panti yang rapih dan tertib administrasi</p>
              <p><a class="btn btn-lg btn-successv2" href="#">Panduan</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item drk">
          <img src="<?= base_url() ?>images/bg-image1.webp" alt="Smart Panti" style="object-fit: cover;" aria-hidden="true" focusable="false">
          <div class="container">
            <div class="carousel-caption text-end">
              <h1 class="text-white">Smart Panti</h1>
              <p>Manajemen administrasi & keuangan panti yang lebih baik dan transparan.</p>
              <p><a class="btn btn-lg btn-successv2" href="#">Tentang Smart Panti</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Apa itu <b>
              <font style="color: #009354;">Smart Panti?</font>
            </b></h2>
          <p class="lead">Smart Panti adalah hasil dari pengembangan sistem yang dilakukan oleh Panti Asuhan Harapan Mulia Purwokerto untuk seluruh Panti Asuhan yang ada di Indonesia agar manajemen panti menjadi lebih rapih dan tertib administrasi, sehingga panti asuhan menjadi lebih mudah dalam mengelola pantinya.</p>
        </div>
        <div class="col-md-5 order-md-1 pt-5">
          <img src="<?= base_url() ?>images/pictures1.png" alt="Smart Panti" class="card-img" style="object-fit: cover; width: 100%;">
        </div>
      </div>
      <hr class="featurette-divider">
      <!-- Three columns of text below the carousel -->
      <div class="px-4 py-5 my-5 text-center">
        <h1>Fitur Unggulan</h1>
        <div class="col-lg-6 mx-auto pb-3">
          <p class="lead mb-4">Layanan yang kami kembangkan.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 p-4">
            <div class="widgets-icons rounded-circle mx-auto bg-gradient-bloody text-white" style="width: 120px; height:120px; margin-bottom:20px; font-size:50px;"><i class='lni lni-protection'></i></div>
            <h2>Administrasi Panti</h2>
            <p>Pengelolaan administrasi mulai dari surat menyurat hingga kebutuhan pelaporan.</p>
            <p><a class="btn btn-secondary" href="">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 p-4">
            <div class="widgets-icons rounded-circle mx-auto bg-gradient-kyoto text-white" style="width: 120px; height:120px; margin-bottom:20px; font-size:50px;"><i class='lni lni-money-protection'></i></div>
            <h2>Manajemen Donasi & Keuangan</h2>
            <p>Manajemen data pemasukan dan pengeluaran yang dilakukan oleh panti mulai dari pendataan hingga pelaporan.</p>
            <p><a class="btn btn-secondary" href="">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 p-4">
            <div class="widgets-icons rounded-circle mx-auto bg-gradient-scooter text-white" style="width: 120px; height:120px; margin-bottom:20px; font-size:50px;"><i class='lni lni-users'></i></div>
            <h2>Manajemen Anak Asuh</h2>
            <p>Manajemen data anak asuh dari pertama kali datang ke panti hingga menjadi alumni.</p>
            <p><a class="btn btn-secondary" href="">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-6 p-4">
            <div class="widgets-icons rounded-circle mx-auto bg-gradient-cosmic text-white" style="width: 120px; height:120px; margin-bottom:20px; font-size:50px;"><i class='lni lni-write'></i></div>
            <h2>Manajemen Pengurus</h2>
            <p>Manajemen data pengurus dan memberikan akses ke Smart Panti sesuai jabatannya.</p>
            <p><a class="btn btn-secondary" href="">View details &raquo;</a></p>
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-6 p-4">
            <div class="widgets-icons rounded-circle mx-auto bg-gradient-ohhappiness text-white" style="width: 120px; height:120px; margin-bottom:20px; font-size:50px;"><i class='lni lni-grow'></i></div>
            <h2>Manajemen Donatur</h2>
            <p>Manajemen data donatur agar lebih mudah untuk dilakukan dokumentasi.</p>
            <p><a class="btn btn-secondary" href="">View details &raquo;</a></p>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div>
      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">
      <div class="px-4 py-5 my-5">
        <h1 class="text-center">Frequently Asked Questions (FAQ)</h1>
        <div class="col-lg-6 mx-auto pb-3 text-center">
          <p class="lead mb-4">Layanan yang kami kembangkan.</p>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Just once I'd like to eat dinner with a celebrity?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                  <div class="accordion-body">
                    <p>Yes, if you make it look like an electrical fire. When you do things right, people won't be sure you've done anything at all. I was having the most wonderful dream. Except you were there, and you were there, and you were there! No argument here. Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords. Cruel though they may be.</p>
                    <p><strong>Example: </strong>Shut up and get to the point!</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Bender, I didn't know you liked cooking?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                  <div class="accordion-body">
                    <p>That's so cute. Can we have Bender Burgers again? Is the Space Pope reptilian!? I wish! It's a nickel. Bender! Ship! Stop bickering or I'm going to come back there and change your opinions manually!</p>
                    <p><strong>Example: </strong>Okay, I like a challenge. Is that a cooking show? No argument here.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    My fellow Earthicans?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                  <div class="accordion-body">
                    <p>As I have explained in my book 'Earth in the Balance', and the much more popular 'Harry Potter and the Balance of Earth', we need to defend our planet against pollution. Also dark wizards. Fry, you can't just sit here in the dark listening to classical music.</p>
                    <p><strong>Example: </strong>Actually, that's still true. Well, let's just dump it in the sewer and say we delivered it.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Who am I making this out to?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                  <div class="accordion-body">
                    <p>Morbo can't understand his teleprompter because he forgot how you say that letter that's shaped like a man wearing a hat. Also Zoidberg. Can we have Bender Burgers again? Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.</p>
                    <p><strong>Example: </strong>Cruel though they may be...</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /END THE FEATURETTES -->
    </div><!-- /.container -->
  </main>
  <!-- FOOTER -->
  <div class="bg-dark" style="margin-bottom: -60px;">
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-6 col-md-2 mb-3">
            <h5 class="text-white">
              <img src="<?= base_url() ?>images/logo-smartpanti-white.png" alt="Smart Panti" class="image-0-0-19 contain-0-0-21" style="background-color: transparent;">
            </h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="<?= base_url() ?>" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tentang Smart Panti</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-2 mb-3">
            <h5 class="text-white">Fitur Unggulan</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="#">Administrasi Panti</a></li>
              <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="#">Manajemen Donasi & Keuangan</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="#">Manajemen Anak Asuh</a></li>
              <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="#">Manajemen Pengurus</a></li>
              <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="#">Manajemen Donatur</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-2 mb-3">
            <h5 class="text-white">Panduan</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Registrasi</a></li>
            </ul>
          </div>
          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5 class="text-white">Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-successv2" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top text-white">
          <p>© 2022 Panti Asuhan Harapan Mulia, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex" style="font-size: 30px; margin-top:-20px;">
            <li class="ms-2"><a class="link-light" href="https://www.facebook.com/PantiHarapanMulia"><i class="bx bxl-facebook-square"></i></a></li>
            <li class="ms-2"><a class="link-light" href="https://www.instagram.com/pantiasuhanharapanmulia/"><i class="bx bxl-instagram"></i></a></li>
            <li class="ms-2"><a class="link-light" href="https://api.whatsapp.com/send/?phone=6285879243310&text&type=phone_number&app_absent=0"><i class="bx bxl-whatsapp"></i></a></li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
  <!-- Modal Registrasi Panti -->
  <div class="modal fade" id="modal-registrasi-panti" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div><i class="bx bxs-user me-1 font-22 text-default"></i></div>
          <h5 class="mb-0 text-default">Registrasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-top border-0 border-1 border-default">
          <div class="card-body p-4">
            <form class="row g-3" id="registrasi-panti">
              <div class="col-md-12">
                <label for="inputNama" class="form-label">Nama Lengkap Pendaftar</label>
                <input type="text" class="form-control" id="inputNama" name="inputNama" placeholder="Nama lengkap pendaftar">
                <div id="validation-inputNama"></div>
              </div>
              <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email Pendaftar</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                <div id="validation-inputEmail"></div>
              </div>
              <div class="col-md-6">
                <label for="inputPhone" class="form-label">Telp/HP Pendaftar</label>
                <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Telp/HP">
                <div id="validation-inputPhone"></div>
              </div>
              <div class="col-md-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                <div id="validation-inputPassword"></div>
              </div>
              <div class="col-md-6">
                <label for="ulangiPassword" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="ulangiPassword" name="ulangiPassword" placeholder="Ulangi assword">
                <div id="validation-ulangiPassword"></div>
              </div>
              <div class="col-12">
                <label for="inputAlamat" class="form-label">Alamat Pendaftar</label>
                <textarea class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Alamat..." rows="3"></textarea>
                <div id="validation-inputAlamat"></div>
              </div>
              <div class="col-md-6">
                <label for="inputProvinsi" class="form-label">Provinsi Pendaftar</label>
                <select class="form-select" id="inputProvinsi" name="inputProvinsi">
                  <option value="">- Pilih Provinsi -</option>
                </select>
                <div id="validation-inputProvinsi"></div>
              </div>
              <div class="col-md-6">
                <label for="inputKabupaten" class="form-label">Kota/Kabupaten Pendaftar</label>
                <select class="form-select" id="inputKabupaten" name="inputKabupaten">
                  <option value="">- Pilih Kota/Kabupaten -</option>
                </select>
                <div id="validation-inputKabupaten"></div>
              </div>
              <div class="col-md-6">
                <label for="inputKecamatan" class="form-label">Kecamatan Pendaftar</label>
                <select class="form-select input-kecamatan" id="inputKecamatan" name="inputKecamatan">
                  <option value="">- Pilih Kecamatan -</option>
                </select>
                <div id="validation-inputKecamatan"></div>
              </div>
              <div class="col-md-6">
                <label for="inputKelurahan" class="form-label">Desa/Kelurahan Pendaftar</label>
                <select class="form-select" id="inputKelurahan" name="inputKelurahan">
                  <option value="">- Pilih Desa/Kelurahan -</option>
                </select>
                <div id="validation-inputKelurahan"></div>
              </div>
              <div class="col-md-3">
                <label for="inputRt" class="form-label">RT Pendaftar</label>
                <input type="text" class="form-control" id="inputRt" name="inputRt" placeholder="RT">
                <div id="validation-inputRt"></div>
              </div>
              <div class="col-md-3">
                <label for="inputRw" class="form-label">RW Pendaftar</label>
                <input type="text" class="form-control" id="inputRw" name="inputRw" placeholder="RW">
                <div id="validation-inputRw"></div>
              </div>
              <div class="col-md-6">
                <label for="inputZip" class="form-label">Kode Pos Pendaftar</label>
                <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Kode Pos">
                <div id="validation-inputZip"></div>
              </div>
              <div class="login-separater text-center">
                <span>DATA PANTI ASUHAN</span>
                <hr />
              </div>
              <div class="col-md-12">
                <label for="inputNamaPanti" class="form-label">Nama Panti Asuhan</label>
                <input type="text" class="form-control" id="inputNamaPanti" name="inputNamaPanti" placeholder="Nama Panti Asuhan">
                <div id="validation-inputNamaPanti"></div>
              </div>
              <div class="col-md-6">
                <label for="inputEmailPanti" class="form-label">Email Panti Asuhan</label>
                <input type="email" class="form-control" id="inputEmailPanti" name="inputEmailPanti" placeholder="Email">
                <div id="validation-inputEmailPanti"></div>
              </div>
              <div class="col-md-6">
                <label for="inputPhonePanti" class="form-label">Telp/HP Panti Asuhan</label>
                <input type="text" class="form-control" id="inputPhonePanti" name="inputPhonePanti" placeholder="Telp/HP Panti Asuhan">
                <div id="validation-inputPhonePanti"></div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-successv2 btn-daftar">Daftar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Login -->
  <div class="modal fade" id="modal-login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="mb-0 text-default">Masuk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="border p-4 rounded">
          <div class="form-body">
            <form class="row g-3" id="form-login-modal">
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                  <div id="error-login-modal" class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Ingat Saya</label>
                </div>
              </div>
              <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Lupa Password?</a>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-successv2" id="login"><i class="bx bxs-lock-open"></i>Masuk</button>
                  <!-- <a href="<?= base_url() ?>dashboard" class="btn btn-successv2">MASUK</a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url() ?>assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="<?= base_url() ?>assets/js/index.js"></script>
  <!--app JS-->
  <script src="<?= base_url() ?>assets/js/app.js"></script>
  <script type="text/javascript">
    function get_provinsi() {
      $.ajax({
        type: 'GET',
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        dataType: 'JSON',
        success: function(result) {
          var provinsi = result.provinsi;
          var html = '<option value="">- Pilih Provinsi -</option>';
          for (let i = 0; i < provinsi.length; i++) {
            html += '<option value="' + provinsi[i].id + '">' + provinsi[i].nama + '</option>'
          }
          $('#inputProvinsi').html(html);
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    function get_kabupaten() {
      var id_provinsi = $('#inputProvinsi').val();
      $.ajax({
        type: 'GET',
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + id_provinsi,
        dataType: 'JSON',
        success: function(result) {
          var kabupaten = result.kota_kabupaten;
          var html = '<option value="">- Pilih Kota/Kabupaten -</option>';
          for (let i = 0; i < kabupaten.length; i++) {
            html += '<option value="' + kabupaten[i].id + '">' + kabupaten[i].nama + '</option>'
          }
          $('#inputKabupaten').html(html);
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    function get_kecamatan() {
      var id_kabupaten = $('#inputKabupaten').val();
      $.ajax({
        type: 'GET',
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + id_kabupaten,
        dataType: 'JSON',
        success: function(result) {
          var kecamatan = result.kecamatan;
          var html = '<option value="">- Pilih Kecamatan -</option>';
          for (let i = 0; i < kecamatan.length; i++) {
            html += '<option value="' + kecamatan[i].id + '">' + kecamatan[i].nama + '</option>'
          }
          $('#inputKecamatan').html(html);
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    function get_kelurahan() {
      var id_kecamatan = $('#inputKecamatan').val();
      $.ajax({
        type: 'GET',
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + id_kecamatan,
        dataType: 'JSON',
        success: function(result) {
          var kelurahan = result.kelurahan;
          var html = '<option value="">- Pilih Desa/Kelurahan -</option>';
          for (let i = 0; i < kelurahan.length; i++) {
            html += '<option value="' + kelurahan[i].id + '">' + kelurahan[i].nama + '</option>'
          }
          $('#inputKelurahan').html(html);
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    function signin(event) {
      if (event == "modal") {
        var formdata = new FormData($('#form-login-modal')[0]);
      } else {
        var formdata = new FormData($('#form-login')[0]);
      }
      Pace.restart()
      $.ajax({
        url: '<?= base_url() ?>auth/login',
        type: 'POST',
        data: formdata,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(result) {
          if (result.error) {
            if (event == "modal") {
              $("#error-login-modal").html(result.error);
              $("#error-login-modal").show();
            } else {
              $("#error-login").html(result.error);
              $("#error-login").show();
            }
            Pace.done()
          } else {
            window.location.href = "<?= base_url() ?>dashboard";
          }
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    function user() {
      if ($(window).width() <= 767) {
        $('#user_left').show();
        $('#user_right').hide();
      } else {
        $('#user_left').hide();
        $('#user_right').show();
      }
    }

    $(document).ready(function() {
      $('#inputProvinsi').select2({
        dropdownParent: $('#modal-registrasi-panti > .modal-dialog > .modal-content'),
        theme: 'bootstrap-5',
        placeholder: "Pilih Provinsi"
      }).on('select2:select', function(e) {
        get_kabupaten();
        $('#inputKabupaten').val(null).trigger('change');
        $('#inputKecamatan').val(null).trigger('change');
        $('#inputKelurahan').val(null).trigger('change');
      });

      $('#inputKabupaten').select2({
        dropdownParent: $('#modal-registrasi-panti > .modal-dialog > .modal-content'),
        theme: 'bootstrap-5',
        placeholder: "Pilih Kabupaten",
        language: {
          noResults: function(params) {
            return "Pilih provinsi yang sesuai dahulu";
          }
        }
      }).on('select2:select', function(e) {
        get_kecamatan();
        $('#inputKecamatan').val(null).trigger('change');
        $('#inputKelurahan').val(null).trigger('change');
      });

      $('#inputKecamatan').select2({
        dropdownParent: $('#modal-registrasi-panti > .modal-dialog > .modal-content'),
        theme: 'bootstrap-5',
        placeholder: "Pilih Kecamatan"
      }).on('select2:select', function(e) {
        get_kelurahan();
        $('#inputKelurahan').val(null).trigger('change');
      });

      $('#inputKelurahan').select2({
        dropdownParent: $('#modal-registrasi-panti > .modal-dialog > .modal-content'),
        theme: 'bootstrap-5',
        placeholder: "Pilih Kelurahan"
      });

      get_provinsi();
      user();

      $(window).on("resize", function(event) {
        user();
      });

      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });

      $('.dropdown-menu').on('click', function(event) {
        event.stopPropagation();
      });

      $('#btn-masuk').on('click', function() {
        if ($(window).width() < 769) {
          $('#modal-login').modal('show');
          $("#btn-masuk").dropdown('toggle');
        }
      });

      $('#form-login-modal').on('submit', function(evt) {
        evt.preventDefault();
        var event = 'modal';
        signin(event);
      });

      $('#form-login').on('submit', function(evt) {
        evt.preventDefault();
        var event = 'dropdown';
        signin(event);
      });

      $('.btn-daftar').on('click', function() {
        var formdata = new FormData($('#registrasi-panti')[0]);
        $.ajax({
          url: '<?= base_url() ?>registrasi/registrasi_panti',
          type: 'POST',
          data: formdata,
          processData: false,
          contentType: false,
          dataType: 'JSON',
          success: function(result) {
            if (result.validation) {
              var name = Object.keys(result.validation);
              var notempty = result.notempty;
              var html = '';
              for (i = 0; i < notempty.length; i++) {
                $("[name=" + notempty[i] + "]").attr("class", "form-control");
                $("#validation-" + notempty[i]).html('');
              }
              for (i = 0; i < name.length; i++) {
                $("[name=" + name[i] + "]").attr("class", "form-control is-invalid");
                $("#validation-" + name[i]).attr("class", "invalid-feedback");
                $("#validation-" + name[i]).html(result.validation[name[i]]);
              }
            } else {
              if (result.insert == true) {
                window.location.href = "<?= base_url() ?>dashboard";
              }
            }
          },
          error: function(result) {
            // alert(result);
          }
        });
      });

    })
  </script>
</body>

</html>