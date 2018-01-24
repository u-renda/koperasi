<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_simpanan_create'); ?>">
	<input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Anggota</label>
			<div class="col-sm-8">
				<input type="text" name="no_anggota" id="no_anggota" class="form-control" value="<?php echo $anggota->no_anggota; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Nama Anggota</label>
			<div class="col-sm-8">
				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $anggota->nama; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Rekening <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="no_rekening" id="no_rekening" />
				<div class="text-danger" id="errorbox_no_rekening"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tipe Simpanan <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<select class="form-control" name="id_simpanan_tipe" id="id_simpanan_tipe">
					<option value="">-- Select One --</option>
					<?php
					foreach ($simpanan_tipe_lists as $row)
					{
						echo '<option value="'.$row->id_simpanan_tipe.'">'.$row->nama.'</option>';
					}
					?>
				</select>
				<div class="text-danger" id="errorbox_id_simpanan_tipe"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Tanggal Buka Rekening <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group date date-picker">
					<input type="text" class="form-control" name="created_date" id="created_date" />
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="text-danger" id="errorbox_created_date"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Saldo Awal <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="jumlah" id="jumlah" />
				<div class="text-danger" id="errorbox_jumlah"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Transaksi <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="no_transaksi" id="no_transaksi" />
				<div class="text-danger" id="errorbox_no_transaksi"></div>
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
                no_rekening: "required",
                id_simpanan_tipe: "required",
				jumlah: {
					required: true,
					digits: true
				},
                created_date: "required",
                no_transaksi: "required"
            },
            messages: {
                no_rekening: {
                    required:"No. Rekening harus diisi."
                },
                id_simpanan_tipe: {
                    required:"Tipe simpanan harus diisi."
                },
                jumlah: {
                    required:"Saldo awal harus diisi.",
					digits:"Saldo awal harus berupa angka."
                },
                created_date: {
                    required:"Tanggal buka rekening harus diisi."
                },
                no_transaksi: {
                    required:"No. Transaksi harus diisi."
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