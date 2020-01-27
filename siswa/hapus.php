<?php
require '../function/function.php';

$id = $_GET["data"];

if (hapus($id) > 0) {
    echo "
            <script>
            alert ('Data Berhasil Dihapus!');
            document.location.href='tables.php';
            </script>

        ";
} else {
    echo "
            <script>
            alert ('Data Gagal Dihapus!');
            </script>

        ";
}
