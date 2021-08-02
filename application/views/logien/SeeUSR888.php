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
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-select.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome5/css/all.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome5/css/font-awesome-animation.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome4/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">        
        <link href="<?= base_url(), 'assets/Ionicons/css/ionicons.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/datatables-plugins/dataTables.bootstrap.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/datatables-responsive/dataTables.responsive.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/jquery/css/jquery.scrolling-tabs.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/sweetalert2/css/sweetalert2.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_footer.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/tagsinput/css/select2.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/adminlte/css/adminlte.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/adminlte/css/skins/_all-skins.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/checkbox/css/build.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/hummingbird/css/hummingbird-treeview.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimz/css/jquery.orgchart.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX2.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimandiri_fonts.googleapis.com/css/fonts_family.css'; ?>"  rel="stylesheet">

        <style>
            body { 
                background: #ffffff}
        </style>
        <style>
            table, th, td {
                border: 2px solid transparent;
            }
        </style>
        <style>
            .sk_panel_modification1{
                width: 360px;
                height: 390px;
                background-color: #ffffff;
            }
        </style>
    </head>
    <?php
    $_sesFLNGAGE = 'eng';
    ?>
    <body style="background-color: #f3f2f3;">
        <div class="container">
            <div class="row">
                <div class="sk_panel_modification1 sk_center_modification0">
                    <div class="panel sk_center_modification0" style="background: #f2f3f2; width: 350px; height: 380px;">
                        <div class="panel-body">
                            <form role="form" method="POST" action="<?php echo base_url('NocLOGIEN/cfcACTUSR888/regtra'); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nama';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Name';
                                                } else {
                                                    echo 'Name';
                                                };
                                                ?>&nbsp;
                                            </label>
                                            <input type="text" name="_finFUSERNM" class="form-control" required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nama Perusahaan';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Company Name';
                                                } else {
                                                    echo 'Company Name';
                                                };
                                                ?>&nbsp;
                                            </label>
                                            <input type="text" name="_finFCOMPNY" class="form-control" required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Email';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Email';
                                                } else {
                                                    echo 'Email';
                                                };
                                                ?>&nbsp;
                                            </label>
                                            <input type="text" name="_finFEMAILZ" class="form-control" required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Kontak';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Contact Number';
                                                } else {
                                                    echo 'Contact Number';
                                                };
                                                ?>&nbsp;
                                            </label>
                                            <input type="text" name="_finFPHONEZ" class="form-control" required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Komentar';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Comments';
                                                } else {
                                                    echo 'Comments';
                                                };
                                                ?>&nbsp;
                                            </label>
                                            <input type="text" name="_finFNOTEZZ" class="form-control">
                                        </div>
                                        <div style="height: 10px;">
                                            <br>
                                        </div>
                                        <table>
                                            <tr>
                                                <td style="width: 80%"><button type="submit" class="btn btn-success btn-block" style="font-size: 17px; padding: 8px 10px;"><i class="fas fa-paper-plane fa-fw"></i><font style="font-size: 85%">Submit Registration</font></button></td>
                                                <td style="width: 20%"><button type="button" onclick="window.location = '<?php echo base_url(), 'NocLOGIEN'; ?>'" class="btn btn-danger btn-block" style="font-size: 17px; padding:8px 10px;"><i class="fas fa-times-circle fa-fw"></i><font style="font-size: 85%; color: #ffffff">Cancel</font></button></td>
                                            </tr>
                                        </table>
                                        <div style="height: 10px;">
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" style="color: #008000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url(), 'assets/jquery/js/jquery-3.3.1.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-3.3.7.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-datepicker.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-select.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/fastclick/lib/fastclick.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/adminlte/js/adminlte.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/adminlte/js/demo.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/clock/js/clock.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/jquery/js/jquery.scrolling-tabs.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/dataTables/js/jquery.dataTables.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/dataTables/js/dataTables.bootstrap.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/datatables-responsive/dataTables/daTaTables.responsive.js'; ?>"></script>        
        <script src="<?= base_url(), 'assets/sweetalert2/js/sweetalert2.min.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/tagsinput/js/select2.full.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/jquery/js/jquery.masked-input.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/hummingbird/js/hummingbird-treeview.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/jqueryblockui/js/jquery.blockui.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/aimz/js/jquery.orgchart.js'; ?>"></script>
        <script src="<?= base_url(), 'assets/aimz/js/sk_orgchart.js'; ?>"></script>
    </body>
</html>