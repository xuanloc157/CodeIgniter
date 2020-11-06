<?php
class UserModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function login($username = FALSE, $password = FALSE)
    {
        $query = $this->db->$this->db->get_where('user', array('username' => $username, 'password' => $password));
        $data['user'] = $query->result_array();

        if (empty($data['user']))
        {
            $data['access'] = true;
            return $data;
        }
        else {
            $data['access'] = false;
            return $data;
        }

    }
}