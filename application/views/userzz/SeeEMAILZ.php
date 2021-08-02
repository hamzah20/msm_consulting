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
    switch ($_swiUSR019) {
        case "emlset" :
            ?>
            <?php
            $_oFEMAILX = $_tblEMAILZ['0']['FVALUE1'];
            $_oFEMAILY = $_oFEMAILX;
            $_oFEMAILZ = explode(';', $_oFEMAILY);
            $_oFEMAIL1 = $_oFEMAILZ[0];
            $_oFEMAIL2 = $_oFEMAILZ[1];
            $_oFEMAIL3 = $_oFEMAILZ[2];
            $_oFEMAIL4 = $_oFEMAILZ[3];
            $_oFEMAIL5 = $_oFEMAILZ[4];
            ?>
            <div class="well well-sm sk_well_modification0">
                <?php
                $_varXTABVIW = $this->uri->segment(3);
                if (!empty($_varXTABVIW)) {
                    $_swiTABVIW = $_varXTABVIW;
                } else {
                    $_swiTABVIW = 'emlset';
                }
                $_varXPROCES = $this->uri->segment(4);
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
                                        if ($_swiTABVIW == 'emlset') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#emlset" data-toggle="tab"><font style="color: #d9534f; font-size: 1.05em"><i class="fas fa-envelope fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Account Setting';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Pengaturan Akun';
                                            } else {
                                                echo 'Pengaturan Akun';
                                            }
                                            ?>
                                            </a>
                                        </li>

                                        <li class="<?php
                                        if ($_swiTABVIW == 'emltes') {
                                            echo "active";
                                        } else {
                                            echo '';
                                        };
                                        ?>"><a href="#emltes" data-toggle="tab"><font style="color: #0275d8; font-size: 1.05em"><i class="fas fa-send fa-fw fa-lg" style="font-size: 1.15em"></i></font>&nbsp;
                                            <?php
                                            if ($_sesFLNGAGE == 'eng') {
                                                echo 'Testing';
                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                echo 'Pengujian';
                                            } else {
                                                echo 'Pengujian';
                                            }
                                            ?>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade <?php
                                        if ($_swiTABVIW == 'emlset') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="emlset">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_main : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'emlset') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <div class="well well-sm sk_well_modification0">
                                                    <div style="height: 10px;">
                                                        <br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pull-left">
                                                                &nbsp;
                                                                &nbsp;
                                                                <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR019/emlset/edt'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="Edit" style="background-color: #f0ad4e"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-pencil-alt fa-lg"></i></font></a>
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
                                                                            echo 'Sender Name';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Nama Pengirim';
                                                                        } else {
                                                                            echo 'Nama Pengirim';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_finFEMAIL1" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFEMAIL1)) {
                                                                        echo $_oFEMAIL1;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Sender Email';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Email Pengirim';
                                                                        } else {
                                                                            echo 'Email Pengirim';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_finFEMAIL2" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFEMAIL2)) {
                                                                        echo $_oFEMAIL2;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Email Server';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Server Email';
                                                                        } else {
                                                                            echo 'Server Email';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="text" name="_finFEMAIL3" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFEMAIL3)) {
                                                                        echo $_oFEMAIL3;
                                                                    } else {
                                                                        echo '...';
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
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="password" name="_finFEMAIL4" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFEMAIL4)) {
                                                                        echo $_oFEMAIL4;
                                                                    } else {
                                                                        echo '...';
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="sk_label_modification">
                                                                        <?php
                                                                        if ($_sesFLNGAGE == 'eng') {
                                                                            echo 'Keyword';
                                                                        } elseif ($_sesFLNGAGE == 'ina') {
                                                                            echo 'Katakunci';
                                                                        } else {
                                                                            echo 'Katakunci';
                                                                        };
                                                                        ?><font color="#000000">&nbsp;:</font>
                                                                    </label>
                                                                    <input type="password" name="_finFEMAIL5" class="form-control" readonly value="<?php
                                                                    if (!empty($_oFEMAIL5)) {
                                                                        echo $_oFEMAIL5;
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
                                            <!--- sk_main : EDT --->
                                            <div class="<?php
                                            if (($_varXTABVIW == 'emlset') && ($_varXPROCES == 'edt')) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR019/emlupd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 10px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR019/emlset'; ?>" role="button" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Cancel';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Batal';
                                                                    } else {
                                                                        echo 'Batal';
                                                                    };
                                                                    ?>" style="background-color: #d9534f"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-times fa-lg"></i></font></a>

                                                                    <button type="submit" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Save';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Simpan';
                                                                    } else {
                                                                        echo 'Simpan';
                                                                    };
                                                                    ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-check fa-lg"></i></font></button>
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
                                                                                echo 'Sender Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Pengirim';
                                                                            } else {
                                                                                echo 'Nama Pengirim';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFEMAIL1" class="form-control" required value="<?php
                                                                        if (!empty($_oFEMAIL1)) {
                                                                            echo $_oFEMAIL1;
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
                                                                                echo 'Sender Email';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Email Pengirim';
                                                                            } else {
                                                                                echo 'Email Pengirim';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFEMAIL2" class="form-control" required value="<?php
                                                                        if (!empty($_oFEMAIL2)) {
                                                                            echo $_oFEMAIL2;
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
                                                                                echo 'Email Server';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Server Email';
                                                                            } else {
                                                                                echo 'Server Email';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="text" name="_edtFEMAIL3" class="form-control" required value="<?php
                                                                        if (!empty($_oFEMAIL3)) {
                                                                            echo $_oFEMAIL3;
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
                                                                                echo 'User Name';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Nama Pengguna';
                                                                            } else {
                                                                                echo 'Nama Pengguna';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="password" name="_edtFEMAIL4" class="form-control" required value="<?php
                                                                        if (!empty($_oFEMAIL4)) {
                                                                            echo $_oFEMAIL4;
                                                                        } else {
                                                                            echo '';
                                                                        }
                                                                        ?>" 	oninvalid="<?php
                                                                               if ($_sesFLNGAGE == 'eng') {
                                                                                   echo "this.setCustomValidity('Please fill out this field')";
                                                                               } elseif ($_sesFLNGAGE == 'ina') {
                                                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                               } else {
                                                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                               };
                                                                               ?>" oninput="setCustomValidity('')"
                                                                               >
                                                                    </div>
                                                                    <div>
                                                                        <label class="sk_label_modification">
                                                                            <?php
                                                                            if ($_sesFLNGAGE == 'eng') {
                                                                                echo 'Keyword';
                                                                            } elseif ($_sesFLNGAGE == 'ina') {
                                                                                echo 'Katakunci';
                                                                            } else {
                                                                                echo 'Katakunci';
                                                                            };
                                                                            ?><font color="#ff0000">&nbsp;*</font>&nbsp;:
                                                                        </label>
                                                                        <input type="password" name="_edtFEMAIL5" class="form-control" required value="<?php
                                                                        if (!empty($_oFEMAIL5)) {
                                                                            echo $_oFEMAIL5;
                                                                        } else {
                                                                            echo '';
                                                                        }
                                                                        ?>" 	oninvalid="<?php
                                                                               if ($_sesFLNGAGE == 'eng') {
                                                                                   echo "this.setCustomValidity('Please fill out this field')";
                                                                               } elseif ($_sesFLNGAGE == 'ina') {
                                                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                               } else {
                                                                                   echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                               };
                                                                               ?>" oninput="setCustomValidity('')"
                                                                               >
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
                                        if ($_swiTABVIW == 'emltes') {
                                            echo "in active";
                                        } else {
                                            echo '';
                                        };
                                        ?>" id="emltes">
                                            <div style="height: 20px;">
                                                <br>
                                            </div>
                                            <!--- sk_idwp : VIEW --->
                                            <div class="<?php
                                            if (($_varXTABVIW !== 'emltes') || (empty($_varXPROCES))) {
                                                echo '';
                                            } else {
                                                echo 'hidden';
                                            }
                                            ?> col-lg-12">
                                                <form action="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR019/emlset/snd'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="well well-sm sk_well_modification0">
                                                        <div style="height: 10px;">
                                                            <br>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pull-left">
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <button type="submit" class="btn btn-default btn-flat sk_button_modification" title="<?php
                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                        echo 'Send';
                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                        echo 'Kirim';
                                                                    } else {
                                                                        echo 'Kirim';
                                                                    };
                                                                    ?>" style="background-color: #5cb85c"><font style="color: #ffffff; font-size: 17px;"><i class="fas fa-rocket fa-lg"></i></font></button>
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
                                                                        <div class="col-lg-12">
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Recipent Email';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Email Penerima';
                                                                                    } else {
                                                                                        echo 'Email Penerima';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFRECEIP" class="form-control" required oninvalid="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo "this.setCustomValidity('Please fill out this field')";
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                } else {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                };
                                                                                ?>" oninput="setCustomValidity('')"
                                                                                       >
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Email Subject';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Subyek Email';
                                                                                    } else {
                                                                                        echo 'Subyek Email';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <input type="text" name="_edtFSUBJEC" class="form-control" required value="<?php echo 'e-TAX MSM : Ujicoba Kirim Email';?>" oninvalid="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo "this.setCustomValidity('Please fill out this field')";
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                } else {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                };
                                                                                ?>" oninput="setCustomValidity('')"
                                                                                       >
                                                                            </div>
                                                                            <div>
                                                                                <label class="sk_label_modification">
                                                                                    <?php
                                                                                    if ($_sesFLNGAGE == 'eng') {
                                                                                        echo 'Email Content';
                                                                                    } elseif ($_sesFLNGAGE == 'ina') {
                                                                                        echo 'Konten Email';
                                                                                    } else {
                                                                                        echo 'Konten Email';
                                                                                    };
                                                                                    ?><font color="#000000">&nbsp;:</font>
                                                                                </label>
                                                                                <textarea rows="10" name="_edtFCONTEN" class="form-control" required oninvalid="<?php
                                                                                if ($_sesFLNGAGE == 'eng') {
                                                                                    echo "this.setCustomValidity('Please fill out this field')";
                                                                                } elseif ($_sesFLNGAGE == 'ina') {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                } else {
                                                                                    echo "this.setCustomValidity('Silahkan isi kolom ini')";
                                                                                };
                                                                                ?>" oninput="setCustomValidity('')"
                                                                                >Kepada Yth,&#13;&#10;Bapak/Ibu PIC Kustomer&#13;&#10;&#13;&#10;Berikut ini adalah konten/isi email ujicoba, yang digunakan sebagai contoh.&#13;&#10;Tes...123...&#13;&#10;Cek...456...&#13;&#10;Ujicoba...789...&#13;&#10;&#13;&#10;Terima Kasih,&#13;&#10;(Administrator)</textarea>
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Data Ditambahkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Berhasil !</h3>", html: "<h4>Email Dikirimkan</h4>", type: "success", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal !</h3>", html: "<h4>Data Duplikat</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
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
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript" src="' . base_url(), 'assets/jquery/js/jquery-3.3.1.min.js' . '"></script>';
                    echo '<link rel="stylesheet" href="' . base_url(), 'assets/sweetalert2/css/sweetalert2.min.css' . '">';
                    echo '<script src="' . base_url(), 'assets/sweetalert2/js/sweetalert2.min.js' . '"></script>';
                    echo '<script> $( document ).ready(function() {';
                    echo 'swal.fire({ title: "<h3>Gagal!</h3>", html: "<h4>Isian Tidak Lengkap</h4>", type: "error", width: "400px",';
                    echo '}).then(result => {if (result.value) {document.location.href="' . base_url('NocUSERZZ/cfcACTUSR019/emlset') . '"}});});';
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