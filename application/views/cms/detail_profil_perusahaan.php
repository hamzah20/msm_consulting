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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Detail Utama</li>
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
                      <a class="nav-link active" href="<?php echo base_url('company_profile/detail/utama'); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('company_profile/detail/hitung_pajak'); ?>"><i class="fa fa-calculator mr-1"></i>Hitung Pajak</a>
                  </li>
                          <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('company_profile/detail/identitas_wp') ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                  </li>
                          <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('company_profile/detail/info_perpajakan') ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                  </li>
                          <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('company_profile/detail/identitas_pj'); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                  </li>
                          <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('company_profile/detail/dokumen_elektronik'); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                  </li>
				</ul> 
                <a class="btn btn-sm btn-warning col-2 ml-2 mb-3 mt-1 text-white" type="submit" href="<?php echo base_url('company_profile/edit/utama'); ?>">Edit Data</a>
                <hr class="mx-2 mt-0">
				<form method="POST" action="#" class="px-3"> 
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Urut Perusahaan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="A00000-01" readonly> 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">NPWP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="NPWP" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Perusahaan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Nama Perusahaan" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Pimpinan Perusahaan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Pimpinan Perusahaan" > 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telepon</label>
                                <input type="number" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="No. Telepon" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="number" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="No. Faksimile" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Email" > 
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Villa Pamulang, Jl. Bukit II block DF7/16"></textarea> 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">User E-Faktur</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="User E-Faktur" > 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password E-Faktur</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password E-Faktur" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Kode Aktifasi</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Kode Aktifasi" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password Aktifasi</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password Aktifasi" > 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Email E-Faktur</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Email E-Faktur" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password Email E-Faktur</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password Email E-Faktur" > 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password E-Nofa</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password E-Nofa" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password E-Phrase</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password E-Phrase" > 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Email SSE/DJP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Email SSE/DJP" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password Email SSE/DJP</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password Email SSW/DJP" >
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Email to Client</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Email to Client" > 
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Password Email to Client</label>
                                <input type="password" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Password Email to Client" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Person in Charge (PIC)</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="PIC" > 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Ditangani Oleh</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Ditangani Oleh" > 
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Metode Perhitungan PPH Pasal 21</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Gross-Up" > 
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



