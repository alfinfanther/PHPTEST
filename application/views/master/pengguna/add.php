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
                    
                            <form class="form-horizontal" action="<?php echo site_url('home/pengguna_s');?>" method="post">
                        <fieldset>
                            <legend>Master Data > Entri Data Pengguna  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Kode Pengguna</label>
                                <div class="col-lg-10">
                                    <input type="text" name="kode_pengguna" value="<?php echo $auto;?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Nama Karyawan</label>
                                <div class="col-lg-10">
                                    <select name="kode_karyawan">
                                        <option>-- Pilih --</option>
                                        <?php
                                                foreach ($kry as $kry){
                                                    ?>
                                                
                                        <option value="<?php echo $kry['kode_karyawan'];?>"><?php echo $kry['nama_karyawan'];?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                            </div>
<!--                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Nama Karyawan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="kode_akun" class="form-control"  placeholder="">
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" required=""  name="password" class="form-control"  placeholder="">
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