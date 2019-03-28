<?php
include "../connect_db.php";


if(isset($_POST['indikator_tpp_add'])) {
    $sql = "INSERT INTO indikator_tpp (kode_tpp,nama) values ('" . $_POST['kode_tpp'] . "','" . $_POST['nama'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_tpp_table.php");
    } else {
        header("Location: ../indikator_tpp_table.php");
    }
    $konek->close();

}


if(isset($_POST['indikator_tpp_edit'])) {
    $sql = "UPDATE indikator_tpp SET kode_tpp = '".$_POST['kode_tpp']."' ,nama = '".$_POST['nama']."' where kode_tpp='".$_POST['kode_tpp_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_tpp_table.php");
    } else {
        header("Location: ../indikator_tpp_table.php");
    }
    $konek->close();
}

if(isset($_POST['indikator_tpp_delete'])) {
    $sql ="delete from indikator_tpp where kode_tpp = '".$_POST['kode_tpp']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_tpp_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>