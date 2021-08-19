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