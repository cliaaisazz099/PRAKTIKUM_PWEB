$(document).ready(function() {
    // 1. Efek fade-in untuk semua gambar di galeri saat halaman dimuat
    $('.gallery img').each(function(index) {
        $(this).delay(300 * index).fadeTo(1000, 1); // Memberi delay dan efek fade-in pada gambar
    });

    // 2. Menangani klik pada gambar di galeri
    $('.gallery img').on('click', function() {
        var src = $(this).attr('src'); // Mendapatkan src gambar yang diklik
        $('#modalImage').attr('src', src); // Menampilkan gambar di modal
        $('#myModal').fadeIn(); // Menampilkan modal
    });

    // 3. Menutup modal dengan mengklik tombol "close"
    $('.close').on('click', function() {
        $('#myModal').fadeOut(); // Menyembunyikan modal
    });

    // 4. Menutup modal jika mengklik area di luar gambar
    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').fadeOut(); // Menyembunyikan modal
        }
    });

    // 5. Fungsi pencarian alumni
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().toLowerCase(); // Mengambil input pencarian dan membuatnya menjadi huruf kecil
        $('#alumniList li').each(function() {
            var alumniName = $(this).text().toLowerCase(); // Mengambil nama alumni
            if (alumniName.indexOf(searchTerm) !== -1) {
                $(this).show(); // Menampilkan elemen jika ditemukan
            } else {
                $(this).hide(); // Menyembunyikan elemen jika tidak ditemukan
            }
        });
    });
});
