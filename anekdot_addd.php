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
                        <h2>Tambah Catatan Anekdot</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/anekdotProses.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_anekdot">Kode <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="kode_anekdot" required="required" class="form-control col-md-7 col-xs-12" name="kode_anekdot">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waktu">Waktu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="time" id="waktu" name="waktu" required="required" class="form-control col-md-7 col-xs-12"><small>('hh:mm PM/AM')</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat">Tempat <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tempat" required="required" class="form-control col-md-7 col-xs-12" name="tempat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="peristiwa">Peristiwa <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="form-control" rows="3" required="required" name="peristiwa"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_tpp">Indikator yang muncul <span class="required">*</span>
                                </label>       
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                        $query1 ="SELECT * FROM indikator";
                                        $indikator1 = mysqli_query($konek, $query1);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-7">        
                                            <select name="kode_indikator" class="form-control">
                                                <?php while($data = mysqli_fetch_object($indikator1)){?>
                                                    <option value="<?php echo $data->kode_indikator?>"><?php echo $data->nama ?></  option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <input hidden name="id_penilaian" value="<?php echo $_GET['id'] ?>">
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-primary" class="fa-user-plus" name="indikator_tpp_add" value="+">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <br>
                                    <textarea class="form-control" rows="3" readonly="" name="kode_tpp">
                                        <table class="table table-bordered">
                                        <tbody>
                                     <?php
                                        while($subjek = mysqli_fetch_object($anekdot)){?>
                                            <tr>
                                                
                                                <td><ul>
                                                        <?php
                                                        $sqlIndikator = "Select indikator_tpp.nama as indikator From indikator_yg_muncul JOIN indikator_tpp ON indikator_tpp.kode_tpp = indikator_yg_muncul.kode_tpp where kode_anekdot = ".$subjek->kode_anekdot;
                                                        $indiMuncul = mysqli_query($konek, $sqlIndikator);
                                                        while($indikator = mysqli_fetch_object($indiMuncul)){?>
                                                        <li><?php echo $indikator->indikator ?></li>

                                                        <?php } ?>
                                                    </ul>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <input hidden name="id_detail_penilaian" value="<?php echo $_GET['id'] ?>">
                            <input type="submit" class="btn btn-success" name="anekdot_add" value="Submit">
                        </div>
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
