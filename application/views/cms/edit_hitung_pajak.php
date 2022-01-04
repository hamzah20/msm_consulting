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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Edit Hitung Pajak</li>
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
                  <a class="nav-link active" href="<?= base_url('company_profile/edit/hitung_pajak?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-calculator mr-1"></i>Penugasan</a>
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
                  <a class="nav-link" href="<?= base_url('company_profile/edit/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
              </li>
              </ul> 
                  <hr class="mx-2">
                          <form method="POST" action="<?php echo base_url('General/Client/update_hitung_pajak'); ?>" class="px-3">  
                    <input type="hidden" name="editIDCompany" value="<?= $company->row()->COMPANY_ID; ?>">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPh 21</label> 
                                <select class="form-control form-control-sm option-pegawai" name="editPPH21">
                                  <option value="Iya"   <?php if($company->row()->TAX_21=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_21=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPH211">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_21_1) {
                                        echo '<option value="'.$company->row()->TAX_21_1.'" selected="selected">'.$company->row()->TAX_21_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPH212">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_21_2) {
                                        echo '<option value="'.$company->row()->TAX_21_2.'" selected="selected">'.$company->row()->TAX_21_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPH213">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_21_3) {
                                        echo '<option value="'.$company->row()->TAX_21_3.'" selected="selected">'.$company->row()->TAX_21_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPh 22</label>
                                <select class="form-control form-control-sm option-pegawai" name="editPPH22">
                                  <option value="Iya"   <?php if($company->row()->TAX_22=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_22=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPH221">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_22_1) {
                                        echo '<option value="'.$company->row()->TAX_22_1.'" selected="selected">'.$company->row()->TAX_22_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPH222">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_22_2) {
                                        echo '<option value="'.$company->row()->TAX_22_2.'" selected="selected">'.$company->row()->TAX_22_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPH223">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_22_3) {
                                        echo '<option value="'.$company->row()->TAX_22_3.'" selected="selected">'.$company->row()->TAX_22_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                    </div> 
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPh 23</label>
                                <select class="form-control form-control-sm option-pegawai" name="editPPH23">
                                  <option value="Iya"   <?php if($company->row()->TAX_23=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_23=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPH231">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_23_1) {
                                        echo '<option value="'.$company->row()->TAX_23_1.'" selected="selected">'.$company->row()->TAX_23_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPH232">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_23_2) {
                                        echo '<option value="'.$company->row()->TAX_23_2.'" selected="selected">'.$company->row()->TAX_23_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPH233">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_23_3) {
                                        echo '<option value="'.$company->row()->TAX_23_3.'" selected="selected">'.$company->row()->TAX_23_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                    </div> 
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPh 4(2)</label>
                               <select class="form-control form-control-sm option-pegawai" name="editPPH42">
                                  <option value="Iya"   <?php if($company->row()->TAX_42=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_42=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPH421">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_42_1) {
                                        echo '<option value="'.$company->row()->TAX_42_1.'" selected="selected">'.$company->row()->TAX_42_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPH422">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_42_2) {
                                        echo '<option value="'.$company->row()->TAX_42_2.'" selected="selected">'.$company->row()->TAX_42_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPH423">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_42_3) {
                                        echo '<option value="'.$company->row()->TAX_42_3.'" selected="selected">'.$company->row()->TAX_42_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                    </div>    
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPh 25</label>
                                <select class="form-control form-control-sm option-pegawai" name="editPPH25">
                                  <option value="Iya"   <?php if($company->row()->TAX_25=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_25=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPH251">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_25_1) {
                                        echo '<option value="'.$company->row()->TAX_25_1.'" selected="selected">'.$company->row()->TAX_25_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPH252">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_25_2) {
                                        echo '<option value="'.$company->row()->TAX_25_2.'" selected="selected">'.$company->row()->TAX_25_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPH253">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_25_3) {
                                        echo '<option value="'.$company->row()->TAX_25_3.'" selected="selected">'.$company->row()->TAX_25_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                    </div>    
                     <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">Untuk PPN</label>
                                <select class="form-control form-control-sm option-pegawai" name="editPPN">
                                  <option value="Iya"   <?php if($company->row()->TAX_PPN=="Iya"){echo "selected";}?>>Iya</option>
                                  <option value="Tidak" <?php if($company->row()->TAX_PPN=="Tidak"){echo "selected";}?>>Tidak</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (1)</label>
                                 <select class="custom-select" name="editPPN1">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_PPN_1) {
                                        echo '<option value="'.$company->row()->TAX_PPN_1.'" selected="selected">'.$company->row()->TAX_PPN_1.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (2)</label>
                                 <select class="custom-select" name="editPPN2">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_PPN_2) {
                                        echo '<option value="'.$company->row()->TAX_PPN_2.'" selected="selected">'.$company->row()->TAX_PPN_2.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (3)</label>
                                 <select class="custom-select" name="editPPN3">
                                  <?php 
                                    foreach ($list_user->result() as $user) { 
                                      if ($user->NAME == $company->row()->TAX_PPN_3) {
                                        echo '<option value="'.$company->row()->TAX_PPN_3.'" selected="selected">'.$company->row()->TAX_PPN_3.'</option>';
                                      } else{
                                        echo '<option value="'.$user->NAME.'">'.$user->NAME.'</option>';
                                      }
                                    } 
                                  ?> 
                                </select>
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
    <?php if ($this->session->userdata('hitung_pajak') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {

                "use strict";

                Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Data penugasan berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('hitung_pajak') == 'error') { ?>
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



