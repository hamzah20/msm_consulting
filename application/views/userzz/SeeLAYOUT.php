<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>eTax MSM</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="<?= base_url(), 'assets/mins/sys/msm.svg'; ?>" rel="icon">
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-3.3.7.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-datepicker.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/bootstrap/css/bootstrap-select.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/bootstrap/css/timepicker.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome5/css/all.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome5/css/font-awesome-animation.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/font-awesome4/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">        
        <link href="<?= base_url(), 'assets/Ionicons/css/ionicons.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/datatables-plugins/dataTables.bootstrap.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/datatables-responsive/dataTables.responsive.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/jquery/css/jquery.scrolling-tabs.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/sweetalert2/css/sweetalert2.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/tagsinput/css/select2.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/adminlte/css/adminlte.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/adminlte/css/skins/_all-skins.min.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/checkbox/css/build.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/hummingbird/css/hummingbird-treeview.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimz/css/jquery.orgchart.css'; ?>" rel="stylesheet">
        <link href="<?= base_url(), 'assets/aimz/css/_customFIX2.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url(), 'assets/aimandiri_fonts.googleapis.com/css/fonts_family.css'; ?>"  rel="stylesheet">
        <link href="<?= base_url(), 'assets/toastr/css/toastr.min.css'; ?>"  rel="stylesheet">

        <style>
            th, td { white-space: nowrap; }
            div.dataTables_wrapper {
                width: auto;
                margin: 0 auto;
            }
        </style>
        <style type="text/css">
            .sk_newtxt_edit{
                display: none;
                width: 98%;
            }
            .sk_newtxt_edit2{
                display: none;
                width: 98%;
            }
        </style>
    </style>
