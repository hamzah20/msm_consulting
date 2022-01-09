<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);

	}
	public function index()
	{
		// buat debug, gonta ganti akun disini yaa...
        $data['user_group_id'] = $this->session->userdata('user_group_id');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['user_rec_id'] = $this->session->userdata('user_rec_id');
        $data['elevated_group'] = $this->session->userdata('elevated_group');

        // $data['user_group_id'] = 'USER';
        // $data['user_id'] = 'Rifaldi Setiawan';
        // $data['user_rec_id'] = '16';
        // $data['elevated_group'] = false;

		$data['waiting_approval'] = $this->cms->getSingularData('v_g_project_detail', 'STATUS', 'WAITING FOR APPROVAL');
		@$data['s_user'] = $this->cms->getSingularData('s_user', 'REC_ID', $data['waiting_approval']->row()->PIC);


		$this->db->select('*')
            ->from('v_g_project_detail')
            ->where('USER_REC_ID', $data['user_rec_id'])
            ->where('STATUS', 'ONPROGRESS')
            ->order_by('END_DATE', 'ASC');

        $query_my_pending_ct = $this->db->get();

		$data['my_pending_custom_task'] = $query_my_pending_ct;



		$this->load->view('cms/dashboard', $data);


	}

	public function auth(){
		//auth for debug purposes only.
		$input_username = $this->input->post('username');
		$input_password = $this->input->post('password');

		//$data_user = $this->cms->getSingularDataDetail('s_user', 'ID', 'PASS', $input_username, $input_password);

		$data_user = $this->cms->getSingularData('s_user', 'ID', $input_username);

		if ($data_user->row()->GROUP_ID == 'ADMIN' || $data_user->row()->GROUP_ID == 'SUPERUSER' ) {
			$elev = true;
		} else{
			$elev = false;
		}

		$sess_data = array(
			'user_group_id'  => $data_user->row()->GROUP_ID,
			'user_id'     => $data_user->row()->ID,
			'user_rec_id' => $data_user->row()->REC_ID,
			'elevated_group' => $elev,
		);

		$this->session->set_userdata($sess_data);

		redirect(base_url('Dashboard/index'));

	}
	// public function tesdebug(){
	// 	echo $this->incube->get_working_hours('2016-10-10 08:00:00', '2016-10-10 21:00:00');
	// }
}
?>