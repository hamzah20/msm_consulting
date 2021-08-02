<?php
$_oDat = date("Ymd");
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFUSRTYP = $this->session->FUSRTYP;

$_oFVALUE1 = $_tblCMPANY[0]['FVALUE1'];
$_oFVALUE2 = $_tblCMPANY[0]['FVALUE2'];
$_oFVALUE3 = $_tblCMPANY[0]['FVALUE3'];
$_oFVALUE4 = $_tblCMPANY[0]['FVALUE4'];
$_oFVALUE5 = $_tblCMPANY[0]['FVALUE5'];
$_oFVALUE6 = $_tblCMPANY[0]['FVALUE6'];
$_oFVALUE7 = $_tblCMPANY[0]['FVALUE7'];
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFFULNME = $this->session->FFULNME;
$_sesFIMAGEX = strtolower($this->session->FIMAGEX);
$_sesFLOGINT = strtolower($this->session->FLOGINT);
$_sesFGROUPS = $this->session->XGROUPS;

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

    <div class="well well-sm sk_well_modification0">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="info" style="text-align: left">
                        <img src="<?php echo base_url(), 'assets/pictures/msmconsultinglogo.svg'; ?>" width="30%" height="AUTO">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="height: 0px;">
                                <br>
                            </div>
                            <div>
                                <font style="font-size: 15px; font-weight: bolder"><?php
                                    if (!empty($_oFVALUE1)) {
                                        echo $_oFVALUE1;
                                    } else {
                                        echo '...';
                                    }
                                    ;
                                    ?>
                                <br>
                                <?php
                                    $_oCnt = substr_count(trim($_oFVALUE2), '_n_') + 1;
                                    ?>
                                <?php
                                    if (!empty($_oFVALUE2)) {
                                        echo str_replace("_n_", "\n", trim($_oFVALUE2));
                                    } else {
                                        echo "...";
                                    }
                                    ;
                                    ?></font>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <i class="fas fa-phone fa-fw" style="color: #000080; font-size: 1.00em; cursor: pointer" title="Telephone Number"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if (!empty($_oFVALUE3)) {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE3 . '</font>';
                                    } else {
                                        echo '<font style="font-size: 16px">' . '...' . '</font>';
                                    }
                                    ;
                                    ?>
                                    <br/>
                                    <i class="fas fa-fax fa-fw" style="color: #000080; font-size: 1.00em; cursor: pointer" title="Faximile Number"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if (!empty($_oFVALUE7)) {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE7 . '</font>';
                                    } else {
                                        echo '<font style="font-size: 16px">' . '...' . '</font>';
                                    }
                                    ;
                                    ?>
                                    <br/>
                                    <i class="fas fa-envelope fa-fw" style="color: #000080; font-size: 1.00em; cursor: pointer" title="Email Address"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if (!empty($_oFVALUE4)) {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE4 . '</font>';
                                    } else {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE4 . '</font>';
                                    }
                                    ;
                                    ?>
                                    <br/>
                                    <i class="fas fa-globe fa-fw" style="color: #000080; font-size: 1.00em; cursor: pointer" title="Website"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if (!empty($_oFVALUE5)) {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE5 . '</font>';
                                    } else {
                                        echo '<font style="font-size: 16px">' . '...' . '</font>';
                                    }
                                    ;
                                    ?>
                                    <br/>
                                    <i class="far fa-clock fa-fw" style="color: #000080; font-size: 1.00em; cursor: pointer" title="Working Time"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                    if (!empty($_oFVALUE6)) {
                                        echo '<font style="font-size: 16px">' . $_oFVALUE6 . '</font>';
                                    } else {
                                        echo '<font style="font-size: 16px">' . '...' . '</font>';
                                    }
                                    ;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;">
                        <br>
                    </div>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <style>
                        lottie-player{
                            margin: 0 auto;
                            }
                    </style>
                    <lottie-player src="<?php echo base_url(), 'assets/pictures/bicycle_riding.json'; ?>" background="transparent"  speed="0.80"  style="width: 300px; height: 300px" loop autoplay></lottie-player>
                </div>
            </div>
        </div>
    </div>
</section>