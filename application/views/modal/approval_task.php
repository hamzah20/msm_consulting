                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Customer :</label>
                        <input type="text" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required value="PT. PERUSAHAAN YANG SUKSES">
                         <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div> -->

                    <input type="text" name="rec_id" value="<?= $rec_id ?>" readonly hidden>

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
                        <tr>
                            <td>RELATED DOC</td>
                            <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="file" name="uploadDoc" disabled>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">
                            NOTES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <textarea class="form-control" rows="3" readonly></textarea>
                    </div>
            </div>