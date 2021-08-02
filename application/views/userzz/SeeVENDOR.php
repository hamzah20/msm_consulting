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
    switch ($_swiUSR005) {
        case "vndlst" :
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndadd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR005/expxls'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export Vendor (Lain-Lain) Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data Vendor (Lain-Lain)';
                            } else {
                                echo 'Export Format/Data Vendor (Lain-Lain)';
                            };
                            ?>" style="display: none; background-color: #5cb85c"><font style="color: #ffffff;font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a href="#" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Import Vendor (Lain-Lain) Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Import Data Vendor (Lain-Lain)';
                            } else {
                                echo 'Import Data Vendor (Lain-Lain)';
                            };
                            ?>" style="display: none; background-color:#d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
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
                                    echo '_objENGvendor';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAvendor';
                                } else {
                                    echo '_objINAvendor';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Vendor (Others) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Vendor (Lain-Lain)';
                                                } else {
                                                    echo 'Nama Vendor (Lain-Lain)';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Telepon';
                                                } else {
                                                    echo 'Telepon';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Faximile';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Faksimile';
                                                } else {
                                                    echo 'Faksimile';
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
                                        foreach ($_tblVENDOR as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap;  width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 50%">
                                                    <?php
                                                    if (!empty($_oRow['FFULNME'])) {
                                                        echo $_oRow['FFULNME'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FTELPON'])) {
                                                        if (strlen($_oRow['FTELPON']) <= 25) {
                                                            echo $_oRow['FTELPON'];
                                                        } else {
                                                            echo substr($_oRow['FTELPON'], 0, 25) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FFAXIML'])) {
                                                        if (strlen($_oRow['FFAXIML']) <= 25) {
                                                            echo $_oRow['FFAXIML'];
                                                        } else {
                                                            echo substr($_oRow['FFAXIML'], 0, 25) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 10%">
                                                    <?php
                                                    if (!empty($_oRow['FEMAILZ'])) {
                                                        if (strlen($_oRow['FEMAILZ']) <= 25) {
                                                            echo $_oRow['FEMAILZ'];
                                                        } else {
                                                            echo substr($_oRow['FEMAILZ'], 0, 25) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndviw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
        case "vndadd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndsve'; ?>" method="POST" class="form-horizontal">
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
                        //--- do nothing
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndlst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Vendor (Others) Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Vendor (Lain-Lain)';
                                        } else {
                                            echo 'No. Urut Vendor (Lain-Lain)';
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
                                    <label class="label-mins" id="_finFFULNME">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Vendor (Others) Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama Vendor (Lain-Lain)';
                                        } else {
                                            echo 'Nama Vendor (Lain-Lain)';
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
                                    <textarea rows="5" type="text" name="_finFADDRES" class="form-control" autofocus></textarea>
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
                                    <input type="text" name="_finFTELPON" class="form-control" autofocus>
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
                                    <input type="text" name="_finFFAXIML" class="form-control" autofocus>
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
                                    <input type="text" name="_finFEMAILZ" class="form-control" autofocus>
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
        case "vndsve" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "vndviw" :
            ?>
            <?php
            $_oFCODEZZ = $_tblVENDOR['0']['FCODEZZ'];
            $_oFFULNME = $_tblVENDOR['0']['FFULNME'];
            $_oFADDRES = $_tblVENDOR['0']['FADDRES'];
            $_oFTELPON = $_tblVENDOR['0']['FTELPON'];
            $_oFFAXIML = $_tblVENDOR['0']['FFAXIML'];
            $_oFEMAILZ = $_tblVENDOR['0']['FEMAILZ'];

            $_vndFRECNMB = $this->uri->segment(4);
            $_vndFCODEZZ = $this->uri->segment(5);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndlst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR005/vndedt/' . $_vndFRECNMB . '/' . $_vndFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vnddel/' . $_vndFRECNMB . '/' . $_vndFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Vendor (Others) Sequence Nmb.';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'No. Urut Vendor (Lain-Lain)';
                                            } else {
                                                echo 'No. Urut Vendor (Lain-Lain)';
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
                                                echo 'Vendor (Others) Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Vendor (Lain-Lain)';
                                            } else {
                                                echo 'Nama Vendor (Lain-Lain)';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFFULNME" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
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
                                        <textarea rows="5" type="text" name="_finCMPADR" class="form-control" autofocus readonly><?php
                                            echo str_replace("_n_", "\n", $_oFADDRES);
                                            ;
                                            ?>
                                        </textarea>
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
                                        <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFTELPON)) {
                                            echo $_oFTELPON;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
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
                                        <input type="text" name="_finFFAXIML" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFFAXIML)) {
                                            echo $_oFFAXIML;
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
                                </div>
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
        case "vndedt" :
            ?>
            <?php
            $_oFCODEZZ = $_tblVENDOR['0']['FCODEZZ'];
            $_oFFULNME = $_tblVENDOR['0']['FFULNME'];
            $_oFADDRES = $_tblVENDOR['0']['FADDRES'];
            $_oFTELPON = $_tblVENDOR['0']['FTELPON'];
            $_oFFAXIML = $_tblVENDOR['0']['FFAXIML'];
            $_oFEMAILZ = $_tblVENDOR['0']['FEMAILZ'];

            $_vndFRECNMB = $this->uri->segment(4);
            $_vndFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndupd/' . $_vndFRECNMB . '/' . $_vndFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR005/vndviw/' . $_vndFRECNMB . '/' . $_vndFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Vendor (Others) Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Vendor (Lain-Lain)';
                                                } else {
                                                    echo 'No. Urut Vendor (Lain-Lain)';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly oninvalid="<?php
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
                                                    echo 'Vendor (Others) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Vendor (Lain-Lain)';
                                                } else {
                                                    echo 'Nama Vendor (Lain-Lain)';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFFULNME" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFFULNME)) {
                                                echo $_oFFULNME;
                                            } else {
                                                echo '...';
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
                                            <textarea rows="5" type="text" name="_edtFADDRES" class="form-control" autofocus ><?php
                                                echo str_replace("_n_", "\n", $_oFADDRES);
                                                ;
                                                ?></textarea>
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
                                            <input type="text" name="_edtFTELPON" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
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
                                                    echo 'Faximile Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Faksimile';
                                                } else {
                                                    echo 'No. Faksimile';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFFAXIML" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFFAXIML)) {
                                                echo $_oFFAXIML;
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
                                                    echo 'Email';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Email';
                                                } else {
                                                    echo 'Email';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFEMAILZ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFEMAILZ)) {
                                                echo $_oFEMAILZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
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
        case "vndupd" :
            ?>
            note : PLANNER UPDATE
            <?php
            break;
        case "vnddel" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR005/vndlst') . '"}});});';
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