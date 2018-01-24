<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_anggota_edit').'?id='.$id; ?>">
	<input type="hidden" name="selfno" id="selfno" value="<?php echo $result->no_anggota; ?>">
	<input type="hidden" name="selfnama" id="selfnama" value="<?php echo $result->nama; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">No. Anggota <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="no_anggota" id="no_anggota" class="form-control" value="<?php echo set_value('no_anggota', $result->no_anggota); ?>" />
				<div class="text-danger" id="errorbox_no_anggota"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tipe Anggota <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name="id_anggota_tipe" id="id_anggota_tipe">
					<option value="">-- Select One --</option>
					<?php foreach ($anggota_tipe_lists as $row) { ?>
						<option value="<?php echo $row->id_anggota_tipe; ?>" <?php if ($result->id_anggota_tipe == $row->id_anggota_tipe) { echo 'selected="selected"'; } echo set_select('id_anggota_tipe', $row->id_anggota_tipe); ?>><?php echo $row->nama; ?></option>
					<?php } ?>
				</select>
				<div class="text-danger" id="errorbox_id_anggota_tipe"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Nama <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo set_value('nama', $result->nama); ?>" />
				<div class="text-danger" id="errorbox_nama"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Jenis Kelamin <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<div class="input-group col-sm-12">
					<?php foreach ($code_jenis_kelamin as $key => $val) { ?>
					<div class="radio-inline radio-custom">
						<input type="radio" name="jenis_kelamin" id="jenis_kelamin_<?php echo $key; ?>" value="<?php echo $key; ?>" <?php if ($result->jenis_kelamin == $key) { echo 'checked="checked"'; } echo set_radio('jenis_kelamin', $key) .'><label>'. $val . '</label>'; ?>
					</div>
					<?php } ?>
				</div>
				<div class="text-danger" id="errorbox_jenis_kelamin"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tempat Lahir <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo set_value('tempat_lahir', $result->tempat_lahir); ?>" />
				<div class="text-danger" id="errorbox_tempat_lahir"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tanggal Lahir <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir', $result->tanggal_lahir); ?>" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_tanggal_lahir"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Telp <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="telp" id="telp" class="form-control" value="<?php echo set_value('telp', $result->telp); ?>" />
				<div class="text-danger" id="errorbox_telp"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Alamat <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<textarea name="alamat" id="alamat" class="form-control" rows="5"><?php echo set_value('alamat', $result->alamat); ?></textarea>
				<div class="text-danger" id="errorbox_alamat"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Kode Pos <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="kode_pos" id="kode_pos" class="form-control" value="<?php echo set_value('kode_pos', $result->kode_pos); ?>" />
				<div class="text-danger" id="errorbox_kode_pos"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Nama Provinsi & Kota <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name="id_provinsi" id="id_provinsi">
					<option value="">-- Select Provinsi --</option>
					<?php foreach ($provinsi_lists as $row) { ?>
						<option id="<?php echo $row->id_provinsi; ?>" value="<?php echo $row->id_provinsi; ?>" <?php if ($id_provinsi == $row->id_provinsi) { echo 'selected="selected"'; } echo set_select('id_provinsi', $row->id_provinsi); ?>><?php echo $row->nama; ?></option>
					<?php } ?>
				</select>
				<div class="text-danger" id="errorbox_id_provinsi"></div>
			</div>
			<div class="col-sm-9 col-sm-offset-3 mt-sm">
				<select class="form-control" name="id_kota" id="id_kota">
					<option value="">-- Select Kota --</option>
					<?php foreach ($kota_lists as $row) { ?>
						<option value="<?php echo $row->id_kota; ?>" <?php if ($result->id_kota == $row->id_kota) { echo 'selected="selected"'; } echo set_select('id_kota', $row->id_kota); ?>><?php echo $row->nama; ?></option>
					<?php } ?>
				</select>
				<div class="text-danger" id="errorbox_id_kota"></div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Ubah</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	</div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
		var grid = '<?php echo $grid; ?>';
		
        $("#the_form").validate({
            rules: {
                id_anggota_tipe: "required",
                jenis_kelamin: "required",
                tempat_lahir: "required",
                tanggal_lahir: "required",
                alamat: "required",
                id_provinsi: "required",
                id_kota: "required",
                no_anggota: {
					required: true,
					remote: {
						url: "check_no_anggota",
						type: "post",
						data: {
							no_anggota: function() {
								return $("#no_anggota").val();
							},
							selfno: function() {
								return $("#selfno").val();
							}
						}
					}
				},
                nama: {
					required: true,
					remote: {
						url: "check_anggota_nama",
						type: "post",
						data: {
							nama: function() {
								return $("#nama").val();
							},
							selfnama: function() {
								return $("#selfnama").val();
							},
						}
					}
				},
				kode_pos: {
					required: true,
					digits: true
				},
				telp: {
					required: true,
					digits: true
				}
            },
            messages: {
                no_anggota: {
                    required:"No. Anggota harus diisi.",
					remote:"Nomor sudah terdaftar."
                },
                id_anggota_tipe: {
                    required:"Tipe anggota harus diisi."
                },
                nama: {
                    required:"Nama harus diisi.",
					remote:"Nama sudah terdaftar."
                },
                jenis_kelamin: {
                    required:"Jenis kelamin harus diisi."
                },
                tempat_lahir: {
                    required:"Tempat lahir harus diisi."
                },
                tanggal_lahir: {
                    required:"Tanggal lahir harus diisi."
                },
                telp: {
                    required:"Telp harus diisi.",
					digits:"Telp harus berupa angka."
                },
                alamat: {
                    required:"Alamat harus diisi."
                },
                kode_pos: {
                    required:"Kode pos harus diisi.",
					digits:"Kode pos harus berupa angka."
                },
                id_provinsi: {
                    required:"Provinsi harus diisi."
                },
                id_kota: {
                    required:"Kota harus diisi."
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
        
		$("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_kota').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_kota').html(data);
				},
				error: function(data){
				}
			});
		});
    });
</script>