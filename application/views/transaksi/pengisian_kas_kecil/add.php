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
                    
                            <form class="form-horizontal" action="<?php echo site_url('transaksi/pengisian_kas_kecil_s');?>" method="post">
                        <fieldset>
                            <legend>Transaksi > Pengisian Kas Kecil  &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No Pengisian</label>
                                <div class="col-lg-10">
                                    <input type="text" name="no_pengisian" value="<?php echo $auto;?>" readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Tanggal</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tanggal_pengisian" required="" value="<?php echo date('Y-m-d');?>" id="datepicker" class="form-control"  placeholder="">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">No Permintaan</label>
                                <div class="col-lg-10">
                                    
                                    <select name="no_permintaan" class="form-control" id="permintaan" onchange="getKas()">
                                        <option>Pilih No Permintaan</option>
                                        <?php
                                        $ak=$this->db->query("select a.no_permintaan,a.jumlah_kaskecil from permintaan_kaskecil a left join detail_pengisian b on a.no_permintaan=b.no_permintaan where b.no_permintaan is null");
                                        foreach ($ak->result() as $ak){?>
                                        <option value="<?php echo $ak->no_permintaan;?>" jml="<?php echo $ak->jumlah_kaskecil;?>"><?php echo $ak->no_permintaan;?></option>
                                      <?php  }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Jumlah Kas Kecil</label>
                                <div class="col-lg-10">
                                    <input type="text" name="jml_kaskecil"  readonly="" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Saldo Awal</label>
                                <div class="col-lg-10">
                                    <input type="number" name="saldo_awal" id="saldo_awal" readonly=""  class="form-control"  placeholder="">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Saldo Akhir</label>
                                <div class="col-lg-10">
                                    <input type="number" name="saldo_akhir" id="saldo_akhir" readonly=""  class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Keterangan</label>
                                <div class="col-lg-10">
                                    <textarea name="keterangan" class="form-control"></textarea>
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

<script>
    /*$('#permintaan').live('change',function(){
       // $("input[name=alamat_importir]").val($('option:selected', this).attr('alamat_importir'));
       alert('tese');
    });*/
//    $('#permintaan').click(function(){
//        alert('ada');
//    });
    /*$('#permintaan').on('change',function(){
       $("input[name=jml_kaskecil]").val($('option:selected', this).attr('jml'));
       $("input[name=saldo_awal]").val($('option:selected', this).attr('jml'));
       $("input[name=saldo_akhir]").val('0');
       
    });*/
    
    function getKas(){
         var id=$("#permintaan").val();
         //alert(test);
         var saldo=parseInt($('#permintaan option:selected').attr('jml'));
         var jml_kas_kecil = $('#permintaan option:selected').attr('jml')
         
         //alert(saldo);
         //test.html("<option value=''> tunggu </option>");
         $.post("<?php echo site_url('transaksi/getkas');?>/"+id,
         {'id':id},
         function(data)
         {
            ///alert(data);
           //$(".test").html( data );
           
           var total = parseInt(saldo);
           var c= parseInt(data);
           var totaln= c+total;
           $("input[name=saldo_awal]").val(data);
            $("input[name=saldo_akhir]").val(totaln);
            $("input[name=jml_kaskecil]").val(jml_kas_kecil);
         });
     }
</script>