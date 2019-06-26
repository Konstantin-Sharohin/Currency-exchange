<?php
class Currencies extends CI_Controller {

        public function __construct() 
        {
            parent::__construct();

            $this->load->model('currency_model');
            $this->load->helper('url');
        }

        public function index() 
        {
            $data['title'] = 'Currency exchange';

            $this->load->view('templates/header', $data);
            $this->load->view('currency/index');
            $this->load->view('templates/footer');
            $this->output->cache(10);
        }

        public function save() 
        {
            $data['title'] = 'Save currency exchange';

            $this->currency_model->set();
        }

        public function history() 
        {
            $data['data'] = $this->currency_model->get_currencies();
            $data['title'] = 'Currency exchange archive';

            $this->load->view('templates/header', $data);
            $this->load->view('currency/history', $data);
            $this->load->view('templates/footer');
        }
}