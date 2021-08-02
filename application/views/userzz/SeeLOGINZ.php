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
    <span><font color="<?php echo $_varICONCL; ?>"><i class="<?php echo $_varICONXX; ?>"></i></font><span class="text-black">&nbsp;&nbsp;<?php echo $_varMDL001 . $_varMDL002 . $_varMDL003 . $_varMDL004 . $_varMDL005; ?></span></span>
    <ol class="breadcrumb">
        <li><span class="text-red"><i class="fas fa-shield-alt text-sm"></i>&nbsp;
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'Access Level';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'Tingkat Akses';
                } else {
                    echo 'Tingkat Akses';
                };
                ?>&nbsp;:&nbsp;<font style="font-weight: bold"><?php echo $_objFUSRTYP; ?></font></span>&nbsp;&nbsp;
            <span>[&nbsp;<font style="color: #4db8ff"><i class="fas fa-calendar-alt"></i></font>&nbsp;<?php echo $this->sklibrfnc->_fSETDatInd($_oDat); ?>&nbsp;<font style="color: #4db8ff"><i class="fas fa-clock"></i></font>&nbsp;<span id="_objTMENOW"></span>&nbsp;]</span>
        </li>

    </ol>
</section>
<div style="height: 20px">
    <br>
</div>
<div style="height: 20px">
    <br>
