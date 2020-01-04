<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilGuru extends CI_Controller
{
  private $current_page   = 'dashboard/profilGuru';

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array('m_profilGuru')
    );
    $this->load->helper(
      array('url', 'form')
    );
    $this->load->library(
      array('form_validation')
    );
    if (!$this->session->userdata('id')) {
      $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER,  "Anda Harus Login"));
      redirect(site_url('/login'));
    }
  }

  function index()
  {
    $data['title'] = "Profil Guru";
    $data['current_page'] = $this->current_page;
    $data['profilGuru'] = $this->m_profilGuru->getData();

    $this->load->view('component/header');
    $this->load->view('component/navbar');
    $this->load->view('component/sidebar');
    $this->load->view('v_profilGuru', $data);
    $this->load->view('component/footer');
  }

  function createData()
  {
    if ($_POST) {
      $data['id']                 = uniqid();
      $data['nama']               = $this->input->post('nama');
      $data['alamat']             = $this->input->post('alamat');
      $data['email']              = $this->input->post('email');
      $data['no_hp']              = $this->input->post('no_hp');
      $data['jk']                 = $this->input->post('jk');
      $data['mapel']              = $this->input->post('mapel');

      $this->m_profilGuru->addData($data);
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Sukses Ditambahkan"));
      redirect($this->current_page);
    } else {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Gagal Ditambahkan"));
    }
  }

  function selectData()
  {
    $id = $this->uri->segment(4);
    $select['id']   = $id;
    $data['select'] = $this->m_profilGuru->selectOne($select);
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }

  function editData()
  {
    if ($_POST) {
      $data['id']                 = $this->input->post('eid');
      $data['nama']               = $this->input->post('enama');
      $data['alamat']             = $this->input->post('ealamat');
      $data['email']              = $this->input->post('eemail');
      $data['no_hp']              = $this->input->post('eno_hp');
      $data['jk']                 = $this->input->post('ejk');
      $data['mapel']              = $this->input->post('emapel');

      $query = $this->m_profilGuru->updateData($data['id'], $data);
      if ($query) {
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Sukses Diubah"));
        redirect($this->current_page);
      } else {
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Gagal Diubah"));
      }
    }
  }

  function deleteData()
  {
    $id = $this->uri->segment(4);
    $data['id'] = $id;
    $delete = $this->m_profilGuru->removeData($data);
    if ($delete != false) {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::WARNING, 'Data Berhasil Dihapus'));
      redirect($this->current_page);
    } else {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, 'Terjadi Kesalahan'));
      redirect($this->current_page);
    }
  }
}
