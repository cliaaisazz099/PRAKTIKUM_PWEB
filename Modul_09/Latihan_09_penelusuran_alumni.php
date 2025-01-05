<h3>Penelusuran Alumni</h3>
<hr>
<form method="GET" action="">
    <input type="hidden" name="menu" value="penelusuran_alumni">
    <div class="mb-3">
        <label for="query" class="form-label">Cari Alumni:</label>
        <input type="text" class="form-control" id="query" name="query" placeholder="Masukkan nama atau jurusan">
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

<?php
include "Latihan_09_config.php";

if (isset($_GET['query'])) {
    $query = $conn->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM alumni WHERE MATCH(nama, jurusan) AGAINST('$query')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <tr>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Foto</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['jurusan'] . "</td>
                    <td>" . $row['tahun_lulus'] . "</td>
                    <td><img src='" . $row['foto'] . "' width='50'></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Alumni tidak ditemukan.</p>";
    }
}

$conn->close();
?>
