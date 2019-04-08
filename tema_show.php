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
            $tema = pg_query($konek, $query_select);
            ?>

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <?php while($data = pg_fetch_object($tema)){
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

                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Tambah Sub Tema</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form action="proses/temaProses.php" method="POST">
                                            <div class="form-group col-md-6">
                                                <label class="control-label" for="id_sub_tema">ID sub Tema <span class="required">*</span>
                                                </label>
                                                <input class="form-control" name="id_sub_tema">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label" for="nama">Nama sub Tema <span class="required">*</span>
                                                </label>
                                                <input class="form-control" name="nama">
                                            </div>
                                            <div class="pull-right">
                                                <input hidden name="tema_id" value="<?php echo $_GET['id'] ?>">
                                                <button type="submit" class="btn btn-success" name="sub_tema_add">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Sub Tema</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                        <div class="x_content">
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/temaProses.php" method="POST">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <td>No</td>
                                                        <td>Nama Sub Tema</td>
                                                        <td>Indikator</td>
                                                        <td>aksi</td>
                                                    </thead>
                                                    <?php
                                                        $query_sub = "Select * FROM sub_tema where tema_id =".$_GET['id'];
                                                        $sub_tema =  pg_query($konek, $query_sub);
                                                        while($sub = pg_fetch_object($sub_tema)){?>
                                                            <tr>
                                                                <td width="8%"><?php echo ++$n; ?></td>
                                                                <td><?php echo $sub->nama ?></td>
                                                                <td>
                                                                    <div class="pull-right">
                                                                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addDetail-<?php echo $sub->id_sub_tema?>"><i class="fa fa-plus"></i> Indikator</a>
                                                                        <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteDetail-<?php echo $sub->id_sub_tema?>"><i class="fa fa-minus"></i> Indikator</a>

                                                                    </div>
                                                                    <?php
                                                                    $queryIndi = "Select * FROM indikator_detail 
                                                                                      JOIN indikator ON indikator.kode_indikator = indikator_detail.kode_indikator
                                                                                      WHERE id_sub_tema = '".$sub->id_sub_tema."'";
                                                                    $indikatorSub = pg_query($konek,$queryIndi);

                                                                    while($indiSub = pg_fetch_object($indikatorSub)){
                                                                        ?>
                                                                    <li><?php echo $indiSub->nama ?></li>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                </td>
                                                                <td>

                                                                    <form action="proses/temaProses.php" method="POST">

                                                                        <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit-<?php echo  $sub->id_sub_tema ?>"><i class="glyphicon glyphicon-edit"> </i></a>
                                                                        <input hidden name="id_sub_tema" value="<?php echo $sub->id_sub_tema;  ?>">
                                                                        <input hidden name="id_tema" value="<?php echo $sub->tema_id;  ?>">
                                                                        <button class="btn btn-danger btn-xs" name="subtema_delete" onclick="return confirm('Apakah kamu yakin menghapus sub-tema ini?')"> <i class="glyphicon glyphicon-trash"></i>
                                                                    </form>
                                                                </td>
                                                                <?php include 'detail_indikator_add.php' ?>
                                                                <?php include 'detail_indikator_delete.php' ?>

                                                            </tr>
                                                            <div class="modal fade" id="edit-<?php echo  $sub->id_sub_tema ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Edit Sub Tema - <?php echo $sub->nama?></h4>
                                                                        </div>
                                                                        <form action="proses/temaProses.php" method="POST">
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="id_sub_tema">ID sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input type="number" class="form-control" name="id_sub_tema" value="<?php echo $sub->id_sub_tema ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="nama">Nama sub Tema <span class="required">*</span>
                                                                                    </label>
                                                                                    <input class="form-control" name="nama" value="<?php echo $sub->nama ?>">
                                                                                </div>
<!--                                                                                <input hidden name="id_tema" value="--><?php //echo $_GET['id'] ?><!--">-->
                                                                                <input hidden name="tema_id" value="<?php echo $_GET['id'] ?>">
                                                                                <input hidden name="id_sub_tema_awal" value="<?php echo $sub->id_sub_tema ?>">
                                                                            </div>
                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                                                <input type="submit" class="btn btn-success"  name="sub_tema_edit" value="Update">
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

                        </div>
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
