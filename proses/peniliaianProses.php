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

