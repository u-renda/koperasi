<form class="form-horizontal">
	<div class="panel-body">
		<div class="form-group">
			<label class="col-md-4 control-label">Tipe Pinjaman:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $tipe_nama; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Nama:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $nama; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">No. Pinjaman:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $no_pinjaman; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Tanggal Pinjam:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $tgl_pinjam; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Jumlah Pinjaman:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $jumlah_pinjaman; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Kali Angsuran:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $kali_angsuran; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Bunga:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $bunga; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Tanggal Jatuh Tempo:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $tgl_jatuh_tempo; ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Keterangan:</label>
			<div class="col-md-6">
				<p class="form-control-static"><?php echo $status; ?></p>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	</div>
</form>