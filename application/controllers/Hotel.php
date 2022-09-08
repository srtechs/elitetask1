<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
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
    $data['hotelslist'] = $this->common->readdatafromcollectionwhereclause("Hotel");
    $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
    $this->template->template_render('hotel_management', $data);
  }

  public function addhotel()
  {
    $this->template->template_render('hotel_add');
  }

  public function inserthotel()
  {
    
    $firebase = $this->firebase->init();
    $storage = $firebase->createStorage();
    $defaultBucket = $storage->getBucket();

    $data = $this->input->post();
    $data['lat'] = (float)$this->input->post('lat');
    $data['lng'] = (float)$this->input->post('lng');
    
    $totalfiles = count($_FILES['images']['name']);
    for( $i=0 ; $i < $totalfiles ; $i++ ) {
      if ($_FILES['images']['tmp_name'][$i] != '') {
        $uploadedFile = $defaultBucket->upload(
          file_get_contents($_FILES['images']['tmp_name'][$i]),
          [
            'name' => "hotelImage" . rand() . time() . $_FILES['images']['name'][$i],
          ]
        );
        $data['images'][$i] = $uploadedFile->info()['mediaLink'];
      }
    }
    
    if (isset($_POST)) {
      $hotelId = time();
      $response = $this->common->adddatamodel("Hotel", $hotelId, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New hotel added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new hotel..');
      }
      redirect('hotel');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('hotel');
    }
  }

  public function edithotel()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['hoteldetails'] = $this->common->readdatadocument("Hotel", $id);
    $this->template->template_render('editHotel', $data);
  }

  public function updatehoteldata()
  {
    $id = $this->uri->segment(3);
    $data = $this->input->post();
    $data['lat'] = (float)$this->input->post('lat');
    $data['lng'] = (float)$this->input->post('lng');
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Hotel", $id, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'hotel updated successfully..');
        redirect('hotel');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('hotel');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('hotel');
    }
  }
}
