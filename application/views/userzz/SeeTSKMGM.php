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
    switch ($_swiUSR003) {
        case "tsklst" :
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tskadd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
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
                                    echo '_objENGinboxz';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAinboxz';
                                } else {
                                    echo '_objINAinboxz';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">Dibuat</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Task Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek Penugasan (Task)';
                                                } else {
                                                    echo 'Subyek Penugasan (Task)';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Due-Date';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Due-Date';
                                                } else {
                                                    echo 'Due-Date';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Executor';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Pelaksana';
                                                } else {
                                                    echo 'Pelaksana';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Status';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status';
                                                } else {
                                                    echo 'Status';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Priority';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Prioritas';
                                                } else {
                                                    echo 'Prioritas';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblTSKMGM as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap;  width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 15%;">
                                                    <?php
                                                    if (!empty($_oRow['FTSKDTE'])) {
                                                        echo $this->sklibrfnc->_fSETDteInd(substr($_oRow['FTSKDTE'], 0, 8)) . ' ' . substr($_oRow['FTSKDTE'], 8, 5);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap;  width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FSBJECT'])) {
                                                        if (strlen($_oRow['FSBJECT']) >= 35) {
                                                            echo substr($_oRow['FSBJECT'], 0, 35) . '<font style="color: #ff0000">...</font>';
                                                        } elseif ((strlen($_oRow['FSBJECT']) > 0) && (strlen($_oRow['FSBJECT']) < 35)) {
                                                            echo $_oRow['FSBJECT'];
                                                        } else {
                                                            echo '...';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FDUEDTE'])) {
                                                        echo $this->sklibrfnc->_fSETDteInd(substr($_oRow['FDUEDTE'], 0, 8)) . ' ' . substr($_oRow['FDUEDTE'], 8, 5);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FOFICER'])) {
                                                        $_oStf = '';
                                                        $_oOfc = explode(';', $_oRow['FOFICER']);
                                                        $_oOf[0] = $_oOfc[0];
                                                        $_oOf[1] = $_oOfc[1];
                                                        $_oOf[2] = $_oOfc[2];

                                                        for ($_oLop = 0; $_oLop < 3; $_oLop++) {

                                                            $this->db->select('*');
                                                            $this->db->from('tprofle');
                                                            $this->db->where('FCODEZZ', trim($_oOf[$_oLop]));
                                                            $_quePROFLE = $this->db->get();
                                                            foreach ($_quePROFLE->result_array() as $_oRox) {
                                                                $_oFFULNME = $_oRox['FFULNME'];
                                                                $_oStf .= $_oFFULNME . ', ';
                                                            }
                                                        }

                                                        $_oRsl = substr(trim($_oStf), 0, strlen(trim($_oStf)) - 1);

                                                        if (strlen($_oRsl) > 20) {
                                                            echo trim(substr($_oRsl, 0, 20)) . '<font style="color: #ff0000">...</font>';
                                                        } else {
                                                            echo trim($_oRsl);
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <?php
                                                    if (!empty($_oRow['FSTATUS'])) {
                                                        if ($_oRow['FSTATUS'] == '1') {
                                                            echo '<font style="color: #5bc0de; font-size: 16px; vertical-align: middle"><i class="fas fa-info-circle"></i></font>&nbsp;' . 'Baru';
                                                        } else if ($_oRow['FSTATUS'] == '2') {
                                                            echo '<font style="color: #f0ad4e;  font-size: 16px; vertical-align: middle"><i class="fas fa-info-circle"></i></font>&nbsp;' . 'Dalam Proses';
                                                        } else if ($_oRow['FSTATUS'] == '3') {
                                                            echo '<font style="color: #5cb85c;  font-size: 16px; vertical-align: middle"><i class="fas fa-info-circle"></i></font>&nbsp;' . 'Selesai';
                                                        } else {
                                                            echo '<font style="color: #5bc0de;  font-size: 16px; vertical-align: middle"><i class="fas fa-info-circle"></i></font>&nbsp;' . 'Baru';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <?php
                                                    if ($_oRow['FPRIORT'] == '1') {
                                                        echo '<font style="color: #5cb85c; font-size: 16px; vertical-align: middle"><i class="fas fa-chevron-circle-right"></i></font>&nbsp;' . 'Rendah';
                                                    } else if ($_oRow['FPRIORT'] == '2') {
                                                        echo '<font style="color: #f0ad4e; font-size: 16px; vertical-align: middle"><i class="fas fa-chevron-circle-right"></i></font>&nbsp;' . 'Sedang';
                                                    } else if ($_oRow['FPRIORT'] == '3') {
                                                        echo '<font style="color: #d9534f; font-size: 16px; vertical-align: middle"><i class="fas fa-chevron-circle-right"></i></font>&nbsp;' . 'Tinggi';
                                                    } else {
                                                        echo '<font style="color: #5cb85c; font-size: 16px; vertical-align: middle"><i class="fas fa-chevron-circle-right"></i></font>&nbsp;' . 'Rendah';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <!--- [?] --->
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tskviw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
        case "tskadd" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tsksve'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('ttskmgm');
                $this->db->like('FCODEZZ', 'TSK' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'TSK' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tsklst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-check fa-lg"></i></font>
                                </button>
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
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="label-mins">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Task Sequence Nmb.';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'No. Urut Penugasan (Task)';
                                                    } else {
                                                        echo 'No. Urut Penugasan (Task)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFCODEZZ" class="form-control" autofocus required value="<?php
                                                echo $_oCODEXX;
                                                ?>" readonly>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Officer (1) Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Pelaksana (1)';
                                                    } else {
                                                        echo 'Nama Pelaksana (1)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFOFICE1" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">
                                                    <option></option>
                                                    <?php
                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCATGRY', 'staffz');
                                                    $this->db->order_by('FCODEZZ', 'asc');

                                                    $_queSTAFFZ = $this->db->get();

                                                    foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                        $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                        $_oFFULNME = $_oRow['FFULNME'];
                                                        ?>
                                                        <option value="<?php
                                                        echo $_oFCODEZZ;
                                                        ?>"><?php echo $_oFFULNME; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Officer (2) Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Pelaksana (2)';
                                                    } else {
                                                        echo 'Nama Pelaksana (2)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFOFICE2">
                                                    <option></option>
                                                    <?php
                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCATGRY', 'staffz');
                                                    $this->db->order_by('FCODEZZ', 'asc');

                                                    $_queSTAFFZ = $this->db->get();

                                                    foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                        $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                        $_oFFULNME = $_oRow['FFULNME'];
                                                        ?>
                                                        <option value="<?php
                                                        echo $_oFCODEZZ;
                                                        ?>"><?php echo $_oFFULNME; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Officer (3) Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Pelaksana (3)';
                                                    } else {
                                                        echo 'Nama Pelaksana (3)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFOFICE3">
                                                    <option></option>
                                                    <?php
                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCATGRY', 'staffz');
                                                    $this->db->order_by('FCODEZZ', 'asc');

                                                    $_queSTAFFZ = $this->db->get();

                                                    foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                        $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                        $_oFFULNME = $_oRow['FFULNME'];
                                                        ?>
                                                        <option value="<?php
                                                        echo $_oFCODEZZ;
                                                        ?>"><?php echo $_oFFULNME; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Task Subject';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Subyek Penugasan (Task)';
                                                    } else {
                                                        echo 'Subyek Penugasan (Task)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFSBJECT" class="form-control" autofocus required oninvalid="<?php
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
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Due-Date';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Due-Date (Batas-Waktu)';
                                                    } else {
                                                        echo 'Due-Date (Batas-Waktu)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <div class="input-group date">
                                                    <input type="text" name="_finFDUEDTE" class="form-control" placeholder="...">
                                                    <span class="input-group-addon">
                                                        <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Status';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Status';
                                                    } else {
                                                        echo 'Status';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFSTATUS" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">
                                                    <option></option>
                                                    <option value="1">Baru</option>
                                                    <option value="2">Dalam Proses</option>
                                                    <option value="3">Selesai</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Priority';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Prioritas';
                                                    } else {
                                                        echo 'Prioritas';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFPRIORT" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">
                                                    <option></option>
                                                    <option value="1">Rendah</option>
                                                    <option value="2">Sedang</option>
                                                    <option value="3">Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="height: 20px;">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            break;
        case "tsksve" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);

            if ($this->session->flashdata('true')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                };
                ?>
                <?php
            } else if ($this->session->flashdata('ovr')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Attachment File Size > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Attachment File Size > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Ukuran File Attachment > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "tskviw" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);

            $_oFCODEZZ = $_tblTSKMGM['0']['FCODEZZ'];

            $_oFOFICER = $_tblTSKMGM['0']['FOFICER'];
            $_oFOFICEX = explode(';', $_oFOFICER);
            $_oFOFICE1 = trim($_oFOFICEX[0]);
            $_oFOFICE2 = trim($_oFOFICEX[1]);
            $_oFOFICE3 = trim($_oFOFICEX[2]);

            $_oFSBJECT = trim($_tblTSKMGM['0']['FSBJECT']);
            $_oFDUEDTE = trim($_tblTSKMGM['0']['FDUEDTE']);
            $_oFSTATUS = trim($_tblTSKMGM['0']['FSTATUS']);
            $_oFPRIORT = trim($_tblTSKMGM['0']['FPRIORT']);
            $_oFDUADTE = trim($_tblTSKMGM['0']['FDUEDTE']);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tsklst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR003/tskedt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" 
                               role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tskdel/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat <?php
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
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="label-mins">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Task Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Penugasan (Task)';
                                                } else {
                                                    echo 'No. Urut Penugasan (Task)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFCODEZZ" class="form-control" autofocus required value="<?php
                                            echo $_oFCODEZZ;
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Officer (1) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pelaksana (1)';
                                                } else {
                                                    echo 'Nama Pelaksana (1)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFOFICE1" class="form-control" readonly value="<?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCODEZZ', $_oFOFICE1);

                                            $_queOFICE1 = $this->db->get();

                                            if ($_queOFICE1->num_rows() > 0) {

                                                foreach ($_queOFICE1->result_array() as $_oRow) {
                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                }
                                                echo $_oFFULNME;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Officer (2) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pelaksana (2)';
                                                } else {
                                                    echo 'Nama Pelaksana (2)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFOFICE1" class="form-control" readonly value="<?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCODEZZ', $_oFOFICE2);

                                            $_queOFICE2 = $this->db->get();

                                            if ($_queOFICE2->num_rows() > 0) {

                                                foreach ($_queOFICE2->result_array() as $_oRow) {
                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                }
                                                echo $_oFFULNME;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Officer (3) Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pelaksana (3)';
                                                } else {
                                                    echo 'Nama Pelaksana (3)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFOFICE1" class="form-control" readonly value="<?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCODEZZ', $_oFOFICE3);

                                            $_queOFICE3 = $this->db->get();

                                            if ($_queOFICE3->num_rows() > 0) {

                                                foreach ($_queOFICE3->result_array() as $_oRow) {
                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                }
                                                echo $_oFFULNME;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Task Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek Penugasan (Task)';
                                                } else {
                                                    echo 'Subyek Penugasan (Task)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFSBJECT" class="form-control" readonly value="<?php
                                            if (!empty($_oFSBJECT)) {
                                                echo $_oFSBJECT;
                                            } else {
                                                echo '...';
                                            };
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Due-Date';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Due-Date (Batas-Waktu)';
                                                } else {
                                                    echo 'Due-Date (Batas-Waktu)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFDUEDTE" class="form-control" readonly value="<?php
                                            if (!empty($_oFDUADTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFDUADTE,0,8));
                                            } else {
                                                echo '...';
                                            };
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Status';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status';
                                                } else {
                                                    echo 'Status';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFSTATUS" class="form-control" readonly value="<?php
                                            if (!empty($_oFSTATUS)) {
                                                if ($_oFSTATUS == '1') {
                                                    echo 'Baru';
                                                } else if ($_oFSTATUS == '2') {
                                                    echo 'Dalam Proses';
                                                } else if ($_oFSTATUS == '3') {
                                                    echo 'Selesai';
                                                }
                                            } else {
                                                echo '...';
                                            };
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Priority';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Prioritas';
                                                } else {
                                                    echo 'Prioritas';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFPRIORT" class="form-control" readonly value="<?php
                                            if (!empty($_oFPRIORT)) {
                                                if ($_oFPRIORT == '1') {
                                                    echo 'Rendah';
                                                } else if ($_oFPRIORT == '2') {
                                                    echo 'Sedang';
                                                } else if ($_oFPRIORT == '3') {
                                                    echo 'Tinggi';
                                                }
                                            } else {
                                                echo '...';
                                            };
                                            ?>">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;
        case "tskedt" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);

            $_oFCODEZZ = $_tblTSKMGM['0']['FCODEZZ'];

            $_oFOFICER = $_tblTSKMGM['0']['FOFICER'];
            $_oFOFICEX = explode(';', $_oFOFICER);
            $_oFOFICE1 = trim($_oFOFICEX[0]);
            $_oFOFICE2 = trim($_oFOFICEX[1]);
            $_oFOFICE3 = trim($_oFOFICEX[2]);

            $_oFSBJECT = trim($_tblTSKMGM['0']['FSBJECT']);
            $_oFDUEDTE = trim($_tblTSKMGM['0']['FDUEDTE']);
            $_oFSTATUS = trim($_tblTSKMGM['0']['FSTATUS']);
            $_oFPRIORT = trim($_tblTSKMGM['0']['FPRIORT']);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tskupd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR003/tskviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Task Sequence Nmb.';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'No. Urut Penugasan (Task)';
                                            } else {
                                                echo 'No. Urut Penugasan (Task)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFCODEZZ" class="form-control" autofocus required value="<?php
                                        echo $_oFCODEZZ;
                                        ?>" readonly>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tprofle');
                                        $this->db->where('FCODEZZ', $_oFOFICE1);

                                        $_queOFICE1 = $this->db->get();

                                        if ($_queOFICE1->num_rows() > 0) {

                                            foreach ($_queOFICE1->result_array() as $_oRow) {
                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                            }
                                        }
                                        ?>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Officer (1) Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Pelaksana (1)';
                                            } else {
                                                echo 'Nama Pelaksana (1)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_edtFOFICE1" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFCODEZZ; ?>"><?php echo $_oFFULNME; ?></option>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCATGRY', 'staffz');
                                            $this->db->order_by('FCODEZZ', 'asc');

                                            $_queSTAFFZ = $this->db->get();

                                            foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                                ?>
                                                <option value="<?php
                                                echo $_oFCODEZZ;
                                                ?>"><?php echo $_oFFULNME; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tprofle');
                                        $this->db->where('FCODEZZ', $_oFOFICE2);

                                        $_queOFICE2 = $this->db->get();

                                        if ($_queOFICE2->num_rows() > 0) {

                                            foreach ($_queOFICE2->result_array() as $_oRow) {
                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                            }
                                        }
                                        ?>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Officer (2) Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Pelaksana (2)';
                                            } else {
                                                echo 'Nama Pelaksana (2)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_edtFOFICE2">
                                            <option value="<?php
                                            if (!empty($_oFOFICE2)) {
                                                echo $_oFOFICE2;
                                            } else {
                                                echo '';
                                            };
                                            ?>"><?php
                                                        if (!empty($_oFOFICE2)) {
                                                            echo $_oFFULNME;
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?></option>
                                            <option value=" ">...</option>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCATGRY', 'staffz');
                                            $this->db->order_by('FCODEZZ', 'asc');

                                            $_queSTAFFZ = $this->db->get();

                                            foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                                ?>
                                                <option value="<?php
                                                echo $_oFCODEZZ;
                                                ?>"><?php echo $_oFFULNME; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tprofle');
                                        $this->db->where('FCODEZZ', $_oFOFICE3);

                                        $_queOFICE3 = $this->db->get();

                                        if ($_queOFICE3->num_rows() > 0) {

                                            foreach ($_queOFICE3->result_array() as $_oRow) {
                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                            }
                                        }
                                        ?>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Officer (3) Name';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Pelaksana (3)';
                                            } else {
                                                echo 'Nama Pelaksana (3)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_edtFOFICE3">
                                            <option value="<?php
                                            if (!empty($_oFOFICE3)) {
                                                echo $_oFOFICE3;
                                            } else {
                                                echo '';
                                            };
                                            ?>"><?php
                                                        if (!empty($_oFOFICE3)) {
                                                            echo $_oFFULNME;
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?></option>
                                            <option value=" ">...</option>
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tprofle');
                                            $this->db->where('FCATGRY', 'staffz');
                                            $this->db->order_by('FCODEZZ', 'asc');

                                            $_queSTAFFZ = $this->db->get();

                                            foreach ($_queSTAFFZ->result_array() as $_oRow) {

                                                $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                $_oFFULNME = $_oRow['FFULNME'];
                                                ?>
                                                <option value="<?php
                                                echo $_oFCODEZZ;
                                                ?>"><?php echo $_oFFULNME; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Task Subject';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Subyek Penugasan (Task)';
                                            } else {
                                                echo 'Subyek Penugasan (Task)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFSBJECT" class="form-control" value="<?php
                                        if (!empty($_oFSBJECT)) {
                                            echo $_oFSBJECT;
                                        } else {
                                            echo '...';
                                        };
                                        ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Due-Date';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Due-Date (Batas-Waktu)';
                                            } else {
                                                echo 'Due-Date (Batas-Waktu)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <div class="input-group date">
                                            <input type="text" name="_finFDUEDTE" class="form-control" value="<?php
                                            if (!empty($_oFDUADTE)) {
                                                echo $_oFDUADTE;
                                            } else {
                                                echo '...';
                                            };
                                            ?>">
                                            <span class="input-group-addon">
                                                <span><i class="fas fa-calendar-alt fa-fw"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status';
                                            } else {
                                                echo 'Status';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_edtFSTATUS" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFSTATUS; ?>"><?php
                                                if (!empty($_oFSTATUS)) {
                                                    if ($_oFSTATUS == '1') {
                                                        echo 'Baru';
                                                    } else if ($_oFSTATUS == '2') {
                                                        echo 'Dalam Proses';
                                                    } else if ($_oFSTATUS == '3') {
                                                        echo 'Selesai';
                                                    }
                                                } else {
                                                    echo '...';
                                                };
                                                ?></option>

                                            <option value="1">Baru</option>
                                            <option value="2">Dalam Proses</option>
                                            <option value="3">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Priority';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Prioritas';
                                            } else {
                                                echo 'Prioritas';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_edtFPRIORT" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFSTATUS; ?>"><?php
                                                if (!empty($_oFPRIORT)) {
                                                    if ($_oFPRIORT == '1') {
                                                        echo 'Rendah';
                                                    } else if ($_oFPRIORT == '2') {
                                                        echo 'Sedang';
                                                    } else if ($_oFPRIORT == '3') {
                                                        echo 'Tinggi';
                                                    }
                                                }
                                                ?></option>

                                            <option value="1">Rendah</option>
                                            <option value="2">Sedang</option>
                                            <option value="3">Tinggi</option>
                                        </select>
                                        <div style="height: 20px;">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            break;
        case "tskdel" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR003/tsklst') . '"}});});';
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