<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('angsuran_model');
		$this->load->model('pinjaman_model');
		$this->load->model('pinjaman_tipe_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function angsuran_create()
	{
		$data = array();
        $data['id_pinjaman'] = $this->input->post('id_pinjaman');
		
		if ($this->input->post('submit') == TRUE)
		{
			$id_angsuran = $this->input->post('id_angsuran');
			$param = array();
			$param['tgl_angsuran'] = date('Y-m-d', strtotime($this->input->post('tgl_angsuran')));
			$param['status'] = 2;
			$param['no_angsuran'] = $this->input->post('no_angsuran');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->angsuran_model->update($id_angsuran, $param);

			if ($query > 0)
			{
				$location = $this->config->item('link_angsuran_invoice').'?id_angsuran='.$id_angsuran;
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
			// Pinjaman
			$pinjaman = array();
			$anggota = array();
			$angsuran = array();
			$query3 = $this->pinjaman_model->info(array('id_pinjaman' => $data['id_pinjaman']));
			
			if ($query3->num_rows() > 0)
			{
				$pinjaman = $query3->row();
				
				// Anggota
				$query2 = $this->anggota_model->info(array('id_anggota' => $pinjaman->id_anggota));
				
				if ($query2->num_rows() > 0)
				{
					$anggota = $query2->row();
				}
				
				// Angsuran
				$param2 = array();
				$param2['id_pinjaman'] = $pinjaman->id_pinjaman;
				$param2['order'] = 'angsuran_ke';
				$param2['sort'] = 'asc';
				$param2['status'] = 1;
				$query4 = $this->angsuran_model->lists($param2);
				
				if ($query4->num_rows() > 0)
				{
					$angsuran = $query4->first_row();
				}
			}
			
			$data['pinjaman'] = $pinjaman;
			$data['anggota'] = $anggota;
			$data['angsuran'] = $angsuran;
			$this->load->view('pinjaman/angsuran_create', $data);
		}
	}

    function angsuran_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->angsuran_model->info(array('id_angsuran' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->angsuran_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('text' => 'Success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
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
        $status = $this->input->post('status');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $query = $this->angsuran_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort, 'status' => $status));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_angsuran.'" class="view '.$row->id_angsuran.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						
                        <a title="Delete" id="'.$row->id_angsuran.'" class="delete '.$row->id_angsuran.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			//<a title="Edit" id="'.$row->id_angsuran.'" class="edit '.$row->id_angsuran.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
			
			if ($row->status == 2)
			{
				$action .= '&nbsp;&nbsp;<a title="Print" href="'.$this->config->item('link_angsuran_print').'?id_angsuran='.$row->id_angsuran.'" target="_blank"><i class="fa fa-print h4 text-dark"></i></a>';
			}
			
			$nama_anggota = '';
			$query2 = $this->pinjaman_model->info(array('id_pinjaman' => $row->id_pinjaman));
			
			if ($query2->num_rows() > 0)
			{
				$nama_anggota = ucwords($query2->row()->nama);
			}
			
			$code_angsuran_status = $this->config->item('code_angsuran_status');
			$status = $code_angsuran_status[$row->status];
			
			if ($row->status == 2)
			{
				$status = '<span class="well well-sm success">'.$code_angsuran_status[$row->status].'</span>';
			}
			
            $entry = array(
                'No' => $i,
                'Anggota' => $nama_anggota,
                'TglAngsuran' => $row->tgl_angsuran,
                'AngsuranKe' => $row->angsuran_ke,
                'JumlahAngsuran' => number_format($row->jumlah_angsuran, 0, ',','.'),
                'Status' => $status,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}
	
	function angsuran_invoice()
	{
		$data = array();
		$id_angsuran = $this->input->get('id_angsuran');
		
		if ($id_angsuran != '')
		{
			$query = $this->angsuran_model->info(array('id_angsuran' => $id_angsuran));
		
			if ($query->num_rows() > 0)
			{
				$angsuran = $query->row();
				$query3 = $this->anggota_model->info(array('id_anggota' => $angsuran->id_anggota));
					
				if ($query3->num_rows() > 0)
				{
					$data['anggota'] = $query3->row();
				}
				
				$data['angsuran'] = $angsuran;
				$data['view_content'] = 'pinjaman/angsuran_invoice';
				$this->load->view('templates/frame', $data);
			}
			else
			{
				echo "Data not found";
			}
		}
		else
		{
			echo "Data not found";
		}
	}

	function angsuran_lists()
	{
		$data = array();
		$data['code_angsuran_status'] = $this->config->item('code_angsuran_status');
		$data['status'] = $this->input->get_post('status');
		$data['view_content'] = 'pinjaman/angsuran_lists';
		$this->load->view('templates/frame', $data);
	}
	
	function angsuran_print()
	{
		$this->load->helper("pdf");
		
		$data = array();
		$id_angsuran = $this->input->get('id_angsuran');
		
		if ($id_angsuran != '')
		{
			$query = $this->angsuran_model->info(array('id_angsuran' => $id_angsuran));
		
			if ($query->num_rows() > 0)
			{
				$angsuran = $query->row();
				$query3 = $this->anggota_model->info(array('id_anggota' => $angsuran->id_anggota));
					
				if ($query3->num_rows() > 0)
				{
					$data['anggota'] = $query3->row();
				}
				
				$data['angsuran'] = $angsuran;
				pdf_create($data, 'angsuran');
			}
		}
		else
		{
			echo "Data not found";
		}
	}
    
    function angsuran_view()
    {
		$id = $this->input->post('id');
		$get = $this->angsuran_model->info(array('id_angsuran' => $id));
		
		if ($get->num_rows() > 0)
		{
			$result = $get->row();
			
			$data = array();
			$data['nama'] = $result->nama;
			$data['tipe_nama'] = $result->tipe_nama;
			$data['no_pinjaman'] = $result->no_pinjaman;
			$data['tgl_pinjam'] = date('d M Y', strtotime($result->tgl_pinjam));
			$data['jumlah_pinjaman'] = 'Rp '.number_format($result->jumlah_pinjaman, 0, ',', '.');
			$data['kali_angsuran'] = $result->kali_angsuran.' kali';
			$data['bunga'] = number_format($result->bunga, 0, ',', '.').'%';
			$data['tgl_jatuh_tempo'] = date('d M Y', strtotime($result->tgl_jatuh_tempo));
			$data['status'] = $code_pinjaman_status[$result->status];
			$this->load->view('pinjaman/pinjaman_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }

	function pinjaman_create()
	{
		$data = array();
        $data['id_anggota'] = $this->input->post('id_anggota');
		
		if ($this->input->post('submit') == TRUE)
		{
			$param = array();
			$param['id_anggota'] = $data['id_anggota'];
			$param['id_pinjaman_tipe'] = $this->input->post('id_pinjaman_tipe');
			$param['no_pinjaman'] = $this->input->post('no_pinjaman');
			$param['tgl_pinjam'] = date('Y-m-d H:i:s', strtotime($this->input->post('tgl_pinjam')));
			$param['jumlah_pinjaman'] = $this->input->post('jumlah_pinjaman');
			$param['tgl_jatuh_tempo'] = date('Y-m-d', strtotime($this->input->post('tgl_jatuh_tempo')));
			$param['kali_angsuran'] = $this->input->post('kali_angsuran');
			$param['bunga'] = $this->input->post('bunga');
			$param['status'] = 1;
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->pinjaman_model->create($param);

			if ($query != 0 || $query != '')
			{
				// Masukkan angsurannya
				$query5 = $this->pinjaman_tipe_model->info(array('id_pinjaman_tipe' => $param['id_pinjaman_tipe']));
				
				if ($query5->row()->nama == 'bulanan')
				{
					$plus = '+1 month';
				}
				elseif ($query5->row()->nama == 'mingguan')
				{
					$plus = '+1 week';
				}
				else
				{
					$plus = '+1 day';
				}
				
				$sisa = $param['jumlah_pinjaman'];
				$tgl_pembayaran = date('Y-m-d', strtotime($plus, strtotime($this->input->post('tgl_pinjam'))));
				
				for ($i = 0; $i < $param['kali_angsuran']; $i++)
				{
					$j = $i + 1;
					$param2 = array();
					$param2['id_pinjaman'] = $query;
					$param2['tgl_pembayaran'] = $tgl_pembayaran;
					$param2['angsuran_ke'] = $j;
					$param2['pokok'] = $param['jumlah_pinjaman'] / $param['kali_angsuran'];
					$param2['bunga'] = $param['jumlah_pinjaman'] * ($param['bunga'] / 100);
					$param2['jumlah_angsuran'] = $param2['pokok'] + $param2['bunga'];
					$param2['sisa_pinjaman'] = $sisa - $param2['pokok'];
					$param2['status'] = 1;
					$param2['created_date'] = date('Y-m-d H:i:s');
					$param2['updated_date'] = date('Y-m-d H:i:s');
					$query4 = $this->angsuran_model->create($param2);
					
					$sisa = $param2['sisa_pinjaman'];
					$tgl_pembayaran = date('Y-m-d', strtotime($plus, strtotime($param2['tgl_pembayaran'])));
				}
				
				$location = $this->config->item('link_pinjaman_lists');
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
			
			// Pinjaman
			$pinjaman_tipe_lists = array();
			$query3 = $this->pinjaman_tipe_model->lists(array());
			
			if ($query3->num_rows() > 0)
			{
				$pinjaman_tipe_lists = $query3->result();
			}
			
			$data['pinjaman_tipe_lists'] = $pinjaman_tipe_lists;
			$data['anggota'] = $anggota;
			$this->load->view('pinjaman/pinjaman_create', $data);
		}
	}

    function pinjaman_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->pinjaman_model->info(array('id_pinjaman' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->pinjaman_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('text' => 'Success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
    }

    function pinjaman_edit()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');
		
        $get = $this->pinjaman_model->info(array('id_pinjaman' => $data['id']));
		
        if ($get->num_rows() > 0)
        {
            if ($this->input->post('submit') == TRUE)
            {
				$param = array();
				$param['id_pinjaman_tipe'] = $this->input->post('id_pinjaman_tipe');
				$param['no_pinjaman'] = $this->input->post('no_pinjaman');
				$param['tgl_pinjam'] = date('Y-m-d H:i:s', strtotime($this->input->post('tgl_pinjam')));
				$param['jumlah_pinjaman'] = $this->input->post('jumlah_pinjaman');
				$param['tgl_jatuh_tempo'] = date('Y-m-d', strtotime($this->input->post('tgl_jatuh_tempo')));
				$param['kali_angsuran'] = $this->input->post('kali_angsuran');
				$param['bunga'] = $this->input->post('bunga');
				$param['status'] = $this->input->post('status');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->pinjaman_model->update($data['id'], $param);

				if ($query > 0)
				{
					$response = array('text' => 'Success', 'type' => 'success', 'title' => 'Edit');
				}
				else
				{
					$response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Edit');
				}
	
				echo json_encode($response);
				exit();
            }
			else
			{
				// Pinjaman
				$pinjaman_tipe_lists = array();
				$query3 = $this->pinjaman_tipe_model->lists(array());
				
				if ($query3->num_rows() > 0)
				{
					$pinjaman_tipe_lists = $query3->result();
				}
				
				$data['pinjaman_tipe_lists'] = $pinjaman_tipe_lists;
				$data['result'] = $get->row();
				$data['tgl_pinjam'] = date('d-m-Y', strtotime($get->row()->tgl_pinjam));
				$data['tgl_jatuh_tempo'] = date('d-m-Y', strtotime($get->row()->tgl_jatuh_tempo));
				$this->load->view('pinjaman/pinjaman_edit', $data);
			}
        }
    }
	
	function pinjaman_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'tgl_pinjam';
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
			$status = $code_pinjaman_status[$row->status];
			
			$action = '<a title="View" id="'.$row->id_pinjaman.'" class="view '.$row->id_pinjaman.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						
                        <a title="Delete" id="'.$row->id_pinjaman.'" class="delete '.$row->id_pinjaman.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			//<a title="Edit" id="'.$row->id_pinjaman.'" class="edit '.$row->id_pinjaman.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
			
			$angsuran = '<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary tambahAngsuran '.$row->id_pinjaman.'-tambahAngsuran" id="'.$row->id_pinjaman.'"><i class="fa fa-plus"></i> Tambah</button>';
			
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
                'NoPinjaman' => $row->no_pinjaman,
                'NamaAnggota' => ucwords($row->nama),
                'TglJatuhTempo' => date('d M Y', strtotime($row->tgl_jatuh_tempo)),
                'JumlahPinjaman' => number_format($row->jumlah_pinjaman, 0, ',','.'),
                'Keterangan' => $status,
                'Aksi' => $action,
				'Angsuran' => $angsuran
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
    
    function pinjaman_view()
    {
		$id = $this->input->post('id');
		$get = $this->pinjaman_model->info(array('id_pinjaman' => $id));
		
		if ($get->num_rows() > 0)
		{
			$result = $get->row();
			$code_pinjaman_status = $this->config->item('code_pinjaman_status');
			
			$data = array();
			$data['nama'] = $result->nama;
			$data['tipe_nama'] = $result->tipe_nama;
			$data['no_pinjaman'] = $result->no_pinjaman;
			$data['tgl_pinjam'] = date('d M Y', strtotime($result->tgl_pinjam));
			$data['jumlah_pinjaman'] = 'Rp '.number_format($result->jumlah_pinjaman, 0, ',', '.');
			$data['kali_angsuran'] = $result->kali_angsuran.' kali';
			$data['bunga'] = number_format($result->bunga, 0, ',', '.').'%';
			$data['tgl_jatuh_tempo'] = date('d M Y', strtotime($result->tgl_jatuh_tempo));
			$data['status'] = $code_pinjaman_status[$result->status];
			$this->load->view('pinjaman/pinjaman_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }
}
