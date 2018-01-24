<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_pinjaman_edit').'?id='.$id; ?>">
	<input type="hidden" name="status" value="<?php echo $result->status; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Pinjaman <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="no_pinjaman" id="no_pinjaman" value="<?php echo $result->no_pinjaman; ?>" />
				<div class="text-danger" id="errorbox_no_pinjaman"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tipe Pinjaman <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<select class="form-control" name="id_pinjaman_tipe" id="id_pinjaman_tipe">
					<option value="">-- Select One --</option>
					<?php
					foreach ($pinjaman_tipe_lists as $row)
					{
						echo '<option value="'.$row->id_pinjaman_tipe.'"';
						
						if ($row->id_pinjaman_tipe == $result->id_pinjaman_tipe)
						{
							echo 'selected';
						}
						
						echo '>'.$row->nama.'</option>';
					}
					?>
				</select>
				<div class="text-danger" id="errorbox_id_pinjaman_tipe"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tanggal Pinjam <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_tgl_pinjam"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Jumlah Pinjam <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">Rp</span>
					<input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" value="<?php echo $result->jumlah_pinjaman; ?>" />
				</div>
				<span class="help-block">Isi tanpa titik atau koma</span>
				<div class="text-danger" id="errorbox_jumlah_pinjaman"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Bunga <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group">
					<input type="text" class="form-control" name="bunga" id="bunga" value="<?php echo $result->bunga; ?>" />
					<span class="input-group-addon">%</span>
				</div>
				<div class="text-danger" id="errorbox_bunga"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Kali Angsuran <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="kali_angsuran" id="kali_angsuran" value="<?php echo $result->kali_angsuran; ?>" />
				<span class="help-block">Berapa kali akan diangsur</span>
				<div class="text-danger" id="errorbox_kali_angsuran"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tanggal Jatuh Tempo <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" value="<?php echo $tgl_jatuh_tempo; ?>" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_tgl_jatuh_tempo"></div>
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
		var grid = '<?php echo $grid; ?>';
        $("#the_form").validate({
            rules: {
                id_pinjaman_tipe: "required",
                tgl_pinjam: "required",
                tgl_jatuh_tempo: "required",
                no_pinjaman: "required",
				jumlah_pinjaman: {
					required: true,
					digits: true
				},
				bunga: {
					required: true,
					digits: true
				},
				kali_angsuran: {
					required: true,
					digits: true
				}
            },
            messages: {
                id_pinjaman_tipe: {
                    required:"Tanggal pinjam harus diisi."
                },
                tgl_pinjam: {
                    required:"Tanggal pinjam harus diisi."
                },
                tgl_jatuh_tempo: {
                    required:"Tanggal jatuh tempo harus diisi."
                },
                no_pinjaman: {
                    required:"No. Pinjaman harus diisi."
                },
                jumlah_pinjaman: {
                    required:"Jumlah pinjam harus diisi.",
					digits:"Jumlah pinjam harus berupa angka."
                },
                bunga: {
                    required:"Bunga harus diisi.",
					digits:"Bunga harus berupa angka."
                },
                kali_angsuran: {
                    required:"Kali angsuran harus diisi.",
					digits:"Kali angsuran harus berupa angka."
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
							if (grid !== '') {
								$('#' + grid).data('kendoGrid').dataSource.read();
								$('#' + grid).data('kendoGrid').refresh();
							} else {
								window.location.reload();
							}
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