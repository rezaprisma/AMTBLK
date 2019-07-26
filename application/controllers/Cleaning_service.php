<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cleaning_service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cleaning_service_model');
		$this->load->model('Data_Barang_model');
        $this->load->library('form_validation');
    }
	
	public function index()
    {
        $cleaning_service = $this->Cleaning_service_model->get_penugasan();

        $data = array(
            'cleaning_service_data' => $cleaning_service
        );

        //$this->load->view('cleaning_service/laporan_plk_list', $data);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }
	
	public function tambahan()
    {
        $cleaning_service = $this->Cleaning_service_model->get_penugasan_tambahan();

        $data = array(
            'cleaning_service_data' => $cleaning_service
        );

        //$this->load->view('cleaning_service/laporan_plk_list', $data);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_tambahan', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }
	
	public function pending()
    {
        $cleaning_service = $this->Cleaning_service_model->get_pending();

        $data = array(
            'cleaning_service_data' => $cleaning_service
        );

        //$this->load->view('cleaning_service/laporan_plk_list', $data);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }
	public function bersih()
    {
        $cleaning_service = $this->Cleaning_service_model->get_bersih();

        $data = array(
            'cleaning_service_data' => $cleaning_service
        );

        //$this->load->view('cleaning_service/laporan_plk_list', $data);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_bersih', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }
	public function ACC()
    {
        $cleaning_service = $this->Cleaning_service_model->get_SACC();

        $data = array(
            'cleaning_service_data' => $cleaning_service
        );

        //$this->load->view('cleaning_service/laporan_plk_list', $data);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_ACC', $data);
        $this->load->view('AdmindanUser/footer', $data);
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
					'jumlah_tgs_cs' => $this->Cleaning_service_model->get_jml_tgs_CS(),
					'jumlah_tbh_CS' => $this->Cleaning_service_model->get_jml_tgs_hr_CS(),
					'jumlah_brg_CS' => $this->Data_Barang_model->get_jml_brg_CS()
				);

			$this->load->view('AdmindanUser/header', $this->data);
			$this->load->view('AdmindanUser/cleaningService/dashboard_CS', $this->data);
			$this->load->view('AdmindanUser/footer', $this->data);
			
			
		}
	}

    public function read($id) 
    {
        $row = $this->Cleaning_service_model->get_by_id($id);
        if ($row) {
            $data = array(
		'LOCT_ID' => $row->LOCT_ID,
		'LAST_NAME' => $row->LAST_NAME,
		'DATE_LPLK' => $row->DATE_LPLK,
		'JAM_PELAPORAN' => $row->JAM_PELAPORAN,
		'DESC_LAPORAN' => $row->DESC_LAPORAN,
		'KETERANGAN' => $row->KETERANGAN,
		'STATUS_ACC' => $row->STATUS_ACC,
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('AdmindanUser/cleaningService/laporan_plk_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cleaning_service'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cleaning_service/create_action'),
	    'LOCT_ID' => set_value('LOCT_ID'),
	    'USER_GROUP' => set_value('USER_GROUP'),
	    'LAST_NAME' => set_value('LAST_NAME'),
	    'DATE_LPLK' => set_value('DATE_LPLK'),
	    'JAM_PELAPORAN' => set_value('JAM_PELAPORAN'),
	    'DESC_LAPORAN' => set_value('DESC_LAPORAN'),
	    'KETERANGAN' => set_value('KETERANGAN'),
	    'STATUS_ACC' => set_value('STATUS_ACC'),
	);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_plk_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'LOCT_ID' => $this->input->post('LOCT_ID',TRUE),
		'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
		'LAST_NAME' => $this->input->post('LAST_NAME',TRUE),
		'DATE_LPLK' => $this->input->post('DATE_LPLK',TRUE),
		'JAM_PELAPORAN' => $this->input->post('JAM_PELAPORAN',TRUE),
		'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
		'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
		'STATUS_ACC' => $this->input->post('STATUS_ACC',TRUE),
	    );

            $this->Cleaning_service_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cleaning_service/bersih/'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cleaning_service_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Yakin',
                'action' => site_url('cleaning_service/update_action'),
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
            $this->load->view('AdmindanUser/cleaningService/laporan_plk_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cleaning_service'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_LAPORAN', TRUE));
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
            redirect(site_url('cleaning_service/bersih/'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cleaning_service_model->get_by_id($id);

        if ($row) {
            $this->Cleaning_service_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cleaning_service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cleaning_service'));
        }
    }

    public function _rules() 
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
//=========================================================================================================================

//===============================================================================================================================	
	public function tampil_barang_keluar()
    {
        $c_data_barang_keluar = $this->Data_Barang_model->get_barang_keluar_CS();

        $data = array(
            'c_data_barang_data' => $c_data_barang_keluar
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/Laporan_Penggantian_barang', $data);
        $this->load->view('AdmindanUser/footer', $data);
        //$this->load->view('c_data_barang/barang_list', $data);
    }
	
	public function read_permintaan() 
    {
        $Cleaning_service = $this->Data_Barang_model->get_permintaan_CS();

        $data = array(
            'cleaning_service_data' => $Cleaning_service
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/cleaningService/laporan_permintaan_barang_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
        //$this->load->view('c_data_barang/barang_list', $data);
    }

    public function read2($id) 
    {
        $row = $this->Data_Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'KODEBARCODE' => $row->KODEBARCODE,
		'NO_BON' => $row->NO_BON,
		'NAMA_BARANG' => $row->NAMA_BARANG,
		'STATUS_BARANG' => $row->STATUS_BARANG,
		'TANGGAL_MASUK' => $row->TANGGAL_MASUK,
		'LOKASI' => $row->LOKASI,
		'TANGGAL_KELUAR' => $row->TANGGAL_KELUAR,
		'KONDISI' => $row->KONDISI,
	    );
            $this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/cleaningService/barang_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Cleaning_service'));
        }
    }
    
    public function update2($id) 
    {
        $row = $this->Data_Barang_model->get_by_id2($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Cleaning_service/update_action2'),
		'ID_PENGELUARAN' => set_value('ID_PENGELUARAN', $row->ID_PENGELUARAN),
		'KODEBARCODE' => set_value('KODEBARCODE', $row->KODEBARCODE),
		'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
		'SATUAN' => set_value('SATUAN', $row->SATUAN),
		'STATUS_BARANG' => set_value('STATUS_BARANG', $row->STATUS_BARANG),
		'TANGGAL_TERIMA' => set_value('TANGGAL_TERIMA', $row->TANGGAL_TERIMA),
		'JUMLAH_BARANG' => set_value('JUMLAH_BARANG', $row->JUMLAH_BARANG),
		'LOKASI' => set_value('LOKASI', $row->LOKASI),
		'TANGGAL_KELUAR' => set_value('TANGGAL_KELUAR', $row->TANGGAL_KELUAR),
		'KONDISI' => set_value('KONDISI', $row->KONDISI),
	    );
            $this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/cleaningService/Laporan_Penggantian_barang_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Cleaning_service/tampil_barang_keluar'));
        }
    }
    
    public function update_action2() 
    {
        $this->_rules2();

        if ($this->form_validation->run() == FALSE) {
            $this->update2($this->input->post('ID_PENGELUARAN', TRUE));
        } else {
            $data = array(
		'ID_PENGELUARAN' => $this->input->post('ID_PENGELUARAN',TRUE),
		'KODEBARCODE' => $this->input->post('KODEBARCODE',TRUE),
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'SATUAN' => $this->input->post('SATUAN',TRUE),
		'STATUS_BARANG' => $this->input->post('STATUS_BARANG',TRUE),
		'TANGGAL_TERIMA' => $this->input->post('TANGGAL_TERIMA',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'LOKASI' => $this->input->post('LOKASI',TRUE),
		'TANGGAL_KELUAR' => $this->input->post('TANGGAL_KELUAR',TRUE),
		'KONDISI' => $this->input->post('KONDISI',TRUE),
	    );

            $this->Data_Barang_model->update2($this->input->post('ID_PENGELUARAN', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Cleaning_service/tampil_barang_keluar/'));
        }
    }
    
    public function delete2($id) 
    {
        $row = $this->Data_Barang_model->get_by_id($id);

        if ($row) {
            $this->Data_Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Cleaning_service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Cleaning_service'));
        }
    }

    public function _rules2() 
    {
	$this->form_validation->set_rules('ID_PENGELUARAN', 'ID_PENGELUARAN', 'trim|required');
	$this->form_validation->set_rules('KODEBARCODE', 'KODEBARCODE', 'trim|required');
	$this->form_validation->set_rules('NAMA_BARANG', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('SATUAN', ' SATRUAN', 'trim|required');
	$this->form_validation->set_rules('STATUS_BARANG', 'status barang', 'trim|required');
	$this->form_validation->set_rules('TANGGAL_TERIMA', 'tanggal terima', 'trim|required');
	$this->form_validation->set_rules('JUMLAH_BARANG', 'jumlah barang', 'trim|required');
	$this->form_validation->set_rules('LOKASI', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('TANGGAL_KELUAR', 'tanggal keluar', 'trim|required');
	$this->form_validation->set_rules('KONDISI', 'kondisi', 'trim|required');

	//$this->form_validation->set_rules('KODEBARCODE', 'KODEBARCODE', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
