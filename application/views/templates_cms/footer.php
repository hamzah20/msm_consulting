		<!-- <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script> -->

		<script src="<?= base_url('assets/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
		<script src="<?= base_url('assets/js/widgets.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/dist/jquery.vmap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
		<script src="<?= base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>

		<!-- JS for Horizontal Scroll in Data Table -->
		<script type="text/javascript" url="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" url="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

		<!--Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!--Boostrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!--DataTables -->
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>  

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