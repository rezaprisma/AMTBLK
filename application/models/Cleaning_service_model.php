<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cleaning_service_model extends CI_Model
{

    public $table = 'laporan_plk';
    public $pngs = 'laporan_plk.';
    public $id = 'ID_LAPORAN';
    public $order = 'DESC';
	public $user_group = 'user_group';
    public $group = 'CS';
    public $Kebun = 'KEBUN';
    public $status_penugasan = 'status_penugasan';
    public $keterangan_tugas = 'keterangan_tugas';
    public $status = 'STATUS_ACC';
    public $pd = 'Belum Dikerjakan';
    public $pc = 'Tugas Tambahan';
    public $pb = 'Tugas Rutin';
    public $brs = 'Sudah Dikerjakan';
    public $ACC = 'ACC';
    public $blmACC = 'Belum ACC';
    public $last_name = 'last_name';
    public $id_ruangan = 'id_ruangan';
    public $nama = 'NIK';
	var $tabel_ruangan='master_ruangan';
	var $tabel_fasilitas='fasilitas';
	var $tabel_tugas='tugas';
	var $tabel_user='users';
	
    function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
    }
	public function ambil_last_name() {
	//this->db->where($this->user_group, $this->group)
	//SELECT * FROM `users` join users_groups on users.id=users_groups.user_id WHERE `group_id` in('6', '7', '8')
	$this->db->select('users.*,');
	$this->db->from('users');
	$this->db->join('users_groups','users.id=users_groups.user_id','');
	$this->db->where('group_id','6');
		$sql_NIK=$this->db->get();
		if($sql_NIK->num_rows()>0){
			foreach ($sql_NIK->result_array() as $row)
				{
					$result['-']= '- Pilih Nama -';
				$result[$row['id']]= ucwords(strtolower($row['last_name']));
				}
				return $result;
		}
	}
	public function ambil_NIK($kode_NIK){
	//$this->db->join('users_groups','users.id=users_groups.user_id','');
	//$this->db->where('users_groups.group_id', $kode_NIK);
	$this->db->where('id',$kode_NIK);
	$this->db->order_by('NIK','asc');
	$sql_NIK=$this->db->get($this->tabel_user);
	if($sql_NIK->num_rows()>0){

		foreach ($sql_NIK->result_array() as $row)
        {
            $result[$row['email']]= ucwords(strtolower($row['NIK']));
        }
		} else {
		   $result['-']= '- Belum Ada NIK -';
		}
        return $result;
	}
	
	public function ambil_ruangan() {
	$sql_ruangan=$this->db->get($this->tabel_ruangan);	
	if($sql_ruangan->num_rows()>0){
		foreach ($sql_ruangan->result_array() as $row)
			{
				$result['-']= '- Pilih Ruangan -';
				$result[$row['ID_RUANGAN']]= ucwords(strtolower($row['NAMA_RUANGAN']));
			}
			return $result;
		}
	}
	
	public function simpan(){
		$data_laporan=array(
			'ID_LAPORAN'=>$this->Cleaning_service_model->getkodeunik(),
			'NIK'=>$this->input->post('NIK'),
			'USER_GROUP'=>$this->input->post('user_group'),
			'LAST_NAME'=>$this->input->post('last_name'),
			'DATE_LPLK'=>$this->input->post('date_lplk'),
			'JAM_LPLK'=>$this->input->post('jam_lplk'),
			'ID_RUANGAN'=>$this->input->post('id_ruangan'),
			'ID_FASILITAS'=>$this->input->post('id_fasilitas'),
			'ID_TUGAS'=>$this->input->post('id_tugas'),
			'STATUS_PENUGASAN'=>$this->input->post('status_penugasan'),
			'STATUS_ACC'=>$this->input->post('status_acc'),
			'KETERANGAN_TUGAS'=>$this->input->post('keterangan_tugas')
		);	
		$this->db->insert($this->table,$data_laporan);	
	}
	
	public function ambil_fasilitas($kode_ruangan){
	$this->db->where('ID_RUANGAN',$kode_ruangan);
	$this->db->order_by('fasilitas','asc');
	$sql_fasilitas=$this->db->get($this->tabel_fasilitas);
	if($sql_fasilitas->num_rows()>0){

		foreach ($sql_fasilitas->result_array() as $row)
        {
            $result[$row['ID_FASILITAS']]= ucwords(strtolower($row['FASILITAS']));
        }
		} else {
		   $result['-']= '- Belum Ada fasilitas -';
		}
        return $result;
	}
	
	public function ambil_tugas($kode_fasilitas){
	$this->db->where('ID_FASILITAS',$kode_fasilitas);
	$this->db->order_by('jenis_tugas','asc');
	$sql_tugas=$this->db->get($this->tabel_tugas);
	if($sql_tugas->num_rows()>0){

		foreach ($sql_tugas->result_array() as $row)
        {
            $result[$row['ID_TUGAS']]= ucwords(strtolower($row['JENIS_TUGAS']));
        }
		} else {
		   $result['-']= '- Belum Ada tugas -';
		}
        return $result;
	}
	
	function getkodeunik() {
	$q = $this->db->query("SELECT MAX(RIGHT(ID_LAPORAN,3)) AS idmax FROM laporan_plk"); 
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
		return "L".$kd; 
	} 
    // get all
    /* function get_all()
    {
        $this->db->where($this->user_group, $this->group);
        return $this->db->get($this->table)->result();
    } */
	function get_kepegawaian_cs(){
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->keterangan_tugas, $this->pb);
		$this->db->order_by('DATE_LPLK','desc');
		return $this->db->get()->result();
	}
	
	function get_limit_tgs_cs($last_name, $id_ruangan){
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
		$this->db->where('laporan_plk.last_name=laporan_plk.last_name')AND $this->db->where('laporan_plk.id_ruangan=laporan_plk.id_ruangan');
		return $this->db->get()->result();
	}
	
	function get_all(){
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->keterangan_tugas, $this->pb);
		$this->db->order_by('DATE_LPLK','desc');
		return $this->db->get()->result();
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
	function get_penugasan()
    {
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->keterangan_tugas, $this->pb) AND $this->db->where($this->pngs.$this->nama, $this->session->userdata('identity'));
        $this->db->order_by('DATE_LPLK','desc');
		return $this->db->get()->result();
    }
	
	function get_penugasan_tambahan()
    {
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->keterangan_tugas, $this->pc) AND $this->db->where($this->pngs.$this->nama, $this->session->userdata('identity'));
        $this->db->order_by('DATE_LPLK','desc');
		return $this->db->get()->result();
    }
	function get_pending()
    {
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->nama, $this->session->userdata('identity'));
        return $this->db->get()->result();
    }
	function get_bersih()
    {
        $this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->keterangan_tugas, $this->pb);
		$this->db->order_by('DATE_LPLK','desc');
		return $this->db->get()->result();
    }
	function get_ACC()
    {
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->blmACC);
        return $this->db->get()->result();
    }
	
	function get_ACC_terselesaiakan()
    {
		$this->db->select('laporan_plk.*, count(ID_LAPORAN) AS jumlah_CS_terselesaikan,master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->blmACC);
        $this->db->group_by('laporan_plk.LAST_NAME');
        return $this->db->get()->result();
    }
	
	function get_pngs_cs()
    {
		$this->db->select('laporan_plk.*, count(ID_LAPORAN) AS jumlah_CS_pngs,master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status, $this->blmACC);
        $this->db->group_by('laporan_plk.LAST_NAME');
        return $this->db->get()->result();
    }
	
	function get_ACC_kebun_terselesaiakan()
    {
		$this->db->select('laporan_plk.*, count(ID_LAPORAN) AS jumlah_kebun_terselesaikan,master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->Kebun)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->blmACC);
        $this->db->group_by('laporan_plk.LAST_NAME');
        return $this->db->get()->result();
    }
	
	function get_ACC_list()
    {
		$this->db->select('laporan_plk.*, master_ruangan.NAMA_RUANGAN, fasilitas.FASILITAS, tugas.JENIS_TUGAS, users.LAST_NAME');
		$this->db->from('laporan_plk');
		$this->db->join('master_ruangan','laporan_plk.ID_RUANGAN=master_ruangan.ID_RUANGAN','');
		$this->db->join('fasilitas','laporan_plk.ID_FASILITAS=fasilitas.ID_FASILITAS','');
		$this->db->join('tugas','laporan_plk.ID_TUGAS=tugas.ID_TUGAS','');
		$this->db->join('users','laporan_plk.LAST_NAME=users.id','');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->ACC);
        return $this->db->get()->result();
    }
	
	function get_JmlLap_kebun_kep()
    {
		$this->db->select('*,count(ID_LAPORAN) AS jumlah');
        $this->db->where($this->user_group, $this->Kebun)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->blmACC);
        return $this->db->get($this->table)->result();
    }
	
	function get_JmlLap_CS_kep()
    {
		$this->db->select('*,count(ID_LAPORAN) AS jumlah_CS');
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->blmACC);
        return $this->db->get($this->table)->result();
    }
	
	function get_jml_tgs_CS()
    {
		$this->db->select('*,count(ID_LAPORAN) AS jumlah_tgs_cs');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->status, $this->blmACC)AND $this->db->where($this->keterangan_tugas, $this->pb)AND $this->db->where($this->pngs.$this->nama, $this->session->userdata('identity'));
        return $this->db->get($this->table)->result();
    }
	
	function get_jml_tgs_hr_CS()
    {
		$this->db->select('*,count(ID_LAPORAN) AS jumlah_tbh_CS');
		$this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->pd)AND $this->db->where($this->status, $this->blmACC)AND $this->db->where($this->keterangan_tugas, $this->pc)AND $this->db->where($this->pngs.$this->nama, $this->session->userdata('identity'));
        return $this->db->get($this->table)->result();
    }
	
	function get_JmlLap_SC_kep()
    {
		$this->db->select('*,count(ID_LAPORAN) AS jumlah_SC');
		$this->db->from('laporan_kejadian_security');
        return $this->db->get()->result();
    }
	
	function get_SACC()
    {
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->ACC)AND $this->db->where($this->nama, $this->session->userdata('identity'));
        return $this->db->get($this->table)->result();
    }
	function get_blmACC()
    {
        $this->db->where($this->user_group, $this->group)AND $this->db->where($this->status_penugasan, $this->brs)AND $this->db->where($this->status, $this->ACC)AND $this->db->where($this->nama, $this->session->userdata('identity'));
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
        $this->db->like('LOCT_ID', $q);
	$this->db->or_like('DATE_LPLK', $q);
	$this->db->or_like('JAM_PELAPORAN', $q);
	$this->db->or_like('DESC_LAPORAN', $q);
	$this->db->or_like('status_penugasan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('LOCT_ID', $q);
	$this->db->or_like('DATE_LPLK', $q);
	$this->db->or_like('JAM_PELAPORAN', $q);
	$this->db->or_like('DESC_LAPORAN', $q);
	$this->db->or_like('status_penugasan', $q);
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
	function hitungNotif(){
		$level = $this->session->userdata('level');
		$query = $this->db->query("select count(status) as jumlah from nilaim where status='1'");
		if(($level == 'kepalasekolah') || ($level == 'penanggungjawab')){
			foreach($query->result_array() as $row) {
				echo $row['jumlah'];
			}
		}	
	}

	function viewDesNotif(){
		$level = $this->session->userdata('level');
		$query = $this->db->query("SELECT tanggal_penilaian,id_penilaian,
								CASE WHEN STATUS = '1'
								THEN 'laporan nilai lomba pada tanggal'
								ELSE NULL
								END AS deskripsi
								FROM nilaim
								where status='1'");
		if(($level == 'kepalasekolah') || ($level == 'penanggungjawab')){
			foreach ($query->result_array() as $row) {
				echo ' <li>
                                <a href="updateNotif/'.$row['id_penilaian'].'">
                                  <p> '.$row['deskripsi'].' '. $row['tanggal_penilaian'].' '.'sudah di setujui'.' </p>
                                    
                                </a>
                            </li>  ';
			}			
			 // <span class="small italic pull-right"> Today</span>
		}	
	}

}
