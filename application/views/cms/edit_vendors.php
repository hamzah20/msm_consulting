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
				<form method="POST" action="#" class="px-3"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Urut Vendor (Lain-Lain)</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly value="PRF2020-00001"> 
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Vendor (Lain-Lain)</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="Telkom STO, Palmerah"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telpon</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="(021) 85669284, 088293372684"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="(021) 85669284"> 
                            </div>  
                        </div> 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="telkom.palmerah@gmail.com"> 
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" value="Alamat"> </textarea>
                            </div>
                        </div> 
                    </div>     
                   
                </form> 
                <hr class="mx-2">
                <div class="row ml-2">
                    <button class="btn btn-sm btn-success col-2 ml-2 mb-3" type="submit">Simpan Perubahan</button>
                    <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('kantor_pelayanan_pajak'); ?>">Batalkan Perubahan</a>
                </div>
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



