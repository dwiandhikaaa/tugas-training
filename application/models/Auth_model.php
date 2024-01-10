<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();
    }

    public function get_user($username)
    {
        return $this->db->get_where('tb_user', array('username' => $username))->row();
    }
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
