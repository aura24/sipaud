<?php
include "../connect_db.php";


if(isset($_POST['peserta_rombel_add'])) {

    $cek = "SELECT * FROM peserta_rombel JOIN detail_rombel ON detail_rombel.id_detail_rombel = peserta_rombel.id_detail_rombel 
             WHERE no_induk_peserta_didik = '".$_POST['no_induk_peserta_didik']."'  AND detail_rombel.id_tahun_ajaran = '".$_POST['id_tahun_ajaran']."'  AND semester = '".$_POST['semester']."' ";
    $excecute = pg_query($konek,$cek);
    if(pg_num_rows($excecute)==0){
        $sql = "INSERT INTO peserta_rombel (id_peserta_rombel,id_detail_rombel,no_induk_peserta_didik) values ('" . $_POST['id_peserta_rombel'] . "','" . $_POST['id_detail_rombel'] . "','" . $_POST['no_induk_peserta_didik'] . "')";
        runQuery($konek,$sql,$_POST['id_detail_rombel'], $_POST['id_tahun_ajaran'],$_POST['semester']);
    }else{
        echo "<script>alert('Peserta Didik telah terdaftar di tahun ajaran dan semester ini!');history.go(-1);</script>";
    }

}

if(isset($_POST['peserta_rombel_delete'])) {
    $sql ="delete from peserta_rombel where id_peserta_rombel =".$_POST['id_peserta_rombel'];
    if (pg_query($konek,$sql)) {
        header("Location: ../peserta_rombel.php?id=".$_POST['id_detail_rombel']);
    } else {
        echo pg_last_error($konek);
    }
}

function runQuery($konek,$sql,$id, $ta, $s){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../peserta_rombel.php?id=".$id."&ta=".$ta."&semester=".$s);
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