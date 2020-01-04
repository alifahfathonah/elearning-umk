<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{
  private $current_page   = 'dashboard/kuis';

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array('m_kuis')
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
    $data['title'] = "Kuis";
    $data['current_page'] = $this->current_page;
    $data['kuis'] = $this->m_kuis->getData();

    $this->load->view('component/header');
    $this->load->view('component/navbar');
    $this->load->view('component/sidebar');
    $this->load->view('v_kuis', $data);
    $this->load->view('component/footer');
  }

  function createData()
  {
    if ($_POST) {
      $data['id']                 = uniqid();
      $data['pertanyaan']         = $this->input->post('pertanyaan');
      $data['opsi_a']             = $this->input->post('opsi_a');
      $data['opsi_b']             = $this->input->post('opsi_b');
      $data['opsi_c']             = $this->input->post('opsi_c');
      $data['opsi_d']             = $this->input->post('opsi_d');
      $data['jawaban']            = $this->input->post('jawaban');

      $this->m_kuis->addData($data);
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
    $data['select'] = $this->m_kuis->selectOne($select);
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }

  function editData()
  {
    if ($_POST) {
      $data['id']                 = $this->input->post('eid');
      $data['pertanyaan']         = $this->input->post('epertanyaan');
      $data['opsi_a']             = $this->input->post('eopsi_a');
      $data['opsi_b']             = $this->input->post('eopsi_b');
      $data['opsi_c']             = $this->input->post('eopsi_c');
      $data['opsi_d']             = $this->input->post('eopsi_d');
      $data['jawaban']            = $this->input->post('ejawaban');

      $query = $this->m_kuis->updateData($data['id'], $data);
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
    $delete = $this->m_kuis->removeData($data);
    if ($delete != false) {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::WARNING, 'Data Berhasil Dihapus'));
      redirect($this->current_page);
    } else {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, 'Terjadi Kesalahan'));
      redirect($this->current_page);
    }
  }
}
