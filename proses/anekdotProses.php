<?php
include "../connect_db.php";


if(isset($_POST['anekdot_add'])) {
    $sql = "INSERT INTO catatan_anekdot (kode_anekdot,id_detail_penilaian,waktu,tempat,peristiwa) values ('" . $_POST['kode_anekdot'] . "','" . $_POST['id_detail_penilaian'] . "','" . $_POST['waktu'] . "','" . $_POST['tempat'] . "','" . $_POST['peristiwa'] . "')";
    runQuery($konek,$sql,$_POST['id_detail_penilaian']);
}

if(isset($_POST['anekdot_edit'])) {
    $sql = "UPDATE catatan_anekdot SET 
            id_detail_penilaian = '" . $_POST['id_detail_penilaian'] . "',
            waktu = '" . $_POST['waktu'] . "',
            tempat = '" . $_POST['tempat'] . "',
            peristiwa =  '" . $_POST['peristiwa'] . "' WHERE  kode_anekdot = '" . $_POST['kode_anekdot'] . "'";
    runQuery($konek,$sql,$_POST['id_detail_penilaian']);
}


if(isset($_POST['detail_indikator_add'])) {
    $sql = "INSERT INTO indikator_detail (id_penilaian,kode_indikator) values ('" . $_POST['id_penilaian'] . "','" . $_POST['kode_indikator'] . "')";
    runQuery($konek,$sql, $_POST['id_detail_penilaian']);
}

if(isset($_POST['anekdot_delete'])) {
    $sql ="delete from catatan_anekdot where kode_anekdot ='".$_POST['kode_anekdot']."'";
    runQuery($konek,$sql, $_POST['id_detail_penilaian']);
}


if(isset($_POST['indi_muncul_add'])) {
    $sql = "INSERT INTO indikator_yg_muncul (kode_anekdot,kode_tpp) values ('" . $_POST['kode_anekdot'] . "','" . $_POST['kode_tpp'] . "')";
    runQuery($konek,$sql,$_POST['id_detail_penilaian']);
}

if(isset($_POST['indi_delete'])) {
//    echo "tes";
    $sql ="delete from indikator_yg_muncul where kode_anekdot ='".$_POST['kode_anekdot']."' AND kode_tpp = '".$_POST['kode_tpp']."'";
    runQuery($konek,$sql, $_POST['id_detail_penilaian']);
}



function runQuery($konek,$sql,$id_detail_penilaian){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../penilaian_anekdot.php?id_detail_penilaian=".$id_detail_penilaian);
            }
            else {
                if ($state=="23505") { // unique_violation
                        echo "<script>alert('Kode indikator telah ada!');history.go(-1);</script>";
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