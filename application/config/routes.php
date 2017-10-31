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
$route['home'] = 'home/index';

/* LOGIN */
$route['index'] = 'login/index';
$route['logout'] = 'login/logout';
$route['lupa_password'] = 'login/lupa_password';

/* LAINNYA */
$route['akun_saya'] = 'lainnya/akun_saya';

/* LAPORAN */
$route['laporan_angsuran'] = 'laporan/laporan_angsuran';
$route['laporan_bunga_tabungan'] = 'laporan/laporan_bunga_tabungan';
$route['laporan_pinjaman'] = 'laporan/laporan_pinjaman';
$route['laporan_setoran'] = 'laporan/laporan_setoran';
$route['laporan_tunggakan'] = 'laporan/laporan_tunggakan';

/* MASTER DATA */
$route['admin_tipe_get'] = 'master_data/admin_tipe_get';
$route['admin_tipe_lists'] = 'master_data/admin_tipe_lists';
$route['kota_get'] = 'master_data/kota_get';
$route['kota_lists'] = 'master_data/kota_lists';
$route['provinsi_get'] = 'master_data/provinsi_get';
$route['provinsi_lists'] = 'master_data/provinsi_lists';
$route['simpanan_tipe_get'] = 'master_data/simpanan_tipe_get';
$route['simpanan_tipe_lists'] = 'master_data/simpanan_tipe_lists';

/* PINJAMAN */
$route['angsuran_get'] = 'pinjaman/angsuran_get';
$route['angsuran_lists'] = 'pinjaman/angsuran_lists';
$route['pinjaman_get'] = 'pinjaman/pinjaman_get';
$route['pinjaman_lists'] = 'pinjaman/pinjaman_lists';

/* SIMPANAN */
$route['setor_ambil_lists'] = 'simpanan/setor_ambil_lists';
$route['simpanan_lists'] = 'simpanan/simpanan_lists';

/* USER */
$route['admin_get'] = 'user/admin_get';
$route['admin_lists'] = 'user/admin_lists';
$route['anggota_get'] = 'user/anggota_get';
$route['anggota_lists'] = 'user/anggota_lists';
