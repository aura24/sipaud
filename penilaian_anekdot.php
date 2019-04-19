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
                              where id_detail_penilaian = ".$_GET['id_detail_penilaian'];
                    $peserta = pg_query($konek, $querydetail);

                   ?>

                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Catatan Anekdot</h3>
                        </div>
                        <table class="table table-striped">
                            <?php
                            while($data = pg_fetch_object($peserta)){

                              ?>
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
<!-- 
                         <a class="btn btn-default" onclick=" window.history.back();"><li class="fa fa-backward"></li> Kembali</a> -->
                        <a class="btn btn-warning pull-right" href="penilaian_anekdot_print.php?id_detail_penilaian=<?php echo $_GET['id_detail_penilaian'];?>" target="_blank"><li class="fa fa-print"></li> Print </a>

                        <a class="btn btn-primary" data-toggle="modal" data-target="#addAnekdot"><li class="fa fa-user-plus"></li> Catatan Anekdot </a>


                        <?php
                        $queryAnekdot ="SELECT * FROM catatan_anekdot where id_detail_penilaian = ".$_GET['id_detail_penilaian'];
                        $anekdot = pg_query($konek, $queryAnekdot);

                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <th style="width: 10%">Waktu</th>
                                <th style="width: 10%">Tempat</th>
                                <th style="width: 35%">Peristiwa</th>
                                <th style="width: 35%">Indikator yang muncul</th>
                                <th style="width: 10%">Aksi</th>
                            </thead>
                            <tbody>
                         <?php
                            while($subjek = pg_fetch_object($anekdot)){
                                $sqlIndikator = "Select indikator_tpp.nama as indikator, indikator_tpp.kode_tpp as kode_tpp From indikator_yg_muncul JOIN indikator_tpp ON indikator_tpp.kode_tpp = indikator_yg_muncul.kode_tpp where kode_anekdot = '".$subjek->kode_anekdot."'";
                                $indiMuncul = pg_query($konek, $sqlIndikator);
                                // $n = count($indiMuncul)?> 
                                <tr>
                                    <td><?php echo $subjek->waktu ?></td>
                                    <td><?php echo $subjek->tempat ?></td>
                                    <td><?php echo $subjek->peristiwa ?></td>
                                    <td>
                                        <input hidden name="kode_anekdot" value="<?php echo $subjek->kode_anekdot ?>">
                                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addIndiMuncul-<?php echo $subjek->kode_anekdot; ?>"><li class="fa fa-plus"></li> </a>
                                        <?php include 'indikator_muncul_add.php'; ?>
                                        <table class="table table-striped">
                                            <?php
                                            while($indikator = pg_fetch_object($indiMuncul)){?>
                                            <tr>
                                                <td style="width: 10%"><?php echo $indikator->kode_tpp ?></td>
                                                <td style="width: 70%"><?php echo $indikator->indikator ?></td>
                                                <td style="width: 10%">
                                                    <div class="btn-group">
                                                        <form action="proses/anekdotProses.php" method="POST">
                                                            <input hidden name="id_detail_penilaian" value="<?php echo $subjek->id_detail_penilaian;  ?>">
                                                            <input hidden name="kode_tpp" value="<?php echo $indikator->kode_tpp ?>" >
                                                            <input hidden name="kode_anekdot" value="<?php echo $subjek->kode_anekdot?>">
                                                        <button class="btn btn-danger btn-xs" name="indi_delete"><i class="glyphicon glyphicon-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        <form action="proses/anekdotProses.php" method="POST">
                                            <input hidden name="id_detail_penilaian" value="<?php echo $subjek->id_detail_penilaian;  ?>">
                                            <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editAnekdot-<?php echo $subjek->kode_anekdot; ?>"><li class="glyphicon glyphicon-edit"></li> </a>
                                            <input hidden name="kode_anekdot" value="<?php echo $subjek->kode_anekdot;  ?>">
                                            <button class="btn btn-danger btn-xs" name="anekdot_delete" onclick="return confirm('Apakah kamu yakin menghapus catatan anekdot ini?')"> <i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                        </div>
                                          <?php include 'anekdot_edit.php'; ?>
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