</div>
<section class="content-header">
    <?php
    switch ($_swiLOGINZ) {
        case "keyviw" :
            ?>
            <?php
            $_oFRECNMB = $_tblLOGINZ['0']['FRECNMB'];
            $_oFEMPIDN = $_tblLOGINZ['0']['FEMPIDN'];
            $_oFATTIDN = $_tblLOGINZ['0']['FATTIDN'];
            $_oFUSRNME = $_tblLOGINZ['0']['FUSRNME'];
            $_oFKEYWRD = $_tblLOGINZ['0']['FKEYWRD'];
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                        <a href="<?= base_url(), 'nocUSERZZ/cfcACTLOGINZ/keyedt/' . $_oFRECNMB; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #fb8c00"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pen fa-fw"></i></font></a>
                        &nbsp;
                    </div>
                </div>
                <div class="box-body">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <div>    
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Employee-ID';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'ID-Pegawai';
                                } else {
                                    echo 'ID-Pegawai';
                                };
                                ?>
                                &nbsp;:</label>
                            <input type="text" name="_finSTACOD" class="form-control" autofocus readonly value="<?php
                            if (!empty($_oFEMPIDN)) {
                                echo $_oFEMPIDN;
                            } else {
                                echo '?';
                            }
                            ;
                            ?>">
                        </div>
                        <div>
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Presence-ID';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'ID-Presensi';
                                } else {
                                    echo 'ID-Presensi';
                                };
                                ?>
                                &nbsp;:</label>
                            <input type="text" name="_finSTADES" class="form-control" autofocus readonly value="<?php
                            if (!empty($_oFATTIDN)) {
                                echo $_oFATTIDN;
                            } else {
                                echo '?';
                            }
                            ;
                            ?>">
                        </div>
                        <a href="../employ/seeEMPLOY.php"></a>
                        <div>    
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Username';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Namapengguna';
                                } else {
                                    echo 'Namapengguna';
                                };
                                ?>
                                &nbsp;:</label>
                            <input type="text" name="_finSTACOD" class="form-control" autofocus readonly value="<?php
                            if (!empty($_oFUSRNME)) {
                                echo $_oFUSRNME;
                            } else {
                                echo '?';
                            }
                            ;
                            ?>">
                        </div>
                        <div>    
                            <label class="sk_label_modification">
                                <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Keyword';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Katakunci';
                                } else {
                                    echo 'Katakunci';
                                };
                                ?>
                                &nbsp;:</label>
                            <input type="password" name="_finSTACOD" class="form-control" autofocus readonly value="<?php
                            if (!empty($_oFKEYWRD)) {
                                echo $_oFKEYWRD;
                            } else {
                                echo '?';
                            }
                            ;
                            ?>">
                        </div>
                        <div style="height: 20px;">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;
        case "keyedt" :
            ?>
            <?php
            $_oFRECNMB = $_tblLOGINZ['0']['FRECNMB'];
            $_oFEMPIDN = $_tblLOGINZ['0']['FEMPIDN'];
            $_oFATTIDN = $_tblLOGINZ['0']['FATTIDN'];
            $_oFUSRNME = $_tblLOGINZ['0']['FUSRNME'];
            $_oFKEYWRD = $_tblLOGINZ['0']['FKEYWRD'];
            ?>
            <form action="<?php echo base_url(), 'nocUSERZZ/cfcACTLOGINZ/keyupd/' . $_oFRECNMB; ?>" method="POST" class="form-horizontal">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-left">
                            &nbsp;
                            <a href="<?php echo base_url(), 'nocUSERZZ/cfcACTLOGINZ/keyviw/' . $_oFRECNMB; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #0097ff"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-fw"></i></font></a>

                        </div>
                        <div class="pull-right">
                            <button type="submit" href="<?php echo base_url(), 'nocUSERZZ/cfcACTLOGINZ/keyupd/' . $_oFRECNMB; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>" style="background-color: #6cc644"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                            &nbsp;                        </div>
                    </div>
                    <div class="box-body">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Employee-ID';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'ID-Pegawai';
                                    } else {
                                        echo 'ID-Pegawai';
                                    }
                                    ?><font color="#000000">&nbsp;:</font></label>
                                <input type="text" name="_edtSTACOD" class="form-control" readonly value="<?php echo $_oFEMPIDN; ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Presence-ID';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'ID-Presensi';
                                    } else {
                                        echo 'ID-Presensi';
                                    }
                                    ?><font color="#000000">&nbsp;:</font></label>
                                <input type="text" name="_edtSTADES" class="form-control" readonly value="<?php echo $_oFATTIDN; ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Username';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Namapengguna';
                                    } else {
                                        echo 'Namapengguna';
                                    }
                                    ?><font color="#000000">&nbsp;:</font></label>
                                <input type="text" name="_edtUSRNME" class="form-control" readonly value="<?php echo $_oFUSRNME; ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Currently Keyword';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Katakunci Saat Ini';
                                    } else {
                                        echo 'Katakunci Saat Ini';
                                    }
                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:</label>
                                <input type="password" name="_edtCURKEY" class="form-control" required value="">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'New Keyword';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Katakunci Baru';
                                    } else {
                                        echo 'Katakunci Baru';
                                    }
                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:</label>
                                <input type="password" name="_edtNEWKEY" class="form-control" required value="">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Re-Type New Keyword';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Ketik-Ulang Katakunci Baru';
                                    } else {
                                        echo 'Ketik-Ulang Katakunci Baru';
                                    }
                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:</label>
                                <input type="password" name="_edtRETKEY" class="form-control" required value="">
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
        case "keyupd" :
            ?>
            <?php
            if ($_varALERTZ == 'true') {
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Keyword Changed</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyviw') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Katakunci Digantikan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyviw') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Katakunci Digantikan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyviw') . '"}});});';
                    echo '</script>';
                };
            } elseif ($_varALERTZ == 'false') {
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Empty Currently/New/Re-Type Keyword</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Katakunci Saat Ini #Salah</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Katakunci Saat Ini #Salah</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                };
            } elseif ($_varALERTZ == 'different') {
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>New Keyword Not Match</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Katakunci Baru Tidak Cocok</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Katakunci Baru Tidak Cocok</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('nocUSERZZ/cfcACTLOGINZ/keyedt') . '"}});});';
                    echo '</script>';
                };
            }
            ?>

            <?php
            break;
    }
    ?>
</section>