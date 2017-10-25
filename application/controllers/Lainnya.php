<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function akun_saya()
	{
		$data = array();
		$data['view_content'] = 'lainnya/akun_saya';
		
		$this->load->view('templates/frame', $data);
	}
}
