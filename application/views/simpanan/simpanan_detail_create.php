<form id="the_form" class="form-horizontal form-bordered" novalidate="novalidate" action="<?php echo $this->config->item('link_simpanan_detail_create'); ?>">
	<input type="hidden" name="id_simpanan" value="<?php echo $id_simpanan; ?>">
	<input type="hidden" name="urutan" value="<?php echo $simpanan_detail->urutan; ?>">
	<input type="hidden" name="saldo_akhir" value="<?php echo $simpanan_detail->saldo_akhir; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Anggota</label>
			<div class="col-sm-8">
				<input type="text" name="no_anggota" id="no_anggota" class="form-control" value="<?php echo $simpanan->no_anggota; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Nama Anggota</label>
			<div class="col-sm-8">
				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $simpanan->nama_anggota; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Rekening</label>
			<div class="col-sm-8">
				<input type="text" name="no_rekening" id="no_rekening" class="form-control" value="<?php echo $simpanan->no_rekening; ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Saldo Akhir</label>
			<div class="col-sm-8">
				<input type="text" name="saldo_akhir" id="saldo_akhir" class="form-control" value="<?php echo number_format($simpanan_detail->saldo_akhir, 0, ',', '.'); ?>" disabled />
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">No. Transaksi <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="no_transaksi" id="no_transaksi" />
				<div class="text-danger" id="errorbox_no_transaksi"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Jenis Transaksi <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<div class="input-group col-sm-12">
					<?php
					foreach ($code_simpanan_detail_status as $key => $val)
					{
						echo '<div class="radio-inline radio-custom">';
						echo '<input type="radio" name="status" id="status'.$key.'" value="'.$key.'" '; if ($key == 1) { echo 'checked'; } echo '/>';
						echo '<label for="status'.$key.'">'.$val.'</label></div>';
					}
					?>
				</div>
				<div class="text-danger" id="errorbox_status"></div>
			</div>
		</div>
		<div class="form-group mt-lg">
			<label class="col-sm-4 control-label">Jumlah <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="jumlah" id="jumlah" />
				<div class="text-danger" id="errorbox_jumlah"></div>
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
                no_transaksi: "required",
                status: "required",
				jumlah: {
					required: true,
					digits: true
				}
            },
            messages: {
                no_transaksi: {
                    required:"No. Transaksi harus diisi."
                },
                status: {
                    required:"Jenis transaksi harus diisi."
                },
                jumlah: {
                    required:"Saldo awal harus diisi.",
					digits:"Saldo awal harus berupa angka."
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
    });
</script>