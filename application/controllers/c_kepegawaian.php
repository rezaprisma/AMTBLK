<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class c_kepegawaian extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model('Cleaning_service_model');
		$this->load->model('Petugas_security_model');
		$this->load->model('Petugas_kebun_model');
        $this->load->library('form_validation');
	}

		function tampil()
		{
			if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
			else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->load->view('AdmindanUser/header', $this->data);
			$this->load->view('auth/index', $this->data);
			$this->load->view('AdmindanUser/footer', $this->data);
			
			
		}	

		}
		public function back()
		{
			if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
			else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->data = array(
					'jumlah' => $this->Cleaning_service_model->get_JmlLap_kebun_kep(),
					'jumlah_CS' => $this->Cleaning_service_model->get_JmlLap_CS_kep(),
					'jumlah_SC' => $this->Cleaning_service_model->get_JmlLap_SC_kep(),
					'cleaning_service_data' => $this->Cleaning_service_model->get_ACC_terselesaiakan(),
					'jumlah_CS_pngs' => $this->Cleaning_service_model->get_pngs_cs(),
					'jumlah_kebun_pngs' => $this->Petugas_kebun_model->get_pngs_kebun(),
					'Petugas_kebun_data' => $this->Petugas_kebun_model->get_ACC_kebun_terselesaiakan()
				);
			$this->load->view('AdmindanUser/header', $this->data);
			$this->load->view('AdmindanUser/kepegawaian/dashboard_kepegawaian2', $this->data);
			$this->load->view('AdmindanUser/footer', $this->data);
		}	
		function get_email(){
 
            $email = $this->input->post('email');  //mengambil post data yang dijabarkan pada javascript yaitu type: "POST"
            $arrStates = $this->mcombox->get_kota_byprovinsi($email);  //mengambil data dari database melalui model mcombox
            foreach ($arrStates as $states) {
                $arrstates[$states->id] = $states->name;
            } //array dibuat untuk ditampilkan pada combox box
            print form_dropdown('kota',$arrstates); //setelah berhasil diambil lalu ditampilkan
      }
