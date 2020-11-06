<?php
class Product extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('ProductModel');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['product'] = $this->ProductModel->get_Product();
                $data['title'] = 'Product List';

                $this->load->view('templates/header', $data);
                $this->load->view('product/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['product_item'] = $this->ProductModel->get_Product($slug);
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
}