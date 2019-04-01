<?php
include "../connect_db.php";
if(isset($_POST['peserta_didik'])) {
    $no_induk = $_POST['no_induk'];
    $nama_l = $_POST['nama_l'];
    $nama_p = $_POST['nama_p'];
    $tanggal_d = date('Y-m-d');
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal_l =$_POST['tanggal_l'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $agama = $_POST['agama'];
    $sql = "INSERT INTO peserta_didik (no_induk,nama_lengkap,nama_panggilan,tgl_daftar,tempat_lahir, tgl_lahir,jekel,alamat,agama) values ('" . $no_induk . "','" . $nama_l . "','" . $nama_p . "','" . $tanggal_d . "','" . $tmp_lahir . "','" . $tanggal_l . "','" . $gender . "','" . $alamat . "','" . $agama . "')";
    runQuery($konek, $sql);
}

if(isset($_POST['peserta_didik_edit'])) {
    $no_induk = $_POST['no_induk'];
    $nama_l = $_POST['nama_l'];
    $nama_p = $_POST['nama_p'];
    $tanggal_d = $_POST['tanggal_d'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal_l =$_POST['tanggal_l'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $agama = $_POST['agama'];

    $sql = "UPDATE peserta_didik SET no_induk = '".$no_induk."', nama_lengkap = '".$nama_l."', nama_panggilan = '".$nama_p."', tgl_daftar = '".$tanggal_d."', tempat_lahir = '".$tmp_lahir."', tgl_lahir = '".$tanggal_l."', jekel = '".$gender."',alamat = '".$alamat."', agama = '".$agama."' where no_induk = '".$_POST['no_induk_awal']."'";
    runQuery($konek, $sql);

}
if(isset($_GET['peserta_didik_delete'])){
    $sql ="delete from peserta_didik where no_induk ='".$_GET['no_induk']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../peserta_didik_table.php");
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
                header("Location: ../peserta_didik_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Nomor Induk telah ada!');history.go(-1);</script>";
                }else{
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                }
            }
        }
    }
}
?>