<?php
class User extends CI_Controller {
    public function __construct()
        {
                parent::__construct();
                $this->load->model('ProductModel');
                $this->load->helper('url_helper');
        }
        public function login(){
            
        }
}