<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NocLOGIEN extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('DomLOGIEN');
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {

        $_objALERTZ['_varALERTZ'] = '';
        $this->load->view('logien/SeeLOGIEN', $_objALERTZ);
    }

    public function cfcCHKLGN()
    {

        $_objDTELGN = date("Y/m/d");
        $_objTMELGN = date("H:i:s");

        $_ipsUSRNME = $this->input->post('_finUSRNME');
        $_ipsKEYWRD = $this->input->post('_finKEYWRD');

        $_objRESULT = $this->DomLOGIEN->mfcCHKLGN($_ipsUSRNME, $_ipsKEYWRD);
        $_objALERTZ['_varALERTZ'] = '';

        if ($_objRESULT->num_rows() > 0) {
            foreach ($_objRESULT->result() as $_objROWDAT) {
                $_objSESSIO = array(
                    'FRECNMB' => $_objROWDAT->FRECNMB,
                    'FCODEZZ' => $_objROWDAT->FCODEZZ,
                    'FEMPIDN' => $_objROWDAT->FEMPIDN,
                    'FUSRNME' => $_objROWDAT->FUSRNME,
                    'FACTIVE' => $_objROWDAT->FACTIVE,
                    'FUSRTYP' => $_objROWDAT->FUSRTYP,
                    'FMODULE' => $_objROWDAT->FMODULE,
                    'FFULNME' => $_objROWDAT->FFULNME,
                    'FLNGAGE' => $_objROWDAT->FLNGAGE,
                    'FIMAGEX' => $_objROWDAT->FIMAGEX,
                    'FMODULE' => $_objROWDAT->FMODULE,
                    'FGROUPS' => $_objROWDAT->FGROUPS,
                    'XGROUPS' => $_objROWDAT->XGROUPS,
                    'XMEMBER' => $_objROWDAT->XMEMBER,
                    'FJOBLVL' => $_objROWDAT->FJOBLVL,
                    'FLOGINT' => $_objROWDAT->FLOGINT,
                    'FCATGRY' => $_objROWDAT->FCATGRY,
                    'FNPWPZZ' => $_objROWDAT->FNPWPZZ,
                    'FMENUZZ' => $_objROWDAT->FMENUZZ,
                    'FSERVCE' => $_objROWDAT->FSERVCE
                );

                $this->session->set_userdata($_objSESSIO);
            }

            if ($_objSESSIO['FUSRTYP'] == '0' || $_objSESSIO['FUSRTYP'] == '1') {
                if ($_objSESSIO['FACTIVE'] == '0') {
                    $_objALERTZ['_varALERTZ'] = 'noauthorized';
                } elseif ($_objSESSIO['FACTIVE'] == '1') {
                    redirect('NocUSERZZ/cfcACTDASBOR/dasviw');
                } else {
                    $_objALERTZ['_varALERTZ'] = 'noauthorized';
                }
            } else {
                if ($_objSESSIO['FACTIVE'] == '0') {
                    $_objALERTZ['_varALERTZ'] = 'noauthorized';
                } elseif ($_objSESSIO['FACTIVE'] == '1') {
                    redirect('NocHOMIEZ');
                } else {
                    $_objALERTZ['_varALERTZ'] = 'noauthorized';
                }
            };
            // $this->load->view('logien/SeeLOGIEN', $_objALERTZ);
        } else {

            $_objALERTZ['_varALERTZ'] = 'undefined';
            // $this->load->view('logien/SeeLOGIEN', $_objALERTZ);
        }
    }

    public function cfcACTUSR888()
    {

        $_oMod = $this->uri->segment(3);

        if (empty($_oMod)) {
            $this->load->view('logien\SeeUSR888');
        }

        if ($_oMod == 'regtra') {

            $this->load->model('DomLOGIEN');
            $this->DomLOGIEN->mfcACTUSR888();

            $_objALERTZ['_varALERTZ'] = 'regtra';

            $this->load->view('logien/SeeLOGIEN', $_objALERTZ);
        }
    }
}
