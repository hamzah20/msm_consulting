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
                            <li class="active">Edit Employee</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">  
        	<div class="card">
              <div class="card-body"> 
                <form method="POST" action="#">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Urut Karyawan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="A00000-01" readonly> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. KTP / No. Passport</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="A00000-01" readonly> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Status PTKP - Tanggungan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby=""placeholder="Tidak Kawin - 0" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Induk Karyawan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="A00000-01" readonly> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="Hamzah Aji Pratama" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Status NPWP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="NPWP" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="Laki-Laki" readonly> 
                                <!-- <select class="form-control option-pegawai" id="">
                                  <option>Laki-Laki</option>
                                  <option>Perempuan</option> 
                                </select>  -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kewarganegaraan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="Indonesia" readonly> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kode NPWP</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="A00000-01" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="Admin" readonly> 
                               <!--  <select class="form-control option-pegawai" id="">
                                  <option>Admin</option>
                                  <option>Manager</option>
                                  <option>Client</option> 
                                </select> -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Masuk</label>
                                        <input type="date" class="form-control form-control-sm option-pegawai" id="" aria-describedby=""> 
                                    </div>  
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Keluar</label>
                                        <input type="date" class="form-control form-control-sm option-pegawai" id="" aria-describedby=""> 
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kode EFIN</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="A00000-01" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Telepon</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="+62 882-9337-XXXX"> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="hamzah@gmail.com"> 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Tipe Pekerja</label>
                                <select class="form-control option-pegawai" id="">
                                  <option>Lokal</option>
                                  <option>Nasional</option>
                                  <option>Internasional</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" id="" aria-describedby="" placeholder="Villa Pamulang, Jl. Bukit II block DF7/16"></textarea> 
                            </div>
                        </div> 
                    </div>
                </form>

                <hr>
                <a class="btn btn-warning text-white float-right mx-1" href="<?php echo base_url('Client/karyawan_perusahaan_detail'); ?>" role="button"> Simpan
                </a>
                <a class="btn btn-secondary float-right" href="<?php echo base_url('Client/delete_karyawan_perusahaan'); ?>" role="button" data-toggle="modal" data-target="#deleteKaryawanPerusahaan"> Batal
                </a>
              </div>
            </div>

            <!-- Delete Karyawan Perusahan -->
            <?php $this->load->view('modal/delete_karyawan_perusahaan'); ?>
            <!-- End of Delete Karyawan Perusahaan -->

        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



