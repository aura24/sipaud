<?php
include "../connect_db.php";


if(isset($_POST['detail_rombel_add'])) {
    $sql = "INSERT INTO detail_rombel (id_detail_rombel,tahun_ajaran,semester,id_rombel,pendidik_nik,usia) values ('" . $_POST['id_detail_rombel'] . "','" . $_POST['tahun_ajaran'] . "','" . $_POST['semester'] . "','" . $_POST['namar'] . "','" . $_POST['pendidik_nik'] . "','" . $_POST['usia'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        header("Location: ../detail_rombel_table.php");
    }
    $konek->close();

}

if(isset($_POST['detail_rombel_edit'])) {
    $sql = "UPDATE detail_rombel SET id_detail_rombel = '".$_POST['id_detail_rombel']."' ,tahun_ajaran = '".$_POST['tahun_ajaran']."',semester = '".$_POST['semester']."',id_rombel = '".$_POST['id_rombel']."',pendidik_nik = '".$_POST['pendidik_nik']."',usia = '".$_POST['usia']."' where id_detail_rombel='".$_POST['id_detail_rombel_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        header("Location: ../detail_rombel_table.php");
    }
    $konek->close();
}


if(isset($_POST['detail_rombel_delete'])) {
    $sql ="delete from detail_rombel where id_detail_rombel ='".$_POST['id_detail_rombel']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        echo mysqli_error($konek);
    }
}