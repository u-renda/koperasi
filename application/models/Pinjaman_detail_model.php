<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_detail_model extends CI_Model {

    var $table = 'pinjaman_detail';
	var $table_id = 'id_pinjaman_detail';
    
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
			$param['order'] = 'no_pinjaman';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'DESC';
		}
		
        $this->db->select($this->table_id.', id_pinjaman, pokok, bunga, jumlah, sisa, created_date,
						  updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}