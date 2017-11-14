<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('admin_tipe_model');
		$this->load->model('anggota_model');
		$this->load->model('anggota_tipe_model');
		$this->load->model('provinsi_model');
		$this->load->model('simpanan_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }
	
	function admin_create()
	{
		$data = array();
        $data['grid'] = $this->input->post('grid');
		
		if ($this->input->post('submit') == TRUE)
		{
			$param = array();
			$param['id_admin_tipe'] = $this->input->post('id_admin_tipe');
			$param['nama'] = $this->input->post('nama');
			$param['email'] = $this->input->post('email');
			$param['username'] = $this->input->post('username');
			$param['password'] = md5($this->input->post('password'));
			$param['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$param['tempat_lahir'] = $this->input->post('tempat_lahir');
			$param['tanggal_lahir'] = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
			$param['alamat'] = $this->input->post('alamat');
			$param['telp'] = $this->input->post('telp');
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->admin_model->create($param);

			if ($query > 0)
			{
				$response = array('text' => 'Success', 'type' => 'success', 'title' => 'Create');
			}
			else
			{
				$response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Create');
			}

			echo json_encode($response);
			exit();
		}
		else
		{
			// Tipe admin
			$admin_tipe_lists = array();
			$query = $this->admin_tipe_model->lists(array());
			
			if ($query->num_rows() > 0)
			{
				$admin_tipe_lists = $query->result();
			}
			
			$data['code_jenis_kelamin'] = $this->config->item('code_jenis_kelamin');
			$data['admin_tipe_lists'] = (object) $admin_tipe_lists;
			$this->load->view('user/admin_create', $data);
		}
	}

	function admin_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'nama';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->admin_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_admin.'" class="view '.$row->id_admin.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_admin.'" class="edit '.$row->id_admin.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_admin.'" class="delete '.$row->id_admin.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'Nama' => ucwords($row->nama),
                'Email' => $row->email,
                'Username' => $row->username,
                'Telp' => $row->telp,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function admin_lists()
	{
		$data = array();
		$data['view_content'] = 'user/admin_lists';
		
		$this->load->view('templates/frame', $data);
	}
	
	function anggota_create()
	{
		$data = array();
        $data['grid'] = $this->input->post('grid');
		
		if ($this->input->post('submit') == TRUE)
		{
			$param = array();
			$param['id_anggota_tipe'] = $this->input->post('id_anggota_tipe');
			$param['id_kota'] = $this->input->post('id_kota');
			$param['no_anggota'] = $this->input->post('no_anggota');
			$param['nama'] = $this->input->post('nama');
			$param['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$param['tempat_lahir'] = $this->input->post('tempat_lahir');
			$param['tanggal_lahir'] = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
			$param['alamat'] = $this->input->post('alamat');
			$param['kode_pos'] = $this->input->post('kode_pos');
			$param['telp'] = $this->input->post('telp');
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->anggota_model->create($param);

			if ($query > 0)
			{
				$response = array('text' => 'Success', 'type' => 'success', 'title' => 'Create');
			}
			else
			{
				$response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Create');
			}

			echo json_encode($response);
			exit();
		}
		else
		{
			// Tipe anggota
			$anggota_tipe_lists = array();
			$query = $this->anggota_tipe_model->lists(array());
			
			if ($query->num_rows() > 0)
			{
				$anggota_tipe_lists = $query->result();
			}
			
			// Provinsi
			$provinsi_lists = array();
			$query2 = $this->provinsi_model->lists(array('limit' => 40));
			
			if ($query2->num_rows() > 0)
			{
				$provinsi_lists = $query2->result();
			}
			
			$data['provinsi_lists'] = (object) $provinsi_lists;
			$data['anggota_tipe_lists'] = (object) $anggota_tipe_lists;
			$data['code_jenis_kelamin'] = $this->config->item('code_jenis_kelamin');
			$this->load->view('user/anggota_create', $data);
		}
	}

	function anggota_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'no_anggota';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->anggota_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_anggota.'" class="view '.$row->id_anggota.'-view" href="#"><i class="fa fa-folder-open h4 text-warning"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_anggota.'" class="edit '.$row->id_anggota.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_anggota.'" class="delete '.$row->id_anggota.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
					
			$pinjaman = '<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary tambahPinjaman '.$row->id_anggota.'-tambahPinjaman" id="'.$row->id_anggota.'"><i class="fa fa-plus"></i> Tambah</button>';
			
			// get simpanan
			$simpanan = 'Sudah terdaftar';
			$query2 = $this->simpanan_model->info(array('id_anggota' => $row->id_anggota));
			
			if ($query2->num_rows() == 0)
			{
				$simpanan = '<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary tambahSimpanan '.$row->id_anggota.'-tambahSimpanan" id="'.$row->id_anggota.'"><i class="fa fa-plus"></i> Tambah</button>';
			}
			
			$entry = array(
                'No' => $i,
                'NoAnggota' => $row->no_anggota,
                'Nama' => ucwords($row->nama),
                'Telp' => $row->telp,
                'Aksi' => $action,
				'Pinjaman' => $pinjaman,
				'Simpanan' => $simpanan
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function anggota_lists()
	{
		$data = array();
		$data['view_content'] = 'user/anggota_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
