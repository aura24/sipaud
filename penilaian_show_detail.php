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
                <div class="col-md-3">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Detail Penilaian</h3>
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                            <?php
                            $sql_nilai ="SELECT *, sub_tema.nama as sub_tema, tema.nama as tema, rombel.nama as rombel, pendidik.nama as pendidik FROM penilaian 
                                            JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema 
                                            JOIN tema on sub_tema.tema_id = tema.id_tema 
                                            JOIN detail_rombel on detail_rombel.id_detail_rombel = penilaian.id_detail_rombel 
                                            JOIN rombel on rombel.id_rombel = detail_rombel.id_rombel 
                                            JOIN pendidik ON pendidik.nik = detail_rombel.pendidik_nik
                                            where id_penilaian = ".$_GET['id'];
                            $penilaian = pg_query($konek, $sql_nilai);
                            while($data = pg_fetch_object($penilaian)){?>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>: <?php echo $data->tanggal ?></td>
                                </tr>
                                <tr>
                                    <td>Tema </td>
                                    <td>: <?php echo $data->tema ?></td>
                                </tr>
                                <tr>
                                    <td>Sub Tema </td>
                                    <td>: <?php echo $data->sub_tema ?></td>
                                </tr>
                                <tr>
                                    <td>Rombel </td>
                                    <td>: <?php echo $data->rombel ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidik </td>
                                    <td>: <?php echo $data->pendidik ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Indikator Penilaian</h3>
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                            <?php
                            $query ="SELECT * FROM indikator_detail JOIN indikator on indikator.kode_indikator = indikator_detail.kode_indikator WHERE id_penilaian = ".$_GET['id'];
                            $indikator = pg_query($konek, $query);
                            $n=1;

                            while($data = pg_fetch_object($indikator)){?>
                                <tr>
                                    <td><?php echo $n++ ?></td>
                                   <td><?php echo $data->nama ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Penilaian Peserta Rombel</h3>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                             <tr>
                                <th rowspan="2">N0 Induk</th>
                                <th rowspan="2">Nama</th>
                                <th colspan="6" class="text-center">Penilaian </th>
                                 <th rowspan="2" class="text-center">Catatan Anekdot </th>
                             </tr>
                                <tr>
                                    <td>Agama Moral</td>
                                    <td>Fisik Motorik</td>
                                    <td>Kognitif</td>
                                    <td>Bahasa</td>
                                    <td>Sosial Emosional</td>
                                    <td>Seni</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $queryPR ="SELECT * FROM peserta_rombel JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik where id_detail_rombel = ".$_GET['id'];
                            $peserta = pg_query($konek, $queryPR);
                                while($subjek = pg_fetch_object($peserta)){?>
                                    <tr>
                                        <td><?php echo $subjek->no_induk_peserta_didik?></td>
                                        <td><?php echo $subjek->nama_lengkap?></td>
                                       <?php  $sql_nilai ="SELECT * FROM detail_penilaian where id_penilaian = ".$_GET['id'];
                                              $nilai_peserta = pg_query($konek, $sql_nilai);
                                       while($n = pg_fetch_object($nilai_peserta)){?>
                                        <td><?php echo $n->agama_moral ?></td>
                                        <td><?php echo $n->fisik_motorik ?></td>
                                        <td><?php echo $n->kognitif ?></td>
                                        <td><?php echo $n->bahasa ?></td>
                                        <td><?php echo $n->sosial_emosional ?></td>
                                        <td><?php echo $n->seni ?></td>
                                        <td><a class="btn btn-primary btn-xs" href="penilaian_anekdot.php?id=<?php echo $n->id_detail_penilaian ?>">Lihat </a></td>

                                       <?php } ?>

                                    </tr>

                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
