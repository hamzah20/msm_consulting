<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendors extends CI_Controller
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

	// VENDOR
	public function vendors()
	{
		$data['companies'] = $this->cms->getGeneralList('v_g_vendors');
		$data['counter']   = 1;
 
		$this->load->view('cms/vendors/vendors',$data); 
	}
	
	public function add_vendors()
	{
		$this->load->view('cms/vendors/add_vendors');
	}
	public function delete_vendors()
	{
		header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('g_vendors', 'VENDOR_ID', $this->input->post('vendorID'));
        $queryDelete2 = $this->cms->deleteGeneralData('g_vendors_detail', 'VENDOR_ID', $this->input->post('vendorID'));

        if ($queryDelete) {
            echo json_encode(array(
                'code'      => 200,
                'status'    => 'success',
            ));
        } else {
            echo json_encode(array(
                'code'      => 204,
                'status'    => 'error',
            ));
        }
	}
	public function insert_vendors()
	{
		// $this->output->enable_profiler(TRUE);

		$companyOrder = $this->general->generateID('VENDORS');
		$companyID    = $this->incube->generateID(10); 

		$vendorsArr = array(
			'VENDOR_NO'		=> $companyOrder, 
			'VENDOR_ID'		=> $companyID,
			'VENDOR_NAME'	=> $this->input->post('txtVendor'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> 'ACTIVE',
		);

		$detailArr = array(
			'VENDOR_ID'			=> $companyID,
			'VENDOR_NAME'		=> $this->input->post('txtVendor'), 
			'VENDOR_PHONE'		=> $this->input->post('txtPhone'),
			'VENDOR_FAX'		=> $this->input->post('txtFax'),
			'VENDOR_EMAIL'		=> $this->input->post('txtEmail'),
			'VENDOR_ADDRESS'	=> $this->input->post('txtAlamat'), 
		);

		$this->cms->insertGeneralData('g_vendors', $vendorsArr);
		$this->cms->insertGeneralData('g_vendors_detail', $detailArr); 

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('query', 'error');
			redirect('vendors');
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('query', 'success');
			redirect('vendors');
		}
	}
	public function detail_vendors()
	{
		$data['vendors'] = $this->cms->getSingularData('v_g_vendors', 'VENDOR_ID', $this->input->get('vid'));

		if ($data['vendors']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect('vendors');
		} else {
			$this->load->view('cms/vendors/detail_vendors', $data);
		}  
	}
	public function edit_vendors()
	{
		$data['vendors'] = $this->cms->getSingularData('v_g_vendors', 'VENDOR_ID', $this->input->get('vid')); 

        if ($data['vendors']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('vendors');
        } else {
            $this->load->view('cms/vendors/edit_vendors', $data);
        }  
	} 

	public function update_vendors()
	{
		$dataUpdate = array( 
			'VENDOR_NAME'       => $this->input->post('editNama'),
			'UPDATED'           => date('Y-m-d h:i:s'),
		);
		$dataUpdateDetail = array(
            'VENDOR_NAME'       => $this->input->post('editNama'),
            'VENDOR_PHONE'      => $this->input->post('editPhone'),
            'VENDOR_FAX'   		=> $this->input->post('editFax'),
            'VENDOR_EMAIL'      => $this->input->post('editEmail'),
            'VENDOR_ADDRESS'    => $this->input->post('editAlamat'), 
        );

        $queryUpdate 		= $this->cms->updateGeneralData('g_vendors', $dataUpdate, 'VENDOR_ID', $this->input->post('vendorsID'));
        $queryUpdateDetail 	= $this->cms->updateGeneralData('g_vendors_detail', $dataUpdateDetail, 'VENDOR_ID', $this->input->post('vendorsID'));

        if ($queryUpdate && $queryUpdateDetail) {
            $this->session->set_flashdata('vendor_update', 'success');
            redirect(base_url('vendors/edit?vid=' . $this->input->post('vendorsID')));
        } else {
            $this->session->set_flashdata('vendor_update', 'error');
            redirect(base_url('vendors/edit?vid=' . $this->input->post('vendorsID')));
        }
	}
	 
}
