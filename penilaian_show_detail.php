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
<!--             <a class="btn btn-default" onclick=" window.history.back();"><li class="fa fa-backward"></li> Kembali</a> -->

            <div class="row">
                <div class="col-md-3">
                    <div class="x_panel">

                        <div class="x_title">
                            <h3>Detail Penilaian</h3>
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                            <?php
                            $sql_nilai ="SELECT *, sub_tema.id_sub_tema as id, sub_tema.nama as sub_tema, tema.nama as tema, rombel.nama as rombel, pendidik.nama as pendidik FROM penilaian 
                                            JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema 
                                            JOIN tema on sub_tema.tema_id = tema.id_tema 
                                            JOIN detail_rombel on detail_rombel.id_detail_rombel = penilaian.id_detail_rombel 
                                            JOIN rombel on rombel.id_rombel = detail_rombel.id_rombel 
                                            JOIN pendidik ON pendidik.nik = detail_rombel.pendidik_nik
                                            where id_penilaian = ".$_GET['id_penilaian'];

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
                                <tr>
                                    <?php
                                    $sql_peserta = "select * FROM peserta_rombel Where id_detail_rombel = '".$data->id_detail_rombel."'";
                                    $peserta = pg_query($konek,$sql_peserta);
                                    ?>
                                    <td>Jumlah Peserta Didik</td>
                                    <td>: <?php echo $_GET['jum'] ?></td>
                                </tr>
                            <?php

                                $id_detail_rombel = $data->id_detail_rombel;
                                $id_sub=$data->id;

                            } ?>
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
                            $query ="SELECT * FROM indikator_detail JOIN indikator on indikator.kode_indikator = indikator_detail.kode_indikator WHERE id_sub_tema = '".$id_sub."'";
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
                        <input hidden name="id_detail_penilaian" value="<?php echo $_GET['id_penilaian'] ?>">
                        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addPenilaianDetail"><li class="fa fa-user-plus"></li> Penilaian </a>
                        <?php include 'penilaian_show_detail_add.php'; ?>

                        <table class="table table-bordered">
                            <thead>
                             <tr>
                                <th style="width: 10%" rowspan="2">No Induk</th>
                                <th style="width: 18%" rowspan="2">Nama</th>
                                <th style="width: 50%" colspan="6" class="text-center">Aspek Pengembangan dan Pencapaian Anak </th>
                                 <th style="width: 12%" rowspan="2" class="text-center">Aksi </th>
                                 <th style="width: 10%" rowspan="2" class="text-center">Catatan Anekdot </th>
                             </tr>
                                <tr>
                                    <td style="width: 10%" class="text-center">Agama dan Moral</td>
                                    <td style="width: 10%" class="text-center">Fisik Motorik</td>
                                    <td style="width: 10%" class="text-center">Kognitif</td>
                                    <td style="width: 10%" class="text-center">Bahasa</td>
                                    <td style="width: 10%" class="text-center">Sosial Emosional</td>
                                    <td style="width: 10%" class="text-center">Seni</td>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            $queryPR ="SELECT * FROM detail_penilaian 
                                        JOIN peserta_rombel ON peserta_rombel.id_peserta_rombel = detail_penilaian.id_peserta_rombel
                                        JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik 
                                        where id_detail_rombel = '".$_GET['id_detail']."' AND id_penilaian = ".$_GET['id_penilaian'];
                            $peserta = pg_query($konek, $queryPR);
                                while($subjek = pg_fetch_object($peserta)){?>
                                    <tr>
                                        <td><?php echo $subjek->no_induk_peserta_didik?></td>
                                        <td><?php echo $subjek->nama_lengkap?></td>
                                        <td class="text-center"><?php echo $subjek->agama_moral ?></td>
                                        <td class="text-center"><?php echo $subjek->fisik_motorik ?></td>
                                        <td class="text-center"><?php echo $subjek->kognitif ?></td>
                                        <td class="text-center"><?php echo $subjek->bahasa ?></td>
                                        <td class="text-center"><?php echo $subjek->sosial_emosional ?></td>
                                        <td class="text-center"><?php echo $subjek->seni ?></td>
                                        <td class="text-center">
                                            <form method="POST" action="proses/penilaianDetailProses.php">
                                                <input hidden name="id_detail_penilaian" value="<?php echo $subjek->id_detail_penilaian?>">
                                                <input hidden name="id_penilaian" value="<?php echo $_GET['id_penilaian'] ?>">
                                                <input hidden name="id_detail_rombel" value="<?php echo $subjek->id_detail_rombel ?>">
                                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editPenilaianDetail-<?php echo $subjek->id_detail_penilaian; ?>"><li class="glyphicon glyphicon-edit"></li> </a>
                                                <button type="submit" class="btn btn-danger btn-xs" name="nilai_delete" href="penilaian_anekdot.php?id=<?php echo $n->id_detail_penilaian ?>"><i class="glyphicon glyphicon-trash"></i> </button>
                                            </form>
                                                <?php include 'penilaian_show_detail_edit.php'; ?>
                                        </td>
                                        <td class="text-center"><a class="btn btn-info btn-xs" href="penilaian_anekdot.php?id_detail_penilaian=<?php echo $subjek->id_detail_penilaian ?>">Lihat </a></td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                        <div>
                            <p>Keterangan nilai :</p>
                            <strong>0</strong> : Belum Berkembang &nbsp;<br>
                            <strong>1</strong> : Masih Bekembang &nbsp;<br>
                            <strong>2</strong> : Berkembang Sesuai Harapan &nbsp;<br>
                            <strong>3</strong> : Berkembang dengan Baik<br>
                        </div>


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
