<?php
include "../connect_db.php";


if(isset($_POST['tema_input'])) {
     $sql = "INSERT INTO tema (id_tema,nama) values ('" . $_POST['id_tema'] . "','" . $_POST['nama'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        header("Location: ../tema_input.php");
    }
    $konek->close();

}



if(isset($_POST['tema_edit'])) {
   $query_select2 ="select * from tema where id_tema =".$_POST['id_tema'];
    $cek =0;
    $data =mysqli_query($konek, $query_select2);

    $sql2 = "UPDATE tema SET id_tema = '".$_POST['id_tema']."' ,nama = '".$_POST['nama']."' where id_tema='".$_POST['id_tema_awal']."'";
    if (mysqli_query($konek, $sql2)) {
        header("Location: ../tema_table.php");
    } else {
        header("Location: ../tema_edit.php?id=".$_POST['id_tema_awal']);
    }
}


if(isset($_GET['tema_delete'])){
    $sql ="delete from tema where id_tema =".$_GET['id_tema'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_table.php");
    } else {
        echo mysqli_error($konek);
    }
}

if(isset($_POST['sub_tema_add'])) {
    $sql = "INSERT INTO sub_tema (id_sub_tema,nama,tema_id) values ('" . $_POST['id_sub_tema'] . "','" . $_POST['nama'] . "','" . $_POST['tema_id'] . "')";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    } else {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    }
    $konek->close();
}

if(isset($_POST['sub_tema_edit'])) {
    $sql = "UPDATE sub_tema SET id_sub_tema = '".$_POST['id_sub_tema']."' ,nama = '".$_POST['nama']."' where id_sub_tema='".$_POST['id_sub_tema_awal']."'";
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    } else {
        header("Location: ../tema_show.php?id=".$_POST['tema_id']);
    }
    $konek->close();
}


if(isset($_POST['subtema_delete'])){
    $sql ="delete from sub_tema where id_sub_tema =".$_POST['id_sub_tema'];
    if (mysqli_query($konek, $sql)) {
        header("Location: ../tema_show.php?id=".$_POST['id_tema']);
    } else {
        echo mysqli_error($konek);
    }
}


?>