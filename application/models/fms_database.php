<?php
class fms_database extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function check_user_login($username,$password) {
		$query = $this->db->get_where('user_master', array('username' => $username,'password' => md5($password)));
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function insert_pro_req($postdata) {
		return $this->db->insert('project_master',$postdata);
	}

	public function insert_acc_ledger($postdata) {
	//echo"<pre>";
	//print_r($postdata); die;
			return $this->db->insert('acc_ledger_entry',$postdata);
	}

	public function view_acc_ledger() {
		$query = $this->db->query('select * from acc_ledger_entry');
		return $query->result();
	}
	public function view_all_requests() {
		$query = $this->db->query('select * from project_master');
		return $query->result();
	}
	public function add_project($postdata){
		$this->db->insert('new_project',$postdata);
		if ($this->db->affected_rows() != 1){
			//show_error();

			$data = array('error'=> $this->db->error(), 'insert'=>'false');
			return $data;
		}else{
			$data = array('error'=> 0, 'insert'=>'true');

			return $data;
		}

	}
	public function pro_code(){
		$query = $this->db->query('select pro_code from new_project ORDER BY pro_id DESC LIMIT 1');
		return $query->result_array();
	}
	public function districts(){
		$query = $this->db->query('select district from loc_city');
		return $query->result_array();
	}
	public function view_projects(){
		$query = $this->db->query('select * from new_project');
		return $query->result_array();
	}



}