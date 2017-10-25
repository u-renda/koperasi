(function($) {

	'use strict';
	
	/*
	Sidebar
	*/
    var list_child = $('li.list-child');
    
    // untuk dashboard
    if (winPath[2] === 'home') {
        $('.list-dashboard').addClass('nav-active');
    }
    
    list_child.each(function() {
        var href = $(this).find('a').attr('href');
        var list_parent = $(this).closest("li.list-parent");
        var winPathName = window.location.pathname;
        var newPath = winOrigin + winPathName;
        
        if (href === newPath) {
            $(this).addClass('nav-active');
            list_parent.addClass('nav-active');
        }
    });
    
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
                width: 100
            },
            {
                field: "Nama",
                width: 200
            },
            {
                field: "Kota",
                width: 150
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
});