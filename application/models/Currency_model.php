<?php
class Currency_model extends CI_Model {

        public function __construct() 
        {
                $this->load->database();
        }

        public function get_currencies() 
        {
            $query = $this->db->get('currencies');
            return $query->result_array();
        }

        public function set() 
        {
            $data = array(
                array(
                "currency_type" => $this->input->post('ccy_type_usd'),
                "buy" => $this->input->post('buy_usd'),
                "sale" => $this->input->post('sale_usd'),
                "bank" => $this->input->post('bank')
                ),
                array(
                "currency_type" => $this->input->post('ccy_type_eur'),
                "buy" => $this->input->post('buy_eur'),
                "sale" => $this->input->post('sale_eur'),
                "bank" => $this->input->post('bank')
                )
            );

            return $this->db->insert_batch('currencies', $data);
        }
}