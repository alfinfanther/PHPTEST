<html>
    <head>
        
        <style type="text/css">
            html{
    background-color: #f3f3f3;
}

.form-basic{
    max-width: 840px;
    margin: 0 auto;
    padding: 55px;
    box-sizing: border-box;

    background-color:  #ffffff;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);

    font: bold 14px sans-serif;
    text-align: center;
}

.form-basic .form-row{
    text-align: left;
    margin-bottom: 22px;
}

.form-basic .form-title-row{
    text-align: center;
    margin-bottom: 55px;
}

/* The form title */

.form-basic h1{
    display: inline-block;
    box-sizing: border-box;
    color:  #4c565e;
    font-size: 24px;
    padding: 0 10px 15px;
    border-bottom: 2px solid #6caee0;
    margin: 0;
}

.form-basic .form-row > label span{
    display: inline-block;
    box-sizing: border-box;
    color: #5F5F5F;
    width: 180px;
    text-align: right;
    vertical-align: top;
    padding: 12px 25px;
}

.form-basic input{
    color:  #5f5f5f;
    box-sizing: border-box;
    width: 240px;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    padding: 12px;
    border: 1px solid #dbdbdb;
}

.form-basic input[type=radio],
.form-basic input[type=checkbox]{
    box-shadow: none;
    width: auto;
}

.form-basic input[type=checkbox]{
    margin-top: 13px;
}

.form-basic select{
    background-color: #ffffff;
    color:  #5f5f5f;
    box-sizing: border-box;
    max-width: 240px;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    padding: 12px 8px;
    border: 1px solid #dbdbdb;
}

.form-basic textarea{
    color:  #5f5f5f;
    box-sizing: border-box;
    width: 240px;
    height: 80px;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    font: normal 13px sans-serif;
    padding: 12px;
    border: 1px solid #dbdbdb;
    resize: vertical;
}

.form-basic .form-radio-buttons{
    display: inline-block;
    vertical-align: top;
}

.form-basic .form-radio-buttons > div{
    margin-top: 10px;
}

.form-basic .form-radio-buttons label span{
    margin-left: 8px;
    color: #5f5f5f;
    font-weight: normal;
}

.form-basic .form-radio-buttons input{
    width: auto;
}

.form-basic button{
    display: block;
    border-radius: 2px;
    background-color:  #6caee0;
    color: #ffffff;
    font-weight: bold;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    padding: 14px 22px;
    border: 0;
    margin: 40px 183px 0;
}

/*	Making the form responsive. Remove this media query
    if you don't need the form to work on mobile devices. */

@media (max-width: 600px) {

    .form-basic{
        padding: 30px;
        max-width: 480px;
    }

    .form-basic .form-row{
        max-width: 300px;
        margin: 25px auto;
        text-align: left;
    }

    .form-basic .form-title-row{
        margin-bottom: 50px;
    }

    .form-basic .form-row > label span{
        display: block;
        text-align: left;
        padding: 0 0 15px;
    }

    .form-basic select{
        width: 240px;
    }

    .form-basic input[type=checkbox]{
        margin-top:0;
    }

    .form-basic .form-radio-buttons > div{
        margin: 0 0 10px;
    }

    .form-basic button{
        margin: 0;
    }

}
th {
    border: 1px #5F5F5F solid; padding: 3px;
}
td{
    padding: 5px;
}
.td{
    padding: 5px;
    border: 1px solid #dbdbdb;
    text-align: center;
}

        </style>
    </head>
    
    <body>
        <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>CV Jaya Abadi Forklift</h1><br>
                <span>Jl. Prabu Kian Santang No. 41</span><br>
                <span> Keroncong Tangerang</span><br>
                <span> Tanggal : <?php echo date('Y-m-d');?></span>
            </div>
            <div class="form-title-row">
                <h1 style="border: none;">Laporan Pengeluaran Kas Kecil</h1><br>
                
            </div>
            <?php
            //$n= $this->db->query("select * from permintaan_kaskecil where no_permintaan='$nop'")->row();
            ?>
            <div class="form-row">
                <table>
                    <tr>
                        <th>Nomor Pengeluaran</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Keterangan Keperluan</th>
                        
                    </tr>
                    <?php
                    $xm= $this->db->query("SELECT * FROM `pengeluaran_kaskecil` a inner join detail_pengeluaran b on b.no_pengeluaran=a.no_pengeluaran inner join karyawan c on b.kode_karyawan = c.kode_karyawan where a.tanggal_pengeluaran between '".$_POST['tgl_awal']."' and '".$_POST['tgl_akhir']."'");
                    foreach ($xm->result() as $xm){
                    ?>
                    <tr>
                        <td class="td"><?php echo $xm->no_pengeluaran;?></td>
                        <td class="td"><?php echo $xm->nama_karyawan;?></td>
                        <td class="td"><?php echo $xm->tanggal_pengeluaran;?></td>
                        <td class="td"><?php echo $xm->jumlah_pengeluaran;?></td>
                        <td class="td"><?php echo $xm->keterangan_keperluan;?></td>
                    </tr>
                    <?php } ?>
                   
                </table>
            </div>

            

           <div class="form-row">
               <table>
                   <tr>
                       <td>Yang Mengajukan</td>
                       <td style="width: 200px;"></td>
                       <td>Menyetujui</td>
                   </tr>
                   
                   <tr>
                       <td style="height: 100px;"></td>
                       <td style="width: 400px;"></td>
                       <td></td>
                   </tr>
                   <tr>
                       <td style="text-align: center;">( &nbsp;&nbsp; <?php echo $_SESSION['name'];?> &nbsp;&nbsp; )</td>
                       <td style="width: 200px;"></td>
                       <td>(---------------)</td>
                   </tr>
               </table>
        </div>

        </form>
        

    </div>
        
    </body>
    
</html>
