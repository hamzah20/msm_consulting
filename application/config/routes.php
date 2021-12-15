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
$route['kantor_pelayanan_pajak']                      = 'General/Tax_office/kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/add']                  = 'General/Tax_office/add_kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/detail']               = 'General/Tax_office/detail_kantor_pelayanan_pajak';
$route['kantor_pelayanan_pajak/edit']                 = 'General/Tax_office/edit_kantor_pelayanan_pajak';

// UTILITAS - Vendor
$route['vendors']                                     = 'General/Vendors/vendors';
$route['vendors/add']                                 = 'General/Vendors/add_vendors';
$route['vendors/detail']                              = 'General/Vendors/detail_vendors';
$route['vendors/edit']                                = 'General/Vendors/edit_vendors';

// UTILITAS - MSM Group
$route['msm_group']                                   = 'General/MSM_group/msm_group';
$route['msm_group/add']                               = 'General/MSM_group/add_msm_group';
$route['msm_group/detail']                            = 'General/MSM_group/detail_msm_group';
$route['msm_group/edit']                              = 'General/MSM_group/edit_msm_group';

// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 21
$route['pph_21']                                        = 'PPH/Pph21/index';
$route['pph_21/bulan']                                  = 'PPH/Pph21/pph_21_bulan';
$route['pph_21/tahun']                                  = 'PPH/Pph21/pph_21_tahun';
$route['pph_21/bulan/summary']                          = 'PPH/Pph21/pph_21_bulan_summary';
$route['pph_21/bulan/summary/tidak_tetap']              = 'PPH/Pph21/pph_21_bulan_summary_tidak_tetap';
$route['pph_21/bulan/approve']                          = 'PPH/Pph21/pph_21_bulan_approve';
$route['pph_21/bulan/summary/karyawan/detail']          = 'PPH/Pph21/pph_21_bulan_summary_karyawan';
$route['pph_21/bulan/summary/karyawan/edit']          	= 'PPH/Pph21/edit_pph_21_bulan_summary_karyawan';
$route['pph_21/bulan/summary/aktifitas_pajak']          = 'PPH/Pph21/aktifitas_pajak';
$route['pph_21/bulan/summary/aktifitas_pajak/edit']     = 'PPH/Pph21/edit_aktifitas_pajak';
$route['pph_21/spt']								    = 'PPH/Pph21/spt21';
$route['pph_21/spt_masa']								= 'PPH/Pph21/spt21_masa';


// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 22
$route['pph_22']                                        = 'PPH/Pph22/index';
$route['pph_22/bulan']                                  = 'PPH/Pph22/pph_22_bulan';
$route['pph_22/tahun']                                  = 'PPH/Pph22/pph_22_tahun';
$route['pph_22/bulan/summary']                          = 'PPH/Pph22/pph_22_bulan_summary';
$route['pph_22/bulan/approve']                          = 'PPH/Pph22/pph_22_bulan_approve';
$route['pph_22/bulan/summary/karyawan/detail']          = 'PPH/Pph22/pph_22_bulan_summary_karyawan';
$route['pph_22/bulan/summary/karyawan/edit']          	= 'PPH/Pph22/edit_pph_22_bulan_summary_karyawan';
$route['pph_22/bulan/summary/aktifitas_pajak']          = 'PPH/Pph22/aktifitas_pajak';
$route['pph_22/bulan/summary/aktifitas_pajak/edit']     = 'PPH/Pph22/edit_aktifitas_pajak';
$route['pph_22/lawan_transaksi']     					= 'PPH/Pph22/LawanTransaksi';
$route['pph_22/lawan_transaksi/delete']     			= 'PPH/Pph22/delete_lawan_transaksi';
$route['pph_22/lawan_transaksi/edit']     				= 'PPH/Pph22/edit_lawan_transaksi';
$route['pph_22/transaksi/add']     						= 'PPH/Pph22/add_transaksi';
$route['pph_22/spt_masa']								= 'PPH/Pph22/spt22_masa';
$route['pph_22/bukti_pungut']								= 'PPH/Pph22/bukti_pungut_22';

// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 23
$route['pph_23']                                        = 'PPH/Pph23/index';
$route['pph_23/bulan']                                  = 'PPH/Pph23/pph_23_bulan';
$route['pph_23/tahun']                                  = 'PPH/Pph23/pph_23_tahun';
$route['pph_23/bulan/summary']                          = 'PPH/Pph23/pph_23_bulan_summary';
$route['pph_23/bulan/approve']                          = 'PPH/Pph23/pph_23_bulan_approve';
$route['pph_23/bulan/summary/karyawan/detail']          = 'PPH/Pph23/pph_23_bulan_summary_karyawan';
$route['pph_23/bulan/summary/karyawan/edit']          	= 'PPH/Pph23/edit_pph_23_bulan_summary_karyawan';
$route['pph_23/bulan/summary/aktifitas_pajak']          = 'PPH/Pph23/aktifitas_pajak';
$route['pph_23/bulan/summary/aktifitas_pajak/edit']     = 'PPH/Pph23/edit_aktifitas_pajak';
$route['pph_23/lawan_transaksi']     					= 'PPH/Pph23/LawanTransaksi';
$route['pph_23/lawan_transaksi/delete']     			= 'PPH/Pph23/delete_lawan_transaksi';
$route['pph_23/lawan_transaksi/edit']     				= 'PPH/Pph23/edit_lawan_transaksi';
$route['pph_23/transaksi/add']     						= 'PPH/Pph23/add_transaksi';
$route['pph_23/spt_masa']								= 'PPH/Pph23/spt23_masa';

// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 25
$route['pph_25']                                        = 'PPH/Pph25/index';
$route['pph_25/fpdl']                                   = 'PPH/Pph25/pph_25_fpdl';
$route['pph_25/editmasukan']                            = 'PPH/Pph25/pph_25_edit_masukan';

// KEBUTUHAN PAJAK - HITUNG PAJAK - PPH 4(2)
$route['pph_42']                                        = 'PPH/Pph42/index';
$route['pph_42/bulan']                                  = 'PPH/Pph42/pph_42_bulan';
$route['pph_42/tahun']                                  = 'PPH/Pph42/pph_42_tahun';
$route['pph_42/bulan/summary']                          = 'PPH/Pph42/pph_42_bulan_summary';
$route['pph_42/bulan/summary/umkm']                     = 'PPH/Pph42/pph_42_bulan_summary_umkm';
$route['pph_42/bulan/approve']                          = 'PPH/Pph42/pph_42_bulan_approve';
$route['pph_42/bulan/summary/karyawan/detail']          = 'PPH/Pph42/pph_42_bulan_summary_karyawan';
$route['pph_42/bulan/summary/karyawan/edit']          	= 'PPH/Pph42/edit_pph_42_bulan_summary_karyawan';
$route['pph_42/bulan/summary/karyawan/umkm/edit']      	= 'PPH/Pph42/edit_pph_42_bulan_summary_karyawan_umkm';
$route['pph_42/bulan/summary/aktifitas_pajak']          = 'PPH/Pph42/aktifitas_pajak';
$route['pph_42/bulan/summary/aktifitas_pajak/edit']     = 'PPH/Pph42/edit_aktifitas_pajak';
$route['pph_42/transaksi/add']     						= 'PPH/Pph42/add_transaksi';
$route['pph_42/transaksi/umkm/add']     				= 'PPH/Pph42/add_transaksi_umkm';

// Custom Task
$route['projecttype']                                    = 'General/ProjectType';
$route['milestone']                                    = 'General/Milestone';
$route['project']                                    = 'General/Project';

//User
$route['user_msm'] 											= 'General/User';
$route['USER_MSM'] 											= 'General/User';
