<?php
include "../connect_db.php";


if(isset($_POST['indikator_add'])) {
    $sql = "INSERT INTO indikator (kode_indikator,nama) values ('" . $_POST['kode_indikator'] . "','" . $_POST['nama'] . "')";
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        header("Location: ../indikator_table.php");
    }
    $konek->close();
=======
    runQuery($konek, $sql);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40

}

if(isset($_POST['indikator_edit'])) {
    $sql = "UPDATE indikator SET kode_indikator = '".$_POST['kode_indikator']."' ,nama = '".$_POST['nama']."' where kode_indikator='".$_POST['kode_indikator_awal']."'";
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        header("Location: ../indikator_table.php");
    }
    $konek->close();
=======
    runQuery($konek, $sql);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
}


if(isset($_POST['indikator_delete'])) {
    $sql ="delete from indikator where kode_indikator ='".$_POST['kode_indikator']."'";
<<<<<<< HEAD
    if (mysqli_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
    } else {
        echo mysqli_error($konek);
    }
}
?>
=======
    if (pg_query($konek, $sql)) {
        header("Location: ../indikator_table.php");
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
                header("Location: ../indikator_table.php");
            }
            else {
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode indikator telah ada!');history.go(-1);</script>";
                }else{
                    $m = pg_last_error($konek);
                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
                    echo "<script>alert(".$m.");history.go(-1);</script>";
                }
            }
        }
    }
}
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
