<?php
require '../function/function.php';

$id = $_POST["id"];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = $id");

if (absen($id) > 0) {
    foreach ($siswa as $sis) :
        echo "
            <script>
            document.location.href='detail_absen.php?nis=$id';
            </script>

        ";
    endforeach;
} else {
    echo "
            <script>
            alert ('Gagal Absen!');
            </script>

        ";
}
