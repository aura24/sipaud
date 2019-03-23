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
    if (($nik != $_POST['nik_awal'])>1) {
        $message ="NIK telah ada";
        header("Location: ../pendidik_input.php");
    }else{
        $sql = "INSERT INTO pendidik (nik,nama,tempat_lahir, tgl_lahir, jekel,alamat) values ('" . $nik . "','" . $nama . "','" . $tmp_lahir . "','" . $tanggal . "','" . $gender . "','" . $alamat . "')";
        if (mysqli_query($konek, $sql)) {

            header("Location: ../pendidik_table.php");
        } else {
            echo mysqli_error($konek);
        }
        $konek->close();
    }
}


if(isset($_POST['pendidik_edit'])) {

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal =$_POST['tanggal'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $query_select ="select * from pendidik where nik =".$nik;
    $cek =0;


    if($cek==0){
        $sql = "UPDATE pendidik SET nik = '".$nik."' ,nama = '".$nama."', tempat_lahir = '".$tmp_lahir."', tgl_lahir = '".$tanggal."', jekel = '".$gender."',alamat = '".$alamat."' where nik = '".$_POST['nik_awal']."'";
        if (mysqli_query($konek, $sql)) {
            header("Location: ../pendidik_table.php");
        } else {
                header("Location: ../pendidik_edit.php?nik=".$_POST['nik_awal']);
        }
    }
}


if(isset($_GET['pendidik_delete'])){
    $sql ="delete from pendidik where nik =".$_GET['nik'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../pendidik_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>