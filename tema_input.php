<!DOCTYPE html>
<html lang="en">
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
                        <h2>Tambah Tema</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!---------------------------Content------------------------------------->
                        <!---------------------------Content------------------------------------->
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="proses/temaProses.php" method="POST">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode-name">Kode Tema <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                    <input type="text" id="kode-name" name="id_tema" required="required" class="form-control col-md-7 col-xs-12">-->
                                    <input type="text" id="kode-name" name="kode" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Tema <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" type="button" href="tema_table.php">Batal</a>
                                    <button type="submit" class="btn btn-success" name="tema_input">Submit</button>
                                </div>
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
