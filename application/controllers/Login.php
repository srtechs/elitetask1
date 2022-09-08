<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	//To load initial libraries, functions
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('directory');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('common');
		$this->load->library('session');
		// $this->load->database();
	}
	//To load login page
	public function index()    //Login Controller
	{
		// print_r($this->session->userdata('session_data'));
		// exit;
		if (!empty($this->session->userdata('session_data'))) {
			$url = base_url('dashboard');
			header("location: $url");
		} else {
			$this->load->view('login');
		}
	}
	//To login functionality check
	public function login_action()
	{
		// print_r("hello");
		// exit;
		// $users = $this->common->readdatafromcollectionwhereclause('Users', 'email', '==', $this->input->post('email'));
		if ($this->input->post('email') == "admin@example.com" && $this->input->post('password') == "1234") {
			// foreach ($users as $userId => $user) {
			// print_r($user);
			// exit;
			$session_data = array(
				'userId' => "admin2211", // $userId,
				'name' => "Mr. Admin", //$user['name'],
				'email' => "admin@example.com", //$user['email'],
				'status' => 1 //$user['status']
			);
			$this->session->set_userdata('session_data', $session_data);

			redirect(base_url('dashboard'));
			// }
		} else {
			$this->session->set_flashdata('warningmessage', 'Invalid email or Password !');
			redirect(base_url('login'));
		}
	}

	//To logout session from browser
	public function logout()
	{
		// Removing session data
		$sess_array = array('userId' => '');
		$this->session->unset_userdata('session_data', $sess_array);
		$this->session->sess_destroy();
		$this->session->set_flashdata('successmessage', 'Successfully Logged out !');
		redirect('login');
	}
}
