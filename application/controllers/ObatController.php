<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ObatController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->model('Jenis_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['obat'] = $this->Obat_model->getAllObat();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('obat/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $this->load->model('Jenis_model');
        $data['jenis'] = $this->Jenis_model->getAllJenis();

        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('tanggal_exp', 'Tanggal Expired', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('obat/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Obat_model->TambahDataObat();
            $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            redirect('obatcontroller');
        }
    }
    public function edit($id)
    {
        $data['obat']  = $this->Obat_model->getObatById($id);
        $data['jenis'] = $this->Jenis_model->getAllJenis();
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('tanggal_exp', 'Tanggal Expired', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('obat/edit', $data);
            $this->load->view('template/footer');
            $this->session->set_flashdata('failed', 'Mohon Isi Field Diatas');
        } else {
            $this->Obat_model->UbahDataObat();
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            redirect('obatcontroller');
        }
    }

    public function hapus($id)
    {
        $this->Obat_model->HapusDataObat($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('obatcontroller');
    }
}

/* End of file ObatController.php */
/* Location: ./application/controllers/ObatController.php */
