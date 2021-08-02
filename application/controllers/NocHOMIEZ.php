<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NocHOMIEZ extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $_objMODULE['_objVALUE'] = $this->session->userdata('FVALUE');

        $_valMODULE = $this->session->userdata('FMODULE');

        $this->load->model('DomHOMIEZ');
        $_objMODULE['_objRESULT'] = $this->DomHOMIEZ->mfcGETMNU($_valMODULE);

        $this->load->model('DomSETUPZ');
        $_objMODULE['_tblCMPANY'] = $this->DomSETUPZ->mfcACTCMPANY();
        

        $this->load->view('panels/SeeHOMIEZ', $_objMODULE);
    }

    public function cfcMODULE() {
        $_valMODULE = $this->session->userdata('FMODULE');

        $this->load->model('DomHOMIEZ');
        $_varCONTEN['_objRESULT'] = $this->DomHOMIEZ->mfcGETMNU($_valMODULE);

        $this->load->model('DomSETUPZ');
        $_varCONTEN['_tblCMPANY'] = $this->DomSETUPZ->mfcACTCMPANY();

        $this->load->view('panels/SeeHOMIEZ', $_varCONTEN);
    }

    public function cfcINFORM() {

        $this->load->model('DomSETUPZ');
        $_varCONTEN['_tblCMPANY'] = $this->DomSETUPZ->mfcACTCMPANY();

        $this->load->view('panels/SeeINFORM', $_varCONTEN);
    }
    
    public function cfcABOUTZ() {

        $this->load->model('DomSETUPZ');
        $_varCONTEN['_tblCMPANY'] = $this->DomSETUPZ->mfcACTCMPANY();

        $this->load->view('panels/SeeABOUTZ',$_varCONTEN);
    }


}
