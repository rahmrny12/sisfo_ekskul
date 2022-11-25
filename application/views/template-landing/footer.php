<footer class="site-footer py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 mx-lg-auto col-md-8 col-10 my-auto">
                <h2 class="text-white font-weight-bold">Kami <strong>Memudahkan</strong> Akses pada <strong>Ekskul</strong> Favoritmu</h2>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <h4 class="mt-4">Info Kontak</h4>

                <p class="mb-1">
                    <i class="fa fa-phone mr-2 footer-icon"></i>
                    082139570709
                </p>

                <p>
                    <a href="#">
                        <i class="fa fa-envelope mr-2 footer-icon"></i>
                        rahmatprayogo12@gmail.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="mt-4">Dibuat Di</h4>

                <p class="mb-1">
                    <i class="fa fa-home mr-2 footer-icon"></i>
                    SMKN 8 Jember, Jl. Pelita No. 27 Sidomekar, Semboro, Jember, Jawa Timur, Indonesia
                </p>
            </div>

            <div class="col-lg-5 mx-lg-auto text-center col-md-8 col-12">
                <p class="copyright-text">Copyright &copy; <?= date('Y', time()) ?> Tim Developer SMKN 8 Jember
                    <br>
                </p>

                <div class="mx-lg-auto">
                    <p>
                        <a href="https://www.instagram.com/smkn8_official/" target="blank">
                            <i class="fa fa-instagram"></i>
                            Ikuti kami di instagram
                        </a>
                    </p>
                </div>
            </div>


        </div>
        <div class="pb-0">
            <small class="text-light d-block">Image Soccer : <a href="https://www.freepik.com/free-vector/football-players-collection_15274859.htm#query=flat%20soccer&position=21&from_view=search">Freepik</a></small>
            <small class="text-light">Image Scout : <a href="https://www.freepik.com/free-vector/pramuka-day-illustration_15592923.htm#query=flat%20pramuka&position=12&from_view=search">Freepik</a></small>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="<?= base_url('vendor/digital_trend/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('vendor/digital_trend/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('vendor/digital_trend/') ?>js/aos.js"></script>
<script src="<?= base_url('vendor/digital_trend/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('vendor/digital_trend/') ?>js/smoothscroll.js"></script>
<script src="<?= base_url('vendor/digital_trend/') ?>js/custom.js"></script>

<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function siswaLogoutConfirm() {
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Setelah melakukan logout, Kamu harus melakukan login ulang.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff3636',
            cancelButtonColor: '#b3b3b3',
            confirmButtonText: 'Logout.'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('auth/logout') ?>";
            }
        })
    }

    function daftarEkskulConfirm() {
        var nama_siswa = document.getElementById('nama_siswa');
        var ekskul = document.getElementById('ekskul');

        Swal.fire({
            title: 'Apakah data siswa dan pilihan ekskul sudah benar?',
            html: "<pre>Nama siswa : " + nama_siswa.value + "\nekskul dipilih : " + ekskul.options[ekskul.selectedIndex].text + "</pre>Tekan kirim apabila semuanya sudah benar.",
            icon: 'info',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonColor: '#2484f2',
            cancelButtonColor: '#b3b3b3',
            confirmButtonText: 'Kirim'
        }).then((result) => {
            if (result.isConfirmed) {
                document.formPendaftaran.submit();
            }
        })
    }
</script>

</body>

</html>