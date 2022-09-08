<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
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
    $data['invoiceslist'] = $this->common->readdatafromcollectionwhereclause("Invoices");
    $this->template->template_render('invoice_management', $data);
  }

  public function addinvoice()
  {
    $this->template->template_render('invoice_add');
  }

  public function insertinvoice()
  {
    require_once('application/libraries/stripe-php/init.php');

    $email = $this->input->post('email');

    \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
    $stripe = new \Stripe\StripeClient($this->config->item('stripe_secret'));

    $productId = $stripe->products->create(['name' => $this->input->post('description')]);

    $priceId = $stripe->prices->create(
      [
        'product' => $productId,
        'unit_amount' => $this->input->post('price') * 100,
        'currency' => 'usd',
      ]
    );


    $customerId = \Stripe\Customer::create(
      [
        'name' => $this->input->post('name'),
        'email' => $email,
        'description' => 'My first customer',
      ]
    );

    $invoiceItem = \Stripe\InvoiceItem::create(['customer' => $customerId, 'price' => $priceId]);

    // Create an Invoice
    $invoice = \Stripe\Invoice::create([
      'customer' => $customerId,
      'collection_method' => 'send_invoice',
      'days_until_due' => 0,
    ]);

    // Send the Invoice
    $invoice->sendInvoice();

    $data = $this->input->post();

    if (isset($_POST)) {
      $invoiceId = time();
      $response = $this->common->adddatamodel("Invoices", $invoiceId, $data);
      if ($response) {
        $this->session->set_flashdata('successmessage', 'New invoice added successfully..');
      } else {
        $this->session->set_flashdata('warningmessage', 'Error in creating new invoice..');
      }
      redirect('invoice');
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('invoice');
    }
  }

  public function editinvoice()
  {
    $id = $this->uri->segment(3);
    $data['id'] = $id;
    $data['invoicedetails'] = $this->common->readdatadocument("Invoices", $id);
    $this->template->template_render('editinvoice', $data);
  }

  public function updateinvoicedata()
  {
    $id = $this->uri->segment(3);
    if (isset($_POST)) {
      $response = $this->common->updatedatamodel("Invoices", $id, $this->input->post());
      if ($response) {
        $this->session->set_flashdata('successmessage', 'invoice updated successfully..');
        redirect('invoice');
      } else {
        $this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
        redirect('invoice');
      }
    } else {
      $this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
      redirect('invoice');
    }
  }


  public function sendInvoiceTest()
  {
    require_once('application/libraries/stripe-php/init.php');

    $email = "moiz73.mg@gmail.com";

    \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
    $stripe = new \Stripe\StripeClient($this->config->item('stripe_secret'));

    $productId = $stripe->products->create(['name' => 'Gold Special']);

    $priceId = $stripe->prices->create(
      [
        'product' => $productId,
        'unit_amount' => 1000,
        'currency' => 'usd',
      ]
    );


    $customerId = \Stripe\Customer::create(
      [
        'name' => 'Moiz Gillani',
        'email' => $email,
        'description' => 'My first customer',
      ]
    );

    $invoiceItem = \Stripe\InvoiceItem::create(['customer' => $customerId, 'price' => $priceId]);

    // Create an Invoice
    $invoice = \Stripe\Invoice::create([
      'customer' => $customerId,
      'collection_method' => 'send_invoice',
      'days_until_due' => 0,
    ]);

    // Send the Invoice
    $invoice->sendInvoice();
  }
}
