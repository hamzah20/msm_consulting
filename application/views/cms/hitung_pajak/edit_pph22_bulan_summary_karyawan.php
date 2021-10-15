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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 22</a> / <a href="<?php echo base_url('pph_22/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_22/bulan/summary'); ?>">Summary</a> / Karyawan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <h5><span class="badge badge-success mb-4">PERIODE : <?= $employee->row()->PERIOD_MONTH . ' - ' . $employee->row()->PERIOD_YEAR; ?></span></h5>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-" class="text-center">Kode karyawan</th>
              <th scope="col-" class="text-center">Nama Karyawan</th>
              <th scope="col-" class="text-center">Tipe Karyawan</th>
              <th scope="col-" class="text-center">Status Tanggungan</th>
              <th scope="col-" class="text-center">NPWP</th>
              <th scope="col-" class="text-center">Mulai Kerja</th>
              <th scope="col-" class="text-center">Berhenti Kerja</th>
              <th scope="col-" class="text-center">Metode</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($employee->num_rows() != 0) { ?>

              <?php foreach ($employee->result() as $empData) { ?>
                <tr>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                </tr>
              <?php } ?>

            <?php } ?>


          </tbody>
        </table>

        <div class="card mt-3 p-2">
          <form method="POST" action="<?php echo base_url('PPH/Pph21/update_pph_21_bulan_summary_karyawan'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>">
          <input type="hidden" name="employeeID" value="<?php echo $this->input->get('eid') ?>">
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>">
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>">
          <div class="row">
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Penghasilan</span></h6>
              <div class="form-group">
                <label class="label-utama">Nama Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_GAJI_POKOK); ?>" name="editGaji">
              </div>
              <div class="form-group">
                <label class="label-utama">NPWP Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_TUNJANGAN_PPH); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">Alamat Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_TUNJANGAN_LAINNYA); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">Tanggal Bukti Potong :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_HONORARIUM); ?>" name="editHonarium">
              </div>
              <div class="form-group">
                <label class="label-utama">Keterangan Transaksi :</label> 
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PREMI); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">06. Natura dan Kenikmatan Lainnya :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_NATURA); ?>" name="editNatura">
              </div>
              <div class="form-group">
                <label class="label-utama">07. Tantiem, Bonus dan THR :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_TANTIEMBONUS); ?>" name="editTantiem">
              </div>
              <hr>
              <div class="form-group">
                <label class="label-utama">08. Penghasilan Bruto :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_BRUTO); ?>" readonly>
              </div>
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Pengurang</span></h6>
              <div class="form-group">
                <label class="label-utama">09. Biaya Jabatan :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_BIAYA_JABATAN); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">10. Iuran Pensiun atau Iuran JHT/THT :</label> 
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_IURAN_PENSIUN); ?>" readonly>
              </div>
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Perhitungan PPh 21</span></h6>
              <div class="form-group">
                <label class="label-utama">11. Penghasilan Bruto Setahun :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_BRUTO * 12); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">12. Biaya Jabatan Setahun :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_BIAYA_JABATAN*12); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">13. Iuran Pensiun atau Iuran JHT/THT Setahun :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_IURAN_PENSIUN * 12); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">14. Jumlah Pengurang Setahun :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format(($employee->row()->EMPLOYEE_TOTAL_PENGURANGAN) * 12); ?>" readonly>
              </div> 
              <div class="form-group">
                <label class="label-utama">15. Penghasilan Neto :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_NETTO); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">16. Penghasilan Neto Masa Sebelumnya :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_NETTO_YEAR_AGO); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">17. Penghasilan Neto Setahun/Disetahunkan :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_NETTO_YEAR); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">18. Penghasilan Tidak Kena Pajak (PTKP) :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->TK_TARIF); ?>" readonly>
              </div> 
              <div class="form-group">
                <label class="label-utama">19. PKP Setahun/Disetahunkan :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PKP_YEAR); ?>" readonly>
              </div> 
              <div class="form-group">
                <label class="label-utama">20. PPh Pasal 21 atas PKP :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PPHVAL * 12); ?>" readonly>
              </div>
              
              <div class="form-group">
                <label class="label-utama">21. PPh Pasal 21 Dipotong Masa Sebelumnya :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PPH21_DIPOTONG_YEAR_AGO); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">22. PPh 21 Terutang Setahun/Disetahunkan :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PPHVAL * 12); ?>" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">23. PPh 21 Terutang Bulan <span class="text-danger font-weight-bold"><?= $employee->row()->PERIOD_MONTH . ' - ' . $employee->row()->PERIOD_YEAR; ?></span> :</label>
                <input type="text" class="form-control form-control-sm" value="<?= number_format($employee->row()->EMPLOYEE_PPHVAL); ?>" readonly>
              </div>
            </div>
          </div>
          <hr>
            <div class="row">
                <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Hitung dan Simpan</button>
                <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('pph_21/bulan/summary/karyawan/edit'); ?>">Kembali</a>
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
<!-- End of Footer -->