<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Penerimaan_Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerimaan_Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_penerimaan_barang = $this->Penerimaan_Barang_model->get_all();

        $data = array(
            'c_penerimaan_barang_data' => $c_penerimaan_barang
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/penerimaan_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }

    public function read($id) 
    {
        $row = $this->Penerimaan_Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'NO_BON' => $row->NO_BON,
		'ID_PENGADAAN' => $row->ID_PENGADAAN,
		'NAMA_BARANG' => $row->NAMA_BARANG,
		'TANGGAL_TERIMA' => $row->TANGGAL_TERIMA,
		'JUMLAH_BARANG' => $row->JUMLAH_BARANG,
		'KONDISI' => $row->KONDISI,
		'NAMA_SUPPLIER' => $row->NAMA_SUPPLIER,
	    );
            $this->load->view('AdmindanUser/header', $data);
            $this->load->view('AdmindanUser/administrasiBarang/penerimaan_read', $data);
            $this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_penerimaan_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_penerimaan_barang/create_action'),
	    'NO_BON' => set_value('NO_BON'),
	    'ID_PENGADAAN' => set_value('ID_PENGADAAN'),
		//'ID_TUGAS' => $this->Master_Tugas_model->getkodeunik(),
	    'NAMA_BARANG' => set_value('NAMA_BARANG'),
	    'SATUAN' => set_value('SATUAN'),
	    'STATUS_BARANG' => set_value('STATUS_BARANG'),
	    'TANGGAL_TERIMA' => set_value('TANGGAL_TERIMA'),
	    'JUMLAH_BARANG' => set_value('JUMLAH_BARANG'),
	    'LOKASI' => set_value('LOKASI'),
	    'KONDISI' => set_value('KONDISI'),
	    'NAMA_SUPPLIER' => set_value('NAMA_SUPPLIER'),
	);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/penerimaan_form', $data);
		$this->load->view('AdmindanUser/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NO_BON' => $this->input->post('NO_BON',TRUE),
		'ID_PENGADAAN' => $this->input->post('ID_PENGADAAN',TRUE),
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'SATUAN' => $this->input->post('SATUAN',TRUE),
		'STATUS_BARANG' => $this->input->post('STATUS_BARANG',TRUE),
		'TANGGAL_TERIMA' => $this->input->post('TANGGAL_TERIMA',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'LOKASI' => $this->input->post('LOKASI',TRUE),
		'KONDISI' => $this->input->post('KONDISI',TRUE),
		'NAMA_SUPPLIER' => $this->input->post('NAMA_SUPPLIER',TRUE),
	    );

            $this->Penerimaan_Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_penerimaan_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penerimaan_Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_penerimaan_barang/update_action'),
		'NO_BON' => set_value('NO_BON', $row->NO_BON),
		'ID_PENGADAAN' => set_value('ID_PENGADAAN', $row->ID_PENGADAAN),
		'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
		'TANGGAL_TERIMA' => set_value('TANGGAL_TERIMA', $row->TANGGAL_TERIMA),
		'JUMLAH_BARANG' => set_value('JUMLAH_BARANG', $row->JUMLAH_BARANG),
		'KONDISI' => set_value('KONDISI', $row->KONDISI),
		'NAMA_SUPPLIER' => set_value('NAMA_SUPPLIER', $row->NAMA_SUPPLIER),
	    );
			$this->load->view('AdmindanUser/header', $data);
            $this->load->view('AdmindanUser/administrasiBarang/penerimaan_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_penerimaan_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('NO_BON', TRUE));
        } else {
            $data = array(
		'NO_BON' => $this->input->post('NO_BON',TRUE),
		'ID_PENGADAAN' => $this->input->post('ID_PENGADAAN',TRUE),
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'TANGGAL_TERIMA' => $this->input->post('TANGGAL_TERIMA',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'KONDISI' => $this->input->post('KONDISI',TRUE),
		'NAMA_SUPPLIER' => $this->input->post('NAMA_SUPPLIER',TRUE),
	    );

            $this->Penerimaan_Barang_model->update($this->input->post('NO_BON', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_penerimaan_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penerimaan_Barang_model->get_by_id($id);

        if ($row) {
            $this->Penerimaan_Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_penerimaan_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_penerimaan_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NO_BON', 'NO_BON', 'trim|required');
	$this->form_validation->set_rules('ID_PENGADAAN', 'id pengadaan', 'trim|required');
	$this->form_validation->set_rules('NAMA_BARANG', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('SATUAN', 'satuan', 'trim|required');
	$this->form_validation->set_rules('STATUS_BARANG', 'status barang', 'trim|required');
	$this->form_validation->set_rules('TANGGAL_TERIMA', 'tanggal terima', 'trim|required');
	$this->form_validation->set_rules('JUMLAH_BARANG', 'jumlah barang', 'trim|required');
	$this->form_validation->set_rules('LOKASI', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('KONDISI', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('NAMA_SUPPLIER', 'nama supplier', 'trim|required');

	//$this->form_validation->set_rules('NO_BON', 'NO_BON', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penerimaan.xls";
        $judul = "penerimaan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "ID PENGADAAN");
	xlsWriteLabel($tablehead, $kolomhead++, "NAMA BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL TERIMA");
	xlsWriteLabel($tablehead, $kolomhead++, "JUMLAH BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "KONDISI");
	xlsWriteLabel($tablehead, $kolomhead++, "NAMA SUPPLIER");

	foreach ($this->Penerimaan_Barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ID_PENGADAAN);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TANGGAL_TERIMA);
	    xlsWriteNumber($tablebody, $kolombody++, $data->JUMLAH_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KONDISI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_SUPPLIER);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
