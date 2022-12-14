<!-- HERO -->
<section class="hero pt-0 hero-bg d-flex justify-content-center align-items-center">
     <div class="container">
          <div class="row">
               <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="hero-text">
                         <h2 class="text-white" data-aos="fade-up">Lihat dan temukan minat <strong>Ekstrakurikuler</strong> kamu!</h1>
                              <a href="#info" class="custom-btn btn-bg btn mt-3 smoothScroll">Lebih lanjut -></a>
                    </div>
               </div>

               <div class="col-lg-6 col-12">
                    <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                         <img src="<?= base_url('assets/images/landing/pramuka.png') ?>" class="img-fluid" alt="working girl">
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- ABOUT -->
<section class="about section-padding pb-0" id="info">
     <div class="container">
          <div class="row">

               <div class="col-lg-7 mx-auto col-md-10 col-12">
                    <div class="about-info">

                         <h2 class="mb-4" data-aos="fade-up">Untuk apa ikut <strong>Ekstrakurikuler</strong></h2>

                         <p class="mb-0" data-aos="fade-up">Tempat kamu untuk meluangkan waktu maupun tenaga dengan kegiatan <strong>positif</strong>. Cari minat dan bakatmu disini!
                         </p>
                    </div>

                    <div class="about-image my-5" data-aos="fade-up" data-aos-delay="200">
                         <img src="<?= base_url('assets/images/landing/ekskul.png') ?>" class="img-fluid w-75" alt="office">
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- LIST EKSKUL -->
<section class="project section-padding" id="ekskul">
     <div class="container-fluid">
          <div class="row">

               <div class="col-lg-12 col-12">

                    <h2 class="mb-5 text-center" data-aos="fade-up">
                         Berikut <strong>Ekstrakurikuler</strong> yang bisa kamu ikuti.
                    </h2>

                    <div class="owl-carousel owl-theme" id="project-slide">
                         <?php foreach ($ekskul as $data) : ?>
                              <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                   <img src="<?= base_url('assets/images/ekskul_images/') . $data['foto_ekskul'] ?>" class="img-fluid mb-5" alt="<?= $data['foto_ekskul'] ?>">

                                   <a href="<?= base_url('landing/detail_ekskul/') . $data['id_ekskul'] ?>" style="color: var(--primary-color);">
                                        <div class="project-info shadow-sm" style="bottom: -32px;">
                                             <div class="row">
                                                  <h3 class="col-10">
                                                       <span><?= $data['nama_ekskul'] ?></span>
                                                  </h3>
                                                  <div class="col-10 text-truncate">
                                                       <?= $data['deskripsi'] ?>
                                                  </div>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </div>
                                        </div>
                                   </a>
                              </div>
                         <?php endforeach; ?>
                    </div>
               </div>

          </div>
     </div>
</section>