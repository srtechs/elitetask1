<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller {
	function __construct()   {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
          $this->load->model('vehicle_model');
          $this->load->model('customer_model');
          $this->load->model('drivers_model');
          $this->load->model('incomexpense_model');
          $this->load->model('fuel_model');
          $this->load->model('trips_model');
          $this->load->model('common');
          $this->load->library('session');
    }
	public function booking()	{
		$data = array();
		if(isset($_POST['bookingreport'])) {
			$triplist = $this->common->readdatafromcollectionbetween("Bookings", "bookingDate" , ">", strtotime($this->input->post('booking_from'))*1000, "bookingDate" , "<", strtotime($this->input->post('booking_to'))*1000);
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
			} else {
				unset($_SESSION['warningmessage']);
				foreach ($triplist as $tripId => $tripDetails) {
					$data["tripsData"][$tripId]["bookingDetails"] = $tripDetails;
					$customerData = $this->customer_model->get_customerdetails($tripDetails["userId"]);
					$data["tripsData"][$tripId]["customerDetails"] = $customerData;
				}
			}
		}
		$this->template->template_render('report_booking', $data);
	}
	public function incomeexpense()	{
		$data = array();
		$triplist = array();
		$data["drivers"] = $this->drivers_model->getall_drivers()["user"];
		if(isset($_POST['incomeexpensereport'])) {
			if (isset($_POST['driverId']) && $_POST['driverId'] != "" && !empty($_POST['driverId'])) {
				$triplist = $this->common->readdatafromcollectionbetweenwhere("Bookings", "bookingDate" , ">", strtotime($this->input->post('incomeexpense_from'))*1000, "bookingDate" , "<", strtotime($this->input->post('incomeexpense_to'))*1000, "driverId" , "=", $_POST["driverId"]);
			} else {
				$triplist = $this->common->readdatafromcollectionbetweenwhere("Bookings", "bookingDate" , ">", strtotime($this->input->post('incomeexpense_from'))*1000, "bookingDate" , "<", strtotime($this->input->post('incomeexpense_to'))*1000);
			}
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No Data found..');
			} else {
				unset($_SESSION['warningmessage']);
				foreach ($triplist as $tripId => $tripDetails) {
					$data["tripsData"][$tripId]["bookingDetails"] = $tripDetails;
				}
			}
		}
		$this->template->template_render('report_incomeexpense',$data);
	}
	public function fuels()	{
		if(isset($_POST['fuelreport'])) {
			$fuelreport = $this->fuel_model->fuel_reports($this->input->post('fuel_from'),$this->input->post('fuel_to'),$this->input->post('fuel_vechicle'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['fuel'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['fuel'] = $fuelreport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_fuel',$data);
	}
}
