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
		$id = $this->session->userdata('id_admin');
        $get = $this->admin_model->info(array('id_admin' => $id));

        if ($get->num_rows() > 0)
        {
			$notif = '';
            if ($this->input->post('submit') == TRUE)
            {
                $this->load->library('form_validation');
				$this->form_validation->set_message('required', '%s harus diisi');
                $this->form_validation->set_rules('nama', 'nama', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
                $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required');
                $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');
                $this->form_validation->set_rules('alamat', 'alamat', 'required');
                $this->form_validation->set_rules('telp', 'telp', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $param['nama'] = $this->input->post('nama');
                    $param['email'] = $this->input->post('email');
                    $param['jenis_kelamin'] = $this->input->post('jenis_kelamin');
                    $param['tempat_lahir'] = $this->input->post('tempat_lahir');
                    $param['tanggal_lahir'] = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
                    $param['alamat'] = $this->input->post('alamat');
                    $param['telp'] = $this->input->post('telp');
                    $param['updated_date'] = date('Y-m-d H:i:s');
                    $query = $this->admin_model->update($id, $param);

                    if ($query > 0)
                    {
						$notif = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Perubahan data berhasil.</div>';
                    }
                    else
                    {
                        $notif = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Perubahan data gagal.</div>';
                    }
                }
            }
			elseif ($this->input->post('submit_password') == TRUE)
			{
				$this->load->library('form_validation');
				$this->form_validation->set_message('required', '%s harus diisi');
				$this->form_validation->set_message('min_length', '%s harus lebih dari 5 karakter');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('password_lama', 'password lama', 'required|callback_password_check');
                $this->form_validation->set_rules('password_baru', 'password baru', 'required|min_length[5]');
				
				if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $param['username'] = $this->input->post('username');
                    $param['password'] = md5($this->input->post('password_baru'));
                    $param['updated_date'] = date('Y-m-d H:i:s');
                    $query = $this->admin_model->update($id, $param);

                    if ($query > 0)
                    {
						$notif = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Perubahan data berhasil.</div>';
                    }
                    else
                    {
                        $notif = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Perubahan data gagal.</div>';
                    }
                }
			}

			$data['notif'] = $notif;
			$data['code_admin_jenis_kelamin'] = $this->config->item('code_admin_jenis_kelamin');
            $data['result'] = $get->row();
            $data['view_content'] = 'lainnya/akun_saya';
			$this->load->view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
	}
	
	function password_check($param)
	{
		$query = $this->admin_model->info(array('password' => md5($param)));
		
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('password_check', '%s tidak sesuai/salah');
            return FALSE;
		}
	}
}
