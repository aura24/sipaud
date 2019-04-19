<!DOCTYPE html>
<html lang="en">
<?php include "connect_db.php" ?>
<?php include "layout/head.php" ?>
<!---->
<!--<a class="btn btn-warning pull-right" href="penilaian_show_detail_print.php"><li class="fa fa-print"></li> Print </a>-->
<body class="nav-md" onload="window.print()">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <?php include "layout/sidebar.php" ?>
            </div>
        </div>
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


                        <?php
                        $queryAnekdot ="SELECT * FROM catatan_anekdot where id_detail_penilaian = ".$_GET['id_detail_penilaian'];
                        $anekdot = pg_query($konek, $queryAnekdot);

                        ?>

                        <table class="table table-bordered">
                            <thead>
                            <th>No</th>
                            <th style="width: 10%">Waktu</th>
                            <th style="width: 10%">Tempat</th>
                            <th style="width: 35%">Peristiwa</th>
                            <th style="width: 35%">Indikator yang muncul</th>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
                            while($subjek = pg_fetch_object($anekdot)){
                                $sqlIndikator = "Select indikator_tpp.nama as indikator, indikator_tpp.kode_tpp as kode_tpp From indikator_yg_muncul JOIN indikator_tpp ON indikator_tpp.kode_tpp = indikator_yg_muncul.kode_tpp where kode_anekdot = '".$subjek->kode_anekdot."'";
                                $indiMuncul = pg_query($konek, $sqlIndikator);
                                // $n = count($indiMuncul)?>
                                <tr>
                                    <td><?php echo ++$n; ?></td>
                                    <td><?php echo $subjek->waktu ?></td>
                                    <td><?php echo $subjek->tempat ?></td>
                                    <td><?php echo $subjek->peristiwa ?></td>
                                    <td>
                                       <?php include 'indikator_muncul_add.php'; ?>
                                        <table class="table table-striped">
                                            <?php
                                            while($indikator = pg_fetch_object($indiMuncul)){?>
                                                <tr>
                                                    <td style="width: 10%"><?php echo $indikator->kode_tpp ?></td>
                                                    <td style="width: 70%"><?php echo $indikator->indikator ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
<!--                        <div class="pull-right" style="margin-right: 10%">-->
<!--                            <p>Pendidik,</p>-->
<!--                            <br><br>-->
<!--                            <p>--><?php //echo $pendidik ?><!--</p>-->
<!--                        </div>-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
<?php include "layout/script.php";?>
</html>
