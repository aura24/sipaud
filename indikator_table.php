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
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addIndikator"><li class="fa fa-plus"></li> Indikator </a>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Indikator</h3>
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <?php
                                $query ="SELECT * FROM indikator";
                                $indikator = mysqli_query($konek, $query);
                                ?>
                                <table class="table table-hover">
                                    <thead>
                                    <th>Kode Indikator</th>
                                    <th>Nama Indikator</th>
                                    <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $n=0;
                                    while($data = mysqli_fetch_object($indikator)){?>
                                        <tr>
                                            <td><?php echo $data->kode_indikator; ?></td>
                                            <td><?php echo $data->nama ?></td>
                                            <td>
                                                <form action="proses/indikatorProses.php" method="POST">
                                                   <a   class="btn btn-warning" href="indikator_edit.php?id=<?php echo $data->kode_indikator?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                                    <input hidden name="kode_indikator" value="<?php echo $data->kode_indikator;  ?>">
                                                    <button class="btn btn-danger" name="indikator_delete" onclick="return confirm('Apakah kamu yakin menghapus tema ini? akan menghapus data sub-tema juga.')"> <i class="glyphicon glyphicon-trash"></i></button>
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

        <?php include "indikator_add.php"; ?>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
