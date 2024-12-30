<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link rel="stylesheet" href="Tugas.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Tracer Alumni</h1>
        <form id="addAlumniForm">
            <input type="text" id="nim" name="nim" placeholder="NIM" required>
            <input type="text" id="name" name="name" placeholder="Nama" required>
            <input type="text" id="major" name="major" placeholder="Jurusan" required>
            <input type="number" id="year" name="year" placeholder="Angkatan" required>
            <button type="submit">Tambah Alumni</button>
        </form>
        <div id="responseMessage"></div>
        <h2>Daftar Alumni</h2>
        <table id="alumniTable" border="1">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script>
        // Load data alumni saat halaman dimuat
        $(document).ready(function() {
            loadAlumni();

            // Menambahkan data alumni
            $("#addAlumniForm").submit(function(e) {
                e.preventDefault();
                $.post('Tugas2.php', {
                    action: 'add',
                    nim: $("#nim").val(),
                    name: $("#name").val(),
                    major: $("#major").val(),
                    year: $("#year").val()
                }, function(response) {
                    $("#responseMessage").html(response);
                    loadAlumni();
                });
            });

            // Fungsi untuk memuat data alumni
            function loadAlumni() {
                $.post('Tugas2.php', { action: 'read' }, function(response) {
                    $("#alumniTable tbody").html(response);
                });
            }

            // Menghapus data alumni
            $(document).on('click', '.deleteAlumni', function() {
                const index = $(this).data('index');
                $.post('Tugas2.php', {
                    action: 'delete',
                    index: index
                }, function(response) {
                    $("#responseMessage").html(response);
                    loadAlumni();
                });
            });
        });
    </script>
</body>
</html>
