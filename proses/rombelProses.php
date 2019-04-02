<?php
include "../connect_db.php";


if(isset($_POST['rombel_add'])) {
    $sql = "INSERT INTO rombel (id_rombel,nama) values ('" . $_POST['id_rombel'] . "','" . $_POST['nama'] . "')";
    runQuery($konek,$sql);

}

if(isset($_POST['rombel_edit'])) {
    $sql = "UPDATE rombel SET id_rombel = '".$_POST['id_rombel']."' ,nama = '".$_POST['nama']."' where id_rombel='".$_POST['id_rombel_awal']."'";
    runQuery($konek,$sql);
}


if(isset($_POST['rombel_delete'])) {
    $sql ="delete from rombel where id_rombel ='".$_POST['id_rombel']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
    } else {
        echo pq_last_error($konek);
    }
}


function runQuery($konek,$sql){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../detail_rombel_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode rombel telah ada!');history.go(-1);</script>";
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