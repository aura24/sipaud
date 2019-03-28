<?php
include "../connect_db.php";


if(isset($_GET['pilih_ta'])) {
    $sql = "Select * FROM detail_rombel where tahun_ajaran =".$_GET['tahun_ajaran']." and semester =".$_GET['semester'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_table.php");
    } else {
        header("Location: ../penilaian_index.php");
    }
    $konek->close();
}

if(isset($_POST['penilaian_show_add'])) {
    $sql = "INSERT INTO penilaian (id_penilaian,tanggal,id_detail_rombel,id_sub_tema) values ('" . $_POST['id_penilaian'] . "','" . $_POST['tanggal'] . "','" . $_POST['id_detail_rombel'] . "','" . $_POST['id_sub_tema'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
    } else {
        header("Location: ../penilaian_show.php?id=n".$_POST['id_detail_rombel']);
    }
    $konek->close();
}

if(isset($_POST['penilaian_show_edit'])) {
    $sql = "UPDATE penilaian SET id_penilaian = '".$_POST['id_penilaian']."' ,tanggal = '".$_POST['tanggal']."',id_detail_rombel = '".$_POST['id_detail_rombel']."',id_sub_tema = '".$_POST['id_sub_tema']."' where id_penilaian='".$_POST['id_penilaian_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
    } else {
        header("Location: ../penilaian_show.php?id=n".$_POST['id_detail_rombel']);
    }
    $konek->close();
}

if(isset($_POST['penilaian_show_delete'])) {
    $sql ="delete from penilaian where id_penilaian ='".$_POST['id_penilaian']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
    } else {
        echo mysqli_error($konek);
    }
}

if(isset($_POST['detail_indikator_add'])) {
    $sql = "INSERT INTO indikator_detail (id_penilaian,kode_indikator) values ('" . $_POST['id_penilaian'] . "','" . $_POST['kode_indikator'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
    } else {
        header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
    }
    $konek->close();
}

if(isset($_POST['detail_indikator_delete'])) {
    $sql ="delete FROM indikator_detail WHERE id_penilaian ='".$_POST['id_penilaian']."' AND kode_indikator ='".$_POST['kode_indikator']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
    } else {
        echo mysqli_error($konek);
    }
}
?>

