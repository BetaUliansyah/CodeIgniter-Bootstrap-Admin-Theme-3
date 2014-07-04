<?php

/* 
 * Simulasi Laporan DAK 2014 dibuat khusus untuk Subdit Pelaksanaan Transfer 1
 * Beta Uliansyah <beta.uliansyah@gmail.com>
 */

if (!defined('BASEPATH'))
    die();

class Buttons extends Main_Controller {

    public function index() {
        $this->load->view('include/BAT3_header_buttons');
        $this->load->view('include/BAT3_topnav');
        $this->load->view('include/BAT3_menunav');
        $this->load->view('BAT3_buttons');
        $this->load->view('include/BAT3_footer');
    }

}

/* End of file buttons.php */
/* Location: */