<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="<?=base_url('assets/css/datatables.css')?>" rel="stylesheet">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Rekap SMT</h1>
	<div id="body">
		<?php echo form_open_multipart('welcome/do_upload'); ?>
			<fieldset>
				 <legend>Upload Rekening Koran:</legend>
				 <label>Pilih Bank :</label>
				 <select name="bank" id="bank" required="">
				 	<option value="">- Pilih Bank -</option>
				 	<option value="MDR">Mandiri</option>
				 	<option value="BNI">BNI</option>
				 	<option value="BRI">BRI</option>
				 	<option value="BCA">BCA</option>
				 </select>
				 <label>Pilih Bulan: </label>
				 <input type="month" name="month_rk" id="month_rk" required="">
				 <label>Pilih File: </label>
				 <input type="file" name="file_rk"> <br>
				 <input type="submit" value="upload" />
			</fieldset>
		<?php echo form_close(); ?>
		<form method="POST" action="<?=site_url('welcome/getExcel')?>">
			<fieldset>
				<legend>Filter :</legend>
				<label>Pilih Bank :</label>
				 <select name="fltBank" id="fltBank" required="">
				 	<option value="">- Pilih Bank -</option>
				 	<option value="Mandiri">Mandiri</option>
				 	<option value="BNI">BNI</option>
				 	<option value="BRI">BRI</option>
				 	<option value="BCA">BCA</option>
				 </select>
				<label>Pilih Bulan : </label>
				<input type="month" name="fltMonth" id="fltMonth" value="<?=date('Y-m')?>"><br>
				<button type="button" name="search" id="search">Search</button>
				<button type="submit">Export</button>
			</fieldset>
		</form>
		<table id="table" class="" cellspacing="0" border="0" width="100%">
			<thead>
				<tr>
					<th>Tanggal Rekening</th>
					<th>CIPUTAT_1_SMT</th>
					<th>CIPUTAT_1_RK</th>
					<th>PONDOKPINANG_SMT</th>
					<th>PONDOKPINANG_RK</th>
					<th>FATMAWATI_2_SMT</th>
					<th>FATMAWATI_2_RK</th>
					<th>FATMAWATI_1_SMT</th>
					<th>FATMAWATI_1_RK</th>
					<th>AMPERA_2_SMT</th>
					<th>AMPERA_2_RK</th>
					<th>AMPERA_1_SMT</th>
					<th>AMPERA_1_RK</th>
					<th>LENTENG_AGUNG_2_SMT</th>
					<th>LENTENG_AGUNG_2_RK</th>
					<th>LENTENG_AGUNG_1_SMT</th>
					<th>LENTENG_AGUNG_1_RK</th>
					<th>GEDONG_2_SMT</th>
					<th>GEDONG_2_RK</th>
					<th>GEDONG_1_SMT</th>
					<th>GEDONG_1_RK</th>
					<th>KP_RAMBUTAN_SMT</th>
					<th>KP_RAMBUTAN_RK</th>
					<th>PS_REBO_SMT</th>
					<th>PS_REBO_RK</th>
					<th>DUKUH_1_SMT</th>
					<th>DUKUH_1_RK</th>
					<th>DUKUH_3_SMT</th>
					<th>DUKUH_3_RK</th>
					<th>LT_AGUNG_3_SMT</th>
					<th>LT_AGUNG_3_RK</th>
					<th>CILANDAK_UTAMA_SMT</th>
					<th>CILANDAK_UTAMA_RK</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
var handle_datatables_mdr = function () {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "scrollX": true,
		"scrollCollapse": true,
		searching: false,
        "paging" : false,
        destroy: true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Welcome/getDataJsonMdr')?>",
            "type": "POST",
            "data": function ( data ) {
                data.fltMonth = $('#fltMonth').val();
            }
        },

    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}

var handle_datatables_bni = function () {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "scrollX": true,
		"scrollCollapse": true,
		searching: false,
        "paging" : false,
        destroy: true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Welcome/getDataJsonBni')?>",
            "type": "POST",
            "data": function ( data ) {
                data.fltMonth = $('#fltMonth').val();
            }
        },

    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}

var handle_datatables_bri = function () {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "scrollX": true,
		"scrollCollapse": true,
		searching: false,
        "paging" : false,
        destroy: true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Welcome/getDataJsonBri')?>",
            "type": "POST",
            "data": function ( data ) {
                data.fltMonth = $('#fltMonth').val();
            }
        },

    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}

var handle_datatables_bca = function () {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "scrollX": true,
		"scrollCollapse": true,
		searching: false,
        "paging" : false,
        destroy: true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Welcome/getDataJsonBca')?>",
            "type": "POST",
            "data": function ( data ) {
                data.fltMonth = $('#fltMonth').val();
            }
        },

    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}



var handle_onchangeBank = function () {
	$('#fltBank').on('change', function () {
		// alert($('#fltBank').val());
		var bank = $('#fltBank').val();
		if (bank=='Mandiri') {
			handle_datatables_mdr();
		}
		if (bank=='BNI') {
			handle_datatables_bni();
		}
		if (bank=='BRI') {
			handle_datatables_bri();
		}
		if (bank=='BCA') {
			handle_datatables_bca();
		}

	})
}
$(document).ready(function() {
    // handle_datatables_mdr();
    handle_onchangeBank();
    // $('#fltMonth').
    // var date = New Date()
});

</script>
</body>
</html>
