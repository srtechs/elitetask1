<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('common');
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function index()
  {
    $data['blogslist'] = $this->common->readdatafromcollectionwhereclause("Blogs");
    $this->template->template_render('blog_management', $data);
  }

  public function addblog()
  {
    $this->template->template_render('blog_add');
  }

  public function insertblog()
  {
    $firebase = $this->firebase->init();
    $storage = $firebase->createStorage();
    $defaultBucket = $storage->getBucket();
    
    $data['title'] = $this->input->post('title');
    $data['detail'] = $this->input->post('description');
    $data['dateCreated'] = time();

    if ($_FILES['image']['tmp_name'] != '') {
      $uploadedFile = $defaultBucket->upload(
        file_get_contents($_FILES['image']['tmp_name']),
        [
          'name' => "profileImages/blog" . rand() . time() . $_FILES['image']['name'],
        ]
      );

      $data['image'] = $uploadedFile->info()['mediaLink'];
    }
    
    if (isset($_POST)) {
      $blogId = time();
      $response = $this->common->adddatamodel("Blogs", $blogId, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New Blog added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new blog..');
      }
      redirect('blog');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('blog');
    }
  }

  public function editblog()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['blogdetails'] = $this->common->readdatadocument("Blogs", $id);
    $this->template->template_render('editBlog', $data);
  }

  public function updateblogdata()
  {
    $data['title'] = $this->input->post('title');
    $data['detail'] = $this->input->post('description');
    
    $firebase = $this->firebase->init();
    $storage = $firebase->createStorage();
    $defaultBucket = $storage->getBucket();

    if ($_FILES['image']['tmp_name'] != '') {
      $uploadedFile = $defaultBucket->upload(
        file_get_contents($_FILES['image']['tmp_name']),
        [
          'name' => "profileImages/blog" . rand() . time() . $_FILES['image']['name'],
        ]
      );

      $data['image'] = $uploadedFile->info()['mediaLink'];
    }


    $id = $this->uri->segment(3);
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Blogs", $id, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'Blog updated successfully..');
        redirect('blog');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('blog');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('blog');
    }
  }
}
