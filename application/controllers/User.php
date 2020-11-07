<?php
class User extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('UserModel');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }
        public function checkSession(){
                if (isset($_SESSION['user'])) {
                        return true;
                }
                else{
                        return false;
                }
        }
        public function login() {
                
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Login';
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('user/login');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $data = $this->UserModel->login();
                        if ($data['access'] == true) {
                                $user = array(
                                        'username'  => strtolower($data['user'][0]['username']),
                                        'permission'  => $data['user'][0]['permission']
                                );
                                
                                $this->session->set_userdata('user', $user);
                                redirect(base_url() . 'product', 'refresh');
                        }
                        else {
                                $data['title'] = 'Login';
                                $data['error'] = "worng username or password";
                                $this->load->view('templates/header', $data);
                                $this->load->view('user/login', $data);
                                $this->load->view('templates/footer');
                        }

                }
        }
        public function register(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Register';

                $this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('user/register');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->UserModel->register();
                        $this->login();
                }
        }
        public function logout(){
                $this->session->unset_userdata('user');
                $this->login();
        }
}