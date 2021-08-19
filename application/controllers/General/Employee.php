<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    // KARYAWAN
    public function index()
    {
        $data['companies'] = $this->cms->getGeneralList('v_g_companies');
        $data['counter']   = 1;

        $this->load->view('cms/employee/karyawan', $data);
    }

    public function karyawan_perusahaan()
    {
        $data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

        if ($data['company']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('employee');
        } else {
            $this->load->view('cms/employee/karyawan_perusahaan');
        }
    }

    public function edit_karyawan_perusahaan()
    {
        $data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));

        if ($data['company']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('employee');
        } else {
            $this->load->view('cms/edit_karyawan_perusahaan');
        }
    }
}
