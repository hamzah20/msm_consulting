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
                    <h1>Klien</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a href="<?php echo base_url('employee'); ?>">Karyawan Perusahaan</a> / <a href="<?php echo base_url('employee/detail'); ?>">Employee</a> / Edit </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content mt-3">
        <div class="card">

            <div class="card-body">
                <form method="POST" action="<?= base_url('General/Employee/editEmployee'); ?>">
                    <input type="hidden" class="form-control form-control-sm" name="companyID" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_COMPANY_ID); ?>">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Urut Karyawan</label>
                                <input type="text" class="form-control form-control-sm" name="employeeOrderNo" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_ORDER_NO != null ? $employee->row()->EMPLOYEE_ORDER_NO : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. KTP / No. Passport</label>
                                <input type="text" class="form-control form-control-sm" name="employeeKTP" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_KTP != null ? $employee->row()->EMPLOYEE_KTP : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Status PTKP - Tanggungan</label>
                                <!-- <input type="text" class="form-control form-control-sm" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_PTKP_STATUS != null ? $employee->row()->EMPLOYEE_PTKP_STATUS : '...'); ?>"> -->
                                <select class="form-control form-control-sm" name="employeePTKPStatus">
                                    <?php foreach ($ptkp->result() as $ptkpdata): 

                                        if ($employee->row()->EMPLOYEE_PTKP_STATUS == $ptkpdata->TK_ID) {
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        ?>

                                        <option value="<?= $ptkpdata->TK_ID ?>" <?= $selected ?> ><?= $ptkpdata->TK_NAME ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Induk Karyawan</label>
                                <input type="text" class="form-control form-control-sm" name="employeeInternalID" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_INTERNAL_ID != null ? $employee->row()->EMPLOYEE_INTERNAL_ID : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control form-control-sm" name="employeeName" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_NAME != null ? $employee->row()->EMPLOYEE_NAME : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Status NPWP</label>
                               <!--  <input type="text" class="form-control form-control-sm" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_NPWP_STATUS == 'true' ? 'Aktif' : 'Inactive'); ?>"> -->
                                <select class="form-control form-control-sm" name="employeeNPWPStatus">
                                    <?php 

                                    if ($employee->row()->EMPLOYEE_NPWP_STATUS == 'true') {
                                        $npwp_true = 'selected';
                                        $npwp_false = '';
                                    } else{
                                        $npwp_true = '';
                                        $npwp_false = 'selected';
                                    }

                                    ?>
                                    <option value="true" <?= $npwp_true ?>>Active</option>
                                    <option value="false" <?= $npwp_false ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <!-- <input type="text" class="form-control form-control-sm" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_GENDER != null ? $employee->row()->EMPLOYEE_GENDER : '...'); ?>"> -->
                                <select class="form-control form-control-sm" name="employeeGender">
                                    <?php 

                                    if ($employee->row()->EMPLOYEE_GENDER == 'Pria') {
                                        $gender_pria = 'selected';
                                        $gender_wanita = '';
                                    } else{
                                        $gender_pria = '';
                                        $gender_wanita = 'selected';
                                    }

                                    ?>
                                    <option value="Pria" <?= $gender_pria ?>>Pria</option>
                                    <option value="Wanita" <?= $gender_wanita ?>>Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kewarganegaraan</label>
                                <input type="text" class="form-control form-control-sm" name="employeeNationality" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_NATIONALITY != null ? $employee->row()->EMPLOYEE_NATIONALITY : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kode NPWP</label>
                                <input type="text" class="form-control form-control-sm" name="employeeNPWP" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_NPWP != null ? $employee->row()->EMPLOYEE_NPWP : '...'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control form-control-sm" name="employeePosition" placeholder="..." value="<?= ($employee->row()->EMPLOYEE_POSITION != null ? $employee->row()->EMPLOYEE_POSITION : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Masuk</label>
                                        <input type="date" class="form-control form-control-sm option-pegawai" name="employeeDateBegin" value="<?= ($employee->row()->EMPLOYEE_WORK_START != null ? $employee->row()->EMPLOYEE_WORK_START : '...'); ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Keluar</label>
                                        <input type="date" class="form-control form-control-sm option-pegawai" name="employeeDateEnd" value="<?= ($employee->row()->EMPLOYEE_WORK_END != null ? $employee->row()->EMPLOYEE_WORK_END : '...'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Kode EFIN</label>
                                <input type="text" class="form-control form-control-sm" placeholder="..." name="employeeEFIN" value="<?= ($employee->row()->EMPLOYEE_EFIN != null ? $employee->row()->EMPLOYEE_EFIN : '...'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">No. Telepon</label>
                                <input type="text" class="form-control form-control-sm" placeholder="..." name="employeePhone" value="<?= ($employee->row()->EMPLOYEE_PHONE != null ? $employee->row()->EMPLOYEE_PHONE : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control form-control-sm" placeholder="..." name="employeeEmail" value="<?= ($employee->row()->EMPLOYEE_EMAIL != null ? $employee->row()->EMPLOYEE_EMAIL : '...'); ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="employeeType">Tipe Pekerja</label>
                                <select class="form-control option-pegawai" id="employeeType" name="employeeType">
                                    <option value="Lokal" <?= ($employee->row()->EMPLOYEE_NATIONALITY_STATUS == 'Lokal' ? 'selected' : ''); ?>>Lokal</option>
                                    <option value="Ekspatriat" <?= ($employee->row()->EMPLOYEE_NATIONALITY_STATUS == 'Ekspatriat' ? 'selected' : ''); ?>>Ekspatriat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea type="text" class="form-control form-control-sm" name="employeeAddress" placeholder="..."><?= ($employee->row()->EMPLOYEE_ADDRESS != null ? $employee->row()->EMPLOYEE_ADDRESS : '...'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="employeeID" value="<?= $employee->row()->EMPLOYEE_ID; ?>">

                    <hr>

                    <a class="btn btn-sm btn-danger hapus float-right" data-toggle="tooltip" data-placement="top" data-employee="<?= $employee->row()->EMPLOYEE_ID; ?>" data-company="<?= $employee->row()->EMPLOYEE_COMPANY_ID; ?>" title="Hapus data pegawai" href="#" role="button"> Hapus Data Karyawan </a>
                    <button class="btn btn-sm btn-success text-white float-right mx-1" href="<?= base_url('Client/karyawan_perusahaan_detail'); ?>" role="submit"> Simpan Perubahan
                    </button>


                </form>
            </div>
        </div>

        <!-- Delete Karyawan Perusahan -->
        <?php $this->load->view('modal/delete_karyawan_perusahaan'); ?>
        <!-- End of Delete Karyawan Perusahaan -->

    </div>
    <!-- End of Content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->


<script>
jQuery(document).ready(function($) {
    $(document).on('click', '.hapus', function(event) {

      let btnID = $(this).data('employee');
      let btnCompany = $(this).data('company');

      Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'General/Employee/deleteEmployee', {
            employeeID: btnID,
            companyID: btnCompany
          }, function(resp) {
            if (resp.code == 200) {
              Swal.fire({
                title: 'Proses Berashil',
                text: 'Data telah dihapus',
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then((result) => {
                let redir = resp.redir;
                location.replace(redir);
              });
            } else {

              Swal.fire({
                title: 'Proses Gagal',
                text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: 'Tutup'
              });
            }
          });
        }
      });
    });
});


</script>


<?php if ($this->session->userdata('employee_update') == 'success') { ?>
    <script>
        jQuery(document).ready(function($) {

            "use strict";

            Swal.fire({
                title: 'Proses Berhasil',
                text: 'Data pegawai berhasil di update',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Tutup'
            });
        });
    </script>
<?php } ?>

<?php if ($this->session->userdata('employee_update') == 'error') { ?>
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

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->