<?php
$_oDat = date("Ymd");
$_sesFUSRTYP = $this->session->FUSRTYP;
$_sesFRECNMB = $this->session->FRECNMB;
$_sesFCODEZZ = $this->session->FCODEZZ;
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFMODULE = $this->session->FMODULE;
$_arrFMODULE = explode(";", $this->session->FMODULE);
$_sesFFULNME = $this->session->FFULNME;
$_sesFIMAGEX = $this->session->FIMAGEX;
$_sesFMENUZZ = $this->session->FMENUZZ;
if (!empty($_sesFMENUZZ)) {
    $_sesFMENUZZ = $_sesFMENUZZ;
} else {
    $_sesFMENUZZ = ';;;;;;;;;;;;;;;;;;;;;;';
}
$_oFMENUXX = explode(';', $_sesFMENUZZ);
$_oFCEK001 = $_oFMENUXX[0];
$_oFCEK002 = $_oFMENUXX[1];
$_oFCEK003 = $_oFMENUXX[2];
$_oFCEK004 = $_oFMENUXX[3];
$_oFCEK005 = $_oFMENUXX[4];
$_oFCEK006 = $_oFMENUXX[5];
$_oFCEK007 = $_oFMENUXX[6];
$_oFCEK008 = $_oFMENUXX[7];
$_oFCEK009 = $_oFMENUXX[8];
$_oFCEK010 = $_oFMENUXX[9];
$_oFCEK011 = $_oFMENUXX[10];
$_oFCEK012 = $_oFMENUXX[11];
$_oFCEK013 = $_oFMENUXX[12];
$_oFCEK014 = $_oFMENUXX[13];
$_oFCEK015 = $_oFMENUXX[14];
$_oFCEK016 = $_oFMENUXX[15];
$_oFCEK017 = $_oFMENUXX[16];
$_oFCEK018 = $_oFMENUXX[17];
$_oFCEK019 = $_oFMENUXX[18];
$_oFCEK020 = $_oFMENUXX[19];
$_oFCEK021 = $_oFMENUXX[20];
$_oFCEK022 = $_oFMENUXX[21];

$_sesFSERVCE = $this->session->FSERVCE;
if (!empty($_sesFSERVCE)) {
    $_sesFSERVCE = $_sesFSERVCE;
} else {
    $_sesFSERVCE = 'n;;;;n;;;;n;;;;n;;;;n;;;;n;;;;1';
}
$_oFSERVCX = explode(';', $_sesFSERVCE);
$_oFSRVP21 = $_oFSERVCX[0];
$_oFSRVP22 = $_oFSERVCX[4];
$_oFSRVP23 = $_oFSERVCX[8];
$_oFSRVP42 = $_oFSERVCX[12];
$_oFSRVP25 = $_oFSERVCX[16];
$_oFSRVPPN = $_oFSERVCX[20];


$_sesFCATGRY = $this->session->FCATGRY;
$_objURLADR = uri_string();

switch ($_sesFUSRTYP) {
    case 0 :
        $_objVISBLE = 'display: none';
        break;
    case 1 :
        $_objVISBLE = 'display: block';
        break;
    case 2 :
        $_objVISBLE = 'display: block';
        break;
    case 3 :
        $_objVISBLE = 'display: block';
        break;
}
?>

