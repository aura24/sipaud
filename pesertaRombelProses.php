<?php
include "../connect_db.php";


if(isset($_POST['peserta_rombel_add'])) {
    $sql = "INSERT INTO peserta_rombel (id_peserta_rombel,id_detail_rombel,no_induk_peserta_didik) values ('" . $_POST['id_peserta_rombel'] . "','" . $_POST['id_detail_rombel'] . "''" . $_POST['no_induk_peserta_didik'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../peserta_rombel.php");
    } else {
        header("Location: ../peserta_rombel.php");
    }
    $konek->close();

}

if(isset($_POST['indikator_edit'])) {
    $sql = "UPDATE indikator SET kode_indikator = '".$_POST['kode_indikator']."' ,nama = '".$_POST['nama']."' where kode_indikator='".$_POST['kode_indikator_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        header("Location: ../indikator_table.php");
    }
    $konek->close();
}


if(isset($_POST['indikator_delete'])) {
    $sql ="delete from indikator where kode_indikator ='".$_POST['kode_indikator']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        echo mysqli_error($konek);
    }
}