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
    switch ($_swiUSR002) {
        case "msg1st" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1dd/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            <th class="text-center" style="white-space: nowrap">Simbol</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sender Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pengirim';
                                                } else {
                                                    echo 'Nama Pengirim';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek';
                                                } else {
                                                    echo 'Subyek';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Received';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Diterima';
                                                } else {
                                                    echo 'Diterima';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblMESSGE as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="right" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%;">
                                                    <?php
                                                    $_oFFLAGZZ = $_oRow['FFLAGZZ'];

                                                    if (!empty($_oRow['FDATIRD'])) {
                                                        $_oFDATIRD = $this->sklibrfnc->_fSETDteInd(substr($_oRow['FDATISN'], 0, 8)) . ' ' . substr($_oRow['FDATISN'], 8, 8);
                                                    } else {
                                                        $_oFDATIRD = '';
                                                    }


                                                    if ($_oFFLAGZZ == 'U') {
                                                        echo '<a href="#" title="#belum dibaca"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-envelope fa-fw"></i></font></a>';
                                                    } elseif ($_oFFLAGZZ == 'R') {
                                                        echo '<a href="#" title="#sudah dibaca (' . $_oFDATIRD . ')"><font style="color: #64BB09; font-size: 1.05em"><i class="far fa-envelope-open fa-fw"></i></font></a>';
                                                    } elseif ($_oFFLAGZZ == 'D') {
                                                        echo '<a href="#" title="#sudah dihapus"><font style="color: #DE121F; font-size: 1.05em"><i class="far fa-trash-alt fa-fw"></i></font></a>';
                                                    }

                                                    if (!empty($_oRow['FATTACH'])) {
                                                        $_oFATTACH = '<a href="#" title="#ada attachment"><font style="color: #DFAE14; font-size: 1.05em"><i class="fas fa-paperclip fa-fw"></i></font></a>';
                                                    } else {
                                                        $_oFATTACH = '<a href="#" title="#tidak ada attachment"><font style="color: #f5f5F5; font-size: 1.05em"><i class="fas fa-paperclip fa-fw"></i></font></a>';
                                                    }
                                                    if (!empty($_oRow['FEMLSTA'])) {
                                                        if ($_oRow['FEMLSTA'] == 'opn') {
                                                            $_oFEMLSTA = '<a href="#" title="#open"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-door-open fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'cls') {
                                                            $_oFEMLSTA = '<a href="#" title="#closed"><font style="color: #64BB09; font-size: 1.05em"><i class="fas fa-door-closed fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'opr') {
                                                            $_oFEMLSTA = '<a href="#" title="#on-progress"><font style="color: #DFAE14; font-size: 1.05em"><i class="fas fa-arrow-circle-right fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'pnd') {
                                                            $_oFEMLSTA = '<a href="#" title="#pending"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-hand-paper fa-fw"></i></font></a>';
                                                        }
                                                    } else {
                                                        $_oFEMLSTA = '<a href="#" title="#open"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-door-open fa-fw"></i></font></a>';
                                                    }

                                                    if (!empty($_oRow['FDUEDTE'])) {
                                                        $_oFDUEDTE = '<a href="#" title="#ada due-date"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-bell fa-fw"></i></font></a>';
                                                    } else {
                                                        $_oFDUEDTE = '<a href="#" title="#tidak ada due-date"><font style="color: #f5f5f5; font-size: 1.05em"><i class="fas fa-bell fa-fw"></i></font></a>';
                                                    }
                                                    echo '&nbsp;';
                                                    echo $_oFATTACH;
                                                    echo '&nbsp;';
                                                    echo $_oFEMLSTA;
                                                    echo '&nbsp;';
                                                    echo $_oFDUEDTE;
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $_oRow['XSENDER'];
                                                    ?>
                                                </td>
                                                <td align="left">
                                                    <?php
                                                    if (!empty($_oRow['FSBJECT'])) {
                                                        if (strlen($_oRow['FSBJECT']) >= 50) {
                                                            echo substr($_oRow['FSBJECT'], 0, 50) . '<font style="color: #ff0000">...</font>';
                                                        } elseif ((strlen($_oRow['FSBJECT']) > 0) && (strlen($_oRow['FSBJECT']) < 50)) {
                                                            echo $_oRow['FSBJECT'];
                                                        } else {
                                                            echo '...';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $this->sklibrfnc->_fSETDteInd(substr($_oRow['FDATISN'], 0, 8)) . ' ' . substr($_oRow['FDATISN'], 8, 8);
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1iw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_oRow['GRECNMB'] . '/' . $_oRow['GCODEZZ']; ?>" title="<?php
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
        case "msg2st" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
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
                                    echo '_objENGsentzz';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINAsentzz';
                                } else {
                                    echo '_objINAsentzz';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">Simbol</th>
                                            <th class="text-center" style="white-space: nowrap">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Receiver Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Penerima';
                                                } else {
                                                    echo 'Nama Penerima';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap" title="Electronic Filling Identification Number">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek';
                                                } else {
                                                    echo 'Subyek';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap" title="Nomor Pokok Wajib Pajak">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sent';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dikirim';
                                                } else {
                                                    echo 'Dikirim';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oSeq = 0;
                                        foreach ($_tblMESSGE as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="right" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%;">
                                                    <?php
                                                    $_oFFLAGZZ = $_oRow['FFLAGZZ'];

                                                    if (!empty($_oRow['FDATIRD'])) {
                                                        $_oFDATIRD = $this->sklibrfnc->_fSETDteInd(substr($_oRow['FDATISN'], 0, 8)) . ' ' . substr($_oRow['FDATISN'], 8, 8);
                                                    } else {
                                                        $_oFDATIRD = '';
                                                    }


                                                    if ($_oFFLAGZZ == 'U') {
                                                        echo '<a href="#" title="#belum dibaca"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-envelope fa-fw"></i></font></a>';
                                                    } elseif ($_oFFLAGZZ == 'R') {
                                                        echo '<a href="#" title="#sudah dibaca (' . $_oFDATIRD . ')"><font style="color: #64BB09; font-size: 1.05em"><i class="far fa-envelope-open fa-fw"></i></font></a>';
                                                    } elseif ($_oFFLAGZZ == 'D') {
                                                        echo '<a href="#" title="#sudah dihapus"><font style="color: #DE121F; font-size: 1.05em"><i class="far fa-trash-alt fa-fw"></i></font></a>';
                                                    }

                                                    if (!empty($_oRow['FATTACH'])) {
                                                        $_oFATTACH = '<a href="#" title="#ada attachment"><font style="color: #DFAE14; font-size: 1.05em"><i class="fas fa-paperclip fa-fw"></i></font></a>';
                                                    } else {
                                                        $_oFATTACH = '<a href="#" title="#tidak ada attachment"><font style="color: #f5f5F5; font-size: 1.05em"><i class="fas fa-paperclip fa-fw"></i></font></a>';
                                                    }
                                                    if (!empty($_oRow['FEMLSTA'])) {
                                                        if ($_oRow['FEMLSTA'] == 'opn') {
                                                            $_oFEMLSTA = '<a href="#" title="#open"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-door-open fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'cls') {
                                                            $_oFEMLSTA = '<a href="#" title="#closed"><font style="color: #64BB09; font-size: 1.05em"><i class="fas fa-door-closed fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'opr') {
                                                            $_oFEMLSTA = '<a href="#" title="#on-progress"><font style="color: #DFAE14; font-size: 1.05em"><i class="fas fa-arrow-circle-right fa-fw"></i></font></a>';
                                                        } elseif ($_oRow['FEMLSTA'] == 'pnd') {
                                                            $_oFEMLSTA = '<a href="#" title="#pending"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-hand-paper fa-fw"></i></font></a>';
                                                        }
                                                    } else {
                                                        $_oFEMLSTA = '<a href="#" title="#open"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-door-open fa-fw"></i></font></a>';
                                                    }

                                                    if (!empty($_oRow['FDUEDTE'])) {
                                                        $_oFDUEDTE = '<a href="#" title="#ada due-date"><font style="color: #DE121F; font-size: 1.05em"><i class="fas fa-bell fa-fw"></i></font></a>';
                                                    } else {
                                                        $_oFDUEDTE = '<a href="#" title="#tidak ada due-date"><font style="color: #f5f5f5; font-size: 1.05em"><i class="fas fa-bell fa-fw"></i></font></a>';
                                                    }
                                                    echo '&nbsp;';
                                                    echo $_oFATTACH;
                                                    echo '&nbsp;';
                                                    echo $_oFEMLSTA;
                                                    echo '&nbsp;';
                                                    echo $_oFDUEDTE;
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $_oRow['XRECVER'];
                                                    ?>
                                                </td>
                                                <td align="left">
                                                    <?php
                                                    if (!empty($_oRow['FSBJECT'])) {
                                                        if (strlen($_oRow['FSBJECT']) >= 50) {
                                                            echo substr($_oRow['FSBJECT'], 0, 50) . '<font style="color: #ff0000">...</font>';
                                                        } elseif ((strlen($_oRow['FSBJECT']) > 0) && (strlen($_oRow['FSBJECT']) < 50)) {
                                                            echo $_oRow['FSBJECT'];
                                                        } else {
                                                            echo '...';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $this->sklibrfnc->_fSETDteInd(substr($_oRow['FDATISN'], 0, 8)) . ' ' . substr($_oRow['FDATISN'], 8, 8);
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg2iw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_oRow['GRECNMB'] . '/' . $_oRow['GCODEZZ']; ?>" title="<?php
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
            </div>
            <?php
            break;
        case "msg1dd" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1ve/' . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tmessge');
                $this->db->like('FCODEZZ', 'MSG' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kirim';
                                } else {
                                    echo 'Kirim';
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
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="label-mins">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Message Sequence Nmb.';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'No. Urut Pesan';
                                                    } else {
                                                        echo 'No. Urut Pesan';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFCODEZZ" class="form-control" autofocus required value="<?php
                                                echo $_oCODEXX;
                                                ?>" readonly>
                                            </div>
                                            <div class="hidden">
                                                <input type="text" name="_finFSENDER" class="form-control" autofocus required value="<?php
                                                echo $_empFCODEZZ;
                                                ?>" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Message Receiver Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Penerima Pesan';
                                                    } else {
                                                        echo 'Nama Penerima Pesan';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="..." data-allow-clear="false" name="_finFRECVER" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">
                                                    <option></option>
                                                    <?php foreach ($_tblSTAFFZ as $_oRow) { ?>
                                                        <option value="<?php
                                                        $_oFCODEZZ = explode(';', $_oRow['FCODEZZ']);
                                                        echo $_oFCODEZZ[0];
                                                        ?>"><?php
                                                                    $_oFFULNME = explode(';', $_oRow['FFULNME']);
                                                                    echo $_oFFULNME[0];
                                                                    ;
                                                                    ?></option>';
                                                    <?php } ?>
                                                </select>

                                            </div>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Subject';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Subyek';
                                                    } else {
                                                        echo 'Subyek';
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
                                            <div class="col-lg-3">
                                                <input type="file" id="_fleFATTACH" name="_fleFATTACH" style="display: none" onchange="document.getElementById('_finFATTACH').value = this.value" accept="*">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Attachment';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Attachment (Lampiran)';
                                                    } else {
                                                        echo 'Attachment (Lampiran)';
                                                    };
                                                    ?>&nbsp;<font style="color: silver; font-style: italic; font-weight: normal">max. 1MB</font>&nbsp;:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Attach File`';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Attach File';
                                                        } else {
                                                            echo 'Attach File';
                                                        }
                                                        ?>" onclick="document.getElementById('_fleFATTACH').click()"><i class="fas fa-paperclip fa-fw fa-lg"></i>
                                                        </a>
                                                    </span>
                                                    <input type="text" id="_finFATTACH" name="_finFATTACH" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Contents';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Isi Pesan';
                                                } else {
                                                    echo 'Isi Pesan';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <textarea rows="10" type="text" name="_finFMESSGE" class="form-control" autofocus required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 0px;">
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
            break;
        case "msg1ve" :
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
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Message Sent</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Pesan Terkirim</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Pesan Terkirim</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Message Not Sent</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Pesan Tidak Terkirim</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Pesan Tidak Terkirim</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Attachment File Size > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Ukuran File Attachment > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1dd/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "msg1iw" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            $_msgFRECNMB = $this->uri->segment(6);
            $_msgFCODEZZ = $this->uri->segment(7);

            $_oGCODEZZ = $_tblMESSGE['0']['GCODEZZ'];
            $_oFSENDER = $_tblMESSGE['0']['FSENDER'];
            $_oXSENDER = $_tblMESSGE['0']['XSENDER'];
            $_oFSBJECT = $_tblMESSGE['0']['FSBJECT'];
            $_oFMESSGE = $_tblMESSGE['0']['FMESSGE'];
            $_oFATTACH = $_tblMESSGE['0']['FATTACH'];
            $_oFDUEDTE = $_tblMESSGE['0']['FDUEDTE'];
            $_oFEMLSTA = $_tblMESSGE['0']['FEMLSTA'];
            $_oFUPDSTA = $_tblMESSGE['0']['FUPDSTA'];
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #292b2c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1rp/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ . '/' . $_oFSENDER; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Reply';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Reply';
                            } else {
                                echo 'Reply';
                            };
                            ?>" style="background-color: #DFAE14"><font style="color: #ffffff; font-size: 17px"><i class="fa fa-reply fa-fw fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1dt/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Edit';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Edit';
                            } else {
                                echo 'Edit';
                            };
                            ?>" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                    echo 'Message Sequence Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Urut Pesan';
                                                } else {
                                                    echo 'No. Urut Pesan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFCODEZZ" class="form-control" autofocus required value="<?php
                                            echo $_oGCODEZZ;
                                            ?>" readonly>
                                        </div>
                                        <div class="hidden">
                                            <input type="text" name="_finFSENDER" class="form-control" autofocus required value="<?php
                                            echo $_empFCODEZZ;
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sender Message Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pengirim Pesan';
                                                } else {
                                                    echo 'Nama Pengirim Pesan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXSENDER" class="form-control" autofocus value="<?php
                                            echo $_oXSENDER;
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-3">
                                            <?php
                                            if (!empty($_oFDUEDTE)) {

                                                date_default_timezone_set('Asia/Jakarta');
                                                $_oNow = date("m/d/Y");
                                                $_xDue = substr($_oFDUEDTE, 4, 2) . '/' . substr($_oFDUEDTE, 6, 2) . '/' . substr($_oFDUEDTE, 0, 4);
                                                $_oDue = strtotime($_xDue) - strtotime($_oNow);
                                                $_rDue = $_oDue / (60 * 60 * 24);
                                            } else {
                                                $_rDue = 'emp';
                                            }
                                            ?>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                } else {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input style="color: #ff0000" type="text" name="_viwFDUEDTE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFDUEDTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFDUEDTE, 0, 8)) . ' ' . substr($_oFDUEDTE, 8, 8);
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek';
                                                } else {
                                                    echo 'Subyek';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFSBJECT" class="form-control" autofocus readonly value="<?php
                                            echo $_oFSBJECT;
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Attachment';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Attachment (Lampiran)';
                                                } else {
                                                    echo 'Attachment (Lampiran)';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1dw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ . '/download:' . $_oFATTACH; ?>" role="button" class="btn btn-default" style="width: 50px;" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Download';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Download';
                                                    } else {
                                                        echo 'Download';
                                                    }
                                                    ?>"><font style="color: #bd2c00"><i class="fas fa-download fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFATTACH)) {
                                                    echo $_oFATTACH;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Message Contents';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Isi Pesan';
                                            } else {
                                                echo 'Isi Pesan';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <textarea rows="10" type="text" name="_viwFMESSGE" class="form-control" autofocus readonly><?php
                                            if (!empty($_oFMESSGE)) {
                                                echo str_replace("_n_", "\n", trim($_oFMESSGE));
                                            } else {
                                                echo '...';
                                            }
                                            ;
                                            ?></textarea>
                                    </div>




                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="sk_label_modification"><font style="color: #ff0000">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Status/Follow-Up';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status/Tindak Lanjut Pesan';
                                                } else {
                                                    echo 'Status/Tindak Lanjut Pesan';
                                                };
                                                ?>&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_viwFEMLSTA" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEMLSTA)) {
                                                if ($_oFEMLSTA == 'opn') {
                                                    echo 'Open';
                                                } elseif ($_oFEMLSTA == 'cls') {
                                                    echo 'Closed';
                                                } elseif ($_oFEMLSTA == 'pnd') {
                                                    echo 'Pending';
                                                } elseif ($_oFEMLSTA == 'opr') {
                                                    echo 'On-Progress';
                                                }
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="sk_label_modification"><font style="color: #ff0000">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Last Update';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Update Terakhir';
                                                } else {
                                                    echo 'Update Terakhir';
                                                };
                                                ?>&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_viwFUPDSTA" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFUPDSTA)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFUPDSTA, 0, 8)) . ' ' . substr($_oFUPDSTA, 8, 8);
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 0px;">
                                <br>
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
        case "msg1dw" :
            ?>
            <?php
            $_empFCODEZZ = $this->uri->segment(4);
            $_msgFCODEZZ = $this->uri->segment(5);
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-left">
                        &nbsp;
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1iw/' . $_empFCODEZZ . '/' . $_msgFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #0097ff"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    FILE DONLOT
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "msg1rp" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            $_msgFRECNMB = $this->uri->segment(6);
            $_msgFCODEZZ = $this->uri->segment(7);

            $_oXRECVER = $_tblMESSGE['0']['XRECVER'];
            $_oFRECVER = $_tblMESSGE['0']['FRECVER'];
            $_oXSENDER = $_tblMESSGE['0']['XSENDER'];
            $_oFSENDER = $_tblMESSGE['0']['FSENDER'];

            $_oFSBJECT = $_tblMESSGE['0']['FSBJECT'];
            $_oFMESSGE = $_tblMESSGE['0']['FMESSGE'];
            $_oFDATISN = $_tblMESSGE['0']['FDATISN'];
            $_oFDATIRD = $_tblMESSGE['0']['FDATIRD'];
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1go/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tmessge');
                $this->db->like('FCODEZZ', 'MSG' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                    }
                } else {

                    $_oCODEXX = 'MSG' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1iw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kirim';
                                } else {
                                    echo 'Kirim';
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
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label class="label-mins">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Message Sequence Nmb.';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'No. Urut Pesan';
                                                    } else {
                                                        echo 'No. Urut Pesan';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_repFCODEZZ" class="form-control" autofocus required value="<?php
                                                echo $_oCODEXX;
                                                ?>" readonly>
                                            </div>
                                            <div class="hidden">
                                                <input type="text" name="_repFSENDER" class="form-control" autofocus required value="<?php
                                                echo $_oFRECVER;
                                                ?>" readonly>
                                            </div>
                                            <div class="hidden">
                                                <input type="text" name="_repXSENDER" class="form-control" autofocus required value="<?php
                                                echo $_oXRECVER;
                                                ?>" readonly>
                                            </div>
                                            <div class="hidden">
                                                <input type="text" name="_repFRECVER" class="form-control" autofocus required value="<?php
                                                echo $_oFSENDER;
                                                ?>" readonly>
                                            </div>
                                            <div class="hidden">
                                                <input type="text" name="_repXRECVER" class="form-control" autofocus required value="<?php
                                                echo $_oXSENDER;
                                                ?>" readonly>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Message Receiver Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Penerima Pesan';
                                                    } else {
                                                        echo 'Nama Penerima Pesan';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFSBJECT" class="form-control" autofocus readonly value="<?php echo $_oXSENDER; ?>">
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="file" id="_fleFATTACH" name="_fleFATTACH" style="display: none" onchange="document.getElementById('_repFATTACH').value = this.value" accept="*">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Attachment';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Attachment (Lampiran)';
                                                    } else {
                                                        echo 'Attachment (Lampiran)';
                                                    };
                                                    ?>&nbsp;<font style="color: silver; font-weight: normal; font-style: italic">max : 1MB</font>&nbsp;:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-default" style="width: 50px; color: #bd2c00" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Attach File`';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Attach File';
                                                        } else {
                                                            echo 'Attach File';
                                                        }
                                                        ?>" onclick="document.getElementById('_fleFATTACH').click()"><i class="fas fa-paperclip fa-fw fa-lg"></i>
                                                        </a>
                                                    </span>
                                                    <input type="text" id="_repFATTACH" name="_repFATTACH" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek';
                                                } else {
                                                    echo 'Subyek';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_repFSBJECT" class="form-control" autofocus required oninvalid="<?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo "this.setCustomValidity('Please fill out this field')";
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            } else {
                                                echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                            };
                                            ?>" oninput="setCustomValidity('')" value="<?php echo 'RE: ' . $_oFSBJECT ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Contents';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Isi Pesan';
                                                } else {
                                                    echo 'Isi Pesan';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <textarea rows="10" type="text" name="_repFMESSGE" class="form-control" autofocus><?php
                                                if (!empty($_oFMESSGE)) {
                                                    $_oOne = '(reply)_n__n_';
                                                    $_oTwo = '~ history_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _n_';
                                                    $_oTre = '~ Pengirim : ' . $_oXSENDER . '_n_';
                                                    $_oFou = '~ Dikirim : ' . $this->sklibrfnc->_fSETDteInd(substr($_oFDATISN, 0, 8)) . ' ' . substr($_oFDATISN, 8, 8) . '_n_';
                                                    $_oFiv = '~ Penerima : ' . $_oXRECVER . '_n_';
                                                    $_oSix = '~ Subyek : ' . $_oFSBJECT . '_n__n_';
                                                    $_oSev = $_oFMESSGE;

                                                    $_varFMESSGE = $_oOne . $_oTwo . $_oTre . $_oFou . $_oFiv . $_oSix . $_oSev;

                                                    echo str_replace("_n_", "\n", trim($_varFMESSGE));
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div style="height: 0px;">
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
            break;
        case "msg1go" :
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
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Message Sent</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Pesan Terkirim</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Pesan Terkirim</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error !</h3>", html: "<h4>Message Not Sent</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Pesan Tidak Terkirim</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Pesan Tidak Terkirim</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Attachment File Size > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1st/' . $_empFRECNMB . '/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Ukuran File Attachment > 1 Mb</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR002/msg1dd/' . $_empFCODEZZ . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "msg1dt" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            $_msgFRECNMB = $this->uri->segment(6);
            $_msgFCODEZZ = $this->uri->segment(7);

            $_oGCODEZZ = $_tblMESSGE['0']['GCODEZZ'];
            $_oFSENDER = $_tblMESSGE['0']['FSENDER'];
            $_oXSENDER = $_tblMESSGE['0']['XSENDER'];
            $_oFSBJECT = $_tblMESSGE['0']['FSBJECT'];
            $_oFMESSGE = $_tblMESSGE['0']['FMESSGE'];
            $_oFATTACH = $_tblMESSGE['0']['FATTACH'];
            $_oFDUEDTE = $_tblMESSGE['0']['FDUEDTE'];
            $_oFEMLSTA = $_tblMESSGE['0']['FEMLSTA'];
            $_oFUPDSTA = $_tblMESSGE['0']['FUPDSTA'];
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1pd/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1iw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            <label class="label-mins">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Pesan';
                                                } else {
                                                    echo 'Kode Pesan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFCODEZZ" class="form-control" autofocus required value="<?php
                                            echo $_oGCODEZZ;
                                            ?>" readonly>
                                        </div>
                                        <div class="hidden">
                                            <input type="text" name="_finFSENDER" class="form-control" autofocus required value="<?php
                                            echo $_empFCODEZZ;
                                            ?>" readonly>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sender Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pengirim';
                                                } else {
                                                    echo 'Nama Pengirim';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXSENDER" class="form-control" autofocus value="<?php
                                            echo $_oXSENDER;
                                            ?>" readonly>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Subject';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Subyek';
                                                } else {
                                                    echo 'Subyek';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFSBJECT" class="form-control" autofocus readonly value="<?php
                                            echo $_oFSBJECT;
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Contents';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Isi Pesan';
                                                } else {
                                                    echo 'Isi Pesan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <textarea rows="10" type="text" name="_viwFMESSGE" class="form-control" autofocus readonly><?php
                                                if (!empty($_oFMESSGE)) {
                                                    echo str_replace("_n_", "\n", trim($_oFMESSGE));
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?></textarea>
                                        </div>
                                        <div>    
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Attachment';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Attachment';
                                                } else {
                                                    echo 'Attachment';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg1dw/' . $_empFCODEZZ . '/' . $_msgFCODEZZ . '/download:' . $_oFATTACH; ?>" role="button" class="btn btn-default" style="width: 50px;" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Download';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Download';
                                                    } else {
                                                        echo 'Download';
                                                    }
                                                    ?>"><font style="color: #bd2c00"><i class="fas fa-download fa-fw fa-lg"></i></font>
                                                    </a>
                                                </span>
                                                <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFATTACH)) {
                                                    echo $_oFATTACH;
                                                } else {
                                                    echo '...';
                                                }
                                                ;
                                                ?>">
                                            </div>
                                        </div>
                                        <div>
                                            <div style="height: 10px;">
                                                <br>
                                            </div>
                                            <hr class="sk_hr_modification0">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Message Status/Follow-Up';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Status Pesan/Follow-Up';
                                                    } else {
                                                        echo 'Status Pesan/Follow-Up';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFEMLSTA" required oninvalid="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo "this.setCustomValidity('Please select an item in the list')";
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                } else {
                                                    echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                };
                                                ?>" onchange="setCustomValidity('')">


                                                    <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                        <option value="<?php echo $_oFEMLSTA; ?>"><?php
                                                            if (!empty($_oFEMLSTA)) {
                                                                if ($_oFEMLSTA == 'opn') {
                                                                    echo 'Open';
                                                                } elseif ($_oFEMLSTA == 'cls') {
                                                                    echo 'Closed';
                                                                } elseif ($_oFEMLSTA == 'pnd') {
                                                                    echo 'Pending';
                                                                } elseif ($_oFEMLSTA == 'opr') {
                                                                    echo 'On-Progress';
                                                                }
                                                            }
                                                            ?></option>
                                                        <option value="opn">Open</option>
                                                        <option value="cls">Closed</option>
                                                        <option value="pnd">Pending</option>
                                                        <option value="opr">On-Progress</option>
                                                    <?php } elseif ($_sesFLNGAGE == 'ina') {
                                                        ?>
                                                        <option value="<?php echo $_oFEMLSTA; ?>"><?php
                                                            if (!empty($_oFEMLSTA)) {
                                                                if ($_oFEMLSTA == 'opn') {
                                                                    echo 'Open';
                                                                } elseif ($_oFEMLSTA == 'cls') {
                                                                    echo 'Closed';
                                                                } elseif ($_oFEMLSTA == 'pnd') {
                                                                    echo 'Pending';
                                                                } elseif ($_oFEMLSTA == 'opr') {
                                                                    echo 'On-Progress';
                                                                }
                                                            }
                                                            ?></option>
                                                        <option value="opn">Open</option>
                                                        <option value="cls">Closed</option>
                                                        <option value="pnd">Pending</option>
                                                        <option value="opr">On-Progress</option>
                                                    <?php } else {
                                                        ?>
                                                        <option value="<?php echo $_oFEMLSTA; ?>"><?php
                                                            if (!empty($_oFEMLSTA)) {
                                                                if ($_oFEMLSTA == 'opn') {
                                                                    echo 'Open';
                                                                } elseif ($_oFEMLSTA == 'cls') {
                                                                    echo 'Closed';
                                                                } elseif ($_oFEMLSTA == 'pnd') {
                                                                    echo 'Pending';
                                                                } elseif ($_oFEMLSTA == 'opr') {
                                                                    echo 'On-Progress';
                                                                }
                                                            }
                                                            ?></option>
                                                        <option value="opn">Open</option>
                                                        <option value="cls">Closed</option>
                                                        <option value="pnd">Pending</option>
                                                        <option value="opr">On-Progress</option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Subject';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Subyek';
                                                    } else {
                                                        echo 'Due-Date';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" name="_viwFDUEDTE" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFDUEDTE)) {
                                                    echo $this->sklibrfnc->_fSETDteInd(substr($_oFDUEDTE, 0, 8)) . ' ' . substr($_oFDUEDTE, 8, 8);
                                                } else {
                                                    echo '...';
                                                }
                                                ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Last Update';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Update Terakhir';
                                                    } else {
                                                        echo 'Update Terakhir';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" name="_viwFUPDSTA" class="form-control" autofocus readonly value="<?php
                                                if (!empty($_oFUPDSTA)) {
                                                    echo $_oFUPDSTA;
                                                } else {
                                                    echo '...';
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 0px;">
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
            break;
        case "msg2iw" :
            ?>
            <?php
            $_empFRECNMB = $this->uri->segment(4);
            $_empFCODEZZ = $this->uri->segment(5);
            $_msgFRECNMB = $this->uri->segment(6);
            $_msgFCODEZZ = $this->uri->segment(7);

            $_oGCODEZZ = $_tblMESSGE['0']['GCODEZZ'];
            $_oXSENDER = $_tblMESSGE['0']['XSENDER'];
            $_oXRECVER = $_tblMESSGE['0']['XRECVER'];
            $_oFDATISN = $_tblMESSGE['0']['FDATISN'];
            $_oFDATIRD = $_tblMESSGE['0']['FDATIRD'];
            $_oFSBJECT = $_tblMESSGE['0']['FSBJECT'];
            $_oFMESSGE = $_tblMESSGE['0']['FMESSGE'];
            $_oFATTACH = $_tblMESSGE['0']['FATTACH'];
            $_oFEMLSTA = $_tblMESSGE['0']['FEMLSTA'];
            $_oFDUEDTE = $_tblMESSGE['0']['FDUEDTE'];
            $_oFUPDSTA = $_tblMESSGE['0']['FUPDSTA'];
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR002/msg2st/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Message Code';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Pesan';
                                            } else {
                                                echo 'Kode Pesan';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFCODEZZ" class="form-control" autofocus required value="<?php
                                        echo $_oGCODEZZ;
                                        ?>" readonly>
                                    </div>
                                    <div class="hidden">
                                        <input type="text" name="_finFSENDER" class="form-control" autofocus required value="<?php
                                        echo $_empFCODEZZ;
                                        ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sender Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Pengirim';
                                                } else {
                                                    echo 'Nama Pengirim';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXSENDER" class="form-control" autofocus value="<?php
                                            echo $_oXSENDER;
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Sent';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dikirim';
                                                } else {
                                                    echo 'Dikirim';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFDATISN" class="form-control" autofocus value="<?php
                                            if (!empty($_oFDATISN)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFDATISN, 0, 8)) . ' ' . substr($_oFDATISN, 8, 8);
                                            } else {
                                                echo '...';
                                            }
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Receiver Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Penerima';
                                                } else {
                                                    echo 'Nama Penerima';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXRECVER" class="form-control" autofocus value="<?php
                                            echo $_oXRECVER;
                                            ?>" readonly>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Read';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dibaca';
                                                } else {
                                                    echo 'Dibaca';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input style="color: #ff0000" type="text" name="_viwFDATIRD" class="form-control" autofocus value="<?php
                                            if (!empty($_oFDATIRD)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFDATIRD, 0, 8)) . ' ' . substr($_oFDATIRD, 8, 8);
                                            } else {
                                                echo '...';
                                            }
                                            ?>" readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Subject';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Subyek';
                                            } else {
                                                echo 'Subyek';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFSBJECT" class="form-control" autofocus readonly value="<?php
                                        echo $_oFSBJECT;
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Message Contents';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Isi Pesan';
                                            } else {
                                                echo 'Isi Pesan';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <textarea rows="10" type="text" name="_viwFMESSGE" class="form-control" autofocus readonly><?php
                                            if (!empty($_oFMESSGE)) {
                                                echo str_replace("_n_", "\n", trim($_oFMESSGE));
                                            } else {
                                                echo '...';
                                            }
                                            ;
                                            ?></textarea>
                                    </div>
                                    <div>    
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Attachment';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Attachment';
                                            } else {
                                                echo 'Attachment';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a href="#" role="button" class="btn btn-default disabled" style="width: 50px;" title="<?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Download';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Download';
                                                } else {
                                                    echo 'Download';
                                                }
                                                ?>"><font style="color: #bd2c00"><i class="fas fa-download fa-fw fa-lg"></i></font>
                                                </a>
                                            </span>
                                            <input type="text" name="_finFSEQNMB" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFATTACH)) {
                                                echo $_oFATTACH;
                                            } else {
                                                echo '...';
                                            }
                                            ;
                                            ?>">
                                        </div>
                                    </div>
                                    <div>
                                        <div style="height: 10px;">
                                            <br>
                                        </div>
                                        <hr class="sk_hr_modification0">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Message Status/Follow-Up';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Status Pesan/Follow-Up';
                                                } else {
                                                    echo 'Status Pesan/Follow-Up';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFEMLSTA" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFEMLSTA)) {
                                                if ($_oFEMLSTA == 'opn') {
                                                    echo 'Open';
                                                } elseif ($_oFEMLSTA == 'cls') {
                                                    echo 'Closed';
                                                } elseif ($_oFEMLSTA == 'pnd') {
                                                    echo 'Pending';
                                                } elseif ($_oFEMLSTA == 'opr') {
                                                    echo 'On-Progress';
                                                }
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <?php
                                            if (!empty($_oFDUEDTE)) {

                                                date_default_timezone_set('Asia/Jakarta');
                                                $_oNow = date("m/d/Y");
                                                $_xDue = substr($_oFDUEDTE, 4, 2) . '/' . substr($_oFDUEDTE, 6, 2) . '/' . substr($_oFDUEDTE, 0, 4);
                                                $_oDue = strtotime($_xDue) - strtotime($_oNow);
                                                $_rDue = $_oDue / (60 * 60 * 24);
                                            } else {
                                                $_rDue = 'emp';
                                            }
                                            ?>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                } else {
                                                    if ($_rDue > 0) {
                                                        echo 'Due-Date ( <font style="color: #ff0000">' . $_rDue . '</font> )';
                                                    } elseif ($_rDue < 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue = 0) {
                                                        echo 'Due-Date ( <font style="color: #808080">' . 'Expired' . '</font> )';
                                                    } elseif ($_rDue == 'emp') {
                                                        echo 'Due-Date';
                                                    }
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input style="color: #ff0000" type="text" name="_viwFDUEDTE" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFDUEDTE)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFDUEDTE, 0, 8)) . ' ' . substr($_oFDUEDTE, 8, 8);
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Last Update';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Update Terakhir';
                                                } else {
                                                    echo 'Update Terakhir';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwFUPDSTA" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFUPDSTA)) {
                                                echo $this->sklibrfnc->_fSETDteInd(substr($_oFUPDSTA, 0, 8)) . ' ' . substr($_oFUPDSTA, 8, 8);
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
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "cmpupd" :
            ?>
            note : COMPANY UPDATE
            <?php
            break;
    }
    ?>
</section>