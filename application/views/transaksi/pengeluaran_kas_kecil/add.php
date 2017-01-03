<style>
    .col-lg-2{
        width: 400px;
    }
     .col-lg-3{
        width: 200px;
    }
    .col-lg-10{
        width: 300px;
    }
    
</style>
<div class="col-lg-4" style="width: 100%;" >
               <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                    
                            <form class="form-horizontal" action="<?php echo site_url('transaksi/pengeluaran_kas_kecil_s');?>" method="post">
                        <fieldset>
                            <legend>Transaksi > Pengeluaran Kas Kecil  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No Pengeluaran</label>
                                <div class="col-lg-10">
                                    <input type="text" name="no_pengeluaran" value="<?php echo $auto;?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tanggal_pengeluaran" value="<?php echo date('Y-m-d');?>" required="" id="datepicker" class="form-control"  placeholder="">
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jumlah Pengeluaran</label>
                                <div class="col-lg-10">
                                    <input type="number" name="jumlah_pengeluaran" required=""  class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No Nota/Kwitansi</label>
                                <div class="col-lg-10">
                                    <input type="text" name="no_nota/kwitansi" readonly=""   class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Karyawan</label>
                                <div class="col-lg-10">
                                    <select name="kode_karyawan">
                                        <option>-- Pilih --</option>
                                        <?php
                                        $kry=$this->db->query("select * from karyawan");
                                        foreach ($kry->result() as $kry){
                                        ?>
                                        <option value="<?php echo $kry->kode_karyawan;?>"><?php echo $kry->nama_karyawan;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Keterangan Keperluan</label>
                                <div class="col-lg-10">
                                    <textarea name="keterangan_keperluan" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            
                            
                        </fieldset>
                                <fieldset style="width: 100%; padding: 10px; margin-bottom: 30px; border: 1px solid #70ad19;">
                                    <h2>Jurnal</h2>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">NO Jurnal</label>
                                <div class="col-lg-10">
                                    <input type="text" name="no_jurnal" value="<?php echo $auto2;?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                                    <div class="form-group" >
                                <label for="inputEmail" class="col-lg-3 control-label">Kode Akun Debit</label>
                                <div class="col-lg-10" style="width: 800px;">
                                    <select name="kode_akun_d">
                                        <option>Pilih Akun</option>
                                        <?php 
                                        $dbt=$this->db->query("select * from data_akun where posisi='Debit'");
                                        foreach ($dbt->result() as $dbt){
                                        ?>
                                        <option value="<?php echo $dbt->kode_akun;?>"><?php echo $dbt->nama_akun;?></option>
                                        <?php } ?>
                                    </select>
                                    
                                    &nbsp; Kode Akun Kredit 
                                    <select name="kode_akun_k">
                                        <option>Pilih Akun</option>
                                        <?php 
                                        $dbt2=$this->db->query("select * from data_akun where posisi='Kredit'");
                                        foreach ($dbt2->result() as $dbt){
                                        ?>
                                        <option value="<?php echo $dbt->kode_akun;?>"><?php echo $dbt->nama_akun;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">&nbsp;</label>
                                <div class="col-lg-10">
                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-default" onclick="history.back()">Batal</button>
                                </div>
                            </div>
                                </fieldset>
                    </form>
                            <legend>&nbsp;</legend>
                            * Data ini harus diisi<br>
                            
                            
                </div>
                    </div>
                </div>
</div>