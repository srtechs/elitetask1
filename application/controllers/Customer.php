<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->database();
		$this->load->model('customer_model');
		$this->load->model('common');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{

		$data['customerlist'] = $this->customer_model->getall_customer();

		$this->template->template_render('customer_management', $data);
	}

	public function suspendCustomer($id)
	{
		$data["id"] = $id;
		$data["isApproved"] = False;
		$response = $this->common->updatedatamodel("Users", $data["id"], $data);
		$this->session->set_flashdata('successmessage', 'User Suspended');
		redirect('customer');
	}

	public function unSuspendCustomer($id)
	{
		$data["id"] = $id;
		$data["isApproved"] = TRUE;
		$response = $this->common->updatedatamodel("Users", $data["id"], $data);
		$this->session->set_flashdata('successmessage', 'User UnSuspended');
		redirect('customer');
	}

	public function deleteCustomer($id)
	{
		$response = $this->common->deletedatamodel("Users", $id);
		$this->session->set_flashdata('successmessage', 'Customer Deleted');
		redirect('customer');
	}

	public function addcustomer()
	{
		$this->template->template_render('customer_add');
	}
	//editcustomer
	public function editcustomers($id)
	{


		$data['id'] = $id;

		$data["customerdetails"] = $this->common->readdatadocument("Users", $id);

		$this->template->template_render('editcustomer', $data);
	}
	public function userreset()
	{
		$this->template->template_render('user_reset_credentials');
	}

	public function insertcustomer()
	{
		$data = $this->input->post();
		$data["userRole"] = "user";
		$data["ratings"] = NULL;
		$data["isApproved"] = TRUE;
		$data["isActive"] = 0;

		$response = $this->customer_model->add_customer($data);
		if ($response) {
			$this->session->set_flashdata('successmessage', 'New customer added successfully');
			redirect('customer');
		} else {
			$errormsg = 'Error! User already Exists.';
			$this->session->set_flashdata('warningmessage', $errormsg);
			redirect('customer/addcustomer');
		}
	}



	public function updatecustomerdata($id)
	{
		$da = $this->input->post();
		//print_r($da);
		if ($da['newpassword'] != "") {

			$da['password'] = $da['newpassword'];
			$da['newpassword'] = "";
			$flag = $this->customer_model->update_customerpassword($id, $da['password']);




			if ($flag) {
				$data["promotions"] = $this->common->updatedatamodel("Users", $id, $da);
				$this->session->set_flashdata('successmessage', 'Users has been updated successfully');
			} else {
				$this->session->set_flashdata('warningmessage', 'Usome thing error Please try later');

				//redirect('customer/editcustomer/'.$id);
			}
		} else {
			$data["promotions"] = $this->common->updatedatamodel("Users", $id, $da);
			$this->session->set_flashdata('successmessage', 'Users has been updated successfully');
		}



		redirect('customer/editcustomer/' . $id);
	}

	public function editcustomer()
	{
		$c_id = $this->uri->segment(3);
		$data['id'] = $c_id;
		$data['customerdetails'] = $this->customer_model->get_customerdetails($c_id);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";


		$this->template->template_render('editcustomer', $data);
	}

	public function resetCustomer()
	{
		// $data = $this->input->post();
		foreach ($_POST as $key => $val) {
			if (strpos($key, "new") === 0) {
				$name = substr($key, 3);
				$data["new"][$name] = $val;
			}
		}
		foreach ($_POST as $key => $val) {
			if (strpos($key, "old") === 0) {
				$name = substr($key, 3);
				$data["old"][$name] = $val;
			}
		}
		// print_r($data);
		// exit;
		$response = $this->customer_model->update_customer($data);
		if ($response) {
			$this->session->set_flashdata('successmessage', 'Customer updated successfully.');
			redirect('customer');
		} else {
			$errormsg = 'Error! Something went Wrong. Either the user does not exist or password does not match.';
			$this->session->set_flashdata('warningmessage', $errormsg);
			redirect('customer/userreset');
		}
	}

	public function updatecustomer()
	{
		$testxss = xssclean($_POST);
		if ($testxss) {
			$response = $this->customer_model->update_customer($this->input->post());
			if ($response) {
				$this->session->set_flashdata('successmessage', 'Customer updated successfully..');
				redirect('customer');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect('customer');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('customer');
		}
	}
}