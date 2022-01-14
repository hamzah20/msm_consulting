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
                            <li class="active"> <a href="<?php echo base_url('kantor_pelayanan_pajak'); ?>">Kantor Pelayanan Pajak</a> / Detail </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card px-2">  
                <a class="btn btn-sm btn-warning col-2 ml-2 mb-3 mt-3 text-white" type="submit" href="<?php echo base_url('kantor_pelayanan_pajak/edit?tid='.$tax->row()->OFFICE_ID); ?>">Edit Data</a>
                <hr class="mx-2 mt-0">
				<form method="POST" action="#" class="px-3"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Urut Kantor Pelayanan Pajak</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->OFFICE_NO; ?>"> 
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">Kategori</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->CATEGORY; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Kode KPP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->OFFICE_KPP ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Nama Kantor Pelayanan Pajak</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->OFFICE_NAME; ?>"> 
                            </div> 
                        </div> 
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="label-utama">No. Telpon</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly pplaceholder="....." value="<?= $tax->row()->OFFICE_PHONE; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">No. Faksimile</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->OFFICE_FAX; ?>"> 
                            </div>
                            <div class="form-group">
                                <label for="" class="label-utama">Email</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....." value="<?= $tax->row()->OFFICE_EMAIL; ?>"> 
                            </div>  
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="label-utama">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" readonly placeholder="....."><?= $tax->row()->OFFICE_ADDRESS; ?> </textarea>
                            </div>
                        </div>
                    </div>  
                   <a class="btn btn-sm btn-secondary col-2 mb-3" href="<?php echo base_url('kantor_pelayanan_pajak'); ?>">Kembali</a>
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



