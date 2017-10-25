<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

    var $table = 'provinsi';
	var $table_id = 'id_provinsi';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function lists($param)
    {
        $this->db->select('id_provinsi, nama, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}