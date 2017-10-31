<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran_model extends CI_Model {

    var $table = 'angsuran';
	var $table_id = 'id_angsuran';
    
    public function __construct()
    {
        parent::__construct();
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
		
        $this->db->select($this->table_id.', id_pinjaman, no_angsuran, tgl_angsuran, angsuran_ke,
						  sisa_angsuran, sisa_pinjaman, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}