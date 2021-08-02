<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class NocUSERZZ extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->helper(array('url', 'download'));

        $this->load->model('domLOGIEN');
        $this->domLOGIEN->mfcGETSCR();
    }

    public function index()
    {
        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);

        $this->load->model("domUSERZZ");
        $_objCONTEN['_varTBLEMP'] = $this->domUSERZZ->mfcACTDASBOR();

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeDASHBR';
        $_objCONTEN['_varICONXX'] = 'fas fa-tv fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_sesFLNGAGE == 'eng') {
            $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
            $_objCONTEN['_varMDL002'] = 'Dashboard';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } elseif ($_sesFLNGAGE == 'ina') {
            $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
            $_objCONTEN['_varMDL002'] = 'Dashboard';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } else {
            $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
            $_objCONTEN['_varMDL002'] = 'Dashboard';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        };

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTDASBOR()
    {
        // $this->output->enable_profiler(TRUE);

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeDASHBR';
        $_objCONTEN['_varICONXX'] = 'fas fa-tv fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'dasviw') {

            $this->load->model('DomUSERZZ');

            $_objCONTEN['_tblCHART1'] = $this->DomUSERZZ->mfcACTCHART1();
            // $_objCONTEN['_tblCHART2'] = $this->DomUSERZZ->mfcACTCHART2();
            $_objCONTEN['_varTBLEMP'] = $this->DomUSERZZ->mfcACTDASBOR();

            // var_dump($this->DomUSERZZ->mfcACTCHART2());


            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
                $_objCONTEN['_varMDL002'] = 'Dashboard';
                $_objCONTEN['_varMDL003'] = '';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
                $_objCONTEN['_varMDL002'] = 'Dashboard';
                $_objCONTEN['_varMDL003'] = '';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-fw"></i>';
                $_objCONTEN['_varMDL002'] = 'Dashboard';
                $_objCONTEN['_varMDL003'] = '';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTINFORM()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeINFORM';
        $_objCONTEN['_varICONXX'] = 'fas fa-address-card fa-fw fa-lg';
        $_objCONTEN['_varICONCL'] = '#45b5cf';

        if ($_sesFLNGAGE == 'eng') {
            $_objCONTEN['_varMDL001'] = 'Dashboard';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } elseif ($_sesFLNGAGE == 'ina') {
            $_objCONTEN['_varMDL001'] = 'Dashboard';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } else {
            $_objCONTEN['_varMDL001'] = 'Kontak';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        };

        $this->load->model('DomUSERZZ');
        $_objCONTEN['_tblCMPANY'] = $this->DomUSERZZ->mfcACTCMPANY();

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTABOUTZ()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeABOUTZ';
        $_objCONTEN['_varICONXX'] = 'fas fa-info-circle fa-fw fa-lg';
        $_objCONTEN['_varICONCL'] = '';

        if ($_sesFLNGAGE == 'eng') {
            $_objCONTEN['_varMDL001'] = 'About';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } elseif ($_sesFLNGAGE == 'ina') {
            $_objCONTEN['_varMDL001'] = 'Tentang';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        } else {
            $_objCONTEN['_varMDL001'] = 'Tentang';
            $_objCONTEN['_varMDL002'] = '';
            $_objCONTEN['_varMDL003'] = '';
            $_objCONTEN['_varMDL004'] = '';
            $_objCONTEN['_varMDL005'] = '';
        };

        $this->load->model('DomUSERZZ');
        $_objCONTEN['_tblCMPANY'] = $this->DomUSERZZ->mfcACTCMPANY();

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR001($_oMod)
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_varXTABVIW = $this->uri->segment(6);
        $_varXPROCES = $this->uri->segment(7);

        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeMONITR';
        $_objCONTEN['_varICONXX'] = 'fas fa-chalkboard-teacher fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'cmplst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCMPLST'] = $this->DomUSERZZ->mfcACTUSR001();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR001'] = 'cmplst';
        }
        if ($_oMod == 'mon1st') {

            if (($_varXTABVIW !== 'sk_actv') || (empty($_varXPROCES))) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblACTLST'] = $this->DomUSERZZ->mfcACTUSR001();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
                };
            }

            if ($_varXPROCES == 'viw') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblACTVIW'] = $this->DomUSERZZ->mfcACTUSR001();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                };
            }

            if ($_varXPROCES == 'add') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblACTSVE'] = $this->DomUSERZZ->mfcACTUSR001();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Add New</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
                };
            }

            if ($_varXPROCES == 'sve') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR001();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblACTEDT'] = $this->DomUSERZZ->mfcACTUSR001();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblACTUPD'] = $this->DomUSERZZ->mfcACTUSR001();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                };
            }

            if ($_varXPROCES == 'del') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR001();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Monitoring' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR001'] = 'mon1st';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR002()
    {

        $_oMod = $this->uri->segment(3);
        $_oDwn = $this->uri->segment(5);

        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_msgFRECNMB = $this->uri->segment(6);
        $_msgFCODEZZ = $this->uri->segment(7);

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeMESSGE';
        $_objCONTEN['_varICONXX'] = 'fas fa-chalkboard-teacher fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'msg1st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Inbox' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg1st';
        }

        if ($_oMod == 'msg2st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Outgoing Message' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Keluar' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Keluar' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg2st';
        }

        if ($_oMod == 'msg1dd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Inbox' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Message</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pesan Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pesan Baru</font>';
            };


            $this->load->model("DomUSERZZ");
            $_drpSTAFFZ = $this->DomUSERZZ->mfcACTUSR002();
            $_objCONTEN['_tblSTAFFZ'] = $_drpSTAFFZ;

            $_objCONTEN['_swiUSR002'] = 'msg1dd';
        }

        if ($_oMod == 'msg1ve') {

            $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL004'] = 'New Add(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
            $_objCONTEN['_varMDL005'] = '';


            $_oFlg = 'ovr';
            $_oSiz = $_FILES['_fleFATTACH']['size'];


            if (empty($_FILES['_fleFATTACH']['name'])) {
                $_oFlg = 'emp';
                $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
            }

            if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                $_oFlg = 'ok1';
                $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
            }

            if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                $_oFlg = 'ok2';
                $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
            }

            if ($_oFlg == 'ovr') {
                $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
            }

            if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                $_varCONFIG['upload_path'] = './assets/pictures/doc/';
                $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp|xls|xlsx|doc|docx|txt|pdf';
                $_varCONFIG['encrypt_name'] = FALSE;
                $_varCONFIG['overwrite'] = TRUE;

                $this->upload->initialize($_varCONFIG);

                if ($this->upload->do_upload('_fleFATTACH')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR002();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'New Add(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    };
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'New Add (Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    };
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_size'] = $_oSiz;
            $_objCONTEN['_swiUSR002'] = 'msg1ve';
        }

        if ($_oMod == 'msg1iw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Inbox' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg1iw';
        }

        if ($_oMod == 'msg1dw') {

            $_fleFATTACH = $this->uri->segment(8);
            $_tmpFATTACH = explode(':', $_fleFATTACH);
            $_varFATTACH = $_tmpFATTACH['1'];

            if ((!empty(trim($_varFATTACH))) && (file_exists('./assets/pictures/doc/' . $_varFATTACH))) {
                force_download('./assets/pictures/doc/' . $_varFATTACH, NULL);
            } else {
                redirect('NocUSERZZ/cfcACTUSR002/msg1iw/' . $_cmpFRECNMB . '/' . $_cmpFCODEZZ . '/' . $_msgFRECNMB . '/' . $_msgFCODEZZ);
            }
        }

        if ($_oMod == 'msg1rp') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Inbox' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Reply</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Balasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Balasan</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg1rp';
        }

        if ($_oMod == 'msg1go') {

            $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
            $_objCONTEN['_varMDL004'] = 'New Add(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
            $_objCONTEN['_varMDL005'] = '';


            $_oFlg = 'ovr';


            if (empty($_FILES['_fleFATTACH']['name'])) {
                $_oFlg = 'emp';
                $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
            }

            if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                $_oFlg = 'ok1';
                $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
            }

            if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                $_oFlg = 'ok2';
                $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
            }

            if ($_oFlg == 'ovr') {
                $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
            }

            if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                $_varCONFIG['upload_path'] = './assets/pictures/doc/';
                $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp|xls|xlsx|doc|docx|txt|pdf';
                $_varCONFIG['encrypt_name'] = FALSE;
                $_varCONFIG['overwrite'] = TRUE;

                $this->upload->initialize($_varCONFIG);

                if ($this->upload->do_upload('_fleFATTACH')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR002();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'New Add(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    };
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'Reference' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Kantor Pelayanan Pajak' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Setup' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'New Add (Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'Referensi' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL002'] = 'Direktori Telepon' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL003'] = 'Pengaturan' . '&nbsp;<i class="fas fa-arrow-right fa-fw"></i>&nbsp;';
                        $_objCONTEN['_varMDL004'] = 'Tambah Baru (Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                        $_objCONTEN['_varMDL005'] = '';
                    };
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR002'] = 'msg1go';
        }

        if ($_oMod == 'msg1dt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Inbox' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Masuk' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg1dt';
        }

        if ($_oMod == 'msg1pd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblPLANER'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Planner' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Planner' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Planner' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR002'] = 'msg1pd';
        }

        if ($_oMod == 'msg2iw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblMESSGE'] = $this->DomUSERZZ->mfcACTUSR002();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Outgoing Message' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Keluar' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Task' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pesan Keluar' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            };
            $_objCONTEN['_swiUSR002'] = 'msg2iw';
        }


        if ($_oMod == 'cmpedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCOMPNY'] = $this->DomUSERZZ->mfcACTUSR001();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Information' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Company' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Edit</font>';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Edit</font>';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Edit</font>';
                $_objCONTEN['_varMDL005'] = '';
            }
            $_objCONTEN['_swiUSR001'] = 'cmpedt';
        }

        if ($_oMod == 'cmpupd') {

            $_varCONFIG['upload_path'] = './assets/pictures/doc/';
            $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $_varCONFIG['encrypt_name'] = FALSE;
            $_varCONFIG['overwrite'] = TRUE;

            $this->upload->initialize($_varCONFIG);

            if (!empty($_FILES['_efiFNPWPZZ']['name'])) {
                if ($this->upload->do_upload('_efiFNPWPZZ')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            if (!empty($_FILES['_efiFPKPZZZ']['name'])) {
                if ($this->upload->do_upload('_efiFPKPZZZ')) {
                    $_varIMAGEY = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEY['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 600;
                    $_varCONFIG['height'] = 400;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEY['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCOMPNY'] = $this->DomUSERZZ->mfcACTUSR001();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Information' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Company' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Update</font>';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            }
            $_objCONTEN['_swiUSR001'] = 'cmpupd';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR003()
    {

        $_oMod = $this->uri->segment(3);
        $_oDwn = $this->uri->segment(5);

        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_msgFRECNMB = $this->uri->segment(6);
        $_msgFCODEZZ = $this->uri->segment(7);

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeTSKMGM';
        $_objCONTEN['_varICONXX'] = 'fas fa-chalkboard-teacher fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'tsklst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblTSKMGM'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR003'] = 'tsklst';
        }

        if ($_oMod == 'tskadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblTSKMGM'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Message</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pesan Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pesan Baru</font>';
            };

            $_objCONTEN['_swiUSR003'] = 'tskadd';
        }

        if ($_oMod == 'tsksve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR003();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR003'] = 'tsksve';
        }

        if ($_oMod == 'tskviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblTSKMGM'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR003'] = 'tskviw';
        }

        if ($_oMod == 'tskedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblTSKMGM'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR003'] = 'tskedt';
        }

        if ($_oMod == 'tskupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblTSKMGM'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR003'] = 'tskupd';
        }

        if ($_oMod == 'tskdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR003();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Task' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Penugasan (Task)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR003'] = 'tskdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR004()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeKPPOFF';
        $_objCONTEN['_varICONXX'] = 'fas fa-file fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'kpplst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblKPPOFF'] = $this->DomUSERZZ->mfcACTUSR004();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR004'] = 'kpplst';
        }
        if ($_oMod == 'kppadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblKPPOFF'] = $this->DomUSERZZ->mfcACTUSR003();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR004'] = 'kppadd';
        }

        if ($_oMod == 'kppsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR004();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR004'] = 'kppsve';
        }

        if ($_oMod == 'kppviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKPPOFF'] = $this->DomUSERZZ->mfcACTUSR004();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR004'] = 'kppviw';
        }

        if ($_oMod == 'kppedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKPPOFF'] = $this->DomUSERZZ->mfcACTUSR004();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR004'] = 'kppedt';
        }

        if ($_oMod == 'kppupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKPPOFF'] = $this->DomUSERZZ->mfcACTUSR004();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR004'] = 'kppupd';
        }

        if ($_oMod == 'kppdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR004();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR004'] = 'kppdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR004()
    {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'expxls') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData KPP');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H1:H2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1:H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:H2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut KPP');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Kode KPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Nama KPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Telepon');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'Faksimile');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H1', 'Email');

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'kppofc');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FSEQNMB']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oRow['FFULNME']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, str_replace('_n_', '; ', $_oRow['FADDRES']));
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, $_oRow['FFULNME']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oBrs, $_oRow['FTELPON']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oBrs, $_oRow['FFAXIML']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrs, $_oRow['FEMAILZ']);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oBrs, $_oRow['FSEQNMB'])->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_KPP_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR005()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);


        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeVENDOR';
        $_objCONTEN['_varICONXX'] = 'fas fa-file fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'vndlst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblVENDOR'] = $this->DomUSERZZ->mfcACTUSR005();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR005'] = 'vndlst';
        }

        if ($_oMod == 'vndadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblVENDOR'] = $this->DomUSERZZ->mfcACTUSR005();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };


            $_objCONTEN['_swiUSR005'] = 'vndadd';
        }

        if ($_oMod == 'vndsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR005();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }


            $_objCONTEN['_swiUSR005'] = 'vndsve';
        }

        if ($_oMod == 'vndviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblVENDOR'] = $this->DomUSERZZ->mfcACTUSR005();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR005'] = 'vndviw';
        }

        if ($_oMod == 'vndedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblVENDOR'] = $this->DomUSERZZ->mfcACTUSR005();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR005'] = 'vndedt';
        }

        if ($_oMod == 'vndupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblVENDOR'] = $this->DomUSERZZ->mfcACTUSR005();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR005'] = 'vndupd';
        }

        if ($_oMod == 'vnddel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR005();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Vendor (Lain-Lain)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR005'] = 'vnddel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR005()
    {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'expxls') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData Vendor (Lain-Lain)');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut Vendor (Lain-Lain)');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama Vendor (Lain-Lain)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Telepon');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Faksimile');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'Email');

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'vendor');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FFULNME']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, str_replace('_n_', '; ', $_oRow['FADDRES']));
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, $_oRow['FTELPON']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oBrs, $_oRow['FFAXIML']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oBrs, $_oRow['FEMAILZ']);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_Vendor (Lain-Lain)_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR006()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);
        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_varXTABVIW = $this->uri->segment(6);
        $_varXPROCES = $this->uri->segment(7);

        $_oPre = $this->uri->segment(4);
        $_oFle = $this->uri->segment(5);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeCOMPNY';
        $_objCONTEN['_varICONXX'] = 'fas fa-database fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'cmplst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCMPLST'] = $this->DomUSERZZ->mfcACTUSR006();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR006'] = 'cmplst';
        }

        if ($_oMod == 'cmp1dd') {

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };
            $_objCONTEN['_swiUSR006'] = 'cmp1dd';
        }

        if ($_oMod == 'cmp1ve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR006();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                }

                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR006'] = 'cmp1ve';
        }

        if ($_oMod == 'cmp1iw') {


            if (empty($_varXPROCES)) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblCMP1IW'] = $this->DomUSERZZ->mfcACTUSR006();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                };
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblCMP1IW'] = $this->DomUSERZZ->mfcACTUSR006();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $_varCONFIG['upload_path'] = './assets/mins/doc/';
                $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp|xls|xlsx|doc|docx|txt|pdf';
                $_varCONFIG['encrypt_name'] = FALSE;
                $_varCONFIG['overwrite'] = TRUE;

                $this->upload->initialize($_varCONFIG);


                if ($this->upload->do_upload('_fleFNPWPZZ')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFSKTXDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFPKPZDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFTDPXDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFSIUPDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFNIBXDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFAKPNDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFAKPRDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFAKSPDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFSKBXDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFSERTDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFSKDUDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFEFINDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFKDIRDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                if ($this->upload->do_upload('_fleFNDIRDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblCMP1IW'] = $this->DomUSERZZ->mfcACTUSR006();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
                };
            }

            $_objCONTEN['_swiUSR006'] = 'cmp1iw';
        }

        if ($_oMod == 'cmp1el') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR006();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR006'] = 'cmp1el';
        }

        if ($_oMod == 'cmp1mp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';


            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            }

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/cmp/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/cmp/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }

            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/cmp/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }

            $_objCONTEN['_swiUSR006'] = 'cmp1mp';
        }

        if ($_oMod == 'cmp2iw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCOMPNY'] = $this->DomUSERZZ->mfcACTUSR006();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            };
            $_objCONTEN['_swiUSR006'] = 'cmp2iw';
        }

        if ($_oMod == 'cmp2dt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCOMPNY'] = $this->DomUSERZZ->mfcACTUSR006();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            };
            $_objCONTEN['_swiUSR006'] = 'cmp2dt';
        }

        if ($_oMod == 'cmp2pd') {

            $_varCONFIG['upload_path'] = './assets/pictures/doc/';
            $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $_varCONFIG['encrypt_name'] = FALSE;
            $_varCONFIG['overwrite'] = TRUE;

            $this->upload->initialize($_varCONFIG);

            if (!empty($_FILES['_efiFNPWPZZ']['name'])) {
                if ($this->upload->do_upload('_efiFNPWPZZ')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            if (!empty($_FILES['_efiFPKPZZZ']['name'])) {
                if ($this->upload->do_upload('_efiFPKPZZZ')) {
                    $_varIMAGEY = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEY['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 600;
                    $_varCONFIG['height'] = 400;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEY['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCOMPNY'] = $this->DomUSERZZ->mfcACTUSR006();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Company' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Perusahaan' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            };
            $_objCONTEN['_swiUSR006'] = 'cmp2pd';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR006()
    {

        $_oMod = $this->uri->segment(4);

        $_oTdy = date("Ymd");

        if ($_oMod == 'expxls') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Format Profil Klien');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:E2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:E2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut Profil Perusahaan');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama Perusahaan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Alamat');

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'client');
            $this->db->where('FTYPEZZ', 'cmp');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_xNpw = $_oRow['FNPWPZZ'];
                if (substr_count($_xNpw, ';') == 1) {
                    $_yNpw = explode(';', $_xNpw);
                    $_zNpw = $_yNpw[1];
                } else {
                    $_zNpw = '';
                }

                if (strlen($_zNpw) == 15) {
                    $_oNpw = substr($_zNpw, 0, 2) . '.' . substr($_zNpw, 2, 3) . '.' . substr($_zNpw, 5, 3) . '.' . substr($_zNpw, 8, 1) . '-' . substr($_zNpw, 9, 3) . '.' . substr($_zNpw, 12, 3);
                } else {
                    $_oNpw = '';
                }

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FFULNME']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oNpw);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, str_replace('_n_', ';', $_oRow['FADDRES']));
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMAT_ProfilKlien_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR007()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPre = $this->uri->segment(6);
        $_oFle = $this->uri->segment(7);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeEMPLOY';
        $_objCONTEN['_varICONXX'] = 'fas fa-database fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'cmplst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCMPLST'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'cmplst';
        }

        if ($_oMod == 'emp1st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblEMP1ST'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'emp1st';
        }

        if ($_oMod == 'emp1dd') {

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'emp1dd';
        }

        if ($_oMod == 'emp1ve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR007();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR007'] = 'emp1ve';
        }

        if ($_oMod == 'emp1iw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMP1IW'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR007'] = 'emp1iw';
        }

        if ($_oMod == 'emp1dt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMP1DT'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR007'] = 'emp1dt';
        }

        if ($_oMod == 'emp1pd') {

            $_varCONFIG['upload_path'] = './assets/pictures/doc/';
            $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $_varCONFIG['encrypt_name'] = FALSE;
            $_varCONFIG['overwrite'] = TRUE;

            $this->upload->initialize($_varCONFIG);

            if (!empty($_FILES['_efiFNPWPDC']['name'])) {
                if ($this->upload->do_upload('_efiFNPWPDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '100%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMP1PD'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Information' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Company' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Update</font>';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            }
            $_objCONTEN['_swiUSR007'] = 'emp1pd';
        }

        if ($_oMod == 'emp1el') {

            $this->load->model('DomUSERZZ');
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR007();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR007'] = 'emp1el';
        }


        if ($_oMod == 'emp1mp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Import</font>';
            }

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/emp/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/emp/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }

            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/emp/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }

            $_objCONTEN['_swiUSR007'] = 'emp1mp';
        }


        if ($_oMod == 'emp2st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblEMP2ST'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'emp2st';
        }

        if ($_oMod == 'emp2dd') {

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'emp2dd';
        }

        if ($_oMod == 'emp2ve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR007();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR007'] = 'emp2ve';
        }

        if ($_oMod == 'emp2iw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblEMP2IW'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            };
            $_objCONTEN['_swiUSR007'] = 'emp2iw';
        }

        if ($_oMod == 'emp2dt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMP2DT'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR007'] = 'emp2dt';
        }

        if ($_oMod == 'emp2pd') {

            $_varCONFIG['upload_path'] = './assets/pictures/doc/';
            $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $_varCONFIG['encrypt_name'] = FALSE;
            $_varCONFIG['overwrite'] = TRUE;

            $this->upload->initialize($_varCONFIG);

            if (!empty($_FILES['_efiFNPWPDC']['name'])) {
                if ($this->upload->do_upload('_efiFNPWPDC')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['quality'] = '100%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/pictures/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }
            } else {
            }

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMP2PD'] = $this->DomUSERZZ->mfcACTUSR007();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Information' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Company' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Update</font>';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL002'] = 'Informasi' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL003'] = 'Perusahaan' . ' <i class="fas fa-arrow-right fa-1x fa-fw"></i> ';
                $_objCONTEN['_varMDL004'] = '<font color="#ff0000">Pembaruan</font>';
                $_objCONTEN['_varMDL005'] = '';
            }
            $_objCONTEN['_swiUSR007'] = 'emp2pd';
        }

        if ($_oMod == 'emp2el') {

            $this->load->model('DomUSERZZ');
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR007();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Worker (Employee)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Karyawan (Pegawai)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . '<font color="#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR007'] = 'emp2el';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR007()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oMod = $this->uri->segment(6);

        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $this->db->order_by('FCODEZZ', 'asc');
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
            }
        }

        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData Karyawan (Pegawai)');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'ffffff'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H1:H2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1:H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('I1:I2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1:I2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J1:J2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J1:J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('K1:K2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K1:K2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('L1:L2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:L2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('M1:M2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1:M2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('N1:N2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1:N2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "No. Urut Karyawan\n(Pegawai)");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', "NIK/Nmr.\nPasport");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'Jenis Kelamin');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H1', 'Jabatan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I1', "Status\n/Tanggungan");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J1', "Lokal\n/Ekspatriat");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K1', "Kode\nNegara Domisili");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', "Periode Awal Kerja\n<YYYY-MM-DD> atau <M>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setWrapText(true);
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('L1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M1', "Periode Akhir Kerja\n<YYYY-MM-DD> atau <M>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N1', 'Kode Objek Pajak');

            $this->db->select('*, tprofle.FCODEZZ as XCODEZZ, tmaritl.FPTKPCD as XMARITL');
            $this->db->from('tprofle');
            $this->db->join('tmaritl', 'tprofle.FMARITL = tmaritl.FCODEZZ', 'LEFT');
            $this->db->where('FGROUPS', $_oCmp);
            $this->db->order_by('tprofle.FCODEZZ', 'asc');

            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_xNpw = $_oRow['FNPWPZZ'];
                if (substr_count($_xNpw, ';') == 1) {
                    $_yNpw = explode(';', $_xNpw);
                    $_zNpw = $_yNpw[1];
                } else {
                    $_zNpw = '';
                }

                if (strlen($_zNpw) == 15) {
                    $_oNpw = substr($_zNpw, 0, 2) . '.' . substr($_zNpw, 2, 3) . '.' . substr($_zNpw, 5, 3) . '.' . substr($_zNpw, 8, 1) . '-' . substr($_zNpw, 9, 3) . '.' . substr($_zNpw, 12, 3);
                } else {
                    $_oNpw = '';
                }


                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['XCODEZZ']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FFULNME']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oNpw);

                $_xNik = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xNik->createText($_oRow['FCITIDN']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, $_xNik);


                $_xAdr = str_replace('_n_', '; ', $_oRow['FADDRES']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oBrs, $_xAdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oBrs, $_oRow['FGENDER']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrs, $_oRow['FJOBTTL']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oBrs, $_oRow['XMARITL']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oBrs, $_oRow['FWRKTYP']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oBrs, $_oRow['FNATION']);

                if ((!empty($_oRow['FSTADTE'])) && (strlen($_oRow['FSTADTE']) == 8)) {
                    $_oSta = substr($_oRow['FSTADTE'], 0, 4) . '-' . substr($_oRow['FSTADTE'], 4, 2) . '-' . substr($_oRow['FSTADTE'], 6, 2);
                } else {
                    $_oSta = '';
                }
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L' . $_oBrs, $_oSta);

                if ((!empty($_oRow['FENDDTE'])) && (strlen($_oRow['FENDDTE']) == 8)) {
                    $_oEnd = substr($_oRow['FENDDTE'], 0, 4) . '-' . substr($_oRow['FENDDTE'], 4, 2) . '-' . substr($_oRow['FENDDTE'], 6, 2);
                } else {
                    $_oEnd = '';
                }
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M' . $_oBrs, $_oEnd);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_KaryawanPegawai_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR008()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH21Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';


        if ($_oMod == 'c21lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC21LST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'c21lst';
        }

        if ($_oMod == 'c21viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC21LST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Calculation' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'c21viw';
        }

        if ($_oMod == 'c212st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Calculation' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'c212st';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'prdadd';
        }

        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR008();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR008'] = 'prdsve';
        }

        if ($_oMod == 'c21smr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC21SMR'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $_objCONTEN['_swiUSR008'] = 'c21smr';
        }

        if ($_oMod == 'c21kmp') {

            $this->load->model("DomUSERZZ");
            $this->DomUSERZZ->mfcACTUSR008();
        }

        if ($_oMod == 'c21imp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/p21/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/p21/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                        $_objCONTEN['KATAKBENJUT'] = $this->input->post('_finFPERIOD');
                        $_objCONTEN['KATAKPITAKZ'] = $this->input->post('_finFREVISI');
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }


            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR008();


                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/p21/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }


            $_objCONTEN['_swiUSR008'] = 'c21imp';
        }

        if ($_oMod == 'c21dtl') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC21DTL'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };
            $_objCONTEN['_swiUSR008'] = 'c21dtl';
        }

        if ($_oMod == 'c21dtx') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC21DTX'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };
            $_objCONTEN['_swiUSR008'] = 'c21dtx';
        }


        if ($_oMod == 'c212st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'c212st';
        }

        if ($_oMod == 'c212mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212MR'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'c212mr';
        }

        if ($_oMod == 'c21cor') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR008();
        }

        if ($_oMod == 'c212pr') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR008();
        }

        if ($_oMod == 'h212st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblH212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 21' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR008'] = 'h212st';
        }

        if (($_oMod == 'c21smr') && ($_oPre == 'sndeml')) {

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPh21 Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPh21</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPh21</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR008'] = 'c21eml';
        }

        if (($_oMod == 'c21smr') && ($_oPrd == 'pphfnl')) {
            $this->load->model("DomUSERZZ");
            $this->DomUSERZZ->mfcACTUSR008();
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR008()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);

        $_oTdy = date("Ymd");
        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp21');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
        }

        $this->db->select('COUNT(*) AS XCOUNTZ, SUM(FBRUTO2) AS XBRUTO2, SUM(FP21HMN) AS XP21HMN, SUM(FP21RSG) AS XP21RSG, SUM(FCOMPEN) AS XCOMPEN, SUM(FPJKKBY) AS XPJKKBY');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp21'
            )
        );
        $this->db->order_by('FPROFLE', 'desc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oXCOUNTZ = $_oRow['XCOUNTZ'];
            $_oXBRUTO2 = $_oRow['XBRUTO2'];
            $_oXP21HMN = $_oRow['XP21HMN'];
            $_oXCOMPEN = $_oRow['XCOMPEN'];
            $_oXPJKKBY = $_oRow['XPJKKBY'];
            $_oXP21KBY = $_oRow['XP21KBY'];
            $_oXP21RSG = $_oRow['XP21RSG'];
            $_oXKJSZZZ = '411121-100';
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $_queTAXHST = $this->db->get();

        foreach ($_queTAXHST->result_array() as $_oRow) {

            $_oFCOMPEN = $_oRow['FCOMPEN'];
            $_oFPJKKBY = $_oRow['FPJKKBY'];
        }




        if ($_oMod == 'rptsmr') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Info PPh 21');
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('A')->setWidth(2.50);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('B')->setWidth(2.50);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:H13')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18:H18')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:H18')->applyFromArray($_oBdr);

            $baris = 1;

            $_oTgl = $this->sklibrfnc->_fSETDteIndPjg($_oTdy);
            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_oAdr = str_replace('_n_', ', ', $_oFADDRES);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));
            $_vMsa = $_oFPERIOD . '01';
            $_wMsa = date('Ymd', strtotime('+1 month', strtotime($this->sklibrfnc->_fSETDteFrmEng($_vMsa))));
            $_xMsa = trim($this->sklibrfnc->_fSETDteIndPjg($_wMsa));
            $_yMsa = trim(substr($_xMsa, 3, strlen($_xMsa) - 8));
            $_xMsa = trim(substr($_xMsa, strlen($_xMsa) - 4, 4));
            $_oEmp = $_oXCOUNTZ;
            $_oBrt = $_oXBRUTO2;
            $_oUtg = $_oXPJKKBY;
            if (!empty($_oFCOMPEN)) {
                $_oKom = $_oFCOMPEN;
            } else {
                $_oKom = '0';
            }
            $_oKby = $_oFPJKKBY;
            $_oKjs = $_oXKJSZZZ;

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B2', 'Jakarta, ' . $_oTgl);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B4:K4');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B4', 'Kepada Yth.');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B5:K5');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B5', $_objCliNme);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B6:K6');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B6', 'NPWP : ' . $_oNpw);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B7:K7');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B7', $_oAdr);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B9:K9');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 21 TERUTANG MASA ' . strtoupper($_oBln) . ' TAHUN PAJAK ' . $_oThn . '  YANG HARUS DISETOR');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B11', "'1.");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C11:H11');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 21 - Pegawai Tetap');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C13:C14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:C14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:C14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C13', 'JUMLAH PEGAWAI TETAP');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D13:D14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D13:D14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D13:D14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D13', 'TOTAL PENGHASILAN BRUTO');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E13:E14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E13:E14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E13:E14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E13', 'PPh 21 TERUTANG');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F13:F14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F13:F14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F13:F14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F13', 'KOMPENSASI');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G13:G14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G13:G14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G13:G14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G13', 'PPh 21 KURANG BAYAR');
            $_oWid = 10;
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('G')->setWidth($_oWid + 2);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H13:H14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H13:H14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H13:H14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H13', 'KODE JENIS SETORAN');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C15:C17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C15:C17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C15:C17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C15', $_oEmp);

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C18', '(Total)');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D15:D17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15:D17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15:D17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D15', $_oBrt);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D18', $_oBrt);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E15:E17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15:E17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15:E17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E15', $_oUtg);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E18', $_oUtg);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F15:F17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15:F17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15:F17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F15', $_oKom);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F18', $_oKom);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G15:G17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15:G17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15:G17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G15', $_oKby);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G18', $_oKby);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H15:H17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H15:H17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H15:H17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H15', $_oKjs);


            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C20:K20');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $_oBln . ' Tahun Pajak ' . $_oThn . ' adalah sebagai berikut  Rp. ' . number_format($_oKby));

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C21:K21');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C21', '>> Mohon disetorkan paling lambat tanggal 10 ' . $_yMsa . ' ' . $_xMsa);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C22:K22');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C22', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C24:K24');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C27:K27');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C27', 'Regards,');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C28:K28');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C28', 'Team MSM');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C29:K29');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C29', 'Ph : +6221 63858603/04');

            foreach (range('C', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPh21_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }

        if ($_oMod == 'expfrd') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);

            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData PPh 21');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:O2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:D2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0000CC');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0000FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3333FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('6666FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9999FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:L2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF8400');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1:M2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFA303');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1:O2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC896');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'ffffff'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:O2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H1:H2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1:H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('I1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1:K1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('L1:L2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:L2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('M1:M2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1:M2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('N1:O1');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1:O1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_oCA1 = 0;
            $_oCB1 = 0;
            $_oCC1 = 0;
            $_oCD1 = 0;
            $_oCE1 = 0;
            $_oCF1 = 0;
            $_oCG1 = 0;
            $_oCH1 = 0;
            $_oCI1 = 0;
            $_oCJ1 = 0;
            $_oCK1 = 0;
            $_oCL1 = 0;
            $_oCM1 = 0;
            $_oCN1 = 0;
            $_oCO1 = 0;
            $_oCP1 = 0;
            $_oCQ1 = 0;
            $_oCR1 = 0;
            $_oCS1 = 0;
            $_oCT1 = 0;
            $_oCU1 = 0;
            $_oCV1 = 0;
            $_oCW1 = 0;
            $_oCX1 = 0;

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('A1')->getValue();
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "Periode\n<YYYY-MM>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', "No. Urut\nKaryawan (Pegawai)");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Nama');
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', "Gaji/Pensiun\natau THT/JHT");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Tunjangan PPh');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('F1')->getValue();
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', "Tunjangan Lainnya,\nUang Lembur, Dsb");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H1', "Honorarium & Imbalan\nLainnya Sejenisnya");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('H1')->getValue();
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I1', 'Premi Asuransi dibayar Pemberi Kerja');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('I1')->getValue();
            foreach (range('I', 'K') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I2', 'Premi JKK');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J2', 'Premi JKM');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K2', 'BPJS Kesehatan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', "Natura & Kenikmatan\nLainnya");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setWrapText(true);
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('L1')->getValue();
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M1', "Tantiem, Bonus, Gratifikasi,\nJasa Produksi & THR");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setWrapText(true);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N1', 'Iuran');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('I1')->getValue();

            $_xPrd = substr($_oPrd, 0, 6);

            $_oSql = "select * from tprofle where FGROUPS ='" . $_oCmp . "' and (substring(FSTADTE,1,6) <= '" . $_xPrd . "') and ((substring(FENDDTE,1,6) >= '" . $_xPrd . "') or (FENDDTE IS NULL) or (FENDDTE = ''))";
            $_quePROFLE = $this->db->query($_oSql);

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_xNpw = $_oRow['FNPWPZZ'];
                if (substr_count($_xNpw, ';') == 1) {
                    $_yNpw = explode(';', $_xNpw);
                    $_zNpw = $_yNpw[1];
                } else {
                    $_zNpw = '';
                }

                if (strlen($_zNpw) == 15) {
                    $_oNpw = substr($_zNpw, 0, 2) . '.' . substr($_zNpw, 2, 3) . '.' . substr($_zNpw, 5, 3) . '.' . substr($_zNpw, 8, 1) . '-' . substr($_zNpw, 9, 3) . '.' . substr($_zNpw, 12, 3);
                } else {
                    $_oNpw = '';
                }


                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, substr($_oPrd, 0, 4) . '-' . substr($_oPrd, 4, 2));

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FCODEZZ']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oRow['FFULNME']);
            }


            foreach (range('N', 'O') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N2', 'Iuran THT/JHT');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O2', 'Iuran JP');

            $_oCl1 = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMAT_PPh21_' . date('Ymd') . '_' . $_oCl1 . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }

        if ($_oMod == 'sndpdf') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Info PPh 21');
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('A')->setWidth(2.50);
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('B')->setWidth(2.50);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:H13')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18:H18')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:H18')->applyFromArray($_oBdr);

            $baris = 1;

            $_oTgl = $this->sklibrfnc->_fSETDteIndPjg($_oTdy);
            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_oAdr = str_replace('_n_', ', ', $_oFADDRES);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));
            $_vMsa = $_oFPERIOD . '01';
            $_wMsa = date('Ymd', strtotime('+1 month', strtotime($this->sklibrfnc->_fSETDteFrmEng($_vMsa))));
            $_xMsa = trim($this->sklibrfnc->_fSETDteIndPjg($_wMsa));
            $_yMsa = trim(substr($_xMsa, 3, strlen($_xMsa) - 8));
            $_xMsa = trim(substr($_xMsa, strlen($_xMsa) - 4, 4));
            $_oEmp = $_oXCOUNTZ;
            $_oBrt = $_oXBRUTO2;
            $_oUtg = $_oXPJKKBY;
            if (!empty($_oFCOMPEN)) {
                $_oKom = $_oFCOMPEN;
            } else {
                $_oKom = '0';
            }
            $_oKby = $_oFPJKKBY;
            $_oKjs = $_oXKJSZZZ;

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B2', 'Jakarta, ' . $_oTgl);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B4:K4');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B4', 'Kepada Yth.');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B5:K5');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B5', $_objCliNme);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B6:K6');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B6', 'NPWP : ' . $_oNpw);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B7:K7');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B7', $_oAdr);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B9:K9');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 21 TERUTANG MASA ' . strtoupper($_oBln) . ' TAHUN PAJAK ' . $_oThn . '  YANG HARUS DISETOR');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B11', "'1.");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C11:H11');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 21 - Pegawai Tetap');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C13:C14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:C14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C13:C14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C13', 'JUMLAH PEGAWAI TETAP');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D13:D14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D13:D14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D13:D14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D13', 'TOTAL PENGHASILAN BRUTO');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E13:E14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E13:E14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E13:E14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E13', 'PPh 21 TERUTANG');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F13:F14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F13:F14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F13:F14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F13', 'KOMPENSASI');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G13:G14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G13:G14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G13:G14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G13', 'PPh 21 KURANG BAYAR');
            $_oWid = 10;
            $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('G')->setWidth($_oWid + 2);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H13:H14');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H13:H14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H13:H14')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H13', 'KODE JENIS SETORAN');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C15:C17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C15:C17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C15:C17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C15', $_oEmp);

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C18', '(Total)');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C18')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D15:D17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15:D17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15:D17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D15', $_oBrt);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D18', $_oBrt);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E15:E17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15:E17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15:E17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E15', $_oUtg);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E18', $_oUtg);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F15:F17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15:F17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15:F17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F15', $_oKom);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F18', $_oKom);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G15:G17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15:G17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15:G17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G15', $_oKby);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G15')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G18', $_oKby);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G18')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('H15:H17');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H15:H17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H15:H17')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H15', $_oKjs);


            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C20:K20');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $_oBln . ' Tahun Pajak ' . $_oThn . ' adalah sebagai berikut  Rp. ' . number_format($_oKby));

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C21:K21');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C21', '>> Mohon disetorkan paling lambat tanggal 10 ' . $_yMsa . ' ' . $_xMsa);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C22:K22');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C22', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C24:K24');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C27:K27');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C27', 'Regards,');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C28:K28');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C28', 'Team MSM');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C29:K29');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C29', 'Ph : +6221 63858603/04');


            foreach (range('C', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Mpdf($spreadsheet);
            $_varFLENME = 'REPORT_PPh21_' . date('Ymd') . '_' . $_objCliNme . '.pdf';

            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');

            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcEMLUSR008()
    {

        $_oMod = $this->uri->segment(8);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH21Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';



        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR009()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_varXPROCES = $this->uri->segment(8);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH22Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';


        if ($_oMod == 'c22lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC22LST'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'c22lst';
        }

        if ($_oMod == 'c22viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC22VIW'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = '' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'c22viw';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'prdadd';
        }


        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR009'] = 'prdsve';
        }

        if ($_oMod == 'c22smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'viw') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();
                $_objCONTEN['_tblC22VIW'] = $this->DomUSERZZ->mfcACTUSR009();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();
                $_objCONTEN['_tblC22EDT'] = $this->DomUSERZZ->mfcACTUSR009();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'add') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'sve') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'del') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR009'] = 'c22smr';
        }


        if (($_oMod == 'c22smr') && ($_varXPROCES == 'sndeml')) {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPh22 Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPh22</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPh22</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR009'] = 'c22eml';
        }

        if ($_oMod == 'c22imp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/p22/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/p22/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                        $_objCONTEN['KATAKBENJUT'] = $this->input->post('_finFPERIOD');
                        $_objCONTEN['KATAKPITAKZ'] = $this->input->post('_finFREVISI');
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'file upload tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }


            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR009();

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/p22/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }


            $_objCONTEN['_swiUSR009'] = 'c22imp';
        }

        if ($_oMod == 'c222st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC222ST'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'c222st';
        }

        if ($_oMod == 'c222mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC222MR'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'c222mr';
        }

        if ($_oMod == 'c22cor') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();
        }

        if ($_oMod == 'c222pr') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR009();
        }

        if ($_oMod == 'h222st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblH222ST'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR009'] = 'h222st';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR009()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);

        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp22');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
        }


        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp22'
            )
        );
        $this->db->group_by('FKJSZZZ', 'asc');
        $this->db->order_by('FKJSZZZ', 'asc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oFKJSZZZ = $_oRow['FKJSZZZ'];
        }

        $this->db->select('*');
        $this->db->from('tkjstor');
        $this->db->where('FKJSCOD', $_oFKJSZZZ);
        $this->db->order_by('FKJSCOD', 'asc');
        $_queKJSTOR = $this->db->get();

        foreach ($_queKJSTOR->result_array() as $_oRow) {
            $_oFLABELZ = $_oRow['FLABELZ'];
        }


        if ($_oMod == 'exprps') {

            $_objPHPSpreadSheet = new Spreadsheet();
            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Report PPh 22');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A5:K5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));
            $_oKj1 = $_oFLABELZ;
            $_oKj2 = $_oFKJSZZZ;

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', $_objCliNme);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A2', 'TAX-ID : ' . $_oNpw);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);

            $this->db->select('FKJSZZZ, count(*) as XCOUNTZ, tkjstor.FLABELZ as XLABELZ');
            $this->db->from('ttaxhst');
            $this->db->join('tkjstor', 'ttaxhst.FKJSZZZ = tkjstor.FKJSCOD', 'LEFT');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp22'
                )
            );
            $this->db->group_by('FKJSZZZ');
            $this->db->order_by('FKJSZZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oSta = 4;

            foreach ($_quePROFLE->result_array() as $_oRow) {


                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oSta . ':K' . $_oSta);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oSta, 'Rekap PPh Pasal 22 ' . $_oRow['XLABELZ'] . ' Masa ' . $_oBln . ' ' . $_oThn . ' (' . $_oRow['FKJSZZZ'] . ')');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oSta . ':K' . $_oSta)->getFont()->setBold(true);

                $_oLin = $_oSta + 1;

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, 'No.');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('B' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, 'Tanggal');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, 'No Referensi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('D' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, 'Nama Lawan Transaksi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('E' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, 'Alamat');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('F' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, 'NPWP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('G' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, 'Keterangan');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, 'DPP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, 'Tarif Pajak');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, 'PPh 22 Terutang');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, 'Status');

                $_oBrs = 5;
                $_oNmr = 0;
                $_oSeq = 0;
                $_xDpp = 0;
                $_xNml = 0;

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FGROUPS = ' => $_oCmp,
                        'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                        'ttaxhst.FFLGTAX = ' => 'hstp22',
                        'ttaxhst.FKJSZZZ = ' => $_oRow['FKJSZZZ']
                    )
                );
                $this->db->order_by('FPROFLE', 'desc');
                $_quePROFLE = $this->db->get();

                foreach ($_quePROFLE->result_array() as $_oRow) {

                    $_oNmr++;
                    $_oLin = $_oLin + 1;

                    $_oFINVDTE = $_oRow['FINVDTE'];
                    $_oFINVNMB = $_oRow['FINVNMB'];
                    $_oFFULNME = $_oRow['FFULNME'];
                    $_oFPJKADR = $_oRow['FPJKADR'];
                    $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                    $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                    $_oFNPWPZZ = $_zFNPWPZZ[1];
                    $_xPJKDSC = $_oRow['FPJKDSC'];
                    $_xPJKDPP = $_oRow['FMSMDPB'];
                    $_xPJKTRF = $_oRow['FMSMTRF'];
                    $_xPJKNML = $_oRow['FMSMNML'];
                    $_xSTATUS = 'Potong';

                    $_oInv = substr($_oFINVDTE, 6, 2) . '/' . substr($_oFINVDTE, 4, 2) . '/' . substr($_oFINVDTE, 0, 4);
                    $_oRef = $_oFINVNMB;
                    $_oCl2 = $_oFFULNME;
                    $_oAdr = $_oFPJKADR;
                    $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                    $_oDsc = $_xPJKDSC;
                    $_oDpp = $_xPJKDPP;
                    $_oTrf = $_xPJKTRF;
                    $_oNml = $_xPJKNML;
                    $_oSts = $_xSTATUS;

                    $_oBdr = array(
                        'borders' => array(
                            'allBorders' => array(
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => array('argb' => 'bfbfbf'),
                            ),
                        ),
                    );
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);

                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_oInv);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oRef);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_oCl2);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oAdr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oNpw);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_oDsc);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oDpp);
                    $_xDpp = $_xDpp + $_oDpp;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oTrf . ' %');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oNml);
                    $_xNml = $_xNml + $_oNml;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oSts);

                    $_oSta = $_oSta + 1;
                }

                $_oBrx = $_oLin + 1;
                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oBrx . ':G' . $_oBrx);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':G' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':K' . $_oBrx)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrx, '(Total)');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrx, $_xDpp);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oBrx, $_xNml);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getFont()->setBold(true);

                $_oSta = $_oSta + 4;
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPh22_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }


        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData PPh 22');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:F2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3333FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:P2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9999FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF8400');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1:X2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC896');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'FFFFFF'),
                    ),
                ),
            );

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('L1:P1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('Q1:S1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('T1:X1');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "Periode\n<YYYY-MM>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);


            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama Lawan Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Uraian Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'INVOICE');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', 'FAKTUR PAJAK');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q1', 'PEMBAYARAN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R2', 'Nilai (Rp.)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S2', 'Keterangan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T1', 'REVIEW MSM CONSULTING');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T2', 'DPP (Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U2', 'DPP (Non-Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V2', 'Kode Jenis Setoran');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W2', 'Tarif Pajak');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X2', 'PPH YMHD');

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp22',
                )
            );
            $this->db->order_by('FPROFLE', 'desc');
            $_quePROFLE = $this->db->get();

            $_oLin = 2;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oNmr++;
                $_oLin = $_oLin + 1;

                $_oFPERIOD = $_oRow['FPERIOD'];
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];
                $_oFPJKADR = $_oRow['FPJKADR'];
                $_oFPJKDSC = $_oRow['FPJKDSC'];
                $_oFINVDTE = $_oRow['FINVDTE'];
                $_oFINVNMB = $_oRow['FINVNMB'];
                $_oFINVDPP = $_oRow['FINVDPP'];
                $_oFINVPPN = $_oRow['FINVPPN'];
                $_oFINVDPN = $_oRow['FINVDPN'];
                $_oFFKTDTE = $_oRow['FFKTDTE'];
                $_oFFKTNMB = $_oRow['FFKTNMB'];
                $_oFFKTDPP = $_oRow['FFKTDPP'];
                $_oFFKTPPN = $_oRow['FFKTPPN'];
                $_oFFKTDPN = $_oRow['FFKTDPN'];
                $_oFBYRDTE = $_oRow['FBYRDTE'];
                $_oFBYRNML = $_oRow['FBYRNML'];
                $_oFBYRDSC = $_oRow['FBYRDSC'];
                $_oFMSMDPB = $_oRow['FMSMDPB'];
                $_oFMSMDPJ = $_oRow['FMSMDPJ'];
                $_oFKJSZZZ = $_oRow['FKJSZZZ'];
                $_oFMSMTRF = $_oRow['FMSMTRF'];
                $_oFMSMNML = $_oRow['FMSMNML'];

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':X' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                $_xPrd = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xPrd->createText($_oFPERIOD);
                $_xPrd = substr($_xPrd, 0, 4) . '-' . substr($_xPrd, 4, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_xPrd);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oFFULNME);
                $_xNpw = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xNpw->createText($_oFNPWPZZ);
                $_xNpw = substr($_xNpw, 0, 2) . '.' . substr($_xNpw, 2, 3) . '.' . substr($_xNpw, 5, 3) . '.' . substr($_xNpw, 8, 1) . '-' . substr($_xNpw, 9, 3) . '.' . substr($_xNpw, 12, 3);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_xNpw);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oFPJKADR);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oFPJKDSC);
                $_xInv = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xInv->createText($_oFINVDTE);
                $_xInv = substr($_xInv, 0, 4) . '-' . substr($_xInv, 4, 2) . '-' . substr($_xInv, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_xInv);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oFINVNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oFINVDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oFINVPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oFINVDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xFkt = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xFkt->createText($_oFFKTDTE);
                $_xFkt = substr($_xFkt, 0, 4) . '-' . substr($_xFkt, 4, 2) . '-' . substr($_xFkt, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L' . $_oLin, $_xFkt);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M' . $_oLin, $_oFFKTNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N' . $_oLin, $_oFFKTDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('N' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O' . $_oLin, $_oFFKTPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('O' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P' . $_oLin, $_oFFKTDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('P' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xByr = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xByr->createText($_oFBYRDTE);
                $_xByr = substr($_xByr, 0, 4) . '-' . substr($_xByr, 4, 2) . '-' . substr($_xByr, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q' . $_oLin, $_xByr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R' . $_oLin, $_oFBYRNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('R' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S' . $_oLin, $_oFBYRDSC);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T' . $_oLin, $_oFMSMDPB);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('T' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U' . $_oLin, $_oFMSMDPJ);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('U' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V' . $_oLin, $_oFKJSZZZ);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W' . $_oLin, $_oFMSMTRF . '%');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X' . $_oLin, $_oFMSMNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('X' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                $_oSta = $_oSta + 1;
            }


            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_PPh22_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age = 0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR010()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);

        $_cmpFRECNMB = $this->uri->segment(4);
        $_cmpFCODEZZ = $this->uri->segment(5);
        $_actFRECNMB = $this->uri->segment(6);
        $_actFCODEZZ = $this->uri->segment(7);

        $_varXPROCES = $this->uri->segment(8);
        $_varXRECNMB = $this->uri->segment(9);
        $_varXCORREC = $this->uri->segment(10);

        $_oFle = $this->uri->segment(11);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH23Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';


        if ($_oMod == 'c23lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC23LST'] = $this->DomUSERZZ->mfcACTUSR010();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR010'] = 'c23lst';
        }

        if ($_oMod == 'c23viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC23VIW'] = $this->DomUSERZZ->mfcACTUSR010();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR010'] = 'c23viw';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR010();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR010'] = 'prdadd';
        }

        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR010'] = 'prdsve';
        }

        if ($_oMod == 'c23smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC23SMR'] = $this->DomUSERZZ->mfcACTUSR010();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'viw') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC23SMR'] = $this->DomUSERZZ->mfcACTUSR010();
                $_objCONTEN['_tblC23VIW'] = $this->DomUSERZZ->mfcACTUSR010();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC23SMR'] = $this->DomUSERZZ->mfcACTUSR010();
                $_objCONTEN['_tblC23EDT'] = $this->DomUSERZZ->mfcACTUSR010();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'add') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC23SMR'] = $this->DomUSERZZ->mfcACTUSR010();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'sve') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'del') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR010'] = 'c23smr';
        }

        if (($_oMod == 'c23smr') && ($_varXPROCES == 'sndeml')) {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC23SMR'] = $this->DomUSERZZ->mfcACTUSR010();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPh23 Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPh23</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPh23</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR010'] = 'c23eml';
        }
        if ($_oMod == 'c23imp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };

            if (($_varXPROCES == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/p23/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/p23/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                        $_objCONTEN['KATAKBENJUT'] = $this->input->post('_finFPERIOD');
                        $_objCONTEN['KATAKPITAKZ'] = $this->input->post('_finFREVISI');
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }


            if (($_varXPROCES == '_impFPROGRE') && (!empty($_oFle))) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR010();

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/p23/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }


            $_objCONTEN['_swiUSR010'] = 'c23imp';
        }

        if ($_oMod == 'c232st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC232ST'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR010'] = 'c232st';
        }

        if ($_oMod == 'c232mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC232MR'] = $this->DomUSERZZ->mfcACTUSR010();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $_objCONTEN['_swiUSR010'] = 'c232mr';
        }

        if ($_oMod == 'c23cor') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();
        }

        if ($_oMod == 'c232pr') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR010();
        }

        if ($_oMod == 'h232st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 23' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR010'] = 'h232st';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR010()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);

        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }


        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp23');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
        }


        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp23'
            )
        );
        $this->db->group_by('FKJSZZZ', 'asc');
        $this->db->order_by('FKJSZZZ', 'asc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oFKJSZZZ = $_oRow['FKJSZZZ'];
        }


        $this->db->select('*');
        $this->db->from('tkjstor');
        $this->db->where(
            array(
                'FKJSCOD = ' => $_oFKJSZZZ
            )
        );
        $this->db->order_by('FKJSCOD', 'asc');
        $_queKJSTOR = $this->db->get();

        foreach ($_queKJSTOR->result_array() as $_oRow) {
            $_oFLABELZ = $_oRow['FLABELZ'];
        }

        if ($_oMod == 'exprps') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Report PPh 23');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A5:K5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A5:K5')->applyFromArray($_oBdr);

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));
            $_oKj1 = $_oFLABELZ;
            $_oKj2 = $_oFKJSZZZ;

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', $_objCliNme);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A2', 'TAX-ID : ' . $_oNpw);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);

            $this->db->select('FKJSZZZ, count(*) as XCOUNTZ, tkjstor.FLABELZ as XLABELZ');
            $this->db->from('ttaxhst');
            $this->db->join('tkjstor', 'ttaxhst.FKJSZZZ = tkjstor.FKJSCOD', 'LEFT');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp23'
                )
            );
            $this->db->group_by('FKJSZZZ');
            $this->db->order_by('FKJSZZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oSta = 4;

            foreach ($_quePROFLE->result_array() as $_oRow) {


                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oSta . ':K' . $_oSta);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oSta, 'Rekap PPh Pasal 23 ' . $_oRow['XLABELZ'] . ' Masa ' . $_oBln . ' ' . $_oThn . ' (' . $_oRow['FKJSZZZ'] . ')');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oSta)->getFont()->setBold(true);

                $_oLin = $_oSta + 1;

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);


                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, 'No.');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('B' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, 'Tanggal');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, 'No Referensi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('D' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, 'Nama Lawan Transaksi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('E' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, 'Alamat');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('F' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, 'NPWP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('G' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, 'Keterangan');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, 'DPP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, 'Tarif Pajak');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, 'PPh 23 Terutang');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, 'Status');

                $_oBrs = 5;
                $_oSeq = 0;
                $_xDpp = 0;
                $_xNml = 0;
                $_oNmr = 0;

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FGROUPS = ' => $_oCmp,
                        'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                        'ttaxhst.FFLGTAX = ' => 'hstp23',
                        'ttaxhst.FKJSZZZ = ' => $_oRow['FKJSZZZ']
                    )
                );
                $this->db->order_by('FPROFLE', 'asc');
                $_quePROFLE = $this->db->get();

                foreach ($_quePROFLE->result_array() as $_oRow) {

                    $_oNmr++;
                    $_oLin = $_oLin + 1;

                    $_oFINVDTE = $_oRow['FINVDTE'];
                    $_oFINVNMB = $_oRow['FINVNMB'];
                    $_oFFULNME = $_oRow['FFULNME'];
                    $_oFPJKADR = $_oRow['FPJKADR'];
                    $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                    $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                    $_oFNPWPZZ = $_zFNPWPZZ[1];
                    $_xPJKDSC = $_oRow['FPJKDSC'];
                    $_xPJKDPP = $_oRow['FMSMDPJ'];
                    $_xPJKTRF = $_oRow['FMSMTRF'];
                    $_xPJKNML = $_oRow['FMSMNML'];
                    $_xSTATUS = 'Potong';

                    $_oInv = substr($_oFINVDTE, 6, 2) . '/' . substr($_oFINVDTE, 4, 2) . '/' . substr($_oFINVDTE, 0, 4);
                    $_oRef = $_oFINVNMB;
                    $_oCl2 = $_oFFULNME;
                    $_oAdr = $_oFPJKADR;
                    $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                    $_oDsc = $_xPJKDSC;
                    $_oDpp = $_xPJKDPP;
                    $_oTrf = $_xPJKTRF;
                    $_oNml = $_xPJKNML;
                    $_oSts = $_xSTATUS;

                    $_oBdr = array(
                        'borders' => array(
                            'allBorders' => array(
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => array('argb' => 'bfbfbf'),
                            ),
                        ),
                    );
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);

                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_oInv);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oRef);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_oCl2);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oAdr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oNpw);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_oDsc);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oDpp);
                    $_xDpp = $_xDpp + $_oDpp;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oTrf . ' %');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oNml);
                    $_xNml = $_xNml + $_oNml;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oSts);

                    $_oSta = $_oSta + 1;
                }

                $_oBrx = $_oLin + 1;
                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oBrx . ':G' . $_oBrx);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':G' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':K' . $_oBrx)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrx, '(Total)');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrx, $_xDpp);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oBrx, $_xNml);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getFont()->setBold(true);


                $_oSta = $_oSta + 4;
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPh23_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }

        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData PPh 23');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:F2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3333FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:P2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9999FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF8400');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1:X2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC896');


            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'ffffff'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('L1:P1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('Q1:S1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('T1:X1');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "Periode\n<YYYY-MM>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama Lawan Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Uraian Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'INVOICE');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', 'FAKTUR PAJAK');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q1', 'PEMBAYARAN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R2', 'Nilai (Rp.)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S2', 'Keterangan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T1', 'REVIEW MSM CONSULTING');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T2', 'DPP (Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U2', 'DPP (Non-Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V2', 'Kode Jenis Setoran');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W2', 'Tarif Pajak');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X2', 'PPH YMHD');


            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp23',
                )
            );
            $this->db->order_by('FPROFLE', 'desc');
            $_quePROFLE = $this->db->get();

            $_oLin = 2;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oNmr++;
                $_oLin = $_oLin + 1;

                $_oFPERIOD = $_oRow['FPERIOD'];
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];
                $_oFPJKADR = $_oRow['FPJKADR'];
                $_oFPJKDSC = $_oRow['FPJKDSC'];
                $_oFINVDTE = $_oRow['FINVDTE'];
                $_oFINVNMB = $_oRow['FINVNMB'];
                $_oFINVDPP = $_oRow['FINVDPP'];
                $_oFINVPPN = $_oRow['FINVPPN'];
                $_oFINVDPN = $_oRow['FINVDPN'];
                $_oFFKTDTE = $_oRow['FFKTDTE'];
                $_oFFKTNMB = $_oRow['FFKTNMB'];
                $_oFFKTDPP = $_oRow['FFKTDPP'];
                $_oFFKTPPN = $_oRow['FFKTPPN'];
                $_oFFKTDPN = $_oRow['FFKTDPN'];
                $_oFBYRDTE = $_oRow['FBYRDTE'];
                $_oFBYRNML = $_oRow['FBYRNML'];
                $_oFBYRDSC = $_oRow['FBYRDSC'];
                $_oFMSMDPB = $_oRow['FMSMDPB'];
                $_oFMSMDPJ = $_oRow['FMSMDPJ'];
                $_oFKJSZZZ = $_oRow['FKJSZZZ'];
                $_oFMSMTRF = $_oRow['FMSMTRF'];
                $_oFMSMNML = $_oRow['FMSMNML'];


                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':X' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                $_xPrd = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xPrd->createText($_oFPERIOD);
                $_xPrd = substr($_xPrd, 0, 4) . '-' . substr($_xPrd, 4, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_xPrd);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oFFULNME);
                $_xNpw = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xNpw->createText($_oFNPWPZZ);
                $_xNpw = substr($_xNpw, 0, 2) . '.' . substr($_xNpw, 2, 3) . '.' . substr($_xNpw, 5, 3) . '.' . substr($_xNpw, 8, 1) . '-' . substr($_xNpw, 9, 3) . '.' . substr($_xNpw, 12, 3);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_xNpw);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oFPJKADR);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oFPJKDSC);
                $_xInv = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xInv->createText($_oFINVDTE);
                $_xInv = substr($_xInv, 0, 4) . '-' . substr($_xInv, 4, 2) . '-' . substr($_xInv, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_xInv);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oFINVNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oFINVDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oFINVPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oFINVDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xFkt = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xFkt->createText($_oFFKTDTE);
                $_xFkt = substr($_xFkt, 0, 4) . '-' . substr($_xFkt, 4, 2) . '-' . substr($_xFkt, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L' . $_oLin, $_xFkt);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M' . $_oLin, $_oFFKTNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N' . $_oLin, $_oFFKTDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('N' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O' . $_oLin, $_oFFKTPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('O' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P' . $_oLin, $_oFFKTDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('P' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xByr = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xByr->createText($_oFBYRDTE);
                $_xByr = substr($_xByr, 0, 4) . '-' . substr($_xByr, 4, 2) . '-' . substr($_xByr, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q' . $_oLin, $_xByr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R' . $_oLin, $_oFBYRNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('R' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S' . $_oLin, $_oFBYRDSC);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T' . $_oLin, $_oFMSMDPB);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('T' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U' . $_oLin, $_oFMSMDPJ);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('U' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V' . $_oLin, $_oFKJSZZZ);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W' . $_oLin, $_oFMSMTRF . '%');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X' . $_oLin, $_oFMSMNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('X' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                $_oSta = $_oSta + 1;
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_PPh23_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR011()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_varXPROCES = $this->uri->segment(8);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH42Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'c42lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC42LST'] = $this->DomUSERZZ->mfcACTUSR011();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR011'] = 'c42lst';
        }

        if ($_oMod == 'c42viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC42VIW'] = $this->DomUSERZZ->mfcACTUSR011();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR011'] = 'c42viw';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR011();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR011'] = 'prdadd';
        }

        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR011'] = 'prdsve';
        }

        if ($_oMod == 'c42smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC42SMR'] = $this->DomUSERZZ->mfcACTUSR011();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'viw') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC42SMR'] = $this->DomUSERZZ->mfcACTUSR011();
                $_objCONTEN['_tblC42VIW'] = $this->DomUSERZZ->mfcACTUSR011();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC42SMR'] = $this->DomUSERZZ->mfcACTUSR011();
                $_objCONTEN['_tblC42EDT'] = $this->DomUSERZZ->mfcACTUSR011();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'add') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC42SMR'] = $this->DomUSERZZ->mfcACTUSR011();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'sve') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'del') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR011'] = 'c42smr';
        }

        if (($_oMod == 'c42smr') && ($_varXPROCES == 'sndeml')) {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC22SMR'] = $this->DomUSERZZ->mfcACTUSR009();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 42' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 42' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 42' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPh4(2) Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPh4(2)</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPh4(2)</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR011'] = 'c42eml';
        }
        if ($_oMod == 'c42imp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/p42/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);



                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/p42/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                        $_objCONTEN['KATAKBENJUT'] = $this->input->post('_finFPERIOD');
                        $_objCONTEN['KATAKPITAKZ'] = $this->input->post('_finFREVISI');
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }


            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR011();

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/p42/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }

            $_objCONTEN['_swiUSR011'] = 'c42imp';
        }

        if ($_oMod == 'c422st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC422ST'] = $this->DomUSERZZ->mfcACTUSR011();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR011'] = 'c422st';
        }

        if ($_oMod == 'c422mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC422MR'] = $this->DomUSERZZ->mfcACTUSR011();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $_objCONTEN['_swiUSR011'] = 'c422mr';
        }

        if ($_oMod == 'c42cor') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();
        }

        if ($_oMod == 'c422pr') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR011();
        }

        if ($_oMod == 'h422st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 4(2)' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR011'] = 'h422st';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR011()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);
        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp42');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp42'
            )
        );
        $this->db->group_by('FKJSZZZ', 'asc');
        $this->db->order_by('FKJSZZZ', 'asc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oFKJSZZZ = $_oRow['FKJSZZZ'];
        }

        $this->db->select('*');
        $this->db->from('tkjstor');
        $this->db->where(
            array(
                'FKJSCOD = ' => $_oFKJSZZZ
            )
        );
        $this->db->order_by('FKJSCOD', 'asc');
        $_queKJSTOR = $this->db->get();

        foreach ($_queKJSTOR->result_array() as $_oRow) {
            $_oFLABELZ = $_oRow['FLABELZ'];
        }

        if ($_oMod == 'expxl4') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Info PPh 4(2)');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A5:K5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A5:K5')->applyFromArray($_oBdr);

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', $_objCliNme);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A2', 'TAX-ID : ' . $_oNpw);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);

            $this->db->select('FKJSZZZ, count(*) as XCOUNTZ, tkjstor.FLABELZ as XLABELZ');
            $this->db->from('ttaxhst');
            $this->db->join('tkjstor', 'ttaxhst.FKJSZZZ = tkjstor.FKJSCOD', 'LEFT');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp42'
                )
            );
            $this->db->group_by('FKJSZZZ');
            $this->db->order_by('FKJSZZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oSta = 4;

            foreach ($_quePROFLE->result_array() as $_oRow) {


                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oSta . ':K' . $_oSta);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oSta, 'Rekap PPh Pasal 4(2) ' . $_oRow['XLABELZ'] . ' Masa ' . $_oBln . ' ' . $_oThn . ' (' . $_oRow['FKJSZZZ'] . ')');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oSta)->getFont()->setBold(true);

                $_oLin = $_oSta + 1;

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, 'No.');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('B' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, 'Tanggal');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, 'No Referensi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('D' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, 'Nama Lawan Transaksi');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('E' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, 'Alamat');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('F' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, 'NPWP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('G' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, 'Keterangan');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, 'DPP');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, 'Tarif Pajak');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, 'PPh 4(2) Terutang');

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, 'Status');

                $_oBrs = 5;
                $_oNmr = 0;
                $_oSeq = 0;
                $_xDpp = 0;
                $_xNml = 0;

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FGROUPS = ' => $_oCmp,
                        'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                        'ttaxhst.FFLGTAX = ' => 'hstp42',
                        'ttaxhst.FKJSZZZ = ' => $_oRow['FKJSZZZ']
                    )
                );
                $this->db->order_by('FPROFLE', 'desc');
                $_quePROFLE = $this->db->get();

                foreach ($_quePROFLE->result_array() as $_oRow) {

                    $_oNmr++;
                    $_oLin = $_oLin + 1;

                    $_oFINVDTE = $_oRow['FINVDTE'];
                    $_oFINVNMB = $_oRow['FINVNMB'];
                    $_oFFULNME = $_oRow['FFULNME'];
                    $_oFPJKADR = $_oRow['FPJKADR'];
                    $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                    $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                    $_oFNPWPZZ = $_zFNPWPZZ[1];
                    $_xPJKDSC = $_oRow['FPJKDSC'];
                    $_xPJKDPP = $_oRow['FMSMDPJ'];
                    $_xPJKTRF = $_oRow['FMSMTRF'];
                    $_xPJKNML = $_oRow['FMSMNML'];
                    $_xSTATUS = 'Potong';

                    $_oInv = substr($_oFINVDTE, 6, 2) . '/' . substr($_oFINVDTE, 4, 2) . '/' . substr($_oFINVDTE, 0, 4);
                    $_oRef = $_oFINVNMB;
                    $_oCl2 = $_oFFULNME;
                    $_oAdr = $_oFPJKADR;
                    $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                    $_oDsc = $_xPJKDSC;
                    $_oDpp = $_xPJKDPP;
                    $_oTrf = $_xPJKTRF;
                    $_oNml = $_xPJKNML;
                    $_oSts = $_xSTATUS;

                    $_oBdr = array(
                        'borders' => array(
                            'allBorders' => array(
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => array('argb' => 'bfbfbf'),
                            ),
                        ),
                    );
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':K' . $_oLin)->applyFromArray($_oBdr);

                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_oInv);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oRef);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_oCl2);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oAdr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oNpw);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_oDsc);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oDpp);
                    $_xDpp = $_xDpp + $_oDpp;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oTrf . ' %');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oNml);
                    $_xNml = $_xNml + $_oNml;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oSts);

                    $_oSta = $_oSta + 1;
                }

                $_oBrx = $_oLin + 1;
                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oBrx . ':G' . $_oBrx);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':G' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':K' . $_oBrx)->applyFromArray($_oBdr);




                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrx, '(Total)');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getFont()->setBold(true);


                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrx, $_xDpp);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getFont()->setBold(true);


                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oBrx, $_xNml);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getFont()->setBold(true);

                $_oSta = $_oSta + 4;
            }
            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPh42_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }

        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData PPh 42');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:F2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3333FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1:P2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9999FF');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF8400');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1:X2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC896');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'ffffff'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X1')->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:X2')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('L1:P1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('Q1:S1');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('T1:X1');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "Periode\n<YYYY-MM>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama Lawan Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Uraian Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'INVOICE');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', 'FAKTUR PAJAK');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M2', 'Nomor');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N2', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('O2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O2', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('P2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P2', 'DPP + PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q1', 'PEMBAYARAN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q2', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('Q2')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('R2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R2', 'Nilai (Rp.)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('S2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S2', 'Keterangan');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T1', 'REVIEW MSM CONSULTING');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('T2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T2', 'DPP (Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('U2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U2', 'DPP (Non-Barang)');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('V2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V2', 'Kode Jenis Setoran');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('W2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W2', 'Tarif Pajak');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('X2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X2', 'PPH YMHD');


            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp42',
                )
            );
            $this->db->order_by('FPROFLE', 'desc');
            $_quePROFLE = $this->db->get();

            $_oLin = 2;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oNmr++;
                $_oLin = $_oLin + 1;

                $_oFPERIOD = $_oRow['FPERIOD'];
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];
                $_oFPJKADR = $_oRow['FPJKADR'];
                $_oFPJKDSC = $_oRow['FPJKDSC'];
                $_oFINVDTE = $_oRow['FINVDTE'];
                $_oFINVNMB = $_oRow['FINVNMB'];
                $_oFINVDPP = $_oRow['FINVDPP'];
                $_oFINVPPN = $_oRow['FINVPPN'];
                $_oFINVDPN = $_oRow['FINVDPN'];
                $_oFFKTDTE = $_oRow['FFKTDTE'];
                $_oFFKTNMB = $_oRow['FFKTNMB'];
                $_oFFKTDPP = $_oRow['FFKTDPP'];
                $_oFFKTPPN = $_oRow['FFKTPPN'];
                $_oFFKTDPN = $_oRow['FFKTDPN'];
                $_oFBYRDTE = $_oRow['FBYRDTE'];
                $_oFBYRNML = $_oRow['FBYRNML'];
                $_oFBYRDSC = $_oRow['FBYRDSC'];
                $_oFMSMDPB = $_oRow['FMSMDPB'];
                $_oFMSMDPJ = $_oRow['FMSMDPJ'];
                $_oFKJSZZZ = $_oRow['FKJSZZZ'];
                $_oFMSMTRF = $_oRow['FMSMTRF'];
                $_oFMSMNML = $_oRow['FMSMNML'];


                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':X' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                $_xPrd = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xPrd->createText($_oFPERIOD);
                $_xPrd = substr($_xPrd, 0, 4) . '-' . substr($_xPrd, 4, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_xPrd);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oFFULNME);
                $_xNpw = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xNpw->createText($_oFNPWPZZ);
                $_xNpw = substr($_xNpw, 0, 2) . '.' . substr($_xNpw, 2, 3) . '.' . substr($_xNpw, 5, 3) . '.' . substr($_xNpw, 8, 1) . '-' . substr($_xNpw, 9, 3) . '.' . substr($_xNpw, 12, 3);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_xNpw);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oFPJKADR);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oFPJKDSC);
                $_xInv = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xInv->createText($_oFINVDTE);
                $_xInv = substr($_xInv, 0, 4) . '-' . substr($_xInv, 4, 2) . '-' . substr($_xInv, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_xInv);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oFINVNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oFINVDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oFINVPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oFINVDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xFkt = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xFkt->createText($_oFFKTDTE);
                $_xFkt = substr($_xFkt, 0, 4) . '-' . substr($_xFkt, 4, 2) . '-' . substr($_xFkt, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L' . $_oLin, $_xFkt);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M' . $_oLin, $_oFFKTNMB);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N' . $_oLin, $_oFFKTDPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('N' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('O' . $_oLin, $_oFFKTPPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('O' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('P' . $_oLin, $_oFFKTDPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('P' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_xByr = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xByr->createText($_oFBYRDTE);
                $_xByr = substr($_xByr, 0, 4) . '-' . substr($_xByr, 4, 2) . '-' . substr($_xByr, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('Q' . $_oLin, $_xByr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('R' . $_oLin, $_oFBYRNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('R' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('S' . $_oLin, $_oFBYRDSC);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('T' . $_oLin, $_oFMSMDPB);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('T' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('U' . $_oLin, $_oFMSMDPJ);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('U' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('V' . $_oLin, $_oFKJSZZZ);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('W' . $_oLin, $_oFMSMTRF . '%');
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('X' . $_oLin, $_oFMSMNML);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('X' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                $_oSta = $_oSta + 1;
            }


            foreach (range('A', 'X') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_PPh42_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR012()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_varXPROCES = $this->uri->segment(8);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPH25Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';


        if ($_oMod == 'c25lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC25LST'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR012'] = 'c25lst';
        }

        if ($_oMod == 'c25viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC25VIW'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR012'] = 'c25viw';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR012'] = 'prdadd';
        }


        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR012'] = 'prdsve';
        }

        if ($_oMod == 'c25smr') {


            if ((empty($_varXPROCES)) || (strlen(trim($_varXPROCES)) == 4)) {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC25SMR'] = $this->DomUSERZZ->mfcACTUSR012();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'viw') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC25SMR'] = $this->DomUSERZZ->mfcACTUSR012();
                $_objCONTEN['_tblC25VIW'] = $this->DomUSERZZ->mfcACTUSR012();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'edt') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC25SMR'] = $this->DomUSERZZ->mfcACTUSR012();
                $_objCONTEN['_tblC25EDT'] = $this->DomUSERZZ->mfcACTUSR012();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'upd') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'add') {

                $this->load->model("DomUSERZZ");
                $_objCONTEN['_tblC25SMR'] = $this->DomUSERZZ->mfcACTUSR012();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
                };
            }

            if ($_varXPROCES == 'sve') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            if ($_varXPROCES == 'del') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Ditambahkan</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Company Profile' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . ' <font color = "#ff0000">Error, Duplicate Record</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Client' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Data' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Profil Perusahaan' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . ' <font color = "#ff0000">Gagal, Data Duplikat</font>' . ')';
                    }

                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
            }

            $_objCONTEN['_swiUSR012'] = 'c25smr';
        }


        if ($_oMod == 'c252st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC252ST'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR012'] = 'c252st';
        }


        if ($_oMod == 'c252mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC252MR'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };


            $_objCONTEN['_swiUSR012'] = 'c252mr';
        }


        if (($_oMod == 'c25smr') && ($_varXPROCES == 'sndeml')) {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC25SMR'] = $this->DomUSERZZ->mfcACTUSR012();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;

            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPh25 Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPh25</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPh25</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR012'] = 'c25eml';
        }

        if ($_oMod == 'c25cor') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();
        }

        if ($_oMod == 'c252pr') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR012();
        }

        if ($_oMod == 'h252st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC212ST'] = $this->DomUSERZZ->mfcACTUSR008();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Pph 25' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR012'] = 'h252st';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR012()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);
        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }

        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp25');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
        }


        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp25'
            )
        );
        $this->db->group_by('FKJSZZZ', 'asc');
        $this->db->order_by('FKJSZZZ', 'asc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oFKJSZZZ = $_oRow['FKJSZZZ'];
        }


        $this->db->select('*');
        $this->db->from('tkjstor');
        $this->db->where(
            array(
                'FKJSCOD = ' => $_oFKJSZZZ
            )
        );
        $this->db->order_by('FKJSCOD', 'asc');
        $_queKJSTOR = $this->db->get();

        foreach ($_queKJSTOR->result_array() as $_oRow) {
            $_oFLABELZ = $_oRow['FLABELZ'];
        }

        echo json_encode($_oFLABELZ);


        if ($_oMod == 'expxl5') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Info PPh 25');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oFPERIOD));
            $_oBln = trim(substr($_xPrd, 0, strlen($_xPrd) - 5));
            $_oThn = trim(substr($_xPrd, strlen($_xPrd) - 4, 4));

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:J1');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', $_objCliNme);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A2:J2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A2', 'TAX-ID : ' . $_oNpw);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);

            $this->db->select('FKJSZZZ, count(*) as XCOUNTZ');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp25'
                )
            );
            $this->db->group_by('FKJSZZZ');
            $this->db->order_by('FKJSZZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oSta = 4;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oSta . ':J' . $_oSta);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oSta, 'Rekap PPh Pasal 25 ' . ' Masa ' . $_oBln . ' ' . $_oThn . ' (' . $_oRow['FKJSZZZ'] . ')');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oSta)->getFont()->setBold(true);

                $_oLin = $_oSta + 1;

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':J' . $_oLin)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':J' . $_oLin)->applyFromArray($_oBdr);
                $_oCA1 = 0;
                $_oCB1 = 0;
                $_oCC1 = 0;
                $_oCD1 = 0;
                $_oCE1 = 0;
                $_oCF1 = 0;
                $_oCG1 = 0;
                $_oCH1 = 0;
                $_oCI1 = 0;
                $_oCJ1 = 0;

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, 'No.');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('A' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCA1) {
                    $_oCA1 = $_oWid;
                } elseif ($_oCA1 <= $_oWid) {
                    $_oCA1 = $_oCA1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('A')->setWidth($_oCA1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('B' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, 'Tanggal');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCB1) {
                    $_oCB1 = $_oWid;
                } elseif ($_oCB1 <= $_oWid) {
                    $_oCB1 = $_oCB1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('B')->setWidth($_oCB1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, 'No Referensi');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('C' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCC1) {
                    $_oCC1 = $_oWid;
                } elseif ($_oCC1 <= $_oWid) {
                    $_oCC1 = $_oCC1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('C')->setWidth($_oCC1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('D' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, 'Nama Lawan Transaksi');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('D' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCD1) {
                    $_oCD1 = $_oWid;
                } elseif ($_oCD1 <= $_oWid) {
                    $_oCD1 = $_oCD1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('D')->setWidth($_oCD1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('E' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, 'Alamat');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('E' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCE1) {
                    $_oCE1 = $_oWid;
                } elseif ($_oCE1 <= $_oWid) {
                    $_oCE1 = $_oCE1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('E')->setWidth($_oCE1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('F' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, 'NPWP');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('F' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCF1) {
                    $_oCF1 = $_oWid;
                } elseif ($_oCF1 <= $_oWid) {
                    $_oCF1 = $_oCF1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('F')->setWidth($_oCF1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('G' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, 'Keterangan');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('G' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCG1) {
                    $_oCG1 = $_oWid;
                } elseif ($_oCG1 <= $_oWid) {
                    $_oCG1 = $_oCG1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('G')->setWidth($_oCG1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, 'PPh');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('H' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCH1) {
                    $_oCH1 = $_oWid;
                } elseif ($_oCH1 <= $_oWid) {
                    $_oCH1 = $_oCH1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('H')->setWidth($_oCH1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, 'DTP');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('I' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCI1) {
                    $_oCI1 = $_oWid;
                } elseif ($_oCI1 <= $_oWid) {
                    $_oCI1 = $_oCI1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('I')->setWidth($_oCI1 + 2.65);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, 'PPh YHMD');
                $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('J' . $_oLin)->getValue();
                $_oWid = mb_strwidth($_oVal);
                if ($_oWid > $_oCJ1) {
                    $_oCJ1 = $_oWid;
                } elseif ($_oCJ1 <= $_oWid) {
                    $_oCJ1 = $_oCJ1;
                }
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension('J')->setWidth($_oCJ1 + 2.65);

                $_oBrs = 5;
                $_oSeq = 0;
                $_xNml = 0;
                $_oNmr = 0;
                $_xDpj = 0;
                $_xDtp = 0;

                $this->db->select('*');
                $this->db->from('ttaxhst');
                $this->db->where(
                    array(
                        'ttaxhst.FGROUPS = ' => $_oCmp,
                        'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                        'ttaxhst.FFLGTAX = ' => 'hstp25',
                        'ttaxhst.FKJSZZZ = ' => $_oRow['FKJSZZZ']
                    )
                );
                $this->db->order_by('FPROFLE', 'desc');
                $_quePROFLE = $this->db->get();

                foreach ($_quePROFLE->result_array() as $_oRow) {

                    $_oNmr++;
                    $_oLin = $_oLin + 1;
                    $_oFINVDTE = $_oRow['FINVDTE'];
                    $_oFINVNMB = $_oRow['FINVNMB'];
                    $_oFFULNME = $_oRow['FFULNME'];
                    $_oFPJKADR = $_oRow['FPJKADR'];
                    $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                    $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                    $_oFNPWPZZ = $_zFNPWPZZ[1];
                    $_xPJKDSC = $_oRow['FPJKDSC'];
                    $_xMSMDPJ = $_oRow['FMSMDPJ'];
                    $_xDTPZZZ = $_oRow['FDTPZZZ'];
                    $_xPJKNML = $_oRow['FMSMNML'];

                    $_oInv = substr($_oFINVDTE, 6, 2) . '/' . substr($_oFINVDTE, 4, 2) . '/' . substr($_oFINVDTE, 0, 4);
                    $_oRef = $_oFINVNMB;
                    $_oCl2 = $_oFFULNME;
                    $_oAdr = $_oFPJKADR;
                    $_oNpw = substr($_oFNPWPZZ, 0, 2) . '.' . substr($_oFNPWPZZ, 2, 3) . '.' . substr($_oFNPWPZZ, 5, 3) . '.' . substr($_oFNPWPZZ, 8, 1) . '-' . substr($_oFNPWPZZ, 9, 3) . '.' . substr($_oFNPWPZZ, 12, 3);
                    $_oDsc = $_xPJKDSC;
                    $_oDpj = $_xMSMDPJ;
                    $_oDtp = $_xDTPZZZ;
                    $_oNml = $_xPJKNML;

                    $_oBdr = array(
                        'borders' => array(
                            'allBorders' => array(
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => array('argb' => 'bfbfbf'),
                            ),
                        ),
                    );
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':J' . $_oLin)->applyFromArray($_oBdr);

                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_oInv);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oRef);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_oCl2);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oAdr);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oNpw);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_oDsc);
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_oDpj);
                    $_xDpj = $_xDpj + $_oDpj;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_oDtp);
                    $_xDtp = $_xDtp + $_oDtp;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');
                    $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_oNml);
                    $_xNml = $_xNml + $_oNml;
                    $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                    $_oSta = $_oSta + 1;
                }

                $_oBrx = $_oLin + 1;
                $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A' . $_oBrx . ':G' . $_oBrx);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':G' . $_oBrx)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx . ':J' . $_oBrx)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrx, '(Total)');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oBrx, $_xDpj);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('H' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oBrx, $_xDtp);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('I' . $_oBrx)->getFont()->setBold(true);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oBrx, $_xNml);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getNumberFormat()->setFormatCode('#,##0');
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('J' . $_oBrx)->getFont()->setBold(true);

                $_oSta = $_oSta + 4;
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPh25_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR013()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);


        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeCLIENT';
        $_objCONTEN['_varICONXX'] = 'fas fa-file fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'clnlst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR013();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR013'] = 'clnlst';
        }
        if ($_oMod == 'clnadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR013();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR013'] = 'clnadd';
        }

        if ($_oMod == 'clnsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR013();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR013'] = 'clnsve';
        }

        if ($_oMod == 'clnviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR013();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR013'] = 'clnviw';
        }

        if ($_oMod == 'clnedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR013();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR013'] = 'clnedt';
        }

        if ($_oMod == 'clnupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR013();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR013'] = 'clnupd';
        }

        if ($_oMod == 'clndel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR013();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Klien' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR013'] = 'clndel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR014()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);


        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeMSMGRP';
        $_objCONTEN['_varICONXX'] = 'fas fa-file fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'msmlst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR014();


            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR014'] = 'msmlst';
        }
        if ($_oMod == 'msmadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR014();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR014'] = 'msmadd';
        }

        if ($_oMod == 'msmsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR014();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR014'] = 'msmsve';
        }

        if ($_oMod == 'msmviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR014();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR014'] = 'msmviw';
        }

        if ($_oMod == 'msmedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR014();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR014'] = 'msmedt';
        }

        if ($_oMod == 'msmupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR014();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR014'] = 'msmupd';
        }

        if ($_oMod == 'msmdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR014();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'MSM Group' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR014'] = 'msmdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR014()
    {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'expxls') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData MSM Group');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut MSM Group');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Nama MSM Group');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Alamat');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Telepon');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Faksimile');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', 'Email');

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FCATGRY', 'staffz');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FFULNME']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, str_replace('_n_', '; ', $_oRow['FADDRES']));
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, $_oRow['FTELPON']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oBrs, $_oRow['FFAXIML']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oBrs, $_oRow['FEMAILZ']);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_MSM Group_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR015()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeKLUSHA';
        $_objCONTEN['_varICONXX'] = 'fas fa-cog fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'klulst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblKLUSHA'] = $this->DomUSERZZ->mfcACTUSR015();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR015'] = 'klulst';
        }
        if ($_oMod == 'kluadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR015();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR015'] = 'kluadd';
        }

        if ($_oMod == 'klusve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR015();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR015'] = 'klusve';
        }

        if ($_oMod == 'kluviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKLUSHA'] = $this->DomUSERZZ->mfcACTUSR015();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR015'] = 'kluviw';
        }

        if ($_oMod == 'kluedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKLUSHA'] = $this->DomUSERZZ->mfcACTUSR015();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR015'] = 'kluedt';
        }

        if ($_oMod == 'kluupd') {

            $this->load->model('DomUSERZZ');
            $this->DomUSERZZ->mfcACTUSR015();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR015'] = 'kluupd';
        }

        if ($_oMod == 'kludel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR015();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'KLU' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR015'] = 'kludel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR015()
    {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'expxls') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData KLU');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:F2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:F2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut KLU');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Kode KLU');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Nama KLU');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Uraian/Penjelasan');

            $this->db->select('*');
            $this->db->from('tklucde');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FKLUCOD']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oRow['FDESCRP']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, str_replace('_n_', '; ', $_oRow['FNOTEZZ']));
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_KLU_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR016()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeKJSTOR';
        $_objCONTEN['_varICONXX'] = 'fas fa-cog fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'kjslst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblKJSTOR'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR016'] = 'kjslst';
        }
        if ($_oMod == 'kjsadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR016'] = 'kjsadd';
        }

        if ($_oMod == 'kjssve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR016();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR016'] = 'kjssve';
        }

        if ($_oMod == 'kjsviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKJSTOR'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsviw';
        }

        if ($_oMod == 'kjsedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKJSTOR'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsedt';
        }

        if ($_oMod == 'kjsupd') {

            $this->load->model('DomUSERZZ');
            $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsupd';
        }

        if ($_oMod == 'kjsdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR016();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR016'] = 'kjsdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR016()
    {

        $_oMod = $this->uri->segment(3);

        if ($_oMod == 'expxls') {

            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData Jenis Setoran');

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('E1:E2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('F1:F2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1:F2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('G1:G2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1:G2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');
            $_objCliNme = 'MSM Consulting';

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'No. Urut JS');
            $_oVal = $_objPHPSpreadSheet->getActiveSheet()->getCell('B1')->getValue();

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Kode JS');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Nama JS');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Label');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'Tarif');

            $this->db->select('*');
            $this->db->from('tkjstor');
            $this->db->order_by('FCODEZZ', 'asc');
            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FKJSCOD']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oRow['FJNSSTR']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oBrs, $_oRow['FLABELZ']);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oBrs, $_oRow['FTARIFZ']);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_Jenis Setoran_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR017()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);
        $_oUsr = $this->uri->segment(4);
        $_oPrc = $this->uri->segment(5);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeACCEZZ';
        $_objCONTEN['_varICONXX'] = 'fas fa-cog fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'acslst') {


            if ((empty($_oUsr)) || (($_oUsr == 'intnal') || ($_oUsr == 'client')) && (empty($_oPrc))) {

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Access Right' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
                };
            }
            if ((($_oUsr == 'intnal') || ($_oUsr == 'client')) && ($_oPrc == 'viw')) {

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Access Right' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
                };
            }
            if ((($_oUsr == 'intnal') || ($_oUsr == 'client')) && ($_oPrc == 'edt')) {

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Access Right' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                };
            }
            if ((($_oUsr == 'intnal') || ($_oUsr == 'client')) && ($_oPrc == 'upd')) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR017();

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Access Right' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Hak Akses' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
                };
            }

            $_objCONTEN['_swiUSR017'] = 'acslst';
        }

        if ($_oMod == 'kjsadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblCLIENT'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR016'] = 'kjsadd';
        }

        if ($_oMod == 'kjssve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR016();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR016'] = 'kjssve';
        }

        if ($_oMod == 'kjsviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKJSTOR'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsviw';
        }

        if ($_oMod == 'kjsedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblKJSTOR'] = $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsedt';
        }

        if ($_oMod == 'kjsupd') {

            $this->load->model('DomUSERZZ');
            $this->DomUSERZZ->mfcACTUSR016();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR016'] = 'kjsupd';
        }

        if ($_oMod == 'kjsdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR016();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Type of Deposit' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Jenis Setoran' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR016'] = 'kjsdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR018()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPrf = $this->uri->segment(4);
        $_oTax = $this->uri->segment(6);
        $_oPre = $this->uri->segment(8);
        $_oPrd = $this->uri->segment(9);
        $_oFle = $this->uri->segment(11);

        $_varXPROCES = $this->uri->segment(8);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeePPN00Z';
        $_objCONTEN['_varICONXX'] = 'fas fa-calculator fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';


        if ($_oMod == 'c00lst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00LST'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Client</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Klien</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'c00lst';
        }

        if ($_oMod == 'c00viw') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00LST'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Calculation' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'c00viw';
        }

        if ($_oMod == 'c002st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC002ST'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Calculation' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Perhitungan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'c002st';
        }

        if ($_oMod == 'prdadd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblPRDADD'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Periode Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Periode Baru</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'prdadd';
        }

        if ($_oMod == 'prdsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR018();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR018'] = 'prdsve';
        }

        if ($_oMod == 'c00smr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00SMR'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $_objCONTEN['_swiUSR018'] = 'c00smr';
        }

        if ($_oMod == 'c00imp') {

            $_objCONTEN['_rslFATTACH'] = '';
            $_objCONTEN['_oFlg'] = '';

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };

            if (($_oPre == '_preFPROGRE') || (isset($_POST['_preFPROGRE']))) {

                $_oFlg = 'ovr';

                if (empty($_FILES['_fleFATTACH']['name'])) {
                    $_oFlg = 'emp';
                    $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
                }

                if ((!empty($_FILES['_fleFATTACH']['name'])) && ($_FILES['_fleFATTACH']['size'] >= 1) && ($_FILES['_fleFATTACH']['size'] <= 1000000)) {
                    $_oFlg = 'ok1';
                    $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
                }

                if (($_FILES['_fleFATTACH']['size'] > 1000000) && ($_FILES['_fleFATTACH']['size'] < 2000000)) {

                    $_oFlg = 'ok2';
                    $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
                }

                if ($_oFlg == 'ovr') {
                    $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
                }

                if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                    $_varCONFIG['upload_path'] = './assets/aimz/ppn/';
                    $_varCONFIG['allowed_types'] = 'xls|xlsx';
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['encrypt_name'] = FALSE;
                    $_varCONFIG['overwrite'] = TRUE;

                    $this->upload->initialize($_varCONFIG);

                    if ($this->upload->do_upload('_fleFATTACH')) {

                        $_objCONTEN['_rslFATTACH'] = 'file diupload sementara ke dalam sistem';

                        if (strpos($_FILES['_fleFATTACH']['name'], '.xlsx') !== false) {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        } else {
                            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                        }

                        $loadexcel = $excelreader->load('assets/aimz/ppn/' . str_replace(' ', '_', $_FILES['_fleFATTACH']['name']));
                        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                        $_objCONTEN['sheet'] = $sheet;
                        $_objCONTEN['KATAKPEYANG'] = str_replace(' ', '_', $_FILES['_fleFATTACH']['name']);
                        $_objCONTEN['KATAKBENJUT'] = $this->input->post('_finFPERIOD');
                        $_objCONTEN['KATAKPITAKZ'] = $this->input->post('_finFREVISI');
                    } else {
                        if (strpos($this->upload->display_errors(), 'The filetype you are attempting to upload is not allowed') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'Format File harus *.XLS atau *.XLSX';
                            $_oFlg = 'ggl';
                        } elseif (strpos($this->upload->display_errors(), 'You did not select a file to upload') !== false) {
                            $_objCONTEN['_rslFATTACH'] = 'File tidak boleh kosong';
                            $_oFlg = 'ggl';
                        } else {
                            $_objCONTEN['_rslFATTACH'] = $this->upload->display_errors();
                            $_oFlg = 'ggl';
                        }
                    }
                }
                $_objCONTEN['_oFlg'] = $_oFlg;
            }


            if (($_oPre == '_impFPROGRE') && (!empty($_oFle))) {

                $this->load->model("DomUSERZZ");
                $this->DomUSERZZ->mfcACTUSR018();

                if (strpos($_oFle, '.xlsx') !== false) {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $loadexcel = $excelreader->load('assets/aimz/ppn/' . str_replace(' ', '_', $_oFle));
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $_objCONTEN['data_sheet'] = $sheet;
            }


            $_objCONTEN['_swiUSR018'] = 'c00imp';
        }

        if ($_oMod == 'c00dtl') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00DTL'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };
            $_objCONTEN['_swiUSR018'] = 'c00dtl';
        }

        if ($_oMod == 'c00dtx') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00DTX'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            } else {
                $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                $_objCONTEN['_varMDL004'] = '';
                $_objCONTEN['_varMDL005'] = '';
            };
            $_objCONTEN['_swiUSR018'] = 'c00dtx';
        }


        if ($_oMod == 'c002st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC002ST'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'c002st';
        }

        if ($_oMod == 'c002mr') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC002MR'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'c002mr';
        }

        if ($_oMod == 'c002pr') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR018();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'Tax List' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Client</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                } else {
                    $_objCONTEN['_varMDL001'] = 'Daftar Tax' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'PPN' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = '<font style="font-weight: bold">Klien</font>';
                    $_objCONTEN['_varMDL004'] = '';
                    $_objCONTEN['_varMDL005'] = '';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR018'] = 'c002ap';
        }


        if ($_oMod == 'c00cor') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR018();
        }

        if ($_oMod == 'c002pr') {
            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR018();
        }

        if ($_oMod == 'c00kmp') {
            $this->load->model("DomUSERZZ");
            $this->DomUSERZZ->mfcACTUSR008();
        }

        if ($_oMod == 'h002st') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblH002ST'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax Report' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'History' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Laporan PPh' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPN' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR018'] = 'h002st';
        }


        if (($_oMod == 'c00smr') && ($_varXPROCES == 'sndeml')) {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblC00SMR'] = $this->DomUSERZZ->mfcACTUSR018();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Tax List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Summary</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Tax Compliance' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Hitung Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'PPh 22' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Ringkasan</font>';
            };

            $mail = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tprofle');
            $this->db->where('FRECNMB', $_oPrf);
            $this->db->order_by('FRECNMB', 'ASC');

            $_quePROFLE = $this->db->get();

            foreach ($_quePROFLE->result_array() as $_oRoz) {
                $_oXFULNME = $_oRoz['FFULNME'];
                $_oXEMAILZ = $_oRoz['FEMAILZ'];
            }

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where('FRECNMB', $_oTax);
            $this->db->order_by('FRECNMB', 'ASC');

            $_queTAXHST = $this->db->get();

            foreach ($_queTAXHST->result_array() as $_oRoz) {
                $_oXPERIOX = $_oRoz['FPERIOX'];
                $_oXREVISI = $_oRoz['FREVISI'];

                $_xPERIOX = explode('-', $_oXPERIOX);
                $_xPERIO1 = trim($_xPERIOX[0]);
                $_xPERIO2 = trim($_xPERIOX[1]);

                if ($_oXREVISI == '-1') {
                    $_oXREVISI = '0';
                } else {
                    $_oXREVISI = $_oXREVISI;
                }
            }

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_oRcvNme = $_oXFULNME;
            $_oRcvEml = $_oXEMAILZ;
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->Host = $_oFEMAIL3;
            $mail->SMTPAuth = true;
            $mail->Username = $_oFEMAIL4;
            $mail->Password = $_oFEMAIL5;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $mail->addAddress($_oRcvEml, $_oRcvNme);
            $mail->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $eml = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $mail->isHTML(true);
            $mail->Subject = 'Info PPN Terutang Masa ' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . ' untuk ' . $_oXFULNME;

            $mail->Body = 'Kepada Yth'
                . '<br>Klien MSM'
                . '<br>di Tempat'
                . '<br>'
                . '<br>'
                . '<br>Info <b>PPN</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b>.'
                . '<br>sudah dapat dilihat pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>'
                . '<br>Jika anda setuju dengan nilai pajak terutang yang tertera pada lampiran terkait dan memastikan tidak ada kekeliruan pada data yang anda berikan,'
                . '<br>harap mengkonfirmasi persetujuan anda melalui tombol approval yang berada pada menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode bersangkutan).'
                . '<br>Mohon mencek kembali sebelum melakukan konfirmasi persetujuan.'
                . '<br>'
                . '<br>Jika terdapat kesalahan/keluputan pada data yang anda diberikan, harap mengunggah ulang data yang benar melalui menu "Hitung Pajak" e-TAX MSM (pada jenis pajak dan periode persangkutan) dan segera memberitahu kami melalui menu "Surat Masuk" e-TAX MSM.'
                . '<br>'
                . '<br>Setelah tombol approval diklik, kami menganggap anda telah menyetujui nilai <b>PPN</b> Terutang Masa <b>' . $_xPERIO1 . ' ' . $_xPERIO2 . ' PEMBETULAN KE-' . $_oXREVISI . '</b> untuk <b>' . $_oXFULNME . '</b> dan kami akan segera membuat ID Billing terkait. ID Billing yang telah kami proses akan tampil pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>Setelah anda melakukan pembayaran dan mendapatkan bukti berupa Nomor Transaksi Penerimaan Negara (NTPN), harap mengunggah NTPN terkait pada jenis pajak dan periode bersangkutan pada menu "Aktivitas Pajak" e-TAX MSM bagian "Menunggu Pembayaran".'
                . '<br>'
                . '<br>'
                . '<br>Yours Sincerely,'
                . '<br>MSM Consulting Team,'
                . '<br>+62-21-63858603 (office)';

            if ($mail->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $mail->ErrorInfo);
            }
            $_objCONTEN['_swiUSR018'] = 'c00eml';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR018()
    {

        $_oRe1 = $this->uri->segment(4);
        $_oCmp = $this->uri->segment(5);
        $_oRe2 = $this->uri->segment(6);
        $_oMod = $this->uri->segment(8);

        $_oTdy = date("Ymd");

        $this->db->select('*');
        $this->db->from('tprofle');
        $this->db->where('FRECNMB', $_oRe1);
        $_quePROFLE = $this->db->get();

        if ($_quePROFLE->num_rows() > 0) {

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = explode(';', $_oRow['FNPWPZZ']);
                $_oFNPWPZZ = $_xFNPWPZZ[1];
                $_oFADDRES = $_oRow['FADDRES'];
            }
        }


        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where('FRECNMB', $_oRe2);
        $this->db->where('FFLGTAX', 'hstp00');
        $_queC21SMR = $this->db->get();

        foreach ($_queC21SMR->result_array() as $_oRow) {
            $_oFPERIOD = $_oRow['FPERIOD'];
            $_oFPERIOX = $_oRow['FPERIOX'];
            $_oFREVISI = $_oRow['FREVISI'];
            if ($_oFREVISI == '-1') {
                $_oFREVISI = '0 (NORMAL)';
            } else {
                $_oFREVISI = $_oFREVISI;
            }
            $_xFNPWPZZ = $_oRow['FNPWPZZ'];
            $_oFNPWPZZ = explode(';', $_xFNPWPZZ);
            $_oFNPWPZ2 = $_oFNPWPZZ[1];

            $_xF1B11ZZ = $_oRow['F1B11ZZ'];
            $_oF1B11ZZ = explode(';', $_xF1B11ZZ);
            $_oF1B11Z2 = $_oF1B11ZZ[1];

            $_xF1B20ZZ = $_oRow['F1B20ZZ'];
            $_oF1B20ZZ = explode(';', $_xF1B20ZZ);
            $_oF1B20Z2 = $_oF1B20ZZ[1];

            $_xF2A10ZZ = $_oRow['F2A10ZZ'];
            $_oF2A10ZZ = explode(';', $_xF2A10ZZ);
            $_oF2A10ZZ = $_oF2A10ZZ[1];

            $_xF2B10ZZ = $_oRow['F2B10ZZ'];
            $_oF2B10ZZ = explode(';', $_xF2B10ZZ);
            $_oF2B10ZZ = $_oF2B10ZZ[1];

            $_xFCOMPEN = $_oRow['FCOMPEN'];
            $_oFCOMPEN = explode(';', $_xFCOMPEN);
            $_oFCOMPE1 = $_oFCOMPEN[0];
            $_oFCOMPE2 = $_oFCOMPEN[1];
            $_oFCOMPE3 = $_oFCOMPEN[2];
        }



        $this->db->select('*');
        $this->db->from('ttaxhst');
        $this->db->where(
            array(
                'ttaxhst.FGROUPS = ' => $_oCmp,
                'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                'ttaxhst.FFLGTAX = ' => 'hstp00'
            )
        );
        $this->db->group_by('FKJSZZZ', 'asc');
        $this->db->order_by('FKJSZZZ', 'asc');
        $_quePROFLE = $this->db->get();

        foreach ($_quePROFLE->result_array() as $_oRow) {
            $_oFKJSZZZ = $_oRow['FKJSZZZ'];
        }


        $this->db->select('*');
        $this->db->from('tkjstor');
        $this->db->where(
            array(
                'FKJSCOD = ' => $_oFKJSZZZ
            )
        );
        $this->db->order_by('FKJSCOD', 'asc');
        $_queKJSTOR = $this->db->get();

        foreach ($_queKJSTOR->result_array() as $_oRow) {
            $_oFLABELZ = $_oRow['FLABELZ'];
        }

        if ($_oMod == 'exprps') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(85);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('Report PPN');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B21')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B22')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B23')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J21')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J22')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J23')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_oBln = trim(substr($_oFPERIOD, 4, 2));
            $_oThn = trim(substr($_oFPERIOD, 0, 4));
            $_xPrd = trim($this->sklibrfnc->_fSETDteIndPjg($_oBln)) . ' ' . $_oThn;
            $_xRvs = trim($_oFREVISI);

            $_xNpw = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $_xNpw->createText($_oFNPWPZ2);
            $_xNpw = substr($_xNpw, 0, 2) . '.' . substr($_xNpw, 2, 3) . '.' . substr($_xNpw, 5, 3) . '.' . substr($_xNpw, 8, 1) . '-' . substr($_xNpw, 9, 3) . '.' . substr($_xNpw, 12, 3);



            $_oKj1 = $_oFLABELZ;
            $_oKj2 = $_oFKJSZZZ;

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:K1');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', 'INFO KURANG BAYAR PPN');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B2:K2');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B2', 'MASA : ' . $_xPrd);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B2')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B3:K3');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B3', 'PEMBETULAN KE : ' . $_xRvs);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B3')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B5:C5');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B5', 'NAMA PKP');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B5')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D5:K5');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D5', ': ' . $_objCliNme);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D5')->getFont()->setName('Calibri')->setSize(14);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B6:C6');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B6', 'NPWP');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B6')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D6:K6');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D6', ': ' . $_xNpw);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D6')->getFont()->setName('Calibri')->setSize(14);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B8:I8');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B8', 'Penghitungan PPN Kurang Bayar / Lebih Bayar');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B8')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J8:K8');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J8', 'PPN');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J8')->getFont()->setName('Calibri')->setSize(14);

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B10', 'I.');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B10')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C10:I10');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C10', 'Pajak Keluaran yang harus dipungut sendiri');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C10')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J10:K10');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J10', intval($_oF1B11Z2) + intval($_oF1B20Z2));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J10')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J10')->getNumberFormat()->setFormatCode('#,##0');

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B12', 'II.');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B12')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C12:I12');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C12', 'Pajak Masukan yang dapat diperhitungkan :');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C12')->getFont()->setName('Calibri')->setSize(14);

            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C13', 'II.A');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D13:I13');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D13', 'Impor BKP, Pemanfaatan BKP Tidak Berwujud dari Luar Daerah');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D14:I14');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D14', 'Pabean dan Pemanfaatan JKP dari Luar Daerah Pabean Yang PM-');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D15:I15');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D15', 'nya Dapat Dikreditkan');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J15:K15');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J15', intval($_oF2A10ZZ));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J15')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J15')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J15')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C16', 'III.A');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D16:I16');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D16', 'Perolehan BKP/JKP dari Dalam Negeri Yang PM-nya Dapat');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D17:I17');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D17', 'Dikreditkan');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J17:K17');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J17', intval($_oF2B10ZZ));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J17')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J17')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B18', 'III.');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C18:I18');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C18', 'Kompensasi kelebihan PPN Masa Pajak sebelumnya');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J18:K18');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J18', intval($_oFCOMPE1) + intval($_oFCOMPE2) + intval($_oFCOMPE3));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J18')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J18')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C19:I19');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C19', 'Jumlah Pajak Masukan yang Dapat Diperhitungkan');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C19')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C19')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J19:K19');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J19', intval($_oF2A10ZZ) + intval($_oF2B10ZZ) + intval($_oFCOMPE1) + intval($_oFCOMPE2) + intval($_oFCOMPE3));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J19')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J19')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J19')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B21:I21');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B21', 'PPN Kurang atau (Lebih) Bayar');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B21')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B21')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B21')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B22:I22');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B22', 'PPN Kurang atau (Lebih) Bayar Pada SPT yang Dibetulkan');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B22')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B22')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B22')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B23:I23');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B23', 'PPN Kurang atau (Lebih) Bayar Karena Pembetulan');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B23')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B23')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B23')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J21:K21');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J21', (intval($_oF1B11Z2) + intval($_oF1B20Z2)) - (intval($_oF2A10ZZ) + intval($_oF2B10ZZ) + intval($_oFCOMPE1) + intval($_oFCOMPE2) + intval($_oFCOMPE3)));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J21')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J21')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J21')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J22:K22');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J22', '0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J22')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J22')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J22')->getNumberFormat()->setFormatCode('#,##0');
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('J23:K23');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J23', '0');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J23')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J23')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J23')->getNumberFormat()->setFormatCode('#,##0');

            $_oBdl = array(
                'borders' => array(
                    'left' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B8:B23')->applyFromArray($_oBdl);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B8:J8')->applyFromArray($_oBdt);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K8')->applyFromArray($_oBdt);

            $_oBdl = array(
                'borders' => array(
                    'left' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L8:L23')->applyFromArray($_oBdl);

            $_oBdb = array(
                'borders' => array(
                    'bottom' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B23:J23')->applyFromArray($_oBdb);

            $_oBdb = array(
                'borders' => array(
                    'bottom' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K23')->applyFromArray($_oBdb);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B10')->applyFromArray($_oBdt);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C10:I10')->applyFromArray($_oBdt);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J10:K10')->applyFromArray($_oBdt);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B21:I21')->applyFromArray($_oBdt);

            $_oBdt = array(
                'borders' => array(
                    'top' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J21:K21')->applyFromArray($_oBdt);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B44:K44');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B44', 'CATATAN');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B44')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B44')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B44')->getFont()->setBold(true);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B45:K45');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B45', '* Pembayaran PPN paling lambat tgl ...');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B45')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B45')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B46:K46');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B46', '* Jika sudah melakukan pembayaran, mohon Bukti Penerimaan Negara (BPN) di email');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B46')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B46')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B47:K47');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B47', '   kepada Pihak kami untuk proses pelaporan PPN Masa ' . $_xPrd);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B47')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B47')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B48:K48');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B48', '* Jika sudah terlapor, team MSM akan email BPE beserta SPT PPN Masa ' . $_xPrd);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B48')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B48')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B49:K49');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B49', '* ...');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B49')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B49')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B50:K50');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B50', '* ...');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B50')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B50')->getFont()->setName('Calibri')->setSize(14);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B51:K51');
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B51', '* ...');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B51')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B51')->getFont()->setName('Calibri')->setSize(14);

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'REPORT_PPN_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }


        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData PPN');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'FFFFFF'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:N1')->getFont()->setBold(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "Periode\n<YYYY-MM>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Flag');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'NPWP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E1', 'Nama Lawan Transaksi');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F1', 'NSFP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G1', "Tanggal\n<YYYY-MM-DD>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H1', "Masa\n<M>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I1', "Tahun\n<YYYY>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('I1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J1', "Status\n<Normal/Tidak Normal>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('J1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('K1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K1', 'DPP');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('L1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L1', 'PPN');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M1', "Status\n<Sukses/Tidak Sukses>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('M1')->getAlignment()->setWrapText(true);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N1', "<Dikreditkan/\nTidak Dikreditkan>");
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('N1')->getAlignment()->setWrapText(true);

            $this->db->select('*');
            $this->db->from('ttaxhst');
            $this->db->where(
                array(
                    'ttaxhst.FGROUPS = ' => $_oCmp,
                    'ttaxhst.FPERIOX = ' => $_oFPERIOX,
                    'ttaxhst.FFLGTAX = ' => 'hstp00',
                )
            );
            $this->db->order_by('FPROFLE', 'desc');
            $_quePROFLE = $this->db->get();

            $_oLin = 1;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oNmr++;
                $_oLin = $_oLin + 1;

                $_oFPERIOD = $_oRow['FPERIOD'];
                $_oFFULNME = $_oRow['FFULNME'];
                $_xFNPWPZZ = $_oRow['FNPWPZZ'];
                $_zFNPWPZZ = explode(';', $_xFNPWPZZ);
                $_oFNPWPZZ = $_zFNPWPZZ[1];

                $_oFFLAGZZ = $_oRow['FFLAGZZ'];
                $_oFNSFPZZ = $_oRow['FNSFPZZ'];


                $_oFPJKADR = $_oRow['FPJKADR'];
                $_oFPJKDSC = $_oRow['FPJKDSC'];
                $_oFINVDTE = $_oRow['FINVDTE'];
                $_oFINVNMB = $_oRow['FINVNMB'];
                $_oFINVDPP = $_oRow['FINVDPP'];
                $_oFINVPPN = $_oRow['FINVPPN'];
                $_oFINVDPN = $_oRow['FINVDPN'];
                $_oFFKTDTE = $_oRow['FFKTDTE'];
                $_oFFKTNMB = $_oRow['FFKTNMB'];
                $_oFFKTDPP = $_oRow['FFKTDPP'];
                $_oFFKTPPN = $_oRow['FFKTPPN'];
                $_oFFKTDPN = $_oRow['FFKTDPN'];
                $_oFBYRDTE = $_oRow['FBYRDTE'];
                $_oFBYRNML = $_oRow['FBYRNML'];
                $_oFBYRDSC = $_oRow['FBYRDSC'];
                $_oFMSMDPB = $_oRow['FMSMDPB'];
                $_oFMSMDPJ = $_oRow['FMSMDPJ'];
                $_oFKJSZZZ = $_oRow['FKJSZZZ'];
                $_oFMSMTRF = $_oRow['FMSMTRF'];
                $_oFMSMNML = $_oRow['FMSMNML'];

                $_oFP00DTE = $_oRow['FP00DTE'];
                $_oFP00MSA = $_oRow['FP00MSA'];
                $_oFP00YEA = $_oRow['FP00YEA'];
                $_oFP00STA = $_oRow['FP00STA'];
                $_oFP00DPP = $_oRow['FP00DPP'];
                $_oFP00PPN = $_oRow['FP00PPN'];
                $_oFP00APR = $_oRow['FP00APR'];
                $_oFP00KRE = $_oRow['FP00KRE'];

                $_oBdr = array(
                    'borders' => array(
                        'allBorders' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => 'bfbfbf'),
                        ),
                    ),
                );
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('A' . $_oLin . ':N' . $_oLin)->applyFromArray($_oBdr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oLin, $_oNmr);
                $_xPrd = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xPrd->createText($_oFPERIOD);
                $_xPrd = substr($_xPrd, 0, 4) . '-' . substr($_xPrd, 4, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oLin, $_xPrd);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oLin, $_oFFLAGZZ);
                $_xNpw = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xNpw->createText($_oFNPWPZZ);
                $_xNpw = substr($_xNpw, 0, 2) . '.' . substr($_xNpw, 2, 3) . '.' . substr($_xNpw, 5, 3) . '.' . substr($_xNpw, 8, 1) . '-' . substr($_xNpw, 9, 3) . '.' . substr($_xNpw, 12, 3);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oLin, $_xNpw);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('E' . $_oLin, $_oFFULNME);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('F' . $_oLin, $_oFNSFPZZ);
                $_xInv = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xInv->createText($_oFINVDTE);
                $_xInv = substr($_xInv, 0, 4) . '-' . substr($_xInv, 4, 2) . '-' . substr($_xInv, 6, 2);

                $_xDte = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xDte->createText($_oFP00DTE);
                $_xDte = substr($_xDte, 0, 4) . '-' . substr($_xDte, 4, 2) . '-' . substr($_xDte, 6, 2);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('G' . $_oLin, $_xDte);

                $_xMsa = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xMsa->createText($_oFP00MSA);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('H' . $_oLin, $_xMsa);

                $_xYea = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xYea->createText($_oFP00YEA);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('I' . $_oLin, $_xYea);

                $_xSta = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $_xSta->createText($_oFP00STA);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('J' . $_oLin, $_xSta);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('K' . $_oLin, $_oFP00DPP);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('K' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('L' . $_oLin, $_oFP00PPN);
                $_objPHPSpreadSheet->getActiveSheet()->getStyle('L' . $_oLin)->getNumberFormat()->setFormatCode('#,##0');

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('M' . $_oLin, $_oFP00APR);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('N' . $_oLin, $_oFP00KRE);
                $_oSta = $_oSta + 1;
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_PPN_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR019()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $this->load->library('upload');

        $_oMod = $this->uri->segment(3);
        $_oPre = $this->uri->segment(4);

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeEMAILZ';
        $_objCONTEN['_varICONXX'] = 'fas fa-cog fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'emlset') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMAILZ'] = $this->DomUSERZZ->mfcACTUSR019();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR019'] = 'emlset';
        }

        if ($_oMod == 'emlupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblEMAILZ'] = $this->DomUSERZZ->mfcACTUSR019();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Email' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR019'] = 'emlupd';
        }

        if (($_oMod == 'emlset') && ($_oPre == 'snd')) {

            $_objPHPMailer = new PHPMailer(true);

            $this->db->select('*');
            $this->db->from('tgloset');
            $this->db->where('FCOMMND', '(s)emlacnset');
            $this->db->order_by('FRECNMB', 'ASC');

            $_queEMAILZ = $this->db->get();

            foreach ($_queEMAILZ->result_array() as $_oRow) {
                $_oFEMAILX = $_oRow['FVALUE1'];
                $_oFEMAILY = $_oFEMAILX;

                $_oFEMAILZ = explode(';', $_oFEMAILY);
                $_oFEMAIL1 = $_oFEMAILZ[0];
                $_oFEMAIL2 = $_oFEMAILZ[1];
                $_oFEMAIL3 = $_oFEMAILZ[2];
                $_oFEMAIL4 = $_oFEMAILZ[3];
                $_oFEMAIL5 = $_oFEMAILZ[4];
            }

            $_varFRECEIP = $this->input->post('_edtFRECEIP');
            $_varFSUBJEC = $this->input->post('_edtFSUBJEC');
            $_varFCONTEN = $this->input->post('_edtFCONTEN');

            $_objPHPMailer->isSMTP();
            $_objPHPMailer->SMTPSecure = 'tls';
            $_objPHPMailer->Host = $_oFEMAIL3;
            $_objPHPMailer->SMTPAuth = true;
            $_objPHPMailer->Username = $_oFEMAIL4;
            $_objPHPMailer->Password = $_oFEMAIL5;
            $_objPHPMailer->Port = 587;
            $_objPHPMailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $_objPHPMailer->setFrom($_oFEMAIL2, $_oFEMAIL1);
            $_objPHPMailer->addAddress($_varFRECEIP, $_varFRECEIP);

            $_objPHPMailer->addReplyTo($_oFEMAIL2, $_oFEMAIL1);
            $_varEmlLgo = "base_url(), 'assets/pictures/msmconsultinglogo.svg'";
            $_objPHPMailer->isHTML(true);
            $_objPHPMailer->Subject = $_varFSUBJEC;
            $_objPHPMailer->AddEmbeddedImage("assets/pictures/msmconsultinglogo.svg", "my-attach", "assets/pictures/msmconsultinglogo.svg");

            $_objPHPMailer->Body = str_replace("\r\n", "<br/>", $_varFCONTEN)
                . '<br><br><img alt="PHPMailer" src="cid:my-attach">';


            if ($_objPHPMailer->send()) {
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                echo "Message could not be sent. Mailer Error: {}";
                $this->session->set_flashdata('err', $_objPHPMailer->ErrorInfo);
            }

            $_objCONTEN['_swiUSR019'] = 'emlsnd';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcACTUSR020()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeNGRDOM';
        $_objCONTEN['_varICONXX'] = 'fas fa-cog fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'ngrlst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblNGRDOM'] = $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR020'] = 'ngrlst';
        }
        if ($_oMod == 'ngradd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblNGRDOM'] = $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR020'] = 'ngradd';
        }
        if ($_oMod == 'ngrsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR020();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR020'] = 'ngrsve';
        }
        if ($_oMod == 'ngrviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblNGRDOM'] = $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR020'] = 'ngrviw';
        }
        if ($_oMod == 'ngredt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblNGRDOM'] = $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR020'] = 'ngredt';
        }
        if ($_oMod == 'ngrupd') {

            $this->load->model('DomUSERZZ');
            $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR020'] = 'ngrupd';
        }
        if ($_oMod == 'ngrdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR020();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Setting' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Setting List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Domicile Country' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Pengaturan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Negara Domisili' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR020'] = 'ngrdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public function cfcXLSUSR020()
    {

        $_oMod = $this->uri->segment(3);

        $_oTdy = date("Ymd");

        if ($_oMod == 'expfrd') {


            $_objPHPSpreadSheet = new Spreadsheet();

            $_objPHPSpreadSheet->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
            $_objPHPSpreadSheet->getActiveSheet()->setShowGridlines(false);
            $_objPHPSpreadSheet->getActiveSheet()->getSheetView()->setZoomScale(80);
            $_objPHPSpreadSheet->setActiveSheetIndex(0)->setTitle('FormatData Negara Domisili');

            $_oBdr = array(
                'borders' => array(
                    'allBorders' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => array('argb' => 'bfbfbf'),
                    ),
                ),
            );
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:D2')->applyFromArray($_oBdr);

            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('A1:A2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('B1:B2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1:B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('C1:C2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1:C2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->mergeCells('D1:D2');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1:D2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:D2')->getFont()->getColor()->setRGB('ffffff');
            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1:D2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0275d8');

            $_objCliNme = str_replace('.', '', str_replace('%20', ' ', $_oFFULNME));

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A1', 'No.');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B1', "No. Urut Negara Domisili");

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C1', 'Kode');

            $_objPHPSpreadSheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D1', 'Nama Negara Domisili');

            $this->db->select('*');
            $this->db->from('tcountr');
            $this->db->order_by('FCODEZZ', 'asc');

            $_quePROFLE = $this->db->get();

            $_oBrs = 2;
            $_oNmr = 0;

            foreach ($_quePROFLE->result_array() as $_oRow) {

                $_oBrs++;
                $_oNmr++;


                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('A' . $_oBrs, $_oNmr);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('B' . $_oBrs, $_oRow['FCODEZZ']);

                $_objPHPSpreadSheet->getActiveSheet()->getStyle('C' . $_oBrs)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('C' . $_oBrs, $_oRow['FNGRCOD']);

                $_objPHPSpreadSheet->getActiveSheet()->setCellValue('D' . $_oBrs, $_oRow['FNGRDES']);
            }

            foreach (range('A', 'Z') as $columnID) {
                $_objPHPSpreadSheet->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }

            $_objCliNme = 'MSM Consulting';
            $_objPHPSpreadSheet->getActiveSheet()->setSelectedCell('A1');
            $_objWriter = new Xlsx($_objPHPSpreadSheet);
            $_varFLENME = 'FORMATDATA_NegaraDomisili_' . date('Ymd') . '_' . $_objCliNme . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $_varFLENME);
            header('Cache-Control: max-age=0');
            $_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($_objPHPSpreadSheet, 'Xlsx');
            ob_end_clean();
            $_objWriter->save('php://output');
            exit();
        }
    }

    public function cfcACTUSR021()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);
        $_oSub = $this->uri->segment(4);
        $_oAct = $this->uri->segment(11);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeACTPJK';
        $_objCONTEN['_varICONXX'] = 'fas fa-traffic-light fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'actlst') {

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR021'] = 'actlst';
        }
        if ($_oMod == 'ngradd') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblNGRDOM'] = $this->DomUSERZZ->mfcACTUSR020();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>';
            };

            $_objCONTEN['_swiUSR020'] = 'ngradd';
        }

        if ($_oMod == 'actsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR021'] = 'actsve';
        }

        if ($_oMod == 'actsv2') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR021'] = 'actsve';
        }

        if ($_oMod == 'actspy') {

            $_oFlg = 'ovr';
            $_oSiz = $_FILES['_fleFDOCUMN']['size'];


            if (empty($_FILES['_fleFDOCUMN']['name'])) {
                $_oFlg = 'emp';
                $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
            }

            if ((!empty($_FILES['_fleFDOCUMN']['name'])) && ($_FILES['_fleFDOCUMN']['size'] >= 1) && ($_FILES['_fleFDOCUMN']['size'] <= 1000000)) {
                $_oFlg = 'ok1';
                $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
            }

            if (($_FILES['_fleFDOCUMN']['size'] > 1000000) && ($_FILES['_fleFDOCUMN']['size'] < 2000000)) {

                $_oFlg = 'ok2';
                $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
            }

            if ($_oFlg == 'ovr') {
                $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
            }

            if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                $_varCONFIG['upload_path'] = './assets/mins/pay/';
                $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp|xls|xlsx|doc|docx|txt|pdf';
                $_varCONFIG['encrypt_name'] = FALSE;
                $_varCONFIG['overwrite'] = TRUE;

                $this->upload->initialize($_varCONFIG);

                if ($this->upload->do_upload('_fleFDOCUMN')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/pay/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/pay/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

                $_objCONTEN['_swiUSR021'] = 'actspy';
            }
        }

        if ($_oMod == 'actsdc') {

            $_oFlg = 'ovr';
            $_oSiz = $_FILES['_flxFDOCUMN']['size'];


            if (empty($_FILES['_flxFDOCUMN']['name'])) {
                $_oFlg = 'emp';
                $this->session->set_flashdata('emp', "EMP_MESSAGE_HERE");
            }

            if ((!empty($_FILES['_flxFDOCUMN']['name'])) && ($_FILES['_flxFDOCUMN']['size'] >= 1) && ($_FILES['_flxFDOCUMN']['size'] <= 1000000)) {
                $_oFlg = 'ok1';
                $this->session->set_flashdata('ok1', "OK1_MESSAGE_HERE");
            }

            if (($_FILES['_flxFDOCUMN']['size'] > 1000000) && ($_FILES['_flxFDOCUMN']['size'] < 2000000)) {

                $_oFlg = 'ok2';
                $this->session->set_flashdata('ok2', "OK2_MESSAGE_HERE");
            }

            if ($_oFlg == 'ovr') {
                $this->session->set_flashdata('ovr', "OVERLOAD_MESSAGE_HERE");
            }

            if (($_oFlg == 'ok1') || ($_oFlg == 'ok2') || $_oFlg == 'emp') {

                $_varCONFIG['upload_path'] = './assets/mins/doc/';
                $_varCONFIG['allowed_types'] = 'gif|jpg|png|jpeg|bmp|xls|xlsx|doc|docx|txt|pdf';
                $_varCONFIG['encrypt_name'] = FALSE;
                $_varCONFIG['overwrite'] = TRUE;

                $this->upload->initialize($_varCONFIG);

                if ($this->upload->do_upload('_flxFDOCUMN')) {
                    $_varIMAGEX = $this->upload->data();
                    $_varCONFIG['image_library'] = 'gd2';
                    $_varCONFIG['source_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $_varCONFIG['create_thumb'] = FALSE;
                    $_varCONFIG['maintain_ratio'] = TRUE;
                    $_varCONFIG['max_size'] = 5000;
                    $_varCONFIG['quality'] = '50%';
                    $_varCONFIG['width'] = 400;
                    $_varCONFIG['height'] = 200;
                    $_varCONFIG['new_image'] = './assets/mins/doc/' . $_varIMAGEX['file_name'];
                    $this->load->library('image_lib', $_varCONFIG);
                    $this->image_lib->resize();
                }

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

                $_objCONTEN['_swiUSR021'] = 'actsdc';
            }
        }

        if ($_oMod == 'actviw') {

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR021'] = 'actviw';
        }
        if ($_oMod == 'actedt') {

            if ($_oAct == '') {

                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
                }
                $_objCONTEN['_swiUSR021'] = 'actedt';
            }

            if ($_oAct == 'paydel') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
                $_objCONTEN['_swiUSR021'] = 'actdel';
            }

            if ($_oAct == 'docdel') {

                $this->load->model("DomUSERZZ");
                $_objRESULT = $this->DomUSERZZ->mfcACTUSR021();

                if ($_objRESULT == true) {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
                } else {
                    if ($_sesFLNGAGE == 'eng') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                    } elseif ($_sesFLNGAGE == 'ina') {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                    } else {
                        $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                        $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                        $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                        $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                    }
                    $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
                }
                $_objCONTEN['_swiUSR021'] = 'actdel';
            }
        }

        if ($_oMod == 'actupd') {

            if ($_oSub == 'pjkmsm') {

                $this->load->model('DomUSERZZ');
                $this->DomUSERZZ->mfcACTUSR021();
            }

            if ($_oSub == 'pjkpay') {

                if ($_oAct == '') {

                    $id = $this->input->post('id');
                    $field = $this->input->post('field');
                    $value = $this->input->post('value');

                    $this->load->model('DomUSERZZ');
                    $this->DomUSERZZ->mfcACTUSR021_B($id, $field, $value);
                } elseif ($_oAct == 'flg') {



                    $this->load->model('DomUSERZZ');
                    $this->DomUSERZZ->mfcACTUSR021();
                }
            }

            if ($_oSub == 'pjkarc') {

                $this->load->model('DomUSERZZ');
                $this->DomUSERZZ->mfcACTUSR021();
            }

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Activity Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Activity List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Tax Activity' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Aktifitas Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR021'] = 'actupd';
        }

        if ($_oMod == 'actup2') {

            if ($_oSub == 'pjkpay') {

                if (empty($_oAct)) {

                    $id = $this->input->post('id');
                    $field = $this->input->post('field');
                    $value = $this->input->post('value');

                    $this->load->model('DomUSERZZ');
                    $this->DomUSERZZ->mfcACTUSR021_C($id, $field, $value);
                }
            }




            $_objCONTEN['_swiUSR021'] = 'actupd';
        }


        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }

    public
    function cfcACTUSR022()
    {

        $_sesFLNGAGE = strtolower($this->session->FLNGAGE);
        $_oMod = $this->uri->segment(3);

        $this->load->library('upload');

        $_objCONTEN['_varCONTEN'] = 'userzz/SeeREGTRA';
        $_objCONTEN['_varICONXX'] = 'fas fa-chalkboard-teacher fa-lg fa-fw';
        $_objCONTEN['_varICONCL'] = '#333333';

        if ($_oMod == 'reglst') {

            $this->load->model("DomUSERZZ");
            $_objCONTEN['_tblREGTRA'] = $this->DomUSERZZ->mfcACTUSR022();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Task Management' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Task List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Prospective Client Registration' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">List</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Registrasi Calon Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Manajemen Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Kegiatan' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Registrasi Calon Klien' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Daftar</font>';
            };
            $_objCONTEN['_swiUSR022'] = 'reglst';
        }

        if ($_oMod == 'kppsve') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR004();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Inserted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#008000">Berhasil, Data Ditambahkan</font>' . ')';
                };
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">New Add</font>&nbsp;(Result : ' . '<font color="#ff0000">Error, Duplicate Record</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Tambah Baru</font>&nbsp;(Hasil : ' . '<font color="#ff0000">Gagal, Data Duplikat</font>' . ')';
                };
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR004'] = 'kppsve';
        }

        if ($_oMod == 'regviw') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblREGTRA'] = $this->DomUSERZZ->mfcACTUSR022();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">View</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Lihat</font>';
            }
            $_objCONTEN['_swiUSR022'] = 'regviw';
        }

        if ($_oMod == 'regedt') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblREGTRA'] = $this->DomUSERZZ->mfcACTUSR022();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Edit</font>';
            }
            $_objCONTEN['_swiUSR022'] = 'regedt';
        }

        if ($_oMod == 'regupd') {

            $this->load->model('DomUSERZZ');
            $_objCONTEN['_tblREGTRA'] = $this->DomUSERZZ->mfcACTUSR022();

            if ($_sesFLNGAGE == 'eng') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Update</font>';
            } elseif ($_sesFLNGAGE == 'ina') {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            } else {
                $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Pembaruan</font>';
            }
            $_objCONTEN['_swiUSR022'] = 'regupd';
        }

        if ($_oMod == 'regdel') {

            $this->load->model("DomUSERZZ");
            $_objRESULT = $this->DomUSERZZ->mfcACTUSR022();

            if ($_objRESULT == true) {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . '<font color="#008000">Success, Record Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Berhasil, Data Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('true', "SUCCESS_MESSAGE_HERE");
            } else {
                if ($_sesFLNGAGE == 'eng') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utility' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Utility List' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Delete</font>&nbsp;(Result : ' . ' <font color = "#008000">Error, Record Not Deleted</font>' . ')';
                } elseif ($_sesFLNGAGE == 'ina') {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                } else {
                    $_objCONTEN['_varMDL001'] = 'eTAX' . '<font> / </font>';
                    $_objCONTEN['_varMDL002'] = 'Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL003'] = 'Daftar Utilitas' . '<font> / </font>';
                    $_objCONTEN['_varMDL004'] = 'Kantor Pelayanan Pajak' . '<font> / </font>';
                    $_objCONTEN['_varMDL005'] = '<font style="font-weight: bold">Hapus</font>&nbsp;(Hasil : ' . ' <font color = "#008000">Gagal, Data Tidak Terhapus</font>' . ')';
                }
                $this->session->set_flashdata('err', "ERROR_MESSAGE_HERE");
            }
            $_objCONTEN['_swiUSR022'] = 'regdel';
        }

        $this->load->view('userzz/SeeLAYOUT', $_objCONTEN);
    }
}
