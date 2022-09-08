<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // $this->load->database();
    $this->load->model('common');
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function index()
  {
    $data['bookingslist'] = $this->common->readdatafromcollectionwhereclause("Booking");
    $this->template->template_render('booking_management', $data);
  }

  public function addbooking()
  {
    $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
    $data['hotels'] = $this->common->readdatafromcollectionwhereclause("Hotel");
    $this->template->template_render('booking_add', $data);
  }

  public function insertbooking()
  {
    if (isset($_POST)) {
      $bookingId = time();
      $response = $this->common->adddatamodel("Booking", $bookingId, $this->input->post());
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New booking added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new booking..');
      }
      redirect('booking');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('booking');
    }
  }

  public function editbooking()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
    $data['hotels'] = $this->common->readdatafromcollectionwhereclause("Hotel");
    $data['bookingdetails'] = $this->common->readdatadocument("Booking", $id);
    $this->template->template_render('editBooking', $data);
  }

  public function updatebookingdata()
  {
    $id = $this->uri->segment(3);
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Booking", $id, $this->input->post());
      if ($response) {
        $this->session->set_flashdata('successmessage', 'booking updated successfully..');
        redirect('booking');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('booking');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('booking');
    }
  }
}
