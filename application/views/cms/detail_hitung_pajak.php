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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Detail Hitung Pajak</li>
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
                    <a class="nav-link" href="<?= base_url('company_profile/detail/utama?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('company_profile/detail/hitung_pajak?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-calculator mr-1"></i>Penugasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/identitas_wp?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/info_perpajakan?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/identitas_pj?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                </li>
            </ul>
            <a class="btn btn-sm btn-warning col-2 ml-2 mb-3 mt-1 text-white" type="submit" href="<?php echo base_url('company_profile/edit/hitung_pajak'); ?>">Edit Data</a>
            <hr class="mx-2 mt-0">
				    <form method="POST" action="#" class="px-3">  
              <div class="row">
                  <div class="col-3">
                      <div class="form-group">
                          <label for="" class="label-hitung-pajak">Untuk PPh 21</label>
                          <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_21; ?>" readonly>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-group">
                          <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (1)</label>
                          <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_21_1; ?>" readonly>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-group">
                          <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (3)</label>
                          <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_21_2; ?>" readonly>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-group">
                          <label for="" class="label-hitung-pajak">PPh 21 - Ditangani Oleh (3)</label>
                          <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_21_2; ?>" readonly>
                      </div>
                  </div>
              </div>      
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">Untuk PPh 22</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_22; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (1)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_22_1; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_22_2; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 22 - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_22_3; ?>" readonly>
                        </div>
                    </div>
                </div> 
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">Untuk PPh 23</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_23; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (1)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_23_1; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_23_2; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 23 - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_23_3; ?>" readonly>
                        </div>
                    </div>
                </div> 
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">Untuk PPh 4(2)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_42; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (1)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_42_1; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (2)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_42_2; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 4(2) - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_42_3; ?>" readonly>
                        </div>
                    </div>
                </div>    
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">Untuk PPh 25</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_25; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (1)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_25_1; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (2)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_25_2; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPh 25 - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_25_3; ?>" readonly>
                        </div>
                    </div>
                </div>    
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">Untuk PPN</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_PPN; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (1)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_PPN_1; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (2)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_PPN_2; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="label-hitung-pajak">PPN - Ditangani Oleh (3)</label>
                            <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $company->row()->TAX_PPN_3; ?>" readonly>
                        </div>
                    </div>
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

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



