<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran_model extends CI_Model {

    var $table = 'angsuran';
	var $table_id = 'id_angsuran';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		return $query;
    }
    
    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
	
	function info($param)
	{
		
		$where = array();
		if (isset($param['id_angsuran']) == TRUE && $param['id_angsuran'] != '')
		{
			$where += array($this->table_id => $param['id_angsuran']);
		}
		
		$this->db->select($this->table_id.', '.$this->table.'.id_pinjaman, no_angsuran, tgl_pembayaran,
						  tgl_angsuran, angsuran_ke, pokok, '.$this->table.'.bunga, jumlah_angsuran,
						  sisa_pinjaman, '.$this->table.'.status, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date, pinjaman.id_anggota AS id_anggota,
						  pinjaman.no_pinjaman AS no_pinjaman');
        $this->db->from($this->table);
        $this->db->join('pinjaman', $this->table.'.id_pinjaman = pinjaman.id_pinjaman', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
	}
    
    function lists($param)
    {
		if (isset($param['limit']) == FALSE)
		{
			$param['limit'] = 20;
		}
		if (isset($param['offset']) == FALSE)
		{
			$param['offset'] = 0;
		}
		if (isset($param['order']) == FALSE)
		{
			$param['order'] = 'updated_date';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'DESC';
		}
		
		$where = array();
		if (isset($param['id_pinjaman']) == TRUE && $param['id_pinjaman'] != '')
		{
			$where += array('id_pinjaman' => $param['id_pinjaman']);
		}
		if (isset($param['status']) == TRUE && $param['status'] != '')
		{
			$where += array('status' => $param['status']);
		}
		
        $this->db->select($this->table_id.', id_pinjaman, no_angsuran, tgl_pembayaran, tgl_angsuran,
						  angsuran_ke, pokok, bunga, jumlah_angsuran, sisa_pinjaman, status,
						  created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
	
	function update($id, $param)
	{
		$this->db->where($this->table_id, $id);
        $query = $this->db->update($this->table, $param);
        return $query;
	}
}