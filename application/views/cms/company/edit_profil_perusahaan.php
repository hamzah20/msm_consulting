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
                        <li class="active"> <a href="<?php echo base_url('company_profile'); ?>">Profil Perusahaan</a> / Edit Utama</li>
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
                    <a class="nav-link active" href="<?php echo base_url('company_profile/edit/utama?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-card mr-1"></i>Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('company_profile/edit/hitung_pajak?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-calculator mr-1"></i>Hitung Pajak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('company_profile/edit/identitas_wp?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-user mr-1"></i>Identitas WP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('company_profile/edit/info_perpajakan?cid=' . $company->row()->COMPANY_ID) ?>"><i class="fa fa-info-circle mr-1"></i>Info Perpajakan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('company_profile/edit/identitas_pj?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-id-badge mr-1"></i>Identitas Penanggung Jawab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('company_profile/edit/dokumen_elektronik?cid=' . $company->row()->COMPANY_ID); ?>"><i class="fa fa-file mr-1"></i>Dokumen Elektronik</a>
                </li>
            </ul>
            <hr class="mx-2">
            <form method="POST" action="#" class="px-3">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">No. Urut Perusahaan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editNoUrutPerusahaan" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">NPWP</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editNPWP" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Nama Perusahaan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editNamaPerusahaan" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Pimpinan Perusahaan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPimpinanPerusahaan" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">No. Telepon</label>
                            <input type="number" class="form-control form-control-sm" placeholder="....." name="editNoTelpon" value="" >
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">No. Faksimile</label>
                            <input type="number" class="form-control form-control-sm" placeholder="....." name="editNoFaksimile" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Email</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editEmail" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="label-utama">Alamat</label>
                            <textarea type="text" class="form-control form-control-sm" placeholder="....." name="editAlamat" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">User E-Faktur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editUserEFaktur" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password E-Faktur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassEFaktur" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Kode Aktifasi</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editKodeAktifasi" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password Aktifasi</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassAktifasi" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Email E-Faktur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editEmailEFaktur" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password Email E-Faktur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassEmailEFaktur" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password E-Nofa</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassENofa" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password E-Phrase</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassEPhrase" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Email SSE/DJP</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editEmailSSEDJP" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password Email SSE/DJP</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassEmailSSEDJP" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Email to Client</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editEmailClient" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Password Email to Client</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPassClient" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Person in Charge (PIC)</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editPIC" value="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Ditangani Oleh</label>
                            <input type="text" class="form-control form-control-sm" placeholder="....." name="editDitangani" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="label-utama">Metode Perhitungan PPH Pasal 21</label>
                            <select class="form-control option-pegawai" name="editMetodePerhitungan">
                                <option value="Gross-Up">Gross-Up</option>
                                <option value="Non Gross-Up">Non Gross-Up</option>
                            </select>
                        </div>
                    </div>
                </div>

            </form>
            <hr class="mx-2">
            <div class="row ml-2">
                <button class="btn btn-sm btn-success col-2 ml-2 mb-3" type="submit">Simpan Perubahan</button>
                <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('company_profile'); ?>">Batalkan Perubahan</a>
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