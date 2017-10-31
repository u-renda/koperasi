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
		
        $this->db->select('id_anggota, id_anggota_tipe, '.$this->table.'.id_kota, no_anggota,
						  '.$this->table.'.nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat,
						  kode_pos, telp, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  kota.nama AS nama_kota');
        $this->db->from($this->table);
        $this->db->join('kota', $this->table.'.id_kota = kota.id_kota', 'left');
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}