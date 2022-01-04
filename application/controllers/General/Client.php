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

		$docsArrSPPKP = array(
			'COMPANY_ID'		=> $companyID,
			'DOC_ID'			=> 'SPPKP',
			'DOC_NAME'			=> 'Surat Pengukuhan Pengusaha Kena Pajak',
			'DOC_STATUS'		=> '',
			'DOC_PATH'			=> ''
		);

		$taxcalculateArr = array(
			'COMPANY_ID'		=> $companyID,
			'TAX_21'			=> '', 
			'TAX_21_1'			=> '', 
			'TAX_21_2'			=> '', 
			'TAX_21_3'			=> '', 
			'TAX_22'			=> '', 
			'TAX_22_1'			=> '', 
			'TAX_22_2'			=> '', 
			'TAX_22_3'			=> '', 
			'TAX_23'			=> '', 
			'TAX_23_1'			=> '', 
			'TAX_23_2'			=> '', 
			'TAX_23_3'			=> '', 
			'TAX_42'			=> '', 
			'TAX_42_1'			=> '', 
			'TAX_42_2'			=> '', 
			'TAX_42_3'			=> '', 
			'TAX_25'			=> '', 
			'TAX_25_1'			=> '', 
			'TAX_25_2'			=> '', 
			'TAX_25_3'			=> '', 
			'TAX_PPN'			=> '', 
			'TAX_PPN_1'			=> '', 
			'TAX_PPN_2'			=> '', 
			'TAX_PPN_3'			=> '', 
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
			'WP_CATEGORY'		=> '',
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
		$this->cms->insertGeneralData('g_tax_calculate', $taxcalculateArr);
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

	public function delete_profil_perusahaan()
	{
		$del_company        = $this->cms->deleteGeneralData('g_company', 'COMPANY_ID', $this->input->get('cid'));
		$del_company_detail = $this->cms->deleteGeneralData('g_company_detail', 'COMPANY_ID', $this->input->get('cid'));
		$del_company_docs   = $this->cms->deleteGeneralData('g_company_docs', 'COMPANY_ID', $this->input->get('cid'));
		$del_efacture       = $this->cms->deleteGeneralData('g_efacture', 'COMPANY_ID', $this->input->get('cid'));
		$del_wp_identity    = $this->cms->deleteGeneralData('g_wp_identity', 'COMPANY_ID', $this->input->get('cid'));
		$del_pic_info       = $this->cms->deleteGeneralData('g_pic_info', 'COMPANY_ID', $this->input->get('cid'));

		if ($del_company && $del_company_detail && $del_company_docs && $del_efacture && $del_wp_identity && $del_pic_info) {
            $this->session->set_flashdata('profil_perusahaan', 'delete');
            redirect(base_url('company_profile'));
        } else {
            $this->session->set_flashdata('profil_perusahaan', 'error');
            redirect(base_url('company_profile'));
        }

	}

	public function update_profil_perusahaan()
	{
		$data_company_detail = array( 
			'NPWP' 						=> $this->input->post('editNPWP'),
			'COMPANY_NAME' 				=> $this->input->post('editNamaPerusahaan'),
			'COMPANY_LEAD' 				=> $this->input->post('editPimpinanPerusahaan'),
			'COMPANY_PHONE' 			=> $this->input->post('editNoTelpon'),
			'COMPANY_FAX' 				=> $this->input->post('editNoFaksimile'),
			'COMPANY_EMAIL' 			=> $this->input->post('editEmail'),
			'COMPANY_ADDRESS' 			=> $this->input->post('editAlamat')
		); 

		$data_efacture = array(  
			'EFACTURE_USER' 			=> $this->input->post('editUserEFaktur'),
			'EFACTURE_PASS' 			=> $this->input->post('editPassEFaktur'),
			'EFACTURE_ACTIVATION_CODE' 	=> $this->input->post('editKodeAktifasi'),
			'EFACTURE_ACTIVATION_PASS' 	=> $this->input->post('editPassAktifasi'),
			'EFACTURE_EMAIL' 			=> $this->input->post('editEmailEFaktur'),
			'EFACTURE_EMAIL_PASS' 		=> $this->input->post('editPassEmailEFaktur'),
			'ENOFA_PASS' 				=> $this->input->post('editPassENofa'),
			'EPHRASE_PASS' 				=> $this->input->post('editPassEPhrase'),
			'SSE_EMAIL' 				=> $this->input->post('editEmailSSEDJP'),
			'SSE_PASS' 					=> $this->input->post('editPassEmailSSEDJP'),
			'CLIENT_EMAIL' 				=> $this->input->post('editEmailClient'),
			'CLIENT_EMAIL_PASS' 		=> $this->input->post('editPassClient'),
			'CLIENT_PIC' 				=> $this->input->post('editPIC'),
			'HANDLED_BY' 				=> $this->input->post('editDitangani'),
			'PPHCOUNT_METHOD' 			=> $this->input->post('editMetodePerhitungan')
		);

		$data_company = array(
        	'UPDATED'			=> date('Y-m-d h:i:s')
        );
		
		$query_company_detail = $this->cms->updateGeneralData('g_company_detail', $data_company_detail, 'COMPANY_ID', $this->input->post('editIDCompany')); 
		$query_efacture = $this->cms->updateGeneralData('g_efacture', $data_efacture, 'COMPANY_ID', $this->input->post('editIDCompany')); 
		$query_company  = $this->cms->updateGeneralData('g_company', $data_company, 'COMPANY_ID', $this->input->post('editIDCompany')); 

		// redirect('company_profile/edit/utama?cid=$this->input->post("editIDCompany")');

		if ($query_company_detail && $query_efacture && $query_company) {
            $this->session->set_flashdata('profil_perusahaan', 'success');
            redirect(base_url('company_profile/edit/utama?cid=' . $this->input->post('editIDCompany')));
        } else {
            $this->session->set_flashdata('profil_perusahaan', 'error');
            redirect(base_url('company_profile/edit/utama?cid=' . $this->input->post('editIDCompany')));
        }
	}

	public function detail_hitung_pajak()
	{
		$data['company'] = $this->cms->getSingularData('g_tax_calculate', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/detail_hitung_pajak', $data);
		} 
	}

	// IDENTITAS WP
	public function detail_identitas_wp()
	{ 
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/detail_identitas_wp', $data);
		} 
	}
	public function edit_identitas_wp()
	{
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/edit_identitas_wp', $data);
		} 
	}
	public function update_identitas_wp()
	{
		//echo $this->input->post('editID');

		$dataUpdate = array(
            'WP_NAME'           => $this->input->post('editNama'),  
            'WP_NPWP'           => $this->input->post('editNPWP'),  
            'WP_PHONE'          => $this->input->post('editNoTelpon'),  
            'WP_CATEGORY'       => $this->input->post('editBentukBadan'),  
            'WP_BUSINESS_TYPE'  => $this->input->post('editJenisUsaha'),  
            'WP_DJP_EMAIL'      => $this->input->post('editEmailDJPOnline'),  
            'WP_ADDRESS'        => $this->input->post('editAlamat'),  
        );

        $dataUpdateID = array(
        	'UPDATED'			=> date('Y-m-d h:i:s'),
        );

        $queryUpdate   = $this->cms->updateGeneralData('g_wp_identity', $dataUpdate, 'COMPANY_ID', $this->input->post('editID'));
        $queryUpdateID = $this->cms->updateGeneralData('g_company', $dataUpdateID, 'COMPANY_ID', $this->input->post('editID'));

        if ($queryUpdate && $queryUpdateID) {
            $this->session->set_flashdata('wp_update', 'success');
            redirect(base_url('company_profile/edit/identitas_wp?cid=' . $this->input->post('editID')));
        } else {
            $this->session->set_flashdata('wp_update', 'error');
            redirect(base_url('company_profile/edit/identitas_wp?cid=' . $this->input->post('editID')));
        }
	}

	public function detail_info_perpajakan()
	{
		$data['company'] = $this->cms->getSingularData('g_tax_info', 'COMPANY_ID', $this->input->get('cid'));
		$data['tax_info']   = $this->cms->getSingularData('g_tax_info', 'COMPANY_ID', $this->input->get('cid')); 

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/detail_info_perpajakan', $data);
		}  
	}
	public function detail_identitas_pj()
	{
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/detail_identitas_pj', $data);
		} 
	}
	public function detail_dokumen_elektronik()
	{
		$data['company'] = $this->cms->getSingularData('g_company_docs', 'COMPANY_ID', $this->input->get('cid'));
		$data['npwp']	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'NPWP');
		$data['skt'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'SKT');
		$data['sppkp'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'SKT');
		$data['tdp'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'TDP'); 
		$data['siup'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'SIUP');
		$data['nib'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'NIB');
		$data['app'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'APP');
		$data['apbp'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'APBP');
		$data['aspp'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'ASPP');
		$data['skb'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'SKB');
		$data['stl'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'STL');
		$data['skdu'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'SKDU');
		$data['efin'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'EFIN');
		$data['ktp'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'KTP');
		$data['npwpd'] 	= $this->cms->getSingularDataDetail('g_company_docs', 'COMPANY_ID', 'DOC_ID', $this->input->get('cid'), 'NPWPD');

		if ($data['npwp']->num_rows() == 0 && $data['skt']->num_rows() == 0 && $data['sppkp']->num_rows() == 0 && $data['tdp']->num_rows() == 0 && $data['siup']->num_rows() == 0 && $data['nib']->num_rows() == 0 && $data['app']->num_rows() == 0 && $data['apbp']->num_rows() == 0 && $data['aspp']->num_rows() == 0 && $data['skb']->num_rows() == 0 && $data['stl']->num_rows() == 0 && $data['skdu']->num_rows() == 0 && $data['efin']->num_rows() == 0 && $data['ktp']->num_rows() == 0 && $data['npwpd']->num_rows() == 0) {
			
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/detail_dokumen_elektronik', $data);
		}  
	} 

	public function edit_hitung_pajak()
	{
		$data['company'] = $this->cms->getSingularData('g_tax_calculate', 'COMPANY_ID', $this->input->get('cid')); 
		$data['list_user']	 = $this->cms->getGeneralList('s_user');


		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/edit_hitung_pajak', $data);
		}  
	}

	public function update_hitung_pajak()
	{
		//echo $this->input->post('editID');

		$queryUpdate = array(
            'TAX_21'              => $this->input->post('editPPH21'),  
            'TAX_21_1'            => $this->input->post('editPPH211'),   
            'TAX_21_2'            => $this->input->post('editPPH212'),   
            'TAX_21_3'            => $this->input->post('editPPH213'), 
            'TAX_22'              => $this->input->post('editPPH22'),  
            'TAX_22_1'            => $this->input->post('editPPH221'),   
            'TAX_22_2'            => $this->input->post('editPPH222'),   
            'TAX_22_3'            => $this->input->post('editPPH223'),   
            'TAX_23'              => $this->input->post('editPPH21'),  
            'TAX_23_1'            => $this->input->post('editPPH231'),   
            'TAX_23_2'            => $this->input->post('editPPH232'),   
            'TAX_23_3'            => $this->input->post('editPPH233'), 
            'TAX_42'              => $this->input->post('editPPH42'),  
            'TAX_42_1'            => $this->input->post('editPPH421'),   
            'TAX_42_2'            => $this->input->post('editPPH422'),   
            'TAX_42_3'            => $this->input->post('editPPH423'), 
            'TAX_25'              => $this->input->post('editPPH25'),  
            'TAX_25_1'            => $this->input->post('editPPH251'),   
            'TAX_25_2'            => $this->input->post('editPPH252'),   
            'TAX_25_3'            => $this->input->post('editPPH253'),
            'TAX_PPN'             => $this->input->post('editPPN'),  
            'TAX_PPN_1'           => $this->input->post('editPPN1'),   
            'TAX_PPN_2'           => $this->input->post('editPPN2'),   
            'TAX_PPN_3'           => $this->input->post('editPPN3'),  
        );

        $queryUpdateID = array(
        	'UPDATED'			=> date('Y-m-d h:i:s'),
        );

        $queryUpdate   = $this->cms->updateGeneralData('g_tax_calculate', $queryUpdate, 'COMPANY_ID', $this->input->post('editIDCompany'));
        $queryUpdateID = $this->cms->updateGeneralData('g_company', $queryUpdateID, 'COMPANY_ID', $this->input->post('editIDCompany'));

        if ($queryUpdate && $queryUpdateID) {
            $this->session->set_flashdata('hitung_pajak', 'success');
            redirect(base_url('company_profile/edit/hitung_pajak?cid=' . $this->input->post('editIDCompany')));
        } else {
            $this->session->set_flashdata('hitung_pajak', 'error');
            redirect(base_url('company_profile/edit/hitung_pajak?cid=' . $this->input->post('editIDCompany')));
        }
	}
	
	public function edit_info_perpajakan()
	{ 
		$data['company']    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid')); 
		$data['tax_info']   = $this->cms->getSingularData('g_tax_info', 'COMPANY_ID', $this->input->get('cid')); 


		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/edit_info_perpajakan', $data);
		} 
	}

	public function update_info_perpajakan()
	{

		$KP=$this->input->post('editKewajibanPerpajakan'); 
		$EKP="";
		foreach ($KP as $key) {
			 $EKP.=$key;
		}

		$data_info_perpajakan = array(
            'TAX_KPP_ADMIN'		=> $this->input->post('editKPP'),  
            'TAX_KPP_PHONE'     => $this->input->post('editNoTelpon'),  
            'TAX_ACCOUNT_REP'   => $this->input->post('editAccRep'),  
            'TAX_WP_STATUS'     => $this->input->post('editStatusWP'),  
            'TAX_PKP_STATUS'  	=> $this->input->post('editStatusPKP'),
            'TAX_OBLIGATION'  	=> $EKP
        );

        $data_company = array(
        	'UPDATED'			=> date('Y-m-d h:i:s'),
        );

        $sql_upt_infopajak = $this->cms->updateGeneralData('g_tax_info', $data_info_perpajakan, 'COMPANY_ID', $this->input->post('editIDCompany'));
        $sql_upd_company   = $this->cms->updateGeneralData('g_company', $data_company, 'COMPANY_ID', $this->input->post('editIDCompany'));

        if ($sql_upt_infopajak && $sql_upd_company) {
            $this->session->set_flashdata('info_perpajakan', 'success');
            redirect(base_url('company_profile/edit/info_perpajakan?cid=' . $this->input->post('editIDCompany')));
        } else {
            $this->session->set_flashdata('info_perpajakan', 'error');
            redirect(base_url('company_profile/edit/info_perpajakan?cid=' . $this->input->post('editIDCompany')));
        }
	}

	public function edit_identitas_pj()
	{
		$data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/edit_identitas_pj', $data);
		}  
	}

	public function update_identitas_pj()
	{
		//echo $this->input->post('editID');

		$data_identitas_pj = array(
            'PIC_NAME'			=> $this->input->post('editNama'),  
            'PIC_NIK'     		=> $this->input->post('editNIK'),  
            'PIC_NPWP'   		=> $this->input->post('editNPWP'),  
            'PIC_POSITION'     	=> $this->input->post('editJabatan'),  
            'PIC_NATIONALITY'  	=> $this->input->post('editKebangsaan'),
            'PIC_ADDRESS'  		=> $this->input->post('editAlamat') 
        );

        $data_company = array(
        	'UPDATED'			=> date('Y-m-d h:i:s'),
        );

        $sql_upt_identitaspj = $this->cms->updateGeneralData('g_pic_info', $data_identitas_pj, 'COMPANY_ID', $this->input->post('editIDCompany'));
        $sql_upd_company     = $this->cms->updateGeneralData('g_company', $data_company, 'COMPANY_ID', $this->input->post('editIDCompany'));


        if ($sql_upt_identitaspj && $sql_upd_company) {
            $this->session->set_flashdata('identitas_pj', 'success');
            redirect(base_url('company_profile/edit/identitas_pj?cid=' . $this->input->post('editIDCompany')));
        } else {
            $this->session->set_flashdata('identitas_pj', 'error');
            redirect(base_url('company_profile/edit/identitas_pj?cid=' . $this->input->post('editIDCompany')));
        }
	}

	public function edit_dokumen_elektronik()
	{
		$data['company']  = $this->cms->getSingularDataLimit('g_company_docs', 'COMPANY_ID', $this->input->get('cid'),5,0);
		$data['company1'] = $this->cms->getSingularDataLimit('g_company_docs', 'COMPANY_ID', $this->input->get('cid'),5,5);
		$data['company2'] = $this->cms->getSingularDataLimit('g_company_docs', 'COMPANY_ID', $this->input->get('cid'),4,10);

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('company_profile');
		} else {
			$this->load->view('cms/edit_dokumen_elektronik',$data);
		}  

	}


	public function update_dokumen_elektronik()
	{

		$company = $this->cms->getSingularData('g_company_docs', 'COMPANY_ID', $this->input->post('company_id'));

		foreach ($company->result() as $key) {
			echo 	$key->DOC_ID;
			echo "<br>";

			echo $_FILES[$key->DOC_ID]['name'];
		}

		$data_identitas_pj = array(

            'PIC_NAME'			=> $this->input->post('editNama'),  
            'PIC_NIK'     		=> $this->input->post('editNIK'),  
            'PIC_NPWP'   		=> $this->input->post('editNPWP'),  
            'PIC_POSITION'     	=> $this->input->post('editJabatan'),  
            'PIC_NATIONALITY'  	=> $this->input->post('editKebangsaan'),
            'PIC_ADDRESS'  		=> $this->input->post('editAlamat') 
        );
	}

	public function delete_karyawan_perusahaan()
	{
		$this->load->view('modal/delete_karyawan_perusahaan');
	}
}
