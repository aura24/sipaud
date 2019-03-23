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
            <a class="btn btn-primary pull-right" href="input_peserta.php"><li class="fa fa-user-plus"></li> Tambah Peserta Didik</a>
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
                        $peserta_didik = mysqli_query($konek, $query);
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            while($subjek = mysqli_fetch_object($peserta_didik)){?>
                            <tr>
                                <td><?php echo $subjek->no_induk ?></td>
                                <td><?php echo $subjek->nama_lengkap ?></td>
                                <td><?php echo $subjek->tempat_lahir ?></td>
                                <td><?php echo $subjek->tgl_lahir ?></td>
                                <td><?php
                                    if($subjek->jekel == 0){
                                        echo "Laki - laki";
                                    }else{
                                        echo "Perempuan";
                                    }
                                  ?></td>
                                <td>
                                    <a href="view_rombel.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="edit_rombel.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="detail_rombel.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td></td>
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
