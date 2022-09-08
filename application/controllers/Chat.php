<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('common');
		$this->load->library(array('form_validation', 'template'));
	}

	public function index()
	{
		$data['admin'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "admin");
		$data["adminId"] = array_keys($data['admin'])[0];
		$data['myrequest'] = $this->common->readdatafromcollectionwhereclause("AdminChats");
		$this->template->template_render('chat', $data);
	}

	public function groupchat()
	{
		$data['admin'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "admin");
		$data["adminId"] = array_keys($data['admin'])[0];
		$data['myrequest'] = $this->common->readdatafromcollectionwhereclause("AdminChats");
		$this->template->template_render('groupchat', $data);
	}

	public function teamchat()
	{
		$data['admin'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "admin");
		$data["adminId"] = array_keys($data['admin'])[0];
		$data['myrequest'] = $this->common->readdatafromcollectionwhereclause("AdminChats");
		$this->template->template_render('teamchat', $data);
	}
	public function deletechat($id)
	{


		$data = $this->common->readdatafromcollectionwhereclause("AdminChats", "conversationId", "=", $id);

		foreach ($data as $d => $l) {

			$this->common->deletedatamodel("AdminChats", $d);
		}
		$this->common->deletedatamodel("AdminChats", $id);

		$this->session->set_flashdata('successmessage', 'Chat has been removed successfully..');
		redirect('chat');
	}

	public function detailedchat($id)
	{
		$data = $this->common->readdatadocument("AdminChats", $id);
		$data['admin'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "admin");
		$data["adminId"] = array_keys($data['admin'])[0];
		$adminId = $data["adminId"];
		$data["conversation"] = $this->common->readdatacollection("AdminChats", "conversations", $id);
		foreach ($data["participants"] as $userId => $value) {
			if ($userId != $adminId) {
				$data["userId"] = $userId;
			}
		}
		$data["chatId"] = $id;
		$data["userName"] = $this->common->readusername($data["userId"]);
		$data["userImage"] = $this->common->readImage($data["userId"]);
		$this->template->template_render('chatdetails', $data);
	}

	public function Chatdetail($id)

	{
		$firebase = $this->firebase->init();
		$db = $firebase->createDatabase();
		$myid = $this->session->userdata('userdata')['user_id'];


		$support = $db->getReference("chat/" . $myid . '/' . $id)->getSnapshot()->getValue();
		$data['user'] = $db->getReference("User/" . $id)->getSnapshot()->getValue();
		$data['reciver_id'] = $id;
		$data['myid'] = $myid;
		// 	echo "<pre>";
		// 	print_r($data);
		// 	echo "</pre>";

		$this->load->view('bussiness/chat-detail', $data);
	}
}
