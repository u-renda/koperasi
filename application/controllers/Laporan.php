<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function laporan_angsuran()
	{
		$data = array();
		$data['view_content'] = 'laporan/laporan_angsuran';
		
		$this->load->view('templates/frame', $data);
	}

	function laporan_bunga_tabungan()
	{
		$data = array();
		$data['view_content'] = 'laporan/laporan_bunga_tabungan';
		
		$this->load->view('templates/frame', $data);
	}

	function laporan_pinjaman()
	{
		$data = array();
		$data['view_content'] = 'laporan/laporan_pinjaman';
		
		$this->load->view('templates/frame', $data);
	}

	function laporan_setoran()
	{
		$data = array();
		$data['view_content'] = 'laporan/laporan_setoran';
		
		$this->load->view('templates/frame', $data);
	}

	function laporan_tunggakan()
	{
		$data = array();
		$data['view_content'] = 'laporan/laporan_tunggakan';
		
		$this->load->view('templates/frame', $data);
	}
}
