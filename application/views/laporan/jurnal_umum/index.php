<style>
    .col-lg-2{
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
                    
                            <form class="form-horizontal" action="<?php echo site_url('laporan/l_c_jurnal');?>" method="post">
                        <fieldset>
                            <legend>Laporan Jurnal Umum &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tgl1" id="datepicker" required="" class="form-control"  placeholder="">
                                    s/d <input type="text" name="tgl2" required="" id="datepicker2" class="form-control"  placeholder="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">&nbsp;</label>
                                <div class="col-lg-10">
                                     <button type="submit" class="btn btn-primary">Cetak</button>
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