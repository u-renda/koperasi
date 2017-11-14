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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Tipe Petugas');
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Provinsi');
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Kota');
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Tipe Simpanan');
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
                success: function(data)
                {
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
                success: function(data)
                {
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Simpanan');
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
                success: function(data)
                {
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Petugas');
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Angsuran');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Angsuran Lists
    if (document.getElementById('angsuran_lists_page') != null) {
        
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
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Tambah Setor/Tarik');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});