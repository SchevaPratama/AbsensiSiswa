<?php
$conn = mysqli_connect("localhost", "root", "", "absensi");
date_default_timezone_set("Asia/Jakarta");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($sis = mysqli_fetch_assoc($result)) {
        $rows[] = $sis;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nis = htmlspecialchars($data["nis"]);
    $nmsw = htmlspecialchars($data["nmsw"]);
    $jrs = htmlspecialchars($data["jrs"]);
    $jns = htmlspecialchars($data["jns"]);

    $query = "INSERT INTO siswa
                    VALUES 
                (DEFAULT,'$nis','$nmsw','$jrs','$jns') 
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function absen($id)
{
    global $conn;

    $month = date("m");
    $day_tgl = date("d");
    $day = date("N");
    $ids = $id;
    $wkt = time();

    $query = "INSERT INTO detail_absen
                    VALUES
                (DEFAULT,'$ids','$month','$day','$day_tgl','$wkt')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM data_admin 
                        WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah digunakan')
                </script>";
        return false;
    }


    // cek konfirmasi Password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
                </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Admin baru
    mysqli_query($conn, "INSERT INTO data_admin 
                    VALUES 
                    ('','$username','$password')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $nis = htmlspecialchars($data["nis_siswa"]);
    $nmsw = htmlspecialchars($data["nama_siswa"]);
    $jrs = htmlspecialchars($data["jurusan"]);
    $jns = htmlspecialchars($data["jk_siswa"]);

    $query = "UPDATE siswa SET
                nis_siswa =  '$nis',
                nama_siswa =  '$nmsw',
                jurusan =  '$jrs',
                jk_siswa = '$jns'
                WHERE nis_siswa = '$nis'
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '$id'");

    return mysqli_affected_rows($conn);
}

// function cari($keyword)
// {
//     global $conn;
//     $query = "SELECT * FROM pelanggan 
//                 WHERE   
//                 kd_pelanggan LIKE '%$keyword%' OR
//                 nama_pelanggan LIKE '%$keyword%' OR
//                 alamat LIKE '%$keyword%'OR
//                 telp LIKE '%$keyword%'
//             ";
//     return query($query);
// }
