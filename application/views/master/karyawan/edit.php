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
                    
                            <form class="form-horizontal" action="<?php echo site_url('home/karyawan_u');?>" method="post">
                        <fieldset>
                            <legend>Master Data > Entri Data Karyawan  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            <?php        foreach ($edit as $edit){?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Kode Karyawan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="kode_karyawan" value="<?php echo $edit['kode_karyawan'];?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Nama Karyawan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama_karyawan" value="<?php echo $edit['nama_karyawan'];?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tempat Lahir</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tempat_lahir" value="<?php echo $edit['tempat_lahir'];?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tgl_lahir" id="datepicker" value="<?php echo $edit['tgl_lahir'];?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jenis Kelamin</label>
                                <div class="col-lg-10">
                                    <select name="jenis_kelamin">
                                        <option value="L" <?php if($edit['jenis_kelamin'] =="L"){echo "selected";}?>>Laki-Laki</option>
                                        <option value="P" <?php if($edit['jenis_kelamin'] =="P"){echo "selected";}?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" class="form-control"><?php echo $edit['alamat']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No HP</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nomor_hp" value="<?php echo $edit['nomor_hp'];?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Agama</label>
                                <div class="col-lg-10">
                                    <select name="agama">
                                        <option >Pilih Agama</option>
                                        <option <?php if($edit['agama'] =="Islam"){echo "selected";}?>>Islam</option>
                                        <option <?php if($edit['agama'] =="Kristen"){echo "selected";}?>>Kristen</option>
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
                                        <option value="<?php echo $jbt['kode_jabatan'];?>" <?php if($edit['kode_jabatan'] ==$jbt['kode_jabatan']){echo "selected";}?>><?php echo $jbt['nama_jabatan'];?></option>
                                        
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
                            <?php } ?>
                            
                        </fieldset>
                    </form>
                            <legend>&nbsp;</legend>
                            * Data ini harus diisi<br>
                            
                            
                </div>
                    </div>
                </div>
</div>