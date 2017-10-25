<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposito extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function deposito_lists()
	{
		$data = array();
		$data['view_content'] = 'deposito/deposito_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
