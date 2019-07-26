<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerimaan_Barang_model extends CI_Model
{

    public $table = 'penerimaan';
    public $brg = 'barang';
    public $id = 'NO_BON';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
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
        $this->db->like('NO_BON', $q);
	$this->db->or_like('ID_PENGADAAN', $q);
	$this->db->or_like('NAMA_BARANG', $q);
	$this->db->or_like('TANGGAL_TERIMA', $q);
	$this->db->or_like('JUMLAH_BARANG', $q);
	$this->db->or_like('KONDISI', $q);
	$this->db->or_like('NAMA_SUPPLIER', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('NO_BON', $q);
	$this->db->or_like('ID_PENGADAAN', $q);
	$this->db->or_like('NAMA_BARANG', $q);
	$this->db->or_like('TANGGAL_TERIMA', $q);
	$this->db->or_like('JUMLAH_BARANG', $q);
	$this->db->or_like('KONDISI', $q);
	$this->db->or_like('NAMA_SUPPLIER', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
	
	function get_pnrm_brg()
    {
		$this->db->select('*,count(NO_BON) AS jumlah_pnrm_brg');
        return $this->db->get($this->table)->result();
    }
	function get_barang()
    {
		$this->db->select('nama_barang');
        return $this->db->get($this->brg)->result();
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