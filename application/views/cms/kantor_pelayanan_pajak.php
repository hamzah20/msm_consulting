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
                            <li class="active">Kantor Pelayanan Pajak</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card">
              <div class="card-body"> 
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('kantor_pelayanan_pajak/add'); ?>" role="button">Tambah Data</a>
                <hr>
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
                      <th scope="col-4">Nama Kantor Pelayanan Pajak / Instansi</th>
                      <th scope="col-2" class="text-center">Telepon</th>
                      <th scope="col-2" class="text-center">Faksimile</th>
                      <th scope="col-2" class="text-center">Email</th>
                      <th scope="col-1" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="text-center">1</th>
                      <td>KPP Pratama Jakarta Matraman</td>
                      <td>(021) 8566928, 088293372684</td>
                      <td>(021) 8566928)</td>
                      <td>kpp.jakarta@mataram.com</td>
                      <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('kantor_pelayanan_pajak/detail'); ?>"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('kantor_pelayanan_pajak/edit'); ?>" role="button" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                     <tr>
                      <th scope="row" class="text-center">1</th>
                      <td>KPP Pratama Jakarta Matraman</td>
                      <td>(021) 8566928, 088293372684</td>
                      <td>(021) 8566928)</td>
                      <td>kpp.jakarta@mataram.com</td>
                      <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('kantor_pelayanan_pajak/detail'); ?>"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('kantor_pelayanan_pajak/edit'); ?>" role="button" role="button"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                     <tr>
                      <th scope="row" class="text-center">1</th>
                      <td>KPP Pratama Jakarta Matraman</td>
                      <td>(021) 8566928, 088293372684</td>
                      <td>(021) 8566928)</td>
                      <td>kpp.jakarta@mataram.com</td>
                      <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('kantor_pelayanan_pajak/detail'); ?>"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('kantor_pelayanan_pajak/edit'); ?>" role="button" role="button"><i class="fa fa-edit"></i></a>
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


        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->



