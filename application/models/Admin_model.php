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
        
        $this->db->select('id_admin, id_admin_tipe, nama, email, username, password, jenis_kelamin,
						  tempat_lahir, tanggal_lahir, alamat, telp, foto, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}