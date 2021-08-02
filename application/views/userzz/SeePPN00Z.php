<?php
$_oDat = date("Ymd");
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFUSRTYP = $this->session->FUSRTYP;
$_sesFCATGRY = $this->session->FCATGRY;
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
    switch ($_swiUSR018) {
        case "c00lst" :
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
                                    echo '_objENGpphlst';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINApphlst';
                                } else {
                                    echo '_objINApphlst';
                                }
                                ?>" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
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
                                        foreach ($_tblC00LST as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap;  width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap;  width: 50%">
                                                    <?php
                                                    if (!empty($_oRow['FFULNME'])) {
                                                        if (strlen($_oRow['FFULNME']) <= 75) {
                                                            echo $_oRow['FFULNME'];
                                                        } else {
                                                            echo substr($_oRow['FFULNME'], 0, 75) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td align="center" style="white-space: nowrap;  width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                                                        $_oFNPWPZZ = $_xFNPWPZZ[1];
                                                        if ((strlen($_oFNPWPZZ) > 0) && (strlen($_oFNPWPZZ) <= 25)) {
                                                            echo substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                                                        } elseif ((strlen($_oFNPWPZZ) > 0) && (strlen($_oFNPWPZZ) > 25)) {
                                                            echo substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3) . '<font style="color: #ff0000">...</font>';
                                                        } else {
                                                            echo '...';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 15%">
                                                    <?php
                                                    if (!empty($_oRow['FKLUZZZ'])) {
                                                        if (strlen($_oRow['FKLUZZZ']) <= 25) {
                                                            echo $_oRow['FKLUZZZ'];
                                                        } else {
                                                            echo substr($_oRow['FKLUZZZ'], 0, 25) . '<font style="color: #ff0000">...</font>';
                                                        }
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                $_cmpFRECNMB = $_oRow['FRECNMB'];
                                                $_cmpFCODEZZ = $_oRow['FCODEZZ'];
                                                ?>

                                                <td align="center" style="white-space: nowrap; width: 10%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ ?>" title="<?php
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
            </div>
            <div class="info" style="text-align: center">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="<?php echo base_url(), 'assets/pictures/working.json'; ?>" background="transparent"  speed="0.70"  style="width: 1000px; height: 300px;" loop autoplay></lottie-player>         
            </div>
            <?php
            break;
        case "c00viw":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_cmpFYEARZZ = $this->uri->segment(6);
            ?>

            <div class="<?php
            if (!empty($_cmpFYEARZZ)) {
                echo 'hidden';
            } else {
                echo '';
            }
            ?> well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <?php
                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(array(
                    'FPROFLE = ' => $_cmpFCODEZZ,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp00'
                        )
                );
                $this->db->group_by('substr(FPERIOD,1,4)');
                $this->db->order_by('substr(FPERIOD,1,4)');
                $_queP00HST = $this->db->get();

                $_oCnt = $_queP00HST->num_rows();
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        &nbsp;
                        &nbsp;
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00lst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                        </a>

                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/yer'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Summary (Monthly)';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Summary/Ringkasan (Bulan)';
                        } else {
                            echo 'Summary/Ringkasan (Bulan)';
                        };
                        ?>" style="background-color: #0275d8; display: <?php
                           if ($_oCnt > 0) {
                               echo 'none';
                           } else {
                               echo '';
                           }
                           ?>"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-list-alt fa-lg"></i></font>
                        </a>
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
                                <table id = "_objINAcXXvit" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa (Tahun)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP (Dasar Pengenaan Pajak)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*, substr(FPERIOD,1,4) as XYEARZZ');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FPROFLE = ' => $_cmpFCODEZZ,
                                            'ttaxhst.FTYPEZZ = ' => 'cmp',
                                            'ttaxhst.FFLGTAX = ' => 'hstp00'
                                                )
                                        );
                                        $this->db->group_by('substring(FPERIOD,1,4)');
                                        $this->db->order_by('substring(FPERIOD,1,4)');
                                        $_queP00HST = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queP00HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <font color="#ff0000"><?php echo $_oRow['XYEARZZ']; ?></font>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMDPB'])) {
                                                        echo number_format($_oRow['FMSMDPB']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMNML'])) {
                                                        echo number_format($_oRow['FMSMNML']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['XYEARZZ'] ?>" title="<?php
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

            <div class="<?php
            if ($_cmpFYEARZZ !== 'yer') {
                echo 'hidden';
            } else {
                echo '';
            }
            ?> well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Tambah Periode/Masa PPN';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah Periode/Masa PPN';
                            } else {
                                echo 'Tambah Periode/Masa PPN';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font></a>
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
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary/Ringkasan (Bulan)</font>
                            <div style="height: 5px;">
                                <br>
                            </div>

                            <div class="sk_table_modification2 table-responsive">
                                <table id="_objINAcXXvid" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Pembetulan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Total Penghasilan Bruto</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh 21 (Terutang)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'FPROFLE = ' => $_cmpFCODEZZ,
                                            'FTYPEZZ = ' => 'cmp',
                                            'FFLGTAX = ' => 'hstp22',
                                            'substring(FPERIOD,1,4) = ' => $_cmpFYEARZZ
                                                )
                                        );
                                        $this->db->order_by('FPERIOD', 'asc');
                                        $_queP22HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP22HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap; width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <font color="#ff0000"><?php echo $_oRow['FPERIOX']; ?></font>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <font color="#ff0000"><?php
                                                    if ($_oRow['FREVISI'] == '-1') {
                                                        echo '0';
                                                    } else {
                                                        echo $_oRow['FREVISI'];
                                                    }
                                                    ?></font>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FBRTO12'])) {
                                                        echo number_format($_oRow['FBRTO12']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP21HMN'])) {
                                                        echo number_format($_oRow['FP21HMN']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_cmpFYEARZZ ?>" title="<?php
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

            <div class="<?php
            if ((empty($_cmpFYEARZZ)) || ($_cmpFYEARZZ == 'yer')) {
                echo 'hidden';
            } else {

            }
            ?> well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        &nbsp;
                        &nbsp;
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                        </a>

                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Add New PPN Period/Term';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tambah Periode/Masa PPN';
                        } else {
                            echo 'Tambah Periode/Masa PPN';
                        };
                        ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                        </a>
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
                                <table id = "_objINAcXXvib" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Pembetulan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP (Dasar Pengenaan Pajak)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FPROFLE = ' => $_cmpFCODEZZ,
                                            'ttaxhst.FTYPEZZ = ' => 'cmp',
                                            'ttaxhst.FFLGTAX = ' => 'hstp00'
                                                )
                                        );
                                        $this->db->order_by('FPERIOD', 'asc');
                                        $_queP00HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP00HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 94%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <font color="#ff0000"><?php echo $_oRow['FPERIOX']; ?></font>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <font color="#ff0000"><?php
                                                    if ($_oRow['FREVISI'] == '-1') {
                                                        echo '0';
                                                    } else {
                                                        echo $_oRow['FREVISI'];
                                                    }
                                                    ?></font>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMDPB'])) {
                                                        echo number_format($_oRow['FMSMDPB']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMNML'])) {
                                                        echo number_format($_oRow['FMSMNML']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_cmpFYEARZZ . '/' . $_oRow['FWRKSTA'] ?>" title="<?php
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
        case "prdadd":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_cmpFYEARZZ = $this->uri->segment(6);

            $_oFFULNME = $_tblPRDADD['0']['FFULNME'];
            $_oFNPWPZZ = $_tblPRDADD['0']['FNPWPZZ'];
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/prdsve/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Cancel';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Batal';
                                } else {
                                    echo 'Batal';
                                };
                                ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-times fa-lg"></i></font></a>

                                <button onclick="" class="btn btn-default btn-flat sk_button_modification aimz-alert-periode" title="<?php
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
                                        <div class="row">
                                            <div hidden>
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'NPWP';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'NPWP';
                                                    } else {
                                                        echo 'NPWP';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                                echo $_oFNPWPZZ;
                                                ?>">
                                            </div>
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
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                                echo $_cmpFCODEZZ;
                                                ?>">
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Company (Client) Name';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Nama Perusahaan (Klien)';
                                                    } else {
                                                        echo 'Nama Perusahaan (Klien)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" name="_finFFULNME" class="form-control" autofocus readonly value="<?php
                                                echo $_oFFULNME;
                                                ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Period/Session (Month)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Periode/Masa (Bulan)';
                                                    } else {
                                                        echo 'Periode/Masa (Bulan)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <?php
                                                $_oMon = array(1 => "Januari", "Februari", "Maret", "April", "Mei",
                                                    "Juni", "Juli", "Agustus", "September", "Oktober",
                                                    "November", "Desember");
                                                ?>
                                                <select class="form-control select2" name="_finFMONTHZ">
                                                    <option value="<?php echo '1'; ?>"><?php echo $_oMon[1]; ?></option>";
                                                    <?php
                                                    for ($_oCnt = 2; $_oCnt <= 12; $_oCnt++) {
                                                        echo "<option value = $_oCnt>$_oMon[$_oCnt]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Period/Session (Year)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Periode/Masa (Tahun)';
                                                    } else {
                                                        echo 'Periode/Masa (Tahun)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <?php $_oYea = date("Y"); ?>
                                                <select class="form-control select2" name="_finFYEARZZ">
                                                    <option value="<?php echo $_oYea; ?>"><?php echo $_oYea; ?></option>";
                                                    <?php
                                                    for ($_oCnt = $_oYea; $_oCnt >= $_oYea - 10; $_oCnt--) {
                                                        echo "<option value = $_oCnt>$_oCnt</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="sk_label_modification">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Rectification (Correction)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Pembetulan (Koreksi)';
                                                    } else {
                                                        echo 'Pembetulan (Koreksi)';
                                                    };
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <?php $_oYea = date("Y"); ?>
                                                <select class="form-control select2" name="_finFCORREC">
                                                    <option value="<?php echo '0'; ?>"><?php echo '0'; ?></option>";
                                                    <?php
                                                    for ($_oCnt = 1; $_oCnt <= 10; $_oCnt++) {
                                                        echo "<option value = $_oCnt>$_oCnt</option>";
                                                    }
                                                    ?>
                                                </select>
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
            <?php
            break;
        case "prdsve" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_cmpFYEARZZ = $this->uri->segment(6);

            if ($this->session->flashdata('true')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
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
                    echo 'swal.fire({ title: "<h3>Error!</h3>", html: "<h4>Incomplete Fill</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php

            break;
        case "c00smr" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);

            $_varXPROCES = $this->uri->segment(8);
            $_varXRECNMB = $this->uri->segment(9);

            $_cmpFYEARZZ = $this->uri->segment(8);
            $_cmpFWRKSTA = $this->uri->segment(9);

            $_oFFULNME = $_tblC00SMR['0']['FFULNME'];

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp00');
            $_queC21SMR = $this->db->get();

            foreach ($_queC21SMR->result_array() as $_oRow) {
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_yFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_yFNPWPZZ[1];
                $_oFPERIOX = $_oRow['FPERIOX'];
                $_oFPERIOD = $_oRow['FPERIOD'];
                $_xFREVISI = $_oRow['FREVISI'];
                if ($_xFREVISI == '-1') {
                    $_oFREVISI = '0';
                } else {
                    $_oFREVISI = $_xFREVISI;
                }
                $_oFAPRFLG = $_oRow['FAPRFLG'];
            }
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/exprps'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan Summary PPN (Terutang)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan Summary PPN (Terutang)';
                            } else {
                                echo 'Download (Unduh) Laporan Summary PPN (Terutang)';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-download fa-lg"></i></font>
                            </a>

                            <a href="<?php
                            if (($_cmpFWRKSTA == '1') || ($_cmpFWRKSTA == '2') || ($_cmpFWRKSTA == '3') || ($_cmpFWRKSTA == '4') || ($_cmpFWRKSTA == '5')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkmsm/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '6') || ($_cmpFWRKSTA == '7')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '8')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkrpt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '9')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkarc/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            };
                            ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                               if ($_sesFLNGAGE == 'eng') {
                                   echo 'Ringkasan Aktivitas Pajak';
                               } elseif ($_sesFLNGAGE == 'ina') {
                                   echo 'Ringkasan Aktivitas Pajak';
                               } else {
                                   echo 'Ringkasan Aktivitas Pajak';
                               };
                               ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/sndeml' . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Email Informasi Kurang Bayar';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Email Informasi Kurang Bayar';
                            } else {
                                echo 'Email Informasi Kurang Bayar';
                            };
                            ?>" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-envelope fa-lg"></i></font>
                            </a>

                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo 'disabled';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '...';
                            }
                            ?> href="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo '#';
                                    } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                }
                                ?>" role = "button" class="btn btn-default btn-flat <?php
                                if (!empty($_oFAPRFLG)) {
                                    if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo 'disabled';
                                    } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'aimz-alert-correction';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'aimz-alert-koreksi';
                                        } else {
                                            echo 'aimz-alert-koreksi';
                                        }
                                    } else {
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'aimz-alert-correction';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'aimz-alert-koreksi';
                                        } else {
                                            echo 'aimz-alert-koreksi';
                                        }
                                    }
                                } else {
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'aimz-alert-correction';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'aimz-alert-koreksi';
                                    } else {
                                        echo 'aimz-alert-koreksi';
                                    }
                                }
                                ?>" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Correcttion';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Koreksi';
                                } else {
                                    echo 'Koreksi';
                                };
                                ?>" style="background-color: #f7f7f7"><font style="color: <?php
                                if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '#808080';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#d9534f';
                                }
                                ?>; font-size: 17px"><i class="fas fa-eyedropper fa-lg"></i></font>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 0px;">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary/Ringkasan</font>
                                    <div style="height: 0px;">
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(1) Period/Session';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(1) Periode/Masa';
                                                } else {
                                                    echo '(1) Periode/Masa';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="font-weight: bold" name="_viwFPERIOX" class="form-control" autofocus readonly value="<?php
                                            echo $_oFPERIOX;
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(2) Rectification/Correction';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(2) Pembetulan/Koreksi';
                                                } else {
                                                    echo '(2) Pembetulan/Koreksi';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="font-weight: bold" name="_viwFREVISI" class="form-control" readonly value="<?php
                                            echo $_oFREVISI;
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(3) Client Approval';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(3) Approval/Persetujuan Klien';
                                                } else {
                                                    echo '(3) Approval/Persetujuan Klien';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="color: <?php
                                            if (!empty($_oFAPRFLG)) {
                                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                                    echo '#008000';
                                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                                    echo '#ff0000';
                                                } else {
                                                    echo '#ff0000';
                                                }
                                            } else {
                                                echo '#ff00000';
                                            }
                                            ?>; font-weight: bold" name="_viwFREVISI" class="form-control" readonly value="<?php
                                                   if (!empty($_oFAPRFLG)) {
                                                       if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                                           echo 'Sudah';
                                                       } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                                           echo 'Belum';
                                                       } else {
                                                           echo 'Belum';
                                                       }
                                                   } else {
                                                       echo '...';
                                                   }
                                                   ?>">
                                        </div>
                                    </div>
                                    <div style="height: 0px;">
                                        <br>
                                    </div>
                                    <div class="sk_table_modification2 table-responsive"> 
                                        <table id="" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">Uraian</th>
                                                    <th colspan="3" class="text-center" style="white-space: nowrap">Masa : <?php echo substr($_oFPERIOD, 4, 2) . '-' . substr($_oFPERIOD, 0, 4); ?> (Pembetulan ke-<?php echo $_oFREVISI ?>)&ensp;<button data-id="<?php echo ''; ?>" href="#sk_modal_komp00" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Edit Nilai Kompensasi (PPN)';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Edit Nilai Kompensasi (PPN)';
                                                        } else {
                                                            echo 'Edit Nilai Kompensasi (PPN)';
                                                        };
                                                        ?>" data-toggle="modal" class="sk_viwkomp00"><font color="#ff0000"><i class="fas fa-pencil-alt fa-fw"></i></font>
                                                        </button></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">DPP (Rp.)</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">PPN (Rp.)</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">PpnBM (Rp.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $this->db->select("sum(IF(FFLAGZZ='1A10',FP00DPP,NULL)) as X1A10Z1, sum(IF(FFLAGZZ='1A10',FP00PPN,NULL)) as X1A10Z2,sum(IF(FFLAGZZ='1B11',FP00DPP,NULL)) as X1B11Z1, sum(IF(FFLAGZZ='1B11',FP00PPN,NULL)) as X1B11Z2,sum(IF(FFLAGZZ='1B12',FP00DPP,NULL)) as X1B12Z1, sum(IF(FFLAGZZ='1B12',FP00PPN,NULL)) as X1B12Z2,sum(IF(FFLAGZZ='1B13',FP00DPP,NULL)) as X1B13Z1, sum(IF(FFLAGZZ='1B13',FP00PPN,NULL)) as X1B13Z2,sum(IF(FFLAGZZ='1B14',FP00DPP,NULL)) as X1B14Z1, sum(IF(FFLAGZZ='1B14',FP00PPN,NULL)) as X1B14Z2,sum(IF(FFLAGZZ='1B20',FP00DPP,NULL)) as X1B20Z1, sum(IF(FFLAGZZ='1B20',FP00PPN,NULL)) as X1B20Z2,sum(IF(FFLAGZZ='2A10',FP00DPP,NULL)) as X2A10Z1, sum(IF(FFLAGZZ='2A10',FP00PPN,NULL)) as X2A10Z2,sum(IF(FFLAGZZ='2B10',FP00DPP,NULL)) as X2B10Z1, sum(IF(FFLAGZZ='2B10',FP00PPN,NULL)) as X2B10Z2,sum(IF(FFLAGZZ='2C10',FP00DPP,NULL)) as X2C10Z1, sum(IF(FFLAGZZ='2C10',FP00PPN,NULL)) as X2C10Z2");
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp00',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd',
                                                        )
                                                );
                                                $this->db->order_by('FFLAGZZ', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oX1A10Z1 = $_oRow['X1A10Z1'];
                                                    $_oX1A10Z2 = $_oRow['X1A10Z2'];
                                                    $_oX1B11Z1 = $_oRow['X1B11Z1'];
                                                    $_oX1B11Z2 = $_oRow['X1B11Z2'];
                                                    $_oX1B12Z1 = $_oRow['X1B12Z1'];
                                                    $_oX1B12Z2 = $_oRow['X1B12Z2'];
                                                    $_oX1B13Z1 = $_oRow['X1B13Z1'];
                                                    $_oX1B13Z2 = $_oRow['X1B13Z2'];
                                                    $_oX1B14Z1 = $_oRow['X1B14Z1'];
                                                    $_oX1B14Z2 = $_oRow['X1B14Z2'];
                                                    $_oX1B20Z1 = $_oRow['X1B20Z1'];
                                                    $_oX1B20Z2 = $_oRow['X1B20Z2'];
                                                    $_oX2A10Z1 = $_oRow['X2A10Z1'];
                                                    $_oX2A10Z2 = $_oRow['X2A10Z2'];
                                                    $_oX2B10Z1 = $_oRow['X2B10Z1'];
                                                    $_oX2B10Z2 = $_oRow['X2B10Z2'];
                                                    $_oX2C10Z1 = $_oRow['X2C10Z1'];
                                                    $_oX2C10Z2 = $_oRow['X2C10Z2'];
                                                }

                                                $_updP23HST = array(
                                                    'F1A10ZZ' => $_oX1A10Z1 . ';' . $_oX1A10Z2,
                                                    'F1B11ZZ' => $_oX1B11Z1 . ';' . $_oX1B11Z2,
                                                    'F1B12ZZ' => $_oX1B12Z1 . ';' . $_oX1B12Z2,
                                                    'F1B13ZZ' => $_oX1B13Z1 . ';' . $_oX1B13Z2,
                                                    'F1B14ZZ' => $_oX1B14Z1 . ';' . $_oX1B14Z2,
                                                    'F1B20ZZ' => $_oX1B20Z1 . ';' . $_oX1B20Z2,
                                                    'F2A10ZZ' => $_oX2A10Z1 . ';' . $_oX2A10Z2,
                                                    'F2B10ZZ' => $_oX2B10Z1 . ';' . $_oX2B10Z2,
                                                    'F2C10ZZ' => $_oX2C10Z1 . ';' . $_oX2C10Z2,
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP23HST);
                                                ?>

                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FPROFLE = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp00',
                                                    'ttaxhst.FTYPEZZ = ' => 'cmp',
                                                        )
                                                );
                                                $this->db->order_by('FFLAGZZ', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                if ($_quePROFLE->num_rows() > 0) {

                                                    foreach ($_quePROFLE->result_array() as $_oRow) {

                                                        $_xF1A10ZZ = $_oRow['F1A10ZZ'];
                                                        $_yF1A10ZZ = explode(';', $_xF1A10ZZ);
                                                        $_oF1A10Z1 = isset($_yF1A10ZZ[0]) ? $_yF1A10ZZ[0] : 0;
                                                        $_oF1A10Z2 = isset($_yF1A10ZZ[1]) ? $_yF1A10ZZ[1] : 0;

                                                        $_xF1B11ZZ = $_oRow['F1B11ZZ'];
                                                        $_yF1B11ZZ = explode(';', $_xF1B11ZZ);
                                                        $_oF1B11Z1 = isset($_yF1B11ZZ[0]) ? $_yF1B11ZZ[0] : 0;
                                                        $_oF1B11Z2 = isset($_yF1B11ZZ[1]) ? $_yF1B11ZZ[1] : 0;

                                                        $_xF1B12ZZ = $_oRow['F1B12ZZ'];
                                                        $_yF1B12ZZ = explode(';', $_xF1B12ZZ);
                                                        $_oF1B12Z1 = isset($_yF1B12ZZ[0]) ? $_yF1B12ZZ[0] : 0;
                                                        $_oF1B12Z2 = isset($_yF1B12ZZ[1]) ? $_yF1B12ZZ[1] : 0;

                                                        $_xF1B13ZZ = $_oRow['F1B13ZZ'];
                                                        $_yF1B13ZZ = explode(';', $_xF1B13ZZ);
                                                        $_oF1B13Z1 = isset($_yF1B13ZZ[0]) ? $_yF1B13ZZ[0] : 0;
                                                        $_oF1B13Z2 = isset($_yF1B13ZZ[1]) ? $_yF1B13ZZ[1] : 0;

                                                        $_xF1B14ZZ = $_oRow['F1B14ZZ'];
                                                        $_yF1B14ZZ = explode(';', $_xF1B14ZZ);
                                                        $_oF1B14Z1 = isset($_yF1B14ZZ[0]) ? $_yF1B14ZZ[0] : 0;
                                                        $_oF1B14Z2 = isset($_yF1B14ZZ[1]) ? $_yF1B14ZZ[1] : 0;

                                                        $_oF1BXXZ1 = intval($_oF1B11Z1) + intval($_oF1B12Z1) + intval($_oF1B13Z1) + intval($_oF1B14Z1);
                                                        $_oF1BXXZ2 = intval($_oF1B11Z2) + intval($_oF1B12Z2) + intval($_oF1B13Z2) + intval($_oF1B14Z2);

                                                        $_xF1B20ZZ = $_oRow['F1B20ZZ'];
                                                        $_yF1B20ZZ = explode(';', $_xF1B20ZZ);
                                                        $_oF1B20Z1 = isset($_yF1B20ZZ[0]) ? $_yF1B20ZZ[0] : 0;
                                                        $_oF1B20Z2 = isset($_yF1B20ZZ[1]) ? $_yF1B20ZZ[1] : 0;

                                                        $_xF2A10ZZ = $_oRow['F2A10ZZ'];
                                                        $_yF2A10ZZ = explode(';', $_xF2A10ZZ);
                                                        $_oF2A10Z1 = isset($_yF2A10ZZ[0]) ? $_yF2A10ZZ[0] : 0;
                                                        $_oF2A10Z2 = isset($_yF2A10ZZ[1]) ? $_yF2A10ZZ[1] : 0;

                                                        $_xF2B10ZZ = $_oRow['F2B10ZZ'];
                                                        $_yF2B10ZZ = explode(';', $_xF2B10ZZ);
                                                        $_oF2B10Z1 = isset($_yF2B10ZZ[0]) ? $_yF2B10ZZ[0] : 0;
                                                        $_oF2B10Z2 = isset($_yF2B10ZZ[1]) ? $_yF2B10ZZ[1] : 0;

                                                        $_xF2C10ZZ = $_oRow['F2C10ZZ'];
                                                        $_yF2C10ZZ = explode(';', $_xF2C10ZZ);
                                                        $_oF2C10Z1 = isset($_yF2C10ZZ[0]) ? $_yF2C10ZZ[0] : 0;
                                                        $_oF2C10Z2 = isset($_yF2C10ZZ[1]) ? $_yF2C10ZZ[1] : 0;

                                                        $_oF2X10Z1 = intval($_oF2A10Z1) + intval($_oF2B10Z1) + intval($_oF2C10Z1);
                                                        $_oF2X10Z2 = intval($_oF2A10Z2) + intval($_oF2B10Z2) + intval($_oF2C10Z2);

                                                        $_oFPPNST1 = intval($_oF2B10Z1) + intval($_oF2C10Z1) + intval($_oF2X10Z1);
                                                        $_oFPPNST2 = intval($_oF2B10Z2) + intval($_oF2C10Z2) + intval($_oF2X10Z2);

                                                        $_oFPMKRED = intval($_oF2A10Z2) + intval($_oF2B10Z2);

                                                        $_xFCOMPEN = $_oRow['FCOMPEN'];
                                                        $_oFCOMPEN = explode(';', $_xFCOMPEN);
                                                        echo $_xFCOMPEN;

                                                        $_oFKOMSBL = $_oFCOMPEN[0];
                                                        $_oFKOMMSA = isset($_oFCOMPEN[1]) ? $_oFCOMPEN[1] : 0;
                                                        $_oFHITPJK = isset($_oFCOMPEN[2]) ? $_oFCOMPEN[2] : 0;

                                                        $_oFJMLPMX = intval($_oFKOMSBL) + intval($_oFKOMMSA) + intval($_oFHITPJK);

                                                        $_oFPMHITG = intval($_oFPMKRED) + intval($_oFJMLPMX);

                                                        $_FKRGLBH = intval($_oF1B20Z2) + intval($_oF1B11Z2) - intval($_oFPMHITG);
                                                    }
                                                } else {

                                                }
                                                ?>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">I. Rekapitulasi Penyerahan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="9" style="width: 4%">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap; width: 4%">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Ekspor BKP Berwujud/BKP Tidak Berwujud/JKP
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1A10Z1)) {
                                                            echo number_format($_oF1A10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="background-color: #cccccc;">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td style="background-color: #cccccc;">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3" class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td colspan="4">
                                                        Penyerahan Dalam Negeri
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Penyerahan Dalam Negeri dengan Faktur Pajak yang Tidak Digunggung
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format($_oF1BXXZ1);
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format($_oF1BXXZ2);
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Penyerahan Dalam Negeri dengan Faktur Pajak yang Digunggung
                                                    </td>
                                                    <td class="text-right" style="color: #ff0000">
                                                        <?php
                                                        if (!empty($_oF1B20Z1)) {
                                                            echo number_format($_oF1B20Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="color: #ff0000">
                                                        <?php
                                                        if (!empty($_oF1B20Z2)) {
                                                            echo number_format($_oF1B20Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td colspan="4">
                                                        Rincian Penyerahan Dalam Negeri
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Penyerahan yang PPN atau PPN dan PPn BM-nya harus dipungut sendiri 
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B11Z1)) {
                                                            echo number_format($_oF1B11Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B11Z2)) {
                                                            echo number_format($_oF1B11Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Penyerahan yang PPN atau PPN dan PPn BM-nya dipungut oleh Pemungut PPN
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B12Z1)) {
                                                            echo number_format($_oF1B12Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">

                                                        <?php
                                                        if (!empty($_oF1B12Z2)) {
                                                            echo number_format($_oF1B12Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3. Penyerahan yang PPN atau PPN dan PPn BM-nya tidak dipungut
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B13Z1)) {
                                                            echo number_format($_oF1B13Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B13Z2)) {
                                                            echo number_format($_oF1B13Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4. Penyerahan yang dibebaskan dari pengenaan PPN atau PPN dan PPn BM
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B14Z1)) {
                                                            echo number_format($_oF1B14Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>

                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B14Z2)) {
                                                            echo number_format($_oF1B14Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">II. Rekapitulasi Perolehan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="5">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Impor BKP, Pemanfaatan BKP Tidak Berwujud dari Luar Daerah Pabean dan<br> Pemanfaatan JKP dari Luar Daerah Pabean Yang PM-nya Dapat Dikreditkan
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2A10Z1)) {
                                                            echo number_format($_oF2A10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2A10Z2)) {
                                                            echo number_format($_oF2A10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">

                                                    <td class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td>
                                                        Perolehan BKP/JKP dari Dalam Negeri Yang PM-nya Dapat Dikreditkan
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2B10Z1)) {
                                                            echo number_format($_oF2B10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2B10Z2)) {
                                                            echo number_format($_oF2B10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">

                                                    <td class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td>
                                                        Impor atau Perolehan Yang PM-nya Tidak Dapat dikreditkan dan/atau Impor<br> atau Perolehan Yang Mendapat Fasilitas
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2C10Z1)) {
                                                            echo number_format($_oF2C10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2C10Z2)) {
                                                            echo number_format($_oF2C10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        D.
                                                    </td>
                                                    <td>
                                                        Jumlah Perolehan (II.A + II.B + II.C)
                                                    </td>
                                                    <td class="text-right" style="font-weight: bold">
                                                        <?php
                                                        if (!empty($_oF2X10Z1)) {
                                                            echo number_format($_oF2X10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="font-weight: bold">
                                                        <?php
                                                        if (!empty($_oF2X10Z2)) {
                                                            echo number_format($_oF2X10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        E.
                                                    </td>
                                                    <td>
                                                        PPN yang Sudah Disetor
                                                    </td>
                                                    <td class="text-right" style="font-weight: bolder">
                                                        <?php
                                                        if (!empty($_oFPPNST1)) {
                                                            echo number_format($_oFPPNST1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="font-weight: bolder">
                                                        <?php
                                                        if (!empty($_oFPPNST2)) {
                                                            echo number_format($_oFPPNST2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">III. Penghitungan PM Yang Dapat dikreditkan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="8">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Pajak Masukan atas Perolehan yang Dapat Dikreditkan (II.A + II.B)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFPMKRED)) {
                                                            echo number_format($_oFPMKRED);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td colspan="4">
                                                        Pajak Masukan Lainnya
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Kompensasi kelebihan PPN Masa Pajak sebelumnya
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFKOMSBL)) {
                                                            echo number_format($_oFKOMSBL);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak Tertentu
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFKOMMSA)) {
                                                            echo number_format($_oFKOMMSA);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai<br> penambah (pengurang) Pajak Masukan
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFHITPJK)) {
                                                            echo number_format($_oFHITPJK);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td>
                                                        4. Jumlah (III.B.1 + III.B.2 + III.B.3)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFJMLPMX)) {
                                                            echo number_format($_oFJMLPMX);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td>
                                                        Jumlah Pajak Masukan yang Dapat Diperhitungkan( III.A + III.B.4)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFPMHITG)) {
                                                            echo number_format($_oFPMHITG);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        D.
                                                    </td>
                                                    <td>
                                                        Pajak Kurang atau Lebih Bayar
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_FKRGLBH)) {
                                                            echo number_format($_FKRGLBH);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
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

            <div class="well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;  
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expfrd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export PPN Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data PPN';
                            } else {
                                echo 'Export Format/Data PPN';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?> href="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    } else {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                }
                                ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Import PPN Data';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Import Data PPN';
                                } else {
                                    echo 'Import Data PPN';
                                };
                                ?>" style="background-color: #f7f7f7"><font style="color: <?php
                                if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '#d9534f';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#808080';
                                }
                                ?>; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
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
                                    <!--
                                    <table id="?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo '_objENGpphsmr';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo '_objINApphsmr';
                                    } else {
                                        echo '_objINApphsmr';
                                    }
                                    ?>" class="table table-striped table-bordered table-hover">
                                    //-->
                                    
                                    <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Flag</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">NPWP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 93%">Nama Lawan Transaksi</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">NSFP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Tanggal</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_oFREVISI == '0') {
                                            $_xFREVISI = '-1';
                                        } else {
                                            $_xFREVISI = $_oFREVISI;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->like('FTYPEZZ', 'vnd');
                                        $this->db->where('FFLGTAX', 'hstp00');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FFLAGZZ', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>

                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FFLAGZZ'])) {
                                                        echo $_oRow['FFLAGZZ'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if (!empty($_yNwp)) {
                                                            echo substr($_yNwp, 0, 2) . '.' . substr($_yNwp, 2, 3) . '.' . substr($_yNwp, 5, 3) . '.' . substr($_yNwp, 8, 1) . '-' . substr($_yNwp, 9, 3) . '.' . substr($_yNwp, 12, 3);
                                                        } else {
                                                            echo '00.000.000.0-000.000';
                                                        }
                                                    } else {
                                                        echo '00.000.000.0-000.000';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 92%">
                                                    <?php
                                                    if (!empty($_oRow['FFULNME'])) {
                                                        echo $_oRow['FFULNME'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNSFPZZ'])) {
                                                        echo $_oRow['FNSFPZZ'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00DTE'])) {
                                                        echo $this->sklibrfnc->_fSETDteInd($_oRow['FP00DTE']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00DPP'])) {
                                                        echo number_format($_oRow['FP00DPP']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00PPN'])) {
                                                        echo number_format($_oRow['FP00PPN']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <a href="<?php
                                                    if ($_oRow['FTYPEZZ'] == 'emp') {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00dtl/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
                                                    } elseif ($_oRow['FTYPEZZ'] == 'emx') {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00dtx/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
                                                    }
                                                    ?>" title="<?php
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
        case "c00imp" :
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
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_preFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            ?>" onclick="document.getElementById('_fleFATTACH').click()"><i class="far fa-file-excel fa-lg"></i>
                                            </a>
                                        </span>
                                        <input type="text" id="_finFATTACH" name="_finFATTACH" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo ''; ?>">
                                        <input type="text" name="_finFPERIOD" class="form-control hidden" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_varFPERIOD; ?>">
                                        <input type="text" name="_finFREVISI" class="form-control hidden" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_varFREVISI; ?>">
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
                                    echo '&ensp;Status Upload : ' . '<font style="color: #ff0000; font-weight: bolder">' . $_oFlg . '</font>' . ', ' . $_rslFATTACH;
                                } else {
                                    echo 'Status Upload : ...';
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
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Periode</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Flag</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">NPWP</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 87%">Nama Lawan Transaksi</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">NSFP</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Tanggal</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Masa</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Tahun</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Status</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">DPP</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Approval</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Dikreditkan/Tidak Dikreditkan</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 13px; border-left-color: #ff0000;">
                                                    <?php
                                                    $_oSeq = 0;
                                                    $_oChk = '';
                                                    foreach ($sheet as $_oRow) {
                                                        $_oSeq ++;

                                                        if ($_oSeq > 1) {
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
                                                                <td align="center" style="white-space: nowrap;  width: 1%; background-color: <?php
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
                                                                if ((!empty($_oRow['E'])) || (($_oRow['E'] == 0) && ($_oRow['E'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['E'])) || (($_oRow['E'] == 0) && ($_oRow['E'] == '0'))) {
                                                                            echo $_oRow['E'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['F'])) || (($_oRow['F'] == 0) && ($_oRow['F'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['F'])) || (($_oRow['F'] == 0) && ($_oRow['F'] == '0'))) {
                                                                            echo $_oRow['F'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="center" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['G'])) || (($_oRow['G'] == 0) && ($_oRow['G'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['G'])) || (($_oRow['G'] == 0) && ($_oRow['G'] == '0'))) {

                                                                            $_oCek = preg_replace('/[^\(\)]/', '', $_oRow['G']);
                                                                            if (strpos($_oCek, '()') !== false) {
                                                                                echo '-' . number_format($this->sklibrfnc->_fGETNumOnl($_oRow['G']));
                                                                            } elseif (strpos($_oCek, '()') == false) {
                                                                                echo $_oRow['G'];
                                                                            }
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="center" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['H'])) || (($_oRow['H'] == 0) && ($_oRow['H'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['H'])) || (($_oRow['H'] == 0) && ($_oRow['H'] == '0'))) {
                                                                            echo $_oRow['H'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="center" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['I'])) || (($_oRow['I'] == 0) && ($_oRow['I'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['I'])) || (($_oRow['I'] == 0) && ($_oRow['I'] == '0'))) {
                                                                            echo $_oRow['I'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="left" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['J'])) || (($_oRow['J'] == 0) && ($_oRow['J'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['J'])) || (($_oRow['J'] == 0) && ($_oRow['J'] == '0'))) {
                                                                            echo $_oRow['J'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['K'])) || (($_oRow['K'] == 0) && ($_oRow['K'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['K'])) || (($_oRow['K'] == 0) && ($_oRow['K'] == '0'))) {
                                                                            echo $_oRow['K'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['L'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['L'])) || (($_oRow['L'] == 0) && ($_oRow['L'] == '0'))) {
                                                                            echo $_oRow['L'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['M'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['M'])) {
                                                                            echo $_oRow['M'];
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td align="right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if (!empty($_oRow['N'])) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if (!empty($_oRow['N'])) {
                                                                            echo $_oRow['N'];
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
                                        <div style="height: 5px;">
                                            <br>
                                        </div>
                                        <a class="btn btn-default btn-flat <?php
                                        if (($_oDsb == 'empty') || ($_oDsb == 'Y1') || ($_oDsb == 'Y2')) {
                                            echo 'disabled';
                                            echo $KATAKPEYANG = '';
                                        } elseif ($_oDsb == 'N') {
                                            echo '';
                                        }
                                        ?> sk_button_modification" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI . '/' . $KATAKPEYANG; ?>" role = "button" title="<?php
                                           if ($_sesFLNGAGE == 'eng') {
                                               echo 'Process to Database';
                                           } elseif ($_sesFLNGAGE == 'ina') {
                                               echo 'Proses ke Database';
                                           } else {
                                               echo 'Proses ke Database';
                                           };
                                           ?>" style="background-color: <?php
                                           if (($_oDsb == 'empty') || ($_oDsb == 'Y1') || ($_oDsb == 'Y2')) {
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
                                            echo '&ensp;Status Proses PPN : <font style="color: #ff0000; font-weight: bolder">Terkendala</font>, karena di data klien, isi kolom periode beda';
                                        } elseif ($_oDsb == 'N') {
                                            echo '&ensp;Status Proses PPN : <font style="color: #ff0000; font-weight: bolder">Siap</font>, data yang sudah <font style="color: #ff0000; font-weight: bolder">valid</font> bisa dimasukkan ke database';
                                        }
                                        ?>


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

                                                if ($_oSeq > 1) {

                                                    $_oFPERIOD = $this->sklibrfnc->_fGETNumOnl($_oRow['B']);
                                                    $_oFFLAGZZ = $this->sklibrfnc->_fGETPREGRP($_oRow['C']);
                                                    $_xFNPWPZZ = $this->sklibrfnc->_fGETNumOnl($_oRow['D']);
                                                    if ((!empty($_xFNPWPZZ)) && (strlen($_xFNPWPZZ) == 15)) {
                                                        $_oFNPWPZZ = 'Y;' . $_xFNPWPZZ;
                                                        $_oNpw = 1;
                                                    } elseif ((!empty($_xFNPWPZZ)) && (strtolower($_xFNPWPZZ) == 'non npwp')) {
                                                        $_oFNPWPZZ = 'N;000000000000000';
                                                        $_oNpw = 1;

                                                    } else {
                                                        $_oFNPWPZZ = 'N;000000000000000';
                                                        $_oNpw = 1;
                                                    }
                                                    $_oFFULNME = $_oRow['E'];
                                                    $_oFNSFPZZ = $_oRow['F'];
                                                    $_oFP00DTE = $this->sklibrfnc->_fGETNumOnl($_oRow['G']);
                                                    $_oFP00MSA = $this->sklibrfnc->_fGETNumOnl($_oRow['H']);
                                                    $_oFP00YEA = $this->sklibrfnc->_fGETNumOnl($_oRow['I']);
                                                    $_oFP00STA = $this->sklibrfnc->_fGETPREGRP($_oRow['J']);
                                                    $_oFP00DPP = $this->sklibrfnc->_fGETNumOnl($_oRow['K']);
                                                    $_oFP00PPN = $this->sklibrfnc->_fGETNumOnl($_oRow['L']);
                                                    $_oFP00APR = $this->sklibrfnc->_fGETPREGRP($_oRow['M']);
                                                    $_oFP00KRE = $this->sklibrfnc->_fGETPREGRP($_oRow['N']);

                                                    $this->db->select('*');
                                                    $this->db->from('ttaxhst');
                                                    $this->db->where('FFLGTAX', 'hstp00');
                                                    $this->db->where('FPERIOD', $_oFPERIOD);
                                                    $this->db->where('FFULNME', $_oFFULNME);
                                                    $this->db->where('FNSFPZZ', $_oFNSFPZZ);
                                                    $this->db->where('FPROFLE', NULL);
                                                    $_queP21HST = $this->db->get();

                                                    if ($_queP21HST->num_rows() > 0) {

                                                        foreach ($_queP21HST->result_array() as $_oRow) {
                                                            $_oFRECNMB = $_oRow['FRECNMB'];
                                                        }

                                                        $_updP21HST = array(
                                                            'FFLAGZZ' => $_oFFLAGZZ,
                                                            'FFULNME' => $_oFFULNME,
                                                            'FNPWPZZ' => $_oFNPWPZZ,
                                                            'FGROUPS' => $_hstFCODEZZ,
                                                            'FPERIOD' => $_oFPERIOD,
                                                            'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                            'FTYPEZZ' => 'vnd',
                                                            'FNSFPZZ' => $_oFNSFPZZ,
                                                            'FP00DTE' => $_oFP00DTE,
                                                            'FP00MSA' => $_oFP00MSA,
                                                            'FP00YEA' => $_oFP00YEA,
                                                            'FP00STA' => $_oFP00STA,
                                                            'FP00DPP' => $_oFP00DPP,
                                                            'FP00PPN' => $_oFP00PPN,
                                                            'FP00APR' => $_oFP00APR,
                                                            'FP00KRE' => $_oFP00KRE
                                                        );

                                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                                        $this->db->where('FFLGTAX', 'hstp00');
                                                        $this->db->where('FRECNMB', $_oFRECNMB);
                                                        $this->db->update('ttaxhst', $_updP21HST);
                                                    } else {

                                                        $_addP21HST = array(
                                                            'FFLAGZZ' => $_oFFLAGZZ,
                                                            'FFULNME' => $_oFFULNME,
                                                            'FNPWPZZ' => $_oFNPWPZZ,
                                                            'FGROUPS' => $_hstFCODEZZ,
                                                            'FPERIOD' => $_oFPERIOD,
                                                            'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                            'FTYPEZZ' => 'vnd',
                                                            'FFLGTAX' => 'hstp00',
                                                            'FNSFPZZ' => $_oFNSFPZZ,
                                                            'FP00DTE' => $_oFP00DTE,
                                                            'FP00MSA' => $_oFP00MSA,
                                                            'FP00YEA' => $_oFP00YEA,
                                                            'FP00STA' => $_oFP00STA,
                                                            'FP00DPP' => $_oFP00DPP,
                                                            'FP00PPN' => $_oFP00PPN,
                                                            'FP00APR' => $_oFP00APR,
                                                            'FP00KRE' => $_oFP00KRE
                                                        );
                                                        $this->db->insert('ttaxhst', $_addP21HST);
                                                    }
                                                }
                                            }
                                            if ($_sesFCATGRY == 'client') {
                                                redirect('NocUSERZZ/cfcACTUSR018/c002mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ);
                                            } else {
                                                redirect('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ);
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 0px;">
                        <br>
                    </div>
                </div>
            </form>
            <?php

            break;
        case "c00dtl";
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_oFPROFLE = $_tblC00DTL['0']['FPROFLE'];
                $_oFFULNME = $_tblC00DTL['0']['FFULNME'];
                $_oFPERIOX = $_tblC00DTL['0']['FPERIOX'];
                $_oFINCR01 = $_tblC00DTL['0']['FINCR01'];
                $_oFINCR02 = $_tblC00DTL['0']['FINCR02'];
                $_oFINCR03 = $_tblC00DTL['0']['FINCR03'];
                $_oFINCR04 = $_tblC00DTL['0']['FINCR04'];
                $_oFINCR05 = $_tblC00DTL['0']['FINCR05'];
                $_oFINCR06 = $_tblC00DTL['0']['FINCR06'];
                $_oFINCR07 = $_tblC00DTL['0']['FINCR07'];
                $_oFBRUTO2 = $_tblC00DTL['0']['FBRUTO2'];
                $_oFDECR01 = $_tblC00DTL['0']['FDECR01'];
                $_oFDECR02 = $_tblC00DTL['0']['FDECR02'];
                $_oFBRTO12 = $_tblC00DTL['0']['FBRTO12'];
                $_oFPSTN12 = $_tblC00DTL['0']['FPSTN12'];
                $_oFPENS12 = $_tblC00DTL['0']['FPENS12'];
                $_oFMNUS12 = $_tblC00DTL['0']['FMNUS12'];
                $_oFNETO12 = $_tblC00DTL['0']['FNETO12'];
                $_oFPTKPZZ = $_tblC00DTL['0']['FPTKPZZ'];
                $_oFPKPZ12 = $_tblC00DTL['0']['FPKPZ12'];
                $_oFPKPR12 = $_tblC00DTL['0']['FPKPR12'];
                $_oFP21HMN = $_tblC00DTL['0']['FP21HMN'];
                $_oFP21R12 = $_tblC00DTL['0']['FP21R12'];
                $_oFP21H12 = $_tblC00DTL['0']['FP21H12'];
                $_oFP21IRG = $_tblC00DTL['0']['FP21IRG'];
                $_xFMARITL = explode(';', $_tblC00DTL['0']['FMARITL']);
                $_oFMARITL = $_xFMARITL[1];
                $_xFNPWPZZ = $_tblC00DTL['0']['FNPWPZZ'];
                if (substr_count($_xFNPWPZZ, ';') == 0) {
                    $_yFNPWPZZ = ';';
                } else {
                    $_yFNPWPZZ = $_xFNPWPZZ;
                }
                $_zFNPWPZZ = explode(';', $_yFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];

                $_cmpFRECNMB = $this->uri->segment(4);
                $_cmpFCODEZZ = $this->uri->segment(5);
                $_empFRECNMB = $this->uri->segment(6);
                $_empFCODEZZ = $this->uri->segment(7);
                ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
                            &nbsp;
                            <font style="font-size: 16px;"><?php echo '(Periode&nbsp;<strong>' . $this->uri->segment(10) . '</strong>)'; ?></font>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div style="height: 0px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Karyawan (Pegawai)';
                                                } else {
                                                    echo 'Kode Karyawan (Pegawai)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFPROFLE)) {
                                                echo $_oFPROFLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
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
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXDESCRP" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFMARITL)) {
                                                echo $_oFMARITL;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">

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
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_yNwp = $_oFNPWPZZ;
                                                if (!empty($_yNwp)) {
                                                    echo substr($_yNwp, 0, 2) . '.' . substr($_yNwp, 2, 3) . '.' . substr($_yNwp, 5, 3) . '.' . substr($_yNwp, 8, 1) . '-' . substr($_yNwp, 9, 3) . '.' . substr($_yNwp, 12, 3);
                                                } else {
                                                    echo '00.000.000.0-000.000';
                                                }
                                            } else {
                                                echo '00.000.000.0-000.000';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <hr class="sk_hr_modification1">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(A) Penghasilan</font></strong></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '01. Salary';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '01. Gaji/Pensiun/THT/JHT';
                                                    } else {
                                                        echo '01. Gaji/Pensiun/THT/JHT';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR01); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '02. PPh Allowance';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '02. Tunjangan PPh';
                                                    } else {
                                                        echo '02. Tunjangan PPh';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR02); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '03. Other Benefits, Overtime Money, and so on';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '03. Tunjangan Lain, Uang Lembur, dan sebagainya';
                                                    } else {
                                                        echo '03. Tunjangan Lain, Uang Lembur, dan sebagainya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR03); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '04. Honorarium and Other Similar Benefits';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '04. Honorarium dan Imbalan Lain Sejenisnya';
                                                    } else {
                                                        echo '04. Honorarium dan Imbalan Lain Sejenisnya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR04); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '05. Insurance premium paid by the Employer';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '05. Premi Asuransi yang dibayar Pemberi Kerja';
                                                    } else {
                                                        echo '05. Premi Asuransi yang dibayar Pemberi Kerja';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR05); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '06. Natura and Other Enjoyments';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '06. Natura dan Kenikmatan Lainnya';
                                                    } else {
                                                        echo '06. Natura dan Kenikmatan Lainnya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR06); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '07. Tantiem, Bonus and THR';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '07. Tantiem, Bonus dan THR';
                                                    } else {
                                                        echo '07. Tantiem, Bonus dan THR';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINCR07); ?>">
                                            </div>
                                            <hr class="sk_hr_modification2">
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '08. Gross Income';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '08. Penghasilan Bruto';
                                                    } else {
                                                        echo '08. Penghasilan Bruto';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFBRUTO2); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(B) Pengurang</font></strong></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '09. Position Allowance';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '09. Biaya Jabatan';
                                                    } else {
                                                        echo '09. Biaya Jabatan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFDECR01); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '10. Pension Dues or JHT/THT Dues';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '10. Iuran Pensiun atau Iuran JHT/THT';
                                                    } else {
                                                        echo '10. Iuran Pensiun atau Iuran JHT/THT';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFDECR02); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(C) Perhitungan PPh 21</font></strong></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '11. Gross Income a Year';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '11. Penghasilan Bruto Setahun';
                                                    } else {
                                                        echo '11. Penghasilan Bruto Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFBRTO12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '12. Position Allowance a Year';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '12. Biaya Jabatan Setahun';
                                                    } else {
                                                        echo '12. Biaya Jabatan Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPSTN12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '13. Pension Dues or JHT/THT Dues a Year';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '13. Iuran Pensiun atau Iuran JHT/THT Setahun';
                                                    } else {
                                                        echo '13. Iuran Pensiun atau Iuran JHT/THT Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPENS12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '14. Deductions Ammount a Year';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '14. Jumlah Pengurang Setahun';
                                                    } else {
                                                        echo '14. Jumlah Pengurang Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFMNUS12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '15. Net Income a Year/Annualized';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '15. Penghasilan Neto Setahun/Disetahunkan';
                                                    } else {
                                                        echo '15. Penghasilan Neto Setahun/Disetahunkan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFNETO12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '16. Non-Taxable Income (PTKP)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '16. Penghasilan Tidak Kena Pajak (PTKP)';
                                                    } else {
                                                        echo '16. Penghasilan Tidak Kena Pajak (PTKP)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPTKPZZ); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '17. PKP a Year/Annualized';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '17. PKP Setahun/Disetahunkan';
                                                    } else {
                                                        echo '17. PKP Setahun/Disetahunkan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPZ12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '18. PPh Pasal 21 Terutang Setahun/Disetahunkan';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '18. PPh Pasal 21 Terutang Setahun/Disetahunkan';
                                                    } else {
                                                        echo '18. PPh Pasal 21 Terutang Setahun/Disetahunkan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" font-size: 16px; font-weight: bolder; color: #808080" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21H12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '<font style="color: #0000ff">19.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #0000ff">19.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } else {
                                                        echo '<font style="color: #0000ff">19.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21HMN); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '<font style="color: #0000ff">20.</font> PKP atas Penghasilan Teratur Setahun';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #0000ff">20.</font> PKP atas Penghasilan Teratur Setahun';
                                                    } else {
                                                        echo '<font style="color: #0000ff">20.</font> PKP atas Penghasilan Teratur Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPR12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '<font style="color: #0000ff">21.</font> PPh Pasal 21 atas Penghasilan Teratur Setahun';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #0000ff">21.</font> PPh Pasal 21 atas Penghasilan Teratur Setahun';
                                                    } else {
                                                        echo '<font style="color: #0000ff">21.</font> PPh Pasal 21 atas Penghasilan Teratur Setahun';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21R12); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '<font style="color: #0000ff">22.</font> PPh Pasal 21 atas Penghasilan Tidak Teratur';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #0000ff">22.</font> PPh Pasal 21 atas Penghasilan Tidak Teratur';
                                                    } else {
                                                        echo '<font style="color: #0000ff">22.</font> PPh Pasal 21 atas Penghasilan Tidak Teratur';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21IRG); ?>">
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
        case "c00dtx";
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_oFPROFLE = $_tblC00DTX['0']['FPROFLE'];
                $_oFFULNME = $_tblC00DTX['0']['FFULNME'];
                $_oFWRKTYP = $_tblC00DTX['0']['FWRKTYP'];
                $_oFPERIOX = $_tblC00DTX['0']['FPERIOX'];
                $_oFINCR01 = $_tblC00DTX['0']['FINCR01'];
                $_oFINCR02 = $_tblC00DTX['0']['FINCR02'];
                $_oFINCR03 = $_tblC00DTX['0']['FINCR03'];
                $_oFINCR04 = $_tblC00DTX['0']['FINCR04'];
                $_oFINCR05 = $_tblC00DTX['0']['FINCR05'];
                $_oFINCR06 = $_tblC00DTX['0']['FINCR06'];
                $_oFINCR07 = $_tblC00DTX['0']['FINCR07'];
                $_oFBRUTO2 = $_tblC00DTX['0']['FBRUTO2'];
                $_oFDECR01 = $_tblC00DTX['0']['FDECR01'];
                $_oFDECR02 = $_tblC00DTX['0']['FDECR02'];
                $_oFBRTO12 = $_tblC00DTX['0']['FBRTO12'];
                $_oFPSTN12 = $_tblC00DTX['0']['FPSTN12'];
                $_oFPENS12 = $_tblC00DTX['0']['FPENS12'];
                $_oFMNUS12 = $_tblC00DTX['0']['FMNUS12'];
                $_oFNETO12 = $_tblC00DTX['0']['FNETO12'];
                $_oFPTKPZZ = $_tblC00DTX['0']['FPTKPZZ'];
                $_oFPKPZ12 = $_tblC00DTX['0']['FPKPZ12'];
                $_oFPKPR12 = $_tblC00DTX['0']['FPKPR12'];
                $_oFP21HMN = $_tblC00DTX['0']['FP21HMN'];
                $_oFP21R12 = $_tblC00DTX['0']['FP21R12'];
                $_oFP21H12 = $_tblC00DTX['0']['FP21H12'];
                $_oFP21IRG = $_tblC00DTX['0']['FP21IRG'];
                $_xFMARITL = explode(';', $_tblC00DTX['0']['FMARITL']);
                $_oFMARITL = $_xFMARITL[1];
                $_xFNPWPZZ = $_tblC00DTX['0']['FNPWPZZ'];
                if (substr_count($_xFNPWPZZ, ';') == 0) {
                    $_yFNPWPZZ = ';';
                } else {
                    $_yFNPWPZZ = $_xFNPWPZZ;
                }
                $_zFNPWPZZ = explode(';', $_yFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];

                $_cmpFRECNMB = $this->uri->segment(4);
                $_cmpFCODEZZ = $this->uri->segment(5);
                $_empFRECNMB = $this->uri->segment(6);
                $_empFCODEZZ = $this->uri->segment(7);
                ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <?php
                    $_oYea = substr($this->uri->segment(10), 4, 4);
                    $_oPrf = $this->uri->segment(9);

                    $this->db->select('FRECNMB, FCHGPST, FCHGP21, COUNT(*) as XJMLREC, SUM(FINCR01) as XINCR01, SUM(FINCR02) as XINCR02, SUM(FINCR03) as XINCR03, SUM(FINCR04) as XINCR04, SUM(FINCR05) as XINCR05, SUM(FINCR06) as XINCR06, SUM(FINCR07) as XINCR07, SUM(FDECR01) as XDECR01, SUM(FDECR02) as XDECR02, SUM(FBRUTO2) as XBRUTO2');
                    $this->db->from('ttaxhst');
                    $this->db->where('FFLGTAX', 'hstp21');
                    $this->db->where('FPROFLE', $_oPrf);
                    $this->db->like('FPERIOD', $_oYea, 'after');

                    $_queC21DTX = $this->db->get();

                    foreach ($_queC21DTX->result_array() as $_oDtl) {

                        $_oXJMLREC = $_oDtl['XJMLREC'];
                        $_oXINCR01 = $_oDtl['XINCR01'];
                        $_oXINCR02 = $_oDtl['XINCR02'];
                        $_oXINCR03 = $_oDtl['XINCR03'];
                        $_oXINCR04 = $_oDtl['XINCR04'];
                        $_oXINCR05 = $_oDtl['XINCR05'];
                        $_oXINCR06 = $_oDtl['XINCR06'];
                        $_oXINCR07 = $_oDtl['XINCR07'];
                        $_oXBRUTO2 = $_oDtl['XBRUTO2'];

                        $_oFCHGPST = explode(';', $_oDtl['FCHGPST']);
                        $_oXCHGPS1 = $_oFCHGPST[1];
                        $_oXCHGPS2 = $_oFCHGPST[2];

                        $_zXDECR01 = (intval($_oXCHGPS1) * intval($_oXBRUTO2)) / 100;

                        if ($_zXDECR01 > (intval($_oXJMLREC) * intval($_oXCHGPS2))) {
                            $_yXDECR01 = (intval($_oXJMLREC) * intval($_oXCHGPS2));
                        } else {
                            $_yXDECR01 = $_zXDECR01;
                        }

                        $_oXDECR01 = $_yXDECR01;
                        $_oXDECR02 = $_oDtl['XDECR02'];

                        if (!empty($_oFWRKTYP)) {
                            if (strtolower($_oFWRKTYP) == 'l') {
                                $_oXNETTOZ = intval($_oXBRUTO2) - intval($_oXDECR01) - intval($_oXDECR02);
                            } elseif (strtolower($_oFWRKTYP) == 'e') {
                                $_oXNETTOZ = 12 * ((intval($_oXBRUTO2) - intval($_oXDECR01) - intval($_oXDECR02)) / intval($_oXJMLREC));
                            }
                        }

                        $_xXPKPZZZ = intval($_oXNETTOZ) - intval($_oFPTKPZZ);
                        $_zXPKPZZZ = (int) ($_xXPKPZZZ / 1000);
                        $_oXPKPZZZ = $_zXPKPZZZ * 1000;
                    }

                    $this->db->select('FCHGP21');
                    $this->db->from('ttaxhst');
                    $this->db->where('FRECNMB', $this->uri->segment(8));

                    $_queCHGP21 = $this->db->get();
                    foreach ($_queCHGP21->result_array() as $_oDtl) {


                        $_oFCHGP21 = explode('|', $_oDtl['FCHGP21']);
                        $_oXCHG211 = $_oFCHGP21[1];
                        $_oXCHG212 = $_oFCHGP21[2];


                        $_oPrc = explode(';', $_oXCHG211);
                        $_oVal = explode(';', $_oXCHG212);
                        $_oPkp = $_oXPKPZZZ;

                        $_oLyr = '';
                        for ($_iLop = 1; $_iLop <= 4; $_iLop++) {
                            $_xVal = $_oVal[$_iLop - 1];
                            if ($_oPkp <= $_xVal) {
                                $_oLyr = $_iLop;
                                break;
                            }
                        }

                        if ((!empty($_oPrc)) && (!empty($_oVal))) {

                            switch ($_oLyr) {

                                case "1":

                                    $_oPr1 = $_oPrc[0];
                                    $_oVl1 = $_oVal[0];
                                    $_oLy1 = $_oVal[0];
                                    $_oPk1 = $_oPkp;

                                    if ($_oPkp > 0) {
                                        if ($_oPk1 - $_oLy1 <= 0) {
                                            $_aP21 = ($_oPr1 / 100) * $_oPk1;
                                        } else {
                                            $_aP21 = 0;
                                        }
                                        $_bP21 = 0;
                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    } else {
                                        $_aP21 = 0;
                                        $_bP21 = 0;
                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    }
                                    break;

                                case "2" :

                                    $_oPr1 = $_oPrc[0];
                                    $_oVl1 = $_oVal[0];
                                    $_oLy1 = $_oVal[0];
                                    $_oPk1 = $_oLy1;

                                    $_oPr2 = $_oPrc[1];
                                    $_oVl2 = $_oVal[1];
                                    $_oLy2 = $_oVal[1] - $_oVal[0];
                                    $_oPk2 = $_oPkp - $_oPk1;

                                    if ($_oPkp > 0) {
                                        $_aP21 = ($_oPr1 / 100) * $_oPk1;
                                        if ($_oPk2 - $_oLy2 <= 0) {
                                            $_bP21 = ($_oPr2 / 100) * $_oPk2;
                                        } else
                                            $_bP21 = 0;

                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    } else {
                                        $_aP21 = 0;
                                        $_bP21 = 0;
                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    }
                                    break;

                                case "3":

                                    $_oPr1 = $_oPrc[0];
                                    $_oVl1 = $_oVal[0];
                                    $_oLy1 = $_oVal[0];
                                    $_oPk1 = $_oLy1;

                                    $_oPr2 = $_oPrc[1];
                                    $_oVl2 = $_oVal[1];
                                    $_oLy2 = $_oVal[1] - $_oVal[0];
                                    $_oPk2 = $_oLy2;

                                    $_oPr3 = $_oPrc[2];
                                    $_oVl3 = $_oVal[2];
                                    $_oLy3 = $_oVal[2] - $_oVal[1];
                                    $_oPk3 = $_oPkp - ($_oPk1 + $_oPk2);

                                    if ($_oPkp > 0) {
                                        $_aP21 = ($_oPr1 / 100) * $_oPk1;
                                        $_bP21 = ($_oPr2 / 100) * $_oPk2;
                                        if ($_oPk3 - $_oLy3 <= 0) {
                                            $_cP21 = ($_oPr3 / 100) * $_oPk3;
                                        } else
                                            $_cP21 = 0;
                                        $_dP21 = 0;
                                    }
                                    else {
                                        $_aP21 = 0;
                                        $_bP21 = 0;
                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    }
                                    break;

                                case "4" :

                                    $_oPr1 = $_oPrc[0];
                                    $_oVl1 = $_oVal[0];
                                    $_oLy1 = $_oVal[0] - 0;
                                    $_oPk1 = $_oLy1;

                                    $_oPr2 = $_oPrc[1];
                                    $_oVl2 = $_oVal[1];
                                    $_oLy2 = $_oVal[1] - $_oVal[0];
                                    $_oPk2 = $_oLy2;

                                    $_oPr3 = $_oPrc[2];
                                    $_oVl3 = $_oVal[2];
                                    $_oLy3 = $_oVal[2] - $_oVal[1];
                                    $_oPk3 = $_oLy3;

                                    $_oPr4 = $_oPrc[3];
                                    $_oVl4 = $_oVal[3];
                                    $_oLy4 = $_oVal[3] - $_oVal[2];
                                    $_oPk4 = $_oPkp - ($_oPk1 + $_oPk2 + $_oPk3);

                                    if ($_oPkp > 0) {
                                        $_aP21 = ($_oPr1 / 100) * $_oPk1;
                                        $_bP21 = ($_oPr2 / 100) * $_oPk2;
                                        $_cP21 = ($_oPr3 / 100) * $_oPk3;
                                        if ($_oPk4 - $_oLy4 <= 0) {
                                            $_dP21 = ($_oPr4 / 100) * $_oPk4;
                                        } else
                                            $_dP21 = 0;
                                    }

                                    else {
                                        $_aP21 = 0;
                                        $_bP21 = 0;
                                        $_cP21 = 0;
                                        $_dP21 = 0;
                                    }

                                    break;
                            }
                        }


                        if (!empty($_oFWRKTYP)) {
                            if (strtolower($_oFWRKTYP) == 'l') {
                                $_oXP21HMN = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                            } elseif (strtolower($_oFWRKTYP) == 'e') {
                                $_oXP21HMN = ((($_aP21 + $_bP21 + $_cP21 + $_dP21) / 12) * intval($_oXJMLREC));
                            }
                        }
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>
                            &nbsp;
                            <font style="font-size: 16px;"><?php echo '(<font style="color: #ff0000">Roll-Back Calculation/Hitung Gulung</font> Periode&nbsp;<strong>' . $this->uri->segment(10) . '</strong>)'; ?></font>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div style="height: 0px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Worker (Employee) Code';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Karyawan (Pegawai)';
                                                } else {
                                                    echo 'Kode Karyawan (Pegawai)';
                                                };
                                                ?><font color="#000000">&nbsp;:</font>
                                            </label>
                                            <input type="text" name="_finFCODEZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFPROFLE)) {
                                                echo $_oFPROFLE;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">
                                        </div>
                                        <div class="col-lg-3">
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
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_viwXDESCRP" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFMARITL)) {
                                                echo $_oFMARITL;
                                            } else {
                                                echo '...';
                                            }
                                            ?>">

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
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_yNwp = $_oFNPWPZZ;
                                                if (!empty($_yNwp)) {
                                                    echo substr($_yNwp, 0, 2) . '.' . substr($_yNwp, 2, 3) . '.' . substr($_yNwp, 5, 3) . '.' . substr($_yNwp, 8, 1) . '-' . substr($_yNwp, 9, 3) . '.' . substr($_yNwp, 12, 3);
                                                } else {
                                                    echo '00.000.000.0-000.000';
                                                }
                                            } else {
                                                echo '00.000.000.0-000.000';
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                    <hr class="sk_hr_modification1">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(A) Penghasilan : </font></strong><font style="color: #ff0000">periode s.d <?php echo $this->uri->segment(10); ?></font></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '01. Salary';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '01. Gaji/Pensiun/THT/JHT';
                                                    } else {
                                                        echo '01. Gaji/Pensiun/THT/JHT';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR01); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '02. PPh Allowance';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '02. Tunjangan PPh';
                                                    } else {
                                                        echo '02. Tunjangan PPh';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR02); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '03. Other Benefits, Overtime Money, and so on';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '03. Tunjangan Lain, Uang Lembur, dan sebagainya';
                                                    } else {
                                                        echo '03. Tunjangan Lain, Uang Lembur, dan sebagainya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR03); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '04. Honorarium and Other Similar Benefits';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '04. Honorarium dan Imbalan Lain Sejenisnya';
                                                    } else {
                                                        echo '04. Honorarium dan Imbalan Lain Sejenisnya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR04); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '05. Insurance premium paid by the Employer';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '05. Premi Asuransi yang dibayar Pemberi Kerja';
                                                    } else {
                                                        echo '05. Premi Asuransi yang dibayar Pemberi Kerja';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR05); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '06. Natura and Other Enjoyments';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '06. Natura dan Kenikmatan Lainnya';
                                                    } else {
                                                        echo '06. Natura dan Kenikmatan Lainnya';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR06); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '07. Tantiem, Bonus and THR';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '07. Tantiem, Bonus dan THR';
                                                    } else {
                                                        echo '07. Tantiem, Bonus dan THR';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXINCR07); ?>">
                                            </div>
                                            <hr class="sk_hr_modification2">
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '08. Gross Income';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '08. Penghasilan Bruto';
                                                    } else {
                                                        echo '08. Penghasilan Bruto';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXBRUTO2); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(B) Pengurang : </font></strong><font style="color: #ff0000">periode s.d <?php echo $this->uri->segment(10); ?></font></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '09. Position Allowance';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '09. Biaya Jabatan';
                                                    } else {
                                                        echo '09. Biaya Jabatan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXDECR01); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '10. Pension Dues or JHT/THT Dues';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '10. Iuran Pensiun atau Iuran JHT/THT';
                                                    } else {
                                                        echo '10. Iuran Pensiun atau Iuran JHT/THT';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXDECR02); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5><strong><font style="color: #f0ad4e">(C) Perhitungan PPh 21</font></strong></h5>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '11. Penghasilan Netto Setahun/Disetahunkan';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '11. Penghasilan Netto Setahun/Disetahunkan';
                                                    } else {
                                                        echo '11. Penghasilan Netto Setahun/Disetahunkan';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXNETTOZ); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '12. Non-Taxable Income (PTKP)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '12. PTKP (Penghasilan Tidak Kena Pajak)';
                                                    } else {
                                                        echo '12. PTKP (Penghasilan Tidak Kena Pajak)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPTKPZZ); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '13. PKP (Taxable Income)';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '13. PKP (Penghasilan Kena Pajak)';
                                                    } else {
                                                        echo '13. PKP (Penghasilan Kena Pajak)';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXPKPZZZ); ?>">
                                            </div>
                                            <div>
                                                <label class="sk_label_modification" style="color: #808080">
                                                    <?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo '<font style="color: #0000ff">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #0000ff">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } else {
                                                        echo '<font style="color: #0000ff">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oXP21HMN); ?>">
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
        case "c002st":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            ?>
            <div class="well well-sm sk_well_modification0">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div class="sk_table_modification2 table-responsive">
                                <table id = "_objINAc212st" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Pembetulan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP (Dasar Pengenaan Pajak)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tprofle');
                                        $this->db->where(array(
                                            'tprofle.FCODEZZ = ' => $_sesFCODEZZ,
                                                )
                                        );
                                        $this->db->order_by('FCODEZZ', 'asc');
                                        $_quePROFLE = $this->db->get();

                                        foreach ($_quePROFLE->result_array() as $_oRoz) {
                                            $_cmpFRECNMB = $_oRoz['FRECNMB'];
                                            $_cmpFCODEZZ = $_oRoz['FCODEZZ'];
                                        }

                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FPROFLE = ' => $_sesFCODEZZ,
                                            'ttaxhst.FTYPEZZ = ' => 'cmp',
                                            'ttaxhst.FFLGTAX = ' => 'hstp00'
                                                )
                                        );
                                        $this->db->order_by('FPERIOD', 'asc');
                                        $_queP21HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP21HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 93%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <font color="#ff0000"><?php echo $_oRow['FPERIOX']; ?></font>
                                                </td>
                                                <td align="center" style="white-space: nowrap">
                                                    <font color="#ff0000"><?php
                                                    if ($_oRow['FREVISI'] == '-1') {
                                                        echo '0';
                                                    } else {
                                                        echo $_oRow['FREVISI'];
                                                    }
                                                    ?></font>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FBRTO12'])) {
                                                        echo number_format($_oRow['FBRTO12']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP21HMN'])) {
                                                        echo number_format($_oRow['FP21HMN']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if ($_oRow['FREVISI'] == '-1') {
                                                        $_oXREVISI = '0';
                                                    } else {
                                                        $_oXREVISI = $_oRow['FREVISI'];
                                                    }
                                                    ?>
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c002mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . substr($_oRow['FPERIOD'], 0, 4) . '/' . $_oRow['FWRKSTA'] . '/' . $_oXREVISI ?>" title="<?php
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
        case "c002mr" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);

            $_varXPROCES = $this->uri->segment(8);
            $_varXRECNMB = $this->uri->segment(9);

            $_cmpFYEARZZ = $this->uri->segment(8);
            $_cmpFWRKSTA = $this->uri->segment(9);

            $_oFFULNME = $_tblC002MR['0']['FFULNME'];

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp00');
            $_queC21SMR = $this->db->get();

            foreach ($_queC21SMR->result_array() as $_oRow) {
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_yFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_yFNPWPZZ[1];
                $_oFPERIOX = $_oRow['FPERIOX'];
                $_oFPERIOD = $_oRow['FPERIOD'];
                $_xFREVISI = $_oRow['FREVISI'];
                if ($_xFREVISI == '-1') {
                    $_oFREVISI = '0';
                } else {
                    $_oFREVISI = $_xFREVISI;
                }
                $_oFAPRFLG = $_oRow['FAPRFLG'];
            }
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c002st'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/exprps'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan PPN (Terutang)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan PPN (Terutang)';
                            } else {
                                echo 'Download (Unduh) Laporan PPN (Terutang)';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-download fa-lg"></i></font></a>

                            <a href="<?php
                            if (($_cmpFWRKSTA == '1') || ($_cmpFWRKSTA == '2') || ($_cmpFWRKSTA == '3') || ($_cmpFWRKSTA == '4') || ($_cmpFWRKSTA == '5')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkmsm/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '6') || ($_cmpFWRKSTA == '7')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '8')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkrpt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else if (($_cmpFWRKSTA == '9')) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkarc/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            };
                            ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                               if ($_sesFLNGAGE == 'eng') {
                                   echo 'Ringkasan Aktivitas Pajak';
                               } elseif ($_sesFLNGAGE == 'ina') {
                                   echo 'Ringkasan Aktivitas Pajak';
                               } else {
                                   echo 'Ringkasan Aktivitas Pajak';
                               };
                               ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
                            </a>

                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '...';
                            }
                            ?> href="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c002pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR018/c002pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                }
                                ?>" role = "button" class="btn btn-default btn-flat <?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo 'disabled';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'aimz-alert-approval';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'aimz-alert-persetujuan';
                                        } else {
                                            echo 'aimz-alert-persetujuan';
                                        }
                                    } else {
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'aimz-alert-approval';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'aimz-alert-persetujuan';
                                        } else {
                                            echo 'aimz-alert-persetujuan';
                                        }
                                    }
                                } else {
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'aimz-alert-approval';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'aimz-alert-persetujuan';
                                    } else {
                                        echo 'aimz-alert-persetujuan';
                                    }
                                }
                                ?>" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Approval';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Approval/Persetujuan';
                                } else {
                                    echo 'Approval/Persetujuan';
                                };
                                ?>" style="background-color: #f7f7f7"><font style="color: <?php
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#808080';
                                } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '#d9534f';
                                }
                                ?>; font-size: 17px"><i class="far fa-check-circle fa-lg"></i></font></a>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 0px;">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary/Ringkasan</font>
                                    <div style="height: 0px;">
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(1) Period/Session';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(1) Periode/Masa';
                                                } else {
                                                    echo '(1) Periode/Masa';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="font-weight: bold" name="_viwFPERIOX" class="form-control" autofocus readonly value="<?php
                                            echo $_oFPERIOX;
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(2) Rectification/Correction';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(2) Pembetulan/Koreksi';
                                                } else {
                                                    echo '(2) Pembetulan/Koreksi';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="font-weight: bold" name="_viwFREVISI" class="form-control" readonly value="<?php
                                            echo $_oFREVISI;
                                            ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification" style="font-weight: normal">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo '(3) Client Approval';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo '(3) Approval/Persetujuan Klien';
                                                } else {
                                                    echo '(3) Approval/Persetujuan Klien';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" style="color: <?php
                                            if (!empty($_oFAPRFLG)) {
                                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                                    echo '#008000';
                                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                                    echo '#ff0000';
                                                } else {
                                                    echo '#ff0000';
                                                }
                                            } else {
                                                echo '#ff00000';
                                            }
                                            ?>; font-weight: bold" name="_viwFREVISI" class="form-control" readonly value="<?php
                                                   if (!empty($_oFAPRFLG)) {
                                                       if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                                           echo 'Sudah';
                                                       } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                                           echo 'Belum';
                                                       } else {
                                                           echo 'Belum';
                                                       }
                                                   } else {
                                                       echo '...';
                                                   }
                                                   ?>">
                                        </div>
                                    </div>
                                    <div style="height: 0px;">
                                        <br>
                                    </div>
                                    <div class="sk_table_modification2 table-responsive"> 
                                        <table id="" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">Uraian</th>
                                                    <th colspan="3" class="text-center" style="white-space: nowrap">Masa : <?php echo substr($_oFPERIOD, 4, 2) . '-' . substr($_oFPERIOD, 0, 4); ?> (Pembetulan ke-<?php echo $_oFREVISI; ?>)</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">DPP (Rp.)</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">PPN (Rp.)</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 13%">PpnBM (Rp.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $this->db->select("sum(IF(FFLAGZZ='1A10',FP00DPP,NULL)) as X1A10Z1, sum(IF(FFLAGZZ='1A10',FP00PPN,NULL)) as X1A10Z2,sum(IF(FFLAGZZ='1B11',FP00DPP,NULL)) as X1B11Z1, sum(IF(FFLAGZZ='1B11',FP00PPN,NULL)) as X1B11Z2,sum(IF(FFLAGZZ='1B12',FP00DPP,NULL)) as X1B12Z1, sum(IF(FFLAGZZ='1B12',FP00PPN,NULL)) as X1B12Z2,sum(IF(FFLAGZZ='1B13',FP00DPP,NULL)) as X1B13Z1, sum(IF(FFLAGZZ='1B13',FP00PPN,NULL)) as X1B13Z2,sum(IF(FFLAGZZ='1B14',FP00DPP,NULL)) as X1B14Z1, sum(IF(FFLAGZZ='1B14',FP00PPN,NULL)) as X1B14Z2,sum(IF(FFLAGZZ='1B20',FP00DPP,NULL)) as X1B20Z1, sum(IF(FFLAGZZ='1B20',FP00PPN,NULL)) as X1B20Z2,sum(IF(FFLAGZZ='2A10',FP00DPP,NULL)) as X2A10Z1, sum(IF(FFLAGZZ='2A10',FP00PPN,NULL)) as X2A10Z2,sum(IF(FFLAGZZ='2B10',FP00DPP,NULL)) as X2B10Z1, sum(IF(FFLAGZZ='2B10',FP00PPN,NULL)) as X2B10Z2,sum(IF(FFLAGZZ='2C10',FP00DPP,NULL)) as X2C10Z1, sum(IF(FFLAGZZ='2C10',FP00PPN,NULL)) as X2C10Z2");
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp00',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd',
                                                        )
                                                );
                                                $this->db->order_by('FFLAGZZ', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oX1A10Z1 = $_oRow['X1A10Z1'];
                                                    $_oX1A10Z2 = $_oRow['X1A10Z2'];
                                                    $_oX1B11Z1 = $_oRow['X1B11Z1'];
                                                    $_oX1B11Z2 = $_oRow['X1B11Z2'];
                                                    $_oX1B12Z1 = $_oRow['X1B12Z1'];
                                                    $_oX1B12Z2 = $_oRow['X1B12Z2'];
                                                    $_oX1B13Z1 = $_oRow['X1B13Z1'];
                                                    $_oX1B13Z2 = $_oRow['X1B13Z2'];
                                                    $_oX1B14Z1 = $_oRow['X1B14Z1'];
                                                    $_oX1B14Z2 = $_oRow['X1B14Z2'];
                                                    $_oX1B20Z1 = $_oRow['X1B20Z1'];
                                                    $_oX1B20Z2 = $_oRow['X1B20Z2'];
                                                    $_oX2A10Z1 = $_oRow['X2A10Z1'];
                                                    $_oX2A10Z2 = $_oRow['X2A10Z2'];
                                                    $_oX2B10Z1 = $_oRow['X2B10Z1'];
                                                    $_oX2B10Z2 = $_oRow['X2B10Z2'];
                                                    $_oX2C10Z1 = $_oRow['X2C10Z1'];
                                                    $_oX2C10Z2 = $_oRow['X2C10Z2'];
                                                }

                                                $_updP23HST = array(
                                                    'F1A10ZZ' => $_oX1A10Z1 . ';' . $_oX1A10Z2,
                                                    'F1B11ZZ' => $_oX1B11Z1 . ';' . $_oX1B11Z2,
                                                    'F1B12ZZ' => $_oX1B12Z1 . ';' . $_oX1B12Z2,
                                                    'F1B13ZZ' => $_oX1B13Z1 . ';' . $_oX1B13Z2,
                                                    'F1B14ZZ' => $_oX1B14Z1 . ';' . $_oX1B14Z2,
                                                    'F1B20ZZ' => $_oX1B20Z1 . ';' . $_oX1B20Z2,
                                                    'F2A10ZZ' => $_oX2A10Z1 . ';' . $_oX2A10Z2,
                                                    'F2B10ZZ' => $_oX2B10Z1 . ';' . $_oX2B10Z2,
                                                    'F2C10ZZ' => $_oX2C10Z1 . ';' . $_oX2C10Z2
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP23HST);
                                                ?>

                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FPROFLE = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp00',
                                                    'ttaxhst.FTYPEZZ = ' => 'cmp',
                                                        )
                                                );
                                                $this->db->order_by('FFLAGZZ', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                if ($_quePROFLE->num_rows() > 0) {

                                                    foreach ($_quePROFLE->result_array() as $_oRow) {

                                                        $_xF1A10ZZ = $_oRow['F1A10ZZ'];
                                                        $_yF1A10ZZ = explode(';', $_xF1A10ZZ);
                                                        $_oF1A10Z1 = $_yF1A10ZZ[0];
                                                        $_oF1A10Z2 = $_yF1A10ZZ[1];

                                                        $_xF1B11ZZ = $_oRow['F1B11ZZ'];
                                                        $_yF1B11ZZ = explode(';', $_xF1B11ZZ);
                                                        $_oF1B11Z1 = $_yF1B11ZZ[0];
                                                        $_oF1B11Z2 = $_yF1B11ZZ[1];

                                                        $_xF1B12ZZ = $_oRow['F1B12ZZ'];
                                                        $_yF1B12ZZ = explode(';', $_xF1B12ZZ);
                                                        $_oF1B12Z1 = $_yF1B12ZZ[0];
                                                        $_oF1B12Z2 = $_yF1B12ZZ[1];

                                                        $_xF1B13ZZ = $_oRow['F1B13ZZ'];
                                                        $_yF1B13ZZ = explode(';', $_xF1B13ZZ);
                                                        $_oF1B13Z1 = $_yF1B13ZZ[0];
                                                        $_oF1B13Z2 = $_yF1B13ZZ[1];

                                                        $_xF1B14ZZ = $_oRow['F1B14ZZ'];
                                                        $_yF1B14ZZ = explode(';', $_xF1B14ZZ);
                                                        $_oF1B14Z1 = $_yF1B14ZZ[0];
                                                        $_oF1B14Z2 = $_yF1B14ZZ[1];

                                                        $_oF1BXXZ1 = intval($_oF1B11Z1) + intval($_oF1B12Z1) + intval($_oF1B13Z1) + intval($_oF1B14Z1);
                                                        $_oF1BXXZ2 = intval($_oF1B11Z2) + intval($_oF1B12Z2) + intval($_oF1B13Z2) + intval($_oF1B14Z2);

                                                        $_xF1B20ZZ = $_oRow['F1B20ZZ'];
                                                        $_yF1B20ZZ = explode(';', $_xF1B20ZZ);
                                                        $_oF1B20Z1 = $_yF1B20ZZ[0];
                                                        $_oF1B20Z2 = $_yF1B20ZZ[1];

                                                        $_xF2A10ZZ = $_oRow['F2A10ZZ'];
                                                        $_yF2A10ZZ = explode(';', $_xF2A10ZZ);
                                                        $_oF2A10Z1 = $_yF2A10ZZ[0];
                                                        $_oF2A10Z2 = $_yF2A10ZZ[1];

                                                        $_xF2B10ZZ = $_oRow['F2B10ZZ'];
                                                        $_yF2B10ZZ = explode(';', $_xF2B10ZZ);
                                                        $_oF2B10Z1 = $_yF2B10ZZ[0];
                                                        $_oF2B10Z2 = $_yF2B10ZZ[1];

                                                        $_xF2C10ZZ = $_oRow['F2C10ZZ'];
                                                        $_yF2C10ZZ = explode(';', $_xF2C10ZZ);
                                                        $_oF2C10Z1 = $_yF2C10ZZ[0];
                                                        $_oF2C10Z2 = $_yF2C10ZZ[1];

                                                        $_oF2X10Z1 = intval($_oF2A10Z1) + intval($_oF2B10Z1) + intval($_oF2C10Z1);
                                                        $_oF2X10Z2 = intval($_oF2A10Z2) + intval($_oF2B10Z2) + intval($_oF2C10Z2);

                                                        $_oFPPNST1 = intval($_oF2B10Z1) + intval($_oF2C10Z1) + intval($_oF2X10Z1);
                                                        $_oFPPNST2 = intval($_oF2B10Z2) + intval($_oF2C10Z2) + intval($_oF2X10Z2);

                                                        $_oFPMKRED = intval($_oF2A10Z2) + intval($_oF2B10Z2);

                                                        $_oFKOMSBL = 0;
                                                        $_oFKOMMSA = 0;
                                                        $_oFHITPJK = 0;

                                                        $_oFJMLPMX = intval($_oFKOMSBL) + intval($_oFKOMMSA) + intval($_oFHITPJK);

                                                        $_oFPMHITG = intval($_oFPMKRED) + intval($_oFJMLPMX);

                                                        $_FKRGLBH = intval($_oF1B20Z2) + intval($_oF1B11Z2) - intval($_oFPMHITG);
                                                    }
                                                } else {
                                                }
                                                ?>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">I. Rekapitulasi Penyerahan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="9" style="width: 4%">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap; width: 4%">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Ekspor BKP Berwujud/BKP Tidak Berwujud/JKP
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1A10Z1)) {
                                                            echo number_format($_oF1A10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="background-color: #cccccc;">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td style="background-color: #cccccc;">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3" class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td colspan="4">
                                                        Penyerahan Dalam Negeri
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Penyerahan Dalam Negeri dengan Faktur Pajak yang Tidak Digunggung
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format($_oF1BXXZ1);
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format($_oF1BXXZ2);
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Penyerahan Dalam Negeri dengan Faktur Pajak yang Digunggung
                                                    </td>
                                                    <td class="text-right" style="color: #ff0000">
                                                        <?php
                                                        if (!empty($_oF1B20Z1)) {
                                                            echo number_format($_oF1B20Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="color: #ff0000">
                                                        <?php
                                                        if (!empty($_oF1B20Z2)) {
                                                            echo number_format($_oF1B20Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td colspan="4">
                                                        Rincian Penyerahan Dalam Negeri
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Penyerahan yang PPN atau PPN dan PPn BM-nya harus dipungut sendiri 
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B11Z1)) {
                                                            echo number_format($_oF1B11Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B11Z2)) {
                                                            echo number_format($_oF1B11Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Penyerahan yang PPN atau PPN dan PPn BM-nya dipungut oleh Pemungut PPN
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B12Z1)) {
                                                            echo number_format($_oF1B12Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">

                                                        <?php
                                                        if (!empty($_oF1B12Z2)) {
                                                            echo number_format($_oF1B12Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3. Penyerahan yang PPN atau PPN dan PPn BM-nya tidak dipungut
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B13Z1)) {
                                                            echo number_format($_oF1B13Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B13Z2)) {
                                                            echo number_format($_oF1B13Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4. Penyerahan yang dibebaskan dari pengenaan PPN atau PPN dan PPn BM
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B14Z1)) {
                                                            echo number_format($_oF1B14Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>

                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF1B14Z2)) {
                                                            echo number_format($_oF1B14Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">II. Rekapitulasi Perolehan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="5">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Impor BKP, Pemanfaatan BKP Tidak Berwujud dari Luar Daerah Pabean dan<br> Pemanfaatan JKP dari Luar Daerah Pabean Yang PM-nya Dapat Dikreditkan
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2A10Z1)) {
                                                            echo number_format($_oF2A10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2A10Z2)) {
                                                            echo number_format($_oF2A10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">

                                                    <td class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td>
                                                        Perolehan BKP/JKP dari Dalam Negeri Yang PM-nya Dapat Dikreditkan
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2B10Z1)) {
                                                            echo number_format($_oF2B10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2B10Z2)) {
                                                            echo number_format($_oF2B10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">

                                                    <td class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td>
                                                        Impor atau Perolehan Yang PM-nya Tidak Dapat dikreditkan dan/atau Impor<br> atau Perolehan Yang Mendapat Fasilitas
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2C10Z1)) {
                                                            echo number_format($_oF2C10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oF2C10Z2)) {
                                                            echo number_format($_oF2C10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        D.
                                                    </td>
                                                    <td>
                                                        Jumlah Perolehan (II.A + II.B + II.C)
                                                    </td>
                                                    <td class="text-right" style="font-weight: bold">
                                                        <?php
                                                        if (!empty($_oF2X10Z1)) {
                                                            echo number_format($_oF2X10Z1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="font-weight: bold">
                                                        <?php
                                                        if (!empty($_oF2X10Z2)) {
                                                            echo number_format($_oF2X10Z2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        E.
                                                    </td>
                                                    <td>
                                                        PPN yang Sudah Disetor
                                                    </td>
                                                    <td class="text-right" style="font-weight: bolder">
                                                        <?php
                                                        if (!empty($_oFPPNST1)) {
                                                            echo number_format($_oFPPNST1);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="font-weight: bolder">
                                                        <?php
                                                        if (!empty($_oFPPNST2)) {
                                                            echo number_format($_oFPPNST2);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo number_format('0');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td colspan="6">
                                                        <font style="font-weight: bolder; color: #0000ff">III. Penghitungan PM Yang Dapat dikreditkan</font>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td rowspan="8">
                                                    </td>
                                                    <td class="text-center" style="white-space: nowrap">
                                                        A.
                                                    </td>
                                                    <td>
                                                        Pajak Masukan atas Perolehan yang Dapat Dikreditkan (II.A + II.B)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFPMKRED)) {
                                                            echo number_format($_oFPMKRED);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" class="text-center" style="white-space: nowrap">
                                                        B.
                                                    </td>
                                                    <td colspan="4">
                                                        Pajak Masukan Lainnya
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        1. Kompensasi kelebihan PPN Masa Pajak sebelumnya
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFKOMSBL)) {
                                                            echo number_format($_oFKOMSBL);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak (MM-YYYY)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFKOMMSA)) {
                                                            echo number_format($_oFKOMMSA);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai<br> penambah (pengurang) Pajak Masukan
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFHITPJK)) {
                                                            echo number_format($_oFHITPJK);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td>
                                                        4. Jumlah (III.B.1 + III.B.2 + III.B.3)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFJMLPMX)) {
                                                            echo number_format($_oFJMLPMX);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        C.
                                                    </td>
                                                    <td>
                                                        Jumlah Pajak Masukan yang Dapat Diperhitungkan( III.A + III.B.4)
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFPMHITG)) {
                                                            echo number_format($_oFPMHITG);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td class="text-center" style="white-space: nowrap">
                                                        D.
                                                    </td>
                                                    <td>
                                                        Pajak Kurang atau Lebih Bayar
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_FKRGLBH)) {
                                                            echo number_format($_FKRGLBH);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right" style="background-color: #cccccc">
                                                        <?php
                                                        echo '';
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
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

            <div class="well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;  
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expfrd'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export PPN Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data PPN';
                            } else {
                                echo 'Export Format/Data PPN';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>

                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?> href="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    } else {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                }
                                ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Import PPN Data';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Import Data PPN';
                                } else {
                                    echo 'Import Data PPN';
                                };
                                ?>" style="background-color: #f7f7f7"><font style="color: <?php
                                if ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                    echo '#d9534f';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#808080';
                                }
                                ?>; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
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
                                    <!--
                                    <table id="?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo '_objENGpphsmr';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo '_objINApphsmr';
                                    } else {
                                        echo '_objINApphsmr';
                                    }
                                    ?>" class="table table-striped table-bordered table-hover">
                                    //-->
                                    
                                    <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Flag</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">NPWP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 93%">Nama Lawan Transaksi</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">NSFP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Tanggal</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_oFREVISI == '0') {
                                            $_xFREVISI = '-1';
                                        } else {
                                            $_xFREVISI = $_oFREVISI;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->like('FTYPEZZ', 'vnd');
                                        $this->db->where('FFLGTAX', 'hstp00');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FFLAGZZ', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>

                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FFLAGZZ'])) {
                                                        echo $_oRow['FFLAGZZ'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if (!empty($_yNwp)) {
                                                            echo substr($_yNwp, 0, 2) . '.' . substr($_yNwp, 2, 3) . '.' . substr($_yNwp, 5, 3) . '.' . substr($_yNwp, 8, 1) . '-' . substr($_yNwp, 9, 3) . '.' . substr($_yNwp, 12, 3);
                                                        } else {
                                                            echo '00.000.000.0-000.000';
                                                        }
                                                    } else {
                                                        echo '00.000.000.0-000.000';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 92%">
                                                    <?php
                                                    if (!empty($_oRow['FFULNME'])) {
                                                        echo $_oRow['FFULNME'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNSFPZZ'])) {
                                                        echo $_oRow['FNSFPZZ'];
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00DTE'])) {
                                                        echo $this->sklibrfnc->_fSETDteInd($_oRow['FP00DTE']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00DPP'])) {
                                                        echo number_format($_oRow['FP00DPP']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FP00PPN'])) {
                                                        echo number_format($_oRow['FP00PPN']);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
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
            break;
        case "h212st";
            ?>
            <?php
            $_cmpFRECNMB = $this->session->FRECNMB;
            $_cmpFCODEZZ = $this->session->FCODEZZ;
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
                            <div class="sk_table_modification2 table-responsive">
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
                                            <th colspan="3" class="text-center" style="white-space: nowrap; vertical-align:middle;">Pembayaran</th>
                                            <th colspan="3" class="text-center" style="white-space: nowrap; vertical-align:middle;">Pelaporan</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;">Klien</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align:middle;">#</th>
                                        </tr>
                                        <tr style="color: #f8f8f8; background-color: #4db8ff">
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center" title="Nomor Transaksi Penerimaan Negara">NTPN</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center" title="Nomor Tanda Terima Elektronik">NTTE</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FTYPEZZ', 'cmp');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                        $this->db->order_by('FFLGTAX, FPERIOD', 'ASC');
                                        $_queACTMON = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queACTMON->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
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
                                                        } elseif ($_oRow['FFLGTAX'] == 'hstp00') {
                                                            echo 'PPN';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <?php echo $_oRow['FPERIOX']; ?>
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
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNTPNZZ'])) {
                                                        echo substr($_oRow['FNTPNZZ'], 0, 7) . '...';
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
                                                <td align="center" style="white-space: nowrap;  width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FNTTEZZ'])) {
                                                        echo substr($_oRow['FNTTEZZ'], 0, 7) . '...';
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
                                                $_cmpFRECNMB = 'katak_salto';
                                                $_cmpFCODEZZ = 'katak_singit';
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv' ?>" title="<?php
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
        </div>
        <?php
        break;
    case "c00eml" :
        ?>
        <?php
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_hstFRECNMB = $this->uri->segment(6);
        $_hstFCODEZZ = $this->uri->segment(7);
        $_cmpFYEARZZ = $this->uri->segment(9);
        $_cmpFWRKSTA = $this->uri->segment(10);


        if ($this->session->flashdata('true')) {
            ?>
            <?php
            if ($_sesFLNGAGE == 'eng') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Email Dikirimkan</h4>", type: "success", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                echo 'swal.fire({ title: "<h3>Error!</h3>", html: "<h4>Incomplete Fill</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            };
            ?>
        <?php } ?>
        <?php

        break;
    default:
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
        break;
        ?>


    <?php
}
?>
</section>