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
        $this->db->select('id_simpanan_tipe, nama, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}