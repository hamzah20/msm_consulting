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
          <h1>Hitung Pajak</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">PPH 21</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPPH21Perusahaan">Tambah Data</a>
        <hr>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-2">Nama Perusahaan</th>
              <th scope="col-1" class="text-center">NPWP</th>
              <th scope="col-1" class="text-center">Periode (Tahun)</th>
              <th scope="col-1" class="text-center">Total Penghasilan Bruto</th> 
              <th scope="col-1" class="text-center">PPh 21 KB (LB)</th> 
              <th scope="col-4" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>  
                <tr>
                  <th scope="row" class="text-center">1</th>
                  <td>PT. Wijaya Karya</td>
                  <td class="text-center">90.519.XXX.X-XXX.XXX</td> 
                  <td class="text-center text-danger">2021</td> 
                  <td class="text-center">62,677,158</td> 
                  <td class="text-center">2,455,963</td> 
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat detail perusahaan" href="#"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit detail perusahaan" href="#" role="button" role="button"><i class="fa fa-eye"></i></a> 
                  </td>
                </tr> 
                <tr>
                  <th scope="row" class="text-center">1</th>
                  <td>PT. Wijaya Karya</td>
                  <td class="text-center">90.519.XXX.X-XXX.XXX</td> 
                  <td class="text-center text-danger">2021</td> 
                  <td class="text-center">62,677,158</td> 
                  <td class="text-center">1,133,233</td> 
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat detail perusahaan" href="#"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit detail perusahaan" href="#" role="button" role="button"><i class="fa fa-eye"></i></a> 
                  </td>
                </tr> 
                <tr>
                  <th scope="row" class="text-center">1</th>
                  <td>PT. Incube Solutions</td>
                  <td class="text-center">71.229.XXX.X-XXX.XXX</td> 
                  <td class="text-center text-danger">2021</td> 
                  <td class="text-center">53,784,211</td> 
                  <td class="text-center">4,333,923</td> 
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat detail perusahaan" href="#"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit detail perusahaan" href="#" role="button" role="button"><i class="fa fa-eye"></i></a> 
                  </td>
                </tr> 
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan'); ?>
    <!-- End of Add Modal Perusahaan -->

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

    $('#formAddCompany').on('submit', function(evt) {
      evt.preventDefault();

      let form = $('#formAddCompany');
      let companyName = $('#nama_perusahaan').val();

      if (companyName == null || companyName.length == 0) {
        form.addClass('was-validated');
      } else {
        form[0].submit();
      }

    });

    $('#companyTable').DataTable();

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
        text: 'Data perusahaan berhasil ditambahkan',
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