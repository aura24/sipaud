<?php
include "../connect_db.php";

if(isset($_POST['detail_rombel_add'])) {
    $sql = "INSERT INTO detail_rombel (id_detail_rombel,tahun_ajaran,semester,id_rombel,pendidik_nik,usia) values ('" . $_POST['id_detail_rombel'] . "','" . $_POST['tahun_ajaran'] . "','" . $_POST['semester'] . "','" . $_POST['namar'] . "','" . $_POST['pendidik_nik'] . "','" . $_POST['usia'] . "')";
    runQuery($konek, $sql);
}
if(isset($_POST['detail_rombel_edit'])) {
    $sql = "UPDATE detail_rombel SET id_detail_rombel = '".$_POST['id_detail_rombel']."' ,tahun_ajaran = '".$_POST['tahun_ajaran']."',semester = '".$_POST['semester']."',id_rombel = '".$_POST['namar']."',pendidik_nik = '".$_POST['pendidik_nik']."',usia = '".$_POST['usia']."' where id_detail_rombel='".$_POST['id_detail_rombel_awal']."'";
    runQuery($konek, $sql);
}
if(isset($_POST['detail_rombel_delete'])) {
    $sql ="delete from detail_rombel where id_detail_rombel ='".$_POST['id_detail_rombel']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../detail_rombel_table.php");
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
                header("Location: ../detail_rombel_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode Rombel telah ada!');history.go(-1);</script>";
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