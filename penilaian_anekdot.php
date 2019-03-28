<!DOCTYPE html>
<html lang="en">
<?php include "connect_db.php" ?>
<?php include "layout/head.php" ?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <?php include "layout/sidebar.php" ?>
            </div>
        </div>
        <?php include "layout/top_navigation.php" ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <?php
                    $querydetail ="SELECT *, penilaian.tanggal as tanggal, peserta_didik.nama_lengkap as peserta_didik FROM detail_penilaian                              JOIN penilaian ON penilaian.id_penilaian = detail_penilaian.id_penilaian
                              JOIN peserta_rombel ON peserta_rombel.id_peserta_rombel = detail_penilaian.id_peserta_rombel
                              JOIN peserta_didik ON peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik
                              where id_detail_penilaian = ".$_GET['id'];
                    $peserta = mysqli_query($konek, $querydetail);
                 ?>

                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Penilaian Peserta Rombel</h3>
                        </div>
                        <table class="table table-striped">
                            <?php
                            while($data = mysqli_fetch_object($peserta)){?>
                                <tr>
                                    <td width="10%">Nama </td>
                                    <td>: <?php echo $data->peserta_didik ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>: <?php echo $data->tanggal ?></td>
                                </tr>
                            <?php } ?>
                        </table>

                        <!-- <a class="btn btn-primary" href="anekdot_addd.php"><li class="fa fa-user-plus"></li> Catatan Anekdot </a> -->
                        <a class="btn btn-primary" data-toggle="modal" data-target="#addAnekdot"><li class="fa fa-user-plus"></li> Catatan Anekdot </a>


                        <?php
                        $queryAnekdot ="SELECT * FROM catatan_anekdot where id_detail_penilaian = ".$_GET['id'];
                        $anekdot = mysqli_query($konek, $queryAnekdot);
                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <th>Waktu</th>
                                <th>Tempat</th>
                                <th>Peristiwa</th>
                                <th>Indikator yang muncul</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                         <?php
                            while($subjek = mysqli_fetch_object($anekdot)){?>
                                <tr>
                                    <td><?php echo $subjek->waktu ?></td>
                                    <td><?php echo $subjek->tempat ?></td>
                                    <td><?php echo $subjek->peristiwa ?></td>
                                    <td><ul>
                                            <?php
                                            $sqlIndikator = "Select indikator_tpp.nama as indikator From indikator_yg_muncul JOIN indikator_tpp ON indikator_tpp.kode_tpp = indikator_yg_muncul.kode_tpp where kode_anekdot = ".$subjek->kode_anekdot;
                                            $indiMuncul = mysqli_query($konek, $sqlIndikator);
                                            while($indikator = mysqli_fetch_object($indiMuncul)){?>
                                            <li><?php echo $indikator->indikator ?></li>

                                            <?php } ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <form action="proses/anekdotProses.php" method="POST">
                                            <input hidden name="id_detail_penilaian" value="<?php echo $data->id_detail_penilaian;  ?>">
                                            <input hidden name="kode_anekdot" value="<?php echo $data->kode_anekdot;  ?>">
                                            <button class="btn btn-danger btn-xs" name="anekdot_delete" onclick="return confirm('Apakah kamu yakin menghapus catatan anekdot ini?')"> <i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                      

                    </div>
                </div>
            </div>
        </div>

        <?php include "anekdot_add.php"; ?>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>