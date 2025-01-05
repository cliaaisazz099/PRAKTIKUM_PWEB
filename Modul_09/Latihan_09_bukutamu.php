<h3>BUKU TAMU</h3>
<hr>

<?php
include "Latihan_09_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO bukutamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesan berhasil dikirim.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$sql = "SELECT * FROM bukutamu ORDER BY tanggal DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <table class='table table-bordered'>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . htmlspecialchars($row["nama"]) . "</td>
            <td>" . htmlspecialchars($row["email"]) . "</td>
            <td>" . htmlspecialchars($row["pesan"]) . "</td>
            <td>" . $row["tanggal"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<div class='alert alert-info'>Belum ada pesan.</div>";
}

$conn->close();
?>

<!-- Form Buku Tamu -->
<div class="mt-4">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
