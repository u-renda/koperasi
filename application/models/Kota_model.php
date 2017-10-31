<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {

    var $table = 'kota';
	var $table_id = 'id_kota';
    
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
		
		$where = array();
		if (isset($param['id_provinsi']) == TRUE)
		{
			$where += array('id_provinsi' => $param['id_provinsi']);
		}
		
        $this->db->select('id_kota, id_provinsi, nama, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}