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
                <div class="x_panel">
<<<<<<< HEAD
                  <div class="x_title">
                    <h2>Tambah Peserta Rombel</h2>
                    <!-- tampilkan nama rombel!! -->
                    <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                    <div class="clearfix"></div>
                    </div>
                  
                  <div class="x_content">
                  <?php
                    $query ="SELECT * FROM peserta_didik";
                    $no_induk = mysqli_query($konek, $query);
                  ?>

                    <!-- input text atau dropdown -->       
                    <form action="proses/pesertaRombelProses.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id_peserta_rombel">Kode Peserta :</label>
                                <input type="text" id="id_peserta_rombel" name="id_peserta_rombel" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6">
                                <label for="no_induk_peserta_didik">No Induk Peserta Didik :</label>
                                <select name="no_induk_peserta_didik" class="form-control">
                                <?php while($data = mysqli_fetch_object($no_induk)){?>
                                    <option value="<?php echo $data->no_induk?>"><?php echo $data->no_induk ?></  option>
                                <?php }?>
                                </select>
                            </div>
                            <input hidden name="id_detail_rombel" value="<?php echo $_GET['id'] ?>">
                            <div class="col-md-6">
                                <br>
                                <input type="submit" class="btn btn-primary" name="peserta_rombel_add" value="Tambah">
                        </div>
                    </form>                     
                    <!-- batasi rombel peserta didik -->
                  </div>
=======
                    <div class="x_title">
                        <h2>Tambah Peserta Rombel</h2> <!-- tampilkan nama rombel!! -->
                        <div class="clearfix"></div>
                    </div>
                    
                    <!-- input text atau dropdown -->       
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/pesertaRombelProses.php" method="POST">
                      <input hidden name="id_detail_rombel" value="<?php echo $data->id_detail_rombel;  ?>">
                      <div class="col-md-5 form-group has-feedback">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_peserta_rombel">Kode <span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <input type="text" id="id_peserta_rombel" name="id_peserta_rombel" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="col-md-6 form-group has-feedback">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="no_induk_peserta_didik">No Induk Peserta Didik <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" id="no_induk_peserta_didik" name="no_induk_peserta_didik" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary" name="peserta_rombel_add" value="Tambah">
                      
                    <!-- batasi rombel peserta didik -->

>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                </div>
            </div>
            
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
<<<<<<< HEAD
                        $query2 ="SELECT * FROM peserta_rombel JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik where id_detail_rombel = '".$_GET['id']."'";
                        $peserta_didik = mysqli_query($konek, $query2);
=======
                        $query ="SELECT peserta_didik.no_induk,peserta_didik.nama_lengkap,rombel.nama FROM peserta_rombel JOIN peserta_didik ON peserta_rombel.no_induk_peserta_didik=peserta_didik.no_induk JOIN detail_rombel ON peserta_rombel.id_detail_rombel=detail_rombel.id_detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel WHERE detail_rombel.id_detail_rombel=1"; /*contoh*/
                        $peserta_didik = mysqli_query($konek, $query);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        ?>
                        <h2>Daftar Peserta Rombel</h2> <!-- tampilkan nama rombel!! -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">                        
<<<<<<< HEAD
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/pesertaRombelProses.php" method="POST">
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
=======
                        <table class="table table-hover">
                            <thead>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
<<<<<<< HEAD
                            $n=0;
                            while($subjek = mysqli_fetch_object($peserta_didik)){?>
                            <tr>
                                <td><?php echo ++$n; ?></td>
                                <td><?php echo $subjek->no_induk ?></td>
                                <td><?php echo $subjek->nama_lengkap ?></td>
                                <input hidden name="id_peserta_rombel" value="<?php echo $data->id_peserta_rombel;  ?>">
                                <
                                <td><button class="btn btn-danger btn-xs" name="peserta_rombel_delete" onclick="return confirm('Apakah kamu yakin menghapus peserta didik ini?')"> <i class="glyphicon glyphicon-trash"></i></button></td>
=======
                            while($subjek = mysqli_fetch_object($peserta_didik)){?>
                            <tr>
                                <td><?php echo $subjek->no_induk ?></td>
                                <td><?php echo $subjek->nama_lengkap ?></td>
                                <td><a href="peserta_rombel.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
<<<<<<< HEAD
                      </form>
                     
                    <a href="detail_rombel_table.php" class="btn btn-default">Kembali</a>
=======
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
