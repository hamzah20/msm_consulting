<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DomLOGIEN extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function mfcGETSCR() {

        $_objUsrIdn = $this->session->userdata('FUSRNME');
        if (empty($_objUsrIdn)) {
            $this->session->sess_destroy();
            redirect('NocLOGIEN');
        }
    }

    public function mfcCHKLGN($_ipsUSRNME, $_ipsKEYWRD) {

        $_ipsUSRNME = $this->db->escape($this->sklibrfnc->_fGETPREGRP($_ipsUSRNME));
        $_ipsUSRNME = substr($_ipsUSRNME, 1, strlen($_ipsUSRNME) - 2);

        $_ipsKEYWRD = $this->db->escape($this->sklibrfnc->_fGETPREGRP($_ipsKEYWRD));
        $_ipsKEYWRD = MD5(substr($_ipsKEYWRD, 1, strlen($_ipsKEYWRD) - 2));

        $this->db->select('tusrlgn.*,tgroups.FDESCRP AS xgroups');
        $this->db->from('tusrlgn');
        $this->db->join('tgroups', 'tusrlgn.FGROUPS = tgroups.FCODEZZ', 'LEFT');
        $this->db->where(array(
            'FUSRNME' => $_ipsUSRNME,
            'FKEYWRD' => $_ipsKEYWRD)
        );
        $_objQUERIE = $this->db->get();

        if ($_objQUERIE->num_rows() > 0) {
            return $_objQUERIE;
        } else {

            $this->db->select('tprofle.*, tgroups.FMEMBER AS XMEMBER, tgroups.FDESCRP AS xgroups');
            $this->db->from('tprofle');
            $this->db->join('tgroups', 'tprofle.FGROUPS = tgroups.FCODEZZ', 'LEFT');
            $this->db->where('FUSRNME', $_ipsUSRNME);
            $this->db->where('FKEYWRD', $_ipsKEYWRD);

            $_objQUERIE = $this->db->get();
            if ($_objQUERIE->num_rows() > 0) {
                return $_objQUERIE;
            } else {
                
            }
            return $_objQUERIE;
        }
    }

    public function mfcACTUSR888() {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'regtra') {

            date_default_timezone_set('Asia/Jakarta');
            $_oYea = date("y");
            $_oMon = date("m");

            $this->db->select('*');
            $this->db->from('tregtra');
            $this->db->like('FCODEZZ', 'REG' . $_oYea . $_oMon, 'after');
            $this->db->order_by('FCODEZZ', 'desc');
            $_queREGTRA = $this->db->get();

            if ($_queREGTRA->num_rows() > 0) {
                $_varREGTRA = $_queREGTRA->result_array();
                $_varCODEZZ = $_varREGTRA['0']['FCODEZZ'];

                $_sCODEZZ = explode('-', $_varCODEZZ);
                $_oCODEZZ = $_sCODEZZ[1];
                $_oCODEZX = strval(intval($_oCODEZZ) + 1);
                $_oCODEXX = '';

                if ($_oCODEZX <= 9) {
                    $_oCODEXX = 'REG' . $_oYea . $_oMon . '-0000' . $_oCODEZX;
                } elseif (($_oCODEZX > 9) && ($_oCODEZX <= 99)) {
                    $_oCODEXX = 'REG' . $_oYea . $_oMon . '-000' . $_oCODEZX;
                } elseif (($_oCODEZX > 99) && ($_oCODEZX <= 999)) {
                    $_oCODEXX = 'REG' . $_oYea . $_oMon . '-00' . $_oCODEZX;
                } elseif (($_oCODEZX > 999) && ($_oCODEZX <= 9999)) {
                    $_oCODEXX = 'REG' . $_oYea . $_oMon . '-0' . $_oCODEZX;
                } elseif ($_oCODEZX > 9999) {
                    $_oCODEXX = 'REG' . $_oYea . $_oMon . '-' . $_oCODEZX;
                } else {
                }
            } else {

                $_oCODEXX = 'REG' . $_oYea . $_oMon . '-00001';
            };


            $_varFCODEZZ = $_oCODEXX;
            $_varFUSERNM = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFUSERNM'));
            $_varFCOMPNY = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFCOMPNY'));
            $_varFEMAILZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFEMAILZ'));
            $_varFPHONEZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFPHONEZ'));
            $_varFNOTEZZ = $this->sklibrfnc->_fGETPREGRP($this->input->post('_finFNOTEZZ'));
            $_varFREGDTM = date("YmdH:i:s");

            $this->db->select('*');
            $this->db->from('tregtra');
            $this->db->where(array(
                'FCODEZZ = ' => $_varFCODEZZ
                    )
            );

            $_queREGTRA = $this->db->get();

            if ($_queREGTRA->num_rows() > 0) {
                return false;
            } else {

                $_addREGTRA = array(
                    'FCODEZZ' => $_varFCODEZZ,
                    'FUSERNM' => $_varFUSERNM,
                    'FCOMPNY' => $_varFCOMPNY,
                    'FEMAILZ' => $_varFEMAILZ,
                    'FPHONEZ' => $_varFPHONEZ,
                    'FNOTEZZ' => $_varFNOTEZZ,
                    'FREGDTM' => $_varFREGDTM,
                    'FSTATUS' => '1'
                );

                $this->db->insert('tregtra', $_addREGTRA);
                return true;
                redirect('NocLOGIEN');
            }
        }
    }

}
