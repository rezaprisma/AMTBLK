<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas_security_model extends CI_Model
{

    public $table = 'laporan_kejadian_security';
    public $id = 'ID_LAPORAN';
    public $order = 'DESC';
	public $user_group = 'user_group';
    public $group = 'SECURITY';

    function __construct()
    {
        parent::__construct();
    }
	
	function getkodeunik() {
	$q = $this->db->query("SELECT MAX(RIGHT(ID_LAPORAN,3)) AS idmax FROM laporan_kejadian_security"); 
	$kd = ""; //kode awal
		if($q->num_rows()>0){ //jika data ada 
			foreach($q->result() as $k){ 
				$tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir 
				$kd = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir 
			} 
		}else{ //jika data kosong diset ke kode awal 
			$kd = "001"; 
		} 
		//$kar = "R."; //karakter depan kodenya //gabungkan string dengan kode yang telah dibuat tadi 
		return "LS".$kd; 
	} 

    // get all
    function get_all()
    {
        $this->db->where($this->user_group, $this->group);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_LAPORAN', $q);
	$this->db->or_like('TANGGAL_KEJADIAN', $q);
	$this->db->or_like('DESC_LAPORAN', $q);
	$this->db->or_like('KETERANGAN', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_LAPORAN', $q);
	$this->db->or_like('TANGGAL_KEJADIAN', $q);
	$this->db->or_like('DESC_LAPORAN', $q);
	$this->db->or_like('KETERANGAN', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}