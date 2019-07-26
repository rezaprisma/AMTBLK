<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Detail_pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_pengadaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_detail_pengadaan = $this->Detail_pengadaan_model->get_all();

        $data = array(
            'c_detail_pengadaan_data' => $c_detail_pengadaan
        );
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/detail_pengadaan_list', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_pengadaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_DETAIL' => $row->ID_DETAIL,
		'NAMA_BARANG' => $row->NAMA_BARANG,
		'MERK_BARANG' => $row->MERK_BARANG,
		'JENIS_BARANG' => $row->JENIS_BARANG,
		'TIPE_BARANG' => $row->TIPE_BARANG,
		'JUMLAH_BARANG' => $row->JUMLAH_BARANG,
		'SATUAN' => $row->SATUAN,
		'KETERANGAN' => $row->KETERANGAN,
	    );
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/administrasiBarang/detail_pengadaan_read', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_detail_pengadaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_detail_pengadaan/create_action'),
	    'ID_DETAIL' => set_value('ID_DETAIL'),
	    'NAMA_BARANG' => set_value('NAMA_BARANG'),
	    'MERK_BARANG' => set_value('MERK_BARANG'),
	    'JENIS_BARANG' => set_value('JENIS_BARANG'),
	    'TIPE_BARANG' => set_value('TIPE_BARANG'),
	    'JUMLAH_BARANG' => set_value('JUMLAH_BARANG'),
	    'SATUAN' => set_value('SATUAN'),
	    'KETERANGAN' => set_value('KETERANGAN'),
	);
		$this->load->view('AdmindanUser/header', $data);
        $this->load->view('AdmindanUser/administrasiBarang/detail_pengadaan_form', $data);
        $this->load->view('AdmindanUser/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'MERK_BARANG' => $this->input->post('MERK_BARANG',TRUE),
		'JENIS_BARANG' => $this->input->post('JENIS_BARANG',TRUE),
		'TIPE_BARANG' => $this->input->post('TIPE_BARANG',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'SATUAN' => $this->input->post('SATUAN',TRUE),
		'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
	    );

            $this->Detail_pengadaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_detail_pengadaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pengadaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_detail_pengadaan/update_action'),
		'ID_DETAIL' => set_value('ID_DETAIL', $row->ID_DETAIL),
		'NAMA_BARANG' => set_value('NAMA_BARANG', $row->NAMA_BARANG),
		'MERK_BARANG' => set_value('MERK_BARANG', $row->MERK_BARANG),
		'JENIS_BARANG' => set_value('JENIS_BARANG', $row->JENIS_BARANG),
		'TIPE_BARANG' => set_value('TIPE_BARANG', $row->TIPE_BARANG),
		'JUMLAH_BARANG' => set_value('JUMLAH_BARANG', $row->JUMLAH_BARANG),
		'SATUAN' => set_value('SATUAN', $row->SATUAN),
		'KETERANGAN' => set_value('KETERANGAN', $row->KETERANGAN),
	    );
			$this->load->view('AdmindanUser/header', $data);
			$this->load->view('AdmindanUser/administrasiBarang/detail_pengadaan_form', $data);
			$this->load->view('AdmindanUser/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_detail_pengadaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_DETAIL', TRUE));
        } else {
            $data = array(
		'NAMA_BARANG' => $this->input->post('NAMA_BARANG',TRUE),
		'MERK_BARANG' => $this->input->post('MERK_BARANG',TRUE),
		'JENIS_BARANG' => $this->input->post('JENIS_BARANG',TRUE),
		'TIPE_BARANG' => $this->input->post('TIPE_BARANG',TRUE),
		'JUMLAH_BARANG' => $this->input->post('JUMLAH_BARANG',TRUE),
		'SATUAN' => $this->input->post('SATUAN',TRUE),
		'KETERANGAN' => $this->input->post('KETERANGAN',TRUE),
	    );

            $this->Detail_pengadaan_model->update($this->input->post('ID_DETAIL', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_detail_pengadaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pengadaan_model->get_by_id($id);

        if ($row) {
            $this->Detail_pengadaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_detail_pengadaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_detail_pengadaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_DETAIL', 'ID_DETAIL', 'trim|required');
	$this->form_validation->set_rules('NAMA_BARANG', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('MERK_BARANG', 'merk barang', 'trim|required');
	$this->form_validation->set_rules('JENIS_BARANG', 'jenis barang', 'trim|required');
	$this->form_validation->set_rules('TIPE_BARANG', 'tipe barang', 'trim|required');
	$this->form_validation->set_rules('JUMLAH_BARANG', 'jumlah barang', 'trim|required');
	$this->form_validation->set_rules('SATUAN', 'satuan', 'trim|required');
	$this->form_validation->set_rules('KETERANGAN', 'keterangan', 'trim|required');

	//$this->form_validation->set_rules('ID_DETAIL', 'ID_DETAIL', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_pengadaan.xls";
        $judul = "detail_pengadaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NAMA BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "MERK BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "JENIS BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "TIPE BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "JUMLAH BARANG");
	xlsWriteLabel($tablehead, $kolomhead++, "SATUAN");
	xlsWriteLabel($tablehead, $kolomhead++, "KETERANGAN");

	foreach ($this->Detail_pengadaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MERK_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JENIS_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TIPE_BARANG);
	    xlsWriteNumber($tablebody, $kolombody++, $data->JUMLAH_BARANG);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SATUAN);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KETERANGAN);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
