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
            <li class="active"><a href="<?php echo base_url('employee'); ?>">Company Employee</a> / Employee</li>
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
        <a class="btn btn-sm btn-info" href="#" role="button" data-toggle="modal" data-target="#ImportExport">Import / Export</a>
        <hr>
        <table class="table" id="employeeTable">
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
            <?php if ($employee->num_rows() != 0) { ?>
              <?php foreach ($employee->result() as $data) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?= $data->EMPLOYEE_NAME; ?></td>
                  <td class="text-center"><?= ($data->EMPLOYEE_NPWP_STATUS == 'EXIST' ? $data->EMPLOYEE_NPWP : '...'); ?></td>
                  <td class="text-center"><?= ($data->EMPLOYEE_PTKP_STATUS == null ? '...' : $data->EMPLOYEE_PTKP_STATUS); ?></td>
                  <td class="text-center"><?= ($data->EMPLOYEE_NATIONALITY_STATUS == null ? '...' : $data->EMPLOYEE_NATIONALITY_STATUS); ?></td>
                  <td class="text-center">

                    <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-employee="<?= $data->EMPLOYEE_ID; ?>" data-target="#detailKaryawanPerusahaan">
                      <i class="fa fa-info-circle"></i>
                    </a>

                    <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Edit data pegawai" href="<?= base_url('employee/edit?eid=' . $data->EMPLOYEE_ID); ?>" role="button">
                      <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-sm btn-danger hapus" data-toggle="tooltip" data-placement="top" title="Hapus data pegawai" href="#" role="button">
                      <i class="fa fa-trash"></i>
                    </a>

                  </td>
                </tr>

              <?php } ?>
            <?php } ?>

          </tbody>
        </table>
        <hr>
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

<script>
  jQuery(document).ready(function($) {

    "use strict";


    $('#formAddEmployee').on('submit', function(evt) {
      evt.preventDefault();

      let form = $('#formAddEmployee');
      let companyName = $('#nama_karyawan').val();

      if (companyName == null || companyName.length == 0) {

        form.addClass('was-validated');
      } else {
        form[0].submit();
      }

    });

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $('#employeeTable').DataTable();

    $('#detailKaryawanPerusahaan').on('show.bs.modal', function(event) {
      let $button = $(event.relatedTarget);
      let btnID = $button.data('employee');

      $.post(baseUrl + 'General/Employee/getEmployeeData', {
        employeeID: btnID
      }, function(resp) {
        if (resp.code == 200) {

          $('#employeeWorkDate').text(resp.message[0].EMPLOYEE_WORK_START + ' ' + resp.message[0].EMPLOYEE_WORK_END);
          $('#employeeNationality').text(resp.message[0].EMPLOYEE_NATIONALITY_STATUS);
          $('#StatusemployeePosition').text(resp.message[0].EMPLOYEE_POSITION);
          $('#employeeEFIN').text(resp.message[0].EMPLOYEE_EFIN);
          $('#employeePTKPStatus').text(resp.message[0].EMPLOYEE_PTKP_STATUS);
          $('#employeeNPWPStatus').text(resp.message[0].EMPLOYEE_NPWP_STATUS);
          $('#employeeNPWP').text(resp.message[0].EMPLOYEE_NPWP);
          $('#employeeOrder').text(resp.message[0].EMPLOYEE_ORDER_NO);
          $('#employeeNIK').text(resp.message[0].EMPLOYEE_INTERNAL_ID);
          $('#employeeID').text(resp.message[0].EMPLOYEE_COMPANY_ID);
          $('#employeeName').text(resp.message[0].EMPLOYEE_NAME);
          $('#employeeGender').text(resp.message[0].EMPLOYEE_GENDER);
          $('#employeePhone').text(resp.message[0].EMPLOYEE_PHONE);
          $('#employeeEmail').text(resp.message[0].EMPLOYEE_EMAIL);
          $('#employeeNationality').text(resp.message[0].EMPLOYEE_NATIONALITY);
          $('#employeeAddress').text(resp.message[0].EMPLOYEE_ADDRESS);

        } else {
          Swal.fire({
            title: 'Proses Gagal',
            text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
            icon: 'error',
            showCancelButton: false,
            confirmButtonText: 'Tutup'
          });
        }
        console.log(resp);
      });

    });

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