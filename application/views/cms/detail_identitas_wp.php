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
                        <h1>Clients</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Company Profile</li>
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
                        <a class="nav-link" href="<?php echo base_url('Client/detail_profil_perusahaan'); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Client/detail_hitung_pajak'); ?>"><i class="fa fa-calculator mr-1"></i>Hitung Pajak</a>
                    </li>
  				  	<li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('Client/detail_identitas_wp') ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                    </li>
  				  	<li class="nav-item">
  				    	<a class="nav-link" href="<?php echo base_url('Client/detail_info_perpajakan') ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
  				  	</li>
  				  	<li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Client/detail_identitas_pj'); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                    </li>
  				  	<li class="nav-item">
  				    	<a class="nav-link" href="<?php echo base_url('Client/detail_dokumen_elektronik'); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
  				  	</li>
				</ul> 
                <a class="btn btn-sm btn-warning col-2 ml-2 mb-3 mt-1 text-white" type="submit" href="<?php echo base_url('Client/edit_identitas_wp'); ?>">Edit Data</a>
                <hr class="mx-2 mt-0">
				<form method="POST" action="#" class="px-3">  
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Nama"> 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Bentuk Badan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Bentuk Badan"> 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">NPWP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="NPWP" > 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Telepon</label>
                                <input type="number" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Nomor Telepon" > 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Jenis Usaha</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="NPWP" > 
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email DJP Online</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Email DJP Online" > 
                            </div>
                        </div>
                    </div>      
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat Tempat Kedudukan</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="Alamat"></textarea>  
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



