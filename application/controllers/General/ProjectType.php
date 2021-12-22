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

         $projectArr = array(
            'NAME'=>$this->input->post('NAME'),
            'DESCRIPTION'=>$this->input->post('DESCRIPTION')
        );

        $queryInsert = $this->cms->insertGeneralData('gm_project_type', $projectArr);
        
        if (!$queryInsert) {
            $this->session->set_flashdata('query', 'error');
            redirect(base_url('projecttype'));
        } else {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('projecttype'));
        }
    }

    public function deleteProjecttype(){
        // $this->output->enable_profiler(TRUE);
        header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('gm_project_type', 'ID', $this->input->post('ID'));

        if ($queryDelete) {
            echo json_encode(array(
                'code'      => 200,
                'status'    => 'success',
            ));
        } else {
            echo json_encode(array(
                'code'      => 204,
                'status'    => 'error',
            ));
        }
    }

    public function editProjecttype(){
        $editArr = array(
            'NAME'              => $this->input->post('NAME'),
            'DESCRIPTION'       => $this->input->post('DESCRIPTION')
        );

        $query_editUser = $this->cms->updateGeneralData('gm_project_type', $editArr, 'ID', $this->input->post('ID'));

        if($query_editUser) {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('projecttype'));
        }else {
            $this->session->set_flashdata('query', 'error');
            redirect(base_url('projecttype'));
        }
    }

    public function getProjecttype(){
        $id = $this->input->get('id');
        $data['gm_project_type'] = $this->cms->getSingularData('gm_project_type', 'ID', $id);

        $this->load->view('modal/edit_projectType', $data);
    }
    
}
