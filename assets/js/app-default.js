var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";

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
            list_parent.addClass('nav-active nav-expanded');
        }
		
		// Untuk list kota
		if (winPath[2] === 'kota_lists') {
			$('#provinsi').addClass('nav-active');
            $('#master_data').addClass('nav-active nav-expanded');
		}
		
		// Untuk angsuran invoice
		if (winPath[2] === 'angsuran_invoice') {
			$('#angsuran').addClass('nav-active');
            $('#masterPinjaman').addClass('nav-active nav-expanded');
		}
    });

}).apply(this, [jQuery]);