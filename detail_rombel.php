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
          <div class="">
            <div class="row">
              <div class="col-md-12"> <!--Kolom terlalu lebar-->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Kelompok</h2>  
                    <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">No</th>
                          <th style="width: 10%">Nama Kelompok</th>
                          <th style="width: 15%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                         <a class="btn btn-primary pull-right" href="input_rombel.php"><li class="fa fa-user-plus"></li> Tambah Kelompok </a>
                         
                        <?php
                        $query ="SELECT * FROM rombel";
                        $rombel = mysqli_query($konek, $query);
                
                            while($subjek = mysqli_fetch_object($rombel)){?>
                            <tr>
                                <td><?php echo $subjek->id_rombel ?></td>
                                <td><?php echo $subjek->nama ?></td>
                                <td>
                                  <a href="edit_rombel.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                  <a href="detail_rombel.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
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
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Rombongan Belajar (Rombel)</h2>  
                      <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">No</th>
                          <th style="width: 12%">Nama Rombel</th>
                          <th style="width: 12%">Tahun Ajaran</th>
                          <th style="width: 10%">Semester</th>
                          <th style="width: 10%">Usia</th>
                          <th style="width: 10%">Pendidik</th>
                          <th style="width: 10%">Status</th>
                          <th style="width: 25%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                         <a class="btn btn-primary pull-right" href="input_detail_rombel.php"><li class="fa fa-user-plus"></li> Tambah Rombel </a>
                        <?php
                        $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik";
                        $detail_rombel = mysqli_query($konek, $query);
                
                            while($subjek = mysqli_fetch_object($detail_rombel)){?>
                            <tr>
                                <td><?php echo $subjek->id_detail_rombel ?></td>
                                <td><?php echo $subjek->namar ?></td>
                                <td><?php echo $subjek->tahun_ajaran ?></td>
                                <td><?php echo $subjek->semester ?></td>
                                <td><?php echo $subjek->usia ?></td>
                                <td><?php echo $subjek->namap ?></td>
                                <td> <input type="checkbox" class="js-switch" checked /> Aktif</td> <!-- belum ubah db -->
                                <td>
                                  <a href="edit_detail_rombel.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                  <a href="detail_rombel.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                  <a href="peserta_rombel.php" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Peserta Rombel </a></td>
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
          </div>
        </div>

        <!-- /page content -->

    <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>
  </body>
</html>