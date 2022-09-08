<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Travel extends CI_Controller
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
    $data['travelslist'] = $this->common->readdatafromcollectionwhereclause("Travels");
    $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
    $this->template->template_render('travel_management', $data);
  }

  public function addtravel()
  {
    $this->template->template_render('travel_add');
  }

  public function inserttravel()
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
            'name' => "travelImage" . rand() . time() . $_FILES['images']['name'][$i],
          ]
        );
        $data['images'][$i] = $uploadedFile->info()['mediaLink'];
      }
    }
    
    if (isset($_POST)) {
      $travelId = time();
      $response = $this->common->adddatamodel("Travels", $travelId, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New travel added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new travel..');
      }
      redirect('travel');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('travel');
    }
  }

  public function edittravel()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['traveldetails'] = $this->common->readdatadocument("Travels", $id);
    $this->template->template_render('editTravel', $data);
  }

  public function updatetraveldata()
  {
    $id = $this->uri->segment(3);
    $data = $this->input->post();
    $data['lat'] = (float)$this->input->post('lat');
    $data['lng'] = (float)$this->input->post('lng');
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Travels", $id, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'travel updated successfully..');
        redirect('travel');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('travel');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('travel');
    }
  }
}
