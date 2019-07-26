<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Master_tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Tugas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_master_tugas = $this->Master_Tugas_model->get_all();

        $data = array(
            'c_master_tugas_data' => $c_master_tugas
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('master_tugas/tugas_list', $data);
		$this->load->view('AdmindanUser/footer', $data);
    }
	public function tambah() {
					
		$this->form_validation->set_rules('jenis_tugas','jenis tugas','required');		
		
		//$data['id_laporan'] = $this->Cleaning_service_model->getkodeunik();
		$data['id_tugas']=$this->Master_Tugas_model->getkodeunik();
		$data['ruangan']=$this->Master_Tugas_model->ambil_ruangan();
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('master_tugas/tugas_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
		 
			if($this->form_validation->run() == TRUE){
			 $this->Master_Tugas_model->simpan();
			 //redirect(base_url(),'refresh');
			 redirect("C_Master_tugas", 'refresh');
			}	 
		 
	}
	
	public function pilih_fasilitas(){
			$data['id_fasilitas']=$this->Master_Tugas_model->ambil_fasilitas($this->uri->segment(3));
			$this->load->view('master_tugas/v_drop_down_fasilitas',$data);
		}

    public function read($id) 
    {
        $row = $this->Master_Tugas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_TUGAS' => $row->ID_TUGAS,
		'ID_FASILITAS' => $row->ID_FASILITAS,
		'JENIS_TUGAS' => $row->JENIS_TUGAS,
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('master_tugas/tugas_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_master_tugas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_master_tugas/create_action'),
	    'ID_TUGAS' => set_value('ID_TUGAS'),
	    'ID_FASILITAS' => $this->Master_Tugas_model->get_ambil_fasilitas(),
	    'JENIS_TUGAS' => set_value('JENIS_TUGAS'),
	);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('master_tugas/tugas_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_TUGAS' => $this->Master_Tugas_model->getkodeunik(),
		'ID_FASILITAS' => $this->input->post('ID_FASILITAS',TRUE),
		'JENIS_TUGAS' => $this->input->post('JENIS_TUGAS',TRUE),
	    );

            $this->Master_Tugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_master_tugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_Tugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_master_tugas/update_action'),
		'ID_TUGAS' => set_value('ID_TUGAS', $row->ID_TUGAS),
		'ID_FASILITAS' => set_value('ID_FASILITAS', $row->ID_FASILITAS),
		'JENIS_TUGAS' => set_value('JENIS_TUGAS', $row->JENIS_TUGAS),
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('master_tugas/tugas_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_master_tugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_TUGAS', TRUE));
        } else {
            $data = array(
		'ID_FASILITAS' => $this->input->post('ID_FASILITAS',TRUE),
		'JENIS_TUGAS' => $this->input->post('JENIS_TUGAS',TRUE),
	    );

            $this->Master_Tugas_model->update($this->input->post('ID_TUGAS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_master_tugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_Tugas_model->get_by_id($id);

        if ($row) {
            $this->Master_Tugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_master_tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_master_tugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_FASILITAS', 'id fasilitas', 'trim|required');
	$this->form_validation->set_rules('JENIS_TUGAS', 'jenis tugas', 'trim|required');

	$this->form_validation->set_rules('ID_TUGAS', 'ID_TUGAS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Master_tugas.php */
/* Location: ./application/controllers/C_Master_tugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-01 04:43:04 */
/* http://harviacode.com */