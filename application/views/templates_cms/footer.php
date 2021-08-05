		<!-- <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script> -->

		<script src="<?= base_url('assets/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
		<script src="<?= base_url('assets/js/widgets.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/dist/jquery.vmap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>

		<script>
			jQuery.noConflict();

			(function($) {
				"use strict";

				jQuery('#vmap').vectorMap({
					map: 'world_en',
					backgroundColor: null,
					color: '#ffffff',
					hoverOpacity: 0.7,
					selectedColor: '#1de9b6',
					enableZoom: true,
					showTooltip: true,
					values: sample_data,
					scaleColors: ['#1de9b6', '#03a9f5'],
					normalizeFunction: 'polynomial'
				});

				jQuery(document).on('click', '.hapus', function() {
					Swal.fire({
						title: 'HAPUS DATA',
						text: 'APAKAH ANDA YAKIN MENGHAPUS DATA INI?',
						icon: 'warning',
						showCancelButton: true,
						cancelButtonText: 'Batal',
						confirmButtonText: 'Hapus'
					}).then((result) => {
						if (result.value) {
							Swal.fire({
								title: 'PROSES BERHASIL',
								text: 'DATA TELAH DIHAPUS',
								icon: 'success',
								confirmButtonText: 'Ok'
							}).then((result) => {
								location.reload();
							});
						}
					});
				});

			})(jQuery);


			$('#addPerusahaan').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('New message to ' + recipient)
				modal.find('.modal-body input').val(recipient)
			})

			$('#addKaryawanPerusahaan').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('New message to ' + recipient)
				modal.find('.modal-body input').val(recipient)
			})

			$('#ImportExport').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('New message to ' + recipient)
				modal.find('.modal-body input').val(recipient)
			})

			$('#detailKaryawanPerusahaan').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('New message to ' + recipient)
				modal.find('.modal-body input').val(recipient)
			})

			$('#deleteKaryawanPerusahaan').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('New message to ' + recipient)
				modal.find('.modal-body input').val(recipient)
			})


			// SWEEET ALERT 2
			// const hapus = document.querySelector('#hapus');
			// hapus.addEventListener('click', function() {
			// 	Swal({
			// 		title: 'HAPUS DATA';
			// 		text: 'APAKAH ANDA YAKIN MENGHAPUS DATA INI?';
			// 		type: 'warning';
			// 	});
			// });
		</script>

		</body>

		</html>