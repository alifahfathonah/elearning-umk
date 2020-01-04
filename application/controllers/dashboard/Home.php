<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(
      array('url')
    );
    if (!$this->session->userdata('id')) {
      $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER,  "Anda Harus Login"));
      redirect(site_url('/login'));
    }
  }

  function index()
  {
    $this->load->view('component/header');
    $this->load->view('component/navbar');
    $this->load->view('component/sidebar');
    $this->load->view('v_home');
    $this->load->view('component/footer');
  }
}
