<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);

	}
	public function index()
	{
		$data['waiting_approval'] = $this->cms->getSingularData('g_project_detail', 'STATUS', 'WAITING FOR APPROVAL');
		@$data['s_user'] = $this->cms->getSingularData('s_user', 'REC_ID', $data['waiting_approval']->row()->PIC);
		$this->load->view('cms/dashboard', $data);
	}
}
?>