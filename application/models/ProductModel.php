<?php
class ProductModel extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }
        public function get_Product($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        $query = $this->db->get('product');
                        return $query->result_array();
                }

                $query = $this->db->get_where('product', array('id' => $slug));
                return $query->row_array();
        }
        public function set_Product()
        {
                $this->load->helper('url');

                //$slug = url_title($this->input->post('title'), 'dash', TRUE);

                $data = array(
                        'name' => $this->input->post('name'),
                        'price' => $this->input->post('price'),
                        'title' => $this->input->post('title')
                );

                return $this->db->insert('product', $data);
        }
}