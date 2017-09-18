<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('table');
		ob_start();
		$this->load->library('Session');
		$this->load->helper('cookie');
		$this->load->model('fms_database');
    }
	public function index(){
		$this->load->view('admin/dashboard');
	}

	public function submit_request(){
		$this->load->library('form_validation');
		$config = array(
						array('field' => 'pro_name_info','label' => 'Project Name','rules' => 'trim|required','errors' => array('required' => 'You must provide a %s.')),
						array('field' => 'pro_department_info','label' => 'Select Department','rules' => 'trim|required'),
						array('field' => 'pro_req_method_info','label' => 'Request Method','rules' => 'trim|required'),
					);
		$this->form_validation->set_rules($config);

		if($this->input->post('pro_req_method_info') == 2) {
			$this->form_validation->set_rules( 'pro_email_date', 'Email Date', 'trim|required' );
			$this->form_validation->set_rules( 'pro_email_from', 'Concerned Person (From Name)', 'trim|required' );
		}else if($this->input->post('pro_req_method_info') == 198) {
				$this->form_validation->set_rules( 'pro_letter_no', 'Letter No.', 'trim|required' );
				$this->form_validation->set_rules( 'pro_letter_date', 'Letter Date', 'trim|required' );
				$this->form_validation->set_rules( 'pro_letter_from', 'From Name (Concerned Person)', 'trim|required' );
		}


		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/submit_request');
		}else{
			$postdate = array(
				//'pro_code' => $this->input->post('pro_code'),
				//'pro_code' => 1,
				'pro_name_info' => $this->input->post('pro_name_info'),
				'pro_department_info' => $this->input->post('pro_department_info'),
				'pro_req_method_info' => $this->input->post('pro_req_method_info'),
				'pro_email_date' => $this->input->post('pro_email_date'),
				'pro_email_from' => $this->input->post('pro_email_from'),
				'pro_letter_no' => $this->input->post('pro_letter_no'),
				'pro_letter_date' => $this->input->post('pro_letter_date'),
				'pro_letter_from' => $this->input->post('pro_letter_from'),
			);
			$this->fms_database->insert_pro_req($postdate);
			$this->session->set_flashdata('pro_req_msg','Project details successfully saved!');

			$this->load->view('admin/submit_request');
		}
	}
	public function all_requests() {
		$this->load->library('table');
		$result['view_all_requests'] = $this->fms_database->view_all_requests();
		$this->load->view('admin/all_requests', $result);
	}


	public function add_project() {
		$districts = $this->fms_database->districts();
		foreach($districts as $key => $val){
			$dis[] = $val['district'];
		}
		$district_array['districts'] = $dis;
//print_r($district_array); die;

		$this->load->library('form_validation');
		$config = array(
			array('field' => 'pro_name','label' => 'Project Name','rules' => 'trim|required','errors' => array('required' => 'You must provide a %s.')),
			array('field' => 'req_method','label' => 'Request Method','rules' => 'trim|required'),
			array('field' => 'amt_rec','label' => 'Amount Received','rules' => 'trim|required'),
			array('field' => 'department','label' => 'Department','rules' => 'trim|required'),
			array('field' => 'state','label' => 'State','rules' => 'trim|required'),
			array('field' => 'city','label' => 'District/City','rules' => 'trim|required'),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/add_projects',$district_array);
		}else{
			$last_id = $this->fms_database->pro_code();
			if(empty($last_id)){
				$pro_code = 'PJ00';
			}else{
				$last_id = array_shift($last_id);
				$new_id = substr( $last_id['pro_code'], -1);
				$pro_code = 'PJ0'.($new_id +1);
			}

			$postdate = array(
				'pro_code' => $pro_code,
				'pro_name' => $this->input->post('pro_name'),
				'req_method' => $this->input->post('req_method'),
				'amt_rec' => $this->input->post('amt_rec'),
				'department' => $this->input->post('department'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city')
			);
			$data = $this->fms_database->add_project($postdate);

			if($data['error'] == 0){
				$this->session->set_flashdata('add_project_msg','Project successfully Added!');
			}else{
				$this->session->set_flashdata('add_project_err_msg','Project Name already exist!');
			}


			$this->load->view('admin/add_projects',$district_array);
		}
	}
	public function view_project() {
		$projects['projects'] = $this->fms_database->view_projects();
		$this->load->view('admin/view_projects',$projects);
	}

	public function md_approval() {
		$this->load->view('admin/md_approval');
	}

	public function add_project_ledger() {
		$this->load->library( 'form_validation' );
		$config = array(
			array(
				'field'  => 'leg_project',
				'label'  => 'Project Name',
				'rules'  => 'trim|required',
				'errors' => array( 'required' => 'You must provide a %s.' )
			),
			array( 'field' => 'leg_date', 'label' => 'Date', 'rules' => 'trim|required' ),
			array( 'field' => 'leg_voucher_numb', 'label' => 'Voucher Number', 'rules' => 'trim|required' ),
			array( 'field' => 'leg_desc', 'label' => 'Description', 'rules' => 'trim|required' ),
			array( 'field' => 'leg_debit', 'label' => 'Debit', 'rules' => 'trim|required' ),
			array( 'field' => 'leg_credit','label' => 'Credit','rules' => 'trim|required'),
		);
		$this->form_validation->set_rules( $config );
		if ( $this->form_validation->run() == false ) {
			$this->load->view( 'admin/add_project_ledger' );
		} else {
			$postdata = array(
				'acc_ledger_pro_code'   => $this->input->post( 'leg_project' ),
				'acc_ledger_date'       => $this->input->post( 'leg_date' ),
				'acc_ledger_voucher_numb'=> $this->input->post( 'leg_voucher_numb' ),
				'acc_ledger_desc'       => $this->input->post( 'leg_desc' ),
				'acc_ledger_debit'      => $this->input->post( 'leg_debit' ),
				'acc_ledger_credit'     => $this->input->post( 'leg_credit' ),
				//'acc_ledger_bal'        => $this->input->post( 'leg_bal' ),
			);
			$this->fms_database->insert_acc_ledger( $postdata );
			$this->session->set_flashdata( 'acc_ledger_msg', 'Data successfully saved!' );
			$this->load->view( 'admin/add_project_ledger' );
		}
	}
	public function view_project_ledger() {
		$this->load->library('table');
		$result['all_account_ledgers'] = $this->fms_database->view_acc_ledger();
		$this->load->view( 'admin/view_project_ledger' , $result);
	}

	public function logout() {
		$this->load->driver('cache');
		$user_id = array(
			'name'   => 'user_id',
			'value'  => '',
			'expire' => '0',
			'domain' => '.localhost',
			'prefix' => ''
		);

		delete_cookie($user_id);
		$this->session->sess_destroy();
		$this->cache->clean();

		ob_clean();
		redirect(base_url('login'));
	}

	public function file_backup(){
		$this->load->helper('file');
		//$map = directory_map('./');
		//$string = file_get_contents("applications/$path/$sub_path");
		$string = file_get_contents(base_url()."application/views/login.php");

		var_dump($string);
	}
}
