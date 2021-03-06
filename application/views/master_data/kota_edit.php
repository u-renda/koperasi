<form id="the_form" class="form-horizontal" novalidate="novalidate" action="<?php echo $this->config->item('link_kota_edit').'?id='.$id; ?>">
	<input type="hidden" name="selfnama" id="selfnama" value="<?php echo $result->nama; ?>">
	<input type="hidden" name="id_provinsi" id="id_provinsi" value="<?php echo $result->id_provinsi; ?>">
	<div class="panel-body">
		<div class="form-group mt-lg">
			<label class="col-sm-3 control-label">Nama Kota <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo set_value('nama', $result->nama); ?>" />
				<div class="text-danger" id="errorbox_nama"></div>
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
		var id = $("#id_provinsi").val();
		
        $("#the_form").validate({
            rules: {
                nama: {
					required: true,
					remote: {
						url: "check_kota_nama",
						type: "post",
						data: {
							id_provinsi: function() {
								return id;
							},
							kota: function() {
								return $("#kota").val();
							},
							selfnama: function() {
								return $("#selfnama").val();
							}
						}
					}
				}
            },
            messages: {
                nama: {
                    required:"Nama harus diisi.",
                    remote:"Nama sudah terdaftar."
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
    });
</script>