<?php

/*
 * Simulasi Laporan DAK 2014 dibuat khusus untuk Subdit Pelaksanaan Transfer 1
 * Beta Uliansyah <beta.uliansyah@gmail.com>
 */

if (!defined('BASEPATH'))
    die();

class Signup extends Main_Controller {

    public function index() {
        $this->load->view('include/BAT3_header_login');
        $this->load->view('BAT3_signup');
        $this->load->view('include/BAT3_footer_login');
    }

}

/* End of file signup.php */
/* Location: */