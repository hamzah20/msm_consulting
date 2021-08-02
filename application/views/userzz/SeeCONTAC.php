<!--  o0o see Report Presence o0o -->
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

<div style="height: 0px">
    <br>
</div>

<section class="content-header">
    <span><font color="<?php echo $_varICONCL; ?>"><i class="<?php echo $_varICONXX; ?>"></i></font><span class="text-black">&nbsp;&nbsp;<?php echo $_varMDL001 . $_varMDL002 . $_varMDL003 . $_varMDL004 . $_varMDL005; ?></span></span>
    <ol class="breadcrumb">
        <li><span class="text-red"><i class="fas fa-shield-alt text-sm"></i>&nbsp;
                <?php
                if ($_sesFLNGAGE == 'eng') {
                    echo 'Access Level';
                } elseif ($_sesFLNGAGE == 'ina') {
                    echo 'Tingkat Akses';
                } else {
                    echo 'Tingkat Akses...';
                };
                ?>&nbsp;:&nbsp;<font style="font-weight: bold"><?php echo $_objFUSRTYP; ?></font></span>&nbsp;&nbsp;
            <span>[&nbsp;<font style="color: #4db8ff"><i class="fas fa-calendar-alt"></i></font>&nbsp;<?php echo $this->sklibrfnc->_fSETDatInd($_oDat); ?>&nbsp;<font style="color: #4db8ff"><i class="fas fa-clock"></i></font>&nbsp;<span id="_objTMENOW"></span>&nbsp;]</span>
        </li>

    </ol>
</section>
<div style="height: 10px">
    <br>
</div>

<section class="content">
    <?php
    $_oFVALUE1 = $_tblCMPANY[0]['FVALUE1'];
    $_oFVALUE2 = $_tblCMPANY[0]['FVALUE2'];
    $_oFVALUE3 = $_tblCMPANY[0]['FVALUE3'];
    $_oFVALUE4 = $_tblCMPANY[0]['FVALUE4'];
    $_oFVALUE5 = $_tblCMPANY[0]['FVALUE5'];
    $_oFVALUE6 = $_tblCMPANY[0]['FVALUE6'];
    ?>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="panel-heading" style="margin-bottom: 250px;">
                        <h3><b><?php
                                if (!empty($_oFVALUE1)) {
                                    echo $_oFVALUE1.'XXXXXXXXXXXXXXXXXXXXXX';
                                } else {
                                    echo "...";
                                }
                                ;
                                ?></b></h3>
                        <?php
                        if (!empty($_oFVALUE2)) {
                            echo $_oFVALUE2;
                        } else {
                            echo "...";
                        }
                        ;
                        ?>
                        <br/>
                        <br/>
                        <i class="fas fa-phone fa-fw" style="color: #e53935; font-size: 1.25em"></i>&nbsp;&nbsp;:&nbsp;&nbsp;<?php
                        if (!empty($_oFVALUE3)) {
                            echo $_oFVALUE3;
                        } else {
                            echo "...";
                        }
                        ;
                        ?>
                        <br/>
                        <i class="fas fa-envelope fa-fw" style="color: #00897b; font-size: 1.25em"></i>&nbsp;&nbsp;:&nbsp;&nbsp;<?php
                        if (!empty($_oFVALUE4)) {
                            echo $_oFVALUE4;
                        } else {
                            echo "...";
                        }
                        ;
                        ?>
                        <br/>
                        <i class="fas fa-globe fa-fw" style="color: #1e88e5; font-size: 1.25em"></i>&nbsp;&nbsp;:&nbsp;&nbsp;<?php
                        if (!empty($_oFVALUE5)) {
                            echo $_oFVALUE5;
                        } else {
                            echo "...";
                        }
                        ;
                        ?>
                        <br/>
                        <i class="far fa-clock fa-fw" style="color: #fb8c00; font-size: 1.25em"></i>&nbsp;&nbsp;:&nbsp;&nbsp;<?php
                        if (!empty($_oFVALUE6)) {
                            echo $_oFVALUE6;
                        } else {
                            echo "...";
                        }
                        ;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>