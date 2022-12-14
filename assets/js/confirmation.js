function deleteEkskulConfirm(url) {
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
            window.location.href = url;
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

function adminLogoutConfirm(url) {
    Swal.fire({
        title: 'Yakin ingin keluar?',
        text: "Setelah melakukan logout, Anda harus melakukan login ulang.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3636',
        cancelButtonColor: '#b3b3b3',
        confirmButtonText: 'Logout.'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function deleteGuruFromEkskul(url, nama_ekskul, nama_guru) {
    Swal.fire({
        title: 'Yakin ingin mencabut ' + nama_guru + ' sebagai pembimbing ekskul ' + nama_ekskul + '?',
        text: "Anda dapat menambahkan kembali guru tersebut maupun guru lainnya.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3636',
        cancelButtonColor: '#b3b3b3',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function deleteJadwalFromEkskul(url) {
    Swal.fire({
        title: 'Yakin ingin menghapus jadwal dari ekskul?',
        text: "Anda dapat menambahkan jadwal kembali nanti.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3636',
        cancelButtonColor: '#b3b3b3',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}

function removeSiswaFromEkskul(url, nama_ekskul, nama_siswa) {
    Swal.fire({
        title: 'Yakin ingin mengeluarkan ' + nama_siswa + ' dari ekskul ' + nama_ekskul + '?',
        text: "Siswa tersebut masih dapat mendaftar kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3636',
        cancelButtonColor: '#b3b3b3',
        confirmButtonText: 'Keluarkan.'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    })
}