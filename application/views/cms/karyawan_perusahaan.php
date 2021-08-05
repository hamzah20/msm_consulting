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
                            <li class="active">Employee</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card">
              <div class="card-body">
                <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addKaryawanPerusahaan">Tambah Data</a> 
                <a class="btn btn-sm btn-info" href="#" role="button" data-toggle="modal" data-target="#ImportExport">Import / Export</a> <hr> 
                <div class="form-inline float-left row mb-3 ml-2">
                    <label class="col-form-label mr-1">Show</label>
                    <div>
                    <select class="form-control form-control-sm">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                    </select>
                    </div>
                    <label class="col-form-label ml-1">Entries</label>
                </div> 
                <div class="form-inline float-right">
                    <label class="col-form-label mr-1">Search :</label>
                    <div>
                        <input type="text" name="search">
                    </div> 
                </div> 
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col-1" class="text-center">No</th>
                      <th scope="col-5">Nama Karyawan (Client)</th>
                      <th scope="col-2" class="text-center">NPWP</th>
                      <th scope="col-1" class="text-center">S-Kwn*/Tng</th>
                      <th scope="col-1" class="text-center">Tipe*</th>
                      <th scope="col-2" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="text-center">1</th>
                      <td>Hamzah Aji Pratama</td>
                      <td class="text-center">66.060.320.2-402.000</td>
                      <td>TK/0</td>
                      <td>Lokal</td>
                      <td class="text-center"> 
                        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#detailKaryawanPerusahaan"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('Client/edit_karyawan_perusahaan'); ?>" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-center">2</th>
                      <td>Hamzah Aji Pratama</td>
                      <td class="text-center">66.060.320.2-402.000</td>
                      <td>TK/0</td>
                      <td>Lokal</td>
                      <td class="text-center"> 
                        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#detailKaryawanPerusahaan"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('Client/edit_karyawan_perusahaan'); ?>" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-center">3</th>
                      <td>Hamzah Aji Pratama</td>
                      <td class="text-center">66.060.320.2-402.000</td>
                      <td>TK/0</td>
                      <td>Lokal</td>
                      <td class="text-center"> 
                        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#detailKaryawanPerusahaan"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('Client/edit_karyawan_perusahaan'); ?>" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table> <hr> 
                <div class="float-left">
                    Showing 1 to 10 of 57 entries
                </div>
                <div class="float-right">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                </div>
              </div>
            </div>

            <!-- Add Modal -->
          	<?php $this->load->view('modal/add_karyawan_perusahaan'); ?>
            <!-- End of Add Modal -->

            <!-- Import Export -->
          	<?php $this->load->view('modal/import_export'); ?>
            <!-- End of Import Export -->

            <!-- Detail Karyawan Perusahan -->
            <?php $this->load->view('modal/detail_karyawan_perusahaan'); ?>
            <!-- End of Detail Karyawan Perusahaan -->

        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



