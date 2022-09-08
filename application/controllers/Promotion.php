<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {
    function __construct()
 	{
	    parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('common');
		$this->load->library('session');
		$this->load->database();
		$this->load->library(array('form_validation','template'));
	}

	public function index()   
	{

		$data["promotions"] = $this->common->readdatafromcollectionwhereclause("Promotions");
		$this->template->template_render('promotion', $data); 
	}


public function updatepermotiondata($id){
		$firebase = $this->firebase->init();
		$storage = $firebase->createStorage();
		$defaultBucket = $storage->getBucket();
$data=$this->input->post();
if ($_FILES['file']['tmp_name'] != '') {
			$uploadedFile = $defaultBucket->upload(
				file_get_contents($_FILES['file']['tmp_name']),
				[
					'name' => "permo" . rand() . time() . $_FILES['file']['name'],
				]
			);

			$data['url'] = $uploadedFile->info()['mediaLink'];
		}
		$data["startTime"] = strtotime($data["startTime"]) * 1000;
		$data["endTime"] = strtotime($data["endTime"]) * 1000;

		$data["promotions"] = $this->common->updatedatamodel("Promotions",$id,$data);
		$this->session->set_flashdata('successmessage', 'Promotion has been updated successfully');

		redirect('promotion');
	}
	public function editPromotion($id){


		$data['id']=$id;
		$data["promotions"] = $this->common->readdatadocument("Promotions",$id);

		 $this->template->template_render('editpromotion', $data); 
	



	}

	public function addPromotion()   
	{
		$data = $this->input->post();
		$data["id"] = time();
		$data["startTime"] = strtotime($data["startTime"]) * 1000;
		$data["endTime"] = strtotime($data["endTime"]) * 1000;
		$data["noOfTrips"] = (int)$data["noOfTrips"];
		$data["remainingRides"] = NULL;
		$data["rideModels"] = NULL;
		settype($data["id"], "string");

	$firebase = $this->firebase->init();
		$storage = $firebase->createStorage();
		$defaultBucket = $storage->getBucket();

if ($_FILES['file']['tmp_name'] != '') {
			$uploadedFile = $defaultBucket->upload(
				file_get_contents($_FILES['file']['tmp_name']),
				[
					'name' => "permo" . rand() . time() . $_FILES['file']['name'],
				]
			);

			$data['url'] = $uploadedFile->info()['mediaLink'];
		}


		$this->common->adddatamodel("Promotions", $data["id"], $data);
		$this->session->set_flashdata('successmessage', 'New Promotion added successfully');
		redirect('promotion');
	}

	public function deletePromotion($id)   
	{
		$this->common->deletedatamodel("Promotions", $id);
		$this->session->set_flashdata('successmessage', 'Promotion Deleted');
		redirect('promotion');
	}
	
	
}
