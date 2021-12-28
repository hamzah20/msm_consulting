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
        <input type="file" class="form-control-file form-control-sm" name="doc_file">
    </div>

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