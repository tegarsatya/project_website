<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title'      => 'Website Sma Banjarwangi-1',
			'isi'	     => 'home/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file ControllernameHome.php */
