<!DOCTYPE html>
<html>
<head>
	<title>SPT MASA</title>
	<style>
		.bg-grey{
			background-color: #cccccc;
		}
		.garis-bawah {
			border-bottom: 1px solid black;
		}
		.f-l {
			float:left;
		}
		.f-r {
			float:right;
		}
		.mt-13{
			margin-top:13px;
		}
		.mt-15{
			margin-top:15px;
		}
		.mw-05in{
			min-width: 0.5in;
		}
		.mw-08in{
			min-width: 0.8in;
		}
		.mw-18in{
			min-width:1.8in;
		}
		.text-left{
			text-align: left;
		}
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		.m-lr-5{
			margin-left:5px;
			margin-right:5px;
		}
		.mt-5{
			margin-top:5px;
		}
		.mr-5{
			margin-right:5px;
		}
		input[type="checkbox"]{
		    -webkit-appearance: initial;
		    appearance: initial;
		    background: white;
		    width: 20px;
		    height: 20px;
		    border: 1px solid black;
		    position: relative;
		}
		input[type="checkbox"]:checked {
		    background: white;
		}
		input[type="checkbox"]:checked:after {
		    /* Heres your symbol replacement */
		    content: "X";
		    color: black;
		    /* The following positions my tick in the center, 
		     * but you could just overlay the entire box
		     * with a full after element with a background if you want to */
		    position: absolute;
		    left: 50%;
		    top: 50%;
		    -webkit-transform: translate(-50%,-50%);
		    -moz-transform: translate(-50%,-50%);
		    -ms-transform: translate(-50%,-50%);
		    transform: translate(-50%,-50%);
		    /*
		     * If you want to fully change the check appearance, use the following:
		     * content: " ";
		     * width: 100%;
		     * height: 100%;
		     * background: blue;
		     * top: 0;
		     * left: 0;
		     */
		}
		sub {
			vertical-align: sub;
			font-size: smaller;
			color:#5da2fc;
			display: inline-block;
		}
		*{
			font-size: 10px;
			font-family: Tahoma, Geneva, sans-serif;
		}
		h1{
			font-size:15px;
			font-weight: bold;
		}
		h2{
			font-size:12px;
			font-weight: bold;
		}
		.new tr td {
			padding-top:10px;
		}
		.new2 tr td{
			padding:5px;
		}
		.border{
			border: 1px solid black;
		}
		.p-3{
			padding:3px;
		}
		.garis-kkb{
			border-bottom:1px solid black;
			border-left:1px solid black;
			border-right:1px solid black;
		}
	</style>
</head>
<body>

