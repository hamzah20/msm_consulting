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
    switch ($_swiUSR006) {
        /* --- 1 : PRFLST --- */
        case "cmplst" :
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1dd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>

                            <!-- notes : fitur export direquest MSM untuk dihapus -->
                            <a href="#" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export Format/Data Client Profile';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data Profil Klien';
                            } else {
                                echo 'Export Format/Data Profil Klien';
                            };
                            ?>" style="display: none; background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <!-- notes : fitur import direquest MSM untuk dihapus -->
                            <a href="#" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Import Client Profile Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Import Data Profil Klien';
                            } else {
                                echo 'Import Data Profil Klien';
                            };
                            ?>" style="display: none; background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 10px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div class="sk_table_modification2 table-responsive">
                                <table id="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '_objENGcompny';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAcompny';
                                } else {
                                    echo '_objINAcompny';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr style="color: #f8f8f8; background-color: #4db8ff">
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company (Client) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Perusahaan (Klien)';
                                                } else {
                                                    echo 'Nama Perusahaan (Klien)';
                                                };
                                                ?>
                                            </th>
                                            
                                            <th class="text-center" style="white-space: nowrap" title="Nomor Pokok Wajib Pajak">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'NPWP';
                                                } else {
                                                    echo 'NPWP';
                                                };
                                                ?>
                                            </th>

                                            <th class="text-center" style="white-space: nowrap" title="Klasifikasi Lapangan Usaha">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'KLU';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'KLU';
                                                } else {
                                                    echo 'KLU';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblCMPLST as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap;  width: 0%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap;  width: 50%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                
                                                <td align="center" style="white-space: nowrap;  width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                                                        $_oFNPWPZZ = $_xFNPWPZZ[1];
                                                        echo substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 15%">
                                                    <?php echo $_oRow['FKLUZZZ']; ?>
                                                </td>
                                                <?php
                                                $_cmpFRECNMB = $_oRow['FRECNMB'];
                                                $_cmpFCODEZZ = $_oRow['FCODEZZ'];
                                                ?>

                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_main' ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat';
                                                    } else {
                                                        echo 'Lihat';
                                                    };
                                                    ?>"><font color="#ff0000"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                    </a>
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
            <div>
            </div>
            <?php
            /* --- 2 : PRFADD --- */
            break;
        case "cmp1dd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1ve'; ?>" method="POST" class="form-horizontal">
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
                    $_varCOMPNY = $_quePROFLE->result_array();
                    $_varCODEZZ = $_varCOMPNY['0']['FCODEZZ'];

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

                $_oGROUPX = 'GRP' . trim(substr($_oCODEXX, 3, 255));
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmplst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                    echo 'Company (Client) Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Perusahaan (Klien)';
                                                } else {
                                                    echo 'No. Urut Perusahaan (Klien)';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFCODEZZ" class="form-control" autofocus required value="<?php
                                            echo $_oCODEXX;
                                            ?>" oninvalid="<?php
                                                   if ($_sesFLNGAGE == 'eng') {
                                                       echo "this.setCustomValidity('Please fill out this field')";
                                                   } elseif ($_sesFLNGAGE == 'ina') {
                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                   } else {
                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                   };
                                                   ?>" oninput="setCustomValidity('')" readonly>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Compny (Client) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Perusahaan (Klien)';
                                                } else {
                                                    echo 'Nama Perusahaan (Klien)';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
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
            /* --- 3 : PRFSVE --- */
            break;
        case "cmp1ve" :
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
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Duplicate Record</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Incomplete Fill</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            /* --- 4 : PRFVIW --- */
            break;
        case "cmpviw" :
            ?>
            <?php
            $_oFRECNMB = $_tblCOMPNY['0']['FRECNMB'];
            $_oFCODEZZ = $_tblCOMPNY['0']['FCODEZZ'];
            $_oFFULNME = $_tblCOMPNY['0']['FFULNME'];
            $_oFTYPEZZ = $_tblCOMPNY['0']['FTYPEZZ'];
            $_oFEFINZZ = $_tblCOMPNY['0']['FEFINZZ'];
            $_oFNPWPZZ = $_tblCOMPNY['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_tblCOMPNY['0']['FKLUZZZ'];
            $_oFADDRES = $_tblCOMPNY['0']['FADDRES'];
            $_oFTELPON = $_tblCOMPNY['0']['FTELPON'];
            $_oFFAXIML = $_tblCOMPNY['0']['FFAXIML'];
            $_oFEMAILZ = $_tblCOMPNY['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblCOMPNY['0']['FHEADZZ'];
            $_oFHANDLE = $_tblCOMPNY['0']['FHANDLE'];
            $_oFNPWPDC = $_tblCOMPNY['0']['FNPWPDC'];
            $_oFPKPXDC = $_tblCOMPNY['0']['FPKPXDC'];
            $_oXHANDLE = $_tblCOMPNY['0']['XHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <div>
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmpedt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="box-body">
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
                                                echo 'Profile Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Profil';
                                            } else {
                                                echo 'Kode Profil';
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
                                                echo 'Client Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Klien';
                                            } else {
                                                echo 'Nama Klien';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="hidden">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status NPWP';
                                            } else {
                                                echo 'Status NPWP';
                                            };
                                            ?><font color="#000000">&nbsp;:</font> <?php ?>
                                        </label>
                                        <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                        if (!empty($_xFNPWPZZ)) {
                                            if ($_xFNPWPZZ == 'N') {
                                                echo 'Tidak memiliki NPWP';
                                            } elseif ($_xFNPWPZZ == 'Y') {
                                                echo 'Memiliki NPWP';
                                            }
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } else {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEFINZZ)) {
                                                echo $_oFEFINZZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } else {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                if (!empty($_sFNPWPZZ[1])) {
                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                } else {
                                                    echo '...';
                                                }
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } else {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFKLUZZZ)) {
                                                echo $_oFKLUZZZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <textarea rows="4" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                if (!empty($_oFADDRES)) {
                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>
                                            </textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Telepon';
                                                } else {
                                                    echo 'No. Telepon';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Faximile Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Faksimile';
                                                } else {
                                                    echo 'No. Faksimile';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFFAXIML" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFFAXIML)) {
                                                echo $_oFFAXIML;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <input type="text" name="_finFEMAILZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEMAILZ)) {
                                                echo $_oFEMAILZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company Head';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Pimpinan Perusahaan';
                                                } else {
                                                    echo 'Pimpinan Perusahaan';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFHEADZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFHEADZZ)) {
                                                echo $_oFHEADZZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Hendled By';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Ditangani Oleh';
                                                } else {
                                                    echo 'Ditangani Oleh';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oXHANDLE)) {
                                                echo $_oXHANDLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen NPWP';
                                                } else {
                                                    echo 'Dokumen NPWP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNPWPDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat Dokumen';
                                                    } else {
                                                        echo 'Lihat Dokumen';
                                                    }
                                                    ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFNPWPDC)) {
                                                    echo $_oFNPWPDC;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PKP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PKP';
                                                } else {
                                                    echo 'Dokumen PKP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="#_objMDLDOC" role="button" id="<?php echo $_oFPKPXDC;
                                                ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                       if ($_sesFLNGAGE == 'eng') {
                                                           echo 'View Document';
                                                       } elseif ($_sesFLNGAGE == 'ina') {
                                                           echo 'Lihat Dokumen';
                                                       } else {
                                                           echo 'Lihat Dokumen';
                                                       }
                                                       ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFPKPXDC)) {
                                                    echo $_oFPKPXDC;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
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
            </div>
            <?php
            /* --- 5 : PRFEDT --- */
            break;
        case "cmpedt" :
            ?>
            <?php
            $_oFRECNMB = $_tblCOMPNY['0']['FRECNMB'];
            $_oFCODEZZ = $_tblCOMPNY['0']['FCODEZZ'];
            $_oFFULNME = $_tblCOMPNY['0']['FFULNME'];
            $_oFTYPEZZ = $_tblCOMPNY['0']['FTYPEZZ'];
            $_oFEFINZZ = $_tblCOMPNY['0']['FEFINZZ'];
            $_oFNPWPZZ = $_tblCOMPNY['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_tblCOMPNY['0']['FKLUZZZ'];
            $_oFADDRES = $_tblCOMPNY['0']['FADDRES'];
            $_oFTELPON = $_tblCOMPNY['0']['FTELPON'];
            $_oFFAXIML = $_tblCOMPNY['0']['FFAXIML'];
            $_oFEMAILZ = $_tblCOMPNY['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblCOMPNY['0']['FHEADZZ'];
            $_oFHANDLE = $_tblCOMPNY['0']['FHANDLE'];
            $_oFNPWPDC = $_tblCOMPNY['0']['FNPWPDC'];
            $_oFPKPXDC = $_tblCOMPNY['0']['FPKPXDC'];
            $_oXHANDLE = $_tblCOMPNY['0']['XHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmpupd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Cancel';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Batal';
                            } else {
                                echo 'Batal';
                            };
                            ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                            <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocREFCMP/cfcACTREFCMP/cmpupd/' . $_oFRECNMB; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                        </div>
                        <div class="pull-right">

                            &nbsp;
                        </div>
                    </div>
                    <div class="box-body">
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
                                                echo 'Profile Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Profil';
                                            } else {
                                                echo 'Kode Profil';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFCODEZZ)) {
                                            echo $_oFCODEZZ;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Client Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Klien';
                                            } else {
                                                echo 'Nama Klien';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>

                                        <input type="text" name="_edtFFULNME" class="form-control" autofocus value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '';
                                        }
                                        ?>" required oninvalid="<?php
                                               if ($_sesFLNGAGE == 'eng') {
                                                   echo "this.setCustomValidity('Please fill out this field')";
                                               } elseif ($_sesFLNGAGE == 'ina') {
                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                               } else {
                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                               };
                                               ?>" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="hidden">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status NPWP';
                                            } else {
                                                echo 'Status NPWP';
                                            };
                                            ?><font color="#000000">&nbsp;:</font> <?php ?>
                                        </label>
                                        <input type="text" name="_edtFNPWPZ1" class="form-control" autofocus readonly value="<?php
                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                        if (!empty($_xFNPWPZZ)) {
                                            if ($_xFNPWPZZ == 'N') {
                                                echo 'Tidak memiliki NPWP';
                                            } elseif ($_xFNPWPZZ == 'Y') {
                                                echo 'Memiliki NPWP';
                                            }
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } else {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFEFINZZ" class="form-control" autofocus data-masked-input="9999999999" value="<?php
                                            if (!empty($_oFEFINZZ)) {
                                                echo $_oFEFINZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } else {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFNPWPZ2" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                if (!empty($_sFNPWPZZ[1])) {
                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                } else {
                                                    echo '...';
                                                }
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } else {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFKLUZZZ" class="form-control" autofocus data-masked-input="99999" value="<?php
                                            if (!empty($_oFKLUZZZ)) {
                                                echo $_oFKLUZZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <textarea rows="4" type="text" name="_edtFADDRES" class="form-control" autofocus><?php
                                                if (!empty($_oFADDRES)) {
                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                } else {
                                                    echo '';
                                                }
                                                ;
                                                ?></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Telepon';
                                                } else {
                                                    echo 'No. Telepon';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFTELPON" class="form-control" autofocus value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Faximile Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Faksimile';
                                                } else {
                                                    echo 'No. Faksimile';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFFAXIML" class="form-control" autofocus value="<?php
                                            if (!empty($_oFFAXIML)) {
                                                echo $_oFFAXIML;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company Head';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Pimpinan Perusahaan';
                                                } else {
                                                    echo 'Pimpinan Perusahaan';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFHEADZZ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFHEADZZ)) {
                                                echo $_oFHEADZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Hendled By';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Ditangani Oleh';
                                                } else {
                                                    echo 'Ditangani Oleh';
                                                }
                                                ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oXHANDLE)) {
                                                echo $_oXHANDLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="file" id="_efiFNPWPZZ" name="_efiFNPWPZZ" style="display: none" onchange="document.getElementById('_edtFNPWPZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen NPWP';
                                                } else {
                                                    echo 'Dokumen NPWP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Upload Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Unggah Dokumen';
                                                    } else {
                                                        echo 'Unggah Dokumen';
                                                    }
                                                    ?>" onclick="document.getElementById('_efiFNPWPZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                                <input type="text" id="_edtFNPWPZZ" name="_edtFNPWPZZ" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="file" id="_efiFPKPZZZ" name="_efiFPKPZZZ" style="display: none" onchange="document.getElementById('_edtFPKPZZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PKP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PKP';
                                                } else {
                                                    echo 'Dokumen PKP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Upload Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Unggah Dokumen';
                                                    } else {
                                                        echo 'Unggah Dokumen';
                                                    }
                                                    ?>" onclick="document.getElementById('_efiFPKPZZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                                <input type="text" id="_edtFPKPZZZ" name="_edtFPKPZZZ" class="form-control" style="background-color: #ffffff" readonly value="<?php echo $_oFPKPXDC; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 20px;">
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            /* --- 6 : PRFUPD --- */
            break;
        case "cmpupd" :
            ?>
            note : PROFLE UPDATE
            <?php
            /* --- 7 : CLRDEL --- */
            break;
        case "cmpdel" :
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
                        echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Deleted</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
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
                        echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Record Cannot Delete</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
        case "cmp1mpx":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);
            $_varFPROGRE = $this->uri->segment(8);
            $_varFPERIOD = $this->uri->segment(9);
            $_varFREVISI = $this->uri->segment(10);

            $_oDsb = 'Y';
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1mp' . '/_preFPROGRE'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmplst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Back';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kembali';
                                } else {
                                    echo 'Kembali';
                                };
                                ?>" style="background-color: #292b2c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
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
                                <?php
                                if (!empty($_oFlg)) {
                                    if (($_oFlg == 'emp') || ($_oFlg == 'ggl')) {
                                        $_oFlg = 'Gagal';
                                    } elseif (($_oFlg == 'ovr')) {
                                        $_oFlg = 'Gagal';
                                        $_rslFATTACH = 'Ukuran file lebih besar dari 1MB';
                                    } elseif (($_oFlg == 'ok1') || ($_oFlg == 'ok2')) {
                                        $_oFlg = 'Berhasil';
                                    }
                                } else {
                                    $_oFlg = '';
                                }
                                if (!empty($_rslFATTACH)) {
                                    $_oRsl = $_rslFATTACH;
                                } else {
                                    $_oRsl = '';
                                }
                                ?>
                                <div style="height: 10px;">
                                    <br>
                                </div>
                                <div>
                                    <input type="file" id="_fleFATTACH" name="_fleFATTACH" style="display: none" onchange="document.getElementById('_finFATTACH').value = this.value" accept="*">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Company Profile File';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'File Profil Perusahaan';
                                        } else {
                                            echo 'File Profil Perusahaan';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a role="button" class="btn btn-default" style="width: 50px; color: #ffffff; background: #d9534f" title="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Attach File`';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Attach File';
                                            } else {
                                                echo 'Attach File';
                                            }
                                            ?>" onclick="document.getElementById('_fleFATTACH').click()"><i class="far fa-file-excel fa-lg"></i>
                                            </a>
                                        </span>
                                        <input type="text" id="_finFATTACH" name="_finFATTACH" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo ''; ?>">
                                    </div>
                                </div>
                                <div style="height:5px;">
                                    <br>
                                </div>

                                <button name="_preFPROGRE" type="submit" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Client File Preview';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Lihat File Klien';
                                } else {
                                    echo 'Lihat File Klien';
                                };
                                ?>" style="background-color: #5bc0de"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-search-plus fa-lg"></i></font>
                                </button>


                                <?php
                                if ((!empty($_oFlg)) && (!empty($_rslFATTACH))) {
                                    echo '&ensp;Status Import File (1) : ' . '<font style="color: #ff0000">' . $_oFlg . '</font>' . ', ' . $_rslFATTACH;
                                } else {
                                    echo 'Status Import File (1) : ...';
                                    $KATAKPEYANG = '';
                                }
                                ?>
                                <div style="height:20px;">
                                    <br>
                                </div>

                                <div class="<?php
                                if ($_oFlg == 'Berhasil') {
                                    echo '';
                                } else {
                                    echo 'hidden';
                                }
                                ?>">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Client File View';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Lihat File Klien';
                                        } else {
                                            echo 'Lihat File Klien';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="well" style="background-color: #ffffff">
                                        <div class="<?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        }
                                        ?>">
                                        </div>

                                        <div class="sk_table_modification <?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        };
                                        ?> table-responsive" style="font-size: 15px"> 
                                            <table id="_objINAxxxxxx" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">No. Urut Profil Perusahaan</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Nama Perusahaan</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">NPWP</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 13px; border-left-color: #ff0000;">
                                                    <?php
                                                    $_oSeq = 0;
                                                    $_oChk = '';
                                                    foreach ($sheet as $_oRow) {
                                                        $_oSeq ++;

                                                        if ($_oSeq > 2) {
                                                            ?>
                                                            <tr>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['A'])) {
                                                                    echo '';
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['A'])) {
                                                                            echo $_oRow['A'] . '.';
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['B'])) {

                                                                    echo '';
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['B'])) {
                                                                            echo $_oRow['B'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['C'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['C'])) {
                                                                            echo $_oRow['C'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['D'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['D'])) {
                                                                            echo $_oRow['D'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['E'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['E'])) {
                                                                            echo $_oRow['E'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>
                                        <div style="height: 25px;">
                                            <br>
                                        </div>
                                        <a class="btn btn-default btn-flat" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1mp/_impFPROGRE/' . $KATAKPEYANG; ?>" role = "button" title="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Process to Database';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Proses ke Database';
                                        } else {
                                            echo 'Proses ke Database';
                                        };
                                        ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-database fa-fw fa-lg"></i></font>
                                        </a>
                                        <?php
                                        echo '&ensp;Status Import File (2) : <font style="color: #ff0000">Siap</font>, data bisa dimasukkan ke database';
                                        ?>
                                        <div style="height: 10px;">
                                            <br>
                                        </div>


                                        <div class="<?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        }
                                        ?>">

                                        </div>


                                        <?php
                                        $_oSeg = $this->uri->segment(5);

                                        if (!empty($_oSeg)) {

                                            foreach ($data_sheet as $_oRow) {
                                                $_oSeq ++;

                                                if ($_oSeq > 2) {

                                                    $_oFCODEZZ = $_oRow['B'];
                                                    $_oFFULNME = $_oRow['C'];
                                                    $_xFNPWPZZ = $_oRow['D'];
                                                    $_oFNPWPZZ = str_replace('-', '.', $_xFNPWPZZ);
                                                    echo '$_oFNPWPZZ : ' . $_oFNPWPZZ;
                                                    echo '<br>';
                                                    $_oFADDRES = $_oRow['E'];

                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCODEZZ', $_oFCODEZZ);
                                                    $_quePROFLE = $this->db->get();

                                                    if ($_quePROFLE->num_rows() > 0) {

                                                        if (!empty($_oFFULNME)) {
                                                            $_zFFULNME = $_oFFULNME;
                                                        } else {
                                                            $_zFFULNME = '';
                                                        }

                                                        if ((!empty(trim($_oFNPWPZZ))) && ($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ) !== '000000000000000') && (strlen($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ)) == 15)) {
                                                            $_zFNPWPZZ = 'Y;' . $this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ);
                                                        } else {
                                                            $_zFNPWPZZ = 'N;000000000000000';
                                                        }

                                                        if (!empty($_oFADDRES)) {
                                                            $_zFADDRES = $_oFADDRES;
                                                        } else {
                                                            $_zFADDRES = '';
                                                        }

                                                        $_updPROFLE = array(
                                                            //'FCODEZZ' => $_zFCODEZZ,
                                                            'FFULNME' => $_zFFULNME,
                                                            'FNPWPZZ' => $_zFNPWPZZ,
                                                            'FADDRES' => str_replace(';', '_n_', $_oFADDRES)
                                                        );

                                                        $this->db->where('FCODEZZ', $_oFCODEZZ);
                                                        $this->db->update('tprofle', $_updPROFLE);
                                                    } else {
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $_oYea = date("Y");

                                                        $this->db->select('*');
                                                        $this->db->from('tprofle');
                                                        $this->db->like('FCODEZZ', 'PRF' . $_oYea, 'after');
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
                                                                $_oCODEXX = 'PRF' . $_oYea . '-0000' . $_oCODEZX;
                                                            } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                                                                $_oCODEXX = 'PRF' . $_oYea . '-000' . $_oCODEZX;
                                                            } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                                                                $_oCODEXX = 'PRF' . $_oYea . '-00' . $_oCODEZX;
                                                            } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                                                                $_oCODEXX = 'PRF' . $_oYea . '-0' . $_oCODEZX;
                                                            } elseif ($_oCODEZX > 9999) {
                                                                $_oCODEXX = 'PRF' . $_oYea . '-' . $_oCODEZX;
                                                            } else {
                                                                //--- do nothing
                                                            }
                                                        } else {

                                                            $_oCODEXX = 'PRF' . $_oYea . '-00001';
                                                        }

                                                        if ((!empty($_oFNPWPZZ)) && ($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ) !== '000000000000000') && (strlen($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ)) == 15)) {
                                                            $_oFNPWPZZ = 'Y;' . $this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ);
                                                        } else {
                                                            $_oFNPWPZZ = 'N;000000000000000';
                                                        }

                                                        $_addPROFLE = array(
                                                            'FCODEZZ' => $_oCODEXX,
                                                            'FFULNME' => $_oFFULNME,
                                                            'FNPWPZZ' => $_oFNPWPZZ,
                                                            'FADDRES' => str_replace(';', '_n_', $_oFADDRES)
                                                        );
                                                        $this->db->insert('tprofle', $_addPROFLE);
                                                    }
                                                } else {
                                                    
                                                }
                                            }
                                            redirect('NocUSERZZ/cfcACTUSR006/cmplst');
                                        }
                                        ?>
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
        case "cmp1mp" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);
            $_varFPROGRE = $this->uri->segment(8);
            $_varFPERIOD = $this->uri->segment(9);
            $_varFREVISI = $this->uri->segment(10);

            $_oDsb = 'Y1';
            $_oChk = '';
            ?>
            <!--- form action="[?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1mp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_preFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI; ?]" method="POST" class="form-horizontal" enctype="multipart/form-data"--->
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1mp' . '/_preFPROGRE'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Back';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kembali';
                                } else {
                                    echo 'Kembali';
                                };
                                ?>" style="background-color: #292b2c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
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
                                <?php
                                if (!empty($_oFlg)) {
                                    if (($_oFlg == 'emp') || ($_oFlg == 'ggl')) {
                                        $_oFlg = 'Gagal';
                                    } elseif (($_oFlg == 'ovr')) {
                                        $_oFlg = 'Gagal';
                                        $_rslFATTACH = 'Ukuran file lebih besar dari 1MB';
                                    } elseif (($_oFlg == 'ok1') || ($_oFlg == 'ok2')) {
                                        $_oFlg = 'Berhasil';
                                    }
                                } else {
                                    $_oFlg = '';
                                }
                                if (!empty($_rslFATTACH)) {
                                    $_oRsl = $_rslFATTACH;
                                } else {
                                    $_oRsl = '';
                                }
                                ?>
                                <div style="height: 10px;">
                                    <br>
                                </div>
                                <div>
                                    <input type="file" id="_fleFATTACH" name="_fleFATTACH" style="display: none" onchange="document.getElementById('_finFATTACH').value = this.value" accept="*">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Clients File Upload';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Unggah (Upload) File Klien';
                                        } else {
                                            echo 'Unggah (Upload) File Klien';
                                        };
                                        ?>&nbsp;<font style="color: silver">*max : 1MB</font>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a role="button" class="btn btn-default" style="width: 50px; color: #ffffff; background: #d9534f" title="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Upload File`';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Upload (Unggah) File';
                                            } else {
                                                echo 'Upload (Unggah) File';
                                            }
                                            ?>" onclick="document.getElementById('_fleFATTACH').click()"><font style="font-size: 17px"><i class="fas fa-file-upload fa-lg"></i></font>
                                            </a>
                                        </span>
                                        <input type="text" id="_finFATTACH" name="_finFATTACH" class="form-control" style="background-color: #ffffff; height: 37px; font-size: 15px" placeholder="" readonly value="<?php echo ''; ?>">
                                        <input type="text" name="_finFPERIOD" class="form-control hidden" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_varFPERIOD; ?>">
                                        <input type="text" name="_finFREVISI" class="form-control hidden" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_varFREVISI; ?>">
                                    </div>
                                </div>
                                <div style="height: 10px;">
                                    <br>
                                </div>
                                <button name="_preFPROGRE" type="submit" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Client File Preview';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Lihat File Klien';
                                } else {
                                    echo 'Lihat File Klien';
                                };
                                ?>" style="background-color: #5bc0de"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-search-plus fa-lg"></i></font>
                                </button>


                                <?php
                                if ((!empty($_oFlg)) && (!empty($_rslFATTACH))) {
                                    echo '&ensp;Status Upload dan Verifikasi File : ' . '<font style="color: #ff0000; font-weight: bolder">' . $_oFlg . '</font>' . ', ' . $_rslFATTACH;
                                } else {
                                    echo 'Status Upload  dan Verifikasi File : ...';
                                }
                                ?>
                                <div style="height:20px;">
                                    <br>
                                </div>
                                <div class="<?php
                                if ($_oFlg == 'Berhasil') {
                                    echo '';
                                } else {
                                    echo 'hidden';
                                }
                                ?>">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Client File View';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Lihat File Klien';
                                        } else {
                                            echo 'Lihat File Klien';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="well" style="background-color: #ffffff">
                                        <div class="<?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        }
                                        ?>">
                                        </div>

                                        <div class="sk_table_modification <?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        };
                                        ?> table-responsive" style="font-size: 15px"> 
                                            <table id="_objINAxxxxxx" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">No.</th>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">Periode</th>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">Nama Lawan Transaksi</th>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">NPWP</th>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">Alamat</th>
                                                        <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle; width: 1%">Uraian Transaksi</th>
                                                        <th colspan="5" class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Invoice</th>
                                                        <th colspan="5" class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Faktur Pajak</th>
                                                        <th colspan="3" class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Pembayaran</th>
                                                        <th colspan="5" class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Review MSM Consulting</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Tanggal</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Nomor</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">PPN</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP + PPN</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Tanggal</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Nomor</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">PPN</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP + PPN</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Tanggal</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Nilai (Rp.)</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Keterangan</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP (Barang)</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">DPP (Non-Barang)</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Kode Jenis Setoran</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">Tarif Pajak</th>
                                                        <th class="text-center" style="white-space: nowrap; vertical-align:middle; width: 1%">PPH YMHD</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 13px; border-left-color: #ff0000;">
                                                    <?php
                                                    $_oSeq = 0;
                                                    $_oNmr = 0;
                                                    $_oChk = '';
                                                    foreach ($sheet as $_oRow) {
                                                        $_oSeq ++;
                                                        $_oNmr ++;
                                                        $_oChk = '';

                                                        if ($_oSeq > 2) {
                                                            ?>
                                                            <tr>
                                                                <td align="right" style="white-space: nowrap;  width: 1%">
                                                                    <?php
                                                                    if (!empty(trim($_oRow['A']))) {
                                                                        echo trim($_oRow['A']) . '.';
                                                                        $_oChk .= '1';
                                                                    } else {
                                                                        echo $_oNmr . '.';
                                                                        $_oChk .= '0';
                                                                    };
                                                                    ?>
                                                                </td>
                                                                <td align="center" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['B'])) {
                                                                    if ((trim($_oRow['B']) !== trim($KATAKBENJUT)) && ((trim($_oRow['B']) !== trim(substr($KATAKBENJUT, 0, 4) . '-' . substr($KATAKBENJUT, 4, 2))))) {
                                                                        echo '#ffff00';
                                                                        $_oChk .= '2';
                                                                    } else {
                                                                        echo '';
                                                                        $_oChk .= '1';
                                                                    }
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['B'])) {
                                                                            echo $_oRow['B'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty(trim($_oRow['C']))) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['C'])) {
                                                                            echo $_oRow['C'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['D'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['D'])) {
                                                                            echo $_oRow['D'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['E'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['E'])) {
                                                                            echo $_oRow['E'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['F'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['F'])) {
                                                                            echo $_oRow['F'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['G'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['G'])) {
                                                                            echo $_oRow['G'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['H'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['H'])) {
                                                                            echo $_oRow['H'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['I'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['I'])) {
                                                                            echo $_oRow['I'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['J'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['J'])) {
                                                                            echo $_oRow['J'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['K'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['K'])) {
                                                                            echo $_oRow['K'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['L'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['L'])) {
                                                                            echo $_oRow['L'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['M'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['M'])) {
                                                                            echo $_oRow['M'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['N'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['N'])) {
                                                                            echo $_oRow['N'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['O'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['O'])) {
                                                                            echo $_oRow['O'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['P'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['P'])) {
                                                                            echo $_oRow['P'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['Q'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['Q'])) {
                                                                            echo $_oRow['Q'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['R'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['R'])) {
                                                                            echo $_oRow['R'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['S'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['S'])) {
                                                                            echo $_oRow['S'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['T'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['T'])) {
                                                                            echo $_oRow['T'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['U'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['U'])) {
                                                                            echo $_oRow['U'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['V'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['V'])) {
                                                                            echo $_oRow['V'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['W'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['W'])) {
                                                                            echo $_oRow['W'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['X'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>"><?php
                                                                        if (!empty($_oRow['X'])) {
                                                                            echo $_oRow['X'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }

                                                    if (strpos($_oChk, '2') !== false) {
                                                        $_oDsb = 'Y2';
                                                    } else {
                                                        $_oDsb = 'N';
                                                    };
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>
                                        <div style="height: 25px;">
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a class="btn btn-default btn-flat sk_button_modification <?php
                                                if ($_oDsb == 'Y2') {
                                                    echo 'disabled';
                                                    echo $KATAKPEYANG = '';
                                                } elseif ($_oDsb == 'N') {
                                                    echo '';
                                                } else {
                                                    echo '';
                                                }
                                                ?>" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR009/c22imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI . '/' . $KATAKPEYANG; ?>" role = "button" title="<?php
                                                   if ($_sesFLNGAGE == 'eng') {
                                                       echo 'Process to Database';
                                                   } elseif ($_sesFLNGAGE == 'ina') {
                                                       echo 'Proses ke Database';
                                                   } else {
                                                       echo 'Proses ke Database';
                                                   };
                                                   ?>" style="background-color: <?php
                                                   if (($_oDsb == 'emptyx') || ($_oDsb == 'Y1x') || ($_oDsb == 'Y2x')) {
                                                       echo '#dcdcdc';
                                                   } elseif ($_oDsb == 'N') {
                                                       echo '#5cb85c';
                                                   }
                                                   ?>"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-database fa-lg"></i></font>
                                                </a>
                                                <?php
                                                if ($_oDsb == 'Y1') {
                                                    echo '';
                                                } elseif ($_oDsb == 'Y2') {
                                                    echo '&ensp;Status Proses PPh 22 : <font style="color: #ff0000; font-weight: bolder">Terkendala</font>, karena di data klien, isi kolom periode beda';
                                                } elseif ($_oDsb == 'N') {
                                                    echo '&ensp;Status Proses PPh 22 : <font style="color: #ff0000; font-weight: bolder">Siap</font>, data yang sudah <font style="color: #ff0000; font-weight: bolder">valid</font> bisa dimasukkan ke database';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="<?php
                                        if ($_oFlg == 'Berhasil') {
                                            echo '';
                                        } else {
                                            echo 'hidden';
                                        }
                                        ?>">
                                        </div>
                                        <?php
                                        $_oSeg = $this->uri->segment(11);
                                        if (!empty($_oSeg)) {

                                            foreach ($data_sheet as $_oRow) {
                                                $_oSeq ++;

                                                if ($_oSeq > 2) {

                                                    $_oFPERIOD = $this->sklibrfnc->_fGETNumOnl($_oRow['B']);
                                                    $_oFFULNME = $_oRow['C'];
                                                    $_xFNPWPZZ = $this->sklibrfnc->_fGETNumOnl($_oRow['D']);
                                                    if ((!empty($_xFNPWPZZ)) && (strlen($_xFNPWPZZ) == 15)) {
                                                        $_oFNPWPZZ = 'Y;' . $_xFNPWPZZ;
                                                        $_oNpw = 1;
                                                    } elseif ((!empty($_xFNPWPZZ)) && (strtolower($_xFNPWPZZ) == 'non npwp')) {
                                                        $_oFNPWPZZ = 'N;000000000000000';
                                                        $_oNpw = 1;
                                                        //$_oNpw = 2;
                                                    } else {
                                                        $_oFNPWPZZ = 'N;000000000000000';
                                                        $_oNpw = 1;
                                                        //$_oNpw = 2;
                                                    }
                                                    $_oFPJKADR = $this->sklibrfnc->_fGETPREGRP($_oRow['E']);
                                                    $_oFPJKDSC = $this->sklibrfnc->_fGETPREGRP($_oRow['F']);
                                                    $_oFINVDTE = $this->sklibrfnc->_fGETNumOnl($_oRow['G']);
                                                    $_oFINVNMB = $_oRow['H'];
                                                    $_oFINVDPP = $this->sklibrfnc->_fGETNumOnl($_oRow['I']);
                                                    $_oFINVPPN = $this->sklibrfnc->_fGETNumOnl($_oRow['J']);
                                                    $_oFINVDPN = $this->sklibrfnc->_fGETNumOnl($_oRow['K']);
                                                    $_oFFKTDTE = $this->sklibrfnc->_fGETNumOnl($_oRow['L']);
                                                    $_oFFKTNMB = $_oRow['M'];
                                                    $_oFFKTDPP = $this->sklibrfnc->_fGETNumOnl($_oRow['N']);
                                                    $_oFFKTPPN = $this->sklibrfnc->_fGETNumOnl($_oRow['O']);
                                                    $_oFFKTDPN = $this->sklibrfnc->_fGETNumOnl($_oRow['P']);
                                                    $_oFBYRDTE = $this->sklibrfnc->_fGETNumOnl($_oRow['Q']);
                                                    $_oFBYRNML = $this->sklibrfnc->_fGETNumOnl($_oRow['R']);
                                                    $_oFBYRDSC = $this->sklibrfnc->_fGETPREGRP($_oRow['S']);
                                                    if ($_varFREVISI == '0') {
                                                        $_oFREVISI = '-1';
                                                    } else {
                                                        $_oFREVISI = $_varFREVISI;
                                                    }
                                                    $_oFMSMDPB = $this->sklibrfnc->_fGETNumOnl($_oRow['T']);
                                                    $_oFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($_oRow['U']);
                                                    $_oFPROFLE = '';
                                                    $_oFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($_oRow['V']);
                                                    /* --- notes : query dari tabrl kjstor--- */
                                                    $this->db->select('FTARIFZ');
                                                    $this->db->from('tkjstor');
                                                    $this->db->where('FKJSCOD', $_oFKJSZZZ);
                                                    $_queKJSTOR = $this->db->get();

                                                    foreach ($_queKJSTOR->result_array() as $_oRox) {
                                                        $_tFMSMTRF = $this->sklibrfnc->_fGETPREGRP($_oRox['FTARIFZ']);
                                                    }

                                                    $_xFMSMTRF = $this->sklibrfnc->_fGETPREGRP($_oRow['W']);

                                                    if ((!empty($_xFMSMTRF)) && ($_tFMSMTRF == $_xFMSMTRF)) {
                                                        $_oFMSMTRF = $_xFMSMTRF * $_oNpw;
                                                    }
                                                    if ((!empty($_xFMSMTRF)) && ($_tFMSMTRF !== $_xFMSMTRF)) {
                                                        $_oFMSMTRF = $_xFMSMTRF * $_oNpw;
                                                    }
                                                    if (empty($_xFMSMTRF)) {
                                                        $_oFMSMTRF = $_tFMSMTRF * $_oNpw;
                                                    }
                                                    if (empty($_tFMSMTRF)) {
                                                        $_oFMSMTRF = $_xFMSMTRF * $_oNpw;
                                                    }

                                                    $_oFMSMNML = ($_oFMSMTRF / 100) * $_oFMSMDPB;

                                                    $_oXCHKALL = $_oFPERIOD . $_oFFULNME . $_oFINVDTE . $_oFINVNMB . $_oFREVISI;

                                                    if (strlen(trim($_oXCHKALL)) > 25) {

                                                        $this->db->select('*');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp22');
                                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                                        $this->db->where('FFULNME', $_oFFULNME);
                                                        $this->db->where('FINVDTE', $_oFINVDTE);
                                                        $this->db->where('FINVNMB', $_oFINVNMB);
                                                        $this->db->where('FREVISI', $_oFREVISI);
                                                        $this->db->where('FPROFLE', NULL);
                                                        $_queP21HST = $this->db->get();

                                                        if ($_queP21HST->num_rows() > 0) {

                                                            foreach ($_queP21HST->result_array() as $_oRow) {
                                                                $_oFRECNMB = $_oRow['FRECNMB'];
                                                            }

                                                            $_updP21HST = array(
                                                                'FFULNME' => $_oFFULNME,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FPJKADR' => $_oFPJKADR,
                                                                'FPJKDSC' => $_oFPJKDSC,
                                                                'FINVDTE' => $_oFINVDTE,
                                                                'FINVNMB' => $_oFINVNMB,
                                                                'FINVDPP' => $_oFINVDPP,
                                                                'FINVPPN' => $_oFINVPPN,
                                                                'FINVDPN' => $_oFINVDPN,
                                                                'FFKTDTE' => $_oFFKTDTE,
                                                                'FFKTNMB' => $_oFFKTNMB,
                                                                'FFKTDPP' => $_oFFKTDPP,
                                                                'FFKTPPN' => $_oFFKTPPN,
                                                                'FFKTDPN' => $_oFFKTDPN,
                                                                'FBYRDTE' => $_oFBYRDTE,
                                                                'FBYRNML' => $_oFBYRNML,
                                                                'FBYRDSC' => $_oFBYRDSC,
                                                                'FMSMDPB' => $_oFMSMDPB,
                                                                'FMSMDPJ' => $_oFMSMDPJ,
                                                                'FKJSZZZ' => $_oFKJSZZZ,
                                                                'FMSMTRF' => $_oFMSMTRF,
                                                                'FMSMNML' => $_oFMSMNML,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => 'vnd'
                                                            );

                                                            $this->db->where('FPERIOD', $_oFPERIOD);
                                                            $this->db->where('FREVISI', $_oFREVISI);
                                                            $this->db->where('FFLGTAX', 'hstp22');
                                                            $this->db->where('FRECNMB', $_oFRECNMB);
                                                            $this->db->update('ttaxhst', $_updP21HST);
                                                        } else {

                                                            $_addP21HST = array(
                                                                'FFULNME' => $_oFFULNME,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FPJKADR' => $_oFPJKADR,
                                                                'FPJKDSC' => $_oFPJKDSC,
                                                                'FINVDTE' => $_oFINVDTE,
                                                                'FINVNMB' => $_oFINVNMB,
                                                                'FINVDPP' => $_oFINVDPP,
                                                                'FINVPPN' => $_oFINVPPN,
                                                                'FINVDPN' => $_oFINVDPN,
                                                                'FFKTDTE' => $_oFFKTDTE,
                                                                'FFKTNMB' => $_oFFKTNMB,
                                                                'FFKTDPP' => $_oFFKTDPP,
                                                                'FFKTPPN' => $_oFFKTPPN,
                                                                'FFKTDPN' => $_oFFKTDPN,
                                                                'FBYRDTE' => $_oFBYRDTE,
                                                                'FBYRNML' => $_oFBYRNML,
                                                                'FBYRDSC' => $_oFBYRDSC,
                                                                'FMSMDPB' => $_oFMSMDPB,
                                                                'FMSMDPJ' => $_oFMSMDPJ,
                                                                'FKJSZZZ' => $_oFKJSZZZ,
                                                                'FMSMTRF' => $_oFMSMTRF,
                                                                'FMSMNML' => $_oFMSMNML,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FPERIOD' => $_oFPERIOD,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => 'vnd',
                                                                'FREVISI' => $_oFREVISI,
                                                                'FFLGTAX' => 'hstp22'
                                                            );
                                                            $this->db->insert('ttaxhst', $_addP21HST);
                                                        }
                                                    }
                                                }
                                            }
                                            redirect('NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ);
                                        }
                                        ?>
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
            /* --- 2 : PRFADD --- */
            break;
        case "cmp1ve_???":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);

            if ($this->session->flashdata('true')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Duplicate Record</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocREFCMP/cfcACTREFCMP/cmpviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ) . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Incomplete Fill</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "cmp1iw";
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_oFRECNMB = $_tblCMP1IW['0']['FRECNMB'];
                $_oFCODEZZ = $_tblCMP1IW['0']['FCODEZZ'];
                $_oFFULNME = $_tblCMP1IW['0']['FFULNME'];
                $_oFSERVCE = $_tblCMP1IW['0']['FSERVCE'];

                if (!empty($_oFSERVCE)) {
                    $_oFSERVCE = $_oFSERVCE;
                } else {
                    $_oFSERVCE = ';;;;;;;;;;;;;;;;;;;;;;;;';
                }

                $_oFEMPIDN = $_tblCMP1IW['0']['FEMPIDN'];
                $_oFCITIDN = $_tblCMP1IW['0']['FCITIDN'];
                $_oFEFINZZ = $_tblCMP1IW['0']['FEFINZZ'];
                $_oFJOBTTL = $_tblCMP1IW['0']['FJOBTTL'];
                $_oFNATION = $_tblCMP1IW['0']['FNATION'];
                $_oFGENDER = $_tblCMP1IW['0']['FGENDER'];
                $_oFNPWPZZ = $_tblCMP1IW['0']['FNPWPZZ'];
                $_oFNPWPDC = $_tblCMP1IW['0']['FNPWPDC'];
                $_oFSKTXDC = $_tblCMP1IW['0']['FSKTXDC'];
                $_oFPKPXDC = $_tblCMP1IW['0']['FPKPXDC'];
                $_oFTDPXDC = $_tblCMP1IW['0']['FTDPXDC'];
                $_oFSIUPDC = $_tblCMP1IW['0']['FSIUPDC'];
                $_oFNIBXDC = $_tblCMP1IW['0']['FNIBXDC'];
                $_oFAKPNDC = $_tblCMP1IW['0']['FAKPNDC'];
                $_oFAKPRDC = $_tblCMP1IW['0']['FAKPRDC'];
                $_oFAKSPDC = $_tblCMP1IW['0']['FAKSPDC'];
                $_oFSKBXDC = $_tblCMP1IW['0']['FSKBXDC'];
                $_oFSERTDC = $_tblCMP1IW['0']['FSERTDC'];
                $_oFSKDUDC = $_tblCMP1IW['0']['FSKDUDC'];
                $_oFEFINDC = $_tblCMP1IW['0']['FEFINDC'];
                $_oFKDIRDC = $_tblCMP1IW['0']['FKDIRDC'];
                $_oFNDIRDC = $_tblCMP1IW['0']['FNDIRDC'];

                $_oXHANDLE = $_tblCMP1IW['0']['XHANDLE'];
                $_oFTYPEZZ = $_tblCMP1IW['0']['FTYPEZZ'];
                $_oFKLUZZZ = $_tblCMP1IW['0']['FKLUZZZ'];
                $_oFADDRES = $_tblCMP1IW['0']['FADDRES'];
                $_oFTELPON = $_tblCMP1IW['0']['FTELPON'];
                $_oFFAXIML = $_tblCMP1IW['0']['FFAXIML'];
                $_oFEMAILZ = $_tblCMP1IW['0']['FEMAILZ'];
                $_oFHEADZZ = $_tblCMP1IW['0']['FHEADZZ'];
                $_xFHEADZZ = explode(';', $_oFHEADZZ);
                $_oFHEADZ1 = $_xFHEADZZ[0];
                $_oFHEADZ2 = $_xFHEADZZ[1];
                $_oFHANDLE = $_tblCMP1IW['0']['FHANDLE'];

                $_oFIDWPZZ = $_tblCMP1IW['0']['FIDWPZZ'];
                $_oFITAXZZ = $_tblCMP1IW['0']['FITAXZZ'];
                $_oFIDPJZZ = $_tblCMP1IW['0']['FIDPJZZ'];
                $_oFDKPNZZ = $_tblCMP1IW['0']['FDKPNZZ'];
                $_oFEFKTUR = $_tblCMP1IW['0']['FEFKTUR'];
                $_xFEFKTUR = explode(';', $_oFEFKTUR);
                $_oFEFKTU1 = $_xFEFKTUR[0];
                $_oFEFKTU2 = $_xFEFKTUR[1];
                $_oFEFKTU3 = $_xFEFKTUR[2];
                $_oFEFKTU4 = $_xFEFKTUR[3];
                $_oFEFKTU5 = $_xFEFKTUR[4];
                $_oFEFKTU6 = $_xFEFKTUR[5];
                $_oFSKTZZZ = $_tblCMP1IW['0']['FSKTZZZ'];
                $_xFSKTZZZ = explode(';', $_oFSKTZZZ);
                $_oFSKTZZ1 = $_xFSKTZZZ[0];
                $_oFSKTZZ2 = $_xFSKTZZZ[1];
                $_oFPKPZZZ = $_tblCMP1IW['0']['FPKPZZZ'];
                $_xFPKPZZZ = explode(';', $_oFPKPZZZ);
                $_oFPKPZZ1 = $_xFPKPZZZ[0];
                $_oFPKPZZ2 = $_xFPKPZZZ[1];
                $_oFTDPZZZ = $_tblCMP1IW['0']['FTDPZZZ'];
                $_xFTDPZZZ = explode(';', $_oFTDPZZZ);
                $_oFTDPZZ1 = $_xFTDPZZZ[0];
                $_oFTDPZZ2 = $_xFTDPZZZ[1];
                $_oFACTCOD = $_tblCMP1IW['0']['FACTCOD'];
                $_xFACTCOD = explode(';', $_oFACTCOD);
                $_oFACTCO1 = $_xFACTCOD[0];
                $_oFACTCO2 = $_xFACTCOD[1];
                $_oFSSEDJP = $_tblCMP1IW['0']['FSSEDJP'];
                $_xFSSEDJP = explode(';', $_oFSSEDJP);
                $_oFSSEDJ1 = $_xFSSEDJP[0];
                $_oFSSEDJ2 = $_xFSSEDJP[1];
                $_oFENOFAZ = $_tblCMP1IW['0']['FENOFAZ'];
                $_xFENOFAZ = explode(';', $_oFENOFAZ);
                $_oFENOFA1 = $_xFENOFAZ[0];
                $_oFENOFA2 = $_xFENOFAZ[1];
                $_oFEMLCLN = $_tblCMP1IW['0']['FEMLCLN'];
                $_xFEMLCLN = explode(';', $_oFEMLCLN);
                $_oFEMLCL1 = $_xFEMLCLN[0];
                $_oFEMLCL2 = $_xFEMLCLN[1];
                $_oFCLCP21 = $_tblCMP1IW['0']['FCLCP21'];

                $_cmpFRECNMB = $this->uri->segment(4);
                $_cmpFCODEZZ = $this->uri->segment(5);
                $_varXTABVIW = $this->uri->segment(6);
                if (!empty($_varXTABVIW)) {
                    $_swiTABVIW = $_varXTABVIW;
                } else {
                    $_swiTABVIW = 'sk_main';
                }
                $_varXPROCES = $this->uri->segment(7);
                ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmplst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1el/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'aimz-alert-delete2';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'aimz-alert-hapus2';
                            } else {
                                echo 'aimz-alert-hapus2';
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
                        <div style="height: 10px;">
                            <br>
                        </div>
                        <div class="rowx">
                            <div class="col-lg-12">
                                <div class="bordered-tab-contents">
                                    <ul class="nav nav-tabs" role="tablist" style="background-color: #f8f8f8">
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_main') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_main" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-id-card-alt fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Main';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Utama';
                                            } else {
                                                echo 'Utama';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_srvc') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_srvc" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-calculator fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Hitung Pajak';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Hitung Pajak';
                                            } else {
                                                echo 'Hitung Pajak';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_idwp') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_idwp" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-user-tie fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'WP Identity';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Identitas WP';
                                            } else {
                                                echo 'Identitas WP';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_itax') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_itax" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-info-circle fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Info';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Info Perpajakan';
                                            } else {
                                                echo 'Info Perpajakan';
                                            }
                                            ?></strong></font>
                                            </a>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_idpj') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_idpj" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-user-secret fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Identity of the Person in Charge';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Identitas Penanggung Jawab';
                                            } else {
                                                echo 'Identitas Penanggung Jawab';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'sk_dkpn') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#sk_dkpn" role="tab" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-file-alt fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Electronic Document';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Dokumen Elektronik';
                                            } else {
                                                echo 'Dokumen Elektronik';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_main') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_main">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_main : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_main') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_main/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="sk_hr_modification0">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div style="height: 5px;">
                                                                <br>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Company (Client) Sequence Nmb.';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'No. Urut Perusahaan (Klien)';
                                                                            } else {
                                                                                echo 'No. Urut Perusahaan (Klien)';
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
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Company (Client) Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Perusahaan (Klien)';
                                                                            } else {
                                                                                echo 'Nama Perusahaan (Klien)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFFULNME)) {
                                                                            echo $_oFFULNME;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Company (Client) Head';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Pimpinan Perusahaan (Klien)';
                                                                            } else {
                                                                                echo 'Pimpinan Perusahaan (Klien)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFHEADZ1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFHEADZ1)) {
                                                                            echo $_oFHEADZ1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="hidden">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'NPWP Status';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Status NPWP';
                                                                            } else {
                                                                                echo 'Status NPWP';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font> <?php ?>
                                                                        </label>
                                                                        <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                                                        if (!empty($_xFNPWPZZ)) {
                                                                            if ($_xFNPWPZZ == 'N') {
                                                                                echo 'Tidak memiliki NPWP';
                                                                            } elseif ($_xFNPWPZZ == 'Y') {
                                                                                echo 'Memiliki NPWP';
                                                                            }
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Telephone Nmb.';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'No. Telepon';
                                                                            } else {
                                                                                echo 'No. Telepon';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFTELPON)) {
                                                                            echo $_oFTELPON;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Faximile Nmb.';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'No. Faksimile';
                                                                            } else {
                                                                                echo 'No. Faksimile';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFFAXIML" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFFAXIML)) {
                                                                            echo $_oFFAXIML;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
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
                                                                        <input type="text" name="_finFEMAILZ" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEMAILZ)) {
                                                                            echo $_oFEMAILZ;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                            } else {
                                                                                echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFNPWPZZ)) {
                                                                            $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                                            if (!empty($_sFNPWPZZ[1])) {
                                                                                echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-8">
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
                                                                        <textarea rows="4" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                                            if (!empty($_oFADDRES)) {
                                                                                echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'User E-Faktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'User E-Faktur';
                                                                            } else {
                                                                                echo 'User E-Faktur';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEFKTU1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEFKTU1)) {
                                                                            echo $_oFEFKTU1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password E-Faktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password E-Faktur';
                                                                            } else {
                                                                                echo 'Password E-Faktur';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEFKTU2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEFKTU2)) {
                                                                            echo $_oFEFKTU2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Kode Aktivasi';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Kode Aktivasi';
                                                                            } else {
                                                                                echo 'Kode Aktivasi';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFACTCO1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFACTCO1)) {
                                                                            echo $_oFACTCO1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password Aktivasi';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password Aktivasi';
                                                                            } else {
                                                                                echo 'Password Aktivasi';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFACTCO2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFACTCO2)) {
                                                                            echo $_oFACTCO2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Email E-Faktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Email E-Faktur';
                                                                            } else {
                                                                                echo 'Email E-Faktur';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEFKTU3" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEFKTU3)) {
                                                                            echo $_oFEFKTU3;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password Email E-Faktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password Email E-Faktur';
                                                                            } else {
                                                                                echo 'Password Email E-Faktur';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEFKTU4" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEFKTU4)) {
                                                                            echo $_oFEFKTU4;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password E-Nofa';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password E-Nofa';
                                                                            } else {
                                                                                echo 'Password E-Nofa';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFENOFA1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFENOFA1)) {
                                                                            echo $_oFENOFA1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password Phrase';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password Phrase';
                                                                            } else {
                                                                                echo 'Password Phrase';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFENOFA2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFENOFA2)) {
                                                                            echo $_oFENOFA2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Email SSE/DJP';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Email SSE/DJP';
                                                                            } else {
                                                                                echo 'Email SSE/DJP';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFSSEDJ1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFSSEDJ1)) {
                                                                            echo $_oFSSEDJ1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password Email SSE/DJP';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password Email SSE/DJP';
                                                                            } else {
                                                                                echo 'Password Email SSE/DJP';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFSSEDJ2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFSSEDJ2)) {
                                                                            echo $_oFSSEDJ2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Email to Client';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Email to Client';
                                                                            } else {
                                                                                echo 'Email to Client';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEMLCL1" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEMLCL1)) {
                                                                            echo $_oFEMLCL1;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Password Email to Client';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Password Email to Client';
                                                                            } else {
                                                                                echo 'Password Email to Client';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFEMLCL2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFEMLCL2)) {
                                                                            echo $_oFEMLCL2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Person in Charge (PIC)';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Person in Charge (PIC)';
                                                                            } else {
                                                                                echo 'Person in Charge (PIC)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFHEADZ2" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFHEADZ2)) {
                                                                            echo $_oFHEADZ2;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Hendled By';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Ditangani Oleh';
                                                                            } else {
                                                                                echo 'Ditangani Oleh';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oXHANDLE)) {
                                                                            echo $_oXHANDLE;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Metode Perhitungan PPh Pasal 21';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Metode Perhitungan PPh Pasal 21';
                                                                            } else {
                                                                                echo 'Metode Perhitungan PPh Pasal 21';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_finFCLCP21" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFCLCP21)) {
                                                                            if ($_oFCLCP21 == 'gu') {
                                                                                echo 'Gross-Up';
                                                                            } elseif ($_oFCLCP21 == 'ng') {
                                                                                echo 'Non Gross-Up';
                                                                            } elseif ($_oFCLCP21 == 'nt') {
                                                                                echo 'Nett';
                                                                            }
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--- sk_main : EDT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_main') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_main/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_main'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button onclick = "_fGETCheKe2()" type = "submit" href="<?php echo base_url(), 'NocREFCMP/cfcACTREFCMP/cmpupd/' . $_oFRECNMB; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Save';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Simpan';
                                                                    } else {
                                                                        echo 'Simpan';
                                                                    };
                                                                    ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-check fa-fw fa-lg"></i></font></button>
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
                                                                        <div class="col-lg-4">
                                                                            <label class="label-mins">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Company (Client) Sequence Nmb.';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'No. Urut Perusahaan (Klien)';
                                                                                } else {
                                                                                    echo 'No. Urut Perusahaan (Klien)';
                                                                                };
                                                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                            </label>
                                                                            <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFCODEZZ)) {
                                                                                echo $_oFCODEZZ;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Company (Client) Name';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nama Perusahaan (Klien)';
                                                                                } else {
                                                                                    echo 'Nama Perusahaan (Klien)';
                                                                                };
                                                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                            </label>

                                                                            <input type="text" name="_edtFFULNME" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFFULNME)) {
                                                                                echo $_oFFULNME;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>" required oninvalid="<?php
                                                                                   if ($_sesFLNGAGE == 'eng') {
                                                                                       echo "this.setCustomValidity('Please fill out this field')";
                                                                                   } elseif ($_sesFLNGAGE == 'ina') {
                                                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                   } else {
                                                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                   };
                                                                                   ?>" oninput="setCustomValidity('')">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Company (Client)  Head';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Pimpinan Perusahaan (Klien)';
                                                                                } else {
                                                                                    echo 'Pimpinan Perusahaan (Klien)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFHEADZ1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFHEADZ1)) {
                                                                                echo $_oFHEADZ1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Telephone Nmb.';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'No. Telepon';
                                                                                } else {
                                                                                    echo 'No. Telepon';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFTELPON" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFTELPON)) {
                                                                                echo $_oFTELPON;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Faximile Nmb.';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'No. Faksimile';
                                                                                } else {
                                                                                    echo 'No. Faksimile';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFFAXIML" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFFAXIML)) {
                                                                                echo $_oFFAXIML;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Email';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Email';
                                                                                } else {
                                                                                    echo 'Email';
                                                                                };
                                                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                            </label>
                                                                            <input type="text" name="_edtFEMAILZ" class="form-control" required value="<?php
                                                                            if (!empty($_oFEMAILZ)) {
                                                                                echo $_oFEMAILZ;
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
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                } else {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFNPWPZ2" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                                                            if (!empty($_oFNPWPZZ)) {
                                                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                                                if (!empty($_sFNPWPZZ[1])) {
                                                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
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
                                                                            <textarea rows="4" type="text" name="_edtFADDRES" class="form-control" autofocus><?php
                                                                                if (!empty($_oFADDRES)) {
                                                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ;
                                                                                ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'User E-Faktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'User E-Faktur';
                                                                                } else {
                                                                                    echo 'User E-Faktur';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEFKTU1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEFKTU1)) {
                                                                                echo $_oFEFKTU1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password E-Faktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password E-Faktur';
                                                                                } else {
                                                                                    echo 'Password E-Faktur';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEFKTU2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEFKTU2)) {
                                                                                echo $_oFEFKTU2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Kode Aktivasi';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Kode Aktivasi';
                                                                                } else {
                                                                                    echo 'Kode Aktivasi';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFACTCO1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFACTCO1)) {
                                                                                echo $_oFACTCO1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password Aktivasi';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password Aktivasi';
                                                                                } else {
                                                                                    echo 'Password Aktivasi';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFACTCO2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFACTCO2)) {
                                                                                echo $_oFACTCO2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Email E-Faktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Email E-Faktur';
                                                                                } else {
                                                                                    echo 'Email E-Faktur';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEFKTU3" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEFKTU3)) {
                                                                                echo $_oFEFKTU3;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password Email E-Faktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password Email E-Faktur';
                                                                                } else {
                                                                                    echo 'Password Email E-Faktur';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEFKTU4" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEFKTU4)) {
                                                                                echo $_oFEFKTU4;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password E-Nofa';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password E-Nofa';
                                                                                } else {
                                                                                    echo 'Password E-Nofa';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFENOFA1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFENOFA1)) {
                                                                                echo $_oFENOFA1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password Phrase';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password Phrase';
                                                                                } else {
                                                                                    echo 'Password Phrase';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFENOFA2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFENOFA2)) {
                                                                                echo $_oFENOFA2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Email SSE/DJP';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Email SSE/DJP';
                                                                                } else {
                                                                                    echo 'Email SSE/DJP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFSSEDJ1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFSSEDJ1)) {
                                                                                echo $_oFSSEDJ1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password Email SSE/DJP';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password Email SSE/DJP';
                                                                                } else {
                                                                                    echo 'Password Email SSE/DJP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFSSEDJ2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFSSEDJ2)) {
                                                                                echo $_oFSSEDJ2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Email to Client';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Email to Client';
                                                                                } else {
                                                                                    echo 'Email to Client';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEMLCL1" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEMLCL1)) {
                                                                                echo $_oFEMLCL1;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Password Email to Client';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Password Email to Client';
                                                                                } else {
                                                                                    echo 'Password Email to Client';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFEMLCL2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFEMLCL2)) {
                                                                                echo $_oFEMLCL2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Person in Charge (PIC)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Person in Charge (PIC)';
                                                                                } else {
                                                                                    echo 'Person in Charge (PIC)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFHEADZ2" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oFHEADZ2)) {
                                                                                echo $_oFHEADZ2;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Hendled By';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Ditangani Oleh';
                                                                                } else {
                                                                                    echo 'Ditangani Oleh';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_edtFHANDLE" class="form-control" autofocus value="<?php
                                                                            if (!empty($_oXHANDLE)) {
                                                                                echo $_oXHANDLE;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Metode Perhitungan PPh Pasal 21';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Metode Perhitungan PPh Pasal 21';
                                                                                } else {
                                                                                    echo 'Metode Perhitungan PPh Pasal 21';
                                                                                };
                                                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                            </label>
                                                                            <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFCLCP21" required  oninvalid="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo "this.setCustomValidity('Please select an item in the list')";
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                            } else {
                                                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                            };
                                                                            ?>" onchange="setCustomValidity('')">
                                                                                <option value="<?php echo $_oFCLCP21; ?>"><?php
                                                                                    if ($_oFCLCP21 == 'gu') {
                                                                                        echo 'Gross-Up';
                                                                                    } elseif ($_oFCLCP21 == 'ng') {
                                                                                        echo 'Non Gross-Up';
                                                                                    } elseif ($_oFCLCP21 == 'nt') {
                                                                                        echo 'Nett';
                                                                                    };
                                                                                    ?></option>
                                                                                <option value="gu">Gross-Up</option>
                                                                                <option value="ng">Non Gross-Up</option>
                                                                                <!--
                                                                                <option value="nt">Nett</option>
                                                                                -->
                                                                            </select>
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
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_srvc') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_srvc">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_srvc : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_srvc') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_srvc/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPh 21';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPh 21';
                                                                                } else {
                                                                                    echo 'Untuk PPh 21';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV01" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV01 = $_tmpFSERVCE[0];
                                                                                if (!empty($_varFSERV01)) {
                                                                                    if ($_varFSERV01 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV01 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV02" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV02 = $_tmpFSERVCE[1];
                                                                                if (!empty($_varFSERV02)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV02);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV03" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV03 = $_tmpFSERVCE[2];
                                                                                if (!empty($_varFSERV03)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV03);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV04" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV04 = $_tmpFSERVCE[3];
                                                                                if (!empty($_varFSERV04)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV04);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPh 22';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPh 22';
                                                                                } else {
                                                                                    echo 'Untuk PPh 22';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV05" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV05 = $_tmpFSERVCE[4];
                                                                                if (!empty($_varFSERV05)) {
                                                                                    if ($_varFSERV05 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV05 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV06" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV06 = $_tmpFSERVCE[5];
                                                                                if (!empty($_varFSERV06)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV06);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV07" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV07 = $_tmpFSERVCE[6];
                                                                                if (!empty($_varFSERV07)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV07);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV08" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV08 = $_tmpFSERVCE[7];
                                                                                if (!empty($_varFSERV08)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV08);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPh 23';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPh 23';
                                                                                } else {
                                                                                    echo 'Untuk PPh 23';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV09" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV09 = $_tmpFSERVCE[8];
                                                                                if (!empty($_varFSERV09)) {
                                                                                    if ($_varFSERV09 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV09 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV10" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV10 = $_tmpFSERVCE[9];
                                                                                if (!empty($_varFSERV10)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV10);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV11" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV11 = $_tmpFSERVCE[10];
                                                                                if (!empty($_varFSERV11)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV11);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV12" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV12 = $_tmpFSERVCE[11];
                                                                                if (!empty($_varFSERV12)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV12);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPh 4(2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPh 4(2)';
                                                                                } else {
                                                                                    echo 'Untuk PPh 4(2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV13" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV13 = $_tmpFSERVCE[12];
                                                                                if (!empty($_varFSERV13)) {
                                                                                    if ($_varFSERV13 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV13 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV14" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV14 = $_tmpFSERVCE[13];
                                                                                if (!empty($_varFSERV14)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV14);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV15" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV15 = $_tmpFSERVCE[14];
                                                                                if (!empty($_varFSERV15)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV15);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV16" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV16 = $_tmpFSERVCE[15];
                                                                                if (!empty($_varFSERV16)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV16);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPh 25';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPh 25';
                                                                                } else {
                                                                                    echo 'Untuk PPh 25';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV17" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV17 = $_tmpFSERVCE[16];
                                                                                if (!empty($_varFSERV17)) {
                                                                                    if ($_varFSERV17 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV17 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV18" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV18 = $_tmpFSERVCE[17];
                                                                                if (!empty($_varFSERV18)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV18);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV19" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV19 = $_tmpFSERVCE[18];
                                                                                if (!empty($_varFSERV19)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV19);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV20" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV20 = $_tmpFSERVCE[19];
                                                                                if (!empty($_varFSERV20)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV20);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Untuk PPN';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Untuk PPN';
                                                                                } else {
                                                                                    echo 'Untuk PPN';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV21" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV21 = $_tmpFSERVCE[20];
                                                                                if (!empty($_varFSERV21)) {
                                                                                    if ($_varFSERV21 == 'y') {
                                                                                        echo 'Ya';
                                                                                    } elseif ($_varFSERV21 == 'n') {
                                                                                        echo 'Tidak';
                                                                                    }
                                                                                } else {
                                                                                    echo 'Tidak';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPN - Ditangani Oleh (1)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPN - Ditangani Oleh (1)';
                                                                                } else {
                                                                                    echo 'PPN - Ditangani Oleh (1)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV22" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV22 = $_tmpFSERVCE[21];
                                                                                if (!empty($_varFSERV22)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV22);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPN - Ditangani Oleh (2)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPN - Ditangani Oleh (2)';
                                                                                } else {
                                                                                    echo 'PPN - Ditangani Oleh (2)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV23" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV23 = $_tmpFSERVCE[22];
                                                                                if (!empty($_varFSERV23)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV23);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PPN - Ditangani Oleh (3)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'PPN - Ditangani Oleh (3)';
                                                                                } else {
                                                                                    echo 'PPN - Ditangani Oleh (3)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_viwFSERV24" class="form-control" readonly value="<?php
                                                                            if (!empty($_oFSERVCE)) {
                                                                                $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                $_varFSERV24 = $_tmpFSERVCE[23];
                                                                                if (!empty($_varFSERV24)) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tprofle');
                                                                                    $this->db->where('FCODEZZ', $_varFSERV24);

                                                                                    $_quePROFLE = $this->db->get();

                                                                                    if ($_quePROFLE->num_rows() > 0) {
                                                                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                            $_oStf = $_oRoz['FFULNME'];
                                                                                        }
                                                                                    }
                                                                                    echo $_oStf;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--- sk_srvc : EDT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_srvc') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_srvc/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_srvc'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button type="submit" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp/upd'; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                <div style="height: 0px;">
                                                                    <br>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPh 21';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPh 21';
                                                                                            } else {
                                                                                                echo 'Untuk PPh 21';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV01" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV01 = $_tmpFSERVCE[0];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV01; ?>"><?php
                                                                                                if ($_varFSERV01 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV01 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV02 = $_tmpFSERVCE[1];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV02);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPh 21 - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV02" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV03 = $_tmpFSERVCE[2];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV03);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPh 21 - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV03" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV04 = $_tmpFSERVCE[3];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV04);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPh 21 - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV04" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPh 22';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPh 22';
                                                                                            } else {
                                                                                                echo 'Untuk PPh 22';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV05" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV05 = $_tmpFSERVCE[4];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV05; ?>"><?php
                                                                                                if ($_varFSERV05 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV05 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV06 = $_tmpFSERVCE[5];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV06);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPh 22 - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV06" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV07 = $_tmpFSERVCE[6];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV07);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPh 22 - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV07" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV08 = $_tmpFSERVCE[7];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV08);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPh 22 - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV08" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPh 23';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPh 23';
                                                                                            } else {
                                                                                                echo 'Untuk PPh 23';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV09" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV09 = $_tmpFSERVCE[8];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV09; ?>"><?php
                                                                                                if ($_varFSERV09 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV09 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV10 = $_tmpFSERVCE[9];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV10);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPh 23 - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV10" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV11 = $_tmpFSERVCE[10];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV11);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPh 23 - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV11" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV12 = $_tmpFSERVCE[11];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV12);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPh 23 - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV12" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPh 4(2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPh 4(2)';
                                                                                            } else {
                                                                                                echo 'Untuk PPh 4(2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV13" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV13 = $_tmpFSERVCE[12];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV13; ?>"><?php
                                                                                                if ($_varFSERV13 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV13 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV14 = $_tmpFSERVCE[13];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV14);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV14" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV15 = $_tmpFSERVCE[14];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV15);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?> 
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV15" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV16 = $_tmpFSERVCE[15];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV16);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPh 4(2) - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV16" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPh 25';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPh 25';
                                                                                            } else {
                                                                                                echo 'Untuk PPh 25';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV17" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV17 = $_tmpFSERVCE[16];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV17; ?>"><?php
                                                                                                if ($_varFSERV17 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV17 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV18 = $_tmpFSERVCE[17];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV18);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPh 25 - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV18" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV19 = $_tmpFSERVCE[18];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV19);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPh 25 - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV19" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV20 = $_tmpFSERVCE[19];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV20);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPh 25 - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV20" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Untuk PPN';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Untuk PPN';
                                                                                            } else {
                                                                                                echo 'Untuk PPN';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV21" required>
                                                                                            <?php
                                                                                            $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                            $_varFSERV21 = $_tmpFSERVCE[20];
                                                                                            ?>
                                                                                            <option value="<?php echo $_varFSERV21; ?>"><?php
                                                                                                if ($_varFSERV21 == 'y') {
                                                                                                    echo 'Ya';
                                                                                                } elseif ($_varFSERV21 == 'n') {
                                                                                                    echo 'Tidak';
                                                                                                }
                                                                                                ?></option>
                                                                                            <option value="y">Ya</option>
                                                                                            <option value="n">Tidak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV22 = $_tmpFSERVCE[21];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV22);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPN - Ditangani Oleh (1)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPN - Ditangani Oleh (1)';
                                                                                            } else {
                                                                                                echo 'PPN - Ditangani Oleh (1)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV22" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV23 = $_tmpFSERVCE[22];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV23);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPN - Ditangani Oleh (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPN - Ditangani Oleh (2)';
                                                                                            } else {
                                                                                                echo 'PPN - Ditangani Oleh (2)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV23" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <?php
                                                                                        $_tmpFSERVCE = explode(';', $_oFSERVCE);
                                                                                        $_varFSERV24 = $_tmpFSERVCE[23];

                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tprofle');
                                                                                        $this->db->where('FCODEZZ', $_varFSERV24);

                                                                                        $_quePROFLE = $this->db->get();

                                                                                        if ($_quePROFLE->num_rows() > 0) {
                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                            }
                                                                                        } else {
                                                                                            $_oCod = ' ';
                                                                                            $_oNme = '';
                                                                                        }
                                                                                        ?>
                                                                                        <label class="sk_label_modification">
                                                                                            <?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPN - Ditangani Oleh (3)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPN - Ditangani Oleh (3)';
                                                                                            } else {
                                                                                                echo 'PPN - Ditangani Oleh (3)';
                                                                                            };
                                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                                        </label>
                                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSERV23" required>
                                                                                            <option value="<?php echo $_oCod; ?>"><?php echo $_oNme; ?></option>
                                                                                            <option value=" ">...</option>
                                                                                            <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tprofle');
                                                                                            $this->db->where('FCATGRY', 'staffz');

                                                                                            $_quePROFLE = $this->db->get();

                                                                                            foreach ($_quePROFLE->result_array() as $_oRoz) {
                                                                                                $_oCod = $_oRoz['FCODEZZ'];
                                                                                                $_oNme = $_oRoz['FFULNME'];
                                                                                                ?>
                                                                                                <option value="<?php
                                                                                                echo $_oCod;
                                                                                                ?>"><?php echo $_oNme; ?>
                                                                                                </option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_idwp') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_idwp">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_idwp : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_idwp') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                    <div class="col-lg-6">
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
                                                                            <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ1 = $_tmpFIDWPZZ[0];
                                                                                if (!empty($_varFIDWPZ1)) {
                                                                                    echo strtoupper($_varFIDWPZ1);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'NPWP';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'NPWP';
                                                                                } else {
                                                                                    echo 'NPWP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ2 = $_tmpFIDWPZZ[1];
                                                                                if (!empty($_varFIDWPZ2)) {
                                                                                    echo substr($_varFIDWPZ2, 0, 2) . '.' . substr($_varFIDWPZ2, 2, 3) . '.' . substr($_varFIDWPZ2, 5, 3) . '.' . substr($_varFIDWPZ2, 8, 1) . '-' . substr($_varFIDWPZ2, 9, 3) . '.' . substr($_varFIDWPZ2, 12, 3);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Business Type';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Jenis Usaha';
                                                                                } else {
                                                                                    echo 'Jenis Usaha';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ3 = $_tmpFIDWPZZ[2];
                                                                                if (!empty($_varFIDWPZ3)) {
                                                                                    echo strtoupper($_varFIDWPZ3);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification"><?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Domicile Address';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Alamat Tempat Kedudukan';
                                                                                } else {
                                                                                    echo 'Alamat Tempat Kedudukan';
                                                                                }
                                                                                ;
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <textarea rows="4" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ4 = $_tmpFIDWPZZ[3];
                                                                                    if (!empty($_varFIDWPZ4)) {
                                                                                        echo strtoupper(str_replace("_n_", "\n", trim($_varFIDWPZ4)));
                                                                                    } else {
                                                                                        echo '...';
                                                                                    }
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ;
                                                                                ?>
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Corporate Form';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Bentuk Badan';
                                                                                } else {
                                                                                    echo 'Bentuk Badan';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ5 = $_tmpFIDWPZZ[4];
                                                                                if (!empty($_varFIDWPZ5)) {
                                                                                    echo strtoupper($_varFIDWPZ5);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Telephone Number';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Telepon';
                                                                                } else {
                                                                                    echo 'Nomor Telepon';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ6 = $_tmpFIDWPZZ[5];
                                                                                if (!empty($_varFIDWPZ6)) {
                                                                                    echo $_varFIDWPZ6;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'DJP Online Email';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Email DJP Online';
                                                                                } else {
                                                                                    echo 'Email DJP Online';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFEMAILZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDWPZZ)) {
                                                                                $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                $_varFIDWPZ7 = $_tmpFIDWPZZ[6];
                                                                                if (!empty($_varFIDWPZ7)) {
                                                                                    echo $_varFIDWPZ7;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
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
                                            </div>
                                            <!--- sk_idwp : EDT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_idwp') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp/upd'; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                        <div class="col-lg-6">
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
                                                                                <input type="text" name="_edtFIDWPZ1" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ1 = $_tmpFIDWPZZ[0];
                                                                                    if (!empty($_varFIDWPZ1)) {
                                                                                        echo strtoupper($_varFIDWPZ1);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'NPWP';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'NPWP';
                                                                                    } else {
                                                                                        echo 'NPWP';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDWPZ2" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ2 = $_tmpFIDWPZZ[1];
                                                                                    if (!empty($_varFIDWPZ2)) {
                                                                                        echo substr($_varFIDWPZ2, 0, 2) . '.' . substr($_varFIDWPZ2, 2, 3) . '.' . substr($_varFIDWPZ2, 5, 3) . '.' . substr($_varFIDWPZ2, 8, 1) . '-' . substr($_varFIDWPZ2, 9, 3) . '.' . substr($_varFIDWPZ2, 12, 3);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Business Type';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Jenis Usaha';
                                                                                    } else {
                                                                                        echo 'Jenis Usaha';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDWPZ3" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ3 = $_tmpFIDWPZZ[2];
                                                                                    if (!empty($_varFIDWPZ3)) {
                                                                                        echo strtoupper($_varFIDWPZ3);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification"><?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Domicile Address';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Alamat Tempat Kedudukan';
                                                                                    } else {
                                                                                        echo 'Alamat Tempat Kedudukan';
                                                                                    }
                                                                                    ;
                                                                                    ?>&nbsp;:
                                                                                </label>
                                                                                <textarea rows="4" type="text" name="_edtFIDWPZ4" class="form-control" autofocus><?php
                                                                                    if (!empty($_oFIDWPZZ)) {
                                                                                        $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                        $_varFIDWPZ4 = $_tmpFIDWPZZ[3];
                                                                                        if (!empty($_varFIDWPZ4)) {
                                                                                            echo strtoupper(str_replace("_n_", "\n", trim($_varFIDWPZ4)));
                                                                                        } else {
                                                                                            echo '';
                                                                                        }
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                    ;
                                                                                    ?>
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Corporate Form';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Bentuk Badan';
                                                                                    } else {
                                                                                        echo 'Bentuk Badan';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDWPZ5" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ5 = $_tmpFIDWPZZ[4];
                                                                                    if (!empty($_varFIDWPZ5)) {
                                                                                        echo strtoupper($_varFIDWPZ5);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Telephone Number';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Nomor Telepon';
                                                                                    } else {
                                                                                        echo 'Nomor Telepon';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDWPZ6" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ6 = $_tmpFIDWPZZ[5];
                                                                                    if (!empty($_varFIDWPZ6)) {
                                                                                        echo $_varFIDWPZ6;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'DJP Online Email';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Email DJP Online';
                                                                                    } else {
                                                                                        echo 'Email DJP Online';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDWPZ7" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDWPZZ)) {
                                                                                    $_tmpFIDWPZZ = explode('|', $_oFIDWPZZ);
                                                                                    $_varFIDWPZ7 = $_tmpFIDWPZZ[6];
                                                                                    if (!empty($_varFIDWPZ7)) {
                                                                                        echo $_varFIDWPZ7;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
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
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_itax') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_itax">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_itax : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_itax') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                    <div class="col-lg-6">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Administration KPP';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'KPP Administrasi';
                                                                                } else {
                                                                                    echo 'KPP Administrasi';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFITAXZZ)) {
                                                                                $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                $_varFITAXZ1 = $_tmpFITAXZZ[0];
                                                                                if (!empty($_varFITAXZ1)) {
                                                                                    echo $_varFITAXZ1;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'KPP Telephone Number';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Telepon KPP';
                                                                                } else {
                                                                                    echo 'Nomor Telepon KPP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFITAXZZ)) {
                                                                                $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                $_varFITAXZ2 = $_tmpFITAXZZ[1];
                                                                                if (!empty($_varFITAXZ2)) {
                                                                                    echo $_varFITAXZ2;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Account Representative';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Account Representative';
                                                                                } else {
                                                                                    echo 'Account Representative';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFITAXZZ)) {
                                                                                $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                $_varFITAXZ3 = $_tmpFITAXZZ[2];
                                                                                if (!empty($_varFITAXZ3)) {
                                                                                    echo strtoupper($_varFITAXZ3);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'WP Status';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Status WP';
                                                                                } else {
                                                                                    echo 'Status WP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFITAXZZ)) {
                                                                                $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                $_varFITAXZ4 = $_tmpFITAXZZ[3];
                                                                                if (!empty($_varFITAXZ4)) {
                                                                                    echo $_varFITAXZ4;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'PKP Status';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Status PKP';
                                                                                } else {
                                                                                    echo 'Status PKP';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFITAXZZ)) {
                                                                                $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                $_varFITAXZ5 = $_tmpFITAXZZ[4];
                                                                                if (!empty($_varFITAXZ5)) {
                                                                                    echo $_varFITAXZ5;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Tax Obligations';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Kewajiban Perpajakan';
                                                                                } else {
                                                                                    echo 'Kewajiban Perpajakan';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <?php ?>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <?php
                                                                                    $_oMon = '1';
                                                                                    if (!empty($_oFITAXZZ)) {
                                                                                        $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                        $_varFITAXZ6 = $_tmpFITAXZZ[5];
                                                                                        $_tmpFCEKBOX = explode(';', $_varFITAXZ6);
                                                                                        $_varFCEKB01 = $_tmpFCEKBOX[0];
                                                                                        $_varFCEKB02 = $_tmpFCEKBOX[1];
                                                                                        $_varFCEKB03 = $_tmpFCEKBOX[2];
                                                                                        $_varFCEKB04 = $_tmpFCEKBOX[3];
                                                                                        $_varFCEKB05 = $_tmpFCEKBOX[4];
                                                                                        $_varFCEKB06 = $_tmpFCEKBOX[5];
                                                                                        $_varFCEKB07 = $_tmpFCEKBOX[6];
                                                                                        $_varFCEKB08 = $_tmpFCEKBOX[7];
                                                                                        $_varFCEKB09 = $_tmpFCEKBOX[8];
                                                                                        $_varFCEKB10 = $_tmpFCEKBOX[9];
                                                                                    } else {
                                                                                        echo '...';
                                                                                    }
                                                                                    ?>
                                                                                    <!--- PPh Pasal 15 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB01 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB01 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB01 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB01 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP15ZZZ" id="_cbxFP15ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB01 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB01 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 15';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 15';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 15';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 21 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB02 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB02 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB02 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB02 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP21ZZZ" id="_cbxFP21ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB02 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB02 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 21';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 21';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 21';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 22 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB03 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB03 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB03 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB03 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP22ZZZ" id="_cbxFP22ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB03 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB03 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 22';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 22';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 22';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 23 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB04 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB04 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB04 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB04 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP23ZZZ" id="_cbxFP23ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB04 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB04 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 23';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 23';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 23';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 25 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB05 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB05 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB05 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB05 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP25ZZZ" id="_cbxFP25ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB05 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB05 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 25';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 25';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 25';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 26 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB06 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB06 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB06 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB06 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP26ZZZ" id="_cbxFP26ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB06 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB06 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 26';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 26';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 26';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Pasal 29 --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB07 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB07 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB07 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB07 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP29ZZZ" id="_cbxFP29ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB07 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB07 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Pasal 29';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Pasal 29';
                                                                                            } else {
                                                                                                echo 'PPh Pasal 29';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Final Pasal 4(2) --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB08 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB08 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB08 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB08 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFP42ZZZ" id="_cbxFP42ZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB08 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB08 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Final Pasal 4 ayat (2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Final Pasal 4 ayat (2)';
                                                                                            } else {
                                                                                                echo 'PPh Final Pasal 4 ayat (2)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPh Final UMKM --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB09 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB09 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB09 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB09 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFPUMKMZ" id="_cbxFPUMKMZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB09 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB09 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh Final UMKM';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh Final UMKM';
                                                                                            } else {
                                                                                                echo 'PPh Final UMKM';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <!--- PPN --->
                                                                                    <div style="display: <?php
                                                                                    if ($_varFCEKB10 == 'N') {
                                                                                        echo 'none';
                                                                                    } elseif ($_varFCEKB10 == 'Y') {
                                                                                        echo 'block';
                                                                                    } else {
                                                                                        echo 'none';
                                                                                    };
                                                                                    ?>" class="<?php
                                                                                         if ($_varFCEKB10 == 'N') {
                                                                                             echo '';
                                                                                         } elseif ($_varFCEKB10 == 'Y') {
                                                                                             echo 'checkbox';
                                                                                         } else {
                                                                                             echo '';
                                                                                         };
                                                                                         ?> checkbox-success checkbox-circle">
                                                                                        <input name="_viwFPPNZZZ" id="_cbxFPPNZZZ" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEKB10 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEKB10 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?> disabled>
                                                                                        <label for="_cbxMONDAY"><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPN';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPN';
                                                                                            } else {
                                                                                                echo 'PPN';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                            </div>
                                            <!--- sk_itax : EDIT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_itax') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax/upd'; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                        <div class="col-lg-6">
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Administration KPP';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'KPP Administrasi';
                                                                                    } else {
                                                                                        echo 'KPP Administrasi';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFITAXZ1" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFITAXZZ)) {
                                                                                    $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                    $_varFITAXZ1 = $_tmpFITAXZZ[0];
                                                                                    if (!empty($_varFITAXZ1)) {
                                                                                        echo $_varFITAXZ1;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'KPP Telephone Number';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Nomor Telepon KPP';
                                                                                    } else {
                                                                                        echo 'Nomor Telepon KPP';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFITAXZ2" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFITAXZZ)) {
                                                                                    $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                    $_varFITAXZ2 = $_tmpFITAXZZ[1];
                                                                                    if (!empty($_varFITAXZ2)) {
                                                                                        echo $_varFITAXZ2;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Account Representative';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Account Representative';
                                                                                    } else {
                                                                                        echo 'Account Representative';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFITAXZ3" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFITAXZZ)) {
                                                                                    $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                    $_varFITAXZ3 = $_tmpFITAXZZ[2];
                                                                                    if (!empty($_varFITAXZ3)) {
                                                                                        echo strtoupper($_varFITAXZ3);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'WP Status';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Status WP';
                                                                                    } else {
                                                                                        echo 'Status WP';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFITAXZ4" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFITAXZZ)) {
                                                                                    $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                    $_varFITAXZ4 = $_tmpFITAXZZ[3];
                                                                                    if (!empty($_varFITAXZ4)) {
                                                                                        echo $_varFITAXZ4;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'PKP Status';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Status PKP';
                                                                                    } else {
                                                                                        echo 'Status PKP';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFITAXZ5" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFITAXZZ)) {
                                                                                    $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                    $_varFITAXZ5 = $_tmpFITAXZZ[4];
                                                                                    if (!empty($_varFITAXZ5)) {
                                                                                        echo $_varFITAXZ5;
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Tax Obligations';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Kewajiban Perpajakan';
                                                                                    } else {
                                                                                        echo 'Kewajiban Perpajakan';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <?php ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <?php
                                                                                        $_oMon = '1';
                                                                                        if (!empty($_oFITAXZZ)) {
                                                                                            $_tmpFITAXZZ = explode('|', $_oFITAXZZ);
                                                                                            $_varFITAXZ6 = $_tmpFITAXZZ[5];
                                                                                            $_tmpFCEKBOX = explode(';', $_varFITAXZ6);
                                                                                            $_varFCEKB01 = $_tmpFCEKBOX[0];
                                                                                            $_varFCEKB02 = $_tmpFCEKBOX[1];
                                                                                            $_varFCEKB03 = $_tmpFCEKBOX[2];
                                                                                            $_varFCEKB04 = $_tmpFCEKBOX[3];
                                                                                            $_varFCEKB05 = $_tmpFCEKBOX[4];
                                                                                            $_varFCEKB06 = $_tmpFCEKBOX[5];
                                                                                            $_varFCEKB07 = $_tmpFCEKBOX[6];
                                                                                            $_varFCEKB08 = $_tmpFCEKBOX[7];
                                                                                            $_varFCEKB09 = $_tmpFCEKBOX[8];
                                                                                            $_varFCEKB10 = $_tmpFCEKBOX[9];
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                        <!--- PPh Pasal 15 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP15ZZZ" id="_cbxFP15ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB01 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB01 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP15ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 15';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 15';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 15';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 21 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP21ZZZ" id="_cbxFP21ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB02 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB02 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP21ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 21';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 21';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 21';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 22 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP22ZZZ" id="_cbxFP22ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB03 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB03 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP22ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 22';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 22';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 22';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 23 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP23ZZZ" id="_cbxFP23ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB04 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB04 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP23ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 23';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 23';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 23';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 25 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP25ZZZ" id="_cbxFP25ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB05 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB05 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP25ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 25';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 25';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 25';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 26 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP26ZZZ" id="_cbxFP26ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB06 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB06 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP26ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 26';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 26';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 26';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Pasal 29 --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP29ZZZ" id="_cbxFP29ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB07 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB07 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP29ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Pasal 29';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Pasal 29';
                                                                                                } else {
                                                                                                    echo 'PPh Pasal 29';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Final Pasal 4(2) --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFP42ZZZ" id="_cbxFP42ZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB08 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB08 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFP42ZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Final Pasal 4 ayat (2)';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Final Pasal 4 ayat (2)';
                                                                                                } else {
                                                                                                    echo 'PPh Final Pasal 4 ayat (2)';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPh Final UMKM --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFPUMKMZ" id="_cbxFPUMKMZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB09 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB09 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFPUMKMZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPh Final UMKM';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPh Final UMKM';
                                                                                                } else {
                                                                                                    echo 'PPh Final UMKM';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                        <!--- PPN --->
                                                                                        <div class="checkbox checkbox-success checkbox-circle">
                                                                                            <input name="_edtFPPNZZZ" id="_cbxFPPNZZZ" class="styled" type="checkbox" <?php
                                                                                            if ($_varFCEKB10 == 'N') {
                                                                                                echo '';
                                                                                            } elseif ($_varFCEKB10 == 'Y') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            };
                                                                                            ?>>
                                                                                            <label for="_cbxFPPNZZZ"><?php
                                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                                    echo 'PPN';
                                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                    echo 'PPN';
                                                                                                } else {
                                                                                                    echo 'PPN';
                                                                                                };
                                                                                                ?></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_idpj') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_idpj">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_idpj : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_idpj') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                    <div class="col-lg-6">
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
                                                                            <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDPJZZ)) {
                                                                                $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                $_varFIDPJZ1 = $_tmpFIDPJZZ[0];
                                                                                if (!empty($_varFIDPJZ1)) {
                                                                                    echo strtoupper($_varFIDPJZ1);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nomor Induk Kependudukan (NIK)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Induk Kependudukan (NIK)';
                                                                                } else {
                                                                                    echo 'Nomor Induk Kependudukan (NIK)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDPJZZ)) {
                                                                                $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                $_varFIDPJZ2 = $_tmpFIDPJZZ[1];
                                                                                if (!empty($_varFIDPJZ2)) {
                                                                                    echo strtoupper($_varFIDPJZ2);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                } else {
                                                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDPJZZ)) {
                                                                                $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                $_varFIDPJZ3 = $_tmpFIDPJZZ[2];
                                                                                if (!empty($_varFIDPJZ3)) {
                                                                                    echo strtoupper($_varFIDPJZ3);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Position';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Jabatan';
                                                                                } else {
                                                                                    echo 'Jabatan';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDPJZZ)) {
                                                                                $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                $_varFIDPJZ4 = $_tmpFIDPJZZ[3];
                                                                                if (!empty($_varFIDPJZ4)) {
                                                                                    echo strtoupper($_varFIDPJZ4);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nationality';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Kebangsaan';
                                                                                } else {
                                                                                    echo 'Kebangsaan';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFIDPJZZ)) {
                                                                                $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                $_varFIDPJZ5 = $_tmpFIDPJZZ[4];
                                                                                if (!empty($_varFIDPJZ5)) {
                                                                                    echo strtoupper($_varFIDPJZ5);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification"><?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Alamat PJ Badan';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Alamat PJ Badan';
                                                                                } else {
                                                                                    echo 'Alamat PJ Badan';
                                                                                }
                                                                                ;
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <textarea rows="7" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ6 = $_tmpFIDPJZZ[5];
                                                                                    if (!empty($_varFIDPJZ6)) {
                                                                                        echo strtoupper(str_replace("_n_", "\n", trim($_varFIDPJZ6)));
                                                                                    } else {
                                                                                        echo '...';
                                                                                    }
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ;
                                                                                ?></textarea>
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
                                            </div>
                                            <!--- sk_idpj : EDIT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_idpj') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj/upd'; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                        <div class="col-lg-6">
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
                                                                                <input type="text" name="_edtFIDPJZ1" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ1 = $_tmpFIDPJZZ[0];
                                                                                    if (!empty($_varFIDPJZ1)) {
                                                                                        echo strtoupper($_varFIDPJZ1);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Nomor Induk Kependudukan (NIK)';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Nomor Induk Kependudukan (NIK)';
                                                                                    } else {
                                                                                        echo 'Nomor Induk Kependudukan (NIK)';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDPJZ2" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ2 = $_tmpFIDPJZZ[1];
                                                                                    if (!empty($_varFIDPJZ2)) {
                                                                                        echo strtoupper($_varFIDPJZ2);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                    } else {
                                                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDPJZ3" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ3 = $_tmpFIDPJZZ[2];
                                                                                    if (!empty($_varFIDPJZ3)) {
                                                                                        echo strtoupper($_varFIDPJZ3);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Position';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Jabatan';
                                                                                    } else {
                                                                                        echo 'Jabatan';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDPJZ4" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ4 = $_tmpFIDPJZZ[3];
                                                                                    if (!empty($_varFIDPJZ4)) {
                                                                                        echo strtoupper($_varFIDPJZ4);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Nationality';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Kebangsaan';
                                                                                    } else {
                                                                                        echo 'Kebangsaan';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFIDPJZ5" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFIDPJZZ)) {
                                                                                    $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                    $_varFIDPJZ5 = $_tmpFIDPJZZ[4];
                                                                                    if (!empty($_varFIDPJZ5)) {
                                                                                        echo strtoupper($_varFIDPJZ5);
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification"><?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Alamat PJ Badan';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Alamat PJ Badan';
                                                                                    } else {
                                                                                        echo 'Alamat PJ Badan';
                                                                                    }
                                                                                    ;
                                                                                    ?>&nbsp;:
                                                                                </label>
                                                                                <textarea rows="7" type="text" name="_edtFIDPJZ6" class="form-control" autofocus ><?php
                                                                                    if (!empty($_oFIDPJZZ)) {
                                                                                        $_tmpFIDPJZZ = explode('|', $_oFIDPJZZ);
                                                                                        $_varFIDPJZ6 = $_tmpFIDPJZZ[5];
                                                                                        if (!empty($_varFIDPJZ6)) {
                                                                                            echo strtoupper(str_replace("_n_", "\n", trim($_varFIDPJZ6)));
                                                                                        } else {
                                                                                            echo '';
                                                                                        }
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                    ;
                                                                                    ?></textarea>
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
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'sk_dkpn') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="sk_dkpn">

                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_dkpn : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'sk_dkpn') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?>  col-lg-12">

                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                            } else {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNPWPDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFNPWPDC)) {
                                                                                echo $_oFNPWPDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                            } else {
                                                                                echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFSKTXDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFSKTXDC)) {
                                                                                echo $_oFSKTXDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                            } else {
                                                                                echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFPKPXDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFPKPXDC)) {
                                                                                echo $_oFPKPXDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                            } else {
                                                                                echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFTDPXDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFTDPXDC)) {
                                                                                echo $_oFTDPXDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                            } else {
                                                                                echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFSIUPDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFSIUPDC)) {
                                                                                echo $_oFSIUPDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                            } else {
                                                                                echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNIBXDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFNIBXDC)) {
                                                                                echo $_oFNIBXDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            } else {
                                                                                echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFAKPNDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFAKPNDC)) {
                                                                                echo $_oFAKPNDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            } else {
                                                                                echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFAKPRDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFAKPRDC)) {
                                                                                echo $_oFAKPRDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Akta Sewa/Pinjam Pakai';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Akta Sewa/Pinjam Pakai';
                                                                            } else {
                                                                                echo 'Akta Sewa/Pinjam Pakai';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFAKSPDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFAKSPDC)) {
                                                                                echo $_oFAKSPDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas)</font>';
                                                                            } else {
                                                                                echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFSKBXDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFSKBXDC)) {
                                                                                echo $_oFSKBXDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                            } else {
                                                                                echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFSERTDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFSERTDC)) {
                                                                                echo $_oFSERTDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                            } else {
                                                                                echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFSKDUDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFSKDUDC)) {
                                                                                echo $_oFSKDUDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                            } else {
                                                                                echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFEFINDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFEFINDC)) {
                                                                                echo $_oFEFINDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                            } else {
                                                                                echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFKDIRDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFKDIRDC)) {
                                                                                echo $_oFKDIRDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">    
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                            } else {
                                                                                echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-btn">
                                                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNDIRDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'View Document';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Lihat Dokumen';
                                                                                } else {
                                                                                    echo 'Lihat Dokumen';
                                                                                }
                                                                                ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFNDIRDC)) {
                                                                                echo $_oFNDIRDC;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12" style="display: none">
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nomor Akta';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Akta';
                                                                                } else {
                                                                                    echo 'Nomor Akta';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFDKPNZZ)) {
                                                                                $_tmpFDKPNZZ = explode('|', $_oFDKPNZZ);
                                                                                $_varFDKPNZ1 = $_tmpFDKPNZZ[0];
                                                                                if (!empty($_varFDKPNZ1)) {
                                                                                    echo $_varFDKPNZ1;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Tempat Akta';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Tempat Akta';
                                                                                } else {
                                                                                    echo 'Tempat Akta';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFDKPNZZ)) {
                                                                                $_tmpFDKPNZZ = explode('|', $_oFDKPNZZ);
                                                                                $_varFDKPNZ2 = $_tmpFDKPNZZ[1];
                                                                                if (!empty($_varFDKPNZ2)) {
                                                                                    echo $_varFDKPNZ2;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nama Notaris';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nama Notaris';
                                                                                } else {
                                                                                    echo 'Nama Notaris';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFDKPNZZ)) {
                                                                                $_tmpFDKPNZZ = explode('|', $_oFDKPNZZ);
                                                                                $_varFDKPNZ3 = $_tmpFDKPNZZ[2];
                                                                                if (!empty($_varFDKPNZ3)) {
                                                                                    echo $_varFDKPNZ3;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>">
                                                                        </div>
                                                                        <div>
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Nomor Akta Perubahan';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Nomor Akta Perubahan';
                                                                                } else {
                                                                                    echo 'Nomor Akta Perubahan';
                                                                                };
                                                                                ?><font color="#000000">&nbsp;:</font>
                                                                            </label>
                                                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFDKPNZZ)) {
                                                                                $_tmpFDKPNZZ = explode('|', $_oFDKPNZZ);
                                                                                $_varFDKPNZ4 = $_tmpFDKPNZZ[3];
                                                                                if (!empty($_varFDKPNZ4)) {
                                                                                    echo $_varFDKPNZ4;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
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
                                                    <div style="height: 0px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--- sk_dkpn : EDIT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'sk_dkpn') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn/upd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn/upd'; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                            <input type="file" id="_fleFNPWPZZ" name="_fleFNPWPZZ" style="display: none" onchange="document.getElementById('_edtFNPWPZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                                } else {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFNPWPZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFNPWPZZ" name="_edtFNPWPZZ" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFSKTXDC" name="_fleFSKTXDC" style="display: none" onchange="document.getElementById('_edtFSKTXDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                                } else {
                                                                                    echo 'SKT <font style="color: #808080">(Surat Keterangan Terdaftar)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFSKTXDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFSKTXDC" name="_edtFSKTXDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFSKTXDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFPKPXDC" name="_fleFPKPXDC" style="display: none" onchange="document.getElementById('_edtFPKPXDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                                } else {
                                                                                    echo 'SPPKP <font style="color: #808080">(Surat Pengukuhan Pengusaha Kena Pajak)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFPKPXDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFPKPXDC" name="_edtFPKPXDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFPKPXDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFTDPXDC" name="_fleFTDPXDC" style="display: none" onchange="document.getElementById('_edtFTDPXDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                                } else {
                                                                                    echo 'TDP <font style="color: #808080">(Tanda Daftar Perusahaan)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFTDPXDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFTDPXDC" name="_edtFTDPXDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFTDPXDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFSIUPDC" name="_fleFSIUPDC" style="display: none" onchange="document.getElementById('_edtFSIUPDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                                } else {
                                                                                    echo 'SIUP <font style="color: #808080">(Surat Ijin Usaha Perdagangan)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFSIUPDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFSIUPDC" name="_edtFSIUPDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFSIUPDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFNIBXDC" name="_fleFNIBXDC" style="display: none" onchange="document.getElementById('_edtFNIBXDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                                } else {
                                                                                    echo 'NIB <font style="color: #808080">(Nomor Induk Berusaha)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFNIBXDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFNIBXDC" name="_edtFNIBXDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNIBXDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFAKPNDC" name="_fleFAKPNDC" style="display: none" onchange="document.getElementById('_edtFAKPNDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                } else {
                                                                                    echo 'Akta Pendirian Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFAKPNDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFAKPNDC" name="_edtFAKPNDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFAKPNDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFAKPRDC" name="_fleFAKPRDC" style="display: none" onchange="document.getElementById('_edtFAKPRDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                } else {
                                                                                    echo 'Akta Perubahan Perusahaan <font style="color: #808080">(lengkap dengan SK Kemenhukam)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFAKPRDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFAKPRDC" name="_edtFAKPRDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFAKPRDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFAKSPDC" name="_fleFAKSPDC" style="display: none" onchange="document.getElementById('_edtFAKSPDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'Akta Sewa/Pinjam Pakai';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'Akta Sewa/Pinjam Pakai';
                                                                                } else {
                                                                                    echo 'Akta Sewa/Pinjam Pakai';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFAKSPDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFAKSPDC" name="_edtFAKSPDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFAKSPDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFSKBXDC" name="_fleFSKBXDC" style="display: none" onchange="document.getElementById('_edtFSKBXDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas) </font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas) </font>';
                                                                                } else {
                                                                                    echo 'SKB <font style="color: #808080">(Surat Keterangan Bebas) </font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFSKBXDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFSKBXDC" name="_edtFSKBXDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFSKBXDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFSERTDC" name="_fleFSERTDC" style="display: none" onchange="document.getElementById('_edtFSERTDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                                } else {
                                                                                    echo 'SerTel <font style="color: #808080">(Sertifikat Elektronik)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFSERTDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFSERTDC" name="_edtFSERTDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFSERTDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFSKDUDC" name="_fleFSKDUDC" style="display: none" onchange="document.getElementById('_edtFSKDUDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                                } else {
                                                                                    echo 'SKDU <font style="color: #808080">(Surat Keterangan Domisili Usaha)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFSKDUDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFSKDUDC" name="_edtFSKDUDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFSKDUDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFEFINDC" name="_fleFEFINDC" style="display: none" onchange="document.getElementById('_edtFEFINDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                                } else {
                                                                                    echo 'EFIN <font style="color: #808080">(Electronic Filing Identification Number)</font>';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFEFINDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFEFINDC" name="_edtFEFINDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFEFINDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFKDIRDC" name="_fleFKDIRDC" style="display: none" onchange="document.getElementById('_edtFKDIRDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                                } else {
                                                                                    echo 'KTP <font style="color: #808080">(Kartu Tanda Penduduk)</font> Direktur';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFKDIRDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFKDIRDC" name="_edtFKDIRDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFKDIRDC; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <input type="file" id="_fleFNDIRDC" name="_fleFNDIRDC" style="display: none" onchange="document.getElementById('_edtFNDIRDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp,application/pdf">
                                                                            <label class="sk_label_modification">
                                                                                <?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                                } else {
                                                                                    echo 'NPWP <font style="color: #808080">(Nomor Pokok Wajib Pajak)</font> Direktur';
                                                                                };
                                                                                ?>&nbsp;:
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-btn">
                                                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Upload Document';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Unggah Dokumen';
                                                                                    } else {
                                                                                        echo 'Unggah Dokumen';
                                                                                    }
                                                                                    ?>" onclick="document.getElementById('_fleFNDIRDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                    </a>
                                                                                </span>
                                                                                <input type="text" id="_edtFNDIRDC" name="_edtFNDIRDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNDIRDC; ?>">
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
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
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
        case "cmp1dt";
            ?>
            <?php
            $_oFRECNMB = $_varREFEMP['0']['FRECNMB'];
            $_oFCODEZZ = $_varREFEMP['0']['FCODEZZ'];
            $_oFFULNME = $_varREFEMP['0']['FFULNME'];
            $_oFTYPEZZ = $_varREFEMP['0']['FTYPEZZ'];
            $_oFEFINZZ = $_varREFEMP['0']['FEFINZZ'];
            $_oFNPWPZZ = $_varREFEMP['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_varREFEMP['0']['FKLUZZZ'];
            $_oFADDRES = $_varREFEMP['0']['FADDRES'];
            $_oFTELPON = $_varREFEMP['0']['FTELPON'];
            $_oFFAXIML = $_varREFEMP['0']['FFAXIML'];
            $_oFEMAILZ = $_varREFEMP['0']['FEMAILZ'];
            $_oFHEADZZ = $_varREFEMP['0']['FHEADZZ'];
            $_oFHANDLE = $_varREFEMP['0']['FHANDLE'];
            $_oFNPWPDC = $_varREFEMP['0']['FNPWPDC'];
            $_oFPKPXDC = $_varREFEMP['0']['FPKPXDC'];
            $_oXHANDLE = $_varREFEMP['0']['XHANDLE'];
            $_oXCODEZZ = $_varREFEMP['0']['XCODEZZ'];
            $_oXDESCRP = $_varREFEMP['0']['XDESCRP'];


            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
            ?>
            <form action="<?php echo base_url(), 'NocREFEMP/cfcACTREFEMP/cmp1pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">                 
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-left">
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocREFEMP/cfcACTREFEMP/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocREFCMP/cfcACTREFCMP/cmp1pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>" style="background-color: #6cc644"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                            &nbsp;
                        </div>
                    </div>
                    <div class="box-body">
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
                                                echo 'Profile Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Profil';
                                            } else {
                                                echo 'Kode Profil';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
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
                                                echo 'Client Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Klien';
                                            } else {
                                                echo 'Nama Klien';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFFULNME" class="form-control" autofocus value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } else {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFEFINZZ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFEFINZZ)) {
                                                echo $_oFEFINZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Maritl Status - Dependents';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status Kawin - Tanggungan';
                                                } else {
                                                    echo 'Status Kawin - Tanggungan';
                                                }
                                                ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <select id="_edtFHANDLE" class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFMARITL" required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please select an item in the list')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                            } else {
                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                            };
                                            ?>">
                                                <option value="<?php echo $_oXCODEZZ; ?>"><?php echo $_oXDESCRP; ?></option>
                                                <?php foreach ($_varMARITL as $_oRow) { ?>
                                                    <option value="<?php echo $_oRow['FCODEZZ']; ?>"><?php echo $_oRow['FDESCRP']; ?></option>;
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Status';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status NPWP';
                                                } else {
                                                    echo 'Status NPWP';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFNPWPZ1" required  oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please select an item in the list')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                            } else {
                                                echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                            };
                                            ?>" onchange="setCustomValidity('')">
                                                        <?php
                                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                                        ?>
                                                        <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                    <option value="<?php echo $_xFNPWPZZ; ?>"><?php
                                                        if ($_xFNPWPZZ == 'Y') {
                                                            echo 'Have NPWP';
                                                        } elseif ($_xFNPWPZZ == 'N') {
                                                            echo 'No NPWP';
                                                        } else {
                                                            echo 'No NPWP';
                                                        };
                                                        ?></option>
                                                    <option value="N">No NPWP</option>
                                                    <option value="Y">Have NPWP</option>
                                                <?php } elseif ($_sesFLNGAGE == 'ina') {
                                                    ?>
                                                    <option value="<?php echo $_xFNPWPZZ; ?>"><?php
                                                        if ($_xFNPWPZZ == 'Y') {
                                                            echo 'Memiliki NPWP';
                                                        } elseif ($_xFNPWPZZ == 'N') {
                                                            echo 'Tidak Memiliki NPWP';
                                                        } else {
                                                            echo 'Tidak Memiliki NPWP';
                                                        };
                                                        ?></option>
                                                    <option value="N">Tidak Memiliki NPWP</option>
                                                    <option value="Y">Memiliki NPWP</option>
                                                <?php } else {
                                                    ?>
                                                    <option value="<?php echo $_xFNPWPZZ; ?>"><?php
                                                        if ($_xFNPWPZZ == 'Y') {
                                                            echo 'Memiliki NPWP';
                                                        } elseif ($_xFNPWPZZ == 'N') {
                                                            echo 'Tidak Memiliki NPWP';
                                                        } else {
                                                            echo 'Tidak Memiliki NPWP';
                                                        };
                                                        ?></option>
                                                    <option value="N">Tidak Memiliki NPWP</option>
                                                    <option value="Y">Memiliki NPWP</option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } else {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFNPWPZ2" class="form-control" data-masked-input="99.999.999.9-999.999" autofocus value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                if (!empty($_sFNPWPZZ[1])) {
                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                } else {
                                                    echo '';
                                                }
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>


                                    </div>
                                    <div>    
                                        <input type="file" id="_efiFNPWPZZ" name="_efiFNPWPZZ" style="display: none" onchange="document.getElementById('_edtFNPWPZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Document';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Dokumen NPWP';
                                            } else {
                                                echo 'Dokumen NPWP';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Upload Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Unggah Dokumen';
                                                } else {
                                                    echo 'Unggah Dokumen';
                                                }
                                                ?>" onclick="document.getElementById('_efiFNPWPZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                </a>
                                            </span>
                                            <input type="text" id="_edtFNPWPZZ" name="_edtFNPWPZZ" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <textarea rows="7" type="text" name="_edtFADDRES" class="form-control" autofocus ><?php
                                                if (!empty($_oFADDRES)) {
                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                } else {
                                                    echo '';
                                                }
                                                ;
                                                ?>
                                            </textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Telepon';
                                                } else {
                                                    echo 'No. Telepon';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFTELPON" class="form-control" autofocus value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Hendled By';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Ditangani Oleh';
                                                } else {
                                                    echo 'Ditangani Oleh';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFHANDLE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oXHANDLE)) {
                                                echo $_oXHANDLE;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="row">

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
        case "cmp1dt_main" :
            ?>
            <?php
            $_oFRECNMB = $_tblCMP1DT_MAIN['0']['FRECNMB'];
            $_oFCODEZZ = $_tblCMP1DT_MAIN['0']['FCODEZZ'];
            $_oFFULNME = $_tblCMP1DT_MAIN['0']['FFULNME'];
            $_oFTYPEZZ = $_tblCMP1DT_MAIN['0']['FTYPEZZ'];
            $_oFEFINZZ = $_tblCMP1DT_MAIN['0']['FEFINZZ'];
            $_oFNPWPZZ = $_tblCMP1DT_MAIN['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_tblCMP1DT_MAIN['0']['FKLUZZZ'];
            $_oFADDRES = $_tblCMP1DT_MAIN['0']['FADDRES'];
            $_oFTELPON = $_tblCMP1DT_MAIN['0']['FTELPON'];
            $_oFFAXIML = $_tblCMP1DT_MAIN['0']['FFAXIML'];
            $_oFEMAILZ = $_tblCMP1DT_MAIN['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblCMP1DT_MAIN['0']['FHEADZZ'];
            $_oFHANDLE = $_tblCMP1DT_MAIN['0']['FHANDLE'];
            $_oFNPWPDC = $_tblCMP1DT_MAIN['0']['FNPWPDC'];
            $_oFPKPXDC = $_tblCMP1DT_MAIN['0']['FPKPXDC'];
            $_oXHANDLE = $_tblCMP1DT_MAIN['0']['XHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Cancel';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Batal';
                            } else {
                                echo 'Batal';
                            };
                            ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                            <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocREFCMP/cfcACTREFCMP/cmpupd/' . $_oFRECNMB; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Save';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Simpan';
                            } else {
                                echo 'Simpan';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>
                        </div>
                        <div class="pull-right">

                            &nbsp;
                        </div>
                    </div>
                    <div class="box-body">
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
                                                echo 'Profile Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Profil';
                                            } else {
                                                echo 'Kode Profil';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFCODEZZ)) {
                                            echo $_oFCODEZZ;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Company Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Perusahaan';
                                            } else {
                                                echo 'Nama Perusahaan';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>

                                        <input type="text" name="_edtFFULNME" class="form-control" autofocus value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '';
                                        }
                                        ?>" required oninvalid="<?php
                                               if ($_sesFLNGAGE == 'eng') {
                                                   echo "this.setCustomValidity('Please fill out this field')";
                                               } elseif ($_sesFLNGAGE == 'ina') {
                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                               } else {
                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                               };
                                               ?>" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="hidden">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status NPWP';
                                            } else {
                                                echo 'Status NPWP';
                                            };
                                            ?><font color="#000000">&nbsp;:</font> <?php ?>
                                        </label>
                                        <input type="text" name="_edtFNPWPZ1" class="form-control" autofocus readonly value="<?php
                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                        if (!empty($_xFNPWPZZ)) {
                                            if ($_xFNPWPZZ == 'N') {
                                                echo 'Tidak memiliki NPWP';
                                            } elseif ($_xFNPWPZZ == 'Y') {
                                                echo 'Memiliki NPWP';
                                            }
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } else {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFEFINZZ" class="form-control" autofocus data-masked-input="9999999999" value="<?php
                                            if (!empty($_oFEFINZZ)) {
                                                echo $_oFEFINZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } else {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFNPWPZ2" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                if (!empty($_sFNPWPZZ[1])) {
                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                } else {
                                                    echo '?';
                                                }
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } else {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFKLUZZZ" class="form-control" autofocus data-masked-input="99999" value="<?php
                                            if (!empty($_oFKLUZZZ)) {
                                                echo $_oFKLUZZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <textarea rows="4" type="text" name="_edtFADDRES" class="form-control" autofocus><?php
                                                if (!empty($_oFADDRES)) {
                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                } else {
                                                    echo '';
                                                }
                                                ;
                                                ?></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Telepon';
                                                } else {
                                                    echo 'No. Telepon';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFTELPON" class="form-control" autofocus value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Faximile Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Faksimile';
                                                } else {
                                                    echo 'No. Faksimile';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFFAXIML" class="form-control" autofocus value="<?php
                                            if (!empty($_oFFAXIML)) {
                                                echo $_oFFAXIML;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company Head';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Pimpinan Perusahaan';
                                                } else {
                                                    echo 'Pimpinan Perusahaan';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFHEADZZ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFHEADZZ)) {
                                                echo $_oFHEADZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Hendled By';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Ditangani Oleh';
                                                } else {
                                                    echo 'Ditangani Oleh';
                                                }
                                                ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oXHANDLE)) {
                                                echo $_oXHANDLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="file" id="_efiFNPWPZZ" name="_efiFNPWPZZ" style="display: none" onchange="document.getElementById('_edtFNPWPZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen NPWP';
                                                } else {
                                                    echo 'Dokumen NPWP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Upload Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Unggah Dokumen';
                                                    } else {
                                                        echo 'Unggah Dokumen';
                                                    }
                                                    ?>" onclick="document.getElementById('_efiFNPWPZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                                <input type="text" id="_edtFNPWPZZ" name="_edtFNPWPZZ" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="file" id="_efiFPKPZZZ" name="_efiFPKPZZZ" style="display: none" onchange="document.getElementById('_edtFPKPZZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PKP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PKP';
                                                } else {
                                                    echo 'Dokumen PKP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Upload Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Unggah Dokumen';
                                                    } else {
                                                        echo 'Unggah Dokumen';
                                                    }
                                                    ?>" onclick="document.getElementById('_efiFPKPZZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                                <input type="text" id="_edtFPKPZZZ" name="_edtFPKPZZZ" class="form-control" style="background-color: #ffffff" readonly value="<?php echo $_oFPKPXDC; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 20px;">
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            /* --- 6 : PRFUPD --- */
            break;
        case "cmp1pd";
            ?>
            <?php
            break;
        /* --- #user : employee delete--- */
        case "cmp1el" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR006/cmplst') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
        case "cmp2iw" :
            ?>
            <?php
            $_oFRECNMB = $_tblCOMPNY['0']['FRECNMB'];
            $_oFCODEZZ = $_tblCOMPNY['0']['FCODEZZ'];
            $_oFFULNME = $_tblCOMPNY['0']['FFULNME'];
            $_oFTYPEZZ = $_tblCOMPNY['0']['FTYPEZZ'];
            $_oFEFINZZ = $_tblCOMPNY['0']['FEFINZZ'];
            $_oFNPWPZZ = $_tblCOMPNY['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_tblCOMPNY['0']['FKLUZZZ'];
            $_oFADDRES = $_tblCOMPNY['0']['FADDRES'];
            $_oFTELPON = $_tblCOMPNY['0']['FTELPON'];
            $_oFFAXIML = $_tblCOMPNY['0']['FFAXIML'];
            $_oFEMAILZ = $_tblCOMPNY['0']['FEMAILZ'];

            $_oFHEADZZ = $_tblCOMPNY['0']['FHEADZZ'];
            $_xFHEADZZ = explode(';', $_oFHEADZZ);
            $_oFHEADZ1 = $_xFHEADZZ[0];
            $_oFHEADZ2 = $_xFHEADZZ[1];

            $_oFHANDLE = $_tblCOMPNY['0']['FHANDLE'];
            $_oFNPWPDC = $_tblCOMPNY['0']['FNPWPDC'];
            $_oFPKPXDC = $_tblCOMPNY['0']['FPKPXDC'];
            $_oXHANDLE = $_tblCOMPNY['0']['XHANDLE'];

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
                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2dt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                echo 'Profile Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Profil';
                                            } else {
                                                echo 'Kode Profil';
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
                                                echo 'Company Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Perusahaan';
                                            } else {
                                                echo 'Nama Perusahaan';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="hidden">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status NPWP';
                                            } else {
                                                echo 'Status NPWP';
                                            };
                                            ?><font color="#000000">&nbsp;:</font> <?php ?>
                                        </label>
                                        <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                        if (!empty($_xFNPWPZZ)) {
                                            if ($_xFNPWPZZ == 'N') {
                                                echo 'Tidak memiliki NPWP';
                                            } elseif ($_xFNPWPZZ == 'Y') {
                                                echo 'Memiliki NPWP';
                                            }
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                } else {
                                                    echo 'Electronic Filing Identification Number (EFIN)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFEFINZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEFINZZ)) {
                                                echo $_oFEFINZZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                } else {
                                                    echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                if (!empty($_sFNPWPZZ[1])) {
                                                    echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                } else {
                                                    echo '?';
                                                }
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                } else {
                                                    echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFKLUZZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFKLUZZZ)) {
                                                echo $_oFKLUZZZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <textarea rows="4" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                if (!empty($_oFADDRES)) {
                                                    echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>
                                            </textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Telephone Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Telepon';
                                                } else {
                                                    echo 'No. Telepon';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFTELPON" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFTELPON)) {
                                                echo $_oFTELPON;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Faximile Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Faksimile';
                                                } else {
                                                    echo 'No. Faksimile';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFFAXIML" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFFAXIML)) {
                                                echo $_oFFAXIML;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <input type="text" name="_finFEMAILZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEMAILZ)) {
                                                echo $_oFEMAILZ;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company Head';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Pimpinan Perusahaan';
                                                } else {
                                                    echo 'Pimpinan Perusahaan';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFHEADZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFHEADZ1)) {
                                                echo $_oFHEADZ1;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Hendled By';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Ditangani Oleh';
                                                } else {
                                                    echo 'Ditangani Oleh';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oXHANDLE)) {
                                                echo $_oXHANDLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen NPWP';
                                                } else {
                                                    echo 'Dokumen NPWP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNPWPDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat Dokumen';
                                                    } else {
                                                        echo 'Lihat Dokumen';
                                                    }
                                                    ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFNPWPDC)) {
                                                    echo $_oFNPWPDC;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PKP Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PKP';
                                                } else {
                                                    echo 'Dokumen PKP';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="#_objMDLDOC" role="button" id="<?php echo $_oFPKPXDC;
                                                ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
                                                       if ($_sesFLNGAGE == 'eng') {
                                                           echo 'View Document';
                                                       } elseif ($_sesFLNGAGE == 'ina') {
                                                           echo 'Lihat Dokumen';
                                                       } else {
                                                           echo 'Lihat Dokumen';
                                                       }
                                                       ?>"><font style="color: #bd2c00"><i class="fas fa-search-plus fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFPKPXDC)) {
                                                    echo $_oFPKPXDC;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
                                        </div>
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
            /* --- 5 : PRFEDT --- */
            break;
        case "cmp2dt" :
            ?>
            <?php
            $_oFRECNMB = $_tblCOMPNY['0']['FRECNMB'];
            $_oFCODEZZ = $_tblCOMPNY['0']['FCODEZZ'];
            $_oFFULNME = $_tblCOMPNY['0']['FFULNME'];
            $_oFTYPEZZ = $_tblCOMPNY['0']['FTYPEZZ'];
            $_oFEFINZZ = $_tblCOMPNY['0']['FEFINZZ'];
            $_oFNPWPZZ = $_tblCOMPNY['0']['FNPWPZZ'];
            $_oFKLUZZZ = $_tblCOMPNY['0']['FKLUZZZ'];
            $_oFADDRES = $_tblCOMPNY['0']['FADDRES'];
            $_oFTELPON = $_tblCOMPNY['0']['FTELPON'];
            $_oFFAXIML = $_tblCOMPNY['0']['FFAXIML'];
            $_oFEMAILZ = $_tblCOMPNY['0']['FEMAILZ'];

            $_oFHEADZZ = $_tblCOMPNY['0']['FHEADZZ'];
            $_xFHEADZZ = explode(';', $_oFHEADZZ);
            $_oFHEADZ1 = $_xFHEADZZ[0];
            $_oFHEADZ2 = $_xFHEADZZ[1];

            $_oFHANDLE = $_tblCOMPNY['0']['FHANDLE'];
            $_oFNPWPDC = $_tblCOMPNY['0']['FNPWPDC'];
            $_oFPKPXDC = $_tblCOMPNY['0']['FPKPXDC'];
            $_oXHANDLE = $_tblCOMPNY['0']['XHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                <button onclick="_fGETCheKe2()" type="submit" href="<?php echo base_url(), 'NocREFCMP/cfcACTREFCMP/cmpupd/' . $_oFRECNMB; ?>" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                    echo 'Profile Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Profil';
                                                } else {
                                                    echo 'Kode Profil';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFCODEZZ)) {
                                                echo $_oFCODEZZ;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Company Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Perusahaan';
                                                } else {
                                                    echo 'Nama Perusahaan';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>

                                            <input type="text" name="_edtFFULNME" class="form-control" autofocus value="<?php
                                            if (!empty($_oFFULNME)) {
                                                echo $_oFFULNME;
                                            } else {
                                                echo '';
                                            }
                                            ?>" required oninvalid="<?php
                                                   if ($_sesFLNGAGE == 'eng') {
                                                       echo "this.setCustomValidity('Please fill out this field')";
                                                   } elseif ($_sesFLNGAGE == 'ina') {
                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                   } else {
                                                       echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                   };
                                                   ?>" oninput="setCustomValidity('')">
                                        </div>
                                        <div class="hidden">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Status';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status NPWP';
                                                } else {
                                                    echo 'Status NPWP';
                                                };
                                                ?><font color="#000000">&nbsp;:</font> <?php ?>
                                            </label>
                                            <input type="text" name="_edtFNPWPZ1" class="form-control" autofocus readonly value="<?php
                                            $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                            $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                            if (!empty($_xFNPWPZZ)) {
                                                if ($_xFNPWPZZ == 'N') {
                                                    echo 'Tidak memiliki NPWP';
                                                } elseif ($_xFNPWPZZ == 'Y') {
                                                    echo 'Memiliki NPWP';
                                                }
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Electronic Filing Identification Number (EFIN)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Electronic Filing Identification Number (EFIN)';
                                                    } else {
                                                        echo 'Electronic Filing Identification Number (EFIN)';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFEFINZZ" class="form-control" autofocus data-masked-input="9999999999" value="<?php
                                                if (!empty($_oFEFINZZ)) {
                                                    echo $_oFEFINZZ;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                    } else {
                                                        echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFNPWPZ2" class="form-control" autofocus data-masked-input="99.999.999.9-999.999" value="<?php
                                                if (!empty($_oFNPWPZZ)) {
                                                    $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                    if (!empty($_sFNPWPZZ[1])) {
                                                        echo substr($_sFNPWPZZ[1], 0, 2) . '.' . substr($_sFNPWPZZ[1], 2, 3) . '.' . substr($_sFNPWPZZ[1], 5, 3) . '.' . substr($_sFNPWPZZ[1], 8, 1) . '-' . substr($_sFNPWPZZ[1], 9, 3) . '.' . substr($_sFNPWPZZ[1], 12, 3);
                                                    } else {
                                                        echo '?';
                                                    }
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                    } else {
                                                        echo 'Klasifikasi Lapangan Usaha (KLU)';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFKLUZZZ" class="form-control" autofocus data-masked-input="99999" value="<?php
                                                if (!empty($_oFKLUZZZ)) {
                                                    echo $_oFKLUZZZ;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
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
                                                <textarea rows="4" type="text" name="_edtFADDRES" class="form-control" autofocus><?php
                                                    if (!empty($_oFADDRES)) {
                                                        echo str_replace("_n_", "\n", trim($_oFADDRES));
                                                    } else {
                                                        echo '';
                                                    }
                                                    ;
                                                    ?></textarea>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Telephone Nmb.';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'No. Telepon';
                                                    } else {
                                                        echo 'No. Telepon';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFTELPON" class="form-control" autofocus value="<?php
                                                if (!empty($_oFTELPON)) {
                                                    echo $_oFTELPON;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Faximile Nmb.';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'No. Faksimile';
                                                    } else {
                                                        echo 'No. Faksimile';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFFAXIML" class="form-control" autofocus value="<?php
                                                if (!empty($_oFFAXIML)) {
                                                    echo $_oFFAXIML;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
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
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Company Head';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Pimpinan Perusahaan';
                                                    } else {
                                                        echo 'Pimpinan Perusahaan';
                                                    };
                                                    ?><font color="#000000">&nbsp;:</font>
                                                </label>
                                                <input type="text" name="_edtFHEADZ1" class="form-control" autofocus value="<?php
                                                if (!empty($_oFHEADZ1)) {
                                                    echo $_oFHEADZ1;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                                <input type="hidden" name="_edtFHEADZ2" class="form-control" autofocus value="<?php
                                                if (!empty($_oFHEADZ2)) {
                                                    echo $_oFHEADZ2;
                                                } else {
                                                    echo '';
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">    
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Hendled By';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Ditangani Oleh';
                                                    } else {
                                                        echo 'Ditangani Oleh';
                                                    }
                                                    ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFHANDLE" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oXHANDLE)) {
                                                    echo $_oXHANDLE;
                                                } else {
                                                    echo '...';
                                                }
                                                ?>">
                                            </div>
                                            <div class="col-lg-4" hidden>
                                                <input type="file" id="_efiFNPWPZZ" name="_efiFNPWPZZ" style="display: none" onchange="document.getElementById('_edtFNPWPZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'NPWP Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Dokumen NPWP';
                                                    } else {
                                                        echo 'Dokumen NPWP';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Upload Document';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Unggah Dokumen';
                                                        } else {
                                                            echo 'Unggah Dokumen';
                                                        }
                                                        ?>" onclick="document.getElementById('_efiFNPWPZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                        </a>
                                                    </span>
                                                    <input type="text" id="_edtFNPWPZZ" name="_edtFNPWPZZ" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4" hidden>
                                                <input type="file" id="_efiFPKPZZZ" name="_efiFPKPZZZ" style="display: none" onchange="document.getElementById('_edtFPKPZZZ').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'PKP Document';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Dokumen PKP';
                                                    } else {
                                                        echo 'Dokumen PKP';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Upload Document';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Unggah Dokumen';
                                                        } else {
                                                            echo 'Unggah Dokumen';
                                                        }
                                                        ?>" onclick="document.getElementById('_efiFPKPZZZ').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                        </a>
                                                    </span>
                                                    <input type="text" id="_edtFPKPZZZ" name="_edtFPKPZZZ" class="form-control" style="background-color: #ffffff" readonly value="<?php echo $_oFPKPXDC; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 20px;">
                                    <br>
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
            /* --- 6 : PRFUPD --- */
            break;
        case "cmp2pd" :
            ?>
            <?php
            /* --- 6 : PRFUPD --- */
            break;
        default :
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
                            <font style="color: #dcdcdc; font-size: 20px;"><i class="fas fa-info-circle fa-fw fa-lg"></i></font>&nbsp;&nbsp;<strong>Information</strong>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="info" style="text-align: center">
                            <img src="<?php echo base_url(), 'assets/aimz/bgd/under_development.svg'; ?>" height="auto" width="50%">              
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            /* --- 7 : CLRDEL --- */
            break;
    }
    ?>
</section>