<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_model extends CI_Model {

    var $table = 'simpanan';
	var $table_id = 'id_simpanan';
    
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
			$param['order'] = 'updated_date';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'DESC';
		}
		
        $this->db->select($this->table_id.', '.$this->table.'.id_simpanan_tipe,
						  '.$this->table.'.id_anggota, no_transaksi, tgl_transaksi, jumlah_simpanan,
						  status, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  simpanan_tipe.nama AS nama_simpanan_tipe, anggota.nama AS nama_anggota');
        $this->db->from($this->table);
        $this->db->join('simpanan_tipe', $this->table.'.id_simpanan_tipe = simpanan_tipe.id_simpanan_tipe', 'left');
        $this->db->join('anggota', $this->table.'.id_anggota = anggota.id_anggota', 'left');
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}