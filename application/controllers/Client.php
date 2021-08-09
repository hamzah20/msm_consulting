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

	// PROFIL PERUSAHAAN
	public function profil_perusahaan()
	{
		$this->load->view('cms/profil_perusahaan');
	}

	// DETAIL PROFIL PERUSAHAAN
	public function detail_profil_perusahaan()
	{
		$this->load->view('cms/detail_profil_perusahaan');
	}
	public function detail_hitung_pajak()
	{
		$this->load->view('cms/detail_hitung_pajak');
	}
	public function detail_identitas_wp()
	{
		$this->load->view('cms/detail_identitas_wp');
	}
	public function detail_info_perpajakan()
	{
		$this->load->view('cms/detail_info_perpajakan');
	}
	public function detail_identitas_pj()
	{
		$this->load->view('cms/detail_identitas_pj');
	}
	public function detail_dokumen_elektronik()
	{
		$this->load->view('cms/detail_dokumen_elektronik');
	}


	// EDIT PROFIL PERUSAHAAN
	public function edit_profil_perusahaan()
	{
		$this->load->view('cms/edit_profil_perusahaan');
	}
	public function edit_hitung_pajak()
	{
		$this->load->view('cms/edit_hitung_pajak');
	}
	public function edit_identitas_wp()
	{
		$this->load->view('cms/edit_identitas_wp');
	}
	public function edit_info_perpajakan()
	{
		$this->load->view('cms/edit_info_perpajakan');
	}
	public function edit_identitas_pj()
	{
		$this->load->view('cms/edit_identitas_pj');
	}
	public function edit_dokumen_elektronik()
	{
		$this->load->view('cms/edit_dokumen_elektronik');
	}


	// KARYAWAN
	public function karyawan()
	{
		$this->load->view('cms/karyawan');
	}
	public function karyawan_perusahaan()
	{
		$this->load->view('cms/karyawan_perusahaan');
	}
	public function edit_karyawan_perusahaan()
	{
		$this->load->view('cms/edit_karyawan_perusahaan');
	}
	public function delete_karyawan_perusahaan()
	{
		$this->load->view('modal/delete_karyawan_perusahaan');
	}
}
