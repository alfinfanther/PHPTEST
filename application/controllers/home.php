<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
		$this->data["base"] = $this->config->item('base_url');	
		$this->load->model('Mmaster');
//                $this->load->model('Mberkasmasuk');
				 session_start();
                                if(isset($_SESSION['kd_k'])=='' and isset($_SESSION['jbt'])=='') {
                                    redirect('login');
                                 }
    }
    function index(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('theme/home');
                $this->load->view('theme/footer');
    }
    //auto number
    function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
 
        // mengambil nilai kode ex: KNS0015 hasil KNS
        $kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);

        // menggabungkan kode dengan nilai angka baru
        $id_baru = $kode.$angka_baru;

        return $id_baru;
    }
    function data_akun(){
        $this->data['akun']= $this->Mmaster->sel_dataakun();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/akun/index');
                $this->load->view('theme/footer');
    }
    function data_akun_t(){
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/akun/add');
                $this->load->view('theme/footer');
    }
    function data_akun_s(){
        $isi =array('kode_akun'=> $this->input->post('kode_akun'),
            'nama_akun'=> $this->input->post('nama_akun'),
            'posisi'=> $this->input->post('posisi'));
        $this->Mmaster->data_akun_s($isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/data_akun');
    }
    function data_akun_d($id){
        
        $this->Mmaster->data_akun_d($id);
        $this->session->set_flashdata('message', 'berhasil dihapus');
        redirect('home/data_akun');
    }
    function data_akun_e($id){
        $this->data['edit']= $this->Mmaster->data_akun_sel($id);
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/akun/edit');
                $this->load->view('theme/footer');
    }
    function data_akun_u(){
        $id=$this->input->post('kode_akun');
        $isi =array(
            'nama_akun'=> $this->input->post('nama_akun'),
            'posisi'=> $this->input->post('posisi'));
        $this->Mmaster->data_akun_u($id,$isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/data_akun');
    }
    //jabatan
    function jabatan(){
        $this->data['jabatan']= $this->Mmaster->sel_jabatan();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/jabatan/index');
                $this->load->view('theme/footer');
    }
    function jabatan_t(){
        $xm= $this->db->query("select * from data_jabatan order by kode_jabatan desc limit 1")->row();
        if(!empty($xm->kode_jabatan)){
            $no= $xm->kode_jabatan;
        }else {
            $no="JBT000";
        }
        $this->data['auto']= $this->autonumber($no, 3, 3);
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/jabatan/add');
                $this->load->view('theme/footer');
    }
    function jabatan_s(){
        $isi =array('kode_jabatan'=> $this->input->post('kode_jabatan'),
            'nama_jabatan'=> $this->input->post('nama_jabatan'));
        $this->Mmaster->jabatan_s($isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/jabatan');
    }
    function jabatan_d($id){
        
        $this->Mmaster->jabatan_d($id);
        $this->session->set_flashdata('message', 'berhasil dihapus');
        redirect('home/jabatan');
    }
    function jabatan_e($id){
        $this->data['edit']= $this->Mmaster->jabatan_e_sel($id);
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/jabatan/edit');
                $this->load->view('theme/footer');
    }
    function jabatan_u(){
        $id=$this->input->post('kode_jabatan');
        $isi =array(
            'nama_jabatan'=> $this->input->post('nama_jabatan'));
        $this->Mmaster->jabatan_u($id,$isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/jabatan');
    }
    //karyawan
    function karyawan(){
        $this->data['kry']= $this->Mmaster->sel_karyawan();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/karyawan/index');
                $this->load->view('theme/footer');
    }
    function karyawan_t(){
        $xm= $this->db->query("select * from karyawan order by kode_karyawan desc limit 1")->row();
        if(!empty($xm->kode_karyawan)){
            $no= $xm->kode_karyawan;
        }else {
            $no="KRY000";
        }
        $this->data['auto']= $this->autonumber($no, 3, 3);
        $this->data['jabatan']= $this->Mmaster->sel_jabatan();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/karyawan/add');
                $this->load->view('theme/footer');
    }
    function karyawan_s(){
        $isi =array('kode_karyawan'=> $this->input->post('kode_karyawan'),
            'nama_karyawan'=> $this->input->post('nama_karyawan'),
            'tempat_lahir'=> $this->input->post('tempat_lahir'),
            'tgl_lahir'=> $this->input->post('tgl_lahir'),
            'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
            'alamat'=> $this->input->post('alamat'),
            'nomor_hp'=> $this->input->post('nomor_hp'),
            'agama'=> $this->input->post('agama'),
            'kode_jabatan'=> $this->input->post('kode_jabatan'));
        $this->Mmaster->karyawan_s($isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/karyawan');
    }
    function karyawan_d($id){
        
        $this->Mmaster->karyawan_d($id);
        $this->session->set_flashdata('message', 'berhasil dihapus');
        redirect('home/karyawan');
    }
    function karyawan_e($id){
        $this->data['edit']= $this->Mmaster->karyawan_e($id);
        $this->data['jabatan']= $this->Mmaster->sel_jabatan();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/karyawan/edit');
                $this->load->view('theme/footer');
    }
    function karyawan_u(){
        $id=$this->input->post('kode_karyawan');
        $isi =array(
            'nama_karyawan'=> $this->input->post('nama_karyawan'),
            'tempat_lahir'=> $this->input->post('tempat_lahir'),
            'tgl_lahir'=> $this->input->post('tgl_lahir'),
            'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
            'alamat'=> $this->input->post('alamat'),
            'nomor_hp'=> $this->input->post('nomor_hp'),
            'agama'=> $this->input->post('agama'),
            'kode_jabatan'=> $this->input->post('kode_jabatan'));
        $this->Mmaster->karyawan_u($id,$isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/karyawan');
    }
    // pengguna
    function pengguna(){
        $this->data['kry']= $this->Mmaster->sel_karyawan();
        $this->data['pg']= $this->Mmaster->pengguna_sel();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/pengguna/index');
                $this->load->view('theme/footer');
    }
    function pengguna_t(){
        $xm= $this->db->query("select * from pengguna order by kode_pengguna desc limit 1")->row();
        if(!empty($xm->kode_pengguna)){
            $no= $xm->kode_pengguna;
        }else {
            $no="PGN00";
        }
        $this->data['auto']= $this->autonumber($no, 3, 2);
        $this->data['kry']= $this->Mmaster->sel_karyawan();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/pengguna/add');
                $this->load->view('theme/footer');
    }
    function pengguna_s(){
        
        $isi =array(
            'kode_pengguna'=> $this->input->post('kode_pengguna'),
            'kode_karyawan'=> $this->input->post('kode_karyawan'),
            'password'=> $this->input->post('password'));
        $this->Mmaster->pengguna_s($isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('home/pengguna');
    }
    function pengguna_d($id){
        
        $this->Mmaster->pengguna_d($id);
        $this->session->set_flashdata('message', 'berhasil dihapus');
        redirect('home/pengguna');
    }
    function pengguna_e($id){
        $this->data['kry']= $this->Mmaster->sel_karyawan();
        $this->data['edit']= $this->Mmaster->pengguna_e_sel($id);
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('master/pengguna/edit');
                $this->load->view('theme/footer');
    }
    
    
    
    
}

