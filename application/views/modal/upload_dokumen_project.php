<?php if (null == $this->input->get('id_task')){ ?>
    

    <div class="form-group">
        <label class="col-form-label font-weight-bold">Nama Project :</label>
        <input type="text" class="form-control form-control-sm" readonly name="project_name" value="<?= $project->row()->PROJECT_NAME ?>">
        <input type="text" hidden class="form-control form-control-sm" readonly name="project_id" value="<?= $project->row()->PROJECT_ID ?>">
    </div>

    <div class="form-group">
        <label class="col-form-label">Tipe Dokumen :</label>
        <select class="form-control form-control-sm" name="doc_type_select" id="doc_type_select">
            <?php foreach ($document_type->result() as $doc_type){
                if ($doc_type->NAMA_JENIS_DOKUMEN != 'NULL') {
             ?>
                <option value="<?= $doc_type->KODE_JENIS_DOKUMEN ?>"><?= $doc_type->NAMA_JENIS_DOKUMEN ?></option>
            <?php }} ?>
            <option value="r8keombgxgf82xww9ym" data-type="lainnya">LAINNYA...</option>
        </select>
    </div>

    <div class="form-group sembunyi">
        <label class="col-form-label">Nama Tipe Dokumen :</label>
        <input type="text" class="form-control form-control-sm" name="doc_type_input">
    </div>

    <div class="form-group">
        <label class="col-form-label">File Dokumen :</label>
        <input type="file" class="form-control-file form-control-sm" name="doc_file[]" accept=".xlsx, .xls, .xlsm, .xlt, .xltx, .xltm, .xlsb, .xla, .xlam, .xml, .csv, .pdf, .epub, .txt, .xps, .doc, .docm, .docx, .dot, .dotm, .dotx, .odt, .rtf, .wps, .ods, .xlw, .odp, .pot, .potm, .potx, .ppa, .ppam, .pps, .ppsm, .ppsx, .ppt, .pptm, .pptx, .thmx, .jpeg, .jpg, .png, .tif, .bmp" multiple>
    </div>

    <small class="bg bg-warning font-weight-bold"><i>*Max Size 10MB</i></small>
    <br>
    <small class="bg bg-warning font-weight-bold"><i>*Supported file : Excel, Word, Powerpoint, Text</i></small>

<script>
    jQuery(document).ready(function($) {
        $(".sembunyi").hide();
        $("#doc_type_select").change(function () {
            var button = $(event.relatedTarget);
            var type = $('option:selected',this).data("type");
            if (type == 'lainnya') {
                $(".sembunyi").show();
            }else{
                $(".sembunyi").hide();
            };

        });
    });
</script>
<?php }else{
$task = $this->cms->getSingularData('g_task', 'REC_ID', $this->input->get('id_task'));
$id_task = $this->input->get('id_task');
$id_milestone = $this->input->get('id_milestone');
 ?>

    <div class="form-group">
        <label class="col-form-label font-weight-bold">Nama Task :</label>
        <input type="text" class="form-control form-control-sm" readonly name="project_name" value="<?= $task->row()->TASK_NAME ?>">
        <input type="text" hidden class="form-control form-control-sm" readonly name="project_id" value="<?= $this->input->get('id_project') ?>">
        <input type="text" hidden class="form-control form-control-sm" readonly name="milestone_id" value="<?= $this->input->get('id_milestone') ?>">
        <input type="text" hidden class="form-control form-control-sm" readonly name="task_id" value="<?= $this->input->get('id_task') ?>">
    </div>

    <div class="form-group">
        <label class="col-form-label">Tipe Dokumen :</label>
        <select class="form-control form-control-sm" name="doc_type_select" id="doc_type_select">
            <?php foreach ($document_type->result() as $doc_type){
                if ($doc_type->NAMA_JENIS_DOKUMEN != 'NULL') {
             ?>
                <option value="<?= $doc_type->KODE_JENIS_DOKUMEN ?>"><?= $doc_type->NAMA_JENIS_DOKUMEN ?></option>
            <?php }} ?>
            <option value="r8keombgxgf82xww9ym" data-type="lainnya">LAINNYA...</option>
        </select>
    </div>

    <div class="form-group sembunyi">
        <label class="col-form-label">Nama Tipe Dokumen :</label>
        <input type="text" class="form-control form-control-sm" name="doc_type_input">
    </div>

    <div class="form-group">
        <label class="col-form-label">File Dokumen :</label>
        <input type="file" class="form-control-file form-control-sm" name="doc_file[]" accept=".xlsx, .xls, .xlsm, .xlt, .xltx, .xltm, .xlsb, .xla, .xlam, .xml, .csv, .pdf, .epub, .txt, .xps, .doc, .docm, .docx, .dot, .dotm, .dotx, .odt, .rtf, .wps, .ods, .xlw, .odp, .pot, .potm, .potx, .ppa, .ppam, .pps, .ppsm, .ppsx, .ppt, .pptm, .pptx, .thmx" multiple>
    </div>

    <small class="bg bg-warning font-weight-bold"><i>*Max Size 10MB</i></small>
    <br>
    <small class="bg bg-warning font-weight-bold"><i>*Supported file : Excel, Word, Powerpoint, Text</i></small>

<script>
    jQuery(document).ready(function($) {
        $(".sembunyi").hide();
        $("#doc_type_select").change(function () {
            var button = $(event.relatedTarget);
            var type = $('option:selected',this).data("type");
            if (type == 'lainnya') {
                $(".sembunyi").show();
            }else{
                $(".sembunyi").hide();
            };

        });
    });
</script>

<?php } ?>