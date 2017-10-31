<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    var $table = 'admin';
	var $table_id = 'id_admin';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['id_admin']) == TRUE)
        {
            $where += array($this->table_id => $param['id_admin']);
        }
        if (isset($param['username']) == TRUE)
        {
            $where += array('username' => $param['username']);
        }
        if (isset($param['password']) == TRUE)
        {
            $where += array('password' => $param['password']);
        }
        
        $this->db->select($this->table_id.', id_admin_tipe, nama, email, username, password, jenis_kelamin,
						  tempat_lahir, tanggal_lahir, alamat, telp, foto, created_date, updated_date');
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
		
        $this->db->select($this->table_id.', id_admin_tipe, nama, email, username, password,
						  jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, telp, foto, created_date,
						  updated_date');
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