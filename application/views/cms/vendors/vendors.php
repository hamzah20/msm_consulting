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
                            <li class="active">Vendor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content mt-3">      
           <div class="card">
              <div class="card-body"> 
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('vendors/add'); ?>" role="button">Tambah Data</a>
                <hr> 
                <table class="table" id="vendorsTable">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col-1" class="text-center">No</th>
                      <th scope="col-4">Nama Vendor (Lain-Lain)</th>
                      <th scope="col-2" class="text-center">Telepon</th>
                      <th scope="col-2" class="text-center">Faksimile</th>
                      <th scope="col-2" class="text-center">Email</th>
                      <th scope="col-1" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($companies->num_rows() != 0) { ?>
                      <?php foreach ($companies->result() as $vendors) { ?>
                      <tr>
                        <th scope="row" class="text-center"><?= $counter++; ?></th>
                        <td><?= $vendors->VENDOR_NAME; ?></td>
                        <td><?= $vendors->VENDOR_PHONE; ?></td>
                        <td><?= $vendors->VENDOR_FAX; ?></td>
                        <td><?= $vendors->VENDOR_EMAIL; ?></td>
                        <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url('vendors/detail?cid='.$vendors->VENDOR_ID); ?>"><i class="fa fa-info-circle"></i></a>
                          <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('vendors/edit?vid='.$vendors->VENDOR_ID); ?>" role="button" role="button"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>  
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table> 
              </div>
            </div>


        </div> 
        <!-- End of Content -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->
    <script>
    jQuery(document).ready(function($) {

      "use strict";

      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      }) 

      $('#vendorsTable').DataTable();

    });
  </script>

  <?php if ($this->session->userdata('query') == 'error') { ?>
    <script>
      jQuery(document).ready(function($) {

        "use strict";

        Swal.fire({
          title: 'Proses Gagal',
          text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
          icon: 'error',
          showCancelButton: false,
          confirmButtonText: 'Tutup'
        });

      });
    </script>
  <?php } ?>

  <?php if ($this->session->userdata('query') == 'invalid') { ?>
    <script>
      jQuery(document).ready(function($) {

        "use strict";

        Swal.fire({
          title: 'Proses Gagal',
          text: 'ID Perusahaan tidak ditemukan, silahkan coba lagi',
          icon: 'error',
          showCancelButton: false,
          confirmButtonText: 'Tutup'
        });

      });
    </script>
  <?php } ?>

  <?php if ($this->session->userdata('query') == 'success') { ?>
    <script>
      jQuery(document).ready(function($) {

        "use strict";

        Swal.fire({
          title: 'Proses Berhasil',
          text: 'Data berhasil ditambahkan',
          icon: 'success',
          showCancelButton: false,
          confirmButtonText: 'Tutup'
        });
      });
    </script>
  <?php } ?>

  <!-- Footer -->
  <?php $this->load->view('templates_cms/footer'); ?> 
  <!-- End of Footer -->



