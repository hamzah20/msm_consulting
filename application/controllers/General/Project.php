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

        
        $data['project_list'] = $this->cms->getGeneralList('g_project');

        $data['project_type'] = $this->cms->getGeneralList('gm_project_type');
        $this->load->view('cms/project/project', $data);
    }
    public function testing(){
        $this->output->enable_profiler(true);
        $data_task_success = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'STATUS', 'ac76981ca4', 'SUCCESS');
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
                        'STATUS' => 'ONPROGRESS',
                        'CREATED' => date('Y-m-d H:i:s'),
                        'UPDATED' => $this->input->post('attempted_login_user')
                    ); 
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
        $this->load->view('modal/add_project_getptype', $data);
    }

    public function getUploadDokumen()
    {
        $id = $this->input->get('id_project');
        $data['project'] = $this->cms->getSingularData('g_project', 'REC_ID', $id);
        $data['document_type'] = $this->cms->getGeneralList('m_document');
        $this->load->view('modal/upload_dokumen_project', $data);
    }

    public function lihatDokumen()
    {
        $id_project = $this->input->get('id_project');
        $data['dokumen_list']=$this->cms->getSingularData('g_project_doc', 'PROJECT_ID', $id_project);
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

    public function uploadDokumen()
    {
        $this->output->enable_profiler(true);

        $config['upload_path']          = './assets/upload/docs/';
        $config['allowed_types']        = '*';
        $config['overwrite']            = true;
        $config['encrypt_name']         = true;
        $config['remove_spaces']        = true;

        $this->load->library('upload', $config);

        $doc_files = $_FILES['doc_file'];

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
                            
                            $arr_project_doc = array(
                                'KODE_JENIS_DOKUMEN' => $id_m_document,
                                'PROJECT_ID' => $this->input->post('project_id'),
                                'FILE_NAME' => $data_upload['orig_name'],
                                'FILE_ADDRESS' => $data_upload['file_name']
                            ); 
                            $query_uploadDokumen = $this->cms->insertGeneralData('g_project_doc', $arr_project_doc);


                        }

                    }

                }else{
                    //Input aja gk perlu tambah jenis dokumen baru
                    $arr_project_doc = array(
                        'KODE_JENIS_DOKUMEN' => $this->input->post('doc_type_select'),
                        'PROJECT_ID' => $this->input->post('project_id'),
                        'FILE_NAME' => $data_upload['orig_name'],
                        'FILE_ADDRESS' => $data_upload['file_name']
                    ); 
                    $query_uploadDokumen = $this->cms->insertGeneralData('g_project_doc', $arr_project_doc);
                }


            } else {
                echo $this->upload->display_errors();
            }

        }


    }

    
}
