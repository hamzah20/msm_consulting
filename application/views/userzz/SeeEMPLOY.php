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
    switch ($_swiUSR007) {

        case "cmplst":
            ?>
            <div class="well well-sm sk_well_modification0">
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
                                                <td class="text-center" style="white-space: nowrap;  width: 10%">
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ ?>" title="<?php
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
            <!--- #user : employee list --->
            <?php
            break;
        case "emp1st" :
            ?>
            <?php
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/cmplst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1dd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/expfrd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export Format/Data Karyawan (Pegawai)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data Karyawan (Pegawai)';
                            } else {
                                echo 'Export Format/Data Karyawan (Pegawai)';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1mp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Import Data Karyawan (Pegawai)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Import Data Karyawan (Pegawai)';
                            } else {
                                echo 'Import Data Karyawan (Pegawai)';
                            };
                            ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
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
                                    echo '_objENGemplok';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAemplok';
                                } else {
                                    echo '_objINAemplok';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>

                                            <th class="text-center" style="white-space: nowrap; width: 94%">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Karyawan (Pegawai)';
                                                } else {
                                                    echo 'Nama Karyawan (Pegawai)';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="NOMOR POKOK WAJIB PAJAK">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP*';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'NPWP*';
                                                } else {
                                                    echo 'NPWP*';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="STATUS KAWIN/TANGGUNGAN">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'S-Kwn/Tng*';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'S-Kwn/Tng*';
                                                } else {
                                                    echo 'S-Kwn/Tng*';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="TIPE PEKERJA">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Type*';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Tipe*';
                                                } else {
                                                    echo 'Tipe*';
                                                };
                                                ?>
                                            </th>

                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblEMP1ST as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>

                                                <td align="left" style="white-space: nowrap; width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    $_tmpFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                                                    if (!empty($_tmpFNPWPZZ[1])) {
                                                        $_sFNPWPZZ = $_tmpFNPWPZZ[1];
                                                        echo substr($_sFNPWPZZ, 0, 2) . '.' . substr($_sFNPWPZZ, 2, 3) . '.' . substr($_sFNPWPZZ, 5, 3) . '.' . substr($_sFNPWPZZ, 8, 1) . '-' . substr($_sFNPWPZZ, 9, 3) . '.' . substr($_sFNPWPZZ, 12, 3);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['XPTKPCD'])) {
                                                        echo $_oRow['XPTKPCD'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FWRKTYP'])) {
                                                        if (strtolower($_oRow['FWRKTYP']) == 'l') {
                                                            echo 'Lokal';
                                                        } elseif (strtolower($_oRow['FWRKTYP']) == 'e') {
                                                            echo 'Ekspatriat';
                                                        } else {
                                                            echo 'Undefined';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    };
                                                    ?>
                                                </td>

                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['XRECNMB'] . '/' . $_oRow['XCODEZZ']; ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat';
                                                    } else {
                                                        echo 'Lihat';
                                                    };
                                                    ?>"><font color="#ff0000"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font></i></a>
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
            <!--- #user : employee add --->
            <?php
            break;
        case "emp1dd" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1ve/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal">
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                    echo 'Worker (Employee) Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Karyawan (Pegawai)';
                                                } else {
                                                    echo 'No. Urut Karyawan (Pegawai)';
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
                                                    echo 'Worker (Employee) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Karyawan (Pegawai)';
                                                } else {
                                                    echo 'Nama Karyawan (Pegawai)';
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>                
            </form>
            <!--- #user : employee save --->
            <?php
            break;
        case "emp1ve" :
            ?>
            <?php
            $_cmpFCODEZZ = $this->uri->segment(4);
            $_cmpFRECNMB = $this->uri->segment(5);
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <!--- #user : employee view --->
            <?php
            break;
        case "emp1iw" :
            ?>
            <?php
            $_oFRECNMB = $_tblEMP1IW['0']['FRECNMB'];
            $_oFCODEZZ = $_tblEMP1IW['0']['FCODEZZ'];
            $_oFFULNME = $_tblEMP1IW['0']['FFULNME'];
            $_oFEMPIDN = $_tblEMP1IW['0']['FEMPIDN'];
            $_oFSTADTE = $_tblEMP1IW['0']['FSTADTE'];
            $_oFENDDTE = $_tblEMP1IW['0']['FENDDTE'];
            $_oFCITIDN = $_tblEMP1IW['0']['FCITIDN'];
            $_oFEFINZZ = $_tblEMP1IW['0']['FEFINZZ'];
            $_oFJOBTTL = $_tblEMP1IW['0']['FJOBTTL'];
            $_oFNATION = $_tblEMP1IW['0']['FNATION'];
            $_oFGENDER = $_tblEMP1IW['0']['FGENDER'];
            $_oXDESCRP = $_tblEMP1IW['0']['XDESCRP'];
            $_oFNPWPZZ = $_tblEMP1IW['0']['FNPWPZZ'];
            $_oFNPWPDC = $_tblEMP1IW['0']['FNPWPDC'];
            $_oXHANDLE = $_tblEMP1IW['0']['XHANDLE'];
            $_oFWRKTYP = $_tblEMP1IW['0']['FWRKTYP'];

            $_oFTYPEZZ = $_tblEMP1IW['0']['FTYPEZZ'];
            $_oFKLUZZZ = $_tblEMP1IW['0']['FKLUZZZ'];
            $_oFADDRES = $_tblEMP1IW['0']['FADDRES'];
            $_oFTELPON = $_tblEMP1IW['0']['FTELPON'];
            $_oFFAXIML = $_tblEMP1IW['0']['FFAXIML'];
            $_oFEMAILZ = $_tblEMP1IW['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblEMP1IW['0']['FHEADZZ'];
            $_oFHANDLE = $_tblEMP1IW['0']['FHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR007/emp1dt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1el/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Worker (Employee) Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Karyawan (Pegawai)';
                                        } else {
                                            echo 'No. Urut Karyawan (Pegawai)';
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
                                            echo 'EFIN Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. KTP/ No. Passport';
                                        } else {
                                            echo 'No. KTP/ No. Passport';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFCITIDN" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFCITIDN)) {
                                        echo $_oFCITIDN;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Maritl Status - Dependents';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status PTKP - Tanggungan';
                                        } else {
                                            echo 'Status PTKP - Tanggungan';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwXDESCRP" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oXDESCRP)) {
                                        echo $_oXDESCRP;
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
                                            echo 'Worker (Employee) Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama Karyawan (Pegawai)';
                                        } else {
                                            echo 'Nama Karyawan (Pegawai)';
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
                                            echo 'EFIN Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode EFIN';
                                        } else {
                                            echo 'Kode EFIN';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFEFINZZ" class="form-control" autofocus readonly value="<?php
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
                                            echo 'Non NPWP';
                                        } elseif ($_xFNPWPZZ == 'Y') {
                                            echo 'NPWP';
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
                                            echo 'Worker (Employee) Registration Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Induk Karyawan (Pegawai)';
                                        } else {
                                            echo 'No. Induk Karyawan (Pegawai)';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFEMPIDN" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFEMPIDN)) {
                                        echo $_oFEMPIDN;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
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
                                    <input type="text" name="_vinFJOBTTL" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFJOBTTL)) {
                                        echo $_oFJOBTTL;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'NPWP Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode NPWP';
                                        } else {
                                            echo 'Kode NPWP';
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
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Tgl. Mulai Kerja';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Tgl. Mulai Kerja';
                                                } else {
                                                    echo 'Tgl. Mulai Kerja';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_viwFSTADTE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFSTADTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
                                            } else {
                                                echo 'YYYYMMDD';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Tgl. Berhenti Kerja';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Tgl. Berhenti Kerja';
                                                } else {
                                                    echo 'Tgl. Berhenti Kerja';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_viwFENDDTE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFENDDTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Nationality';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kewarganegaraan';
                                        } else {
                                            echo 'Kewarganegaraan';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFNATION" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFNATION)) {
                                        echo $_oFNATION;
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
                                            echo 'Worker Type';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tipe Pekerja';
                                        } else {
                                            echo 'Tipe Pekerja';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFWRKTYP" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFWRKTYP)) {
                                        if ($_oFWRKTYP == 'L') {
                                            echo 'Lokal';
                                        } elseif ($_oFWRKTYP == 'E') {
                                            echo 'Ekspatriat';
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
                                            echo 'Gender';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Kelamin';
                                        } else {
                                            echo 'Jenis Kelamin';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFGENDER" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFGENDER)) {
                                        if ($_oFGENDER == 'P') {
                                            echo 'Pria';
                                        } elseif ($_oFGENDER == 'W') {
                                            echo 'Wanita';
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
                                            echo 'Email Address';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Alamat Email';
                                        } else {
                                            echo 'Alamat Email';
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
                            </div>
                            <div class="row">

                            </div>

                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <!--- #user : employee edit --->
            <?php
            break;
        case "emp1dt" :
            ?>
            <?php
            $_oFRECNMB = $_tblEMP1DT['0']['FRECNMB'];
            $_oFCODEZZ = $_tblEMP1DT['0']['FCODEZZ'];
            $_oFFULNME = $_tblEMP1DT['0']['FFULNME'];
            $_oFEMPIDN = $_tblEMP1DT['0']['FEMPIDN'];
            $_oFSTADTE = $_tblEMP1DT['0']['FSTADTE'];
            $_oFENDDTE = $_tblEMP1DT['0']['FENDDTE'];
            $_oFCITIDN = $_tblEMP1DT['0']['FCITIDN'];
            $_oFEFINZZ = $_tblEMP1DT['0']['FEFINZZ'];
            $_oFJOBTTL = $_tblEMP1DT['0']['FJOBTTL'];
            $_oFNATION = $_tblEMP1DT['0']['FNATION'];
            $_oFGENDER = $_tblEMP1DT['0']['FGENDER'];
            $_oXDESCRP = $_tblEMP1DT['0']['XDESCRP'];
            $_oFNPWPZZ = $_tblEMP1DT['0']['FNPWPZZ'];
            $_oFNPWPDC = $_tblEMP1DT['0']['FNPWPDC'];
            $_oXHANDLE = $_tblEMP1DT['0']['XHANDLE'];
            $_oFMARITL = $_tblEMP1DT['0']['FMARITL'];

            $_oFTYPEZZ = $_tblEMP1DT['0']['FTYPEZZ'];
            $_oFKLUZZZ = $_tblEMP1DT['0']['FKLUZZZ'];
            $_oFADDRES = $_tblEMP1DT['0']['FADDRES'];
            $_oFTELPON = $_tblEMP1DT['0']['FTELPON'];
            $_oFFAXIML = $_tblEMP1DT['0']['FFAXIML'];
            $_oFEMAILZ = $_tblEMP1DT['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblEMP1DT['0']['FHEADZZ'];
            $_oFHANDLE = $_tblEMP1DT['0']['FHANDLE'];
            $_oFWRKTYP = $_tblEMP1DT['0']['FWRKTYP'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">                 

                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Karyawan (Pegawai)';
                                                } else {
                                                    echo 'No. Urut Karyawan (Pegawai)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
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
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Karyawan (Pegawai)';
                                                } else {
                                                    echo 'Nama Karyawan (Pegawai)';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
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
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Registration Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Induk Karyawan (Pegawai)';
                                                } else {
                                                    echo 'No. Induk Karyawan (Pegawai)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFEMPIDN" class="form-control" autofocus value="<?php
                                            if (!empty($_oFEMPIDN)) {
                                                echo $_oFEMPIDN;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="sk_label_modification">
                                                        <?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Tgl. Mulai Kerja';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Tgl. Mulai Kerja';
                                                        } else {
                                                            echo 'Tgl. Mulai Kerja';
                                                        };
                                                        ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                    </label>
                                                    <div class="input-group date">
                                                        <input type="text" name="_edtFSTADTE" class="form-control" placeholder="..." value="<?php
                                                        if (!empty($_oFSTADTE)) {
                                                            echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
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
                                                               ?>" onchange="setCustomValidity('')">
                                                        <span class="input-group-addon">
                                                            <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="sk_label_modification">
                                                        <?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Tgl. Berhenti Kerja';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Tgl. Berhenti Kerja';
                                                        } else {
                                                            echo 'Tgl. Berhenti Kerja';
                                                        };
                                                        ?><font color="#000000">&nbsp;:</font>
                                                    </label>
                                                    <input type="text" name="_edtFENDDTE" class="form-control" placeholder="..." value="<?php
                                                    if (!empty($_oFSTADTE)) {
                                                        echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>" readonly>
                                                    <!---
                                                    <div class="input-group date">
                                                        <input type="text" name="_edtFENDDTE" class="form-control" placeholder="..." value="<?php
                                                    if (!empty($_oFSTADTE)) {
                                                        echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>" readonly>
                                                        
                                                        <span class="input-group-addon" disabled>
                                                            <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                                        </span>
                                                        
                                                    </div>
                                                    --->
                                                </div>
                                            </div>
                                            <div>
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Worker Type';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Tipe Pekerja';
                                                    } else {
                                                        echo 'Tipe Pekerja';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFWRKTYP" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">
                                                    <option value="<?php echo $_oFWRKTYP ?>"><?php
                                                        if ($_oFWRKTYP == 'L') {
                                                            echo 'Lokal';
                                                        } elseif ($_oFWRKTYP == 'E') {
                                                            echo 'Ekspatriat';
                                                        }
                                                        ?></option>
                                                    <option value="L">Lokal</option>
                                                    <option value="E">Ekspatriat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'EFIN Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. KTP/ No. Passport';
                                                } else {
                                                    echo 'No. KTP/ No. Passport';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_edtFCITIDN" class="form-control" autofocus value="<?php
                                            if (!empty($_oFCITIDN)) {
                                                echo $_oFCITIDN;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'EFIN Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode EFIN';
                                                } else {
                                                    echo 'Kode EFIN';
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
                                            <input type="text" name="_edtFJOBTTL" class="form-control" autofocus value="<?php
                                            if (!empty($_oFJOBTTL)) {
                                                echo $_oFJOBTTL;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Nationality';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kewarganegaraan';
                                                } else {
                                                    echo 'Kewarganegaraan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="_edtFNATION" id="_edtFNGRCOD" class="form-control" autofocus value="<?php
                                                if (!empty($_oFNATION)) {
                                                    echo $_oFNATION;
                                                } else {
                                                    echo '';
                                                }
                                                ;
                                                ?>">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; background: #5bc0de; color: #ffffff" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Lihat Referensi';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat Referensi';
                                                    } else {
                                                        echo 'Lihat Referensi';
                                                    }
                                                    ?>" data-toggle="modal" data-target="#sk_modal_edtngr"><i class="fas fa-search-plus fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Gender';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Jenis Kelamin';
                                                } else {
                                                    echo 'Jenis Kelamin';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <select class="form-control select2" data-placeholder="" data-allow-clear="true" name="_edtFGENDER" onchange="setCustomValidity('')">
                                                <option value="<?php echo $_oFGENDER ?>"><?php
                                                    if ($_oFGENDER == 'P') {
                                                        echo 'Pria';
                                                    } elseif ($_oFGENDER == 'W') {
                                                        echo 'Wanita';
                                                    }
                                                    ?></option>
                                                <option value="P">Pria</option>
                                                <option value="W">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Maritl Status - Dependents';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status PTKP - Tanggungan';
                                                } else {
                                                    echo 'Status PTKP - Tanggungan';
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tmaritl');
                                            $_queMARITL = $this->db->get();

                                            if ($_queMARITL->num_rows() > 0) {
                                                $_varMARITL = $_queMARITL->result_array();
                                            } else {
                                                $_varMARITL = $_queMARITL->result_array();
                                            }
                                            ?>
                                            <select id="_edtFMARITL" class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFMARITL" onchange="setCustomValidity('')">
                                                <option value="<?php echo $_oFMARITL; ?>"><?php echo $_oXDESCRP; ?></option>
                                                <?php foreach ($_varMARITL as $_oRow) { ?>
                                                    <option value="<?php echo $_oRow['FCODEZZ']; ?>"><?php echo $_oRow['FDESCRP']; ?></option>;
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div>
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
                                            <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFNPWPZ1" onchange="setCustomValidity('')">
                                                        <?php
                                                        $_sFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                        $_xFNPWPZZ = strtoupper($_sFNPWPZZ[0]);
                                                        ?>
                                                <option value="<?php echo $_xFNPWPZZ ?>"><?php
                                                    if ($_xFNPWPZZ == 'Y') {
                                                        echo 'NPWP';
                                                    } elseif ($_xFNPWPZZ == 'N') {
                                                        echo 'Non NPWP';
                                                    }
                                                    ?></option>
                                                <option value="Y">NPWP</option>
                                                <option value="N">Non NPWP</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'NPWP Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode NPWP';
                                                } else {
                                                    echo 'Kode NPWP';
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
                                                echo 'Email Address';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Alamat Email';
                                            } else {
                                                echo 'Alamat Email';
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
                                <div class="row">
                                </div>
                                <div class="row">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
            </form>
            <!--- #user : employee delete --->
            <?php
            break;
        case "emp1pd" :
            ?>
            KECOA_SINGIT
            <?php
            break;
        case "emp1el" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
        case "emp1mp" :
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
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1mp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/_preFPROGRE'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Back';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kembali';
                                } else {
                                    echo 'Kembali';
                                };
                                ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
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
                                    </div>
                                </div>
                                <div style="height:10px;">
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

                                        <div class="sk_table_modification2 <?php
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
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">No. Urut Karyawan (Pegawai)</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Nama</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">NPWP</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">NIK/No. Passport</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Alamat</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Jenis Kelamin</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Jabatan</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 87%">Status/Tanggungan</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Lokal/Ekspatriat</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Kode Negara</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Mulai Kerja Bulan Ke-</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Berhenti Kerja Bulan Ke-</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Kode Objek Pajak</th>
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
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['F'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
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
                                                                ?>">
                                                                        <?php
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
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['H'])) {
                                                                            echo $_oRow['H'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['I'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['I'])) {
                                                                            echo $_oRow['I'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['J'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['J'])) {
                                                                            echo $_oRow['J'];
                                                                        } else {
                                                                            
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['K'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['K'])) {
                                                                            echo $_oRow['K'];
                                                                        } else {
                                                                            
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['L'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['L'])) {
                                                                            echo $_oRow['L'];
                                                                        } else {
                                                                            
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['M'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['M'])) {
                                                                            echo $_oRow['M'];
                                                                        } else {
                                                                            
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['N'])) {
                                                                    echo '';
                                                                } else {
                                                                    echo '#d9534f';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['N'])) {
                                                                            echo $_oRow['N'];
                                                                        } else {
                                                                            
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
                                        <a class="btn btn-default btn-flat" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp1mp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . '_impFPROGRE' . '/' . $KATAKPEYANG; ?>" role = "button" title="<?php
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
                                        echo '&ensp;Status Import Tabel : <font style="color: #ff0000; font-weight: bolder">Siap</font>, data bisa dimasukkan ke database';
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
                                        $_oSeg = $this->uri->segment(7);
                                        if (!empty($_oSeg)) {

                                            foreach ($data_sheet as $_oRow) {
                                                $_oSeq ++;

                                                if ($_oSeq > 2) {

                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $_oYea = date("Y");

                                                    $_oFCODEZZ = $_oRow['B'];
                                                    $_oFFULNME = $_oRow['C'];
                                                    $_oFNPWPZZ = $_oRow['D'];
                                                    $_oFCITIDN = $_oRow['E'];
                                                    $_oFADDRES = $_oRow['F'];
                                                    $_oFGENDER = $_oRow['G'];
                                                    $_oFJOBTTL = $_oRow['H'];
                                                    $_oFMARITL = $_oRow['I'];
                                                    $_oFWRKTYP = $_oRow['J'];
                                                    $_oFNATION = $_oRow['K'];
                                                    $_oFSTADTE = $this->sklibrfnc->_fGETNumOnl($_oRow['L']);
                                                    $_oFENDDTE = $this->sklibrfnc->_fGETNumOnl($_oRow['M']);
                                                    $_oFKOOBPJ = $_oRow['N'];

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

                                                        if ((!empty($_oFNPWPZZ)) && ($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ) !== '000000000000000') && (strlen($this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ)) == 15)) {
                                                            $_zFNPWPZZ = 'Y;' . $this->sklibrfnc->_fGETNumOnl($_oFNPWPZZ);
                                                        } else {
                                                            $_zFNPWPZZ = 'N;000000000000000';
                                                        }

                                                        if (!empty($_oFCITIDN)) {
                                                            $_zFCITIDN = $_oFCITIDN;
                                                        } else {
                                                            $_zFCITIDN = '';
                                                        }

                                                        if (!empty($_oFADDRES)) {
                                                            $_zFADDRES = $_oFADDRES;
                                                        } else {
                                                            $_zFADDRES = '';
                                                        }

                                                        if (!empty(trim($_oFGENDER))) {
                                                            if ((trim($_oFGENDER) == 'L') || (trim($_oFGENDER) == 'M')) {
                                                                $_zFGENDER = 'P';
                                                            } elseif ((trim($_oFGENDER) == 'W') || (trim($_oFGENDER) == 'F')) {
                                                                $_zFGENDER = 'W';
                                                            }
                                                        } else {
                                                            $_zFGENDER = '';
                                                        }

                                                        if (!empty($_oFJOBTTL)) {
                                                            $_zFJOBTTL = $_oFJOBTTL;
                                                        } else {
                                                            $_zFJOBTTL = '';
                                                        }

                                                        $this->db->select('*');
                                                        $this->db->from('tmaritl');
                                                        $this->db->like('FPTKPCD', trim($_oFMARITL), '');
                                                        $this->db->order_by('FCODEZZ', 'asc');
                                                        $_queMARITL = $this->db->get();

                                                        if ($_queMARITL->num_rows() > 0) {

                                                            foreach ($_queMARITL->result_array() as $_oRow) {
                                                                $_zFMARITL = $_oRow['FCODEZZ'];
                                                            }
                                                        } else {
                                                            $_zFMARITL = '';
                                                        }

                                                        if (!empty($_oFWRKTYP)) {
                                                            $_zFWRKTYP = $_oFWRKTYP;
                                                        } else {
                                                            $_zFWRKTYP = 'L';
                                                        }

                                                        if (!empty($_oFNATION)) {
                                                            $_zFNATION = $_oFNATION;
                                                        } else {
                                                            $_zFNATION = '';
                                                        }

                                                        if (!empty($_oFSTADTE)) {
                                                            if (strlen($_oFSTADTE) == 1) {
                                                                $_zFSTADTE = $_oYea . '0' . $_oFSTADTE . '01';
                                                            } elseif (strlen($_oFSTADTE) == 2) {
                                                                $_zFSTADTE = $_oYea . $_oFSTADTE . '01';
                                                            } elseif ((strlen($_oFSTADTE) == 8)) {
                                                                $_zFSTADTE = $_oFSTADTE;
                                                            }
                                                        } else {
                                                            $_zFSTADTE = $_oYea . '0101';
                                                        }

                                                        if (!empty($_oFENDDTE)) {
                                                            if (strlen($_oFENDDTE) == 1) {
                                                                $_oLst = $this->sklibrfnc->_fGetLstDay($_oYea . '0' . $_oFENDDTE . '01');
                                                                $_zFENDDTE = $this->sklibrfnc->_fGetNumOnl($_oLst);
                                                            } elseif (strlen($_oFENDDTE) == 2) {
                                                                $_oLst = $this->sklibrfnc->_fGetLstDay($_oYea . '0' . $_oFENDDTE . '01');
                                                                $_zFENDDTE = $this->sklibrfnc->_fGetNumOnl($_oLst);
                                                            } elseif ((strlen($_oFENDDTE) == 8)) {
                                                                $_zFENDDTE = $_oFENDDTE;
                                                            }
                                                        } else {
                                                            $_zFENDDTE = '';
                                                        }

                                                        if (!empty($_oFKOOBPJ)) {
                                                            $_zFKOOBPJ = $_oFKOOBPJ;
                                                        } else {
                                                            $_zFKOOBPJ = '';
                                                        }


                                                        $_updPROFLE = array(
                                                            'FFULNME' => $_zFFULNME,
                                                            'FNPWPZZ' => $_zFNPWPZZ,
                                                            'FCITIDN' => $_zFCITIDN,
                                                            'FADDRES' => $_zFADDRES,
                                                            'FGENDER' => $_zFGENDER,
                                                            'FJOBTTL' => $_zFJOBTTL,
                                                            'FMARITL' => $_zFMARITL,
                                                            'FWRKTYP' => $_zFWRKTYP,
                                                            'FNATION' => $_zFNATION,
                                                            'FSTADTE' => $_zFSTADTE,
                                                            'FENDDTE' => $_zFENDDTE,
                                                            'FCHGPST' => 'FEE2020-00001',
                                                            'FCHGP21' => 'P212020-00001',
                                                            'FKOOBPJ' => $_zFKOOBPJ
                                                        );

                                                        $this->db->where('FCODEZZ', $_oFCODEZZ);
                                                        $this->db->update('tprofle', $_updPROFLE);
                                                    } else {
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
                                                        }

                                                        $this->db->select('*');
                                                        $this->db->from('tmaritl');
                                                        $this->db->like('FPTKPCD', $_oFMARITL);
                                                        $this->db->order_by('FCODEZZ', 'desc');
                                                        $_queMARITL = $this->db->get();

                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $_oYea = date("Y");

                                                        if (!empty($_oFSTADTE)) {
                                                            if (strlen($_oFSTADTE) == 1) {
                                                                $_zFSTADTE = $_oYea . '0' . $_oFSTADTE . '01';
                                                            } elseif (strlen($_oFSTADTE) == 2) {
                                                                $_zFSTADTE = $_oYea . $_oFSTADTE . '01';
                                                            } elseif ((strlen($_oFSTADTE) == 8)) {
                                                                $_zFSTADTE = $_oFSTADTE;
                                                            }
                                                        } else {
                                                            $_zFSTADTE = $_oYea . '0101';
                                                        }

                                                        if (!empty($_oFENDDTE)) {
                                                            if (strlen($_oFENDDTE) == 1) {
                                                                $_oLst = $this->sklibrfnc->_fGetLstDay($_oYea . '0' . $_oFENDDTE . '01');
                                                                $_zFENDDTE = $this->sklibrfnc->_fGetNumOnl($_oLst);
                                                            } elseif (strlen($_oFENDDTE) == 2) {
                                                                $_oLst = $this->sklibrfnc->_fGetLstDay($_oYea . '0' . $_oFENDDTE . '01');
                                                                $_zFENDDTE = $this->sklibrfnc->_fGetNumOnl($_oLst);
                                                            } elseif ((strlen($_oFENDDTE) == 8)) {
                                                                $_zFENDDTE = $_oFENDDTE;
                                                            }
                                                        } else {
                                                            $_zFENDDTE = '';
                                                        }


                                                        if ($_queMARITL->num_rows() > 0) {
                                                            $_varMARITL = $_queMARITL->result_array();
                                                            $_oFMARITL = $_varMARITL['0']['FCODEZZ'];
                                                        } else {
                                                            $_oFMARITL = '';
                                                        }

                                                        if (!empty($_oFWRKTYP)) {
                                                            $_oFWRKTYP = $_oFWRKTYP;
                                                        } else {
                                                            $_oFWRKTYP = 'L';
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
                                                            'FCITIDN' => $_oFCITIDN,
                                                            'FADDRES' => $_oFADDRES,
                                                            'FGENDER' => $_oFGENDER,
                                                            'FJOBTTL' => $_oFJOBTTL,
                                                            'FMARITL' => $_oFMARITL,
                                                            'FWRKTYP' => $_oFWRKTYP,
                                                            'FNATION' => $_zFNATION,
                                                            'FSTADTE' => $_zFSTADTE,
                                                            'FENDDTE' => $_zFENDDTE,
                                                            'FCHGPST' => 'FEE2020-00001',
                                                            'FCHGP21' => 'P212020-00001',
                                                            'FKOOBPJ' => $_zFKOOBPJ,
                                                            'FGROUPS' => $_cmpFCODEZZ
                                                        );
                                                        $this->db->insert('tprofle', $_addPROFLE);
                                                    }
                                                } else {
                                                    
                                                }
                                            }
                                            redirect('NocUSERZZ/cfcACTUSR007/emp1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
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
        case "emp2st" :
            ?>
            <?php
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2dd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add Worker (Employee)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah Karyawan (Pegawai)';
                            } else {
                                echo 'Tambah Karyawan (Pegawai)';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font></a>
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
                                    echo '_objENGemplok';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAemplok';
                                } else {
                                    echo '_objINAemplok';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">
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
                                            <th class="text-center" style="white-space: nowrap; width: 94%">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Employee Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pegawai';
                                                } else {
                                                    echo 'Nama Pegawai';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%" title="Status PTKP/Tanggungan">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PTKP-S/D';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'S-PTKP/T';
                                                } else {
                                                    echo 'S-PTKP/T';
                                                };
                                                ?>
                                            </th>

                                            <th class="text-center" style="white-space: nowrap; width: 1%" title="Electronic Filling Identification Number">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'EFIN';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'EFIN';
                                                } else {
                                                    echo 'EFIN';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%" title="Nomor Pokok Wajib Pajak">
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblEMP2ST as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $_oRow['XCODEZZ'];
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oRow['XDESCRP']; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FEFINZZ'])) {
                                                        echo $_oRow['FEFINZZ'];
                                                    } else {
                                                        echo '...';
                                                    };
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    $_tmpFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                                                    if (!empty($_tmpFNPWPZZ[1])) {
                                                        $_sFNPWPZZ = $_tmpFNPWPZZ[1];
                                                        echo substr($_sFNPWPZZ, 0, 2) . '.' . substr($_sFNPWPZZ, 2, 3) . '.' . substr($_sFNPWPZZ, 5, 3) . '.' . substr($_sFNPWPZZ, 8, 1) . '-' . substr($_sFNPWPZZ, 9, 3) . '.' . substr($_sFNPWPZZ, 12, 3);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['XRECNMB'] . '/' . $_oRow['XCODEZZ']; ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'View';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat';
                                                    } else {
                                                        echo 'Lihat';
                                                    };
                                                    ?>"><font color="#ff0000"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font></i></a>
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
            <!--- #user : default --->
            <?php
            break;
        case "emp2dd" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2ve/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal">
                <?php
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
                    }
                } else {

                    $_oCODEXX = 'PRF' . $_oYea . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font>
                                </a>

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
                                        <div>
                                            <label class="label-mins" id="_finFFULNME">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Employee Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Karyawan';
                                                } else {
                                                    echo 'Nama Karyawan';
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
            </form>
            <!--- #user : employee save --->
            <?php
            break;
        case "emp2ve" :
            ?>
            <?php
            $_cmpFCODEZZ = $this->uri->segment(4);
            $_cmpFRECNMB = $this->uri->segment(5);
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFCODEZZ . '/' . $_cmpFRECNMB . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <!--- #user : employee view --->
            <?php
            break;
        case "emp2iw" :
            ?>
            <?php
            $_oFRECNMB = $_tblEMP2IW['0']['FRECNMB'];
            $_oFCODEZZ = $_tblEMP2IW['0']['FCODEZZ'];
            $_oFFULNME = $_tblEMP2IW['0']['FFULNME'];
            $_oFEMPIDN = $_tblEMP2IW['0']['FEMPIDN'];
            $_oFSTADTE = $_tblEMP2IW['0']['FSTADTE'];
            $_oFENDDTE = $_tblEMP2IW['0']['FENDDTE'];
            $_oFCITIDN = $_tblEMP2IW['0']['FCITIDN'];
            $_oFEFINZZ = $_tblEMP2IW['0']['FEFINZZ'];
            $_oFJOBTTL = $_tblEMP2IW['0']['FJOBTTL'];
            $_oFNATION = $_tblEMP2IW['0']['FNATION'];
            $_oFGENDER = $_tblEMP2IW['0']['FGENDER'];
            $_oXDESCRP = $_tblEMP2IW['0']['XDESCRP'];
            $_oFNPWPZZ = $_tblEMP2IW['0']['FNPWPZZ'];
            $_oFNPWPDC = $_tblEMP2IW['0']['FNPWPDC'];
            $_oXHANDLE = $_tblEMP2IW['0']['XHANDLE'];

            $_oFTYPEZZ = $_tblEMP2IW['0']['FTYPEZZ'];
            $_oFKLUZZZ = $_tblEMP2IW['0']['FKLUZZZ'];
            $_oFADDRES = $_tblEMP2IW['0']['FADDRES'];
            $_oFTELPON = $_tblEMP2IW['0']['FTELPON'];
            $_oFFAXIML = $_tblEMP2IW['0']['FFAXIML'];
            $_oFEMAILZ = $_tblEMP2IW['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblEMP2IW['0']['FHEADZZ'];
            $_oFHANDLE = $_tblEMP2IW['0']['FHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR007/emp2dt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2el/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                            <div class="row">
                                <div class="col-lg-4">
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
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'EFIN Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. KTP/ No. Passport';
                                        } else {
                                            echo 'No. KTP/ No. Passport';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFCITIDN" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFCITIDN)) {
                                        echo $_oFCITIDN;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Maritl Status - Dependents';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status PTKP - Tanggungan';
                                        } else {
                                            echo 'Status PTKP - Tanggungan';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwXDESCRP" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oXDESCRP)) {
                                        echo $_oXDESCRP;
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
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'EFIN Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode EFIN';
                                        } else {
                                            echo 'Kode EFIN';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFEFINZZ" class="form-control" autofocus readonly value="<?php
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
                                            echo 'Non NPWP';
                                        } elseif ($_xFNPWPZZ == 'Y') {
                                            echo 'NPWP';
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
                                            echo 'EFIN Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Induk Pegawai';
                                        } else {
                                            echo 'No. Induk Pegawai';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFEMPIDN" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFEMPIDN)) {
                                        echo $_oFEMPIDN;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
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
                                    <input type="text" name="_vinFJOBTTL" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFJOBTTL)) {
                                        echo $_oFJOBTTL;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'NPWP Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode NPWP';
                                        } else {
                                            echo 'Kode NPWP';
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
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tgl. Mulai Kerja';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tgl. Mulai Kerja';
                                        } else {
                                            echo 'Tgl. Mulai Kerja';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFSTADTE" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFSTADTE)) {
                                        echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Nationality';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kewarganegaraan';
                                        } else {
                                            echo 'Kewarganegaraan';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFNATION" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFNATION)) {
                                        echo $_oFNATION;
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
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tgl. Berhenti Kerja';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Tgl. Berhenti Kerja';
                                        } else {
                                            echo 'Tgl. Berhenti Kerja';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFENDDTE" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFENDDTE)) {
                                        echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Gender';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Kelamin';
                                        } else {
                                            echo 'Jenis Kelamin';
                                        };
                                        ?><font color="#000000">&nbsp;:</font>
                                    </label>
                                    <input type="text" name="_viwFGENDER" class="form-control" autofocus readonly value="<?php
                                    if (!empty($_oFGENDER)) {
                                        if ($_oFGENDER == 'P') {
                                            echo 'Pria';
                                        } elseif ($_oFGENDER == 'W') {
                                            echo 'Wanita';
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
                                            echo 'Email Address';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Alamat Email';
                                        } else {
                                            echo 'Alamat Email';
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
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <!--- #user : employee edit --->
            <?php
            break;
        case "emp2dt" :
            ?>
            <?php
            $_oFRECNMB = $_tblEMP2DT['0']['FRECNMB'];
            $_oFCODEZZ = $_tblEMP2DT['0']['FCODEZZ'];
            $_oFFULNME = $_tblEMP2DT['0']['FFULNME'];
            $_oFEMPIDN = $_tblEMP2DT['0']['FEMPIDN'];
            $_oFSTADTE = $_tblEMP2DT['0']['FSTADTE'];
            $_oFENDDTE = $_tblEMP2DT['0']['FENDDTE'];
            $_oFCITIDN = $_tblEMP2DT['0']['FCITIDN'];
            $_oFEFINZZ = $_tblEMP2DT['0']['FEFINZZ'];
            $_oFJOBTTL = $_tblEMP2DT['0']['FJOBTTL'];
            $_oFNATION = $_tblEMP2DT['0']['FNATION'];
            $_oFGENDER = $_tblEMP2DT['0']['FGENDER'];
            $_oXDESCRP = $_tblEMP2DT['0']['XDESCRP'];
            $_oFNPWPZZ = $_tblEMP2DT['0']['FNPWPZZ'];
            $_oFNPWPDC = $_tblEMP2DT['0']['FNPWPDC'];
            $_oXHANDLE = $_tblEMP2DT['0']['XHANDLE'];
            $_oFMARITL = $_tblEMP2DT['0']['FMARITL'];

            $_oFTYPEZZ = $_tblEMP2DT['0']['FTYPEZZ'];
            $_oFKLUZZZ = $_tblEMP2DT['0']['FKLUZZZ'];
            $_oFADDRES = $_tblEMP2DT['0']['FADDRES'];
            $_oFTELPON = $_tblEMP2DT['0']['FTELPON'];
            $_oFFAXIML = $_tblEMP2DT['0']['FFAXIML'];
            $_oFEMAILZ = $_tblEMP2DT['0']['FEMAILZ'];
            $_oFHEADZZ = $_tblEMP2DT['0']['FHEADZZ'];
            $_oFHANDLE = $_tblEMP2DT['0']['FHANDLE'];

            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2pd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">                 

                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/emp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font>
                                </a>

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
                                    <div class="col-lg-4">
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
                                        <input type="text" name="_edtFCODEZZ" class="form-control" autofocus readonly value="<?php
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
                                                echo 'EFIN Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'No. KTP/ No. Passport';
                                            } else {
                                                echo 'No. KTP/ No. Passport';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <input type="text" name="_edtFCITIDN" class="form-control" autofocus value="<?php
                                        if (!empty($_oFCITIDN)) {
                                            echo $_oFCITIDN;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Maritl Status - Dependents';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status PTKP - Tanggungan';
                                            } else {
                                                echo 'Status PTKP - Tanggungan';
                                            }
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tmaritl');
                                        $_queMARITL = $this->db->get();

                                        if ($_queMARITL->num_rows() > 0) {
                                            $_varMARITL = $_queMARITL->result_array();
                                        } else {
                                            $_varMARITL = $_queMARITL->result_array();
                                        }
                                        ?>
                                        <select id="_edtFMARITL" class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFMARITL" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFMARITL; ?>"><?php echo $_oXDESCRP; ?></option>
                                            <?php foreach ($_varMARITL as $_oRow) { ?>
                                                <option value="<?php echo $_oRow['FCODEZZ']; ?>"><?php echo $_oRow['FDESCRP']; ?></option>;
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'EFIN Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode EFIN';
                                            } else {
                                                echo 'Kode EFIN';
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
                                    <div class="col-lg-4">
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
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFNPWPZ1" required oninvalid="<?php
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
                                            <option value="<?php echo $_xFNPWPZZ ?>"><?php
                                                if ($_xFNPWPZZ == 'Y') {
                                                    echo 'NPWP';
                                                } elseif ($_xFNPWPZZ == 'N') {
                                                    echo 'Non NPWP';
                                                }
                                                ?></option>
                                            <option value="Y">NPWP</option>
                                            <option value="N">Non NPWP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'EFIN Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'No. Induk Pegawai';
                                            } else {
                                                echo 'No. Induk Pegawai';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <input type="text" name="_edtFEMPIDN" class="form-control" autofocus value="<?php
                                        if (!empty($_oFEMPIDN)) {
                                            echo $_oFEMPIDN;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-4">
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
                                        <input type="text" name="_edtFJOBTTL" class="form-control" autofocus value="<?php
                                        if (!empty($_oFJOBTTL)) {
                                            echo $_oFJOBTTL;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'NPWP Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode NPWP';
                                            } else {
                                                echo 'Kode NPWP';
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
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tgl. Mulai Kerja';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Tgl. Mulai Kerja';
                                            } else {
                                                echo 'Tgl. Mulai Kerja';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <div class="input-group date">
                                            <input type="text" name="_edtFSTADTE" class="form-control" placeholder="..." value="<?php
                                            if (!empty($_oFSTADTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
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
                                                   ?>" onchange="setCustomValidity('')">
                                            <span class="input-group-addon">
                                                <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Nationality';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kewarganegaraan';
                                            } else {
                                                echo 'Kewarganegaraan';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <input type="text" name="_edtFNATION" class="form-control" autofocus value="<?php
                                        if (!empty($_oFNATION)) {
                                            echo $_oFNATION;
                                        } else {
                                            echo '';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="file" id="_efiFNPWPDC" name="_efiFNPWPDC" style="display: none" onchange="document.getElementById('_edtFNPWPDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
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
                                                ?>" onclick="document.getElementById('_efiFNPWPDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                </a>
                                            </span>
                                            <input type="text" id="_edtFNPWPDC" name="_edtFNPWPDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNPWPDC; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tgl. Berhenti Kerja';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Tgl. Berhenti Kerja';
                                            } else {
                                                echo 'Tgl. Berhenti Kerja';
                                            };
                                            ?><font color="#000000">&nbsp;:</font>
                                        </label>
                                        <div>
                                            <input type="text" name="_edtFENDDTE" class="form-control" placeholder="..." value="<?php
                                            if (!empty($_oFSTADTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                            } else {
                                                echo '';
                                            }
                                            ?>" readonly>
                                        </div>
                                        <!---
                                         <div class="input-group date">
                                            <input type="text" name="_edtFENDDTE" class="form-control" placeholder="..." value="<?php
                                            if (!empty($_oFSTADTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                            <span class="input-group-addon">
                                                <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                            </span>
                                        </div>
                                        --->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Gender';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jenis Kelamin';
                                            } else {
                                                echo 'Jenis Kelamin';
                                            };
                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="true" name="_edtFGENDER" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFGENDER ?>"><?php
                                                if ($_oFGENDER == 'P') {
                                                    echo 'Pria';
                                                } elseif ($_oFGENDER == 'W') {
                                                    echo 'Wanita';
                                                }
                                                ?></option>
                                            <option value="P">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
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
                                                echo 'Email Address';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Alamat Email';
                                            } else {
                                                echo 'Alamat Email';
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
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
            </form>
            <!--- #user : employee delete --->
            <?php
            break;
        case "emp2pd" :
            ?>
            KECOA_SINGIT
            <?php
            break;
        case "emp2el" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_empFRECNMB = $this->uri->segment(6);
            $_empFCODEZZ = $this->uri->segment(7);
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "400px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR007/emp2st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
        default:
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-left">
                        &nbsp;
                        &nbsp;  
                        <font style="color: #dcdcdc; font-size: 20px;"><i class="fas fa-info-circle fa-fw fa-lg"></i></font>&nbsp;&nbsp;<strong>Information</strong>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div class="info" style="text-align: center">
                        <img src="<?php echo base_url(), 'assets/aimz/bgd/under_development.svg'; ?>" height="auto" width="50%">              
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
        <?php
    }
    ?>
</section>