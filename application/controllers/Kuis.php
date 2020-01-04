<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller {

    private $current_page   = 'Halaman Utama';

    public function __construct() {
        parent::__construct();
        $this->load->helper(
            array('url')
        );
        $this->load->model(
            array('m_kuis')
        );
    }

    public function index() {

        $data['title']          = "Kuis";
        $data['current_page']   = $this->current_page;
        $data['kuis']           = $this->m_kuis->getData();
        $data['opsi']           = array('a', 'b', 'c', 'd');
        $data['nilai']          = array('A', 'B', 'C', 'D');
        // print_r($data['opsi'][0]);
        // exit;

        $this->load->view('kuis', $data);
    }

    public function hasil() {
        $skor = 0;
        $benar = 0;
        $soal = $this->m_kuis->getData();
        foreach ($soal as $key) {
            if($key->jawaban === $this->input->post('radio-inline-'.$key->id)) {
                $benar++;
            }
            $skor = ($benar / count($soal)) * 100 ;
        }
        // $result = number_format($skor, 2, '.', "");
        $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Skor Anda Adalah $skor"));
        redirect('kuis', 'refresh');
    }
}

?>