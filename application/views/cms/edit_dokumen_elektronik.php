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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Edit Dokumen Elektronik</li>
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
                  <a class="nav-link" href="<?= base_url('company_profile/edit/info_perpajakan?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('company_profile/edit/identitas_pj?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="<?= base_url('company_profile/edit/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
              </li>
            </ul> 
            <hr class="mx-2">
                        <!-- <form method="POST" action="<?php echo base_url('General/Client/update_dokumen_elektronik'); ?>" class="px-3">   -->
               <?php
               echo  form_open_multipart('General/Client/update_dokumen_elektronik');
               ?>
                    <div class="row">
                        <div class="col-4">
                           <input type="hidden" name="company_id" value="<?php echo $company->row()->COMPANY_ID?>">
                          <?php

                            foreach ($company->result() as $key) {
                              ?>
                                <div class="form-group">
                                  <label for="" class="label-utama"><?php echo $key->DOC_NAME; ?></label> 
                                 <?php echo $this->incube->checkstatus( $key->DOC_STATUS);?>
                                  <div class="input-group">
                                    <div class="custom-file pt-1">
                                   
                                      <input type="file" class="custom-file-input" id="inputGroupFile04" name="<?php echo $key->DOC_ID;?>" aria-describedby="inputGroupFileAddon04">
                                      <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                    </div> 
                                  </div>
                              </div> 
                              <?php
                            }
                          ?>
                        </div> 
                        <div class="col-4">
                          <?php
                            foreach ($company1->result() as $key1) {
                              ?>
                                <div class="form-group">
                                  <label for="" class="label-utama"><?php echo $key1->DOC_NAME?></label> 
                                 <?php echo $this->incube->checkstatus( $key1->DOC_STATUS);?>
                                  <div class="input-group">
                                    <div class="custom-file pt-1">
                                      <input type="file" class="custom-file-input" id="inputGroupFile04"  name="<?php echo $key1->DOC_ID;?>"  aria-describedby="inputGroupFileAddon04">
                                      <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                    </div> 
                                  </div>
                              </div> 
                              <?php
                            }
                          ?>
                        </div> 
                        <div class="col-4">
                          <?php
                            foreach ($company2->result() as $key2) {
                              ?>
                                <div class="form-group">
                                  <label for="" class="label-utama"><?php echo $key2->DOC_NAME?></label> 
                                  <?php echo $this->incube->checkstatus( $key2->DOC_STATUS);?>
                                  <div class="input-group">
                                    <div class="custom-file pt-1">
                                      <input type="file" class="custom-file-input" id="inputGroupFile04" name="<?php echo $key2->DOC_ID; ?>" aria-describedby="inputGroupFileAddon04">
                                      <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                    </div> 
                                  </div>
                              </div> 
                              <?php
                            }
                          ?>
                        </div>
                    </div>   
                   
              
                <hr class="mx-2">
                <div class="row ml-2">
                    <input type="submit" class="btn btn-sm btn-success col-2 ml-2 mb-3" value="Simpan Perubahan">
                    <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('company_profile'); ?>">Batalkan Perubahan</a>
                </div>
                  <!-- </form> -->
                  <?php
                 echo form_close();
                 ?>
            </div>

            <!-- Add Modal Perusahaan -->
            <?php $this->load->view('modal/add_perusahaan'); ?>
            <!-- End of Add Modal Perusahaan -->

        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->
  <?php if ($this->session->userdata('info_document') == 'success') { ?>
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
    <?php 
      $this->session->set_flashdata('info_document', '');
  } ?>

    <?php if ($this->session->userdata('info_document') == 'error') { ?>
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
    <?php 
      $this->session->set_flashdata('info_document', '');
    } ?>
    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



