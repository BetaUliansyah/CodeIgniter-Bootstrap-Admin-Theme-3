<?php
class Newegg_model extends CI_Model {
	public function __construct()
   {
      parent::__construct();
   }


	function process_name($name)
	{
		return md5($name);
	}
}