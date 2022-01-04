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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Edit Info Perpajakan</li>
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
                        <a class="nav-link" href="<?= base_url('company_profile/edit/utama?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('company_profile/edit/hitung_pajak?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-calculator mr-1"></i>Penugasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('company_profile/edit/identitas_wp?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('company_profile/edit/info_perpajakan?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('company_profile/edit/identitas_pj?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('company_profile/edit/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                    </li>
                </ul> 
                <hr class="mx-2">
                <form method="POST" action="<?php echo base_url('General/Client/update_info_perpajakan'); ?>" class="px-3">  
                    <input type="hidden" name="editIDCompany" value="<?= $company->row()->COMPANY_ID; ?>"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">KPP Administrasi</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editKPP" value="<?= $company->row()->TAX_KPP_ADMIN; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Telepon KPP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editNoTelpon" value="<?= $company->row()->TAX_KPP_PHONE; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Account Representative</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editAccRep" value="<?= $company->row()->TAX_ACCOUNT_REP; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Status WP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editStatusWP" value="<?= $company->row()->TAX_WP_STATUS; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Status PKP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="....." name="editStatusPKP" value="<?= $company->row()->TAX_PKP_STATUS; ?>"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Kewajiban Perpajakan</label>
                                <?php
                               // echo $tax_info->row()->TAX_OBLIGATION;
                                   //echo  strpos($tax_info->row()->TAX_OBLIGATION,'PPh_Pasal_15;');
                                  
                                ?>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 15;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 15;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 15</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 21;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 21;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 21</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 22;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 22;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 22</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 23;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 23;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 23</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 25;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 25;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 25</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 26;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 26;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 26</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 27;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Pasal 29;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Pasal 29</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Pasal 4(2);');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Final Pasal 4(2);">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Final Pasal 4 ayat (2)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPh Final UMKM;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPh Final UMKM;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPh Final UMKM</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" <?php  echo  $this->incube->checkPajak($tax_info->row()->TAX_OBLIGATION,'PPN;');?> class="form-check-input" id="KewajibanPerpajakan" name="editKewajibanPerpajakan[]" value="PPN;">
                                    <label class="form-check-label label-utama" for="exampleCheck1">PPN</label>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Simpan Perubahan</button>
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
    <?php if ($this->session->userdata('info_perpajakan') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Data Info Perpajakan Identity berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('info_perpajakan') == 'error') { ?>
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



