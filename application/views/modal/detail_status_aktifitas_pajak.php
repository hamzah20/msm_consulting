  	<div class="modal fade" id="detailAktifitasPajak" tabindex="-1" aria-labelledby="detailAktifitasPajak" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<form class="needs-validation" id="formAddCompany" action="<?= base_url('General/Client/addCompany'); ?>" method="POST" novalidate>
  					<div class="modal-header">
  						<h5 class="modal-title" id="detailAktifitasPajak">Urutan Aktifitas Pajak</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan (Deskripsi)</th>
                    <th scope="col">PIC</th> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Buat Template Laporan Pajak</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Persiapan data yang diperlukan, untuk dikirimkan ke MSM</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>   Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</td>
                    <td>MSM & Klien</td> 
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td> Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</td>
                    <td>MSM & Klien</td> 
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Pembuatan/penerbitan Kode Billing (SSE : Surat Setoran Elektronik)</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</td>
                    <td>MSM</td> 
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Selesai</td>
                    <td>MSM</td> 
                  </tr>
                </tbody>
              </table>

  					</div> 
  				</form>
  			</div>
  		</div>
  	</div>