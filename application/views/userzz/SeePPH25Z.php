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
    switch ($_swiUSR012) {

        case "c25lst" :
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
                                        foreach ($_tblC25LST as $_oRow) {
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
                                                <td class="text-center" style="white-space: nowrap;  width: 15%">
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ ?>" title="<?php
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
        case "c25viw":
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
                    'FFLGTAX = ' => 'hstp25'
                        )
                );
                $this->db->group_by('substring(FPERIOD,1,4)');
                $this->db->order_by('substring(FPERIOD,1,4)');
                $_queP25HST = $this->db->get();

                $_oCnt = $_queP25HST->num_rows();
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        &nbsp;
                        &nbsp;
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25lst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                        </a>

                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/yer'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            <th class="text-center" style="white-space: nowrap; width: 95%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa (Tahun)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
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
                                            'ttaxhst.FFLGTAX = ' => 'hstp25'
                                                )
                                        );
                                        $this->db->group_by('substring(FPERIOD,1,4)');
                                        $this->db->order_by('substring(FPERIOD,1,4)');
                                        $_queP25HST = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queP25HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 95%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <font color="#ff0000"><?php echo $_oRow['XYEARZZ']; ?></font>
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['XYEARZZ'] ?>" title="<?php
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Tambah Periode/Masa PPh 25';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah Periode/Masa PPh 25';
                            } else {
                                echo 'Tambah Periode/Masa PPh 25';
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
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Back';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Kembali';
                        } else {
                            echo 'Kembali';
                        };
                        ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                        </a>

                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Add New PPh 25 Period/Term';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Tambah Periode/Masa PPh 25';
                        } else {
                            echo 'Tambah Periode/Masa PPh 25';
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
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
                                            'ttaxhst.FFLGTAX = ' => 'hstp25'
                                                )
                                        );
                                        $this->db->order_by('FPERIOD', 'asc');
                                        $_queP25HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP25HST->result_array() as $_oRow) {
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
                                                    if (!empty($_oRow['FMSMNML'])) {
                                                        echo number_format($_oRow['FMSMNML']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_cmpFYEARZZ . '/' . $_oRow['FWRKSTA']; ?>" title="<?php
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
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/prdsve/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                        </div>
                                        <div class="row">
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php

            break;
        case "c25smr" :
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

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp25');
            $_queC21SMR = $this->db->get();

            foreach ($_queC21SMR->result_array() as $_oRow) {
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . substr($_oFPERIOD, 0, 4); ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expxl5'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
                            } else {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/sndeml' . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
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
                                                    <th class="text-center" style="white-space: nowrap; width: 98%">Keterangan</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 1%">PPh YMHD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $this->db->select('COUNT(*) AS XCOUNTZ, SUM(FMSMDPJ) AS XPJKDPP, SUM(FDTPZZZ) AS XDTPZZZ, SUM(FMSMNML) AS XPJKNML');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp25',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd'
                                                        )
                                                );
                                                $this->db->order_by('FPROFLE', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                                    $_oXPJKDPP = $_oRow['XPJKDPP'];
                                                    $_oXDTPZZZ = $_oRow['XDTPZZZ'];
                                                    $_oXPJKNML = $_oRow['XPJKNML'];
                                                }

                                                $_updP25HST = array(
                                                    'FMSMDPJ' => $_oXPJKDPP,
                                                    'FDTPZZZ' => $_oXDTPZZZ,
                                                    'FMSMNML' => $_oXPJKNML
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP25HST);

                                                $this->db->select('ttaxhst.*, SUM(FMSMDPJ) as XMSMDPJ, SUM(FDTPZZZ) as XDTPZZZ, SUM(FMSMNML) as XMSMNML, tkjstor.FLABELZ as XLABELZ');
                                                $this->db->from('ttaxhst');
                                                $this->db->join('tkjstor', 'ttaxhst.FKJSZZZ = tkjstor.FKJSCOD', 'LEFT');
                                                $this->db->group_by('ttaxhst.FKJSZZZ');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp25',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd'
                                                        )
                                                );

                                                $this->db->order_by('FKJSZZZ', 'asc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    ?>

                                                    <tr style="color: #000000; background-color: #ffffff">
                                                        <td align="left">
                                                            <?php echo $_oRow['XLABELZ']; ?>
                                                        </td>
                                                        <td align="right">
                                                            <?php
                                                            if (!empty($_oRow['XMSMNML'])) {
                                                                echo number_format($_oRow['XMSMNML']);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                    <td align="center"><strong>(Total)</strong></td>
                                                    <td align="right"><strong><?php
                                                            if (!empty($_oXPJKNML)) {
                                                                echo number_format($_oXPJKNML);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
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

            <div class="well well-sm sk_well_modification0 <?php
            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where(array(
                                'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                'ttaxhst.FFLGTAX = ' => 'hstp25'
                                    )
                            );
                            $this->db->order_by('FPROFLE', 'desc');
                            $_quePROFLE = $this->db->get();

                            $_couPROFLE = $_quePROFLE->num_rows();
                            ?>
                            <a href="<?php
                            if ($_couPROFLE == 0) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/add/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else {
                            }
                            ?>" role="button" class="<?php
                               if ($_couPROFLE == 0) {
                               } else {
                                   echo 'mins-alert-pph25';
                               }
                               ?> btn btn-default btn-flat sk_button_modification" title="<?php
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
                        <div class="col-lg-12">
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0c0; font-size: 16px">Detail/Rincian (PPh 25, hanya ada 1 transaksi setiap periode bulan)</font>
                            <div style="height: 10px;">
                                <br>
                            </div>
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Tanggal</th>
                                            <th class="text-center" style="white-space: nowrap; width: 89%">Nama Lawan Transaksi</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DTP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh YMHD</th>
                                            <th class="text-center" style="white-space: nowrap">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FRECNMB = ' => $_hstFRECNMB
                                                )
                                        );
                                        $_queTAXHST = $this->db->get();

                                        foreach ($_queTAXHST->result_array() as $_oRoa) {
                                            $_aFRECNMB = $_oRoa['FRECNMB'];
                                            $_aFPERIOD = $_oRoa['FPERIOD'];
                                            $_aFWRKSTA = $_oRoa['FWRKSTA'];
                                            $_aFREVISI = $_oRoa['FREVISI'];
                                            if ($_aFREVISI == '-1') {
                                                $_aFREVISI = '0';
                                            } else {
                                                $_aFREVISI = $_aFREVISI;
                                            }
                                        }

                                        $this->db->select('COUNT(*) AS XCOUNTZ, SUM(FMSMDPJ) AS XPJKDPP, SUM(FDTPZZZ) AS XDTPZZZ, SUM(FMSMNML) AS XPJKNML');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                            'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                            'ttaxhst.FFLGTAX = ' => 'hstp25'
                                                )
                                        );
                                        $this->db->order_by('FPROFLE', 'desc');
                                        $_quePROFLE = $this->db->get();

                                        foreach ($_quePROFLE->result_array() as $_oRow) {
                                            $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                            $_oXPJKDPP = $_oRow['XPJKDPP'];
                                            $_oXDTPZZZ = $_oRow['XDTPZZZ'];
                                            $_oXPJKNML = $_oRow['XPJKNML'];
                                        }

                                        $_updP25HST = array(
                                            'FMSMDPJ' => $_oXPJKDPP,
                                            'FDTPZZZ' => $_oXDTPZZZ,
                                            'FMSMNML' => $_oXPJKNML
                                        );

                                        $this->db->where('FRECNMB', $_hstFRECNMB);
                                        $this->db->update('ttaxhst', $_updP25HST);
                                        ?>

                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->where('FTYPEZZ', 'vnd');
                                        $this->db->where('FFLGTAX', 'hstp25');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FINVDTE', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $this->sklibrfnc->_fSETDteInd($_oRow['FINVDTE']);
                                                    $_empFCODEZZ = $_oRow['FPROFLE'];
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 90%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 90%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMDPJ'])) {
                                                        echo number_format($_oRow['FMSMDPJ']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 90%">
                                                    <?php
                                                    if (!empty($_oRow['FDTPZZZ'])) {
                                                        echo number_format($_oRow['FDTPZZZ']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMNML'])) {
                                                        echo number_format($_oRow['FMSMNML']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/viw/' . substr($_aFPERIOD, 0, 4) . '/' . $_aFWRKSTA . '/' . $_aFREVISI . '/' . $_oRow['FRECNMB']; ?>" title="<?php
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
                <div style="height: 2px;">
                    <br>
                </div>
            </div>

            <div class="well well-sm sk_well_modification0 <?php
            if ($_varXPROCES == 'add') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>">
                     <?php
                     $_cmxFYEARZZ = $this->uri->segment(9);
                     $_cmxFWRKSTA = $this->uri->segment(10);
                     ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/sve/' . $_cmxFYEARZZ . '/' . $_cmxFWRKSTA; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">                                        
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;

                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmxFYEARZZ . '/' . $_cmxFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    <div class="col-lg-6">
                                        <input type="text" name="_finFPERIOD" class="form-control hidden" value="<?php echo $_oFPERIOD; ?>">
                                        <input type="text" name="_finFPERIOX" class="form-control hidden" value="<?php echo $_oFPERIOX; ?>">
                                        <input type="text" name="_finFCORREC" class="form-control hidden" value="<?php echo $_oFREVISI; ?>">
                                        <input type="text" name="_finFGROUPS" class="form-control hidden" value="<?php echo $_hstFCODEZZ; ?>">
                                        <div>
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
                                                    ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                </label>
                                                <div class="input-group date">
                                                    <input type="text" name="_finFINVDTE" class="form-control" placeholder="" required oninvalid="<?php
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

                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Reference Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Referensi';
                                                } else {
                                                    echo 'No. Referensi';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFINVNMB" class="form-control" autofocus required oninvalid="<?php
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
                                                    echo 'Company Name';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Lawan Transaksi';
                                                } else {
                                                    echo 'Nama Lawan Transaksi';
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
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Address';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Alamat';
                                                } else {
                                                    echo 'Alamat';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFPJKADR" class="form-control" autofocus required oninvalid="<?php
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
                                                    echo 'NPWP';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'NPWP';
                                                } else {
                                                    echo 'NPWP';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFNPWPZ2" class="form-control" data-masked-input="99.999.999.9-999.999" autofocus required oninvalid="<?php
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
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Description';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Keterangan';
                                                } else {
                                                    echo 'Keterangan';
                                                };
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFPJKDSC" class="form-control" autofocus required oninvalid="<?php
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
                                                    echo 'PPh (Pajak Penghasilan)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'PPh (Pajak Penghasilan)';
                                                } else {
                                                    echo 'PPh (Pajak Penghasilan)';
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFMSMDPJ" class="form-control" autofocus>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                } else {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_finFDTPZZZ" class="form-control" autofocus>
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Kode Jenis Setoran';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Jenis Setoran';
                                                } else {
                                                    echo 'Kode Jenis Setoran';
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="_finFKJSZZZ" id="_finFKJSZZZ"class="form-control" autofocus required>
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-default" style="width: 50px; background: #5bc0de; color: #ffffff" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Lihat Referensi';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Lihat Referensi';
                                                    } else {
                                                        echo 'Lihat Referensi';
                                                    }
                                                    ?>" data-toggle="modal" data-target="#sk_modal_addkjs"><i class="fas fa-search-plus fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" id="_efiFNPWPDC" name="_efiFNPWPDC" style="display: none" onchange="document.getElementById('_edtFNPWPDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PPh 25 Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PPh 25';
                                                } else {
                                                    echo 'Dokumen PPh 25';
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
                                                <input type="text" id="_edtFNPWPDC" name="_edtFNPWPDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo ''; ?>">
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
                </form>
            </div>

            <div class="well well-sm sk_well_modification0 <?php
            if ($_varXPROCES == 'edt') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>"><?php
                     $_oFRECNMB = $_tblC25EDT['0']['FRECNMB'];
                     $_oFINVDTE = $_tblC25EDT['0']['FINVDTE'];
                     $_oFBYRDTE = $_tblC25EDT['0']['FBYRDTE'];
                     $_oFINVNMB = $_tblC25EDT['0']['FINVNMB'];
                     $_oFFULNME = $_tblC25EDT['0']['FFULNME'];
                     $_oFPJKADR = $_tblC25EDT['0']['FPJKADR'];
                     $_oFNPWPZZ = $_tblC25EDT['0']['FNPWPZZ'];
                     $_oFPJKDSC = $_tblC25EDT['0']['FPJKDSC'];
                     $_oFMSMDPJ = $_tblC25EDT['0']['FMSMDPJ'];
                     $_oFDTPZZZ = $_tblC25EDT['0']['FDTPZZZ'];
                     $_oFMSMTRF = $_tblC25EDT['0']['FMSMTRF'];
                     $_oFPJKDOC = $_tblC25EDT['0']['FPJKDOC'];
                     $_oFMSMNML = $_tblC25EDT['0']['FMSMNML'];
                     $_oFKJSZZZ = $_tblC25EDT['0']['FKJSZZZ'];

                     $this->db->select('*');
                     $this->db->from('ttaxhst');
                     $this->db->where('FRECNMB', $_hstFRECNMB);

                     $_quePROFLE = $this->db->get();

                     foreach ($_quePROFLE->result_array() as $_oRox) {

                         $_xFPERIOD = $_oRox['FPERIOD'];
                         $_xFWRKSTA = $_oRox['FWRKSTA'];
                         $_xFREVISI = $_oRox['FREVISI'];

                         if ($_xFREVISI == '-1') {
                             $_xFREVISI = '0';
                         } else {
                             $_xFREVISI = $_xFREVISI;
                         }
                     }
                     ?>
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/upd/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA . '/' . $_xFREVISI . '/' . $_oFRECNMB;
             ;
                     ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/viw/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA . '/' . $_xFREVISI . '/' . $_oFRECNMB;
              ;
                     ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    <div class="col-lg-6">
                                        <input type="text" name="_finFPERIOD" class="form-control hidden" value="<?php echo $_oFPERIOD; ?>">
                                        <input type="text" name="_finFPERIOX" class="form-control hidden" value="<?php echo $_oFPERIOX; ?>">
                                        <input type="text" name="_finFCORREC" class="form-control hidden" value="<?php echo $_oFREVISI; ?>">
                                        <input type="text" name="_finFGROUPS" class="form-control hidden" value="<?php echo $_hstFCODEZZ; ?>">
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
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group date">
                                                <input type="text" name="_edtFINVDTE" class="form-control" placeholder="" required value="<?php
                                                if (!empty($_oFINVDTE)) {
                                                    echo $this->sklibrfnc->_fSETDteInd($_oFINVDTE);
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
                                                    echo 'Reference Nmb.';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'No. Referensi';
                                                } else {
                                                    echo 'No. Referensi';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFINVNMB" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFINVNMB)) {
                                                echo $_oFINVNMB;
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
                                                    echo 'Nama Lawan Transaksi';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Nama Lawan Transaksi';
                                                } else {
                                                    echo 'Nama Lawan Transaksi';
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFFULNME" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFFULNME)) {
                                                echo $_oFFULNME;
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
                                                    echo 'Address';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Alamat';
                                                } else {
                                                    echo 'Alamat';
                                                }
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFPJKADR" class="form-control" autofocus required value="<?php
                                            if (!empty($_oFPJKADR)) {
                                                echo $_oFPJKADR;
                                            } else {
                                                echo '';
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
                                                }
                                                ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFNPWPZ2" class="form-control" data-masked-input="99.999.999.9-999.999" autofocus required value="<?php
                                            if (!empty($_oFNPWPZZ)) {
                                                $_xFNPWPZZ = explode(';', $_oFNPWPZZ);
                                                $_oFNPWPZZ = $_xFNPWPZZ[1];
                                                echo substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
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

                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Description';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Keterangan';
                                                } else {
                                                    echo 'Keterangan';
                                                };
                                                ?>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFPJKDSC" class="form-control" autofocus value="<?php
                                            if (!empty($_oFPJKDSC)) {
                                                echo $_oFPJKDSC;
                                            } else {
                                                echo '';
                                            }
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PPh (Pajak Penghasilan)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'PPh (Pajak Penghasilan)';
                                                } else {
                                                    echo 'PPh (Pajak Penghasilan)';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFMSMDPJ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFMSMDPJ)) {
                                                echo number_format($_oFMSMDPJ);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                } else {
                                                    echo 'DTP (Ditanggung Pemerintah)';
                                                }
                                                ?>
                                                <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                            </label>
                                            <input type="text" name="_edtFDTPZZZ" class="form-control" autofocus value="<?php
                                            if (!empty($_oFDTPZZZ)) {
                                                echo number_format($_oFDTPZZZ);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>">
                                        </div>
                                        <div>
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'Kode Jenis Setoran';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Kode Jenis Setoran';
                                                } else {
                                                    echo 'Kode Jenis Setoran';
                                                }
                                                ?>&nbsp;:
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="_edtFKJSZZZ" id="_edtFKJSZZZ"class="form-control" autofocus value="<?php
                                                if (!empty($_oFKJSZZZ)) {
                                                    echo $_oFKJSZZZ;
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
                                                    ?>" data-toggle="modal" data-target="#sk_modal_edtkjs"><i class="fas fa-search-plus fa-fw fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" id="_efiFNPWPDC" name="_efiFNPWPDC" style="display: none" onchange="document.getElementById('_edtFNPWPDC').value = this.value" accept="image/gif,image/jpg,image/png,image/jpeg,image/bmp">
                                            <label class="sk_label_modification">
                                                <?php
                                                if ($_sesFLNGAGE == 'eng') {
                                                    echo 'PPh 25 Document';
                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                    echo 'Dokumen PPh 25';
                                                } else {
                                                    echo 'Dokumen PPh 25';
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
                                                <input type="text" id="_edtFNPWPDC" name="_edtFNPWPDC" class="form-control" style="background-color: #ffffff" placeholder="" readonly value="<?php echo $_oFPJKDOC; ?>">
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
                </form>
            </div>

            <div class="well well-sm sk_well_modification0 <?php
            if ($_varXPROCES == 'viw') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>"><?php
                     $_oFRECNMB = $_tblC25VIW['0']['FRECNMB'];

                     $_oFINVDTE = $_tblC25VIW['0']['FINVDTE'];
                     $_oFBYRDTE = $_tblC25VIW['0']['FBYRDTE'];
                     $_oFINVNMB = $_tblC25VIW['0']['FINVNMB'];
                     $_oFFULNME = $_tblC25VIW['0']['FFULNME'];
                     $_oFPJKADR = $_tblC25VIW['0']['FPJKADR'];
                     $_oFNPWPZZ = $_tblC25VIW['0']['FNPWPZZ'];
                     $_oFPJKDSC = $_tblC25VIW['0']['FPJKDSC'];
                     $_oFMSMDPJ = $_tblC25VIW['0']['FMSMDPJ'];
                     $_oFDTPZZZ = $_tblC25VIW['0']['FDTPZZZ'];
                     $_oFMSMTRF = $_tblC25VIW['0']['FMSMTRF'];
                     $_oFPJKDOC = $_tblC25VIW['0']['FPJKDOC'];
                     $_oFMSMNML = $_tblC25VIW['0']['FMSMNML'];
                     $_oFKJSZZZ = $_tblC25VIW['0']['FKJSZZZ'];


                     $this->db->select('*');
                     $this->db->from('ttaxhst');
                     $this->db->where('FRECNMB', $_hstFRECNMB);

                     $_quePROFLE = $this->db->get();

                     foreach ($_quePROFLE->result_array() as $_oRox) {

                         $_xFPERIOD = $_oRox['FPERIOD'];
                         $_xFWRKSTA = $_oRox['FWRKSTA'];
                         $_xFREVISI = $_oRox['FREVISI'];

                         if ($_xFREVISI == '-1') {
                             $_xFREVISI = '0';
                         } else {
                             $_xFREVISI = $_xFREVISI;
                         }
                     }
                     ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA . '/' . $_xFREVISI; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/edt/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA . '/' . $_xFREVISI . '/' . $_oFRECNMB; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/del/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA . '/' . $_xFREVISI . '/' . $_oFRECNMB; ?>" role="button" class="btn btn-default btn-flat sk_button_modification <?php
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
                               ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px"> <i class="far fa-trash-alt fa-lg"></i></font>
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
                                <div class="col-lg-6">
                                    <input type="text" name="_finFPERIOD" class="form-control hidden" value="<?php echo $_oFPERIOD; ?>">
                                    <input type="text" name="_finFPERIOX" class="form-control hidden" value="<?php echo $_oFPERIOX; ?>">
                                    <input type="text" name="_finFCORREC" class="form-control hidden" value="<?php echo $_oFREVISI; ?>">
                                    <input type="text" name="_finFGROUPS" class="form-control hidden" value="<?php echo $_hstFCODEZZ; ?>">
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
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFINVDTE" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFINVDTE)) {
                                            echo $this->sklibrfnc->_fSETDteInd($_oFINVDTE);
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Reference Nmb.';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'No. Referensi';
                                            } else {
                                                echo 'No. Referensi';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFINVNMB" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFINVNMB)) {
                                            echo $_oFINVNMB;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Nama Lawan Transaksi';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Nama Lawan Transaksi';
                                            } else {
                                                echo 'Nama Lawan Transaksi';
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
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Address';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Alamat';
                                            } else {
                                                echo 'Alamat';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPJKADR" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFPJKADR)) {
                                            echo $_oFPJKADR;
                                        } else {
                                            echo '...';
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
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFNPWPZ2" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFNPWPZZ)) {
                                            $_xFNPWPZZ = explode(';', $_oFNPWPZZ);
                                            $_oFNPWPZZ = $_xFNPWPZZ[1];
                                            echo substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
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
                                                echo 'Description';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Keterangan';
                                            } else {
                                                echo 'Keterangan';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPJKDSC" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFPJKDSC)) {
                                            echo $_oFPJKDSC;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'PPh (Pajak Penghasilan)';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'PPh (Pajak Penghasilan)';
                                            } else {
                                                echo 'PPh (Pajak Penghasilan)';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFMSMDPJ" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFMSMNML)) {
                                            echo number_format($_oFMSMDPJ);
                                        } else {
                                            echo number_format('0');
                                        };
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'DTP (Ditanggung Pemerintah)';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'DTP (Ditanggung Pemerintah)';
                                            } else {
                                                echo 'DTP (Ditanggung Pemerintah)';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFDTPZZZ" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFDTPZZZ)) {
                                            echo number_format($_oFDTPZZZ);
                                        } else {
                                            echo number_format('0');
                                        };
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Kode Jenis Setoran';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kode Jenis Setoran';
                                            } else {
                                                echo 'Kode Jenis Setoran';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFKJSZZZ" class="form-control" autofocus readonly value="<?php
                                        if (!empty($_oFKJSZZZ)) {
                                            echo $_oFKJSZZZ;
                                        } else {
                                            echo '...';
                                        };
                                        ?>">
                                    </div>
                                    <div>
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'PPh 25 Document';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Dokumen PPh 25';
                                            } else {
                                                echo 'Dokumen PPh 25';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a href="#_objMDLDOC" role="button" id="<?php echo $_oFPJKDOC; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                            <input type="text" name="_viwFPJKDOC" class="form-control" autofocus readonly value="<?php
                                            if (!empty($_oFPJKDOC)) {
                                                echo $_oFPJKDOC;
                                            } else {
                                                echo '...';
                                            }
                                            ;
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="hidden">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Status';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Status';
                                            } else {
                                                echo 'Status';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_finFP22STA" class="form-control" autofocus readonly oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please fill out this field')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                        } else {
                                            echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                        };
                                        ?>" oninput="setCustomValidity('')" value="<?php echo 'Potong'; ?>">
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
        case "c252st" :
            ?>
            <?php
            $_cmpFRECNMB = $this->session->FRECNMB;
            $_cmpFCODEZZ = $this->session->FCODEZZ;
            ?>
            <div class="well well-sm sk_well_modification0">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div class="sk_table_modification2 table-responsive">
                                <table id = "_objINApphviw" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Pembetulan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DPP (Dasar Pengenaan Pajak)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
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
                                            'ttaxhst.FFLGTAX = ' => 'hstp25'
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
                                                    if (!empty($_oRow['FMSMDPJ'])) {
                                                        echo number_format($_oRow['FMSMDPJ']);
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
                                                    <?php
                                                    if ($_oRow['FREVISI'] == '-1') {
                                                        $_oXREVISI = '0';
                                                    } else {
                                                        $_oXREVISI = $_oRow['FREVISI'];
                                                    }
                                                    ?>
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c252mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . substr($_oRow['FPERIOD'], 0, 4) . '/' . $_oRow['FWRKSTA'] . '/' . $_oXREVISI; ?>" title="<?php
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
        case "c252mr" :
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

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp25');
            $_queC21SMR = $this->db->get();

            foreach ($_queC21SMR->result_array() as $_oRow) {
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c252st'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expxl5'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
                            } else {
                                echo 'Download (Unduh) Laporan PPh 25 (Terutang)';
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
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR012/c252pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR012/c252pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
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
                                ?>; font-size: 17px"><i class="far fa-check-circle fa-lg"></i></font>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
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
                                                    <th class="text-center" style="white-space: nowrap; width: 98%">Keterangan</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 1%">DTP</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 1%">PPh YMHD</th>
                                                    <th class="text-center" style="white-space: nowrap; width: 1%">Kode Jenis Setoran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $this->db->select('COUNT(*) AS XCOUNTZ, SUM(FMSMDPJ) AS XPJKDPP, SUM(FDTPZZZ) AS XDTPZZZ, SUM(FMSMNML) AS XPJKNML');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp25',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd'
                                                        )
                                                );
                                                $this->db->order_by('FPROFLE', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                                    $_oXPJKDPP = $_oRow['XPJKDPP'];
                                                    $_oXDTPZZZ = $_oRow['XDTPZZZ'];
                                                    $_oXPJKNML = $_oRow['XPJKNML'];
                                                }

                                                $_updP25HST = array(
                                                    'FMSMDPJ' => $_oXPJKDPP,
                                                    'FDTPZZZ' => $_oXDTPZZZ,
                                                    'FMSMNML' => $_oXPJKNML
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP25HST);

                                                $this->db->select('ttaxhst.*, SUM(FMSMDPJ) as XMSMDPJ, SUM(FDTPZZZ) as XDTPZZZ, SUM(FMSMNML) as XMSMNML, tkjstor.FLABELZ as XLABELZ');
                                                $this->db->from('ttaxhst');
                                                $this->db->join('tkjstor', 'ttaxhst.FKJSZZZ = tkjstor.FKJSCOD', 'LEFT');
                                                $this->db->group_by('ttaxhst.FKJSZZZ');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp25',
                                                    'ttaxhst.FTYPEZZ = ' => 'vnd'
                                                        )
                                                );

                                                $this->db->order_by('FKJSZZZ', 'asc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    ?>

                                                    <tr style="color: #000000; background-color: #ffffff">
                                                        <td align="left">
                                                            <?php echo $_oRow['XLABELZ']; ?>
                                                        </td>
                                                        <td align="right">
                                                            <?php
                                                            if (!empty($_oRow['XMSMDPJ'])) {
                                                                echo number_format($_oRow['XMSMDPJ']);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?>
                                                        </td>
                                                        <td align="right">
                                                            <?php
                                                            if (!empty($_oRow['XDTPZZZ'])) {
                                                                echo number_format($_oRow['XDTPZZZ']);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?>
                                                        </td>
                                                        <td align="right">
                                                            <?php
                                                            if (!empty($_oRow['XMSMNML'])) {
                                                                echo number_format($_oRow['XMSMNML']);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php
                                                            if (!empty($_oRow['FKJSZZZ'])) {
                                                                echo $_oRow['FKJSZZZ'];
                                                            } else {
                                                                echo '...';
                                                            };
                                                            ?>
                                                        </td>
                                                    </tr>
        <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                    <td align="center"><strong>(Total)</strong></td>
                                                    <td align="right"><strong><?php
                                                            if (!empty($_oXPJKDPP)) {
                                                                echo number_format($_oXPJKDPP);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td align="right"><strong><?php
                                                            if (!empty($_oXDTPZZZ)) {
                                                                echo number_format($_oXDTPZZZ);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td align="right"><strong><?php
                                                            if (!empty($_oXPJKNML)) {
                                                                echo number_format($_oXPJKNML);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
            
            <div class="well well-sm sk_well_modification0 <?php
            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where(array(
                                'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                'ttaxhst.FFLGTAX = ' => 'hstp25'
                                    )
                            );
                            $this->db->order_by('FPROFLE', 'desc');
                            $_quePROFLE = $this->db->get();

                            $_couPROFLE = $_quePROFLE->num_rows();
                            ?>
                            <a href="<?php
                            if ($_couPROFLE == 0) {
                                echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/add/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                            } else {
                            }
                            ?>" role="button" class="<?php
                               if ($_couPROFLE == 0) {
                               } else {
                                   echo 'mins-alert-pph25';
                               }
                               ?> btn btn-default btn-flat sk_button_modification" title="<?php
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
                        <div class="col-lg-12">
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0c0; font-size: 16px">Detail/Rincian (PPh 25, hanya ada 1 transaksi setiap periode bulan)</font>
                            <div style="height: 10px;">
                                <br>
                            </div>
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Tanggal</th>
                                            <th class="text-center" style="white-space: nowrap; width: 89%">Nama Lawan Transaksi</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">DTP</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh YMHD</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FRECNMB = ' => $_hstFRECNMB
                                                )
                                        );
                                        $_queTAXHST = $this->db->get();

                                        foreach ($_queTAXHST->result_array() as $_oRoa) {
                                            $_aFRECNMB = $_oRoa['FRECNMB'];
                                            $_aFPERIOD = $_oRoa['FPERIOD'];
                                            $_aFWRKSTA = $_oRoa['FWRKSTA'];
                                            $_aFREVISI = $_oRoa['FREVISI'];
                                            if ($_aFREVISI == '-1') {
                                                $_aFREVISI = '0';
                                            } else {
                                                $_aFREVISI = $_aFREVISI;
                                            }
                                        }

                                        $this->db->select('COUNT(*) AS XCOUNTZ, SUM(FMSMDPJ) AS XPJKDPP, SUM(FDTPZZZ) AS XDTPZZZ, SUM(FMSMNML) AS XPJKNML');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                            'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                            'ttaxhst.FFLGTAX = ' => 'hstp25'
                                                )
                                        );
                                        $this->db->order_by('FPROFLE', 'desc');
                                        $_quePROFLE = $this->db->get();

                                        foreach ($_quePROFLE->result_array() as $_oRow) {
                                            $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                            $_oXPJKDPP = $_oRow['XPJKDPP'];
                                            $_oXDTPZZZ = $_oRow['XDTPZZZ'];
                                            $_oXPJKNML = $_oRow['XPJKNML'];
                                        }

                                        $_updP25HST = array(
                                            'FMSMDPJ' => $_oXPJKDPP,
                                            'FDTPZZZ' => $_oXDTPZZZ,
                                            'FMSMNML' => $_oXPJKNML
                                        );

                                        $this->db->where('FRECNMB', $_hstFRECNMB);
                                        $this->db->update('ttaxhst', $_updP25HST);
                                        ?>

                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->where('FTYPEZZ', 'vnd');
                                        $this->db->where('FFLGTAX', 'hstp25');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FINVDTE', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    echo $this->sklibrfnc->_fSETDteInd($_oRow['FINVDTE']);
                                                    $_empFCODEZZ = $_oRow['FPROFLE'];
                                                    ?>
                                                </td>
                                                <td align="left" style="white-space: nowrap; width: 90%">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 90%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMDPJ'])) {
                                                        echo number_format($_oRow['FMSMDPJ']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 90%">
                                                    <?php
                                                    if (!empty($_oRow['FDTPZZZ'])) {
                                                        echo number_format($_oRow['FDTPZZZ']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td align="right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FMSMNML'])) {
                                                        echo number_format($_oRow['FMSMNML']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
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
                <div style="height: 2px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "h252st";
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
                                        $this->db->where('FFLGTAX', 'hstp25');
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
            <?php
            break;
        case "c25eml" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Email Dikirimkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                        <div style="height: 20px;">
                            <br>
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