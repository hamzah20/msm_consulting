<?php
date_default_timezone_set('Asia/Jakarta');
$_oDat = date("Ymd");
$_oThn = date("Y");
$_oBln = date("m");
$_sesFLNGAGE = strtolower($this->session->FLNGAGE);
$_sesFNPWPZZ = $this->session->FNPWPZZ;
$_sesFUSRTYP = $this->session->FUSRTYP;
$_sesFCATGRY = $this->session->FCATGRY;
$_sesFRECNMB = $this->session->FRECNMB;
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

    <!--- notes : dashboard khusus staffz --->
    <div style="display:<?php
    if ($_sesFCATGRY == 'client') {
        echo 'none';
    } elseif ($_sesFCATGRY == 'staffz') {
        echo 'block';
    }
    ?>" class="well well-sm sk_well_modification0">
        <div style="height: 20px;">
            <br>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                /* --- note : hitung Message --- */
                $this->db->select('*');
                $this->db->from('tmessge');
                $this->db->where('FRECVER', $_sesFCODEZZ);
                $this->db->where('FFLAGZZ', 'U');
                $this->db->order_by('FCODEZZ', 'asc');

                $_queMESSGE = $this->db->get();
                $_cntMESSGE = $_queMESSGE->num_rows();

                /* --- note : hitung Klien --- */
                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FTYPEZZ', 'cmp');
                $this->db->where('FCATGRY', 'client');
                $this->db->order_by('FCODEZZ', 'asc');

                $_queCLIENT = $this->db->get();
                $_cntCLIENT = $_queCLIENT->num_rows();

                /* --- note : hitung Aktifitas Pajak --- */
                $_oSql = 'select count(*) as FQUEUEZ from ttaxhst where FTYPEZZ="cmp" and ((FWRKSTA <> "8") or (FWRKSTA IS NULL) or (FWRKSTA <> ""))';
                $_queQUEUEZ = $this->db->query($_oSql);

                foreach ($_queQUEUEZ->result_array() as $_oRow) {
                    $_cntQUEUEZ = $_oRow['FQUEUEZ'];
                }
                ?>

                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="small-box bg-aqua">
                        <?php
                        $_oPjk = 100;
                        ?>
                        <div class="inner">
                            <h4><?php echo 'Jumlah Pesan'; ?></h4>
                            <br>
                            <p><font style="font-size: 17px">&ensp;<?php
                                if ((!empty($_cntMESSGE)) && ($_cntMESSGE !== 0)) {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntMESSGE . '</font> Pesan';
                                } else {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntMESSGE . '</font> Pesan';
                                };
                                ?></font></p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-paper-plane"></i></font>
                        </div>
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>" class="small-box-footer"><font style="font-size: 14px">Cek Detail</font>&nbsp;<i class="fas fa-arrow-circle-right fa-fw"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h4><?php echo 'Jumlah Klien'; ?></h4>
                            <br>
                            <p><font style="font-size: 17px">&ensp;<?php
                                if ((!empty($_cntCLIENT)) && ($_cntCLIENT !== 0)) {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntCLIENT . '</font> Perusahaan';
                                } else {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntCLIENT . '</font> Perusahaan';
                                };
                                ?></font></p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-building"></i></font>
                        </div>
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR006/cmplst'; ?>" class="small-box-footer"><font style="font-size: 14px">Cek Detail</font>&nbsp;<i class="fas fa-arrow-circle-right fa-fw"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4><?php echo 'Aktifitas Pajak'; ?></h4>
                            <br>
                            <p><font style="font-size: 17px">&ensp;<?php
                                if ((!empty($_cntQUEUEZ)) && ($_cntQUEUEZ !== 0)) {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntQUEUEZ . '</font> Antrian';
                                } else {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntQUEUEZ . '</font> Antrian';
                                };
                                ?></font></p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-tasks"></i></font>
                        </div>
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst'; ?>" class="small-box-footer"><font style="font-size: 14px">Cek Detail</font>&nbsp;<i class="fas fa-arrow-circle-right fa-fw"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-xs-12">
                    <?php
                    $_oCon = $this->sklibrfnc->_fGETConSta();
                    ?>
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h4><?php echo 'Koneksi Internet'; ?></h4>
                            <br>
                            
                            <p style="font-size: 20px; font-weight: bolder">Jaringan</p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-wifi"></i></font>
                        </div>
                        <a href="<?php $this->sklibrfnc->_fGETConSta(); ?>" class="small-box-footer"><font style="font-size: 14px">Cek Ulang</font>&ensp;<i class="fas fa-sync-alt fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 0px;">
            <br>
        </div>
    </div>

    <div style="display:<?php
    if ($_sesFCATGRY == 'client') {
        echo 'none';
    } elseif ($_sesFCATGRY == 'staffz') {
        echo 'block';
    }
    ?>">
        <div class="row">
            <div class="col-lg-6">
                <?php ?>
                <div class="well well-sm sk_well_modification0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-header">
                                <font style="color: #000080"><i class="fas fa-pie-chart fa-lg"></i></font>
                                <font style="color: #000080">&nbsp;<strong>Registrasi Calon Klien</strong></font>
                            </div>
                            <div id="sk_grafik_lingkaran">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well well-sm sk_well_modification0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-header" style="background-color: transparent">
                                <font style="color: #000080"><i class="fas fa-chart-bar fa-lg"></i></font>
                                <font style="color: #000080">&nbsp;<strong>Aktifitas Pajak</strong></font>
                            </div>
                            <div id="sk_grafik_batang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- notes : dashboard khusus client --->
    <div style="display:<?php
    if ($_sesFCATGRY == 'client') {
        echo 'block';
    } elseif ($_sesFCATGRY == 'staffz') {
        echo 'none';
    }
    ?>" class="well well-sm sk_well_modification0">
        <div style="height: 20px;">
            <br>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                /* --- note : hitung Message --- */
                $this->db->select('*');
                $this->db->from('tmessge');
                $this->db->where('FRECVER', $_sesFCODEZZ);
                $this->db->where('FFLAGZZ', 'U');
                $this->db->order_by('FCODEZZ', 'asc');

                $_queMESSGE = $this->db->get();
                $_cntMESSGE = $_queMESSGE->num_rows();

                /* --- note : hitung Klien --- */
                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FTYPEZZ', 'cmp');
                $this->db->where('FCATGRY', 'client');
                $this->db->order_by('FCODEZZ', 'asc');

                $_queCLIENT = $this->db->get();
                $_cntCLIENT = $_queCLIENT->num_rows();

                /* --- note : hitung Aktifitas Pajak --- */
                $_oSql = 'select count(*) as FQUEUEZ from ttaxhst where FTYPEZZ="cmp" and ((FWRKSTA <> "8") or (FWRKSTA IS NULL) or (FWRKSTA <> ""))';
                $_queQUEUEZ = $this->db->query($_oSql);

                foreach ($_queQUEUEZ->result_array() as $_oRow) {
                    $_cntQUEUEZ = $_oRow['FQUEUEZ'];
                }
                ?>

                <div class="col-lg-4 col-xs-12">
                    <div class="small-box bg-aqua">
                        <?php
                        $_oPjk = 100;
                        ?>
                        <div class="inner">
                            <h4><?php echo 'Jumlah Pesan'; ?></h4>
                            <br>
                            <p><font style="font-size: 17px">&ensp;<?php
                                if ((!empty($_cntMESSGE)) && ($_cntMESSGE !== 0)) {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntMESSGE . '</font> Pesan';
                                } else {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntMESSGE . '</font> Pesan';
                                };
                                ?></font></p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-paper-plane"></i></font>
                        </div>
                        <a href="<?= base_url(), 'NocUSERZZ/cfcACTUSR002/msg1st/' . $_sesFRECNMB . '/' . $_sesFCODEZZ; ?>" class="small-box-footer"><font style="font-size: 14px">Cek Detail</font>&nbsp;<i class="fas fa-arrow-circle-right fa-fw"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4><?php echo 'Aktifitas Pajak'; ?></h4>
                            <br>
                            <p><font style="font-size: 17px">&ensp;<?php
                                if ((!empty($_cntQUEUEZ)) && ($_cntQUEUEZ !== 0)) {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntQUEUEZ . '</font> Antrian';
                                } else {
                                    echo '<font style="font-size: 20px; font-weight: bolder">' . $_cntQUEUEZ . '</font> Antrian';
                                };
                                ?></font></p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-tasks"></i></font>
                        </div>
                        <a href="<?php echo base_url(), 'NocUSERZZ/cfcACTUSR021/actlst'; ?>" class="small-box-footer"><font style="font-size: 14px">Cek Detail</font>&nbsp;<i class="fas fa-arrow-circle-right fa-fw"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12">
                    <?php
                    $_oCon = $this->sklibrfnc->_fGETConSt2();
                    ?>
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h4><?php echo 'Koneksi Internet'; ?></h4>
                            <br>
                            
                            <p style="font-size: 20px; font-weight: bolder">Jaringan</p>
                        </div>
                        <div class="icon">
                            <font style="font-size: 50px; color: #fcfcfc"><i class="fas fa-wifi"></i></font>
                        </div>
                        <a href="<?php $this->sklibrfnc->_fGETConSt2(); ?>" class="small-box-footer"><font style="font-size: 14px">Cek Ulang</font>&ensp;<i class="fas fa-sync-alt fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 0px;">
            <br>
        </div>
    </div>
</div>
</section>