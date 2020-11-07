<?php
class UserModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->query("SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'");
        $data['user'] = $query->result_array();

        if (!empty($data['user']))
        {
            $data['access'] = true;
            return $data;
        }
        else {
            $data['access'] = false;
            return $data;
        }

    }
    public function register(){
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
                'username' => strtolower($this->input->post('username')),
                'password' => $this->input->post('password'),
                'permission' => $this->input->post('permission')
        );

        return $this->db->insert('user', $data);
    }
}