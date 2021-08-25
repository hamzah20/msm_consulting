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
		$data['companies'] = $this->cms->getGeneralList('v_g_companies');
		$data['counter']   = 1;

		$this->load->view('cms/company/profil_perusahaan', $data);
	}

	public function addCompany()
	{
		// $this->output->enable_profiler(TRUE);

		$companyOrder = $this->general->generateID('COMPANY');
		$companyID    = $this->incube->generateID(10);

		$companyArr = array(
			'COMPANY_NO'	=> $companyOrder,
			'COMPANY_ID'	=> $companyID,
			'COMPANY_NAME'	=> $this->input->post('nama_perusahaan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> 'ACTIVE',
		);

		$detailArr = array(
			'COMPANY_ID'		=> $companyID,
			'COMPANY_NAME'		=> '',
			'COMPANY_LEAD'		=> '',
			'COMPANY_PHONE'		=> '',
			'COMPANY_FAX'		=> '',
			'COMPANY_EMAIL'		=> '',
			'COMPANY_ADDRESS'	=> '',
			'NPWP'				=> '',
		);

		$docsArrNPWP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'NPWP',
			'DOC_NAME'			=> 'NPWP',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrSKT = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'SKT',
			'DOC_NAME'			=> 'Surat Keterangan Terdaftar',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrTDP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'TDP',
			'DOC_NAME'			=> 'Tanda Daftar Perusahaan',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrSIUP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'SIUP',
			'DOC_NAME'			=> 'Surat Ijin Usaha Perdagangan',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrNIB = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'NIB',
			'DOC_NAME'			=> 'Nomor Induk Berusaha',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrAPPP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'APP',
			'DOC_NAME'			=> 'Akta Pendirian Perusahaan',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrAPBP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'APBP',
			'DOC_NAME'			=> 'Akta Perubahan Perusahaan',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrASPP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'ASPP',
			'DOC_NAME'			=> 'Akta Sewa/Pinjam Pakai',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrSKB = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'SKB',
			'DOC_NAME'			=> 'Surat Keterangan Bebas',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrSTL = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'STL',
			'DOC_NAME'			=> 'Sertifikat Elektronik',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrSKDU = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'SKDU',
			'DOC_NAME'			=> 'Surat Keterangan Domisili Usaha',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrEff = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'EFIN',
			'DOC_NAME'			=> 'Electronic Filling Identification Number',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrDir1 = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'KTP',
			'DOC_NAME'			=> 'KTP Direktur',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$docsArrDir2 = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'NPWPD',
			'DOC_NAME'			=> 'NPWP Direktur',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$picArr = array(
			'COMPANY_ID'		=> $companyID,
			'PIC_NAME'			=> '',
			'PIC_NIK'			=> '',
			'PIC_NPWP'			=> '',
			'PIC_POSITION'		=> '',
			'PIC_NATIONALITY'	=> '',
			'PIC_ADDRESS'		=> ''
		);

		$efacArr = array(
			'COMPANY_ID'				=> $companyID,
			'EFACTURE_USER'				=> '',
			'EFACTURE_PASS'				=> '',
			'EFACTURE_SALT'				=> '',
			'EFACTURE_ACTIVATION_CODE'	=> '',
			'EFACTURE_ACTIVATION_PASS'	=> '',
			'EFACTURE_EMAIL'			=> '',
			'EFACTURE_EMAIL_PASS'		=> '',
			'ENOFA_PASS'				=> '',
			'EPHRASE_PASS'				=> '',
			'SSE_EMAIL'					=> '',
			'SSE_PASS'					=> '',
			'CLIENT_EMAIL'				=> '',
			'CLIENT_EMAIL_PASS'			=> '',
			'CLIENT_PIC'				=> '',
			'HANDLED_BY'				=> '',
			'PPHCOUNT_METHOD'			=> ''
		);

		$taxArr = array(
			'COMPANY_ID'		=> $companyID,
			'TAX_KPP_ADMIN'		=> '',
			'TAX_KPP_PHONE'		=> '',
			'TAX_ACCOUNT_REP'	=> '',
			'TAX_WP_STATUS'		=> '',
			'TAX_PKP_STATUS'	=> '',
		);


		$wpArr = array(
			'COMPANY_ID'		=> $companyID,
			'WP_NAME'			=> '',
			'WP_NPWP'			=> '',
			'WP_PHONE'			=> '',
			'WP_BUSINESS_TYPE'	=> '',
			'WP_DJP_EMAIL'		=> '',
			'WP_ADDRESS'		=> '',
		);



		$this->db->trans_begin();

		$this->cms->insertGeneralData('g_company', $companyArr);
		$this->cms->insertGeneralData('g_company_detail', $detailArr);
		$this->cms->insertGeneralData('g_company_docs', $docsArrNPWP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrSKT);
		$this->cms->insertGeneralData('g_company_docs', $docsArrTDP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrSIUP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrNIB);
		$this->cms->insertGeneralData('g_company_docs', $docsArrAPPP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrAPBP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrASPP);
		$this->cms->insertGeneralData('g_company_docs', $docsArrSKB);
		$this->cms->insertGeneralData('g_company_docs', $docsArrSTL);
		$this->cms->insertGeneralData('g_company_docs', $docsArrSKDU);
		$this->cms->insertGeneralData('g_company_docs', $docsArrEff);
		$this->cms->insertGeneralData('g_company_docs', $docsArrDir1);
		$this->cms->insertGeneralData('g_company_docs', $docsArrDir2);
		$this->cms->insertGeneralData('g_efacture', $efacArr);
		$this->cms->insertGeneralData('g_pic_info', $picArr);
		$this->cms->insertGeneralData('g_tax_info', $taxArr);
		$this->cms->insertGeneralData('g_wp_identity', $wpArr);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('query', 'error');
			redirect('company_profile');
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('query', 'success');
			redirect('company_profile');
		}
	}

	// DETAIL PROFIL PERUSAHAAN
	public function detail_profil_perusahaan()
	{
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/company/detail_profil_perusahaan', $data);
		}
	}

	// EDIT PROFIL PERUSAHAAN
	public function edit_profil_perusahaan()
	{
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/company/edit_profil_perusahaan', $data);
		}
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

	public function delete_karyawan_perusahaan()
	{
		$this->load->view('modal/delete_karyawan_perusahaan');
	}
}
