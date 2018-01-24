<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* DEPOSITO */
$route['deposito_lists'] = 'deposito/deposito_lists';

/* HOME */
$route['check_admin_email'] = 'home/check_admin_email';
$route['check_admin_nama'] = 'home/check_admin_nama';
$route['check_admin_tipe_nama'] = 'home/check_admin_tipe_nama';
$route['check_admin_username'] = 'home/check_admin_username';
$route['check_anggota_nama'] = 'home/check_anggota_nama';
$route['check_kota_nama'] = 'home/check_kota_nama';
$route['check_kota_lists'] = 'home/check_kota_lists';
$route['check_no_anggota'] = 'home/check_no_anggota';
$route['check_provinsi_nama'] = 'home/check_provinsi_nama';
$route['check_simpanan_tipe_nama'] = 'home/check_simpanan_tipe_nama';
$route['home'] = 'home/index';

/* LOGIN */
$route['index'] = 'login/index';
$route['logout'] = 'login/logout';
$route['lupa_password'] = 'login/lupa_password';

/* LAINNYA */
$route['admin_edit'] = 'lainnya/admin_edit';
$route['akun_saya'] = 'lainnya/akun_saya';

/* LAPORAN */
$route['laporan_angsuran'] = 'laporan/laporan_angsuran';
$route['laporan_bunga_tabungan'] = 'laporan/laporan_bunga_tabungan';
$route['laporan_pinjaman'] = 'laporan/laporan_pinjaman';
$route['laporan_setoran'] = 'laporan/laporan_setoran';
$route['laporan_tunggakan'] = 'laporan/laporan_tunggakan';

/* MASTER DATA */
$route['admin_tipe_create'] = 'master_data/admin_tipe_create';
$route['admin_tipe_delete'] = 'master_data/admin_tipe_delete';
$route['admin_tipe_edit'] = 'master_data/admin_tipe_edit';
$route['admin_tipe_get'] = 'master_data/admin_tipe_get';
$route['admin_tipe_lists'] = 'master_data/admin_tipe_lists';
$route['kota_create'] = 'master_data/kota_create';
$route['kota_delete'] = 'master_data/kota_delete';
$route['kota_edit'] = 'master_data/kota_edit';
$route['kota_get'] = 'master_data/kota_get';
$route['kota_lists'] = 'master_data/kota_lists';
$route['provinsi_create'] = 'master_data/provinsi_create';
$route['provinsi_delete'] = 'master_data/provinsi_delete';
$route['provinsi_edit'] = 'master_data/provinsi_edit';
$route['provinsi_get'] = 'master_data/provinsi_get';
$route['provinsi_lists'] = 'master_data/provinsi_lists';
$route['simpanan_tipe_create'] = 'master_data/simpanan_tipe_create';
$route['simpanan_tipe_delete'] = 'master_data/simpanan_tipe_delete';
$route['simpanan_tipe_edit'] = 'master_data/simpanan_tipe_edit';
$route['simpanan_tipe_get'] = 'master_data/simpanan_tipe_get';
$route['simpanan_tipe_lists'] = 'master_data/simpanan_tipe_lists';

/* PINJAMAN */
$route['angsuran_create'] = 'pinjaman/angsuran_create';
$route['angsuran_delete'] = 'pinjaman/angsuran_delete';
$route['angsuran_edit'] = 'pinjaman/angsuran_edit';
$route['angsuran_get'] = 'pinjaman/angsuran_get';
$route['angsuran_invoice'] = 'pinjaman/angsuran_invoice';
$route['angsuran_lists'] = 'pinjaman/angsuran_lists';
$route['angsuran_print'] = 'pinjaman/angsuran_print';
$route['angsuran_view'] = 'pinjaman/angsuran_view';
$route['pinjaman_create'] = 'pinjaman/pinjaman_create';
$route['pinjaman_delete'] = 'pinjaman/pinjaman_delete';
$route['pinjaman_edit'] = 'pinjaman/pinjaman_edit';
$route['pinjaman_get'] = 'pinjaman/pinjaman_get';
$route['pinjaman_lists'] = 'pinjaman/pinjaman_lists';
$route['pinjaman_view'] = 'pinjaman/pinjaman_view';

/* SIMPANAN */
$route['simpanan_create'] = 'simpanan/simpanan_create';
$route['simpanan_delete'] = 'simpanan/simpanan_delete';
$route['simpanan_detail_create'] = 'simpanan/simpanan_detail_create';
$route['simpanan_detail_delete'] = 'simpanan/simpanan_detail_delete';
$route['simpanan_detail_edit'] = 'simpanan/simpanan_detail_edit';
$route['simpanan_detail_get'] = 'simpanan/simpanan_detail_get';
$route['simpanan_detail_lists'] = 'simpanan/simpanan_detail_lists';
$route['simpanan_edit'] = 'simpanan/simpanan_edit';
$route['simpanan_get'] = 'simpanan/simpanan_get';
$route['simpanan_lists'] = 'simpanan/simpanan_lists';

/* USER */
$route['admin_create'] = 'user/admin_create';
$route['admin_delete'] = 'user/admin_delete';
$route['admin_edit'] = 'user/admin_edit';
$route['admin_get'] = 'user/admin_get';
$route['admin_lists'] = 'user/admin_lists';
$route['admin_view'] = 'user/admin_view';
$route['anggota_create'] = 'user/anggota_create';
$route['anggota_delete'] = 'user/anggota_delete';
$route['anggota_edit'] = 'user/anggota_edit';
$route['anggota_get'] = 'user/anggota_get';
$route['anggota_lists'] = 'user/anggota_lists';
$route['anggota_view'] = 'user/anggota_view';
