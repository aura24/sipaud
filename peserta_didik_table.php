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
            <a class="btn btn-primary pull-right" href="peserta_didik_input.php"><li class="fa fa-user-plus"></li> Peserta Didik</a>
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Peserta Didik</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
                        $query ="SELECT * FROM peserta_didik";
                        $peserta_didik = pg_query($konek, $query);
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <th>No Induk</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Panggilan</th>
                                <th>Tanggal Daftar</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            while($subjek = pg_fetch_object($peserta_didik)){?>
                            <tr>
                                <td><?php echo $subjek->no_induk ?></td>
                                <td><?php echo $subjek->nama_lengkap ?></td>
                                <td><?php echo $subjek->nama_panggilan ?></td>
                                <td><?php echo $subjek->tgl_daftar ?></td>
                                <td><?php echo $subjek->tempat_lahir ?></td>
                                <td><?php echo $subjek->tgl_lahir ?></td>
                                <td><?php
                                    if($subjek->jekel == 0){
                                        echo "Laki - laki";
                                    }else{
                                        echo "Perempuan";
                                    }
                                  ?></td>
                                <td><?php echo $subjek->alamat?></td>
                                <td><?php echo $subjek->agama?></td>
                                <td>  <form action="proses/pesertaDidikProses.php" method="GET">
                                        <a href="peserta_didik_edit.php?no_induk=<?php  echo $subjek->no_induk; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> </a>
                                           <input hidden name="no_induk" value="<?php echo $subjek->no_induk;  ?>">
                                           <button href="" class="btn btn-danger" name="peserta_didik_delete" onclick="return confirm('Apakah kamu yakin menghapus peserta didik ini')"> <i class="glyphicon glyphicon-trash"></i>
                                       </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


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
