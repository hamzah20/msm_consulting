<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Milestone extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }

    // milestone
    public function index()
    {

        $data['project'] = $this->cms->getGeneralList('gm_project_type');
        $data['slc_project']="";
        if(!empty($this->input->get('slc_projecttype'))){
            $data['slc_project']=$this->input->get('slc_projecttype');
            $data['milestone'] = $this->cms->getSingularData('v_g_milestone','PROJECT_TYPE_ID',$this->input->get('slc_projecttype'));
        }
        else{
             $data['milestone'] = $this->cms->getGeneralList('v_g_milestone');
        }
        $this->load->view('cms/milestone/milestone', $data);
    }

// ===================Milestone=========================

    public function addMilestone(){
        $project_id=$this->input->post('txt_project_id');
        $milestone=$this->input->post('txt_milestone');
        $description=$this->input->post('txt_description');
        $projectArr = array(
            'PROJECT_TYPE_ID'=>$project_id,
            'MILESTONE_NAME'=>$milestone,
            'DESCRIPTION'=>$description
        );

        $this->db->trans_begin();
        $this->cms->insertGeneralData('g_milestone', $projectArr);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('query', 'error');
            redirect('milestone');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('query', 'success_milestone');
            redirect("milestone?slc_projecttype=$project_id");
        }
    }

    public function deleteMilestone(){
        // $this->output->enable_profiler(TRUE);
        header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('g_milestone', 'REC_ID', $this->input->post('REC_ID'));

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

    public function editMilestone(){
        $project_id = $this->input->post('txt_project_id');
        $editArr = array(
            'PROJECT_TYPE_ID'      => $this->input->post('txt_project_id'),
            'MILESTONE_NAME'       => $this->input->post('txt_milestone'),
            'DESCRIPTION'          => $this->input->post('txt_description')
        );

        $query_editUser = $this->cms->updateGeneralData('g_milestone', $editArr, 'REC_ID', $this->input->post('REC_ID'));

        if($query_editUser) {
            $this->session->set_flashdata('query', 'success_milestone');
            redirect("milestone?slc_projecttype=$project_id");
        }else {
            $this->session->set_flashdata('query', 'error_milestone');
            redirect("milestone?slc_projecttype=$project_id");
        }
    }

    public function getMilestone(){
        $id = $this->input->get('id');
        $data['g_milestone'] = $this->cms->getSingularData('g_milestone', 'REC_ID', $id);
        $data['gm_project_type'] = $this->cms->getGeneralList('gm_project_type');

        $this->load->view('modal/edit_milestone', $data);
    }

    public function getTask(){
        $id = $this->input->get('id');
        $data['slc_project'] = $this->input->get('slc_project');
        $data['g_task'] = $this->cms->getSingularData('g_task', 'REC_ID', $id);

        $this->load->view('modal/edit_task', $data);
    }

    public function editTask(){
        $project_id = $this->input->post('id_project');
        $id = $this->input->post('id_task');
        $task_name = $this->input->post('txt_task');

        $editArr = array(
            'TASK_NAME'      => $task_name
        );

        $query_editTask = $this->cms->updateGeneralData('g_task', $editArr, 'REC_ID', $id);

        if($query_editTask) {
            $this->session->set_flashdata('query', 'success_task');
            redirect("milestone?slc_projecttype=$project_id");
        }else {
            $this->session->set_flashdata('query', 'error');
            redirect("milestone?slc_projecttype=$project_id");
        }
    }

// ===================Milestone=========================

    public function addTask(){
        $project_id = $this->input->post('txt_project_id');
        $milestone_id=$this->input->post('txt_milestone_id');
        $task=$this->input->post('txt_task');
        $Gettask=$this->cms->getTasktotal($milestone_id);
        $total_task=$Gettask->num_rows();
        $sort_new=1;
        if($total_task>0){
            $sort_new=$Gettask->SORT_NO+1;
        }
       // echo $sort_new;

        $TaskArr = array(
            'MILESTONE_ID'=>$milestone_id,
            'TASK_NAME'=>$task,
            'SORT_NO'=>$sort_new,
            'STATUS'=>'NEW'
        );

        $this->db->trans_begin();
        $this->cms->insertGeneralData('g_task', $TaskArr);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('query', 'error');
            redirect("milestone?slc_projecttype=$project_id");
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('query', 'success_task');
            redirect("milestone?slc_projecttype=$project_id");
        }
    }

    public function deleteTask(){
        header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('g_task', 'REC_ID', $this->input->post('REC_ID'));

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
    
}
