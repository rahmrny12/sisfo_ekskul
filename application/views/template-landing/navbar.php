<body>

     <!-- MENU BAR -->
     <nav class="navbar navbar-expand-lg py-2">
          <div class="container">
               <a class="navbar-brand mb-2" href="<?= base_url('landing') ?>">
                    <img src="<?= base_url('assets/images/icon/logo_sisfo_ekskul.png') ?>" alt="logo_sisfo_ekskul.png" style="max-width: 60px;">
                    <h3 class="d-inline ml-3">Sistem Informasi Ekstrakurikuler</h3>
               </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto flex align-items-center">
                         <li class="nav-item">
                              <?php if ($this->uri->uri_string() != 'landing/index' && $this->uri->uri_string() != 'landing') : ?>
                                   <a href="<?= base_url('landing#ekskul') ?>" class="nav-link smoothScroll">
                                        <h6>Ekstrakurikuler</h6>
                                   </a>
                              <?php else : ?>
                                   <a href="#ekskul" class="nav-link smoothScroll">
                                        <h6>Ekstrakurikuler</h6>
                                   </a>
                              <?php endif; ?>
                         </li>
                         <li class="nav-item text-center data-toggle=" dropdown" aria-haspopup="true" aria-expanded="false"">
                              <?php if (!$this->session->has_userdata('nama_siswa')) : ?>
                                   <a href='<?= base_url('auth') ?>' class=" nav-link contact">Login</a>
                         <?php else : ?>
                              <div class="dropdown">
                                   <span class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                        <h6>Halo, <br><strong><?= $this->session->userdata('nama_siswa') ?></strong></h6>
                                   </span>
                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="<?= base_url('landing/edit_profil/') . $this->session->userdata('id_siswa') ?>" class="dropdown-item">Profil Siswa</a>
                                        <button type="button" class="dropdown-item" onclick="siswaLogoutConfirm()">Keluar</button>
                                   </div>
                              </div>
                         <?php endif; ?>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>