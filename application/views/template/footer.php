</div>
<!-- /page content -->

<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url('vendor/gentelella/') ?>vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url('vendor/gentelella/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url('vendor/gentelella/') ?>build/js/custom.min.js"></script>

<script>
  function deleteEkskulConfirm(id_ekskul) {
    Swal.fire({
      title: 'Yakin ingin menghapus ekskul?',
      text: "Setelah anda menghapus, maka ekskul tidak bisa dikembalikan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#ff3636',
      cancelButtonColor: '#b3b3b3',
      confirmButtonText: 'Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('ekskul/hapus/') ?>" + id_ekskul;
      }
    })
  }

  function searchSiswa() {
    var nisn = document.getElementById('nisn');
    var nama_siswa = document.getElementById('nama_siswa');
    var kelas = document.getElementById('kelas');
    var alamat = document.getElementById('alamat');
    var no_telp = document.getElementById('no_telp');

    $.ajax({
      url: "<?= base_url('siswa/cari/') ?>" + nisn.value,
      success: function(data) {
        var siswa = JSON.parse(data);
        console.log(siswa);
        if (siswa != null) {
          id_siswa.value = siswa.id_siswa;
          nama_siswa.value = siswa.nama_siswa;
          kelas.value = siswa.kelas;
          alamat.value = siswa.alamat;
          no_telp.value = siswa.no_telp;
        }
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