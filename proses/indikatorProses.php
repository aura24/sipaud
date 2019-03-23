<?php
include "../connect_db.php";


if(isset($_POST['indikator_add'])) {
    $sql = "INSERT INTO indikator (kode_indikator,nama) values ('" . $_POST['kode_indikator'] . "','" . $_POST['nama'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        header("Location: ../indikator_table.php");
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
    $sql ="delete from indikator where kode_indikator =".$_POST['kode_indikator'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        echo mysqli_error($konek);
    }
}