<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	 {
	  parent::__construct();
	 }
	 public function login()
	 {
	  $validasi = "
		<script>
			jQuery(document).ready(function(){
				jQuery(\"#login_form1\").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: \"POST\",
						url: \"login.php\",
						data: formData,
						success: function(html){
						if(html=='true_admin')
						{
						$.jGrowl(\"Loading File Please Wait......\", { sticky: true });
						$.jGrowl(\"Welcome to Aplikasi Monitoring Tugas Bgaian Layanan Khusus dan Manajemen Barang Habis Pakai (A.M.T.B.L.K)\", { header: 'Access Granted' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'admin/dashboard.php'  }, delay);  
						}else if (html == 'true'){
						$.jGrowl(\"Welcome to Aplikasi Monitoring Tugas Bgaian Layanan Khusus dan Manajemen Barang Habis Pakai (A.M.T.B.L.K)\", { header: 'Access Granted' });
						var delay = 1000;
						setTimeout(function(){ window.location = 'technical Staff/dashboard_client.php'  }, delay);  
						}else
						{
						$.jGrowl(\"Please Check your username and Password\", { header: 'Login Failed' });
						}
						}
					});
					return false;
				});
			});
		</script>
	";
	if $data
	 }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
}