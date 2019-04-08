<?php
include "../connect_db.php";


if(isset($_POST['indikator_detail_add'])) {

    foreach ($_POST['kode_indikator'] as $kode_indikator) {
        $sql = "INSERT INTO indikator_detail (id_sub_tema, kode_indikator) values (" . $_POST['id_sub_tema'] . "," . $kode_indikator . ")";
        runQuery($konek, $sql, $_POST['tema_id']);
    }
}

if(isset($_POST['indikator_detail_delete'])) {
    $n=0;
    foreach ($_POST['kode_indikator'] as $kode_indikator) {
         $sql = "delete from indikator_detail where id_sub_tema = '".$_POST['id_sub_tema']."' AND kode_indikator ='" . $kode_indikator . "'";
         pg_query($konek,$sql);
         $n++;
    }
    if($n==count($_POST['kode_indikator'])){
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    }

}

function runQuery($konek,$sql, $tema_id){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../tema_show.php?id=".$tema_id);
            }
            else {
                $m = pg_last_error($konek);
                if ($state=="23505") { // unique_violation
                    echo $m;
//                    echo "<script>alert('Kode indikator telah ada!');history.go(-1);</script>";
                }else{
//
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";

                }
            }
        }
    }
}
