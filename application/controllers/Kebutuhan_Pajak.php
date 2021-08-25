<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kebutuhan_Pajak extends CI_Controller
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

	// PPH 21
	public function pph_21()
	{ 
		$this->load->view('cms/hitung_pajak/pph21');
	}

	public function pph_21_bulan()
	{ 
		$this->load->view('cms/hitung_pajak/pph21_bulan');
	}

	public function pph_21_tahun()
	{ 
		$this->load->view('cms/hitung_pajak/pph21_tahun');
	}

	public function pph_21_bulan_summary()
	{ 
		$this->load->view('cms/hitung_pajak/pph21_bulan_summary');
	}

	public function pph_21_bulan_summary_karyawan()
	{ 
		$this->load->view('cms/hitung_pajak/pph21_bulan_summary_karyawan');
	}

	public function aktifitas_pajak()
	{ 
		$this->load->view('cms/hitung_pajak/pph21_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{ 
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}
}
?>