<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function TambahDataUser()
    {
        $password = $this->input->post('password', true);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            "username" => $this->input->post('username', true),
            "password" => $hashed_password,
            "fullname" => $this->input->post('fullname', true),
            "is_active" => $this->input->post('is_active', true),
        ];
        $this->db->insert('tb_user', $data);
    }

    public function getAllUser()
    {
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function getUserById($id)
    {
        $query =  $this->db->get_where('tb_user', ['id_user' => $id]);
        return $query->row_array();
    }
    public function UbahDataUser()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "fullname" => $this->input->post('fullname', true),
            "is_active" => $this->input->post('is_active', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }
    public function HapusDataUser($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
    }

    public function HitungUser()
    {
        $this->db->from('tb_user');
        return $this->db->count_all_results();
    }

    public function HitungUserAkt()
    {
        $this->db->from('tb_user');
        $this->db->where('is_active', 'ya');
        return $this->db->count_all_results();
    }

    public function HitungUserBlm()
    {
        $this->db->from('tb_user');
        $this->db->where('is_active', 'tidak');
        return $this->db->count_all_results();
    }
}



/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
