<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class PayMyBill extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}

public function index()
  {
      $data['title'] = 'Pay My Bill';
      
      $this->load->view('payMyBill/bill_list',$data);
  }


}