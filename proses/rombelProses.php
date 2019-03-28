<?php
include "../connect_db.php";


if(isset($_POST['rombel_add'])) {
    $sql = "INSERT INTO rombel (id_rombel,nama) values ('" . $_POST['id_rombel'] . "','" . $_POST['nama'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        header("Location: ../detail_rombel_table.php");
    }
    $konek->close();

}

if(isset($_POST['rombel_edit'])) {
    $sql = "UPDATE rombel SET id_rombel = '".$_POST['id_rombel']."' ,nama = '".$_POST['nama']."' where id_rombel='".$_POST['id_rombel_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        header("Location: ../detail_rombel_table.php");
    }
    $konek->close();
}


if(isset($_POST['rombel_delete'])) {
    $sql ="delete from rombel where id_rombel ='".$_POST['id_rombel']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>