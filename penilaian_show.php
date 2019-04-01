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
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                            <?php
<<<<<<< HEAD
                            $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik JOIN tahun_ajaran on detail_rombel.tahun_ajaran = tahun_ajaran.id_tahun_ajaran where id_detail_rombel = '".$_GET['id']."'";
                            $detail_rombel = mysqli_query($konek, $query);

                            $queryPR ="SELECT * FROM peserta_rombel JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik where id_detail_rombel = '".$_GET['id']."'";
=======
                            $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik JOIN tahun_ajaran on detail_rombel.tahun_ajaran = tahun_ajaran.id_tahun_ajaran where id_detail_rombel = ".$_GET['id'];
                            $detail_rombel = mysqli_query($konek, $query);

                            $queryPR ="SELECT * FROM peserta_rombel JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik where id_detail_rombel = ".$_GET['id'];
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            $peserta = mysqli_query($konek, $queryPR);


                            while($subjek = mysqli_fetch_object($detail_rombel)){?>
                                <tr>
                                    <td>Nama Rombel :</td>
                                    <td><?php echo $subjek->namar ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran :</td>
                                    <td><?php echo $subjek->ta ?></td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td><?php echo $subjek->semester ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidik :</td>
                                    <td><?php echo $subjek->namap ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Peserta Didik :</td>
                                    <td> <label class="label label-info"><?php echo count($peserta)?></label></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
<<<<<<< HEAD
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Daftar Peserta Didik</h4>
                        </div>
=======
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        <table class="table table-striped">
                            <thead>
                                <th>No Induk</th>
                                <th>Nama</th>
                            </thead>

                                <?php
                                while($subjek = mysqli_fetch_object($peserta)){?>
                            <tr>
                                <td><?php echo $subjek->no_induk_peserta_didik?></td>
                                <td><?php echo $subjek->nama_lengkap?></td>
                            </tr>
<<<<<<< HEAD
                            <?php } ?>
                        </table>
=======

                            <?php } ?>

                        </table>

>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="x_panel">
                        <div class="x_title">
<<<<<<< HEAD
                            <h3 class="col-md-10">Daftar Aktivitas Rombel</h3>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#addPenilaianShow"><li class="fa fa-user-plus"></li> Aktivitas </a>
                            <div class="clearfix"></div>
                        </div>

=======
                            <h3>Daftar Aktifitas Rombel</h3>
                        </div>


>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        <table class="table table-bordered">
                            <thead>
                            <th>Tanggal</th>
                            <th>Tema</th>
                            <th>Sub Tema</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
<<<<<<< HEAD
                            $sql_nilai ="SELECT *, sub_tema.nama as sub_tema, tema.nama as tema FROM penilaian JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema JOIN tema on sub_tema.tema_id = tema.id_tema where id_detail_rombel = '".$_GET['id']."'";
=======
                            $sql_nilai ="SELECT *, sub_tema.nama as sub_tema, tema.nama as tema FROM penilaian JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema JOIN tema on sub_tema.tema_id = tema.id_tema where id_detail_rombel = ".$_GET['id'];
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            $penilaian = mysqli_query($konek, $sql_nilai);

                            while($data = mysqli_fetch_object($penilaian)){ ?>
                                <tr>
                                    <td><?php echo $data->tanggal ?></td>
                                    <td><?php echo $data->tema ?></td>
<<<<<<< HEAD
                                    <td><?php echo $data->sub_tema ?></td>    
                                    <td>
                                        <form action="proses/penilaianProses.php" method="POST">
                                            <a   class="btn btn-warning btn-xs" href="penilaian_show_edit.php?id=<?php echo $data->id_penilaian?>"><i class="glyphicon glyphicon-edit"></i></a>
                                             <input hidden name="id_detail_rombel" value="<?php echo $data->id_detail_rombel;  ?>">
                                            <input hidden name="id_penilaian" value="<?php echo $data->id_penilaian;  ?>">
                                            <button class="btn btn-danger btn-xs" name="penilaian_show_delete" onclick="return confirm('Apakah kamu yakin menghapus aktivitas ini?')"> <i class="glyphicon glyphicon-trash"></i></button>
                                            <a class="btn btn-primary btn-xs" href="penilaian_show_detail.php?id=<?php echo $data->id_penilaian ?>"> <i class="fa fa-edit"></i> Cek Penilaian</a>
                                        </form>
                                    </td>
                                </tr>

=======
                                    <td><?php echo $data->sub_tema ?></td>
                                    <td><a class="btn btn-primary btn-xs" href="penilaian_show_detail.php?id=<?php echo $data->id_penilaian ?>"> <i class="fa fa-edit"></i> Cek Penilaian</a> </td>
                                </tr>


>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <?php include "penilaian_show_add.php"; ?>
=======

>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
