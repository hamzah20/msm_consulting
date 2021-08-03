<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct()
    {
        parent::__construct(); 
    }
	public function index()
	{
		$this->load->view('cms/dashboard');
	}

	// Controller Data
	public function profil_perusahaan()
	{
		$this->load->view('cms/profil_perusahaan');
	}
	public function edit_profil_perusahaan()
	{
		$this->load->view('cms/edit_profil_perusahaan');
	}
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
