<div>
                    <fieldset>
                            <legend>Transaksi > Pengisian Kas Kecil &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('transaksi/pengisian_kas_kecil_t');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>Nomor Pengisian</th>
                        <th>Tanggal </th>
                        <th>Jumlah Kas Kecil </th>
                        <th>Saldo Awal</th>
                        
                        <th>Saldo Akhir</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pgs=$this->db->query("select * from detail_pengisian order by id_detail desc");
                    foreach ($pgs->result() as $pgs){?>
                    <tr>
                        <td><?php echo $pgs->no_pengisian;?></td>
                        <td><?php echo $pgs->tanggal_detail;?></td>
                         <td><?php 
                         //$pgs->jumlah_kaskecil
                         echo $pgs->saldo_akhir - $pgs->saldo_awal;?></td>
                        <td><?php echo $pgs->saldo_awal;?></td>
                       
                        <td><?php echo $pgs->saldo_akhir;?></td>
                        <td><?php echo $pgs->keterangan;?></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

