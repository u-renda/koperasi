<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    var $table = 'anggota';
	var $table_id = 'id_anggota';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function lists($param)
    {
        $this->db->select('id_anggota, id_anggota_tipe, id_kota, no_anggota, nama, jenis_kelamin,
						  tempat_lahir, tanggal_lahir, alamat, kode_pos, telp, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}