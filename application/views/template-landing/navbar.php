<body>

     <!-- MENU BAR -->
     <nav class="navbar navbar-expand-lg">
          <div class="container">
               <a class="navbar-brand mb-2" href="<?= base_url('landing') ?>">
                    <h3 class="d-inline ml-3">Sistem Informasi Ekstrakurikuler</h2>
               </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto flex align-items-center">
                         <?php if ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') : ?>
                              <li class="nav-item">
                                   <a href="#ekskul" class="nav-link smoothScroll">
                                        <h6>Ekstrakurikuler</h6>
                                   </a>
                              </li>
                         <?php endif; ?>
                         <li class="nav-item text-center data-toggle=" dropdown" aria-haspopup="true" aria-expanded="false"">
                              <?= !$this->session->has_userdata('nama_siswa')
                                   ? '<a href=' . base_url('auth') . ' class="nav-link contact">Login</a>'
                                   : '<div class="dropdown">
                                        <span class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                             <h6>Halo, <br><strong>' . $this->session->userdata('nama_siswa') . '</strong></h6>
                                        </span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                             <button type="button" class="dropdown-item" onclick="logoutConfirm(' . base_url('auth/logout') . ')">Keluar</button>
                                        </div>
                                   </div>' ?>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>