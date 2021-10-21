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
          <h1>Lawan Transaksi</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 22</a> / <a href="<?php echo base_url('pph_22/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_22/bulan/summary'); ?>">Summary</a> / Lawan Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
     <div class="card-body"> 
        <a class="btn btn-sm btn-primary mb-3" href="#" role="button" data-toggle="modal" title="Tambah" data-target="#addLawanTransaksi">Tambah Lawan Transaksi</a> 
        <table id="lawantransaksiTable" class="table table-company">
          <tr class="thead-dark">
              <th scope="col-">No</th>
              <th scope="col-">Nama Lawan Transaksi</th> 
              <th scope="col-">NPWP Lawan Transaksi</th>
              <th scope="col-">Alamat Lawan Transaksi</th>  
              <th scope="col-">Aksi</th> 
            </tr>
            <?php $no = 1; ?>
            <tbody>
              <?php foreach ($data_transaksi->result() as $transaksi) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $transaksi->TRANSACTION_NAME; ?></td>
                  <td><?= $transaksi->TRANSACTION_NPWP; ?></td>
                  <td><?= $transaksi->TRANSACTION_ADDRESS; ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('pph_22/lawan_transaksi/delete?tid='.$transaksi->TRANSACTION_ID) ?>"><i class="fa fa-eye"></i></a> 
                    <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('pph_22/lawan_transaksi/edit?tid='.$transaksi->TRANSACTION_ID) ?>" title="Edit"><i class="fa fa-edit"></i></a> 
                  </td>
                </tr> 
              <?php } ?>
            </tbody>
        </table>
     </div>
    </div>

    <!-- Add Lawan Transaksi  -->
    <?php $this->load->view('modal/add_lawan_transaksi'); ?>
    <!-- End of Edit Lawan Transaksi --> 

    <!-- Edit Lawan Transaksi  -->
    <?php $this->load->view('modal/edit_lawan_transaksi'); ?>
    <!-- End of Edit Lawan Transaksi --> 

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