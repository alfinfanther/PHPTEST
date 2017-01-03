<style>
    .col-lg-2{
        width: 400px;
    }
    .col-lg-10{
        width: 300px;
    }
    
</style>
<div class="col-lg-4" style="width: 100%;" >
               <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                    
                            <form class="form-horizontal" action="<?php echo site_url('home/karyawan_s');?>" method="post">
                        <fieldset>
                            <legend>Master Data > Entri Data Jabatan  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Kode Karyawan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="kode_karyawan" value="<?php echo $auto;?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Nama Karyawan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama_karyawan" required="" class="form-control"  placeholder="">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tempat Lahir</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tempat_lahir" required="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tgl_lahir" id="datepicker" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jenis Kelamin</label>
                                <div class="col-lg-10">
                                    <select name="jenis_kelamin">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No HP</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nomor_hp" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Agama</label>
                                <div class="col-lg-10">
                                    <select name="agama">
                                        <option>Pilih Agama</option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jabatan</label>
                                <div class="col-lg-10">
                                    <select name="kode_jabatan">
                                        <option>Pilih Jabatan</option>
                                        <?php
                                                foreach ($jabatan as $jbt){
                                        ?>
                                        <option value="<?php echo $jbt['kode_jabatan'];?>"><?php echo $jbt['nama_jabatan'];?></option>
                                        
                                                <?php } ?>
                                    </select>
                                </div>
                            </div>
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