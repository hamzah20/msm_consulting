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
                            <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Company Profile</a> / Edit Dokumen Elektronik</li>
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
                <a class="nav-link" href="<?php echo base_url('company_profile/edit/utama'); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('company_profile/edit/hitung_pajak'); ?>"><i class="fa fa-calculator mr-1"></i>Hitung Pajak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('company_profile/edit/identitas_wp') ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('company_profile/edit/info_perpajakan') ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('company_profile/edit/identitas_pj'); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('company_profile/edit/dokumen_elektronik'); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
              </li>
            </ul> 
        <hr class="mx-2">
				<form method="POST" action="#" class="px-3">  
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Pokok Wajib Pajak</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Surat Keterangan Terdaftar</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Surat Pengukuhan Pegusaha Kena Pajak</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Tanda Daftar Perusahaan</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Surat Izin Usaha Perdagangan</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Induk Berusaha</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Akta Pendirian Perusahaan</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Akta Perubahan Perusahaan</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Akta Sewa / Pinjam Pakai</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Surat Keterangan Bebas</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="label-utama">Sertifikat Elektronik</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Surat Keterangan Domisili Usaha</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Electronic Filing Identification Number</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Kartu Tanda Penduduk</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="" class="label-utama">Nomor Pokok Wajib Pajak</label>
                                <div class="input-group">
                                  <div class="custom-file pt-1">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label label-utama" for="inputGroupFile04">Choose file</label> 
                                  </div> 
                                </div>
                            </div> 
                        </div>
                    </div>    
                   
                </form>
                <hr class="mx-2">
                <button class="btn btn-sm btn-success col-2 ml-2 mb-3" type="submit">Simpan Perubahan</button>
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



