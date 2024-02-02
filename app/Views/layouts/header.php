<header>
  <div class="topbar d-flex align-items-center">
    <nav class="navbar navbar-expand">
      <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
      </div>
      <div class="search-bar flex-grow-1">
        <div class="position-relative search-bar-box">
          <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
          <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
        </div>
      </div>
      <div class="user-box dropdown">
        <?php
        $this->session = session();
        $path = FCPATH . 'assets/images/avatars/' . $this->session->get('NAMA') . '.png';
        $file_exist = file_exists($path);
        ?>
        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if ($file_exist == true) : ?>
            <img src="<?= base_url() ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
          <?php else : ?>
            <div class="user-img widgets-icons-2 bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i></div>
          <?php endif; ?>
          <div class="user-info ps-3">
            <p class="user-name mb-0"><?= $this->session->get('NAMA') ?></p>
            <?php $user_role = ($this->session->get('ROLE') == "LEARNER") ? "MAHASISWA" : $this->session->get('ROLE') ?>
            <p class="designattion mb-0"><?= $user_role ?></p>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="<?= base_url() ?>akun"><i class="bx bx-user"></i><span>Akun</span></a></li>
          <li>
            <div class="dropdown-divider mb-0"></div>
          </li>
          <li><a class="dropdown-item" href="<?= base_url() ?>auth/logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>