<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mtransaksi extends CI_Model{
    function __construct() {
        parent::__construct();
        
    }
    function index(){
        
    }
    function cp_kas_kecil_s($isi){
        $this->db->insert('permintaan_kaskecil',$isi);
    }
    function cp_kas_kecil_sel(){
        $sel = $this->db->query("SELECT a.*,b.*,c.nama_karyawan FROM permintaan_kaskecil a inner join pengguna b on a.kode_pengguna=b.kode_pengguna INNER join karyawan c on b.kode_karyawan=c.kode_karyawan ");
        return $sel->result_array();
    }
    
    // pengisian kas kecil
    function pengisian_kaskecil($isi1){
        $this->db->insert('pengisian_kecil',$isi1);
    }
    function detail_pengisian($isi2){
        $this->db->insert('detail_pengisian',$isi2);
    }
    //pengeluaran khas kecil
    function pengeluaran_kaskecil($isi1){
         $this->db->insert('pengeluaran_kaskecil',$isi1);
    }
    function detail_pengeluaran($isi2){
        $this->db->insert('detail_pengeluaran',$isi2);
    }
}