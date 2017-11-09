<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_admin_create'); ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tipe Admin <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name="id_admin_tipe" id="id_admin_tipe">
					<option value="">-- Select One --</option>
					<?php
					foreach ($admin_tipe_lists as $row)
					{
						echo '<option value="'.$row->id_admin_tipe.'">'.$row->nama.'</option>';
					}
					?>
				</select>
				<div class="text-danger" id="errorbox_id_admin_tipe"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Nama <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="nama" id="nama" class="form-control" />
				<div class="text-danger" id="errorbox_nama"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="email" id="email" class="form-control" />
				<div class="text-danger" id="errorbox_email"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Username <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="username" id="username" class="form-control" />
				<div class="text-danger" id="errorbox_username"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Password <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="password" name="password" id="password" class="form-control" />
				<div class="text-danger" id="errorbox_password"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Jenis Kelamin <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<div class="input-group col-sm-12">
					<?php
					foreach ($code_jenis_kelamin as $key => $val)
					{
						echo '<div class="radio-inline radio-custom">';
						echo '<input type="radio" name="jenis_kelamin" id="jenis_kelamin'.$key.'" value="'.$key.'" '; if ($key == 1) { echo 'checked'; } echo '/>';
						echo '<label for="jenis_kelamin_'.$key.'">'.$val.'</label></div>';
					}
					?>
				</div>
				<div class="text-danger" id="errorbox_jenis_kelamin"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tempat Lahir <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" />
				<div class="text-danger" id="errorbox_tempat_lahir"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Tanggal Lahir <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_tanggal_lahir"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Telp <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="telp" id="telp" class="form-control" />
				<div class="text-danger" id="errorbox_telp"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Alamat <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
				<div class="text-danger" id="errorbox_alamat"></div>
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
                id_admin_tipe: "required",
                jenis_kelamin: "required",
                tempat_lahir: "required",
                tanggal_lahir: "required",
                alamat: "required",
                nama: {
					required: true,
					remote: {
						url: "check_admin_nama",
						type: "post",
						data: {
							nama: function() {
								return $("#nama").val();
							}
						}
					}
				},
                email: {
					required: true,
                    email: true,
					remote: {
						url: "check_admin_email",
						type: "post",
						data: {
							email: function() {
								return $("#email").val();
							}
						}
					}
				},
                username: {
					required: true,
					remote: {
						url: "check_admin_username",
						type: "post",
						data: {
							username: function() {
								return $("#username").val();
							}
						}
					}
				},
                password: {
                    required: true,
                    minlength: 5
                },
				telp: {
					required: true,
					digits: true
				}
            },
            messages: {
                id_admin_tipe: {
                    required:"Tipe petugas harus diisi."
                },
                nama: {
                    required:"Nama harus diisi.",
					remote:"Nama sudah terdaftar."
                },
                email: {
                    required:"Email harus diisi.",
                    email: "Format email salah.",
					remote:"Email sudah terdaftar."
                },
                username: {
                    required:"Username harus diisi.",
					remote:"Username sudah terdaftar."
                },
                password: {
                    required:"Password harus diisi.",
					minlength:"Password min 5 karakter."
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