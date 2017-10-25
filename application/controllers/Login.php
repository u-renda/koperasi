<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin_tipe_model');
    }

    function check_password($password, $username)
    {
        $result = $this->admin_model->info(array('username' => $username, 'password' => md5($password)));
		
        if ($result->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Username atau Password Salah');
            return FALSE;
        }
    }

	function index()
	{
        if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_home')); }
		
        $data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('username').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$query = $this->admin_model->info(array('username' => $this->input->post('username')));

				if ($query->num_rows() > 0)
				{
					$admin = $query->row();
					$query2 = $this->admin_tipe_model->info(array('id_admin_tipe' => $admin->id_admin_tipe));
					
					if ($query2->num_rows() > 0)
					{
						$admin_tipe = $query2->row();
						
						$cached = array(
							'id_admin'=> $admin->id_admin,
							'username'=> $admin->username,
							'email'=> $admin->email,
							'nama'=> $admin->nama,
							'foto'=> $admin->foto,
							'admin_tipe'=> $admin_tipe->nama,
							'is_login' => TRUE
						);
						
						// Set session
						$this->session->set_userdata($cached);
						
						redirect($this->config->item('link_home'));
					}
				}
			}
		}

        $this->load->view('login', $data);
	}

    function logout()
    {
        $this->session->sess_destroy();
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('admin_tipe');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('is_login');
		
        redirect($this->config->item('link_login'));
    }
}
