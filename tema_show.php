<!DOCTYPE html>
<html lang="en">
<?php include "layout/head.php";
include "connect_db.php";
?>
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
            <?php

            $query_select ="select * from tema where id_tema = '".$_GET['id']."'";
<<<<<<< HEAD
            $tema = mysqli_query($konek, $query_select);
=======
            $tema = pg_query($konek, $query_select);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
            ?>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
<<<<<<< HEAD
                        <?php while($data = mysqli_fetch_object($tema)){
=======
                        <?php while($data = pg_fetch_object($tema)){
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                            echo "<h1>". $data->nama. "</h1>";
                        }
                        $n=0;
                        ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Sub Tema</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                        <div class="x_content">
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/temaProses.php" method="POST">
                                                <table class="table table-bordered">
                                                    <?php
                                                        $query_sub = "Select * FROM sub_tema where tema_id =".$_GET['id'];
<<<<<<< HEAD
                                                        $sub_tema =  mysqli_query($konek, $query_sub);
                                                        while($sub = mysqli_fetch_object($sub_tema)){?>
=======
                                                        $sub_tema =  pg_query($konek, $query_sub);
                                                        while($sub = pg_fetch_object($sub_tema)){?>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                                            <tr>
                                                                <td width="8%"><?php echo ++$n; ?></td>
                                                                <td><?php echo $sub->nama ?></td>
                                                                <td>
                                                                    <form action="proses/temaProses.php" method="POST">
                                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo  $sub->id_sub_tema ?>"><i class="glyphicon glyphicon-edit"> </i></a>
                                                                        <input hidden name="id_sub_tema" value="<?php echo $sub->id_sub_tema;  ?>">
                                                                        <input hidden name="id_tema" value="<?php echo $sub->tema_id;  ?>">
                                                                        <button class="btn btn-danger" name="subtema_delete" onclick="return confirm('Apakah kamu yakin menghapus sub-tema ini?')"> <i class="glyphicon glyphicon-trash"></i>
                                                                    </form>


                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="edit-<?php echo  $sub->id_sub_tema ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><?php echo $sub->nama?></h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <form action="proses/temaProses.php" method="POST">
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="id_sub_tema">ID sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input class="form-control" name="id_sub_tema" value="<?php echo $sub->id_sub_tema ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="nama">Nama sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input class="form-control" name="nama" value="<?php echo $sub->nama ?>">
                                                                                </div>
<<<<<<< HEAD
                                                                                <input hidden name="id_tema" value="<?php echo $_GET['id'] ?>">
=======
                                                                                <input hidden name="tema_id" value="<?php echo $_GET['id'] ?>">
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                                                                <input hidden name="id_sub_tema_awal" value="<?php echo $sub->id_sub_tema ?>">
                                                                            </div>
                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                                <input type="submit" class="btn btn-primary"  name="sub_tema_edit" value="Ubah">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php } ?>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Tambah Sub Tema</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form action="proses/temaProses.php" method="POST">
                                            <div class="form-group">
                                                <label class="control-label" for="id_sub_tema">ID sub Tema <span class="required">*</span>
                                                </label>
                                                <input class="form-control" name="id_sub_tema">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="nama">Nama sub Tema <span class="required">*</span>
                                                </label>
                                                <input class="form-control" name="nama">
                                            </div>
                                            <input hidden name="tema_id" value="<?php echo $_GET['id'] ?>">
                                            <button type="submit" class="btn btn-success" name="sub_tema_add">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                    </div>
                </div>
                <a href="tema_table.php" class="btn btn-default">Kembali</a>
            </div>
        </div>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
