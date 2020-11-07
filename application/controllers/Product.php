<?php
class Product extends CI_Controller
{

        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('ProductModel');
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
        public function index()
        {
                if (!$this->checkSession()) {
                        return $this->UserModel->login();
                }
                $data['product'] = $this->ProductModel->get_Product();
                $data['title'] = 'Product List';
                $this->load->view('templates/header', $data);
                $this->load->view('product/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                if (!$this->checkSession()) {
                        return $this->UserModel->login();
                }
                $data['product_item'] = $this->ProductModel->get_Product($slug);
                $data['review'] = $this->ProductModel->getReview($slug);
                if (empty($data['product_item']))
                {
                        show_404();
                }

                $data['title'] = $data['product_item']['name'];

                $this->load->view('templates/header', $data);
                $this->load->view('product/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
                if (!$this->checkSession()) {
                        return $this->UserModel->login();
                }
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a new item';

                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('price', 'price', 'required');
                $this->form_validation->set_rules('title', 'title', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('product/create');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->ProductModel->set_Product();
                        $this->index();
                }
        }
        public function edit($slug = NULL)
        {
                if (!$this->checkSession()) {
                        return $this->UserModel->login();
                }
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Edit';

                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('price', 'price', 'required');
                $this->form_validation->set_rules('title', 'title', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $data['product_item'] = $this->ProductModel->get_Product($slug);
                        if (empty($data['product_item']))
                        {
                                show_404();
                        }

                        $data['title'] = "Edit" . $data['product_item']['name'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('product/edit', $data);
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->ProductModel->edit($slug);
                        $this->view($slug);
                }
        }
        public function delete($slug = NULL){
                $this->ProductModel->delete($slug);
                $this->index();
        }
        public function deleterev($slug = NULL){
                $this->ProductModel->deletereview($slug);
                $this->index();
        }
}