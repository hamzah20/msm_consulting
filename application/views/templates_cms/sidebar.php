<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="<?php echo base_url('assets/images/pictures/logo_cms.png'); ?>" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url('assets/images/pictures/enduser_icon.png'); ?>" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url('Dashboard/index'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <?php

                $queryHeading = $this->cms->getHeadingSidebar('ADMIN');

                foreach ($queryHeading->result() as $data) {
                ?>
                    <h3 class="menu-title"><?= $data->NAME; ?></h3>

                    <?php
                    $queryParent = $this->cms->getParentSidebar('ADMIN', $data->PARENT);

                    foreach ($queryParent->result() as $parent) {
                    ?>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon <?= $parent->ICON; ?>"></i>
                                <?= $parent->NAME; ?>
                            </a>

                            <!-- Kalo di sidebar ada submenu -->
                            <?php

                            $queryChild = $this->cms->getChildSidebar('ADMIN', $data->PARENT);

                            if ($queryChild->num_rows() != 0) {
                            ?>
                                <ul class="sub-menu children dropdown-menu">
                                    <?php foreach ($queryChild->result() as $child) { ?>
                                        <li><i class="fa fa-puzzle-piece"></i><a href="<?= base_url($child->LINK); ?>"><?= $child->NAME; ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <!-- EoL Sidebar Child Menu -->
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->