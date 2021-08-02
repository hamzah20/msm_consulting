<?php
$_oDat = date("Ymd");
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFUSRTYP = $this->session->FUSRTYP;

switch ($_sesFUSRTYP) {
    case 0 :
        $_objFUSRTYP = 'user';
        break;
    case 1 :
        $_objFUSRTYP = 'master';
        break;
    case 2 :
        $_objFUSRTYP = 'admin';
        break;
}
?>

<section class="content-header">
</section>

<section class="content">

    <div class="well well-sm sk_well_modification0" style="background-color: #80ffbf">
        <div class="pull-left">
            <font color="<?php echo $_varICONCL; ?>"><i class="<?php echo $_varICONXX; ?>"></i></font>&nbsp;&nbsp;<font style="font-size: 15px;"><?php echo $_varMDL001 . $_varMDL002 . $_varMDL003 . $_varMDL004 . $_varMDL005; ?></font>
        </div>
        <div class="pull-right">
            <i class="fas fa-shield-alt fa-fw"></i>
            <?php
            if ($_sesFLNGAGE == 'eng') {
                echo 'Access Level';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo 'Tingkat Akses';
            } else {
                echo 'Tingkat Akses';
            };
            ?>&nbsp;:&nbsp;<font style="font-size: 16px; font-weight: bold"><?php echo $_objFUSRTYP; ?></font>&nbsp;&nbsp;
            <span>[&nbsp;<font><i class="far fa-calendar fa-fw"></i></font><?php echo $this->sklibrfnc->_fSETDteInd($_oDat); ?>&nbsp;<font><i class="far fa-clock fa-fw"></i></font><span id="_objTMENOW"></span>&nbsp;]</span>

        </div>
        <div style="height: 20px;">
            <br>
        </div>
    </div>

    <?php
    switch ($_swiUSR015) {
        case "klulst" :
            ?>
            <div class="well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/kluadd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR015/expxls'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export KLU Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data KLU';
                            } else {
                                echo 'Export Format/Data KLU';
                            };
                            ?>" style="display: none; background-color: #5cb85c"><font style="color: #ffffff;font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a href="#" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Import KLU Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Import Data KLU';
                            } else {
                                echo 'Import Data KLU';
                            };
                            ?>" style="display: none; background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
                            </a>

                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div class="sk_table_modification2 table-responsive">
                                <table id="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '_objENGklucod';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAklucod';
                                } else {
                                    echo '_objINAklucod';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Kode KLU';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode KLU';
                                                } else {
                                                    echo 'Kode KLU';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nama KLU';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama KLU';
                                                } else {
                                                    echo 'Nama KLU';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblKLUSHA as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap; width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <?php
                                                    if (!empty($_oRow['FKLUCOD'])) {
                                                        echo $_oRow['FKLUCOD'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 70%">
                                                    <?php
                                                    if (!empty($_oRow['FDESCRP'])) {
                                                        echo $_oRow['FDESCRP'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/kluviw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat';
                                                    } else {
                                                        echo 'Lihat';
                                                    };
                                                    ?>"><font color="#ff0000"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "kluadd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/klusve'; ?>" method="POST" class="form-horizontal">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tklucde');
                $this->db->like('FCODEZZ', 'KLU' . $_oYea . $_oMon, 'after');
                $this->db->order_by('FCODEZZ', 'desc');
                $_quePROFLE = $this->db->get();

                if ($_quePROFLE->num_rows() > 0) {
                    $_varPROFLE = $_quePROFLE->result_array();
                    $_varCODEZZ = $_varPROFLE['0']['FCODEZZ'];

                    $_sCODEZZ = explode('-', $_varCODEZZ);
                    $_oCODEZZ = $_sCODEZZ[1];
                    $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                    $_oCODEXX = '';

                    if ($_oCODEZX <= 9) {
                        $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'KLU' . $_oYea . $_oMon . '-00001';
                };
                ?>
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/klulst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                <button onclick="" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Save';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Simpan';
                                } else {
                                    echo 'Simpan';
                                };
                                ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                            </div>
                        </div>
                    </div>
                    <hr class="sk_hr_modification0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="height: 20px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'KLU (Klasifikasi Lapangan Usaha) Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut KLU (Klasifikasi Lapangan Usaha)';
                                        } else {
                                            echo 'No. Urut KLU (Klasifikasi Lapangan Usaha)';
                                        };
                                        ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly oninvalid="<?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo "this.setCustomValidity('Please fill out this field')";
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                    } else {
                                        echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                    };
                                    ?>" oninput="setCustomValidity('')" value="<?php echo $_oCODEXX; ?>">
                                </div>
                                <div>
                                    <label class="label-mins" id="_finFKLUCOD">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'KLU (Klasifikasi Lapangan Usaha) Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode KLU (Klasifikasi Lapangan Usaha)';
                                        } else {
                                            echo 'Kode KLU (Klasifikasi Lapangan Usaha)';
                                        }
                                        ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFKLUCOD" class="form-control" data-masked-input="99999" autofocus required oninvalid="<?php
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
                                            echo 'KLU (Klasifikasi Lapangan Usaha) Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama KLU (Klasifikasi Lapangan Usaha)';
                                        } else {
                                            echo 'Nama KLU (Klasifikasi Lapangan Usaha)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFDESCRP" class="form-control" autofocus>
                                </div>
                                <div>
                                    <label class="sk_label_modification"><?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Uraian/Penjelasan';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Uraian/Penjelasan';
                                        } else {
                                            echo 'Uraian/Penjelasan';
                                        }
                                        ;
                                        ?>&nbsp;:
                                    </label>
                                    <textarea rows="5" type="text" name="_finFNOTEZZ" class="form-control" autofocus></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
            </form>
            <?php
            break;
        case "klusve" :
            ?>
            <?php
            if ($this->session->flashdata('true')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                };
                ?>
                <?php
            } else if ($this->session->flashdata('err')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Duplicate Record</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                };
                ?>
                <?php
            } else if ($this->session->flashdata('invald')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Incomplete Fill</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "kluviw" :
            ?>
            <?php
            $_oFRECNMB = $_tblKLUSHA['0']['FRECNMB'];
            $_oFCODEZZ = $_tblKLUSHA['0']['FCODEZZ'];
            $_oFKLUCOD = $_tblKLUSHA['0']['FKLUCOD'];
            $_oFDESCRP = $_tblKLUSHA['0']['FDESCRP'];
            $_oFNOTEZZ = $_tblKLUSHA['0']['FNOTEZZ'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <div class="well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/klulst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #292b2c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR015/kluedt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/kludel/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'aimz-alert-delete';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'aimz-alert-hapus';
                            } else {
                                echo 'aimz-alert-hapus';
                            };
                            ?>" title="<?php
                               if ($_sesFLNGAGE == 'eng') {
                                   echo 'Delete';
                               } elseif ($_sesFLNGAGE == 'ina') {
                                   echo 'Hapus';
                               } else {
                                   echo 'Hapus';
                               };
                               ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"> <i class="far fa-trash-alt fa-fw fa-lg"></i></font></a>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'KLU Code Sequence Nmb.';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'No. Urut Kode KLU';
                                    } else {
                                        echo 'No. Urut Kode KLU';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly oninvalid="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo "this.setCustomValidity('Please fill out this field')";
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                } else {
                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                };
                                ?>" oninput="setCustomValidity('')" value="<?php echo $_oFCODEZZ; ?>">
                            </div>
                            <div>
                                <label class="label-mins" id="_finFFULNME">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'KLU Code';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Kode KLU';
                                    } else {
                                        echo 'Kode KLU';
                                    }
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFKLUCOD" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFKLUCOD)) {
                                    echo $_oFKLUCOD;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'KLU Nama';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Nama KLU';
                                    } else {
                                        echo 'Nama KLU';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFDESCRP" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFDESCRP)) {
                                    echo $_oFDESCRP;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification"><?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Explanation';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Uraian/Penjelasan';
                                    } else {
                                        echo 'Uraian/Penjelasan';
                                    }
                                    ;
                                    ?>&nbsp;:
                                </label>
                                <textarea rows="5" type="text" name="_viwFNOTEZZ" class="form-control" autofocus readonly><?php
                                    echo str_replace("_n_", "\n", $_oFNOTEZZ);
                                    ;
                                    ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "kluedt" :
            ?>
            <?php
            $_oFRECNMB = $_tblKLUSHA['0']['FRECNMB'];
            $_oFCODEZZ = $_tblKLUSHA['0']['FCODEZZ'];
            $_oFKLUCOD = $_tblKLUSHA['0']['FKLUCOD'];
            $_oFDESCRP = $_tblKLUSHA['0']['FDESCRP'];
            $_oFNOTEZZ = $_tblKLUSHA['0']['FNOTEZZ'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/kluupd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/kluviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                <button onclick="" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Save';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Simpan';
                                } else {
                                    echo 'Simpan';
                                };
                                ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                            </div>
                        </div>
                    </div>
                    <hr class="sk_hr_modification0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="height: 20px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'KLU Code Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Kode KLU';
                                        } else {
                                            echo 'No. Urut Kode KLU';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly oninvalid="<?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo "this.setCustomValidity('Please fill out this field')";
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                    } else {
                                        echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                    };
                                    ?>" oninput="setCustomValidity('')" value="<?php
                                           if (!empty($_oFCODEZZ)) {
                                               echo $_oFCODEZZ;
                                           } else {
                                               echo '';
                                           };
                                           ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'KLU Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode KLU';
                                        } else {
                                            echo 'Kode KLU';
                                        }
                                        ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFKLUCOD" class="form-control" data-masked-input="99999" required value="<?php
                                    if (!empty($_oFKLUCOD)) {
                                        echo $_oFKLUCOD;
                                    } else {
                                        echo '';
                                    }
                                    ?>" oninvalid="<?php
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
                                            echo 'KLU Nama';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama KLU';
                                        } else {
                                            echo 'Nama KLU';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFDESCRP" class="form-control" autofocus value="<?php
                                    if (!empty($_oFDESCRP)) {
                                        echo $_oFDESCRP;
                                    } else {
                                        echo '';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification"><?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Explanation';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Uraian/Penjelasan';
                                        } else {
                                            echo 'Uraian/Penjelasan';
                                        }
                                        ;
                                        ?>&nbsp;:
                                    </label>
                                    <textarea rows="5" type="text" name="_edtFNOTEZZ" class="form-control" autofocus><?php
                                        echo str_replace("_n_", "\n", $_oFNOTEZZ);
                                        ;
                                        ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
            </form>
            <?php
            break;
        case "kluupd" :
            ?>
            note : PLANNER UPDATE
            <?php
            break;
        case "kludel" :
            ?>
            <div class="container-fluid">
                <?php
                if ($this->session->flashdata('true')) {
                    ?>
                    <?php
                    if ($_sesFLNGAGE == 'eng') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Deleted</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                    <?php
                } else if ($this->session->flashdata('err')) {
                    ?>
                    <?php
                    if ($_sesFLNGAGE == 'eng') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Record Cannot Delete</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR015/klulst') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
    }
    ?>
</section>