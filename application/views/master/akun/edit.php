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
                    
                            <form class="form-horizontal" action="<?php echo site_url('home/data_akun_u');?>" method="post">
                        <fieldset>
                            <legend>Master Data > Entri Data Akun  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            <?php        foreach ($edit as $edit){
                                ?>
                           
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Kode Akun</label>
                                <div class="col-lg-10">
                                    <input type="number" name="kode_akun" value="<?php echo $edit['kode_akun'];?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Nama Akun</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama_akun" value="<?php echo $edit['nama_akun'];?>" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Posisi</label>
                                <div class="col-lg-10">
                                    <select name="posisi">
                                        <option <?php if($edit['kode_akun']=="Debit"){echo "selected";}?>>Debit</option>
                                        <option <?php if($edit['kode_akun']=="Kredit"){echo "selected";}?>>Kredit</option>
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