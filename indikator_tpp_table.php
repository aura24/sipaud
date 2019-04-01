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
<<<<<<< HEAD
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addIndikatorTpp"><li class="fa fa-plus"></li> Indikator TPP</a>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Indikator TPP</h3>
                        <h4>(Tingkat Pencapaian Perkembangan)</h4>
=======
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addIndikatorTpp"><li class="fa fa-plus"></li> Indikator Tpp</a>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Indikator</h3>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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
<<<<<<< HEAD
                                $query ="SELECT * FROM indikator_tpp";
                                $indikator = mysqli_query($konek, $query);
=======
                                $query ="SELECT * FROM indikator_tpp ORDER BY kode_tpp ASC";
                                $indikator = pg_query($konek, $query);
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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
<<<<<<< HEAD
                                    while($data = mysqli_fetch_object($indikator)){?>
=======
                                    while($data = pg_fetch_object($indikator)){?>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
                                        <tr>
                                            <td><?php echo $data->kode_tpp; ?></td>
                                            <td><?php echo $data->nama ?></td>
                                            <td>
                                                <form action="proses/indikatorTppProses.php" method="POST">
                                                    <a href="indikator_tpp_edit.php?id=<?php  echo $data->kode_tpp ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> </a>
                                                    <input hidden name="kode_tpp" value="<?php echo $data->kode_tpp  ?>">
<<<<<<< HEAD
                                                    <button href="" class="btn btn-danger" name="indikator_tpp_delete" onclick="return confirm('Apakah kamu yakin menghapus indikator TPP ini?')"> <i class="glyphicon glyphicon-trash"></i>
=======
                                                    <button href="" class="btn btn-danger" name="indikator_tpp_delete" onclick="return confirm('Apakah kamu yakin menghapus indikator tpp ini?.')"> <i class="glyphicon glyphicon-trash"></i>
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
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

        <?php include "indikator_tpp_add.php" ?>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
