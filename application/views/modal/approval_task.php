            <div class="modal-header">
                <h5 class="modal-title" id="approvalTask">Approval Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Customer :</label>
                        <input type="text" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required value="PT. PERUSAHAAN YANG SUKSES">
                         <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div> -->

                    <!-- <input type="text" name="rec_id" value="" readonly hidden> -->

                    <table class="table table-striped">
                        <tr>
                            <td>COMPANY</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td>PT. PERUSAHAAN YANG SUKSES</td>
                        </tr>
                        <tr>
                            <td>PROJECT</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $g_project->row()->PROJECT_NAME ?></td>
                        </tr>
                        <tr>
                            <td>TASK</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $g_task->row()->TASK_NAME ?></td>
                        </tr>
                        <tr>
                            <td>START DATE</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $g_project_detail->row()->START_DATE ?></td>
                        </tr>
                        <tr>
                            <td>END DATE</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $g_project_detail->row()->END_DATE ?></td>
                        </tr>
                        <tr>
                            <td>NOTES BY PIC</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td><?= $g_project_detail->row()->NOTES_PIC ?></td>
                        </tr>
                        <!-- <tr>
                            <td>RELATED DOC</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="file" name="uploadDoc" disabled>
                            </td>
                        </tr> -->
                    </table>

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



                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">
                            NOTES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <textarea class="form-control" rows="3" name="NOTES_SUPERUSER"></textarea>
                    </div>
            </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm approveTask" data-recid="<?= $rec_id ?>" >Approve</button>
            <button type="button" class="btn btn-danger btn-sm reviseTask" data-recid="<?= $rec_id ?>" >Revise</button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" style="color: #fff;">Cancel</button>
        </div>


<script>
jQuery(document).ready(function($) {

    $(document).on('click', '.approveTask', function(event) {

          let rec_id = $(this).data('recid');
          let notes_superuser = $('textarea[name="NOTES_SUPERUSER"]').val();

          Swal.fire({
            title: 'Approve Task',
            text: 'Apakah Anda yakin ingin approve task ini ?',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.value) {

              $.post(baseUrl + 'General/Project/approveTask', {
                rec_id:rec_id,
                notes_superuser:notes_superuser

              }, function(resp) {
                if (resp.code == 200) {
                  Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Approve Berhasil',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    location.reload();
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



    $(document).on('click', '.reviseTask', function(event) {

          let rec_id = $(this).data('recid');
          let notes_superuser = $('textarea[name="NOTES_SUPERUSER"]').val();

          Swal.fire({
            title: 'Revise Task',
            text: 'Apakah Anda yakin ingin revise task ini ?',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.value) {

              $.post(baseUrl + 'General/Project/reviseTask', {
                rec_id:rec_id,
                notes_superuser:notes_superuser

              }, function(resp) {
                if (resp.code == 200) {
                  Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Revise Berhasil',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    location.reload();
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