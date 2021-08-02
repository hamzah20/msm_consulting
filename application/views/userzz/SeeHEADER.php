<?php
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFFULNME = $this->session->FFULNME;
$_sesFIMAGEX = strtolower($this->session->FIMAGEX);
$_sesFLOGINT = strtolower($this->session->FLOGINT);
$_sesFGROUPS = $this->session->XGROUPS;
$_sesFCATGRY = $this->session->FCATGRY;
?>
<header class="main-header">
    <a href="#" class="logo" style="background-color: #000080">
        <span class="logo-mini"><img src="<?= base_url(), 'assets/mins/sys/msmconsultingwhitesvg.svg'; ?>" height="AUTO" width="100%"></span><img src="<?= base_url(), 'assets/mins/sys/msmconsultingfullwhitesvg.svg'; ?>" height="100%" width="AUTO">
        <?php
        $_oMod = $this->uri->segment(1);

        if ($_oMod == 'NocUSERZZ') {
            $_oMod = 'NocUSERZZ';
        } else {
        }
        ?>
    </a>
    <nav class="navbar navbar-static-top" style="background-color: #000080">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color: #FFFFFF; background-color: #000080">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu" style="background-color: #000080">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTABOUTZ'; ?>"><font style="color: #FFFFFF; font-size: 1.00em"><i class="fas fa-info-circle fa-fw"></i></font>&ensp;<?php
                        if ($_sesFLNGAGE == 'eng') {
                            echo 'About';
                        } elseif ($_sesFLNGAGE == 'ina') {
                            echo 'About';
                        } else {
                            echo 'About';
                        }
                        ;
                        ?>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <font style="color: #ffffff; font-size: 1.00em"><i class="fas fa-user-alt fa-fw"></i></font>
                        &nbsp;
                        <span class="hidden-xs"><?php echo 'User'; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <div>
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                <style>
                                    lottie-player{
                                        margin: 0 auto;}
                                </style>
                            <lottie-player src="<?php echo base_url(), 'assets/pictures/avatar.json'; ?>" background="transparent"  speed="0.80"  style="width: 300px; height: 300px" autoplay></lottie-player>
                        </div>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?= base_url(), 'NocLOGOUT'; ?>" class="btn btn-default btn-flat <?php
                                if ($_sesFLNGAGE == 'eng') {
                                    echo 'mins-alert-logout';
                                } elseif ($_sesFLNGAGE == 'ina') {
                                    echo 'aimz-alert-keluar';
                                } else {
                                    echo 'aimz-alert-keluar';
                                };
                                ?>"><font style="color: #000080; font-size: 1.00em"><i class="fas fa-door-open"></i>&nbsp;<strong><?php
                                    if ($_sesFLNGAGE == 'eng') {
                                        echo 'Logout';
                                    } elseif ($_sesFLNGAGE == 'ina') {
                                        echo 'Keluar';
                                    } else {
                                        echo 'Keluar';
                                    };
                                    ?></strong></font></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>