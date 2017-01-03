<div>
                    <fieldset>
                            <legend>Master Data > Entri Data Pengguna &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('home/pengguna_t');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        
                        <th>Kode Pengguna</th>
                        <th>Nama Karyawan</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach ($pg as $pg){
                    ?>
                    <tr>
                        <td><?php echo $pg['kode_pengguna'];?></td>
                        <td><?php echo $pg['nama_karyawan'];?></td>
                        <td>
                            <a href="<?php echo site_url('home/pengguna_d/'.$pg['kode_pengguna']);?>" onClick="return confirm('Anda yakin akan menghapus data ini .. ?')">
                             <span class="glyphicon glyphicon-remove"></span> Delete 
                           
                           &nbsp;<a href="<?php echo site_url('home/pengguna_e/'.$pg['kode_pengguna']);?>"><span class="glyphicon glyphicon-ok"></span> Edit </a>
                        </td>
                    </tr>
                            <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

