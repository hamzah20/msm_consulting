<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSM_group extends CI_Controller
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

	// MSM Group
	public function msm_group()
	{
		$data['companies'] = $this->cms->getGeneralList('v_g_msm_group');
		$data['counter']   = 1; 

		$this->load->view('cms/msm_group/msm_group',$data);
	}
	public function add_msm_group()
	{
		$this->load->view('cms/msm_group/add_msm_group');
	}

	public function insert_msm_group()
	{
		// $this->output->enable_profiler(TRUE);

		$companyOrder = $this->general->generateID('MSM_GROUP');
		$companyID    = $this->incube->generateID(10); 

		$msmgroupArr = array(
			'MSMGROUP_NO'	=> $companyOrder, 
			'MSMGROUP_ID'	=> $companyID,
			'MSMGROUP_NAME'	=> $this->input->post('txtPersonil'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> 'ACTIVE',
		);

		$detailArr = array(
			'MSMGROUP_ID'		=> $companyID,
			'MSMGROUP_NAME'		=> $this->input->post('txtPersonil'), 
			'MSMGROUP_PHONE'	=> $this->input->post('txtPhone'),
			'MSMGROUP_FAX'		=> $this->input->post('txtFax'),
			'MSMGROUP_EMAIL'	=> $this->input->post('txtEmail'),
			'MSMGROUP_ADDRESS'	=> $this->input->post('txtAlamat'), 
		);

		$this->cms->insertGeneralData('g_msm_group', $msmgroupArr);
		$this->cms->insertGeneralData('g_msm_group_detail', $detailArr); 

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('query', 'error');
			redirect('msm_group');
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('query', 'success');
			redirect('msm_group');
		}
	}

	public function detail_msm_group()
	{
		$data['company'] = $this->cms->getSingularData('v_g_msm_group', 'MSMGROUP_ID', $this->input->get('cid'));

		if ($data['company']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('msm_group');
		} else {
			$this->load->view('cms/msm_group/detail_msm_group', $data);
		} 
	}
	public function edit_msm_group()
	{
		$data['msm'] = $this->cms->getSingularData('v_g_msm_group', 'MSMGROUP_ID', $this->input->get('mid')); 

        if ($data['msm']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('msm_group');
        } else {
            $this->load->view('cms/msm_group/edit_msm_group', $data);
        }  
	}

	public function update_msm_group()
	{
		$dataUpdate = array( 
			'MSMGROUP_NAME'       => $this->input->post('editNama'),
			'UPDATED'           => date('Y-m-d h:i:s'),
		);
		$dataUpdateDetail = array(
            'MSMGROUP_NAME'       => $this->input->post('editNama'),
            'MSMGROUP_PHONE'      => $this->input->post('editPhone'),
            'MSMGROUP_FAX'   		=> $this->input->post('editFax'),
            'MSMGROUP_EMAIL'      => $this->input->post('editEmail'),
            'MSMGROUP_ADDRESS'    => $this->input->post('editAlamat'), 
        );

        $queryUpdate 		= $this->cms->updateGeneralData('g_msm_group', $dataUpdate, 'MSMGROUP_ID', $this->input->post('msmgroupID'));
        $queryUpdateDetail 	= $this->cms->updateGeneralData('g_msm_group_detail', $dataUpdateDetail, 'MSMGROUP_ID', $this->input->post('msmgroupID'));

        if ($queryUpdate && $queryUpdateDetail) {
            $this->session->set_flashdata('msm_update', 'success');
            redirect(base_url('msm_group/edit?mid=' . $this->input->post('msmgroupID')));
        } else {
            $this->session->set_flashdata('msm_update', 'error');
            redirect(base_url('msm_group/edit?mid=' . $this->input->post('msmgroupID')));
        }
	}
	 
}
