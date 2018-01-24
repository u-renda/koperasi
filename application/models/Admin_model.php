<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    var $table = 'admin';
	var $table_id = 'id_admin';
    
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
        if (isset($param['id_admin']) == TRUE && $param['id_admin'] != '')
        {
            $where += array($this->table_id => $param['id_admin']);
        }
        if (isset($param['username']) == TRUE && $param['username'] != '')
        {
            $where += array('username' => $param['username']);
        }
        if (isset($param['password']) == TRUE && $param['password'] != '')
        {
            $where += array('password' => $param['password']);
        }
        if (isset($param['nama']) == TRUE && $param['nama'] != '')
        {
            $where += array($this->table.'.nama' => $param['nama']);
        }
        if (isset($param['email']) == TRUE && $param['email'] != '')
        {
            $where += array('email' => $param['email']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_admin_tipe, '.$this->table.'.nama,
						  email, username, password, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat,
						  telp, foto, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  admin_tipe.nama AS tipe_nama');
        $this->db->from($this->table);
        $this->db->join('admin_tipe', $this->table.'.id_admin_tipe = admin_tipe.id_admin_tipe', 'left');
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