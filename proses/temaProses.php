<?php
include "../connect_db.php";


if(isset($_POST['tema_input'])) {
     $sql = "INSERT INTO tema (id_tema,nama) values ('" . $_POST['kode'] . "','" . $_POST['nama'] . "')";
    runQuery($konek,$sql);

}



if(isset($_POST['tema_edit'])) {
    $sql2 = "UPDATE tema SET id_tema = '".$_POST['kode']."' ,nama = '".$_POST['nama']."' where id_tema='".$_POST['kode_awal']."'";
    runQuery($konek,$sql2);
}


if(isset($_GET['tema_delete'])){
    $sql ="delete from tema where id_tema =".$_GET['id_tema'];
    if (pg_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        echo pg_error($konek);
    }
}

if(isset($_POST['sub_tema_add'])) {
    $sql = "INSERT INTO sub_tema (id_sub_tema,nama,tema_id) values ('" . $_POST['id_sub_tema'] . "','" . $_POST['nama'] . "','" . $_POST['tema_id'] . "')";
    runQuerySub($konek, $sql, $_POST['tema_id']);
}

if(isset($_POST['sub_tema_edit'])) {
    $sql = "UPDATE sub_tema SET id_sub_tema = '".$_POST['id_sub_tema']."' ,nama = '".$_POST['nama']."' where id_sub_tema='".$_POST['id_sub_tema_awal']."'";
    runQuerySub($konek, $sql, $_POST['tema_id']);
}


if(isset($_POST['subtema_delete'])){
    $sql ="delete from sub_tema where id_sub_tema =".$_POST['id_sub_tema'];
    if (pg_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['id_tema']);
    } else {
        echo pg_error($konek);
    }
}

function runQuery($konek,$sql){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);

        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../tema_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode tema telah ada!');history.go(-1);</script>";
                }else{
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                }
            }
        }
    }
}

function runQuerySub($konek,$sql,$tema_id){
    if (pg_send_query($konek, $sql)) {
        $res=pg_get_result($konek);
        if ($res) {
            $state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
            if ($state==0) {
                header("Location: ../tema_show.php?id=".$tema_id);
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode sub tema telah ada!');history.go(-1);</script>";
                }else{
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                }
            }
        }
    }
}

?>