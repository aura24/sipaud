<?php
include "../connect_db.php";


if(isset($_GET['pilih_ta'])) {
        header("Location: ../penilaian_table.php?tahun_ajaran=".$_GET['tahun_ajaran']."&semester=".$_GET['semester']);
}

if(isset($_POST['penilaian_show_add'])) {
    $sql = "INSERT INTO penilaian (id_penilaian,tanggal,id_detail_rombel,id_sub_tema) values ('" . $_POST['id_penilaian'] . "','" . $_POST['tanggal'] . "','" . $_POST['id_detail_rombel'] . "','" . $_POST['id_sub_tema'] . "')";
    runQuery($konek, $sql);
}

if(isset($_POST['penilaian_show_edit'])) {
    $sql = "UPDATE penilaian SET id_penilaian = '".$_POST['id_penilaian']."' ,tanggal = '".$_POST['tanggal']."',id_detail_rombel = '".$_POST['id_detail_rombel']."',id_sub_tema = '".$_POST['id_sub_tema']."' where id_penilaian='".$_POST['id_penilaian_awal']."'";
    runQuery($konek, $sql);
}

if(isset($_POST['penilaian_show_delete'])) {
    $sql ="delete from penilaian where id_penilaian ='".$_POST['id_penilaian']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
    } else {
        echo pg_last_error($konek);
    }
}

if(isset($_POST['detail_indikator_add'])) {
    $sql = "INSERT INTO indikator_detail (id_penilaian,kode_indikator) values ('" . $_POST['id_penilaian'] . "','" . $_POST['kode_indikator'] . "')";
    runQuery($konek, $sql);
}

if(isset($_POST['detail_indikator_delete'])) {
    $sql ="delete FROM indikator_detail WHERE id_penilaian ='".$_POST['id_penilaian']."' AND kode_indikator ='".$_POST['kode_indikator']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
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
                header("Location: ../penilaian_show.php?id=".$_POST['id_detail_rombel']);
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

