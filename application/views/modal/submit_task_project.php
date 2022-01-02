                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Task :</label>
                        <input type="text" class="form-control form-control-sm" id="txt_projecttype" name="project_name" readonly>
                    </div>
                
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">File Task :</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Tanggal Upload</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php 
                            $no = 1;
                            foreach ($dokumen_list_task->result() as $dokumen_task):
                                $addr = $dokumen_task->FILE_ADDRESS
                             ?>
                                <tr>
                                    <td>
                                        <?php echo $no;$no++; ?>
                                    </td>
                                    <td>
                                        <?= $dokumen_task->FILE_NAME ?>
                                    </td>
                                    <td>
                                        <?= $dokumen_task->UPLOAD_DATE ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
                                          <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>

                    </div>
                
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Catatan :</label>
                        <input type="date" class="form-control form-control-sm" id="txt_projecttype" name="project_end" required>
                        <div class="invalid-feedback">
                            Date tidak boleh kosong
                        </div>
                    </div>
                    