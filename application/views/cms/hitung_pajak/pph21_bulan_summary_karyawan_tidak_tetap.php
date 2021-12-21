
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
          <h1>PPH 21</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <?php 
              $pid=$this->input->get('pid');
              $pid_ptt=$this->input->get('pid_ptt');
              $cid=$this->input->get('cid');
              $mid=$this->input->get('mid');
              $yid=$this->input->get('yid');
             ?>
            <li class="active"> <a href="<?php echo base_url("pph_21"); ?>"> PPH 21</a> / <a href="<?php echo base_url("pph_21/bulan?cid=$cid&yid=$yid") ?>">Bulanan</a> / <a href="<?php echo base_url("pph_21/bulan/summary?pid=$pid&cid=$cid&mid=$mid&yid=$yid"); ?>">Summary</a> / <a href="<?php echo base_url("pph_21/bulan/summary/tidak_tetap?pid=$pid&pid_ptt=$pid_ptt&cid=$cid&mid=$mid&yid=$yid"); ?>">Karyawan Tidak Tetap</a> / Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <h5><span class="badge badge-success mb-4">PERIODE : <?= $this->input->get('mid') . '-' . $this->input->get('yid') ?> </span></h5>
       <!--  <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-" class="text-center">Kode karyawan</th>
              <th scope="col-" class="text-center">Nama Karyawan</th>
              <th scope="col-" class="text-center">Status Tanggungan</th>
              <th scope="col-" class="text-center">NPWP</th>
              <th scope="col-" class="text-center">Metode</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($employee->num_rows() != 0) { ?>

              <?php foreach ($employee->result() as $empData) { ?>
                <tr>
                  <td class="text-center"><?= $empData->EMPLOYEE_ID_PTT; ?></td>
                  <td class="text-center"><?= $empData->NAMA_PEGAWAI; ?></td>
                  <td class="text-center"><?= $ptkp->row()->TK_NAME; ?></td>
                  <td class="text-center"><?= $empData->NPWP; ?></td>
                  <td class="text-center"><?= $empData->METODE; ?></td>
                </tr>
              <?php } ?>

            <?php } ?>


          </tbody>
        </table> -->

        <div class="card mt-3 p-2">

          <form method="POST" action="<?php echo base_url('PPH/Pph21/update_pph_21_bulan_summary_karyawan'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>">
          <input type="hidden" name="employeeID" value="<?php echo $this->input->get('eid') ?>">
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>">
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>">
          <div class="row">

            <div class="col">
              <h6><span class="badge badge-success mb-4">Detail Karyawan</span></h6>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label class="label-utama">01. Kode Karyawan :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $employee->row()->EMPLOYEE_ID_PTT; ?>" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="label-utama">02. Nama Karyawan :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $employee->row()->NAMA_PEGAWAI; ?>" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="label-utama">03. Status Tanggungan :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $ptkp->row()->TK_NAME; ?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="label-utama">04. NPWP :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $employee->row()->NPWP; ?>" readonly>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="label-utama">05. NIK/No. Paspor :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $employee->row()->NIK_PASPOR; ?>" readonly>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="label-utama">06. Alamat :</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $employee->row()->ALAMAT; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Perhitungan PPh 21 Tidak Tetap</span></h6>
            </div>

            <div class="col-4">
            </div>

            <div class="col-4">
            </div>
          </div>
          <div class="row">

            <div class="col-4">
              

              <div class="form-group">
                <label class="label-utama">07. Penghasilan Bruto :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->PENGHASILAN_BRUTO); ?>" readonly>
              </div>
            </div>
          
            <div class="col-4">
              

              <div class="form-group">
                <label class="label-utama">08. Penghasilan Tidak Kena Pajak (PTKP) :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($ptkp->row()->TK_TARIF); ?>" readonly>
              </div> 
            </div>

            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">09. PPh Pasal 21 Tidak Tetap atas PKP :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->PPHVAL_PTT); ?>" readonly>
              </div>
              
            </div>
          </div>
          <hr>
            <div class="row">
                <!-- <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Hitung dan Simpan</button> -->
                <a class="btn btn-sm btn-secondary col-2 ml-3 mb-3" type="submit" href="<?= base_url('pph_21/bulan/summary/tidak_tetap?pid='.$this->input->get('pid') . '&pid_ptt=' . $this->input->get('pid_ptt') .'&cid='.$this->input->get('cid') . '&mid=' . $this->input->get('mid') . '&yid=' . $this->input->get('yid') ); ?>">Kembali</a>
            </div>
          </form>
        </div>

      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan'); ?>
    <!-- End of Add Modal Perusahaan -->
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
<!-- End of Footer