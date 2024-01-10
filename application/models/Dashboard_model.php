<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function DataObat()
    {
        $query = $this->db->from('tb_obat')
            ->order_by('tanggal_exp', 'ASC')
            ->get();
        return $query->result_array();
    }
}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */
