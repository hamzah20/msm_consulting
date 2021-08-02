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
    switch ($_swiUSR017) {
        case "acslst" :
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_varXTABVIW = $this->uri->segment(4);
                if (!empty($_varXTABVIW)) {
                    $_swiTABVIW = $_varXTABVIW;
                } else {
                    $_swiTABVIW = 'intnal';
                }
                $_varXPROCES = $this->uri->segment(5);
                ?>
                <div style="height: 20px;">
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
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
                                        if ($_swiTABVIW == 'intnal') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#intnal" data-toggle="tab"><font style="color: #d9534f; font-size: 1.05em"><i class="fas fa-user-shield fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Account Setting';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Internal';
                                            } else {
                                                echo 'Internal';
                                            }
                                            ?>
                                            </a>
                                        </li>

                                        <li class="<?php
                                        if ($_swiTABVIW == 'client') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#client" data-toggle="tab"><font style="color: #0275d8; font-size: 1.05em"><i class="fas fa-user-shield fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Testing';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Klien';
                                            } else {
                                                echo 'Klien';
                                            }
                                            ?>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'intnal') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="intnal">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'intnal') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
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
                                                                        echo '_objENGmsmgrp';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo '_objINAmsmgrp';
                                                                    } else {
                                                                        echo '_objINAmsmgrp';
                                                                    }
                                                                    ?>" class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center" style="white-space: nowrap">No.</th>
                                                                                <th class="text-center" style="white-space: nowrap">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Internal User Name';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Nama Pengguna Internal';
                                                                                    } else {
                                                                                        echo 'Nama Pengguna Internal';
                                                                                    };
                                                                                    ?>
                                                                                </th>
                                                                                <th class="text-center" style="white-space: nowrap">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Login Right';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Hak Login';
                                                                                    } else {
                                                                                        echo 'Hak Login';
                                                                                    };
                                                                                    ?>
                                                                                </th>
                                                                                <th class="text-center" style="white-space: nowrap">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Login Level';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Level Login';
                                                                                    } else {
                                                                                        echo 'Level Login';
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
                                                                            $this->db->from('tprofle');
                                                                            $this->db->where('FUSRTYP', '0');
                                                                            $this->db->where('FCATGRY', 'staffz');
                                                                            $this->db->order_by('FJOBLVL', 'desc');
                                                                            $this->db->order_by('FCODEZZ', 'asc');

                                                                            $_quePROFLE = $this->db->get();

                                                                            foreach ($_quePROFLE->result_array() as $_oRow) {
                                                                                $_oSeq ++;
                                                                                ?>
                                                                                <tr>
                                                                                    <td class="text-center" style="white-space: nowrap; width: 10%">
                                                                                        <?php echo $_oSeq; ?>
                                                                                    </td>
                                                                                    <td align="left" style="white-space: nowrap; width: 60%">
                                                                                        <?php
                                                                                        if (!empty($_oRow['FFULNME'])) {
                                                                                            echo $_oRow['FFULNME'];
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="center" style="white-space: nowrap; width: 10%">
                                                                                        <?php
                                                                                        if ((!empty($_oRow['FJOBLVL'])) && ($_oRow['FCATGRY'] == 'staffz')) {
                                                                                            if ($_oRow['FJOBLVL'] == '1') {
                                                                                                echo 'Staff';
                                                                                            } else if ($_oRow['FJOBLVL'] == '2') {
                                                                                                echo 'Supervisor';
                                                                                            } else if ($_oRow['FJOBLVL'] == '3') {
                                                                                                echo 'Manager';
                                                                                            }
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="center" style="white-space: nowrap; width: 10%">
                                                                                        <?php
                                                                                        if (!empty($_oRow['FJOBLVL'])) {
                                                                                            echo $_oRow['FJOBLVL'] . ' ';
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="center" style="white-space: nowrap; width: 10%">
                                                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/intnal/viw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
                                                    <div style="height: 0px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW == 'intnal') && ($_varXPROCES == 'viw')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                 <?php
                                                 $_cmpFRECNMB = $this->uri->segment(6);
                                                 $_cmpFCODEZZ = $this->uri->segment(7);

                                                 $this->db->select('*');
                                                 $this->db->from('tprofle');
                                                 $this->db->where('FCODEZZ', $_cmpFCODEZZ);

                                                 $_quePROFLE = $this->db->get();

                                                 foreach ($_quePROFLE->result_array() as $_oRow) {
                                                     $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                     $_oFFULNME = $_oRow['FFULNME'];
                                                     $_oFUSRNME = $_oRow['FUSRNME'];
                                                     $_oFKEYWRX = $_oRow['FKEYWRD'];
                                                     $_oFKEYWRD = $_oFKEYWRX;
                                                     $_oFMENUZZ = $_oRow['FMENUZZ'];
                                                     if (!empty($_oFMENUZZ)) {
                                                         $_oFMENUZZ = $_oFMENUZZ;
                                                     } else {
                                                         $_oFMENUZZ = ';;;;;;;;;;;;;;;;;;;;;';
                                                     }
                                                     $_oFJOBLVL = $_oRow['FJOBLVL'];
                                                 }
                                                 ?>
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 10px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/intnal'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                if ($_sesFLNGAGE == 'eng') {
                                                                    echo 'Back';
                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                    echo 'Kembali';
                                                                } else {
                                                                    echo 'Kembali';
                                                                };
                                                                ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                                                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/intnal/edt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

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
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Internal User Sequence Nmb.';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'No. Urut Pengguna Internal';
                                                                        } else {
                                                                            echo 'No. Urut Pengguna Internal';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" readonly value="<?php
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
                                                                            echo 'Internal User Name';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nama Pengguna Internal';
                                                                        } else {
                                                                            echo 'Nama Pengguna Internal';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFFULNME)) {
                                                                        echo $_oFFULNME;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Login Access';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Hak Login';
                                                                        } else {
                                                                            echo 'Hak Login';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFJOBLVL)) {
                                                                        if ($_oFJOBLVL == '1') {
                                                                            echo 'Staff';
                                                                        } else if ($_oFJOBLVL == '2') {
                                                                            echo 'Supervisor';
                                                                        } if ($_oFJOBLVL == '3') {
                                                                            echo 'Manager';
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
                                                                            echo 'User Name';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nama Pengguna';
                                                                        } else {
                                                                            echo 'Nama Pengguna';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFUSRNME" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFUSRNME)) {
                                                                        echo $_oFUSRNME;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Keyword';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kata Kunci';
                                                                        } else {
                                                                            echo 'Kata Kunci';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="password" name="_viwFKEYWRD" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFKEYWRD)) {
                                                                        echo $_oFKEYWRD;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Access Right';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Hak Akses';
                                                                        } else {
                                                                            echo 'Hak Akses';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="well sk_well_modification4">
                                                                                <?php
                                                                                $_oMon = '1';
                                                                                $_tmpFCEKBOX = explode(';', $_oFMENUZZ);
                                                                                $_varFCEK001 = $_tmpFCEKBOX[0];
                                                                                $_varFCEK002 = $_tmpFCEKBOX[1];
                                                                                $_varFCEK003 = $_tmpFCEKBOX[2];
                                                                                $_varFCEK004 = $_tmpFCEKBOX[3];
                                                                                $_varFCEK005 = $_tmpFCEKBOX[4];
                                                                                $_varFCEK006 = $_tmpFCEKBOX[5];
                                                                                $_varFCEK007 = $_tmpFCEKBOX[6];
                                                                                $_varFCEK008 = $_tmpFCEKBOX[7];
                                                                                $_varFCEK009 = $_tmpFCEKBOX[8];
                                                                                $_varFCEK010 = $_tmpFCEKBOX[9];
                                                                                $_varFCEK011 = $_tmpFCEKBOX[10];
                                                                                $_varFCEK012 = $_tmpFCEKBOX[11];
                                                                                $_varFCEK013 = $_tmpFCEKBOX[12];
                                                                                $_varFCEK014 = $_tmpFCEKBOX[13];
                                                                                $_varFCEK015 = $_tmpFCEKBOX[14];
                                                                                $_varFCEK016 = $_tmpFCEKBOX[15];
                                                                                $_varFCEK017 = $_tmpFCEKBOX[16];
                                                                                $_varFCEK018 = $_tmpFCEKBOX[17];
                                                                                $_varFCEK019 = $_tmpFCEKBOX[18];
                                                                                $_varFCEK020 = $_tmpFCEKBOX[19];
                                                                                $_varFCEK021 = $_tmpFCEKBOX[20];
                                                                                $_varFCEK022 = $_tmpFCEKBOX[21];
                                                                                ?>
                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;klien</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-database"></i>&ensp;<font style="color: #0000ff">Data</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK006" id="_cbxFCEK006" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK006 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK006 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Company Profile';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Profil Perusahaan';
                                                                                        } else {
                                                                                            echo 'Profil Perusahaan';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK007" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK007 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK007 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Worker (Employee)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Karyawan (Pegawai)';
                                                                                        } else {
                                                                                            echo 'Karyawan (Pegawai)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;utilitas</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-file"></i>&ensp;<font style="color: #0000ff">Daftar Utilitas</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK004" id="_cbxFCEK004" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK004 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK004 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Tax Office';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Kantor Pelayanan Pajak';
                                                                                        } else {
                                                                                            echo 'Kantor Pelayanan Pajak';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px; display: none" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK013" id="_cbxFCEK013" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK013 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK013 == 'Y') {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Client';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Klien';
                                                                                        } else {
                                                                                            echo 'Klien';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK005" id="_cbxFCEK005" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK005 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK005 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Vendor (Others)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Vendor (Lain-Lain)';
                                                                                        } else {
                                                                                            echo 'Vendor (Lain-Lain)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK014" id="_cbxFCEK014" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK014 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK014 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'MSM Group';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'MSM Group';
                                                                                        } else {
                                                                                            echo 'MSM Group';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;kepatuhan pajak</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #0000ff">Hitung Pajak</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK008" id="_cbxFCEK008" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK008 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK008 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 21';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 21';
                                                                                        } else {
                                                                                            echo 'PPh 21';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK009" id="_cbxFCEK009" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK009 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK009 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 22';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 22';
                                                                                        } else {
                                                                                            echo 'PPh 22';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK010" id="_cbxFCEK010" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK010 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK010 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 23';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 23';
                                                                                        } else {
                                                                                            echo 'PPh 23';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK011" id="_cbxFCEK011" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK011 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK011 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 4(2)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 4(2)';
                                                                                        } else {
                                                                                            echo 'PPh 4(2)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK012" id="_cbxFCEK012" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK012 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK012 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 25';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 25';
                                                                                        } else {
                                                                                            echo 'PPh 25';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK018" id="_cbxFCEK018" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK018 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK018 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPN';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPN';
                                                                                        } else {
                                                                                            echo 'PPN';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;manajemen kegiatan</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-chalkboard-teacher"></i>&ensp;<font style="color: #0000ff">Daftar Kegiatan</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK021" id="_cbxFCEK021" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK021 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK021 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Assignment';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Penugasan (Task)';
                                                                                        } else {
                                                                                            echo 'Penugasan (Task)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK022" id="_cbxFCEK022" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK022 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK022 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Prospective Clients Registration';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Registrasi Calon Klien';
                                                                                        } else {
                                                                                            echo 'Registrasi Calon Klien';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK002" id="_cbxFCEK002" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK002 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK002 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Message (Inbox & Outbox)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Pesan (Masuk & Keluar)';
                                                                                        } else {
                                                                                            echo 'Pesan (Masuk & Keluar)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <label><font style="font-weight: normal; color: #808080">•&ensp;pengaturan</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #0000ff">Daftar Pengaturan</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK015" id="_cbxFCEK015" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK015 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK015 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Klasifikasi Lapangan Usaha';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Klasifikasi Lapangan Usaha';
                                                                                        } else {
                                                                                            echo 'Klasifikasi Lapangan Usaha';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK016" id="_cbxFCEK016" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK016 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK016 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Jenis Setoran';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Jenis Setoran';
                                                                                        } else {
                                                                                            echo 'Jenis Setoran';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK017" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK017 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK017 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Access Right';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Hak Akses';
                                                                                        } else {
                                                                                            echo 'Hak Akses';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK019" id="_cbxFCEK019" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK019 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK019 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Email';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Email';
                                                                                        } else {
                                                                                            echo 'Email';
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
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW == 'intnal') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/intnal/upd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    <?php
                                                    $_cmpFRECNMB = $this->uri->segment(6);
                                                    $_cmpFCODEZZ = $this->uri->segment(7);

                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCODEZZ', $_cmpFCODEZZ);

                                                    $_quePROFLE = $this->db->get();

                                                    foreach ($_quePROFLE->result_array() as $_oRow) {
                                                        $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                        $_oFFULNME = $_oRow['FFULNME'];
                                                        $_oFUSRNME = $_oRow['FUSRNME'];
                                                        $_oFKEYWRX = $_oRow['FKEYWRD'];
                                                        $_oFKEYWRD = $_oFKEYWRX;
                                                        $_oFMENUZZ = $_oRow['FMENUZZ'];
                                                        if (!empty($_oFMENUZZ)) {
                                                            $_oFMENUZZ = $_oFMENUZZ;
                                                        } else {
                                                            $_oFMENUZZ = ';;;;;;;;;;;;;;;;;;;;;';
                                                        }
                                                        $_oFJOBLVL = $_oRow['FJOBLVL'];
                                                    }
                                                    ?>
                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 10px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/intnal/viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Internal User Sequence Nmb.';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'No. Urut Pengguna Internal';
                                                                            } else {
                                                                                echo 'No. Urut Pengguna Internal';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFCODEZZ" class="form-control" readonly value="<?php
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
                                                                                echo 'Internal User Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Pengguna Internal';
                                                                            } else {
                                                                                echo 'Nama Pengguna Internal';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFFULNME" class="form-control" readonly value="<?php
                                                                        if (!empty($_oFFULNME)) {
                                                                            echo $_oFFULNME;
                                                                        } else {
                                                                            echo '';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Login Access';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Hak Login';
                                                                            } else {
                                                                                echo 'Hak Login';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <select class="form-control select2" data-placeholder="" data-allow-clear="false" name="_edtFJOBLVL" required  oninvalid="<?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo "this.setCustomValidity('Please select an item in the list')";
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        } else {
                                                                            echo "this.setCustomValidity('Silakan pilih data dalam daftar')";
                                                                        };
                                                                        ?>" onchange="setCustomValidity('')">
                                                                            <option value="<?php echo $_oFJOBLVL; ?>"><?php
                                                                                if ($_oFJOBLVL == '1') {
                                                                                    echo 'Staff';
                                                                                } elseif ($_oFJOBLVL == '2') {
                                                                                    echo 'Supervisor';
                                                                                } elseif ($_oFJOBLVL == '3') {
                                                                                    echo 'Manager';
                                                                                };
                                                                                ?></option>
                                                                            <option value="1">Staff</option>
                                                                            <option value="2">Supervisor</option>
                                                                            <option value="3">Manager</option>
                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'User Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Pengguna';
                                                                            } else {
                                                                                echo 'Nama Pengguna';
                                                                            };
                                                                            ?><font style="color: #808080; font-weight: normal">&nbsp;(format email)</font><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFUSRNME" class="form-control" required value="<?php
                                                                        if (!empty($_oFUSRNME)) {
                                                                            echo $_oFUSRNME;
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
                                                                                echo 'Keyword';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Kata Kunci';
                                                                            } else {
                                                                                echo 'Kata Kunci';
                                                                            };
                                                                            ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="password" name="_edtFKEYWRD" class="form-control" required value="<?php
                                                                        if (!empty($_oFKEYWRD)) {
                                                                            echo $_oFKEYWRD;
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
                                                                                echo 'Access Right';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Hak Akses';
                                                                            } else {
                                                                                echo 'Hak Akses';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="well sk_well_modification4">
                                                                                    <?php
                                                                                    $_oMon = '1';
                                                                                    $_tmpFCEKBOX = explode(';', $_oFMENUZZ);
                                                                                    $_varFCEK001 = $_tmpFCEKBOX[0];
                                                                                    $_varFCEK002 = $_tmpFCEKBOX[1];
                                                                                    $_varFCEK003 = $_tmpFCEKBOX[2];
                                                                                    $_varFCEK004 = $_tmpFCEKBOX[3];
                                                                                    $_varFCEK005 = $_tmpFCEKBOX[4];
                                                                                    $_varFCEK006 = $_tmpFCEKBOX[5];
                                                                                    $_varFCEK007 = $_tmpFCEKBOX[6];
                                                                                    $_varFCEK008 = $_tmpFCEKBOX[7];
                                                                                    $_varFCEK009 = $_tmpFCEKBOX[8];
                                                                                    $_varFCEK010 = $_tmpFCEKBOX[9];
                                                                                    $_varFCEK011 = $_tmpFCEKBOX[10];
                                                                                    $_varFCEK012 = $_tmpFCEKBOX[11];
                                                                                    $_varFCEK013 = $_tmpFCEKBOX[12];
                                                                                    $_varFCEK014 = $_tmpFCEKBOX[13];
                                                                                    $_varFCEK015 = $_tmpFCEKBOX[14];
                                                                                    $_varFCEK016 = $_tmpFCEKBOX[15];
                                                                                    $_varFCEK017 = $_tmpFCEKBOX[16];
                                                                                    $_varFCEK018 = $_tmpFCEKBOX[17];
                                                                                    $_varFCEK019 = $_tmpFCEKBOX[18];
                                                                                    $_varFCEK020 = $_tmpFCEKBOX[19];
                                                                                    $_varFCEK021 = $_tmpFCEKBOX[20];
                                                                                    $_varFCEK022 = $_tmpFCEKBOX[21];
                                                                                    ?>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;klien</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-database"></i>&ensp;<font style="color: #0000ff">Data</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK006" id="_cbxFCEK006" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK006 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK006 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Company Profile';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Profil Perusahaan';
                                                                                            } else {
                                                                                                echo 'Profil Perusahaan';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK007" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK007 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK007 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Worker (Employee)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Karyawan (Pegawai)';
                                                                                            } else {
                                                                                                echo 'Karyawan (Pegawai)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;utilitas</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-file"></i>&ensp;<font style="color: #0000ff">Daftar Utilitas</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK004" id="_cbxFCEK004" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK004 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK004 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Tax Office';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Kantor Pelayanan Pajak';
                                                                                            } else {
                                                                                                echo 'Kantor Pelayanan Pajak';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px; display: none" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK013" id="_cbxFCEK013" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK013 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK013 == 'Y') {
                                                                                            echo '';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Client';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Klien';
                                                                                            } else {
                                                                                                echo 'Klien';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK005" id="_cbxFCEK005" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK005 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK005 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Vendor (Others)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Vendor (Lain-Lain)';
                                                                                            } else {
                                                                                                echo 'Vendor (Lain-Lain)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK014" id="_cbxFCEK014" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK014 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK014 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'MSM Group';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'MSM Group';
                                                                                            } else {
                                                                                                echo 'MSM Group';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;kepatuhan pajak</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #0000ff">Hitung Pajak</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK008" id="_cbxFCEK008" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK008 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK008 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 21';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 21';
                                                                                            } else {
                                                                                                echo 'PPh 21';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK009" id="_cbxFCEK009" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK009 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK009 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 22';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 22';
                                                                                            } else {
                                                                                                echo 'PPh 22';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK010" id="_cbxFCEK010" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK010 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK010 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 23';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 23';
                                                                                            } else {
                                                                                                echo 'PPh 23';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK011" id="_cbxFCEK011" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK011 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK011 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 4(2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 4(2)';
                                                                                            } else {
                                                                                                echo 'PPh 4(2)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK012" id="_cbxFCEK012" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK012 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK012 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 25';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 25';
                                                                                            } else {
                                                                                                echo 'PPh 25';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK018" id="_cbxFCEK018" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK018 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK018 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPN';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPN';
                                                                                            } else {
                                                                                                echo 'PPN';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;manajemen kegiatan</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-chalkboard-teacher"></i>&ensp;<font style="color: #0000ff">Daftar Kegiatan</font></font></label>
                                                                                     <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_edtFCEK021" id="_cbxFCEK021" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK021 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK021 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?>>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Assignment';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Penugasan (Task)';
                                                                                        } else {
                                                                                            echo 'Penugasan (Task)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_edtFCEK022" id="_cbxFCEK022" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK022 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK022 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?>>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Prospective Clients Registration';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Registrasi Calon Klien';
                                                                                        } else {
                                                                                            echo 'Registrasi Calon Klien';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK002" id="_cbxFCEK002" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK002 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK002 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Message (Inbox & Outbox)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Pesan (Masuk & Keluar)';
                                                                                            } else {
                                                                                                echo 'Pesan (Masuk & Keluar)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;pengaturan</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal;">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #0000ff">Daftar Pengaturan</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK015" id="_cbxFCEK015" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK015 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK015 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Klasifikasi Lapangan Usaha';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Klasifikasi Lapangan Usaha';
                                                                                            } else {
                                                                                                echo 'Klasifikasi Lapangan Usaha';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK016" id="_cbxFCEK016" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK016 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK016 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Jenis Setoran';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Jenis Setoran';
                                                                                            } else {
                                                                                                echo 'Jenis Setoran';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK017" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK017 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK017 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Access Right';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Hak Akses';
                                                                                            } else {
                                                                                                echo 'Hak Akses';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK019" id="_cbxFCEK019" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK019 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK019 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Email';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Email';
                                                                                            } else {
                                                                                                echo 'Email';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <br>
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
                                        if ($_swiTABVIW == 'client') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="client">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'client') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
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
                                                                                        echo 'Login Right';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Hak Login';
                                                                                    } else {
                                                                                        echo 'Hak Login';
                                                                                    };
                                                                                    ?>
                                                                                </th>
                                                                                <th class="text-center" style="white-space: nowrap">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Login Level';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Level Login';
                                                                                    } else {
                                                                                        echo 'Level Login';
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
                                                                            $this->db->from('tprofle');
                                                                            $this->db->where('FTYPEZZ', 'cmp');
                                                                            $this->db->where('FCATGRY', 'client');
                                                                            $this->db->order_by('FCODEZZ', 'asc');

                                                                            $_quePROFLE = $this->db->get();

                                                                            foreach ($_quePROFLE->result_array() as $_oRow) {
                                                                                $_oSeq ++;
                                                                                ?>
                                                                                <tr>
                                                                                    <td class="text-center" style="white-space: nowrap; width: 10%">
                                                                                        <?php echo $_oSeq; ?>
                                                                                    </td>
                                                                                    <td align="left" style="white-space: nowrap; width: 60%">
                                                                                        <?php
                                                                                        if (!empty($_oRow['FFULNME'])) {
                                                                                            echo $_oRow['FFULNME'];
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="left" style="white-space: nowrap; width: 10%">
                                                                                        <?php
                                                                                        if ((!empty($_oRow['FJOBLVL'])) && ($_oRow['FCATGRY'] == 'client')) {
                                                                                            if ($_oRow['FJOBLVL'] == '1') {
                                                                                                echo 'Client';
                                                                                            }
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="center" style="white-space: nowrap; width: 10%">
                                                                                        <?php
                                                                                        if (!empty($_oRow['FJOBLVL'])) {
                                                                                            echo $_oRow['FJOBLVL'] . ' ';
                                                                                        } else {
                                                                                            echo '...';
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td align="center" style="white-space: nowrap; width: 10%">
                                                                                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/client/viw/' . $_oRow['FRECNMB'] . '/' . $_oRow['FCODEZZ']; ?>" title="<?php
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
                                                    <div style="height: 0px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW == 'client') && ($_varXPROCES == 'viw')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                 <?php
                                                 $_cmpFRECNMB = $this->uri->segment(6);
                                                 $_cmpFCODEZZ = $this->uri->segment(7);

                                                 $this->db->select('*');
                                                 $this->db->from('tprofle');
                                                 $this->db->where('FCODEZZ', $_cmpFCODEZZ);

                                                 $_quePROFLE = $this->db->get();

                                                 foreach ($_quePROFLE->result_array() as $_oRow) {

                                                     $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                     $_oFFULNME = $_oRow['FFULNME'];
                                                     $_oFUSRNME = $_oRow['FUSRNME'];
                                                     $_oFKEYWRX = $_oRow['FKEYWRD'];
                                                     $_oFKEYWRD = $_oFKEYWRX;
                                                     $_oFMENUZZ = $_oRow['FMENUZZ'];
                                                     if (!empty($_oFMENUZZ)) {
                                                         $_oFMENUZZ = $_oFMENUZZ;
                                                     } else {
                                                         $_oFMENUZZ = ';;;;;;;;;;;;;;;;;;;;;';
                                                     }
                                                 }
                                                 ?>
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 10px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/client'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                if ($_sesFLNGAGE == 'eng') {
                                                                    echo 'Back';
                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                    echo 'Kembali';
                                                                } else {
                                                                    echo 'Kembali';
                                                                };
                                                                ?>" style="background-color: #808080"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-arrow-left fa-lg"></i></font></a>

                                                                <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/client/edt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px"><i class="fas fa-pencil-alt fa-lg"></i></font></a>

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
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFCODEZZ" class="form-control" readonly value="<?php
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
                                                                            echo 'Company (Client) Name';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nama Urut Perusahaan (Klien)';
                                                                        } else {
                                                                            echo 'Nama Perusahaan (Klien)';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFFULNME)) {
                                                                        echo $_oFFULNME;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'User Name';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nama Pengguna';
                                                                        } else {
                                                                            echo 'Nama Pengguna';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="text" name="_viwFUSRNME" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFUSRNME)) {
                                                                        echo $_oFUSRNME;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Keyword';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Kata Kunci';
                                                                        } else {
                                                                            echo 'Kata Kunci';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <input type="password" name="_viwFKEYWRD" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFKEYWRD)) {
                                                                        echo $_oFKEYWRD;
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Access Right';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Hak Akses';
                                                                        } else {
                                                                            echo 'Hak Akses';
                                                                        };
                                                                        ?>&nbsp;:
                                                                    </label>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="well sk_well_modification4">
                                                                                <?php
                                                                                $_oMon = '1';
                                                                                $_tmpFCEKBOX = explode(';', $_oFMENUZZ);
                                                                                $_varFCEK001 = $_tmpFCEKBOX[0];
                                                                                $_varFCEK002 = $_tmpFCEKBOX[1];
                                                                                $_varFCEK003 = $_tmpFCEKBOX[2];
                                                                                $_varFCEK004 = $_tmpFCEKBOX[3];
                                                                                $_varFCEK005 = $_tmpFCEKBOX[4];
                                                                                $_varFCEK006 = $_tmpFCEKBOX[5];
                                                                                $_varFCEK007 = $_tmpFCEKBOX[6];
                                                                                $_varFCEK008 = $_tmpFCEKBOX[7];
                                                                                $_varFCEK009 = $_tmpFCEKBOX[8];
                                                                                $_varFCEK010 = $_tmpFCEKBOX[9];
                                                                                $_varFCEK011 = $_tmpFCEKBOX[10];
                                                                                $_varFCEK012 = $_tmpFCEKBOX[11];
                                                                                $_varFCEK013 = $_tmpFCEKBOX[12];
                                                                                $_varFCEK014 = $_tmpFCEKBOX[13];
                                                                                $_varFCEK015 = $_tmpFCEKBOX[14];
                                                                                $_varFCEK016 = $_tmpFCEKBOX[15];
                                                                                $_varFCEK017 = $_tmpFCEKBOX[16];
                                                                                $_varFCEK018 = $_tmpFCEKBOX[17];
                                                                                $_varFCEK019 = $_tmpFCEKBOX[18];
                                                                                $_varFCEK020 = $_tmpFCEKBOX[19];
                                                                                $_varFCEK021 = $_tmpFCEKBOX[20];
                                                                                $_varFCEK022 = $_tmpFCEKBOX[21];
                                                                                ?>
                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;manajemen kegiatan</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-chalkboard-teacher"></i>&ensp;<font style="color: #000000">Daftar Kegiatan</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK002" id="_cbxFCEK002" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK002 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK002 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Message (Inbox & Outbox)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Pesan (Masuk & Keluar)';
                                                                                        } else {
                                                                                            echo 'Pesan (Masuk & Keluar)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK001" id="_cbxFCEK001" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK001 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK001 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Tax Compliance';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Aktifitas Pajak';
                                                                                        } else {
                                                                                            echo 'Aktifitas Pajak';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>

                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;klien</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-file"></i>&ensp;<font style="color: #000000">Data</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK006" id="_cbxFCEK006" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK006 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK006 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Company';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Perusahaan';
                                                                                        } else {
                                                                                            echo 'Perusahaan';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK007" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK007 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK007 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'Worker (Employee)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'Karyawan (Pegawai)';
                                                                                        } else {
                                                                                            echo 'Karyawan (Pegawai)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>

                                                                                <label><font style="font-weight: normal; color: #808080">•&nbsp;kepatuhan pajak</font></label>
                                                                                <br>
                                                                                <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #000000">Hitung Pajak</font></font></label>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK008" id="_cbxFCEK008" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK008 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK008 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 21';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 21';
                                                                                        } else {
                                                                                            echo 'PPh 21';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK009" id="_cbxFCEK009" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK009 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK009 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 22';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 22';
                                                                                        } else {
                                                                                            echo 'PPh 22';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK010" id="_cbxFCEK010" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK010 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK010 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 23';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 23';
                                                                                        } else {
                                                                                            echo 'PPh 23';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK011" id="_cbxFCEK011" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK011 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK011 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 4(2)';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 4(2)';
                                                                                        } else {
                                                                                            echo 'PPh 4(2)';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK012" id="_cbxFCEK012" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK012 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK012 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
                                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                                            echo 'PPh 25';
                                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                                            echo 'PPh 25';
                                                                                        } else {
                                                                                            echo 'PPh 25';
                                                                                        };
                                                                                        ?></label>
                                                                                </div>
                                                                                <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                    <input name="_viwFCEK018" id="_cbxFCEK018" class="styled" type="checkbox" <?php
                                                                                    if ($_varFCEK018 == 'N') {
                                                                                        echo '';
                                                                                    } elseif ($_varFCEK018 == 'Y') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    };
                                                                                    ?> disabled>
                                                                                    <label><?php
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
                                                    <div style="height: 20px;">
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="<?php
                                            if (($_varXTABVIW == 'client') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/client/upd/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    <?php
                                                    $_cmpFRECNMB = $this->uri->segment(6);
                                                    $_cmpFCODEZZ = $this->uri->segment(7);

                                                    $this->db->select('*');
                                                    $this->db->from('tprofle');
                                                    $this->db->where('FCODEZZ', $_cmpFCODEZZ);

                                                    $_quePROFLE = $this->db->get();

                                                    foreach ($_quePROFLE->result_array() as $_oRow) {

                                                        $_oFCODEZZ = $_oRow['FCODEZZ'];
                                                        $_oFFULNME = $_oRow['FFULNME'];
                                                        $_oFUSRNME = $_oRow['FUSRNME'];
                                                        $_oFKEYWRX = $_oRow['FKEYWRD'];
                                                        $_oFKEYWRD = $_oFKEYWRX;
                                                        $_oFMENUZZ = $_oRow['FMENUZZ'];
                                                        if (!empty($_oFMENUZZ)) {
                                                            $_oFMENUZZ = $_oFMENUZZ;
                                                        } else {
                                                            $_oFMENUZZ = ';;;;;;;;;;;;;;;;;;;;;';
                                                        }
                                                    }
                                                    ?>
                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 10px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst/client/viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ; ?>" role = "button" class="btn btn-default btn-flat sk_button_modification" title="<?php
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
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_viwFCODEZZ" class="form-control" readonly value="<?php
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
                                                                                echo 'Company (Client) Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Urut Perusahaan (Klien)';
                                                                            } else {
                                                                                echo 'Nama Perusahaan (Klien)';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_viwFFULNME" class="form-control" readonly value="<?php
                                                                        if (!empty($_oFFULNME)) {
                                                                            echo $_oFFULNME;
                                                                        } else {
                                                                            echo '';
                                                                        }
                                                                        ?>">
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'User Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Pengguna';
                                                                            } else {
                                                                                echo 'Nama Pengguna';
                                                                            };
                                                                            ?><font style="color: #808080; font-weight: normal">&nbsp;(format email)</font><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFUSRNME" class="form-control" required value="<?php
                                                                        if (!empty($_oFUSRNME)) {
                                                                            echo $_oFUSRNME;
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
                                                                                echo 'Keyword';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Kata Kunci';
                                                                            } else {
                                                                                echo 'Kata Kunci';
                                                                            };
                                                                            ?><font style="color: #ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="password" name="_edtFKEYWRD" class="form-control" required value="<?php
                                                                        if (!empty($_oFKEYWRD)) {
                                                                            echo $_oFKEYWRD;
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
                                                                                echo 'Access Right';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Hak Akses';
                                                                            } else {
                                                                                echo 'Hak Akses';
                                                                            };
                                                                            ?>&nbsp;:
                                                                        </label>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="well sk_well_modification4">
                                                                                    <?php
                                                                                    $_oMon = '1';
                                                                                    $_tmpFCEKBOX = explode(';', $_oFMENUZZ);
                                                                                    $_varFCEK001 = $_tmpFCEKBOX[0];
                                                                                    $_varFCEK002 = $_tmpFCEKBOX[1];
                                                                                    $_varFCEK003 = $_tmpFCEKBOX[2];
                                                                                    $_varFCEK004 = $_tmpFCEKBOX[3];
                                                                                    $_varFCEK005 = $_tmpFCEKBOX[4];
                                                                                    $_varFCEK006 = $_tmpFCEKBOX[5];
                                                                                    $_varFCEK007 = $_tmpFCEKBOX[6];
                                                                                    $_varFCEK008 = $_tmpFCEKBOX[7];
                                                                                    $_varFCEK009 = $_tmpFCEKBOX[8];
                                                                                    $_varFCEK010 = $_tmpFCEKBOX[9];
                                                                                    $_varFCEK011 = $_tmpFCEKBOX[10];
                                                                                    $_varFCEK012 = $_tmpFCEKBOX[11];
                                                                                    $_varFCEK013 = $_tmpFCEKBOX[12];
                                                                                    $_varFCEK014 = $_tmpFCEKBOX[13];
                                                                                    $_varFCEK015 = $_tmpFCEKBOX[14];
                                                                                    $_varFCEK016 = $_tmpFCEKBOX[15];
                                                                                    $_varFCEK017 = $_tmpFCEKBOX[16];
                                                                                    $_varFCEK018 = $_tmpFCEKBOX[17];
                                                                                    $_varFCEK019 = $_tmpFCEKBOX[18];
                                                                                    $_varFCEK020 = $_tmpFCEKBOX[19];
                                                                                    $_varFCEK022 = $_tmpFCEKBOX[20];
                                                                                    $_varFCEK020 = $_tmpFCEKBOX[21];
                                                                                    ?>
                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;manajemen kegiatan</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-chalkboard-teacher"></i>&ensp;<font style="color: #000000">Daftar Kegiatan</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK002" id="_cbxFCEK002" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK002 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK002 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Message (Inbox & Outbox)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Pesan (Masuk & Keluar)';
                                                                                            } else {
                                                                                                echo 'Pesan (Masuk & Keluar)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK001" id="_cbxFCEK001" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK001 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK001 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Tax Compliance';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Aktifitas Pajak';
                                                                                            } else {
                                                                                                echo 'Aktifitas Pajak';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>

                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;klien</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-file"></i>&ensp;<font style="color: #000000">Data</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK006" id="_cbxFCEK006" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK006 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK006 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Company';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Perusahaan';
                                                                                            } else {
                                                                                                echo 'Perusahaan';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK007" id="_cbxFCEK007" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK007 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK007 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'Worker (Employee)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'Karyawan (Pegawai)';
                                                                                            } else {
                                                                                                echo 'Karyawan (Pegawai)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>

                                                                                    <label><font style="font-weight: normal; color: #808080">•&nbsp;kepatuhan pajak</font></label>
                                                                                    <br>
                                                                                    <label><font style="font-weight: normal; color: #0000ff">&ensp;&ensp;&ensp;&ensp;<i class="fas fa-calculator"></i>&ensp;<font style="color: #000000">Hitung Pajak</font></font></label>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK008" id="_cbxFCEK008" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK008 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK008 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 21';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 21';
                                                                                            } else {
                                                                                                echo 'PPh 21';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK009" id="_cbxFCEK009" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK009 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK009 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 22';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 22';
                                                                                            } else {
                                                                                                echo 'PPh 22';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK010" id="_cbxFCEK010" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK010 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK010 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 23';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 23';
                                                                                            } else {
                                                                                                echo 'PPh 23';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK011" id="_cbxFCEK011" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK011 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK011 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 4(2)';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 4(2)';
                                                                                            } else {
                                                                                                echo 'PPh 4(2)';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK012" id="_cbxFCEK012" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK012 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK012 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
                                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                                echo 'PPh 25';
                                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                                echo 'PPh 25';
                                                                                            } else {
                                                                                                echo 'PPh 25';
                                                                                            };
                                                                                            ?></label>
                                                                                    </div>
                                                                                    <div style="padding-left: 67px" class="checkbox checkbox-warning checkbox-circle">
                                                                                        <input name="_edtFCEK018" id="_cbxFCEK018" class="styled" type="checkbox" <?php
                                                                                        if ($_varFCEK018 == 'N') {
                                                                                            echo '';
                                                                                        } elseif ($_varFCEK018 == 'Y') {
                                                                                            echo 'checked';
                                                                                        } else {
                                                                                            echo '';
                                                                                        };
                                                                                        ?>>
                                                                                        <label><?php
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
                                                        <div style="height: 20px;">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div style="height: 0px;">
                                            <br>
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
        case "emlupd" :
            ?>
            <?php
            break;
        case "emlsnd" :
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Email Dikirimkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/intnal') . '"}});});';
                    echo '</script>';
                };
                ?>
            <?php } ?>
            <?php
            /* --- 4 : PRFVIW --- */
            break;
        default :
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
    }
    ?>
</section>