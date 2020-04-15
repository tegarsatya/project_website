<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data  = array(
			'title'			=>'Halaman Login',
		);

		$this->load->view('admin/login');
	}

}

/* End of file Login.php */
