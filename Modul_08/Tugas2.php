<?php
$file = 'alumni.csv';

// Fungsi untuk membaca data dari file CSV
function readAlumniData($file) {
    $data = [];
    if (file_exists($file)) {
        $handle = fopen($file, 'r');
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

// Fungsi untuk menulis data ke file CSV
function writeAlumniData($file, $data) {
    $handle = fopen($file, 'w');
    foreach ($data as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);
}

// Memproses permintaan dari client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        // Tambah data alumni
        $nim = $_POST['nim'];
        $name = $_POST['name'];
        $major = $_POST['major'];
        $year = $_POST['year'];

        $data = readAlumniData($file);
        $data[] = [$nim, $name, $major, $year];
        writeAlumniData($file, $data);

        echo "Data berhasil ditambahkan!";
    } elseif ($action === 'read') {
        // Membaca data alumni
        $data = readAlumniData($file);
        foreach ($data as $index => $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row[0]) . "</td>
                    <td>" . htmlspecialchars($row[1]) . "</td>
                    <td>" . htmlspecialchars($row[2]) . "</td>
                    <td>" . htmlspecialchars($row[3]) . "</td>
                    <td>
                        <button class='deleteAlumni' data-index='$index'>Hapus</button>
                    </td>
                  </tr>";
        }
    } elseif ($action === 'delete') {
        // Hapus data alumni
        $index = $_POST['index'];
        $data = readAlumniData($file);
        unset($data[$index]);
        $data = array_values($data); // Reset index array
        writeAlumniData($file, $data);

        echo "Data berhasil dihapus!";
    }
}
?>
