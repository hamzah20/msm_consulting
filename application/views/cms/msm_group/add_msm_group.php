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
                            <li class="active"> <a href="<?php echo base_url('msm_group'); ?>">MSM Group</a> / Add </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card px-2 pt-3">   
				<form method="POST" action="<?php echo base_url('General/MSM_group/insert_msm_group'); ?>" class="px-3">  
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Personil</label>
                                <input type="text" class="form-control form-control-sm" id="txtPersonil" name="txtPersonil" aria-describedby=""> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telpon</label>
                                <input type="text" class="form-control form-control-sm" id="txtPhone" name="txtPhone" aria-describedby=""> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="text" class="form-control form-control-sm" id="txtFax" name="txtFax" aria-describedby="">
                            </div>  
                        </div> 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="txtEmail" name="txtEmail" aria-describedby=""> 
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="txtAlamat" name="txtAlamat" aria-describedby=""> </textarea>
                            </div>
                        </div> 
                    </div>     
                   <hr>
                    <div class="row ml-1">
                        <button class="btn btn-sm btn-success col-2 mb-3" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('msm_group'); ?>">Batalkan Perubahan</a>
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



