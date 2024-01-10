<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->get_user($username);

            if ($user && password_verify($password, $user->password)) {

                if ($user->is_active === 'ya') {
                    $data = array(
                        'username' => $user->username,
                        'fullname' => $user->fullname,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('dashboardcontroller');
                } else {
                    $this->session->set_flashdata('message', 'Akun Anda Belum Aktif');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', 'Password dan Username Salah');
                redirect('auth/login');
            }
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $this->User_model->TambahDataUser();
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
