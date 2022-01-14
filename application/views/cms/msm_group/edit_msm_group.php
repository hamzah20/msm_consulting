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
                        <h1>Utilitas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"> <a href="<?php echo base_url('msm_group'); ?>">MSM Group</a> / Edit </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card px-2 pt-3">   
				<form method="POST" action="<?php echo base_url('General/MSM_Group/update_msm_group') ?>" class="px-3"> 
                    <input type="hidden" name="msmgroupID" value="<?= $msm->row()->MSMGROUP_ID; ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Urut Personil MSM Group</label>
                                <input type="text" class="form-control form-control-sm" id="editNoUrutPersonil" aria-describedby="" readonly placeholder="....." name="editNoUrutPersonil" placeholder="....." name="" value="<?= ($msm->row()->MSMGROUP_NO != null ? $msm->row()->MSMGROUP_NO : '...'); ?>"> 
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Personil</label>
                                <input type="text" class="form-control form-control-sm" id="editNamaPersonil" aria-describedby="" name="editNama" placeholder="....." name="" value="<?= ($msm->row()->MSMGROUP_NAME != null ? $msm->row()->MSMGROUP_NAME : '...'); ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telpon</label>
                                <input type="text" class="form-control form-control-sm" id="editNoTelpon" aria-describedby="" name="editPhone" placeholder="....." name="" value="<?= ($msm->row()->MSMGROUP_PHONE != null ? $msm->row()->MSMGROUP_PHONE : '...'); ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="text" class="form-control form-control-sm" id="editNoFaksimile" aria-describedby="" name="editFax" placeholder="....." name="" value="<?= ($msm->row()->MSMGROUP_FAX != null ? $msm->row()->MSMGROUP_FAX : '...'); ?>"> 
                            </div>  
                        </div> 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="editEmail" aria-describedby="" name="editEmail" placeholder="....." name="" value="<?= ($msm->row()->MSMGROUP_EMAIL != null ? $msm->row()->MSMGROUP_EMAIL : '...'); ?>"> 
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="editAlamat" aria-describedby="" name="editAlamat" placeholder="....." name=""><?= ($msm->row()->MSMGROUP_ADDRESS != null ? $msm->row()->MSMGROUP_ADDRESS : '...'); ?></textarea>
                            </div>
                        </div> 
                    </div>     
                   <hr class="mx-2">
                    <div class="row ml-2">
                        <button class="btn btn-sm btn-success col-2 ml-2 mb-3" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" href="<?php echo base_url('msm_group'); ?>">Kembali</a>
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

    <?php if ($this->session->userdata('msm_update') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Data MSM Group berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('msm_update') == 'error') { ?>
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



