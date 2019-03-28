<?php
include "../connect_db.php";


if(isset($_POST['anekdot_add'])) {
    $sql = "INSERT INTO catatan_anekdot (kode_anekdot,id_detail_penilaian,waktu,tempat,peristiwa) values ('" . $_POST['kode_anekdot'] . "','" . $_POST['id_detail_penilaian'] . "','" . $_POST['waktu'] . "','" . $_POST['tempat'] . "','" . $_POST['peristiwa'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_anekdot.php?id=".$_POST['id_detail_penilaian']);
    } else {
        header("Location: ../penilaian_anekdot.php?id=".$_POST['id_detail_penilaian']);
    }
    $konek->close();
}

if(isset($_POST['detail_indikator_add'])) {
    $sql = "INSERT INTO indikator_detail (id_penilaian,kode_indikator) values ('" . $_POST['id_penilaian'] . "','" . $_POST['kode_indikator'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../anekdot_addd.php");
    } else {
        header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
    }
    $konek->close();
}
// if(isset($_POST['penilaian_show_edit'])) {
//     $sql = "UPDATE penilaian SET id_penilaian = '".$_POST['id_penilaian']."' ,tanggal = '".$_POST['tanggal']."',id_detail_rombel = '".$_POST['id_detail_rombel']."',id_sub_tema = '".$_POST['id_sub_tema']."' where id_penilaian='".$_POST['id_penilaian_awal']."'";
//     if (mysqli_query($konek, $sql)) {
//         header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
//     } else {
//         header("Location: ../penilaian_show.php?id=n".$_POST['id_detail_rombel']);
//     }
//     $konek->close();
// }

if(isset($_POST['anekdot_delete'])) {
    $sql ="delete from catatan_anekdot where kode_anekdot ='".$_POST['kode_anekdot']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../penilaian_anekdot.php?id=".$_POST['id_detail_penilaian']);
    } else {
        echo mysqli_error($konek);
    }
}
?>