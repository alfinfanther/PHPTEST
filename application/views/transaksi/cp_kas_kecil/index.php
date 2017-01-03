<div>
                    <fieldset>
                            <legend>Transaksi > Cetak Permintaan Kas Kecil &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('transaksi/cp_kas_kecil_t');?>'">Tambah Data</button>
                    </p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>Nomor Permintaan</th>
                        <th>Tanggal </th>
                        <th>Keterangan</th>
                        <th>Jumlah Kas Kecil </th>
                        <th>Pengguna</th>
                        <th>Cetak</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach ($sel as $sel){?>
                    <tr>
                        <td><?php echo $sel['no_permintaan'];?></td>
                        <td><?php echo $sel['tanggal_permintaan'];?></td>
                        <td><?php echo $sel['keterangan'];?></td>
                        <td><?php echo $sel['jumlah_kaskecil'];?></td>
                        <td><?php echo $sel['nama_karyawan'];?></td>
                        <td><a href="<?php echo site_url('transaksi/cetak_permintaan/'.$sel['no_permintaan']);?>">Cetak</a></td>
                    </tr>
                            <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

