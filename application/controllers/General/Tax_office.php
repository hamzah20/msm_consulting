<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tax_office extends CI_Controller
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
		$data['companies'] = $this->cms->getGeneralList('v_g_tax_office');
		$data['counter']   = 1;
 
		$this->load->view('cms/tax_office/kantor_pelayanan_pajak',$data);
	}
	
	public function add_kantor_pelayanan_pajak()
	{
		$this->load->view('cms/tax_office/add_kantor_pelayanan_pajak');
	}

	public function insert_kantor_pelayanan_pajak()
	{
		// $this->output->enable_profiler(TRUE);

		$companyOrder = $this->general->generateID('TAX_OFFICE');
		$companyID    = $this->incube->generateID(10); 

		$taxofficeArr = array(
			'OFFICE_NO'		=> $companyOrder,
			'OFFICE_KPP'	=> 'KPP',
			'OFFICE_ID'		=> $companyID,
			'OFFICE_NAME'	=> $this->input->post('txtOfficeTax'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> 'ACTIVE',
		);

		$detailArr = array(
			'OFFICE_ID'			=> $companyID,
			'OFFICE_NAME'		=> $this->input->post('txtOfficeTax'),
			'CATEGORY'			=> 'KPP',
			'OFFICE_PHONE'		=> $this->input->post('txtPhone'),
			'OFFICE_FAX'		=> $this->input->post('txtFax'),
			'OFFICE_EMAIL'		=> $this->input->post('txtEmail'),
			'OFFICE_ADDRESS'	=> $this->input->post('txtAlamat'), 
		);

		$this->cms->insertGeneralData('g_tax_office', $taxofficeArr);
		$this->cms->insertGeneralData('g_tax_office_detail', $detailArr); 

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('query', 'error');
			redirect('kantor_pelayanan_pajak');
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('query', 'success');
			redirect('kantor_pelayanan_pajak');
		}
	}

	public function detail_kantor_pelayanan_pajak()
	{
		$data['tax'] = $this->cms->getSingularData('v_g_tax_office', 'OFFICE_ID', $this->input->get('cid'));

		if ($data['tax']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('kantor_pelayanan_pajak');
		} else {
			$this->load->view('cms/tax_office/detail_kantor_pelayanan_pajak', $data);
		} 
	}

	public function edit_kantor_pelayanan_pajak()
	{
		$data['tax'] = $this->cms->getSingularData('v_g_tax_office', 'OFFICE_ID', $this->input->get('tid')); 

        if ($data['tax']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('kantor_pelayanan_pajak');
        } else {
            $this->load->view('cms/tax_office/edit_kantor_pelayanan_pajak', $data);
        } 
	}

	public function update_kantor_pelayanan_pajak()
	{
		$dataUpdate = array(
			'OFFICE_KPP'        => $this->input->post('editKodeKPP'),
			'OFFICE_NAME'       => $this->input->post('editNama'),
			'UPDATED'           => date('Y-m-d h:i:s'),
		);
		$dataUpdateDetail = array(
            'OFFICE_NAME'       => $this->input->post('editNama'),
            'OFFICE_PHONE'      => $this->input->post('editPhone'),
            'OFFICE_FAX'   		=> $this->input->post('editFax'),
            'OFFICE_EMAIL'      => $this->input->post('editEmail'),
            'OFFICE_ADDRESS'    => $this->input->post('editAlamat'), 
        );

        $queryUpdate 		= $this->cms->updateGeneralData('g_tax_office', $dataUpdate, 'OFFICE_ID', $this->input->post('taxofficeID'));
        $queryUpdateDetail 	= $this->cms->updateGeneralData('g_tax_office_detail', $dataUpdateDetail, 'OFFICE_ID', $this->input->post('taxofficeID'));

        if ($queryUpdate && $queryUpdateDetail) {
            $this->session->set_flashdata('tax_update', 'success');
            redirect(base_url('kantor_pelayanan_pajak/edit?tid=' . $this->input->post('taxofficeID')));
        } else {
            $this->session->set_flashdata('tax_update', 'error');
            redirect(base_url('kantor_pelayanan_pajak/edit?tid=' . $this->input->post('taxofficeID')));
        }
	}

	 
}
