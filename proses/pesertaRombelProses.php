<?php
include "../connect_db.php";


if(isset($_POST['peserta_rombel_add'])) {
    $sql = "INSERT INTO peserta_rombel (id_peserta_rombel,id_detail_rombel,no_induk_peserta_didik) values ('" . $_POST['id_peserta_rombel'] . "','" . $_POST['id_detail_rombel'] . "','" . $_POST['no_induk_peserta_didik'] . "')";
   runQuery($konek,$sql);
}

if(isset($_POST['peserta_rombel_delete'])) {
    $sql ="delete from peserta_rombel where id_peserta_rombel =".$_POST['id_peserta_rombel'];
    if (pg_query($konek,$sql)) {
        header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
    } else {
        echo pg_last_error($konek);
    }
}

function runQuery($konek,$sql){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode telah ada!');history.go(-1);</script>";
                }else{
                    $m = pg_last_error($konek);
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                    echo "<script>alert(".$m.");history.go(-1);</script>";
                }
            }
        }
    }
}

?>