<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposito extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('deposito_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

	function deposito_get()
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

        $query = $this->deposito_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="View" id="'.$row->id_deposito.'" class="view '.$row->id_deposito.'-view" href="#"><i class="fa fa-folder-open h4 text-success"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_deposito.'" class="edit '.$row->id_deposito.'-edit" href="#"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_deposito.'" class="delete '.$row->id_deposito.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';

            $entry = array(
                'No' => $i,
                'NoTransaksi' => $row->no_transaksi,
                'TipeSimpanan' => ucwords($row->nama),
                'TglTransaksi' => $row->tgl_transaksi,
                'Saldo' => $row->saldo,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

	function deposito_lists()
	{
		$data = array();
		$data['view_content'] = 'deposito/deposito_lists';
		
		$this->load->view('templates/frame', $data);
	}
}
