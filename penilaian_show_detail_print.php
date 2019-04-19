<!DOCTYPE html>
<html lang="en">
<?php include "connect_db.php" ?>
<?php include "layout/head.php" ?>
<!---->
<!--<a class="btn btn-warning pull-right" href="penilaian_show_detail_print.php"><li class="fa fa-print"></li> Print </a>-->
<body class="nav-md" onload="window.print()">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <?php include "layout/sidebar.php" ?>
            </div>
        </div>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h3 class="text-center"> Penilaian Peserta Didik</h3>
                    </div>
                    <hr>
                    <div class="col-md-12 block">
                        <table class="table table-responsive ">
                            <?php
                            $sql_nilai ="SELECT *, sub_tema.id_sub_tema as id, sub_tema.nama as sub_tema, tema.nama as tema, rombel.nama as rombel, pendidik.nama as pendidik FROM penilaian 
                                            JOIN sub_tema on sub_tema.id_sub_tema = penilaian.id_sub_tema 
                                            JOIN tema on sub_tema.tema_id = tema.id_tema 
                                            JOIN detail_rombel on detail_rombel.id_detail_rombel = penilaian.id_detail_rombel 
                                            JOIN rombel on rombel.id_rombel = detail_rombel.id_rombel 
                                            JOIN pendidik ON pendidik.nik = detail_rombel.pendidik_nik
                                            where id_penilaian = ".$_GET['id_penilaian'];

                            $penilaian = pg_query($konek, $sql_nilai);
                            while($data = pg_fetch_object($penilaian)){?>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>: <?php echo $data->tanggal ?></td>
                                    <td></td>
                                    <td>Rombel </td>
                                    <td>: <?php echo $data->rombel ?></td>
                                </tr>
                                <tr>
                                    <td>Tema </td>
                                    <td>: <?php echo $data->tema ?></td>
                                    <td></td>
                                    <td>Pendidik </td>
                                    <td>: <?php
                                        $pendidik = $data->pendidik;
                                        echo $data->pendidik ?></td>

                                </tr>
                                <tr>
                                    <td>Sub Tema </td>
                                    <td>: <?php echo $data->sub_tema ?></td>
                                    <td></td>
                                    <?php
                                    $sql_peserta = "select * FROM peserta_rombel Where id_detail_rombel = '".$data->id_detail_rombel."'";
                                    $peserta = pg_query($konek,$sql_peserta);
                                    ?>
                                    <td>Jumlah Peserta Didik</td>
                                    <td>: <?php echo $_GET['jum'] ?></td>

                                </tr>
                            <?php

                                $id_detail_rombel = $data->id_detail_rombel;
                                $id_sub=$data->id;

                            } ?>
                        </table>
                    </div>

                    <div class="col-md-10">
                            <table class="table table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 10%" rowspan="3">No Induk</th>
                                    <th style="width: 18%" rowspan="3">Nama</th>
                                    <th style="width: 50%" colspan="30" class="text-center">Aspek Pengembangan dan Pencapaian Anak </th>
                                 </tr>
                                    <tr>
                                        <td colspan="4" style="width: 10%" class="text-center">Agama dan Moral</td>
                                        <td colspan="4" style="width: 10%" class="text-center">Fisik Motorik</td>
                                        <td colspan="4" style="width: 10%" class="text-center">Kognitif</td>
                                        <td colspan="4" style="width: 10%" class="text-center">Bahasa</td>
                                        <td colspan="4" style="width: 10%" class="text-center">Sosial Emosional</td>
                                        <td colspan="4" style="width: 10%" class="text-center">Seni</td>
                                    </tr>
                                 <tr>
                                    <?php for($i=0;$i<6;$i++){
                                        ?>
                                     <td>BB</td>
                                     <td>MB</td>
                                     <td>BSH</td>
                                     <td>BDB</td>
                                     <?php
                                     }
                                     ?>

                                 </tr>
                                </thead>
                                <tbody>

                                <?php
                                $queryPR ="SELECT * FROM detail_penilaian 
                                            JOIN peserta_rombel ON peserta_rombel.id_peserta_rombel = detail_penilaian.id_peserta_rombel
                                            JOIN peserta_didik on peserta_didik.no_induk = peserta_rombel.no_induk_peserta_didik 
                                            where id_detail_rombel = '".$_GET['id_detail']."' AND id_penilaian = ".$_GET['id_penilaian'];
                                $peserta = pg_query($konek, $queryPR);
                                    while($subjek = pg_fetch_object($peserta)){?>
                                        <tr>
                                            <td><?php echo $subjek->no_induk_peserta_didik?></td>
                                            <td><?php echo $subjek->nama_lengkap?></td>
                                            <?php if($subjek->agama_moral==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->agama_moral==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->agama_moral==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->agama_moral==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
                                            <?php if($subjek->fisik_motorik==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->fisik_motorik==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->fisik_motorik==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->fisik_motorik==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
                                            <?php if($subjek->kognitif==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->kognitif==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->kognitif==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->kognitif==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
                                            <?php if($subjek->bahasa==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->bahasa==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->bahasa==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->bahasa==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
                                            <?php if($subjek->sosial_emosional==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->sosial_emosional==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->sosial_emosional==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->sosial_emosional==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
                                            <?php if($subjek->seni==0){?>
                                                <td><i class="fa fa-check"></i> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->seni==1){?>
                                                <td> </td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                                <td></td>
                                            <?php }elseif($subjek->seni==2){ ?>
                                                <td> </td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                                <td></td>
                                            <?php }elseif($subjek->seni==3){?>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa fa-check"></i></td>
                                            <?php }?>
    <!--                                        <td class="text-center">--><?php //echo $subjek->agama_moral ?><!--</td>-->
    <!--                                        <td class="text-center">--><?php //echo $subjek->fisik_motorik ?><!--</td>-->
    <!--                                        <td class="text-center">--><?php //echo $subjek->kognitif ?><!--</td>-->
    <!--                                        <td class="text-center">--><?php //echo $subjek->bahasa ?><!--</td>-->
    <!--                                        <td class="text-center">--><?php //echo $subjek->sosial_emosional ?><!--</td>-->
    <!--                                        <td class="text-center">--><?php //echo $subjek->seni ?><!--</td>-->
                                           </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <div class="col-md-2">
                        <h5>Indikator Pencapaian</h5>
                        <table class="table table-responsive">
                            <tbody>
                            <?php
                            $query ="SELECT * FROM indikator_detail JOIN indikator on indikator.kode_indikator = indikator_detail.kode_indikator WHERE id_sub_tema = '".$id_sub."'";
                            $indikator = pg_query($konek, $query);
                            $n=1;

                            while($data = pg_fetch_object($indikator)){?>
                                <tr>
                                    <td><?php echo $n++ ?></td>
                                    <td><?php echo $data->nama ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="pull-right" style="margin-right: 10%">
        <p>Pendidik,</p>
        <br><br>
        <p><?php echo $pendidik ?></p>
    </div>
</div>


</body>
<?php include "layout/script.php";?>
</html>
