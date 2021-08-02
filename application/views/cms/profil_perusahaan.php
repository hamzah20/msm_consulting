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
           <div class="card">
              <div class="card-body">
                <a class="btn btn-primary" href="#" role="button">Tambah Data</a> <hr> 
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
                      <th scope="col-5">Nama Perusahaan (Client)</th>
                      <th scope="col-3" class="text-center">NPWP</th>
                      <th scope="col-2" class="text-center">KLU</th>
                      <th scope="col-1" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="text-center">1</th>
                      <td>PT. WIJAYA KARYA</td>
                      <td class="text-center">90.529.958.2-039.000</td>
                      <td class="text-center">74100</td>
                      <td class="text-center"><a class="btn btn-primary" href="#" role="button">Detail</a></td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-center">2</th>
                      <td>PT. WIJAYA KARYA</td>
                      <td class="text-center">90.529.958.2-039.000</td>
                      <td class="text-center">74100</td>
                      <td class="text-center"><a class="btn btn-primary" href="#" role="button">Detail</a></td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-center">3</th>
                      <td>PT. WIJAYA KARYA</td>
                      <td class="text-center">90.529.958.2-039.000</td>
                      <td class="text-center">74100</td>
                      <td class="text-center"><a class="btn btn-primary" href="#" role="button">Detail</a></td>
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



