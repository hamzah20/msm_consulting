<?php
$_oDat = date("Ymd");
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFUSRTYP = $this->session->FUSRTYP;
$_sesFFULNME = $this->session->FFULNME;
$_sesFCODEZZ = $this->session->FCODEZZ;

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
    <div class="info pull-left">
        <img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" width="" height="48"alt="msmconsultinglogo">              
    </div>
    <div class="info pull-right">
        <img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" width="48" height="48" alt="msmconsultinglogo">              
    </div>
    <div style="height: 50px;">
        <br>
    </div>
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
    switch ($_swiUSR001) {
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
                            <a disabled href="#" role="button" class="btn btn-default btn-flat sk_button_modification" style="background-color: #dcdcdc"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-align-justify fa-lg"></i></font></a>
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
                            <div class="sk_table_modification table-responsive">
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
                                                    echo 'Company Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Perusahaan';
                                                } else {
                                                    echo 'Nama Perusahaan';
                                                };
                                                ?>
                                            </th>
                                            <th class="text-center" style="white-space: nowrap" title="Electronic Filling Identification Number">
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
                                                <td align="right" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap;  width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oRow['FEFINZZ']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
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
                                                <td align="right" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oRow['FKLUZZZ']; ?>
                                                </td>
                                                <?php
                                                $_cmpFRECNMB = $_oRow['FRECNMB'];
                                                $_cmpFCODEZZ = $_oRow['FCODEZZ'];
                                                ?>

                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv' ?>" title="<?php
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
            <?php
            break;
        case "mon1st" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_varXTABVIW = $this->uri->segment(6);
            if (!empty($_varXTABVIW)) {
                $_swiTABVIW = $_varXTABVIW;
            } else {
                $_swiTABVIW = 'sk_actv';
            }
            $_varXPROCES = $this->uri->segment(7);
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-left">
                        &nbsp;
                        &nbsp;

                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/cmplst'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #292b2c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div style="height: 20px;">
                        <br>
                    </div>

                    <div class="col-lg-12">
                        <div class="bordered-tab-contents">
                            <ul class="nav nav-tabs" role="tablist" style="background-color: #f8f8f8">
                                <li class="<?php
                                if ($_swiTABVIW == 'sk_actv') {
                                    echo "active";
                                } else {
                                    echo '';
                                };
                                ?>"><a href="#sk_actv" data-toggle="tab"><font style="color: #d9534f; font-size: 1.05em"><i class="fas fa-microphone fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Client Activity';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Aktifitas Klien';
                                    } else {
                                        echo 'Aktifitas Klien';
                                    }
                                    ?>
                                    </a>
                                </li>

                                <li class="<?php
                                if ($_swiTABVIW == 'sk_mont') {
                                    echo "active";
                                } else {
                                    echo '';
                                };
                                ?>"><a href="#sk_mont" data-toggle="tab"><font style="color: #0275d8; font-size: 1.05em"><i class="fas fa-calendar-day fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Client Monthly';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Bulanan Klien';
                                    } else {
                                        echo 'Bulanan Klien';
                                    }
                                    ?>
                                    </a>
                                </li>
                                <li class="<?php
                                if ($_swiTABVIW == 'sk_year') {
                                    echo "active";
                                } else {
                                    echo '';
                                };
                                ?>"><a href="#sk_year" data-toggle="tab"><font style="color: #5cb85c; font-size: 1.05em"><i class="fas fa-calendar-week    fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Annualy Client';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Tahunan Klien';
                                    } else {
                                        echo 'Tahunan Klien';
                                    }
                                    ?>
                                    </a>

                            </ul>

                            <div class="tab-content">
                                <!--- SK_ACTV --->
                                <div class="tab-pane fade <?php
                                if ($_swiTABVIW == 'sk_actv') {
                                    echo "in active";
                                } else {
                                    echo '';
                                };
                                ?>" id="sk_actv">
                                    <div style="height: 20px;">
                                        <br>
                                    </div>
                                    <!--- sk_actv : LIST --->
                                    <div class="<?php
                                    if (($_varXTABVIW !== 'sk_actv') || (empty($_varXPROCES))) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <div class="pull-left">
                                                    &nbsp;
                                                    &nbsp;
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/add'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Add';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Tambah';
                                                    } else {
                                                        echo 'Tambah';
                                                    };
                                                    ?>" style="background-color: #ffffff"><font style="color: #5cb85c; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font></a>
                                                </div>
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div style="height: 20px;">
                                                    <br>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGactday';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAactday';
                                                        } else {
                                                            echo '_objINAactday';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr style="color: #f8f8f8; background-color: #4db8ff">
                                                                    <th class="text-center" style="white-space: nowrap">No.</th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal';
                                                                        } else {
                                                                            echo 'Tanggal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Time';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jam';
                                                                        } else {
                                                                            echo 'Jam';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Activity';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Aktifitas';
                                                                        } else {
                                                                            echo 'Aktifitas';
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
                                                                    <th class="text-center" style="white-space: nowrap">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_oSeq = 0;
                                                                foreach ($_tblACTLST as $_oRow) {
                                                                    $_oSeq ++;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="right" style="white-space: nowrap;  width: 1%">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td align="left" style="white-space: nowrap;  width: 1%">
                                                                            <?php echo $this->sklibrfnc->_fSETDteInd($_oRow['FDTESTA']); ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FTMESTA'])) {
                                                                                echo substr($_oRow['FTMESTA'], 0, 5) . ' - ' . substr($_oRow['FTMESTA'], 6, 5);
                                                                            } else {
                                                                                
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td align="left" style="white-space: nowrap;  width: 95%">
                                                                            <?php
                                                                            if (!empty($_oRow['FACTVTY'])) {
                                                                                if (strlen($_oRow['FACTVTY']) >= 50) {
                                                                                    echo substr($_oRow['FACTVTY'], 0, 50) . '<font color="#ff0000">...</font>';
                                                                                } else {
                                                                                    echo $_oRow['FACTVTY'];
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td align="left" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FSTATUS'])) {
                                                                                if ($_oRow['FSTATUS'] == 'opn') {
                                                                                    echo 'Open';
                                                                                } elseif ($_oRow['FSTATUS'] == 'cls') {
                                                                                    echo 'Closed';
                                                                                } elseif ($_oRow['FSTATUS'] == 'pnd') {
                                                                                    echo 'Pending';
                                                                                } elseif ($_oRow['FSTATUS'] == 'opr') {
                                                                                    echo 'On-Progress';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <?php
                                                                        $_cmpFRECNMB = $this->uri->segment(4);
                                                                        $_cmpFCODEZZ = $this->uri->segment(5);
                                                                        $_actFRECNMB = $_oRow['FRECNMB'];
                                                                        $_actFCODEZZ = $_oRow['FCODEZZ'];
                                                                        ?>

                                                                        <td align="center" style="white-space: nowrap; width: 1%">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/viw/' . $_actFRECNMB . '/' . $_actFCODEZZ ?>" title="<?php
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
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <!--- sk_actv : VIEW --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'viw')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                         <?php
                                         $_cmpFRECNMB = $this->uri->segment(4);
                                         $_cmpFCODEZZ = $this->uri->segment(5);
                                         $_actFRECNMB = $this->uri->segment(8);
                                         $_actFCODEZZ = $this->uri->segment(9);

                                         $_oFCODEZZ = $_tblACTVIW['0']['FCODEZZ'];
                                         $_oFDTESTA = $_tblACTVIW['0']['FDTESTA'];
                                         $_oFTMESTA = $_tblACTVIW['0']['FTMESTA'];
                                         $_oFACTVTY = $_tblACTVIW['0']['FACTVTY'];
                                         $_oFNOTEZZ = $_tblACTVIW['0']['FNOTEZZ'];
                                         $_oFSTATUS = $_tblACTVIW['0']['FSTATUS'];
                                         $_oXHANDLE = $_tblACTVIW['0']['XHANDLE'];
                                         ?>
                                        <div class="box">
                                            <div class="box-header">
                                                <div class="pull-left">
                                                    &nbsp;
                                                    &nbsp;

                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Back';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Kembali';
                                                    } else {
                                                        echo 'Kembali';
                                                    };
                                                    ?>" style="background-color: #ffffff"><font style="color: #292b2c; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                                                    <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/edt/' . $_actFRECNMB . '/' . $_actFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #ffffff"><font style="color: #f0ad4e; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

                                                    <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/del/' . $_actFRECNMB . '/' . $_actFCODEZZ; ?>" role="button" class=" btn btn-default btn-flat <?php
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
                                                       ?>" style="background-color: #ffffff"><font style="color: #d9534f; font-size: 17px"> <i class="far fa-trash-alt fa-fw fa-lg"></i></font></a>
                                                </div>
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div style="height: 20px;">
                                                    <br>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label class="sk_label_modification">
                                                                    <?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Activity Code';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Kode Aktifitas';
                                                                    } else {
                                                                        echo 'Kode Aktifitas';
                                                                    };
                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                </label>
                                                                <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
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
                                                                        echo 'Date';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Tanggal';
                                                                    } else {
                                                                        echo 'Tanggal';
                                                                    };
                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                </label>
                                                                <input type="text" name="_viwFDTESTA" class="form-control" autofocus readonly value="<?php
                                                                if (!empty($_oFDTESTA)) {
                                                                    echo $this->sklibrfnc->_fSETDteInd($_oFDTESTA);
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>">
                                                            </div>
                                                            <div>
                                                                <label class="sk_label_modification">
                                                                    <?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Time';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Jam';
                                                                    } else {
                                                                        echo 'Jam';
                                                                    }
                                                                    ?>&nbsp;:</label>
                                                                <table>
                                                                    <tr>
                                                                        <th width="50%"><input type="text" name="_finATTIDN" data-masked-input="99:99:99" maxlength="6" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFTMESTA)) {
                                                                                echo substr($_oFTMESTA, 0, 5);
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>"></th>
                                                                        <th class="text-center">&nbsp;&nbsp;&nbsp;<font color="#ff0000"><?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'to';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 's.d';
                                                                            } else {
                                                                                echo 's.d';
                                                                            }
                                                                            ?></font>&nbsp;&nbsp;&nbsp;</th> 
                                                                        <th width="50%"><input type="text" name="_finATTIDN" data-masked-input="99:99:99" maxlength="6" class="form-control" autofocus readonly value="<?php
                                                                            if (!empty($_oFTMESTA)) {
                                                                                echo substr($_oFTMESTA, 6, 5);
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ;
                                                                            ?>"></th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div>
                                                                <label class="sk_label_modification"><?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Activity';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Aktifitas';
                                                                    } else {
                                                                        echo 'Aktifitas';
                                                                    }
                                                                    ;
                                                                    ?>&nbsp;:
                                                                </label>
                                                                <textarea rows="4" type="text" name="_finFADDRES" class="form-control" autofocus readonly><?php
                                                                    if (!empty($_oFACTVTY)) {
                                                                        echo str_replace("_n_", "\n", $_oFACTVTY);
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ;
                                                                    ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label class="sk_label_modification"><?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Note';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Catatan';
                                                                    } else {
                                                                        echo 'Catatan';
                                                                    }
                                                                    ;
                                                                    ?>&nbsp;:
                                                                </label>
                                                                <textarea rows="4" type="text" name="_viwFNOTEZZ" class="form-control" autofocus readonly><?php
                                                                    if (!empty($_oFNOTEZZ)) {
                                                                        echo str_replace("_n_", "\n", $_oFNOTEZZ);
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
                                                                        echo 'Status';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Status';
                                                                    } else {
                                                                        echo 'Status';
                                                                    };
                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                </label>
                                                                <input type="text" name="_viwFSTATUS" class="form-control" autofocus readonly value="<?php
                                                                if (!empty($_oFSTATUS)) {
                                                                    if ($_oFSTATUS == 'opn') {
                                                                        echo 'Open';
                                                                    } elseif ($_oFSTATUS == 'cls') {
                                                                        echo 'Closed';
                                                                    } elseif ($_oFSTATUS == 'pnd') {
                                                                        echo 'Pending';
                                                                    } elseif ($_oFSTATUS == 'opr') {
                                                                        echo 'On-Progress';
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
                                                                        echo 'Hendled By';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Ditangani Oleh';
                                                                    } else {
                                                                        echo 'Ditangani Oleh';
                                                                    };
                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                </label>
                                                                <input type="text" name="_viwFHANDLE" class="form-control" autofocus readonly value="<?php
                                                                if (!empty($_oXHANDLE)) {
                                                                    echo $_oXHANDLE;
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
                                    <!--- sk_actv : ADD --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'add')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                         <?php
                                         $_cmpFRECNMB = $this->uri->segment(4);
                                         $_cmpFCODEZZ = $this->uri->segment(5);
                                         $_actFRECNMB = $this->uri->segment(8);
                                         $_actFCODEZZ = $this->uri->segment(9);

                                         date_default_timezone_set('Asia/Jakarta');
                                         $_oYea = date("Y");

                                         $this->db->select('*');
                                         $this->db->from('tactvty');
                                         $this->db->like('FCODEZZ', 'ACT' . $_oYea, 'after');
                                         $this->db->order_by('FCODEZZ', 'desc');
                                         $_quePROFLE = $this->db->get();

                                         if ($_quePROFLE->num_rows() > 0) {
                                             $_varACTVTY = $_quePROFLE->result_array();
                                             $_varCODEZZ = $_varACTVTY['0']['FCODEZZ'];

                                             $_sCODEZZ = explode('-', $_varCODEZZ);
                                             $_oCODEZZ = $_sCODEZZ[1];
                                             $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                                             $_oCODEXX = '';

                                             if ($_oCODEZX <= 9) {
                                                 $_oCODEXX = 'ACT' . $_oYea . '-0000' . $_oCODEZX;
                                             } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                                                 $_oCODEXX = 'ACT' . $_oYea . '-000' . $_oCODEZX;
                                             } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                                                 $_oCODEXX = 'ACT' . $_oYea . '-00' . $_oCODEZX;
                                             } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                                                 $_oCODEXX = 'ACT' . $_oYea . '-0' . $_oCODEZX;
                                             } elseif ($_oCODEZX > 9999) {
                                                 $_oCODEXX = 'ACT' . $_oYea . '-' . $_oCODEZX;
                                             } else {
                                                 //--- do nothing
                                             }
                                         } else {
                                             $_oCODEXX = 'ACT' . $_oYea . '-00001';
                                         };
                                         ?>
                                        <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/sve'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">                                        
                                            <div class="box">
                                                <div class="box-header">
                                                    <div class="pull-left">
                                                        &nbsp;
                                                        &nbsp;

                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Cancel';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Batal';
                                                        } else {
                                                            echo 'Batal';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #d9534f; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                        <button onclick="" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Save';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Simpan';
                                                        } else {
                                                            echo 'Simpan';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #5cb85c; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>     
                                                    </div>
                                                    <div class="pull-right">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Activity Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode Aktifitas';
                                                                        } else {
                                                                            echo 'Kode Aktifitas';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    echo $_oCODEXX;
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal';
                                                                        } else {
                                                                            echo 'Tanggal';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <div class="input-group date">
                                                                        <input type="text" name="_finFDTESTA" class="form-control" placeholder="" required oninvalid="<?php
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
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Time';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jam';
                                                                        } else {
                                                                            echo 'Jam';
                                                                        }
                                                                        ?>&nbsp;:</label>
                                                                    <table>
                                                                        <tr>
                                                                            <th width="50%"><input type="text" name="_finFTMEST1" data-masked-input="99:99:99" maxlength="6" class="form-control" autofocus></th>
                                                                            <th class="text-center">&nbsp;&nbsp;&nbsp;<font color="#ff0000"><?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'to';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 's.d';
                                                                                } else {
                                                                                    echo 's.d';
                                                                                }
                                                                                ?></font>&nbsp;&nbsp;&nbsp;</th> 
                                                                            <th width="50%"><input type="text" name="_finFTMEST2" data-masked-input="99:99:99" maxlength="6" class="form-control" autofocus></th>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Activity';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Aktifitas';
                                                                        } else {
                                                                            echo 'Aktifitas';
                                                                        }
                                                                        ;
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <textarea rows="4" type="text" name="_finFACTVTY" class="form-control" autofocus></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label class="sk_label_modification"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Note';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Catatan';
                                                                        } else {
                                                                            echo 'Catatan';
                                                                        }
                                                                        ;
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <textarea rows="4" type="text" name="_finFNOTEZZ" class="form-control" autofocus></textarea>
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
                                                                    <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_finFSTATUS" required oninvalid="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo "this.setCustomValidity('Please select an item in the list')";
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                    } else {
                                                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                    };
                                                                    ?>" onchange="setCustomValidity('')">
                                                                                <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                                            <option value="opn">Open</option>
                                                                            <option value="cls">Closed</option>
                                                                            <option value="pnd">Pending</option>
                                                                            <option value="opr">On-Progress</option>
                                                                        <?php } elseif ($_sesFLNGAGE == 'ina') {
                                                                            ?>
                                                                            <option value="opn">Open</option>
                                                                            <option value="cls">Closed</option>
                                                                            <option value="pnd">Pending</option>
                                                                            <option value="opr">On-Progress</option>
                                                                        <?php } else {
                                                                            ?>
                                                                            <option value="opn">Open</option>
                                                                            <option value="cls">Closed</option>
                                                                            <option value="pnd">Pending</option>
                                                                            <option value="opr">On-Progress</option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div>
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
                                                                    <input type="text" name="_tmpFHANDLE" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_sesFFULNME)) {
                                                                        echo $_sesFFULNME;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                    <input type="hidden" name="_finFHANDLE" class="form-control" readonly value="<?php
                                                                    if (!empty($_sesFCODEZZ)) {
                                                                        echo $_sesFCODEZZ;
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
                                        </form>
                                    </div>
                                    <!--- sk_actv : EDIT --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'edt')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                         <?php
                                         $_cmpFRECNMB = $this->uri->segment(4);
                                         $_cmpFCODEZZ = $this->uri->segment(5);
                                         $_actFRECNMB = $this->uri->segment(8);
                                         $_actFCODEZZ = $this->uri->segment(9);

                                         $_oFCODEZZ = $_tblACTEDT['0']['FCODEZZ'];
                                         $_oFDTESTA = $_tblACTEDT['0']['FDTESTA'];
                                         $_oFTMESTA = $_tblACTEDT['0']['FTMESTA'];
                                         $_oFACTVTY = $_tblACTEDT['0']['FACTVTY'];
                                         $_oFNOTEZZ = $_tblACTEDT['0']['FNOTEZZ'];
                                         $_oFSTATUS = $_tblACTEDT['0']['FSTATUS'];
                                         $_oXHANDLE = $_tblACTEDT['0']['XHANDLE'];
                                         ?>
                                        <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/upd/' . $_actFRECNMB . '/' . $_actFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="box">
                                                <div class="box-header">
                                                    <div class="pull-left">
                                                        &nbsp;
                                                        &nbsp;

                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/viw/' . $_actFRECNMB . '/' . $_actFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Cancel';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Batal';
                                                        } else {
                                                            echo 'Batal';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #d9534f; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                        <button onclick="" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Save';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Simpan';
                                                        } else {
                                                            echo 'Simpan';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #5cb85c; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>                                                    
                                                    </div>
                                                    <div class="pull-right">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Activity Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode Aktifitas';
                                                                        } else {
                                                                            echo 'Kode Aktifitas';
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
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal';
                                                                        } else {
                                                                            echo 'Tanggal';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <div class="input-group date">
                                                                        <input type="text" name="_edtFDTESTA" class="form-control" placeholder="..." value="<?php
                                                                        if (!empty($_oFDTESTA)) {
                                                                            echo $this->sklibrfnc->_fSETDteInd($_oFDTESTA);
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
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Time';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jam';
                                                                        } else {
                                                                            echo 'Jam';
                                                                        }
                                                                        ?>&nbsp;:</label>
                                                                    <table>
                                                                        <tr>
                                                                            <th width="50%"><input type="text" name="_edtFTMEST1" data-masked-input="99:99" maxlength="6" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFTMESTA)) {
                                                                                    echo substr($_oFTMESTA, 0, 5);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ;
                                                                                ?>"></th>
                                                                            <th class="text-center">&nbsp;&nbsp;&nbsp;<font color="#ff0000"><?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo 'to';
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo 's.d';
                                                                                } else {
                                                                                    echo 's.d';
                                                                                }
                                                                                ?></font>&nbsp;&nbsp;&nbsp;</th> 
                                                                            <th width="50%"><input type="text" name="_edtFTMEST2" data-masked-input="99:99" maxlength="6" class="form-control" autofocus value="<?php
                                                                                if (!empty($_oFTMESTA)) {
                                                                                    echo substr($_oFTMESTA, 6, 5);
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ;
                                                                                ?>"></th>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Activity';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Aktifitas';
                                                                        } else {
                                                                            echo 'Aktifitas';
                                                                        }
                                                                        ;
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <textarea rows="4" type="text" name="_edtFACTVTY" class="form-control" autofocus ><?php
                                                                        if (!empty($_oFACTVTY)) {
                                                                            echo str_replace("_n_", "\n", $_oFACTVTY);
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ;
                                                                        ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label class="sk_label_modification"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Note';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Catatan';
                                                                        } else {
                                                                            echo 'Catatan';
                                                                        }
                                                                        ;
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <textarea rows="4" type="text" name="_edtFNOTEZZ" class="form-control" autofocus ><?php
                                                                        if (!empty($_oFNOTEZZ)) {
                                                                            echo str_replace("_n_", "\n", $_oFNOTEZZ);
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
                                                                            echo 'Status';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Status';
                                                                        } else {
                                                                            echo 'Status';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFSTATUS" required oninvalid="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo "this.setCustomValidity('Please select an item in the list')";
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                    } else {
                                                                        echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                    };
                                                                    ?>" onchange="setCustomValidity('')">
                                                                                <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                                            <option value="<?php echo $_oFSTATUS; ?>"><?php
                                                                                if (!empty($_oFSTATUS)) {
                                                                                    if ($_oFSTATUS == 'opn') {
                                                                                        echo 'Open';
                                                                                    } elseif ($_oFSTATUS == 'cls') {
                                                                                        echo 'Closed';
                                                                                    } elseif ($_oFSTATUS == 'pnd') {
                                                                                        echo 'Pending';
                                                                                    } elseif ($_oFSTATUS == 'opr') {
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
                                                                            <option value="<?php echo $_oFSTATUS; ?>"><?php
                                                                                if (!empty($_oFSTATUS)) {
                                                                                    if ($_oFSTATUS == 'opn') {
                                                                                        echo 'Open';
                                                                                    } elseif ($_oFSTATUS == 'cls') {
                                                                                        echo 'Closed';
                                                                                    } elseif ($_oFSTATUS == 'pnd') {
                                                                                        echo 'Pending';
                                                                                    } elseif ($_oFSTATUS == 'opr') {
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
                                                                            <option value="<?php echo $_oFSTATUS; ?>"><?php
                                                                                if (!empty($_oFSTATUS)) {
                                                                                    if ($_oFSTATUS == 'opn') {
                                                                                        echo 'Open';
                                                                                    } elseif ($_oFSTATUS == 'cls') {
                                                                                        echo 'Closed';
                                                                                    } elseif ($_oFSTATUS == 'pnd') {
                                                                                        echo 'Pending';
                                                                                    } elseif ($_oFSTATUS == 'opr') {
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
                                                                <div>
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
                                                                    <input type="text" name="_viwFHANDLE" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oRow['XHANDLE'])) {
                                                                        echo $_oRow['XHANDLE'];
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
                                        </form>
                                    </div>
                                    <div class="container">
                                    </div>
                                </div>

                                <!--- SK_MONT : AWAL --->
                                <div class="tab-pane fade <?php
                                if ($_swiTABVIW == 'sk_mont') {
                                    echo "in active";
                                } else {
                                    echo '';
                                };
                                ?>" id="sk_mont">
                                    <div style="height: 20px;">
                                        <br>
                                    </div>
                                    <!--- sk_mont : LIST --->
                                    <div class="<?php
                                    if (($_varXTABVIW !== 'sk_mont') || (empty($_varXPROCES))) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                        <!--- -SK_MONT LIST : awal -->
                                        <div class="box">
                                            <div class="box-header">
                                                <div class="pull-left">
                                                    &nbsp;
                                                    &nbsp;
                                                    <a disabled href="#" role="button" class="btn btn-default btn-flat sk_button_modification" style="background-color: #dcdcdc"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-align-justify fa-lg"></i></font></a>
                                                </div>
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div style="height: 20px;">
                                                    <br>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification table-responsive">
                                                        <table style="width: 100%" id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGactmon';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAactmon';
                                                        } else {
                                                            echo '_objINAactmon';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr style="color: #f8f8f8; background-color: #4db8ff">
                                                                    <th rowspan="2" class="text-center text-align-middle" style="white-space: nowrap; vertical-align: middle;">No.</th>
                                                                    <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'SPT';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'SPT';
                                                                        } else {
                                                                            echo 'SPT';
                                                                        };
                                                                        ?></th>
                                                                    <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Period';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa Pajak';
                                                                        } else {
                                                                            echo 'Masa Pajak';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;"><?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Revision';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Pembetulan';
                                                                        } else {
                                                                            echo 'Pembetulan';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th colspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;">Pembayaran</th>
                                                                    <th colspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;">Pelaporan</th>
                                                                    <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;" title="Approval/Persetujuan Klien">Klien</th>
                                                                    <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;">#</th>
                                                                </tr>
                                                                <tr style="color: #f8f8f8; background-color: #4db8ff">
                                                                    <th class="text-center">Tanggal</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Tanggal</th>
                                                                    <th class="text-center">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('ttaxhst');
                                                                $this->db->where('FTYPEZZ', 'cmp');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->order_by('FFLGTAX, FPERIOD, FREVISI', 'asc');
                                                                $_queACTMON = $this->db->get();

                                                                $_oSeq = 0;
                                                                foreach ($_queACTMON->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="right" style="white-space: nowrap;  width: 1%">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td align="left" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FFLGTAX'])) {
                                                                                if ($_oRow['FFLGTAX'] == 'hstp21') {
                                                                                    echo 'PPh 21';
                                                                                } elseif ($_oRow['FFLGTAX'] == 'hstp22') {
                                                                                    echo 'PPh 22';
                                                                                } elseif ($_oRow['FFLGTAX'] == 'hstp23') {
                                                                                    echo 'PPh 23';
                                                                                } elseif ($_oRow['FFLGTAX'] == 'hstp42') {
                                                                                    echo 'PPh 4(2)';
                                                                                } elseif ($_oRow['FFLGTAX'] == 'hstp25') {
                                                                                    echo 'PPh 25';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap;  width: 89%">
                                                                            <?php echo $_oRow['FPERIOX']; ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap;  width: 89%">
                                                                            <?php
                                                                            if ($_oRow['FREVISI'] == '-1') {
                                                                                $_oFREVISI = '0';
                                                                            } else {
                                                                                $_oFREVISI = $_oRow['FREVISI'];
                                                                            }
                                                                            echo $_oFREVISI;
                                                                            ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FPAYDTE'])) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oRow['FPAYDTE']);
                                                                            } else {
                                                                                echo '<font style="color: #ff0000">...</font>';
                                                                            }
                                                                            ?>
                                                                        </td>

                                                                        <td align="left" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FPAYSTA'])) {
                                                                                if ($_oRow['FPAYSTA'] == 'opn') {
                                                                                    echo 'Open';
                                                                                } elseif ($_oRow['FPAYSTA'] == 'cls') {
                                                                                    echo 'Closed';
                                                                                } elseif ($_oRow['FPAYSTA'] == 'pnd') {
                                                                                    echo 'Pending';
                                                                                } elseif ($_oRow['FPAYSTA'] == 'opr') {
                                                                                    echo 'On-Progress';
                                                                                }
                                                                            } else {
                                                                                echo '<font style="color: #ff0000">...</font>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FREPDTE'])) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oRow['FREPDTE']);
                                                                            } else {
                                                                                echo '<font style="color: #ff0000">...</font>';
                                                                            }
                                                                            ?>
                                                                        </td>

                                                                        <td align="left" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FREPSTA'])) {
                                                                                if ($_oRow['FREPSTA'] == 'opn') {
                                                                                    echo 'Open';
                                                                                } elseif ($_oRow['FREPSTA'] == 'cls') {
                                                                                    echo 'Closed';
                                                                                } elseif ($_oRow['FREPSTA'] == 'pnd') {
                                                                                    echo 'Pending';
                                                                                } elseif ($_oRow['FREPSTA'] == 'opr') {
                                                                                    echo 'On-Progress';
                                                                                }
                                                                            } else {
                                                                                echo '<font style="color: #ff0000">...</font>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <?php
                                                                        $_cmpFRECNMB = $this->uri->segment(4);
                                                                        $_cmpFCODEZZ = $this->uri->segment(5);
                                                                        $_hstFRECNMB = $_oRow['FRECNMB'];
                                                                        $_hstFCODEZZ = $_oRow['FPROFLE'];
                                                                        ?>
                                                                        <td align="center" style="white-space: nowrap;  width: 1%">
                                                                            <?php
                                                                            if (!empty($_oRow['FAPRFLG'])) {

                                                                                if (strtolower($_oRow['FAPRFLG']) == 'y') {
                                                                                    echo '<font style="font-size: 1.20em; color: #5cb85c"><i class="fas fa-check-circle fa-fw"></i></font>';
                                                                                } elseif (strtolower($_oRow['FAPRFLG']) == 'n') {
                                                                                    echo '<font style="font-size: 1.20em; color: #d9534f"><i class="fas fa-exclamation-circle fa-fw"></i></font>';
                                                                                } elseif (strtolower($_oRow['FAPRFLG']) == 'x') {
                                                                                    echo '<font style="font-size: 1.20em; color: #cdcdcd"><i class="fas fa-check-circle fa-fw"></i></font>';
                                                                                }
                                                                            } else {
                                                                                echo '<font style="font-size: 1.20em; color: #d9534f"><i class="fas fa-exclamation-circle fa-fw"></i></font>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td align="center" style="white-space: nowrap; width: 1%">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont/viw/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" title="<?php
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
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>             
                                        <!--- SK_MONT LIST : akhir --->                                        
                                    </div>
                                    <!--- sk_mont : VIEW --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_mont') && ($_varXPROCES == 'viw')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                        <!--- SK_MONT VIEW : awal --->
                                        <div class="box">
                                            <div class="box-header">
                                                <div class="pull-left">
                                                    &nbsp;
                                                    &nbsp;
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Back';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Kembali';
                                                    } else {
                                                        echo 'Kembali';
                                                    };
                                                    ?>" style="background-color: #ffffff"><font style="color: #292b2c; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                                                    <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont/edt/' . $_actFRECNMB . '/' . $_actFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #ffffff"><font style="color: #f0ad4e; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
                                                </div>
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div style="height: 0px;">
                                                    <br>
                                                </div>
                                                <?php
                                                $_cmpFRECNMB = $this->uri->segment(4);
                                                $_cmpFCODEZZ = $this->uri->segment(5);
                                                $_hstFRECNMB = $this->uri->segment(8);
                                                $_hstFCODEZZ = $this->uri->segment(9);

                                                $this->db->select('*');
                                                $this->db->from('ttaxhst');
                                                $this->db->where('FTYPEZZ', 'cmp');
                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->where('FPROFLE', $_hstFCODEZZ);
                                                $_queACTMON = $this->db->get();

                                                foreach ($_queACTMON->result_array() as $_oRow) {

                                                    $_xFFLGTAX = $_oRow['FFLGTAX'];
                                                    if (!empty($_xFFLGTAX)) {
                                                        if ($_xFFLGTAX == 'hstp21') {
                                                            $_oFFLGTAX = 'PPh 21';
                                                        } elseif ($_xFFLGTAX == 'hstp22') {
                                                            $_oFFLGTAX = 'PPh 22';
                                                        } elseif ($_xFFLGTAX == 'hstp23') {
                                                            $_oFFLGTAX = 'PPh 23';
                                                        } elseif ($_xFFLGTAX == 'hstp42') {
                                                            $_oFFLGTAX = 'PPh 4(2)';
                                                        } elseif ($_xFFLGTAX == 'hstp25') {
                                                            $_oFFLGTAX = 'PPh 25';
                                                        }
                                                    } else {
                                                        $_oFFLGTAX = '';
                                                    }
                                                    $_oFPERIOX = $_oRow['FPERIOX'];
                                                    $_xFAPRFLG = $_oRow['FAPRFLG'];
                                                    if (!empty($_xFAPRFLG)) {
                                                        if (strtolower($_xFAPRFLG) == 'y') {
                                                            $_oFAPRFLG = 'Sudah';
                                                        } elseif (strtolower($_xFAPRFLG) == 'n') {
                                                            $_oFAPRFLG = 'Belum';
                                                        } elseif (strtolower($_xFAPRFLG) == 'x') {
                                                            $_oFAPRFLG = 'Otomatis';
                                                        }
                                                    } else {
                                                        $_oFAPRFLG = 'Belum';
                                                    }
                                                    $_oFPAYDUE = $_oRow['FPAYDUE'];
                                                    $_oFPAYDTE = $_oRow['FPAYDTE'];
                                                    $_oFNTPNZZ = $_oRow['FNTPNZZ'];
                                                    $_oFNTPNDC = $_oRow['FNTPNDC'];
                                                    $_oFPAYSTA = $_oRow['FPAYSTA'];
                                                    $_oFREPDUE = $_oRow['FREPDUE'];
                                                    $_oFREPDTE = $_oRow['FREPDTE'];
                                                    $_oFNTTEZZ = $_oRow['FNTTEZZ'];
                                                    $_oFNTTEDC = $_oRow['FNTTEDC'];
                                                    $_oFREPSTA = $_oRow['FREPSTA'];
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-4">
                                                                <h5><strong><font style="color: BLUE">(A) Identifikasi</font></strong></h5>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'SPT Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jenis SPT';
                                                                        } else {
                                                                            echo 'Jenis SPT';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFFLGTAX)) {
                                                                        echo $_oFFLGTAX;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'SPT Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa/Periode Pajak';
                                                                        } else {
                                                                            echo 'Masa/Periode Pajak';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFPERIOX)) {
                                                                        echo $_oFPERIOX;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Client Approval';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Approval/Persetujuan Klien';
                                                                        } else {
                                                                            echo 'Approval/Persetujuan Klien';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input style="color: <?php
                                                                    if (strtolower($_oFAPRFLG) == 'belum') {
                                                                        echo '#ff0000';
                                                                    } elseif (strtolower($_oFAPRFLG) == 'sudah') {
                                                                        echo '#008000';
                                                                    } elseif (strtolower($_oFAPRFLG) == 'otomatis') {
                                                                        echo '#008000';
                                                                    } else {
                                                                        echo '#ff0000';
                                                                    }
                                                                    ?>; font-weight: bold" type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                           if (!empty($_oFAPRFLG)) {
                                                                               echo $_oFAPRFLG;
                                                                           } else {
                                                                               echo '...';
                                                                           }
                                                                           ?>">
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-4">
                                                                <h5><strong><font style="color: BLUE">(B) Pembayaran</font></strong></h5>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Due-Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Jatuh Tempo';
                                                                        } else {
                                                                            echo 'Tanggal Jatuh Tempo';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input style="color: #ff0000; font-weight: bold" type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFPAYDUE)) {
                                                                        echo $this->sklibrfnc->_fSETDteInd($_oFPAYDUE);
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Pay Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Bayar';
                                                                        } else {
                                                                            echo 'Tanggal Bayar';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFPAYDTE)) {
                                                                        echo $this->sklibrfnc->_fSETDteInd($_oFPAYDTE);
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'SPT Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'NTPN (Nomor Tanda Penerimaan Negara)';
                                                                        } else {
                                                                            echo 'NTPN (Nomor Tanda Penerimaan Negara)';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFNTPNZZ)) {
                                                                        echo $_oFNTPNZZ;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>    
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Payment Document/Proof';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti Pembayaran';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti Pembayaran';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNTPNDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                                                        if (!empty($_oFNTPNDC)) {
                                                                            echo $_oFNTPNDC;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ;
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Payment Status';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Status Pembayaran';
                                                                        } else {
                                                                            echo 'Status Pembayaran';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFPAYSTA)) {
                                                                        if ($_oFPAYSTA == 'opn') {
                                                                            echo 'Open';
                                                                        } elseif ($_oFPAYSTA == 'cls') {
                                                                            echo 'Closed';
                                                                        } elseif ($_oFPAYSTA == 'pnd') {
                                                                            echo 'Pending';
                                                                        } elseif ($_oFPAYSTA == 'opr') {
                                                                            echo 'On-Progress';
                                                                        }
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <h5><strong><font style="color: BLUE">(C) Pelaporan</font></strong></h5>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Due-Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Jatuh Tempo';
                                                                        } else {
                                                                            echo 'Tanggal Jatuh Tempo';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input style="color: #ff0000; font-weight: bold" type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFREPDUE)) {
                                                                        echo $this->sklibrfnc->_fSETDteInd($_oFREPDUE);
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Report Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Lapor';
                                                                        } else {
                                                                            echo 'Tanggal Lapor';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFREPDTE)) {
                                                                        echo $this->sklibrfnc->_fSETDteInd($_oFREPDTE);
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                        } else {
                                                                            echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFNTTEZZ)) {
                                                                        echo $_oFNTTEZZ;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>    
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Reporting Document/Proof';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti Pelaporan';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti Pelaporan';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <a href="#_objMDLDOC" role="button" id="<?php echo $_oFNTTEDC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                                                        if (!empty($_oFNTTEDC)) {
                                                                            echo $_oFNTTEDC;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ;
                                                                        ?>">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Reporting Status';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Status Pelaporan';
                                                                        } else {
                                                                            echo 'Status Pelaporan';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                                    if (!empty($_oFREPSTA)) {
                                                                        if ($_oFREPSTA == 'opn') {
                                                                            echo 'Open';
                                                                        } elseif ($_oFREPSTA == 'cls') {
                                                                            echo 'Closed';
                                                                        } elseif ($_oFREPSTA == 'pnd') {
                                                                            echo 'Pending';
                                                                        } elseif ($_oFREPSTA == 'opr') {
                                                                            echo 'On-Progress';
                                                                        }
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div style="height: 20px;">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <!--- SK_MONT VIEW : akhir --->
                                    </div>
                                    <!--- sk_mont : ADD --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_mont') && ($_varXPROCES == 'add')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">


                                    </div>
                                    <!--- sk_mont : EDIT --->
                                    <div class="<?php
                                    if (($_varXTABVIW == 'sk_mont') && ($_varXPROCES == 'edt')) {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> col-lg-12">
                                        <!--- SK_MONT EDIT : awal --->
                                        <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont/upd/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="box">
                                                <div class="box-header">
                                                    <div class="pull-left">
                                                        &nbsp;
                                                        &nbsp;

                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont/viw/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Cancel';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Batal';
                                                        } else {
                                                            echo 'Batal';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #d9534f; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                                        <button onclick="" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Save';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Simpan';
                                                        } else {
                                                            echo 'Simpan';
                                                        };
                                                        ?>" style="background-color: #ffffff"><font style="color: #5cb85c; font-size: 17px"><i class="fas fa-check fa-lg"></i></font></button>     
                                                    </div>
                                                    <div class="pull-right">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div style="height: 0px;">
                                                        <br>
                                                    </div>
                                                    <?php
                                                    foreach ($_tblACTEDT as $_oRow) {

                                                        $_xFFLGTAX = $_oRow['FFLGTAX'];
                                                        if (!empty($_xFFLGTAX)) {
                                                            if ($_xFFLGTAX == 'hstp21') {
                                                                $_oFFLGTAX = 'PPh 21';
                                                            } elseif ($_xFFLGTAX == 'hstp22') {
                                                                $_oFFLGTAX = 'PPh 22';
                                                            } elseif ($_xFFLGTAX == 'hstp23') {
                                                                $_oFFLGTAX = 'PPh 23';
                                                            } elseif ($_xFFLGTAX == 'hstp42') {
                                                                $_oFFLGTAX = 'PPh 4(2)';
                                                            } elseif ($_xFFLGTAX == 'hstp25') {
                                                                $_oFFLGTAX = 'PPh 25';
                                                            }
                                                        } else {
                                                            $_oFFLGTAX = '';
                                                        }
                                                        $_oFPERIOX = $_oRow['FPERIOX'];
                                                        $_xFAPRFLG = $_oRow['FAPRFLG'];
                                                        if (!empty($_xFAPRFLG)) {
                                                            if (strtolower($_xFAPRFLG) == 'y') {
                                                                $_oFAPRFLG = 'Sudah';
                                                            } elseif (strtolower($_xFAPRFLG) == 'n') {
                                                                $_oFAPRFLG = 'Belum';
                                                            } elseif (strtolower($_xFAPRFLG) == 'x') {
                                                                $_oFAPRFLG = 'Otomatis';
                                                            }
                                                        } else {
                                                            $_oFAPRFLG = 'Belum';
                                                        }
                                                        $_oFPAYDUE = $_oRow['FPAYDUE'];
                                                        $_oFPAYDTE = $_oRow['FPAYDTE'];
                                                        $_oFNTPNZZ = $_oRow['FNTPNZZ'];
                                                        $_oFNTPNDC = $_oRow['FNTPNDC'];
                                                        $_oFPAYSTA = $_oRow['FPAYSTA'];
                                                        $_oFREPDUE = $_oRow['FREPDUE'];
                                                        $_oFREPDTE = $_oRow['FREPDTE'];
                                                        $_oFNTTEZZ = $_oRow['FNTTEZZ'];
                                                        $_oFNTTEDC = $_oRow['FNTTEDC'];
                                                        $_oFREPSTA = $_oRow['FREPSTA'];
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="col-lg-4">
                                                                    <h5><strong><font style="color: BLUE">(A) Identifikasi</font></strong></h5>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SPT Type';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Jenis SPT';
                                                                            } else {
                                                                                echo 'Jenis SPT';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_edtFFLGTAX" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFFLGTAX)) {
                                                                            echo $_oFFLGTAX;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SPT Type';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Masa/Periode Pajak';
                                                                            } else {
                                                                                echo 'Masa/Periode Pajak';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_edtFPERIOX" class="form-control" autofocus readonly value="<?php
                                                                        if (!empty($_oFPERIOX)) {
                                                                            echo $_oFPERIOX;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Client Approval';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Approval/Persetujuan Klien';
                                                                            } else {
                                                                                echo 'Approval/Persetujuan Klien';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input style="color: <?php
                                                                        if (strtolower($_oFAPRFLG) == 'belum') {
                                                                            echo '#ff0000';
                                                                        } elseif (strtolower($_oFAPRFLG) == 'sudah') {
                                                                            echo '#008000';
                                                                        } elseif (strtolower($_oFAPRFLG) == 'otomatis') {
                                                                            echo '#008000';
                                                                        } else {
                                                                            echo '#ff0000';
                                                                        }
                                                                        ?>; font-weight: bold" type="text" name="_edtFAPRFLG" class="form-control" autofocus readonly value="<?php
                                                                               if (!empty($_oFAPRFLG)) {
                                                                                   echo $_oFAPRFLG;
                                                                               } else {
                                                                                   echo '...';
                                                                               }
                                                                               ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <h5><strong><font style="color: BLUE">(B) Pembayaran</font></strong></h5>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Due-Date';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Tanggal Jatuh Tempo';
                                                                            } else {
                                                                                echo 'Tanggal Jatuh Tempo';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <div class="input-group date">
                                                                            <input style="color: #ff0000; font-weight: bold" type="text" name="_edtFPAYDUE" class="form-control" placeholder="" value="<?php
                                                                            if (!empty($_oFPAYDUE)) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oFPAYDUE);
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
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Pay Date';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Tanggal Bayar';
                                                                            } else {
                                                                                echo 'Tanggal Bayar';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <div class="input-group date">
                                                                            <input type="text" name="_edtFPAYDTE" class="form-control" placeholder="" value="<?php
                                                                            if (!empty($_oFPAYDTE)) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oFPAYDTE);
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
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'SPT Type';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'NTPN (Nomor Tanda Penerimaan Negara)';
                                                                            } else {
                                                                                echo 'NTPN (Nomor Tanda Penerimaan Negara)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_edtFNTPNZZ" class="form-control" autofocus value="<?php
                                                                        if (!empty($_oFNTPNZZ)) {
                                                                            echo $_oFNTPNZZ;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <input type="file" id="_efiFNTPNDC" name="_efiFNTPNDC" style="display: none" onchange="document.getElementById('_edtFNTPNDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Payment Document/Proof';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Dokumen/Bukti Pembayaran';
                                                                            } else {
                                                                                echo 'Dokumen/Bukti Pembayaran';
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
                                                                                ?>" onclick="document.getElementById('_efiFNTPNDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" id="_edtFNTPNDC" name="_edtFNTPNDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNTPNDC; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Payment Status';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Status Pembayaran';
                                                                            } else {
                                                                                echo 'Status Pembayaran';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFPAYSTA" required oninvalid="<?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo "this.setCustomValidity('Please select an item in the list')";
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        } else {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        };
                                                                        ?>" onchange="setCustomValidity('')">

                                                                            <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                                                <option value="<?php echo $_oFPAYSTA; ?>"><?php
                                                                                    if (!empty($_oFPAYSTA)) {
                                                                                        if ($_oFPAYSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFPAYSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFPAYSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFPAYSTA == 'opr') {
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
                                                                                <option value="<?php echo $_oFPAYSTA; ?>"><?php
                                                                                    if (!empty($_oFPAYSTA)) {
                                                                                        if ($_oFPAYSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFPAYSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFPAYSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFPAYSTA == 'opr') {
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
                                                                                <option value="<?php echo $_oFPAYSTA; ?>"><?php
                                                                                    if (!empty($_oFPAYSTA)) {
                                                                                        if ($_oFPAYSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFPAYSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFPAYSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFPAYSTA == 'opr') {
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
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <h5><strong><font style="color: BLUE">(C) Pelaporan</font></strong></h5>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Due-Date';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Tanggal Jatuh Tempo';
                                                                            } else {
                                                                                echo 'Tanggal Jatuh Tempo';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <div class="input-group date">
                                                                            <input style="color: #ff0000; font-weight: bold" type="text" name="_edtFREPDUE" class="form-control" placeholder="" value="<?php
                                                                            if (!empty($_oFREPDUE)) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oFREPDUE);
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
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Report Date';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Tanggal Lapor';
                                                                            } else {
                                                                                echo 'Tanggal Lapor';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <div class="input-group date">
                                                                            <input type="text" name="_edtFREPDTE" class="form-control" placeholder="" value="<?php
                                                                            if (!empty($_oFREPDTE)) {
                                                                                echo $this->sklibrfnc->_fSETDteInd($_oFREPDTE);
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
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                            } else {
                                                                                echo 'NTTE (Nomor Tanda Terima Elektronik)';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <input type="text" name="_edtFNTTEZZ" class="form-control" autofocus value="<?php
                                                                        if (!empty($_oFNTTEZZ)) {
                                                                            echo $_oFNTTEZZ;
                                                                        } else {
                                                                            echo '...';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <input type="file" id="_efiFNTTEDC" name="_efiFNTTEDC" style="display: none" onchange="document.getElementById('_edtFNTTEDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Reporting Document/Proof';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Dokumen/Bukti Pelaporan';
                                                                            } else {
                                                                                echo 'Dokumen/Bukti Pelaporan';
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
                                                                                ?>" onclick="document.getElementById('_efiFNTTEDC').click()"><i class="fas fa-file-upload fa-fw fa-lg"></i>
                                                                                </a>
                                                                            </span>
                                                                            <input type="text" id="_edtFNTTEDC" name="_edtFNTTEDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFNTTEDC; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Reporting Status';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Status Pelaporan';
                                                                            } else {
                                                                                echo 'Status Pelaporan';
                                                                            };
                                                                            ?><font color="#000000">&nbsp;:</font>
                                                                        </label>
                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFREPSTA" required oninvalid="<?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo "this.setCustomValidity('Please select an item in the list')";
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        } else {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        };
                                                                        ?>" onchange="setCustomValidity('')">

                                                                            <?php if ($_sesFLNGAGE == 'eng') { ?>
                                                                                <option value="<?php echo $_oFREPSTA; ?>"><?php
                                                                                    if (!empty($_oFREPSTA)) {
                                                                                        if ($_oFREPSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFREPSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFREPSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFREPSTA == 'opr') {
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
                                                                                <option value="<?php echo $_oFREPSTA; ?>"><?php
                                                                                    if (!empty($_oFREPSTA)) {
                                                                                        if ($_oFREPSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFREPSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFREPSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFREPSTA == 'opr') {
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
                                                                                <option value="<?php echo $_oFREPSTA; ?>"><?php
                                                                                    if (!empty($_oFREPSTA)) {
                                                                                        if ($_oFREPSTA == 'opn') {
                                                                                            echo 'Open';
                                                                                        } elseif ($_oFREPSTA == 'cls') {
                                                                                            echo 'Closed';
                                                                                        } elseif ($_oFREPSTA == 'pnd') {
                                                                                            echo 'Pending';
                                                                                        } elseif ($_oFREPSTA == 'opr') {
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--- SK_MONT EDIT : akhir --->
                                    </div>
                                    <div class="container">
                                    </div>
                                </div>
                                <!--- SK_MONT : AKHIR --->

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
    default :
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
        break;
}
?>
</section>