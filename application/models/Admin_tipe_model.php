<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_tipe_model extends CI_Model {

    var $table = 'admin_tipe';
	var $table_id = 'id_admin_tipe';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['id_admin_tipe']) == TRUE)
        {
            $where += array($this->table_id => $param['id_admin_tipe']);
        }
        
        $this->db->select('id_admin_tipe, nama, hak_akses, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $this->db->select('id_admin_tipe, nama, hak_akses, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}