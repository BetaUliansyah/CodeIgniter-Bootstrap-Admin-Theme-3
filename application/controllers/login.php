<?php

if (!defined('BASEPATH'))
    die();

class Login extends Main_Controller {

    public function index() {
        $this->load->view('include/BAT3_header_login');
        $this->load->view('BAT3_login');
        $this->load->view('include/BAT3_footer_login');
    }

    public function index2($name = 'Beta') {
        /* if (isset($this->input->post('submit'))) {
          $name = $this->input->post('name');
          } */
        $this->load->model('Newegg_model');
        $this->load->view('include/header-signin');
        $this->load->view('login', array('name' => $name));
        $this->load->view('include/footer');
    }

    public function page() {
        echo 'this is new page';
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
