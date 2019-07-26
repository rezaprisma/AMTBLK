<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function excel()
        {
            $this->load->library("PHPExcel");
 
            //membuat objek
            $objPHPExcel = new PHPExcel();
 
            //Sheet yang akan diolah
            $objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'Hello')
						->setCellValue('B2', 'Ini')
						->setCellValue('C1', 'Excel')
						->setCellValue('D2', 'Pertamaku');
            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            //Nama File
            header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');

            //Download
            $objWriter->save("php://output");
 
        }
}
