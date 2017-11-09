<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_tipe_model extends CI_Model {

    var $table = 'anggota_tipe';
	var $table_id = 'id_anggota_tipe';
    
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
		
        $this->db->select($this->table_id.', nama, gaji_pokok, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}