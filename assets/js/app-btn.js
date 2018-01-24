$(function () {
    // Admin Tipe Lists
    if (document.getElementById('admin_tipe_lists_page') != null) {
        // Tambah
		$('body').delegate("#tambah", "click", function() {
            var action = "admin_tipe_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Tipe Petugas');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_tipe_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_tipe_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Tipe Petugas');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Provinsi Lists
    if (document.getElementById('provinsi_lists_page') != null) {
		// Tambah
		$('body').delegate("#tambah", "click", function() {
            var action = "provinsi_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Provinsi');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "provinsi_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "provinsi_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Provinsi');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Kota Lists
    if (document.getElementById('kota_lists_page') != null) {
        var id = $('#kota_lists_page').attr("data-program");
		
        // Tambah
		$('body').delegate("#tambah", "click", function() {
            var action = "kota_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid + '&id_provinsi=' + id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Kota');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "kota_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "kota_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Kota');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Simpanan Tipe Lists
    if (document.getElementById('simpanan_tipe_lists_page') != null) {
        // Tambah
		$('body').delegate("#tambah", "click", function() {
            var action = "simpanan_tipe_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Tipe Simpanan');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "simpanan_tipe_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "simpanan_tipe_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Tipe Simpanan');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Anggota Lists
    if (document.getElementById('anggota_lists_page') != null) {
        // Tambah Anggota
		$('body').delegate("#tambah", "click", function() {
            var action = "anggota_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Anggota');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
        // Tambah Pinjaman
		$('body').delegate(".tambahPinjaman", "click", function() {
            var action = "pinjaman_create";
            var id_anggota = $(this).attr("id");
            var dataString = 'id_anggota=' + id_anggota;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id_anggota+'-tambahPinjaman').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('.'+id_anggota+'-tambahPinjaman').html('<i class="fa fa-plus"></i> Tambah');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Pinjaman');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
        // Tambah Simpanan
		$('body').delegate(".tambahSimpanan", "click", function() {
            var action = "simpanan_create";
            var id_anggota = $(this).attr("id");
            var dataString = 'id_anggota=' + id_anggota;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id_anggota+'-tambahSimpanan').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('.'+id_anggota+'-tambahSimpanan').html('<i class="fa fa-plus"></i> Tambah');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Simpanan');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "anggota_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// View
		$('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "anggota_view";
            var dataString = 'id='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<i class="fa fa-folder-open h4 text-success"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('View Detail');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "anggota_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Anggota');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        // Tambah
		$('body').delegate("#tambah", "click", function() {
            var action = "admin_create";
            var grid = "multipleTable";
            var dataString = 'grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('#tambah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('#tambah').html('<i class="fa fa-plus"></i> Tambah Baru');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Petugas');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// View
		$('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_view";
            var dataString = 'id='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<i class="fa fa-folder-open h4 text-success"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('View Detail');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Petugas');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Pinjaman Lists
    if (document.getElementById('pinjaman_lists_page') != null) {
        // Tambah Angsuran
		$('body').delegate(".tambahAngsuran", "click", function() {
            var action = "angsuran_create";
            var id_pinjaman = $(this).attr("id");
            var dataString = 'id_pinjaman=' + id_pinjaman;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id_pinjaman+'-tambahAngsuran').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('.'+id_pinjaman+'-tambahAngsuran').html('<i class="fa fa-plus"></i> Tambah');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Angsuran');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "pinjaman_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// View
		$('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "pinjaman_view";
            var dataString = 'id='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<i class="fa fa-folder-open h4 text-success"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('View Detail');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "pinjaman_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Pinjaman');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Angsuran Lists
    if (document.getElementById('angsuran_lists_page') != null) {
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "angsuran_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// View
		$('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "angsuran_view";
            var dataString = 'id='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<i class="fa fa-folder-open h4 text-success"></i>');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('View Detail');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "angsuran_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Angsuran');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Simpanan Lists
    if (document.getElementById('simpanan_lists_page') != null) {
        // Tambah Simpanan Detail
		$('body').delegate(".tambahSetorTarik", "click", function() {
            var action = "simpanan_detail_create";
            var id_simpanan = $(this).attr("id");
            var dataString = 'id_simpanan=' + id_simpanan;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id_simpanan+'-tambahSetorTarik').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
					$('.'+id_simpanan+'-tambahSetorTarik').html('<i class="fa fa-plus"></i> Tambah');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Setor/Tarik');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "simpanan_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Edit
		$('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "simpanan_edit";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil h4"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Simpanan');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Simpanan Detail Lists (Setoran & Pengambilan)
    if (document.getElementById('simpanan_detail_lists_page') != null) {
		// Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "simpanan_detail_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});