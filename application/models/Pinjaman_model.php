<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_model extends CI_Model {

    var $table = 'pinjaman';
	var $table_id = 'id_pinjaman';
    
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
	
	function info($param)
	{
		$where = array();
		if (isset($param['id_pinjaman']) == TRUE)
		{
			$where += array($this->table_id => $param['id_pinjaman']);
		}
		
		$this->db->select($this->table_id.', '.$this->table.'.id_anggota, id_pinjaman_tipe, no_pinjaman,
						  tgl_pinjam, jumlah_pinjaman, kali_angsuran, bunga, tgl_jatuh_tempo, status,
						  '.$this->table.'.created_date, '.$this->table.'.updated_date, nama');
        $this->db->from($this->table);
        $this->db->join('anggota', $this->table.'.id_anggota = anggota.id_anggota', 'left');
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
			$param['order'] = 'no_pinjaman';
		}
		if (isset($param['sort']) == FALSE)
		{
			$param['sort'] = 'DESC';
		}
		
        $this->db->select($this->table_id.', '.$this->table.'.id_anggota, id_pinjaman_tipe, no_pinjaman,
						  tgl_pinjam, jumlah_pinjaman, kali_angsuran, bunga, tgl_jatuh_tempo, status,
						  '.$this->table.'.created_date, '.$this->table.'.updated_date, nama');
        $this->db->from($this->table);
        $this->db->join('anggota', $this->table.'.id_anggota = anggota.id_anggota', 'left');
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}