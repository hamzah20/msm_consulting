<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DomUSERZZ extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function mfcGETSCR()
    {

        $_objUsrIdn = $this->session->userdata('FUSRNME');
        if (empty($_objUsrIdn)) {
            $this->session->sess_destroy();
            redirect('nocLOGIEN');
        }
    }

    public function mfcACTDASBOR()
    {

        $_oMod = $this->uri->segment(3);
        $_varIDXEMP = $this->uri->segment(4);
        $_varIDXCON = $this->uri->segment(5);

        if ($_oMod == 'dasviw') {
            $this->db->select('tprofle.*');
            $this->db->from('tprofle');
            $this->db->order_by('FEMPIDN', 'ASC');
            $this->db->where(
                array(
                    'FUSRTYP = ' => '0',
                    'FEMPIDN =' => $this->session->FEMPIDN
                )
            );

            $_queEMPLOY = $this->db->get();

            if ($_queEMPLOY->num_rows() > 0) {
                return $_queEMPLOY->result_array();
            } else {
                return $_queEMPLOY->result_array();
            }
        }
    }

    public function mfcACTCHART1()
    {

        date_default_timezone_set('Asia/Jakarta');
        $_varFYERMON = date("Ym");

        $this->db->select("FSTATUS, count(FSTATUS) as FJUMLAH");
        $this->db->from("tregtra");
        $this->db->where("substr(FREGDTM,1,6) = '" . $_varFYERMON . "'");
        $this->db->group_by('FSTATUS', 'asc');

        $_queCHART1 = $this->db->get();

        return $_queCHART1->result();
    }

    public function mfcACTCHART2()
    {

        $_varFYEARZZ = date("Y");

        $_oSql = "select TWRKSTA.FWRKALS,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "01',1,0)) as JAN,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "02',1,0)) as FEB,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "03',1,0)) as MRT,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "04',1,0)) as APR,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "05',1,0)) as MEI,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "06',1,0)) as JUN,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "07',1,0)) as JUL,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "08',1,0)) as AGS,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "09',1,0)) as SEP,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "10',1,0)) as OKT,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "11',1,0)) as NOV,
                    sum(if(FPERIOD = '" . $_varFYEARZZ . "12',1,0)) as DES
                    from 
                    ( select 'ac1' as FWRKALS
                    union select 'ac2' as FWRKALS
                    union select 'ac3' as FWRKALS
                    union select 'ac4' as FWRKALS
                    ) as TWRKSTA
                    left join ttaxhst using (FWRKALS)
                    group by ttaxhst.FWRKALS
                    order by ttaxhst.FWRKALS ASC";

        $_queCHART1 = $this->db->query($_oSql);

        return $_queCHART1->result();
    }

    public function mfcACTCMPANY()
    {

        $this->db->select('*');
        $this->db->from('tgloset');
        $this->db->where('FCOMMND', '(s)cstcmpnme');

        $_objCMPANY = $this->db->get();

        if ($_objCMPANY->num_rows() > 0) {
            return $_objCMPANY->result_array();
        } else {
            return $_objCMPANY->result_array();
        }
    }

    public function mfcACTUSR001()
    {

        $this->load->dbforge();
        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_varXTABVIW = $this->uri->segment(6);
        $_varXPROCES = $this->uri->segment(7);
        $_actFRECNMB = $this->uri->segment(8);
        $_actFCODEZZ = $this->uri->segment(9);


        if ($_oMod == 'cmplst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'mon1st') {

            if (($_varXTABVIW !== 'sk_actv') || (empty($_varXPROCES))) {

                $this->dbforge->drop_table('xprofle', TRUE);

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tactvty.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tactvty');
                $this->db->join('xprofle', 'tactvty.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('FPROFLE', $_cmpFCODEZZ);
                $this->db->where('FFLGACT', 'actday');
                $this->db->order_by('FDTESTA', 'asc');
                $_queACTVTY = $this->db->get();

                if ($_queACTVTY->num_rows() > 0) {
                    return $_queACTVTY->result_array();
                } else {
                    return $_queACTVTY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'sve')) {

                $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
                $_tmpFDTESTA = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFDTESTA'));
                if (!empty($_tmpFDTESTA)) {
                    $_varFDTESTA = $this->sklibrfnc->_fSETTglMlt($_tmpFDTESTA);
                }

                $this->db->select('*');
                $this->db->from('tactvty');
                $this->db->where(
                    array(
                        'FCODEZZ = ' => $_varFCODEZZ
                    )
                );

                $_queACTVTY = $this->db->get();

                if ($_queACTVTY->num_rows() > 0) {
                    return false;
                } else {
                    $_addACTVTY = array(
                        'FCODEZZ' => $_varFCODEZZ,
                        'FDTESTA' => $_varFDTESTA,
                        'FFLGACT' => 'actday',
                        'FPROFLE' => $_cmpFCODEZZ
                    );

                    $this->db->insert('tactvty', $_addACTVTY);
                    redirect('NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/');
                }
            }

            if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'viw')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tactvty.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tactvty');
                $this->db->join('xprofle', 'tactvty.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tactvty.FCODEZZ', $_actFCODEZZ);
                $this->db->where('FFLGACT', 'actday');
                $this->db->order_by('FDTESTA', 'asc');
                $_queACTVTY = $this->db->get();

                if ($_queACTVTY->num_rows() > 0) {
                    return $_queACTVTY->result_array();
                } else {
                    return $_queACTVTY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tactvty.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tactvty');
                $this->db->join('xprofle', 'tactvty.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tactvty.FCODEZZ', $_actFCODEZZ);
                $this->db->where('FFLGACT', 'actday');
                $this->db->order_by('FDTESTA', 'asc');
                $_queACTVTY = $this->db->get();

                if ($_queACTVTY->num_rows() > 0) {
                    return $_queACTVTY->result_array();
                } else {
                    return $_queACTVTY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFTMEST1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTMEST1'));
                $_varFTMEST2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTMEST2'));
                $_varFACTVTY = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFACTVTY'));
                $_varFNOTEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNOTEZZ'));
                $_varFSTATUS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSTATUS'));

                $_updACTVTY = array(
                    'FTMESTA' => $_varFTMEST1 . '-' . $_varFTMEST2,
                    'FACTVTY' => $_varFACTVTY,
                    'FNOTEZZ' => $_varFNOTEZZ,
                    'FSTATUS' => $_varFSTATUS
                );

                $this->db->where('FCODEZZ', $_actFCODEZZ);
                $this->db->update('tactvty', $_updACTVTY);

                redirect('NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/viw/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if (($_varXTABVIW == 'sk_actv') && ($_varXPROCES == 'del')) {

                $this->db->where(
                    array(
                        'FCODEZZ = ' => $_actFCODEZZ
                    )
                );

                $this->db->delete('tactvty');
                redirect('NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_actv/');
            }

            if (($_varXTABVIW == 'sk_mont') && ($_varXPROCES == 'edt')) {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where('FTYPEZZ', 'cmp');
                $this->db->where('FRECNMB', $_actFRECNMB);
                $this->db->where('FPROFLE', $_actFCODEZZ);

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_mont') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');
                $_varFNTPNZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNTPNZZ'));

                $_updCOMPNY = array(
                    'FNTPNZZ' => $_varFNTPNZZ
                );
                $this->db->where('FRECNMB', '1');
                $this->db->update('ttaxhst', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR001/mon1st/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_mont/viw/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if (($_varXTABVIW == 'sk_itax') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_itax') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFITAXZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ1'));
                $_varFITAXZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ2'));
                $_varFITAXZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ3'));
                $_varFITAXZ4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ4'));
                $_varFITAXZ5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ5'));

                $_tmpXCHECKD == '';

                if (isset($_POST['_edtFP15ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP21ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP22ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP23ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP25ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP26ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP29ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP42ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFPUMKMZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFPPNZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N';
                }
                $_updCOMPNY = array(
                    'FITAXZZ' => $_varFITAXZ1 . '|' . $_varFITAXZ2 . '|' . $_varFITAXZ3 . '|' . $_varFITAXZ4 . '|' . $_varFITAXZ5 . '|' . $_tmpXCHECKD
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax');
            }

            if (($_varXTABVIW == 'sk_idpj') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_idpj') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFIDPJZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ1'));
                $_varFIDPJZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ2'));
                $_varFIDPJZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ3'));
                $_varFIDPJZ4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ4'));
                $_varFIDPJZ5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ5'));
                $_varFIDPJZ6 = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFIDPJZ6')));

                $_updCOMPNY = array(
                    'FIDPJZZ' => $_varFIDPJZ1 . '|' . $_varFIDPJZ2 . '|' . $_varFIDPJZ3 . '|' . $_varFIDPJZ4 . '|' . $_varFIDPJZ5 . '|' . $_varFIDPJZ6
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj');
            }

            if (($_varXTABVIW == 'sk_dkpn') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_dkpn') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFDKPNZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFDKPNZ1'));
                $_varFDKPNZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFDKPNZ2'));
                $_varFDKPNZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFDKPNZ3'));
                $_varFDKPNZ4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFDKPNZ4'));

                $_updCOMPNY = array(
                    'FDKPNZZ' => $_varFDKPNZ1 . '|' . $_varFDKPNZ2 . '|' . $_varFDKPNZ3 . '|' . $_varFDKPNZ4
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn');
            }
        }
    }

    public function mfcACTUSR002()
    {

        $_oMod = $this->uri->segment(3);

        $_empFRECNMB = $this->uri->segment(4);
        $_empFCODEZZ = $this->uri->segment(5);
        $_msgFRECNMB = $this->uri->segment(6);
        $_msgFCODEZZ = $this->uri->segment(7);

        $_varFCATGRY = $this->session->FCATGRY;

        if ($_oMod == 'msg1st') {

            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FRECNMB as GRECNMB, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XSENDER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FSENDER = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FRECVER', $_empFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg2st') {

            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FRECNMB as GRECNMB, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XRECVER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FRECVER = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FSENDER', $_empFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg1dd') {

            if ($_varFCATGRY == 'client') {

                $this->db->query('drop temporary table if exists yprofle');
                $this->db->query('create temporary table yprofle like tprofle');
                $this->db->query("insert into yprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");
            } else {
                $this->db->query('drop temporary table if exists yprofle');
                $this->db->query('create temporary table yprofle like tprofle');
                $this->db->query("insert into yprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or (FCATGRY = '" . "client" . "'" . " and FTYPEZZ = '" . "cmp" . "')");
            }

            $this->db->select('*');
            $this->db->from('yprofle');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queMERKZZ = $this->db->get();

            if ($_queMERKZZ->num_rows() > 0) {
                return $_queMERKZZ->result_array();
            } else {
                return $_queMERKZZ->result_array();
            }
        }

        if ($_oMod == 'msg1ve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFSENDER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSENDER'));
            $_varFRECVER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFRECVER'));
            $_varFSBJECT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSBJECT'));
            $_tmpFDUEDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFDUEDTE'));
            if (!empty($_tmpFDUEDTE)) {
                $_varFDUEDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFDUEDTE) . '23:59:59';
            } else {
                $_varFDUEDTE = '';
            }

            $_varFMESSGE = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFMESSGE')));
            $_varFFLAGZZ = 'U';
            date_default_timezone_set('Asia/Jakarta');
            $_varFDATISN = date("YmdH:i:s");
            $_strFATTACH = $this->input->post('_finFATTACH');
            $_intFATTACH = substr_count($_strFATTACH, '\\');
            if ($_intFATTACH == 2) {
                $_tmpFATTACH = explode('\\', $_strFATTACH);
                $_varFATTACH = str_replace(' ', '_', $_tmpFATTACH[2]);
            } elseif ($_intFATTACH == 0) {
                $_tmpFATTACH = $_strFATTACH;
                $_varFATTACH = str_replace(' ', '_', $_tmpFATTACH);
            }

            $this->db->select('*');
            $this->db->from('tmessge');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FSENDER' => $_varFSENDER,
                    'FRECVER' => $_varFRECVER,
                    'FMESSGE' => $_varFMESSGE,
                    'FSBJECT' => $_varFSBJECT,
                    'FDUEDTE' => $_varFDUEDTE,
                    'FMESSGE' => $_varFMESSGE,
                    'FFLAGZZ' => $_varFFLAGZZ,
                    'FDATISN' => $_varFDATISN,
                    'FATTACH' => $_varFATTACH,
                    'FPARENT' => '*'
                );

                $this->db->insert('tmessge', $_addMESSGE);
                return true;
            }
        }

        if ($_oMod == 'msg1iw') {

            $this->load->helper('text');

            $_varFFLAGZZ = 'R';
            date_default_timezone_set('Asia/Jakarta');
            $_varFDATIRD = date("YmdH:i:s");

            $this->db->select('*');
            $this->db->from('tmessge');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_msgFCODEZZ
                )
            );

            $_queMESSGE = $this->db->get();
            $_rslMESSGE = $_queMESSGE->result_array();

            if (!empty($_rslMESSGE['0']['FDATIRD'])) {

                $_updMESSGE = array(
                    'FFLAGZZ' => $_varFFLAGZZ
                );
            } else {

                $_updMESSGE = array(
                    'FFLAGZZ' => $_varFFLAGZZ,
                    'FDATIRD' => $_varFDATIRD
                );
            }

            $this->db->where('FCODEZZ', $_msgFCODEZZ);
            $this->db->update('tmessge', $_updMESSGE);

            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XSENDER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FSENDER = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FCODEZZ', $_msgFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg2iw') {

            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->query('drop temporary table if exists yprofle');
            $this->db->query('create temporary table yprofle like tprofle');
            $this->db->query("insert into yprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XSENDER, yprofle.FFULNME as XRECVER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FSENDER = xprofle.FCODEZZ', 'LEFT');
            $this->db->join('yprofle', 'tmessge.FRECVER = yprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FCODEZZ', $_msgFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg1rp') {
            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->query('drop temporary table if exists yprofle');
            $this->db->query('create temporary table yprofle like tprofle');
            $this->db->query("insert into yprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XSENDER, yprofle.FFULNME as XRECVER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FSENDER = xprofle.FCODEZZ', 'LEFT');
            $this->db->join('yprofle', 'tmessge.FRECVER = yprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FCODEZZ', $_msgFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg1go') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_repFCODEZZ'));
            $_varFSENDER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_repFSENDER'));
            $_varFRECVER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_repFRECVER'));
            $_varFSBJECT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_repFSBJECT'));
            $_varFMESSGE = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_repFMESSGE')));
            $_varFFLAGZZ = 'U';
            date_default_timezone_set('Asia/Jakarta');
            $_varFDATISN = date("YmdH:i:s");
            $_strFATTACH = $this->input->post('_repFATTACH');
            $_intFATTACH = substr_count($_strFATTACH, '\\');
            if ($_intFATTACH == 2) {
                $_tmpFATTACH = explode('\\', $_strFATTACH);
                $_varFATTACH = str_replace(' ', '_', $_tmpFATTACH[2]);
            } elseif ($_intFATTACH == 0) {
                $_tmpFATTACH = $_strFATTACH;
                $_varFATTACH = str_replace(' ', '_', $_tmpFATTACH);
            }

            $this->db->select('*');
            $this->db->from('tmessge');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FSENDER' => $_varFSENDER,
                    'FRECVER' => $_varFRECVER,
                    'FMESSGE' => $_varFMESSGE,
                    'FSBJECT' => $_varFSBJECT,
                    'FMESSGE' => $_varFMESSGE,
                    'FFLAGZZ' => $_varFFLAGZZ,
                    'FDATISN' => $_varFDATISN,
                    'FATTACH' => $_varFATTACH
                );

                $this->db->insert('tmessge', $_addMESSGE);
                return true;
            }
        }

        if ($_oMod == 'msg1dt') {

            $this->load->helper('text');

            $_varFFLAGZZ = 'R';
            date_default_timezone_set('Asia/Jakarta');
            $_varFDATIRD = date("YmdH:i:s");

            $this->db->select('*');
            $this->db->from('tmessge');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_msgFCODEZZ
                )
            );

            $_queMESSGE = $this->db->get();
            $_rslMESSGE = $_queMESSGE->result_array();

            if (!empty($_rslMESSGE['0']['FDATIRD'])) {

                $_updMESSGE = array(
                    'FFLAGZZ' => $_varFFLAGZZ
                );
            } else {

                $_updMESSGE = array(
                    'FFLAGZZ' => $_varFFLAGZZ,
                    'FDATIRD' => $_varFDATIRD
                );
            }

            $this->db->where('FCODEZZ', $_msgFCODEZZ);
            $this->db->update('tmessge', $_updMESSGE);

            $this->db->query('drop temporary table if exists xprofle');
            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'" . " or " . "FCATGRY = '" . "client" . "'");

            $this->db->select('*, tmessge.FCODEZZ as GCODEZZ, xprofle.FFULNME as XSENDER');
            $this->db->from('tmessge');
            $this->db->join('xprofle', 'tmessge.FSENDER = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tmessge.FCODEZZ', $_msgFCODEZZ);
            $this->db->order_by('tmessge.FCODEZZ', 'ASC');

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return $_queMESSGE->result_array();
            } else {
                return $_queMESSGE->result_array();
            }
        }

        if ($_oMod == 'msg1pd') {

            $this->load->helper('text');

            $_varFEMLSTA = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMLSTA'));
            date_default_timezone_set('Asia/Jakarta');
            $_varFUPDSTA = date("YmdH:i:s");


            $_updMESSAGE = array(
                'FEMLSTA' => $_varFEMLSTA,
                'FUPDSTA' => $_varFUPDSTA
            );

            $this->db->where('FCODEZZ', $_msgFCODEZZ);
            $this->db->update('tmessge', $_updMESSAGE);

            redirect('NocUSERZZ/cfcACTUSR002/msg1iw/' . $_empFRECNMB . '/' . $_empFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ);
        }

        if ($_oMod == 'cmpedt') {

            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

            $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
            $this->db->from('tprofle');
            $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'cmpupd') {

            $this->load->helper('text');

            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFEFINZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFEFINZZ'));
            $_varFNPWPZ1 = 'Y';
            $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
            $_varFKLUZZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFKLUZZZ'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));
            $_varFHEADZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFHEADZZ'));
            $_strFNPWPZZ = $this->input->post('_edtFNPWPZZ');
            $_intFNPWPZZ = substr_count($_strFNPWPZZ, '\\');
            if ($_intFNPWPZZ == 2) {
                $_tmpFNPWPZZ = explode('\\', $_strFNPWPZZ);
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ[2]);
            } elseif ($_intFNPWPZZ == 0) {
                $_tmpFNPWPZZ = $_strFNPWPZZ;
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ);
            }
            $_strFPKPZZZ = $this->input->post('_edtFPKPZZZ');
            $_intFPKPZZZ = substr_count($_strFPKPZZZ, '\\');
            if ($_intFPKPZZZ == 2) {
                $_tmpFPKPZZZ = explode('\\', $_strFPKPZZZ);
                $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ[2]);
            } elseif ($_intFPKPZZZ == 0) {
                $_tmpFPKPZZZ = $_strFPKPZZZ;
                $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ);
            }

            $_updCOMPNY = array(
                'FFULNME' => $_varFFULNME,
                'FEFINZZ' => $_varFEFINZZ,
                'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                'FKLUZZZ' => $_varFKLUZZZ,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ,
                'FHEADZZ' => $_varFHEADZZ,
                'FNPWPDC' => $_varFNPWPDC,
                'FPKPZDC' => $_varFPKPZDC
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tprofle', $_updCOMPNY);

            redirect('NocUSERZZ/cfcACTUSR001/cmpviw/' . $_cmpFCODEZZ);
        }
    }

    public function mfcACTUSR003()
    {
        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);

        if ($_oMod == 'tsklst') {

            $this->db->select('*');
            $this->db->from('ttskmgm');
            $this->db->order_by('FTSKDTE', 'desc');

            $_queTSKMGM = $this->db->get();

            if ($_queTSKMGM->num_rows() > 0) {
                return $_queTSKMGM->result_array();
            } else {
                return $_queTSKMGM->result_array();
            }
        }

        if ($_oMod == 'tsksve') {
            date_default_timezone_set('Asia/Jakarta');

            $_varFTSKDTE = date("YmdH:i:s");
            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFOFICE1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFOFICE1'));
            $_varFOFICE2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFOFICE2'));
            $_varFOFICE3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFOFICE3'));
            $_varFSBJECT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSBJECT'));
            $_varFDUEDTE = '';
            $_varFSTATUS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSTATUS'));
            $_varFPRIORT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPRIORT'));

            $this->db->select('*');
            $this->db->from('ttskmgm');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queTSKMGM = $this->db->get();

            if ($_queTSKMGM->num_rows() > 0) {
                return false;
            } else {

                $_addTSKMGM = array(
                    'FTSKDTE' => $_varFTSKDTE,
                    'FCODEZZ' => $_varFCODEZZ,
                    'FOFICER' => $_varFOFICE1 . '; ' . $_varFOFICE2 . '; ' . $_varFOFICE3,
                    'FSBJECT' => $_varFSBJECT,
                    'FDUEDTE' => $_varFDUEDTE,
                    'FSTATUS' => $_varFSTATUS,
                    'FPRIORT' => $_varFPRIORT
                );

                $this->db->insert('ttskmgm', $_addTSKMGM);
                return true;
            }
        }

        if ($_oMod == 'tskviw') {

            $this->db->select('*');
            $this->db->from('ttskmgm');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FTSKDTE', 'desc');

            $_queTSKMGM = $this->db->get();

            if ($_queTSKMGM->num_rows() > 0) {
                return $_queTSKMGM->result_array();
            } else {
                return $_queTSKMGM->result_array();
            }
        }

        if ($_oMod == 'tskedt') {

            $this->db->select('*');
            $this->db->from('ttskmgm');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queTSKMGM = $this->db->get();

            if ($_queTSKMGM->num_rows() > 0) {
                return $_queTSKMGM->result_array();
            } else {
                return $_queTSKMGM->result_array();
            }
        }

        if ($_oMod == 'tskupd') {

            $this->load->helper('text');

            $_varFOFICE1 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFOFICE1')));
            $_varFOFICE2 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFOFICE2')));
            $_varFOFICE3 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFOFICE3')));
            $_varFSBJECT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSBJECT'));
            $_varFSTATUS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSTATUS'));
            $_varFPRIORT = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPRIORT'));

            $_updTSKMGM = array(
                'FOFICER' => $_varFOFICE1 . ';' . $_varFOFICE2 . ';' . $_varFOFICE3,
                'FSBJECT' => $_varFSBJECT,
                'FSTATUS' => $_varFSTATUS,
                'FPRIORT' => $_varFPRIORT
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('ttskmgm', $_updTSKMGM);

            redirect('NocUSERZZ/cfcACTUSR003/tskviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'tskdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('ttskmgm');
            return true;
        }
    }

    public function xls()
    {
        return $this->db->get('siswa')->result();
    }

    public function mfcACTUSR004()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);

        if ($_oMod == 'expxls') {
            return $this->db->get('siswa')->result();
        }
        if ($_oMod == 'kpplst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'kppofc');
            $this->db->or_where('FCATGRY', 'nonkpp');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'kppadd') {
        }

        if ($_oMod == 'kppsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFCATGRY = 'kppofc';
            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFEMAILZ'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queKPPOFF = $this->db->get();

            if ($_queKPPOFF->num_rows() > 0) {
                return false;
            } else {

                $_addKPPOFF = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FCATGRY' => $_varFCATGRY,
                    'FSEQNMB' => $_varFSEQNMB,
                    'FFULNME' => $_varFFULNME,
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FEMAILZ' => $_varFEMAILZ
                );

                $this->db->insert('tprofle', $_addKPPOFF);
                return true;
            }
        }

        if ($_oMod == 'kppviw') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'kppedt') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'kppupd') {

            $this->load->helper('text');

            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_updKPPOFF = array(
                'FSEQNMB' => $_varFSEQNMB,
                'FFULNME' => $_varFFULNME,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tprofle', $_updKPPOFF);

            redirect('NocUSERZZ/cfcACTUSR004/kppviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'kppdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }
    }

    public function mfcACTUSR005()
    {

        $_oMod = $this->uri->segment(3);
        $_varIDXREC = $this->uri->segment(4);
        $_vndFRECNMB = $this->uri->segment(4);
        $_vndFCODEZZ = $this->uri->segment(5);

        if ($_oMod == 'vndlst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'vendor');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'vndadd') {
        }


        if ($_oMod == 'vndsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFEMAILZ'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queVENDOR = $this->db->get();

            if ($_queVENDOR->num_rows() > 0) {
                return false;
            } else {

                $_addVENDOR = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FEMAILZ' => $_varFEMAILZ,
                    'FCATGRY' => 'vendor'
                );

                $this->db->insert('tprofle', $_addVENDOR);
                return true;
            }
        }

        if ($_oMod == 'vndviw') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->order_by('FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'FRECNMB = ' => $_vndFRECNMB
                )
            );

            $_queVENDOR = $this->db->get();

            if ($_queVENDOR->num_rows() > 0) {
                return $_queVENDOR->result_array();
            } else {
                return $_queVENDOR->result_array();
            }
        }

        if ($_oMod == 'vndedt') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->order_by('FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'FRECNMB = ' => $_vndFRECNMB
                )
            );

            $_queVENDOR = $this->db->get();

            if ($_queVENDOR->num_rows() > 0) {
                return $_queVENDOR->result_array();
            } else {
                return $_queVENDOR->result_array();
            }
        }

        if ($_oMod == 'vndupd') {

            $this->load->helper('text');

            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_updVENDOR = array(
                'FFULNME' => $_varFFULNME,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ
            );

            $this->db->where('FRECNMB', $_vndFRECNMB);
            $this->db->update('tprofle', $_updVENDOR);

            redirect('NocUSERZZ/cfcACTUSR005/vndviw/' . $_vndFRECNMB . '/' . $_vndFCODEZZ);
        }

        if ($_oMod == 'vnddel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_vndFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }
    }

    public function mfcACTUSR006()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_varXTABVIW = $this->uri->segment(6);
        $_varXPROCES = $this->uri->segment(7);

        if ($_oMod == 'cmplst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'cmp1dd') {
        }


        if ($_oMod == 'cmp1ve') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("Y");

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFNPWPZZ = 'Y;';
            $_varFSERVCE = 'n;;;;n;;;;n;;;;n;;;;n;;;;n;;;;1';

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return false;
            } else {

                $_addPROFLE = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FUSRTYP' => '0',
                    'FACTIVE' => '1',
                    'FJOBLVL' => '1',
                    'FHEADZZ' => ';',
                    'FNPWPZZ' => $_varFNPWPZZ,
                    'FSERVCE' => $_varFSERVCE,
                    'FEFKTUR' => ';;;;;',
                    'FCATGRY' => 'client',
                    'FTYPEZZ' => 'cmp',
                    'FIDWPZZ' => '||||||',
                    'FITAXZZ' => '|||||N;N;N;N;N;N;N;N;N;N',
                    'FIDPJZZ' => '|||||',
                    'FDKPNZZ' => '|||',
                    'FSKTZZZ' => ';',
                    'FPKPZZZ' => ';',
                    'FTDPZZZ' => ';',
                    'FACTCOD' => ';',
                    'FSSEDJP' => ';',
                    'FENOFAZ' => ';',
                    'FEMLCLN' => ';'
                );

                $this->db->insert('tprofle', $_addPROFLE);
                return true;
            }
        }

        if ($_oMod == 'cmp1iw') {


            if (empty($_varXPROCES)) {
                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_main') && ($_varXPROCES == 'edt')) {
                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_main') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
                $_varFEFINZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFEFINZZ'));
                $_varFNPWPZ1 = 'Y';
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
                $_varFKLUZZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFKLUZZZ'));
                $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
                $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
                $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
                $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));
                $_varFHEADZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFHEADZ1'));
                $_varFHEADZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFHEADZ2'));
                $_varFHEADZZ = $_varFHEADZ1 . ';' . $_varFHEADZ2;

                $_strFPKPZZZ = $this->input->post('_edtFPKPZZZ');
                $_intFPKPZZZ = substr_count($_strFPKPZZZ, '\\');
                if ($_intFPKPZZZ == 2) {
                    $_tmpFPKPZZZ = explode('\\', $_strFPKPZZZ);
                    $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ[2]);
                } elseif ($_intFPKPZZZ == 0) {
                    $_tmpFPKPZZZ = $_strFPKPZZZ;
                    $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ);
                }

                $_tmpFSKTZZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSKTZZ1'));
                if (!empty($_tmpFSKTZZ1)) {
                    $_varFSKTZZ1 = $this->sklibrfnc->_fSETTglMlt($_tmpFSKTZZ1);
                } else {
                    $_varFSKTZZ1 = '';
                }
                $_varFSKTZZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSKTZZ2'));
                $_varFTDPZZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTDPZZ1'));
                $_varFTDPZZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTDPZZ2'));
                $_tmpFPKPZZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPKPZZ1'));
                if (!empty($_tmpFPKPZZ1)) {
                    $_varFPKPZZ1 = $this->sklibrfnc->_fSETTglMlt($_tmpFPKPZZ1);
                } else {
                    $_varFPKPZZ1 = '';
                }
                $_varFPKPZZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPKPZZ2'));
                $_varFEFKTU1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU1'));
                $_varFEFKTU1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU1'));
                $_varFEFKTU2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU2'));
                $_varFEFKTU3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU3'));
                $_varFEFKTU4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU4'));
                $_varFEFKTU5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU5'));
                $_tmpFEFKTU6 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFKTU6'));
                if (!empty($_tmpFEFKTU6)) {
                    $_varFEFKTU6 = $this->sklibrfnc->_fSETTglMlt($_tmpFEFKTU6);
                } else {
                    $_varFEFKTU6 = '';
                }
                $_varFACTCO1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFACTCO1'));
                $_varFACTCO2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFACTCO2'));
                $_varFENOFA1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFENOFA1'));
                $_varFENOFA2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFENOFA2'));
                $_varFSSEDJ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSSEDJ1'));
                $_varFSSEDJ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSSEDJ2'));
                $_varFEMLCL1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMLCL1'));
                $_varFEMLCL2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMLCL2'));
                $_varFCLCP21 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCLCP21'));

                $_updCOMPNY = array(
                    'FFULNME' => $_varFFULNME,
                    'FEFINZZ' => $_varFEFINZZ,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                    'FKLUZZZ' => $_varFKLUZZZ,
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FEMAILZ' => $_varFEMAILZ,
                    'FHEADZZ' => $_varFHEADZZ,
                    'FSKTZZZ' => $_varFSKTZZ1 . ';' . $_varFSKTZZ2,
                    'FTDPZZZ' => $_varFTDPZZ1 . ';' . $_varFTDPZZ2,
                    'FEFKTUR' => $_varFEFKTU1 . ';' . $_varFEFKTU2 . ';' . $_varFEFKTU3 . ';' . $_varFEFKTU4 . ';' . $_varFEFKTU5 . ';' . $_varFEFKTU6,
                    'FACTCOD' => $_varFACTCO1 . ';' . $_varFACTCO2,
                    'FENOFAZ' => $_varFENOFA1 . ';' . $_varFENOFA2,
                    'FSSEDJP' => $_varFSSEDJ1 . ';' . $_varFSSEDJ2,
                    'FEMLCLN' => $_varFEMLCL1 . ';' . $_varFEMLCL2,
                    'FCLCP21' => $_varFCLCP21
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_main');
            }

            if (($_varXTABVIW == 'sk_srvc') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_srvc') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFSERV01 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV01')));
                $_varFSERV02 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV02')));
                $_varFSERV03 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV03')));
                $_varFSERV04 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV04')));
                $_varFSERV05 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV05')));
                $_varFSERV06 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV06')));
                $_varFSERV07 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV07')));
                $_varFSERV08 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV08')));
                $_varFSERV09 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV09')));
                $_varFSERV10 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV10')));
                $_varFSERV11 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV11')));
                $_varFSERV12 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV12')));
                $_varFSERV13 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV13')));
                $_varFSERV14 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV14')));
                $_varFSERV15 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV15')));
                $_varFSERV16 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV16')));
                $_varFSERV17 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV17')));
                $_varFSERV18 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV18')));
                $_varFSERV19 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV19')));
                $_varFSERV20 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV20')));
                $_varFSERV21 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV21')));
                $_varFSERV22 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV22')));
                $_varFSERV23 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV23')));
                $_varFSERV24 = trim($this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSERV24')));

                $_updSERVCE = array(
                    'FSERVCE' => $_varFSERV01 . ';' . $_varFSERV02 . ';' . $_varFSERV03 . ';' . $_varFSERV04 . ';' . $_varFSERV05 . ';' . $_varFSERV06 . ';' . $_varFSERV07 . ';' . $_varFSERV08 . ';' . $_varFSERV09 . ';' . $_varFSERV10 . ';' . $_varFSERV11 . ';' . $_varFSERV12 . ';' . $_varFSERV13 . ';' . $_varFSERV14 . ';' . $_varFSERV15 . ';' . $_varFSERV16 . ';' . $_varFSERV17 . ';' . $_varFSERV18 . ';' . $_varFSERV19 . ';' . $_varFSERV20 . ';' . $_varFSERV21 . ';' . $_varFSERV22 . ';' . $_varFSERV23 . ';' . $_varFSERV24 . ';1'
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updSERVCE);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_srvc');
            }

            if (($_varXTABVIW == 'sk_idwp') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_idwp') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFIDWPZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDWPZ1'));
                $_varFIDWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFIDWPZ2'));
                $_varFIDWPZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDWPZ3'));
                $_varFIDWPZ4 = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFIDWPZ4')));
                $_varFIDWPZ5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDWPZ5'));
                $_varFIDWPZ6 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDWPZ6'));
                $_varFIDWPZ7 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDWPZ7'));

                $_updCOMPNY = array(
                    'FIDWPZZ' => $_varFIDWPZ1 . '|' . $_varFIDWPZ2 . '|' . $_varFIDWPZ3 . '|' . $_varFIDWPZ4 . '|' . $_varFIDWPZ5 . '|' . $_varFIDWPZ6 . '|' . $_varFIDWPZ7
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idwp');
            }

            if (($_varXTABVIW == 'sk_itax') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_itax') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFITAXZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ1'));
                $_varFITAXZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ2'));
                $_varFITAXZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ3'));
                $_varFITAXZ4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ4'));
                $_varFITAXZ5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFITAXZ5'));

                $_tmpXCHECKD == '';

                if (isset($_POST['_edtFP15ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP21ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP22ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP23ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP25ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP26ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP29ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFP42ZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFPUMKMZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;';
                }
                if (isset($_POST['_edtFPPNZZZ'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N';
                }
                $_updCOMPNY = array(
                    'FITAXZZ' => $_varFITAXZ1 . '|' . $_varFITAXZ2 . '|' . $_varFITAXZ3 . '|' . $_varFITAXZ4 . '|' . $_varFITAXZ5 . '|' . $_tmpXCHECKD
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_itax');
            }

            if (($_varXTABVIW == 'sk_idpj') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_idpj') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');

                $_varFIDPJZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ1'));
                $_varFIDPJZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ2'));
                $_varFIDPJZ3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ3'));
                $_varFIDPJZ4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ4'));
                $_varFIDPJZ5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFIDPJZ5'));
                $_varFIDPJZ6 = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFIDPJZ6')));

                $_updCOMPNY = array(
                    'FIDPJZZ' => $_varFIDPJZ1 . '|' . $_varFIDPJZ2 . '|' . $_varFIDPJZ3 . '|' . $_varFIDPJZ4 . '|' . $_varFIDPJZ5 . '|' . $_varFIDPJZ6
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_idpj');
            }

            if (($_varXTABVIW == 'sk_dkpn') && ($_varXPROCES == 'edt')) {

                $this->db->query('create temporary table xprofle like tprofle');
                $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

                $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
                $this->db->from('tprofle');
                $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
                $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
                $this->db->where(
                    array(
                        'tprofle.FRECNMB = ' => $_cmpFRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if (($_varXTABVIW == 'sk_dkpn') && ($_varXPROCES == 'upd')) {

                $this->load->helper('text');


                $_strFNPWPZZ = $this->input->post('_edtFNPWPZZ');
                $_intFNPWPZZ = substr_count($_strFNPWPZZ, '\\');
                if ($_intFNPWPZZ == 2) {
                    $_tmpFNPWPZZ = explode('\\', $_strFNPWPZZ);
                    $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ[2]);
                } elseif ($_intFNPWPZZ == 0) {
                    $_tmpFNPWPZZ = $_strFNPWPZZ;
                    $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ);
                }

                $_strFSKTXDC = $this->input->post('_edtFSKTXDC');
                $_intFSKTXDC = substr_count($_strFSKTXDC, '\\');
                if ($_intFSKTXDC == 2) {
                    $_tmpFSKTXDC = explode('\\', $_strFSKTXDC);
                    $_varFSKTXDC = str_replace(' ', '_', $_tmpFSKTXDC[2]);
                } elseif ($_intFSKTXDC == 0) {
                    $_tmpFSKTXDC = $_strFSKTXDC;
                    $_varFSKTXDC = str_replace(' ', '_', $_tmpFSKTXDC);
                }

                $_strFPKPXDC = $this->input->post('_edtFPKPXDC');
                $_intFPKPXDC = substr_count($_strFPKPXDC, '\\');
                if ($_intFPKPXDC == 2) {
                    $_tmpFPKPXDC = explode('\\', $_strFPKPXDC);
                    $_varFPKPXDC = str_replace(' ', '_', $_tmpFPKPXDC[2]);
                } elseif ($_intFPKPXDC == 0) {
                    $_tmpFPKPXDC = $_strFPKPXDC;
                    $_varFPKPXDC = str_replace(' ', '_', $_tmpFPKPXDC);
                }

                $_strFTDPXDC = $this->input->post('_edtFTDPXDC');
                $_intFTDPXDC = substr_count($_strFTDPXDC, '\\');
                if ($_intFTDPXDC == 2) {
                    $_tmpFTDPXDC = explode('\\', $_strFTDPXDC);
                    $_varFTDPXDC = str_replace(' ', '_', $_tmpFTDPXDC[2]);
                } elseif ($_intFTDPXDC == 0) {
                    $_tmpFTDPXDC = $_strFTDPXDC;
                    $_varFTDPXDC = str_replace(' ', '_', $_tmpFTDPXDC);
                }

                $_strFSIUPDC = $this->input->post('_edtFSIUPDC');
                $_intFSIUPDC = substr_count($_strFSIUPDC, '\\');
                if ($_intFSIUPDC == 2) {
                    $_tmpFSIUPDC = explode('\\', $_strFSIUPDC);
                    $_varFSIUPDC = str_replace(' ', '_', $_tmpFSIUPDC[2]);
                } elseif ($_intFSIUPDC == 0) {
                    $_tmpFSIUPDC = $_strFSIUPDC;
                    $_varFSIUPDC = str_replace(' ', '_', $_tmpFSIUPDC);
                }

                $_strFNIBXDC = $this->input->post('_edtFNIBXDC');
                $_intFNIBXDC = substr_count($_strFNIBXDC, '\\');
                if ($_intFNIBXDC == 2) {
                    $_tmpFNIBXDC = explode('\\', $_strFNIBXDC);
                    $_varFNIBXDC = str_replace(' ', '_', $_tmpFNIBXDC[2]);
                } elseif ($_intFNIBXDC == 0) {
                    $_tmpFNIBXDC = $_strFNIBXDC;
                    $_varFNIBXDC = str_replace(' ', '_', $_tmpFNIBXDC);
                }

                $_strFAKPNDC = $this->input->post('_edtFAKPNDC');
                $_intFAKPNDC = substr_count($_strFAKPNDC, '\\');
                if ($_intFAKPNDC == 2) {
                    $_tmpFAKPNDC = explode('\\', $_strFAKPNDC);
                    $_varFAKPNDC = str_replace(' ', '_', $_tmpFAKPNDC[2]);
                } elseif ($_intFAKPNDC == 0) {
                    $_tmpFAKPNDC = $_strFAKPNDC;
                    $_varFAKPNDC = str_replace(' ', '_', $_tmpFAKPNDC);
                }

                $_strFAKPRDC = $this->input->post('_edtFAKPRDC');
                $_intFAKPRDC = substr_count($_strFAKPRDC, '\\');
                if ($_intFAKPRDC == 2) {
                    $_tmpFAKPRDC = explode('\\', $_strFAKPRDC);
                    $_varFAKPRDC = str_replace(' ', '_', $_tmpFAKPRDC[2]);
                } elseif ($_intFAKPRDC == 0) {
                    $_tmpFAKPRDC = $_strFAKPRDC;
                    $_varFAKPRDC = str_replace(' ', '_', $_tmpFAKPRDC);
                }

                $_strFAKSPDC = $this->input->post('_edtFAKSPDC');
                $_intFAKSPDC = substr_count($_strFAKSPDC, '\\');
                if ($_intFAKSPDC == 2) {
                    $_tmpFAKSPDC = explode('\\', $_strFAKSPDC);
                    $_varFAKSPDC = str_replace(' ', '_', $_tmpFAKSPDC[2]);
                } elseif ($_intFAKSPDC == 0) {
                    $_tmpFAKSPDC = $_strFAKSPDC;
                    $_varFAKSPDC = str_replace(' ', '_', $_tmpFAKSPDC);
                }

                $_strFSKBXDC = $this->input->post('_edtFSKBXDC');
                $_intFSKBXDC = substr_count($_strFSKBXDC, '\\');
                if ($_intFSKBXDC == 2) {
                    $_tmpFSKBXDC = explode('\\', $_strFSKBXDC);
                    $_varFSKBXDC = str_replace(' ', '_', $_tmpFSKBXDC[2]);
                } elseif ($_intFSKBXDC == 0) {
                    $_tmpFSKBXDC = $_strFSKBXDC;
                    $_varFSKBXDC = str_replace(' ', '_', $_tmpFSKBXDC);
                }

                $_strFSERTDC = $this->input->post('_edtFSERTDC');
                $_intFSERTDC = substr_count($_strFSERTDC, '\\');
                if ($_intFSERTDC == 2) {
                    $_tmpFSERTDC = explode('\\', $_strFSERTDC);
                    $_varFSERTDC = str_replace(' ', '_', $_tmpFSERTDC[2]);
                } elseif ($_intFSERTDC == 0) {
                    $_tmpFSERTDC = $_strFSERTDC;
                    $_varFSERTDC = str_replace(' ', '_', $_tmpFSERTDC);
                }

                $_strFSKDUDC = $this->input->post('_edtFSKDUDC');
                $_intFSKDUDC = substr_count($_strFSKDUDC, '\\');
                if ($_intFSKDUDC == 2) {
                    $_tmpFSKDUDC = explode('\\', $_strFSKDUDC);
                    $_varFSKDUDC = str_replace(' ', '_', $_tmpFSKDUDC[2]);
                } elseif ($_intFSKDUDC == 0) {
                    $_tmpFSKDUDC = $_strFSKDUDC;
                    $_varFSKDUDC = str_replace(' ', '_', $_tmpFSKDUDC);
                }

                $_strFEFINDC = $this->input->post('_edtFEFINDC');
                $_intFEFINDC = substr_count($_strFEFINDC, '\\');
                if ($_intFEFINDC == 2) {
                    $_tmpFEFINDC = explode('\\', $_strFEFINDC);
                    $_varFEFINDC = str_replace(' ', '_', $_tmpFEFINDC[2]);
                } elseif ($_intFEFINDC == 0) {
                    $_tmpFEFINDC = $_strFEFINDC;
                    $_varFEFINDC = str_replace(' ', '_', $_tmpFEFINDC);
                }

                $_strFKDIRDC = $this->input->post('_edtFKDIRDC');
                $_intFKDIRDC = substr_count($_strFKDIRDC, '\\');
                if ($_intFKDIRDC == 2) {
                    $_tmpFKDIRDC = explode('\\', $_strFKDIRDC);
                    $_varFKDIRDC = str_replace(' ', '_', $_tmpFKDIRDC[2]);
                } elseif ($_intFKDIRDC == 0) {
                    $_tmpFKDIRDC = $_strFKDIRDC;
                    $_varFKDIRDC = str_replace(' ', '_', $_tmpFKDIRDC);
                }

                $_strFNDIRDC = $this->input->post('_edtFNDIRDC');
                $_intFNDIRDC = substr_count($_strFNDIRDC, '\\');
                if ($_intFNDIRDC == 2) {
                    $_tmpFNDIRDC = explode('\\', $_strFNDIRDC);
                    $_varFNDIRDC = str_replace(' ', '_', $_tmpFNDIRDC[2]);
                } elseif ($_intFNDIRDC == 0) {
                    $_tmpFNDIRDC = $_strFNDIRDC;
                    $_varFNDIRDC = str_replace(' ', '_', $_tmpFNDIRDC);
                }

                $_updCOMPNY = array(
                    'FNPWPDC' => $_varFNPWPDC,
                    'FSKTXDC' => $_varFSKTXDC,
                    'FPKPXDC' => $_varFPKPXDC,
                    'FTDPXDC' => $_varFTDPXDC,
                    'FSIUPDC' => $_varFSIUPDC,
                    'FNIBXDC' => $_varFNIBXDC,
                    'FAKPNDC' => $_varFAKPNDC,
                    'FAKPRDC' => $_varFAKPRDC,
                    'FAKSPDC' => $_varFAKSPDC,
                    'FSKBXDC' => $_varFSKBXDC,
                    'FSERTDC' => $_varFSERTDC,
                    'FSKDUDC' => $_varFSKDUDC,
                    'FEFINDC' => $_varFEFINDC,
                    'FKDIRDC' => $_varFKDIRDC,
                    'FNDIRDC' => $_varFNDIRDC
                );

                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->update('tprofle', $_updCOMPNY);

                redirect('NocUSERZZ/cfcACTUSR006/cmp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/sk_dkpn');
            }
        }

        if ($_oMod == 'cmp1el') {


            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tprofle');


            $this->db->where(
                array(
                    'FGROUPS = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tprofle');


            $this->db->where(
                array(
                    'FPROFLE = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('ttaxhst');


            $this->db->where(
                array(
                    'FGROUPS = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('ttaxhst');

            return true;
        }

        if ($_oMod == 'cmp2iw') {

            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

            $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
            $this->db->from('tprofle');
            $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'cmp2dt') {

            $this->db->query('create temporary table xprofle like tprofle');
            $this->db->query("insert into xprofle select * from tprofle where FCATGRY = '" . "staffz" . "'");

            $this->db->select('tprofle.*, xprofle.FFULNME AS XHANDLE');
            $this->db->from('tprofle');
            $this->db->join('xprofle', 'tprofle.FHANDLE = xprofle.FCODEZZ', 'LEFT');
            $this->db->where('tprofle.FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'cmp2pd') {

            $this->load->helper('text');

            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFEFINZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFEFINZZ'));
            $_varFNPWPZ1 = 'Y';
            $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
            $_varFKLUZZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFKLUZZZ'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));
            $_varFHEADZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFHEADZ1'));
            $_varFHEADZ2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFHEADZ2'));
            $_varFHEADZZ = $_varFHEADZ1 . ';' . $_varFHEADZ2;
            $_strFNPWPZZ = $this->input->post('_edtFNPWPZZ');
            $_intFNPWPZZ = substr_count($_strFNPWPZZ, '\\');
            if ($_intFNPWPZZ == 2) {
                $_tmpFNPWPZZ = explode('\\', $_strFNPWPZZ);
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ[2]);
            } elseif ($_intFNPWPZZ == 0) {
                $_tmpFNPWPZZ = $_strFNPWPZZ;
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPZZ);
            }
            $_strFPKPZZZ = $this->input->post('_edtFPKPZZZ');
            $_intFPKPZZZ = substr_count($_strFPKPZZZ, '\\');
            if ($_intFPKPZZZ == 2) {
                $_tmpFPKPZZZ = explode('\\', $_strFPKPZZZ);
                $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ[2]);
            } elseif ($_intFPKPZZZ == 0) {
                $_tmpFPKPZZZ = $_strFPKPZZZ;
                $_varFPKPZDC = str_replace(' ', '_', $_tmpFPKPZZZ);
            }

            $_updCOMPNY = array(
                'FFULNME' => $_varFFULNME,
                'FEFINZZ' => $_varFEFINZZ,
                'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                'FKLUZZZ' => $_varFKLUZZZ,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ,
                'FHEADZZ' => $_varFHEADZZ,
                'FNPWPDC' => $_varFNPWPDC,
                'FPKPZDC' => $_varFPKPZDC
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tprofle', $_updCOMPNY);

            redirect('NocUSERZZ/cfcACTUSR006/cmp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }
    }

    public function mfcACTUSR007()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_empFRECNMB = $this->uri->segment(6);
        $_empFCODEZZ = $this->uri->segment(7);


        if ($_oMod == 'cmplst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp1st') {

            $this->db->select('*, tprofle.FRECNMB AS XRECNMB, tprofle.FCODEZZ AS XCODEZZ, tmaritl.FPTKPCD AS XPTKPCD, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->where('tprofle.FGROUPS', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp1ve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFCHGPST = 'FEE2020-00001';
            $_varFCHGP21 = 'P212020-00001';

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return false;
            } else {

                $_addPROFLE = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FGROUPS' => $_cmpFCODEZZ,
                    'FCHGPST' => $_varFCHGPST,
                    'FCHGP21' => $_varFCHGP21
                );

                $this->db->insert('tprofle', $_addPROFLE);
                return true;
            }
        }

        if ($_oMod == 'emp1iw') {

            $this->db->select('tprofle.*, tstaffz.FDESCRP AS XHANDLE, tmaritl.FCODEZZ AS XCODEZZ, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tstaffz', 'tprofle.FHANDLE = tstaffz.FCODEZZ', 'LEFT');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'tprofle.FRECNMB = ' => $_empFRECNMB
                )
            );

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp1dt') {

            $this->db->select('tprofle.*, tstaffz.FDESCRP AS XHANDLE, tmaritl.FCODEZZ AS XCODEZZ, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tstaffz', 'tprofle.FHANDLE = tstaffz.FCODEZZ', 'LEFT');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'tprofle.FRECNMB = ' => $_empFRECNMB
                )
            );

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp1pd') {

            $this->load->helper('text');

            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFCITIDN = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCITIDN'));
            $_varFMARITL = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFMARITL'));
            $_varFEFINZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFINZZ'));
            $_varFNPWPZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNPWPZ1'));
            $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
            $_varFEMPIDN = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMPIDN'));
            $_tmpFSTADTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSTADTE'));
            if (!empty($_tmpFSTADTE)) {
                $_varFSTADTE = $this->sklibrfnc->_fSETTglMlt($_tmpFSTADTE);
            } else {
                $_varFSTADTE = '';
            }
            $_tmpFENDDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFENDDTE'));
            if (!empty($_tmpFENDDTE)) {
                $_varFENDDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFENDDTE);
            } else {
                $_varFENDDTE = '';
            }
            $_varFWRKTYP = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFWRKTYP'));
            $_varFJOBTTL = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFJOBTTL'));
            $_varFNATION = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNATION'));
            $_strFNPWPDC = $this->input->post('_edtFNPWPDC');
            $_intFNPWPDC = substr_count($_strFNPWPDC, '\\');
            if ($_intFNPWPDC == 2) {
                $_tmpFNPWPDC = explode('\\', $_strFNPWPDC);
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPDC[2]);
            } elseif ($_intFNPWPDC == 0) {
                $_tmpFNPWPDC = $_strFNPWPDC;
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPDC);
            }
            $_varFGENDER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFGENDER'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_varFCHGPST = 'FEE2020-00001';
            $_varFCHGP21 = 'P212020-00001';


            $_updEMPLOY = array(
                'FFULNME' => $_varFFULNME,
                'FCITIDN' => $_varFCITIDN,
                'FMARITL' => $_varFMARITL,
                'FEFINZZ' => $_varFEFINZZ,
                'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                'FEMPIDN' => trim($_varFEMPIDN),
                'FSTADTE' => $_varFSTADTE,
                'FENDDTE' => $_varFENDDTE,
                'FWRKTYP' => $_varFWRKTYP,
                'FJOBTTL' => $_varFJOBTTL,
                'FNATION' => $_varFNATION,
                'FNPWPDC' => $_varFNPWPDC,
                'FGENDER' => $_varFGENDER,
                'FTELPON' => $_varFTELPON,
                'FADDRES' => $_varFADDRES,
                'FEMAILZ' => $_varFEMAILZ,
                'FCHGPST' => $_varFCHGPST,
                'FCHGP21' => $_varFCHGP21
            );

            $this->db->where('FCODEZZ', $_empFCODEZZ);
            $this->db->update('tprofle', $_updEMPLOY);

            redirect('NocUSERZZ/cfcACTUSR007/emp1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ);
        }

        if ($_oMod == 'emp1el') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_empFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }

        if ($_oMod == 'emp2st') {

            $this->db->select('*, tprofle.FRECNMB AS XRECNMB, tprofle.FCODEZZ AS XCODEZZ, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->where('tprofle.FGROUPS', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp2ve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return false;
            } else {

                $_addPROFLE = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FGROUPS' => $_cmpFCODEZZ
                );

                $this->db->insert('tprofle', $_addPROFLE);
                return true;
            }
        }

        if ($_oMod == 'emp2iw') {

            $this->db->select('tprofle.*, tstaffz.FDESCRP AS XHANDLE, tmaritl.FCODEZZ AS XCODEZZ, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tstaffz', 'tprofle.FHANDLE = tstaffz.FCODEZZ', 'LEFT');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'tprofle.FRECNMB = ' => $_empFRECNMB
                )
            );

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp2dt') {

            $this->db->select('tprofle.*, tstaffz.FDESCRP AS XHANDLE, tmaritl.FCODEZZ AS XCODEZZ, tmaritl.FDESCRP AS XDESCRP');
            $this->db->from('tprofle');
            $this->db->join('tstaffz', 'tprofle.FHANDLE = tstaffz.FCODEZZ', 'LEFT');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');
            $this->db->where(
                array(
                    'tprofle.FRECNMB = ' => $_empFRECNMB
                )
            );

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'emp2pd') {

            $this->load->helper('text');

            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFCITIDN = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCITIDN'));
            $_varFMARITL = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFMARITL'));
            $_varFEFINZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEFINZZ'));
            $_varFNPWPZ1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNPWPZ1'));
            $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
            $_varFEMPIDN = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMPIDN'));
            $_tmpFSTADTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSTADTE'));
            if (!empty($_tmpFSTADTE)) {
                $_varFSTADTE = $this->sklibrfnc->_fSETTglMlt($_tmpFSTADTE);
            } else {
                $_varFSTADTE = '';
            }
            $_tmpFENDDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFENDDTE'));
            if (!empty($_tmpFENDDTE)) {
                $_varFENDDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFENDDTE);
            } else {
                $_varFENDDTE = '';
            }
            $_varFJOBTTL = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFJOBTTL'));
            $_varFNATION = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNATION'));
            $_strFNPWPDC = $this->input->post('_edtFNPWPDC');
            $_intFNPWPDC = substr_count($_strFNPWPDC, '\\');
            if ($_intFNPWPDC == 2) {
                $_tmpFNPWPDC = explode('\\', $_strFNPWPDC);
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPDC[2]);
            } elseif ($_intFNPWPDC == 0) {
                $_tmpFNPWPDC = $_strFNPWPDC;
                $_varFNPWPDC = str_replace(' ', '_', $_tmpFNPWPDC);
            }
            $_varFGENDER = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFGENDER'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_updEMPLOY = array(
                'FFULNME' => $_varFFULNME,
                'FCITIDN' => $_varFCITIDN,
                'FMARITL' => $_varFMARITL,
                'FEFINZZ' => $_varFEFINZZ,
                'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                'FEMPIDN' => $_varFEMPIDN,
                'FSTADTE' => $_varFSTADTE,
                'FENDDTE' => $_varFENDDTE,
                'FJOBTTL' => $_varFJOBTTL,
                'FNATION' => $_varFNATION,
                'FNPWPDC' => $_varFNPWPDC,
                'FGENDER' => $_varFGENDER,
                'FTELPON' => $_varFTELPON,
                'FADDRES' => $_varFADDRES,
                'FEMAILZ' => $_varFEMAILZ
            );

            $this->db->where('FCODEZZ', $_empFCODEZZ);
            $this->db->update('tprofle', $_updEMPLOY);

            redirect('NocUSERZZ/cfcACTUSR007/emp2iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_empFRECNMB . '/' . $_empFCODEZZ);
        }

        if ($_oMod == 'emp2el') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_empFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }
    }

    public function mfcACTUSR008()
    {

        $this->load->dbforge();

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);

        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);;


        if ($_oMod == 'c21lst') {

            $_sesFCODEZZ = $this->session->FCODEZZ;
            $_sesFUSRTYP = $this->session->FUSRTYP;

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->where('substring_index(FSERVCE,";",1)', 'y');
            $this->db->like('substring_index(FSERVCE,";",2)', $_sesFCODEZZ, 'both');
            $this->db->or_like('substring_index(FSERVCE,";",3)', $_sesFCODEZZ, 'both');
            $this->db->or_like('substring_index(FSERVCE,";",4)', $_sesFCODEZZ, 'both');
            $this->db->or_like('substring_index(FSERVCE,";",25)', $_sesFUSRTYP, 'both');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'c21smr') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFNPWPZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFNPWPZZ'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }
            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp21'
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FNPWPZZ' => $_varFNPWPZZ,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp21',
                    'FAPRFLG' => 'N',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR008/c21viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c21imp') {

            $_varXCORREC = $_varXCORREC;
            if ($_varXCORREC == '0') {
                $_varXCORREC = '-1';
            } else {
                $_varXCORREC = $_varXCORREC;
            }

            $this->db->where(
                array(
                    'FGROUPS = ' => $_actFCODEZZ,
                    'FPERIOD = ' => $_varXRECNMB
                )
            );

            $this->db->delete('ttaxhst');
        }

        if ($_oMod == 'c21dtl') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_varXPROCES);
            $this->db->where('FFLGTAX', 'hstp21');
            $this->db->order_by('FPROFLE', 'ASC');

            $_queC21DTL = $this->db->get();

            if ($_queC21DTL->num_rows() > 0) {
                return $_queC21DTL->result_array();
            } else {
                return $_queC21DTL->result_array();
            }
        }

        if ($_oMod == 'c21dtx') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_varXPROCES);
            $this->db->where('FFLGTAX', 'hstp21');
            $this->db->order_by('FPROFLE', 'ASC');

            $_queC21DTL = $this->db->get();

            if ($_queC21DTL->num_rows() > 0) {
                return $_queC21DTL->result_array();
            } else {
                return $_queC21DTL->result_array();
            }
        }

        if ($_oMod == 'c212mr') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'c21kmp') {

            $this->load->helper('text');

            $_varFCOMPEN = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCOMPEN'));

            $_updCOMPEN = array(
                'FCOMPEN' => $_varFCOMPEN
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updCOMPEN);

            redirect('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB);
        }

        if ($_oMod == 'c21cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh21;c21smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR008/c21smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c212pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh21;c212mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR008/c212mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_varXRECNMB == 'pphfnl') {

            $this->dbforge->drop_table('xtaxhst', TRUE);
            $this->db->query('create table TKECOAX like ttaxhst');
            $this->db->query("insert into xtaxhst select * from ttaxhst");
        }
    }

    public function mfcACTUSR009()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);

        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);;


        if ($_oMod == 'c22lst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }

            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp22',
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp22',
                    'FAPRFLG' => 'X',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR009/c22viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c22smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->order_by('FCODEZZ', 'ASC');

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'viw') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'sve') {

                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
                $_varFPERIOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOD'));
                $_varFPERIOX = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOX'));
                $_varFTYPEZZ = 'vnd';
                $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
                if ($_tmpFCORREC == '0') {
                    $_varFCORREC = '-1';
                } else {
                    $_varFCORREC = $_tmpFCORREC;
                }
                $_varFGROUPS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFGROUPS'));
                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVNMB'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKADR'));
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKDSC'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 2;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKJSZZZ'));

                $_addACTVTY = array(
                    'FFLGTAX' => 'hstp22',
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFPERIOD,
                    'FPERIOX' => $_varFPERIOX,
                    'FTYPEZZ' => $_varFTYPEZZ,
                    'FREVISI' => $_varFCORREC,
                    'FGROUPS' => $_varFGROUPS,
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FPJKADR' => $_varFPJKADR,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';
            ' . $_varFNPWPZ2,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->insert('ttaxhst', $_addACTVTY);
                redirect('NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if ($_varXPROCES == 'edt') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'upd') {

                $this->load->helper('text');


                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVNMB'));
                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKADR'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKDSC'));
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 2;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKJSZZZ'));

                $_updHISTRY = array(
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FFULNME' => $_varFFULNME,
                    'FPJKADR' => $_varFPJKADR,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';
            ' . $_varFNPWPZ2,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->where('FRECNMB', $_varXRECNMB);
                $this->db->update('ttaxhst', $_updHISTRY);

                redirect('NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/viw/' . $_varXRECNMB);
            }

            if ($_varXPROCES == 'del') {

                $this->db->where(
                    array(
                        'FRECNMB = ' => $_varXRECNMB
                    )
                );

                $this->db->delete('ttaxhst');
                redirect('NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if ($_varXPROCES == 'sndeml') {

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->order_by('FCODEZZ', 'ASC');

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }
        }

        if ($_oMod == 'c22imp') {

            $_varXCORREC = $_varXCORREC;
            if ($_varXCORREC == '0') {
                $_varXCORREC = '-1';
            } else {
                $_varXCORREC = $_varXCORREC;
            }

            $this->db->where(
                array(
                    'FGROUPS = ' => $_actFCODEZZ,
                    'FPERIOD = ' => $_varXRECNMB
                )
            );

            $this->db->delete('ttaxhst');
        }

        if ($_oMod == 'c22cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh21;c22smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR009/c22smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c222pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh21;c222mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR009/c222mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }
    }

    public function mfcACTUSR010()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);

        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);;


        if ($_oMod == 'c23lst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }

            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp23'
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp23',
                    'FAPRFLG' => 'X',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR010/c23viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c23smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->order_by('FCODEZZ', 'ASC');

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'viw') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'sve') {

                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
                $_varFPERIOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOD'));
                $_varFPERIOX = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOX'));
                $_varFTYPEZZ = 'vnd';
                $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
                if ($_tmpFCORREC == '0') {
                    $_varFCORREC = '-1';
                } else {
                    $_varFCORREC = $_tmpFCORREC;
                }
                $_varFGROUPS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFGROUPS'));
                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVNMB'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKADR'));
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKDSC'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 2;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKJSZZZ'));

                $_addACTVTY = array(
                    'FFLGTAX' => 'hstp23',
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFPERIOD,
                    'FPERIOX' => $_varFPERIOX,
                    'FTYPEZZ' => $_varFTYPEZZ,
                    'FREVISI' => $_varFCORREC,
                    'FGROUPS' => $_varFGROUPS,
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FPJKADR' => $_varFPJKADR,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->insert('ttaxhst', $_addACTVTY);
                redirect('NocUSERZZ/cfcACTUSR010/c23smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if ($_varXPROCES == 'edt') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'upd') {

                $this->load->helper('text');


                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVNMB'));
                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKADR'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKDSC'));
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 2;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }

                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKJSZZZ'));

                $_updHISTRY = array(
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FFULNME' => $_varFFULNME,
                    'FPJKADR' => $_varFPJKADR,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->where('FRECNMB', $_varXRECNMB);
                $this->db->update('ttaxhst', $_updHISTRY);

                redirect('NocUSERZZ/cfcACTUSR010/c23smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/viw/' . $_varXRECNMB);
            }

            if ($_varXPROCES == 'del') {

                $this->db->where(
                    array(
                        'FRECNMB = ' => $_varXRECNMB
                    )
                );

                $this->db->delete('ttaxhst');
                redirect('NocUSERZZ/cfcACTUSR010/c23smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }
        }

        if ($_oMod == 'c23imp') {

            $_varXCORREC = $_varXCORREC;
            if ($_varXCORREC == '0') {
                $_varXCORREC = '-1';
            } else {
                $_varXCORREC = $_varXCORREC;
            }

            $this->db->where(
                array(
                    'FGROUPS = ' => $_actFCODEZZ,
                    'FPERIOD = ' => $_varXRECNMB
                )
            );

            $this->db->delete('ttaxhst');
        }

        if ($_oMod == 'c23cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh23;c23smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR010/c23smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c232pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh23;c232mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR010/c232mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }
    }

    public function mfcACTUSR011()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);

        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);;


        if ($_oMod == 'c42lst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }

            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp42'
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp42',
                    'FAPRFLG' => 'X',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR011/c42viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c42smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->order_by('FCODEZZ', 'ASC');

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'viw') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'sve') {

                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
                $_varFPERIOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOD'));
                $_varFPERIOX = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOX'));
                $_varFTYPEZZ = 'vnd';
                $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
                if ($_tmpFCORREC == '0') {
                    $_varFCORREC = '-1';
                } else {
                    $_varFCORREC = $_tmpFCORREC;
                }
                $_varFGROUPS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFGROUPS'));
                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVNMB'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKADR'));
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKDSC'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }

                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 1;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKJSZZZ'));

                $_addACTVTY = array(
                    'FFLGTAX' => 'hstp42',
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFPERIOD,
                    'FPERIOX' => $_varFPERIOX,
                    'FTYPEZZ' => $_varFTYPEZZ,
                    'FREVISI' => $_varFCORREC,
                    'FGROUPS' => $_varFGROUPS,
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FPJKADR' => $_varFPJKADR,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';
            ' . $_varFNPWPZ2,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->insert('ttaxhst', $_addACTVTY);
                redirect('NocUSERZZ/cfcACTUSR011/c42smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }

            if ($_varXPROCES == 'edt') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXRECNMB
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'upd') {

                $this->load->helper('text');


                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVNMB'));
                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKADR'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKDSC'));
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFMSMDPJ'));
                $_varFMSMTRF = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFMSMTRF'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ * 1;
                } else {
                    $_varFMSMNML = ($_varFMSMTRF / 100) * $_varFMSMDPJ;
                }
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKJSZZZ'));

                $_updHISTRY = array(
                    'FINVDTE' => $_varFINVDTE,
                    'FBYRDTE' => $_varFBYRDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FFULNME' => $_varFFULNME,
                    'FPJKADR' => $_varFPJKADR,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';
            ' . $_varFNPWPZ2,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FMSMTRF' => $_varFMSMTRF,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->where('FRECNMB', $_varXRECNMB);
                $this->db->update('ttaxhst', $_updHISTRY);

                redirect('NocUSERZZ/cfcACTUSR011/c42smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/viw/' . $_varXRECNMB);
            }

            if ($_varXPROCES == 'del') {

                $this->db->where(
                    array(
                        'FRECNMB = ' => $_varXRECNMB
                    )
                );

                $this->db->delete('ttaxhst');
                redirect('NocUSERZZ/cfcACTUSR011/c42smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ);
            }
        }

        if ($_oMod == 'c42imp') {

            $_varXCORREC = $_varXCORREC;
            if ($_varXCORREC == '0') {
                $_varXCORREC = '-1';
            } else {
                $_varXCORREC = $_varXCORREC;
            }

            $this->db->where(
                array(
                    'FGROUPS = ' => $_actFCODEZZ,
                    'FPERIOD = ' => $_varXRECNMB
                )
            );

            $this->db->delete('ttaxhst');
        }


        if ($_oMod == 'c42cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh4(2);c42smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR011/c42smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c422pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh4(2);c422mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR011/c422mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }
    }

    public function mfcACTUSR012()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_hstFRECNMB = $this->uri->segment(6);
        $_hstFCODEZZ = $this->uri->segment(7);
        $_varXPROCES = $this->uri->segment(8);
        $_varXYEARZZ = $this->uri->segment(9);
        $_varXWRKSTA = $this->uri->segment(10);
        $_varXREVISI = $this->uri->segment(11);
        $_varXTAXHST = $this->uri->segment(12);


        if ($_oMod == 'c25lst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }

            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp25'
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp25',
                    'FAPRFLG' => 'X',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR012/c25viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c25smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->db->select('*');
                $this->db->from('tprofle');
                $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                $this->db->order_by('FCODEZZ', 'ASC');

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'viw') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXTAXHST
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'sve') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where('FRECNMB', $_hstFRECNMB);

                $_quePROFLE = $this->db->get();

                foreach ($_quePROFLE->result_array() as $_oRox) {
                    $_xFPERIOD = $_oRox['FPERIOD'];
                    $_xFWRKSTA = $_oRox['FWRKSTA'];
                }

                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
                $_varFPERIOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOD'));
                $_varFPERIOX = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPERIOX'));
                $_varFTYPEZZ = 'vnd';
                $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
                if ($_tmpFCORREC == '0') {
                    $_varFCORREC = '-1';
                } else {
                    $_varFCORREC = $_tmpFCORREC;
                }
                $_varFGROUPS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFGROUPS'));
                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFINVNMB'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKADR'));

                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }

                $_varFNPWPZZ = $_varFNPWPZ1 . ';' . $_varFNPWPZ2;

                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPJKDSC'));
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFMSMDPJ'));
                $_varFDTPZZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_finFDTPZZZ'));
                $_varFMSMNML = strval($_varFMSMDPJ) - strval($_varFDTPZZZ);
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKJSZZZ'));

                $_addACTVTY = array(
                    'FFLGTAX' => 'hstp25',
                    'FPERIOD' => $_varFPERIOD,
                    'FPERIOX' => $_varFPERIOX,
                    'FTYPEZZ' => $_varFTYPEZZ,
                    'FREVISI' => $_varFCORREC,
                    'FGROUPS' => $_varFGROUPS,
                    'FINVDTE' => $_varFINVDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FFULNME' => $_varFFULNME,
                    'FPJKADR' => $_varFPJKADR,
                    'FNPWPZZ' => $_varFNPWPZZ,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FDTPZZZ' => $_varFDTPZZZ,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->insert('ttaxhst', $_addACTVTY);
                redirect('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . substr($_xFPERIOD, 0, 4) . '/' . $_xFWRKSTA);
            }

            if ($_varXPROCES == 'edt') {

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FRECNMB = ' => $_varXTAXHST
                    )
                );

                $_queCOMPNY = $this->db->get();

                if ($_queCOMPNY->num_rows() > 0) {
                    return $_queCOMPNY->result_array();
                } else {
                    return $_queCOMPNY->result_array();
                }
            }

            if ($_varXPROCES == 'upd') {

                $this->load->helper('text');


                $_tmpFINVDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVDTE'));
                if (!empty($_tmpFINVDTE)) {
                    $_varFINVDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFINVDTE);
                } else {
                    $_varFINVDTE = '';
                }
                $_tmpFBYRDTE = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFBYRDTE'));
                if (!empty($_tmpFBYRDTE)) {
                    $_varFBYRDTE = $this->sklibrfnc->_fSETTglMlt($_tmpFBYRDTE);
                } else {
                    $_varFBYRDTE = '';
                }
                $_varFINVNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFINVNMB'));
                $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
                $_varFPJKADR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKADR'));
                $_varFNPWPZ2 = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFNPWPZ2'));
                if ($_varFNPWPZ2 == '000000000000000') {
                    $_varFNPWPZ1 = 'N';
                } else {
                    $_varFNPWPZ1 = 'Y';
                }
                $_varFPJKDSC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFPJKDSC'));
                $_varFMSMDPJ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFMSMDPJ'));
                $_varFDTPZZZ = $this->sklibrfnc->_fGETNumOnl($this->input->post('_edtFDTPZZZ'));
                $_varFMSMNML = strval($_varFMSMDPJ) - strval($_varFDTPZZZ);
                $_varFKJSZZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKJSZZZ'));

                $_updHISTRY = array(
                    'FINVDTE' => $_varFINVDTE,
                    'FINVNMB' => $_varFINVNMB,
                    'FFULNME' => $_varFFULNME,
                    'FPJKADR' => $_varFPJKADR,
                    'FNPWPZZ' => $_varFNPWPZ1 . ';' . $_varFNPWPZ2,
                    'FPJKDSC' => $_varFPJKDSC,
                    'FMSMDPJ' => $_varFMSMDPJ,
                    'FDTPZZZ' => $_varFDTPZZZ,
                    'FMSMNML' => $_varFMSMNML,
                    'FKJSZZZ' => $_varFKJSZZZ
                );

                $this->db->where('FRECNMB', $_varXTAXHST);
                $this->db->update('ttaxhst', $_updHISTRY);

                redirect('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/viw/' . $_varXYEARZZ . '/' . $_varXWRKSTA . '/' . $_varXREVISI . '/' . $_varXTAXHST);
            }

            if ($_varXPROCES == 'del') {

                $this->db->where(
                    array(
                        'FRECNMB = ' => $_varXTAXHST
                    )
                );

                $this->db->delete('ttaxhst');
                redirect('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_varXYEARZZ . '/' . $_varXWRKSTA);
            }
        }

        if ($_oMod == 'c25cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh25;c25smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_hstFRECNMB . ';' . $_hstFCODEZZ . ';' . $_varXPROCES . ';' . $_varXYEARZZ . ';' . $_varXWRKSTA,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR012/c25smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_varXPROCES . '/' . $_varXYEARZZ . '/' . $_varXWRKSTA);
        }

        if ($_oMod == 'c252pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_hstFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPh25;c252mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_hstFRECNMB . ';' . $_hstFCODEZZ . ';' . $_varXPROCES . ';' . $_varXYEARZZ . ';' . $_varXWRKSTA,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR012/c252mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_varXPROCES . '/' . $_varXYEARZZ . '/' . $_varXWRKSTA);
        }
    }

    public function mfcACTUSR013()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);

        if ($_oMod == 'clnlst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->or_where('FCATGRY', 'nonkpp');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'clnadd') {
        }

        if ($_oMod == 'clnsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFCATGRY = 'client';
            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFAXIML'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queKPPOFF = $this->db->get();

            if ($_queKPPOFF->num_rows() > 0) {
                return false;
            } else {

                $_addKPPOFF = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FSEQNMB' => $_varFSEQNMB,
                    'FFULNME' => $_varFFULNME,
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FCATGRY' => $_varFCATGRY
                );

                $this->db->insert('tprofle', $_addKPPOFF);
                return true;
            }
        }

        if ($_oMod == 'clnviw') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'clnedt') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'clnupd') {

            $this->load->helper('text');

            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_updKPPOFF = array(
                'FSEQNMB' => $_varFSEQNMB,
                'FFULNME' => $_varFFULNME,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tprofle', $_updKPPOFF);

            redirect('NocUSERZZ/cfcACTUSR013/clnviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'clndel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }
    }

    public function mfcACTUSR014()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);


        if ($_oMod == 'msmlst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'staffz');
            $this->db->order_by('FJOBLVL', 'desc');
            $this->db->order_by('FCODEZZ', 'asc');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'msmadd') {
        }

        if ($_oMod == 'msmsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFEMAILZ'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queKPPOFF = $this->db->get();

            if ($_queKPPOFF->num_rows() > 0) {
                return false;
            } else {

                $_addKPPOFF = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FSEQNMB' => $_varFSEQNMB,
                    'FFULNME' => $_varFFULNME,
                    'FUSRTYP' => '0',
                    'FACTIVE' => '1',
                    'FJOBLVL' => '1',
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FEMAILZ' => $_varFEMAILZ,
                    'FCATGRY' => 'staffz'
                );

                $this->db->insert('tprofle', $_addKPPOFF);
                return true;
            }
        }

        if ($_oMod == 'msmviw') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'asc');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'msmedt') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_quePROFLE = $this->db->get();

            if ($_quePROFLE->num_rows() > 0) {
                return $_quePROFLE->result_array();
            } else {
                return $_quePROFLE->result_array();
            }
        }

        if ($_oMod == 'msmupd') {

            $this->load->helper('text');

            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAILZ'));

            $_updKPPOFF = array(
                'FSEQNMB' => $_varFSEQNMB,
                'FFULNME' => $_varFFULNME,
                'FADDRES' => $_varFADDRES,
                'FTELPON' => $_varFTELPON,
                'FFAXIML' => $_varFFAXIML,
                'FEMAILZ' => $_varFEMAILZ
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tprofle', $_updKPPOFF);

            redirect('NocUSERZZ/cfcACTUSR014/msmviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'msmdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tprofle');
            return true;
        }
    }

    public function mfcACTUSR015()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);


        if ($_oMod == 'klulst') {

            $this->db->select('*');
            $this->db->from('tklucde');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKLUSHA = $this->db->get();

            if ($_queKLUSHA->num_rows() > 0) {
                return $_queKLUSHA->result_array();
            } else {
                return $_queKLUSHA->result_array();
            }
        }

        if ($_oMod == 'kluadd') {
        }

        if ($_oMod == 'klusve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFKLUCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKLUCOD'));
            $_varFDESCRP = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFDESCRP'));
            $_varFNOTEZZ = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFNOTEZZ')));

            $this->db->select('*');
            $this->db->from('tklucde');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ,
                    'FKLUCOD = ' => $_varFKLUCOD
                )
            );

            $_queKLUCOD = $this->db->get();

            if ($_queKLUCOD->num_rows() > 0) {
                return false;
            } else {

                $_addKLUCOD = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FKLUCOD' => $_varFKLUCOD,
                    'FDESCRP' => $_varFDESCRP,
                    'FNOTEZZ' => $_varFNOTEZZ
                );

                $this->db->insert('tklucde', $_addKLUCOD);
                return true;
            }
        }

        if ($_oMod == 'kluviw') {

            $this->db->select('*');
            $this->db->from('tklucde');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKLUSHA = $this->db->get();

            if ($_queKLUSHA->num_rows() > 0) {
                return $_queKLUSHA->result_array();
            } else {
                return $_queKLUSHA->result_array();
            }
        }

        if ($_oMod == 'kluedt') {

            $this->db->select('*');
            $this->db->from('tklucde');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKLUSHA = $this->db->get();

            if ($_queKLUSHA->num_rows() > 0) {
                return $_queKLUSHA->result_array();
            } else {
                return $_queKLUSHA->result_array();
            }
        }

        if ($_oMod == 'kluupd') {

            $this->load->helper('text');

            $_varFKLUCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKLUCOD'));
            $_varFDESCRP = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFDESCRP'));
            $_varFNOTEZZ = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_edtFNOTEZZ')));

            $_updKLUCOD = array(
                'FKLUCOD' => $_varFKLUCOD,
                'FDESCRP' => $_varFDESCRP,
                'FNOTEZZ' => $_varFNOTEZZ
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tklucde', $_updKLUCOD);

            redirect('NocUSERZZ/cfcACTUSR015/kluviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'kludel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tklucde');
            return true;
        }
    }

    public function mfcACTUSR016()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);


        if ($_oMod == 'kjslst') {

            $this->db->select('*');
            $this->db->from('tkjstor');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKJSTOR = $this->db->get();

            if ($_queKJSTOR->num_rows() > 0) {
                return $_queKJSTOR->result_array();
            } else {
                return $_queKJSTOR->result_array();
            }
        }

        if ($_oMod == 'kjsadd') {
        }

        if ($_oMod == 'kjssve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFKJSCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFKJSCOD'));
            $_varFJNSSTR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFJNSSTR'));
            $_varFLABELZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFLABELZ'));
            $_varFTARIFZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTARIFZ'));

            $this->db->select('*');
            $this->db->from('tkjstor');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ,
                    'FKJSCOD = ' => $_varFKJSCOD
                )
            );

            $_queKJSCOD = $this->db->get();

            if ($_queKJSCOD->num_rows() > 0) {
                return false;
            } else {

                $_addKLUCOD = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FKJSCOD' => $_varFKJSCOD,
                    'FJNSSTR' => $_varFJNSSTR,
                    'FLABELZ' => $_varFLABELZ,
                    'FTARIFZ' => $_varFTARIFZ
                );

                $this->db->insert('tkjstor', $_addKLUCOD);
                return true;
            }
        }

        if ($_oMod == 'kjsviw') {

            $this->db->select('*');
            $this->db->from('tkjstor');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKJSTOR = $this->db->get();

            if ($_queKJSTOR->num_rows() > 0) {
                return $_queKJSTOR->result_array();
            } else {
                return $_queKJSTOR->result_array();
            }
        }

        if ($_oMod == 'kjsedt') {

            $this->db->select('*');
            $this->db->from('tkjstor');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queKJSTOR = $this->db->get();

            if ($_queKJSTOR->num_rows() > 0) {
                return $_queKJSTOR->result_array();
            } else {
                return $_queKJSTOR->result_array();
            }
        }

        if ($_oMod == 'kjsupd') {

            $this->load->helper('text');

            $_varFKJSCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKJSCOD'));
            $_varFJNSPJK = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFJNSPJK'));
            $_varFJNSSTR = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFJNSSTR'));
            $_varFLABELZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFLABELZ'));
            $_varFTARIFZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFTARIFZ'));

            $_updKLUCOD = array(
                'FKJSCOD' => $_varFKJSCOD,
                'FJNSPJK' => $_varFJNSPJK,
                'FJNSSTR' => $_varFJNSSTR,
                'FLABELZ' => $_varFLABELZ,
                'FTARIFZ' => $_varFTARIFZ
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tkjstor', $_updKLUCOD);

            redirect('NocUSERZZ/cfcACTUSR016/kjsviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'kjsdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tkjstor');
            return true;
        }
    }

    public function mfcACTUSR017()
    {

        $this->load->library('form_validation');

        $_cmpFRECNMB = $this->uri->segment(6);
        $_cmpFCODEZZ = $this->uri->segment(7);

        $_oMod = $this->uri->segment(3);
        $_oUsr = $this->uri->segment(4);
        $_oPrc = $this->uri->segment(5);


        if ($_oMod == 'acslst') {

            if ((($_oUsr == 'intnal') || ($_oUsr == 'client')) && ($_oPrc == 'upd')) {
                $this->load->helper('text');

                $_varFUSRNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFUSRNME'));
                $_varFKEYWRD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFKEYWRD'));
                $_varFJOBLVL = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFJOBLVL'));
                $_varFCEK001 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK001'));
                $_varFCEK002 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK002'));
                $_varFCEK003 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK003'));
                $_varFCEK004 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK004'));
                $_varFCEK005 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK005'));
                $_varFCEK006 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK006'));
                $_varFCEK007 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK007'));
                $_varFCEK008 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK008'));
                $_varFCEK009 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK009'));
                $_varFCEK010 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK010'));
                $_varFCEK011 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK011'));
                $_varFCEK012 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK012'));
                $_varFCEK013 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK013'));
                $_varFCEK014 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK014'));
                $_varFCEK015 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK015'));
                $_varFCEK016 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK016'));
                $_varFCEK017 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK017'));
                $_varFCEK018 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK018'));
                $_varFCEK019 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK019'));
                $_varFCEK020 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK020'));
                $_varFCEK021 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK021'));
                $_varFCEK022 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCEK022'));

                $_tmpXCHECKD = '';

                if (isset($_POST['_edtFCEK001'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK002'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK003'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK004'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK005'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK006'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK007'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK008'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK009'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK010'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK011'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK012'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK013'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK014'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK015'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK016'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK017'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK018'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK019'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK020'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK021'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y;
            ';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N;
            ';
                }
                if (isset($_POST['_edtFCEK022'])) {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'Y';
                } else {
                    $_tmpXCHECKD = trim($_tmpXCHECKD) . 'N';
                }


                $_updCOMPNY = array(
                    'FUSRNME' => $_varFUSRNME,
                    'FKEYWRD' => MD5($_varFKEYWRD),
                    'FJOBLVL' => $_varFJOBLVL,
                    'FMENUZZ' => $this->sklibrfnc->_fGETPREGRP($_tmpXCHECKD)
                );


                $this->form_validation->set_rules('_edtFUSRNME', '$_varFUSRNME', 'required|valid_email');

                if ($this->form_validation->run() == FALSE) {

                    redirect('NocUSERZZ/cfcACTUSR017/acslst/' . $_oUsr . '/edt/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
                } else {
                    $this->db->where('FCODEZZ', $_cmpFCODEZZ);
                    $this->db->update('tprofle', $_updCOMPNY);

                    redirect('NocUSERZZ/cfcACTUSR017/acslst/' . $_oUsr . '/viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
                }
            }
        }
    }

    public function mfcACTUSR018()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);
        $_hstFRECNMB = $this->uri->segment(6);
        $_hstFCODEZZ = $this->uri->segment(7);


        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);;


        if ($_oMod == 'c00lst') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if (($_oMod == 'c00smr') || ($_varXPROCES == 'sndeml')) {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdadd') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('tprofle.FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'prdsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFNPWPZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFNPWPZZ'));
            $_tmpFMONTHZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFMONTHZ'));

            if (strlen($_tmpFMONTHZ) == '1') {
                $_varFMONTHZ = '0' . $_tmpFMONTHZ;
            } else {
                $_varFMONTHZ = $_tmpFMONTHZ;
            }
            $_varFYEARZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFYEARZZ'));
            $_tmpFCORREC = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCORREC'));
            if ($_tmpFCORREC == '0') {
                $_varFCORREC = '-1';
            } else {
                $_varFCORREC = $_tmpFCORREC;
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'FPROFLE = ' => $_varFCODEZZ,
                    'FPERIOD = ' => $_varFYEARZZ . $_varFMONTHZ,
                    'FREVISI = ' => $_varFCORREC,
                    'FTYPEZZ = ' => 'cmp',
                    'FFLGTAX = ' => 'hstp00'
                )
            );

            $_queMESSGE = $this->db->get();

            if ($_queMESSGE->num_rows() > 0) {
                return false;
            } else {

                $_addMESSGE = array(
                    'FPROFLE' => $_varFCODEZZ,
                    'FFULNME' => $_varFFULNME,
                    'FNPWPZZ' => $_varFNPWPZZ,
                    'FPERIOD' => $_varFYEARZZ . $_varFMONTHZ,
                    'FPERIOX' => $this->sklibrfnc->_fSETTglBln($_tmpFMONTHZ) . '-' . $_varFYEARZZ,
                    'FREVISI' => $_varFCORREC,
                    'FTYPEZZ' => 'cmp',
                    'FFLGTAX' => 'hstp00',
                    'FAPRFLG' => 'N',
                    'FPAYSTA' => 'opn',
                    'FREPSTA' => 'opn',
                    'FWRKSTA' => '2',
                    'FWRKALS' => 'ac1'
                );

                $this->db->insert('ttaxhst', $_addMESSGE);
                redirect('NocUSERZZ/cfcACTUSR018/c00viw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_varFYEARZZ);
            }
        }

        if ($_oMod == 'c00dtl') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_varXPROCES);
            $this->db->where('FFLGTAX', 'hstp00');
            $this->db->order_by('FPROFLE', 'ASC');

            $_queC00DTL = $this->db->get();

            if ($_queC00DTL->num_rows() > 0) {
                return $_queC00DTL->result_array();
            } else {
                return $_queC00DTL->result_array();
            }
        }

        if ($_oMod == 'c00dtx') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_varXPROCES);
            $this->db->where('FFLGTAX', 'hstp00');
            $this->db->order_by('FPROFLE', 'ASC');

            $_queC00DTL = $this->db->get();

            if ($_queC00DTL->num_rows() > 0) {
                return $_queC00DTL->result_array();
            } else {
                return $_queC00DTL->result_array();
            }
        }

        if ($_oMod == 'c002mr') {

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queCOMPNY = $this->db->get();

            if ($_queCOMPNY->num_rows() > 0) {
                return $_queCOMPNY->result_array();
            } else {
                return $_queCOMPNY->result_array();
            }
        }

        if ($_oMod == 'c00imp') {

            $_varXCORREC = $_varXCORREC;
            if ($_varXCORREC == '0') {
                $_varXCORREC = '-1';
            } else {
                $_varXCORREC = $_varXCORREC;
            }

            $this->db->where(
                array(
                    'FGROUPS = ' => $_actFCODEZZ,
                    'FPERIOD = ' => $_varXRECNMB
                )
            );

            $this->db->delete('ttaxhst');
        }

        if ($_oMod == 'c00cor') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'n',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPN;c00smr;cor;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c002pr') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tactlog');
            $this->db->like('FCODEZZ', 'LOG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queACTLOG = $this->db->get();

            if ($_queACTLOG->num_rows() > 0) {
                $_varACTLOG = $_queACTLOG->result_array();
                $_varCODEZZ = $_varACTLOG['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'LOG' . $_oYea . $_oMon . '-00001';
            };

            $this->load->helper('text');
            date_default_timezone_set('Asia/Jakarta');
            $_varFAPRDTM = date("YmdH:i:s");

            $_updAPROVL = array(
                'FAPRFLG' => 'y',
                'FAPRDTM' => $_varFAPRDTM
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updAPROVL);

            $_addACTLOG = array(
                'FCODEZZ' => $_oCODEXX,
                'FACTLOG' => 'PPN;c002mr;apr;' . $_cmpFRECNMB . ';' . $_cmpFCODEZZ . ';' . $_actFRECNMB . ';' . $_actFCODEZZ . ';' . $_varXPROCES . ';' . $_varXRECNMB . ';' . $_varXCORREC,
                'FLSTUSR' => $_sesFCODEZZ = $this->session->FCODEZZ . ';' . $_sesFUSRTYP = $this->session->FUSRNME,
                'FLSTMDF' => $_varFAPRDTM
            );

            $this->db->insert('tactlog', $_addACTLOG);

            redirect('NocUSERZZ/cfcACTUSR018/c002mr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB . '/' . $_varXCORREC);
        }

        if ($_oMod == 'c00kmp') {

            $this->load->helper('text');

            $_varFCOMPE1 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCOMPE1'));
            $_varFCOMPE2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCOMPE2'));
            $_varFCOMPE3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFCOMPE3'));

            $_updCOMPEN = array(
                'FCOMPEN' => $_varFCOMPE1 . ';' . $_varFCOMPE2 . ';' . $_varFCOMPE3
            );

            $this->db->where('FRECNMB', $_actFRECNMB);
            $this->db->update('ttaxhst', $_updCOMPEN);

            redirect('NocUSERZZ/cfcACTUSR018/c00smr/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_actFRECNMB . '/' . $_actFCODEZZ . '/' . $_varXPROCES . '/' . $_varXRECNMB);
        }
    }

    public function mfcACTUSR019()
    {

        $_oMod = $this->uri->segment(3);
        $_oPre = $this->uri->segment(4);


        if ($_oMod == 'emlset') {

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            if ($_queEMAILZ->num_rows() > 0) {
                return $_queEMAILZ->result_array();
            } else {
                return $_queEMAILZ->result_array();
            }
        }
        if ($_oMod == 'emlupd') {
            $this->load->helper('text');

            $_varFEMAIL1 = $this->input->post('_edtFEMAIL1');
            $_varFEMAIL2 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAIL2'));
            $_varFEMAIL3 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAIL3'));
            $_varFEMAIL4 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAIL4'));
            $_varFEMAIL5 = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFEMAIL5'));
            $_varFEMAILZ = $_varFEMAIL1 . ';
            ' . $_varFEMAIL2 . ';
            ' . $_varFEMAIL3 . ';
            ' . $_varFEMAIL4 . ';
            ' . $_varFEMAIL5;

            $_updEMAILZ = array(
                'FVALUE1' => MD5($_varFEMAILZ)
            );

            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->update('tgloset', $_updEMAILZ);

            redirect('NocUSERZZ/cfcACTUSR019/emlset');
        }
    }

    public function mfcACTUSR020()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);


        if ($_oMod == 'ngrlst') {

            $this->db->select('*');
            $this->db->from('tcountr');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queNGRDOM = $this->db->get();

            if ($_queNGRDOM->num_rows() > 0) {
                return $_queNGRDOM->result_array();
            } else {
                return $_queNGRDOM->result_array();
            }
        }

        if ($_oMod == 'ngradd') {
        }

        if ($_oMod == 'ngrsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFNGRCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFNGRCOD'));
            $_varFNGRDES = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFNGRDES'));

            $this->db->select('*');
            $this->db->from('tcountr');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ,
                    'FNGRCOD = ' => $_varFNGRCOD
                )
            );

            $_queNGRDOM = $this->db->get();

            if ($_queNGRDOM->num_rows() > 0) {
                return false;
            } else {

                $_addNGRDOM = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FNGRCOD' => $_varFNGRCOD,
                    'FNGRDES' => $_varFNGRDES
                );

                $this->db->insert('tcountr', $_addNGRDOM);
                return true;
            }
        }

        if ($_oMod == 'ngrviw') {

            $this->db->select('*');
            $this->db->from('tcountr');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queNGRDOM = $this->db->get();

            if ($_queNGRDOM->num_rows() > 0) {
                return $_queNGRDOM->result_array();
            } else {
                return $_queNGRDOM->result_array();
            }
        }

        if ($_oMod == 'ngredt') {

            $this->db->select('*');
            $this->db->from('tcountr');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queNGRDOM = $this->db->get();

            if ($_queNGRDOM->num_rows() > 0) {
                return $_queNGRDOM->result_array();
            } else {
                return $_queNGRDOM->result_array();
            }
        }

        if ($_oMod == 'ngrupd') {

            $this->load->helper('text');

            $_varFNGRCOD = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNGRCOD'));
            $_varFNGRDES = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFNGRDES'));

            $_updNGRDOM = array(
                'FNGRCOD' => $_varFNGRCOD,
                'FNGRDES' => $_varFNGRDES
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tcountr', $_updNGRDOM);

            redirect('NocUSERZZ/cfcACTUSR020/ngrviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'ngrdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tcountr');
            return true;
        }
    }

    public function mfcACTUSR021()
    {

        $_oMod = $this->uri->segment(3);
        $_oSub = $this->uri->segment(4);
        $_oAct = $this->uri->segment(11);
        $_cmpFRECNMB = $this->uri->segment(5);
        $_cmpFCODEZZ = $this->uri->segment(6);
        $_hstFRECNMB = $this->uri->segment(7);
        $_hstFCODEZZ = $this->uri->segment(8);
        $_cmpFYEARZZ = $this->uri->segment(9);
        $_cmpFWRKSTA = $this->uri->segment(10);
        $_payFRECNMB = $this->uri->segment(12);
        $_payFCODEZZ = $this->uri->segment(13);

        if ($_oMod == 'actsve') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_zFFULNME = $_oRoz['FFULNME'];
                $_zFPERIOD = $_oRoz['FPERIOD'];
                $_zFREVISI = $_oRoz['FREVISI'];

                if ($_zFREVISI == '-1') {
                    $_zFREVISI = '0';
                } else {
                    $_zFREVISI = $_zFREVISI;
                }

                $_zFFLGTAX = $_oRoz['FFLGTAX'];
            }

            $_varFFULNME = $_zFFULNME;
            $_varFPERIOD = $_zFPERIOD;
            $_varFREVISI = $_zFREVISI;
            $_varFFLGTAX = $_zFFLGTAX;

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tpayrpt');
            $this->db->like('FCODEZZ', 'PAY' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_quePAYRPT = $this->db->get();

            if ($_quePAYRPT->num_rows() > 0) {
                $_varCOMPNY = $_quePAYRPT->result_array();
                $_varCODEZZ = $_varCOMPNY['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'PAY' . $_oYea . $_oMon . '-00001';
            };

            $_addPAYRPT = array(
                'FCODEZZ' => $_oCODEXX,
                'FPROFLE' => $_cmpFCODEZZ,
                'FFULNME' => $_varFFULNME,
                'FPERIOD' => $_varFPERIOD,
                'FREVISI' => $_varFREVISI,
                'FFLGTAX' => $_varFFLGTAX
            );

            $this->db->insert('tpayrpt', $_addPAYRPT);
            redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
        }

        if ($_oMod == 'actsv2') {

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_hstFRECNMB);
            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_zFFULNME = $_oRoz['FFULNME'];
                $_zFPERIOD = $_oRoz['FPERIOD'];
                $_zFREVISI = $_oRoz['FREVISI'];

                if ($_zFREVISI == '-1') {
                    $_zFREVISI = '0';
                } else {
                    $_zFREVISI = $_zFREVISI;
                }

                $_zFFLGTAX = $_oRoz['FFLGTAX'];
            }

            $_varFFULNME = $_zFFULNME;
            $_varFPERIOD = $_zFPERIOD;
            $_varFREVISI = $_zFREVISI;
            $_varFFLGTAX = $_zFFLGTAX;

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tdocrpt');
            $this->db->like('FCODEZZ', 'DOC' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_quePAYRPT = $this->db->get();

            if ($_quePAYRPT->num_rows() > 0) {
                $_varCOMPNY = $_quePAYRPT->result_array();
                $_varCODEZZ = $_varCOMPNY['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'DOC' . $_oYea . $_oMon . '-00001';
            };

            $_addPAYRPT = array(
                'FCODEZZ' => $_oCODEXX,
                'FPROFLE' => $_cmpFCODEZZ,
                'FFULNME' => $_varFFULNME,
                'FPERIOD' => $_varFPERIOD,
                'FREVISI' => $_varFREVISI,
                'FFLGTAX' => $_varFFLGTAX
            );

            $this->db->insert('tdocrpt', $_addPAYRPT);
            redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
        }

        if ($_oMod == 'actspy') {

            $this->load->helper('text');

            $_varFRECNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFRECNMB'));

            $_strFDOCUMN = $this->input->post('_edtFDOCUMN');
            $_intFDOCUMN = substr_count($_strFDOCUMN, '\\');
            if ($_intFDOCUMN == 2) {
                $_tmpFDOCUMN = explode('\\', $_strFDOCUMN);
                $_varFDOCUMN = str_replace(' ', '_', $_tmpFDOCUMN[2]);
            } elseif ($_intFDOCUMN == 0) {
                $_tmpFDOCUMN = $_strFDOCUMN;
                $_varFDOCUMN = str_replace(' ', '_', $_tmpFDOCUMN);
            }

            $_tmpFCODEZZ = explode('/', $_varFRECNMB);
            $_payFCODEZZ = $_tmpFCODEZZ[1];

            $_updPAYRPT = array(
                'FDOCUMN' => $_varFDOCUMN
            );

            $this->db->where('FCODEZZ', $_payFCODEZZ);
            $this->db->update('tpayrpt', $_updPAYRPT);

            redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
        }

        if ($_oMod == 'actsdc') {

            $this->load->helper('text');

            $_varFRECNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edxFRECNMB'));

            $_strFDOCUMN = $this->input->post('_edxFDOCUMN');
            $_intFDOCUMN = substr_count($_strFDOCUMN, '\\');
            if ($_intFDOCUMN == 2) {
                $_tmpFDOCUMN = explode('\\', $_strFDOCUMN);
                $_varFDOCUMN = str_replace(' ', '_', $_tmpFDOCUMN[2]);
            } elseif ($_intFDOCUMN == 0) {
                $_tmpFDOCUMN = $_strFDOCUMN;
                $_varFDOCUMN = str_replace(' ', '_', $_tmpFDOCUMN);
            }

            $_tmpFCODEZZ = explode('/', $_varFRECNMB);
            $_payFCODEZZ = $_tmpFCODEZZ[1];

            $_updDOCRPT = array(
                'FDOCUMN' => $_varFDOCUMN
            );

            $this->db->where('FCODEZZ', $_payFCODEZZ);
            $this->db->update('tdocrpt', $_updDOCRPT);

            redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
        }

        if ($_oMod == 'actedt') {

            $this->load->helper('text');

            if (empty($_oAct)) {

                $_varFFRECNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('FRECNMB'));
                $_varFBILLING = $this->sklibrfnc->_fGETPREGRP($this->input->post('FBILING'));

                $_updPAYRPT = array(
                    'FBILING' => $_varFBILING
                );

                $this->db->where('FRECNMB', $_cmpFRECNMB);
                $this->db->update('tpayrpt', $_updPAYRPT);

                redirect('NocUSERZZ/cfcACTUSR021/actedt/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/OKE');
            }

            if ($_oAct == 'paydel') {

                $this->db->where(
                    array(
                        'FCODEZZ = ' => $_payFCODEZZ
                    )
                );

                $this->db->delete('tpayrpt');
                redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
            }

            if ($_oAct == 'docdel') {

                $this->db->where(
                    array(
                        'FCODEZZ = ' => $_payFCODEZZ
                    )
                );

                $this->db->delete('tdocrpt');
                redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
            }
        }

        if ($_oMod == 'actupd') {

            if ($_oAct == 'flg') {

                $_varFWRKSTA = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFWRKSTA'));

                if (($_varFWRKSTA == '1') || ($_varFWRKSTA == '2') || ($_varFWRKSTA == '3') || ($_varFWRKSTA == '4') || ($_varFWRKSTA == '5')) {
                    $_varFWRKALS = 'ac1';
                } elseif (($_varFWRKSTA == '6') || ($_varFWRKSTA == '7')) {
                    $_varFWRKALS = 'ac2';
                } elseif ($_varFWRKSTA == '8') {
                    $_varFWRKALS = 'ac3';
                } elseif ($_varFWRKSTA == '9') {
                    $_varFWRKALS = 'ac4';
                }

                $_updWRKSTA = array(
                    'FWRKSTA' => $_varFWRKSTA,
                    'FWRKALS' => $_varFWRKALS
                );

                $this->db->where('FRECNMB', $_hstFRECNMB);
                $this->db->update('ttaxhst', $_updWRKSTA);

                if (($_varFWRKSTA == '1') || ($_varFWRKSTA == '2') || ($_varFWRKSTA == '3') || ($_varFWRKSTA == '4') || ($_varFWRKSTA == '5')) {
                    $_oPjk = 'pjkmsm';
                } elseif (($_varFWRKSTA == '6') || ($_varFWRKSTA == '7')) {
                    $_oPjk = 'pjkpay';
                } elseif ($_varFWRKSTA == '8') {
                    $_oPjk = 'pjkrpt';
                } elseif ($_varFWRKSTA == '9') {
                    $_oPjk = 'pjkarc';
                }

                redirect('NocUSERZZ/cfcACTUSR021/actviw/' . $_oPjk . '/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
            }

            if ($_oAct == '') {

                $_oMod = $this->uri->segment(3);
                $_oSub = $this->uri->segment(4);
                $_oAct = $this->uri->segment(11);
                $_cmpFRECNMB = $this->uri->segment(5);
                $_cmpFCODEZZ = $this->uri->segment(6);
                $_hstFRECNMB = $this->uri->segment(7);
                $_hstFCODEZZ = $this->uri->segment(8);
                $_cmpFYEARZZ = $this->uri->segment(9);
                $_cmpFWRKSTA = $this->uri->segment(10);
                $_payFRECNMB = $this->uri->segment(12);
                $_payFCODEZZ = $this->uri->segment(13);

                $data = array($field => $value);
                $this->db->where('FRECNMB', $id);
                $this->db->update('tpayrpt', $data);

                redirect('NocUSERZZ/cfcACTUSR021/actviw/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
            }
        }

        if ($_oMod == 'actup2') {


            $_oMod = $this->uri->segment(3);
            $_oSub = $this->uri->segment(4);
            $_oAct = $this->uri->segment(11);
            $_cmpFRECNMB = $this->uri->segment(5);
            $_cmpFCODEZZ = $this->uri->segment(6);
            $_hstFRECNMB = $this->uri->segment(7);
            $_hstFCODEZZ = $this->uri->segment(8);
            $_cmpFYEARZZ = $this->uri->segment(9);
            $_cmpFWRKSTA = $this->uri->segment(10);
            $_payFRECNMB = $this->uri->segment(12);
            $_payFCODEZZ = $this->uri->segment(13);

            $data = array($field => $value);
            $this->db->where('FRECNMB', $id);
            $this->db->update('tpayrpt', $data);

            redirect('NocLOGIEN');
        }
    }

    public function mfcACTUSR021_B($id, $field, $value)
    {

        $_oMod = $this->uri->segment(3);
        $_oSub = $this->uri->segment(4);
        $_oAct = $this->uri->segment(11);
        $_cmpFRECNMB = $this->uri->segment(5);
        $_cmpFCODEZZ = $this->uri->segment(6);
        $_hstFRECNMB = $this->uri->segment(7);
        $_hstFCODEZZ = $this->uri->segment(8);
        $_cmpFYEARZZ = $this->uri->segment(9);
        $_cmpFWRKSTA = $this->uri->segment(10);
        $_payFRECNMB = $this->uri->segment(12);
        $_payFCODEZZ = $this->uri->segment(13);

        $data = array($field => $value);
        $this->db->where('FRECNMB', $id);
        $this->db->update('tpayrpt', $data);

        redirect('NocUSERZZ/cfcACTUSR021/actedt/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
    }

    public function mfcACTUSR021_C($id, $field, $value)
    {

        $_oMod = $this->uri->segment(3);
        $_oSub = $this->uri->segment(4);
        $_oAct = $this->uri->segment(11);
        $_cmpFRECNMB = $this->uri->segment(5);
        $_cmpFCODEZZ = $this->uri->segment(6);
        $_hstFRECNMB = $this->uri->segment(7);
        $_hstFCODEZZ = $this->uri->segment(8);
        $_cmpFYEARZZ = $this->uri->segment(9);
        $_cmpFWRKSTA = $this->uri->segment(10);
        $_payFRECNMB = $this->uri->segment(12);
        $_payFCODEZZ = $this->uri->segment(13);

        $data = array($field => $value);
        $this->db->where('FRECNMB', $id);
        $this->db->update('tdocrpt', $data);

        redirect('NocUSERZZ/cfcACTUSR021/actedt/pjkpay/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_hstFRECNMB . '/' . $_hstFCODEZZ . '/' . $_cmpFYEARZZ . '/' . $_cmpFWRKSTA);
    }

    public function mfcACTUSR022()
    {

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);

        if ($_oMod == 'reglst') {

            $this->db->select('*');
            $this->db->from('tregtra');
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queREGTRA = $this->db->get();

            if ($_queREGTRA->num_rows() > 0) {
                return $_queREGTRA->result_array();
            } else {
                return $_queREGTRA->result_array();
            }
        }

        if ($_oMod == 'kppsve') {

            $_varFCODEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCODEZZ'));
            $_varFCATGRY = 'kppofc';
            $_varFSEQNMB = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFSEQNMB'));
            $_varFFULNME = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFULNME'));
            $_varFADDRES = $this->sklibrfnc->_fGETPREGRP(str_replace("\n", "_n_", $this->input->post('_finFADDRES')));
            $_varFTELPON = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFTELPON'));
            $_varFFAXIML = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFFAXIML'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFEMAILZ'));

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where(
                array(
                    'FCODEZZ = ' => $_varFCODEZZ
                )
            );

            $_queKPPOFF = $this->db->get();

            if ($_queKPPOFF->num_rows() > 0) {
                return false;
            } else {

                $_addKPPOFF = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FCATGRY' => $_varFCATGRY,
                    'FSEQNMB' => $_varFSEQNMB,
                    'FFULNME' => $_varFFULNME,
                    'FADDRES' => $_varFADDRES,
                    'FTELPON' => $_varFTELPON,
                    'FFAXIML' => $_varFFAXIML,
                    'FEMAILZ' => $_varFEMAILZ
                );

                $this->db->insert('tprofle', $_addKPPOFF);
                return true;
            }
        }

        if ($_oMod == 'regviw') {

            $this->db->select('*');
            $this->db->from('tregtra');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queREGTRA = $this->db->get();

            if ($_queREGTRA->num_rows() > 0) {
                return $_queREGTRA->result_array();
            } else {
                return $_queREGTRA->result_array();
            }
        }

        if ($_oMod == 'regedt') {

            $this->db->select('*');
            $this->db->from('tregtra');
            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->order_by('FCODEZZ', 'ASC');

            $_queREGTRA = $this->db->get();

            if ($_queREGTRA->num_rows() > 0) {
                return $_queREGTRA->result_array();
            } else {
                return $_queREGTRA->result_array();
            }
        }

        if ($_oMod == 'regupd') {

            $this->load->helper('text');

            $_varFSTATUS = $this->sklibrfnc->_fGETPREGRP($this->input->post('_edtFSTATUS'));

            $_updREGTRA = array(
                'FSTATUS' => $_varFSTATUS
            );

            $this->db->where('FCODEZZ', $_cmpFCODEZZ);
            $this->db->update('tregtra', $_updREGTRA);

            redirect('NocUSERZZ/cfcACTUSR022/regviw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ);
        }

        if ($_oMod == 'regdel') {

            $this->db->where(
                array(
                    'FCODEZZ = ' => $_cmpFCODEZZ
                )
            );

            $this->db->delete('tregtra');
            return true;
        }
    }
}
