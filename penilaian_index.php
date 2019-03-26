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
                        <h3>Pilih Tahun Ajaran</h3>
                    </div>
                    <?php
                    $query ="SELECT * FROM tahun_ajaran";
                    $tahun_ajaran = mysqli_query($konek, $query);
                    ?>


                    <form action="proses/peniliaianProses.php" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tahun_ajaran">Tahun Ajaran :</label>
                                <select name="tahun_ajaran" class="form-control">
                                    <?php while($data = mysqli_fetch_object($tahun_ajaran)){?>
                                        <option value="<?php echo $data->id_tahun_ajaran?>"><?php echo $data->tahun_ajaran?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="semester">Semester :</label>
                                <select name="semester" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <input type="submit" class="btn btn-primary" name="pilih_ta" value="Pilih">
                            </div>
                        </div>
                    </form>
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

<!--<select class="select2_single form-control">-->
<!--    <option>Pilih Rombel</option>-->
<!--//    $query ="SELECT id_detail_rombel,rombel.nama as nama FROM detail_rombel JOIN rombel ON detail_rombel.id_rombel=rombel.id_rombel";-->
<!--//    $detail_rombel = mysqli_query($konek, $query);-->
<!--//-->
<!--</select>-->
<!---->
<!---->
<!--<select class="select2_single form-control" tabindex="-1">-->
<!--    <option>Pilih Subtema</option>-->
<!--    <option value="AK">Alaska</option>-->
<!--    <option value="HI">Hawaii</option>-->
<!--    <option value="CA">California</option>-->
<!--    <option value="NV">Nevada</option>-->
<!--    <option value="OR">Oregon</option>-->
<!--</select>-->

