<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function setor_ambil_lists()
	{
		$data = array();
		$data['view_content'] = 'simpanan/setor_ambil_lists';
		
		$this->load->view('templates/frame', $data);
	}

	function simpanan_lists()
	{
		$data = array();
		$data['view_content'] = 'simpanan/simpanan_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
