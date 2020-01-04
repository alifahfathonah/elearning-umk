<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(
            array(
                'm_pengguna',
            )
        );
        $this->load->library(
            array(
                'form_validation'
            )
        );
    }

	public function login()
	{
        // Start Validation
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            array(
                'required' => '*) Masukkan Username Anda',
                'trim' => '*) Masukkan Username dengan Benar'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required' => '*) Masukkan Password Anda',
                'min_length' => '*) Password Minimal 6 Karakter'
            )
        );
        // End Validation

        if ($this->form_validation->run() == true) {
            $username 			= $this->input->post('username');
            $password 			= sha1(md5($this->input->post('password')));

            $result = $this->m_pengguna->auth_login($username, $password);

            if (!empty($result) && count($result) > 0)
            {
                $data_session = array(
                    'id' 			    => $result->id,
                    'email' 	        => $result->email,
                    'username' 	        => $result->username,
                    'password'	        => $result->password
                );

                $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::SUCCESS, "Login Berhasil"));
                $this->session->set_userdata($data_session);

                redirect('dashboard/');

            }
            else
            {
                $this->session->set_flashdata('alert', $this->alert->set_alert_dialog(Alert::DANGER, "Login Gagal, Username atau Password Tidak Valid"));
                redirect('/login', 'refresh');
            }
        }
        else {
            $this->load->view('v_login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}

?>
