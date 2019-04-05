<?php
include "../connect_db.php";

if(isset($_POST['nilai_add'])) {
    $sql = "INSERT INTO detail_penilaian 
          (id_detail_penilaian,
          id_penilaian,
          id_peserta_rombel,
          agama_moral,
          fisik_motorik,
          kognitif,
          bahasa,
          sosial_emosional,
          seni)
            values ('" . $_POST['id_penilaian'].$_POST['id_peserta_rombel'] . "','" . $_POST['id_penilaian'] . "','" . $_POST['id_peserta_rombel'] . "','" . $_POST['agama_moral'] . "','" . $_POST['fisik_motorik'] . "','" . $_POST['kognitif'] . "','" . $_POST['bahasa'] . "','" . $_POST['sosial_emosional'] . "','" . $_POST['seni'] . "')";
    runQuery($konek, $sql);
}

if(isset($_POST['nilai_edit'])) {
    $sql = "UPDATE  detail_penilaian SET 
          id_penilaian = '" . $_POST['id_penilaian'] . "',
          id_peserta_rombel = '" . $_POST['id_peserta_rombel'] . "',
          agama_moral = '" . $_POST['agama_moral'] . "',
          fisik_motorik = '" . $_POST['fisik_motorik'] . "',
          kognitif = '" . $_POST['kognitif'] . "',
          bahasa = '" . $_POST['bahasa'] . "',
          sosial_emosional = '" . $_POST['sosial_emosional'] . "',
          seni = '" . $_POST['seni'] . "' where id_detail_penilaian = '".$_POST['id_detail_penilaian']."'";
    runQuery($konek, $sql);
}

if(isset($_POST['nilai_delete'])){
    $sql="DELETE FROM detail_penilaian WHERE id_detail_penilaian = ".$_POST['id_detail_penilaian'];
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
                header("Location: ../penilaian_show_detail.php?id=".$_POST['id_penilaian']);
            }
            else {
                echo $state;
                if ($state=="23505") { // unique_violation
                    echo "<script>alert('Kode telah ada!');history.go(-1);</script>";
                }else{
                    echo pg_last_error($konek);
//                    echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";;
                }
            }
        }
    }
}

?>