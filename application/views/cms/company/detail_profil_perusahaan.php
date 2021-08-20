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
                        <li class="active"> <a href="<?= base_url('company_profile'); ?>">Profil Perusahaan</a> / Detail Utama</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content mt-3">
        <div class="card px-2">
            <ul class="nav nav-tabs nav-edit-perusahaan m-2 mt-3">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('company_profile/detail/utama?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/hitung_pajak?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-calculator mr-1"></i>Hitung Pajak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/identitas_wp?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/info_perpajakan?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/identitas_pj?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('company_profile/detail/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                </li>
            </ul>
            <a class="btn btn-sm btn-warning col-2 ml-2 mb-3 mt-1 text-white" type="submit" href="<?= base_url('company_profile/edit/utama?cid=' . $company->row()->COMPANY_ID); ?>">Edit Data</a>
            <hr class="mx-2 mt-0">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">No. Urut Perusahaan</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_NO; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">NPWP</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_NPWP; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Nama Perusahaan</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_NAME; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Pimpinan Perusahaan</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->LEADER_NAME; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">No. Telepon</label>
                        <input type="number" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_PHONE; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">No. Faksimile</label>
                        <input type="number" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_FAX; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Email</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->COMPANY_EMAIL; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label class="label-utama">Alamat</label>
                        <textarea type="text" class="form-control form-control-sm" readonly placeholder="....."><?= $company->row()->COMPANY_ADDRESS; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">User E-Faktur</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_USER; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password E-Faktur</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_PASS; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Kode Aktifasi</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_ACTIVATION_CODE; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password Aktifasi</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_ACTIVATION_PASS; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Email E-Faktur</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_EMAIL; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password Email E-Faktur</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EFACTURE_EMAIL_PASS; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password E-Nofa</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->ENOFA_PASS; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password E-Phrase</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->EPHRASE_PASS; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Email SSE/DJP</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->SSE_EMAIL; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password Email SSE/DJP</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->SSE_PASS; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Email to Client</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->CLIENT_EMAIL; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Password Email to Client</label>
                        <input type="password" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->CLIENT_EMAIL_PASS; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Person in Charge (PIC)</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->CLIENT_PIC; ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Ditangani Oleh</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->CLIENT_PIC; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="label-utama">Metode Perhitungan PPH Pasal 21</label>
                        <input type="text" class="form-control form-control-sm" readonly placeholder="....." value="<?= $company->row()->PPHCOUNT_METHOD; ?>">
                    </div>
                </div>
            </div>

        </div>

        <!-- Add Modal Perusahaan -->
        <?php $this->load->view('modal/add_perusahaan'); ?>
        <!-- End of Add Modal Perusahaan -->

    </div>
    <!-- End of Content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->