<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_angsuran_create'); ?>">
	<input type="hidden" name="id_angsuran" value="<?php echo $angsuran->id_angsuran; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Pinjaman</label>
			<div class="col-sm-8">
				<input type="text" name="no_pinjaman" id="no_pinjaman" class="form-control" value="<?php echo $pinjaman->no_pinjaman; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Nama Anggota</label>
			<div class="col-sm-8">
				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $anggota->nama; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Angsuran Ke</label>
			<div class="col-sm-8">
				<input type="text" name="angsuran_ke" id="angsuran_ke" class="form-control" value="<?php echo $angsuran->angsuran_ke; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Pokok</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<input type="text" name="pokok" id="pokok" class="form-control" value="<?php echo number_format($angsuran->pokok, 0, ',', '.'); ?>" disabled />
				</div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Bunga</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<input type="text" name="bunga" id="bunga" class="form-control" value="<?php echo number_format($angsuran->bunga, 0, ',', '.'); ?>" disabled />
				</div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Jumlah Angsuran</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
				<input type="text" name="jumlah_angsuran" id="jumlah_angsuran" class="form-control" value="<?php echo number_format($angsuran->jumlah_angsuran, 0, ',', '.'); ?>" disabled />
				</div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tanggal Angsuran <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="tgl_angsuran" id="tgl_angsuran" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_tgl_angsuran"></div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	</div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#the_form").validate({
            rules: {
                tgl_angsuran: "required"
            },
            messages: {
                tgl_angsuran: {
                    required:"Tanggal angsuran harus diisi."
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Mohon tunggu...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        
                        new PNotify({
							title: response.title,
							text: response.text,
							type: response.type
						});
						
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
		
		$('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd-m-yyyy",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>