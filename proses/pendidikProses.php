<?php
include "../connect_db.php";

if(isset($_POST['pendidik'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal =$_POST['tanggal'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];
    $sql = "INSERT INTO pendidik (nik,nama,tempat_lahir, tgl_lahir, jekel,alamat) values ('" . $nik . "','" . $nama . "','" . $tmp_lahir . "','" . $tanggal . "','" . $gender . "','" . $alamat . "')";

    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../pendidik_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Nik telah ada!');history.go(-1);</script>";
                }else{
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                }

            }
        }
    }
}


if(isset($_POST['pendidik_edit'])) {

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tanggal =$_POST['tanggal'];
    $gender=$_POST['gender'];
    $alamat=$_POST['alamat'];

        $sql = "UPDATE pendidik SET nik = '".$nik."' ,nama = '".$nama."', tempat_lahir = '".$tmp_lahir."', tgl_lahir = '".$tanggal."', jekel = '".$gender."',alamat = '".$alamat."' where nik = '".$_POST['nik_awal']."'";
        if (pg_send_query($konek, $sql)) {
            $res=pg_get_result($konek);
            if ($res) {
                $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
                if ($state==0) {
                    header("Location: ../pendidik_table.php");
                }
                else {
                    if ($state=="23505") { // unique_violation
                        echo "<script>alert('Nik telah ada!');history.go(-1);</script>";
                    }else{
                        echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                    }

                }
            }
    }
}


if(isset($_GET['pendidik_delete'])){
    $sql ="delete from pendidik where nik ='".$_GET['nik']."'";
    if (pg_query($konek, $sql)) {
        header("Location: ../pendidik_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>