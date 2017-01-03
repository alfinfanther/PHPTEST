<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mmaster extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function sel_dataakun(){
        $sel = $this->db->query("select * from data_akun");
        return $sel->result_array();
    }
    function data_akun_s($isi){
        $this->db->insert('data_akun',$isi);
    }
    function data_akun_d($id){
        $this->db->where('kode_akun',$id);
        $this->db->delete('data_akun');
    }
    function data_akun_sel($id){
         $sel = $this->db->query("select * from data_akun where kode_akun='$id'");
        return $sel->result_array();
    }
    function data_akun_u($id,$isi){
        $this->db->where('kode_akun',$id);
        $this->db->update('data_akun',$isi);
    }
    // jabatan
    function sel_jabatan(){
        $sel = $this->db->query("select * from data_jabatan");
        return $sel->result_array();
    }
    function jabatan_s($isi){
        $this->db->insert('data_jabatan',$isi);
    }
    function jabatan_d($id){
        $this->db->where('kode_jabatan',$id);
        $this->db->delete('data_jabatan');
    }
    function jabatan_e_sel($id){
         $sel = $this->db->query("select * from data_jabatan where kode_jabatan='$id'");
        return $sel->result_array();
    }
    function jabatan_u($id,$isi){
        $this->db->where('kode_jabatan',$id);
        $this->db->update('data_jabatan',$isi);
    }
    // karyawan
    function sel_karyawan(){
        $sel = $this->db->query("select * from karyawan a inner join data_jabatan b on a.kode_jabatan=b.kode_jabatan");
        return $sel->result_array();
    }
    function karyawan_s($isi){
        $this->db->insert('karyawan',$isi);
    }
    function karyawan_d($id){
        $this->db->where('kode_karyawan',$id);
        $this->db->delete('karyawan');
    }
    function karyawan_e($id){
        $sel = $this->db->query("select * from karyawan where kode_karyawan='$id'");
        return $sel->result_array();
    }
    function karyawan_u($id,$isi){
         $this->db->where('kode_karyawan',$id);
        $this->db->update('karyawan',$isi);
    }
    
    // pengguna
    function pengguna_s($isi){
        $this->db->insert('pengguna',$isi);
    }
    function pengguna_sel(){
       $sel = $this->db->query("select * from pengguna a inner join karyawan b on a.kode_karyawan=b.kode_karyawan");
        return $sel->result_array();
    }
    function pengguna_d($id){
         $this->db->where('kode_pengguna',$id);
        $this->db->delete('pengguna');
    }
    function pengguna_e_sel($id){
        $sel = $this->db->query("select * from pengguna where kode_pengguna='$id'");
        return $sel->result_array();
    }
}

