<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Places extends CI_Controller
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
    $data['placeslist'] = $this->common->readdatafromcollectionwhereclause("Places");
    $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
    $this->template->template_render('places_management', $data);
  }

  public function addplace()
  {
    $data['travels'] = $this->common->readdatafromcollectionwhereclause("Travels");
    $this->template->template_render('place_add', $data);
  }

  public function insertplace()
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
            'name' => "placeImage" . rand() . time() . $_FILES['images']['name'][$i],
          ]
        );
        $data['images'][$i] = $uploadedFile->info()['mediaLink'];
      }
    }
    
    if (isset($_POST)) {
      $placeId = time();
      $response = $this->common->adddatamodel("Places", $placeId, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New place added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new place..');
      }
      redirect('places');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('places');
    }
  }

  public function editplace()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['travels'] = $this->common->readdatafromcollectionwhereclause("Travels");
    $data['placedetails'] = $this->common->readdatadocument("Places", $id);
    $this->template->template_render('editPlace', $data);
  }

  public function updateplacedata()
  {
    $id = $this->uri->segment(3);
    $data = $this->input->post();
    $data['lat'] = (float)$this->input->post('lat');
    $data['lng'] = (float)$this->input->post('lng');
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Places", $id, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'place updated successfully..');
        redirect('places');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('places');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('places');
    }
  }
}
