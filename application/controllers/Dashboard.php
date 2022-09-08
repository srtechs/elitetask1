<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('dashboard_model');
        $this->load->model('common');
        $this->load->model('geofence_model');
        // $this->load->database();
    }

    public function index()
    {
        $data["usersCount"] = $this->common->readnumberofdocumentsincollectionbetween("Users", "userRole", "=", "user");
        $data["hotelsCount"] = $this->common->readnumberofdocumentsincollectionbetween("Hotels");
        $data["bookingsCount"] = $this->common->readnumberofdocumentsincollectionbetween("Bookings");
        $data["bookingsTodayCount"] = $this->common->readnumberofdocumentsincollectionbetween("Bookings", "bookingDate", "==", strtotime(date("Y/m/d")) * 1000);
        $data['users'] = $this->common->readdatafromcollectionwhereclause("Users", "userRole", "=", "user");
        $data['hotels'] = $this->common->readdatafromcollectionwhereclause("Hotels");
        $data["bookings"] = $this->common->readdatafromcollectionbetween("Bookings");

        $this->template->template_render('dashboard', $data);
    }

    public function tasks()
    {
        $data["bookings"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('tasks', $data);
    }

    public function calendar()
    {
        $data["bookings"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('calendar', $data);
    }

    public function users()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('user_management', $data);
    }

    public function edituser()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('viewuser', $data);
    }

    public function categories()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('categories_management', $data);
    }

    public function addcategory()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('category_add', $data);
    }

    public function services()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('services_management', $data);
    }

    public function addservice()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('service_add', $data);
    }

    public function company()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('companycontact', $data);
    }

    public function geofence()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('geofence', $data);
    }

    public function faq()
    {
        $data["users"] = $this->common->readdatafromcollectionbetween("Bookings");
        $this->template->template_render('faq', $data);
    }

    public function iechart()
    {
        $data = $this->common->get_iechartdata();
        $res = "['" . implode("', '", array_keys($data)) . "']";
        $income = "['" . implode("', '", array_column($data, 'income')) . "']";
        $expense = "['" . implode("', '", array_column($data, 'expense')) . "']";
        echo json_encode(array('res' => $res, 'income' => $income, 'expense' => $expense));
    }
    public function remindermark()
    {
        $data = array('r_isread' => 1);
        $this->db->where('r_id', $this->input->post('r_id'));
        echo $this->db->update('reminder', $data);
    }
}
