<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utility extends CI_Controller
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
	public function add_kantor_pelayanan_pajak()
	{
		$this->load->view('cms/add_kantor_pelayanan_pajak');
	}
	public function detail_kantor_pelayanan_pajak()
	{
		$this->load->view('cms/detail_kantor_pelayanan_pajak');
	}
	public function edit_kantor_pelayanan_pajak()
	{
		$this->load->view('cms/edit_kantor_pelayanan_pajak');
	}

	// VENDOR
	public function vendors()
	{
		$this->load->view('cms/vendors');
	}
	public function add_vendors()
	{
		$this->load->view('cms/add_vendors');
	}
	public function detail_vendors()
	{
		$this->load->view('cms/detail_vendors');
	}
	public function edit_vendors()
	{
		$this->load->view('cms/edit_vendors');
	}

	// MSM Group
	public function msm_group()
	{
		$this->load->view('cms/msm_group');
	}
	public function add_msm_group()
	{
		$this->load->view('cms/add_msm_group');
	}
	public function detail_msm_group()
	{
		$this->load->view('cms/detail_msm_group');
	}
	public function edit_msm_group()
	{
		$this->load->view('cms/edit_msm_group');
	}


	 
}
