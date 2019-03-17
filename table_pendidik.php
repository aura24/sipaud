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
            <a class="btn btn-primary pull-right" href="input_pendidik.php"><li class="fa fa-user-plus"></li> Data Pendidik </a>
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Pendidik</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
                        $query ="SELECT * FROM pendidik";
                        $data_pendidik = mysqli_query($konek, $query);
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                            </thead>
                            <tbody>
                            <?php
                            while($subjek = mysqli_fetch_object($data_pendidik)){?>
                            <tr>
                                <td><?php echo $subjek->nik ?></td>
                                <td><?php echo $subjek->nama ?></td>
                                <td><?php echo $subjek->tempat_lahir ?></td>
                                <td><?php echo $subjek->tgl_lahir ?></td>
                                <td><?php
                                    if($subjek->jekel == 0){
                                        echo "Laki - laki";
                                    }else{
                                        echo "Perempuan";
                                    }
                                  ?></td>
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
