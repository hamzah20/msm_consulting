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
    switch ($_swiUSR016) {
        case "kjslst" :
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjsadd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR016/expxls'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export KJS Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data KJS';
                            } else {
                                echo 'Export Format/Data KJS';
                            };
                            ?>" style="display: none; background-color: #5cb85c"><font style="color: #ffffff;font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a href="#" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Import KJS Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Import Data KJS';
                            } else {
                                echo 'Import Data KJS';
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
                                                    echo 'Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode';
                                                } else {
                                                    echo 'Kode';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Jenis Setoran';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Jenis Setoran';
                                                } else {
                                                    echo 'Jenis Setoran';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblKJSTOR as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap; width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <?php
                                                    if (!empty($_oRow['FKJSCOD'])) {
                                                        echo $_oRow['FKJSCOD'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 70%">
                                                    <?php
                                                    if (!empty($_oRow['FJNSSTR'])) {
                                                        if (strlen($_oRow['FJNSSTR']) >= 75) {
                                                            echo substr($_oRow['FJNSSTR'], 0, 75) . '<font style="color: #ff0000">...</font>';
                                                        } else if ((strlen($_oRow['FJNSSTR']) > 0) && (strlen($_oRow['FJNSSTR']) < 75)) {
                                                            echo substr($_oRow['FJNSSTR'], 0, 75);
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjsviw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
        case "kjsadd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjssve'; ?>" method="POST" class="form-horizontal">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tkjstor');
                $this->db->like('FCODEZZ', 'KJS' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'KJS' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjslst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Type of Deposit Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Jenis Setoran';
                                        } else {
                                            echo 'No. Urut Jenis Setoran';
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
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Type of Deposit Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode Jenis Setoran';
                                        } else {
                                            echo 'Kode Jenis Setoran';
                                        }
                                        ?>
                                        <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFKJSCOD" class="form-control" required oninvalid="<?php
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
                                            echo 'Type of Deposit Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama Jenis Setoran';
                                        } else {
                                            echo 'Nama Jenis Setoran';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFJNSSTR" class="form-control" autofocus>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Label';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Label';
                                        } else {
                                            echo 'Label';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFLABELZ" class="form-control" autofocus>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Rate';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tarif';
                                        } else {
                                            echo 'Tarif';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFTARIFZ" class="form-control" autofocus>
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
        case "kjssve" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "kjsviw" :
            ?>
            <?php
            $_oFRECNMB = $_tblKJSTOR['0']['FRECNMB'];
            $_oFCODEZZ = $_tblKJSTOR['0']['FCODEZZ'];
            $_oFKJSCOD = $_tblKJSTOR['0']['FKJSCOD'];
            $_oFJNSPJK = $_tblKJSTOR['0']['FJNSPJK'];
            $_oFJNSSTR = $_tblKJSTOR['0']['FJNSSTR'];
            $_oFLABELZ = $_tblKJSTOR['0']['FLABELZ'];
            $_oFTARIFZ = $_tblKJSTOR['0']['FTARIFZ'];

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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjslst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR016/kjsedt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjsdel/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                                        echo 'Type of Deposit Sequence Nmb.';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'No. Urut Jenis Setoran';
                                    } else {
                                        echo 'No. Urut Jenis Setoran';
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
                                <label class="label-mins">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Type of Deposit Code';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Kode Jenis Setoran';
                                    } else {
                                        echo 'Kode Jenis Setoran';
                                    }
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFKLUCOD" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFKJSCOD)) {
                                    echo $_oFKJSCOD;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Type of Deposit Name';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Nama Jenis Setoran';
                                    } else {
                                        echo 'Nama Jenis Setoran';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFJNSSTR" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFJNSSTR)) {
                                    echo $_oFJNSSTR;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Label';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Label';
                                    } else {
                                        echo 'Label';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFLABELZ" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFLABELZ)) {
                                    echo $_oFLABELZ;
                                } else {
                                    echo '...';
                                }
                                ?>">
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Rate';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Tarif';
                                    } else {
                                        echo 'Tarif';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <input type="text" name="_viwFTARIFZ" class="form-control" autofocus readonly value="<?php
                                if (!empty($_oFTARIFZ)) {
                                    echo $_oFTARIFZ . ' %';
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
        case "kjsedt" :
            ?>
            <?php
            $_oFRECNMB = $_tblKJSTOR['0']['FRECNMB'];
            $_oFCODEZZ = $_tblKJSTOR['0']['FCODEZZ'];
            $_oFKJSCOD = $_tblKJSTOR['0']['FKJSCOD'];
            $_oFJNSSTR = $_tblKJSTOR['0']['FJNSSTR'];
            $_oFLABELZ = $_tblKJSTOR['0']['FLABELZ'];
            $_oFTARIFZ = $_tblKJSTOR['0']['FTARIFZ'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjsupd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjsviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Type of Deposit Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Jenis Setoran';
                                        } else {
                                            echo 'No. Urut Jenis Setoran';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFCODEZZ" class="form-control" readonly value="<?php
                                    if (!empty($_oFCODEZZ)) {
                                        echo $_oFCODEZZ;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Type of Deposit Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode Jenis Setoran';
                                        } else {
                                            echo 'Kode Jenis Setoran';
                                        }
                                        ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFKJSCOD" class="form-control" required value="<?php
                                    if (!empty($_oFKJSCOD)) {
                                        echo $_oFKJSCOD;
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
                                            echo 'Type of Deposit Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama Jenis Setoran';
                                        } else {
                                            echo 'Nama Jenis Setoran';
                                        };
                                        ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFJNSSTR" class="form-control" required value="<?php
                                    if (!empty($_oFJNSSTR)) {
                                        echo $_oFJNSSTR;
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
                                            echo 'Label';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Label';
                                        } else {
                                            echo 'Label';
                                        };
                                        ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFLABELZ" class="form-control" required value="<?php
                                    if (!empty($_oFLABELZ)) {
                                        echo $_oFLABELZ;
                                    } else {
                                        echo '';
                                    }
                                    ?>">
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Rate';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tarif';
                                        } else {
                                            echo 'Tarif';
                                        };
                                        ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_edtFTARIFZ" class="form-control" required value="<?php
                                    if (!empty($_oFTARIFZ)) {
                                        echo $_oFTARIFZ;
                                    } else {
                                        echo '';
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
            </form>
            <?php
            break;
        case "kjsupd" :
            ?>
            note : PLANNER UPDATE
            <?php
            break;
        case "kjsdel" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR016/kjslst') . '"}});});';
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