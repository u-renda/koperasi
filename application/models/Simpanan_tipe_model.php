<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_tipe_model extends CI_Model {

    var $table = 'simpanan_tipe';
	var $table_id = 'id_simpanan_tipe';
    
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
			$param['order'] = 'nama';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'ASC';
		}
		
        $this->db->select('id_simpanan_tipe, nama, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}