<!-- Kepala Laporan ------------------------------------- -->
	<div style="width:8.3in;" >
		<table border style="text-align: center;border-collapse:collapse;">
			<tr>
				<td style="width:2.2in">
					<img src="<?php echo base_url('/assets/images/spt/kemenkeu.png'); ?>" style="height: 70px;margin:auto;" />
					<br>
					<br>
					<h2 style="margin-top:0;padding-top:0px;">KEMENTRIAN KEUANGAN RI <br> DIREKTORAT JENDERAL PAJAK</h2>
				</td>
				<td style="width:3.8in"><b>
					<h1>
					SURAT PEMBERITAHUAN (SPT) MASA <br>
					PAJAK PENGHASILAN <br>
					PASAL 21 DAN/ATAU PASAL 26
					</h1>
					</b>
					<hr>
					<span style="font-size:14px;">
						Formulir ini digunakan untuk melaporkan <br>
						Pemotongan Pajak Penghasilan Pasal 21 dan/atau <br>
						Pasal 26
					</span>
					
				</td>
				<td style="width:2.2in">
					Area barcode
				</td>
			</tr>
			<tr>
				<td>
					<span class="f-l text-left">
						MASA PAJAK : <br>[mm - yyy] <sub>H.01</sub>
					</span>
					<div class="f-l garis-bawah mt-13 mw-05in">
						Tes
					</div>
					<span class="f-l mt-13">-</span>
					<div class="f-l garis-bawah mt-13 mw-08in">
						Tes22
					</div>
				</td>
				<td class="text-left">
						<div class="text-center">Bacalah petunjuk pengisian sebelum mengisi formulir ini</div><hr>
					<div>

						<div class="f-l">
							<sub>H.02</sub>
							<input type="checkbox" disabled checked>
						</div>
						<div class="f-l">
							SPT<br>NORMAL
						</div>
					</div>
					<div>

						<div class="f-l" style="margin-left:70px;">
							<sub>H.03</sub>
							<input type="checkbox" disabled checked>
						</div>
						<div class="f-l">
							SPT<br>PEMBETULAN KE-
						</div>
						<div class="f-l">
							<div class="garis-bawah mt-15">aaaaa</div>
						</div>
						<div class="f-l">
							<sub>H.04</sub>
						</div>
					</div>
					
				</td>
				<td>
					<div class="f-l">
						JUMLAH LEMBAR SPT <br> TERMASUK LAMPIRAN : <br> <span style="font-size:8px">(DIISI OLEH PETUGAS)</span>
					</div>
					<div class="f-l mt-15">
						<div class="f-l mw-05in">
							<span class="garis-bawah">&nbsp; TES &nbsp;</span><br><sub>H.05</sub>
						</div>
						<div class="f-l mw-05in">
							<span class="garis-bawah">&nbsp; TES &nbsp;</span><br><sub>H.06</sub>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<!-- KEPALA LAPORAN -------------------------------------------------- -->
		<!-- IDENTITAS PEMOTONG -------------------------------------------------- -->
		<strong><p>A. IDENTITAS PEMOTONG</p></strong>
		<table class="new border p-3" style="width:8.3in" >
		
			<tr>
				<td>1.NPWP</td>
				<td>:<sub>A.01</sub></td>
				<td>
					<div class="garis-bawah f-l mw-18in">
						tes
					</div>
					<span class="f-l m-lr-5">
						-
					</span>
					<div class="garis-bawah f-l mw-05in">
						tes
					</div>
					<span class="f-l m-lr-5">
						.
					</span>
					<div class="garis-bawah f-l mw-05in">
						tes
					</div>
				</td>
			</tr>
			<tr>
				<td>2.NAMA</td>
				<td>:<sub>A.02</sub></td>
				<td>
					<div class="garis-bawah" style="min-width: 7in;">
						Tesssssss
					</div>
				</td>
			</tr>
			<tr>
				<td>
					3.ALAMAT
				</td>
				<td>:<sub>A.03</sub></td>
				<td>
					<div class="garis-bawah f-l" style="max-width:7in">
						Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Recusandae tempore voluptatum eaque consequatur harum doloribus molestiae aliquam, excepturi qui incidunt laboriosam a, repellat sapiente, id quibusdam quam, aut reprehenderit quaerat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, minima dolor provident eos dicta fugit, quam impedit qui velit cumque dolore ex aliquam reprehenderit dolorum nemo voluptatem veniam maiores nisi?
					</div>
				</td>
			</tr>
			<tr>
				<td>4. NO. TELEPON</td>
				<td>:<sub>A.04</sub></td>
				<td>
					<div class="garis-bawah f-l" style="min-width:3in;">
						tes
					</div>
					<div class="f-l" style="margin-left:10px">
						5. EMAIL : <sub>A.05</sub>
					</div>
					<div class="garis-bawah f-l" style="min-width:3.1in; margin-left:10px">
						Email
					</div>

			</tr>
		</table>
		<!-- IDENTITAS PEMOTONG-------------------------------------------------- -->
		<!-- OBJEK PAJAK-------------------------------------------------- -->
		<strong><p>B. OBJEK PAJAK</p></strong>

		<table style="border-collapse:collapse;" border class="new2">
			<tr class="text-center">
				<td>NO</td>
				<td>PENERIMA PENGHASILAN</td>
				<td>KODE OBJEK PAJAK</td>
				<td>JUMLAH PENERIMA PENGHASILAN</td>
				<td>JUMLAH PENGHASILAN BRUTO (Rp)</td>
				<td>JUMLAH PAJAK DIPOTONG (Rp)</td>
			</tr>
			<tr class="bg-grey text-center">
				<td>(1)</td>
				<td>(2)</td>
				<td>(3)</td>
				<td>(4)</td>
				<td>(5)</td>
				<td>(6)</td>
			</tr>
			<tr>
				<td>1.</td>
				<td>PEGAWAI TETAP</td>
				<td class="text-center">21-100-01</td>
				<td class="text-right">a1</td>
				<td class="text-right">b1</td>
				<td class="text-right">c1</td>
			</tr>
			<tr>
				<td>2.</td>
				<td>PENERIMA PENSIUN BERKALA</td>
				<td class="text-center">21-100-02</td>
				<td class="text-right">a2</td>
				<td class="text-right">b2</td>
				<td class="text-right">c2</td>
			</tr>
			<tr>
				<td>3.</td>
				<td>PEGAWAI TIDAK TETAP ATAU TENAGA KERJA LEPAS</td>
				<td class="text-center">21-100-03</td>
				<td class="text-right">a3</td>
				<td class="text-right">b3</td>
				<td class="text-right">c3</td>
			</tr>
			<tr>
				<td rowspan="7">4.</td>
				<td>BUKAN PEGAWAI:</td>
				<td class="bg-grey"></td>
				<td class="bg-grey"></td>
				<td class="bg-grey"></td>
				<td class="bg-grey"></td>
			</tr>
			<tr>
				<td>4a. DISTRIBUTOR MULTILEVEL MARKETING (MLM)</td>
				<td class="text-center">21-100-04</td>
				<td class="text-right">a4</td>
				<td class="text-right">b4</td>
				<td class="text-right">c4</td>
			</tr>
			<tr>
				<td>4b. PETUGAS DINAS LUAR ASURANSI</td>
				<td class="text-center">21-100-05</td>
				<td class="text-right">a5</td>
				<td class="text-right">b5</td>
				<td class="text-right">c5</td>
			</tr>
			<tr>
				<td>4c.PENJAJA BARANG DAGANGAN</td>
				<td class="text-center">21-100-06</td>
				<td class="text-right">a6</td>
				<td class="text-right">b6</td>
				<td class="text-right">c6</td>
			</tr>
			<tr>
				<td>4d. TENAGA AHLI</td>
				<td class="text-center">21-100-07</td>
				<td class="text-right">a7</td>
				<td class="text-right">b7</td>
				<td class="text-right">c7</td>
			</tr>
			<tr>
				<td>4e. BUKAN PEGAWAI YANG MENERIMA IMBALAN YANG BERSIFAT BERKESINAMBUNGAN</td>
				<td class="text-center">21-100-08</td>
				<td class="text-right">a8</td>
				<td class="text-right">b8</td>
				<td class="text-right">c8</td>
			</tr>
			<tr>
				<td>4f. BUKAN PEGAWAI YANG MENERIMA IMBALAN YANG TIDAK BERSIFAT BERKESINAMBUNGAN</td>
				<td class="text-center">21-100-09</td>
				<td class="text-right">a9</td>
				<td class="text-right">b9</td>
				<td class="text-right">c9</td>
			</tr>
			<tr>
				<td>5.</td>
				<td>ANGGOTA DEWAN KOMISARIS ATAU DEWAN PENGAWAS YANG TIDAK MENANGKAP SEBAGAI PEGAWAI TETAP</td>
				<td class="text-center">21-100-10</td>
				<td class="text-right">a10</td>
				<td class="text-right">b10</td>
				<td class="text-right">c10</td>
			</tr>
			<tr>
				<td>6.</td>
				<td>ANGGOTA DEWAN KOMISARIS ATAU DEWAN PENGAWAS YANG TIDAK MENANGKAP SEBAGAI PEGAWAI TETAP</td>
				<td class="text-center">21-100-11</td>
				<td class="text-right">a11</td>
				<td class="text-right">b11</td>
				<td class="text-right">c11</td>
			</tr>
			<tr>
				<td>7.</td>
				<td>PEGAWAI YANG MELAKUKAN PENARIKAN DANA PENSIUN</td>
				<td class="text-center">21-100-12</td>
				<td class="text-right">a12</td>
				<td class="text-right">b12</td>
				<td class="text-right">c12</td>
			</tr>
			<tr>
				<td>8.</td>
				<td>PESERTA KEGIATAN</td>
				<td class="text-center">21-100-13</td>
				<td class="text-right">a13</td>
				<td class="text-right">b13</td>
				<td class="text-right">c13</td>
			</tr>
			<tr>
				<td>9.</td>
				<td>PENERIMA PENGHASILAN YANG DIPOTONG PPh PASAL 21 TIDAK FINAL LAINNYA</td>
				<td class="text-center">21-100-99</td>
				<td class="text-right">a14</td>
				<td class="text-right">b14</td>
				<td class="text-right">c14</td>
			</tr>
			<tr>
				<td>10.</td>
				<td>PEGAWAI/PEMBERI JASA/PESERTA KEGIATAN/PENERIMA PENSIUN BERKALA SEBAGAI WAJIB PAJAK LUAR NEGERI</td>
				<td class="text-center">27-100-99</td>
				<td class="text-right">a15</td>
				<td class="text-right">b15</td>
				<td class="text-right">c15</td>
			</tr>
			<tr>
				<td>11.</td>
				<td>JUMLAH <span style="font-size:8px">(PENJUMLAHAN ANGKA 1 S.D. 10)</span></td>
				<td class="bg-grey"></td>
				<td class="text-right">a16</td>
				<td class="text-right">b16</td>
				<td class="text-right">c16</td>
			</tr>
			<tr>
				<td class="bg-grey"></td>
				<td class="text-center bg-grey" colspan=4>PENGHITUNGAN PPh PASAL 21 DAN/ATAU PASAL 26 YANG KURANG (LEBIH) DISETOR</td>
				<td class="bg-grey text-center">JUMLAH (Rp)</td>
			</tr>
			<tr>
				<td>12.</td>
				<td colspan="4">
					STP PPh PASAL 21 DAN/ATAU PASAL 26 (HANYA POKOK PAJAK)
					<div class="f-r"><sub>B.01</sub></div>
				</td>
				<td class="text-right">c17</td>
			</tr>
			<tr>
				<td>13.</td>
				<td colspan="4">
					KELEBIHAN PENYETORAN PPh PASAL 21 DAN/ATAU PASAL 26 DARI :
					<div class="f-r"><sub>B.03</sub></div>
					<br><div class="f-l">MASA PAJAK :</div>
					<div class="f-l">
						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							01
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							02
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							03
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							04
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							05
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							06
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							07
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							08
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							09
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							10
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							11
						</div>

						<div class="f-l text-center">
							<input type="checkbox" checked>
							<br>
							12
						</div>

						<div class="f-l text-center mt-5" style="margin-left:40px;">
							<sub>B.02</sub>
						</div>

						<div class="f-l text-center">
							<div class="garis-kkb" style="margin-top:8px;">YYYY</div>
							TAHUN KALENDER (yyyy)
							
						</div>


					</div>

				</td>
				<td class="text-right">c18</td>
			</tr>
			<tr>
				<td>14.</td>
				<td colspan="4">
					JUMLAH <span style="font-size:8px;">(ANGKA 12 + ANGKA 13)</span>
					<div class="f-r"><sub>B.04</sub></div>
				</td>
				<td class="text-right">c19</td>
			</tr>
			<tr>
				<td>15.</td>
				<td colspan="4">
					PPh PASAL 21 DAN/ATAU PASAL 26 YANG KURANG (LEBIH) DISETOR <span style="font-size:8px;">(ANGKA 11 KOLOM 6 - ANGKA 14)</span>
					<div class="f-r"><sub>B.05</sub></div>
				</td>
				<td class="text-right">c20</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="4" style="font-size:8px;font-style:italic;">LANJUTKAN PENGISIAN PADA ANGKA 16 & 17 APABILA SPT PEMBETULAN DAN/ATAU PADA ANGKA 18 APABILA PPh LEBIH DISETOR</td>
				<td class="bg-grey"></td>
			</tr>
			<tr>
				<td>16</td>
				<td colspan="4">
					PPh PASAL 21 DAN/ATAU PASAL 26 YANG KURANG (LEBIH) DISETOR PADA SPT YANG DIBETULKAN <br>
					<span style="font-size:8px">(PINDAHAN DARI BAGIAN B ANGKA 15 DARI SPT YANG DIBETULKAN)</span>
					<div class="f-r"><sub>B.06</sub></div>
				</td>
				<td class="text-right">c21</td>
			</tr>
			<tr>
				<td>17</td>
				<td colspan="4">
					PPh PASAL 21 DAN/ATAU PASAL 26 YANG KURANG (LEBIH) DISETOR KARENA PEMBETULAN <span style="font-size:8px">(ANGKA 15-ANGKA 16)</span>
					<div class="f-r"><sub>B.07</sub></div>
				</td>
				<td class="text-right">c22</td>
			</tr>
			<tr>
				<td>18</td>
				<td colspan="4">
					KELEBIHAN SETOR PADA ANGKA 15 ATAU ANGKA 17 AKAN DIKOMPENSASIKAN KE MASA PAJAK (mm-yyyy)
					<div class="f-r"><sub>B.08</sub></div>
				</td>
				<td>
					<div class="garis-bawah f-l mr-5 text-center" style="min-width: 0.3in">
						b23
					</div>
					<div class="f-l mr-5">
						-
					</div>
					<div class="garis-bawah f-l text-center" style="min-width:0.5in">
						c23
					</div>
				</td>
			</tr>

		</table>
		<table class="border mt-15 new2" style="border-collapse: collapse;">
			<tr>
				<td>NPWP PEMOTONG: <sub>B.09</sub></td>
				<td>
					<div class="garis-bawah mw-18in f-l">a</div>
				</td>
				<td>-</td>
				<td>
					<div class="garis-bawah mw-05in f-l">a</div>
				</td>
				<td>.</td>
				<td>
					<div class="garis-bawah mw-05in f-l">a</div>
				</td>
			</tr>
			
		</table>
		<!-- OBJEK PAJAK-------------------------------------------------- -->


		<!-- OBJEK PAJAK FINAL-------------------------------------------------- -->
		<strong><p>C. OBJEK PAJAK FINAL</p></strong>


		<table class="new2" border style="border-collapse:collapse;">
			<tr class="text-center">
				<td>NO</td>
				<td>PENERIMA PENGHASILAN</td>
				<td>KODE OBJEK PAJAK</td>
				<td>JUMLAH PENERIMA PENGHASILAN</td>
				<td>JUMLAH PENGHASILAN BRUTO (Rp)</td>
				<td>JUMLAH PAJAK DIPOTONG (Rp)</td>
			</tr>
			<tr class="bg-grey text-center">
				<td>(1)</td>
				<td>(2)</td>
				<td>(3)</td>
				<td>(4)</td>
				<td>(5)</td>
				<td>(6)</td>
			</tr>
			<tr>
				<td>1.</td>
				<td>PENERIMA UANG PESANGON YANG DIBAYARKAN SEKALIGUS</td>
				<td class="text-center">21-401-01</td>
				<td class="text-right">a23</td>
				<td class="text-right">b23</td>
				<td class="text-right">c23</td>
			</tr>
			<tr>
				<td>2.</td>
				<td>PENERIMA UANG MANFAAT PENSIUN, TUNJANGAN HARI TUA ATAU JAMINAN HARI TUA DAN PEMBAYARAN SEJENIS YANG DIBAYARKAN SEKALIGUS</td>
				<td class="text-center">21-401-02</td>
				<td class="text-right">a24</td>
				<td class="text-right">b24</td>
				<td class="text-right">c24</td>
			</tr>
			<tr>
				<td>3.</td>
				<td>PEJABAT NEGARA, PEGAWAI NEGERI SIPIL, ANGGOTA TNI/POLRI DAN PENSIUNAN YANG MENERIMA HONORARIUM DAN IMBALAN LAIN YANG DIBEBANKAN KEPADA KEUANGAN NEGARA/DAERAH</td>
				<td class="text-center">21-402-01</td>
				<td class="text-right">a25</td>
				<td class="text-right">b25</td>
				<td class="text-right">c25</td>
			</tr>
			<tr>
				<td>4.</td>
				<td>PENERIMA PENGHASILAN YANG DIPOTONG PPh PASAL 21 FINAL LAINNYA</td>
				<td class="text-center">21-499-99</td>
				<td class="text-right">a26</td>
				<td class="text-right">b26</td>
				<td class="text-right">c26</td>
			</tr>
			<tr>
				<td>5.</td>
				<td><span style="font-weight:bold;font-size:10px;">JUMLAH BAGIAN C </span>(PENJUMLAHAN ANGKA 1 S.D. 5</td>
				<td class="bg-grey"></td>
				<td class="text-right">a27</td>
				<td class="text-right">b27</td>
				<td class="text-right">c27</td>
			</tr>
		</table>
		<!-- OBJEK PAJAK FINAL-------------------------------------------------- -->

		<!-- LAMPIRAN-------------------------------------------------- -->
		<strong><p>D. LAMPIRAN</p></strong>
		<table border style="width: 8.3in;border-collapse:collapse;" class="new2">

			<tr>
				<td style="width:4.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						1.<br>
						<sub>D.01</sub>
					</div>
					<div class="f-l">FORMULIR 1721 - I <br> (untuk Satu Masa Pajak)</div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.02</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">a28</div>
						&nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
				<td>
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						5.<br>
						<sub>D.09</sub>
					</div>
					<div class="f-l" style="margin-top:5px">FORMULIR 1721 - IV <br></div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.10</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">b28</div>
						 &nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:3.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						2.<br>
						<sub>D.03</sub>
					</div>
					<div class="f-l">FORMULIR 1721 - I <br> (untuk Satu Tahun Pajak)</div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.04</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">a29</div>
						&nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
				<td style="width:4.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						6.<br>
						<sub>D.11</sub>
					</div>
					<div class="f-l" style="margin-top:5px">FORMULIR 1721 - V <br></div>
					
				</td>
			</tr>

			<tr>
				<td style="width:3.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						3.<br>
						<sub>D.05</sub>
					</div>
					<div class="f-l" style="margin-top:5px;">FORMULIR 1721 - II</div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.06</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">a30</div>
						&nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
				<td style="width:4.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						7.<br>
						<sub>D.12</sub>
					</div>
					<div class="f-l">SURAT SETORAN PAJAK (SSP) DAN/ATAU<br>BUKTI PEMINDAHBUKUAN (Pbk)</div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.13</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">b30</div>
						 &nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:3.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						4.<br>
						<sub>D.07</sub>
					</div>
					<div class="f-l" style="margin-top:5px;">FORMULIR 1721 - III <br></div>
					<div class="f-r" style="margin-top:10px;">
						<span class="f-l"><sub>D.08</sub></span>
						<div class="garis-bawah mw-05in f-l text-center">a31</div>
						&nbsp;&nbsp;&nbsp;LEMBAR
					</div>
				</td>
				<td style="width:4.5in;">
					<div class="f-l"><input type="checkbox" checked></div>
					<div class="f-l">
						8.<br>
						<sub>D.14</sub>
					</div>
					<div class="f-l" style="margin-top:5px">SURAT KHUASA KHUSUS <br></div>
					
				</td>
			</tr>

		</table>
		<!-- LAMPIRAN-------------------------------------------------- -->

		<!-- PERNYATAAN DAN TANDA TANGAN PEMOTONG-------------------------------------------------- -->
		<strong><p>E. PERNYATAAN DAN TANDA TANGAN PEMOTONG</p></strong>
		<table style="width:8.3in;border-collapse:collapse;border:1px solid black;">
			<tr>
				<td colspan="2" class="text-center" style="padding:3px;font-size:12px;border-collapse:collapse;border:1px solid black">
					Dengan menyadari sepenuhnya atas segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuan yang berlaku, saya menyatakan bahwa apa yang telah saya beritahukan di atas beserta lampiran-lampirannya adalah benar, lengkap dan jelas.
				</td>
			</tr>
			<tr>
				<td style="width:5in;">


					<div class="f-l mt-5 mr-5">
						1. 
					</div>
					<div class="f-l">
						<input type="checkbox">
					</div>
					<div class="f-l mt-5">
						<sub>
							E.01
						</sub>
						PEMOTONG
					</div>

					<div class="f-l" style="margin-left:1in">
						<input type="checkbox">
					</div>
					<div class="f-l mt-5">
						<sub>
							E.02
						</sub>
						KUASA
					</div>


				</td>
				<td rowspan="5" style="border-left:1px solid black">
					6. TANDA TANGAN :<br>
					<div style="width:3in;height: 1in;border:1px solid black">IMGHERE</div>
				</td>
			</tr>
			<tr>
				<td>
					
					<div class="f-l mt-5 mr-5">
						2.
					</div>
					<div class="f-l mt-5 mr-5">
						NPWP :
						<sub>
							E.03
						</sub>
					</div>
					<div class="f-l mt-5">
						<div class="garis-bawah f-l mw-18in">
							tes
						</div>
						<span class="f-l m-lr-5">
							-
						</span>
						<div class="garis-bawah f-l mw-05in">
							tes
						</div>
						<span class="f-l m-lr-5">
							.
						</span>
						<div class="garis-bawah f-l mw-05in">
							tes
						</div>
					</div>

				</td>
			</tr>
			<tr>
				<td>
					
					<div class="f-l mt-5 mr-5">
						3.
					</div>
					<div class="f-l mt-5 mr-5">
						NAMA :
						<sub>
							E.04
						</sub>
					</div>
					<div class="f-l mt-5">
						<div class="garis-bawah f-l" style="min-width: 4in;">
							NAMA
						</div>
					</div>

				</td>
			</tr>
			<tr>
				<td>
					
					<div class="f-l mt-5 mr-5">
						4.
					</div>
					<div class="f-l mt-5 mr-5">
						TANGGAL :
						<sub>
							E.06
						</sub>
					</div>
					<div class="f-l mt-5">
						<div class="garis-bawah f-l mw-05in text-center">
							10
						</div>
						<span class="f-l m-lr-5">
							-
						</span>
						<div class="garis-bawah f-l mw-05in text-center">
							04
						</div>
						<span class="f-l m-lr-5">
							-
						</span>
						<div class="garis-bawah f-l mw-08in text-center">
							2021
						</div>
						<div class="f-l">(dd-mm-yyyy)</div>
					</div>

				</td>
			</tr>
			<tr>
				<td>
					
					<div class="f-l mt-5 mr-5">
						5.
					</div>
					<div class="f-l mt-5 mr-5">
						TEMPAT :
						<sub>
							E.06
						</sub>
					</div>
					<div class="f-l mt-5">
						<div class="garis-bawah f-l" style="min-width: 4in;">
							SAMPIT
						</div>
					</div>

				</td>
			</tr>
		</table>
		<!-- PERNYATAAN DAN TANDA TANGAN PEMOTONG-------------------------------------------------- -->

	</div>

</body>
</html>
