<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    var $table = 'anggota';
	var $table_id = 'id_anggota';
    
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
    
    function info($param)
    {
        $where = array();
        if (isset($param['no_anggota']) == TRUE && $param['no_anggota'] != '')
        {
            $where += array('no_anggota' => $param['no_anggota']);
        }
        if (isset($param['nama']) == TRUE && $param['nama'] != '')
        {
            $where += array('nama' => $param['nama']);
        }
        if (isset($param['id_anggota']) == TRUE && $param['id_anggota'] != '')
        {
            $where += array($this->table_id => $param['id_anggota']);
        }
        
        $this->db->select($this->table_id.', id_anggota_tipe, id_kota, no_anggota, nama, jenis_kelamin,
						  tempat_lahir, tanggal_lahir, alamat, kode_pos, telp, created_date,
						  updated_date');
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