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
    switch ($_swiUSR008) {
        case "c21lst" :
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
                                        foreach ($_tblC21LST as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="white-space: nowrap;  width: 10%">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap;  width: 50%">
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
                                                
                                                <td class="text-center" style="white-space: nowrap;  width: 15%">
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ ?>" title="<?php
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
        case "c21viw":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_cmpFYEARZZ = $this->uri->segment(6);
            $_cmpFTAHUNZ = $this->uri->segment(7);
            $_empFRECNMB = $this->uri->segment(8);
            $_empFCODEZZ = $this->uri->segment(9);
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
                    'FFLGTAX = ' => 'hstp21'
                        )
                );
                $this->db->group_by('substring(FPERIOD,1,4)');
                $this->db->order_by('substring(FPERIOD,1,4)');
                $_queP21HST = $this->db->get();

                $_oCnt = $_queP21HST->num_rows();
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a hidden href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21lst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>


                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/yer'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                </div>
                <hr class="sk_hr_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 0px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary/Ringkasan (Tahun)</font>
                            <div style="height: 5px;">
                                <br>
                            </div>
                            <div class="sk_table_modification2 table-responsive">
                                <table id="_objINAcXXvit"  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa (Tahun)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Total Penghasilan Bruto</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh 21 KB (LB)</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>





                                        <?php
                                        $this->db->select('FFULNME, substr(FPERIOD,1,4) as XYEARZZ, sum(round(FBRUTO2,0)) as XBRTO12, sum(round(FPJKKBY,0)) as XPJKKBY');
                                        $this->db->from('ttaxhst');
                                        $this->db->where(array(
                                            'FPROFLE = ' => $_cmpFCODEZZ,
                                            'FTYPEZZ = ' => 'cmp',
                                            'FFLGTAX = ' => 'hstp21'
                                                )
                                        );
                                        $this->db->group_by('substring(FPERIOD,1,4)');
                                        $this->db->order_by('substring(FPERIOD,1,4)');
                                        $_queP21HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP21HST->result_array() as $_oRow) {
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
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['XBRTO12'])) {
                                                        echo number_format($_oRow['XBRTO12']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['XPJKKBY'])) {
                                                        echo number_format($_oRow['XPJKKBY']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" style="white-space: nowrap; width: 1%">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['XYEARZZ']; ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Monthly Summary';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Summary Bulanan';
                                                    } else {
                                                        echo 'Summary Bulanan';
                                                    };
                                                    ?>"><font color="#ff0000"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                    </a>
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sumdet/' . $_oRow['XYEARZZ']; ?>" title="<?php
                                                    if ($_sesFLNGAGE == 'eng') {
                                                        echo 'Yearly Summary Detail';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo 'Summary Detail Tahunan';
                                                    } else {
                                                        echo 'Summary Detail Tahunan';
                                                    };
                                                    ?>"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Tambah Periode/Masa PPh 21';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah Periode/Masa PPh 21';
                            } else {
                                echo 'Tambah Periode/Masa PPh 21';
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh 21 KB (LB)</th>
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
                                            'FFLGTAX = ' => 'hstp21',
                                            'substring(FPERIOD,1,4) = ' => $_cmpFYEARZZ
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_cmpFYEARZZ; ?>" title="<?php
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
            if ((empty($_cmpFYEARZZ)) || ($_cmpFYEARZZ == 'sumdet') || ($_cmpFYEARZZ == 'sumde2') || ($_cmpFYEARZZ == 'yer')) {
                echo 'hidden';
            } else {
                
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/prdadd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Tambah Periode/Masa PPh 21';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah Periode/Masa PPh 21';
                            } else {
                                echo 'Tambah Periode/Masa PPh 21';
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
                                <table id="_objINAcXXvib" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">No.</th>
                                            <th class="text-center" style="white-space: nowrap; width: 94%">Nama Perusahaan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode/Masa</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Pembetulan</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Total Penghasilan Bruto</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh 21 KB (LB)</th>
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
                                            'FFLGTAX = ' => 'hstp21',
                                            'substring(FPERIOD,1,4) = ' => $_cmpFYEARZZ
                                                )
                                        );
                                        $this->db->order_by('FPERIOD', 'asc');
                                        $_queP21HST = $this->db->get();


                                        $_oSeq = 0;
                                        foreach ($_queP21HST->result_array() as $_oRow) {
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
                                                    if (!empty($_oRow['FBRUTO2'])) {
                                                        echo number_format($_oRow['FBRUTO2']);
                                                    } else {
                                                        echo number_format('0');
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FPJKKBY'])) {
                                                        echo number_format($_oRow['FPJKKBY']);
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_cmpFYEARZZ . '/' . $_oRow['FWRKSTA'] . '/' . $_oXREVISI; ?>" title="<?php
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
            if ($_cmpFYEARZZ !== 'sumdet') {
                echo 'hidden';
            } else {
                
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary Detail (Periode 1 Tahun)</font>
                            <div style="height: 5px;">
                                <br>
                            </div>

                            <div class="sk_table_modification2 table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">No.</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Nama Pegawai</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle; white-space: nowrap; cursor: pointer" title="NOMOR POKOK WAJIB PAJAK">NPWP*</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle; white-space: nowrap; cursor: pointer" title="STATUS KAWIN/TANGGUNGAN">SK/T*</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle; white-space: nowrap; cursor: pointer" title="MULAI KERJA">MK*<br>(Bulan)</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle; white-space: nowrap; cursor: pointer" title="BERHENTI KERJA">BK*<br>(Bulan)</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">(JAN-DES)</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">JAN</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">FEB</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">MRT</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">APR</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">MEI</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">JUN</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">JUL</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">AGS</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">SEP</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">OKT</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">NOV</th>
                                            <th colspan="8" class="text-center" style="color: #ffffff; background-color: #000080">DES</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">#</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>
                                            
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>
                                       
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21">NA*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="color: #ffffff; background-color: #000080; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $_oYea = $_cmpFTAHUNZ;

                                        $_oS01 = "select *, (XGPZJAN + XGPZFEB + XGPZMRT + XGPZAPR + XGPZMEI + XGPZJUN + XGPZJUL + XGPZAGS + XGPZSEP + XGPZOKT + XGPZNOV + XGPZDES) as XGPZALL, ";
                                        $_oS02 = "(XTPZJAN + XTPZFEB + XTPZMRT + XTPZAPR + XTPZMEI + XTPZJUN + XTPZJUL + XTPZAGS + XTPZSEP + XTPZOKT + XTPZNOV + XTPZDES) as XTPZALL, ";
                                        $_oS03 = "(XTLZJAN + XTLZFEB + XTLZMRT + XTLZAPR + XTLZMEI + XTLZJUN + XTLZJUL + XTLZAGS + XTLZSEP + XTLZOKT + XTLZNOV + XTLZDES) as XTLZALL, ";
                                        $_oS04 = "(XHIZJAN + XHIZFEB + XHIZMRT + XHIZAPR + XHIZMEI + XHIZJUN + XHIZJUL + XHIZAGS + XHIZSEP + XHIZOKT + XHIZNOV + XHIZDES) as XHIZALL, ";
                                        $_oS05 = "(XPAZJAN + XPAZFEB + XPAZMRT + XPAZAPR + XPAZMEI + XPAZJUN + XPAZJUL + XPAZAGS + XPAZSEP + XPAZOKT + XPAZNOV + XPAZDES) as XPAZALL, ";
                                        $a = "(XNAZJAN + XNAZFEB + XNAZMRT + XNAZAPR + XNAZMEI + XNAZJUN + XNAZJUL + XNAZAGS + XNAZSEP + XNAZOKT + XNAZNOV + XNAZDES) as XNAZALL, ";
                                        $b = "(XTBZJAN + XTBZFEB + XTBZMRT + XTBZAPR + XTBZMEI + XTBZJUN + XTBZJUL + XTBZAGS + XTBZSEP + XTBZOKT + XTBZNOV + XTBZDES) as XTBZALL, ";
                                        $c = "(XPBZJAN + XPBZFEB + XPBZMRT + XPBZAPR + XPBZMEI + XPBZJUN + XPBZJUL + XPBZAGS + XPBZSEP + XPBZOKT + XPBZNOV + XPBZDES) as XPBZALL ";
                                        $d = "";
                                        $_oS06 = "from( select *,  sum(if(FPERIOD='" . $_oYea . "01',FINCR01,0)) as XGPZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR01,0)) as XGPZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR01,0)) as XGPZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR01,0)) as XGPZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR01,0)) as XGPZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR01,0)) as XGPZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR01,0)) as XGPZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR01,0)) as XGPZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR01,0)) as XGPZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR01,0)) as XGPZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR01,0)) as XGPZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR01,0)) as XGPZDES, ";
                                        $_oS07 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR02,0)) as XTPZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR02,0)) as XTPZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR02,0)) as XTPZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR02,0)) as XTPZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR02,0)) as XTPZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR02,0)) as XTPZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR02,0)) as XTPZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR02,0)) as XTPZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR02,0)) as XTPZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR02,0)) as XTPZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR02,0)) as XTPZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR02,0)) as XTPZDES, ";
                                        $_oS08 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR03,0)) as XTLZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR03,0)) as XTLZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR03,0)) as XTLZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR03,0)) as XTLZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR03,0)) as XTLZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR03,0)) as XTLZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR03,0)) as XTLZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR03,0)) as XTLZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR03,0)) as XTLZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR03,0)) as XTLZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR03,0)) as XTLZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR03,0)) as XTLZDES, ";
                                        $_oS09 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR04,0)) as XHIZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR04,0)) as XHIZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR04,0)) as XHIZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR04,0)) as XHIZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR04,0)) as XHIZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR04,0)) as XHIZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR04,0)) as XHIZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR04,0)) as XHIZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR04,0)) as XHIZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR04,0)) as XHIZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR04,0)) as XHIZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR04,0)) as XHIZDES, ";
                                        $_oS10 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR05,0)) as XPAZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR05,0)) as XPAZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR05,0)) as XPAZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR05,0)) as XPAZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR05,0)) as XPAZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR05,0)) as XPAZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR05,0)) as XPAZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR05,0)) as XPAZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR05,0)) as XPAZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR05,0)) as XPAZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR05,0)) as XPAZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR05,0)) as XPAZDES, ";
                                        $e = "sum(if(FPERIOD='" . $_oYea . "01',FINCR06,0)) as XNAZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR06,0)) as XNAZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR06,0)) as XNAZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR06,0)) as XNAZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR06,0)) as XNAZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR06,0)) as XNAZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR06,0)) as XNAZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR06,0)) as XNAZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR06,0)) as XNAZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR06,0)) as XNAZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR06,0)) as XNAZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR06,0)) as XNAZDES, ";
                                        $f = "sum(if(FPERIOD='" . $_oYea . "01',FINCR07,0)) as XTBZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR07,0)) as XTBZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR07,0)) as XTBZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR07,0)) as XTBZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR07,0)) as XTBZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR07,0)) as XTBZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR07,0)) as XTBZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR07,0)) as XTBZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR07,0)) as XTBZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR07,0)) as XTBZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR07,0)) as XTBZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR07,0)) as XTBZDES, ";
                                        $g = "sum(if(FPERIOD='" . $_oYea . "01',FBRUTO2,0)) as XPBZJAN, sum(if(FPERIOD='" . $_oYea . "02',FBRUTO2,0)) as XPBZFEB, sum(if(FPERIOD='" . $_oYea . "03',FBRUTO2,0)) as XPBZMRT, sum(if(FPERIOD='" . $_oYea . "04',FBRUTO2,0)) as XPBZAPR, sum(if(FPERIOD='" . $_oYea . "05',FBRUTO2,0)) as XPBZMEI, sum(if(FPERIOD='" . $_oYea . "06',FBRUTO2,0)) as XPBZJUN, sum(if(FPERIOD='" . $_oYea . "07',FBRUTO2,0)) as XPBZJUL, sum(if(FPERIOD='" . $_oYea . "08',FBRUTO2,0)) as XPBZAGS, sum(if(FPERIOD='" . $_oYea . "09',FBRUTO2,0)) as XPBZSEP, sum(if(FPERIOD='" . $_oYea . "10',FBRUTO2,0)) as XPBZOKT, sum(if(FPERIOD='" . $_oYea . "11',FBRUTO2,0)) as XPBZNOV, sum(if(FPERIOD='" . $_oYea . "12',FBRUTO2,0)) as XPBZDES ";
                                        $h = "";
                                        $_oS11 = "from ttaxhst where FGROUPS='" . $_cmpFCODEZZ . "' and FTYPEZZ = 'emp' or FTYPEZZ = 'emx' and FFLGTAX = 'hstp21' group by FPROFLE) as XTABLEZ";

                                        $_oSql = $_oS01 . $_oS02 . $_oS03 . $_oS04 . $_oS05 . $a . $b . $c . $d . $_oS06 . $_oS07 . $_oS08 . $_oS09 . $_oS10 . $e . $f . $g . $h . $_oS11;

                                        $_queP21HST = $this->db->query($_oSql);

                                        $_oSeq = 0;
                                        foreach ($_queP21HST->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>
                                            <tr>
                                                <td class="text-center" style="background-color: #e5e6e5">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td class="text-left" style="background-color: #e5e6e5">
                                                    <?php echo $_oRow['FFULNME']; ?>
                                                </td>
                                                <td class="text-left">
                                                    <?php
                                                    $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                                                    $_yFNPWPZZ = explode(';', $_xFNPWPZZ);
                                                    $_zFNPWPZZ = $_yFNPWPZZ[1];

                                                    if ((strlen($_zFNPWPZZ) > 0) && (strlen($_zFNPWPZZ) <= 25)) {
                                                        echo substr($_zFNPWPZZ, 0, 2) . '.' . substr($_zFNPWPZZ, 2, 3) . '.' . substr($_zFNPWPZZ, 5, 3) . '.' . substr($_zFNPWPZZ, 8, 1) . '-' . substr($_zFNPWPZZ, 9, 3) . '.' . substr($_zFNPWPZZ, 12, 3);
                                                    } elseif ((strlen($_zFNPWPZZ) > 0) && (strlen($_zFNPWPZZ) > 25)) {
                                                        echo substr($_zFNPWPZZ, 0, 2) . '.' . substr($_zFNPWPZZ, 2, 3) . '.' . substr($_zFNPWPZZ, 5, 3) . '.' . substr($_zFNPWPZZ, 8, 1) . '-' . substr($_zFNPWPZZ, 9, 3) . '.' . substr($_zFNPWPZZ, 12, 3) . '<font style="color: #ff0000">...</font>';
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-left">
                                                    <?php
                                                    $_xFMARITL = $_oRow['FMARITL'];
                                                    $_yFMARITL = explode(';', $_xFMARITL);
                                                    echo$_yFMARITL[1];
                                                    ?>
                                                </td>
                                                <td class="text-left">
                                                    <?php
                                                    if ((!empty($_oRow['FSTADTE'])) && (strlen(trim($_oRow['FSTADTE'])) == 8)) {
                                                        echo substr($_oRow['FSTADTE'], 4, 2);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-left">
                                                    <?php
                                                    if ((!empty($_oRow['FENDDTE'])) && (strlen(trim($_oRow['FENDDTE'])) == 8)) {
                                                        echo substr($_oRow['FENDDTE'], 4, 2);
                                                    } else {
                                                        echo '...';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZALL'])) && ($_oRow['XGPZALL'] !== 0)) {
                                                        echo number_format($_oRow['XGPZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZALL'])) && ($_oRow['XTPZALL'] !== 0)) {
                                                        echo number_format($_oRow['XTPZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZALL'])) && ($_oRow['XTLZALL'] !== 0)) {
                                                        echo number_format($_oRow['XTLZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZALL'])) && ($_oRow['XHIZALL'] !== 0)) {
                                                        echo number_format($_oRow['XHIZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZALL'])) && ($_oRow['XPAZALL'] !== 0)) {
                                                        echo number_format($_oRow['XPAZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZALL'])) && ($_oRow['XNAZALL'] !== 0)) {
                                                        echo number_format($_oRow['XNAZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZALL'])) && ($_oRow['XTBZALL'] !== 0)) {
                                                        echo number_format($_oRow['XTBZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZALL'])) && ($_oRow['XPBZALL'] !== 0)) {
                                                        echo number_format($_oRow['XPBZALL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZJAN'])) && ($_oRow['XGPZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XGPZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZJAN'])) && ($_oRow['XTPZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XTPZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZJAN'])) && ($_oRow['XTLZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XTLZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZJAN'])) && ($_oRow['XHIZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XHIZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZJAN'])) && ($_oRow['XPAZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XPAZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZJAN'])) && ($_oRow['XNAZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XNAZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZJAN'])) && ($_oRow['XTBZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XTBZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZJAN'])) && ($_oRow['XPBZJAN'] !== 0)) {
                                                        echo number_format($_oRow['XPBZJAN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZFEB'])) && ($_oRow['XGPZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XGPZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZFEB'])) && ($_oRow['XTPZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XTPZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZFEB'])) && ($_oRow['XTLZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XTLZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZFEB'])) && ($_oRow['XHIZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XHIZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZFEB'])) && ($_oRow['XPAZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XPAZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZFEB'])) && ($_oRow['XNAZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XNAZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZFEB'])) && ($_oRow['XTBZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XTBZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZFEB'])) && ($_oRow['XPBZFEB'] !== 0)) {
                                                        echo number_format($_oRow['XPBZFEB']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZMRT'])) && ($_oRow['XGPZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XGPZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZMRT'])) && ($_oRow['XTPZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XTPZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZMRT'])) && ($_oRow['XTLZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XTLZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZMRT'])) && ($_oRow['XHIZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XHIZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZMRT'])) && ($_oRow['XPAZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XPAZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZMRT'])) && ($_oRow['XNAZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XNAZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZMRT'])) && ($_oRow['XTBZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XTBZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZMRT'])) && ($_oRow['XPBZMRT'] !== 0)) {
                                                        echo number_format($_oRow['XPBZMRT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZAPR'])) && ($_oRow['XGPZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XGPZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZAPR'])) && ($_oRow['XTPZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XTPZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZAPR'])) && ($_oRow['XTLZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XTLZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZAPR'])) && ($_oRow['XHIZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XHIZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZAPR'])) && ($_oRow['XPAZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XPAZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZAPR'])) && ($_oRow['XNAZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XNAZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZAPR'])) && ($_oRow['XTBZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XTBZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZAPR'])) && ($_oRow['XPBZAPR'] !== 0)) {
                                                        echo number_format($_oRow['XPBZAPR']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZMEI'])) && ($_oRow['XGPZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XGPZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZMEI'])) && ($_oRow['XTPZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XTPZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZMEI'])) && ($_oRow['XTLZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XTLZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZMEI'])) && ($_oRow['XHIZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XHIZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZMEI'])) && ($_oRow['XPAZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XPAZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZMEI'])) && ($_oRow['XNAZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XNAZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZMEI'])) && ($_oRow['XTBZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XTBZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZMEI'])) && ($_oRow['XPBZMEI'] !== 0)) {
                                                        echo number_format($_oRow['XPBZMEI']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZJUN'])) && ($_oRow['XGPZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XGPZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZJUN'])) && ($_oRow['XTPZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XTPZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZJUN'])) && ($_oRow['XTLZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XTLZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZJUN'])) && ($_oRow['XHIZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XHIZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZJUN'])) && ($_oRow['XPAZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XPAZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZJUN'])) && ($_oRow['XNAZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XNAZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZJUN'])) && ($_oRow['XTBZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XTBZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZJUN'])) && ($_oRow['XPBZJUN'] !== 0)) {
                                                        echo number_format($_oRow['XPBZJUN']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZJUL'])) && ($_oRow['XGPZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XGPZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZJUL'])) && ($_oRow['XTPZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XTPZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZJUL'])) && ($_oRow['XTLZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XTLZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZJUL'])) && ($_oRow['XHIZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XHIZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZJUL'])) && ($_oRow['XPAZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XPAZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZJUL'])) && ($_oRow['XNAZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XNAZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZJUL'])) && ($_oRow['XTBZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XTBZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZJUL'])) && ($_oRow['XPBZJUL'] !== 0)) {
                                                        echo number_format($_oRow['XPBZJUL']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZAGS'])) && ($_oRow['XGPZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XGPZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZAGS'])) && ($_oRow['XTPZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XTPZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZAGS'])) && ($_oRow['XTLZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XTLZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZAGS'])) && ($_oRow['XHIZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XHIZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZAGS'])) && ($_oRow['XPAZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XPAZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZAGS'])) && ($_oRow['XNAZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XNAZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZAGS'])) && ($_oRow['XTBZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XTBZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZAGS'])) && ($_oRow['XPBZAGS'] !== 0)) {
                                                        echo number_format($_oRow['XPBZAGS']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZSEP'])) && ($_oRow['XGPZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XGPZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZSEP'])) && ($_oRow['XTPZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XTPZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZSEP'])) && ($_oRow['XTLZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XTLZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZSEP'])) && ($_oRow['XHIZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XHIZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZSEP'])) && ($_oRow['XPAZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XPAZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZSEP'])) && ($_oRow['XNAZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XNAZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZSEP'])) && ($_oRow['XTBZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XTBZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZSEP'])) && ($_oRow['XPBZSEP'] !== 0)) {
                                                        echo number_format($_oRow['XPBZSEP']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZOKT'])) && ($_oRow['XGPZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XGPZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZOKT'])) && ($_oRow['XTPZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XTPZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZOKT'])) && ($_oRow['XTLZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XTLZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZOKT'])) && ($_oRow['XHIZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XHIZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZOKT'])) && ($_oRow['XPAZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XPAZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZOKT'])) && ($_oRow['XNAZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XNAZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZOKT'])) && ($_oRow['XTBZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XTBZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZOKT'])) && ($_oRow['XPBZOKT'] !== 0)) {
                                                        echo number_format($_oRow['XPBZOKT']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZNOV'])) && ($_oRow['XGPZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XGPZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZNOV'])) && ($_oRow['XTPZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XTPZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZNOV'])) && ($_oRow['XTLZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XTLZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZNOV'])) && ($_oRow['XHIZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XHIZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZNOV'])) && ($_oRow['XPAZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XPAZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZNOV'])) && ($_oRow['XNAZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XNAZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZNOV'])) && ($_oRow['XTBZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XTBZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZNOV'])) && ($_oRow['XPBZNOV'] !== 0)) {
                                                        echo number_format($_oRow['XPBZNOV']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XGPZDES'])) && ($_oRow['XGPZDES'] !== 0)) {
                                                        echo number_format($_oRow['XGPZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTPZDES'])) && ($_oRow['XTPZDES'] !== 0)) {
                                                        echo number_format($_oRow['XTPZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTLZDES'])) && ($_oRow['XTLZDES'] !== 0)) {
                                                        echo number_format($_oRow['XTLZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XHIZDES'])) && ($_oRow['XHIZDES'] !== 0)) {
                                                        echo number_format($_oRow['XHIZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPAZDES'])) && ($_oRow['XPAZDES'] !== 0)) {
                                                        echo number_format($_oRow['XPAZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XNAZDES'])) && ($_oRow['XNAZDES'] !== 0)) {
                                                        echo number_format($_oRow['XNAZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XTBZDES'])) && ($_oRow['XTBZDES'] !== 0)) {
                                                        echo number_format($_oRow['XTBZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ((!empty($_oRow['XPBZDES'])) && ($_oRow['XPBZDES'] !== 0)) {
                                                        echo number_format($_oRow['XPBZDES']);
                                                    } else {
                                                        echo number_format(0);
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td align="center">
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sumde2/' . $_cmpFTAHUNZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE']; ?>" title="<?php
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
            if ($_cmpFYEARZZ !== 'sumde2') {
                echo 'hidden';
            } else {
                
            }
            ?> well well-sm sk_well_modification0">
                 <?php
                 $_oYea = $_cmpFTAHUNZ;

                 $_oS01 = "select *, (XGPZJAN + XGPZFEB + XGPZMRT + XGPZAPR + XGPZMEI + XGPZJUN + XGPZJUL + XGPZAGS + XGPZSEP + XGPZOKT + XGPZNOV + XGPZDES) as XGPZALL, ";
                 $_oS02 = "(XTPZJAN + XTPZFEB + XTPZMRT + XTPZAPR + XTPZMEI + XTPZJUN + XTPZJUL + XTPZAGS + XTPZSEP + XTPZOKT + XTPZNOV + XTPZDES) as XTPZALL, ";
                 $_oS03 = "(XTLZJAN + XTLZFEB + XTLZMRT + XTLZAPR + XTLZMEI + XTLZJUN + XTLZJUL + XTLZAGS + XTLZSEP + XTLZOKT + XTLZNOV + XTLZDES) as XTLZALL, ";
                 $_oS04 = "(XHIZJAN + XHIZFEB + XHIZMRT + XHIZAPR + XHIZMEI + XHIZJUN + XHIZJUL + XHIZAGS + XHIZSEP + XHIZOKT + XHIZNOV + XHIZDES) as XHIZALL, ";
                 $_oS05 = "(XPAZJAN + XPAZFEB + XPAZMRT + XPAZAPR + XPAZMEI + XPAZJUN + XPAZJUL + XPAZAGS + XPAZSEP + XPAZOKT + XPAZNOV + XPAZDES) as XPAZALL, ";
                 $a = "(XNAZJAN + XNAZFEB + XNAZMRT + XNAZAPR + XNAZMEI + XNAZJUN + XNAZJUL + XNAZAGS + XNAZSEP + XNAZOKT + XNAZNOV + XNAZDES) as XNAZALL, ";
                 $b = "(XTBZJAN + XTBZFEB + XTBZMRT + XTBZAPR + XTBZMEI + XTBZJUN + XTBZJUL + XTBZAGS + XTBZSEP + XTBZOKT + XTBZNOV + XTBZDES) as XTBZALL, ";
                 $c = "(XPBZJAN + XPBZFEB + XPBZMRT + XPBZAPR + XPBZMEI + XPBZJUN + XPBZJUL + XPBZAGS + XPBZSEP + XPBZOKT + XPBZNOV + XPBZDES) as XPBZALL, ";
                 $d = "(XIUZJAN + XIUZFEB + XIUZMRT + XIUZAPR + XIUZMEI + XIUZJUN + XIUZJUL + XIUZAGS + XIUZSEP + XIUZOKT + XIUZNOV + XIUZDES) as XIUZALL, ";
                 $a2 = "(XPTZJAN + XPTZFEB + XPTZMRT + XPTZAPR + XPTZMEI + XPTZJUN + XPTZJUL + XPTZAGS + XPTZSEP + XPTZOKT + XPTZNOV + XPTZDES) as XPTZALL ";
                 $_oS06 = "from( select *, sum(if(FPERIOD='" . $_oYea . "01',FINCR01,0)) as XGPZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR01,0)) as XGPZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR01,0)) as XGPZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR01,0)) as XGPZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR01,0)) as XGPZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR01,0)) as XGPZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR01,0)) as XGPZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR01,0)) as XGPZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR01,0)) as XGPZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR01,0)) as XGPZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR01,0)) as XGPZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR01,0)) as XGPZDES, ";
                 $_oS07 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR02,0)) as XTPZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR02,0)) as XTPZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR02,0)) as XTPZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR02,0)) as XTPZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR02,0)) as XTPZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR02,0)) as XTPZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR02,0)) as XTPZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR02,0)) as XTPZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR02,0)) as XTPZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR02,0)) as XTPZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR02,0)) as XTPZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR02,0)) as XTPZDES, ";
                 $_oS08 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR03,0)) as XTLZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR03,0)) as XTLZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR03,0)) as XTLZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR03,0)) as XTLZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR03,0)) as XTLZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR03,0)) as XTLZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR03,0)) as XTLZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR03,0)) as XTLZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR03,0)) as XTLZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR03,0)) as XTLZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR03,0)) as XTLZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR03,0)) as XTLZDES, ";
                 $_oS09 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR04,0)) as XHIZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR04,0)) as XHIZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR04,0)) as XHIZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR04,0)) as XHIZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR04,0)) as XHIZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR04,0)) as XHIZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR04,0)) as XHIZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR04,0)) as XHIZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR04,0)) as XHIZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR04,0)) as XHIZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR04,0)) as XHIZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR04,0)) as XHIZDES, ";
                 $_oS10 = "sum(if(FPERIOD='" . $_oYea . "01',FINCR05,0)) as XPAZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR05,0)) as XPAZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR05,0)) as XPAZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR05,0)) as XPAZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR05,0)) as XPAZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR05,0)) as XPAZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR05,0)) as XPAZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR05,0)) as XPAZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR05,0)) as XPAZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR05,0)) as XPAZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR05,0)) as XPAZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR05,0)) as XPAZDES, ";
                 $e = "sum(if(FPERIOD='" . $_oYea . "01',FINCR06,0)) as XNAZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR06,0)) as XNAZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR06,0)) as XNAZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR06,0)) as XNAZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR06,0)) as XNAZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR06,0)) as XNAZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR06,0)) as XNAZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR06,0)) as XNAZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR06,0)) as XNAZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR06,0)) as XNAZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR06,0)) as XNAZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR06,0)) as XNAZDES, ";
                 $f = "sum(if(FPERIOD='" . $_oYea . "01',FINCR07,0)) as XTBZJAN, sum(if(FPERIOD='" . $_oYea . "02',FINCR07,0)) as XTBZFEB, sum(if(FPERIOD='" . $_oYea . "03',FINCR07,0)) as XTBZMRT, sum(if(FPERIOD='" . $_oYea . "04',FINCR07,0)) as XTBZAPR, sum(if(FPERIOD='" . $_oYea . "05',FINCR07,0)) as XTBZMEI, sum(if(FPERIOD='" . $_oYea . "06',FINCR07,0)) as XTBZJUN, sum(if(FPERIOD='" . $_oYea . "07',FINCR07,0)) as XTBZJUL, sum(if(FPERIOD='" . $_oYea . "08',FINCR07,0)) as XTBZAGS, sum(if(FPERIOD='" . $_oYea . "09',FINCR07,0)) as XTBZSEP, sum(if(FPERIOD='" . $_oYea . "10',FINCR07,0)) as XTBZOKT, sum(if(FPERIOD='" . $_oYea . "11',FINCR07,0)) as XTBZNOV, sum(if(FPERIOD='" . $_oYea . "12',FINCR07,0)) as XTBZDES, ";
                 $g = "sum(if(FPERIOD='" . $_oYea . "01',FBRUTO2,0)) as XPBZJAN, sum(if(FPERIOD='" . $_oYea . "02',FBRUTO2,0)) as XPBZFEB, sum(if(FPERIOD='" . $_oYea . "03',FBRUTO2,0)) as XPBZMRT, sum(if(FPERIOD='" . $_oYea . "04',FBRUTO2,0)) as XPBZAPR, sum(if(FPERIOD='" . $_oYea . "05',FBRUTO2,0)) as XPBZMEI, sum(if(FPERIOD='" . $_oYea . "06',FBRUTO2,0)) as XPBZJUN, sum(if(FPERIOD='" . $_oYea . "07',FBRUTO2,0)) as XPBZJUL, sum(if(FPERIOD='" . $_oYea . "08',FBRUTO2,0)) as XPBZAGS, sum(if(FPERIOD='" . $_oYea . "09',FBRUTO2,0)) as XPBZSEP, sum(if(FPERIOD='" . $_oYea . "10',FBRUTO2,0)) as XPBZOKT, sum(if(FPERIOD='" . $_oYea . "11',FBRUTO2,0)) as XPBZNOV, sum(if(FPERIOD='" . $_oYea . "12',FBRUTO2,0)) as XPBZDES, ";
                 $h = "sum(if(FPERIOD='" . $_oYea . "01',FDECR02,0)) as XIUZJAN, sum(if(FPERIOD='" . $_oYea . "02',FDECR02,0)) as XIUZFEB, sum(if(FPERIOD='" . $_oYea . "03',FDECR02,0)) as XIUZMRT, sum(if(FPERIOD='" . $_oYea . "04',FDECR02,0)) as XIUZAPR, sum(if(FPERIOD='" . $_oYea . "05',FDECR02,0)) as XIUZMEI, sum(if(FPERIOD='" . $_oYea . "06',FDECR02,0)) as XIUZJUN, sum(if(FPERIOD='" . $_oYea . "07',FDECR02,0)) as XIUZJUL, sum(if(FPERIOD='" . $_oYea . "08',FDECR02,0)) as XIUZAGS, sum(if(FPERIOD='" . $_oYea . "09',FDECR02,0)) as XIUZSEP, sum(if(FPERIOD='" . $_oYea . "10',FDECR02,0)) as XIUZOKT, sum(if(FPERIOD='" . $_oYea . "11',FDECR02,0)) as XIUZNOV, sum(if(FPERIOD='" . $_oYea . "12',FDECR02,0)) as XIUZDES, ";
                 $e2 = "sum(if(FPERIOD='" . $_oYea . "01',FPJKKBY,0)) as XPTZJAN, sum(if(FPERIOD='" . $_oYea . "02',FPJKKBY,0)) as XPTZFEB, sum(if(FPERIOD='" . $_oYea . "03',FPJKKBY,0)) as XPTZMRT, sum(if(FPERIOD='" . $_oYea . "04',FPJKKBY,0)) as XPTZAPR, sum(if(FPERIOD='" . $_oYea . "05',FPJKKBY,0)) as XPTZMEI, sum(if(FPERIOD='" . $_oYea . "06',FPJKKBY,0)) as XPTZJUN, sum(if(FPERIOD='" . $_oYea . "07',FPJKKBY,0)) as XPTZJUL, sum(if(FPERIOD='" . $_oYea . "08',FPJKKBY,0)) as XPTZAGS, sum(if(FPERIOD='" . $_oYea . "09',FPJKKBY,0)) as XPTZSEP, sum(if(FPERIOD='" . $_oYea . "10',FPJKKBY,0)) as XPTZOKT, sum(if(FPERIOD='" . $_oYea . "11',FPJKKBY,0)) as XPTZNOV, sum(if(FPERIOD='" . $_oYea . "12',FPJKKBY,0)) as XPTZDES ";
                 $_oS11 = "from ttaxhst where ttaxhst.FGROUPS='" . $_cmpFCODEZZ . "' and ttaxhst.FFLGTAX = 'hstp21' and ttaxhst.FPROFLE = '" . $_empFCODEZZ . "') as XTABLEZ";

                 $_oSql = $_oS01 . $_oS02 . $_oS03 . $_oS04 . $_oS05 . $a . $b . $c . $d . $a2 . $_oS06 . $_oS07 . $_oS08 . $_oS09 . $_oS10 . $e . $f . $g . $h . $e2 . $_oS11;

                 $_queP21HST = $this->db->query($_oSql);

                 $_oSeq = 0;
                 foreach ($_queP21HST->result_array() as $_oRow) {

                     $_oFFULNME = $_oRow['FFULNME'];
                     $_oFNPWPZZ = $_oRow['FNPWPZZ'];
                     $_oFMARITL = $_oRow['FMARITL'];
                     $_oFSTADTE = $_oRow['FSTADTE'];
                     $_oFENDDTE = $_oRow['FENDDTE'];
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sumdet/' . $_cmpFTAHUNZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Summary/Ringkasan</font>
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div class="row">
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
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPERIOX" class="form-control" autofocus readonly value="<?php
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
                                            echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                        } else {
                                            echo 'Nomor Pokok Wajib Pajak (NPWP)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                    if (!empty($_oFNPWPZZ)) {

                                        $_xFNPWPZZ = explode(';', $_oFNPWPZZ);
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
                                    ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'S-Kawin/Tanggungan';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'S-Kawin/Tanggungan';
                                        } else {
                                            echo 'S-Kawin/Tanggungan';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                           $_xFMARITL = $_oRow['FMARITL'];
                                           $_yFMARITL = explode(';', $_xFMARITL);
                                           echo $_yFMARITL[1];
                                           ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Mulai Krj (Bulan)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Mulai Krj (Bulan)';
                                        } else {
                                            echo 'Mulai Krj (Bulan)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                    if (!empty($_oFSTADTE)) {
                                        echo substr($_oFSTADTE, 4, 2);
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Berhenti Krj (Bulan)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Berhenti Krj (Bulan)';
                                        } else {
                                            echo 'Berhenti Krj (Bulan)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                    if (!empty($_oFENDDTE)) {
                                        echo substr($_oFENDDTE, 4, 2);
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div style="height: 10px;">
                                <br>
                            </div>                                    
                            <div class="sk_table_modification2 table-responsive"> 
                                <table id="_objINAsumde2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap">No.</th>
                                            <th class="text-center" style="white-space: nowrap">Keterangan</th>
                                            <th class="text-center" style="white-space: nowrap">(JAN-DES)</th>
                                            <th class="text-center" style="white-space: nowrap">JAN</th>
                                            <th class="text-center" style="white-space: nowrap">FEB</th>
                                            <th class="text-center" style="white-space: nowrap">MRT</th>
                                            <th class="text-center" style="white-space: nowrap">APR</th>
                                            <th class="text-center" style="white-space: nowrap">MEI</th>
                                            <th class="text-center" style="white-space: nowrap">JUN</th>
                                            <th class="text-center" style="white-space: nowrap">JUL</th>
                                            <th class="text-center" style="white-space: nowrap">AGS</th>
                                            <th class="text-center" style="white-space: nowrap">SEP</th>
                                            <th class="text-center" style="white-space: nowrap">OKT</th>
                                            <th class="text-center" style="white-space: nowrap">NOV</th>
                                            <th class="text-center" style="white-space: nowrap">DES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php ?>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '1'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'GAJI/PENSIUN ATAU JHT/THT'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZALL'])) {
                                                    echo number_format($_oRow['XGPZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZJAN'])) {
                                                    echo number_format($_oRow['XGPZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZFEB'])) {
                                                    echo number_format($_oRow['XGPZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td >
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZMRT'])) {
                                                    echo number_format($_oRow['XGPZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZAPR'])) {
                                                    echo number_format($_oRow['XGPZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZMEI'])) {
                                                    echo number_format($_oRow['XGPZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZJUN'])) {
                                                    echo number_format($_oRow['XGPZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZJUL'])) {
                                                    echo number_format($_oRow['XGPZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZAGS'])) {
                                                    echo number_format($_oRow['XGPZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZSEP'])) {
                                                    echo number_format($_oRow['XGPZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZOKT'])) {
                                                    echo number_format($_oRow['XGPZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZNOV'])) {
                                                    echo number_format($_oRow['XGPZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XGPZDES'])) {
                                                    echo number_format($_oRow['XGPZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '2'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'TUNJANGAN PPh'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZALL'])) {
                                                    echo number_format($_oRow['XTPZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZJAN'])) {
                                                    echo number_format($_oRow['XTPZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZFEB'])) {
                                                    echo number_format($_oRow['XTPZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZMRT'])) {
                                                    echo number_format($_oRow['XTPZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZAPR'])) {
                                                    echo number_format($_oRow['XTPZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZMEI'])) {
                                                    echo number_format($_oRow['XTPZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZJUN'])) {
                                                    echo number_format($_oRow['XTPZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZJUL'])) {
                                                    echo number_format($_oRow['XTPZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZAGS'])) {
                                                    echo number_format($_oRow['XTPZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZSEP'])) {
                                                    echo number_format($_oRow['XTPZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZOKT'])) {
                                                    echo number_format($_oRow['XTPZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZNOV'])) {
                                                    echo number_format($_oRow['XTPZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTPZDES'])) {
                                                    echo number_format($_oRow['XTPZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '3'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'TUNJANGAN LAINNYA, UANG LEMBUR DAN<br>SEBAGAINYA'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZALL'])) {
                                                    echo number_format($_oRow['XTLZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZJAN'])) {
                                                    echo number_format($_oRow['XTLZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZFEB'])) {
                                                    echo number_format($_oRow['XTLZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZMRT'])) {
                                                    echo number_format($_oRow['XTLZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZAPR'])) {
                                                    echo number_format($_oRow['XTLZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZMEI'])) {
                                                    echo number_format($_oRow['XTLZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZJUN'])) {
                                                    echo number_format($_oRow['XTLZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZJUL'])) {
                                                    echo number_format($_oRow['XTLZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZAGS'])) {
                                                    echo number_format($_oRow['XTLZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZSEP'])) {
                                                    echo number_format($_oRow['XTLZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZOKT'])) {
                                                    echo number_format($_oRow['XTLZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZNOV'])) {
                                                    echo number_format($_oRow['XTLZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTLZDES'])) {
                                                    echo number_format($_oRow['XTLZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '4'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'HONORARIUM DAN IMBALAN LAIN SEJENISNYA'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZALL'])) {
                                                    echo number_format($_oRow['XHIZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZJAN'])) {
                                                    echo number_format($_oRow['XHIZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZFEB'])) {
                                                    echo number_format($_oRow['XHIZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZMRT'])) {
                                                    echo number_format($_oRow['XHIZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZAPR'])) {
                                                    echo number_format($_oRow['XHIZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZMEI'])) {
                                                    echo number_format($_oRow['XHIZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZJUN'])) {
                                                    echo number_format($_oRow['XHIZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZJUL'])) {
                                                    echo number_format($_oRow['XHIZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZAGS'])) {
                                                    echo number_format($_oRow['XHIZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZSEP'])) {
                                                    echo number_format($_oRow['XHIZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZOKT'])) {
                                                    echo number_format($_oRow['XHIZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZNOV'])) {
                                                    echo number_format($_oRow['XHIZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XHIZDES'])) {
                                                    echo number_format($_oRow['XHIZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '5'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZALL'])) {
                                                    echo number_format($_oRow['XPAZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZJAN'])) {
                                                    echo number_format($_oRow['XPAZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZFEB'])) {
                                                    echo number_format($_oRow['XPAZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZMRT'])) {
                                                    echo number_format($_oRow['XPAZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZAPR'])) {
                                                    echo number_format($_oRow['XPAZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZMEI'])) {
                                                    echo number_format($_oRow['XPAZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZJUN'])) {
                                                    echo number_format($_oRow['XPAZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZJUL'])) {
                                                    echo number_format($_oRow['XPAZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZAGS'])) {
                                                    echo number_format($_oRow['XPAZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZSEP'])) {
                                                    echo number_format($_oRow['XPAZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZOKT'])) {
                                                    echo number_format($_oRow['XPAZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZNOV'])) {
                                                    echo number_format($_oRow['XPAZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPAZDES'])) {
                                                    echo number_format($_oRow['XPAZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '6'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'PENERIMAAN DALAM BENTUK NATURA<br>DAN KENIKMATAN LAINNYA YANG DIKENAKAN<br>PEMOTONGAN PPh PASAL 21'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZALL'])) {
                                                    echo number_format($_oRow['XNAZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZJAN'])) {
                                                    echo number_format($_oRow['XNAZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZFEB'])) {
                                                    echo number_format($_oRow['XNAZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZMRT'])) {
                                                    echo number_format($_oRow['XNAZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZAPR'])) {
                                                    echo number_format($_oRow['XNAZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZMEI'])) {
                                                    echo number_format($_oRow['XNAZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZJUN'])) {
                                                    echo number_format($_oRow['XNAZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZJUL'])) {
                                                    echo number_format($_oRow['XNAZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZAGS'])) {
                                                    echo number_format($_oRow['XNAZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZSEP'])) {
                                                    echo number_format($_oRow['XNAZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZOKT'])) {
                                                    echo number_format($_oRow['XNAZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZNOV'])) {
                                                    echo number_format($_oRow['XNAZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XNAZDES'])) {
                                                    echo number_format($_oRow['XNAZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '7'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI<br>DAN THR'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZALL'])) {
                                                    echo number_format($_oRow['XTBZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZJAN'])) {
                                                    echo number_format($_oRow['XTBZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZFEB'])) {
                                                    echo number_format($_oRow['XTBZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZMRT'])) {
                                                    echo number_format($_oRow['XTBZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZAPR'])) {
                                                    echo number_format($_oRow['XTBZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZMEI'])) {
                                                    echo number_format($_oRow['XTBZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZJUN'])) {
                                                    echo number_format($_oRow['XTBZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZJUL'])) {
                                                    echo number_format($_oRow['XTBZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZAGS'])) {
                                                    echo number_format($_oRow['XTBZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZSEP'])) {
                                                    echo number_format($_oRow['XTBZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZOKT'])) {
                                                    echo number_format($_oRow['XTBZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZNOV'])) {
                                                    echo number_format($_oRow['XTBZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XTBZDES'])) {
                                                    echo number_format($_oRow['XTBZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '8'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'PENGHASILAN BRUTO'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZALL'])) {
                                                    echo number_format($_oRow['XPBZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZJAN'])) {
                                                    echo number_format($_oRow['XPBZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZFEB'])) {
                                                    echo number_format($_oRow['XPBZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZMRT'])) {
                                                    echo number_format($_oRow['XPBZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZAPR'])) {
                                                    echo number_format($_oRow['XPBZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZMEI'])) {
                                                    echo number_format($_oRow['XPBZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZJUN'])) {
                                                    echo number_format($_oRow['XPBZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZJUL'])) {
                                                    echo number_format($_oRow['XPBZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZAGS'])) {
                                                    echo number_format($_oRow['XPBZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZSEP'])) {
                                                    echo number_format($_oRow['XPBZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZOKT'])) {
                                                    echo number_format($_oRow['XPBZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZNOV'])) {
                                                    echo number_format($_oRow['XPBZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPBZDES'])) {
                                                    echo number_format($_oRow['XPBZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '9'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'IURAN PENSIUN ATAU IURAN THT/JHT'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZALL'])) {
                                                    echo number_format($_oRow['XIUZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZJAN'])) {
                                                    echo number_format($_oRow['XIUZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZFEB'])) {
                                                    echo number_format($_oRow['XIUZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZMRT'])) {
                                                    echo number_format($_oRow['XIUZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZAPR'])) {
                                                    echo number_format($_oRow['XIUZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZMEI'])) {
                                                    echo number_format($_oRow['XIUZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZJUN'])) {
                                                    echo number_format($_oRow['XIUZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZJUL'])) {
                                                    echo number_format($_oRow['XIUZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZAGS'])) {
                                                    echo number_format($_oRow['XIUZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZSEP'])) {
                                                    echo number_format($_oRow['XIUZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZOKT'])) {
                                                    echo number_format($_oRow['XIUZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZNOV'])) {
                                                    echo number_format($_oRow['XIUZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XIUZDES'])) {
                                                    echo number_format($_oRow['XIUZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo '10'; ?>
                                            </td>
                                            <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                <?php echo 'PPh 21 TERUTANG'; ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZALL'])) {
                                                    echo number_format($_oRow['XPTZALL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZJAN'])) {
                                                    echo number_format($_oRow['XPTZJAN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZFEB'])) {
                                                    echo number_format($_oRow['XPTZFEB']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZMRT'])) {
                                                    echo number_format($_oRow['XPTZMRT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZAPR'])) {
                                                    echo number_format($_oRow['XPTZAPR']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZMEI'])) {
                                                    echo number_format($_oRow['XPTZMEI']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZJUN'])) {
                                                    echo number_format($_oRow['XPTZJUN']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZJUL'])) {
                                                    echo number_format($_oRow['XPTZJUL']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZAGS'])) {
                                                    echo number_format($_oRow['XPTZAGS']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZSEP'])) {
                                                    echo number_format($_oRow['XPTZSEP']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZOKT'])) {
                                                    echo number_format($_oRow['XPTZOKT']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZNOV'])) {
                                                    echo number_format($_oRow['XPTZNOV']);
                                                } else {
                                                    echo number_format('0');
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right" style="white-space: nowrap">
                                                <?php
                                                if (!empty($_oRow['XPTZDES'])) {
                                                    echo number_format($_oRow['XPTZDES']);
                                                } else {
                                                    echo number_format('0');
                                                }
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
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "prdadd":
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);

            $_oFFULNME = $_tblPRDADD['0']['FFULNME'];
            $_oFNPWPZZ = $_tblPRDADD['0']['FNPWPZZ'];
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/prdsve/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div style="height: 10px;">
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

            if ($this->session->flashdata('true')) {
                ?>
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Success !</h3>", html: "<h4>Record Inserted</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            break;
        case "c21smr" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);
            $_cmpFYEARZZ = $this->uri->segment(8);
            $_cmpFWRKSTA = $this->uri->segment(9);

            $_oFFULNME = $_tblC21SMR['0']['FFULNME'];

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp21');
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_cmpFYEARZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/rptsmr'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan Summary PPh 21 Terutang';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan Summary PPh 21 Terutang';
                            } else {
                                echo 'Download (Unduh) Laporan Summary PPh 21 Terutang';
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

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/sndeml' . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21cor/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
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
                                            <label class="sk_label_modification">
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
                                            <input type="text" name="_viwFPERIOX" class="form-control" autofocus readonly value="<?php
                                    echo $_oFPERIOX;
                                    ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
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
                                            <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                    echo $_oFREVISI;
                                    ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
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
                                                    <th class="text-center" style="white-space: nowrap">Jumlah Pegawai Tetap</th>
                                                    <th class="text-center" style="white-space: nowrap">Total Penghasilan Bruto</th>
                                                    <th class="text-center" style="white-space: nowrap">PPh 21 Terutang</th>
                                                    <th class="text-center" style="white-space: nowrap">Kompensasi&nbsp;<button data-id="<?php echo ''; ?>" href="#sk_modal_kompen" title="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Edit Nilai Kompensasi (PPh21)';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Edit Nilai Kompensasi (PPh21)';
                                                        } else {
                                                            echo 'Edit Nilai Kompensasi (PPh21)';
                                                        };
                                                        ?>" data-toggle="modal" class="sk_viwkompen"><font color="#ff0000"><i class="fas fa-pencil-alt fa-fw"></i></font>
                                                        </button>
                                                    </th>
                                                    <th class="text-center" style="white-space: nowrap">PPh 21 KB (LB)</th>
                                                    <th class="text-center" style="white-space: nowrap">Kode Jenis Setoran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($_oFREVISI == '0') {
                                                    $_xFREVISI = '-1';
                                                } else {
                                                    $_xFREVISI = $_oFREVISI;
                                                }
                                                
                                                $this->db->select('COUNT(*) AS XCOUNTZ, SUM(if(substr(FPERIOX,1,3) <> "DES", FPJKKBY, FPJKKBX)) as XPJKKBY, SUM(FBRUTO2) AS XBRUTO2, SUM(round(FP21HMN)) AS XP21HMN, SUM(FP21RSG) AS XP21RSG');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_cmpFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp21',
                                                    'ttaxhst.FREVISI = ' => $_xFREVISI,
                                                    )
                                                );
                                                $this->db->order_by('FPROFLE', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                                    $_oXBRUTO2 = $_oRow['XBRUTO2'];
                                                    $_oXP21HMN = $_oRow['XP21HMN'];
                                                    $_oXP21RSG = $_oRow['XP21RSG'];
                                                    $_oXPJKKBY = $_oRow['XPJKKBY'];
                                                }

                                                $this->db->select('FCOMPEN');
                                                $this->db->from('ttaxhst');
                                                $this->db->where('FRECNMB', $_hstFRECNMB);

                                                $_queTAXHST = $this->db->get();

                                                foreach ($_queTAXHST->result_array() as $_oRoz) {

                                                    $_oFCOMPEN = $_oRoz['FCOMPEN'];
                                                }

                                                $_updP21HST = array(
                                                    'FBRUTO2' => $_oXBRUTO2,
                                                    'FP21HMN' => $_oXP21HMN,
                                                    'FCOMPEN' => $_oFCOMPEN,
                                                    'FP21RSG' => $_oXP21RSG,
                                                    'FPJKKBY' => strval(intval($_oXPJKKBY) - intval($_oFCOMPEN)),
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP21HST);


                                                $this->db->select('*');
                                                $this->db->from('ttaxhst');
                                                $this->db->where('FRECNMB', $_hstFRECNMB);

                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oFBRUTO2 = $_oRow['FBRUTO2'];
                                                    $_oFP21HMN = $_oRow['FP21HMN'];
                                                    $_oFP21RSG = $_oRow['FP21RSG'];
                                                    $_oFPJKKBY = $_oRow['FPJKKBY'];
                                                    $_oFSKCEKI = $_oRow['FSKCEKI'];
                                                }
                                                ?>

                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td align="center">
                                                        <?php echo $_oXCOUNTZ; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFBRUTO2)) {
                                                            echo number_format($_oFBRUTO2);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if ($_oXPJKKBY > '0') {
                                                            echo number_format($_oXPJKKBY);
                                                        } else if (!empty($_oXPJKKBY)) {
                                                            echo number_format('0');
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFCOMPEN)) {
                                                            echo number_format($_oFCOMPEN);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oFPJKKBY)) {
                                                            echo number_format($_oFPJKKBY);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                    <?php
                                                    echo '411121-100';
                                                    ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                    <td align="center"><strong>(Total)</strong></td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oXBRUTO2)) {
                                                                echo number_format($_oXBRUTO2);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if ($_oXPJKKBY > '0') {
                                                                echo number_format($_oXPJKKBY);
                                                            } else if (!empty($_oXPJKKBY)) {
                                                                echo number_format('0');
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oFCOMPEN)) {
                                                                echo number_format($_oFCOMPEN);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oFPJKKBY)) {
                                                                echo number_format($_oFPJKKBY);
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

            <div <?php
            if (strtolower(substr($_oFPERIOX, 0, 3)) !== 'des') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;  
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expfrd/' . $_oFPERIOD; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export PPh 21 Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data PPh 21';
                            } else {
                                echo 'Export Format/Data PPh 21';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>
                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?> href ="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    } else {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                }
                                ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Import Data PPh 21';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Import Data PPh 21';
                                } else {
                                    echo 'Import Data PPh 21';
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
                        <div style="height: 0px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Detail/Rincian</font>
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
                                ?>" class="table table-striped table-bordered table-hover" style="width:100%">
                                -->
                                
                                <table class="table table-striped table-bordered table-hover" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap;">No.</th>
                                            <th class="text-center" style="white-space: nowrap;">Nama Karyawan</th>
                                            <th class="text-center" style="white-space: nowrap;">Status</th>
                                            <th class="text-center" style="white-space: nowrap;">NPWP</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="NATURA DAN KENIKMATAN LAINNYA ">NA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="IURAN PENSIUN ATAU IURAN THT/JHT">IU*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PPh 21 TERUTANG">PT*</th>
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
                                        $this->db->like('FTYPEZZ', 'em', 'after');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->where('FREVISI', $_xFREVISI);
                                        $this->db->order_by('FPROFLE, ttaxhst.FPERIOD', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>

                                            <tr>
                                                <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                    <?php
                                                    if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                        echo '<font style="color: #ff0000">' . '(R) ' . $_oRow['FFULNME'] . '</font>';
                                                    } else {
                                                        echo $_oRow['FFULNME'];
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap">
                                                    <?php
                                                    if (strtolower($_oRow['FWRKTYP']) == 'l') {
                                                        echo 'Lokal';
                                                    } elseif (strtolower($_oRow['FWRKTYP']) == 'e') {
                                                        echo 'Ekspatriat';
                                                    } else {
                                                        echo 'Undefined';
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp) && (trim($_yNwp !== '000000000000000')))) {
                                                            echo 'Ada';
                                                        } else {
                                                            echo '<font style="color: #ff0000">Tidak Ada</font>';
                                                        }
                                                    } else {
                                                        echo '<font style="color: #ff0000">Tidak Ada</font>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR01'])) || (($_oRow['FINCR01'] == 0) && ($_oRow['FINCR01'] == '0'))) {
                                                        echo number_format($_oRow['FINCR01']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR02'])) || (($_oRow['FINCR02'] == 0) && ($_oRow['FINCR02'] == '0'))) {
                                                        echo number_format($_oRow['FINCR02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR03'])) || (($_oRow['FINCR03'] == 0) && ($_oRow['FINCR03'] == '0'))) {
                                                        echo number_format($_oRow['FINCR03']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR04'])) || (($_oRow['FINCR04'] == 0) && ($_oRow['FINCR04'] == '0'))) {
                                                        echo number_format($_oRow['FINCR04']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR05'])) || (($_oRow['FINCR05'] == 0) && ($_oRow['FINCR05'] == '0'))) {
                                                        echo number_format($_oRow['FINCR05']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR06'])) || (($_oRow['FINCR06'] == 0) && ($_oRow['FINCR06'] == '0'))) {
                                                        echo number_format($_oRow['FINCR06']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINCR07'])) || (($_oRow['FINCR07'] == 0) && ($_oRow['FINCR07'] == '0'))) {
                                                        echo number_format($_oRow['FINCR07']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FBRUTO2'])) || (($_oRow['FBRUTO2'] == 0) && ($_oRow['FBRUTO2'] == '0'))) {
                                                        echo number_format($_oRow['FBRUTO2']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FDECR02'])) || (($_oRow['FDECR02'] == 0) && ($_oRow['FDECR02'] == '0'))) {
                                                        echo number_format($_oRow['FDECR02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FNPWPZZ'])) && (substr_count($_oRow['FNPWPZZ'], ';') > 0)) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_vNpw = 'ynpwp';
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_vNpw = 'nnpwp';
                                                        } else {
                                                            $_vNpw = 'nnpwp';
                                                        }
                                                    } else {
                                                        $_vNpw = 'nnpwp';
                                                    }


                                                    if ((!empty($_oRow['FPJKKBY'])) || (($_oRow['FPJKKBY'] == 0) && ($_oRow['FPJKKBY'] == '0'))) {
                                                        if ($_vNpw == 'ynpwp') {
                                                            if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                                echo number_format($_oRow['FPJKKBY']);
                                                            } else {
                                                                echo number_format($_oRow['FPJKKBY']);
                                                            }
                                                        } else {
                                                            if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                                echo number_format($_oRow['FPJKKBY']);
                                                            } else {
                                                                echo number_format($_oRow['FPJKKBY']);
                                                            }
                                                        }
                                                    } else {
                                                        if ($_vNpw == 'ynpwp') {
                                                            echo number_format('0');
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format('0') . '</font>';
                                                        }
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-center" style="white-space: nowrap">
                                                    <a href="<?php
                                                    if ($_oRow['FTYPEZZ'] == 'emp') {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21dtl/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
                                                    } elseif (($_oRow['FTYPEZZ'] == 'emx') || ($_oRow['FTYPEZZ'] == 'emz')) {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21dtx/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
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
                                    <tfoot>
                                        <?php
                                        $this->db->select('sum(FINCR01) as XINCR01, sum(FINCR02) as XINCR02, sum(FINCR03) as XINCR03, sum(FINCR04) as XINCR04, sum(FINCR05) as XINCR05, sum(FINCR06) as XINCR06, sum(FINCR07) as XINCR07, sum(FBRUTO2) as XBRUTO2, sum(FDECR02) as XDECR02, sum(FP21HMN) as XP21HMN');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->like('FTYPEZZ', 'emp', 'after');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->where('FREVISI', $_xFREVISI);
                                        $this->db->order_by('FPROFLE, ttaxhst.FPERIOD', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oXINCR01 = $_oRow['XINCR01'];
                                            $_oXINCR02 = $_oRow['XINCR02'];
                                            $_oXINCR03 = $_oRow['XINCR03'];
                                            $_oXINCR04 = $_oRow['XINCR04'];
                                            $_oXINCR05 = $_oRow['XINCR05'];
                                            $_oXINCR06 = $_oRow['XINCR06'];
                                            $_oXINCR07 = $_oRow['XINCR07'];
                                            $_oXBRUTO2 = $_oRow['XBRUTO2'];
                                            $_oXDECR02 = $_oRow['XDECR02'];
                                            $_oXP21HMN = $_oRow['XP21HMN'];
                                        }
                                        ?>

                                        <tr style="color: #000000; background-color: #dcdcdc">
                                            <td colspan="2" class="text-center"><strong>(Total)</strong></td>
                                            <td colspan="2" style="background-color: #ffffff"></td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR01);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR03);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR04);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR05);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR06);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINCR07);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXBRUTO2);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXDECR02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXPJKKBY);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right" style="background-color: #ffffff">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <div <?php
            if (strtolower(substr($_oFPERIOX, 0, 3)) == 'des') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <div style = "height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;  
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/add'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Add';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Tambah';
                            } else {
                                echo 'Tambah';
                            };
                            ?>" style="background-color: #0275d8"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-plus fa-lg"></i></font>
                            </a>
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expfrd/' . $_oFPERIOD; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export PPh 21 Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data PPh 21';
                            } else {
                                echo 'Export Format/Data PPh 21';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>
                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?> href ="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    } else {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                }
                                ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Import Data PPh 21';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Import Data PPh 21';
                                } else {
                                    echo 'Import Data PPh 21';
                                };
                                ?>" style="background-color: <?php
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#f7f7f7';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                    echo '#d9534f';
                                }
                                ?>"><font style="color: <?php
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo '#d9534f';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                    echo '#ffffff';
                                }
                                ?>; font-size: 17px"><i class="fas fa-file-import fa-lg"></i></font>
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
                        <div class="col-lg-12">
                            <font style="color: #f0ad4e; font-size: 18px; font-weight: bold">#</font>&nbsp;<font style="color: #c0c0C0; font-size: 16px">Detail/Rincian</font>
                            <div style="height: 10px;">
                                <br>
                            </div>
                            <div class="sk_table_modification2 table-responsive">
                                <table id="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo '_objENGpphdes';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo '_objINApphdes';
                                } else {
                                    echo '_objINApphdes';
                                }
                                ?>" class="table table-striped table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">No.</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">Nama Karyawan</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">Status</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; vertical-align: middle">NPWP</th>
                                            
                                            <th colspan="9" class="text-center" style="white-space: nowrap;">JAN-NOV</th>
                                            <th colspan="9" class="text-center" style="white-space: nowrap;">JAN-DES</th>
                                            <th colspan="3" class="text-center" style="white-space: nowrap; cursor: pointer; vertical-align: middle">PPh 21 Terutang</th>
                                            <th rowspan="2" class="text-center" style="white-space: nowrap; cursor: pointer; vertical-align: middle">#</th>
                                        </tr>
                                        <tr>
                                            

                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="NATURA DAN KENIKMATAN LAINNYA ">NA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="IURAN PENSIUN ATAU IURAN THT/JHT">IU*</th>

                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="NATURA DAN KENIKMATAN LAINNYA ">NA*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="PENGHASILAN BRUTO">PB*</th>
                                            <th class="text-center" style="white-space: nowrap; cursor: pointer" title="IURAN PENSIUN ATAU IURAN THT/JHT">IU*</th>

                                            <th class="text-center" style="white-space: nowrap;">Setahun</th>
                                            <th class="text-center" style="white-space: nowrap;">Dipotong</th>
                                            <th class="text-center" style="white-space: nowrap;">KB (LB)</th>
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
                                        $this->db->where('FTYPEZZ', 'emp');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FPROFLE', 'asc');
                                        
                                        $this->db->or_where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->where('FTYPEZZ', 'emz');
                                        $this->db->where('FSKCEKI', 'XXX');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->order_by('FPROFLE', 'asc');

                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oSeq ++;
                                            ?>

                                            <tr>
                                                <td class="text-center" style="white-space: nowrap; background-color: #e5e6e5">
                                                    <?php echo $_oSeq; ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap; background-color: #e5e6e5">
                                                    <?php
                                                    if (strtolower($_oRow['FTYPEZZ']) == 'emz') {
                                                        echo '<font style="color: #ff0000">' . '(R) ' . $_oRow['FFULNME'] . '</font>';
                                                    } else {
                                                        echo $_oRow['FFULNME'];
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap">
                                                    <?php
                                                    if (strtolower($_oRow['FWRKTYP']) == 'l') {
                                                        echo 'Lokal';
                                                    } elseif (strtolower($_oRow['FWRKTYP']) == 'e') {
                                                        echo 'Ekspatriat';
                                                    } else {
                                                        echo 'Undefined';
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-left" style="white-space: nowrap">
                                                    <?php
                                                    if (!empty($_oRow['FNPWPZZ'])) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp) && (trim($_yNwp !== '000000000000000')))) {
                                                            echo 'Ada';
                                                        } else {
                                                            echo '<font style="color: #ff0000">Tidak Ada</font>';
                                                        }
                                                    } else {
                                                        echo '<font style="color: #ff0000">Tidak Ada</font>';
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN01'])) || (($_oRow['FINJN01'] == 0) && ($_oRow['FINJN01'] == '0'))) {
                                                        echo number_format($_oRow['FINJN01']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN02'])) || (($_oRow['FINJN02'] == 0) && ($_oRow['FINJN02'] == '0'))) {
                                                        echo number_format($_oRow['FINJN02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN03'])) || (($_oRow['FINJN03'] == 0) && ($_oRow['FINJN03'] == '0'))) {
                                                        echo number_format($_oRow['FINJN03']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN04'])) || (($_oRow['FINJN04'] == 0) && ($_oRow['FINJN04'] == '0'))) {
                                                        echo number_format($_oRow['FINJN04']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN05'])) || (($_oRow['FINJN05'] == 0) && ($_oRow['FINJN05'] == '0'))) {
                                                        echo number_format($_oRow['FINJN05']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN06'])) || (($_oRow['FINJN06'] == 0) && ($_oRow['FINJN06'] == '0'))) {
                                                        echo number_format($_oRow['FINJN06']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJN07'])) || (($_oRow['FINJN07'] == 0) && ($_oRow['FINJN07'] == '0'))) {
                                                        echo number_format($_oRow['FINJN07']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FBRUJN2'])) || (($_oRow['FBRUJN2'] == 0) && ($_oRow['FBRUJN2'] == '0'))) {
                                                        echo number_format($_oRow['FBRUJN2']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FDEJN02'])) || (($_oRow['FDEJN02'] == 0) && ($_oRow['FDEJN02'] == '0'))) {
                                                        echo number_format($_oRow['FDEJN02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD01'])) || (($_oRow['FINJD01'] == 0) && ($_oRow['FINJD01'] == '0'))) {
                                                        echo number_format($_oRow['FINJD01']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD02'])) || (($_oRow['FINJD02'] == 0) && ($_oRow['FINJD02'] == '0'))) {
                                                        echo number_format($_oRow['FINJD02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD03'])) || (($_oRow['FINJD03'] == 0) && ($_oRow['FINJD03'] == '0'))) {
                                                        echo number_format($_oRow['FINJD03']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD04'])) || (($_oRow['FINJD04'] == 0) && ($_oRow['FINJD04'] == '0'))) {
                                                        echo number_format($_oRow['FINJD04']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD05'])) || (($_oRow['FINJD05'] == 0) && ($_oRow['FINJD05'] == '0'))) {
                                                        echo number_format($_oRow['FINJD05']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD06'])) || (($_oRow['FINJD06'] == 0) && ($_oRow['FINJD06'] == '0'))) {
                                                        echo number_format($_oRow['FINJD06']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FINJD07'])) || (($_oRow['FINJD07'] == 0) && ($_oRow['FINJD07'] == '0'))) {
                                                        echo number_format($_oRow['FINJD07']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FBRUJD2'])) || (($_oRow['FBRUJD2'] == 0) && ($_oRow['FBRUJD2'] == '0'))) {
                                                        echo number_format($_oRow['FBRUJD2']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FDEJD02'])) || (($_oRow['FDEJD02'] == 0) && ($_oRow['FDEJD02'] == '0'))) {
                                                        echo number_format($_oRow['FDEJD02']);
                                                    } else {
                                                        echo number_format('0');
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FNPWPZZ'])) && (substr_count($_oRow['FNPWPZZ'], ';') > 0)) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_vNpw = 'ynpwp';
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_vNpw = 'nnpwp';
                                                        } else {
                                                            $_vNpw = 'nnpwp';
                                                        }
                                                    } else {
                                                        $_vNpw = 'nnpwp';
                                                    }


                                                    if ((!empty($_oRow['FPJKKJD'])) || (($_oRow['FPJKKJD'] == 0) && ($_oRow['FPJKKJD'] == '0'))) {
                                                        if ($_vNpw == 'ynpwp') {
                                                            if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                                echo number_format($_oRow['FPJKKJD']);
                                                            } else {
                                                                echo number_format($_oRow['FPJKKJD']);
                                                            }
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format($_oRow['FPJKKJD']) . '</font>';
                                                        }
                                                    } else {
                                                        if ($_vNpw == 'ynpwp') {
                                                            echo number_format('0');
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format('0') . '</font>';
                                                        }
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    $this->db->select('sum(FPJKKBY) as XPJKKBY');
                                                    $this->db->from('ttaxhst');
                                                    $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                                    $this->db->where('FFLGTAX', 'hstp21');
                                                    $this->db->like('FPERIOD', substr($_oFPERIOD, 0, 4), 'after');
                                                    $this->db->where('FPROFLE', $_oRow['FPROFLE']);
                                                    $this->db->where('substr(FPERIOX,1,3) !=', 'DES');
                                                    $this->db->order_by('FPERIOD', 'asc');

                                                    $_queSUMP21 = $this->db->get();

                                                    foreach ($_queSUMP21->result_array() as $_oRoa) {
                                                        $_oXPJKKBY = $_oRoa['XPJKKBY'];
                                                    }

                                                    if ((!empty($_oRow['FNPWPZZ'])) && (substr_count($_oRow['FNPWPZZ'], ';') > 0)) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_vNpw = 'ynpwp';
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_vNpw = 'nnpwp';
                                                        } else {
                                                            $_vNpw = 'nnpwp';
                                                        }
                                                    } else {
                                                        $_vNpw = 'nnpwp';
                                                    }


                                                    if ((!empty($_oRow['FPJKKJN'])) || (($_oRow['FPJKKJN'] == 0) && ($_oRow['FPJKKJN'] == '0'))) {
                                                        if ($_vNpw == 'ynpwp') {
                                                            if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                                echo number_format($_oRow['FPJKKJN']);
                                                            } else {
                                                                echo number_format($_oRow['FPJKKJN']);
                                                            }
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format($_oRow['FPJKKJN']) . '</font>';
                                                        }
                                                    } else {
                                                        if ($_vNpw == 'ynpwp') {
                                                            echo number_format('0');
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format('0') . '</font>';
                                                        }
                                                    };
                                                    ?>
                                                </td>

                                                <td class="text-right" style="white-space: nowrap">
                                                    <?php
                                                    if ((!empty($_oRow['FNPWPZZ'])) && (substr_count($_oRow['FNPWPZZ'], ';') > 0)) {
                                                        $_xNwp = explode(';', $_oRow['FNPWPZZ']);
                                                        $_yNwp = $_xNwp[1];
                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_vNpw = 'ynpwp';
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_vNpw = 'nnpwp';
                                                        } else {
                                                            $_vNpw = 'nnpwp';
                                                        }
                                                    } else {
                                                        $_vNpw = 'nnpwp';
                                                    }


                                                    if ((!empty($_oRow['FPJKKBX'])) || (($_oRow['FPJKKBX'] == 0) && ($_oRow['FPJKKBX'] == '0'))) {
                                                        if ($_vNpw == 'ynpwp') {
                                                            if (strtolower($_oRow['FTYPEZZ']) == 'emx') {
                                                                echo number_format($_oRow['FPJKKBX']);
                                                            } else {
                                                                echo number_format($_oRow['FPJKKBX']);
                                                            }
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format($_oRow['FPJKKBX']) . '</font>';
                                                        }
                                                    } else {
                                                        if ($_vNpw == 'ynpwp') {
                                                            echo number_format('0');
                                                        } else {
                                                            echo '<font style="color: #ff0000">' . number_format('0') . '</font>';
                                                        }
                                                    };
                                                    ?>
                                                </td>
                                                <td class="text-center" style="white-space: nowrap">
                                                    <a href="<?php
                                                    if ($_oRow['FTYPEZZ'] == 'emp') {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21dtl/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
                                                    } elseif (($_oRow['FTYPEZZ'] == 'emx') || ($_oRow['FTYPEZZ'] == 'emz')) {
                                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21dtx/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . $_oRow['FPERIOX'];
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
                                    <tfoot>
                                        <?php
                                        $this->db->select('sum(FINCR01) as XINCR01, sum(FINCR02) as XINCR02, sum(FINCR03) as XINCR03, sum(FINCR04) as XINCR04, sum(FINCR05) as XINCR05, sum(FINCR06) as XINCR06, sum(FINCR07) as XINCR07, sum(FBRUTO2) as XBRUTO2, sum(FDECR02) as XDECR02, sum(FP21HMN) as XP21HMN, sum(FINJN01) as XINJN01, sum(FINJN02) as XINJN02, sum(FINJN03) as XINJN03, sum(FINJN04) as XINJN04, sum(FINJN05) as XINJN05, sum(FINJN06) as XINJN06, sum(FINJN07) as XINJN07, sum(FBRUJN2) as XBRUJN2, sum(FDEJN02) as XDEJN02, sum(FINJD01) as XINJD01, sum(FINJD02) as XINJD02, sum(FINJD03) as XINJD03, sum(FINJD04) as XINJD04, sum(FINJD05) as XINJD05, sum(FINJD06) as XINJD06, sum(FINJD07) as XINJD07, sum(FBRUJD2) as XBRUJD2, sum(FDEJD02) as XDEJD02, sum(FPJKKJD) as XPJKKJD, sum(FPJKKJN) as XPJKKJN, sum(FPJKKBX) as XPJKKBX');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->where('FTYPEZZ', 'emz');
                                        $this->db->order_by('FPROFLE, ttaxhst.FPERIOD', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;

                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                            $_oXINCR01 = $_oRow['XINCR01'];
                                            $_oXINCR02 = $_oRow['XINCR02'];
                                            $_oXINCR03 = $_oRow['XINCR03'];
                                            $_oXINCR04 = $_oRow['XINCR04'];
                                            $_oXINCR05 = $_oRow['XINCR05'];
                                            $_oXINCR06 = $_oRow['XINCR06'];
                                            $_oXINCR07 = $_oRow['XINCR07'];
                                            $_oXBRUTO2 = $_oRow['XBRUTO2'];
                                            $_oXDECR02 = $_oRow['XDECR02'];
                                            $_oXP21HMN = $_oRow['XP21HMN'];

                                            $_oXINJN01 = $_oRow['XINJN01'];
                                            $_oXINJN02 = $_oRow['XINJN02'];
                                            $_oXINJN03 = $_oRow['XINJN03'];
                                            $_oXINJN04 = $_oRow['XINJN04'];
                                            $_oXINJN05 = $_oRow['XINJN05'];
                                            $_oXINJN06 = $_oRow['XINJN06'];
                                            $_oXINJN07 = $_oRow['XINJN07'];
                                            $_oXBRUJN2 = $_oRow['XBRUJN2'];
                                            $_oXDEJN02 = $_oRow['XDEJN02'];

                                            $_oXINJD01 = $_oRow['XINJD01'];
                                            $_oXINJD02 = $_oRow['XINJD02'];
                                            $_oXINJD03 = $_oRow['XINJD03'];
                                            $_oXINJD04 = $_oRow['XINJD04'];
                                            $_oXINJD05 = $_oRow['XINJD05'];
                                            $_oXINJD06 = $_oRow['XINJD06'];
                                            $_oXINJD07 = $_oRow['XINJD07'];
                                            $_oXBRUJD2 = $_oRow['XBRUJD2'];
                                            $_oXDEJD02 = $_oRow['XDEJD02'];

                                            $_oXPJKKJD = $_oRow['XPJKKJD'];
                                            $_oXPJKKJN = $_oRow['XPJKKJN'];
                                            $_oXPJKKBX = $_oRow['XPJKKBX'];
                                        }
                                        ?>

                                        <tr style="color: #000000; background-color: #dcdcdc">
                                            <td colspan="4" class="text-center"><strong>(Total)</strong></td>
                                            
                                            
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN01);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN03);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN04);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN05);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN06);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJN07);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXBRUJN2);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXDEJN02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD01);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD03);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD04);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD05);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD06);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXINJD07);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXBRUJD2);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXDEJD02);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXPJKKJD);
                                                ?>
                                                </strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXPJKKJN);
                                                ?>
                                                </strong>
                                            </td>                                
                                            <td class="text-right">
                                                <strong>
                                                <?php
                                                    echo number_format($_oXPJKKBX);
                                                ?>
                                                </strong>
                                            </td>
                                            <td style="background-color: #ffffff"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div style = "height: 20px;">
                    <br>
                </div>
            </div>

            <?php
            break;
        case "c21imp" :
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
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_preFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="well well-sm sk_well_modification0">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    echo '&ensp;Status Upload : ' . '<font style="color: #ff0000">' . $_oFlg . '</font>' . ', ' . $_rslFATTACH;
                                } else {
                                    echo 'Status Upload : ...';
                                }
                                ?>
                                <div style="height:20px;">
                                    <br>
                                </div>

                                <div class="<?php
                                if (($_oFlg == 'Berhasil') || (!empty($_oFlg))) {
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
                                                        <th class="text-center" style="white-space: nowrap; width: 1%">Kode</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 89%">Nama Karyawan</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="GAJI/PENSIUN ATAU THT/JHT">GP*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="TUNJANGAN PPh">TP*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA">TL*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="HONORARIUM DAN IMBALAN LAIN SEJENISNYA">HI*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA">PA*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="NATURA DAN KENIKMATAN LAINNYA">NK*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR">TB*</th>
                                                        <th class="text-center" style="white-space: nowrap; width: 1%; cursor: pointer" title="IURAN PENSIUN ATAU IURAN THT/JHT">IU*</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $_oSeq = 0;
                                                    $_oChk = '';
                                                    foreach ($sheet as $_oRow) {
                                                        $_oSeq ++;

                                                        if ($_oSeq > 2) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
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
                                                                $_oRow['B'] = trim($this->sklibrfnc->_fGETNumOnl($_oRow['B']));
                                                                if (!empty($_oRow['B'])) {
                                                                    if ($_oRow['B'] !== trim($KATAKBENJUT)) {
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
                                                                ?>">
                                                                        <?php
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
                                                                <td class="text-left" style="white-space: nowrap;  width: 1%; background-color: <?php
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
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['E'])) || (($_oRow['E'] == 0) && ($_oRow['E'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['E'])) || (($_oRow['E'] == 0) && ($_oRow['E'] == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['E']));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['F'])) || (($_oRow['F'] == 0) && ($_oRow['F'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['F'])) || (($_oRow['F'] == 0) && ($_oRow['F'] == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['F']));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
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
                                                                                echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['G']));
                                                                            }
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['H'])) || (($_oRow['H'] == 0) && ($_oRow['H'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['H'])) || (($_oRow['H'] == 0) && ($_oRow['H'] == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['H']));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <?php
                                                                $_oPRE = intval($this->sklibrfnc->_fGETNumOnl($_oRow['I'])) + intval($this->sklibrfnc->_fGETNumOnl($_oRow['J'])) + intval($this->sklibrfnc->_fGETNumOnl($_oRow['K']));
                                                                ?>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oPRE)) || (($_oPRE == 0) && ($_oPRE == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oPRE)) || (($_oPRE == 0) && ($_oPRE == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oPRE));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['L'])) || (($_oRow['L'] == 0) && ($_oRow['L'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['L'])) || (($_oRow['L'] == 0) && ($_oRow['L'] == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['L']));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oRow['M'])) || (($_oRow['M'] == 0) && ($_oRow['M'] == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oRow['M'])) || (($_oRow['M'] == 0) && ($_oRow['M'] == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oRow['M']));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                                <?php
                                                                $_oIUR = intval($this->sklibrfnc->_fGETNumOnl($_oRow['N'])) + intval($this->sklibrfnc->_fGETNumOnl($_oRow['O']));
                                                                ?>
                                                                <td class="text-right" style="white-space: nowrap;  width: 1%; background-color: <?php
                                                                if ((!empty($_oIUR)) || (($_oIUR == 0) && ($_oIUR == '0'))) {
                                                                    $_oChk .= '1';
                                                                } else {
                                                                    echo '#d9534f';
                                                                    $_oChk .= '0';
                                                                };
                                                                ?>">
                                                                        <?php
                                                                        if ((!empty($_oIUR)) || (($_oIUR == 0) && ($_oIUR == '0'))) {
                                                                            echo number_format($this->sklibrfnc->_fGETNumOnl($_oIUR));
                                                                        } else {
                                                                            echo '';
                                                                        };
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }

                                                    if ($_oChk == '') {
                                                        $_oDsb = 'empty';
                                                    } elseif (strpos($_oChk, '0') !== false) {
                                                        $_oDsb = 'Y1';
                                                    } elseif (strpos($_oChk, '2') !== false) {
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
                                        <a class="btn btn-default btn-flat <?php
                                        if (($_oDsb == 'empty') || ($_oDsb == 'Y1') || ($_oDsb == 'Y2')) {
                                            echo 'disabled';
                                            echo $KATAKPEYANG = '';
                                        } elseif ($_oDsb == 'N') {
                                            echo '';
                                        }
                                        ?> sk_button_modification" href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFPROGRE' . '/' . $_varFPERIOD . '/' . $_varFREVISI . '/' . $KATAKPEYANG; ?>" role = "button" title="<?php
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
                                        if ($_oDsb == 'empty') {
                                            echo '&ensp;Status Proses PPh 21 : ...';
                                        } elseif ($_oDsb == 'Y1') {
                                            echo '&ensp;Status Proses PPh 21 : <font style="color: #ff0000; font-weight: bolder">Terkendala</font>, karena di data klien, ada kolom yang kosong';
                                        } elseif ($_oDsb == 'Y2') {
                                            echo '&ensp;Status Proses PPh 21 : <font style="color: #ff0000; font-weight: bolder">Terkendala</font>, karena di data klien, isi kolom periode beda';
                                        } elseif ($_oDsb == 'N') {
                                            echo '&ensp;Status Proses PPh 21 : <font style="color: #ff0000; font-weight: bolder">Siap</font>, data bisa dimasukkan ke database';
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

                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                                                    $_quePROFLE = $this->db->get();

                                                    if ($_quePROFLE->num_rows() > 0) {
                                                        foreach ($_quePROFLE->result_array() as $_oClc) {
                                                            $_oFCLCP21 = $_oClc['FCLCP21'];
                                                        }
                                                    } else {
                                                        $_oFCLCP21 = 'ng';
                                                    }



                                                    if ($_oFCLCP21 == 'ng') {
                                                        $_oRow['B'] = trim($this->sklibrfnc->_fGETNumOnl($_oRow['B']));
                                                        $_oFPERIOD = $_oRow['B'];
                                                        $_oFPROFLE = $_oRow['C'];
                                                        $_oTyp = trim($_oRow['D']);
                                                        echo substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8);
                                                        if ((!empty($_oTyp) && (strtolower(substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8))) == '_#resign')) {
                                                            $_oFTYPEZZ = 'emx';
                                                            $_oFFULNME = str_replace('_#RESIGN', '', $_oRow['D']);

                                                            $_updENDDTE = array(
                                                                'FENDDTE' => $this->sklibrfnc->_fGETLstDay($_varFPERIOD)
                                                            );

                                                            $this->db->where('FCODEZZ', $_oFPROFLE);
                                                            $this->db->update('tprofle', $_updENDDTE);
                                                        } elseif ((!empty($_oTyp) && (strtolower(substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8))) !== '_#resign')) {
                                                            $_oFTYPEZZ = 'emp';
                                                            $_oFFULNME = $_oRow['D'];
                                                        }
                                                        if ($_varFREVISI == '0') {
                                                            $_oFREVISI = '-1';
                                                        } else {
                                                            $_oFREVISI = $_varFREVISI;
                                                        }

                                                        $this->db->select('tprofle.FCODEZZ, tprofle.FFULNME, tprofle.FWRKTYP, tprofle.FSTADTE, tprofle.FENDDTE, tprofle.FMARITL, tprofle.FNPWPZZ, tmaritl.FPTKPCD, tmaritl.FPTKPVL, tprofle.FCHGPST, tchgpst.FPERCEN, tchgpst.FMAXVAL');
                                                        $this->db->from('tprofle');
                                                        $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
                                                        $this->db->join('tchgpst', 'tprofle.FCHGPST = tchgpst.FCODEZZ', 'LEFT');
                                                        $this->db->where('tprofle.FCODEZZ', $_oFPROFLE);
                                                        $_quePROFLE = $this->db->get();

                                                        if ($_quePROFLE->num_rows() > 0) {
                                                            foreach ($_quePROFLE->result_array() as $_oMrt) {
                                                                $_oFMARITL = $_oMrt['FMARITL'] . ';' . $_oMrt['FPTKPCD'] . ';' . $_oMrt['FPTKPVL'];
                                                                $_oFCHGPST = $_oMrt['FCHGPST'] . ';' . $_oMrt['FPERCEN'] . ';' . $_oMrt['FMAXVAL'];
                                                                $_oFNPWPZZ = $_oMrt['FNPWPZZ'];
                                                                $_oFWRKTYP = $_oMrt['FWRKTYP'];
                                                                $_oFSTADTE = $_oMrt['FSTADTE'];
                                                                $_oFENDDTE = $_oMrt['FENDDTE'];

                                                                $_xNwp = explode(';', $_oFNPWPZZ);
                                                                $_yNwp = $_xNwp[1];
                                                            }
                                                        } else {
                                                            
                                                        }
                                                        $this->db->select('tprofle.FCODEZZ, tprofle.FFULNME, tprofle.FCHGP21, tprofle.FCLCP21, tchgp21.FPERCEN, tchgp21.FMAXVAL');
                                                        $this->db->from('tprofle');
                                                        $this->db->join('tchgp21', 'tprofle.FCHGP21 = tchgp21.FCODEZZ', 'LEFT');
                                                        $this->db->where('tprofle.FCODEZZ', $_oFPROFLE);
                                                        $_quePROFLE = $this->db->get();

                                                        if ($_quePROFLE->num_rows() > 0) {
                                                            foreach ($_quePROFLE->result_array() as $_oP21) {
                                                                $_oFCHGP21 = $_oP21['FCHGP21'] . '|' . $_oP21['FPERCEN'] . '|' . $_oP21['FMAXVAL'];
                                                            }
                                                        } else {
                                                            
                                                        }


                                                        $_oFINCR01 = preg_replace('/[^0-9\-]/', '', $_oRow['E']);

                                                        $_oFINCR02 = preg_replace('/[^0-9\-]/', '', $_oRow['F']);

                                                        $_oCek = preg_replace('/[^\(\)]/', '', $_oRow['G']);
                                                        if (strpos($_oCek, '()') !== false) {
                                                            $_oFINCR03 = '-' . preg_replace('/[^0-9\-]/', '', $_oRow['G']);
                                                        } elseif (strpos($_oCek, '()') == false) {
                                                            $_oFINCR03 = preg_replace('/[^0-9\-]/', '', $_oRow['G']);
                                                        }

                                                        $_oFINCR04 = preg_replace('/[^0-9\-]/', '', $_oRow['H']);

                                                        $_oFPREJKK = preg_replace('/[^0-9\-]/', '', $_oRow['I']);
                                                        $_oFPREJKM = preg_replace('/[^0-9\-]/', '', $_oRow['J']);
                                                        $_oFPREKES = preg_replace('/[^0-9\-]/', '', $_oRow['K']);
                                                        $_oFINCR05 = $this->sklibrfnc->_fGETNumOnl($_oFPREJKK) + $this->sklibrfnc->_fGETNumOnl($_oFPREJKM) + $this->sklibrfnc->_fGETNumOnl($_oFPREKES);


                                                        $_oFINCR06 = preg_replace('/[^0-9\-]/', '', $_oRow['L']);

                                                        $_oFINCR07 = preg_replace('/[^0-9\-]/', '', $_oRow['M']);

                                                        $_oFIURTHT = preg_replace('/[^0-9\-]/', '', $_oRow['N']);
                                                        $_oFIURJPZ = preg_replace('/[^0-9\-]/', '', $_oRow['O']);
                                                        $_oFDECR02 = $this->sklibrfnc->_fGETNumOnl($_oFIURTHT) + $this->sklibrfnc->_fGETNumOnl($_oFIURJPZ);


                                                        $_oSta = $_oMrt['FSTADTE'];
                                                        $_oEnd = $_oMrt['FENDDTE'];

                                                        if (empty(trim($_oSta))) {
                                                            $_xSta = substr($_oFPERIOD, 0, 4) . '-01-01';
                                                        } else {
                                                            $_xSta = $_oSta;
                                                        }

                                                        if (empty(trim($_oEnd))) {
                                                            $_xEnd = substr($_oFPERIOD, 0, 4) . '-12-31';
                                                        } else {
                                                            if (substr($_oSta, 4, 2) !== substr($_oEnd, 4, 2)) {
                                                                $_xEnd = substr($_oFPERIOD, 0, 4) . '-12-31';
                                                            } else {
                                                                $_xEnd = $_oEnd;
                                                            }
                                                        }

                                                        $_oCnt = '';
                                                        $_oCnt = 1 + (date("Y", strtotime($_xEnd)) - date("Y", strtotime($_xSta))) * 12;
                                                        $_oCnt += date("m", strtotime($_xEnd)) - date("m", strtotime($_xSta));
                                                        if ($_oCnt >= 12) {
                                                            $_oMon = 12;
                                                        } else {
                                                            if (strtolower($_oFWRKTYP) == 'l') {
                                                                $_oMon = $_oCnt;
                                                            } elseif (strtolower($_oFWRKTYP) == 'e') {
                                                                $_oMon = 12;
                                                            }
                                                        }


                                                        $_oFBRUTO2_1 = intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06) + intval($_oFINCR07);

                                                        $_oFBRTO12_1 = (intval($_oMon) * (intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06))) + (intval($_oFINCR07));

                                                        $_xFDECR01_1 = (intval($_oFBRUTO2_1) * intval($_oMrt['FPERCEN'])) / 100;
                                                        if ($_xFDECR01_1 > intval($_oMrt['FMAXVAL'])) {
                                                            $_oFDECR01_1 = intval($_oMrt['FMAXVAL']);
                                                        } else {
                                                            $_oFDECR01_1 = $_xFDECR01_1;
                                                        }

                                                        $_xFPSTN12_1 = (intval($_oFBRTO12_1) * intval($_oMrt['FPERCEN'])) / 100;
                                                        if ($_xFPSTN12_1 > (intval($_oMon) * intval($_oMrt['FMAXVAL']))) {
                                                            $_oFPSTN12_1 = (intval($_oMon) * intval($_oMrt['FMAXVAL']));
                                                        } else {
                                                            $_oFPSTN12_1 = $_xFPSTN12_1;
                                                        }

                                                        $_oFPENS12_1 = intval($_oMon) * $_oFDECR02;
                                                        $_oFMNUS12_1 = $_oFPSTN12_1 + $_oFPENS12_1;
                                                        $_oFNETO12_1 = $_oFBRTO12_1 - $_oFMNUS12_1;
                                                        $_oFPTKPZZ_1 = $_oMrt['FPTKPVL'];
                                                        $_xFPKPZ12_1 = intval($_oFNETO12_1) - intval($_oFPTKPZZ_1);
                                                        $_yFPKPZ12_1 = (int) ($_xFPKPZ12_1 / 1000);
                                                        $_oFPKPZ12_1 = $_yFPKPZ12_1 * 1000;
                                                        $_xFPKPR12_1 = intval($_oFNETO12_1) - intval($_oFPTKPZZ_1);
                                                        $_yFPKPR12_1 = (int) ($_xFPKPR12_1 / 1000);
                                                        $_oFPKPR12_1 = $_yFPKPR12_1 * 1000;

                                                        $_oPrc = explode(';', $_oP21['FPERCEN']);
                                                        $_oVal = explode(';', $_oP21['FMAXVAL']);
                                                        $_oPkp = $_oFPKPR12_1;
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
                                                                    } else {
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
                                                                    } else {
                                                                        $_aP21 = 0;
                                                                        $_bP21 = 0;
                                                                        $_cP21 = 0;
                                                                        $_dP21 = 0;
                                                                    }

                                                                    break;
                                                            }
                                                        }
                                                        $_oFP21R12_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                        $_oFP21H12_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                        $_oFP21HMN_1 = (($_aP21 + $_bP21 + $_cP21 + $_dP21) / intval($_oMon));
                                                        $_oFPJKKBY_1 = $_oFP21HMN_1;
                                                        $_oFP21IRG_1 = $_oFP21R12_1;

                                                        if ((!empty($_oFINCR07)) || (($_oFINCR07 !== 0) && ($_oFINCR07 !== '0'))) {

                                                            $_oFBRUTO2_2 = intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06);

                                                            $_oFBRTO01_2 = intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06);

                                                            $_xFDECR01_2 = (intval($_oFBRUTO2_2) * intval($_oMrt['FPERCEN'])) / 100;
                                                            if ($_xFDECR01_2 > intval($_oMrt['FMAXVAL'])) {
                                                                $_oFDECR01_2 = intval($_oMrt['FMAXVAL']);
                                                            } else {
                                                                $_oFDECR01_2 = $_xFDECR01_2;
                                                            }

                                                            $_oFPSTN01_2 = $_oFDECR01_2;

                                                            $_oFPENS01_2 = $_oFDECR02;

                                                            $_oFMNUS01_2 = $_oFPSTN01_2 + $_oFPENS01_2;

                                                            $_oFNETO12_2 = intval($_oMon) * (intval($_oFBRTO01_2) - intval($_oFMNUS01_2));

                                                            $_oFPTKPZZ_2 = $_oMrt['FPTKPVL'];

                                                            $_xFPKPZ12_2 = intval($_oFNETO12_2) - intval($_oFPTKPZZ_2);
                                                            $_yFPKPZ12_2 = (int) ($_xFPKPZ12_2 / 1000);
                                                            $_oFPKPZ12_2 = $_yFPKPZ12_2 * 1000;

                                                            $_xFPKPR12_2 = intval($_oFNETO12_2) - intval($_oFPTKPZZ_2);
                                                            $_yFPKPR12_2 = (int) ($_xFPKPR12_2 / 1000);
                                                            $_oFPKPR12_2 = $_yFPKPR12_2 * 1000;

                                                            $_oPrc = explode(';', $_oP21['FPERCEN']);
                                                            $_oVal = explode(';', $_oP21['FMAXVAL']);
                                                            $_oPkp = $_oFPKPR12_2;
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
                                                                        } else {
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
                                                                        } else {
                                                                            $_aP21 = 0;
                                                                            $_bP21 = 0;
                                                                            $_cP21 = 0;
                                                                            $_dP21 = 0;
                                                                        }

                                                                        break;
                                                                }
                                                            }
                                                            $_oFP21R12_2 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                            $_oFP21H12_2 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                            $_oFP21HMN_2 = (($_aP21 + $_bP21 + $_cP21 + $_dP21) / intval($_oMon));
                                                            $_oFPJKKBY_2 = $_oFP21HMN_2;
                                                            $_oFP21IRG_2 = $_oFP21R12_2;
                                                        } else {
                                                            $_oFP21R12_2 = 0;
                                                            $_oFP21H12_2 = 0;
                                                            $_oFP21HMN_2 = 0;
                                                            $_oFPJKKBY_2 = 0;
                                                            $_oFP21IRG_2 = 0;
                                                        }

                                                        $_oFBRUTO2 = $_oFBRUTO2_1;
                                                        $_oFBRTO12 = $_oFBRTO12_1;
                                                        $_oFDECR01 = $_oFDECR01_1;
                                                        $_oFPSTN12 = $_oFPSTN12_1;
                                                        $_oFPENS12 = $_oFPENS12_1;
                                                        $_oFMNUS12 = $_oFMNUS12_1;
                                                        $_oFNETO12 = $_oFNETO12_1;
                                                        $_oFPTKPZZ = $_oFPTKPZZ_1;
                                                        $_oFPKPZ12 = $_oFPKPZ12_1;
                                                        $_oFPKPR12 = $_oFPKPR12_1;

                                                        $_oFP21IRG = 0;
                                                        $_oFP21R12 = intval($_oFP21R12_1) - intval($_oFP21R12_2);
                                                        $_oFP21HMN = (intval($_oFP21R12) / intval($_oMon));
                                                        $_oFPJKKBY = $_oFP21HMN;
                                                        $_oFP21H12 = $_oFP21R12;

                                                        if ($_oFTYPEZZ == 'emx') {
                                                            $_oFP21RSG = $_oFP21HMN;
                                                        } else {
                                                            $_oFP21RSG = 0;
                                                        }

                                                        if ((!empty($_oFINCR07)) || (($_oFINCR07 !== 0) && ($_oFINCR07 !== '0'))) {

                                                            $_oFP21IRG = intval($_oFP21IRG_1) - intval($_oFP21IRG_2);
                                                            $_oFP21R12 = intval($_oFP21R12_1) - $_oFP21IRG;
                                                            $_oFP21HMN = (intval($_oFP21R12) / intval($_oMon)) + $_oFP21IRG;
                                                            $_oFPJKKBY = $_oFP21HMN;
                                                            $_oFP21H12 = $_oFP21IRG + $_oFP21R12;
                                                            $_oFPKPR12 = $_oFPKPR12_2;

                                                            if ($_oFTYPEZZ == 'emx') {
                                                                $_oFP21RSG = $_oFP21HMN;
                                                            } else {
                                                                $_oFP21RSG = 0;
                                                            }
                                                        }

                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_oFP21H12 = $_oFP21H12;
                                                            $_oFP21HMN = $_oFP21HMN;
                                                            $_oFP21R12 = $_oFP21R12;
                                                            $_oFP21IRG = $_oFP21IRG;
                                                            $_oFPJKKBY = $_oFPJKKBY;
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_oFP21H12 = 1.2 * $_oFP21H12;
                                                            $_oFP21HMN = 1.2 * $_oFP21HMN;
                                                            $_oFP21R12 = 1.2 * $_oFP21R12;
                                                            $_oFP21IRG = 1.2 * $_oFP21IRG;
                                                            $_oFPJKKBY = 1.2 * $_oFPJKKBY;
                                                        } else {
                                                            $_oFP21H12 = 1.2 * $_oFP21H12;
                                                            $_oFP21HMN = 1.2 * $_oFP21HMN;
                                                            $_oFP21R12 = 1.2 * $_oFP21R12;
                                                            $_oFP21IRG = 1.2 * $_oFP21IRG;
                                                            $_oFPJKKBY = 1.2 * $_oFPJKKBY;
                                                        }

                                                        $this->db->select('*');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp21');
                                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                                        $this->db->where('FPROFLE', $_oFPROFLE);
                                                        $this->db->where('FREVISI', $_oFREVISI);
                                                        $_queP21HST = $this->db->get();

                                                        if ($_queP21HST->num_rows() > 0) {

                                                            $_updP21HST = array(
                                                                'FFULNME' => $_oFFULNME,
                                                                'FWRKTYP' => $_oFWRKTYP,
                                                                'FSTADTE' => $_oFSTADTE,
                                                                'FENDDTE' => $_oFENDDTE,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => $_oFTYPEZZ,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FINCR01' => $_oFINCR01,
                                                                'FINCR02' => $_oFINCR02,
                                                                'FINCR03' => $_oFINCR03,
                                                                'FINCR04' => $_oFINCR04,
                                                                'FINCR05' => $_oFINCR05,
                                                                'FPREJKK' => $_oFPREJKK,
                                                                'FPREJKM' => $_oFPREJKM,
                                                                'FPREKES' => $_oFPREKES,
                                                                'FINCR06' => $_oFINCR06,
                                                                'FINCR07' => $_oFINCR07,
                                                                'FBRUTO2' => strval($_oFBRUTO2),
                                                                'FMARITL' => $_oFMARITL,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FCHGPST' => $_oFCHGPST,
                                                                'FDECR01' => $_oFDECR01,
                                                                'FDECR02' => $_oFDECR02,
                                                                'FIURTHT' => $_oFIURTHT,
                                                                'FIURJPZ' => $_oFIURJPZ,
                                                                'FBRTO12' => $_oFBRTO12,
                                                                'FPSTN12' => $_oFPSTN12,
                                                                'FPENS12' => $_oFPENS12,
                                                                'FMNUS12' => $_oFMNUS12,
                                                                'FNETO12' => $_oFNETO12,
                                                                'FPTKPZZ' => $_oFPTKPZZ,
                                                                'FPKPZ12' => $_oFPKPZ12,
                                                                'FPKPR12' => $_oFPKPR12,
                                                                'FCHGP21' => $_oFCHGP21,
                                                                'FP21HMN' => strval(round($_oFP21HMN)),
                                                                'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                'FP21H12' => $_oFP21H12,
                                                                'FP21R12' => $_oFP21R12,
                                                                'FP21IRG' => $_oFP21IRG,
                                                                'FP21RSG' => $_oFP21RSG,
                                                                'FSKCEKI' => '$_oFP21IRG_1 : ' . $_oFP21IRG_1
                                                            );

                                                            $this->db->where('FPERIOD', $_oFPERIOD);
                                                            $this->db->where('FPROFLE', $_oFPROFLE);
                                                            $this->db->where('FREVISI', $_oFREVISI);
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->update('ttaxhst', $_updP21HST);
                                                        } else {

                                                            $_addP21HST = array(
                                                                'FPERIOD' => $_oRow['B'],
                                                                'FPROFLE' => $_oRow['C'],
                                                                'FFULNME' => $_oFFULNME,
                                                                'FWRKTYP' => $_oFWRKTYP,
                                                                'FSTADTE' => $_oFSTADTE,
                                                                'FENDDTE' => $_oFENDDTE,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => $_oFTYPEZZ,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FREVISI' => $_oFREVISI,
                                                                'FINCR01' => $_oFINCR01,
                                                                'FINCR02' => $_oFINCR02,
                                                                'FINCR03' => $_oFINCR03,
                                                                'FINCR04' => $_oFINCR04,
                                                                'FINCR05' => $_oFINCR05,
                                                                'FPREJKK' => $_oFPREJKK,
                                                                'FPREJKM' => $_oFPREJKM,
                                                                'FPREKES' => $_oFPREKES,
                                                                'FINCR06' => $_oFINCR06,
                                                                'FINCR07' => $_oFINCR07,
                                                                'FBRUTO2' => strval($_oFBRUTO2),
                                                                'FMARITL' => $_oFMARITL,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FCHGPST' => $_oFCHGPST,
                                                                'FDECR01' => $_oFDECR01,
                                                                'FDECR02' => $_oFDECR02,
                                                                'FIURTHT' => $_oFIURTHT,
                                                                'FIURJPZ' => $_oFIURJPZ,
                                                                'FBRTO12' => $_oFBRTO12,
                                                                'FPSTN12' => $_oFPSTN12,
                                                                'FPENS12' => $_oFPENS12,
                                                                'FMNUS12' => $_oFMNUS12,
                                                                'FNETO12' => $_oFNETO12,
                                                                'FPTKPZZ' => $_oFPTKPZZ,
                                                                'FPKPZ12' => $_oFPKPZ12,
                                                                'FPKPR12' => $_oFPKPR12,
                                                                'FCHGP21' => $_oFCHGP21,
                                                                'FP21HMN' => strval(round($_oFP21HMN)),
                                                                'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                'FP21R12' => $_oFP21R12,
                                                                'FP21IRG' => $_oFP21IRG,
                                                                'FP21H12' => $_oFP21H12,
                                                                'FFLGTAX' => 'hstp21',
                                                                'FP21RSG' => $_oFP21RSG,
                                                                'FSKCEKI' => '$_oFBRTO01_2 : ' . $_oFBRTO01_2 . '; $_oFPSTN01_2 : ' . $_oFPSTN01_2 . '; $_oFPENS01_2 : ' . $_oFPENS01_2 . '; $_oFMNUS01_2 : ' . $_oFMNUS01_2 . '; $_oFNETO12_2 : ' . $_oFNETO12_2 . '; $_oFPTKPZZ_2 : ' . $_oFPTKPZZ_2
                                                            );
                                                            $this->db->insert('ttaxhst', $_addP21HST);
                                                        }


                                                        $_oYea = substr($_oFPERIOD, 0, 4);
                                                        $_oPrf = $_oFPROFLE;

                                                        $this->db->select('FRECNMB, FCHGPST, FCHGP21, COUNT(*) as XJMLREC, SUM(FINCR01) as XINCR01, SUM(FINCR02) as XINCR02, SUM(FINCR03) as XINCR03, SUM(FINCR04) as XINCR04, SUM(FINCR05) as XINCR05, SUM(FINCR06) as XINCR06, SUM(FINCR07) as XINCR07, SUM(FDECR01) as XDECR01, SUM(FDECR02) as XDECR02, SUM(FBRUTO2) as XBRUTO2');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp21');
                                                        $this->db->where('FPROFLE', $_oPrf);
                                                        $this->db->where_in('FTYPEZZ', ['emp', 'emx']);
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
                                                        $this->db->where('FTYPEZZ', 'emx');

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
                                                                        } else {
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
                                                                        } else {
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

                                                            $_oYea = substr($_oFPERIOD, 0, 4);
                                                            $_oPrf = $_oFPROFLE;

                                                            $this->db->select('SUM(FPJKKBY) as XPJKKBY');
                                                            $this->db->from('ttaxhst');
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->where('FPROFLE', $_oPrf);
                                                            $this->db->where('FTYPEZZ', 'emp');
                                                            $this->db->like('FPERIOD', $_oYea, 'after');

                                                            $_queGULUNG = $this->db->get();

                                                            foreach ($_queGULUNG->result_array() as $_oRow) {
                                                                $_oXGULUNG = $_oRow['XPJKKBY'];
                                                            }
                                                        }

                                                        $this->db->select('*');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp21');
                                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                                        $this->db->where('FPROFLE', $_oFPROFLE);
                                                        $this->db->where('FTYPEZZ', 'emx');
                                                        $this->db->where('FREVISI', $_oFREVISI);
                                                        $_queP21HST = $this->db->get();

                                                        foreach ($_queP21HST->result_array() as $_oRox) {
                                                            $_oFNPWPZZ = $_oRox['FNPWPZZ'];
                                                            $_oFWRKTYP = $_oRox['FWRKTYP'];

                                                            $_xNwp = explode(';', $_oFNPWPZZ);
                                                            $_yNwp = $_xNwp[1];
                                                        }

                                                        if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                            $_oXP21HMN = $_oXP21HMN;
                                                        } elseif ($_yNwp == '000000000000000') {
                                                            $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                        } else {
                                                            $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                        }

                                                        $_oFPJKKBY = intval($_oXP21HMN) - intval($_oXGULUNG);

                                                        if ($_queP21HST->num_rows() > 0) {

                                                            $_updP21HST = array(
                                                                'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                'FSKCEKI' => 'SOMPLAX'
                                                            );

                                                            $this->db->where('FPERIOD', $_oFPERIOD);
                                                            $this->db->where('FPROFLE', $_oFPROFLE);
                                                            $this->db->where('FREVISI', $_oFREVISI);
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->update('ttaxhst', $_updP21HST);
                                                        }

                                                        if (substr($_varFPERIOD, 4, 2) == '12') {

                                                            $this->dbforge->drop_table('xtaxhs1', TRUE);

                                                            $this->db->query('create table xtaxhs1 like ttaxhst');
                                                            $this->db->query("insert into xtaxhs1 select * from ttaxhst where FFLGTAX = '" . "hstp21" . "' and FTYPEZZ like 'e%' and FGROUPS = '" . $_cmpFCODEZZ . "'");

                                                            $this->dbforge->drop_table('xtaxhs2', TRUE);
                                                            $this->db->query('create table xtaxhs2 like ttaxhst');
                                                            $this->db->query("insert into xtaxhs2 select * from ttaxhst where FFLGTAX = '" . "hstp21" . "' and FTYPEZZ like 'e%' and FGROUPS = '" . $_cmpFCODEZZ . "' group by FPROFLE asc");

                                                            $this->db->select('*');
                                                            $this->db->from('xtaxhs2');

                                                            $_queTAXHS2 = $this->db->get();

                                                            foreach ($_queTAXHS2->result_array() as $_oRow) {

                                                                $this->db->select('*');
                                                                $this->db->from('ttaxhst');
                                                                $this->db->where('FFLGTAX', 'hstp21');
                                                                $this->db->where('FPROFLE', $_oRow['FPROFLE']);
                                                                $this->db->where('FPERIOD', $_varFPERIOD);
                                                                $this->db->where('FGROUPS', $_cmpFCODEZZ);

                                                                $_queTAXHST = $this->db->get();

                                                                if ($_queTAXHST->num_rows() > 0) {
                                                                    $this->db->select('*, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR01, 0)) as FINJN01, sum(FINCR01) as FINJD01, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR02, 0)) as FINJN02, sum(FINCR02) as FINJD02, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR03, 0)) as FINJN03, sum(FINCR03) as FINJD03, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR04, 0)) as FINJN04, sum(FINCR04) as FINJD04, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR05, 0)) as FINJN05, sum(FINCR05) as FINJD05, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR06, 0)) as FINJN06, sum(FINCR06) as FINJD06, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR07, 0)) as FINJN07, sum(FINCR07) as FINJD07, sum(if(substr(FPERIOX,1,3) <> "DES", FDECR02, 0)) as FDEJN02, sum(FDECR02) as FDEJD02, sum(if(substr(FPERIOX,1,3) <> "DES", FPJKKBY, 0)) as FPJKKJN, sum(FPJKKBY) as FPJKKJD');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->where('FPROFLE', $_oRow['FPROFLE']);
                                                                    $this->db->like('FPERIOD', substr($_varFPERIOD, 0, 4), 'after');
                                                                    $_queTAXHST = $this->db->get();

                                                                    foreach ($_queTAXHST->result_array() as $_oRoy) {
                                                                        $_xFINJN01 = $_oRoy['FINJN01'];
                                                                        $_xFINJD01 = $_oRoy['FINJD01'];
                                                                        $_xFINJN02 = $_oRoy['FINJN02'];
                                                                        $_xFINJD02 = $_oRoy['FINJD02'];
                                                                        $_xFINJN03 = $_oRoy['FINJN03'];
                                                                        $_xFINJD03 = $_oRoy['FINJD03'];
                                                                        $_xFINJN04 = $_oRoy['FINJN04'];
                                                                        $_xFINJD04 = $_oRoy['FINJD04'];
                                                                        $_xFINJN05 = $_oRoy['FINJN05'];
                                                                        $_xFINJD05 = $_oRoy['FINJD05'];
                                                                        $_xFINJN06 = $_oRoy['FINJN06'];
                                                                        $_xFINJD06 = $_oRoy['FINJD06'];
                                                                        $_xFINJN07 = $_oRoy['FINJN07'];
                                                                        $_xFINJD07 = $_oRoy['FINJD07'];
                                                                        $_xFDEJN02 = $_oRoy['FDEJN02'];
                                                                        $_xFDEJD02 = $_oRoy['FDEJD02'];
                                                                        $_xFPJKKJN = $_oRoy['FPJKKJN'];
                                                                        $_xFPJKKJD = $_oRoy['FPJKKJD'];
                                                                        $_xFBRUJN2 = intval($_xFINJN01) + intval($_xFINJN02) + intval($_xFINJN03) + intval($_xFINJN04) + intval($_xFINJN05) + intval($_xFINJN06) + intval($_xFINJN07);
                                                                        $_xFBRUJD2 = intval($_xFINJD01) + intval($_xFINJD02) + intval($_xFINJD03) + intval($_xFINJD04) + intval($_xFINJD05) + intval($_xFINJD06) + intval($_xFINJD07);
                                                                    }

                                                                    $_updTAXHST = array(
                                                                        'FINJN01' => $_xFINJN01,
                                                                        'FINJD01' => $_xFINJD01,
                                                                        'FINJN02' => $_xFINJN02,
                                                                        'FINJD02' => $_xFINJD02,
                                                                        'FINJN03' => $_xFINJN03,
                                                                        'FINJD03' => $_xFINJD03,
                                                                        'FINJN04' => $_xFINJN04,
                                                                        'FINJD04' => $_xFINJD04,
                                                                        'FINJN05' => $_xFINJN05,
                                                                        'FINJD05' => $_xFINJD05,
                                                                        'FINJN06' => $_xFINJN06,
                                                                        'FINJD06' => $_xFINJD06,
                                                                        'FINJN07' => $_xFINJN07,
                                                                        'FINJD07' => $_xFINJD07,
                                                                        'FDEJN02' => $_xFDEJN02,
                                                                        'FDEJD02' => $_xFDEJD02,
                                                                        'FPJKKJN' => $_xFPJKKJN,
                                                                        'FPJKKJD' => $_xFPJKKJD,
                                                                        'FBRUJN2' => $_xFBRUJN2,
                                                                        'FBRUJD2' => $_xFBRUJD2
                                                                    );

                                                                    $this->db->where('FFLGTAX', 'hstp21');
                                                                    $this->db->where('FPROFLE', $_oRow['FPROFLE']);
                                                                    $this->db->where('FPERIOD', $_varFPERIOD);
                                                                    $this->db->where('FGROUPS', $_cmpFCODEZZ);
                                                                    $this->db->update('ttaxhst', $_updTAXHST);
                                                                } else {

                                                                    $this->db->select('tprofle.FCODEZZ, tprofle.FFULNME, tprofle.FWRKTYP, tprofle.FSTADTE, tprofle.FENDDTE, tprofle.FCHGP21, tprofle.FMARITL, tprofle.FNPWPZZ, tmaritl.FPTKPCD, tmaritl.FPTKPVL, tprofle.FCHGPST, tchgpst.FPERCEN, tchgpst.FMAXVAL, tchgp21.FPERCEN as XPERCEN, tchgp21.FMAXVAL as XMAXVAL');
                                                                    $this->db->from('tprofle');
                                                                    $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
                                                                    $this->db->join('tchgpst', 'tprofle.FCHGPST = tchgpst.FCODEZZ', 'LEFT');
                                                                    $this->db->join('tchgp21', 'tprofle.FCHGP21 = tchgp21.FCODEZZ', 'LEFT');
                                                                    $this->db->where('tprofle.FCODEZZ', $_oRow['FPROFLE']);
                                                                    $_quePROFLE = $this->db->get();

                                                                    foreach ($_quePROFLE->result_array() as $_oRox) {
                                                                        $_xFSTADTE = $_oRox['FSTADTE'];
                                                                        $_xFENDDTE = $_oRox['FENDDTE'];
                                                                        $_xFMARITL = $_oRox['FMARITL'] . ';' . $_oRox['FPTKPCD'] . ';' . $_oRox['FPTKPVL'];
                                                                        $_xFCHGPST = $_oRox['FCHGPST'] . ';' . $_oRox['FPERCEN'] . ';' . $_oRox['FMAXVAL'];
                                                                        $_xFCHGP21 = $_oRox['FCHGP21'] . '|' . $_oRox['XPERCEN'] . '|' . $_oRox['XMAXVAL'];
                                                                        ;
                                                                    }

                                                                    $this->db->select('*, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR01, 0)) as FINJN01, sum(FINCR01) as FINJD01, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR02, 0)) as FINJN02, sum(FINCR02) as FINJD02, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR03, 0)) as FINJN03, sum(FINCR03) as FINJD03, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR04, 0)) as FINJN04, sum(FINCR04) as FINJD04, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR05, 0)) as FINJN05, sum(FINCR05) as FINJD05, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR06, 0)) as FINJN06, sum(FINCR06) as FINJD06, sum(if(substr(FPERIOX,1,3) <> "DES", FINCR07, 0)) as FINJN07, sum(FINCR07) as FINJD07, sum(if(substr(FPERIOX,1,3) <> "DES", FDECR02, 0)) as FDEJN02, sum(FDECR02) as FDEJD02, sum(if(substr(FPERIOX,1,3) <> "DES", FPJKKBY, 0)) as FPJKKJN, sum(FPJKKBY) as FPJKKJD');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->where('FPROFLE', $_oRow['FPROFLE']);
                                                                    $this->db->like('FPERIOD', substr($_varFPERIOD, 0, 4), 'after');

                                                                    $_queTAXHST = $this->db->get();

                                                                    foreach ($_queTAXHST->result_array() as $_oRoy) {
                                                                        $_xFINJN01 = $_oRoy['FINJN01'];
                                                                        $_xFINJD01 = $_oRoy['FINJD01'];
                                                                        $_xFINJN02 = $_oRoy['FINJN02'];
                                                                        $_xFINJD02 = $_oRoy['FINJD02'];
                                                                        $_xFINJN03 = $_oRoy['FINJN03'];
                                                                        $_xFINJD03 = $_oRoy['FINJD03'];
                                                                        $_xFINJN04 = $_oRoy['FINJN04'];
                                                                        $_xFINJD04 = $_oRoy['FINJD04'];
                                                                        $_xFINJN05 = $_oRoy['FINJN05'];
                                                                        $_xFINJD05 = $_oRoy['FINJD05'];
                                                                        $_xFINJN06 = $_oRoy['FINJN06'];
                                                                        $_xFINJD06 = $_oRoy['FINJD06'];
                                                                        $_xFINJN07 = $_oRoy['FINJN07'];
                                                                        $_xFINJD07 = $_oRoy['FINJD07'];
                                                                        $_xFDEJN02 = $_oRoy['FDEJN02'];
                                                                        $_xFDEJN02 = $_oRoy['FDEJN02'];
                                                                        $_xFDEJD02 = $_oRoy['FDEJD02'];
                                                                        $_xFPJKKJN = $_oRoy['FPJKKJN'];
                                                                        $_xFPJKKJD = $_oRoy['FPJKKJD'];
                                                                        $_xFBRUJN2 = intval($_xFINJN01) + intval($_xFINJN02) + intval($_xFINJN03) + intval($_xFINJN04) + intval($_xFINJN05) + intval($_xFINJN06) + intval($_xFINJN07);
                                                                        $_xFBRUJD2 = intval($_xFINJD01) + intval($_xFINJD02) + intval($_xFINJD03) + intval($_xFINJD04) + intval($_xFINJD05) + intval($_xFINJD06) + intval($_xFINJD07);
                                                                    }

                                                                    $_addTAXHST = array(
                                                                        'FFLGTAX' => 'hstp21',
                                                                        'FPROFLE' => $_oRow['FPROFLE'],
                                                                        'FFULNME' => $_oRow['FFULNME'],
                                                                        'FWRKTYP' => $_oRow['FWRKTYP'],
                                                                        'FSTADTE' => $_xFSTADTE,
                                                                        'FENDDTE' => $_xFENDDTE,
                                                                        'FNPWPZZ' => $_oRow['FNPWPZZ'],
                                                                        'FPERIOD' => $_varFPERIOD,
                                                                        'FPERIOX' => 'DES-' . substr($_varFPERIOD, 0, 4),
                                                                        'FTYPEZZ' => 'emz',
                                                                        'FGROUPS' => $_cmpFCODEZZ,
                                                                        'FMARITL' => $_xFMARITL,
                                                                        'FCHGPST' => $_xFCHGPST,
                                                                        'FCHGP21' => $_xFCHGP21,
                                                                        'FINJN01' => $_xFINJN01,
                                                                        'FINJD01' => $_xFINJD01,
                                                                        'FINJN02' => $_xFINJN02,
                                                                        'FINJD02' => $_xFINJD02,
                                                                        'FINJN03' => $_xFINJN03,
                                                                        'FINJD03' => $_xFINJD03,
                                                                        'FINJN04' => $_xFINJN04,
                                                                        'FINJD04' => $_xFINJD04,
                                                                        'FINJN05' => $_xFINJN05,
                                                                        'FINJD05' => $_xFINJD05,
                                                                        'FINJN06' => $_xFINJN06,
                                                                        'FINJD06' => $_xFINJD06,
                                                                        'FINJN07' => $_xFINJN07,
                                                                        'FINJD07' => $_xFINJD07,
                                                                        'FDEJN02' => $_xFDEJN02,
                                                                        'FDEJD02' => $_xFDEJD02,
                                                                        'FPJKKJN' => $_xFPJKKJN,
                                                                        'FPJKKJD' => $_xFPJKKJD,
                                                                        'FBRUJN2' => $_xFBRUJN2,
                                                                        'FBRUJD2' => $_xFBRUJD2
                                                                    );

                                                                    $this->db->insert('ttaxhst', $_addTAXHST);
                                                                }
                                                            }


                                                            $this->db->select('*');
                                                            $this->db->from('ttaxhst');
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->where('substr(FPERIOD,5,2)', '12');
                                                            $this->db->like('FTYPEZZ', 'e', 'after');
                                                            $this->db->order_by('FPROFLE', 'asc');

                                                            $_queFINDES = $this->db->get();

                                                            foreach ($_queFINDES->result_array() as $_oFnl) {

                                                                $_oZPROFLE = $_oFnl['FPROFLE'];

                                                                $_oZNPWPZZ = $_oFnl['FNPWPZZ'];
                                                                $_xNwp = explode(';', $_oZNPWPZZ);
                                                                $_yNwp = $_xNwp[1];

                                                                $_oZSTADTE = $_oFnl['FSTADTE'];
                                                                $_oZENDDTE = $_oFnl['FENDDTE'];
                                                                $_oZPERIOD = $_oFnl['FPERIOD'];
                                                                $_oZINJD01 = $_oFnl['FINJD01'];
                                                                $_oZINJD02 = $_oFnl['FINJD02'];
                                                                $_oZINJD03 = $_oFnl['FINJD03'];
                                                                $_oZINJD04 = $_oFnl['FINJD04'];
                                                                $_oZINJD05 = $_oFnl['FINJD05'];
                                                                $_oZINJD06 = $_oFnl['FINJD06'];
                                                                $_oZINJD07 = $_oFnl['FINJD07'];
                                                                $_oZDEJD02 = $_oFnl['FDEJD02'];
                                                                $_oZBRUJD2 = $_oFnl['FBRUJD2'];

                                                                $_xZCHGPST = $_oFnl['FCHGPST'];
                                                                $_yZCHGPST = explode(';', $_xZCHGPST);
                                                                $_oZPERCEN = $_yZCHGPST[1];
                                                                $_oZMAXVAL = $_yZCHGPST[2];

                                                                $_oZPTKPZZ = $_oFnl['FPTKPZZ'];

                                                                $_xZCHGP21 = $_oFnl['FCHGP21'];
                                                                $_yZCHGP21 = explode('|', $_xZCHGP21);
                                                                $_oZPERP21 = $_yZCHGP21[1];
                                                                $_oZMAXP21 = $_yZCHGP21[2];

                                                                $_oZPJKKJN = $_oFnl['FPJKKJN'];
                                                                $_oZPJKKJD = $_oFnl['FPJKKJD'];

                                                                if (empty(trim($_oZENDDTE))) {

                                                                    $_oZINJD01;
                                                                    $_oZINJD02;
                                                                    $_oZINJD03;
                                                                    $_oZINJD04;
                                                                    $_oZINJD05;
                                                                    $_oZINJD06;
                                                                    $_oZINJD07;
                                                                    $_oZDEJD02;

                                                                    $_oSta = $_oZSTADTE;
                                                                    $_oEnd = $_oZENDDTE;

                                                                    if (empty(trim($_oSta))) {
                                                                        $_xSta = substr($_oZPERIOD, 0, 4) . '-01-01';
                                                                    } else {
                                                                        $_xSta = $_oSta;
                                                                    }

                                                                    if (empty(trim($_oEnd))) {
                                                                        $_xEnd = substr($_oZPERIOD, 0, 4) . '-12-31';
                                                                    } else {
                                                                        if (substr($_oSta, 4, 2) !== substr($_oEnd, 4, 2)) {
                                                                            $_xEnd = substr($_oZPERIOD, 0, 4) . '-12-31';
                                                                        } else {
                                                                            $_xEnd = $_oEnd;
                                                                        }
                                                                    }

                                                                    $_oCnt = '';
                                                                    $_oCnt = 1 + (date("Y", strtotime($_xEnd)) - date("Y", strtotime($_xSta))) * 12;
                                                                    $_oCnt += date("m", strtotime($_xEnd)) - date("m", strtotime($_xSta));
                                                                    if ($_oCnt >= 12) {
                                                                        $_oMon = 12;
                                                                    } else {
                                                                        if (strtolower($_oFWRKTYP) == 'l') {
                                                                            $_oMon = $_oCnt;
                                                                        } elseif (strtolower($_oFWRKTYP) == 'e') {
                                                                            $_oMon = $_oCnt;
                                                                        }
                                                                    }


                                                                    $_oZBRTOJD_1 = $_oZBRUJD2;

                                                                    $_oZPSTNJD_1 = (intval($_oZBRTOJD_1) * intval($_oZPERCEN)) / 100;

                                                                    if ($_oZPSTNJD_1 > (intval($_oMon) * intval($_oZMAXVAL))) {
                                                                        $_oZPSTNJD_1 = (intval($_oMon) * intval($_oZMAXVAL));
                                                                    } else {
                                                                        $_oZPSTNJD_1 = $_oZPSTNJD_1;
                                                                    }


                                                                    $_oZPENSJD_1 = $_oZDEJD02;
                                                                    

                                                                    $_oZMNUSJD_1 = $_oZPSTNJD_1 + $_oZPENSJD_1;

                                                                    $_oZNETOJD_1 = $_oZBRTOJD_1 - $_oZMNUSJD_1;

                                                                    $_oZPTKPZZ_1 = $_oZPTKPZZ;

                                                                    $_xZPKPZJD_1 = intval($_oZNETOJD_1) - intval($_oZPTKPZZ_1);
                                                                    $_yZPKPZJD_1 = (int) ($_xZPKPZJD_1 / 1000);
                                                                    $_oZPKPZJD_1 = $_yZPKPZJD_1 * 1000;

                                                                    $_xZPKPRJD_1 = intval($_oZNETOJD_1) - intval($_oZPTKPZZ_1);
                                                                    $_yZPKPRJD_1 = (int) ($_xZPKPRJD_1 / 1000);
                                                                    $_oZPKPRJD_1 = $_yZPKPRJD_1 * 1000;


                                                                    $_oPrc = explode(';', $_oZPERP21);
                                                                    $_oVal = explode(';', $_oZMAXP21);
                                                                    $_oPkp = $_oZPKPRJD_1;
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
                                                                                } else {
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
                                                                                } else {
                                                                                    $_aP21 = 0;
                                                                                    $_bP21 = 0;
                                                                                    $_cP21 = 0;
                                                                                    $_dP21 = 0;
                                                                                }

                                                                                break;
                                                                        }
                                                                    }
                                                                    $_oZPJKKJD_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);


                                                                    $_oPrc = explode(';', $_oZPERP21);
                                                                    $_oVal = explode(';', $_oZMAXP21);
                                                                    $_oPkp = intval($_oZPKPRJD_1) - intval($_oZINJD07);
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
                                                                                } else {
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
                                                                                } else {
                                                                                    $_aP21 = 0;
                                                                                    $_bP21 = 0;
                                                                                    $_cP21 = 0;
                                                                                    $_dP21 = 0;
                                                                                }

                                                                                break;
                                                                        }
                                                                    }
                                                                    $_oZP21RJD_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);

                                                                    if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                                        $_oZPJKKJD = $_oZPJKKJD_1;
                                                                        $_oZP21RJD = $_oZP21RJD_1;
                                                                    } elseif ($_yNwp == '000000000000000') {
                                                                        $_oZPJKKJD = 1.2 * $_oZPJKKJD_1;
                                                                        $_oZP21RJD = 1.2 * $_oZP21RJD_1;
                                                                    } else {
                                                                        $_oZPJKKJD = 1.2 * $_oZPJKKJD_1;
                                                                        $_oZP21RJD = 1.2 * $_oZP21RJD_1;
                                                                    }


                                                                    $_updFINDES = array(
                                                                        'FSKCEKI' => '123',
                                                                        'FPJKKJD' => $_oZPJKKJD,
                                                                        'FP21RJD' => $_oZP21RJD,
                                                                        'FP21IJD' => intval($_oZPJKKJD) - intval($_oZP21RJD),
                                                                        'FPJKKBX' => intval($_oZPJKKJD) - intval($_oZPJKKJN),
                                                                        'FPSTNJD' => $_oZPSTNJD_1,
                                                                        'FPENSJD' => $_oZPENSJD_1,
                                                                        'FMNUSJD' => $_oZMNUSJD_1,
                                                                        'FNETOJD' => $_oZNETOJD_1,
                                                                        'FPKPZJD' => $_oZPKPZJD_1,
                                                                        'FPKPRJD' => intval($_oZPKPRJD_1) - intval($_oZINJD07)
                                                                    );

                                                                    $this->db->where('FFLGTAX', 'hstp21');
                                                                    $this->db->where('FPROFLE', $_oZPROFLE);
                                                                    $this->db->where('substr(FPERIOD,5,2)', '12');
                                                                    $this->db->like('FTYPEZZ', 'e', 'after');
                                                                    $this->db->update('ttaxhst', $_updFINDES);
                                                                } else {

                                                                    $_updFINDES = array(
                                                                        'FSKCEKI' => 'XXX',
                                                                        'FPJKKJD' => $_oZPJKKJD,
                                                                        'FPJKKBX' => intval($_oZPJKKJD) - intval($_oZPJKKJN)
                                                                    );

                                                                    $this->db->where('FFLGTAX', 'hstp21');
                                                                    $this->db->where('FPROFLE', $_oZPROFLE);
                                                                    $this->db->where('substr(FPERIOD,5,2)', '12');
                                                                    $this->db->like('FTYPEZZ', 'e', 'after');
                                                                    $this->db->update('ttaxhst', $_updFINDES);
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if ($_oFCLCP21 == 'gu') {
                                                        $_oRow['B'] = trim($this->sklibrfnc->_fGETNumOnl($_oRow['B']));
                                                        $_oFPERIOD = $_oRow['B'];
                                                        $_oFPROFLE = $_oRow['C'];
                                                        $_oTyp = trim($_oRow['D']);
                                                        echo substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8);
                                                        if ((!empty($_oTyp) && (strtolower(substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8))) == '_#resign')) {
                                                            $_oFTYPEZZ = 'emx';
                                                            $_oFFULNME = str_replace('_#RESIGN', '', $_oRow['D']);

                                                            $_updENDDTE = array(
                                                                'FENDDTE' => $this->sklibrfnc->_fGETLstDay($_varFPERIOD)
                                                            );

                                                            $this->db->where('FCODEZZ', $_oFPROFLE);
                                                            $this->db->update('tprofle', $_updENDDTE);
                                                        } elseif ((!empty($_oTyp) && (strtolower(substr(trim($_oTyp), strlen(trim($_oTyp)) - 8, 8))) !== '_#resign')) {
                                                            $_oFTYPEZZ = 'emp';
                                                            $_oFFULNME = $_oRow['D'];
                                                        }
                                                        if ($_varFREVISI == '0') {
                                                            $_oFREVISI = '-1';
                                                        } else {
                                                            $_oFREVISI = $_varFREVISI;
                                                        }

                                                        $this->db->select('tprofle.FCODEZZ, tprofle.FFULNME, tprofle.FWRKTYP, tprofle.FSTADTE, tprofle.FENDDTE, tprofle.FMARITL, tprofle.FNPWPZZ, tmaritl.FPTKPCD, tmaritl.FPTKPVL, tprofle.FCHGPST, tchgpst.FPERCEN, tchgpst.FMAXVAL');
                                                        $this->db->from('tprofle');
                                                        $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
                                                        $this->db->join('tchgpst', 'tprofle.FCHGPST = tchgpst.FCODEZZ', 'LEFT');
                                                        $this->db->where('tprofle.FCODEZZ', $_oFPROFLE);
                                                        $_quePROFLE = $this->db->get();

                                                        if ($_quePROFLE->num_rows() > 0) {
                                                            foreach ($_quePROFLE->result_array() as $_oMrt) {
                                                                $_oFMARITL = $_oMrt['FMARITL'] . ';' . $_oMrt['FPTKPCD'] . ';' . $_oMrt['FPTKPVL'];
                                                                $_oFCHGPST = $_oMrt['FCHGPST'] . ';' . $_oMrt['FPERCEN'] . ';' . $_oMrt['FMAXVAL'];
                                                                $_oFNPWPZZ = $_oMrt['FNPWPZZ'];
                                                                $_oFWRKTYP = $_oMrt['FWRKTYP'];
                                                                $_oFSTADTE = $_oMrt['FSTADTE'];
                                                                $_oFENDDTE = $_oMrt['FENDDTE'];

                                                                $_xNwp = explode(';', $_oFNPWPZZ);
                                                                $_yNwp = $_xNwp[1];
                                                            }
                                                        } else {
                                                            
                                                        }

                                                        $this->db->select('tprofle.FCODEZZ, tprofle.FFULNME, tprofle.FCHGP21, tprofle.FCLCP21, tchgp21.FPERCEN, tchgp21.FMAXVAL');
                                                        $this->db->from('tprofle');
                                                        $this->db->join('tchgp21', 'tprofle.FCHGP21 = tchgp21.FCODEZZ', 'LEFT');
                                                        $this->db->where('tprofle.FCODEZZ', $_oFPROFLE);
                                                        $_quePROFLE = $this->db->get();

                                                        if ($_quePROFLE->num_rows() > 0) {
                                                            foreach ($_quePROFLE->result_array() as $_oP21) {
                                                                $_oFCHGP21 = $_oP21['FCHGP21'] . '|' . $_oP21['FPERCEN'] . '|' . $_oP21['FMAXVAL'];
                                                            }
                                                        } else {
                                                            
                                                        }


                                                        $_oFINCR01 = preg_replace('/[^0-9\-]/', '', $_oRow['E']);

                                                        $_oFINCR02 = preg_replace('/[^0-9\-]/', '', $_oRow['F']);

                                                        $_oCek = preg_replace('/[^\(\)]/', '', $_oRow['G']);
                                                        if (strpos($_oCek, '()') !== false) {
                                                            $_oFINCR03 = '-' . preg_replace('/[^0-9\-]/', '', $_oRow['G']);
                                                        } elseif (strpos($_oCek, '()') == false) {
                                                            $_oFINCR03 = preg_replace('/[^0-9\-]/', '', $_oRow['G']);
                                                        }

                                                        $_oFINCR04 = preg_replace('/[^0-9\-]/', '', $_oRow['H']);

                                                        $_oFPREJKK = preg_replace('/[^0-9\-]/', '', $_oRow['I']);
                                                        $_oFPREJKM = preg_replace('/[^0-9\-]/', '', $_oRow['J']);
                                                        $_oFPREKES = preg_replace('/[^0-9\-]/', '', $_oRow['K']);
                                                        $_oFINCR05 = $this->sklibrfnc->_fGETNumOnl($_oFPREJKK) + $this->sklibrfnc->_fGETNumOnl($_oFPREJKM) + $this->sklibrfnc->_fGETNumOnl($_oFPREKES);


                                                        $_oFINCR06 = preg_replace('/[^0-9\-]/', '', $_oRow['L']);

                                                        $_oFINCR07 = preg_replace('/[^0-9\-]/', '', $_oRow['M']);

                                                        $_oFIURTHT = preg_replace('/[^0-9\-]/', '', $_oRow['N']);
                                                        $_oFIURJPZ = preg_replace('/[^0-9\-]/', '', $_oRow['O']);
                                                        $_oFDECR02 = $this->sklibrfnc->_fGETNumOnl($_oFIURTHT) + $this->sklibrfnc->_fGETNumOnl($_oFIURJPZ);

                                                        $_oFPJKKBY = '-1';
                                                        $CEKOMBAK = $_oFPJKKBY;
                                                        $_oCnt = 0;

                                                        while ($_oCnt < 1000) {
                                                            if (round($_oFINCR02) == round($_oFPJKKBY)) {
                                                                break;
                                                            }
                                                            $_oCnt++;

                                                            $_oFINCR02 = round($_oFPJKKBY);

                                                            $_oSta = $_oMrt['FSTADTE'];
                                                            $_oEnd = $_oMrt['FENDDTE'];

                                                            if (empty(trim($_oSta))) {
                                                                $_xSta = substr($_oFPERIOD, 0, 4) . '-01-01';
                                                            } else {
                                                                $_xSta = $_oSta;
                                                            }

                                                            if (empty(trim($_oEnd))) {
                                                                $_xEnd = substr($_oFPERIOD, 0, 4) . '-12-31';
                                                            } else {
                                                                if (substr($_oSta, 4, 2) !== substr($_oEnd, 4, 2)) {
                                                                    $_xEnd = substr($_oFPERIOD, 0, 4) . '-12-31';
                                                                } else {
                                                                    $_xEnd = $_oEnd;
                                                                }
                                                            }

                                                            $_oCnt = '';
                                                            $_oCnt = 1 + (date("Y", strtotime($_xEnd)) - date("Y", strtotime($_xSta))) * 12;
                                                            $_oCnt += date("m", strtotime($_xEnd)) - date("m", strtotime($_xSta));
                                                            if ($_oCnt >= 12) {
                                                                $_oMon = 12;
                                                            } else {
                                                                if (strtolower($_oFWRKTYP) == 'l') {
                                                                    $_oMon = $_oCnt;
                                                                } elseif (strtolower($_oFWRKTYP) == 'e') {
                                                                    $_oMon = 12;
                                                                }
                                                            }


                                                            $_oFBRUTO2_1 = intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06) + intval($_oFINCR07);

                                                            $_oFBRTO12_1 = (intval($_oMon) * (intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06))) + (intval($_oFINCR07));

                                                            $_xFDECR01_1 = (intval($_oFBRUTO2_1) * intval($_oMrt['FPERCEN'])) / 100;
                                                            if ($_xFDECR01_1 > intval($_oMrt['FMAXVAL'])) {
                                                                $_oFDECR01_1 = intval($_oMrt['FMAXVAL']);
                                                            } else {
                                                                $_oFDECR01_1 = $_xFDECR01_1;
                                                            }

                                                            $_xFPSTN12_1 = (intval($_oFBRTO12_1) * intval($_oMrt['FPERCEN'])) / 100;
                                                            if ($_xFPSTN12_1 > (12 * intval($_oMrt['FMAXVAL']))) {
                                                                $_oFPSTN12_1 = (12 * intval($_oMrt['FMAXVAL']));
                                                            } else {
                                                                $_oFPSTN12_1 = $_xFPSTN12_1;
                                                            }


                                                            $_oFPENS12_1 = intval($_oMon) * $_oFDECR02;

                                                            $_oFMNUS12_1 = $_oFPSTN12_1 + $_oFPENS12_1;

                                                            $_oFNETO12_1 = $_oFBRTO12_1 - $_oFMNUS12_1;

                                                            $_oFPTKPZZ_1 = $_oMrt['FPTKPVL'];

                                                            $_xFPKPZ12_1 = intval($_oFNETO12_1) - intval($_oFPTKPZZ_1);
                                                            $_yFPKPZ12_1 = (int) ($_xFPKPZ12_1 / 1000);
                                                            $_oFPKPZ12_1 = $_yFPKPZ12_1 * 1000;

                                                            $_xFPKPR12_1 = intval($_oFNETO12_1) - intval($_oFPTKPZZ_1);
                                                            $_yFPKPR12_1 = (int) ($_xFPKPR12_1 / 1000);
                                                            $_oFPKPR12_1 = $_yFPKPR12_1 * 1000;

                                                            $_oPrc = explode(';', $_oP21['FPERCEN']);
                                                            $_oVal = explode(';', $_oP21['FMAXVAL']);
                                                            $_oPkp = $_oFPKPR12_1;
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
                                                                        } else {
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
                                                                        } else {
                                                                            $_aP21 = 0;
                                                                            $_bP21 = 0;
                                                                            $_cP21 = 0;
                                                                            $_dP21 = 0;
                                                                        }

                                                                        break;
                                                                }
                                                            }
                                                            $_oFP21R12_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                            $_oFP21H12_1 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                            $_oFP21HMN_1 = (($_aP21 + $_bP21 + $_cP21 + $_dP21) / 12);
                                                            $_oFPJKKBY_1 = $_oFP21HMN_1;
                                                            $_oFP21IRG_1 = $_oFP21R12_1;


                                                            if ((!empty($_oFINCR07)) || (($_oFINCR07 !== 0) && ($_oFINCR07 !== '0'))) {

                                                                $_oFBRUTO2_2 = intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06);

                                                                $_oFBRTO12_2 = (12 * (intval($_oFINCR01) + intval($_oFINCR02) + intval($_oFINCR03) + intval($_oFINCR04) + intval($_oFINCR05) + intval($_oFINCR06)));

                                                                $_xFDECR01_2 = (intval($_oFBRUTO2_2) * intval($_oMrt['FPERCEN'])) / 100;
                                                                if ($_xFDECR01_2 > intval($_oMrt['FMAXVAL'])) {
                                                                    $_oFDECR01_2 = intval($_oMrt['FMAXVAL']);
                                                                } else {
                                                                    $_oFDECR01_2 = $_xFDECR01_2;
                                                                }

                                                                $_xFPSTN12_2 = (intval($_oFBRTO12_2) * intval($_oMrt['FPERCEN'])) / 100;
                                                                if ($_xFPSTN12_2 > (12 * intval($_oMrt['FMAXVAL']))) {
                                                                    $_oFPSTN12_2 = (12 * intval($_oMrt['FMAXVAL']));
                                                                } else {
                                                                    $_oFPSTN12_2 = $_xFPSTN12_2;
                                                                }

                                                                $_oFPENS12_2 = 12 * $_oFDECR02;

                                                                $_oFMNUS12_2 = $_oFPSTN12_2 + $_oFPENS12_2;

                                                                $_oFNETO12_2 = $_oFBRTO12_2 - $_oFMNUS12_2;

                                                                $_oFPTKPZZ_2 = $_oMrt['FPTKPVL'];

                                                                $_xFPKPZ12_2 = intval($_oFNETO12_2) - intval($_oFPTKPZZ_2);
                                                                $_yFPKPZ12_2 = (int) ($_xFPKPZ12_2 / 1000);
                                                                $_oFPKPZ12_2 = $_yFPKPZ12_2 * 1000;

                                                                $_xFPKPR12_2 = intval($_oFNETO12_2) - intval($_oFPTKPZZ_2);
                                                                $_yFPKPR12_2 = (int) ($_xFPKPR12_2 / 1000);
                                                                $_oFPKPR12_2 = $_yFPKPR12_2 * 1000;

                                                                $_oPrc = explode(';', $_oP21['FPERCEN']);
                                                                $_oVal = explode(';', $_oP21['FMAXVAL']);
                                                                $_oPkp = $_oFPKPR12_2;
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
                                                                            } else {
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
                                                                            } else {
                                                                                $_aP21 = 0;
                                                                                $_bP21 = 0;
                                                                                $_cP21 = 0;
                                                                                $_dP21 = 0;
                                                                            }

                                                                            break;
                                                                    }
                                                                }
                                                                $_oFP21R12_2 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                                $_oFP21H12_2 = ($_aP21 + $_bP21 + $_cP21 + $_dP21);
                                                                $_oFP21HMN_2 = (($_aP21 + $_bP21 + $_cP21 + $_dP21) / 12);
                                                                $_oFPJKKBY_2 = $_oFP21HMN_2;
                                                                $_oFP21IRG_2 = $_oFP21R12_2;
                                                            } else {
                                                                $_oFP21R12_2 = 0;
                                                                $_oFP21H12_2 = 0;
                                                                $_oFP21HMN_2 = 0;
                                                                $_oFPJKKBY_2 = 0;
                                                                $_oFP21IRG_2 = 0;
                                                            }

                                                            $_oFBRUTO2 = $_oFBRUTO2_1;
                                                            $_oFBRTO12 = $_oFBRTO12_1;
                                                            $_oFDECR01 = $_oFDECR01_1;
                                                            $_oFPSTN12 = $_oFPSTN12_1;
                                                            $_oFPENS12 = $_oFPENS12_1;
                                                            $_oFMNUS12 = $_oFMNUS12_1;
                                                            $_oFNETO12 = $_oFNETO12_1;
                                                            $_oFPTKPZZ = $_oFPTKPZZ_1;
                                                            $_oFPKPZ12 = $_oFPKPZ12_1;
                                                            $_oFPKPR12 = $_oFPKPR12_1;

                                                            $_oFP21IRG = 0;
                                                            $_oFP21R12 = intval($_oFP21R12_1) - intval($_oFP21R12_2);
                                                            $_oFP21HMN = (intval($_oFP21R12) / intval($_oMon));
                                                            $_oFPJKKBY = $_oFP21HMN;
                                                            $_oFP21H12 = $_oFP21R12;

                                                            if ($_oFTYPEZZ == 'emx') {
                                                                $_oFP21RSG = $_oFP21HMN;
                                                            } else {
                                                                $_oFP21RSG = 0;
                                                            }

                                                            if ((!empty($_oFINCR07)) || (($_oFINCR07 !== 0) && ($_oFINCR07 !== '0'))) {

                                                                $_oFP21IRG = intval($_oFP21IRG_1) - intval($_oFP21IRG_2);
                                                                $_oFP21R12 = intval($_oFP21R12_1) - $_oFP21IRG;
                                                                $_oFP21HMN = (intval($_oFP21R12) / 12) + $_oFP21IRG;
                                                                $_oFPJKKBY = $_oFP21HMN;
                                                                $_oFP21H12 = $_oFP21IRG + $_oFP21R12;
                                                                $_oFPKPR12 = $_oFPKPR12_2;

                                                                if ($_oFTYPEZZ == 'emx') {
                                                                    $_oFP21RSG = $_oFP21HMN;
                                                                } else {
                                                                    $_oFP21RSG = 0;
                                                                }
                                                            }
                                                            if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                                $_oFP21H12 = $_oFP21H12;
                                                                $_oFP21HMN = $_oFP21HMN;
                                                                $_oFP21R12 = $_oFP21R12;
                                                                $_oFP21IRG = $_oFP21IRG;
                                                                $_oFPJKKBY = $_oFPJKKBY;
                                                            } elseif ($_yNwp == '000000000000000') {
                                                                $_oFP21H12 = 1.2 * $_oFP21H12;
                                                                $_oFP21HMN = 1.2 * $_oFP21HMN;
                                                                $_oFP21R12 = 1.2 * $_oFP21R12;
                                                                $_oFP21IRG = 1.2 * $_oFP21IRG;
                                                                $_oFPJKKBY = 1.2 * $_oFPJKKBY;
                                                            } else {
                                                                $_oFP21H12 = 1.2 * $_oFP21H12;
                                                                $_oFP21HMN = 1.2 * $_oFP21HMN;
                                                                $_oFP21R12 = 1.2 * $_oFP21R12;
                                                                $_oFP21IRG = 1.2 * $_oFP21IRG;
                                                                $_oFPJKKBY = 1.2 * $_oFPJKKBY;
                                                            }
                                                        }

                                                        $this->db->select('*');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp21');
                                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                                        $this->db->where('FPROFLE', $_oFPROFLE);
                                                        $this->db->where('FREVISI', $_oFREVISI);
                                                        $_queP21HST = $this->db->get();

                                                        if ($_queP21HST->num_rows() > 0) {

                                                            $_updP21HST = array(
                                                                'FFULNME' => $_oFFULNME,
                                                                'FWRKTYP' => $_oFWRKTYP,
                                                                'FSTADTE' => $_oFSTADTE,
                                                                'FENDDTE' => $_oFENDDTE,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => $_oFTYPEZZ,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FINCR01' => $_oFINCR01,
                                                                'FINCR02' => $_oFINCR02,
                                                                'FINCR03' => $_oFINCR03,
                                                                'FINCR04' => $_oFINCR04,
                                                                'FINCR05' => $_oFINCR05,
                                                                'FPREJKK' => $_oFPREJKK,
                                                                'FPREJKM' => $_oFPREJKM,
                                                                'FPREKES' => $_oFPREKES,
                                                                'FINCR06' => $_oFINCR06,
                                                                'FINCR07' => $_oFINCR07,
                                                                'FBRUTO2' => strval($_oFBRUTO2),
                                                                'FMARITL' => $_oFMARITL,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FCHGPST' => $_oFCHGPST,
                                                                'FDECR01' => $_oFDECR01,
                                                                'FDECR02' => $_oFDECR02,
                                                                'FIURTHT' => $_oFIURTHT,
                                                                'FIURJPZ' => $_oFIURJPZ,
                                                                'FBRTO12' => $_oFBRTO12,
                                                                'FPSTN12' => $_oFPSTN12,
                                                                'FPENS12' => $_oFPENS12,
                                                                'FMNUS12' => $_oFMNUS12,
                                                                'FNETO12' => $_oFNETO12,
                                                                'FPTKPZZ' => $_oFPTKPZZ,
                                                                'FPKPZ12' => $_oFPKPZ12,
                                                                'FPKPR12' => $_oFPKPR12,
                                                                'FCHGP21' => $_oFCHGP21,
                                                                'FP21HMN' => strval(round($_oFP21HMN)),
                                                                'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                'FP21H12' => $_oFP21H12,
                                                                'FP21R12' => $_oFP21R12,
                                                                'FP21IRG' => $_oFP21IRG,
                                                                'FP21RSG' => $_oFP21RSG,
                                                                'FSKCEKI' => '$_oFP21IRG_1 : ' . $_oFP21IRG_1
                                                            );

                                                            $this->db->where('FPERIOD', $_oFPERIOD);
                                                            $this->db->where('FPROFLE', $_oFPROFLE);
                                                            $this->db->where('FREVISI', $_oFREVISI);
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->update('ttaxhst', $_updP21HST);
                                                        } else {

                                                            $_addP21HST = array(
                                                                'FPERIOD' => $_oRow['B'],
                                                                'FPROFLE' => $_oRow['C'],
                                                                'FFULNME' => $_oFFULNME,
                                                                'FWRKTYP' => $_oFWRKTYP,
                                                                'FSTADTE' => $_oFSTADTE,
                                                                'FENDDTE' => $_oFENDDTE,
                                                                'FPERIOX' => $this->sklibrfnc->_fSETTglBln(substr($_oFPERIOD, 4, 2)) . '-' . substr($_oFPERIOD, 0, 4),
                                                                'FTYPEZZ' => $_oFTYPEZZ,
                                                                'FGROUPS' => $_hstFCODEZZ,
                                                                'FREVISI' => $_oFREVISI,
                                                                'FINCR01' => $_oFINCR01,
                                                                'FINCR02' => $_oFINCR02,
                                                                'FINCR03' => $_oFINCR03,
                                                                'FINCR04' => $_oFINCR04,
                                                                'FINCR05' => $_oFINCR05,
                                                                'FPREJKK' => $_oFPREJKK,
                                                                'FPREJKM' => $_oFPREJKM,
                                                                'FPREKES' => $_oFPREKES,
                                                                'FINCR06' => $_oFINCR06,
                                                                'FINCR07' => $_oFINCR07,
                                                                'FBRUTO2' => strval($_oFBRUTO2),
                                                                'FMARITL' => $_oFMARITL,
                                                                'FNPWPZZ' => $_oFNPWPZZ,
                                                                'FCHGPST' => $_oFCHGPST,
                                                                'FDECR01' => $_oFDECR01,
                                                                'FDECR02' => $_oFDECR02,
                                                                'FIURTHT' => $_oFIURTHT,
                                                                'FIURJPZ' => $_oFIURJPZ,
                                                                'FBRTO12' => $_oFBRTO12,
                                                                'FPSTN12' => $_oFPSTN12,
                                                                'FPENS12' => $_oFPENS12,
                                                                'FMNUS12' => $_oFMNUS12,
                                                                'FNETO12' => $_oFNETO12,
                                                                'FPTKPZZ' => $_oFPTKPZZ,
                                                                'FPKPZ12' => $_oFPKPZ12,
                                                                'FPKPR12' => $_oFPKPR12,
                                                                'FCHGP21' => $_oFCHGP21,
                                                                'FP21HMN' => strval(round($_oFP21HMN)),
                                                                'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                'FP21R12' => $_oFP21R12,
                                                                'FP21IRG' => $_oFP21IRG,
                                                                'FP21H12' => $_oFP21H12,
                                                                'FFLGTAX' => 'hstp21',
                                                                'FP21RSG' => $_oFP21RSG,
                                                                'FSKCEKI' => $_oFCLCP21
                                                            );
                                                            $this->db->insert('ttaxhst', $_addP21HST);
                                                        }


                                                        $_oYea = substr($_oFPERIOD, 0, 4);
                                                        $_oPrf = $_oFPROFLE;
                                                        
                                                        $this->db->select('FRECNMB, FCHGPST, FCHGP21, COUNT(*) as XJMLREC, SUM(FINCR01) as XINCR01, SUM(FINCR02) as XINCR02, SUM(FINCR03) as XINCR03, SUM(FINCR04) as XINCR04, SUM(FINCR05) as XINCR05, SUM(FINCR06) as XINCR06, SUM(FINCR07) as XINCR07, SUM(FDECR01) as XDECR01, SUM(FDECR02) as XDECR02, SUM(FBRUTO2) as XBRUTO2');
                                                        $this->db->from('ttaxhst');
                                                        $this->db->where('FFLGTAX', 'hstp21');
                                                        $this->db->where('FPROFLE', $_oPrf);
                                                        $this->db->where_in('FTYPEZZ', ['emp', 'emx']);
                                                        $this->db->like('FPERIOD', $_oYea, 'after');

                                                        $_queC21DTX = $this->db->get();

                                                        foreach ($_queC21DTX->result_array() as $_oDtl) {

                                                            $_oXJMLREC = $_oDtl['XJMLREC'];
                                                            $_oXINCR01 = $_oDtl['XINCR01'];
                                                            $_oXINCR02 = 0;
                                                            $_oXINCR03 = $_oDtl['XINCR03'];
                                                            $_oXINCR04 = $_oDtl['XINCR04'];
                                                            $_oXINCR05 = $_oDtl['XINCR05'];
                                                            $_oXINCR06 = $_oDtl['XINCR06'];
                                                            $_oXINCR07 = $_oDtl['XINCR07'];
                                                            $_oXBRUTO2 = $_oDtl['XBRUTO2'];
                                                            $_zFCHGPST = $_oDtl['FCHGPST'];

                                                            $_oFCHGPST = explode(';', $_zFCHGPST);
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

                                                        $_oFPJKKBY = '-1';
                                                        $CEKOMBAK = $_oFPJKKBY;
                                                        $_oCnt = 0;

                                                        while ($_oCnt < 1000) {
                                                            $a = round($_oFINCR02);
                                                            $b = round($_oFPJKKBY);

                                                            if (round($_oFINCR02) == round($_oFPJKKBY)) {
                                                                break;
                                                            }
                                                            $_oCnt++;


                                                            $_oFINCR02 = round($_oFPJKKBY);


                                                            $this->db->select('FCHGP21');
                                                            $this->db->from('ttaxhst');
                                                            $this->db->where('FTYPEZZ', 'emx');

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
                                                                            } else {
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
                                                                            } else {
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

                                                                $_oYea = substr($_oFPERIOD, 0, 4);
                                                                $_oPrf = $_oFPROFLE;

                                                                $this->db->select('SUM(FPJKKBY) as XPJKKBY');
                                                                $this->db->from('ttaxhst');
                                                                $this->db->where('FFLGTAX', 'hstp21');
                                                                $this->db->where('FPROFLE', $_oPrf);
                                                                $this->db->where('FTYPEZZ', 'emp');
                                                                $this->db->like('FPERIOD', $_oYea, 'after');

                                                                $_queGULUNG = $this->db->get();

                                                                foreach ($_queGULUNG->result_array() as $_oRow) {
                                                                    $_oXGULUNG = $_oRow['XPJKKBY'];
                                                                }
                                                            }

                                                            $this->db->select('*');
                                                            $this->db->from('ttaxhst');
                                                            $this->db->where('FFLGTAX', 'hstp21');
                                                            $this->db->where('FPERIOD', $_oFPERIOD);
                                                            $this->db->where('FPROFLE', $_oFPROFLE);
                                                            $this->db->where('FTYPEZZ', 'emx');
                                                            $this->db->where('FREVISI', $_oFREVISI);
                                                            $_queP21HST = $this->db->get();

                                                            foreach ($_queP21HST->result_array() as $_oRox) {
                                                                $_oFNPWPZZ = $_oRox['FNPWPZZ'];
                                                                $_oFWRKTYP = $_oRox['FWRKTYP'];

                                                                $_xNwp = explode(';', $_oFNPWPZZ);
                                                                $_yNwp = $_xNwp[1];
                                                            }

                                                            if ((!empty($_yNwp)) && ($_yNwp !== '000000000000000')) {
                                                                $_oXP21HMN = $_oXP21HMN;
                                                            } elseif ($_yNwp == '000000000000000') {
                                                                $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                            } else {
                                                                $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                            }

                                                            $_oFPJKKBY = intval($_oXP21HMN) - intval($_oXGULUNG);

                                                            if ($_queP21HST->num_rows() > 0) {

                                                                $_updP21HST = array(
                                                                    'FPJKKBY' => strval(round($_oFPJKKBY)),
                                                                    'FSKCEKI' => $_oXJMLREC . ';' . $_oXINCR01 . ';' . $_oXINCR02 . ';' . $_oXINCR03 . ';' . $_oXINCR04 . ';' . $_oXINCR05 . ';' . $_oXINCR06 . ';' . $_oXINCR07 . ';' . $_oXBRUTO2 . ';' . $_oXCHGPS1 . ';' . $_oXCHGPS2 . ';' . $_zXDECR01 . ';' . $_yXDECR01 . ';' . $_oXDECR01 . ';' . $_oXDECR02 . ';' . $_oXNETTOZ . ';' . $_oXPKPZZZ . '¦' . $a . ';' . $b
                                                                );

                                                                $this->db->where('FPERIOD', $_oFPERIOD);
                                                                $this->db->where('FPROFLE', $_oFPROFLE);
                                                                $this->db->where('FREVISI', $_oFREVISI);
                                                                $this->db->where('FFLGTAX', 'hstp21');
                                                                $this->db->update('ttaxhst', $_updP21HST);
                                                            }
                                                        }
                                                    }
                                                }
                                            }

                                            $_oYea = substr($_oFPERIOD, 0, 4);
                                            if ($_sesFCATGRY == 'client') {
                                                redirect('NocUSERZZ/cfcACTUSR008/c212mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oYea);
                                            } else {
                                                redirect('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_oYea);
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
        case "c21dtl";
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_oFPROFLE = $_tblC21DTL['0']['FPROFLE'];
                $_oFFULNME = $_tblC21DTL['0']['FFULNME'];
                $_oFWRKTYP = $_tblC21DTL['0']['FWRKTYP'];
                $_oFSTADTE = $_tblC21DTL['0']['FSTADTE'];
                $_oFENDDTE = $_tblC21DTL['0']['FENDDTE'];
                $_oFPERIOX = $_tblC21DTL['0']['FPERIOX'];
                $_oFINCR01 = $_tblC21DTL['0']['FINCR01'];
                $_oFINJD01 = $_tblC21DTL['0']['FINJD01'];
                $_oFINCR02 = $_tblC21DTL['0']['FINCR02'];
                $_oFINJD02 = $_tblC21DTL['0']['FINJD02'];
                $_oFINCR03 = $_tblC21DTL['0']['FINCR03'];
                $_oFINJD03 = $_tblC21DTL['0']['FINJD03'];
                $_oFINCR04 = $_tblC21DTL['0']['FINCR04'];
                $_oFINJD04 = $_tblC21DTL['0']['FINJD04'];
                $_oFINCR05 = $_tblC21DTL['0']['FINCR05'];
                $_oFINJD05 = $_tblC21DTL['0']['FINJD05'];
                $_oFINCR06 = $_tblC21DTL['0']['FINCR06'];
                $_oFINJD06 = $_tblC21DTL['0']['FINJD06'];
                $_oFINCR07 = $_tblC21DTL['0']['FINCR07'];
                $_oFINJD07 = $_tblC21DTL['0']['FINJD07'];
                $_oFBRUTO2 = $_tblC21DTL['0']['FBRUTO2'];
                $_oFBRUJD2 = $_tblC21DTL['0']['FBRUJD2'];
                $_oFDECR01 = $_tblC21DTL['0']['FDECR01'];
                $_oFDECR02 = $_tblC21DTL['0']['FDECR02'];
                $_oFBRTO12 = $_tblC21DTL['0']['FBRTO12'];
                $_oFPSTN12 = $_tblC21DTL['0']['FPSTN12'];
                $_oFPSTNJD = $_tblC21DTL['0']['FPSTNJD'];
                $_oFPENS12 = $_tblC21DTL['0']['FPENS12'];
                $_oFPENSJD = $_tblC21DTL['0']['FPENSJD'];
                $_oFMNUS12 = $_tblC21DTL['0']['FMNUS12'];
                $_oFMNUSJD = $_tblC21DTL['0']['FMNUSJD'];
                $_oFNETO12 = $_tblC21DTL['0']['FNETO12'];
                $_oFNETOJD = $_tblC21DTL['0']['FNETOJD'];
                $_oFPTKPZZ = $_tblC21DTL['0']['FPTKPZZ'];
                $_oFPKPZ12 = $_tblC21DTL['0']['FPKPZ12'];
                $_oFPKPZJD = $_tblC21DTL['0']['FPKPZJD'];
                $_oFPKPR12 = $_tblC21DTL['0']['FPKPR12'];
                $_oFPKPRJD = $_tblC21DTL['0']['FPKPRJD'];
                $_oFP21HMN = $_tblC21DTL['0']['FP21HMN'];
                $_oFP21R12 = $_tblC21DTL['0']['FP21R12'];
                $_oFP21RJD = $_tblC21DTL['0']['FP21RJD'];
                $_oFP21H12 = $_tblC21DTL['0']['FP21H12'];
                $_oFP21IRG = $_tblC21DTL['0']['FP21IRG'];
                $_oFP21IJD = $_tblC21DTL['0']['FP21IJD'];
                $_oFPJKKJD = $_tblC21DTL['0']['FPJKKJD'];
                $_oFPJKKJN = $_tblC21DTL['0']['FPJKKJN'];
                $_oFPJKKBX = $_tblC21DTL['0']['FPJKKBX'];
                $_xFMARITL = explode(';', $_tblC21DTL['0']['FMARITL']);
                $_oFMARITL = $_xFMARITL[1];
                $_xFNPWPZZ = $_tblC21DTL['0']['FNPWPZZ'];
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
                $_cmpFMONTHZ = substr($this->uri->segment(10), 0, 3);
                $_cmpFYEARZZ = substr($this->uri->segment(10), 4, 4);
                ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_cmpFYEARZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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

                                    <div class="sk_table_modification2 table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-left" style="white-space: nowrap; width: 10%; cursor: pointer" title="Kode Karyawan (Pegawai)">Kode Karyawan</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 10%; cursor: pointer" title="Nama Karyawan (Pegawai)">Nama Karyawan</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tipe Karyawan (Pegawai)">Tipe Karyawan</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Status Kawin - Tanggungan">Status Tanggungan</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Nomor Pokok Wajib Pajak">NPWP</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tanggal Mulai Kerja">Mulai Kerja</th>
                                                    <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tanggal Berhenti Kerja">Berhenti Kerja</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="text-left" style="white-space: nowrap; width: 10%">
                                                        <?php
                                                        if (!empty($_oFPROFLE)) {
                                                            echo $_oFPROFLE;
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 10%">
                                                        <?php
                                                        if (!empty($_oFFULNME)) {
                                                            echo $_oFFULNME;
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 16%">
                                                        <?php
                                                        if (!empty($_oFWRKTYP)) {
                                                            if ($_oFWRKTYP == 'L') {
                                                                echo 'Lokal';
                                                            } elseif ($_oFWRKTYP == 'E') {
                                                                echo 'Ekspatriat';
                                                            }
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 16%">
                                                        <?php
                                                        if (!empty($_oFMARITL)) {
                                                            echo $_oFMARITL;
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 16%">
                                                        <?php
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
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 16%">
                                                        <?php
                                                        if (!empty($_oFSTADTE)) {
                                                            echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-left" style="white-space: nowrap; width: 16%">
                                                        <?php
                                                        if (!empty($_oFENDDTE)) {
                                                            echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                                        } else {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div <?php
                                    if ($_cmpFMONTHZ !== 'DES') {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> class="row">
                                        <div class="col-lg-12">
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
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php
                                                        if (!empty($_oFBRUTO2)) {
                                                            echo number_format($_oFBRUTO2);
                                                        } else {
                                                            echo number_format(0);
                                                        };
                                                        ?>">
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
                                                                echo '18. PPh 21 atas PKP';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '18. PPh 21 atas PKP';
                                                            } else {
                                                                echo '18. PPh 21 atas PKP';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21H12); ?>">
                                                    </div>
                                                    <div>
                                                        <label class="sk_label_modification" style="color: #808080">
                                                            <?php
                                                            if ($_sesFLNGAGE == 'eng') {
                                                                echo '<font style="color: #808080">19.</font> PPh 21 Terutang Setahun/Disetahunkan';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '<font style="color: #808080">19.</font> PPh 21 Terutang Setahun/Disetahunkan';
                                                            } else {
                                                                echo '<font style="color: #808080">19.</font> PPh 21 Terutang Setahun/Disetahunkan';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21H12); ?>">
                                                    </div>
                                                    <div>
                                                        <label class="sk_label_modification" style="color: #808080">
                                                            <?php
                                                            if ($_sesFLNGAGE == 'eng') {
                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                            } else {
                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21HMN); ?>">
                                                    </div>
                                                    <div>
                                                        <label class="sk_label_modification" style="color: #808080">
                                                            <?php
                                                            if ($_sesFLNGAGE == 'eng') {
                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                            } else {
                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPR12); ?>">
                                                    </div>
                                                    <div>
                                                        <label class="sk_label_modification" style="color: #808080">
                                                            <?php
                                                            if ($_sesFLNGAGE == 'eng') {
                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                            } else {
                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21R12); ?>">
                                                    </div>
                                                    <div>
                                                        <label class="sk_label_modification" style="color: #808080">
                                                            <?php
                                                            if ($_sesFLNGAGE == 'eng') {
                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                            } else {
                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                            };
                                                            ?>&nbsp;:
                                                        </label>
                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21IRG); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div <?php
                                    if ($_cmpFMONTHZ == 'DES') {
                                        echo '';
                                    } else {
                                        echo 'hidden';
                                    }
                                    ?> class="row">
                                        <div class="col-lg-12">
                                                    <?php $_swiTABVIW = 'pjkmsm'; ?>
                                            <div class="bordered-tab-contents">
                                                <ul class="nav nav-tabs" role="tablist" style="background-color: #f8f8f8">
                                                    <li class="<?php
                                                    if ($_swiTABVIW == 'pjkmsm') {
                                                        echo "active";
                                                    } else {
                                                        echo '';
                                                    };
                                                    ?>"><a href="#pjkmsm" data-toggle="tab"><font style="color: #d9534f; font-size: 1.05em"><i class="fas fa-calculator fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                                        <?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Period Calculation (Standard)';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Perhitungan Masa (Standar)';
                                                        } else {
                                                            echo 'Perhitungan Masa (Standar)';
                                                        }
                                                        ?>
                                                        </a>
                                                    </li>

                                                    <li class="<?php
                                                    if ($_swiTABVIW == 'pjkpay') {
                                                        echo "active";
                                                    } else {
                                                        echo '';
                                                    };
                                                    ?>"><a href="#pjkpay" data-toggle="tab"><font style="color: #0275d8; font-size: 1.05em"><i class="fas fa-calculator fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                                        <?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo 'Period Calculation (Last/Final)';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo 'Perhitungan Masa (Terakhir/Final)';
                                                        } else {
                                                            echo 'Perhitungan Masa (Terakhir/Final)';
                                                        }
                                                        ?>
                                                        </a>
                                                    </li>

                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane fade <?php
                                                    if ($_swiTABVIW == 'pjkmsm') {
                                                        echo "in active";
                                                    } else {
                                                        echo '';
                                                    };
                                                    ?>" id="pjkmsm">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="col-lg-12">
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
                                                                                echo '18. PPh 21 atas PKP';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '18. PPh 21 atas PKP';
                                                                            } else {
                                                                                echo '18. PPh 21 atas PKP';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21H12); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '19. PPh 21 Terutang Setahun/Disetahunkan';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '19. PPh 21 Terutang Setahun/Disetahunkan';
                                                                            } else {
                                                                                echo '19. PPh 21 Terutang Setahun/Disetahunkan';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21H12); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            } else {
                                                                                echo '<font style="color: #808080">20.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21HMN); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            } else {
                                                                                echo '<font style="color: #808080">21.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPR12); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            } else {
                                                                                echo '<font style="color: #808080">22.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21R12); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            } else {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21IRG); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="height: 20px;">
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade <?php
                                                    if ($_swiTABVIW == 'pjkpay') {
                                                        echo "in active";
                                                    } else {
                                                        echo '';
                                                    };
                                                    ?>" id="pjkpay">
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                        <div class="col-lg-12">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD01); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD02); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD03); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD04); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD05); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD06); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFINJD07); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFBRUJD2); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPSTNJD); ?>">
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
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPENSJD); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <h5><strong><font style="color: #f0ad4e">(C) Perhitungan PPh 21</font></strong></h5>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '11. Deductions Ammount';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '11. Jumlah Pengurang';
                                                                            } else {
                                                                                echo '11. Jumlah Pengurang';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFMNUSJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '12. Net Income';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '12. Penghasilan Neto';
                                                                            } else {
                                                                                echo '12. Penghasilan Neto';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFNETOJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '13. Previous Past Net Income';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '13. Penghasilan Neto Masa Sebelumnya';
                                                                            } else {
                                                                                echo '13. Penghasilan Neto Masa Sebelumnya';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format('0'); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '14. Net Income a Year/Annualized';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '14. Penghasilan Neto Setahun/Disetahunkan';
                                                                            } else {
                                                                                echo '14. Penghasilan Neto Setahun/Disetahunkan';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFNETOJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '15. Non-Taxable Income (PTKP)';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '15. Penghasilan Tidak Kena Pajak (PTKP)';
                                                                            } else {
                                                                                echo '15. Penghasilan Tidak Kena Pajak (PTKP)';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPTKPZZ); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '16. PKP a Year/Annualized';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '16. PKP Setahun/Disetahunkan';
                                                                            } else {
                                                                                echo '16. PKP Setahun/Disetahunkan';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPZJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '17. PPh 21 for PKP';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '17. PPh 21 atas PKP';
                                                                            } else {
                                                                                echo '17. PPh 21 atas PKP';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPJKKJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '18. Previous PPh 21 Withheld';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '18. PPh 21 Dipotong Masa Sebelumnya';
                                                                            } else {
                                                                                echo '18. PPh 21 Dipotong Masa Sebelumnya';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format('0'); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '19. PPh 21 Owed a Year/Annualized';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '19. PPh 21 Terutang Setahun/Disetahunkan';
                                                                            } else {
                                                                                echo '19. PPh 21 Terutang Setahun/Disetahunkan';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPJKKJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '20. Previous PPh Paid Up';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '20. PPh 21 Yang Sudah Disetor';
                                                                            } else {
                                                                                echo '20. PPh 21 Yang Sudah Disetor';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPJKKJN); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">21.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">21.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            } else {
                                                                                echo '<font style="color: #808080">21.</font> PPh 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPJKKBX); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">22.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">22.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            } else {
                                                                                echo '<font style="color: #808080">22.</font> PKP atas Penghasilan Teratur Setahun';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFPKPRJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            } else {
                                                                                echo '<font style="color: #808080">23.</font> PPh 21 atas Penghasilan Teratur Setahun';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21RJD); ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification" style="color: #808080">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo '<font style="color: #808080">24.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo '<font style="color: #808080">24.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            } else {
                                                                                echo '<font style="color: #808080">24.</font> PPh 21 atas Penghasilan Tidak Teratur';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_oFP21IJD); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="height: 20px;">
                                                                <br>
                                                            </div>
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
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
        case "c21dtx";
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_oFPROFLE = $_tblC21DTX['0']['FPROFLE'];
                $_oFFULNME = $_tblC21DTX['0']['FFULNME'];
                $_oFWRKTYP = $_tblC21DTX['0']['FWRKTYP'];
                $_oFSTADTE = $_tblC21DTX['0']['FSTADTE'];
                $_oFENDDTE = $_tblC21DTX['0']['FENDDTE'];
                $_oFPERIOX = $_tblC21DTX['0']['FPERIOX'];
                $_oFINCR01 = $_tblC21DTX['0']['FINCR01'];
                $_oFINCR02 = $_tblC21DTX['0']['FINCR02'];
                $_oFINCR03 = $_tblC21DTX['0']['FINCR03'];
                $_oFINCR04 = $_tblC21DTX['0']['FINCR04'];
                $_oFINCR05 = $_tblC21DTX['0']['FINCR05'];
                $_oFINCR06 = $_tblC21DTX['0']['FINCR06'];
                $_oFINCR07 = $_tblC21DTX['0']['FINCR07'];
                $_oFBRUTO2 = $_tblC21DTX['0']['FBRUTO2'];
                $_oFDECR01 = $_tblC21DTX['0']['FDECR01'];
                $_oFDECR02 = $_tblC21DTX['0']['FDECR02'];
                $_oFBRTO12 = $_tblC21DTX['0']['FBRTO12'];
                $_oFPSTN12 = $_tblC21DTX['0']['FPSTN12'];
                $_oFPENS12 = $_tblC21DTX['0']['FPENS12'];
                $_oFMNUS12 = $_tblC21DTX['0']['FMNUS12'];
                $_oFNETO12 = $_tblC21DTX['0']['FNETO12'];
                $_oFPTKPZZ = $_tblC21DTX['0']['FPTKPZZ'];
                $_oFPKPZ12 = $_tblC21DTX['0']['FPKPZ12'];
                $_oFPKPR12 = $_tblC21DTX['0']['FPKPR12'];
                $_oFP21HMN = $_tblC21DTX['0']['FP21HMN'];
                $_oFP21R12 = $_tblC21DTX['0']['FP21R12'];
                $_oFP21H12 = $_tblC21DTX['0']['FP21H12'];
                $_oFP21IRG = $_tblC21DTX['0']['FP21IRG'];
                $_xFMARITL = explode(';', $_tblC21DTX['0']['FMARITL']);
                $_oFMARITL = $_xFMARITL[1];
                $_xFNPWPZZ = $_tblC21DTX['0']['FNPWPZZ'];
                if (substr_count($_xFNPWPZZ, ';') == 0) {
                    $_yFNPWPZZ = ';';
                } else {
                    $_yFNPWPZZ = $_xFNPWPZZ;
                }
                $_zFNPWPZZ = explode(';', $_yFNPWPZZ);
                $_oFNPWPZZ = trim($_zFNPWPZZ[1]);

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

                    $this->db->select('FRECNMB, FCHGPST, FMARITL, FCHGP21, COUNT(*) as XJMLREC, SUM(FINCR01) as XINCR01, SUM(FINCR02) as XINCR02, SUM(FINCR03) as XINCR03, SUM(FINCR04) as XINCR04, SUM(FINCR05) as XINCR05, SUM(FINCR06) as XINCR06, SUM(FINCR07) as XINCR07, SUM(FDECR01) as XDECR01, SUM(FDECR02) as XDECR02, SUM(FBRUTO2) as XBRUTO2');
                    $this->db->from('ttaxhst');
                    $this->db->where('FFLGTAX', 'hstp21');
                    $this->db->where('FPROFLE', $_oPrf);
                    $this->db->where_in('FTYPEZZ', ['emp', 'emx']);
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

                        $_oFMARITL = $_oDtl['FMARITL'];
                        $_yFMARITL = explode(';', $_oFMARITL);
                        $_xFMARITL = $_yFMARITL[2] * 10;
                        $_zFMARITL = $_yFMARITL[1];

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

                        $_xXPKPZZZ = intval($_oXNETTOZ) - (intval($_xFMARITL) * 10);
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
                                    } else {
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
                                    } else {
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

                        $_oYea = substr($this->uri->segment(10), 4, 4);
                        $_oPrf = $this->uri->segment(9);

                        $this->db->select('SUM(FPJKKBY) as XPJKKBY');
                        $this->db->from('ttaxhst');
                        $this->db->where('FFLGTAX', 'hstp21');
                        $this->db->where('FPROFLE', $_oPrf);
                        $this->db->where('FTYPEZZ', 'emp');
                        $this->db->like('FPERIOD', $_oYea, 'after');

                        $_queGULUNG = $this->db->get();

                        foreach ($_queGULUNG->result_array() as $_oRow) {
                            $_oXGULUNG = $_oRow['XPJKKBY'];
                        }
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="pull-left">
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                        <div class="col-lg-12">
                                            <div class="sk_table_modification2 table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left" style="white-space: nowrap; width: 10%; cursor: pointer" title="Kode Karyawan (Pegawai)">Kode Karyawan</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 10%; cursor: pointer" title="Nama Karyawan (Pegawai)">Nama Karyawan</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tipe Karyawan (Pegawai)">Tipe Karyawan</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Status Kawin - Tanggungan">Status Tanggungan</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Nomor Pokok Wajib Pajak">NPWP</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tanggal Mulai Kerja">Mulai Kerja</th>
                                                            <th class="text-left" style="white-space: nowrap; width: 16%; cursor: pointer" title="Tanggal Berhenti Kerja">Berhenti Kerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-left" style="white-space: nowrap; width: 10%">
                                                                <?php
                                                                if (!empty($_oFPROFLE)) {
                                                                    echo $_oFPROFLE;
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 10%">
                                                                <?php
                                                                if (!empty($_oFFULNME)) {
                                                                    echo $_oFFULNME;
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 16%">
                                                                <?php
                                                                if (!empty($_oFWRKTYP)) {
                                                                    if ($_oFWRKTYP == 'L') {
                                                                        echo 'Lokal';
                                                                    } elseif ($_oFWRKTYP == 'E') {
                                                                        echo 'Ekspatriat';
                                                                    }
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 16%">
                                                                <?php
                                                                if (!empty($_zFMARITL)) {
                                                                    echo $_zFMARITL;
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 16%">
                                                                <?php
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
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 16%">
                                                                <?php
                                                                if (!empty($_oFSTADTE)) {
                                                                    echo $this->sklibrfnc->_fSETDteInd($_oFSTADTE);
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-left" style="white-space: nowrap; width: 16%">
                                                                <?php
                                                                if (!empty($_oFENDDTE)) {
                                                                    echo $this->sklibrfnc->_fSETDteInd($_oFENDDTE);
                                                                } else {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
                                                <input type="text" style="text-align: right; font-size: 15px; font-weight: bolder; color: #000000; background-color: #fafafa" name="_finFNPWPZZ" class="form-control" autofocus readonly value="<?php echo number_format($_xFMARITL * 10); ?>">
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
                                                        echo '<font style="color: #808080">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                        echo '<font style="color: #808080">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    } else {
                                                        echo '<font style="color: #808080">14.</font> PPh Pasal 21 Terutang Bulan ' . '<font style="color: #ff0000";>' . $this->uri->segment(10) . '</font>';
                                                    };
                                                    ?>&nbsp;:
                                                </label>
                                                <?php
                                                if ((!empty($_oFNPWPZZ)) && ($_oFNPWPZZ !== '000000000000000')) {
                                                    $_oXP21HMN = $_oXP21HMN;
                                                } elseif ($_oFNPWPZZ == '000000000000000') {
                                                    $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                } else {
                                                    $_oXP21HMN = 1.2 * $_oXP21HMN;
                                                }
                                                ?>
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
        case "c212st":
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
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Total Penghasilan Bruto</th>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">PPh 21 KB (LB)</th>
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
                                            'ttaxhst.FFLGTAX = ' => 'hstp21'
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
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FBRUTO2'])) {
                                                        echo number_format($_oRow['FBRUTO2']);
                                                    } else {
                                                        echo number_format($_oRow['FBRTO12']);
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-right" style="white-space: nowrap; width: 1%">
                                                    <?php
                                                    if (!empty($_oRow['FPJKKBY'])) {
                                                        echo number_format($_oRow['FPJKKBY']);
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
                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c212mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_oRow['FRECNMB'] . '/' . $_oRow['FPROFLE'] . '/' . substr($_oRow['FPERIOD'], 0, 4) . '/' . $_oRow['FWRKSTA'] . '/' . $_oXREVISI; ?>" title="<?php
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
        case "c212mr" :
            ?>
            <?php
            $_cmpFRECNMB = $this->uri->segment(4);
            $_cmpFCODEZZ = $this->uri->segment(5);
            $_hstFRECNMB = $this->uri->segment(6);
            $_hstFCODEZZ = $this->uri->segment(7);
            $_cmpFYEARZZ = $this->uri->segment(8);
            $_cmpFWRKSTA = $this->uri->segment(9);
            $_cmpFCORREC = $this->uri->segment(10);

            $_oFFULNME = $_tblC212MR['0']['FFULNME'];

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->where('FFLGTAX', 'hstp21');
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c212st'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/rptsmr'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Download (Unduh) Laporan PPh 21 Terutang';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Download (Unduh) Laporan PPh 21 Terutang';
                            } else {
                                echo 'Download (Unduh) Laporan PPh 21 Terutang';
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
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c212pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR008/c212pr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/' . $_oFREVISI;
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
                        <div style="height: 20px;">
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
                                            <label class="sk_label_modification">
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
                                            <input type="text" name="_viwFPERIOX" class="form-control" autofocus readonly value="<?php
                                    echo $_oFPERIOX;
                                    ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
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
                                            <input type="text" name="_viwFREVISI" class="form-control" readonly value="<?php
                                    echo $_oFREVISI;
                                    ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="sk_label_modification">
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
                                                    <th class="text-center" style="white-space: nowrap">Jumlah Pegawai Tetap</th>
                                                    <th class="text-right" style="white-space: nowrap">Total Penghasilan Bruto</th>
                                                    <th class="text-right" style="white-space: nowrap">PPh 21 Terutang</th>
                                                    <th class="text-right" style="white-space: nowrap">Kompensasi</th>
                                                    <th class="text-right" style="white-space: nowrap">PPh 21 KB (LB)</th>
                                                    <th class="text-right" style="white-space: nowrap">Kode Jenis Setoran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($_oFREVISI == '0') {
                                                    $_xFREVISI = '-1';
                                                } else {
                                                    $_xFREVISI = $_oFREVISI;
                                                }

                                                $this->db->select('COUNT(*) AS XCOUNTZ, SUM(if(substr(FPERIOX,1,3) <> "DES", FPJKKBY, FPJKKBX)) as XPJKKBY, SUM(FBRUTO2) AS XBRUTO2, SUM(round(FP21HMN)) AS XP21HMN, SUM(FP21RSG) AS XP21RSG, SUM(FCOMPEN) AS XCOMPEN');
                                                $this->db->from('ttaxhst');
                                                $this->db->where(array(
                                                    'ttaxhst.FGROUPS = ' => $_hstFCODEZZ,
                                                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                                                    'ttaxhst.FFLGTAX = ' => 'hstp21',
                                                    'ttaxhst.FREVISI = ' => $_xFREVISI
                                                        )
                                                );


                                                $this->db->order_by('FPROFLE', 'desc');
                                                $_quePROFLE = $this->db->get();

                                                foreach ($_quePROFLE->result_array() as $_oRow) {
                                                    $_oXCOUNTZ = $_oRow['XCOUNTZ'];
                                                    $_oXBRUTO2 = $_oRow['XBRUTO2'];
                                                    $_oXP21HMN = $_oRow['XP21HMN'];
                                                    $_oXP21RSG = $_oRow['XP21RSG'];
                                                    $_oXCOMPEN = $_oRow['XCOMPEN'];
                                                    $_oXPJKKBY = $_oRow['XPJKKBY'];
                                                }

                                                $_updP21HST = array(
                                                    'FBRTO12' => $_oXBRUTO2,
                                                    'FP21HMN' => $_oXP21HMN,
                                                    'FCOMPEN' => $_oXCOMPEN,
                                                    'FPJKKBY' => $_oXPJKKBY
                                                );

                                                $this->db->where('FRECNMB', $_hstFRECNMB);
                                                $this->db->update('ttaxhst', $_updP21HST);
                                                ?>
                                                <tr style="color: #000000; background-color: #ffffff">
                                                    <td align="center">
                                                        <?php echo $_oXCOUNTZ; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oXBRUTO2)) {
                                                            echo number_format($_oXBRUTO2);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oXPJKKBY)) {
                                                            echo number_format($_oXPJKKBY);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oXCOMPEN)) {
                                                            echo number_format($_oXCOMPEN);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        if (!empty($_oXPJKKBY)) {
                                                            echo number_format($_oXPJKKBY);
                                                        } else {
                                                            echo number_format('0');
                                                        };
                                                        ?>
                                                    </td>
                                                    <td align="right">
                                                        <?php
                                                            echo '411121-100';
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                    <td align="center"><strong>(Total)</strong></td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oXBRUTO2)) {
                                                                echo number_format($_oXBRUTO2);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oXPJKKBY)) {
                                                                echo number_format($_oXPJKKBY);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oXCOMPEN)) {
                                                                echo number_format($_oXCOMPEN);
                                                            } else {
                                                                echo number_format('0');
                                                            };
                                                            ?></strong>
                                                    </td>
                                                    <td class="text-right"><strong><?php
                                                            if (!empty($_oXPJKKBY)) {
                                                                echo number_format($_oXPJKKBY);
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
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcXLSUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/expfrd/' . $_oFPERIOD; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Export PPh 21 Format/Data';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Export Format/Data PPh 21';
                            } else {
                                echo 'Export Format/Data PPh 21';
                            };
                            ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-file-export fa-lg"></i></font>
                            </a>
                            <a <?php
                            if (!empty($_oFAPRFLG)) {
                                if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                    echo 'disabled';
                                } elseif (strtolower(trim($_oFAPRFLG)) == 'n') {
                                    echo '';
                                } else {
                                    echo '';
                                }
                            } else {
                                echo '';
                            }
                            ?> href ="<?php
                                if (!empty($_oFAPRFLG)) {
                                    if (strtolower(trim($_oFAPRFLG)) == 'y') {
                                        echo '#';
                                    } elseif ((strtolower(trim($_oFAPRFLG)) == 'n') || (strtolower(trim($_oFAPRFLG)) !== 'y')) {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    } else {
                                        echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                    }
                                } else {
                                    echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21imp/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . '_impFUSERZZ' . '/' . $_oFPERIOD . '/' . $_oFREVISI;
                                }
                                ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Import Data PPh 21';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Import Data PPh 21';
                                } else {
                                    echo 'Import Data PPh 21';
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
                        <div style="height: 0px;">
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <div class="sk_table_modification2 table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap; width: 1%">Periode</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Gaji/Pensiun atau THT/JHT">GP*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Tunjangan PPh">TP*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Tunjangan Lainnya, Uang Lembur, dan sebagainya">TL*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Honorarium dan Imbalan Lainnya Sejenisnya">HI*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Premi Asuransi yang dibayar Pemberi Kerja">PA*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Natura dan Kenikmatan Lainnya">NK*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR">TB*</th>
                                            <th class="text-right" style="white-space: nowrap; width: 1%; cursor: pointer" title="Iuran Pensiun atau Iuran THT/JHT">IU*</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('FPERIOD, sum(FINCR01) as XINCR01, sum(FINCR02) as XINCR02, sum(FINCR03) as XINCR03, sum(FINCR04) as XINCR04, sum(FINCR05) as XINCR05, sum(FINCR06) as XINCR06, sum(FINCR07) as XINCR07, sum(FDECR02) as XDECR02');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_hstFCODEZZ);
                                        $this->db->where('FTYPEZZ', 'emp');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->group_by('FPERIOD');
                                        $this->db->order_by('FPROFLE, FPERIOD', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                        ?>
                                        <td align="center" style="white-space: nowrap; width: 1%">
                                            <?php
                                                echo $_oRow['FPERIOD'];
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR01'])) || (($_oRow['XINCR01'] == 0) && ($_oRow['XINCR01'] == '0'))) {
                                                echo number_format($_oRow['XINCR01']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR02'])) || (($_oRow['XINCR02'] == 0) && ($_oRow['XINCR02'] == '0'))) {
                                                echo number_format($_oRow['XINCR02']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR03'])) || (($_oRow['XINCR03'] == 0) && ($_oRow['XINCR03'] == '0'))) {
                                                echo number_format($_oRow['XINCR03']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR04'])) || (($_oRow['XINCR04'] == 0) && ($_oRow['XINCR04'] == '0'))) {
                                                echo number_format($_oRow['XINCR04']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR05'])) || (($_oRow['XINCR05'] == 0) && ($_oRow['XINCR05'] == '0'))) {
                                                echo number_format($_oRow['XINCR05']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR06'])) || (($_oRow['XINCR06'] == 0) && ($_oRow['XINCR06'] == '0'))) {
                                                echo number_format($_oRow['XINCR06']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XINCR07'])) || (($_oRow['XINCR07'] == 0) && ($_oRow['XINCR07'] == '0'))) {
                                                echo number_format($_oRow['XINCR07']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>

                                        <td class="text-right" style="white-space: nowrap; width: 1%">
                                            <?php
                                            if ((!empty($_oRow['XDECR02'])) || (($_oRow['XDECR02'] == 0) && ($_oRow['XDECR02'] == '0'))) {
                                                echo number_format($_oRow['XDECR02']);
                                            } else {
                                                echo number_format('0');
                                            };
                                            ?>
                                        </td>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <?php
                                        $this->db->select('FPERIOD, sum(FINCR01) as XINCR01, sum(FINCR02) as XINCR02, sum(FINCR03) as XINCR03, sum(FINCR04) as XINCR04, sum(FINCR05) as XINCR05, sum(FINCR06) as XINCR06, sum(FINCR07) as XINCR07, sum(FDECR02) as XDECR02');
                                        $this->db->from('ttaxhst');
                                        $this->db->where('FGROUPS', $_hstFCODEZZ);
                                        $this->db->where('FTYPEZZ', 'emp');
                                        $this->db->where('FFLGTAX', 'hstp21');
                                        $this->db->where('FPERIOD', $_oFPERIOD);
                                        $this->db->group_by('FPERIOD');
                                        $this->db->order_by('FPROFLE, FPERIOD', 'asc');
                                        $_queC21SMR = $this->db->get();

                                        $_oSeq = 0;
                                        foreach ($_queC21SMR->result_array() as $_oRow) {
                                        }
                                            ?>
                                            
                                        <?php
                                        if(isset($_oRow['XINCR01'])){
                                                $_oRow['XINCR01'] = $_oRow['XINCR01'];
                                            } else {
                                                $_oRow['XINCR01'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR02'])){
                                                $_oRow['XINCR02'] = $_oRow['XINCR02'];
                                            } else {
                                                $_oRow['XINCR02'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR03'])){
                                                $_oRow['XINCR03'] = $_oRow['XINCR03'];
                                            } else {
                                                $_oRow['XINCR03'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR04'])){
                                                $_oRow['XINCR04'] = $_oRow['XINCR04'];
                                            } else {
                                                $_oRow['XINCR04'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR01'])){
                                                $_oRow['XINCR01'] = $_oRow['XINCR01'];
                                            } else {
                                                $_oRow['XINCR01'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR05'])){
                                                $_oRow['XINCR05'] = $_oRow['XINCR05'];
                                            } else {
                                                $_oRow['XINCR05'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR06'])){
                                                $_oRow['XINCR06'] = $_oRow['XINCR06'];
                                            } else {
                                                $_oRow['XINCR06'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XINCR07'])){
                                                $_oRow['XINCR07'] = $_oRow['XINCR07'];
                                            } else {
                                                $_oRow['XINCR07'] = '0';
                                            };
                                            ?>
                                        
                                        <?php
                                        if(isset($_oRow['XDECR02'])){
                                                $_oRow['XDECR02'] = $_oRow['XDECR02'];
                                            } else {
                                                $_oRow['XDECR02'] = '0';
                                            };
                                            ?>
                                        
                                        <tr style="color: #000000; background-color: #dcdcdc">
                                            <td align="center"><strong>(Total)</strong></td>
                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR01'])) || (($_oRow['XINCR01'] == 0) && ($_oRow['XINCR01'] == '0'))) {
                                                    echo number_format($_oRow['XINCR01']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR02'])) || (($_oRow['XINCR02'] == 0) && ($_oRow['XINCR02'] == '0'))) {
                                                    echo number_format($_oRow['XINCR02']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR03'])) || (($_oRow['XINCR03'] == 0) && ($_oRow['XINCR03'] == '0'))) {
                                                    echo number_format($_oRow['XINCR03']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR04'])) || (($_oRow['XINCR04'] == 0) && ($_oRow['XINCR04'] == '0'))) {
                                                    echo number_format($_oRow['XINCR04']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR05'])) || (($_oRow['XINCR05'] == 0) && ($_oRow['XINCR05'] == '0'))) {
                                                    echo number_format($_oRow['XINCR05']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR06'])) || (($_oRow['XINCR06'] == 0) && ($_oRow['XINCR06'] == '0'))) {
                                                    echo number_format($_oRow['XINCR06']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XINCR07'])) || (($_oRow['XINCR07'] == 0) && ($_oRow['XINCR07'] == '0'))) {
                                                    echo number_format($_oRow['XINCR07']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>

                                            <td class="text-right" style="white-space: nowrap; width: 1%; font-weight: bold">
                                                <?php
                                                if ((!empty($_oRow['XDECR02'])) || (($_oRow['XDECR02'] == 0) && ($_oRow['XDECR02'] == '0'))) {
                                                    echo number_format($_oRow['XDECR02']);
                                                } else {
                                                    echo number_format('0');
                                                };
                                                ?>
                                            </td>
                                        </tr>
                                    </tfoot>
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
                                                <td class="text-center" style="white-space: nowrap;  width: 1%">
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
                                                <td class="text-left" style="white-space: nowrap;  width: 1%">
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
                                                <td class="text-left" style="white-space: nowrap;  width: 1%">
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
    case "c21eml" :
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
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Email Dikirimkan</h4>", type: "success", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } elseif ($_sesFLNGAGE == 'ina') {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
                echo '</script>';
            } else {
                echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                echo '<script> $( document ).ready(function() {';
                echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '') . '"}});});';
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