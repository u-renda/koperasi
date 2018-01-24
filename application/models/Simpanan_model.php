<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_model extends CI_Model {

    var $table = 'simpanan';
	var $table_id = 'id_simpanan';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		$id = $this->db->insert_id();
		return $id;
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
		if (isset($param['id_anggota']) == TRUE && $param['id_anggota'] != '')
		{
			$where += array($this->table.'.id_anggota' => $param['id_anggota']);
		}
		if (isset($param['id_simpanan']) == TRUE && $param['id_simpanan'] != '')
		{
			$where += array($this->table_id => $param['id_simpanan']);
		}
		
        $this->db->select($this->table_id.', '.$this->table.'.id_simpanan_tipe,
						  '.$this->table.'.id_anggota, no_rekening, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date, simpanan_tipe.nama AS nama_simpanan_tipe,
						  anggota.nama AS nama_anggota, anggota.no_anggota AS no_anggota');
        $this->db->from($this->table);
        $this->db->join('simpanan_tipe', $this->table.'.id_simpanan_tipe = simpanan_tipe.id_simpanan_tipe', 'left');
        $this->db->join('anggota', $this->table.'.id_anggota = anggota.id_anggota', 'left');
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
			$param['order'] = 'updated_date';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'DESC';
		}
		
        $this->db->select($this->table_id.', '.$this->table.'.id_simpanan_tipe,
						  '.$this->table.'.id_anggota, no_rekening, '.$this->table.'.created_date,
						  '.$this->table.'.updated_date, simpanan_tipe.nama AS nama_simpanan_tipe,
						  anggota.nama AS nama_anggota');
        $this->db->from($this->table);
        $this->db->join('simpanan_tipe', $this->table.'.id_simpanan_tipe = simpanan_tipe.id_simpanan_tipe', 'left');
        $this->db->join('anggota', $this->table.'.id_anggota = anggota.id_anggota', 'left');
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