<?php

if (!defined('BASEPATH'))
    die();

class Calendar extends Main_Controller {

    public function index() {
        $this->load->view('include/BAT3_header_calendar');
        $this->load->view('include/BAT3_topnav');
        $this->load->view('include/BAT3_menunav');
        $this->load->view('BAT3_calendar');
        $this->load->view('include/BAT3_footer_calendar');
    }

}

/* End of file calendar.php */
/* Location: */