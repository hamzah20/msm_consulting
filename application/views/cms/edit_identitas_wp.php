<!-- Header -->
<?php $this->load->view('templates_cms/header'); ?>   
<!-- End of Header -->

    <!-- Sidebar -->
    <?php $this->load->view('templates_cms/sidebar'); ?> 
    <!-- End of Sidebar -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Topbar-->
        <?php $this->load->view('templates_cms/topbar'); ?>   
        <!-- End of Topbar -->
       
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Klien</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Edit Identitas WP</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card px-2"> 
       			<ul class="nav nav-tabs nav-edit-perusahaan m-2 mt-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('company_profile/edit/utama'); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('company_profile/edit/hitung_pajak'); ?>"><i class="fa fa-calculator mr-1"></i>Penugasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('company_profile/edit/identitas_wp') ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('company_profile/edit/info_perpajakan') ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('company_profile/edit/identitas_pj'); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('company_profile/edit/dokumen_elektronik'); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                    </li>
                </ul> 
                <hr class="mx-2">
				<form method="POST" action="<?php echo base_url('General/Client/update_identitas_wp'); ?>" class="px-3">  
                    <input type="hidden" name="editID" value="<?= $company->row()->COMPANY_ID; ?>"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editNama" value="<?= $company->row()->WP_NAME; ?>"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Bentuk Badan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editBentukBadan" value="<?= $company->row()->WP_CATEGORY; ?>"> 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">NPWP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editNPWP" value="<?= $company->row()->WP_NPWP; ?>" > 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Telepon</label>
                                <input type="number" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editNoTelpon" value="<?= $company->row()->WP_PHONE; ?>" > 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Jenis Usaha</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editJenisUsaha" value="<?= $company->row()->WP_BUSINESS_TYPE; ?>" > 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email DJP Online</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editEmailDJPOnline" value="<?= $company->row()->WP_DJP_EMAIL; ?>" > 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat Tempat Kedudukan</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editAlamat" value=""><?= $company->row()->WP_ADDRESS; ?></textarea>  
                            </div>
                        </div>
                    </div>   
                    <hr>
                    <div class="row ml-2">
                        <button class="btn btn-sm btn-success col-2  mb-3" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('company_profile'); ?>">Batalkan Perubahan</a>
                    </div>  
                </form> 
            </div>

            <!-- Add Modal Perusahaan -->
            <?php $this->load->view('modal/add_perusahaan'); ?>
            <!-- End of Add Modal Perusahaan -->

        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <?php if ($this->session->userdata('wp_update') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Data WP Identity berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('wp_update') == 'error') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Gagal',
                    text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });

            });
        </script>
    <?php } ?>

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



