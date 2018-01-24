<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_tipe_model extends CI_Model {

    var $table = 'simpanan_tipe';
	var $table_id = 'id_simpanan_tipe';
    
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
		if (isset($param['nama']) == TRUE && $param['nama'] != '')
		{
			$where += array('nama' => $param['nama']);
		}
		if (isset($param['id_simpanan_tipe']) == TRUE && $param['id_simpanan_tipe'] != '')
		{
			$where += array($this->table_id => $param['id_simpanan_tipe']);
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
		
        $this->db->select('id_simpanan_tipe, nama, created_date, updated_date');
        $this->db->from($this->table);
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