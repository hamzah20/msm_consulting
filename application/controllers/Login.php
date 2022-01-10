<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	 public function __construct()
    {
        parent::__construct(); 
    }
	public function index()
	{
		$this->load->view('cms/login');
	}

	public function auth()
	{
		//auth for debug purposes only.
		$input_username = $this->input->post('username');
		$input_password = $this->input->post('password');

		//$data_user = $this->cms->getSingularDataDetail('s_user', 'ID', 'PASS', $input_username, $input_password);

		$data_user = $this->cms->getSingularData('s_user', 'ID', $input_username);

		if ($data_user->row()->GROUP_ID == 'ADMIN' || $data_user->row()->GROUP_ID == 'SUPERUSER' ) {
			$elev = true;
		} else{
			$elev = false;
		}

		$sess_data = array(
			'user_group_id'  => $data_user->row()->GROUP_ID,
			'user_id'     => $data_user->row()->ID,
			'user_rec_id' => $data_user->row()->REC_ID,
			'elevated_group' => $elev,
		);

		$this->session->set_userdata($sess_data);

		redirect(base_url('Dashboard/index'));
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}
