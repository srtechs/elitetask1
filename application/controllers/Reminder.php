<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('reminder_model');
          $this->load->model('common');
          $this->load->model('trips_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['reminderlist'] =$this->common->readdatafromcollectionwhereclause("Reminder");
		$data['usrtinfp']=$this->common->readusername("DInlToyo6fZVj2boQg2ZezlxjqN2");

	


		$this->template->template_render('reminder_management',$data);
	}

	public function updatereminder($id){
    $data=$this->input->post();
	$firebase = $this->firebase->init();
		$storage = $firebase->createStorage();
		$defaultBucket = $storage->getBucket();

		if ($_FILES['file']['tmp_name'] != '') {
			$uploadedFile = $defaultBucket->upload(
				file_get_contents($_FILES['file']['tmp_name']),
				[
					'name' => "reminder" . rand() . time() . $_FILES['file']['name'],
				]
			);

			$data['url'] = $uploadedFile->info()['mediaLink'];
		}




		$data["promotions"] = $this->common->updatedatamodel("Reminder",$id,$data);
		



		$this->session->set_flashdata('successmessage', 'Reminder has been updated successfully');

		redirect('reminder');
	}

//editReminder
	public function editReminder($id){


		$data['id']=$id;
		echo "<pre>";
		$data["reminderdetails"] = $this->common->readdatadocument("Reminder",$id);
		//print_r($data);
		echo "</pre>";

		$data['vechiclelist']=$this->common->readdatafromcollectionwhereclause("Users","userRole",'=',"driver");

		 $this->template->template_render('editReminder', $data);


	}




	public function addreminder()
	{

		$data['vechiclelist']=$this->common->readdatafromcollectionwhereclause("Users","userRole",'=',"driver");
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		$this->template->template_render('reminder_add',$data);
	}
	public function insertreminder()
	{
		$data=$this->input->post();
		$firebase = $this->firebase->init();
		$storage = $firebase->createStorage();
		$defaultBucket = $storage->getBucket();

		$testxss = xssclean($_POST);
		if($testxss){		

 $uniqueentity=time()*1000;
if ($_FILES['file']['tmp_name'] != '') {
			$uploadedFile = $defaultBucket->upload(
				file_get_contents($_FILES['file']['tmp_name']),
				[
					'name' => "reminder" . rand() . time() . $_FILES['file']['name'],
				]
			);

			$data['url'] = $uploadedFile->info()['mediaLink'];
		}




			$response = $this->common->adddatamodel("Reminder",$uniqueentity,$data);
			if($response) {
				$this->session->set_flashdata('successmessage', 'New reminder added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', validation_errors());
			}
			redirect('reminder');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('reminder');
		}
	}
	public function deletereminder()
	{
		$r_id = $this->uri->segment(3);
		$returndata = $this->common->deletedatamodel('Reminder',$r_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Reminder deleted successfully..');
			redirect('reminder');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Try again..');
		    redirect('reminder');
		}
	}
}
