<?php
include "../connect_db.php";


if(isset($_POST['tema_input'])) {
<<<<<<< HEAD
     $sql = "INSERT INTO tema (id_tema,nama) values ('" . $_POST['id_tema'] . "','" . $_POST['nama'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        header("Location: ../tema_input.php");
    }
    $konek->close();
=======
     $sql = "INSERT INTO tema (id_tema,nama) values ('" . $_POST['kode'] . "','" . $_POST['nama'] . "')";
    runQuery($konek,$sql);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40

}



if(isset($_POST['tema_edit'])) {
<<<<<<< HEAD
   $query_select2 ="select * from tema where id_tema =".$_POST['id_tema'];
    $cek =0;
    $data =mysqli_query($konek, $query_select2);

    $sql2 = "UPDATE tema SET id_tema = '".$_POST['id_tema']."' ,nama = '".$_POST['nama']."' where id_tema='".$_POST['id_tema_awal']."'";
    if (mysqli_query($konek, $sql2)) {
        header("Location: ../tema_table.php");
    } else {
        header("Location: ../tema_edit.php?id=".$_POST['id_tema_awal']);
    }
=======
    $sql2 = "UPDATE tema SET id_tema = '".$_POST['kode']."' ,nama = '".$_POST['nama']."' where id_tema='".$_POST['kode_awal']."'";
    runQuery($konek,$sql2);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
}


if(isset($_GET['tema_delete'])){
    $sql ="delete from tema where id_tema =".$_GET['id_tema'];
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        echo mysqli_error($konek);
=======
    if (pg_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        echo pg_error($konek);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
    }
}

if(isset($_POST['sub_tema_add'])) {
    $sql = "INSERT INTO sub_tema (id_sub_tema,nama,tema_id) values ('" . $_POST['id_sub_tema'] . "','" . $_POST['nama'] . "','" . $_POST['tema_id'] . "')";
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    } else {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    }
    $konek->close();
=======
    runQuerySub($konek, $sql, $_POST['tema_id']);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
}

if(isset($_POST['sub_tema_edit'])) {
    $sql = "UPDATE sub_tema SET id_sub_tema = '".$_POST['id_sub_tema']."' ,nama = '".$_POST['nama']."' where id_sub_tema='".$_POST['id_sub_tema_awal']."'";
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    } else {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    }
    $konek->close();
=======
    runQuerySub($konek, $sql, $_POST['tema_id']);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
}


if(isset($_POST['subtema_delete'])){
    $sql ="delete from sub_tema where id_sub_tema =".$_POST['id_sub_tema'];
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['id_tema']);
    } else {
        echo mysqli_error($konek);
    }
}

=======
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
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40

?>