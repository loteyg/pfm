<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->model('fms_database');
		ob_start();
		$this->load->library('Session');
		$this->load->helper('cookie');
	}
	public function index(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('required' => '%s cannot be empty'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => '%s cannot be empty'));
		$this->form_validation->run();
		if ($this->form_validation->run() == FALSE){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin/dashboard');
			}else{
				$this->load->view('login');
			}
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->fms_database->check_user_login($username,$password);
			if($result){
				$session_data = array(
					'username' => $username,
					'password' => $password,
				);
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('admin/dashboard');
				//redirect('admin');
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login', $data);
			}
		}
	}
	public function logout()
	{
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

/*To prevent browser back button previous page load, you should do something like this

$sess = $this->session->userdata('username');
if(empty($sess))
{
$this->session->set_flashdata('error', 'Session has Expired. Please login');
redirect('loginController/method');
}
else
{
	# success.
	# continue the normal code here
}*/
}
