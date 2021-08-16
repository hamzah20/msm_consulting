<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->view('cms/dashboard');
	}

	// KANTOR PELAYANAN PAJAK
	public function kantor_pelayanan_pajak()
	{
		$this->load->view('cms/kantor_pelayanan_pajak');
	}

	 


	 
}
