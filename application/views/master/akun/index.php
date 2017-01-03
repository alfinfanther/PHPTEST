<div>
                    <fieldset>
                            <legend>Master Data > Entri Data Akun &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('home/data_akun_t');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        
                        <th>Posisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($akun as $akun){?>
                    <tr>
                        <td><?php echo $akun['kode_akun'];?></td>
                        <td><?php echo $akun['nama_akun'];?></td>
                        <td><?php echo $akun['posisi'];?></td>
                        <td>
                            <a href="<?php echo site_url('home/data_akun_d/'.$akun['kode_akun']);?>" onClick="return confirm('Anda yakin akan menghapus data ini .. ?')">
                             <span class="glyphicon glyphicon-remove"></span> Delete 
                           
                           &nbsp;<a href="<?php echo site_url('home/data_akun_e/'.$akun['kode_akun']);?>"><span class="glyphicon glyphicon-ok"></span> Edit </a>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

