<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin_tipe_model');
		$this->load->model('anggota_model');
		$this->load->model('kota_model');
		$this->load->model('provinsi_model');
		$this->load->model('simpanan_tipe_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }
	
	function check_admin_email()
	{
		$self = $this->input->post('selfemail');
		$input = $this->input->post('email');
		
		$result = $this->admin_model->info(array('email' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_admin_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		
		$result = $this->admin_model->info(array('nama' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_admin_tipe_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		
		$result = $this->admin_tipe_model->info(array('nama' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_admin_username()
	{
		$self = $this->input->post('selfusername');
		$input = $this->input->post('username');
		
		$result = $this->admin_model->info(array('username' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_anggota_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		
		$result = $this->anggota_model->info(array('nama' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_kota_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		$id = $this->input->post('id_provinsi');
		$get = $this->kota_model->info(array('nama' => $input, 'id_provinsi' => $id));
		
        if ($get->num_rows() > 0 && $self != $input)
        {
            echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_kota_lists()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		
		$result = $this->kota_model->lists(array('id_provinsi' => $id_provinsi, 'limit' => 700));
	
		if ($result->num_rows() > 0)
		{
			$data = array();
			$data['kota_lists'] = $result->result();
			$this->load->view('select_options_kota', $data);
		}
		else
		{
            echo 'false';
        }
	}
	
	function check_no_anggota()
	{
		$self = $this->input->post('selfno');
		$input = $this->input->post('no_anggota');
		
		$result = $this->anggota_model->info(array('no_anggota' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_provinsi_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		
		$result = $this->provinsi_model->info(array('nama' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_simpanan_tipe_nama()
	{
		$self = $this->input->post('selfnama');
		$input = $this->input->post('nama');
		
		$result = $this->simpanan_tipe_model->info(array('nama' => $input));
	
		if ($result->num_rows() > 0 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}

	function index()
	{
		$data = array();
		$data['view_content'] = 'home';
		
		$this->load->view('templates/frame', $data);
	}
}
