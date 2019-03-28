<?php
include "../connect_db.php";


if(isset($_POST['tahun_add'])) {
    $sql = "INSERT INTO tahun_ajaran (id_tahun_ajaran,tahun_ajaran) values ('" . $_POST['id_tahun_ajaran'] . "','" . $_POST['tahun_ajaran'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tahun_table.php");
    } else {
        header("Location: ../tahun_table.php");
    }
    $konek->close();

}

if(isset($_POST['tahun_edit'])) {
    $sql = "UPDATE tahun_ajaran SET id_tahun_ajaran = '".$_POST['id_tahun_ajaran']."' ,tahun_ajaran = '".$_POST['tahun_ajaran']."' where id_tahun_ajaran='".$_POST['id_tahun_ajaran_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tahun_table.php");
    } else {
        header("Location: ../tahun_table.php");
    }
    $konek->close();
}


if(isset($_POST['tahun_delete'])) {
    $sql ="delete from tahun_ajaran where id_tahun_ajaran =".$_POST['id_tahun_ajaran'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tahun_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>