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
    switch ($_swiUSR022) {
        case "reglst" :
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
                            <a disabled href="#" role="button" class="btn btn-default btn-flat sk_button_modification" style="background-color: #ffffff"><font style="color: #cccccc; font-size: 17px"><i class="fas fa-chess-board fa-lg"></i></font></a>
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
                                    echo '_objENGkppoff';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAkppoff';
                                } else {
                                    echo '_objINAkppoff';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Date-Time Registration';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Tanggal-Jam Registrasi';
                                                } else {
                                                    echo 'Tanggal-Jam Registrasi';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama';
                                                } else {
                                                    echo 'Nama';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Perusahaan/Lembaga';
                                                } else {
                                                    echo 'Perusahaan/Lembaga';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Email';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Email';
                                                } else {
                                                    echo 'Email';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblREGTRA as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 20%">
                                                    <?php
                                                    if (!empty($_oRow['FREGDTM'])) {
                                                        echo $this->sklibrfnc->_fSETDteInd(substr($_oRow['FREGDTM'], 0, 8)) . ' ' . substr($_oRow['FREGDTM'], 8, 5);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 20%">
                                                    <?php
                                                    if (!empty($_oRow['FUSERNM'])) {
                                                        echo $_oRow['FUSERNM'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>                                                
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 20%">
                                                    <?php
                                                    if (!empty($_oRow['FCOMPNY'])) {
                                                        echo $_oRow['FCOMPNY'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>  
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 20%">
                                                    <?php
                                                    if (!empty($_oRow['FEMAILZ'])) {
                                                        if (strlen($_oRow['FEMAILZ']) <= 30) {
                                                            echo $_oRow['FEMAILZ'];
                                                        } else {
                                                            echo substr($_oRow['FEMAILZ'], 0, 30) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/regviw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
        case "regadd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR004/kppsve'; ?>" method="POST" class="form-horizontal">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->like('FCODEZZ', 'PRF' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'PRF' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/reglst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Profile Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode Profil';
                                        } else {
                                            echo 'Kode Profil';
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
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Category';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kategori';
                                            } else {
                                                echo 'Kategori';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" id="_finFSEQNMB" name="_finFCATGRY" class="form-control" readonly value="<?php echo 'KPP'; ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'KPP Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode KPP';
                                            } else {
                                                echo 'Kode KPP';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" id="_finFSEQNMB" name="_finFSEQNMB"  data-masked-input="999" class="form-control" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please fill out this field')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                        } else {
                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                        };
                                        ?>" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="label-mins" id="_finFFULNME">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Service Office Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Kantor Pelayanan Pajak';
                                            } else {
                                                echo 'Nama Kantor Pelayanan Pajak';
                                            }
                                            ?>
                                            <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" name="_finFFULNME" class="form-control" autofocus required oninvalid="<?php
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
                                <div>
                                    <label class="sk_label_modification"><?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Address';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Alamat';
                                        } else {
                                            echo 'Alamat';
                                        }
                                        ;
                                        ?>&nbsp;:
                                    </label>
                                    <textarea rows="5" type="text" name="_finFADDRES" class="form-control"></textarea>
                                </div>

                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Telephone Numb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Telepon';
                                        } else {
                                            echo 'No. Telepon';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFTELPON" class="form-control">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Faximile Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Faksimile';
                                        } else {
                                            echo 'No. Faksimile';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFFAXIML" class="form-control">
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
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFEMAILZ" class="form-control">
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
        case "regsve" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "regviw" :
            ?>
            <?php
            $_oFRECNMB = $_tblREGTRA['0']['FRECNMB'];
            $_oFCODEZZ = $_tblREGTRA['0']['FCODEZZ'];
            $_oFUSERNM = $_tblREGTRA['0']['FUSERNM'];
            $_oFCOMPNY = $_tblREGTRA['0']['FCOMPNY'];
            $_oFREGDTM = $_tblREGTRA['0']['FREGDTM'];
            $_oFNOTEZZ = $_tblREGTRA['0']['FNOTEZZ'];
            $_oFPHONEZ = $_tblREGTRA['0']['FPHONEZ'];
            $_oFEMAILZ = $_tblREGTRA['0']['FEMAILZ'];
            $_oFSTATUS = $_tblREGTRA['0']['FSTATUS'];

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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/reglst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR022/regedt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/regdel/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                               ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"> <i class="far fa-trash-alt fa-fw fa-lg"></i></font>
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
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Prospective Clients Registration Sequence Nmb';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'No. Urut Registrasi Calon Klien';
                                    } else {
                                        echo 'No. Urut Registrasi Calon Klien';
                                    };
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFCODEZZ)) {
                                    echo $_oFCODEZZ;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Date-Time Registration';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Tanggal-Jam Registrasi';
                                    } else {
                                        echo 'Tanggal-Jam Registrasi';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFREGDTM" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFREGDTM)) {
                                    echo $this->sklibrfnc->_fSETDteInd(substr($_oFREGDTM, 0, 8)) . ' ' . substr($_oFREGDTM, 8, 5);
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Name';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Nama';
                                    } else {
                                        echo 'Nama';
                                    };
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_viwFTELPON" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFUSERNM)) {
                                    echo $_oFUSERNM;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Company';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Perusahaan/Lembaga';
                                    } else {
                                        echo 'Perusahaan/Lembaga';
                                    };
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_viwFCOMPNY" class="form-control" readonly value="<?php
                                if (!empty($_oFCOMPNY)) {
                                    echo $_oFCOMPNY;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Telephone/Mobile';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Telepon/Seluler';
                                    } else {
                                        echo 'Telepon/Seluler';
                                    };
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_viwFPHONEZ" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFPHONEZ)) {
                                    echo $_oFPHONEZ;
                                } else {
                                    echo '...';
                                }
                                ?>">
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
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_viwFEMAILZ" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFEMAILZ)) {
                                    echo $_oFEMAILZ;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification"><?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Notes/Comments';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Catatan/Komentar';
                                    } else {
                                        echo 'Catatan/Komentar';
                                    }
                                    ;
                                    ?>&nbsp;:
                                </label>
                                <textarea rows="3" type="text" name="_viwFADDRES" class="form-control" autofocus readonly><?php
                                    echo str_replace("_n_", "\n", $_oFNOTEZZ);
                                    ;
                                    ?>
                                </textarea>
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Status';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Status';
                                    } else {
                                        echo 'Status';
                                    };
                                    ?><font color="#000000">&nbsp;:</font>
                                </label>
                                <input type="text" name="_viwFSTATUS" class="form-control" readonly value="<?php
                                if (!empty($_oFSTATUS)) {
                                    if ($_oFSTATUS == '1') {
                                        echo 'Open';
                                    } else if ($_oFSTATUS == '2') {
                                        echo 'Follow-Up';
                                    } else if ($_oFSTATUS == '3') {
                                        echo 'Close';
                                    }
                                } else {
                                    echo '...';
                                }
                                ?>">
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
        case "regedt" :
            ?>
            <?php
            $_oFRECNMB = $_tblREGTRA['0']['FRECNMB'];
            $_oFCODEZZ = $_tblREGTRA['0']['FCODEZZ'];
            $_oFUSERNM = $_tblREGTRA['0']['FUSERNM'];
            $_oFCOMPNY = $_tblREGTRA['0']['FCOMPNY'];
            $_oFREGDTM = $_tblREGTRA['0']['FREGDTM'];
            $_oFNOTEZZ = $_tblREGTRA['0']['FNOTEZZ'];
            $_oFPHONEZ = $_tblREGTRA['0']['FPHONEZ'];
            $_oFEMAILZ = $_tblREGTRA['0']['FEMAILZ'];
            $_oFSTATUS = $_tblREGTRA['0']['FSTATUS'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/regupd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR022/regviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Prospective Clients Registration Sequence Nmb';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Registrasi Calon Klien';
                                        } else {
                                            echo 'No. Urut Registrasi Calon Klien';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFCODEZZ)) {
                                        echo $_oFCODEZZ;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Date-Time Registration';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tanggal-Jam Registrasi';
                                        } else {
                                            echo 'Tanggal-Jam Registrasi';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFREGDTM" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFREGDTM)) {
                                        echo $this->sklibrfnc->_fSETDteInd(substr($_oFREGDTM, 0, 8)) . ' ' . substr($_oFREGDTM, 8, 5);
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama';
                                        } else {
                                            echo 'Nama';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFTELPON" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFUSERNM)) {
                                        echo $_oFUSERNM;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Company';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Perusahaan/Lembaga';
                                        } else {
                                            echo 'Perusahaan/Lembaga';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFCOMPNY" class="form-control" readonly value="<?php
                                    if (!empty($_oFCOMPNY)) {
                                        echo $_oFCOMPNY;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Telephone/Mobile';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Telepon/Seluler';
                                        } else {
                                            echo 'Telepon/Seluler';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFPHONEZ" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFPHONEZ)) {
                                        echo $_oFPHONEZ;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
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
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFEMAILZ" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFEMAILZ)) {
                                        echo $_oFEMAILZ;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification"><?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Notes/Comments';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Catatan/Komentar';
                                        } else {
                                            echo 'Catatan/Komentar';
                                        }
                                        ;
                                        ?>&nbsp;:
                                    </label>
                                    <textarea rows="3" type="text" name="_viwFADDRES" class="form-control" autofocus readonly><?php
                                        echo str_replace("_n_", "\n", $_oFNOTEZZ);
                                        ;
                                        ?>
                                    </textarea>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Status';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status';
                                        } else {
                                            echo 'Status';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSTATUS" required  oninvalid="<?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo "this.setCustomValidity('Please select an item in the list')";
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                    } else {
                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                    };
                                    ?>" onchange="setCustomValidity('')">
                                        <option value="<?php echo $_oFSTATUS; ?>"><?php
                                            if ($_oFSTATUS == '1') {
                                                echo 'Open';
                                            } elseif ($_oFSTATUS == '2') {
                                                echo 'Follow-Up';
                                            } elseif ($_oFSTATUS == '3') {
                                                echo 'Closed';
                                            };
                                            ?></option>
                                        <option value="1">Open</option>
                                        <option value="2">Follow-Up</option>
                                        <option value="3">Closed</option>
                                    </select>
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
        case "regupd" :
            ?>
            note : Update > Kantor Pelayanan Pajak
            <?php
            break;
        case "regdel" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR022/reglst') . '"}});});';
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