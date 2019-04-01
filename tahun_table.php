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
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTahun"><li class="fa fa-plus"></li> Tahun Ajaran </a>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Tahun Ajaran/</h3>
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
                                $query ="SELECT * FROM tahun_ajaran";
                                $tahun = pg_query($konek, $query);
                                ?>
                                <table class="table table-hover">
                                    <thead>
                                    <th>Kode</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($data = pg_fetch_object($tahun)){?>
                                        <tr>
                                            <td><?php echo $data->id_tahun_ajaran; ?></td>
                                            <td><?php echo $data->tahun_ajaran ?></td>
                                            <td>
                                                <form action="proses/tahunProses.php" method="POST">
                                                   <a   class="btn btn-warning" href="tahun_edit.php?id=<?php echo $data->id_tahun_ajaran?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                                    <input hidden name="id_tahun_ajaran" value="<?php echo $data->id_tahun_ajaran;  ?>">
                                                    <button class="btn btn-danger" name="tahun_delete" onclick="return confirm('Apakah kamu yakin menghapus tahun ajaran ini?')"> <i class="glyphicon glyphicon-trash"></i></button>
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

        <?php include "tahun_add.php"; ?>
        <!-- /page content -->
        <?php include "layout/footer.php" ?>
    </div>
</div>
<?php include "layout/script.php";?>

</body>
</html>