<aside class="main-sidebar" style="background-color: #f2f2f2">
    <section class="sidebar" style="background-color: #f2f2f2">
        <ul class="sidebar-menu" data-widget="tree" style="background-color: #f2f2f2">
            <li class="header" style="background-color: #f2f2f2">
                <font style="color: #000080; font-size: 18px; font-weight: bolder"><strong><?php echo substr($_sesFFULNME, 0, 20); ?></strong></font>
                <br>
                <?php
                    $_oCon = $this->sklibrfnc->_fGETConSta();
                    ?>
                <p id="_oIntSta" style="color: #000080; font-size: 15px; font-weight: heavy">Mengecek Koneksi</p>
            </li>

            <li class="<?php
            if ($_sesFCATGRY == 'client') {
                echo 'hidden';
            } elseif ($_sesFCATGRY == 'staffz') {
                echo '';
            }
            ?> header" style="background-color: #ff8400">
                
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'MENU NAVIGATION';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'NAVIGASI MENU';
                } else {
                    echo 'NAVIGASI MENU';
                };
                ?>
                </font>
            </li>
            
            <li style="display:<?php
            if ($_sesFCATGRY == 'client') {
                echo 'none';
            } elseif ($_sesFCATGRY == 'staffz') {
                echo 'block';
            }
            ?>">
                <a href="<?= base_url(), 'NocUSERZZ/cfcACTDASBOR/dasviw'; ?>">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-desktop"></i></font>&ensp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Dashboard';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Dashboard';
                        } else {
                            echo 'Dashboard';
                        };
                        ?>
                        </font>
                    </span>
                </a>
            </li>


            <li class="<?php
            if ((($_oFCEK006 == 'Y') || ($_oFCEK007 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'CLIENT';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'KLIEN';
                } else {
                    echo 'KLIEN';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ((($_oFCEK006 == 'Y') || ($_oFCEK007 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR006/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/emp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR001/mon')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-database"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Data';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Data';
                        } else {
                            echo 'Data';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK006 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR006/cmp')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR006/cmp')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmplst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Company Profile';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Profil Perusahaan';
                                } else {
                                    echo 'Profil Perusahaan';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK007 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/emp')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR007/emp')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR007/cmplst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Worker (Employee)';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Karyawan (Pegawai)';
                                } else {
                                    echo 'Karyawan (Pegawai)';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            if ((($_oFCEK004 == 'Y') || ($_oFCEK005 == 'Y') || ($_oFCEK013 == 'Y') || ($_oFCEK014 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'UTILITY';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'UTILITAS';
                } else {
                    echo 'UTILITAS';
                };
                ?>
                </font>
            </li>
            <li  class="<?php
            if ((($_oFCEK004 == 'Y') || ($_oFCEK005 == 'Y') || ($_oFCEK013 == 'Y') || ($_oFCEK014 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                 if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR004/kpp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR013/cln') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR005/vnd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR014/msm')) {
                     echo 'active';
                 }
                 ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-file"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Utility List';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Daftar Utilitas';
                        } else {
                            echo 'Daftar Utilitas';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK004 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR004/kpp')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR004/kpp')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR004/kpplst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Kantor Pelayanan Pajak';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Kantor Pelayanan Pajak';
                                } else {
                                    echo 'Kantor Pelayanan Pajak';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK005 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR005/vnd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR005/vnd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR005/vndlst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Vendor (Others)';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Vendor (Lain-Lain)';
                                } else {
                                    echo 'Vendor (Lain-Lain)';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK014 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR014/msm')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR014/msm')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR014/msmlst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'MSM Group';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'MSM Group';
                                } else {
                                    echo 'MSM Group';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li  class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'TAX COMPLIANCE';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'KEPATUHAN PAJAK';
                } else {
                    echo 'KEPATUHAN PAJAK';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/c21') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/prd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/c22') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/prd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/c23') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/prd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/c42') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/prd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/c25') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/prd') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/c00') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/prd') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR012/outl')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-calculator"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Tax Count';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Hitung Pajak';
                        } else {
                            echo 'Hitung Pajak';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK008 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/c21') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/c21') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR008/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c21lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 21';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 21';
                                } else {
                                    echo 'PPh 21';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li  class="<?php
                    if (($_oFCEK009 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/c22') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                         if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/c22') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR009/prd')) {
                             echo 'background-color: #80ffbf';
                         }
                         ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR009/c22lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 22';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 22';
                                } else {
                                    echo 'PPh 22';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK010 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/c23') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/c23') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR010/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR010/c23lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 23';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 23';
                                } else {
                                    echo 'PPh 23';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK011 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } elseif ($_sesFCATGRY == 'cliant') {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/c42') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/c42') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR011/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR011/c42lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 4(2)';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 4(2)';
                                } else {
                                    echo 'PPh 4(2)';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK012 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/c25') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/c25') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR012/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c25lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 25';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 25';
                                } else {
                                    echo 'PPh 25';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK018 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/c00') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/c00') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c00lst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPN';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPN';
                                } else {
                                    echo 'PPN';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-traffic-light"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Tax Activity';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Aktivitas Pajak';
                        } else {
                            echo 'Aktivitas Pajak';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Summary';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Ringkasan';
                                } else {
                                    echo 'Ringkasan';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'MANAJEMEN KEGIATAN';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'MANAJEMEN KEGIATAN';
                } else {
                    echo 'MANAJEMEN KEGIATAN';
                };
                ?>
                </font>
            </li>
            <li  class="<?php
            if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                 if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR001/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR001/mon') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR003/tsk') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR022/reg')) {
                     echo 'active';
                 }
                 ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-chalkboard-teacher"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Task List';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Daftar Kegiatan';
                        } else {
                            echo 'Daftar Kegiatan';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK021 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR003/tsk')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR003/tsk')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR003/tsklst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Penugasan (Task)';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Penugasan (Task)';
                                } else {
                                    echo 'Penugasan (Task)';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK022 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR022/reg')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR022/reg')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR022/reglst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Prospective Clients Registration';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Registrasi Calon Klien';
                                } else {
                                    echo 'Registrasi Calon Klien';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Inbox';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Pesan Masuk';
                                } else {
                                    echo 'Pesan Masuk';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg2st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Sent Items';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Pesan Keluar';
                                } else {
                                    echo 'Pesan Keluar';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            if ((($_oFCEK015 == 'Y') || ($_oFCEK016 == 'Y') || ($_oFCEK017 == 'Y') || ($_oFCEK019 == 'Y') || ($_oFCEK020 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'SETTING';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'PENGATURAN';
                } else {
                    echo 'PENGATURAN';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ((($_oFCEK015 == 'Y') || ($_oFCEK016 == 'Y') || ($_oFCEK017 == 'Y') || ($_oFCEK019 == 'Y') || ($_oFCEK020 == 'Y')) && ($_sesFCATGRY == 'staffz')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR015/klu') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR016/kjs') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR017/acs') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR019/eml') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR020/ngr')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-cog"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Setting List';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Daftar Pengaturan';
                        } else {
                            echo 'Daftar Pengaturan';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK015 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR015/klu') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR015/klu')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR015/klulst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Klasifikasi Lapangan Usaha';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Klasifikasi Lapangan Usaha';
                                } else {
                                    echo 'Klasifikasi Lapangan Usaha';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK016 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR016/kjs') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR016/kjs')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR016/kjslst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Type of Deposit';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Jenis Setoran';
                                } else {
                                    echo 'Jenis Setoran';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK016 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR020/ngr') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR020/ngr')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR020/ngrlst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Domicile Country';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Negara Domisili';
                                } else {
                                    echo 'Negara Domisili';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK017 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR017/acs') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR017/acs')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR017/acslst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Access Right';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Hak Akses';
                                } else {
                                    echo 'Hak Akses';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK019 == 'Y') && ($_sesFCATGRY == 'staffz')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR019/eml') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR019/eml')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR019/emlset'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Email';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Email';
                                } else {
                                    echo 'Email';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            if ($_sesFCATGRY == 'staffz') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'ACTION';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'TINDAKAN';
                } else {
                    echo 'TINDAKAN';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ($_sesFCATGRY == 'staffz') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview">
                <a href="<?= base_url(), 'nocLOGOUT'; ?>" class="<?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'mins-alert-logout';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'aimz-alert-keluar';
                } else {
                    echo 'aimz-alert-keluar';
                };
                ?>">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-door-open"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Logout';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Keluar';
                        } else {
                            echo 'Keluar';
                        };
                        ?>
                        </font>
                    </span>
                </a>
            </li>


            <li class="<?php
            if ($_sesFCATGRY == 'client') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'MENU NAVIGATION';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'NAVIGASI MENU';
                } else {
                    echo 'NAVIGASI MENU';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ($_sesFCATGRY == 'client') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?>">
                <a href="<?= base_url(), 'NocUSERZZ/cfcACTDASBOR/dasviw'; ?>">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-desktop"></i></font>&ensp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Dashboard';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Dashboard';
                        } else {
                            echo 'Dashboard';
                        };
                        ?>
                        </font>
                    </span>
                </a>
            </li>
            <li class="<?php
            if ((($_oFCEK001 == 'Y') || ($_oFCEK002 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'MANAJEMEN KEGIATAN';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'MANAJEMEN KEGIATAN';
                } else {
                    echo 'MANAJEMEN KEGIATAN';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ((($_oFCEK001 == 'Y') || ($_oFCEK002 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR001/cmp') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR001/mon')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-chalkboard-teacher"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Task List';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Daftar Kegiatan';
                        } else {
                            echo 'Daftar Kegiatan';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'client')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg1')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Inbox';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Pesan Masuk';
                                } else {
                                    echo 'Pesan Masuk';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK002 == 'Y') && ($_sesFCATGRY == 'client')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR002/msg2')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg2st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Sent Items';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Pesan Keluar';
                                } else {
                                    echo 'Pesan Keluar';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php
            if ((($_oFCEK006 == 'Y') || ($_oFCEK007 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'UTILITY';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'UTILITAS';
                } else {
                    echo 'UTILITAS';
                };
                ?>
                </font>
            </li>
            <?php
            ?>
            <li class="<?php
            if ((($_oFCEK006 == 'Y') || ($_oFCEK007 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR006/cmp2') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR007/emp2')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-file"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Utility List';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Daftar Utilitas';
                        } else {
                            echo 'Daftar Utilitas';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK006 == 'Y') && ($_sesFCATGRY == 'client')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR006/cmp2')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR006/cmp2')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR006/cmp2iw/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Company';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Perusahaan';
                                } else {
                                    echo 'Perusahaan';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK007 == 'Y') && ($_sesFCATGRY == 'client')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR007/emp2') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR007/emp2') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR007/emp2st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Employee';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Karyawan';
                                } else {
                                    echo 'Karyawan';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'TAX COMPLIANCE';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'KEPATUHAN PAJAK';
                } else {
                    echo 'KEPATUHAN PAJAK';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) && ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR008/c212') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR009/c222') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR010/c232') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR011/c422') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR012/c252') || (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR018/c002')) {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-clipboard-list"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Tax Count';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Hitung Pajak';
                        } else {
                            echo 'Hitung Pajak';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (($_oFCEK008 == 'Y') && ($_sesFCATGRY == 'client') && ($_oFSRVP21 == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR008/c212')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR008/c212')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR008/c212st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 21';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 21';
                                } else {
                                    echo 'PPh 21';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK009 == 'Y') && ($_sesFCATGRY == 'client') && ($_oFSRVP22 == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR009/c222') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR009/c222') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR009/c222st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 22';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 22';
                                } else {
                                    echo 'PPh 22';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK010 == 'Y') & ($_sesFCATGRY == 'client') && ($_oFSRVP23 == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR010/c232') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR010/c232') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR010/c232st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 23';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 23';
                                } else {
                                    echo 'PPh 23';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK011 == 'Y') & ($_sesFCATGRY == 'client') && ($_oFSRVP42 == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR011/c422') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR011/c422') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR011/c422st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh (4)2';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh (4)2';
                                } else {
                                    echo 'PPh (4)2';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK012 == 'Y') && ($_sesFCATGRY == 'client') && ($_oFSRVP25 == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR012/c252') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 27) == 'NocUSERZZ/cfcACTUSR012/c252') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR012/c252st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPh 25';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPh 25';
                                } else {
                                    echo 'PPh 25';
                                };
                                ?></span>
                        </a>
                    </li>
                    <li class="<?php
                    if (($_oFCEK018 == 'Y') & ($_sesFCATGRY == 'client') && ($_oFSRVPPN == 'y')) {
                        echo '';
                    } else {
                        echo 'hidden';
                    }
                    ?> <?php
                    if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/c00') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/prd')) {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if ((substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/c00') || (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR018/prd')) {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR018/c002st'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'PPN';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'PPN';
                                } else {
                                    echo 'PPN';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php
            if ((($_oFCEK008 == 'Y') || ($_oFCEK009 == 'Y') || ($_oFCEK010 == 'Y') || ($_oFCEK011 == 'Y') || ($_oFCEK012 == 'Y') || ($_oFCEK018 == 'Y')) & ($_sesFCATGRY == 'client')) {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview <?php
                if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act') {
                    echo 'active';
                }
                ?>">
                <a href="#">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-traffic-light"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Tax Activity';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Aktivitas Pajak';
                        } else {
                            echo 'Aktivitas Pajak';
                        };
                        ?>
                        </font>
                    </span>
                    <span class="pull-right-container">
                        <i class="fas fa-angle-left pull-right fa-fw"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act') {
                        echo 'active';
                    }
                    ?>" style="<?php
                        if (substr($_objURLADR, 0, 26) == 'NocUSERZZ/cfcACTUSR021/act') {
                            echo 'background-color: #80ffbf';
                        }
                        ?>">
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst'; ?>">
                            &ensp;<font style="color: ; font-size: 1.00em"><i class="fas fa-bars"></i></font>&nbsp;&nbsp;<span><?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'Summary';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'Ringkasan';
                                } else {
                                    echo 'Ringkasan';
                                };
                                ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            if ($_sesFCATGRY == 'client') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> header" style="background-color: #ff8400">
                <font style="font-weight: bolder; color: #ffffff"><?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'ACTION';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'TINDAKAN';
                } else {
                    echo 'TINDAKAN';
                };
                ?>
                </font>
            </li>
            <li class="<?php
            if ($_sesFCATGRY == 'client') {
                echo '';
            } else {
                echo 'hidden';
            }
            ?> treeview">
                <a href="<?= base_url(), 'nocLOGOUT'; ?>" class="<?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'mins-alert-logout';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'aimz-alert-keluar';
                } else {
                    echo 'aimz-alert-keluar';
                };
                ?>">
                    <font style="color: #000080; font-size: 1.00em"><i class="fas fa-door-open"></i></font>&nbsp;&nbsp;
                    <span>
                        <font style="font-weight: heavy; color: #000080"><?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'Logout';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'Keluar';
                        } else {
                            echo 'Keluar';
                        };
                        ?>
                        </font>
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>