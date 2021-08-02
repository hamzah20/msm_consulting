<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eTax MSM</title>
        <link href="<?= base_url(), 'assets/mins/sys/msm.svg'; ?>" rel="icon">
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-3.3.7.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-datepicker.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/bootstrap-select/css/bootstrap-select.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/metisMenu/metisMenu.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/sb-admin2/css/sb-admin-2.css'; ?>" rel="stylesheet" type="text/css"> 
        <link href="<?= base_url(), 'assets/font-awesome5/css/all.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome/css/font-awesome-animation.min.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/datatables-plugins/dataTables.bootstrap.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/datatables-responsive/dataTables.responsive.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/jquery/css/jquery.scrolling-tabs.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/sweetalert2/css/sweetalert2.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX2.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimz/css/_footer.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/tagsinput/css/select2.css'; ?>" rel="stylesheet">
        <style>
            body { 
                background: linear-gradient(-45deg, #ff8400, #e73c7e, #000080, #23d5ab);
                background-size: 400% 400%;
                animation: gradient 25s ease infinite;
            }
            @keyframes gradient {
                0% {
                background-position: 0% 50%;
                }
                50% {
                background-position: 100% 50%;
                }
                100% {
                background-position: 0% 50%;
                }
            }
        </style>
        <style>
            .sk_kotak_modification1{
                width: 100%;
                max-width: 480px;
                height: 100%;
                max-height: 480px;
                background-color: #d3d3d3;
                border-radius: 25px;
            }
        </style>
        <style>
            .sk_lingkaran_modification1{
                width: 100%;
                max-width: 440px;
                height: 100%;
                max-height: 440px;
                background-color: #ffffff;
                border-radius: 100%;
            }
        </style>
    </head>
    <?php
    $_sesFLNGAGE = 'eng';
    if ($_varALERTZ == 'noauthorized') {
        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
        echo '<script> $( document ).ready(function() {';
        echo 'swal.fire({ title: "<h3>Attention !</h3>", html: "<h4>Your account <b>not active</b>, please contact <b>web-admin</b></h4>", type: "warning", width: "450px",';
        echo '}).then(result => {if (result.value) {window.history.back();}});});';
        echo '</script>';
    } elseif ($_varALERTZ == 'undefined') {
        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
        echo '<script> $( document ).ready(function() {';
        echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Undefined <b>Username</b> or <b>Keyword</b></h4>", type: "error", width: "500px",';
        echo '}).then(result => {if (result.value) {window.history.back();}});});';
        echo '</script>';
    } elseif ($_varALERTZ == 'regtra') {
        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
        echo '<script> $( document ).ready(function() {';
        echo 'swal.fire({ title: "<h3>Registration Submitted</h3>", html: "<h4>thank you, will be followed up by MSM Consulting team</h4>", type: "success", width: "500px",';
        echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocLOGIEN') . '"}});});';
        echo '</script>';
    };
    ?>

    <body style="background-color: #f3f2f3;">
        <div class="container">
            <div class="row">
            <div class="sk_kotak_modification1 sk_center_modification0">
                <div class="sk_lingkaran_modification1 sk_center_modification0">
                    <div class="panel sk_center_modification0" style="background: transparent; width: 300px; height: 315px;">
                        <div class="panel-bodyx">
                            <div class="row" style="margin-left: -23px; margin-top: -10px; margin-right: -23px;">
                                <div class="col-lg-12">
                                    <div style="height: 35px;">
                                        <br>
                                    </div>
                                    <div class="panel-headingx" style="background-color: transparent; height: 75px; border-top-left-radius: 25%; border-top-right-radius: 25%">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" height="auto" width="100%" alt="">              
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="height: 0px;">
                                        <br>
                                    </div>
                                    <div class="panel-bodyx" style="background-color: transparent; border-bottom-left-radius: 5%; border-bottom-right-radius: 5%;">
                                        <div style="height: 0px;">
                                            <br>
                                        </div>
                                        <form role="form" method="POST" action="<?php echo base_url('nocLOGIEN/cfcCHKLGN'); ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 100%">
                                                        <span class="input-group-addon" style="background: #dcdcdc"><font style="color: #000000; font-size: 1.00em"><i class="fas fa-user fa-lg"></i></font></span>
                                                        <input type="text" name="_finUSRNME" class="form-control" placeholder="Username" autocomplete="off" autofocus required oninvalid="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo "this.setCustomValidity('Please fill out this field')";
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                        } else {
                                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                        };
                                                        ?>" oninput="setCustomValidity('')">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 100%">
                                                        <span class="input-group-addon" style="background: #dcdcdc"><font style="color: #000000; font-size: 0.85em"><i class="fas fa-key fa-lg"></i></font></span>
                                                        <input type="password" name="_finKEYWRD" class="form-control" placeholder="Keyword" autocomplete="off" autofocus required oninvalid="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo "this.setCustomValidity('Please fill out this field')";
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                        } else {
                                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                        };
                                                        ?>" oninput="setCustomValidity('')">
                                                    </div>
                                                </div>
                                                <div style="height: 0px;">
                                                    <br>
                                                </div>
                                                <button type="submit" class="btn btn-default btn-block" style="font-size: 11pt; padding:8px 10px; color: #000000"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Login</button>
                                                <div style="height: 15px;">
                                                    <br>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="pull-left">
                                                            <a href="<?php echo base_url(), 'NocLOGIEN/cfcACTUSR888'; ?>" style="cursor: pointer; text-decoration: none">
                                                                <font style="color: #808080; font-weight: bold"><i class="fas fa-edit"></i></font>&nbsp;<font style="color: #000000; font-weight: bold">Registration</font>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="height: 15px;">
                                                    <br>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12" style="color: #008000">
                                                        <div class="text-center">
                                                            <strong><font style="font-size: 14px">&nbsp;&COPY; 2021 MSM Consulting, All Rights Reserved</font></strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <script src="<?= base_url(), 'assets/jquery/js/jquery.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-datepicker.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/bootstrap-select/js/bootstrap-select.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/metisMenu/metisMenu.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/sb-admin2/js/sb-admin-2.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/clock/js/clock.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/jquery/js/jquery.scrolling-tabs.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/dataTables/js/jquery.dataTables.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/dataTables/js/dataTables.bootstrap.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/datatables-responsive/dataTables/daTaTables.responsive.js'; ?>"></script>        
            <script src="<?= base_url(), 'assets/sweetalert2/js/sweetalert2.min.js'; ?>"></script>
            <script src="<?= base_url(), 'assets/tagsinput/js/select2.full.js'; ?>"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#mins_table').DataTable();
                });
            </script>

            <script>
                jQuery(document).ready(function ($) {
                    $('.mins-key-eng').on('click', function () {
                        var getLink = $(this).attr('href');
                        _sEn1 = document.getElementById("eg1").value;
                        _sEn2 = document.getElementById("eg2").value;
                        _sEn3 = document.getElementById("eg3").value;
                        _sEn4 = document.getElementById("eg4").value;
                        _sEn5 = document.getElementById("eg5").value;
                        _sRsl = document.getElementById("rsl").value;
                        _sLic = document.getElementById("lic").value;
                        Swal.fire({
                            type: 'info',
                            title: '<div class="row"><img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" width="48" height="48" alt="msmconsultinglogo">&ensp;<font style="font-size: 21px; font-weight: bold; vertical-align: middle">virtual license key</font></div>',
                            html: '<hr class="sk_hr_modification0"><table style="margin: 0 auto; font-size: 15px">\n\
                                    <tbody>\n\
                                    <tr><th>Code 1</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn1 + '</font></th></tr>\n\
                                    <tr><th>Code 2</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn2 + '</font></th></tr>\n\
                                    <tr><th>Code 3</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn3 + '</font></th></tr>\n\
                                    <tr><th>Code 4</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn4 + '</font></th></tr>\n\
                                    <tr><th>Code 5</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn5 + '</font></th></tr>\n\
                                    </tbody></table>\n\
                                    <hr class="sk_hr_modification0">\n\
                                    <br><font style="font-size: 1.2em; color: #ff0000">' + _sRsl + '</font>\n\
                                    <br><font style="font-size: 1.2em">' + _sLic + '</font>\n\
                                    <br><font style="font-size: 14px">(email) <font style="color: blue; font-weight: bold">helpdesk.mins@gmail.com</font>',
                            width: '375px',
                            position: 'middle',
                            background: '#f8f8f8',

                        });
                    });
                });
            </script>

            <script>
                jQuery(document).ready(function ($) {
                    $('.mins-key-ina').on('click', function () {
                        var getLink = $(this).attr('href');
                        _sEn1 = document.getElementById("eg1").value;
                        _sEn2 = document.getElementById("eg2").value;
                        _sEn3 = document.getElementById("eg3").value;
                        _sEn4 = document.getElementById("eg4").value;
                        _sEn5 = document.getElementById("eg5").value;
                        _sRsl = document.getElementById("rsl").value;
                        _sLic = document.getElementById("lic").value;
                        Swal.fire({
                            type: 'info',
                            title: '<div class="row"><img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" width="48" height="48" alt="msmconsultinglogo">&ensp;<font style="font-size: 21px; font-weight: bold; vertical-align: middle">kunci lisensi virtual</font></div>',
                            html: '<hr class="sk_hr_modification0"><table style="margin: 0 auto; font-size: 15px">\n\
                                    <tbody>\n\
                                    <tr><th>Kode Lisensi 1</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn1 + '</font></th></tr>\n\
                                    <tr><th>Kode Lisensi 2</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn2 + '</font></th></tr>\n\
                                    <tr><th>Kode Lisensi 3</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn3 + '</font></th></tr>\n\
                                    <tr><th>Kode Lisensi 4</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn4 + '</font></th></tr>\n\
                                    <tr><th>Kode Lisensi 5</th><th>&nbsp;:&nbsp;</th><th><font style="color: #0275d8">' + _sEn5 + '</font></th></tr>\n\
                                    </tbody></table>\n\
                                    <hr class="sk_hr_modification0">\n\
                                    <br><font style="font-size: 1.2em; color: #ff0000">' + _sRsl + '</font>\n\
                                    <br><font style="font-size: 1.2em">' + _sLic + '</font>\n\
                                    <br><font style="font-size: 14px">email ke <font style="color: blue; font-weight: bold">helpdesk.mins@gmail.com</font>, untuk informasi lebih lanjut</font>',
                            width: '425px',
                            position: 'middle',
                            background: '#f8f8f8',

                        });
                    });
                });
            </script>
    </body>
</html>