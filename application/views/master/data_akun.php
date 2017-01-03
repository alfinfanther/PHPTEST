<?php


/* penanganan form */
if (isset($_POST['Input'])) {
	$kode_akun  	= strip_tags($_POST['kode_akun']);
	$nama_akun  	= strip_tags($_POST['nama_akun']);
	$posisi = strip_tags($_POST['posisi']);
	
	//input ke db
	$query = sprintf("INSERT INTO data_akun VALUES('$kode_akun', '$nama_akun', '$posisi')");
	$sql = mysql_query($query);
	$pesan = "";
	if ($sql) {
		$pesan = "Data berhasil disimpan";
	} else {
		$pesan = "Data gagal disimpan ";
		$pesan .= mysql_error();
	}
	$response = array('pesan'=>$pesan, 'data'=>$_POST);
	echo json_encode($response);
	exit;
} else if (isset($_POST['Edit'])) {
	$kode_akun  	= strip_tags($_POST['kode_akun']);
	$nama_akun  	= strip_tags($_POST['nama_akun']);
	$posisi = strip_tags($_POST['posisi']);
	
	//update data
	$query = sprintf("UPDATE data_akun SET nama_akun='$nama_akun', posisi='$posisi' WHERE kode_akun='$kode_akun'");
	$sql = mysql_query($query);
	$pesan = "";
	if ($sql) {
		$pesan = "Data berhasil disimpan";
	} else {
		$pesan = "Data gagal disimpan ";
		$pesan .= mysql_error();
	}
	$response = array('pesan'=>$pesan, 'data'=>$_POST);
	echo json_encode($response);
	exit;
} else if (isset($_POST['Delete'])) {
	$kode_akun  	= strip_tags($_POST['kode_akun']);
	
	//delete data
	$query = sprintf("DELETE FROM data_akun WHERE kode_akun='$kode_akun'");
	$sql = mysql_query($query);
	$pesan = "";
	if ($sql) {
		$pesan = "Data berhasil dihapus";
	} else {
		$pesan = "Data gagal dihapus ";
		$pesan .= mysql_error();
	}
	$response = array('pesan'=>$pesan, 'data'=>$_POST);
	echo json_encode($response);
	exit;
} else if (isset($_GET['action']) && $_GET['action'] == 'getdata') {
		
	$page = (isset($_POST['page']))?$_POST['page']: 1;
	$rp = (isset($_POST['rp']))?$_POST['rp'] : 10;
	$sortname = (isset($_POST['sortname']))? $_POST['sortname'] : 'nama';
	$sortorder = (isset($_POST['sortorder']))? $_POST['sortorder'] : 'asc';
			
	$sort = "ORDER BY $sortname $sortorder";
	$start = (($page-1) * $rp);
	$limit = "LIMIT $start, $rp";
	
	$query = (isset($_POST['query']))? $_POST['query'] : '';
	$qtype = (isset($_POST['qtype']))? $_POST['qtype'] : '';
	
	$where = "";
	if ($query) $where .= "WHERE $qtype LIKE '%$query%' ";
	
	$query = "SELECT kode_akun, nama_akun, posisi ";
	$query_from =" FROM data_akun ";
	
	$query .= $query_from . " $where $sort $limit";
		
	$query_total = "SELECT COUNT(*)". $query_from." ".$where;
	
	$sql = mysql_query($query) or die($query);
	$sql_total = mysql_query($query_total) or die($query_total);
	$total = mysql_fetch_row($sql_total);
	$data = $_POST;
	$data['total'] = $total[0];
	$datax = array();
	$datax_r = array();
	while ($row = mysql_fetch_row($sql)) {
		$rows['id'] = $row[0];
		$datax['cell'] = $row;
		array_push($datax_r, $datax);
	}
	$data['rows'] = $datax_r;
	echo json_encode($data);
	exit;
} else if (isset($_GET['action']) && $_GET['action'] == 'get_dataakun') {
	$kode_akun = $_GET['kode_akun'];
	$query = "SELECT * FROM data_akun WHERE kode_akun='$kode_akun'";
	$sql = mysql_query($query);
	$row = mysql_fetch_assoc($sql);
	echo json_encode ($row);
	exit;
}
?>

		<style type="text/css">
		.labelfrm {
			display:block;
			font-size:small;
			margin-top:5px;
		}
		.error {
			font-size:small;
			color:red;
		}
		</style>
		<script type="text/javascript" src="<?php echo base_url();?>asset/flexi/libs/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/flexi/libs/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/flexi/libs/jquery.validate.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/flexi/libs/flexigrid/css/flexigrid.css">
		<script type="text/javascript" src="<?php echo base_url();?>asset/flexi/libs/jquery.cookie.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>asset/flexi/libs/flexigrid/js/flexigrid.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			resetForm();
                        $('.hdform').hide();
            //aktifkan ajax di form
            var options = {
				success	  : showResponse,
				beforeSubmit:  function(){
					return $("#frm").valid();
				},
				resetForm : true,
				clearForm : true,
				dataType  : 'json'
			};
			$('#frm').ajaxForm(options); 
			
			//validasi form dgn jquery validate
			$('#frm').validate({
				rules: {
					kode_akun : {
						digits: true,
						minlength:6,
						maxlength:6
					}
				},
				messages: {
					kode_akun: {
						required: "Kolom data akun harus diisi",
						minlength: "Kolom data akun harus terdiri dari 6 digit",
						maxlength: "Kolom data akun harus terdiri dari 6 digit",
						digits: "data akun harus berupa angka"
					},
					nama_akun: {
						required: "Nama harus diisi dengan benar"
					}
				}
			});
			
			//flexigrid handling
			$('#flex1').flexigrid
			(
				{
				url: '<?php echo site_url('home/data_akun');?>?action=getdata',
				dataType: 'json',
				
				colModel : [
					{display: 'Kode Akun', name : 'kode_akun', width : 100, sortable : true, align: 'left', process: doaction},
					{display: 'Nama Akun', name : 'nama_akun', width : 200, sortable : true, align: 'left', process: doaction},
					{display: 'Posisi', name : 'posisi', width : 400, sortable : true, align: 'left', process: doaction}
					],
				searchitems : [
					{display: 'Kode Akun', name : 'kode_akun'},
					{display: 'Nama Akun', name : 'nama_akun', isdefault: true}
					],
					
				sortname: 'nama_akun',
				sortorder: 'asc',
				usepager: true,
				title: 'Data Akun',
				useRp: true,
				rp: 15,
				width: 700,
				height: 400
				}
			);
			
        }); 
        
        function doaction( celDiv, id ) {
			$( celDiv ).click( function() {
				var kode_akun = $(this).parent().parent().children('td').eq(0).text();
				$.getJSON ('<?php echo site_url('home/data_akun');?>',{action:'get_dataakun',kode_akun:kode_akun}, function (json) {
					$('#kode_akun').val(json.kode_akun);
					$('#nama_akun').val(json.nama_akun);
					$('#posisi').val(json.posisi);
				}); 
				
				$('#input').attr('disabled','disabled');
				$('#edit, #delete').removeAttr('disabled');
			});
		}
        function showResponse(responseText, statusText) {
			var data = responseText['data'];
			var pesan = responseText['pesan'];
			alert(pesan);
			resetForm();
			$('#flex1').flexReload();
		}
		function resetForm() {
			$('#input').removeAttr('disabled');
			$('#edit, #delete').attr('disabled','disabled');
			$('#nim').removeAttr('readonly');
		}
                function tambah(){
                    $('#tablehd').hide();
                    $('.hdform').show();
                }
                function batal(){
                    $('#tablehd').show();
                }
                function simpan(){
                     $('#tablehd').show();
                }
		</script>
	
		<h1>Data Akun</h1>
		<form action="" method="post" id="frm" onReset="resetForm()">
                    <div class="hdform">
			<label for="nim" class="labelfrm">Kode Akun: </label>
			<input type="text" name="kode_akun" id="kode_akun" maxlength="10" class="required" size="15"/>
			
			<label for="nama" class="labelfrm">Nama Akun: </label>
			<input type="text" name="nama_akun" id="nama_akun" size="30" class="required"/>
			
			<label for="posisi" class="labelfrm">Posisi: </label>
			<textarea name="posisi" id="posisi" cols="40" rows="4" class="required"></textarea>
                    </div>
			
                        <label for="submit" class="labelfrm">&nbsp;</label>
                        <input type="button" name="Tambah" onclick="tambah();" value="Tambah" id="input"/>
                        <input type="submit" name="Input" value="Simpan" onclick="simpan();" id="input"/>
			<input type="submit" name="Edit" value="Ubah" id="edit"/>
			<input type="submit" name="Delete" value="Hapus" id="delete"/>
                        <input type="reset" name="Clear" value="Batal" onclick="batal();" id="clear"/>
                        
                        <input type="text" name="search" > 
                        <input type="button" value="Cari">
		</form>
                <div id="tablehd">
                    <table id="flex1" style="display:none"></table>
                </div>
		
	
                <div>
                    <fieldset>
                            <legend>Master Data > Jenis Pengadaan &nbsp; <i style="color: #F1C40F; size: 12px;"><?PHP
echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	echo ! empty($success) ? '<p class="message">' . $success . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
        ?></i></legend>
                    <p><button type="button" class="btn btn-primary" onClick="location.href='<?php echo site_url('setting/c_lelang_add');?>'">Tambah Data</button></p>
                      <table id="example" class="display" cellspacing="0" width="100%">
                         
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Nama Ketegori</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     
                </tbody>
                </table>
                </fieldset>
                </div>