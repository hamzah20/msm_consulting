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
		$this->load->view('cms/dashboard', $data);
	}
}
?>