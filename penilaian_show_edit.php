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

            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Aktivitas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php

                    $query_select ="SELECT *, sub_tema.nama as sub_tema, tema.nama as tema FROM penilaian JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema JOIN tema on sub_tema.tema_id = tema.id_tema where id_penilaian = '".$_GET['id']."'";
                    $aktivitas = pg_query($konek, $query_select);
                    ?>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/penilaianProses.php" method="POST">
                            <?php while($data = pg_fetch_object($aktivitas)){?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_penilaian">Kode <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="id_penilaian" required="required" class="form-control col-md-7 col-xs-12" name="id_penilaian" value="<?php echo $data->id_penilaian ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" id="tanggal" name="tanggal" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data->tanggal ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_sub_tema">Sub-Tema <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_sub_tema" class="form-control col-md-7 col-xs-12">
                                            <?php
                                            $sqlTema = "select * from sub_tema";
                                            $sub_tema= pg_query($konek, $sqlTema);

                                            while($sub = pg_fetch_object($sub_tema)){
                                                if($sub->id_sub_tema == $data->id_sub_tema){
                                                ?>
                                            <option value="<?php echo $sub->id_sub_tema ?>" selected> <?php echo $sub->nama ?></option>
                                            <?php }else{?>
                                            <option value="<?php echo $sub->id_sub_tema ?>"> <?php echo $sub->nama ?></option>
                                            <?php }
                                            }?>
                                        </select>
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input hidden name="id_penilaian_awal" value="<?php echo $data->id_penilaian ?>">
                                    <!-- button batal -->
                                    <input hidden name="id_detail_rombel" value="<?php echo $data->id_detail_rombel ?>">
                                    <a href="penilaian_show.php?id=<?php echo $data->id_detail_rombel ?>" class="btn btn-primary">Batal</a>
                                    <input type="submit" class="btn btn-success"  name="penilaian_show_edit" value="Update">
                                </div>
                            </div>

                            <?php } ?>
                        </form>
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