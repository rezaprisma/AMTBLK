<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Data_Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_Barang_model');
        $this->load->model('Penerimaan_Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_data_barang = $this->Data_Barang_model->get_all();

        $data = array(
            'c_data_barang_data' => $c_data_barang
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/barang_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
        //$this->load->view('c_data_barang/barang_list', $data);
    }
	public function permintaan_barang()
    {
        $c_data_barang_keluar = $this->Data_Barang_model->get_permintaan();

        $data = array(
            'c_data_barang_data' => $c_data_barang_keluar
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/permintaan_barang_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
        //$this->load->view('c_data_barang/barang_list', $data);
    }
	public function tambah() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		//$this->form_validation->set_rules('KODEBARCODE','KODEBARCODE','required');			
		//$this->form_validation->set_rules('last_name','nama belakang','required');			
		//$this->form_validation->set_rules('NO_BON','NO_BON','required');			
		//$this->form_validation->set_rules('NAMA_BARANG','NAMA_BARANG','required');			
		$this->form_validation->set_rules('SATUAN','SATUAN','required');			
		$this->form_validation->set_rules('STATUS_BARANG','STATUS_BARANG','required');			
		$this->form_validation->set_rules('TANGGAL_TERIMA','TANGGAL_TERIMA','required');			
		$this->form_validation->set_rules('JUMLAH_BARANG','JUMLAH_BARANG','required');			
		$this->form_validation->set_rules('LOKASI','LOKASI','required');			
		$this->form_validation->set_rules('TANGGAL_KELUAR','TANGGAL_KELUAR','');			
		//$this->form_validation->set_rules('USER_GROUP','USER_GROUP','required');			
		$this->form_validation->set_rules('KONDISI','KONDISI','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['KODEBARCODE']=$this->Data_Barang_model->ambil_no_bon();
		$data['USER_GROUP']=$this->Data_Barang_model->ambil_user();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/administrasiBarang/barang_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Data_Barang_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("C_Data_Barang", 'refresh');
			}	 
		 
	}
	
	public function pilih_barang(){
			$data['NAMA_BARANG']=$this->Data_Barang_model->ambil_barang($this->uri->segment(3));
			$this->load->view('AdmindanUser/administrasiBarang/v_drop_down_barang',$data);
		}
	
	public function t_tambahan() {
		//$this->form_validation->set_rules('NIK','Nomor Induk Kepegawaian','required');			
		$this->form_validation->set_rules('KODEBARCODE','KODEBARCODE','required');				
		//$this->form_validation->set_rules('NO_BON','NO_BON','required');			
		$this->form_validation->set_rules('NAMA_BARANG','NAMA_BARANG','required');			
		$this->form_validation->set_rules('STATUS_BARANG','STATUS_BARANG','required');			
		$this->form_validation->set_rules('TANGGAL_MASUK','TANGGAL_MASUK','required');			
		$this->form_validation->set_rules('LOKASI','LOKASI','required');			
		$this->form_validation->set_rules('TANGGAL_KELUAR','TANGGAL_KELUAR','');			
		$this->form_validation->set_rules('USER_GROUP','USER_GROUP','required');			
		$this->form_validation->set_rules('KONDISI','KONDISI','required');			
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['NO_BON']=$this->Data_Barang_model->ambil_no_bon();
		$this->load->view('AdmindanUser/header', $data);
		$this->load->view('AdmindanUser/kepegawaian/barang_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Data_Barang_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("c_data_barang", 'refresh');
			}	 
		 
	}
	function back()
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
					'jumlah_brg_rsk' => $this->Data_Barang_model->get_jml_brg_rsk(),
					'jumlah_brg_tot' => $this->Data_Barang_model->get_jml_brg_tot(),
					'jumlah_brg_klr' => $this->Data_Barang_model->get_jml_brg_klr(),
					'jumlah_pnrm_brg' => $this->Penerimaan_Barang_model->get_pnrm_brg()
				);

			$this->load->view('AdmindanUser/header', $this->data);
			$this->load->view('AdmindanUser/administrasiBarang/dashboard_adminBarang', $this->data);
			$this->load->view('AdmindanUser/footer', $this->data);
			
			
		}
	}

    public function read($id) 
    {
        $row = $this->Data_Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'KODEBARCODE' => $row->KODEBARCODE,
		'NO_BON' => $row->NO_BON,
		'NAMA_BARANG' => $row->NAMA_BARANG,
		'STATUS_BARANG' => $row->STATUS_BARANG,
		'TANGGAL_TERIMA' => $row->TANGGAL_TERIMA,
		'LOKASI' => $row->LOKASI,
		'TANGGAL_KELUAR' => $row->TANGGAL_KELUAR,
		'KONDISI' => $row->KONDISI,
	    );
            $this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/administrasiBarang/barang_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_data_barang'));
        }
    }
	/* public function pilih_USER(){
			$data['user']=$this->Data_Barang_model->ambil_user($this->uri->segment(3));
			$this->load->view('AdmindanUser/administrasiBarang/v_drop_down_user',$data);
	} */
    public function create() 
    {
		$row = $this->Data_Barang_model->get_by_id($id);
		if ($row) {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_data_barang/create_action'),
	    'NO_BON' => set_value('NO_BON', $row->NO_BON),
	    'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
	    'STATUS_BARANG' => set_value('STATUS_BARANG'),
	    'TANGGAL_TERIMA' => set_value('TANGGAL_TERIMA', $row->TANGGAL_TERIMA),
	    'JUMLAH_BARANG' => set_value('JUMLAH_BARANG', $row->JUMLAH_BARANG),
	    'LOKASI' => set_value('LOKASI'),
	    'TANGGAL_KELUAR' => set_value('TANGGAL_KELUAR'),
	    'USER_GROUP' => set_value('USER_GROUP'),
	    'KONDISI' => set_value('KONDISI', $row->KONDISI),
		);
        $this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/barang_form_keluar', $data);
        $this->load->view('AdmindanUser/footer', $data);
		} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_data_barang'));
        }
    }
	
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NO_BON' => $this->input->post('NO_BON',TRUE),
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'STATUS_BARANG' => $this->input->post('STATUS_BARANG',TRUE),
		'TANGGAL_TERIMA' => $this->input->post('TANGGAL_TERIMA',TRUE),
		'LOKASI' => $this->input->post('LOKASI',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'TANGGAL_KELUAR' => $this->input->post('TANGGAL_KELUAR',TRUE),
		'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
		'KONDISI' => $this->input->post('KONDISI',TRUE),
	    );

            $this->Data_Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_data_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_data_barang/update_action'),
		'KODEBARCODE' => set_value('KODEBARCODE', $row->KODEBARCODE),
		'NO_BON' => set_value('NO_BON', $row->NO_BON),
		'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
		'STATUS_BARANG' => set_value('STATUS_BARANG', $row->STATUS_BARANG),
		'TANGGAL_MASUK' => set_value('TANGGAL_MASUK', $row->TANGGAL_MASUK),
		'LOKASI' => set_value('LOKASI', $row->LOKASI),
		'TANGGAL_KELUAR' => set_value('TANGGAL_KELUAR', $row->TANGGAL_KELUAR),
		'USER_GROUP' => $this->Data_Barang_model->ambil_user( ),
		'KONDISI' => set_value('KONDISI', $row->KONDISI),
	    );
            $this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/administrasiBarang/barang_form_keluar', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_data_barang'));
        }
    }
    //$data['last_name']=$this->Cleaning_service_model->ambil_last_name();
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('KODEBARCODE', TRUE));
        } else {
            $data = array(
		'KODEBARCODE' => $this->input->post('KODEBARCODE',TRUE),
		'NO_BON' => $this->input->post('NO_BON',TRUE),
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'STATUS_BARANG' => $this->input->post('STATUS_BARANG',TRUE),
		'TANGGAL_MASUK' => $this->input->post('TANGGAL_MASUK',TRUE),
		'LOKASI' => $this->input->post('LOKASI',TRUE),
		'TANGGAL_KELUAR' => $this->input->post('TANGGAL_KELUAR',TRUE),
		'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
		'KONDISI' => $this->input->post('KONDISI',TRUE),
	    );

            $this->Data_Barang_model->update($this->input->post('KODEBARCODE', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_data_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_Barang_model->get_by_id($id);

        if ($row) {
            $this->Data_Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_data_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_data_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('KODEBARCODE', 'KODEBARCODE', 'trim|required');
	$this->form_validation->set_rules('NO_BON', 'no bon', 'trim|required');
	$this->form_validation->set_rules('NAMA_BARANG', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('STATUS_BARANG', 'status barang', 'trim|required');
	$this->form_validation->set_rules('TANGGAL_MASUK', 'tanggal masuk', 'trim|required');
	$this->form_validation->set_rules('LOKASI', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('TANGGAL_KELUAR', 'tanggal keluar', 'trim');
	$this->form_validation->set_rules('USER_GROUP', 'Bagian', 'trim');
	$this->form_validation->set_rules('KONDISI', 'kondisi', 'trim|required');

	//$this->form_validation->set_rules('KODEBARCODE', 'KODEBARCODE', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
