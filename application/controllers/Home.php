<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function index()
	{
		$data = array();
		$data['view_content'] = 'home';
		
		$this->load->view('templates/frame', $data);
	}
}
