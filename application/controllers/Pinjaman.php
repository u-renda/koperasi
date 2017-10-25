<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function angsuran_lists()
	{
		$data = array();
		$data['view_content'] = 'pinjaman/angsuran_lists';
		
		$this->load->view('templates/frame', $data);
	}

	function pinjaman_lists()
	{
		$data = array();
		$data['view_content'] = 'pinjaman/pinjaman_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
