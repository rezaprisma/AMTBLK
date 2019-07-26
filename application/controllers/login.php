<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->helper('form');
    }
 
    function index()
    {
         if($this->ion_auth->logged_in())
         {
             //sudah login, redirect ke halaman welcome
             redirect('login/admin','refresh'); //tapi mungkin perlu menggunakan load->view untuk menambahkan link logout di index
         }
 
         if (isset($_POST['submit']))
         {
 
             if($this->ion_auth->login($this->input->post('username'),$this->input->post('password')))
             {
                 //jika login sukses, redirect ke halaman admin
                $pesan = $this->ion_auth->messages();
 
               redirect('login/admin','refresh');
 
             }
             else
             {
                //jika login gagal, redirect kembali ke halaman login
 
                //redirect('login','refresh'); //use redirect instead of loading views compatibility with MY_Controller libraries
                echo 'login gagal '.$this->ion_auth->errors();
             }
         }
         else
         {
             //user tidak login, tampilkan halaman login
 
             $this->load->view('login');
 
         }
    }
 
function admin()
{
    if ($this->ion_auth->logged_in() )
    {
 
    $this->load->view('admin');
    }
    else
    {
        $this->index();
    }
}
 
    function logout()
    {
         $this->data['title'] = "Logout";
         //log the user out
         $logout = $this->ion_auth->logout();
         //redirect ke halaman sebelumnya
         redirect('login','refresh');
    }
 
}
?>