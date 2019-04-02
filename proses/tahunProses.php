<?php
include "../connect_db.php";


if(isset($_POST['tahun_add'])) {
    $sql = "INSERT INTO tahun_ajaran (id_tahun_ajaran,tahun_ajaran) values ('" . $_POST['id_tahun_ajaran'] . "','" . $_POST['tahun_ajaran'] . "')";
   runQuery($konek,$sql);

}

if(isset($_POST['tahun_edit'])) {
    $sql = "UPDATE tahun_ajaran SET id_tahun_ajaran = '".$_POST['id_tahun_ajaran']."' ,tahun_ajaran = '".$_POST['tahun_ajaran']."' where id_tahun_ajaran='".$_POST['id_tahun_ajaran_awal']."'";
    runQuery($konek,$sql);
}


if(isset($_POST['tahun_delete'])) {
    $sql ="delete from tahun_ajaran where id_tahun_ajaran =".$_POST['id_tahun_ajaran'];
    runQuery($konek,$sql);
}


function runQuery($konek,$sql){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../tahun_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode Tahun telah ada!');history.go(-1);</script>";
                }else{
                    $m = pg_last_error($konek);
//                    echo $m;
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
//                    echo "<script>alert(".$m.");history.go(-1);</script>";
                }
            }
        }
    }
}
?>