<?php
include "../connect_db.php";

if(isset($_POST['peserta_didik'])) {
    $no_induk = $_POST['no_induk'];
    $nama_l = $_POST['nama_l'];
    $nama_p = $_POST['nama_p'];
    $tanggal_d = $_POST['tanggal_d'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal_l =$_POST['tanggal_l'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $agama = $_POST['agama'];

    $query_select ="select * from peserta_didik where no_induk = '".$no_induk."'";
    if (($no_induk != $_POST['no_induk_awal'])>1) {
        $message ="No Induk telah ada";
        header("Location: ../peserta_didik_input.php");
    }else{
        $sql = "INSERT INTO peserta_didik (no_induk,nama_lengkap,nama_panggilan,tgl_daftar,tempat_lahir, tgl_lahir,jekel,alamat,agama) values ('" . $no_induk . "','" . $nama_l . "','" . $nama_p . "','" . $tanggal_d . "','" . $tmp_lahir . "','" . $tanggal_l . "','" . $gender . "','" . $alamat . "','" . $agama . "')";
        if (mysqli_query($konek, $sql)) {

            header("Location: ../peserta_didik_table.php");
        } else {
            echo mysqli_error($konek);
        }
        $konek->close();
    }
}


if(isset($_POST['peserta_didik_edit'])) {

    $no_induk = $_POST['no_induk'];
    $nama_l = $_POST['nama_l'];
    $nama_p = $_POST['nama_p'];
    $tanggal_d = $_POST['tanggal_d'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal_l =$_POST['tanggal_l'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $agama = $_POST['agama'];
    $query_select ="select * from peserta_didik where no_induk =".$no_induk;
    $cek =0;


    if($cek==0){
        $sql = "UPDATE peserta_didik SET no_induk = '".$no_induk."', nama_lengkap = '".$nama_l."', nama_panggilan = '".$nama_p."', tgl_daftar = '".$tanggal_d."', tempat_lahir = '".$tmp_lahir."', tgl_lahir = '".$tanggal_l."', jekel = '".$gender."',alamat = '".$alamat."', agama = '".$agama."' where no_induk = '".$_POST['no_induk_awal']."'";
        if (mysqli_query($konek, $sql)) {
            header("Location: ../peserta_didik_table.php");
        } else {
            /*notifikasi error/duplikat data*/   
            header("Location: ../peserta_didik_edit.php?no_induk=".$_POST['no_induk_awal']);
        }
    }
}


if(isset($_GET['peserta_didik_delete'])){
    $sql ="delete from peserta_didik where no_induk ='".$_GET['no_induk']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../peserta_didik_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>