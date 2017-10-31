<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_tipe_model');
		$this->load->model('kota_model');
		$this->load->model('provinsi_model');
		$this->load->model('simpanan_tipe_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function admin_tipe_get()
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

        $query = $this->admin_tipe_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" id="'.$row->id_admin_tipe.'" class="edit '.$row->id_admin_tipe.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_admin_tipe.'" class="delete '.$row->id_admin_tipe.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'Nama' => ucwords($row->nama),
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function admin_tipe_lists()
	{
		$data = array();
		$data['view_content'] = 'master_data/admin_tipe_lists';
		
		$this->load->view('templates/frame', $data);
	}

	function kota_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'nama';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');
		$id_provinsi = $this->input->post('id');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->kota_model->lists(array('id_provinsi' => $id_provinsi, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" id="'.$row->id_kota.'" class="edit '.$row->id_kota.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_kota.'" class="delete '.$row->id_kota.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'Nama' => ucwords($row->nama),
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function kota_lists()
	{
		$data = array();
		$id_provinsi = $this->input->get('id');
		
		if ($id_provinsi == FALSE)
		{
			redirect($this->config->item('link_provinsi_lists'));
		}
		else
		{
			$query2 = $this->provinsi_model->info(array('id_provinsi' => $id_provinsi));
		
			if ($query2->num_rows() > 0)
			{
				$data['result'] = $query2->row();
			}
				
			$data['view_content'] = 'master_data/kota_lists';
			
			$this->load->view('templates/frame', $data);
		}
	}

	function provinsi_get()
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

        $query = $this->provinsi_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" id="'.$row->id_provinsi.'" class="edit '.$row->id_provinsi.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_provinsi.'" class="delete '.$row->id_provinsi.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'Nama' => '<a href="'.$this->config->item("link_kota_lists").'?id='.$row->id_provinsi.'">'.ucwords($row->nama).'</a>',
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function provinsi_lists()
	{
		$data = array();
		$data['view_content'] = 'master_data/provinsi_lists';
		
		$this->load->view('templates/frame', $data);
	}

	function simpanan_tipe_get()
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

        $query = $this->simpanan_tipe_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" id="'.$row->id_simpanan_tipe.'" class="edit '.$row->id_simpanan_tipe.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_simpanan_tipe.'" class="delete '.$row->id_simpanan_tipe.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'Nama' => ucwords($row->nama),
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function simpanan_tipe_lists()
	{
		$data = array();
		$data['view_content'] = 'master_data/simpanan_tipe_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
