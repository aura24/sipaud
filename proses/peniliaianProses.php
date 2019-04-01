<?php
include "../connect_db.php";


if(isset($_GET['pilih_ta'])) {
        header("Location: ../penilaian_table.php?ta=".$_GET['tahun_ajaran']."&"."semester=".$_GET['semester']);
}

