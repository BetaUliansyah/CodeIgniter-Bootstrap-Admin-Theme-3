<?php if (!defined('BASEPATH')) die();
class Home extends Main_Controller {

   public function index()
	{
      $this->load->view('include/BAT3_header');
      $this->load->view('include/BAT3_topnav');
      $this->load->view('include/BAT3_menunav');
      $this->load->view('BAT3_index_sisanya');
      $this->load->view('include/BAT3_footer');
	}
   
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
