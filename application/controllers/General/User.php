<?php
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

    public function index()
    {
    		$data['s_user'] = $this->cms->GetGeneralList('s_user');
            $this->load->view('cms/user/user', $data);
    }

    public function addUser()
    {

		$addArr = array(
			'ID' 				=> $this->input->post('id_user'),
			'NAME' 				=> $this->input->post('name_user'),
			'GROUP_ID' 			=> $this->input->post('group_id_user'),
			'STATUS' 			=> $this->input->post('status_user'),
			'ATTEMPTED_LOGIN' 	=> $this->input->post('attempted_login_user')
		); 

        $query_adduser = $this->cms->insertGeneralData('s_user', $addArr);

        if($query_adduser) {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('user_msm'));
        }else {
            $this->session->set_flashdata('query', 'error');
            edirect(base_url('user_msm'));
        }
    }

    public function deleteUser(){
    	// $this->output->enable_profiler(TRUE);
        header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('s_user', 'ID', $this->input->post('userID'));

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

    public function editUser(){
    	$editArr = array(
    		'ID' 				=> $this->input->post('id_user'),
			'NAME' 				=> $this->input->post('name_user'),
			'GROUP_ID' 			=> $this->input->post('group_id_user'),
			'STATUS' 			=> $this->input->post('status_user'),
			'ATTEMPTED_LOGIN' 	=> $this->input->post('attempted_login_user')
    	);

    	$query_editUser = $this->cms->updateGeneralData('s_user', $editArr, 'ID', $this->input->post('id_user'));

    	if($query_editUser) {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('user_msm'));
        }else {
            $this->session->set_flashdata('query', 'error');
            redirect(base_url('user_msm'));
        }
    }

    public function getUser(){
    	$id = $this->input->get('id');
		$data['s_user'] = $this->cms->getSingularData('s_user', 'ID', $id);

 		$this->load->view('modal/edit_user', $data);
    }
}