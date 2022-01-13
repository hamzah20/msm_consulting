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


    
    public function index()
    {

        //$this->output->enable_profiler(TRUE);
        // buat debug, gonta ganti akun disini yaa...
        $data['user_group_id'] = $this->session->userdata('user_group_id');
        $data['user_rec_id'] = $this->session->userdata('user_rec_id');
        $data['elevated_group'] = $this->session->userdata('elevated_group');

        $data['project_list'] = $this->cms->getGeneralList('v_g_project');
        $data['project_type'] = $this->cms->getGeneralList('gm_project_type');



        $this->load->view('cms/project/project', $data);

    }

    public function startTask(){
        header('Content-Type: application/json');
        $editArr = array(
            'STATUS' => 'ONPROGRESS'
        );

        $querySubmit = $this->cms->updateGeneralData('g_project_detail', $editArr, 'REC_ID', $this->input->post('id_project_detail'));

        if ($querySubmit) {
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
    
    public function submitTask()
    {
        header('Content-Type: application/json');

        $g_project_detail = $this->cms->getSingularData('g_project_detail', 'REC_ID', $this->input->post('id_proj_detail'));
        $start_date = date('Y-m-d H:i:s', strtotime($g_project_detail->row()->START_DATE));
        $now_date = date('Y-m-d H:i:s');
        $actual_hours_only = $this->input->post('actual_hours_only');
        $actual_minutes_only = $this->input->post('actual_minutes_only');
        $actual_minutes = $actual_hours_only * 60 + $actual_minutes_only ;
        $submit_date = date('Y-m-d H:i:s', time() );
        $editArr = array(
            'STATUS' => 'WAITING FOR APPROVAL',
            'NOTES_PIC' => $this->input->post('notes_pic'),
            'ACTUAL_MINUTES' => $actual_minutes,
            'SUBMIT_DATE' => $submit_date
        );

        $querySubmit = $this->cms->updateGeneralData('g_project_detail', $editArr, 'REC_ID', $this->input->post('id_proj_detail'));

        if ($querySubmit) {
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

    public function approveTask(){
        //$this->output->enable_profiler(TRUE);
        header('Content-Type: application/json');

        $rec_id = $this->input->post('rec_id');
        

        $editArr = array(
            'STATUS' => 'DONE',
            'NOTES_SUPERUSER' => $this->input->post('notes_superuser')
        );

        $queryApprove = $this->cms->updateGeneralData('g_project_detail', $editArr, 'REC_ID', $rec_id);



        $g_project_detail = $this->cms->getSingularData('v_g_project_detail', 'REC_ID', $rec_id);
        $project_id = $g_project_detail->row()->PROJECT_ID;
        $milestone_id = $g_project_detail->row()->MILESTONE_ID;
        $task_sort_no = $g_project_detail->row()->TASK_SORT_NO;
        $next_task = $this->db->query("SELECT * FROM v_g_project_detail WHERE PROJECT_ID = '$project_id' AND MILESTONE_ID = $milestone_id AND TASK_SORT_NO > $task_sort_no GROUP BY TASK_ID ORDER BY TASK_SORT_NO ASC LIMIT 1;");

            $editArr2 = array(
                'STATUS' => 'ONPROGRESS'
            );

        if ($next_task->num_rows() > 0) { 
            if ($next_task->row()->STATUS == '-') {
                $queryApprove = $this->cms->updateGeneralData('g_project_detail', $editArr2, 'REC_ID', $next_task->row()->REC_ID);
            }
        }else{// kalo udah gk ada task selanjutnya di milestone & project ini, maka ambil milestone dibawahnya

            $next_task = $this->db->query("SELECT * FROM v_g_project_detail WHERE PROJECT_ID = '$project_id' AND MILESTONE_ID = $milestone_id AND TASK_SORT_NO = $task_sort_no GROUP BY TASK_ID ORDER BY TASK_SORT_NO ASC LIMIT 1;");

            $milestone_sort_no = $next_task->row()->MILESTONE_SORT_NO;
            $next_milestone = $this->db->query("SELECT * FROM v_g_project_detail WHERE PROJECT_ID = '$project_id' AND MILESTONE_SORT_NO > $milestone_sort_no GROUP BY MILESTONE_ID ORDER BY MILESTONE_SORT_NO ASC LIMIT 1;");
            $milestone_id = $next_milestone->row()->MILESTONE_ID;

            $next_task = $this->db->query("SELECT * FROM v_g_project_detail WHERE PROJECT_ID = '$project_id' AND MILESTONE_ID = $milestone_id AND TASK_SORT_NO > 0 GROUP BY TASK_ID ORDER BY TASK_SORT_NO ASC LIMIT 1;");
            if ($next_task->row()->STATUS == '-') {
                $queryApprove = $this->cms->updateGeneralData('g_project_detail', $editArr2, 'REC_ID', $next_task->row()->REC_ID);
            }
            
        }


        



        //$queryApprove = $this->cms->updateGeneralData('g_project_detail', $editArr2, 'REC_ID', cari recidnya ngab));
        
        echo json_encode(array(
            'code'      => 200,
            'status'    => 'success',
        ));

    }

    public function reviseTask(){

        header('Content-Type: application/json');

        $editArr = array(
            'STATUS' => 'REVISE',
            'NOTES_SUPERUSER' => $this->input->post('notes_superuser')
        );

        $queryApprove = $this->cms->updateGeneralData('g_project_detail', $editArr, 'REC_ID', $this->input->post('rec_id'));

        if ($queryApprove) {
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

    public function getModalApprovalTask(){
        //$this->output->enable_profiler(TRUE);
        $data['rec_id'] = $this->input->get('rec_id');
        $data['v_g_project_detail'] = $this->cms->getSingularData('v_g_project_detail', 'REC_ID', $this->input->get('rec_id'));
        $v_g_project_detail = $data['v_g_project_detail'];
        $data['g_project'] = $this->cms->getSingularData('g_project', 'PROJECT_ID', $v_g_project_detail->row()->PROJECT_ID);
        $data['dokumen_list_task'] = $this->cms->getSingularDataTriple('v_g_project_doc', 'PROJECT_ID', 'MILESTONE_ID' ,'TASK_ID', $v_g_project_detail->row()->PROJECT_ID, $v_g_project_detail->row()->MILESTONE_ID, $v_g_project_detail->row()->TASK_ID);
        $this->load->view('modal/approval_task', $data);
    }

    public function AddProject()
    {
        $project_id = $this->incube->generateID(10);
        $ptid = $this->input->post('project_type_id');
        $addArr = array(
            'PROJECT_ID' => $project_id,
            'PROJECT_NAME' => $this->input->post('project_name'),
            'PROJECT_OWNER_ID' => $this->session->userdata('user_rec_id'),
            'PROJECT_CUSTOMER' => $this->input->post('companyID'),
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
        $status_onprogress = 'ONPROGRESS'; #Kalo task pertama, kasih onprogress, sisanya kasih strip (-)
        foreach ($arr_input as $arr_milestone) {
            foreach ($arr_milestone as $arr_task) {
                // var_dump($arr_task);
                
                
                if (isset($arr_task['checkbox'])) {
                    $planned_minutes = $arr_task['planned_hours_only'] * 60 + $arr_task['planned_minutes_only'];
                    $addArrDetail = array(

                        'PROJECT_ID' => $project_id,
                        'MILESTONE_ID' => $arr_task['id_milestone'],
                        'TASK_ID' => $arr_task['id_task'],
                        'START_DATE' => date('Y-m-d H:i:s', strtotime($arr_task['start_date'])),
                        'END_DATE' => date('Y-m-d H:i:s', strtotime($arr_task['end_date'])),
                        'PIC' => $arr_task['pic'],
                        'PLANNED_MINUTES' => $planned_minutes,
                        'STATUS' => $status_onprogress,
                        'CREATED' => date('Y-m-d H:i:s'),
                        'UPDATED' => $this->input->post('attempted_login_user')
                    ); 
                    $status_onprogress = "-"; #Kalo task pertama, kasih onprogress, sisanya kasih strip (-)
                    $query_addprojectdetail = $this->cms->insertGeneralData('g_project_detail', $addArrDetail);
                }

                
            }
        }
        $this->session->set_flashdata('query', 'success');
        redirect(base_url('project'));
    }

    public function GetPtype()
    {
        $data['ptid_milestone'] = $this->input->get('ptid_milestone');
        $data['milestone'] = $this->cms->getSingularData('v_g_milestone','PROJECT_TYPE_ID',$data['ptid_milestone']);
        $data['s_user'] = $this->cms->getGeneralList('s_user');
        $this->load->view('modal/add_project_getptype', $data);
    }

    public function getUploadDokumen()
    {
        $id = $this->input->get('id_project');
        $data['project'] = $this->cms->getSingularData('g_project', 'REC_ID', $id);

        $this->db->select('*')
            ->from("m_document")
            ->order_by("NAMA_JENIS_DOKUMEN", "ASC");

        $data['document_type'] = $this->db->get();

        $this->load->view('modal/upload_dokumen_project', $data);
    }

    public function lihatDokumen()
    {
        //$this->output->enable_profiler(true);
        $id_project = $this->input->get('id_project');
        $data['id_project'] = $this->input->get('id_project');
        $data['dokumen_list_project'] = $this->cms->getSingularDataDetail('g_project_doc', 'PROJECT_ID', 'TASK_ID', $id_project, 0);
        $data['dokumen_list_milestone'] = $this->cms->getMilestoneProject('v_g_project_doc', $id_project);
        $data['g_project'] = $this->cms->getSingularData('g_project', 'PROJECT_ID', $id_project);
        $this->load->view('modal/lihat_dokumen_project', $data);
    }

    public function Download_doc()
    {
        $this->load->helper('download');
        $addr = $this->input->get('addr');
        $doc = $this->cms->getSingularData('g_project_doc', 'FILE_ADDRESS', $addr);
        $file_name = $doc->row()->FILE_NAME;
        $file_path = './assets/upload/docs/'.$doc->row()->FILE_ADDRESS; 
        force_download($file_name, file_get_contents($file_path));
    }

    public function modalSubmitTask(){
        $data['g_project_detail'] = $this->cms->getSingularData('g_project_detail', 'REC_ID', $this->input->get('idprojdetail'));
        $g_project_detail = $data['g_project_detail'];
        $data['g_task'] = $this->cms->getSingularData('g_task', 'REC_ID', $g_project_detail->row()->TASK_ID);
        $data['dokumen_list_task'] = $this->cms->getSingularDataTriple('v_g_project_doc', 'PROJECT_ID', 'MILESTONE_ID','TASK_ID', $g_project_detail->row()->PROJECT_ID , $g_project_detail->row()->MILESTONE_ID, $g_project_detail->row()->TASK_ID);
        $this->load->view('modal/submit_task_project', $data);
    }

    public function uploadDokumen()
    {
        //$this->output->enable_profiler(true);

        $config['upload_path']          = './assets/upload/docs/';
        $config['allowed_types']        = 'xlsx|xls|xlsm|xlt|xltx|xltm|xlsb|xla|xlam|xml|csv|pdf|epub|txt|xps|doc|docm|docx|dot|dotm|dotx|odt|rtf|wps|ods|xlw|odp|pot|potm|potx|ppa|ppam|pps|ppsm|ppsx|ppt|pptm|pptx|thmx|jpg|jpeg|png|webp|bmp|tif';
        $config['max_size']             = 5000;
        $config['overwrite']            = true;
        $config['encrypt_name']         = true;
        $config['remove_spaces']        = true;

        $this->load->library('upload', $config);

        $doc_files = $_FILES['doc_file'];

        $error_file = null;

        $int_er_file = 0;

        foreach ($doc_files['name'] as $key => $doc_file) {
            $_FILES['doc_file[]']['name']= $doc_files['name'][$key];
            $_FILES['doc_file[]']['type']= $doc_files['type'][$key];
            $_FILES['doc_file[]']['tmp_name']= $doc_files['tmp_name'][$key];
            $_FILES['doc_file[]']['error']= $doc_files['error'][$key];
            $_FILES['doc_file[]']['size']= $doc_files['size'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('doc_file[]')) {

                $data_upload = $this->upload->data();
                //$g_project_doc = $this->cms->getSingularData('g_project_doc', 'PROJECT_ID', $this->input->post('project_id'));

                // if ($g_project_doc->num_rows() > 0) {//Kalo udah ada file di project ini, file & recordnya dihapus
                //     $path_to_file = './assets/upload/docs/'.$g_project_doc->row()->FILE_ADDRESS;
                //     unlink($path_to_file);
                //     $this->cms->deleteGeneralData('g_project_doc', 'PROJECT_ID', $this->input->post('project_id'));
                // }


                if ($this->input->post('doc_type_select')=='r8keombgxgf82xww9ym') {
                    //Tambah jenis dokumen baru
                    $arr_m_document = array(
                        'KODE_JENIS_DOKUMEN' => 'xxx',
                        'NAMA_JENIS_DOKUMEN' => $this->input->post('doc_type_input'),
                        'STATUS' => 'ACTIVE',
                    ); 
                    $query_add_m_document = $this->cms->insertGeneralData('m_document', $arr_m_document);
                    $id_m_document = $this->db->insert_id();

                    if ($query_add_m_document) {
                        
                        $editmDocArr = array(
                            'KODE_JENIS_DOKUMEN' =>  $id_m_document,
                        );
                        $query_editmDocArr = $this->cms->updateGeneralData('m_document', $editmDocArr, 'REC_ID', $id_m_document);

                        if ($query_editmDocArr) {
                            if (null == $this->input->post('task_id')) {
                                $miles_id = 0;
                                $tas_id = 0;
                            }else{
                                $miles_id = $this->input->post('milestone_id');
                                $tas_id = $this->input->post('task_id');
                            }
                            $arr_project_doc = array(
                                'KODE_JENIS_DOKUMEN' => $id_m_document,
                                'PROJECT_ID' => $this->input->post('project_id'),
                                'MILESTONE_ID' => $miles_id,
                                'TASK_ID' => $tas_id,
                                'USER_ID' => $this->session->userdata('user_id'),
                                'FILE_NAME' => $data_upload['orig_name'],
                                'FILE_ADDRESS' => $data_upload['file_name']
                            ); 
                            $query_uploadDokumen = $this->cms->insertGeneralData('g_project_doc', $arr_project_doc);

                        }

                    }

                }else{
                    //Input aja gk perlu tambah jenis dokumen baru

                    if (null == $this->input->post('task_id')) {
                        $miles_id = 0;
                        $tas_id = 0;
                    }else{
                        $miles_id = $this->input->post('milestone_id');
                        $tas_id = $this->input->post('task_id');
                    }

                    $arr_project_doc = array(
                        'KODE_JENIS_DOKUMEN' => $this->input->post('doc_type_select'),
                        'PROJECT_ID' => $this->input->post('project_id'),
                        'MILESTONE_ID' => $miles_id,
                        'TASK_ID' => $tas_id,
                        'USER_ID' => $this->session->userdata('user_id'),
                        'FILE_NAME' => $data_upload['orig_name'],
                        'FILE_ADDRESS' => $data_upload['file_name']
                    ); 
                    $query_uploadDokumen = $this->cms->insertGeneralData('g_project_doc', $arr_project_doc);
                }


            } else {
                $error_file[$int_er_file]['msg'] = $this->upload->display_errors();
                $error_file[$int_er_file]['filename'] = $_FILES['doc_file[]']['name'];
                $int_er_file++;

            }

            

        }

        if ($error_file != null) {
            foreach ($error_file as $error_msg) {
                    echo "==============================================";
                    echo "<br>";
                    echo "File dengan nama :";
                    echo $error_msg['filename'];
                    echo "<br>";
                    echo "Memiliki error : ";
                    echo str_replace(['<p>', '</p>'], '', $error_msg['msg']);
                    echo "<br>";
                    echo "==============================================";
                    echo "<br>";
                }   

            echo "<a href='".base_url('project')."'>Kembali</a>";
        }
        else{
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('project'));
        }

        


    }


    public function deleteFile(){
        $recid = $this->input->post('REC_ID');
        $file = $this->cms->getSingularData('g_project_doc', 'REC_ID', $recid);
        $file_addr = $file->row()->FILE_ADDRESS;

        $hapus_file = unlink("./assets/upload/docs/$file_addr");
        $hapus_row = $this->cms->deleteGeneralData('g_project_doc', 'REC_ID', $recid);

        header('Content-Type: application/json');
        if ($hapus_file && $hapus_row) {
            echo json_encode(array(
                'code'      => 200,
                'status'    => 'success',
            ));
        }else{
            echo json_encode(array(
                'code'      => 204,
                'status'    => 'error',
            ));
        }
    }

    
}
