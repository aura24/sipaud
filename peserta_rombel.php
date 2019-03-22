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
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Peserta Rombel</h2> <!-- tampilkan nama rombel!! -->
                        <div class="clearfix"></div>
                    </div>
                    
                    <!-- input text atau dropdown -->

                    <a class="btn btn-primary pull-right" href="peserta_rombel.php"><li class="fa fa-user-plus"></li> Tambah </a>

                    <!-- batasi rombel peserta didik -->

                </div>
            </div>
            
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <?php
                        $query ="SELECT peserta_didik.no_induk,peserta_didik.nama_lengkap,rombel.nama FROM peserta_rombel JOIN peserta_didik ON peserta_rombel.no_induk_peserta_didik=peserta_didik.no_induk JOIN detail_rombel ON peserta_rombel.id_detail_rombel=detail_rombel.id_detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel WHERE detail_rombel.id_detail_rombel=1"; /*contoh*/
                        $peserta_didik = mysqli_query($konek, $query);
                        ?>
                        <h2>Daftar Peserta Rombel</h2> <!-- tampilkan nama rombel!! -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">                        
                        <table class="table table-hover">
                            <thead>
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php
                            while($subjek = mysqli_fetch_object($peserta_didik)){?>
                            <tr>
                                <td><?php echo $subjek->no_induk ?></td>
                                <td><?php echo $subjek->nama_lengkap ?></td>
                                <td><a href="peserta_rombel.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
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
