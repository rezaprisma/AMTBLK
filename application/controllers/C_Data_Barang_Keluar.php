<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Data_Barang_Keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_data_barang_keluar = $this->Data_Barang_model->get_barang_keluar();

        $data = array(
            'c_data_barang_data' => $c_data_barang_keluar
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/barang_keluar', $data);
        $this->load->view('AdmindanUser/footer', $data);
        //$this->load->view('c_data_barang/barang_list', $data);
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
		'TANGGAL_MASUK' => $row->TANGGAL_MASUK,
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
		'KONDISI' => set_value('KONDISI', $row->KONDISI),
	    );
            $this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/administrasiBarang/barang_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_data_barang'));
        }
    }
    
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
	$this->form_validation->set_rules('TANGGAL_KELUAR', 'tanggal keluar', 'trim|required');
	$this->form_validation->set_rules('KONDISI', 'kondisi', 'trim|required');

	//$this->form_validation->set_rules('KODEBARCODE', 'KODEBARCODE', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	function hitung(){
		
		
	}

}

