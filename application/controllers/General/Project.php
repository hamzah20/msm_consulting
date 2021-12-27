<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Project extends CI_Controller
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
        $this->load->view('cms/project/project', $data);
    }

    public function AddProject()
    {
        $project_id = $this->incube->generateID(10);
        $ptid = $this->input->post('project_type_id');
        $addArr = array(
            'PROJECT_ID' => $project_id,
            'PROJECT_NAME' => $this->input->post('project_name'),
            'START_DATE' => date('Y-m-d H:i:s', strtotime($this->input->post('project_start'))),
            'END_DATE' => date('Y-m-d H:i:s', strtotime($this->input->post('project_end'))),
            'PROJECT_TYPE_ID' => $ptid,
            'CREATED' => date('Y-m-d H:i:s'),
            'UPDATED' => $this->input->post('attempted_login_user')
        ); 

        $query_addproject = $this->cms->insertGeneralData('g_project', $addArr);
        

        $arr_input = $this->input->post('project');
        // var_dump($arr_input);

        // echo "##################";
        // atas buat debug karna pujeng

        foreach ($arr_input as $arr_milestone) {
            foreach ($arr_milestone as $arr_task) {
                // var_dump($arr_task);
                
                if (isset($arr_task['checkbox'])) {
                    $addArrDetail = array(
                        'PROJECT_ID' => $project_id,
                        'MILESTONE_ID' => $arr_task['id_milestone'],
                        'TASK_ID' => $arr_task['id_task'],
                        'START_DATE' => date('Y-m-d H:i:s', strtotime($arr_task['start_date'])),
                        'END_DATE' => date('Y-m-d H:i:s', strtotime($arr_task['end_date'])),
                        'PIC' => $arr_task['pic'],
                        'TOTAL_HOURS' => $arr_task['total_hours'],
                        'CREATED' => date('Y-m-d H:i:s'),
                        'UPDATED' => $this->input->post('attempted_login_user')
                    ); 
                    $query_addprojectdetail = $this->cms->insertGeneralData('g_project_detail', $addArrDetail);
                }

                
            }
        }
    }

    public function GetPtype()
    {
        $data['ptid_milestone'] = $this->input->get('ptid_milestone');
        $this->load->view('modal/add_project_getptype', $data);
    }

    
}