</head>
<body class="hold-transition skin-blue-light sidebar-mini" style="background-color: #f2f2f2">

    <input hidden type="text" id="_oConSta" value="terhubung">
    <input hidden type="text" id="_oConSt2" value="terhubung">
    <?php
    $_sesFCATGRY = $this->session->FCATGRY;
    $_SESSION['_oConSta'] = '';
    $_SESSION['_oConSt2'] = '';
    ?>

    <script>
        var _oUsr = '<?php echo $_sesFCATGRY; ?>';

        setInterval(function () {
            if (_oUsr == 'staffz') {
                _fGETConSta()
            } else if (_oUsr = 'client') {
                _fGETConSt2()
            }
        }, 3000);
    </script>

    <?php
    $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
    ?>
    <div class="wrapper" style="background-color: #f2f2f2">

        <?php
        $this->load->view('userzz/SeeHEADER');
        $this->load->view('userzz/SeeMENUZZ');
        ?>
        <div class="content-wrapper" style="background-color: #dcdcdc">
            <?php
            $this->load->view($_varCONTEN);
            ?>
        </div>

        <?php
        $this->load->view('userzz/SeeFOOTER');
        ?>
    </div>

    <div class="modal fade" id="_objMDLDOC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.25em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Document View';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tampilan Dokumen';
                        } else {
                            echo 'Tampilan Dokumen';
                        };
                        ?>
                    </h5>
                </div>
                <div class="modal-body" id="IsiModal">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="_objMDLAPJ">
        <div class="modal-dialog" style="width: 608px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.20em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Tax Activity Sequence';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Urutan Aktifitas Pajak';
                        } else {
                            echo 'Urutan Aktifitas Pajak';
                        };
                        ?>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="sk_table_modification table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap;">Status</th>
                                        <th class="text-center" style="white-space: nowrap;">Keterangan (Deskripsi)</th>
                                        <th class="text-center" style="white-space: nowrap;">PIC</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">1</span></td>
                                        <td>&nbsp;Buat template Laporan Pajak</td>
                                        <td>MSM</td>

                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">2</span></td>
                                        <td>&nbsp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</td>
                                        <td>MSM</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">3</span></td>
                                        <td>&nbsp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM</td>
                                        <td>Klien</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">4</span></td>
                                        <td>&nbsp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</td>
                                        <td>MSM & Klien</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">5</span></td>
                                        <td>&nbsp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</td>
                                        <td>MSM & Klien</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">6</span></td>
                                        <td>&nbsp;Pembuatan/penerbitan Kode Billing (SSE : Surat Setoran Elektronik)</td>
                                        <td>MSM</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">7</span></td>
                                        <td>&nbsp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</td>
                                        <td>Klien</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">8</span></td>
                                        <td>&nbsp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</td>
                                        <td>MSM</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">9</span></td>
                                        <td>&nbsp;Selesai</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font style="color: #5bc0de"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>&ensp;Referensi KLU (Klasifikasi Lapangan Usaha)</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="sk_table_modification table-responsive">
                            <table id="_objINAmdlklu" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap; width: 1%">KLU</th>
                                        <th class="text-center" style="white-space: nowrap; width: 93%">Keterangan (Deskripsi)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tklucde');
                                    $_queKLUCDE = $this->db->get();

                                    $_oSeq = 0;
                                    foreach ($_queKLUCDE->result_array() as $_oRow) {
                                        $_oSeq ++;
                                        ?>
                                        <tr class="sk_pilih_modification" pilih-FKLUCOD="<?php echo $_oRow['FKLUCOD']; ?>">
                                            <td><?php echo $_oRow['FKLUCOD']; ?></td>
                                            <td><?php echo $_oRow['FDESCRP']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_addkjs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font style="color: #5bc0de"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>&ensp;Referensi KJS (Kode Jenis Setoran)</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="sk_table_modification table-responsive">
                            <table id="_objINAaddkjs" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap; width: 1%">KJS</th>
                                        <th class="text-center" style="white-space: nowrap; width: 99%">Keterangan (Deskripsi)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tkjstor');
                                    $_queKJSTOR = $this->db->get();

                                    $_oSeq = 0;
                                    foreach ($_queKJSTOR->result_array() as $_oRow) {
                                        $_oSeq ++;
                                        ?>
                                        <tr class="sk_add_fkjszzz" pilih-FKJSCOD="<?php echo $_oRow['FKJSCOD']; ?>">
                                            <td class="text-center" style="white-space: nowrap; width: 1%"><?php echo $_oRow['FKJSCOD']; ?></td>
                                            <td class="text-left" style="white-space: nowrap; width: 99%"><?php echo $_oRow['FJNSSTR']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?></button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_ctatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:400px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #5bc0de"><i class="fas fa-comment-dots fa-lg"></i></font>&ensp;Catatan</h5>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <?php
                        echo '(1) GP* : Gaji/Pensiun atau THT/JHT';
                        echo '<br>';
                        echo '(2) TP* : Tunjangan PPh';
                        echo '<br>';
                        echo '(3) TL* : Tunjangan Lainnya, Uang Lembur, dan sebagainya';
                        echo '<br>';
                        echo '(4) HI* : Honorarium dan Imbalan Lainnya Sejenisnya';
                        echo '<br>';
                        echo '(5) PA* : Premi Asuransi yang dibayar Pemberi Kerja';
                        echo '<br>';
                        echo '(6) NK* : Natura dan Kenikmatan Lainnya';
                        echo '<br>';
                        echo '(7) TB* : Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR';
                        echo '<br>';
                        echo '(8) IU* : Iuran Pensiun atau Iuran THT / JHT';
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?></button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_edtkjs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font style="color: #5bc0de"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>&ensp;Referensi KJS (Kode Jenis Setoran)</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="sk_table_modification table-responsive">
                            <table id="_objINAedtkjs" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap; width: 1%">KJS</th>
                                        <th class="text-center" style="white-space: nowrap; width: 99%">Keterangan (Deskripsi)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tkjstor');
                                    $_queKJSTOR = $this->db->get();

                                    $_oSeq = 0;
                                    foreach ($_queKJSTOR->result_array() as $_oRow) {
                                        $_oSeq ++;
                                        ?>
                                        <tr class="sk_edit_fkjszzz" pilih-FKJSCOD="<?php echo $_oRow['FKJSCOD']; ?>">
                                            <td class="text-center" style="white-space: nowrap; width: 1%"><?php echo $_oRow['FKJSCOD']; ?></td>
                                            <td class="text-left" style="white-space: nowrap; width: 99%"><?php echo $_oRow['FJNSSTR']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?></button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_edtngr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font style="color: #5bc0de"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>&ensp;Referensi Negara Domisili</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="sk_table_modification table-responsive">
                            <table id="_objINAedtngr" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap; width: 1%">Kode</th>
                                        <th class="text-center" style="white-space: nowrap; width: 99%">Nama Negara Domisili</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tcountr');
                                    $_queNGRDOM = $this->db->get();

                                    $_oSeq = 0;
                                    foreach ($_queNGRDOM->result_array() as $_oRow) {
                                        $_oSeq ++;
                                        ?>
                                        <tr class="sk_edit_fcountr" pilih-FNGRCOD="<?php echo $_oRow['FNGRCOD']; ?>">
                                            <td class="text-center" style="white-space: nowrap; width: 1%"><?php echo $_oRow['FNGRCOD']; ?></td>
                                            <td class="text-left" style="white-space: nowrap; width: 99%"><?php echo $_oRow['FNGRDES']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Close';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tutup';
                        } else {
                            echo 'Tutup';
                        };
                        ?></button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_updpay" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 608px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.20em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        } else {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        };
                        ?>
                    </h5>
                </div>
                <?php
                $_cmpFRECNMB = $this->uri->segment(5);
                $_cmpFCODEZZ = $this->uri->segment(6);
                $_hstFRECNMB = $this->uri->segment(7);
                $_hstFCODEZZ = $this->uri->segment(8);
                $_cmpFYEARZZ = $this->uri->segment(9);
                $_cmpFWRKSTA = $this->uri->segment(10);
                ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actspy/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <input type="hidden" name="_edtFRECNMB" id="_oFRECNMB">
                            <input type="file" id="_fleFDOCUMN" name="_fleFDOCUMN" style="display: none" onchange="document.getElementById('_edtFDOCUMN').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a role="button" class="btn btn-default" style="width: 50px; background: #d9534f; color: #ffffff" title="<?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Upload Document';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Unggah Dokumen';
                                    } else {
                                        echo 'Unggah Dokumen';
                                    }
                                    ?>" onclick="document.getElementById('_fleFDOCUMN').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                    </a>
                                </span>
                                <input type="text" id="_edtFDOCUMN" name="_edtFDOCUMN" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success"><span class="fas fa-database fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>
                        </button>
                        <button class="btn btn-info" data-dismiss="modal"><span class="fas fa-close fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Close';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tutup';
                            } else {
                                echo 'Tutup';
                            };
                            ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_upddoc" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 608px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.20em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        } else {
                            echo 'Upload (Unggah) Dokumen/Bukti';
                        };
                        ?>
                    </h5>
                </div>
                <?php
                $_cmpFRECNMB = $this->uri->segment(5);
                $_cmpFCODEZZ = $this->uri->segment(6);
                $_hstFRECNMB = $this->uri->segment(7);
                $_hstFCODEZZ = $this->uri->segment(8);
                $_cmpFYEARZZ = $this->uri->segment(9);
                $_cmpFWRKSTA = $this->uri->segment(10);
                ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actsdc/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <input type="hidden" name="_edxFRECNMB" id="_xFRECNMB">
                            <input type="file" id="_flxFDOCUMN" name="_flxFDOCUMN" style="display: none" onchange="document.getElementById('_edxFDOCUMN').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a role="button" class="btn btn-default" style="width: 50px; background: #d9534f; color: #ffffff" title="<?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Upload Document';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Unggah Dokumen';
                                    } else {
                                        echo 'Unggah Dokumen';
                                    }
                                    ?>" onclick="document.getElementById('_flxFDOCUMN').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                    </a>
                                </span>
                                <input type="text" id="_edxFDOCUMN" name="_edxFDOCUMN" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success"><span class="fas fa-database fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>
                        </button>
                        <button class="btn btn-info" data-dismiss="modal"><span class="fas fa-close fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Close';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tutup';
                            } else {
                                echo 'Tutup';
                            };
                            ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_kompen" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 608px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.20em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Edit Nilai Kompensasi (PPh21)';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Edit Nilai Kompensasi (PPh21)';
                        } else {
                            echo 'Edit Nilai Kompensasi (PPh21)';
                        };
                        ?>
                    </h5>
                </div>
                <?php
                $_cmpFRECNMB = $this->uri->segment(4);
                $_cmpFCODEZZ = $this->uri->segment(5);
                $_hstFRECNMB = $this->uri->segment(6);
                $_hstFCODEZZ = $this->uri->segment(7);
                $_cmpFYEARZZ = $this->uri->segment(8);
                $_cmpFWRKSTA = $this->uri->segment(9);
                ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21kmp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Nilai Kompensasi';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Nilai Kompensasi';
                                } else {
                                    echo 'Nilai Kompensasi';
                                };
                                ?>&nbsp;:
                            </label>
                            <input type="text" name="_edtFCOMPEN" class="form-control" value="<?php echo '0'; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success"><span class="fas fa-database fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>
                        </button>
                        <button class="btn btn-info" data-dismiss="modal"><span class="fas fa-close fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Close';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tutup';
                            } else {
                                echo 'Tutup';
                            };
                            ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sk_modal_komp00" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" style="width: 608px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title" id="myModalLabel"><font style="color: #6cc644; font-size: 1.20em"><span class="fas fa-info-circle fa-fw"></span></font>&nbsp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Edit Nilai Kompensasi (PPN)';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Edit Nilai Kompensasi (PPN)';
                        } else {
                            echo 'Edit Nilai Kompensasi (PPN)';
                        };
                        ?>
                    </h5>
                </div>
                <?php
                $_cmpFRECNMB = $this->uri->segment(4);
                $_cmpFCODEZZ = $this->uri->segment(5);
                $_hstFRECNMB = $this->uri->segment(6);
                $_hstFCODEZZ = $this->uri->segment(7);
                $_cmpFYEARZZ = $this->uri->segment(8);
                $_cmpFWRKSTA = $this->uri->segment(9);
                ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00kmp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '1. Kompensasi kelebihan PPN Masa Pajak sebelumnya';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '1. Kompensasi kelebihan PPN Masa Pajak sebelumnya';
                                } else {
                                    echo '1. Kompensasi kelebihan PPN Masa Pajak sebelumnya';
                                };
                                ?>&nbsp;:
                            </label>
                            <input type="text" name="_edtFCOMPE1" class="form-control" value="<?php echo '0'; ?>">
                        </div>
                        <div class="col-lg-12">
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak (MM-YYYY)';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak (MM-YYYY)';
                                } else {
                                    echo '2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak (MM-YYYY)';
                                };
                                ?>&nbsp;:
                            </label>
                            <input type="text" name="_edtFCOMPE2" class="form-control" value="<?php echo '0'; ?>">
                        </div>
                        <div class="col-lg-12">
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai penambah (pengurang) Pajak Masukan';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai penambah (pengurang) Pajak Masukan';
                                } else {
                                    echo '3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai penambah (pengurang) Pajak Masukan';
                                };
                                ?>&nbsp;:
                            </label>
                            <input type="text" name="_edtFCOMPE3" class="form-control" value="<?php echo '0'; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success"><span class="fas fa-database fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>
                        </button>
                        <button class="btn btn-info" data-dismiss="modal"><span class="fas fa-close fa-fw"></span>&nbsp;<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Close';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tutup';
                            } else {
                                echo 'Tutup';
                            };
                            ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url(), 'assets/jquery/js/jquery-3.3.1.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-3.3.7.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/fastclick/lib/fastclick.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/adminlte/js/adminlte.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/adminlte/js/demo.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-datepicker.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/bootstrap/js/bootstrap-select.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/clock/js/clock.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/jquery/js/jquery.scrolling-tabs.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/dataTables/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/dataTables/js/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/datatables/js/dataTables.fixedColumns.min.js'; ?>"</script>
    <script src="<?= base_url(), 'assets/datatables-responsive/dataTables/daTaTables.responsive.js'; ?>"></script>        
    <script src="<?= base_url(), 'assets/sweetalert2/js/sweetalert2.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/tagsinput/js/select2.full.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/jquery/js/jquery.masked-input.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/hummingbird/js/hummingbird-treeview.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/jqueryblockui/js/jquery.blockui.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/aimz/js/jquery.orgchart.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/aimz/js/sk_orgchart.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/toastr/js/toastr.min.js'; ?>"></script>
    <script src="<?= base_url(), 'assets/highcharts/js/highcharts2.js'; ?>"></script>

    <script type="text/javascript">
                                        function _fGETConSta() {
                                            var _oSta = document.getElementById("_oConSta").value;
                                            if (navigator.onLine) {
                                                if ((_oSta == '') || (_oSta == 'terputus')) {
                                                    toastr.success('TERHUBUNG', 'Koneksi Internet',
                                                            toastr.options = {
                                                                "closeButton": true,
                                                                "positionClass": "toast-top-right",
                                                                "fadeIn": 500,
                                                                "fadeOut": 100,
                                                                "timeOut": 10000,
                                                                "extendedTimeOut": 1000
                                                            });
                                                    document.getElementById("_oConSta").value = 'terhubung';
                                                    document.getElementById("_oIntSta").innerHTML = 'Terhubung';
                                                } else if (_oSta == "terhubung") {
                                                    document.getElementById("_oIntSta").innerHTML = 'Terhubung';
                                                }
                                            } else {
                                                if ((_oSta == '') || (_oSta == 'terhubung')) {
                                                    toastr.error('TERPUTUS', 'Koneksi Internet',
                                                            toastr.options = {
                                                                "closeButton": true,
                                                                "positionClass": "toast-top-right",
                                                                "fadeIn": 500,
                                                                "fadeOut": 100,
                                                                "timeOut": 10000,
                                                                "extendedTimeOut": 1000
                                                            });
                                                    document.getElementById("_oConSta").value = 'terputus';
                                                    document.getElementById("_oIntSta").innerHTML = 'Terputus';
                                                } else if (_oSta == 'terputus') {
                                                    document.getElementById("_oIntSta").innerHTML = 'Terputus';
                                                }
                                            }
                                        }
    </script>

    <script type="text/javascript">
        function _fGETConSt2() {
            var _oSta = document.getElementById("_oConSt2").value;
            if (navigator.onLine) {
                if ((_oSta == '') || (_oSta == 'terputus')) {
                    toastr.success('TERHUBUNG', 'Koneksi Internet',
                            toastr.options = {
                                "closeButton": true,
                                "positionClass": "toast-top-right",
                                "fadeIn": 500,
                                "fadeOut": 100,
                                "timeOut": 10000,
                                "extendedTimeOut": 1000
                            });
                    document.getElementById("_oConSt2").value = 'terhubung';
                    document.getElementById("_oIntSt2").innerHTML = 'Terhubung';
                } else if (_oSta == "terhubung") {
                    document.getElementById("_oIntSt2").innerHTML = 'Terhubung';
                }
            } else {
                if ((_oSta == '') || (_oSta == 'terhubung')) {
                    toastr.error('TERPUTUS', 'Koneksi Internet',
                            toastr.options = {
                                "closeButton": true,
                                "positionClass": "toast-top-right",
                                "fadeIn": 500,
                                "fadeOut": 100,
                                "timeOut": 10000,
                                "extendedTimeOut": 1000
                            });
                    document.getElementById("_oConSt2").value = 'terputus';
                    document.getElementById("_oIntSt2").innerHTML = 'Terputus';
                } else if (_oSta == 'terputus') {
                    document.getElementById("_oIntSt2").innerHTML = 'Terputus';
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(document).on('click', '.sk_pilih_modification', function (e) {
            document.getElementById("_edtFKLUZZZ").value = $(this).attr('pilih-FKLUCOD');
            $('#myModal').modal('hide');
        });
    </script>

    <script type="text/javascript">         $(document).on('click', '.sk_add_fkjszzz', function (e) {
            document.getElementById("_finFKJSZZZ").value = $(this).attr('pilih-FKJSCOD');
            $('#sk_modal_addkjs').modal('hide');
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.sk_edit_fkjszzz', function (e) {
            document.getElementById("_edtFKJSZZZ").value = $(this).attr('pilih-FKJSCOD');
            $('#sk_modal_edtkjs').modal('hide');
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.sk_edit_fcountr', function (e) {
            document.getElementById("_edtFNGRCOD").value = $(this).attr('pilih-FNGRCOD');
            $('#sk_modal_edtngr').modal('hide');
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objENGcompny').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINAcompny').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINApjkmsm').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINApjkpay').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINApjkrpt').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINApjkarc').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objENGactday').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINAactday').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objENGactmon').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINAactmon').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objENGeducat').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINAeducat').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objENGexperi').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#_objINAexperi').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('#_objENGdataTables').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": "No entries to show",
                    "processing": "Loading...",
                },
                "dom": '<"pull-left"fl>tip'
            });
            $('#_objINAdataTables').dataTable({
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "autoWidth": true,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": "Tidak ada data untuk ditampilkan",
                    "processing": "Pemuatan...",
                },
                "dom": '<"pull-left"fl>tip'
            });
            $(document).ready(function () {
                $('#dataTables2').dataTable({
                    "serverMethod": "GET",
                    'iDisplayLength': 15,
                    "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                    "sorting": [],
                    "autoWidth": false,
                    "language": {
                        "lengthMenu": "View   _MENU_   Record(s)",
                        "search": '<div class="input-group">_INPUT_<span class="input-group-addon">&nbsp;&nbsp;<i class="fas fa-search"></i></span></div>',
                        "info": "<strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
                        "paginate":
                                {
                                    "previous": '<i class="fas fa-angle-double-left"></i>',
                                    "next": '<i class="fas fa-angle-double-right"></i>'
                                }
                    }
                });
            });
            $(document).ready(function () {
                $('#dataTables3').dataTable({
                    "serverMethod": "GET",
                    'iDisplayLength': 15,
                    "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                    "sorting": [],
                    "autoWidth": false,
                    "language": {
                        "lengthMenu": "View   _MENU_   Record(s)",
                        "search": '<div class="input-group">_INPUT_<span class="input-group-addon">&nbsp;&nbsp;<i class="fas fa-search"></i></span></div>',
                        "info": "<strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
                        "paginate":
                                {
                                    "previous": '<i class="fas fa-angle-double-left"></i>',
                                    "next": '<i class="fas fa-angle-double-right"></i>'
                                }
                    }
                });
            });
            $(document).ready(function () {
                $('#dataTables4').dataTable({
                    "serverMethod": "GET",
                    'iDisplayLength': 15,
                    "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                    "sorting": [],
                    "autoWidth": false,
                    "language": {
                        "lengthMenu": "View   _MENU_   Record(s)",
                        "search": '<div class="input-group">_INPUT_<span class="input-group-addon">&nbsp;&nbsp;<i class="fas fa-search"></i></span></div>',
                        "info": "<strong>_START_</strong>-<strong>_END_</strong> of <strong>_TOTAL_</strong>",
                        "paginate":
                                {
                                    "previous": '<i class="fas fa-angle-double-left"></i>',
                                    "next": '<i class="fas fa-angle-double-right"></i>'
                                }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $('.nav-tabs').scrollingTabs();
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.mins-alert-logout').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: '<h3>Confirmation</h3>',
                    html: '<h4>Are you sure to <font color="RED" style="font-weight: bold">LOGOUT</font> ?</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-keluar').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: '<h3>Konfirmasi</h3>',
                    html: '<h4>Apakah anda yakin untuk <font color="RED" style="font-weight: bold">KELUAR</font> ?</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-persetujuan').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: '<h4>Konfirmasi <font color="#0275d8">Approval/Persetujuan</font></h4>',
                    html: '<h4>Dengan ini saya telah <font color="#ff0000">memeriksa</font> dan <font color="#ff0000">menyetujui</font> laporan terlampir, dan segera akan menindaklanjutinya.</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: 'Setuju',
                    cancelButtonText: 'Tidak',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-koreksi').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: '<h4>Konfirmasi <font color="#0275d8">Koreksi</font></h4>',
                    html: '<h4>Dengan ini <font color="#ff0000">approval/persetujuan </font> dari klien akan <font color="#ff0000">dianulir/dibatalkan</font>, atas persetujuan klien dan sepengetahuan MSM.</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: 'Setuju',
                    cancelButtonText: 'Tidak',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.mins-alert-pph25').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: 'PPh 25',
                    html: '<strong> hanya ada 1 transaksi setiap periode bulan</strong>',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>


    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-delete').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: '<h3>Confirmation</h3>',
                    html: '<h4>Are you sure to <font color="#ff0000" style="font-weight: bold">DELETE</font> this record ?</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-hapus').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: '<h3>Konfirmasi</h3>',
                    html: '<h4>Apakah anda yakin untuk <font color="#ff0000" style="font-weight: bold">HAPUS</font> data ini ?</h4>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-hapus2').on('click', function () {
                var getLink = $(this).attr('href');
                Swal.fire({type: 'warning',
                    title: '<h3>Konfirmasi</h3>',
                    html: '<h4>Apakah anda yakin untuk <font color="#ff0000" style="font-weight: bold">HAPUS</font> data ini ?</h4><h5>(<font style="color: #ff0000">semua data summary/detail klien, akan dihapus</font>)</h5>',
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: '#9E9E9E',
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    width: '400px',
                }).then(result => {
                    if (result.value) {
                        window.location.href = getLink
                    }
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-expired').on('click', function () {
                var getLink = $(this).attr('href');
                swal({type: "warning",
                    title: '<h4>Confirmation</h4>',
                    text: 'Sure to make <font color="RED">INACTIVE</font> this record ?',
                    html: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    confirmButtonColor: '#d9534f',
                }, function () {
                    window.location.href = getLink
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-kadaluwarsa').on('click', function () {
                var getLink = $(this).attr('href');
                swal({type: "warning",
                    title: '<h4>Konfirmasi</h4>',
                    text: 'Yakin untuk merubah <font color="RED">TIDAK AKTIF</font> data ini ?',
                    html: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    confirmButtonColor: '#d9534f',
                }, function () {
                    window.location.href = getLink
                });
                return false;
            });
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $('.aimz-alert-edit').on('click', function () {
                var getLink = $(this).attr('href');
                swal({type: "warning",
                    title: '<h5>Confirmation</h5>',
                    text: 'Are you sure to <font color="RED">EDIT</font> this record ?\n\
                    Because, this record have corelation to other table',
                    html: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    confirmButtonColor: '#d9534f',
                }, function () {
                    window.location.href = getLink
                });
                return false;
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: "Please Select"
            });
        });
    </script>

    <script type="text/javascript">
        $("#_edtFPREFIX").select2({tags: true});
        $("#_edtFPREFIX").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);
            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });
    </script>

    <script type="text/javascript">
        $("#_edtFSUFFIX").select2({tags: true});
        $("#_edtFSUFFIX").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);
            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });
    </script>

    <script>
        function activaTab(tab) {
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        }
        ;
    </script>

    <script>
        function _objENGvalidt() {
            var checked = false;
            var elements = document.getElementsByName("checkbox[]");
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].checked) {
                    checked = true;
                }
            }
            if (!checked) {
                swal.fire({type: 'warning',
                    title: '<h3>Attention</h3>',
                    html: '<h4>Please select, at least 1 record</h4>',
                    confirmButtonColor: '#F44336',
                    confirmButtonText: 'OK',
                    width: '400px',
                });
            }
            return checked;
        }
    </script>

    <script>
        function _objINAvalidt() {
            var checked = false;
            var elements = document.getElementsByName("checkbox[]");
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].checked) {
                    checked = true;
                }
            }
            if (!checked) {
                swal.fire({type: 'warning',
                    title: '<h3>Perhatian</h3>',
                    html: '<h4>Silahkan pilih, setidak-nya 1 data</h4>',
                    confirmButtonColor: '#F44336',
                    confirmButtonText: 'OK',
                    width: '400px',
                });
            }
            return checked;
        }
    </script>

    <script>
        function validatesub() {
            var checked = false;
            var elements = document.getElementsByName("checkboxsub[]");
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].checked) {
                    checked = true;
                }
            }
            if (!checked) {
                swal({
                    title: 'Confirmation',
                    text: 'Are you sure to LOGOUT ?',
                    html: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    confirmButtonColor: '#d9534f',
                }, function () {
                    window.location.href = getLink
                });
                alert('Pilih Salah Satu');
            }
            return checked;
        }
    </script>

    <script>
        function check_uncheck_checkbox(isChecked) {
            if (isChecked) {
                $('input[name="checkbox[]"]').each(function () {
                    this.checked = true;
                });
            } else {
                $('input[name="checkbox[]"]').each(function () {
                    this.checked = false;
                });
            }
        }

        function check_uncheck_checkbox_sub(isChecked) {
            if (isChecked) {
                $('input[name="checkboxsub[]"]').each(function () {
                    this.checked = true;
                });
            } else {
                $('input[name="checkboxsub[]"]').each(function () {
                    this.checked = false;
                });
            }
        }
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objENGinboxz').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": 'No entries to show',
                    "processing": 'Loading...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>
    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAinboxz').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>
    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objENGplaner').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": 'No entries to show',
                    "processing": 'Loading...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>
    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAplaner').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAkppoff').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAclient').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAvendor').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAmsmgrp').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAmdlklu').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAaddkjs').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAedtkjs').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAklucod').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAedtngr').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objENGsentzz').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [],
                "language": {
                    "search": '<font style="color: #800000; font-weight: bold">Search</font><div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search fa-fw"></i></span></div>',
                    "lengthMenu": '<font style="color: #800000; font-weight: bold">View</font>&nbsp;&emsp;_MENU_',
                    "info": '<font style="color: #800000; font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="color: #800000; font-weight: bold">_END_</font>&nbsp;of&nbsp;<font style="color: #800000; font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    "infoFiltered": '<font style="color: #0000FF">(filtered from _MAX_ total entries)</font>',
                    "zeroRecords": '<font style="color: #ff0000">No matching records found</font>',
                    "infoEmpty": 'No entries to show',
                    "processing": 'Loading...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>
    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAsentzz').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINApphlst').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINApphsmr').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search"></i></span></div></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
                "scrollX": true,
                "fixedColumns": true,
                "fixedColumns": {leftColumns: 2},
                "scrollCollapse": true,
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINApphdes').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group">_INPUT_<span class="input-group-addon"><i class="fas fa-search"></i></span></div></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
                "scrollX": true,
                "fixedColumns": true,
                "fixedColumns": {leftColumns: 2},
                "scrollCollapse": true,
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#example').DataTable({
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 2
                }
            });
        });

    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINApphviw').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });</script>


    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAcXXvit').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAcXXvib').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAcXXvid').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAc21sdt').DataTable({
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
                "scrollX": true,
                "scrollCollapse": true,
                "fixedColumns": true,
                "fixedColumns": {leftColumns: 2, rightColumns: 0},
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAsumde2').DataTable({
                "dom": '<"pull-left"fl>tip',
                "searching": false,
                "info": false,
                "paging": false,
                "scrollX": true,
                "scrollCollapse": true,
                "fixedColumns": true,
                "fixedColumns": {leftColumns: 2, rightColumns: 0},
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAc212st').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#_objINAemplok').DataTable({
                "processing": true,
                "serverSide": false,
                "ordering": false,
                "serverMethod": "GET",
                "displayLength": 5,
                "lengthMenu": [[5, 15, 30, 45, 100], [5, 15, 30, 45, 100]],
                "sorting": [], "autoWidth": false,
                "language": {
                    "search": '<font style="font-weight: bold">Cari</font>&ensp;&ensp;<div class="input-group"><div class="input-group addon">_INPUT_<span class="input-group-addon" style="background-color: #f5f5f5;color: #a9a9a9"><i class="fas fa-search-minus fa-fw fa-lg"></i></span></div></div>',
                    "lengthMenu": '<font style="font-weight: bold">Lihat</font>&ensp;&ensp;_MENU_&nbsp;<div><br></div>',
                    "info": '<font style="font-weight: bold">_START_</font>&nbsp;-&nbsp;<font style="font-weight: bold">_END_</font>&nbsp;dari&nbsp;<font style="font-weight: bold">_TOTAL_</font>',
                    "paginate":
                            {
                                "previous": '<i class="fas fa-arrow-left"></i>',
                                "next": '<i class="fas fa-arrow-right"></i>'
                            },
                    'sInfoFiltered': '<font>(terfilter dari _MAX_ total data)</font>',
                    "zeroRecords": '<font style="color: #ff0000">Tidak ditemukan data yang cocok</font>',
                    "infoEmpty": 'Tidak ada data untuk ditampilkan',
                    "processing": 'Pemuatan...',
                },
                "dom": '<"pull-left"fl>tip',
            });
        });
    </script>

    <script>
        function _funANGKAZ(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>


    <script type="text/javascript">
        $(function () {
            $('#_finFSKTZZ1').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'en-gb'
            });
            $('#_finFDATEZ2').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'id'
            });
            $('#_edtFDATEZ1').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'en-gb'
            });
            $('#_edtFDATEZ2').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'id'
            });
            $('#_rptFDTEST1').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'en-gb'
            });
            $('#_rptFDTEST2').datetimepicker({
                format: 'DD/MMM/YYYY',
                locale: 'id'
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.aimz-disable').block({message: null});
        });
    </script>

    <script>
        function _fGETCheKe1() {
            var _varCHKBOX = document.getElementsByName("_objCHKBO1");
            var _varCENTNG = "";
            for (var i = 0; i < _varCHKBOX.length; i++) {
                if (_varCHKBOX[i].checked) {
                    _varCENTNG = _varCENTNG + _varCHKBOX[i].value + "";
                } else {
                    _varCENTNG = _varCENTNG + "0";
                }
            }
            document.getElementById("_objFCATGR1").value = _varCENTNG.replace(/,\s*$/, "");
        }
    </script>

    <script>
        function _fGETCheKe2() {
            var _varCHKBOX = document.getElementsByName("_objCHKBO2");
            var _varCENTNG = "";
            for (var i = 0; i < _varCHKBOX.length; i++) {
                if (_varCHKBOX[i].checked) {
                    _varCENTNG = _varCENTNG + _varCHKBOX[i].value + "";
                } else {
                    _varCENTNG = _varCENTNG + "0";
                }
            }
            document.getElementById("_objFCATGR2").value = _varCENTNG.replace(/,\s*$/, "");
        }
    </script>

    <script type="text/javascript">
        $('.input-group.date').datepicker({
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            orientation: "bottom"
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.sk_tmbviwdoc').on("click", function () {
                var _varBASEURL = '<?php echo base_url(); ?>';
                var _varFDOCUMN = this.id;
                var _varFSTRLOW = _varFDOCUMN.toLowerCase();
                var _varFSTREXS = _varFSTRLOW.search(".pdf");

                if (_varFSTREXS > 0) {
                    $("#IsiModal").html('<iframe src="' + _varBASEURL + 'assets/mins/doc/' + _varFDOCUMN + '" width="550" height="400" class="center rounded"></iframe>');
                } else {
                    $("#IsiModal").html('<img src="' + _varBASEURL + 'assets/mins/doc/' + _varFDOCUMN + '" class="center rounded">');
                }

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sk_tmbupdpay').on("click", function () {
                var _varBASEURL = '<?php echo base_url(); ?>';
                var _varFDOCUMN = this.id;
                $("#KontenModal").html(_varFDOCUMN);
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.sk_viwdocpay').on("click", function () {
                var _varBASEURL = '<?php echo base_url(); ?>';
                var _varFDOCUMN = this.id;
                var _varFSTRLOW = _varFDOCUMN.toLowerCase();
                var _varFSTREXS = _varFSTRLOW.search(".pdf");

                if (_varFSTREXS > 0) {
                    $("#IsiModal").html('<iframe src="' + _varBASEURL + 'assets/mins/pay/' + _varFDOCUMN + '" width="550" height="400" class="center rounded"></iframe>');
                } else {
                    $("#IsiModal").html('<img src="' + _varBASEURL + 'assets/mins/pay/' + _varFDOCUMN + '" class="center rounded">');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sk_viwdocrpt').on("click", function () {
                var _varBASEURL = '<?php echo base_url(); ?>';
                var _varFDOCUMN = this.id;
                var _varFSTRLOW = _varFDOCUMN.toLowerCase();
                var _varFSTREXS = _varFSTRLOW.search(".pdf");

                if (_varFSTREXS > 0) {
                    $("#IsiModal").html('<iframe src="' + _varBASEURL + 'assets/mins/doc/' + _varFDOCUMN + '" width="550" height="400" class="center rounded"></iframe>');
                } else {
                    $("#IsiModal").html('<img src="' + _varBASEURL + 'assets/mins/doc/' + _varFDOCUMN + '" class="center rounded">');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sk_viwlappjk').on("click", function () {
                var _varBASEURL = '<?php echo base_url(); ?>';
                var _varFDOCUMN = this.id;
                $("#IsiModal").html('<img src="' + _varBASEURL + 'assets/mins/doc/' + _varFDOCUMN + '" class="center rounded">');
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.sk_viwupdpay').on("click", function (e) {
                e.preventDefault();
                var _self = $(this);

                var myBookId = _self.data('id');
                $("#_oFRECNMB").val(myBookId);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sk_viwkompen').on("click", function (e) {
                e.preventDefault();
                var _self = $(this);

                var myBookId = _self.data('id');
                $("#_oFRECNMB").val(myBookId);
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('.sk_viwkomp00').on("click", function (e) {
                e.preventDefault();
                var _self = $(this);

                var myBookId = _self.data('id');
                $("#_oFRECNMB").val(myBookId);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.sk_viwupddoc').on("click", function (e) {
                e.preventDefault();
                var _self = $(this);

                var myBookId = _self.data('id');
                $("#_xFRECNMB").val(myBookId);
            });
        });
    </script>

    <script type="text/javascript">
        function sk_funFCATGRY()
        {
            if (document.getElementById("_finFCATGRY").value == 'nonkpp') {
                document.getElementById("_finFSEQNMB").disabled = true;
                document.getElementById("_finFFULNME").innerHTML = 'Nama Kantor Instansi <font color="#ff0000">&nbsp;*</font>&nbsp;:';
            } else {
                document.getElementById("_finFSEQNMB").disabled = false;
                document.getElementById("_finFFULNME").innerHTML = 'Nama Kantor Pelayanan Pajak <font color="#ff0000">&nbsp;*</font>&nbsp;:';
            }
        }
    </script>
    <script type="text/javascript">
        function sk_funFCATGR2()
        {
            if (document.getElementById("_edtFCATGRY").value == 'nonkpp') {
                document.getElementById("_edtFSEQNMB").disabled = true;
                document.getElementById("_edtFFULNME").innerHTML = 'Nama Kantor Instansi <font color="#ff0000">&nbsp;*</font>&nbsp;:';
            } else {
                document.getElementById("_edtFSEQNMB").disabled = false;
                document.getElementById("_edtFFULNME").innerHTML = 'Nama Kantor Pelayanan Pajak <font color="#ff0000">&nbsp;*</font>&nbsp;:';
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.sk_oldtxt_edit').click(function () {
                $('.sk_newtxt_edit').hide();
                $(this).next('.sk_newtxt_edit').show().focus();
                $(this).hide();
            });

            $('.sk_newtxt_edit').focusout(function (e) {

                $(this).hide();

                $(this).prev('.sk_oldtxt_edit').show();
                $(this).prev('.sk_oldtxt_edit').text(value);
            });


            $('.sk_newtxt_edit').keydown(function (e) {
                var code = e.keyCode || e.which;

                if (code === 27) {

                    $(this).hide();
                    $(this).prev('.sk_oldtxt_edit').show();
                    $(this).prev('.sk_oldtxt_edit').text(value);
                }

                if (code === 13) {

                    var edit_id = $(this).data('id');
                    var fieldname = $(this).data('field');
                    var value = $(this).val();

                    if (value == "") {
                        value = "--- harus isi/tidak kosong ---"
                    } else {
                        value = value;
                    }

                    var element = this;

                    $.ajax({

                        url: '<?= base_url(), "NOCUSERZZ/cfcACTUSR021/actupd/pjkpay"; ?>',
                        type: 'post',
                        data: {
                            field: fieldname,
                            value: value,
                            id: edit_id
                        },
                        success: function (response) {

                            $(element).hide();

                            $(element).prev('.sk_oldtxt_edit').show();
                            $(element).prev('.sk_oldtxt_edit').text(value);
                        }
                    });
                    location.reload();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.sk_oldtxt_edit2').click(function () {
                $('.sk_newtxt_edit2').hide();
                $(this).next('.sk_newtxt_edit2').show().focus();
                $(this).hide();
            });

            $('.sk_newtxt_edit2').focusout(function (e) {

                $(this).hide();

                $(this).prev('.sk_oldtxt_edit2').show();
                $(this).prev('.sk_oldtxt_edit2').text(value);
            });


            $('.sk_newtxt_edit2').keydown(function (e) {
                var code = e.keyCode || e.which;

                if (code === 27) {

                    $(this).hide();

                    $(this).prev('.sk_oldtxt_edit2').show();
                    $(this).prev('.sk_oldtxt_edit2').text(value);
                }

                if (code === 13) {

            var edit_id = $(this).data('id');
                    var fieldname = $(this).data('field');
                    var value = $(this).val();

                    if (value == "") {
                        value = "--- harus isi/tidak kosong ---"
                    } else {
                        value = value;
                    }

                    var element = this;

                    $.ajax({

                        url: '<?= base_url(), "NOCUSERZZ/cfcACTUSR021/actup2/pjkpay"; ?>',
                        type: 'post',
                        data: {
                            field: fieldname,
                            value: value,
                            id: edit_id
                        },
                        success: function (response) {

                            $(element).hide();

                            $(element).prev('.sk_oldtxt_edit2').show();
                            $(element).prev('.sk_oldtxt_edit2').text(value);
                        }
                    });
                    location.reload();
                }
            });
        });
    </script>

    <script type="text/javascript">

        $(function () {
            $('#sk_grafik_lingkaran').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    headerFormat: '<span style="color:#000000"><b>{point.key}</b></span><table>',
                    pointFormat: '<b> {point.percentage:.0f}%</b>',
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false,
                        },
                        showInLegend: true
                    }
                },
                colors: ['#000080', '#ff8400', '#FFA303'],
                series: [{
                        type: 'pie',
                        name: '',
                        
                        data: [<?php

                            if (count($_tblCHART1) > 0) {
                                foreach ($_tblCHART1 as $data) {
                                    if ($data->FSTATUS == '1') {
                                        $_oJdl = 'Open';
                                    } elseif ($data->FSTATUS == '2') {
                                        $_oJdl = 'Follow-Up';
                                    } elseif ($data->FSTATUS == '3') {
                                        $_oJdl = 'Closed';
                                    }
                                    echo "['" . $_oJdl . "'," . $data->FJUMLAH . "],\n";
                                }
                            } else {
                                $_oJdl[0] = 'Open';
                                $_oJdl[1] = 'Follow-Up';
                                $_oJdl[2] = 'Closed';
                                for ($i = 0; $i <= 2; $i++) {
                                    echo "['" . $_oJdl[$i] . "'," . 0 . "],\n";
                                }
                            }
                            ?>
                        ],
                        size: '80%',
                        innerSize: '70%'
                    }],
                credits: {
                    enabled: false
                }
            });
        });
    </script>

    <script type="text/javascript">

        $(function () {
            $('#sk_grafik_batang').highcharts({

                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'Mei',
                        'Jun',
                        'Jul',
                        'Ags',
                        'Sep',
                        'Okt',
                        'Nov',
                        'Des'
                    ],
                    crosshair: true
                },
                yAxis: {
                    visible: false,
                    min: 0,
                    title: false
                },
                tooltip: {
                    headerFormat: '<span style="color:#000000"><b>{point.key}</b></span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding-right:5px"><b>{series.name}</b></td>' +
                            '<td style="color:{series.color};"padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                
                colors: ['#000080', '#0000FF', '#FF8400', '#FFA303'],
                series: [{
                        name: 'Proses',
                        data: [<?php
                            if (count($_tblCHART2) > 0) {
                                foreach ($_tblCHART2 as $data) {
                                    if ($data->FWRKALS == 'ac1') {
                                        $_oJan = $data->JAN;
                                        $_oFeb = $data->FEB;
                                        $_oMrt = $data->MRT;
                                        $_oApr = $data->APR;
                                        $_oMei = $data->MEI;
                                        $_oJun = $data->JUN;
                                        $_oJul = $data->JUL;
                                        $_oAgs = $data->AGS;
                                        $_oSep = $data->SEP;
                                        $_oOkt = $data->OKT;
                                        $_oNov = $data->NOV;
                                        $_oDes = $data->DES;

                                        echo $_oJan . "," . $_oFeb . "," . $_oMrt . "," . $_oApr . "," . $_oMei . "," . $_oJun . "," . $_oJul . "," . $_oAgs . "," . $_oSep . "," . $_oOkt . "," . $_oNov . "," . $_oDes;
                                    }
                                }
                            }
                            ?>]

                    }, {
                        name: 'Bayar',
                        data: [<?php
                            if (count($_tblCHART2) > 0) {
                                foreach ($_tblCHART2 as $data) {
                                    if ($data->FWRKALS == 'ac2') {
                                        $_oJan = $data->JAN;
                                        $_oFeb = $data->FEB;
                                        $_oMrt = $data->MRT;
                                        $_oApr = $data->APR;
                                        $_oMei = $data->MEI;
                                        $_oJun = $data->JUN;
                                        $_oJul = $data->JUL;
                                        $_oAgs = $data->AGS;
                                        $_oSep = $data->SEP;
                                        $_oOkt = $data->OKT;
                                        $_oNov = $data->NOV;
                                        $_oDes = $data->DES;

                                        echo $_oJan . "," . $_oFeb . "," . $_oMrt . "," . $_oApr . "," . $_oMei . "," . $_oJun . "," . $_oJul . "," . $_oAgs . "," . $_oSep . "," . $_oOkt . "," . $_oNov . "," . $_oDes;
                                    }
                                }
                            }
                            ?>]

                    }, {
                        name: 'Lapor',
                        data: [<?php
                            if (count($_tblCHART2) > 0) {
                                foreach ($_tblCHART2 as $data) {
                                    if ($data->FWRKALS == 'ac3') {
                                        $_oJan = $data->JAN;
                                        $_oFeb = $data->FEB;
                                        $_oMrt = $data->MRT;
                                        $_oApr = $data->APR;
                                        $_oMei = $data->MEI;
                                        $_oJun = $data->JUN;
                                        $_oJul = $data->JUL;
                                        $_oAgs = $data->AGS;
                                        $_oSep = $data->SEP;
                                        $_oOkt = $data->OKT;
                                        $_oNov = $data->NOV;
                                        $_oDes = $data->DES;

                                        echo $_oJan . "," . $_oFeb . "," . $_oMrt . "," . $_oApr . "," . $_oMei . "," . $_oJun . "," . $_oJul . "," . $_oAgs . "," . $_oSep . "," . $_oOkt . "," . $_oNov . "," . $_oDes;
                                    }
                                }
                            }
                            ?>]

                    }, {
                        name: 'Arsip',
                        data: [<?php
                            if (count($_tblCHART2) > 0) {
                                foreach ($_tblCHART2 as $data) {
                                    if ($data->FWRKALS == 'ac4') {
                                        $_oJan = $data->JAN;
                                        $_oFeb = $data->FEB;
                                        $_oMrt = $data->MRT;
                                        $_oApr = $data->APR;
                                        $_oMei = $data->MEI;
                                        $_oJun = $data->JUN;
                                        $_oJul = $data->JUL;
                                        $_oAgs = $data->AGS;
                                        $_oSep = $data->SEP;
                                        $_oOkt = $data->OKT;
                                        $_oNov = $data->NOV;
                                        $_oDes = $data->DES;

                                        echo $_oJan . "," . $_oFeb . "," . $_oMrt . "," . $_oApr . "," . $_oMei . "," . $_oJun . "," . $_oJul . "," . $_oAgs . "," . $_oSep . "," . $_oOkt . "," . $_oNov . "," . $_oDes;
                                    }
                                }
                            }
                            ?>]

                    }],
                credits: {
                    enabled: false
                }


            });
        });
    </script>

</body>
</html>