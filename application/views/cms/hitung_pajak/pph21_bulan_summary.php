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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan?cid=' . $this->input->get('cid')) ?>">Bulanan</a> / Summary</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="<?= base_url('PPH/Pph21/generateReport?cid=' . $this->input->get('cid') . '&pid=' . $this->input->get('pid')); ?>"><i class="fa fa-download"></i></a>
        <a class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ringkasan" href="<?php echo base_url('pph_21/bulan/summary/aktifitas_pajak') ?>"><i class="fa fa-paperclip"></i></a>
        <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Email" href="#"><i class="fa fa-envelope"></i></a>
        <a class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="(none)" href="#"><i class="fa fa-asterisk"></i></a>
        <hr>
        <h6><span class="badge badge-success"># Summary / Ringkasan</span></h6> <br>
        <div class="row mb-3">
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(1) Periode / Masa</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPeriode" value="JAN-2021" readonly>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(2) Pembetulan / Koreksi</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPembetulan" value="0" readonly>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(3) Approval / Persetujuan Klien</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtApproval" value="BELUM" readonly>
            </div>
          </div>
        </div>

        <a class="btn btn-sm btn-warning text-white" href="#" role="button" data-toggle="modal" data-target="#editPPH21BulanSummary">Edit Kompensasi</a>
        <br><br>
        <table class="table" id="employeeSumTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-4" class="text-center">Jumlah Pegawai</th>
              <th scope="col-1" class="text-center">Total Penghasilan Bruto</th>
              <th scope="col-1" class="text-center">PPh 21 Terutang</th>
              <th scope="col-1" class="text-center">Kompensasi</th>
              <th scope="col-1" class="text-center">PPh 21 KB (LB)</th>
              <th scope="col-1" class="text-center">Kode Jenis Setoran</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($summary->num_rows() != 0) { ?>
              <tr>
                <td class="text-center"><?= $employees->num_rows(); ?></td>
                <td class="text-center font-weight-bold"><?= number_format($summary->row()->COMPANY_BRUTO); ?></td>
                <td class="text-center font-weight-bold"><?= number_format($summary->row()->COMPANY_KBLB); ?></td>
                <td class="text-center font-weight-bold"><?= number_format($summary->row()->COMPANY_COMPENSATION); ?></td>
                <td class="text-center font-weight-bold"><?= number_format($summary->row()->COMPANY_KBLB); ?></td>
                <td class="text-center"><?= ($summary->row()->COMPANY_KBLB == 0 ? '' : '411121-100'); ?></td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body">
        <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-download"></i></a>
        <a class="btn btn-sm btn-danger" href="#" role="button" data-toggle="modal" title="Import" data-target="#importPPH21"><i class="fa fa-upload"></i></a>
        <hr>
        <h6><span class="badge badge-success"># Detail / Rincian</span></h6> <br>

        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-">No</th>
              <th scope="col-">Nama Karyawan</th>
              <th scope="col-">Status</th>
              <th scope="col-">NPWP</th>
              <th scope="col-" title="Gaji/Pensiun atau THT/JHT" class="text-center">GP*</th>
              <th scope="col-" title="Tunjangan PPh" class="text-center">TP*</th>
              <th scope="col-" title="Tunjangan lainnya, uang lembur dan sebagainya" class="text-center">TL*</th>
              <th scope="col-" title="Honorarium dan imbalan lain sejenisnya" class="text-center">HI*</th>
              <th scope="col-" title="Premi asuransi yang diberi pemberi kerja" class="text-center">PA*</th>
              <th scope="col-" title="Natura dan kenikmatan lainnya" class="text-center">NA*</th>
              <th scope="col-" title="Tantiem, bonus, gratifikasi, jasa produksi dan THR" class="text-center">TB*</th>
              <th scope="col-" title="Penghasilan bruto" class="text-center">PB*</th>
              <th scope="col-" title="Iuran pensiun atau iuran THT/JHT" class="text-center">IU*</th>
              <th scope="col-" title="PPh 21 Terutang" class="text-center">PT*</th>
              <th scope="col-" title="Gaji/Pensiun atau THT/JHT">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($employees->num_rows() != 0) {

              $totalGP = 0;
              $totalTP = 0;
              $totalTL = 0;
              $totalHI = 0;
              $totalPA = 0;
              $totalNA = 0;
              $totalTB = 0;
              $totalPB = 0;
              $totalIU = 0;
              $totalPT = 0;

            ?>
              <?php foreach ($employees->result() as $employee) { ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $employee->EMPLOYEE_NAME; ?></td>
                  <td><?= $employee->EMPLOYEE_NATIONALITY_STATUS; ?></td>
                  <td class="<?= (strlen($employee->EMPLOYEE_NPWP) == 0 ? 'text-danger' : ''); ?>"><?= (strlen($employee->EMPLOYEE_NPWP) == 0 ? 'Tidak Ada' : 'Ada'); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_GAJI_POKOK); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TUNJANGAN_PPH); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TUNJANGAN_LAINNYA); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_HONORARIUM); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_PREMI); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_NATURA); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TANTIEMBONUS); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_BRUTO); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_IURAN_PENSIUN); ?></td>
                  <td class="text-center font-weight-bold"><?= number_format($employee->EMPLOYEE_PPHVAL); ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?php echo base_url('pph_21/bulan/summary/karyawan/detail'); ?>"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php

                $totalGP = $totalGP + $employee->EMPLOYEE_GAJI_POKOK;
                $totalTP = $totalTP + $employee->EMPLOYEE_TUNJANGAN_PPH;
                $totalTL = $totalTL + $employee->EMPLOYEE_TUNJANGAN_LAINNYA;
                $totalHI = $totalHI + $employee->EMPLOYEE_HONORARIUM;
                $totalPA = $totalPA + $employee->EMPLOYEE_PREMI;
                $totalNA = $totalNA + $employee->EMPLOYEE_NATURA;
                $totalTB = $totalTB + $employee->EMPLOYEE_TANTIEMBONUS;
                $totalPB = $totalPB + $employee->EMPLOYEE_BRUTO;
                $totalIU = $totalIU + $employee->EMPLOYEE_IURAN_PENSIUN;
                $totalPT = $totalPT + $employee->EMPLOYEE_PPHVAL;
              } ?>

              <tr>
                <td colspan="2" class="font-weight-bold">TOTAL</td>
                <td></td>
                <td></td>
                <td class="font-weight-bold text-center"><?= number_format($totalGP); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTP); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTL); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalHI); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPA); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalNA); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTB); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPB); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalIU); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPT); ?></td>
              </tr>

            <?php } ?>


          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/edit_pph21_kompensasi'); ?>
    <!-- End of Add Modal Perusahaan -->

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/import_pph21'); ?>
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

    $('#companyTable').DataTable();
    $('#employeeSumTable').DataTable();

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