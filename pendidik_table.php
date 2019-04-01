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
            <a class="btn btn-primary pull-right" href="pendidik_input.php"><li class="fa fa-user-plus"></li> Pendidik </a>
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
<<<<<<< HEAD
                        $data_pendidik = mysqli_query($konek, $query);
=======
                        $data_pendidik = pg_query($konek, $query);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
<<<<<<< HEAD
                                <th>Alamat</th>
=======
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
<<<<<<< HEAD
                            while($subjek = mysqli_fetch_object($data_pendidik)){?>
=======
                            while($subjek = pg_fetch_object ($data_pendidik)){?>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            <tr>
                                <td><?php echo ++$n; ?></td>
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
<<<<<<< HEAD
                                <td><?php echo $subjek->alamat ?></td>
=======
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <td>  <form action="proses/pendidikProses.php" method="GET">
                                        <a href="pendidik_edit.php?nik=<?php  echo $subjek->nik; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> </a>
                                           <input hidden name="nik" value="<?php echo $subjek->nik;  ?>">
                                           <button href="" class="btn btn-danger" name="pendidik_delete" onclick="return confirm('Apakah kamu yakin menghapus pendidik ini')"> <i class="glyphicon glyphicon-trash"></i>
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
