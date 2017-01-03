<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Laporan extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
		$this->data["base"] = $this->config->item('base_url');	
                session_start();
    }
    function l_pengisian_kas_kecil(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('laporan/pengisian_kas_kecil/index');
                $this->load->view('theme/footer');
    }
    function l_pengeluaran_kas_kecil(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('laporan/pengeluaran_kas_kecil/index');
                $this->load->view('theme/footer');
    }
    function l_j_umum(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('laporan/jurnal_umum/index');
                $this->load->view('theme/footer');
    }
    
    function l_c_pengisian(){
        ///$this->data['nop']= $id;
         //$this->load->vars($this->data);
		
                $this->load->view('laporan/pengisian_kas_kecil/cetak');
    }
    function l_c_pengeluaran(){
        ///$this->data['nop']= $id;
         //$this->load->vars($this->data);
		
                $this->load->view('laporan/pengeluaran_kas_kecil/cetak');
    }
     function l_c_jurnal(){
        ///$this->data['nop']= $id;
         //$this->load->vars($this->data);
		
                $this->load->view('laporan/jurnal_umum/cetak');
    }
    
}
