<div id="confirm">
	<div class="panel-body">
		Anda yakin untuk menhapus data ini?
	</div>
	<div class="modal-footer">
		<input type="submit" id="yes" name="yes" class="btn btn-primary" value="Hapus" />
		<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#yes').click(function() {
			var dataString = 'id=<?php echo $id; ?>&delete=yes';
			var grid = '<?php echo $grid; ?>';
			$.ajax(
			{
				type: "POST",
				url: '<?php echo $action; ?>',
				data: dataString, 
				cache: false,
				beforeSend: function()
				{
					$('#confirm').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data)
				{
					var response = $.parseJSON(data);
                    $('#myModal').modal('hide');
                        
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
		});
    });
</script>