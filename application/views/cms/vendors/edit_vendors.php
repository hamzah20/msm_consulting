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
                            <li class="active"> <a href="<?php echo base_url('vendors'); ?>">Vendors</a> / Edit </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card px-2 pt-3">   
				<form method="POST" action="<?php echo base_url('General/Vendors/update_vendors') ?>" class="px-3"> 
                    <input type="hidden" name="vendorsID" value="<?= $vendors->row()->VENDOR_ID; ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Urut Vendor (Lain-Lain)</label>
                                <input type="text" class="form-control form-control-sm" id="editNoUrutVendor" aria-describedby="" readonly placeholder="....." name="editNoUrutVendor" value="<?= ($vendors->row()->VENDOR_NO != null ? $vendors->row()->VENDOR_NO : '...'); ?>"> 
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Vendor (Lain-Lain)</label>
                                <input type="text" class="form-control form-control-sm" id="editNamaVendor" aria-describedby="" placeholder="....." name="editNama" value="<?= ($vendors->row()->VENDOR_NAME != null ? $vendors->row()->VENDOR_NAME : '...'); ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telpon</label>
                                <input type="text" class="form-control form-control-sm" id="editNoTelpon" aria-describedby="" placeholder="....." name="editPhone" value="<?= ($vendors->row()->VENDOR_PHONE != null ? $vendors->row()->VENDOR_PHONE : '...'); ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="text" class="form-control form-control-sm" id="editNoFaksimile" aria-describedby="" placeholder="....." name="editFax" value="<?= ($vendors->row()->VENDOR_FAX != null ? $vendors->row()->VENDOR_FAX : '...'); ?>"> 
                            </div>  
                        </div> 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="editEmail" aria-describedby="" placeholder="....." name="editEmail" value="<?= ($vendors->row()->VENDOR_EMAIL != null ? $vendors->row()->VENDOR_EMAIL : '...'); ?>"> 
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="editAlamat" aria-describedby="" placeholder="....." name="editAlamat"><?= ($vendors->row()->VENDOR_ADDRESS != null ? $vendors->row()->VENDOR_ADDRESS : '...'); ?> </textarea>
                            </div>
                        </div> 
                    </div>     
                    <hr>
                    <div class="row">
                        <button class="btn btn-sm btn-success col-2 ml-2 mb-3" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('kantor_pelayanan_pajak'); ?>">Batalkan Perubahan</a>
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

    <?php if ($this->session->userdata('vendor_update') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Data vendor berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('vendor_update') == 'error') { ?>
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



