<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
  private $current_page   = 'dashboard/materi';

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(
      array('url', 'form')
    );
    $this->load->library(
      array('form_validation')
    );
    $this->load->model(
      array('m_materi')
    );
    if (!$this->session->userdata('id')) {
      $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER,  "Anda Harus Login"));
      redirect(site_url('/login'));
    }
  }

  function index()
  {
    $data['title'] = "Materi";
    $data['current_page'] = $this->current_page;
    $data['materi'] = $this->m_materi->getData();

    $this->load->view('component/header');
    $this->load->view('component/navbar');
    $this->load->view('component/sidebar');
    $this->load->view('materi/konten', $data);
    $this->load->view('component/footer');
  }

  function createData()
  {
    // Start Form Validation
    $this->form_validation->set_rules(
      'title',
      'Judul',
      'required',
      array(
        'required' => '*) Masukkan <b>Judul Video</b>',
      )
    );

    $this->form_validation->set_rules(
      'rpp_index',
      'RPP Index',
      'required',
      array(
        'required' => '*) Masukkan <b>RPP Index</b>',
      )
    );

    if (empty($_FILES['userfile']['name'])) {
      $this->form_validation->set_rules(
        'userfile',
        'Video',
        'required',
        array(
          'required' => '*) Pilih File <b>Video</b>'
        )
      );
    }

    $this->form_validation->set_rules(
      'teori',
      'Teori',
      'required',
      array(
        'required' => '*) Masukkan <b>Teori</b>',
      )
    );
    // End Form Validation 

    if ($this->form_validation->run() === TRUE) {
      $config['upload_path']              = './assets/video/';
      $config['allowed_types']            = 'mp4';
      $config['overwrite']                = "true";
      $config['max_size']                 = "102400";
      $config['file_name']                = $this->input->post('rpp_index') . '-' . slug($this->input->post('title'));

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload()) {
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, $this->upload->display_errors()));
        redirect($this->current_page, 'refresh');
      } else {

        $file_upload                = $this->upload->data();

        $data['id']                = uniqid();
        $data['judul']             = $this->input->post('title');
        $data['nama_file']         = $file_upload['file_name'];
        $data['rpp_index']         = $this->input->post('rpp_index');
        $data['teori']             = $this->input->post('teori');

        $this->m_materi->addData($data);
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Sukses Ditambahkan"));
        redirect($this->current_page);
      }
    } else {
      if (!empty(validation_errors())) {
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, "Terjadi Kesalahan"));
      }

      $data["current_page"]           = $this->current_page;
      $data["title"]                  = "Tambah Materi";

      $this->load->view('component/header');
      $this->load->view('component/navbar');
      $this->load->view('component/sidebar');
      $this->load->view('materi/tambah', $data);
      $this->load->view('component/footer');
    }
  }

  function selectData()
  {
    $id = $this->uri->segment(4);
    $select['id']   = $id;
    $data['select'] = $this->m_materi->selectOne($select);
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }

  function editData($id = null)
  {
    if ($id == null) {
      redirect($this->current_page);
    }

    $i['id']                        = $id;
    $data["materi"]                 = $this->m_materi->selectOne($i);

    if ($this->input->post() != null) {
      // Start Form Validation
      $this->form_validation->set_rules(
        'title',
        'Judul',
        'required',
        array(
          'required' => '*) Masukkan <b>Judul Video</b>',
        )
      );

      $this->form_validation->set_rules(
        'rpp_index',
        'RPP Index',
        'required',
        array(
          'required' => '*) Masukkan <b>RPP Index</b>',
        )
      );

      $this->form_validation->set_rules(
        'teori',
        'Teori',
        'required',
        array(
          'required' => '*) Masukkan <b>Teori</b>',
        )
      );
      // End Form Validation

      if ($this->form_validation->run() === TRUE) {
        if ($_FILES['userfile']['name']) {
          $config['upload_path']              = './assets/video/';
          $config['allowed_types']            = 'mp4';
          $config['overwrite']                = "true";
          $config['max_size']                 = "102400";
          $config['file_name']                = $this->input->post('rpp_index') . '-' . slug($this->input->post('title'));

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, $this->upload->display_errors()));
            redirect($this->current_page, 'refresh');
          } else {

            $file_upload                = $this->upload->data();

            $input['judul']             = $this->input->post('title');
            $input['nama_file']         = $file_upload['file_name'];
            $input['rpp_index']         = $this->input->post('rpp_index');
            $input['teori']             = $this->input->post('teori');

            $file_gambar                = $this->input->post('news_image');
            $path_file                  = './assets/video/';
            unlink($path_file . $file_gambar);

            $update                     = $this->update($i['id'], $input);

            if ($update) {
              $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Berhasil Diperbarui"));
              redirect($this->current_page, 'refresh');
            }
          }
        } else {
          $input['judul']             = $this->input->post('title');
          $input['rpp_index']         = $this->input->post('rpp_index');
          $input['teori']             = $this->input->post('teori');
          $update                     = $this->update($i['id'], $input);

          if ($update) {
            $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Data Berhasil Diperbarui"));
            redirect($this->current_page, 'refresh');
          }
        }
      }
    }
    $data["current_page"]           = $this->current_page;
    $data["title"]                  = "Edit Materi";

    $this->load->view('component/header');
    $this->load->view('component/navbar');
    $this->load->view('component/sidebar');
    $this->load->view('materi/edit', $data);
    $this->load->view('component/footer');
  }

  public function update($id, $data)
  {
    $update = $this->m_materi->updateData($id, $data);
    return $update;
  }

  function deleteData()
  {
    $id                         = $this->uri->segment(4);
    $data['id']                 = $id;
    $file                       = $this->m_materi->selectOne($data);
    $delete                     = $this->m_materi->removeData($data);
    $file_video                 = $file[0]->name_file;
    $path_file                  = './assets/video/';
    unlink($path_file . $file_video);

    if ($delete != false) {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::WARNING, 'Data Berhasil Dihapus'));
      redirect($this->current_page);
    } else {
      $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, 'Terjadi Kesalahan'));
      redirect($this->current_page);
    }
  }
}
