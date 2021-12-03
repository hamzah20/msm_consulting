<div class="modal fade" id="approvalTask" tabindex="-1" aria-labelledby="approvalTask" aria-hidden="true">
	<div class="modal-dialog">
		<form class="needs-validation" id="FormApprovalTask" method="POST" novalidate>
			<div class="modal-content">
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
					<table class="table table-striped">
						<tr>
							<td>COMPANY</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>PT. PERUSAHAAN YANG SUKSES</td>
						</tr>
						<tr>
							<td>PROJECT</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>AUDIT FINANCIAL STATEMENT</td>
						</tr>
						<tr>
							<td>TASK</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>DATA COA</td>
						</tr>
						<tr>
							<td>START DATE</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>2021-09-17</td>
						</tr>
						<tr>
							<td>END DATE</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>2021-09-20</td>
						</tr>
						<tr>
							<td>NOTES BY PIC</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>DATA COA SUDAH TERKUMPUL DAN SIAP DI PROSES.</td>
						</tr>
						<tr>
							<td>RELATED DOC</td>
							<td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
							<td>
								<input type="file" name="uploadDoc">
							</td>
						</tr>
					</table>
		          	<div class="form-group">
		            	<label for="recipient-name" class="col-form-label">
		            		NOTES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                </label>
		            	<textarea class="form-control" rows="3"></textarea>
		          	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm">Approve</button>
					<button type="button" class="btn btn-danger btn-sm">Revise</button>
					<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" style="color: #fff;">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>