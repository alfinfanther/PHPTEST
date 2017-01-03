<div>
                    <fieldset>
                            <legend>Master Data > Entri Data Jabatan &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('home/jabatan_t');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>Kode Jabatan</th>
                        <th>Nama Jabatan</th>
                        
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($jabatan as $jabatan){?>
                    <tr>
                        <td><?php echo $jabatan['kode_jabatan'];?></td>
                        <td><?php echo $jabatan['nama_jabatan'];?></td>
                        
                        <td>
                            <a href="<?php echo site_url('home/jabatan_d/'.$jabatan['kode_jabatan']);?>" onClick="return confirm('Anda yakin akan menghapus data ini .. ?')">
                             <span class="glyphicon glyphicon-remove"></span> Delete 
                           
                           &nbsp;<a href="<?php echo site_url('home/jabatan_e/'.$jabatan['kode_jabatan']);?>"><span class="glyphicon glyphicon-ok"></span> Edit </a>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                </fieldset>
                </div>

