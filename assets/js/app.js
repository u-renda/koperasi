(function($) {

	'use strict';
    
    // TinyMCE
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        forced_root_block: false,
        content_style: ".mce-content-body  {font-size: 14px; font-family: 'Open Sans', sans-serif;}",
        height: 250,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks",
            "insertdatetime table contextmenu paste",
            "emoticons media"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | media",
        media_live_embeds: true
    });

}).apply(this, [jQuery]);

function goBack() {
    window.history.back();
}

function resubmit_angsuran(grid) {
	$(grid).kendoGrid({
		dataSource: {
			transport: {
				read: {
					url: "angsuran_get",
					dataType: "json",
					type: "POST",
					data: {
						status : $('#status').val()
					}
				}
			},
			schema: {
				data: "results",
				total: "total"
			},
			pageSize: 20,
			serverPaging: true,
			serverSorting: true,
			serverFiltering: true,
			cache: false
		},
		sortable: {
			mode: "single",
			allowUnsort: true
		},
		pageable: {
			buttonCount: 5,
			input: true,
			pageSizes: true,
			refresh: true
		},
		filterable: {
			extra: false,
			operators: {
				string: {
					contains: "Mengandung kata"
				}
			}
		},
		selectable: "row",
		resizable: true,
		columns: [{
			field: "No",
			sortable: false,
			filterable: false,
			width: 30
		},
		{
			field: "Anggota",
			sortable: false,
			width: 100
		},
		{
			field: "TglAngsuran",
			title: "Tgl Angsuran",
			sortable: false,
			filterable: false,
			width: 100
		},
		{
			field: "AngsuranKe",
			title: "Angsuran Ke",
			sortable: false,
			filterable: false,
			width: 70
		},
		{
			field: "JumlahAngsuran",
			title: "Jumlah Angsuran",
			sortable: false,
			filterable: false,
			width: 100
		},
		{
			field: "Status",
			sortable: false,
			filterable: false,
			width: 100,
			template: "#= data.Status #"
		},
		{
			field: "Aksi",
			sortable: false,
			filterable: false,
			width: 70,
			template: "#= data.Aksi #"
		}]
	});
}

$(function () {
    // Admin Tipe Lists
    if (document.getElementById('admin_tipe_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "admin_tipe_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Provinsi Lists
    if (document.getElementById('provinsi_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "provinsi_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "Nama",
                width: 300,
                template: "#= data.Nama #"
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Kota Lists
    if (document.getElementById('kota_lists_page') != null) {
        var id = $('#kota_lists_page').attr("data-program");
		
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "kota_get?id=" + id,
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "Nama",
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Simpanan Tipe Lists
    if (document.getElementById('simpanan_tipe_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "simpanan_tipe_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "Nama",
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Anggota Lists
    if (document.getElementById('anggota_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "anggota_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "NoAnggota",
				title: "No Anggota",
                filterable: false,
                width: 100
            },
            {
                field: "Nama",
                width: 200
            },
            {
                field: "Telp",
                sortable: false,
                filterable: false,
                width: 80
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 80,
                template: "#= data.Aksi #"
            },
            {
                field: "Pinjaman",
                sortable: false,
                filterable: false,
                width: 100,
                template: "#= data.Pinjaman #"
            },
            {
                field: "Simpanan",
                sortable: false,
                filterable: false,
                width: 100,
                template: "#= data.Simpanan #"
            }]
        });
    }
	
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "admin_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "Nama",
                width: 200
            },
            {
                field: "Email",
                sortable: false,
                filterable: false,
                width: 150
            },
            {
                field: "Telp",
                sortable: false,
                filterable: false,
                width: 150
            },
            {
                field: "Username",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Pinjaman Lists
    if (document.getElementById('pinjaman_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "pinjaman_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 30
            },
            {
                field: "NoPinjaman",
				title: "No. Pinjaman",
                width: 100
            },
            {
                field: "NamaAnggota",
				title: "Nama Anggota",
                width: 100
            },
            {
                field: "TglJatuhTempo",
				title: "Jatuh Tempo",
                filterable: false,
                width: 80
            },
            {
                field: "JumlahPinjaman",
				title: "Jumlah Pinjaman",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "Keterangan",
                sortable: false,
                filterable: false,
                width: 100,
                template: "#= data.Keterangan #"
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.Aksi #"
            },
            {
                field: "Angsuran",
                sortable: false,
                filterable: false,
                width: 100,
                template: "#= data.Angsuran #"
            }]
        });
    }
	
    // Angsuran Lists
    if (document.getElementById('angsuran_lists_page') != null) {
		grid = '#multipleTable';
        resubmit_angsuran(grid);
        
        $('#form_lists').submit(function (){
            resubmit_angsuran(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
	
    // Simpanan Lists
    if (document.getElementById('simpanan_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "simpanan_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 20
            },
            {
                field: "Anggota",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "TipeSimpanan",
				title: "Tipe Simpanan",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "NoRekening",
				title: "No Rekening",
                sortable: false,
                filterable: false,
                width: 70
            },
            {
                field: "SaldoAkhir",
				title: "Saldo Akhir",
                sortable: false,
                filterable: false,
                width: 70
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.Aksi #"
            },
			{
				field: "SetorTarik",
				title: "Setor/Tarik",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.SetorTarik #"
			}]
        });
    }
	
    // Simpanan Detail Lists (Setor/Tarik)
    if (document.getElementById('simpanan_detail_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "simpanan_detail_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 20
            },
            {
                field: "NoTransaksi",
				title: "No. Transaksi",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "Jumlah",
                sortable: false,
                filterable: false,
                width: 100
            },
            {
                field: "SaldoAkhir",
				title: "Saldo Akhir",
                sortable: false,
                filterable: false,
                width: 70
            },
            {
                field: "Status",
				title: "Keterangan",
                sortable: false,
                filterable: false,
                width: 70
            },
            {
                field: "Aksi",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Akun Saya
    if (document.getElementById('akun_saya_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd-m-yyyy",
            autoclose: true,
            todayHighlight: true
        });
    }
});