<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas_security extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_security_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $petugas_security = $this->Petugas_security_model->get_all();

        $data = array(
            'petugas_security_data' => $petugas_security
        );

        $this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/petugasSecurity/laporan_plk_list', $data);
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
					'petugas_security_data' => $this->Petugas_security_model->get_all()
				);

			$this->load->view('AdmindanUser/header', $this->data);
			$this->load->view('AdmindanUser/petugasSecurity/dashboard_Psecurity', $this->data);
			$this->load->view('AdmindanUser/footer', $this->data);
			
			
		}
	}

    public function read($id) 
    {
        $row = $this->Petugas_security_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_LAPORAN' => $row->id_laporan,
		'TANGGAL_KEJADIAN' => $row->tanggal_kejadian,
		'JAM_KEJADIAN' => $row->jam_kejadian,
		'DESC_LAPORAN' => $row->desc_laporan,
		'KETERANGAN' => $row->keterangan,
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('AdmindanUser/petugasSecurity/laporan_plk_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas_security'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('petugas_security/create_action'),
	    'ID_LAPORAN' => set_value('ID_LAPORAN'),
	    'USER_GROUP' => set_value('USER_GROUP'),
	    'TANGGAL_KEJADIAN' => set_value('TANGGAL_KEJADIAN'),
	    'JAM_KEJADIAN' => set_value('JAM_KEJADIAN'),
	    'DESC_LAPORAN' => set_value('DESC_LAPORAN'),
	    'KETERANGAN' => set_value('KETERANGAN'),
	);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/petugasSecurity/laporan_plk_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_LAPORAN' => $this->Petugas_security_model->getkodeunik(),
		'USER_GROUP' => $this->input->post('USER_GROUP',TRUE),
		'TANGGAL_KEJADIAN' => $this->input->post('TANGGAL_KEJADIAN',TRUE),
		'JAM_KEJADIAN' => $this->input->post('JAM_KEJADIAN',TRUE),
		'DESC_LAPORAN' => $this->input->post('DESC_LAPORAN',TRUE),
		'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
	    );

            $this->Petugas_security_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('petugas_security'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Petugas_security_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('petugas_security/update_action'),
		'ID_LAPORAN' => set_value('ID_LAPORAN', $row->ID_LAPORAN),
		'TANGGAL_KEJADIAN' => set_value('TANGGAL_KEJADIAN', $row->TANGGAL_KEJADIAN),
		'JAM_KEJADIAN' => set_value('JAM_KEJADIAN', $row->JAM_KEJADIAN),
		'DESC_LAPORAN' => set_value('DESC_LAPORAN', $row->DESC_LAPORAN),
		'KETERANGAN' => set_value('KETERANGAN', $row->KETERANGAN),
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('AdmindanUser/petugasSecurity/laporan_plk_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas_security'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

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
            redirect(site_url('petugas_security'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Petugas_security_model->get_by_id($id);

        if ($row) {
            $this->Petugas_security_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('petugas_security'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas_security'));
        }
    }

    public function _rules() 
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