<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('angsuran_model');
		$this->load->model('pinjaman_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function angsuran_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'no_angsuran';
        $sort = 'desc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->angsuran_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_angsuran.'" class="view '.$row->id_angsuran.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_angsuran.'" class="edit '.$row->id_angsuran.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_angsuran.'" class="delete '.$row->id_angsuran.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
			$nama_anggota = '';
			$query2 = $this->pinjaman_model->info(array('id_pinjaman' => $row->id_pinjaman));
			
			if ($query2->num_rows() > 0)
			{
				$nama_anggota = ucwords($query2->row()->nama);
			}
			
            $entry = array(
                'No' => $i,
                'Anggota' => $nama_anggota,
                'TglAngsuran' => $row->tgl_angsuran,
                'AngsuranKe' => $row->angsuran_ke,
                'JumlahAngsuran' => number_format($row->jumlah_angsuran, 0, ',','.'),
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function angsuran_lists()
	{
		$data = array();
		$data['view_content'] = 'pinjaman/angsuran_lists';
		$this->load->view('templates/frame', $data);
	}

	function pinjaman_create()
	{
		$data = array();
		$data['view_content'] = 'pinjaman/pinjaman_create';
		$this->load->view('templates/frame', $data);
	}
	
	function pinjaman_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'no_pinjaman';
        $sort = 'desc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->pinjaman_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $code_pinjaman_status = $this->config->item('code_pinjaman_status');
			
			$action = '<a title="View" id="'.$row->id_pinjaman.'" class="view '.$row->id_pinjaman.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_pinjaman.'" class="edit '.$row->id_pinjaman.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_pinjaman.'" class="delete '.$row->id_pinjaman.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
			$status = $code_pinjaman_status[$row->status];
			if ($row->status == 2)
			{
				$status = '<span class="well well-sm success">'.$code_pinjaman_status[$row->status].'</span>';
			}
			elseif ($row->status == 3)
			{
				$status = '<span class="well well-sm danger">'.$code_pinjaman_status[$row->status].'</span>';
			}
			
            $entry = array(
                'No' => $i,
                'NamaAnggota' => ucwords($row->nama),
                'TglPinjam' => date('d M Y', strtotime($row->tgl_pinjam)),
                'TglJatuhTempo' => date('d M Y', strtotime($row->tgl_jatuh_tempo)),
                'JumlahPinjaman' => number_format($row->jumlah_pinjaman, 0, ',','.'),
                'Keterangan' => $status,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function pinjaman_lists()
	{
		$data = array();
		$data['view_content'] = 'pinjaman/pinjaman_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
