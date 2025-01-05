<?php
include 'Latihan_09_config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alumni WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
        header("Location: Latihan_09_index.php?menu=alumni");
        exit(); // Tambahkan exit() setelah header
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>