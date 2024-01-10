<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function TambahDataObat()
    {
        $data = [
            "nama_obat" => $this->input->post('nama_obat', true),
            "id_jenis_obat" => $this->input->post('id_jenis_obat', true),
            "satuan" => $this->input->post('satuan', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
            "tanggal_exp" => $this->input->post('tanggal_exp', true),
        ];
        $this->db->insert('tb_obat', $data);
    }

    public function getAllObat()
    {
        $query = $this->db->select('*')
            ->from('tb_obat')
            ->join('tb_jenis_obat', 'tb_obat.id_jenis_obat = tb_jenis_obat.id_jenis_obat')
            ->get();

        return $query->result_array();
    }
    public function getObatById($id)
    {
        $query =  $this->db->get_where('tb_obat', ['id_obat' => $id]);
        return $query->row_array();
    }


    public function UbahDataObat()
    {
        $data = [
            "nama_obat" => $this->input->post('nama_obat', true),
            "id_jenis_obat" => $this->input->post('id_jenis_obat', true),
            "satuan" => $this->input->post('satuan', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
            "tanggal_exp" => $this->input->post('tanggal_exp', true),
        ];
        $this->db->where('id_obat', $this->input->post('id_obat'));
        $this->db->update('tb_obat', $data);
    }

    public function HapusDataObat($id)
    {
        $this->db->delete('tb_obat', ['id_obat' => $id]);
    }


    public function HitungObat()
    {
        $this->db->from('tb_obat');
        return $this->db->count_all_results();
    }

    public function HitungObatKadal()
    {
        $today = date('Y-m-d');

        $this->db->from('tb_obat');
        $this->db->where('tanggal_exp <', $today);
        return $this->db->count_all_results();
    }

    public function HitungObatBlmKadal()
    {
        $today = date('Y-m-d');

        $this->db->from('tb_obat');
        $this->db->where('tanggal_exp >', $today);
        return $this->db->count_all_results();
    }
}
/* End of file Obat_model.php */
/* Location: ./application/models/Obat_model.php */
