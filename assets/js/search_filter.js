function searchSiswaByNISN() {
    var nisn = document.getElementById('nisn');
    var nama_siswa = document.getElementById('nama_siswa');
    var kelas = document.getElementById('kelas');
    var alamat = document.getElementById('alamat');
    var no_telp = document.getElementById('no_telp');

    $.ajax({
        url: "<?= base_url('siswa/cari_siswa/') ?>",
        method: "POST",
        data: {
            nisn: nisn.value
        },
        success: function (data) {
            var siswa = JSON.parse(data);
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

function filterSiswa(url) {
    var search_siswa = document.getElementById('search_siswa');
    var filter_ekskul = document.getElementById('filter_ekskul');
    var siswa_table = document.getElementById('siswa_table');

    $.ajax({
        url: url,
        method: "post",
        data: {
            keyword: search_siswa.value,
            filter_ekskul: filter_ekskul.value,
        },
        success: function (data) {
            siswa_table.innerHTML = data;
        }
    })
}

function searchEkskul(url) {
    var search_ekskul = document.getElementById('search_ekskul');
    var ekskul_table = document.getElementById('ekskul_table');

    $.ajax({
        url: url,
        method: "post",
        data: {
            keyword: search_ekskul.value,
        },
        success: function (data) {
            ekskul_table.innerHTML = data;
        }
    })
}
