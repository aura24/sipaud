<?php
include "../connect_db.php";

if(isset($_POST['pendidik'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal =$_POST['tanggal'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];

    $query_select ="select * from pendidik where nik = '".$nik."'";
    if (mysqli_query($konek, $query_select)) {
        $message ="NIK telah ada";
        header("Location: ../input_pendidik.php?message=" . $message);
    }else{
        $sql = "INSERT INTO pendidik (nik,nama,tempat_lahir, tgl_lahir, jekel,alamat) values ('" . $nik . "','" . $nama . "','" . $tmp_lahir . "','" . $tanggal . "','" . $gender . "','" . $alamat . "')";
        if (mysqli_query($konek, $sql)) {

            header("Location: ../table_pendidik.php");
        } else {
            echo mysqli_error($konek);
        }
        $konek->close();
    }
    

}
?>