//==============================================================================================================================================
//petugas KEBUN
//==============================================================================================================================================
		}
		public function laporan1()
		{
			$petugas_kebun = $this->Petugas_kebun_model->get_kepegawaian_kebun();

			$data = array(
				'petugas_kebun_data' => $petugas_kebun
			);

			//$this->load->view('petugas_kebun/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		public function tugas_tambahan1()
		{
			$petugas_kebun = $this->Petugas_kebun_model->get_tambahan();

			$data = array(
				'petugas_kebun_data' => $petugas_kebun
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/tugas_tambahan_pkebun_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
	public function tambah1() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('user_group','role','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		$this->form_validation->set_rules('date_lplk','tanggal laporan','required');			
		$this->form_validation->set_rules('jam_lplk','jam laporan','required');			
		$this->form_validation->set_rules('status_penugasan','status penugasan','required');			
		$this->form_validation->set_rules('keterangan_tugas','keterangan_tugas','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['last_name']=$this->Petugas_kebun_model->ambil_last_name();
		$data['id_lokasi']=$this->Petugas_kebun_model->ambil_lokasi();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Petugas_kebun_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("c_kepegawaian/laporan1", 'refresh');
			}	 
		 
	}
	public function t_tambahan1() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('user_group','role','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		$this->form_validation->set_rules('date_lplk','tanggal laporan','required');			
		$this->form_validation->set_rules('jam_lplk','jam laporan','required');			
		$this->form_validation->set_rules('status_penugasan','status penugasan','required');			
		$this->form_validation->set_rules('status_acc','status_acc','required');			
		$this->form_validation->set_rules('keterangan_tugas','keterangan_tugas','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['last_name']=$this->Petugas_kebun_model->ambil_last_name();
		$data['id_lokasi']=$this->Petugas_kebun_model->ambil_lokasi();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/tugas_tambahan_pkebun_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Petugas_kebun_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("c_kepegawaian/tugas_tambahan1", 'refresh');
			}	 
		 
	}

		// dijalankan saat provinsi di klik
		public function pilih_NIK1(){
			$data['NIK']=$this->Petugas_kebun_model->ambil_NIK($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_last_name',$data);
		}
		
		public function pilih_fasilitas1(){
			$data['fasilitas']=$this->Petugas_kebun_model->ambil_fasilitas($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_fasilitas',$data);
		}

		// dijalankan saat kabupaten di klik
		public function pilih_tugas1(){
			$data['tugas']=$this->Petugas_kebun_model->ambil_tugas($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_tugas',$data);
		}
		
		public function ACC_kebun()
		{
			$petugas_kebun = $this->Petugas_kebun_model->get_ACC();

			$data = array(
				'petugas_kebun_data' => $petugas_kebun
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_bersih', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		
		public function list_ACC_kebun()
		{
			$Petugas_kebun = $this->Petugas_kebun_model->get_ACC_list();

			$data = array(
				'Petugas_kebun_data' => $Petugas_kebun
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_ACC_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}

		public function read1($id) 
		{
			$row = $this->Petugas_kebun_model->get_by_id($id);
			if ($row) {
				$data = array(
			'ID_LAPORAN' => $row->ID_LAPORAN,
			'NIK' => $row->NIK,
			'LAST_NAME' => $row->LAST_NAME,
			'DATE_LPLK' => $row->DATE_LPLK,
			'ID_RUANGAN' => $row->ID_RUANGAN,
			'FASILITAS' => $row->ID_FASILITAS,
			'JENIS_TUGAS' => $row->ID_TUGAS,
			'STATUS_PENUGASAN' => $row->STATUS_PENUGASAN,
			'STATUS_ACC' => $row->STATUS_ACC,
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_read', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan1'));
			}
		}

		public function create1() 
		{
			$data = array(
				'button' => 'Create',
				'action' => site_url('c_kepegawaian/create_action1'),
			'ID_LAPORAN' => set_value('ID_LAPORAN'),
			'USER_GROUP' => set_value('USER_GROUP'),
			'TANGGAL_KEJADIAN' => set_value('TANGGAL_KEJADIAN'),
			'JAM_KEJADIAN' => set_value('JAM_KEJADIAN'),
			'DESC_LAPORAN' => set_value('DESC_LAPORAN'),
			'KETERANGAN' => set_value('KETERANGAN'),
			'STATUS_ACC' => set_value('STATUS_ACC'),
		);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		
		public function create_action1() 
		{
			$this->_rules1();

			if ($this->form_validation->run() == FALSE) {
				$this->create();
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post('ID_LAPORAN',TRUE),
			'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
			'TANGGAL_KEJADIAN' => $this->input->post('TANGGAL_KEJADIAN',TRUE),
			'JAM_KEJADIAN' => $this->input->post('JAM_KEJADIAN',TRUE),
			'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
			'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
			'STATUS_ACC' => $this->input->post('STATUS_ACC',TRUE),
			);

				$this->Petugas_kebun_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('c_kepegawaian/laporan1'));
			}
		}
		
		public function update1($id) 
		{
			$row = $this->Petugas_kebun_model->get_by_id($id);

			if ($row) {
				$data = array(
					'button' => 'Yakin',
					'action' => site_url('c_kepegawaian/update_action1'),
			'ID_LAPORAN' => set_value('ID_LAPORAN', $row->ID_LAPORAN),
			'NIK' => set_value('NIK', $row->NIK),
			'USER_GROUP' => set_value('USER_GROUP', $row->USER_GROUP),
			'LAST_NAME' => set_value('LAST_NAME', $row->LAST_NAME),
			'DATE_LPLK' => set_value('DATE_LPLK', $row->DATE_LPLK),
			'JAM_LPLK' => set_value('JAM_LPLK', $row->JAM_LPLK),
			'ID_RUANGAN' => set_value('ID_RUANGAN', $row->ID_RUANGAN),
			'ID_FASILITAS' => set_value('ID_FASILITAS', $row->ID_FASILITAS),
			'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
			'STATUS_PENUGASAN' => set_value('STATUS_PENUGASAN', $row->STATUS_PENUGASAN),
			'STATUS_ACC' => set_value('STATUS_ACC', $row->STATUS_ACC),
			'KETERANGAN_TUGAS' => set_value('KETERANGAN_TUGAS', $row->KETERANGAN_TUGAS),
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_pkebun_form_ACC', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/ACC_kebun'));
			}
		}
		
		public function update_action1() 
		{
			$this->_rules1();

			if ($this->form_validation->run() == FALSE) {
				$this->update1($this->input->post('ID_LAPORAN', TRUE));
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post(ID_LAPORAN),
			'NIK' => $this->input->post('NIK',TRUE),
			'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
			'LAST_NAME' => $this->input->post('LAST_NAME',TRUE),
			'DATE_LPLK' => $this->input->post('DATE_LPLK',TRUE),
			'JAM_LPLK' => $this->input->post('JAM_LPLK',TRUE),
			'ID_RUANGAN' => $this->input->post('ID_RUANGAN',TRUE),
			'ID_FASILITAS' => $this->input->post('ID_FASILITAS',TRUE),
			'ID_TUGAS' => $this->input->post('ID_TUGAS',TRUE),
			'STATUS_PENUGASAN' => $this->input->post('STATUS_PENUGASAN',TRUE),
			'STATUS_ACC' => $this->input->post('STATUS_ACC',TRUE),
			'KETERANGAN_TUGAS' => $this->input->post('KETERANGAN_TUGAS',TRUE),
			);

				$this->Petugas_kebun_model->update($this->input->post('ID_LAPORAN', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('c_kepegawaian/list_ACC_kebun/'));
			}
		}
		
		public function delete1($id) 
		{
			$row = $this->Petugas_kebun_model->get_by_id($id);

			if ($row) {
				$this->Petugas_kebun_model->delete($id);
				$this->session->set_flashdata('message', 'Delete Record Success');
				redirect(site_url('c_kepegawaian/laporan1'));
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan1'));
			}
		}

		public function _rules1() 
		{
			$this->form_validation->set_rules('ID_LAPORAN', 'ID_LAPORAN', 'trim|required');
			$this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
			$this->form_validation->set_rules('USER_GROUP', 'USER_GROUP', 'trim|required');
			$this->form_validation->set_rules('LAST_NAME', 'LAST_NAME', 'trim|required');
			$this->form_validation->set_rules('DATE_LPLK', 'DATE_LPLK', 'trim|required');
			$this->form_validation->set_rules('JAM_LPLK', 'JAM_LPLK', 'trim|required');
			$this->form_validation->set_rules('ID_RUANGAN', 'ID_RUANGAN', 'trim|required');
			$this->form_validation->set_rules('ID_FASILITAS', 'ID_FASILITAS', 'trim|required');
			$this->form_validation->set_rules('ID_TUGAS', 'ID_TUGAS', 'trim|required');
			$this->form_validation->set_rules('STATUS_PENUGASAN', 'STATUS_PENUGASAN', 'trim|required');
			$this->form_validation->set_rules('STATUS_ACC', 'STATUS_ACC', 'trim|required');
			$this->form_validation->set_rules('KETERANGAN_TUGAS', 'KETERANGAN_TUGAS', 'trim|required');

			//$this->form_validation->set_rules('LOCT_ID', 'LOCT_ID', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}
//==============================================================================================================================================
//petugas CLEANING SERVICE
//==============================================================================================================================================			
	public function tambah() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('user_group','role','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		$this->form_validation->set_rules('date_lplk','tanggal laporan','required');			
		$this->form_validation->set_rules('jam_lplk','jam laporan','required');			
		$this->form_validation->set_rules('status_penugasan','status penugasan','required');			
		$this->form_validation->set_rules('status_acc','status_acc','required');			
		$this->form_validation->set_rules('keterangan_tugas','keterangan_tugas','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['last_name']=$this->Cleaning_service_model->ambil_last_name();
		$data['ruangan']=$this->Cleaning_service_model->ambil_ruangan();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Cleaning_service_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("c_kepegawaian/laporan2", 'refresh');
			}	 
		 
	}	
	/* public function tambah() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('user_group','role','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		$this->form_validation->set_rules('date_lplk','tanggal laporan','required');			
		$this->form_validation->set_rules('jam_lplk','jam laporan','required');			
		$this->form_validation->set_rules('status_penugasan','status penugasan','required');			
		$this->form_validation->set_rules('status_acc','status_acc','required');			
		$this->form_validation->set_rules('keterangan_tugas','keterangan_tugas','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['last_name']=$this->Cleaning_service_model->ambil_last_name();
		$data['ruangan']=$this->Cleaning_service_model->ambil_ruangan();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
				if($this->Cleaning_service_model->get_limit_tgs_cs($this->Cleaning_service_model->ambil_last_name(), $this->Cleaning_service_model->ambil_ruangan()) >0){
					$this->load->view('AdmindanUser/header', $data);
					$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_form', $data);
					$this->load->view('AdmindanUser/footer', $data);
				}else{
					 $this->Cleaning_service_model->simpan();
					 //redirect(base_url(),'refresh');
					 redirect("c_kepegawaian/laporan2", 'refresh');
				}
			}	 
		 
	}	 */
	public function t_tambahan() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('user_group','role','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		$this->form_validation->set_rules('date_lplk','tanggal laporan','required');			
		$this->form_validation->set_rules('jam_lplk','jam laporan','required');			
		$this->form_validation->set_rules('status_penugasan','status penugasan','required');			
		$this->form_validation->set_rules('status_acc','status_acc','required');			
		$this->form_validation->set_rules('keterangan_tugas','keterangan_tugas','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['last_name']=$this->Cleaning_service_model->ambil_last_name();
		$data['ruangan']=$this->Cleaning_service_model->ambil_ruangan();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/tugas_tambahan_pCS_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Cleaning_service_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("c_kepegawaian/tugas_tambahan2", 'refresh');
			}	 
		 
	}	

		// 
		public function pilih_NIK(){
			$data['NIK']=$this->Cleaning_service_model->ambil_NIK($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_last_name',$data);
		}
		
		public function pilih_fasilitas(){
			$data['fasilitas']=$this->Cleaning_service_model->ambil_fasilitas($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_fasilitas',$data);
		}

		// dijalankan 
		public function pilih_tugas(){
			$data['tugas']=$this->Cleaning_service_model->ambil_tugas($this->uri->segment(3));
			$this->load->view('AdmindanUser/kepegawaian/v_drop_down_tugas',$data);
		}
		
		public function laporan2()
		{
			$cleaning_service = $this->Cleaning_service_model->get_kepegawaian_cs();

			$data = array(
				'cleaning_service_data' => $cleaning_service
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		public function tugas_tambahan2()
		{
			$cleaning_service = $this->Cleaning_service_model->get_tambahan();

			$data = array(
				'cleaning_service_data' => $cleaning_service
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/tugas_tambahan_pCS_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		public function ACC()
		{
			$cleaning_service = $this->Cleaning_service_model->get_ACC();

			$data = array(
				'cleaning_service_data' => $cleaning_service
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_bersih', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		
		public function list_ACC()
		{
			$cleaning_service = $this->Cleaning_service_model->get_ACC_list();

			$data = array(
				'cleaning_service_data' => $cleaning_service
			);

			//$this->load->view('cleaning_service/laporan_plk_list', $data);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_ACC_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}

		public function read2($id) 
		{
			$row = $this->Cleaning_service_model->get_by_id($id);
			if ($row) {
				$data = array(
			'ID_LAPORAN' => $row->ID_LAPORAN,
			'NIK' => $row->NIK,
			'LAST_NAME' => $row->LAST_NAME,
			'DATE_LPLK' => $row->DATE_LPLK,
			'NAMA_RUANGAN' => $row->ID_RUANGAN,
			'FASILITAS' => $row->ID_FASILITAS,
			'JENIS_TUGAS' => $row->ID_TUGAS,
			'STATUS_PENUGASAN' => $row->STATUS_PENUGASAN,
			'STATUS_ACC' => $row->STATUS_ACC,
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_read', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan1'));
			}
		}

		public function create2() 
		{
			$data = array(
				'button' => 'Create',
				'action' => site_url('c_kepegawaian/create_action2'),
			'ID_LAPORAN' => set_value('ID_LAPORAN'),
			'USER_GROUP' => set_value('USER_GROUP'),
			'LAST_NAME' => set_value('LAST_NAME'),
			'DATE_LPLK' => set_value('DATE_LPLK'),
			'JAM_KEJADIAN' => set_value('JAM_KEJADIAN'),
			'LOKASI' => set_value('LOKASI'),
			'DESC_LAPORAN' => set_value('DESC_LAPORAN'),
			'KETERANGAN' => set_value('KETERANGAN'),
			'STATUS_ACC' => set_value('STATUS_ACC'),
		);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		
		public function create_action2() 
		{
			$this->_rules2();

			if ($this->form_validation->run() == FALSE) {
				$this->create2();
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post('ID_LAPORAN',TRUE),
			'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
			'LAST_NAME' => $this->input->post('LAST_NAME',TRUE),
			'TANGGAL_KEJADIAN' => $this->input->post('TANGGAL_KEJADIAN',TRUE),
			'JAM_KEJADIAN' => $this->input->post('JAM_KEJADIAN',TRUE),
			'LOKASI' => $this->input->post('LOKASI',TRUE),
			'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
			'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
			'STATUS_ACC' => $this->input->post('STATUS_ACC',TRUE),
			);

				$this->Cleaning_service_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('c_kepegawaian/laporan2'));
			}
		}
		
		public function update2($id) 
		{
			$row = $this->Cleaning_service_model->get_by_id($id);
			if ($row) {
				$data = array(
					'button' => 'ACC',
					'action' => site_url('c_kepegawaian/update_action2'),
			'ID_LAPORAN' => set_value('ID_LAPORAN', $row->ID_LAPORAN),
			'NIK' => set_value('NIK', $row->NIK),
			'USER_GROUP' => set_value('USER_GROUP', $row->USER_GROUP),
			'LAST_NAME' => set_value('LAST_NAME', $row->LAST_NAME),
			'DATE_LPLK' => set_value('DATE_LPLK', $row->DATE_LPLK),
			'JAM_LPLK' => set_value('JAM_LPLK', $row->JAM_LPLK),
			'ID_RUANGAN' => set_value('ID_RUANGAN', $row->ID_RUANGAN),
			'ID_FASILITAS' => set_value('ID_FASILITAS', $row->ID_FASILITAS),
			'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
			'STATUS_PENUGASAN' => set_value('STATUS_PENUGASAN', $row->STATUS_PENUGASAN),
			'STATUS_ACC' => set_value('STATUS_ACC', $row->STATUS_ACC),
			'KETERANGAN_TUGAS' => set_value('KETERANGAN_TUGAS', $row->KETERANGAN_TUGAS),
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_pCS_form_ACC', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan2'));
			}
		}
		
		public function update_action2() 
		{
			$this->_rules2();
	
			if ($this->form_validation->run() == FALSE) {
				$this->update2($this->input->post('ID_LAPORAN', TRUE));
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post(ID_LAPORAN),
			'NIK' => $this->input->post('NIK',TRUE),
			'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
			'LAST_NAME' => $this->input->post('LAST_NAME',TRUE),
			'DATE_LPLK' => $this->input->post('DATE_LPLK',TRUE),
			'JAM_LPLK' => $this->input->post('JAM_LPLK',TRUE),
			'ID_RUANGAN' => $this->input->post('ID_RUANGAN',TRUE),
			'ID_FASILITAS' => $this->input->post('ID_FASILITAS',TRUE),
			'ID_TUGAS' => $this->input->post('ID_TUGAS',TRUE),
			'STATUS_PENUGASAN' => $this->input->post('STATUS_PENUGASAN',TRUE),
			'STATUS_ACC' => $this->input->post('STATUS_ACC',TRUE),
			'KETERANGAN_TUGAS' => $this->input->post('KETERANGAN_TUGAS',TRUE),
			);

				$this->Cleaning_service_model->update($this->input->post('ID_LAPORAN', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('c_kepegawaian/laporan2/'));
			}
		}
		
		public function delete2($id) 
		{
			$row = $this->Cleaning_service_model->get_by_id($id);

			if ($row) {
				$this->Cleaning_service_model->delete($id);
				$this->session->set_flashdata('message', 'Delete Record Success');
				redirect(site_url('c_kepegawaian/laporan1'));
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan2'));
			}
		}

		
		public function _rules2() 
		{
			$this->form_validation->set_rules('ID_LAPORAN', 'ID_LAPORAN', 'trim|required');
			$this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
			$this->form_validation->set_rules('USER_GROUP', 'USER_GROUP', 'trim|required');
			$this->form_validation->set_rules('LAST_NAME', 'LAST_NAME', 'trim|required');
			$this->form_validation->set_rules('DATE_LPLK', 'DATE_LPLK', 'trim|required');
			$this->form_validation->set_rules('JAM_LPLK', 'JAM_LPLK', 'trim|required');
			$this->form_validation->set_rules('ID_RUANGAN', 'ID_RUANGAN', 'trim|required');
			$this->form_validation->set_rules('ID_FASILITAS', 'ID_FASILITAS', 'trim|required');
			$this->form_validation->set_rules('ID_TUGAS', 'ID_TUGAS', 'trim|required');
			$this->form_validation->set_rules('STATUS_PENUGASAN', 'STATUS_PENUGASAN', 'trim|required');
			$this->form_validation->set_rules('STATUS_ACC', 'STATUS_ACC', 'trim|required');
			$this->form_validation->set_rules('KETERANGAN_TUGAS', 'KETERANGAN_TUGAS', 'trim|required');

			//$this->form_validation->set_rules('LOCT_ID', 'LOCT_ID', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}
		public function excel()
		{
			$this->load->helper('exportexcel');
			$namaFile = "laporan_plk.xls";
			$judul = "laporan_plk";
			$tablehead = 0;
			$tablebody = 1;
			$nourut = 1;
			//penulisan header
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=" . $namaFile . "");
			header("Content-Transfer-Encoding: binary ");

			xlsBOF();

			$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "ID LAPORAN");
		xlsWriteLabel($tablehead, $kolomhead++, "NIK");
		xlsWriteLabel($tablehead, $kolomhead++, "BAGIAN");
		xlsWriteLabel($tablehead, $kolomhead++, "NAMA");
		xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL LAPORAN");
		xlsWriteLabel($tablehead, $kolomhead++, "JAM PENGERJAAN");
		xlsWriteLabel($tablehead, $kolomhead++, "RUANGAN");
		xlsWriteLabel($tablehead, $kolomhead++, "FASILITAS");
		xlsWriteLabel($tablehead, $kolomhead++, "STATUS PENUGASAN");
		xlsWriteLabel($tablehead, $kolomhead++, "KETERANGAN TUGAS");

		foreach ($this->Cleaning_service_model->get_ACC_list() as $data) {
				$kolombody = 0;

				//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
				xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->ID_LAPORAN);
			xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
			xlsWriteLabel($tablebody, $kolombody++, $data->USER_GROUP);
			xlsWriteLabel($tablebody, $kolombody++, $data->LAST_NAME);
			xlsWriteNumber($tablebody, $kolombody++, $data->DATE_LPLK);
			xlsWriteNumber($tablebody, $kolombody++, $data->JAM_LPLK);
			xlsWriteLabel($tablebody, $kolombody++, $data->ID_RUANGAN);
			xlsWriteLabel($tablebody, $kolombody++, $data->ID_FASILITAS);
			xlsWriteLabel($tablebody, $kolombody++, $data->STATUS_PENUGASAN);
			xlsWriteLabel($tablebody, $kolombody++, $data->KETERANGAN_TUGAS);

			$tablebody++;
				$nourut++;
			}

			xlsEOF();
			exit();
		}
//==============================================================================================================================================
//petugas SECURITY
//==============================================================================================================================================
		 public function laporan3()
		{
			$petugas_security = $this->Petugas_security_model->get_all();

			$data = array(
				'petugas_security_data' => $petugas_security
			);

			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_psecurity_list', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}

		public function read3($id) 
		{
			$row = $this->Petugas_security_model->get_by_id($id);
			if ($row) {
				$data = array(
			'ID_LAPORAN' => $row->ID_LAPORAN,
			'TANGGAL_KEJADIAN' => $row->TANGGAL_KEJADIAN,
			'JAM_KEJADIAN' => $row->JAM_KEJADIAN,
			'DESC_LAPORAN' => $row->DESC_LAPORAN,
			'KETERANGAN' => $row->KETERANGAN,
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_psecurity_read', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan3'));
			}
		}

		public function create3() 
		{
			$data = array(
				'button' => 'Create',
				'action' => site_url('c_kepegawaian/create_action3'),
			'ID_LAPORAN' => set_value('ID_LAPORAN'),
			'USER_GROUP' => set_value('USER_GROUP'),
			'TANGGAL_KEJADIAN' => set_value('TANGGAL_KEJADIAN'),
			'JAM_KEJADIAN' => set_value('JAM_KEJADIAN'),
			'DESC_LAPORAN' => set_value('DESC_LAPORAN'),
			'KETERANGAN' => set_value('KETERANGAN'),
		);
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/kepegawaian/laporan_psecurity_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
		}
		
		public function create_action3() 
		{
			$this->_rules3();

			if ($this->form_validation->run() == FALSE) {
				$this->create();
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post('ID_LAPORAN',TRUE),
			'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
			'TANGGAL_KEJADIAN' => $this->input->post('TANGGAL_KEJADIAN',TRUE),
			'JAM_KEJADIAN' => $this->input->post('JAM_KEJADIAN',TRUE),
			'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
			'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
			);

				$this->Petugas_security_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('c_kepegawaian/laporan3'));
			}
		}
		
		public function update3($id) 
		{
			$row = $this->Petugas_security_model->get_by_id($id);

			if ($row) {
				$data = array(
					'button' => 'Update',
					'action' => site_url('c_kepegawaian/update_action3'),
			'ID_LAPORAN' => set_value('ID_LAPORAN', $row->ID_LAPORAN),
			'TANGGAL_KEJADIAN' => set_value('TANGGAL_KEJADIAN', $row->TANGGAL_KEJADIAN),
			'JAM_KEJADIAN' => set_value('JAM_KEJADIAN', $row->JAM_KEJADIAN),
			'DESC_LAPORAN' => set_value('DESC_LAPORAN', $row->DESC_LAPORAN),
			'KETERANGAN' => set_value('KETERANGAN', $row->KETERANGAN),
			);
				$this->load->view('AdmindanUser/header', $data);
				$this->load->view('AdmindanUser/kepegawaian/laporan_psecurity_form', $data);
				$this->load->view('AdmindanUser/footer', $data);
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan3'));
			}
		}
		
		public function update_action3() 
		{
			$this->_rules3();

			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('ID_LAPORAN', TRUE));
			} else {
				$data = array(
			'ID_LAPORAN' => $this->input->post('ID_LAPORAN',TRUE),
			'TANGGAL_KEJADIAN' => $this->input->post('TANGGAL_KEJADIAN',TRUE),
			'JAM_KEJADIAN' => $this->input->post('JAM_KEJADIAN',TRUE),
			'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
			'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
			);

				$this->Petugas_security_model->update($this->input->post('ID_LAPORAN', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('c_kepegawaian/laporan3'));
			}
		}
		
		public function delete3($id) 
		{
			$row = $this->Petugas_security_model->get_by_id($id);

			if ($row) {
				$this->Petugas_security_model->delete($id);
				$this->session->set_flashdata('message', 'Delete Record Success');
				redirect(site_url('c_kepegawaian/laporan3'));
			} else {
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('c_kepegawaian/laporan3'));
			}
		}

		public function _rules3() 
		{
		//$this->form_validation->set_rules('ID_LAPORAN', 'ID_LAPORAN', 'trim|required');
		$this->form_validation->set_rules('TANGGAL_KEJADIAN', 'date lplk', 'trim|required');
		$this->form_validation->set_rules('JAM_KEJADIAN', 'JAM', 'trim|required');
		$this->form_validation->set_rules('DESC_LAPORAN', 'desc laporan', 'trim|required');
		$this->form_validation->set_rules('KETERANGAN', 'keterangan', 'trim|required');

		$this->form_validation->set_rules('ID_LAPORAN', 'ID_LAPORAN', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}
	}
