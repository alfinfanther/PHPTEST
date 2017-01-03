<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Transaksi extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
		$this->data["base"] = $this->config->item('base_url');	
		$this->load->model('Mmaster');
                $this->load->model('Mtransaksi');
//                $this->load->model('Mberkasmasuk');
				 session_start();
//                                if(isset($_SESSION['username'])=='' and isset($_SESSION['level'])=='') {
//                                    redirect('login');
//                                 }
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
    //
    function cp_kas_kecil(){
        $this->data['sel']= $this->Mtransaksi->cp_kas_kecil_sel();
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/cp_kas_kecil/index');
                $this->load->view('theme/footer');
    }
    function cp_kas_kecil_t(){
        $xm= $this->db->query("select * from permintaan_kaskecil order by no_permintaan desc limit 1")->row();
        if(!empty($xm->no_permintaan)){
            $no= $xm->no_permintaan;
        }else {
            $no="PKKJA000";
        }
        $this->data['auto']= $this->autonumber($no, 5, 3);
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/cp_kas_kecil/add');
                $this->load->view('theme/footer');
    }
    function cp_kas_kecil_s(){
        $isi = array(
          'no_permintaan'  => $this->input->post('no_permintaan'),
            'tanggal_permintaan'=> $this->input->post('tangal_permintaan'),
            'jumlah_kaskecil'=> $this->input->post('jumlah_kaskecil'),
            'keterangan'=> $this->input->post('keterangan'),
            'kode_pengguna'=> $_SESSION['kd_p']
        );
        $this->Mtransaksi->cp_kas_kecil_s($isi);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('transaksi/cp_kas_kecil');
    }
    
    
    // pengisian kas kecil
    function pengisian_kas_kecil(){
        
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/pengisian_kas_kecil/index');
                $this->load->view('theme/footer');
    }
    
    function getkas(){
        $cm= $_POST['id'];
        $sh=  $this->db->query("select * from detail_pengisian order by id_detail desc limit 1")->row();
        if(!empty($sh->saldo_akhir)){
            $kas = $sh->saldo_akhir;
        }else {
            $kas = "0";
        }
        echo $kas;
        
        
    }
            function pengisian_kas_kecil_t(){
        $xm= $this->db->query("select * from pengisian_kecil order by no_pengisian desc limit 1")->row();
        if(!empty($xm->no_pengisian)){
            $no= $xm->no_pengisian;
        }else {
            $no="PGS".date('my')."0000";
        }
        //$this->data['auto']= $this->autonumber($no, 7, 4);
        $k =$this->autonumber($no, 7, 4);
        $a1= substr($k, 0,3);
        $a2= substr($k, 7,4);
        $a3= $a1.date('my').$a2;
        $this->data['auto']= $a3;
        
        $noj=  $this->db->query("select * from detail_pengisian order by no_jurnal desc limit 1")->row();
        if(!empty($noj->no_jurnal)){
            $no2= $noj->no_jurnal;
        }else {
            $no2="JUI".date('my')."000";
        }
        
        $k =$this->autonumber($no2, 7, 3);
        $aa1= substr($k, 0,3);
        $aa2= substr($k, 7,3);
        $aa3= $aa1.date('my').$aa2;
        $this->data['auto2']= $aa3;
        
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/pengisian_kas_kecil/add');
                $this->load->view('theme/footer');
    }
    function pengisian_kas_kecil_s(){
        $isi1=array('no_pengisian'=> $this->input->post('no_pengisian'),
            'tanggal_pengisian'=> $this->input->post('tanggal_pengisian'),
            'kode_pengguna'=> $_SESSION['kd_p']);
        
        $isi2=array(
            'no_pengisian'=> $this->input->post('no_pengisian'),
            'saldo_awal'=> $this->input->post('saldo_awal'),
            'no_permintaan'=> $this->input->post('no_permintaan'),
            'keterangan'=> $this->input->post('keterangan'),
            'saldo_akhir'=> $this->input->post('saldo_akhir'),
            'no_jurnal'=> $this->input->post('no_jurnal'),
            'kode_akun_d'=> $this->input->post('kode_akun_d'),
            'kode_akun_k'=> $this->input->post('kode_akun_k'),
            'tanggal_detail'=> $this->input->post('tanggal_pengisian')
                
        );
        
        $this->Mtransaksi->pengisian_kaskecil($isi1);
        $this->Mtransaksi->detail_pengisian($isi2);
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('transaksi/pengisian_kas_kecil');
    }
    
    //pengeluaran kas kecil
    function pengeluaran_kas_kecil(){
        
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/pengeluaran_kas_kecil/index');
                $this->load->view('theme/footer');
    }
    function pengeluaran_kas_kecil_t(){
        $xm= $this->db->query("select * from  pengeluaran_kaskecil order by no_pengeluaran desc limit 1")->row();
        if(!empty($xm->no_pengeluaran)){
            $no= $xm->no_pengeluaran;
        }else {
            $no="PGL".date('my')."0000";
        }
         $k =$this->autonumber($no, 7, 4);
        $a1= substr($k, 0,3);
        $a2= substr($k, 7,4);
        $a3= $a1.date('my').$a2;
        $this->data['auto']= $a3;
        
        $noj=  $this->db->query("select * from detail_pengeluaran order by no_jurnal desc limit 1")->row();
        if(!empty($noj->no_jurnal)){
            $no2= $noj->no_jurnal;
        }else {
            $no2="JUP".date('my')."000";
        }
        
        $k2 =$this->autonumber($no2, 7, 3);
        $aa1= substr($k2, 0,3);
        $aa2= substr($k2, 7,3);
        $aa3= $aa1.date('my').$aa2;
        $this->data['auto2']= $aa3;
        
        $this->load->vars($this->data);
		$this->load->view('theme/head');
                //$this->load->view('theme/menu');
                $this->load->view('theme/menu');
                $this->load->view('transaksi/pengeluaran_kas_kecil/add');
                $this->load->view('theme/footer');
    }
    function pengeluaran_kas_kecil_s(){
        $tanggal=$this->input->post('tanggal_pengeluaran');
        $pkeluar = $this->input->post('jumlah_pengeluaran');
        $kddebit =$this->input->post('kode_akun_d');
        $kdkredit = $this->input->post('kode_akun_k');
        $keterangan = $this->input->post('keterangan_keperluan');
        $no_jurnal=$this->input->post('no_jurnal');
                
        $isi1=array('no_pengeluaran'=> $this->input->post('no_pengeluaran'),
            'tanggal_pengeluaran'=> $this->input->post('tanggal_pengeluaran'),
            'kode_pengguna'=> $_SESSION['kd_p']);
        
        $isi2=array(
            'no_pengeluaran'=> $this->input->post('no_pengeluaran'),
            'no_nota/kwitansi'=> $this->input->post('no_nota/kwitansi'),
            'jumlah_pengeluaran'=> $this->input->post('jumlah_pengeluaran'),
            'keterangan_keperluan'=> $this->input->post('keterangan_keperluan'),
            'kode_karyawan'=> $this->input->post('kode_karyawan'),
            'no_jurnal'=> $this->input->post('no_jurnal'),
            'kode_akun_d'=> $this->input->post('kode_akun_d'),
            'kode_akun_k'=> $this->input->post('kode_akun_k')
        );
        
        
         $this->Mtransaksi->pengeluaran_kaskecil($isi1);
        $this->Mtransaksi->detail_pengeluaran($isi2);
        
        $ck = $this->db->query("select * from detail_pengisian order by id_detail desc limit 1")->row();
        if(!empty($ck->saldo_akhir)){
            //$nop= $ck->no_pengisian;
            $sisa = $ck->saldo_akhir - $pkeluar;
            $nk= $this->db->query("insert into detail_pengisian(no_jurnal,no_permintaan,no_pengisian,saldo_awal,saldo_akhir,kode_akun_d,kode_akun_k,tanggal_detail,keterangan) "
                    . "values('$no_jurnal','$ck->no_permintaan','".$ck->no_pengisian."','$ck->saldo_akhir','$sisa','$kddebit','$kdkredit','$tanggal','$keterangan') ");
            
            //$nk= $this->db->query("update  detail_pengisian set saldo_awal='$ck->saldo_akhir', saldo_akhir='$sisa' where id_detail='$ck->id_detail'");
        }
        
        $this->session->set_flashdata('message', 'berhasil disimpan');
        redirect('transaksi/pengeluaran_kas_kecil');
    }
    
    function cetak_permintaan($id){
        $this->data['nop']= $id;
         $this->load->vars($this->data);
		
                $this->load->view('transaksi/cp_kas_kecil/cetak');
                
    }
}