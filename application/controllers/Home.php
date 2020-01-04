<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    private $current_page   = 'Halaman Utama';

    public function __construct() {
        parent::__construct();
        $this->load->helper(
            array('url')
        );
        $this->load->model(
            array('m_materi')
        );
    }

    function index() {
        $data['title']          = "Materi";
        $data['current_page']   = $this->current_page;
        $data['materi']         = $this->m_materi->getData();

        $this->load->view('v_landing_page', $data);
    }
}

?>