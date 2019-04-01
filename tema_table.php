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
            <a class="btn btn-primary pull-right" href="tema_input.php"><li class="fa fa-plus"></li> Tema </a>
            <div class="row">
                <div class="x_panel">
<<<<<<< HEAD
                    <div class="x_title"
                    >
                        <h2>Daftar Tema</h2>
=======
                    <div class="x_title">
                        <h2>Daftar Pendidik</h2>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
                        $query ="SELECT * FROM tema";
<<<<<<< HEAD
                        $tema = mysqli_query($konek, $query);
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <th>No</th>
=======
                        $tema = pg_query($konek, $query);
                        ?>
                        <table class="table table-hover">
                            <thead>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <th>Kode Tema</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            $n=0;
<<<<<<< HEAD
                            while($data = mysqli_fetch_object($tema)){?>
                            <tr>
                                <td><?php echo ++$n; ?></td>
=======
                            while($data = pg_fetch_object($tema)){?>
                            <tr>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                <td><?php echo $data->id_tema; ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td>  <form action="proses/temaProses.php" method="GET">
                                        <a href="tema_show.php?id=<?php  echo $data->id_tema; ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                        <a href="tema_edit.php?id=<?php  echo $data->id_tema; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> </a>
<<<<<<< HEAD
                                        <input hidden name="id_sub_tema" value="<?php echo $data->id_sub_tema;  ?>">
                                        <button href="" class="btn btn-danger" name="tema_delete" onclick="return confirm('Apakah kamu yakin menghapus tema ini? penghapusan data akan menghapus data sub-tema juga.')"> <i class="glyphicon glyphicon-trash"></i>
=======
                                           <input hidden name="id_tema" value="<?php echo $data->id_tema;  ?>">
                                           <button href="" class="btn btn-danger" name="tema_delete" onclick="return confirm('Apakah kamu yakin menghapus tema ini? akan menghapus data sub-tema juga.')"> <i class="glyphicon glyphicon-trash"></i>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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
