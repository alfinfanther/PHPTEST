<div>
                    <fieldset>
                            <legend>Transaksi > Pengeluaran Kas Kecil &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('transaksi/pengeluaran_kas_kecil_t');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>Nomor Pengeluaran</th>
                        <th>Karyawan</th>
                        <th>Tanggal </th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Keterangan Keperluan </th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pn=$this->db->query("select * from pengeluaran_kaskecil a inner join detail_pengeluaran b on b.no_pengeluaran=a.no_pengeluaran"
                            . " inner join karyawan c on b.kode_karyawan=c.kode_karyawan");
                    foreach ($pn->result() as $pn){
                    ?>
                    <tr>
                        <td><?php echo $pn->no_pengeluaran;?></td>
                        <td><?php echo $pn->nama_karyawan;?></td>
                        <td><?php echo $pn->tanggal_pengeluaran;?></td>
                        <td><?php echo $pn->jumlah_pengeluaran;?></td>
                        <td><?php echo $pn->keterangan_keperluan;?></td>
                       
                        
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

