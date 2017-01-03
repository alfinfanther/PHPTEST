<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
		$this->data["base"] = $this->config->item('base_url');	
                session_start();
    }
    function index(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/login');
                $this->load->view('theme/footer');
    }
    function cek(){
        $user = $this->input->post('username');
        $pass= $this->input->post('password');
        //echo $pass.''.$user;
        $cek= $this->db->query("select * from pengguna where kode_karyawan='$user' and password='$pass'");
      
      //  exit();
        
        if($cek->num_rows()  > 0){
            $_SESSION['kd_k'] = $user;
            
            $gt= $this->db->query("select a.*,b.kode_pengguna from karyawan a"
                    . " inner join pengguna b on b.kode_karyawan=a.kode_karyawan where a.kode_karyawan='$user'")->row();
            $_SESSION['jbt']= $gt->kode_jabatan;
            $_SESSION['kd_p'] = $gt->kode_pengguna;
            $_SESSION['name'] = $gt->nama_karyawan;
            //echo $gt->kode_jabatan;
           //exit();
            redirect('home');
        }else{
            $this->session->set_flashdata('message', 'cek username dan password');
            redirect('login');
        }
            
    }
    function logout(){
        session_destroy();
            redirect('login');
    }
}

