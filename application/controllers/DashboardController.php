<?php


defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('User_model');
        $this->load->model('Jenis_model');
        $this->load->model('Obat_model');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['jml_jenis'] = $this->Jenis_model->HitungJenis();
        $data['jml_obat'] = $this->Obat_model->HitungObat();
        $data['jml_obat_kadal'] = $this->Obat_model->HitungObatKadal();
        $data['jml_obat_blm'] = $this->Obat_model->HitungObatBlmKadal();
        $data['jml_user'] = $this->User_model->HitungUser();
        $data['jml_user_akt'] = $this->User_model->HitungUserAkt();
        $data['jml_user_blm'] = $this->User_model->HitungUserBlm();
        $data['obat'] = $this->Dashboard_model->DataObat();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/DashboardController.php */
