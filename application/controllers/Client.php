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
}
