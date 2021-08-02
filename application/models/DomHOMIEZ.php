<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DomHOMIEZ extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function graph() {
        date_default_timezone_set('Asia/Jakarta');
        $_oMon = date("m");

        $this->db->select('FSTATUS, count(*) as XCOUNTZ, sum(FNOMNL3) as XNOMNL3');
        $this->db->from('tinvice');
        $this->db->where('substring(FDATEZZ,5,2)', $_oMon);
        $this->db->group_by('FSTATUS');

        $this->db->order_by('FSTATUS', 'asc');
        $data = $this->db->get();

        return $data->result();
    }

    public function graph2() {
        date_default_timezone_set('Asia/Jakarta');
        $_oMon = date("m");

        $this->db->select('FSTATUS,');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '01' . ',1,NULL)) as XCOUJAN');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '02' . ',1,NULL)) as XCOUFEB');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '03' . ',1,NULL)) as XCOUMAR');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '04' . ',1,NULL)) as XCOUAPR');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '05' . ',1,NULL)) as XCOUMEI');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '06' . ',1,NULL)) as XCOUJUN');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '07' . ',1,NULL)) as XCOUJUL');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '08' . ',1,NULL)) as XCOUAGS');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '09' . ',1,NULL)) as XCOUSEP');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '10' . ',1,NULL)) as XCOUOKT');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '11' . ',1,NULL)) as XCOUNOV');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '12' . ',1,NULL)) as XCOUDES');
        $this->db->from('tinvice');
        $this->db->where('FSTATUS','unp');

        $data2 = $this->db->get();
        return $data2->result();
    }

    public function graph3() {
        date_default_timezone_set('Asia/Jakarta');
        $_oMon = date("m");

        $this->db->select('FSTATUS,');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '01' . ',1,NULL)) as XCOUJAN');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '02' . ',1,NULL)) as XCOUFEB');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '03' . ',1,NULL)) as XCOUMAR');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '04' . ',1,NULL)) as XCOUAPR');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '05' . ',1,NULL)) as XCOUMEI');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '06' . ',1,NULL)) as XCOUJUN');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '07' . ',1,NULL)) as XCOUJUL');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '08' . ',1,NULL)) as XCOUAGS');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '09' . ',1,NULL)) as XCOUSEP');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '10' . ',1,NULL)) as XCOUOKT');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '11' . ',1,NULL)) as XCOUNOV');
        $this->db->select('count(if(substring(FDATEZZ,5,2)=' . '12' . ',1,NULL)) as XCOUDES');
        $this->db->from('tinvice');
        $this->db->where('FSTATUS','pid');

        $data3 = $this->db->get();
        return $data3->result();
    }

    public function mfcACTCMPANY() {

        $this->db->select('*');
        $this->db->from('TGLOSET');
        $this->db->where('FCOMMND', '(s)cstcmpnme');

        $_objCMPANY = $this->db->get();

        if ($_objCMPANY->num_rows() > 0) {
            return $_objCMPANY->result_array();
        } else {
            return $_objCMPANY->result_array();
        }

    }

}
