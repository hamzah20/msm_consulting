<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ProjectType extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }


    // KARYAWAN
    public function index()
    {
        $data['project'] = $this->cms->getGeneralList('gm_project_type');
     

        $this->load->view('cms/projecttype/master_project_type', $data);
    }

    public function addProjecttype(){
        $projecttype=$this->input->post('txt_projecttype');
        $description=$this->input->post('txt_description');

         $projectArr = array(
            'NAME'=>$projecttype,
            'DESCRIPTION'=>$description
        );

        $this->db->trans_begin();
        $this->cms->insertGeneralData('gm_project_type', $projectArr);
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('query', 'error');
            redirect('projecttype');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('query', 'success');
            redirect('projecttype');
        }
    }
    
}
