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
                    
                            <form class="form-horizontal" action="<?php echo site_url('transaksi/cp_kas_kecil_s');?>" method="post" >
                        <fieldset>
                            <legend>Transaksi > Cetak Permintaan Kas Kecil  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No Permintaan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="no_permintaan" value="<?php echo $auto;?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal</label>
                                <div class="col-lg-10">
                                    <input type="text" value="<?php echo date('Y-m-d');?>" name="tangal_permintaan" id="datepicker" class="form-control" required=""  placeholder="">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jumlah Kas Kecil</label>
                                <div class="col-lg-10">
                                    <input type="number" name="jumlah_kaskecil" required=""  class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Keterangan</label>
                                <div class="col-lg-10">
                                    <textarea name="keterangan" required="" class="form-control"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="kode_pengguna">
                            
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