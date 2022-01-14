<?php
class Ptkp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

    public function index()
    {
    		$data['m_ptkp'] = $this->cms->GetGeneralList('m_ptkp');
            $this->load->view('cms/settings/ptkp', $data);
    }

    public function addPTKP()
    {

		$addArr = array(
			'TK_ID'      => $this->input->post('TK_ID'),
			'TK_NAME'    => $this->input->post('TK_NAME'),
			'TK_TARIF'   => $this->input->post('TK_TARIF'),
			'TK_ORDER'   => $this->input->post('TK_ORDER'),
            'PERIOD_YEAR'=> $this->input->post('PERIOD_YEAR')
		); 

        $query_addPTKP = $this->cms->insertGeneralData('m_ptkp', $addArr);

        if($query_addPTKP) {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('ptkp'));
        }else {
            $this->session->set_flashdata('query', 'error');
            redirect(base_url('ptkp'));
        }
    }

    public function deletePTKP(){
    	// $this->output->enable_profiler(TRUE);
        header('Content-Type: application/json');

        $queryDelete = $this->cms->deleteGeneralData('m_ptkp', 'REC_ID', $this->input->post('REC_ID'));

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

    public function editPTKP(){
    	$editArr = array(
    		'TK_ID'      => $this->input->post('TK_ID'),
            'TK_NAME'    => $this->input->post('TK_NAME'),
            'TK_TARIF'   => $this->input->post('TK_TARIF'),
            'TK_ORDER'   => $this->input->post('TK_ORDER'),
            'PERIOD_YEAR'=> $this->input->post('PERIOD_YEAR')
    	);

    	$query_editUser = $this->cms->updateGeneralData('m_ptkp', $editArr, 'REC_ID', $this->input->post('REC_ID'));

    	if($query_editUser) {
            $this->session->set_flashdata('query', 'success');
            redirect(base_url('ptkp'));
        }else {
            $this->session->set_flashdata('query', 'error');
            redirect(base_url('ptkp'));
        }
    }

    public function getPTKP(){
    	$rec_id = $this->input->get('id');
		$data['m_ptkp'] = $this->cms->getSingularData('m_ptkp', 'REC_ID', $rec_id);

 		$this->load->view('modal/edit_ptkp', $data);
    }
}