<h3>Bursa Kerja</h3>
<hr>
<a href="?menu=tambah_kerja" class="btn btn-primary mb-3">Tambah Lowongan</a>
<?php
include "Latihan_09_config.php";

$sql = "SELECT * FROM bursa_kerja ORDER BY tanggal_posting DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <tr>
                <th>Posisi</th>
                <th>Perusahaan</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Tanggal Posting</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['posisi'] . "</td>
                <td>" . $row['perusahaan'] . "</td>
                <td>" . $row['lokasi'] . "</td>
                <td>" . $row['deskripsi'] . "</td>
                <td>" . $row['tanggal_posting'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada lowongan pekerjaan saat ini.</p>";
}

$conn->close();
?>
