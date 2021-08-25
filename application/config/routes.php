<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// DATA - Company Profile
$route['company_profile']                             = 'General/Client/profil_perusahaan';

// DATA - Company Profile - Detail
$route['company_profile/detail/utama']                = 'General/Client/detail_profil_perusahaan';
$route['company_profile/detail/hitung_pajak']         = 'General/Client/detail_hitung_pajak';
$route['company_profile/detail/identitas_wp']         = 'General/Client/detail_identitas_wp';
$route['company_profile/detail/info_perpajakan']      = 'General/Client/detail_info_perpajakan';
$route['company_profile/detail/identitas_pj']         = 'General/Client/detail_identitas_pj';
$route['company_profile/detail/dokumen_elektronik']   = 'General/Client/detail_dokumen_elektronik';

// DATA - Company Profile - Edit
$route['company_profile/edit/utama']                  = 'General/Client/edit_profil_perusahaan';
$route['company_profile/edit/hitung_pajak']           = 'General/Client/edit_hitung_pajak';
$route['company_profile/edit/identitas_wp']           = 'General/Client/edit_identitas_wp';
$route['company_profile/edit/info_perpajakan']        = 'General/Client/edit_info_perpajakan';
$route['company_profile/edit/identitas_pj']           = 'General/Client/edit_identitas_pj';
$route['company_profile/edit/dokumen_elektronik']     = 'General/Client/edit_dokumen_elektronik';

// DATA - Employee
$route['employee']                                    = 'General/Employee';
$route['employee/detail']                             = 'General/Employee/karyawan_perusahaan';
$route['employee/edit']                               = 'General/Employee/edit_karyawan_perusahaan';

// UTILITAS - Kantor Pelayanan Pajak
$route['kantor_pelayanan_pajak']                      = 'Utility/kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/add']                  = 'Utility/add_kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/detail']               = 'Utility/detail_kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/edit']                 = 'Utility/edit_kantor_pelayanan_pajak';

// UTILITAS - Vendor
$route['vendors']                                     = 'Utility/vendors';
$route['vendors/add']                                 = 'Utility/add_vendors';
$route['vendors/detail']                              = 'Utility/detail_vendors';
$route['vendors/edit']                                = 'Utility/edit_vendors';

// UTILITAS - MSM Group
$route['msm_group']                                   = 'Utility/msm_group';
$route['msm_group/add']                               = 'Utility/add_msm_group';
$route['msm_group/detail']                            = 'Utility/detail_msm_group';
$route['msm_group/edit']                              = 'Utility/edit_msm_group';

// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 21
$route['pph_21']									  = 'Kebutuhan_Pajak/pph_21';
$route['pph_21/bulan']								  = 'Kebutuhan_Pajak/pph_21_bulan';
$route['pph_21/tahun']								  = 'Kebutuhan_Pajak/pph_21_tahun';
$route['pph_21/bulan/summary']						  = 'Kebutuhan_Pajak/pph_21_bulan_summary';
$route['pph_21/bulan/summary/karyawan/detail']		  = 'Kebutuhan_Pajak/pph_21_bulan_summary_karyawan';
$route['pph_21/bulan/summary/aktifitas_pajak']		  = 'Kebutuhan_Pajak/aktifitas_pajak';
$route['pph_21/bulan/summary/aktifitas_pajak/edit']	  = 'Kebutuhan_Pajak/edit_aktifitas_pajak';
