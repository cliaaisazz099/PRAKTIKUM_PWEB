<h3>Tambah Lowongan Pekerjaan</h3>
<hr>
<form method="POST" action="">
    <div class="mb-3">
        <label for="posisi" class="form-label">Posisi</label>
        <input type="text" class="form-control" id="posisi" name="posisi" required>
    </div>
    <div class="mb-3">
        <label for="perusahaan" class="form-label">Perusahaan</label>
        <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
    </div>
    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'Latihan_09_config.php';

    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_posting = date('Y-m-d');

    $sql = "INSERT INTO bursa_kerja (posisi, perusahaan, lokasi, deskripsi, tanggal_posting) VALUES ('$posisi', '$perusahaan', '$lokasi', '$deskripsi', '$tanggal_posting')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Lowongan berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>
