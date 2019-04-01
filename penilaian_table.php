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
                        <h3>Daftar Rombel</h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <th>Kode</th>
                            <th>Nama Rombel</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Usia</th>
                            <th>Pendidik</th>
                            <th>Pengajaran</th>
                        </thead>
                        <tbody>


                        <?php
                        $query ="SELECT *,rombel.nama as namar,pendidik.nama as namap, tahun_ajaran.tahun_ajaran as ta FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel JOIN pendidik ON detail_rombel.pendidik_nik=pendidik.nik JOIN tahun_ajaran on detail_rombel.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran";
                        $detail_rombel = pg_query($konek, $query);

                        while($subjek = pg_fetch_object($detail_rombel)){?>
                            <tr>
                                <td><?php echo $subjek->id_detail_rombel ?></td>
                                <td><?php echo $subjek->namar ?></td>
                                <td><?php echo $subjek->ta ?></td>
                                <td><?php echo $subjek->semester ?></td>
                                <td><?php echo $subjek->usia ?></td>
                                <td><?php echo $subjek->namap ?></td>
                                <td>
                                    <a href="penilaian_show.php?id=<?php echo $subjek->id_detail_rombel ?>" class="btn btn-info btn-xs"> Lihat </a></td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

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