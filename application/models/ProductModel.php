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
        public function getReview($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        return null;
                }
                $this->db->where('productId', $slug);
                $query = $this->db->get('review');
                return $query->result_array();
        }
        public function edit($slug = FALSE) {
                if ($slug === FALSE) {
                        return null;
                }
                else {
                        $this->load->helper('url');
                        $data = array(
                                'name' => $this->input->post('name'),
                                'price' => $this->input->post('price'),
                                'title' => $this->input->post('title')
                        );
                        $this->db->where('ID', $slug);
                        return $this->db->update('product', $data);
                }
        }
        public function delete($slug = FALSE){
               $this->db->delete('product', array('ID' => $slug));
        }
        public function deletereview($slug = FALSE){
                $this->db->delete('review', array('id' => $slug));
        }

}