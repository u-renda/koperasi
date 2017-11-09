<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

    var $table = 'provinsi';
	var $table_id = 'id_provinsi';
    
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
    
    function info($param)
    {
		$where = array();
		if (isset($param['id_provinsi']) == TRUE)
		{
			$where += array($this->table_id => $param['id_provinsi']);
		}
		if (isset($param['nama']) == TRUE)
		{
			$where += array('nama' => $param['nama']);
		}
		
        $this->db->select($this->table_id.', nama, created_date, updated_date');
        $this->db->from($this->table);
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
			$param['order'] = 'nama';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'ASC';
		}
		
        $this->db->select('id_provinsi, nama, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}