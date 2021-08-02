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
    switch ($_swiUSR021) {
        case "actlst" :
            ?>
            <?php
            $_varXTABVIW = $this->uri->segment(4);
            if (!empty($_varXTABVIW)) {
                $_swiTABVIW = $_varXTABVIW;
            } else {
                $_swiTABVIW = 'pjkmsm';
            }
            ?>
            <div class="well well-sm sk_well_modification0">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="height: 20px;">
                            <br>
                        </div>
                        <div class="rowx">
                            <div class="col-lg-12">
                                <div class="bordered-tab-contents">
                                    <ul class="nav nav-tabs" role="tablist" style="background-color: #f8f8f8">
                                        <li class="<?php
                                        if ($_swiTABVIW == 'pjkmsm') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#pjkmsm" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-clipboard-list fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'MSM Activity';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Aktifitas MSM';
                                            } else {
                                                echo 'Aktifitas MSM';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>

                                        <li class="<?php
                                        if ($_swiTABVIW == 'pjkpay') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#pjkpay" data-toggle="tab"><font style="color: #000080; font-size: 1.00m"><i class="fas fa-coins fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Waiting for Payment';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Menunggu Pembayaran';
                                            } else {
                                                echo 'Menunggu Pembayaran';
                                            }
                                            ?></strong></font>
                                            </a>
                                        </li>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'pjkrpt') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#pjkrpt" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-file-alt fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Waiting for Reporting';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Menunggu Pelaporan';
                                            } else {
                                                echo 'Menunggu Pelaporan';
                                            }
                                            ?></strong></font>
                                            </a>
                                        <li class="<?php
                                        if ($_swiTABVIW == 'pjkarc') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#pjkarc" data-toggle="tab"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-folder-open fa-fw fa-lg" style="font-size: 1.00em"></i></font>&nbsp;
                                            <font style="font-weight: heavy; color: #000080"><strong><?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Files';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Arsip';
                                            } else {
                                                echo 'Arsip';
                                            }
                                            ?></strong></font>
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
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGpjkmsm';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINApjkmsm';
                                                        } else {
                                                            echo '_objINApjkmsm';
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
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'PIC MSM';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'PIC MSM';
                                                                        } else {
                                                                            echo 'PIC MSM';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jenis Pajak';
                                                                        } else {
                                                                            echo 'Jenis Pajak';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Period (Correction)';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa (Pembetulan)';
                                                                        } else {
                                                                            echo 'Masa [Pbt]';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap" title="JUMLAH KURANG BAYAR">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Jumlah KB*';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jumlah KB*';
                                                                        } else {
                                                                            echo 'Jumlah KB*';
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

                                                                if ($_sesFCATGRY == 'staffz') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where_in('FWRKSTA', ['1', '2', '3', '4', '5']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                } else if ($_sesFCATGRY == 'client') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where('FPROFLE', $_sesFCODEZZ);
                                                                    $this->db->where_in('FWRKSTA', ['1', '2', '3', '4', '5']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                }


                                                                $_queTAXHST = $this->db->get();

                                                                foreach ($_queTAXHST->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOX = $_oRow['FPERIOX'];
                                                                    $_oFPJKKBY = $_oRow['FPJKKBY'];
                                                                    $_oFWRKSTA = $_oRow['FWRKSTA'];
                                                                    $_oFREVISI = $_oRow['FREVISI'];
                                                                    if ($_oFREVISI == '-1') {
                                                                        $_oFREVISI = '0';
                                                                    } else {
                                                                        $_oFREVISI = $_oFREVISI;
                                                                    }

                                                                    $_oXRECNMB = $_oRow['XRECNMB'];
                                                                    $_oXCODEZZ = $_oRow['XCODEZZ'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFULNME)) {
                                                                                echo $_oFFULNME;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo 'MSM_Crew'; ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFLGTAX)) {
                                                                                if ($_oFFLGTAX == 'hstp21') {
                                                                                    echo 'Pasal 21';
                                                                                } elseif ($_oFFLGTAX == 'hstp22') {
                                                                                    echo 'Pasal 22';
                                                                                } elseif ($_oFFLGTAX == 'hstp23') {
                                                                                    echo 'Pasal 23';
                                                                                } elseif ($_oFFLGTAX == 'hstp42') {
                                                                                    echo 'Pasal 4(2)';
                                                                                } elseif ($_oFFLGTAX == 'hstp25') {
                                                                                    echo 'Pasal 25';
                                                                                } elseif ($_oFFLGTAX == 'hstp00') {
                                                                                    echo 'PPN';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPERIOX)) {
                                                                                echo $_oFPERIOX . ' [' . $_oFREVISI . ']';
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format(round(intval($_oFPJKKBY)));
                                                                            } else {
                                                                                echo number_format(0);
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; cursor: pointer;" title="<?php
                                                                        if ($_oFWRKSTA == '1') {
                                                                            echo '#Buat template Laporan Pajak';
                                                                        } else if ($_oFWRKSTA == '2') {
                                                                            echo '#Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                                        } else if ($_oFWRKSTA == '3') {
                                                                            echo '#Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                                        } else if ($_oFWRKSTA == '4') {
                                                                            echo '#Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                                        } else if ($_oFWRKSTA == '5') {
                                                                            echo '#Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                                        } else if ($_oFWRKSTA == '6') {
                                                                            echo '#Pembuatan/penerbitan Kode Billing (SSE)';
                                                                        } else if ($_oFWRKSTA == '7') {
                                                                            echo '#Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                                        } else if ($_oFWRKSTA == '8') {
                                                                            echo '#Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                                        } else if ($_oFWRKSTA == '9') {
                                                                            echo '#Selesai';
                                                                        }
                                                                        ?>">
                                                                                <?php
                                                                                if (!empty($_oFWRKSTA)) {
                                                                                    echo '<span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">' . $_oFWRKSTA . '</span>';
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkmsm/' . $_oXRECNMB . '/' . $_oXCODEZZ . '/' . $_oFRECNMB . '/' . $_oFPROFLE . '/' . substr($_oFPERIOX, 4, 4) . '/' . $_oFWRKSTA; ?>" title="<?php
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
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
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
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGpjkpay';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINApjkpay';
                                                        } else {
                                                            echo '_objINApjkpay';
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
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'PIC MSM';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'PIC MSM';
                                                                        } else {
                                                                            echo 'PIC MSM';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jenis Pajak';
                                                                        } else {
                                                                            echo 'Jenis Pajak';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Period';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa';
                                                                        } else {
                                                                            echo 'Masa';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap" title="JUMLAH KURANG BAYAR">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Jumlah KB*';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jumlah KB*';
                                                                        } else {
                                                                            echo 'Jumlah KB*';
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

                                                                if ($_sesFCATGRY == 'staffz') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where_in('FWRKSTA', ['6', '7']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                } else if ($_sesFCATGRY == 'client') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where('FPROFLE', $_sesFCODEZZ);
                                                                    $this->db->where_in('FWRKSTA', ['6', '7']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                }

                                                                $_queTAXHST = $this->db->get();

                                                                foreach ($_queTAXHST->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOX = $_oRow['FPERIOX'];
                                                                    $_oFPJKKBY = $_oRow['FPJKKBY'];
                                                                    $_oFWRKSTA = $_oRow['FWRKSTA'];

                                                                    $_oXRECNMB = $_oRow['XRECNMB'];
                                                                    $_oXCODEZZ = $_oRow['XCODEZZ'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFULNME)) {
                                                                                echo $_oFFULNME;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo 'MSM_Crew'; ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFLGTAX)) {
                                                                                if ($_oFFLGTAX == 'hstp21') {
                                                                                    echo 'Pasal 21';
                                                                                } elseif ($_oFFLGTAX == 'hstp22') {
                                                                                    echo 'Pasal 22';
                                                                                } elseif ($_oFFLGTAX == 'hstp23') {
                                                                                    echo 'Pasal 23';
                                                                                } elseif ($_oFFLGTAX == 'hstp42') {
                                                                                    echo 'Pasal 4(2)';
                                                                                } elseif ($_oFFLGTAX == 'hstp25') {
                                                                                    echo 'Pasal 25';
                                                                                } elseif ($_oFFLGTAX == 'hstp00') {
                                                                                    echo 'PPN';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPERIOX)) {
                                                                                echo $_oFPERIOX;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format(round(intval($_oFPJKKBY)));
                                                                            } else {
                                                                                echo number_format(0);
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; cursor: pointer;" title="<?php
                                                                        if ($_oFWRKSTA == '1') {
                                                                            echo '#Buat template Laporan Pajak';
                                                                        } else if ($_oFWRKSTA == '2') {
                                                                            echo '#Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                                        } else if ($_oFWRKSTA == '3') {
                                                                            echo '#Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                                        } else if ($_oFWRKSTA == '4') {
                                                                            echo '#Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                                        } else if ($_oFWRKSTA == '5') {
                                                                            echo '#Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                                        } else if ($_oFWRKSTA == '6') {
                                                                            echo '#Pembuatan/penerbitan Kode Billing (SSE)';
                                                                        } else if ($_oFWRKSTA == '7') {
                                                                            echo '#Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                                        } else if ($_oFWRKSTA == '8') {
                                                                            echo '#Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                                        } else if ($_oFWRKSTA == '9') {
                                                                            echo '#Selesai';
                                                                        }
                                                                        ?>">
                                                                                <?php
                                                                                if (!empty($_oFWRKSTA)) {
                                                                                    echo '<span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">' . $_oFWRKSTA . '</span>';
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_oXRECNMB . '/' . $_oXCODEZZ . '/' . $_oFRECNMB . '/' . $_oFPROFLE . '/' . substr($_oFPERIOX, 4, 4) . '/' . $_oFWRKSTA; ?>" title="<?php
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
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'pjkrpt') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="pjkrpt">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGpjkrpt';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINApjkrpt';
                                                        } else {
                                                            echo '_objINApjkrpt';
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
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'PIC MSM';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'PIC MSM';
                                                                        } else {
                                                                            echo 'PIC MSM';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jenis Pajak';
                                                                        } else {
                                                                            echo 'Jenis Pajak';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Period';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa';
                                                                        } else {
                                                                            echo 'Masa';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap" title="JUMLAH KURANG BAYAR">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Jumlah KB*';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jumlah KB*';
                                                                        } else {
                                                                            echo 'Jumlah KB*';
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

                                                                if ($_sesFCATGRY == 'staffz') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where_in('FWRKSTA', ['8']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                } else if ($_sesFCATGRY == 'client') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where('FPROFLE', $_sesFCODEZZ);
                                                                    $this->db->where_in('FWRKSTA', ['8']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                }

                                                                $_queTAXHST = $this->db->get();

                                                                foreach ($_queTAXHST->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOX = $_oRow['FPERIOX'];
                                                                    $_oFPJKKBY = $_oRow['FPJKKBY'];
                                                                    $_oFWRKSTA = $_oRow['FWRKSTA'];

                                                                    $_oXRECNMB = $_oRow['XRECNMB'];
                                                                    $_oXCODEZZ = $_oRow['XCODEZZ'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFULNME)) {
                                                                                echo $_oFFULNME;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo 'MSM_Crew'; ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFLGTAX)) {
                                                                                if ($_oFFLGTAX == 'hstp21') {
                                                                                    echo 'Pasal 21';
                                                                                } elseif ($_oFFLGTAX == 'hstp22') {
                                                                                    echo 'Pasal 22';
                                                                                } elseif ($_oFFLGTAX == 'hstp23') {
                                                                                    echo 'Pasal 23';
                                                                                } elseif ($_oFFLGTAX == 'hstp42') {
                                                                                    echo 'Pasal 4(2)';
                                                                                } elseif ($_oFFLGTAX == 'hstp25') {
                                                                                    echo 'Pasal 25';
                                                                                } elseif ($_oFFLGTAX == 'hstp00') {
                                                                                    echo 'PPN';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPERIOX)) {
                                                                                echo $_oFPERIOX;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format(round(intval($_oFPJKKBY)));
                                                                            } else {
                                                                                echo number_format(0);
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; cursor: pointer;" title="<?php
                                                                        if ($_oFWRKSTA == '1') {
                                                                            echo '#Buat template Laporan Pajak';
                                                                        } else if ($_oFWRKSTA == '2') {
                                                                            echo '#Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                                        } else if ($_oFWRKSTA == '3') {
                                                                            echo '#Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                                        } else if ($_oFWRKSTA == '4') {
                                                                            echo '#Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                                        } else if ($_oFWRKSTA == '5') {
                                                                            echo '#Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                                        } else if ($_oFWRKSTA == '6') {
                                                                            echo '#Pembuatan/penerbitan Kode Billing (SSE)';
                                                                        } else if ($_oFWRKSTA == '7') {
                                                                            echo '#Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                                        } else if ($_oFWRKSTA == '8') {
                                                                            echo '#Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                                        } else if ($_oFWRKSTA == '9') {
                                                                            echo '#Selesai';
                                                                        }
                                                                        ?>">
                                                                                <?php
                                                                                if (!empty($_oFWRKSTA)) {
                                                                                    echo '<span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">' . $_oFWRKSTA . '</span>';
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkrpt/' . $_oXRECNMB . '/' . $_oXCODEZZ . '/' . $_oFRECNMB . '/' . $_oFPROFLE . '/' . substr($_oFPERIOX, 4, 4) . '/' . $_oFWRKSTA; ?>" title="<?php
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
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'pjkarc') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="pjkarc">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGpjkarc';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINApjkarc';
                                                        } else {
                                                            echo '_objINApjkarc';
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
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'PIC MSM';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'PIC MSM';
                                                                        } else {
                                                                            echo 'PIC MSM';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jenis Pajak';
                                                                        } else {
                                                                            echo 'Jenis Pajak';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Period';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Masa';
                                                                        } else {
                                                                            echo 'Masa';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap" title="JUMLAH KURANG BAYAR">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Jumlah KB*';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Jumlah KB*';
                                                                        } else {
                                                                            echo 'Jumlah KB*';
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

                                                                if ($_sesFCATGRY == 'staffz') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where_in('FWRKSTA', ['9']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                } else if ($_sesFCATGRY == 'client') {
                                                                    $this->db->select('*,ttaxhst.FRECNMB as FRECNMB, ttaxhst.FPROFLE as FPROFLE,  tprofle.FRECNMB as XRECNMB, tprofle.FCODEZZ as XCODEZZ');
                                                                    $this->db->from('ttaxhst');
                                                                    $this->db->join('tprofle', 'ttaxhst.FPROFLE = tprofle.FCODEZZ', 'LEFT');
                                                                    $this->db->where('ttaxhst.FTYPEZZ', 'cmp');
                                                                    $this->db->where('FPROFLE', $_sesFCODEZZ);
                                                                    $this->db->where_in('FWRKSTA', ['9']);
                                                                    $this->db->order_by('FPROFLE, FFLGTAX, FPERIOD', 'asc');
                                                                }

                                                                $_queTAXHST = $this->db->get();

                                                                foreach ($_queTAXHST->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOX = $_oRow['FPERIOX'];
                                                                    $_oFPJKKBY = $_oRow['FPJKKBY'];
                                                                    $_oFWRKSTA = $_oRow['FWRKSTA'];

                                                                    $_oXRECNMB = $_oRow['XRECNMB'];
                                                                    $_oXCODEZZ = $_oRow['XCODEZZ'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFULNME)) {
                                                                                echo $_oFFULNME;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php echo 'MSM_Crew'; ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFFLGTAX)) {
                                                                                if ($_oFFLGTAX == 'hstp21') {
                                                                                    echo 'Pasal 21';
                                                                                } elseif ($_oFFLGTAX == 'hstp22') {
                                                                                    echo 'Pasal 22';
                                                                                } elseif ($_oFFLGTAX == 'hstp23') {
                                                                                    echo 'Pasal 23';
                                                                                } elseif ($_oFFLGTAX == 'hstp42') {
                                                                                    echo 'Pasal 4(2)';
                                                                                } elseif ($_oFFLGTAX == 'hstp25') {
                                                                                    echo 'Pasal 25';
                                                                                } elseif ($_oFFLGTAX == 'hstp00') {
                                                                                    echo 'PPN';
                                                                                }
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPERIOX)) {
                                                                                echo $_oFPERIOX;
                                                                            } else {
                                                                                echo '...';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format(round(intval($_oFPJKKBY)));
                                                                            } else {
                                                                                echo number_format(0);
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; cursor: pointer;" title="<?php
                                                                        if ($_oFWRKSTA == '1') {
                                                                            echo '#Buat template Laporan Pajak';
                                                                        } else if ($_oFWRKSTA == '2') {
                                                                            echo '#Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                                        } else if ($_oFWRKSTA == '3') {
                                                                            echo '#Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                                        } else if ($_oFWRKSTA == '4') {
                                                                            echo '#Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                                        } else if ($_oFWRKSTA == '5') {
                                                                            echo '#Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                                        } else if ($_oFWRKSTA == '6') {
                                                                            echo '#Pembuatan/penerbitan Kode Billing (SSE)';
                                                                        } else if ($_oFWRKSTA == '7') {
                                                                            echo '#Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                                        } else if ($_oFWRKSTA == '8') {
                                                                            echo '#Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                                        } else if ($_oFWRKSTA == '9') {
                                                                            echo '#Selesai';
                                                                        }
                                                                        ?>">
                                                                                <?php
                                                                                if (!empty($_oFWRKSTA)) {
                                                                                    echo '<span class="badge" style="color: #000000; background-color: #ffd280; width: 30px;">' . $_oFWRKSTA . '</span>';
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkarc/' . $_oXRECNMB . '/' . $_oXCODEZZ . '/' . $_oFRECNMB . '/' . $_oFPROFLE . '/' . substr($_oFPERIOX, 4, 4) . '/' . $_oFWRKSTA; ?>" title="<?php
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
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
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
            <div class="info" style="text-align: center">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="<?php echo base_url(), 'assets/pictures/monitor.json'; ?>" background="transparent"  speed="0.50"  style="width: 1000px; height: 300px;" loop autoplay></lottie-player>         
                
            </div>
            <?php
            break;
        case "ngradd" :
            ?>
            <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actspy/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" method="POST" class="form-horizontal">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $_oYea = date("y");
                $_oMon = date("m");

                $this->db->select('*');
                $this->db->from('tcountr');
                $this->db->like('FCODEZZ', 'NGR' . $_oYea . $_oMon, 'after');
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
                        $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                        $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                    } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                        $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                    } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                        $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                    } elseif ($_oCODEZX > 9999) {
                        $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-' . $_oCODEZX;
                    } else {
                        
                    }
                } else {

                    $_oCODEXX = 'NGR' . $_oYea . $_oMon . '-00001';
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
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR020/ngrlst'; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            echo 'Domicile Country Sequence Nmb.';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'No. Urut Negara Domisili';
                                        } else {
                                            echo 'No. Urut Negara Domisili';
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
                                            echo 'Domicile Country Code';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kode Negara Domisili';
                                        } else {
                                            echo 'Kode Negara Domisili';
                                        }
                                        ?>
                                        <font color="#ff0000">&nbsp;*</font>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFNGRCOD" class="form-control" required oninvalid="<?php
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
                                            echo 'Domicile Country Name';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Nama Negara Domisili';
                                        } else {
                                            echo 'Nama Negara Domisili';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_finFNGRDES" class="form-control" autofocus>
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
        case "ngrsve" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "500px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            /* --- 4 : PRFVIW --- */
            break;
        case "actviw" :
            ?>
            <?php
            $_varXTABVIW = $this->uri->segment(4);
            $_cmpFRECNMB = $this->uri->segment(5);
            $_cmpFCODEZZ = $this->uri->segment(6);
            $_hstFRECNMB = $this->uri->segment(7);
            $_hstFCODEZZ = $this->uri->segment(8);
            $_cmpFYEARZZ = $this->uri->segment(9);
            $_cmpFWRKSTA = $this->uri->segment(10);

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRow) {
                $_oFFULNME = $_oRow['FFULNME'];
                $_oFFLGTAX = $_oRow['FFLGTAX'];
                $_oFPERIOX = $_oRow['FPERIOX'];
                $_oFPJKKBY = $_oRow['FPJKKBY'];
                $_oFWRKSTA = $_oRow['FWRKSTA'];
                $_oFREVISI = $_oRow['FREVISI'];
                if ($_oFREVISI == '-1') {
                    $_oFREVISI = '0';
                } else {
                    $_oFREVISI = $_oFREVISI;
                }
            }
            ?>

            <div <?php
            if ($_varXTABVIW == 'pjkmsm') {
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
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_queTAXHST = $this->db->get();

                            foreach ($_queTAXHST->result_array() as $_oRow) {
                                $_oTax = $_oRow['FFLGTAX'];
                            }

                            if ($_oTax == 'hstp21') {
                                $_oUsr = 'cfcACTUSR008';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c21smr';
                                } else {
                                    $_xTax = 'c212mr';
                                }
                            } else if ($_oTax == 'hstp22') {
                                $_oUsr = 'cfcACTUSR009';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c22smr';
                                } else {
                                    $_xTax = 'c222mr';
                                }
                            } else if ($_oTax == 'hstp23') {
                                $_oUsr = 'cfcACTUSR010';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c23smr';
                                } else {
                                    $_xTax = 'c232mr';
                                }
                            } else if ($_oTax == 'hstp42') {
                                $_oUsr = 'cfcACTUSR011';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c42smr';
                                } else {
                                    $_xTax = 'c422mr';
                                }
                            } else if ($_oTax == 'hstp25') {
                                $_oUsr = 'cfcACTUSR012';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c25smr';
                                } else {
                                    $_xTax = 'c252mr';
                                }
                            }if ($_oTax == 'hstp00') {
                                $_oUsr = 'cfcACTUSR018';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c00smr';
                                } else {
                                    $_xTax = 'c002mr';
                                }
                            }
                            ?>
                            <?php
                            $this->db->select('*');
                            $this->db->from('tpayrpt');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_quePAYRPT = $this->db->get();

                            foreach ($_quePAYRPT->result_array as $_oRoz) {
                                $_oFWRKSTA = $_oRoz('FWRKSTA');
                            }

                            if (($_oFWRKSTA == '1') || ($_oFWRKSTA == '2') || ($_oFWRKSTA == '3') || ($_oFWRKSTA == '4') || ($_oFWRKSTA == '5')) {
                                $_oPjk = 'pjkmsm';
                            } elseif (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7')) {
                                $_oPjk = 'pjkpay';
                            } elseif ($_oFWRKSTA == '8') {
                                $_oPjk = 'pjkrpt';
                            } elseif ($_oFWRKSTA == '9') {
                                $_oPjk = 'pjkarc';
                            }
                            ?>                            
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst/' . $_oPjk; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/' . $_oPjk . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" 
                               title="Edit" style="background-color: #f0ad4e; display: <?php
                               if ($_sesFCATGRY == 'staffz') {
                                   echo '';
                               } else {
                                   echo 'none';
                               };
                               ?>"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/' . $_oUsr . '/' . $_xTax . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Detail Hitung Pajak';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Detail Hitung Pajak';
                            } else {
                                echo 'Detail Hitung Pajak';
                            };
                            ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class = "sk_hr_modification0">
                <div class = "row">
                    <div class = "col-lg-12">
                        <div style = "height: 0px;">
                            <br>
                        </div>
                        <div class = "col-lg-12">
                            <div class = "row">
                                <div class = "col-lg-6">
                                    <label class = "sk_label_modification">
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
                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                    if (!empty($_oFFULNME)) {
                                        echo $_oFFULNME;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Type';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Pajak';
                                        } else {
                                            echo 'Jenis Pajak';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFLGTAX" class="form-control" readonly value="<?php
                                    if (!empty($_oFFLGTAX)) {
                                        if ($_oFFLGTAX == 'hstp21') {
                                            echo 'Pasal 21';
                                        } elseif ($_oFFLGTAX == 'hstp22') {
                                            echo 'Pasal 22';
                                        } elseif ($_oFFLGTAX == 'hstp23') {
                                            echo 'Pasal 23';
                                        } elseif ($_oFFLGTAX == 'hstp42') {
                                            echo 'Pasal 4(2)';
                                        } elseif ($_oFFLGTAX == 'hstp25') {
                                            echo 'Pasal 25';
                                        } elseif ($_oFFLGTAX == 'hstp00') {
                                            echo 'PPN';
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
                                            echo 'Period [Correction]';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Masa [Pbt]';
                                        } else {
                                            echo 'Masa [Pbt]';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                    if (!empty($_oFPERIOX)) {
                                        echo $_oFPERIOX . ' [' . $_oFREVISI . ']';
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Kurang/Lebih Bayar';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Kurang/Lebih Bayar';
                                        } else {
                                            echo 'Kurang/Lebih Bayar';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                    if (!empty($_oFPJKKBY)) {
                                        echo number_format($_oFPJKKBY);
                                    } else {
                                        echo number_format('0');
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Tax Activity Status';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Status Aktifitas Pajak';
                                    } else {
                                        echo 'Status Aktifitas Pajak';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                    if (!empty($_oFWRKSTA)) {
                                        if ($_oFWRKSTA == '1') {
                                            echo '[1]&ensp;Buat template Laporan Pajak';
                                        } else if ($_oFWRKSTA == '2') {
                                            echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                        } else if ($_oFWRKSTA == '3') {
                                            echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                        } else if ($_oFWRKSTA == '4') {
                                            echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                        } else if ($_oFWRKSTA == '5') {
                                            echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                        } else if ($_oFWRKSTA == '6') {
                                            echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                        } else if ($_oFWRKSTA == '7') {
                                            echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                        } else if ($_oFWRKSTA == '8') {
                                            echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                        } else if ($_oFWRKSTA == '9') {
                                            echo '[9]&ensp;Selesai';
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

            <div <?php
            if ($_varXTABVIW == 'pjkpay') {
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
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_queTAXHST = $this->db->get();

                            foreach ($_queTAXHST->result_array() as $_oRow) {
                                $_oTax = $_oRow['FFLGTAX'];
                            }

                            if ($_oTax == 'hstp21') {
                                $_oUsr = 'cfcACTUSR008';
                                $_xTax = 'c21smr';
                            } else if ($_oTax == 'hstp22') {
                                $_oUsr = 'cfcACTUSR009';
                                $_xTax = 'c22smr';
                            } else if ($_oTax == 'hstp23') {
                                $_oUsr = 'cfcACTUSR010';
                                $_xTax = 'c23smr';
                            } else if ($_oTax == 'hstp42') {
                                $_oUsr = 'cfcACTUSR011';
                                $_xTax = 'c42smr';
                            } else if ($_oTax == 'hstp25') {
                                $_oUsr = 'cfcACTUSR012';
                                $_xTax = 'c25smr';
                            }if ($_oTax == 'hstp00') {
                                $_oUsr = 'cfcACTUSR018';
                                $_xTax = 'c00smr';
                            }
                            ?>
                            <?php
                            $this->db->select('*');
                            $this->db->from('tpayrpt');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_quePAYRPT = $this->db->get();

                            foreach ($_quePAYRPT->result_array as $_oRoz) {
                                $_oFWRKSTA = $_oRoz('FWRKSTA');
                            }

                            if (($_oFWRKSTA == '1') || ($_oFWRKSTA == '2') || ($_oFWRKSTA == '3') || ($_oFWRKSTA == '4') || ($_oFWRKSTA == '5')) {
                                $_oPjk = 'pjkmsm';
                            } elseif (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7')) {
                                $_oPjk = 'pjkpay';
                            } elseif ($_oFWRKSTA == '8') {
                                $_oPjk = 'pjkrpt';
                            } elseif ($_oFWRKSTA == '9') {
                                $_oPjk = 'pjkarc';
                            }
                            ?>
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst/' . $_oPjk; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/' . $_oPjk . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" 
                               title="Edit" style="background-color: #f0ad4e; display: <?php
                               if ($_sesFCATGRY == 'staffz') {
                                   echo '';
                               } else {
                                   echo 'none';
                               };
                               ?>"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/' . $_oUsr . '/' . $_xTax . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Detail Hitung Pajak';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Detail Hitung Pajak';
                            } else {
                                echo 'Detail Hitung Pajak';
                            };
                            ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Konfirmasi Pembayaran';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Konfirmasi Pembayaran';
                            } else {
                                echo 'Konfirmasi Pembayaran';
                            };
                            ?>" style="background-color: #5bc0de; display: none">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-coins fa-lg"></i></font>
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
                            <div class="row">
                                <div class="col-lg-5">
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
                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                    if (!empty($_oFFULNME)) {
                                        echo $_oFFULNME;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Type';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Pajak';
                                        } else {
                                            echo 'Jenis Pajak';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                    if (!empty($_oFFLGTAX)) {
                                        if ($_oFFLGTAX == 'hstp21') {
                                            echo 'Pasal 21';
                                        } elseif ($_oFFLGTAX == 'hstp22') {
                                            echo 'Pasal 22';
                                        } elseif ($_oFFLGTAX == 'hstp23') {
                                            echo 'Pasal 23';
                                        } elseif ($_oFFLGTAX == 'hstp42') {
                                            echo 'Pasal 4(2)';
                                        } elseif ($_oFFLGTAX == 'hstp25') {
                                            echo 'Pasal 25';
                                        } elseif ($_oFFLGTAX == 'hstp00') {
                                            echo 'PPN';
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
                                            echo 'Period';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Masa (Periode)';
                                        } else {
                                            echo 'Masa (Periode)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                    if (!empty($_oFPERIOX)) {
                                        echo $_oFPERIOX;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } else {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                    if (!empty($_oFPJKKBY)) {
                                        echo number_format($_oFPJKKBY);
                                    } else {
                                        echo number_format('0');
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Tax Activity Status';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Status Aktifitas Pajak';
                                    } else {
                                        echo 'Status Aktifitas Pajak';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                    if (!empty($_oFWRKSTA)) {
                                        if ($_oFWRKSTA == '1') {
                                            echo '[1]&ensp;Buat template Laporan Pajak';
                                        } else if ($_oFWRKSTA == '2') {
                                            echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                        } else if ($_oFWRKSTA == '3') {
                                            echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                        } else if ($_oFWRKSTA == '4') {
                                            echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                        } else if ($_oFWRKSTA == '5') {
                                            echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                        } else if ($_oFWRKSTA == '6') {
                                            echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                        } else if ($_oFWRKSTA == '7') {
                                            echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                        } else if ($_oFWRKSTA == '8') {
                                            echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                        } else if ($_oFWRKSTA == '9') {
                                            echo '[9]&ensp;Selesai';
                                        }
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Document/Proof of Payment Process';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    } else {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="sk_well_modification6">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div style = "height: 20px;">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pull-left">
                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actsve/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            <hr class="sk_hr_modification1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style = "height: 0px;">
                                                        <br>
                                                    </div>
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGnosett';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAnosett';
                                                        } else {
                                                            echo '_objINAnosett';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="white-space: nowrap">No.</th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Billing Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode Billing';
                                                                        } else {
                                                                            echo 'Kode Billing';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTPN Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode NTPN';
                                                                        } else {
                                                                            echo 'Kode NTPN';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-right" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Nominal';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nominal';
                                                                        } else {
                                                                            echo 'Nominal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_oSeq = 0;

                                                                $this->db->select('*');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOD = $_oRow['FPERIOD'];
                                                                    $_oFBILING = $_oRow['FBILING'];
                                                                    $_oFNTPNZZ = $_oRow['FNTPNZZ'];
                                                                    $_oFNOMINL = $_oRow['FNOMINL'];
                                                                    $_oFDOCUMN = $_oRow['FDOCUMN'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <span class='sk_oldtxt_edit'>
                                                                                <?php
                                                                                if (!empty($_oFBILING)) {
                                                                                    echo $_oFBILING;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                            <input type='text' class='sk_newtxt_edit' data-id='<?php echo $_oFRECNMB; ?>' data-field='FBILING' id='<?php echo $_oFRECNMB; ?>' value='<?php echo $_oFBILING; ?>'>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <span class='sk_oldtxt_edit'>
                                                                                <?php
                                                                                if (!empty($_oFNTPNZZ)) {
                                                                                    echo $_oFNTPNZZ;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                            <input type='text' class='sk_newtxt_edit' data-id='<?php echo $_oFRECNMB; ?>' data-field='FNTPNZZ' id='<?php echo $_oFRECNMB; ?>' value='<?php echo $_oFNTPNZZ; ?>'>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <span class='sk_oldtxt_edit'>
                                                                                <?php
                                                                                if (!empty($_oFNOMINL)) {
                                                                                    echo number_format($_oFNOMINL);
                                                                                } else {
                                                                                    echo number_format('0');
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                            <input type='text' class='sk_newtxt_edit' data-masked-input="999999999999999" maxlength="15" data-id='<?php echo $_oFRECNMB; ?>' data-field='FNOMINL' id='<?php echo $_oFRECNMB; ?>' value='<?php echo $_oFNOMINL; ?>'>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 95%">
                                                                            <?php
                                                                            if (!empty($_oFDOCUMN)) {
                                                                                echo '&ensp;' . $_oFDOCUMN;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            <a data-id="<?php echo $_oFRECNMB . '/' . $_oFCODEZZ; ?>" href="#sk_modal_updpay" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            } else {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwupdpay" style="background: transparent"><font color="#5bc0de"><i class="fas fa-file-upload fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>

                                                                            <a href="#_objMDLDOC" id="<?php echo $_oFDOCUMN; ?>" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'View';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Lihat';
                                                                            } else {
                                                                                echo 'Lihat';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwdocpay" style="background: transparent"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>

                                                                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/paydel/' . $_oFRECNMB . '/' . $_oFCODEZZ; ?>" class="<?php
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
                                                                               ?>"><font color="#ff0000"><i class="fas fa-trash-alt fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>    
                                                            </tbody>
                                                            <tfoot>
                                                                <?php
                                                                $this->db->select('sum(FNOMINL) as XNOMINL');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRox) {
                                                                    $_oXNOMINL = $_oRox['XNOMINL'];
                                                                }
                                                                ?>
                                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                                    <td colspan="3" align="center"><strong>(Total)</strong></td>
                                                                    <td class="text-right"><strong><?php
                                                                            if (!empty($_oXNOMINL)) {
                                                                                echo number_format($_oXNOMINL);
                                                                            } else {
                                                                                echo number_format('0');
                                                                            };
                                                                            ?></strong>
                                                                    </td>
                                                                    <td colspan="2" style="background-color: #f7f7f7"></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div style="height: 0px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style = "height: 10px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>

            <div <?php
            if ($_varXTABVIW == 'pjkrpt') {
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
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_queTAXHST = $this->db->get();

                            foreach ($_queTAXHST->result_array() as $_oRow) {
                                $_oTax = $_oRow['FFLGTAX'];
                            }

                            if ($_oTax == 'hstp21') {
                                $_oUsr = 'cfcACTUSR008';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c21smr';
                                } else {
                                    $_xTax = 'c212mr';
                                }
                            } else if ($_oTax == 'hstp22') {
                                $_oUsr = 'cfcACTUSR009';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c22smr';
                                } else {
                                    $_xTax = 'c222mr';
                                }
                            } else if ($_oTax == 'hstp23') {
                                $_oUsr = 'cfcACTUSR010';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c23smr';
                                } else {
                                    $_xTax = 'c232mr';
                                }
                            } else if ($_oTax == 'hstp42') {
                                $_oUsr = 'cfcACTUSR011';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c42smr';
                                } else {
                                    $_xTax = 'c422mr';
                                }
                            } else if ($_oTax == 'hstp25') {
                                $_oUsr = 'cfcACTUSR012';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c25smr';
                                } else {
                                    $_xTax = 'c252mr';
                                }
                            }if ($_oTax == 'hstp00') {
                                $_oUsr = 'cfcACTUSR018';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c00smr';
                                } else {
                                    $_xTax = 'c002mr';
                                }
                            }
                            ?>
                            <?php
                            $this->db->select('*');
                            $this->db->from('tpayrpt');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_quePAYRPT = $this->db->get();

                            foreach ($_quePAYRPT->result_array as $_oRoz) {
                                $_oFWRKSTA = $_oRoz('FWRKSTA');
                            }

                            if (($_oFWRKSTA == '1') || ($_oFWRKSTA == '2') || ($_oFWRKSTA == '3') || ($_oFWRKSTA == '4') || ($_oFWRKSTA == '5')) {
                                $_oPjk = 'pjkmsm';
                            } elseif (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7')) {
                                $_oPjk = 'pjkpay';
                            } elseif ($_oFWRKSTA == '8') {
                                $_oPjk = 'pjkrpt';
                            } elseif ($_oFWRKSTA == '9') {
                                $_oPjk = 'pjkarc';
                            }
                            ?> 
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst/' . $_oPjk; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/' . $_oPjk . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" 
                               title="Edit" style="background-color: #f0ad4e; display: <?php
                               if ($_sesFCATGRY == 'staffz') {
                                   echo '';
                               } else {
                                   echo 'none';
                               };
                               ?>"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/' . $_oUsr . '/' . $_xTax . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Detail Hitung Pajak';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Detail Hitung Pajak';
                            } else {
                                echo 'Detail Hitung Pajak';
                            };
                            ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
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
                            <div class="row">
                                <div class="col-lg-3">
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
                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                    if (!empty($_oFFULNME)) {
                                        echo $_oFFULNME;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Type';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Pajak';
                                        } else {
                                            echo 'Jenis Pajak';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                    if (!empty($_oFFLGTAX)) {
                                        if ($_oFFLGTAX == 'hstp21') {
                                            echo 'Pasal 21';
                                        } elseif ($_oFFLGTAX == 'hstp22') {
                                            echo 'Pasal 22';
                                        } elseif ($_oFFLGTAX == 'hstp23') {
                                            echo 'Pasal 23';
                                        } elseif ($_oFFLGTAX == 'hstp42') {
                                            echo 'Pasal 4(2)';
                                        } elseif ($_oFFLGTAX == 'hstp25') {
                                            echo 'Pasal 25';
                                        } elseif ($_oFFLGTAX == 'hstp00') {
                                            echo 'PPN';
                                        }
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Period';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Masa (Periode)';
                                        } else {
                                            echo 'Masa (Periode)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                    if (!empty($_oFPERIOX)) {
                                        echo $_oFPERIOX;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } else {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                    if (!empty($_oFPJKKBY)) {
                                        echo number_format($_oFPJKKBY);
                                    } else {
                                        echo number_format('0');
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Tax Activity Status';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Status Aktifitas Pajak';
                                    } else {
                                        echo 'Status Aktifitas Pajak';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                    if (!empty($_oFWRKSTA)) {
                                        if ($_oFWRKSTA == '1') {
                                            echo '[1]&ensp;Buat template Laporan Pajak';
                                        } else if ($_oFWRKSTA == '2') {
                                            echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                        } else if ($_oFWRKSTA == '3') {
                                            echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                        } else if ($_oFWRKSTA == '4') {
                                            echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                        } else if ($_oFWRKSTA == '5') {
                                            echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                        } else if ($_oFWRKSTA == '6') {
                                            echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                        } else if ($_oFWRKSTA == '7') {
                                            echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                        } else if ($_oFWRKSTA == '8') {
                                            echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                        } else if ($_oFWRKSTA == '9') {
                                            echo '[9]&ensp;Selesai';
                                        }
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Document/Proof of Payment Process';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    } else {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="sk_well_modification6">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div style = "height: 20px;">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pull-left">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="sk_hr_modification1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style = "height: 0px;">
                                                        <br>
                                                    </div>
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGnosett';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAnosett';
                                                        } else {
                                                            echo '_objINAnosett';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="white-space: nowrap">No.</th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Billing Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode Billing';
                                                                        } else {
                                                                            echo 'Kode Billing';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTPN Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode NTPN';
                                                                        } else {
                                                                            echo 'Kode NTPN';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Nominal';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nominal';
                                                                        } else {
                                                                            echo 'Nominal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_oSeq = 0;

                                                                $this->db->select('*');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOD = $_oRow['FPERIOD'];
                                                                    $_oFBILING = $_oRow['FBILING'];
                                                                    $_oFNTPNZZ = $_oRow['FNTPNZZ'];
                                                                    $_oFNOMINL = $_oRow['FNOMINL'];
                                                                    $_oFDOCUMN = $_oRow['FDOCUMN'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">    
                                                                            <?php
                                                                                if (!empty($_oFBILING)) {
                                                                                    echo $_oFBILING;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <?php
                                                                                if (!empty($_oFNTPNZZ)) {
                                                                                    echo $_oFNTPNZZ;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <?php
                                                                                if (!empty($_oFNOMINL)) {
                                                                                    echo number_format($_oFNOMINL);
                                                                                } else {
                                                                                    echo number_format('0');
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 95%">
                                                                            <?php
                                                                            if (!empty($_oFDOCUMN)) {
                                                                                echo '&ensp;' . $_oFDOCUMN;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            

                                                                            <a href="#_objMDLDOC" id="<?php echo $_oFDOCUMN; ?>" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'View';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Lihat';
                                                                            } else {
                                                                                echo 'Lihat';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwdocpay" style="background: transparent"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>

                                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>    
                                                            </tbody>
                                                            <tfoot>
                                                                <?php
                                                                $this->db->select('sum(FNOMINL) as XNOMINL');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRox) {
                                                                    $_oXNOMINL = $_oRox['XNOMINL'];
                                                                }
                                                                ?>
                                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                                    <td colspan="3" align="center"><strong>(Total)</strong></td>
                                                                    <td class="text-right"><strong><?php
                                                                            if (!empty($_oXNOMINL)) {
                                                                                echo number_format($_oXNOMINL);
                                                                            } else {
                                                                                echo number_format('0');
                                                                            };
                                                                            ?></strong>
                                                                    </td>
                                                                    <td colspan="2" style="background-color: #f7f7f7"></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div style="height: 0px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style = "height: 10px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Document/Proof of Report';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Dokumen/Bukti Lapor';
                                    } else {
                                        echo 'Dokumen/Bukti Lapor';
                                    };
                                    ?>&nbsp;:
                                </label>

                                <div class="sk_well_modification6">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div style = "height: 20px;">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pull-left">
                                                    <a href="<?php
                                                        $this->db->select('*');
                                                        $this->db->from('tdocrpt');
                                                        $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                        $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                        $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                        $_quePAYRPT = $this->db->get();

                                                        if ($_quePAYRPT->num_rows() > 0) {
                                                            echo '';
                                                        } else {
                                                            echo base_url(), 'NocUSERZZ/cfcACTUSR021/actsv2/pjkrpt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA;
                                                        }
                                                        ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                            <hr class="sk_hr_modification1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style = "height: 0px;">
                                                        <br>
                                                    </div>
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGnosett';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAnosett';
                                                        } else {
                                                            echo '_objINAnosett';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">No.</th>
                                                                    <th class="text-left" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Submission Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Penyampaian';
                                                                        } else {
                                                                            echo 'Tanggal Penyampaian';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-left" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTTE Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode NTTE';
                                                                        } else {
                                                                            echo 'Kode NTTE';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Nominal';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nominal';
                                                                        } else {
                                                                            echo 'Nominal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 95%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_xSeq = 0;

                                                                $this->db->select('*');
                                                                $this->db->from('tdocrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRow) {
                                                                    $_xSeq ++;
                                                                    $_xFRECNMB = $_oRow['FRECNMB'];
                                                                    $_xFCODEZZ = $_oRow['FCODEZZ'];
                                                                    $_xFPROFLE = $_oRow['FPROFLE'];
                                                                    $_xFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_xFDATEZZ = $_oRow['FDATEZZ'];
                                                                    $_xFPERIOD = $_oRow['FPERIOD'];
                                                                    $_xFNTTEZZ = $_oRow['FNTTEZZ'];
                                                                    $_xFNOMINL = $_oRow['FNOMINL'];
                                                                    $_xFDOCUMN = $_oRow['FDOCUMN'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <?php echo $_xSeq . ''; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <span class='sk_oldtxt_edit2'>
                                                                                <?php
                                                                                if (!empty($_xFDATEZZ)) {
                                                                                    echo $this->sklibrfnc->_fSETDteInd($_xFDATEZZ);
                                                                                } else {
                                                                                    echo 'YYYYMMDD';
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                            <input type='text' class='sk_newtxt_edit2' data-id='<?php echo $_xFRECNMB; ?>' data-field='FDATEZZ' id='<?php echo $_xFRECNMB; ?>' value='<?php echo $_xFDATEZZ; ?>'>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%;">
                                                                            <span class='sk_oldtxt_edit2'>
                                                                                <?php
                                                                                if (!empty($_xFNTTEZZ)) {
                                                                                    echo $_xFNTTEZZ;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                            <input type='text' class='sk_newtxt_edit2' data-id='<?php echo $_xFRECNMB; ?>' data-field='FNTTEZZ' id='<?php echo $_xFNTTEZZ; ?>' value='<?php echo $_xFNTTEZZ; ?>'>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap; width: 1%;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format($_oFPJKKBY);
                                                                            } else {
                                                                                echo number_format('0');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 95%;">
                                                                            <?php
                                                                            if (!empty($_xFDOCUMN)) {
                                                                                echo '&ensp;' . $_xFDOCUMN;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <a data-id="<?php echo $_xFRECNMB . '/' . $_xFCODEZZ; ?>" href="#sk_modal_upddoc" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            } else {
                                                                                echo 'Upload (Unggah) Dokumen';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwupddoc" style="background: transparent"><font color="#5bc0de"><i class="fas fa-file-upload fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>

                                                                            <a href="#_objMDLDOC" id="<?php echo $_xFDOCUMN; ?>" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'View';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Lihat';
                                                                            } else {
                                                                                echo 'Lihat';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwdocrpt" style="background: transparent"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>

                                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>    
                                                            </tbody>
                                                        </table>
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style = "height: 10px;">
                                                <br>
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

            <div <?php
            if ($_varXTABVIW == 'pjkarc') {
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
                            <?php
                            $this->db->select('*');
                            $this->db->from('ttaxhst');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_queTAXHST = $this->db->get();

                            foreach ($_queTAXHST->result_array() as $_oRow) {
                                $_oTax = $_oRow['FFLGTAX'];
                            }

                            if ($_oTax == 'hstp21') {
                                $_oUsr = 'cfcACTUSR008';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c21smr';
                                } else {
                                    $_xTax = 'c212mr';
                                }
                            } else if ($_oTax == 'hstp22') {
                                $_oUsr = 'cfcACTUSR009';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c22smr';
                                } else {
                                    $_xTax = 'c222mr';
                                }
                            } else if ($_oTax == 'hstp23') {
                                $_oUsr = 'cfcACTUSR010';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c23smr';
                                } else {
                                    $_xTax = 'c232mr';
                                }
                            } else if ($_oTax == 'hstp42') {
                                $_oUsr = 'cfcACTUSR011';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c42smr';
                                } else {
                                    $_xTax = 'c422mr';
                                }
                            } else if ($_oTax == 'hstp25') {
                                $_oUsr = 'cfcACTUSR012';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c25smr';
                                } else {
                                    $_xTax = 'c252mr';
                                }
                            }if ($_oTax == 'hstp00') {
                                $_oUsr = 'cfcACTUSR018';
                                if ($_sesFCATGRY == 'staffz') {
                                    $_xTax = 'c00smr';
                                } else {
                                    $_xTax = 'c002mr';
                                }
                            }
                            ?>
                            <?php
                            $this->db->select('*');
                            $this->db->from('tpayrpt');
                            $this->db->where('FRECNMB', $_hstFRECNMB);

                            $_quePAYRPT = $this->db->get();

                            foreach ($_quePAYRPT->result_array as $_oRoz) {
                                $_oFWRKSTA = $_oRoz('FWRKSTA');
                            }

                            if (($_oFWRKSTA == '1') || ($_oFWRKSTA == '2') || ($_oFWRKSTA == '3') || ($_oFWRKSTA == '4') || ($_oFWRKSTA == '5')) {
                                $_oPjk = 'pjkmsm';
                            } elseif (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7')) {
                                $_oPjk = 'pjkpay';
                            } elseif ($_oFWRKSTA == '8') {
                                $_oPjk = 'pjkrpt';
                            } elseif ($_oFWRKSTA == '9') {
                                $_oPjk = 'pjkarc';
                            }
                            ?>            
                            &nbsp;
                            &nbsp;
                            <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst/pjkarc'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Back';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Kembali';
                            } else {
                                echo 'Kembali';
                            };
                            ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                            <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR021/actedt/' . $_oPjk . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" 
                               title="Edit" style="background-color: #f0ad4e; display: <?php
                               if ($_sesFCATGRY == 'staffz') {
                                   echo '';
                               } else {
                                   echo 'none';
                               };
                               ?>"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font>
                            </a>

                            <a href="<?= base_url(), 'NocUSERZZ/' . $_oUsr . '/' . $_xTax . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                            if ($_sesFLNGAGE == 'eng') {
                                echo 'Detail Hitung Pajak';
                            } elseif ($_sesFLNGAGE == 'ina') {
                                echo 'Detail Hitung Pajak';
                            } else {
                                echo 'Detail Hitung Pajak';
                            };
                            ?>" style="background-color: #23c9b3">
                                <font style="color: #ffffff; font-size: 17px"><i class="fas fa-paperclip fa-lg"></i></font>
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
                            <div class="row">
                                <div class="col-lg-3">
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
                                    <input type="text" name="_viwFFULNME" class="form-control"  readonly value="<?php
                                    if (!empty($_oFFULNME)) {
                                        echo $_oFFULNME;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="label-mins">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Type';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jenis Pajak';
                                        } else {
                                            echo 'Jenis Pajak';
                                        }
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                    if (!empty($_oFFLGTAX)) {
                                        if ($_oFFLGTAX == 'hstp21') {
                                            echo 'Pasal 21';
                                        } elseif ($_oFFLGTAX == 'hstp22') {
                                            echo 'Pasal 22';
                                        } elseif ($_oFFLGTAX == 'hstp23') {
                                            echo 'Pasal 23';
                                        } elseif ($_oFFLGTAX == 'hstp42') {
                                            echo 'Pasal 4(2)';
                                        } elseif ($_oFFLGTAX == 'hstp25') {
                                            echo 'Pasal 25';
                                        } elseif ($_oFFLGTAX == 'hstp00') {
                                            echo 'PPN';
                                        }
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Period';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Masa (Periode)';
                                        } else {
                                            echo 'Masa (Periode)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                    if (!empty($_oFPERIOX)) {
                                        echo $_oFPERIOX;
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        } else {
                                            echo 'Jumlah KB (Kurang Bayar)';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                    if (!empty($_oFPJKKBY)) {
                                        echo number_format($_oFPJKKBY);
                                    } else {
                                        echo number_format('0');
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Tax Activity Status';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Status Aktifitas Pajak';
                                    } else {
                                        echo 'Status Aktifitas Pajak';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                    if (!empty($_oFWRKSTA)) {
                                        if ($_oFWRKSTA == '1') {
                                            echo '[1]&ensp;Buat template Laporan Pajak';
                                        } else if ($_oFWRKSTA == '2') {
                                            echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                        } else if ($_oFWRKSTA == '3') {
                                            echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                        } else if ($_oFWRKSTA == '4') {
                                            echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                        } else if ($_oFWRKSTA == '5') {
                                            echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                        } else if ($_oFWRKSTA == '6') {
                                            echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                        } else if ($_oFWRKSTA == '7') {
                                            echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                        } else if ($_oFWRKSTA == '8') {
                                            echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                        } else if ($_oFWRKSTA == '9') {
                                            echo '[9]&ensp;Selesai';
                                        }
                                    } else {
                                        echo '...';
                                    }
                                    ?>">
                                </div>
                                <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Document/Proof of Payment Process';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    } else {
                                        echo 'Dokumen/Bukti Proses Pembayaran';
                                    };
                                    ?>&nbsp;:
                                </label>
                                <div class="sk_well_modification6">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div style = "height: 20px;">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pull-left">

                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="sk_hr_modification1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style = "height: 0px;">
                                                        <br>
                                                    </div>
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGnosett';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAnosett';
                                                        } else {
                                                            echo '_objINAnosett';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="white-space: nowrap">No.</th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Billing Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode Billing';
                                                                        } else {
                                                                            echo 'Kode Billing';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-left" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTPN Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode NTPN';
                                                                        } else {
                                                                            echo 'Kode NTPN';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Nominal';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nominal';
                                                                        } else {
                                                                            echo 'Nominal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_oSeq = 0;

                                                                $this->db->select('*');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRow) {
                                                                    $_oSeq ++;
                                                                    $_oFRECNMB = $_oRow['FRECNMB'];
                                                                    $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                                    $_oFPROFLE = $_oRow['FPROFLE'];
                                                                    $_oFFULNME = $_oRow['FFULNME'];
                                                                    $_oFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_oFPERIOD = $_oRow['FPERIOD'];
                                                                    $_oFBILING = $_oRow['FBILING'];
                                                                    $_oFNTPNZZ = $_oRow['FNTPNZZ'];
                                                                    $_oFNOMINL = $_oRow['FNOMINL'];
                                                                    $_oFDOCUMN = $_oRow['FDOCUMN'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <?php echo $_oSeq; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">    
                                                                            <?php
                                                                                if (!empty($_oFBILING)) {
                                                                                    echo $_oFBILING;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <?php
                                                                                if (!empty($_oFNTPNZZ)) {
                                                                                    echo $_oFNTPNZZ;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            <?php
                                                                                if (!empty($_oFNOMINL)) {
                                                                                    echo number_format($_oFNOMINL);
                                                                                } else {
                                                                                    echo number_format('0');
                                                                                }
                                                                                ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 95%">
                                                                            <?php
                                                                            if (!empty($_oFDOCUMN)) {
                                                                                echo '&ensp;' . $_oFDOCUMN;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap;">
                                                                            

                                                                            <a href="#_objMDLDOC" id="<?php echo $_oFDOCUMN; ?>" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'View';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Lihat';
                                                                            } else {
                                                                                echo 'Lihat';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwdocpay" style="background: transparent"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>
                                                                            
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>    
                                                            </tbody>
                                                            <tfoot>
                                                                <?php
                                                                $this->db->select('sum(FNOMINL) as XNOMINL');
                                                                $this->db->from('tpayrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRox) {
                                                                    $_oXNOMINL = $_oRox['XNOMINL'];
                                                                }
                                                                ?>
                                                                <tr style="color: #000000; background-color: #dcdcdc">
                                                                    <td colspan="3" align="center"><strong>(Total)</strong></td>
                                                                    <td class="text-right"><strong><?php
                                                                            if (!empty($_oXNOMINL)) {
                                                                                echo number_format($_oXNOMINL);
                                                                            } else {
                                                                                echo number_format('0');
                                                                            };
                                                                            ?></strong>
                                                                    </td>
                                                                    <td colspan="2" style="background-color: #f7f7f7"></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div style="height: 0px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style = "height: 10px;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div <?php
                            if (($_oFWRKSTA == '6') || ($_oFWRKSTA == '7') || ($_oFWRKSTA == '8') || ($_oFWRKSTA == '9')) {
                                echo '';
                            } else {
                                echo 'hidden';
                            }
                            ?>>
                                <label class="sk_label_modification">
                                    <?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Document/Proof of Report';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Dokumen/Bukti Lapor';
                                    } else {
                                        echo 'Dokumen/Bukti Lapor';
                                    };
                                    ?>&nbsp;:
                                </label>

                                <div class="sk_well_modification6">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div style = "height: 20px;">
                                                <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pull-left">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="sk_hr_modification1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div style = "height: 0px;">
                                                        <br>
                                                    </div>
                                                    <div class="sk_table_modification2 table-responsive">
                                                        <table id="<?php
                                                        if ($_sesFLNGAGE == 'eng') {
                                                            echo '_objENGnosett';
                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                            echo '_objINAnosett';
                                                        } else {
                                                            echo '_objINAnosett';
                                                        }
                                                        ?>" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">No.</th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Submission Date';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Tanggal Penyampaian';
                                                                        } else {
                                                                            echo 'Tanggal Penyampaian';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'NTTE Code';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kode NTTE';
                                                                        } else {
                                                                            echo 'Kode NTTE';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Nominal';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nominal';
                                                                        } else {
                                                                            echo 'Nominal';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 95%;">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Tax Type';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Dokumen/Bukti';
                                                                        } else {
                                                                            echo 'Dokumen/Bukti';
                                                                        };
                                                                        ?>
                                                                    </th>
                                                                    <th class="text-center" style="white-space: nowrap; width: 1%;">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $_xSeq = 0;

                                                                $this->db->select('*');
                                                                $this->db->from('tdocrpt');
                                                                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                                                                $this->db->where('FFLGTAX', $_oFFLGTAX);
                                                                $this->db->order_by('FCODEZZ, FFLGTAX, FPERIOD', 'asc');

                                                                $_quePAYRPT = $this->db->get();

                                                                foreach ($_quePAYRPT->result_array() as $_oRow) {
                                                                    $_xSeq ++;
                                                                    $_xFRECNMB = $_oRow['FRECNMB'];
                                                                    $_xFCODEZZ = $_oRow['FCODEZZ'];
                                                                    $_xFPROFLE = $_oRow['FPROFLE'];
                                                                    $_xFFLGTAX = $_oRow['FFLGTAX'];
                                                                    $_xFDATEZZ = $_oRow['FDATEZZ'];
                                                                    $_xFPERIOD = $_oRow['FPERIOD'];
                                                                    $_xFNTTEZZ = $_oRow['FNTTEZZ'];
                                                                    $_xFNOMINL = $_oRow['FNOMINL'];
                                                                    $_xFDOCUMN = $_oRow['FDOCUMN'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            <?php echo $_xSeq . ''; ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%; background-color: #f0fff0">
                                                                            
                                                                                <?php
                                                                                if (!empty($_xFDATEZZ)) {
                                                                                    echo $this->sklibrfnc->_fSETDteInd($_xFDATEZZ);
                                                                                } else {
                                                                                    echo 'YYYYMMDD';
                                                                                }
                                                                                ?>
                                                                            
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 1%;">
                                                                            
                                                                                <?php
                                                                                if (!empty($_xFNTTEZZ)) {
                                                                                    echo $_xFNTTEZZ;
                                                                                } else {
                                                                                    echo '...';
                                                                                }
                                                                                ?>
                                                                            
                                                                        </td>
                                                                        <td class="text-right" style="white-space: nowrap; width: 1%;">
                                                                            <?php
                                                                            if (!empty($_oFPJKKBY)) {
                                                                                echo number_format($_oFPJKKBY);
                                                                            } else {
                                                                                echo number_format('0');
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-left" style="white-space: nowrap; width: 95%;">
                                                                            <?php
                                                                            if (!empty($_xFDOCUMN)) {
                                                                                echo '&ensp;' . $_xFDOCUMN;
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center" style="white-space: nowrap; width: 1%;">
                                                                            

                                                                            <a href="#_objMDLDOC" id="<?php echo $_xFDOCUMN; ?>" title="<?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'View';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Lihat';
                                                                            } else {
                                                                                echo 'Lihat';
                                                                            };
                                                                            ?>" data-toggle="modal" class="sk_viwdocrpt" style="background: transparent"><font color="#0000ff"><i class="fas fa-search-plus fa-fw" style="font-size: 1.20em"></i></font>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>    
                                                            </tbody>
                                                        </table>
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style = "height: 10px;">
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
                </div>
                <div style="height: 20px;">
                    <br>
                </div>
            </div>

            <?php
            break;
        case "actedt" :
            ?>
            <?php
            $_varXTABVIW = $this->uri->segment(4);
            $_cmpFRECNMB = $this->uri->segment(5);
            $_cmpFCODEZZ = $this->uri->segment(6);
            $_hstFRECNMB = $this->uri->segment(7);
            $_hstFCODEZZ = $this->uri->segment(8);
            $_cmpFYEARZZ = $this->uri->segment(9);
            $_cmpFWRKSTA = $this->uri->segment(10);

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRow) {
                $_oFFULNME = $_oRow['FFULNME'];
                $_oFFLGTAX = $_oRow['FFLGTAX'];
                $_oFPERIOD = $_oRow['FPERIOD'];
                $_oFPERIOX = $_oRow['FPERIOX'];
                $_oFREVISI = $_oRow['FREVISI'];
                $_oFPJKKBY = $_oRow['FPJKKBY'];
                $_oFWRKSTA = $_oRow['FWRKSTA'];
                $_oFREVISI = $_oRow['FREVISI'];
                if ($_oFREVISI == '-1') {
                    $_oFREVISI = '0';
                } else {
                    $_oFREVISI = $_oFREVISI;
                }
            }
            ?>

            <div <?php
            if ($_varXTABVIW == 'pjkmsm') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actupd/pjkmsm/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/flg'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkmsm/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                    <div class="col-lg-6">
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
                                        <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Type';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jenis Pajak';
                                            } else {
                                                echo 'Jenis Pajak';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFLGTAX" class="form-control" readonly value="<?php
                                        if (!empty($_oFFLGTAX)) {
                                            if ($_oFFLGTAX == 'hstp21') {
                                                echo 'Pasal 21';
                                            } elseif ($_oFFLGTAX == 'hstp22') {
                                                echo 'Pasal 22';
                                            } elseif ($_oFFLGTAX == 'hstp23') {
                                                echo 'Pasal 23';
                                            } elseif ($_oFFLGTAX == 'hstp42') {
                                                echo 'Pasal 4(2)';
                                            } elseif ($_oFFLGTAX == 'hstp25') {
                                                echo 'Pasal 25';
                                            } elseif ($_oFFLGTAX == 'hstp00') {
                                                echo 'PPN';
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
                                                echo 'Period [Correction]';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Masa [Pbt]';
                                            } else {
                                                echo 'Masa [Pbt]';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                        if (!empty($_oFPERIOX)) {
                                            echo $_oFPERIOX . ' [' . $_oFREVISI . ']';
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Kurang/Lebih Bayar';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Kurang/Lebih Bayar';
                                            } else {
                                                echo 'Kurang/Lebih Bayar';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_edtFPJKKBY" class="form-control" readonly value="<?php
                                        if (!empty($_oFPJKKBY)) {
                                            echo number_format($_oFPJKKBY);
                                        } else {
                                            echo number_format('0');
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Activity Status';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status Aktifitas Pajak';
                                        } else {
                                            echo 'Status Aktifitas Pajak';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFWRKSTA" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFWRKSTA; ?>"><?php
                                                if ($_oFWRKSTA == '1') {
                                                    echo '[1]&ensp;Buat template Laporan Pajak';
                                                } elseif ($_oFWRKSTA == '2') {
                                                    echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                } elseif ($_oFWRKSTA == '3') {
                                                    echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                } elseif ($_oFWRKSTA == '4') {
                                                    echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                } elseif ($_oFWRKSTA == '5') {
                                                    echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                } elseif ($_oFWRKSTA == '6') {
                                                    echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                                } elseif ($_oFWRKSTA == '7') {
                                                    echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                } elseif ($_oFWRKSTA == '8') {
                                                    echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                } elseif ($_oFWRKSTA == '9') {
                                                    echo '[9]&ensp;Selesai';
                                                }
                                                ?></option>
                                            <option value="1">[1]&ensp;Buat template Laporan Pajak</option>
                                            <option value="2">[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</option>
                                            <option value="3">[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM</option>
                                            <option value="4">[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</option>
                                            <option value="5">[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</option>
                                            <option value="6">[6]&ensp;Pembuatan/penerbitan Kode Billing (SSE)</option>
                                            <option value="7">[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</option>
                                            <option value="8">[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</option>
                                            <option value="9">[9]&ensp;Selesai</option>
                                        </select>

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

            <div <?php
            if ($_varXTABVIW == 'pjkpay') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actupd/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/flg'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-5">
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
                                        <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Type';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jenis Pajak';
                                            } else {
                                                echo 'Jenis Pajak';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                        if (!empty($_oFFLGTAX)) {
                                            if ($_oFFLGTAX == 'hstp21') {
                                                echo 'Pasal 21';
                                            } elseif ($_oFFLGTAX == 'hstp22') {
                                                echo 'Pasal 22';
                                            } elseif ($_oFFLGTAX == 'hstp23') {
                                                echo 'Pasal 23';
                                            } elseif ($_oFFLGTAX == 'hstp42') {
                                                echo 'Pasal 4(2)';
                                            } elseif ($_oFFLGTAX == 'hstp25') {
                                                echo 'Pasal 25';
                                            } elseif ($_oFFLGTAX == 'hstp00') {
                                                echo 'PPN';
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
                                                echo 'Period';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Masa (Periode)';
                                            } else {
                                                echo 'Masa (Periode)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                        if (!empty($_oFPERIOX)) {
                                            echo $_oFPERIOX;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } else {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                        if (!empty($_oFPJKKBY)) {
                                            echo number_format($_oFPJKKBY);
                                        } else {
                                            echo number_format('0');
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Activity Status';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status Aktifitas Pajak';
                                        } else {
                                            echo 'Status Aktifitas Pajak';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFWRKSTA" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFWRKSTA; ?>"><?php
                                                if ($_oFWRKSTA == '1') {
                                                    echo '[1]&ensp;Buat template Laporan Pajak';
                                                } elseif ($_oFWRKSTA == '2') {
                                                    echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                } elseif ($_oFWRKSTA == '3') {
                                                    echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                } elseif ($_oFWRKSTA == '4') {
                                                    echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                } elseif ($_oFWRKSTA == '5') {
                                                    echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                } elseif ($_oFWRKSTA == '6') {
                                                    echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                                } elseif ($_oFWRKSTA == '7') {
                                                    echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                } elseif ($_oFWRKSTA == '8') {
                                                    echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                } elseif ($_oFWRKSTA == '9') {
                                                    echo '[9]&ensp;Selesai';
                                                }
                                                ?></option>
                                            <option value="1">[1]&ensp;Buat template Laporan Pajak</option>
                                            <option value="2">[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</option>
                                            <option value="3">[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM</option>
                                            <option value="4">[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</option>
                                            <option value="5">[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</option>
                                            <option value="6">[6]&ensp;Pembuatan/penerbitan Kode Billing (SSE)</option>
                                            <option value="7">[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</option>
                                            <option value="8">[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</option>
                                            <option value="9">[9]&ensp;Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
            </div>

            <div <?php
            if ($_varXTABVIW == 'pjkrpt') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actupd/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/flg'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkrpt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-5">
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
                                        <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Type';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jenis Pajak';
                                            } else {
                                                echo 'Jenis Pajak';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                        if (!empty($_oFFLGTAX)) {
                                            if ($_oFFLGTAX == 'hstp21') {
                                                echo 'Pasal 21';
                                            } elseif ($_oFFLGTAX == 'hstp22') {
                                                echo 'Pasal 22';
                                            } elseif ($_oFFLGTAX == 'hstp23') {
                                                echo 'Pasal 23';
                                            } elseif ($_oFFLGTAX == 'hstp42') {
                                                echo 'Pasal 4(2)';
                                            } elseif ($_oFFLGTAX == 'hstp25') {
                                                echo 'Pasal 25';
                                            } elseif ($_oFFLGTAX == 'hstp00') {
                                                echo 'PPN';
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
                                                echo 'Period';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Masa (Periode)';
                                            } else {
                                                echo 'Masa (Periode)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                        if (!empty($_oFPERIOX)) {
                                            echo $_oFPERIOX;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } else {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                        if (!empty($_oFPJKKBY)) {
                                            echo number_format($_oFPJKKBY);
                                        } else {
                                            echo number_format('0');
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Activity Status';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status Aktifitas Pajak';
                                        } else {
                                            echo 'Status Aktifitas Pajak';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFWRKSTA" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFWRKSTA; ?>"><?php
                                                if ($_oFWRKSTA == '1') {
                                                    echo '[1]&ensp;Buat template Laporan Pajak';
                                                } elseif ($_oFWRKSTA == '2') {
                                                    echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                } elseif ($_oFWRKSTA == '3') {
                                                    echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                } elseif ($_oFWRKSTA == '4') {
                                                    echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                } elseif ($_oFWRKSTA == '5') {
                                                    echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                } elseif ($_oFWRKSTA == '6') {
                                                    echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                                } elseif ($_oFWRKSTA == '7') {
                                                    echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                } elseif ($_oFWRKSTA == '8') {
                                                    echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                } elseif ($_oFWRKSTA == '9') {
                                                    echo '[9]&ensp;Selesai';
                                                }
                                                ?></option>
                                            <option value="1">[1]&ensp;Buat template Laporan Pajak</option>
                                            <option value="2">[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</option>
                                            <option value="3">[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM</option>
                                            <option value="4">[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</option>
                                            <option value="5">[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</option>
                                            <option value="6">[6]&ensp;Pembuatan/penerbitan Kode Billing (SSE)</option>
                                            <option value="7">[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</option>
                                            <option value="8">[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</option>
                                            <option value="9">[9]&ensp;Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
            </div>

            <div <?php
            if ($_varXTABVIW == 'pjkarc') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> class="well well-sm sk_well_modification0">
                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actupd/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA . '/flg'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                &nbsp;
                                &nbsp;
                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actviw/pjkarc/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-5">
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
                                        <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                        if (!empty($_oFFULNME)) {
                                            echo $_oFFULNME;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="label-mins">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Tax Type';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jenis Pajak';
                                            } else {
                                                echo 'Jenis Pajak';
                                            }
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFFLGTAX" class="form-control" readonly value="<?php
                                        if (!empty($_oFFLGTAX)) {
                                            if ($_oFFLGTAX == 'hstp21') {
                                                echo 'Pasal 21';
                                            } elseif ($_oFFLGTAX == 'hstp22') {
                                                echo 'Pasal 22';
                                            } elseif ($_oFFLGTAX == 'hstp23') {
                                                echo 'Pasal 23';
                                            } elseif ($_oFFLGTAX == 'hstp42') {
                                                echo 'Pasal 4(2)';
                                            } elseif ($_oFFLGTAX == 'hstp25') {
                                                echo 'Pasal 25';
                                            } elseif ($_oFFLGTAX == 'hstp00') {
                                                echo 'PPN';
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
                                                echo 'Period';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Masa (Periode)';
                                            } else {
                                                echo 'Masa (Periode)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPERIOX" class="form-control" readonly value="<?php
                                        if (!empty($_oFPERIOX)) {
                                            echo $_oFPERIOX;
                                        } else {
                                            echo '...';
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="sk_label_modification">
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            } else {
                                                echo 'Jumlah KB (Kurang Bayar)';
                                            };
                                            ?>&nbsp;:
                                        </label>
                                        <input type="text" name="_viwFPJKKBY" class="form-control" readonly value="<?php
                                        if (!empty($_oFPJKKBY)) {
                                            echo number_format($_oFPJKKBY);
                                        } else {
                                            echo number_format('0');
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="sk_label_modification">
                                        <?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo 'Tax Activity Status';
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo 'Status Aktifitas Pajak';
                                        } else {
                                            echo 'Status Aktifitas Pajak';
                                        };
                                        ?>&nbsp;:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="#_objMDLAPJ" role="button" id="<?php echo '$_oFNPWPDC'; ?>" data-toggle="modal" class="btn btn-default sk_tmbviwdoc" style="width: 50px;" title="<?php
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
                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFWRKSTA" required oninvalid="<?php
                                        if ($_sesFLNGAGE == 'eng') {
                                            echo "this.setCustomValidity('Please select an item in the list')";
                                        } elseif ($_sesFLNGAGE == 'ina') {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        } else {
                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                        };
                                        ?>" onchange="setCustomValidity('')">
                                            <option value="<?php echo $_oFWRKSTA; ?>"><?php
                                                if ($_oFWRKSTA == '1') {
                                                    echo '[1]&ensp;Buat template Laporan Pajak';
                                                } elseif ($_oFWRKSTA == '2') {
                                                    echo '[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien';
                                                } elseif ($_oFWRKSTA == '3') {
                                                    echo '[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM';
                                                } elseif ($_oFWRKSTA == '4') {
                                                    echo '[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)';
                                                } elseif ($_oFWRKSTA == '5') {
                                                    echo '[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien';
                                                } elseif ($_oFWRKSTA == '6') {
                                                    echo '[6] Pembuatan/penerbitan Kode Billing (SSE)';
                                                } elseif ($_oFWRKSTA == '7') {
                                                    echo '[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)';
                                                } elseif ($_oFWRKSTA == '8') {
                                                    echo '[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)';
                                                } elseif ($_oFWRKSTA == '9') {
                                                    echo '[9]&ensp;Selesai';
                                                }
                                                ?></option>
                                            <option value="1">[1]&ensp;Buat template Laporan Pajak</option>
                                            <option value="2">[2]&ensp;Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</option>
                                            <option value="3">[3]&ensp;Persiapan data yang diperlukan, untuk dikirimkan ke MSM</option>
                                            <option value="4">[4]&ensp;Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</option>
                                            <option value="5">[5]&ensp;Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</option>
                                            <option value="6">[6]&ensp;Pembuatan/penerbitan Kode Billing (SSE)</option>
                                            <option value="7">[7]&ensp;Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</option>
                                            <option value="8">[8]&ensp;Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</option>
                                            <option value="9">[9]&ensp;Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
            </div>
            <?php
            break;
        case "ngrupd" :
            ?>
            <?php
            break;
        case "actdel" :
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Terhapus</h4>", type: "success", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
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
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                        echo '</script>';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                        echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                        echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                        echo '<script> $( document ).ready(function() {';
                        echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Tidak Terhapus</h4>", type: "error", width: "500px", ';
                        echo '}).then (result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR020/ngrlst') . '"}});});';
                        echo '</script>';
                    };
                    ?>
                <?php } ?>
            </div>
            <?php
            break;
        default:
            ?>
            <div class="well well-sm sk_well_modification0">
                <div style = "height: 20px;">
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
                        <div style = "height: 20px;">
                            <br>
                        </div>
                        <div class="info" style="text-align: center">
                            <img src="<?php echo base_url(), 'assets/aimz/bgd/under_development.svg'; ?>" height="auto" width="50%">              
                        </div>
                    </div>
                </div>
                <div style = "height: 20px;">
                    <br>
                </div>
            </div>
            <?php
            break;
            ?>
            <?php
            break;
    }
    ?>
</section>