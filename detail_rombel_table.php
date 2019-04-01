<!DOCTYPE html>
<html lang="en">
<?php include "connect_db.php";
include "layout/head.php" ?>


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
            <div class="">
                <div class="row">
                    <div class="col-md-12"> <!--Kolom terlalu lebar-->
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Daftar Kelompok</h2>  
                                <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addKelompok"><li class="fa fa-user-plus"></li> Kelompok </a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <!-- start project list -->
<<<<<<< HEAD
                      <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">No</th>  
                          <th style="width: 5%">Kode</th>
                          <th style="width: 5%">Nama Kelompok</th>
                          <th style="width: 5%">Aksi</th>
=======
                                <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">Kode</th>
                          <th style="width: 10%">Nama Kelompok</th>
                          <th style="width: 15%">Aksi</th>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        </tr>
                      </thead>
                      <tbody>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
<<<<<<< HEAD
                        $n=0;
=======
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        $query ="SELECT * FROM rombel";
                        $rombel = mysqli_query($konek, $query);
                
                            while($data = mysqli_fetch_object($rombel)){?>
                            <tr>
<<<<<<< HEAD
                                <td><?php echo ++$n; ?></td>
=======
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <td><?php echo $data->id_rombel ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td>
                                    <form action="proses/rombelProses.php" method="POST">
                                        <a class="btn btn-warning btn-xs" href="rombel_edit.php?id=<?php echo $data->id_rombel?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                        <input hidden name="id_rombel" value="<?php echo $data->id_rombel;  ?>">
                                        <button class="btn btn-danger btn-xs" name="rombel_delete" onclick="return confirm('Apakah kamu yakin menghapus kelompok ini? penghapusan data ini akan menghapus data rombel juga.')"> <i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                      </tbody>
                                </table>
                            <!-- end project list -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="clearfix"></div> -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Daftar Rombongan Belajar(Rombel)</h2>
                                <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addDetailRombel"><li class="fa fa-user-plus"></li> Rombel </a>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="x_content">
                                <?php
<<<<<<< HEAD
                                $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN tahun_ajaran ON detail_rombel.tahun_ajaran=tahun_ajaran.id_tahun_ajaran JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik";
=======
                                $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik";
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                $detail_rombel = mysqli_query($konek, $query);
                                ?>
                                <table class="table table-hover">
                                    <thead>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Rombel</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Semester</th>
                                    <th>Usia</th>
                                    <th>Pendidik</th>
                                    <th>Aksi</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $n=0;
                                    while($data = mysqli_fetch_object($detail_rombel)){?>
                                        <tr>
                                            <td><?php echo ++$n; ?></td>
                                            <td><?php echo $data->id_detail_rombel ?></td>
                                            <td><?php echo $data->namar ?></td>
<<<<<<< HEAD
                                            <td><?php echo $data->ta ?></td>
                                            <td><?php echo $data->semester ?></td>  
                                            <td><?php echo $data->usia ?></td>            
                                            <td><?php echo $data->namap ?></td>
=======
                                            <td><?php echo $data->tahun_ajaran ?></td>
                                            <td><?php echo $data->semester ?></td>  
                                            <td><?php echo $data->usia ?></td>            
                                            <td><?php echo $data->pendidik_nik ?></td>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                            <td>
                                                <form action="proses/detailRombelProses.php" method="POST">
                                                   <a   class="btn btn-warning btn-xs" href="detail_rombel_edit.php?id=<?php echo $data->id_detail_rombel?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                                    <input hidden name="id_detail_rombel" value="<?php echo $data->id_detail_rombel;  ?>">
                                                    <button class="btn btn-danger btn-xs" name="detail_rombel_delete" onclick="return confirm('Apakah kamu yakin menghapus rombel ini?')"> <i class="glyphicon glyphicon-trash"></i></button>
                                                    <a   class="btn btn-primary btn-xs" href="peserta_rombel.php?id=<?php echo $data->id_detail_rombel?>"><i class="fa fa-eye"></i> Peserta Rombel</a>
                                                    <input hidden name="id_detail_rombel" value="<?php echo $data->id_detail_rombel;  ?>">
                                                    <!-- <a href="peserta_rombel.php" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Peserta Rombel </a></td> -->
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
            </div>
        </div>

        <?php include "rombel_add.php"; ?>
        <?php include "detail_rombel_add.php"; ?>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
