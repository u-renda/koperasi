<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('simpanan_detail_model');
		$this->load->model('simpanan_model');
		$this->load->model('simpanan_tipe_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }
	
	function simpanan_create()
	{
		$data = array();
        $data['id_anggota'] = $this->input->post('id_anggota');
		
		if ($this->input->post('submit') == TRUE)
		{
			$param = array();
			$param['id_anggota'] = $data['id_anggota'];
			$param['id_simpanan_tipe'] = $this->input->post('id_simpanan_tipe');
			$param['no_rekening'] = $this->input->post('no_rekening');
			$param['created_date'] = date('Y-m-d H:i:s', strtotime($this->input->post('created_date')));
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->simpanan_model->create($param);

			if ($query != 0 || $query != '')
			{
				// Masukkan detailnya
				$param2 = array();
				$param2['id_simpanan'] = $query;
				$param2['no_transaksi'] = $this->input->post('no_transaksi');
				$param2['jumlah'] = $this->input->post('jumlah');
				$param2['saldo_akhir'] = $this->input->post('jumlah');
				$param2['status'] = 1;
				$param2['urutan'] = 1;
				$param2['created_date'] = date('Y-m-d H:i:s');
				$param2['updated_date'] = date('Y-m-d H:i:s');
				$query4 = $this->simpanan_detail_model->create($param2);
				
				$location = $this->config->item('link_simpanan_lists');
				$response = array('text' => 'Berhasil', 'type' => 'success', 'title' => 'Create', 'location' => $location);
			}
			else
			{
				$response = array('text' => 'Gagal', 'type' => 'error', 'title' => 'Create');
			}

			echo json_encode($response);
			exit();
		}
		else
		{
			// Anggota
			$anggota = array();
			$query2 = $this->anggota_model->info(array('id_anggota' => $data['id_anggota']));
			
			if ($query2->num_rows() > 0)
			{
				$anggota = $query2->row();
			}
			
			// Simpanan tipe
			$simpanan_tipe_lists = array();
			$query3 = $this->simpanan_tipe_model->lists(array());
			
			if ($query3->num_rows() > 0)
			{
				$simpanan_tipe_lists = $query3->result();
			}
			
			$data['simpanan_tipe_lists'] = $simpanan_tipe_lists;
			$data['anggota'] = $anggota;
			$this->load->view('simpanan/simpanan_create', $data);
		}
	}
	
	function simpanan_detail_create()
	{
		$data = array();
        $data['id_simpanan'] = $this->input->post('id_simpanan');
		
		if ($this->input->post('submit') == TRUE)
		{
			// Saldo akhir
			if ($this->input->post('status') == 1)
			{
				$saldo_akhir = $this->input->post('saldo_akhir') + $this->input->post('jumlah');
			}
			else
			{
				$saldo_akhir = $this->input->post('saldo_akhir') - $this->input->post('jumlah');
			}
			
			$param = array();
			$param['id_simpanan'] = $data['id_simpanan'];
			$param['no_transaksi'] = $this->input->post('no_transaksi');
			$param['jumlah'] = $this->input->post('jumlah');
			$param['saldo_akhir'] = $saldo_akhir;
			$param['status'] = $this->input->post('status');
			$param['urutan'] = $this->input->post('urutan') + 1;
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->simpanan_detail_model->create($param);

			if ($query > 0)
			{
				$location = $this->config->item('link_simpanan_detail_lists');
				$response = array('text' => 'Berhasil', 'type' => 'success', 'title' => 'Create', 'location' => $location);
			}
			else
			{
				$response = array('text' => 'Gagal', 'type' => 'error', 'title' => 'Create');
			}

			echo json_encode($response);
			exit();
		}
		else
		{
			// Simpanan
			$simpanan = array();
			$query2 = $this->simpanan_model->info(array('id_simpanan' => $data['id_simpanan']));
			
			if ($query2->num_rows() > 0)
			{
				$simpanan = $query2->row();
				
				// Simpanan Detail
				$simpanan_detail = array();
				$query3 = $this->simpanan_detail_model->lists(array('id_simpanan' => $data['id_simpanan'], 'order' => 'urutan', 'sort' => 'desc'));
				
				if ($query3->num_rows() > 0)
				{
					$simpanan_detail = $query3->first_row();
				}
				
				$data['simpanan'] = $simpanan;
				$data['simpanan_detail'] = $simpanan_detail;
				$data['code_simpanan_detail_status'] = $this->config->item('code_simpanan_detail_status');
				$this->load->view('simpanan/simpanan_detail_create', $data);
			}
			else
			{
				echo "Data not found";
			}
		}
	}

	function simpanan_detail_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'no_transaksi';
        $sort = 'desc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->simpanan_detail_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
			$code_simpanan_detail_status = $this->config->item('code_simpanan_detail_status');
			
            $action = '<a title="View" id="'.$row->id_simpanan_detail.'" class="view '.$row->id_simpanan_detail.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_simpanan_detail.'" class="edit '.$row->id_simpanan_detail.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_simpanan_detail.'" class="delete '.$row->id_simpanan_detail.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'NoTransaksi' => $row->no_transaksi,
                'Jumlah' => number_format($row->jumlah, 0, ',', '.'),
                'SaldoAkhir' => number_format($row->saldo_akhir, 0, ',', '.'),
                'Status' => $code_simpanan_detail_status[$row->status],
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function simpanan_detail_lists()
	{
		$data = array();
		$data['view_content'] = 'simpanan/simpanan_detail_lists';
		$this->load->view('templates/frame', $data);
	}

	function simpanan_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->simpanan_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_simpanan.'" class="view '.$row->id_simpanan.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_simpanan.'" class="edit '.$row->id_simpanan.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_simpanan.'" class="delete '.$row->id_simpanan.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
			$setor_tarik = '<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary tambahSetorTarik '.$row->id_simpanan.'-tambahSetorTarik" id="'.$row->id_simpanan.'"><i class="fa fa-plus"></i> Tambah</button>';
			
			// get saldo akhir
			$query2 = $this->simpanan_detail_model->lists(array('id_simpanan' => $row->id_simpanan, 'order' => 'urutan', 'sort' => 'desc'));
			
			if ($query2->num_rows() > 0)
			{
				$simpanan_detail = $query2->first_row();
			}
			
            $entry = array(
                'No' => $i,
                'TipeSimpanan' => ucwords($row->nama_simpanan_tipe),
                'Anggota' => ucwords($row->nama_anggota),
                'NoRekening' => $row->no_rekening,
                'SaldoAkhir' => 'Rp '.number_format($simpanan_detail->saldo_akhir, 0, ',', '.'),
                'Aksi' => $action,
				'SetorTarik' => $setor_tarik
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function simpanan_lists()
	{
		$data = array();
		$data['view_content'] = 'simpanan/simpanan_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
