<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_Barang_model extends CI_Model
{

    public $table = 'barang';
    public $table1 = 'penerimaan';
    public $table2 = 'pengeluaran';
    public $id = 'KODEBARCODE';
    public $id1 = 'NO_BON';
    public $id2 = 'ID_PENGELUARAN';
    public $STATUS_BARANG = 'STATUS_BARANG';
    public $KONDISI = 'KONDISI';
    public $USER_GORUP = 'USER_GROUP';
    public $CS = 6;
    public $Kebun = 8;
    public $NAMA_BARANG = 'nama_barang is not null';
    public $kondisi = 'kondisi';
    public $in = 'ada';
    public $is = 'is not null';
    public $good = 'bagus';
    public $damage = 'rusak';
    public $habis = 'habis';
    public $out = 'keluar';
    public $order = 'DESC';
    public $tabel_user = 'groups';
    public $tabel_penerimaan = 'penerimaan';

    function __construct()
    {
        parent::__construct();
    }
	
	public function simpan(){
		$data_barang=array(
			'KODEBARCODE'=>$this->input->post('KODEBARCODE'),
			//'NO_BON'=>$this->input->post('NO_BON'),
			'NAMA_BARANG'=>$this->input->post('NAMA_BARANG'),
			'SATUAN'=>$this->input->post('SATUAN'),
			'STATUS_BARANG'=>$this->input->post('STATUS_BARANG'),
			'TANGGAL_TERIMA'=>$this->input->post('TANGGAL_TERIMA'),
			'JUMLAH_BARANG'=>$this->input->post('JUMLAH_BARANG'),
			'LOKASI'=>$this->input->post('LOKASI'),
			'TANGGAL_KELUAR'=>$this->input->post('TANGGAL_KELUAR'),
			'USER_GROUP'=>$this->input->post('USER_GROUP'),
			'KONDISI'=>$this->input->post('KONDISI')
		);	
		$this->db->insert($this->table2,$data_barang);	
	}
	
	public function ambil_no_bon() {
	$this->db->group_by('NAMA_BARANG');
	$sql_bon=$this->db->get($this->table);	
	if($sql_bon->num_rows()>0){
		foreach ($sql_bon->result_array() as $row)
			{
				$result['-']= '- Pilih Barang -';
				$result[$row['KODEBARCODE']]= ucwords(strtolower($row['NAMA_BARANG']));
			}
			return $result;
		}
	}
	
	public function ambil_barang($kode){
	$this->db->where('KODEBARCODE', $kode);
	$sql_bon=$this->db->get($this->table);
	if($sql_bon->num_rows()>0){

		foreach ($sql_bon->result_array() as $row)
        {
            $result[$row['NAMA_BARANG']]= ucwords(strtolower($row['NAMA_BARANG']));
        }
		} else {
		   $result['-']= '- Belum Ada Barang -';
		}
        return $result;
	}
	
	public function ambil_user() {
		$this->db->where('id','6');
		$this->db->or_where('id', '7');
		$this->db->or_where('id', '8');
		$this->db->order_by('id','asc');
		$sql_id=$this->db->get($this->tabel_user);
		if($sql_id->num_rows()>0){
			foreach ($sql_id->result_array() as $row)
				{
					$result['-']= '- Pilih Bagian -';
				$result[$row['id']]= ucwords(strtolower($row['name']));
				}
				return $result;
		}
	}
	//SELECT *, count(nama_barang) AS count FROM barang WHERE nama_barang is not null and kondisi='bagus' and status_barang='ada' GROUP BY nama_barang
    // get all
    function get_all()
    {
		$this->db->select('*,sum(jumlah_barang) AS jumlah');
        $this->db->where($this->NAMA_BARANG)and $this->db->where($this->kondisi, $this->good)and $this->db->where($this->STATUS_BARANG, $this->in);
		$this->db->group_by('nama_barang');
        return $this->db->get($this->table)->result();
    }
	function get_all1()
    {
		$this->db->select('*,sum(jumlah_barang) AS jumlah');
        $this->db->where($this->NAMA_BARANG)and $this->db->where($this->kondisi, $this->good);
		$this->db->group_by('nama_barang');
        return $this->db->get($this->table1)->result();
    }
	
	function get_tambahan(){
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->keterangan_tugas, $this->pc);
		return $this->db->get()->result();
	}
	
	function get_permintaan()
    {
		$this->db->select('barang.*, groups.name');
		$this->db->from('barang');
		$this->db->join('groups','barang.USER_GROUP=groups.id','');
        $this->db->where($this->KONDISI, $this->damage)and $this->db->or_where($this->KONDISI, $this->habis)and $this->db->where($this->STATUS_BARANG, $this->out);
        return $this->db->get()->result();
    }
	
	function get_jml_brg()
    {
		$this->db->select('*,count(nama_barang) AS jumlah_brg');
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->good)and $this->db->where($this->USER_GORUP, $this->Kebun);
        return $this->db->get($this->table)->result();
    }
	
	function get_jml_brg_rsk()
    {
		$this->db->select('*,count(nama_barang) AS jumlah_brg_rsk');
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->damage)and $this->db->or_where($this->KONDISI, $this->habis);
        return $this->db->get($this->table)->result();
    }
	
	function get_jml_brg_tot()
    {
		$this->db->select('*,count(nama_barang) AS jumlah_brg_tot');
        $this->db->where($this->STATUS_BARANG, $this->in) and $this->db->where($this->KONDISI, $this->good);
        return $this->db->get($this->table)->result();
    }
	function get_jml_brg_klr()
    {
		$this->db->select('*,count(nama_barang) AS jumlah_brg_klr');
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->good);
        return $this->db->get($this->table)->result();
    }
	
	function get_jml_brg_CS()
    {
		$this->db->select('*,count(nama_barang) AS jumlah_brg_CS');
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->good)and $this->db->where($this->USER_GORUP, $this->CS);
        return $this->db->get($this->table)->result();
    }
	 
	 function get_permintaan_CS()
    {
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->habis)and $this->db->or_where($this->KONDISI, $this->damage)and $this->db->where($this->USER_GORUP, $this->CS);
        return $this->db->get($this->table)->result();
    }
	function get_permintaan_Kebun()
    {
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->habis)and $this->db->or_where($this->KONDISI, $this->damage)and $this->db->where($this->USER_GORUP, $this->Kebun);
        return $this->db->get($this->table)->result();
    }
	 
	function get_barang_keluar()
    {
        $this->db->where($this->STATUS_BARANG, $this->out);
        return $this->db->get($this->table2)->result();
    }
	function get_barang_keluar_CS()
    {
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->good)and $this->db->where($this->USER_GORUP, $this->CS);
        return $this->db->get($this->table2)->result();
    }
	
	function get_barang_keluar_Kebun()
    {
        $this->db->where($this->STATUS_BARANG, $this->out) and $this->db->where($this->KONDISI, $this->good)and $this->db->where($this->USER_GORUP, $this->Kebun);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id1, $id);
        return $this->db->get($this->table)->row();
    }
	
	function get_by_id2($id)
    {
        $this->db->where($this->id2, $id);
        return $this->db->get($this->table2)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('KODEBARCODE', $q);
	$this->db->or_like('NO_BON', $q);
	$this->db->or_like('NAMA_BARANG', $q);
	$this->db->or_like('STATUS_BARANG', $q);
	$this->db->or_like('TANGGAL_MASUK', $q);
	$this->db->or_like('LOKASI', $q);
	$this->db->or_like('TANGGAL_KELUAR', $q);
	$this->db->or_like('KONDISI', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('KODEBARCODE', $q);
	$this->db->or_like('NO_BON', $q);
	$this->db->or_like('NAMA_BARANG', $q);
	$this->db->or_like('STATUS_BARANG', $q);
	$this->db->or_like('TANGGAL_MASUK', $q);
	$this->db->or_like('LOKASI', $q);
	$this->db->or_like('TANGGAL_KELUAR', $q);
	$this->db->or_like('KONDISI', $q);
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
	function update2($id, $data)
    {
        $this->db->where($this->id2, $id);
        $this->db->update($this->table2, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* BEGIN
INSERT INTO barang SET no_bon=new.no_bon, nama_barang=new.nama_barang, satuan=new.satuan, status_barang=new.status_barang, tanggal_terima=new.tanggal_terima, jumlah_barang=NEW.jumlah_barang, lokasi=new.lokasi, kondisi=new.kondisi
ON DUPLICATE KEY UPDATE jumlah_barang=jumlah_barang+New.jumlah_barang; 
END */

/* BEGIN
 UPDATE barang
 SET jumlah_barang = jumlah_barang - NEW.jumlah_barang
 WHERE
 kodebarcode = NEW.kodebarcode;
 END */

