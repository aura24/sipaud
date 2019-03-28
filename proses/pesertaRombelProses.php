<?php
include "../connect_db.php";


if(isset($_POST['peserta_rombel_add'])) {
    $sql = "INSERT INTO peserta_rombel (id_peserta_rombel,id_detail_rombel,no_induk_peserta_didik) values ('" . $_POST['id_peserta_rombel'] . "','" . $_POST['id_detail_rombel'] . "','" . $_POST['no_induk_peserta_didik'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
    } else {
        header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
    }
    $konek->close();
}

if(isset($_POST['peserta_rombel_delete'])) {
    $sql ="delete from peserta_rombel where id_peserta_rombel =".$_POST['id_peserta_rombel'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
    } else {
        echo mysqli_error($konek);
    }
}
?>