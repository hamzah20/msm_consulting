<!DOCTYPE html>
<html>
<head>
  <title>SPT 22 MASA</title>
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
    input[disabled] {
 	  color: black;
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
    .div-tengah{
      display: flex;
      align-items: center;
    }

    #kotak{
      border: 1px solid black;
      background: linear-gradient(to left, black 1px, transparent 0);
      background-size: 16px 1px;
      font: 10px monaco, monospace; 
      letter-spacing: 10.5px;
      text-indent: 2px;
      text-transform: uppercase;
    }
    input[type=text]{
    	border: 0;
    	border-bottom: 1px solid black;
    	background-color: white;
    }
    .bold {
      font-weight: bold;
    }
    .no-border{
      border: 0 !important;
    }
    .no-border-vert{
      border-top: none !important;
      border-bottom: none !important;
    }

  </style>
</head>
<body>


  <div style="width:8.3in; height: 12.9in;" >

    <!-- Kepala Laporan ------------------------------------- -->
    <table border style="border-collapse:collapse">

    	<tr class="text-center">
    		<td rowspan="2" class="text-center">
    			<img src="<?php echo base_url('/assets/images/spt/kemenkeu.png'); ?>" style="height: 70px;margin:auto;" /><br>
    			KEMENTRIAN KEUANGAN RI <br>DIREKTORAT JENDERAL PAJAK
    		</td>
    		<td style="font-size:15px;width: 4.6in;">
    			SURAT PEMBERITAHUAN (SPT) MASA <br>
    			PAJAK PENGHASILAN PASAL 23 DAN/ATAU PASAL 26
    		</td>
    		<td rowspan="2" style="width:2.1in">
    			<div class="text-right" style="margin-bottom: 30px;font-size: 13px;">FORMULIR 1724 <br> INDUK</div>
    			<br>
    			<div>Area Barcode</div>
    			
    		</td>
    	</tr>

    	<tr>
    		<td class="text-center">
    			Formulir ini digunakan untuk melaporkan pemotongan <br> Pajak Penghasilan Pasal 23 dan/atau Pasal 26
    		</td>
    	</tr>

    	<tr>
    		<td>
    			Masa Pajak (mm-yyyy)<sub>H.1</sub><br>
    			<input type="text" id="kotak" style="width:27px;" value="01">
    			&nbsp;-&nbsp;
    			<input type="text" id="kotak" style="width:59px;" value="2077">
    		</td>
    		<td class="text-center">
    			Bacalah petunjuk pengisian sebelum mengisi formulir ini <hr>
    			
    			<div class="div-tengah f-l">
    				<sub>H.2</sub>
    				<input type="checkbox" disabled checked>
    				SPT Normal
    			</div>
    			<div class="div-tengah f-r">
    				<sub>H.3</sub>
    				<input type="checkbox" disabled checked>
    				Pembetulan Ke- <input type="text" style="width:30px" value="12">
    				<sub>H.4</sub>
    			</div>
    		</td>
    		<td>
    			JUMLAH LEMBAR SPT TEMASUK <br>LAMPIRAN :
    			<br>(Diisi oleh petugas)
    			<input type="text" style="width:30px" value="0">
    			<sub>H.5</sub>
    		</td>

		</tr>
    </table>
    <!-- Kepala Laporan ------------------------------------- -->

    <!-- Bagian A. ------------------------------------- -->

    <strong>
      <p>A. IDENTITAS PEMOTONG PAJAK</p>
    </strong>

      <table class="new2" style="border:1px solid black;width:8.3in">
        <tr>
          <td>
            A.1 NPWP
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled id="kotak" style="width:26px" value="02">
            &nbsp;
            <input type="text" disabled id="kotak" style="width:42px" value="691">
            &nbsp;
            <input type="text" disabled id="kotak" style="width:42px" value="912">
            &nbsp;
            <input type="text" disabled id="kotak" style="width:10px" value="6">
            &nbsp;
            <input type="text" disabled id="kotak" style="width:42px" value="712">
            &nbsp;
            <input type="text" disabled id="kotak" style="width:42px" value="000">
          </td>
        </tr>

        <tr>
          <td>
            A.2 Nama
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled style="width:600px" value="PT. GADING SAWIT KENCANA">
          </td>
        </tr>

        <tr>
          <td>
            A.3 Alamat
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled style="width:600px" value="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. e">
          </td>
        </tr>

        <tr>
          <td>
            A.4 NO. TELEPON
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled style="width:200px" value="053122150">
            &nbsp; A.5 EMAIL :
            <input type="text" disabled style="width:330px" value="gadingsawitkencana19@gmail.com">
          </td>
        </tr>



      </table>
      <!-- Bagian A. ------------------------------------- -->


      <!-- Bagian B. ------------------------------------- -->
      <strong>
        <p>
          B. OBJEK PAJAK
        </p>
      </strong>
      
      <table border style="border-collapse:collapse;width:8.3in">

      	<tr class="text-center bg-grey">
      		<td>
      			NO
      		</td>
      		<td>
      			URAIAN
      		</td>
      		<td>
      			KODE OBJEK PAJAK
      		</td>
      		<td>
      			JUMLAH PENGHASILAN BRUTO <br> (Rp.)
      		</td>
      		<td>
      			JUMLAH PPh YANG DIPOTONG DTP(Rp)
      		</td>
      	</tr>

      	<tr class="text-center bg-grey">
      		<td>
      			B.1
      		</td>
      		<td>
      			B.2
      		</td>
      		<td>
      			B.3
      		</td>
      		<td>
      			B.4
      		</td>
      		<td>
      			B.5
      		</td>
      	</tr>

      	<tr>
      		<td colspan="5" class="bg-grey">
      			I. PPh PASAL 23
      		</td>
      	</tr>

      	<tr>
      		<td>
      			1
      		</td>
      		<td>
      			DEVIDEN
      		</td>
      		<td class="text-center">
      			24-101-01
      		</td>
      		<td class="text-right">
      			a1
      		</td>
      		<td class="text-right">
      			b1
      		</td>
      	</tr>

      	<tr>
      		<td>
      			2
      		</td>
      		<td>
      			BUNGA
      		</td>
      		<td class="text-center">
      			24-102-01
      		</td>
      		<td class="text-right">
      			a2
      		</td>
      		<td class="text-right">
      			b2
      		</td>
      	</tr>

      	<tr>
      		<td>
      			3
      		</td>
      		<td>
      			ROYALTI
      		</td>
      		<td class="text-center">
      			24-103-01
      		</td>
      		<td class="text-right">
      			a3
      		</td>
      		<td class="text-right">
      			b3
      		</td>
      	</tr>

      	<tr>
      		<td>
      			4
      		</td>
      		<td>
      			HADIAH, PENGHARGAAN, BONUS DAN LAINNYA
      		</td>
      		<td class="text-center">
      			24-100-01
      		</td>
      		<td class="text-right">
      			a4
      		</td>
      		<td class="text-right">
      			b4
      		</td>
      	</tr>

      	<tr>
      		<td>
      			5
      		</td>
      		<td>
      			SEWA DAN PENGHASILAN LAIN SEHUBUNGAN DENGAN PENGGUNAAN HARTA
      		</td>
      		<td class="text-center">
      			24-100-02
      		</td>
      		<td class="text-right">
      			a5
      		</td>
      		<td class="text-right">
      			b5
      		</td>
      	</tr>

      	<tr>
      		<td>
      			6
      		</td>
      		<td>
      			
      		</td>
      		<td class="text-center" style="border-left:0">
      			
      		</td>
      		<td class="text-right bg-grey">
      			
      		</td>
      		<td class="text-right bg-grey">
      			
      		</td>
      	</tr>

      	<tr>
      		<td>
      			
      		</td>
      		<td>
      			6a. JASA TEKNIK
      		</td>
      		<td class="text-center">
      			24-104-01
      		</td>
      		<td class="text-right">
      			a6
      		</td>
      		<td class="text-right">
      			b6
      		</td>
      	</tr>

      	<tr>
      		<td>
      			
      		</td>
      		<td>
      			6b. JASA MANAJEMEN
      		</td>
      		<td class="text-center">
      			24-104-02
      		</td>
      		<td class="text-right">
      			a7
      		</td>
      		<td class="text-right">
      			b7
      		</td>
      	</tr>

      	<tr>
      		<td>
      			
      		</td>
      		<td>
      			6c. JASA KONSULTAN
      		</td>
      		<td class="text-center">
      			24-104-03
      		</td>
      		<td class="text-right">
      			a8
      		</td>
      		<td class="text-right">
      			b8
      		</td>
      	</tr>

      	<tr>
      		<td>
      			
      		</td>
      		<td>
      			6d. JASA LAIN SELAIN JASA YANG TELAH DIPOTONG PPh PASAL 21
      		</td>
      		<td class="text-center bg-grey">
      			
      		</td>
      		<td class="text-right">
      			a9
      		</td>
      		<td class="text-right">
      			b9
      		</td>
      	</tr>

      	<tr>
      		<td>
      			7
      		</td>
      		<td>
      			JUMLAH (PENJUMLAHAN ANGKA 1 S.D 6)
      		</td>
      		<td class="text-center bg-grey">
      			
      		</td>
      		<td class="text-right">
      			a10
      		</td>
      		<td class="text-right">
      			b10
      		</td>
      	</tr>

      	<tr>
      		<td>
      			8
      		</td>
      		<td colspan="3">
      			JUMLAH PPh PASAL 23 YANG KURANG DISETOR SETELAH DIKURANGI PPh PASAL 23 DITANGGUNG PEMERINTAH (DTP)
      		</td>
      		<td class="text-right">
      			b11
      		</td>
      	</tr>

      	<tr>
      		<td>
      			9
      		</td>
      		<td colspan="3">
      			  JUMLAH PPh PASAL 23 YANG KURANG DISETOR SEHUBUNGAN DENGAN PENAMBAHAN DAN PEMBETULAN BUKTI PEMOTONGAN
      		</td>
      		<td class="text-right">
      			b12
      		</td>
      	</tr>

      	<tr>
      		<td class="bg-grey" colspan="5">
      			II. PPh PASAL 26
      		</td>
      	</tr>

      	<tr>
      		<td>
      			10
      		</td>
      		<td>
      			DEVIDEN
      		</td>
      		<td class="text-center">
      			27-101-01
      		</td>
      		<td class="text-right">
      			a13
      		</td>
      		<td class="text-right">
      			b13
      		</td>
      	</tr>

      	<tr>
      		<td>
      			11
      		</td>
      		<td>
      			BUNGA
      		</td>
      		<td class="text-center">
      			27-102-01
      		</td>
      		<td class="text-right">
      			a14
      		</td>
      		<td class="text-right">
      			b14
      		</td>
      	</tr>

      	<tr>
      		<td>
      			12
      		</td>
      		<td>
      			ROYALTI
      		</td>
      		<td class="text-center">
      			27-103-01
      		</td>
      		<td class="text-right">
      			a15
      		</td>
      		<td class="text-right">
      			b15
      		</td>
      	</tr>

      	<tr>
      		<td>
      			13
      		</td>
      		<td>
      			SEWA DAN PENGHASILAN LAIN SEHUBUNGAN DENGAN PENGGUNAAN HARTA
      		</td>
      		<td class="text-center">
      			27-100-01
      		</td>
      		<td class="text-right">
      			a16
      		</td>
      		<td class="text-right">
      			b16
      		</td>
      	</tr>

      	<tr>
      		<td>
      			14
      		</td>
      		<td>
      			IMBALAN SEHUBUNGAN DENGAN JASA PEKERJAAN DAN KEGIATAN
      		</td>
      		<td class="text-center">
      			27-104-01
      		</td>
      		<td class="text-right">
      			a17
      		</td>
      		<td class="text-right">
      			b17
      		</td>
      	</tr>

		<tr>
      		<td>
      			15
      		</td>
      		<td>
      			HADIAH DAN PENGHARGAAN
      		</td>
      		<td class="text-center">
      			27-100-02
      		</td>
      		<td class="text-right">
      			a18
      		</td>
      		<td class="text-right">
      			b18
      		</td>
      	</tr>

		<tr>
      		<td>
      			16
      		</td>
      		<td>
      			PENSIUN DAN PEMBAYARAN BERKALA LAINNYA
      		</td>
      		<td class="text-center">
      			27-100-03
      		</td>
      		<td class="text-right">
      			a19
      		</td>
      		<td class="text-right">
      			b19
      		</td>
      	</tr>

      	<tr>
      		<td>
      			17
      		</td>
      		<td>
      			PREMI SWAP DAN TRANSAKSI LINDUNG NILAI LAINNYA
      		</td>
      		<td class="text-center">
      			27-102-02
      		</td>
      		<td class="text-right">
      			a20
      		</td>
      		<td class="text-right">
      			b20
      		</td>
      	</tr>

      	<tr>
      		<td>
      			18
      		</td>
      		<td>
      			KEUNTUNGAN KARENA PEMBEBASAN UTANG
      		</td>
      		<td class="text-center">
      			27-100-04
      		</td>
      		<td class="text-right">
      			a21
      		</td>
      		<td class="text-right">
      			b21
      		</td>
      	</tr>

      	<tr>
      		<td>
      			19
      		</td>
      		<td>
      			PENGHASILAN DARI PENJUALAN ATAU PENGALIHAN HARTA DI INDONESIA
      		</td>
      		<td class="text-center">
      			27-100-05
      		</td>
      		<td class="text-right">
      			a22
      		</td>
      		<td class="text-right">
      			b22
      		</td>
      	</tr>

      	<tr>
      		<td>
      			20
      		</td>
      		<td>
      			PREMI ASURANSI/REASURANSI
      		</td>
      		<td class="text-center">
      			27-100-06
      		</td>
      		<td class="text-right">
      			a23
      		</td>
      		<td class="text-right">
      			b23
      		</td>
      	</tr>

      	<tr>
      		<td>
      			21
      		</td>
      		<td>
      			PENGHASILAN DARI PENJUALAN ATAU PENGALIHAN SAHAM
      		</td>
      		<td class="text-center">
      			27-100-07
      		</td>
      		<td class="text-right">
      			a24
      		</td>
      		<td class="text-right">
      			b24
      		</td>
      	</tr>

      	<tr>
      		<td>
      			22
      		</td>
      		<td>
      			PENGHASILAN KENA PAJAK BUT SETELAH PAJAK
      		</td>
      		<td class="text-center">
      			27-105-01
      		</td>
      		<td class="text-right">
      			a25
      		</td>
      		<td class="text-right">
      			b25
      		</td>
      	</tr>
      	<tr>
      		<td>
      			23
      		</td>
      		<td>
      			JUMLAH (PENJUMLAHAN ANGKA 10 S.D 22)
      		</td>
      		<td class="text-center bg-grey">
      			
      		</td>
      		<td class="text-right">
      			a26
      		</td>
      		<td class="text-right">
      			b26
      		</td>
      	</tr>

      	<tr>
      		<td>
      			24
      		</td>
      		<td colspan="3">
      			JUMLAH PPh PASAL 26 YANG KURANG DISETOR SETELAH DIKURANGI PPh PASAL 26 DITANGGUNG PEMERINTAH (DTP)
      		</td>
      		<td class="text-right">
      			b27
      		</td>
      	</tr>

      	<tr>
      		<td>
      			25
      		</td>
      		<td colspan="3">
      			JUMLAH PPh PASAL 26 YANG KURANG DISETOR SEHUBUNGAN DENGAN PENAMBAHAN DAN PEMBETULAN BUKTI PEMOTONGAN
      		</td>
      		<td class="text-right">
      			b28
      		</td>
      	</tr>

      </table>

      <table>
      	<tr>
      		<td  style="font-size:8px;">
      			1) Tidak termasuk deviden kepada WP orang pribadi dalam negeri <br>
      			2) Tidak termasuk bunga yang menjadi objek PPh Pasal 4 ayat (2)<br>
      			3) Selain yang telah dipotong PPh pasal 21 ayat (1) huruf a<br>
      		</td>
      		<td  style="font-size:8px;padding-left:40px;">
      			4) Tidak termasuk sewa tanah dan bangunan yang telah dikenai PPh Pasal 4 ayat (2) <br>
      			5) Jenis jasa lain sebagaimana angka 6d diatur berdasarkan Peraturan Menteri Keuangan merupakan penjumlahan <br> 
      			&nbsp;&nbsp;&nbsp;dari kode objek pajak 24-104-04 sampai dengan 24-104-05 pada Daftar Bukti Pemotongan PPh pasal 23/26
      		</td>
      	</tr>
      </table>
      <!-- Bagian B. ------------------------------------- -->

      <!-- Bagian C. ------------------------------------- -->

      <strong><p>BAGIAN C. LAMPIRAN</p></strong>

      <table style="border:1px solid black;width:8.3in">
      	<tr>
      		<td style="width:4in">
      			<div class="div-tengah">
      				<span>C.1</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Bukti Pemotongan PPh Pasal 23 dan/atau Pasal 26
      				</span>
      			</div>
      		</td>
      		<td>
      			<input value="9" type="text" style="width:30px;text-align: center;border:1px solid black;">
      			lembar
      		</td>
      	</tr>

      	<tr>
      		<td>
      			<div class="div-tengah">
      				<span>C.3</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Surat Setoran Pajak/Bukti
      				</span>
      			</div>
      		</td>
      		<td>
      			<input value="9" type="text" style="width:30px;text-align: center;border:1px solid black;">
      			lembar
      		</td>
      	</tr>

      	<tr>
      		<td>
      			<div class="div-tengah">
      				<span>C.4</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Surat Kuasa Khusus
      				</span>
      			</div>
      		</td>
      		<td>
      			<input value="9" type="text" style="width:30px;text-align: center;border:1px solid black;">
      			lembar
      		</td>
      	</tr>

      	<tr>
      		<td>
      			<div class="div-tengah">
      				<span>C.5</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Fotokopi Surat Keterangan Bebas
      				</span>
      			</div>
      		</td>
      		<td>
      			<input value="9" type="text" style="width:30px;text-align: center;border:1px solid black;">
      			lembar
      		</td>
      	</tr>

      	<tr>
      		<td>
      			<div class="div-tengah">
      				<span>C.6</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Fotokopi Surat Keterangan Domisili
      				</span>
      			</div>
      		</td>
      		<td>
      			<input value="9" type="text" style="width:30px;text-align: center;border:1px solid black;">
      			lembar
      		</td>
      	</tr>

      	<tr>
      		<td colspan="2">
      			<div class="div-tengah">
      				<span>C.7</span>
      				<input type="checkbox" checked style="margin:0px 3px;height:15px">
      				<span>
      					Fotokopi SPT Masa PPh Pasal 23 dan/atau Pasal 26 yang dibetulkan termasuk lampiran dan Bukti Penerimaan Surat
      				</span>
      			</div>
      		</td>
      	</tr>

      </table>
      <!-- Bagian C. ------------------------------------- -->
      <strong>
      	<p>
      		BAGIAN D. PERNYATAAN DAN TANDA TANGAN
      	</p>
      </strong>

      <table border style="border-collapse:collapse">

      	<tr>
      		<td colspan="4">
      			Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuan perundang-undangan yang berlaku, saya menyatakan bahwa apa yang telah saya beritahukan di atas beserta lampiran-lampirannya adalah benar, lengkap dan jelas.
      		</td>
      	</tr>

      	<tr>
      		<td style="width:0.2in;border:0">
      			D.1
      		</td>
      		<td colspan="2" style="border:0">
      			<div class="div-tengah">
      				<input type="checkbox" checked>
      				WAJIB PAJAK/WAKIL WAJIB PAJAK (PENGURUS, DLL)
      			</div>
      		</td>
      		<td rowspan="6" style="width:2in; padding-left:30px">
      			Sesuai dengan ketentuan yang berlaku, Direktorat Jenderal Pajak mengatur bahwa dokumen ini telah ditandatangani secara elektronik sehingga tidak diperlukan tanda tangan basah
      			
      		</td>
      	</tr>

      	<tr>
      		<td style="border:0">
      			D.2
      		</td>
      		<td colspan="2" style="border:0">
      			<div class="div-tengah">
      				<input type="checkbox" checked>
      				KUASA WAJIB PAJAK
      			</div>
      		</td>
      	</tr>

      	<tr>
      		<td style="border:0">
      			D.3
      		</td>
      		<td style="border:0">
      			NAMA
      		</td>
      		<td style="border:0">
      			<input value="BUDI MARTONO" type="text" disabled style="width:300px;">
      		</td>
      	</tr>

      	<tr>
      		<td style="border:0">
      			D.4
      		</td>
      		<td style="border:0">
      			NPWP
      		</td>
      		<td style="border:0">
	            <input type="text" disabled id="kotak" style="width:26px" value="02">
	            &nbsp;
	            <input type="text" disabled id="kotak" style="width:42px" value="691">
	            &nbsp;
	            <input type="text" disabled id="kotak" style="width:42px" value="912">
	            &nbsp;
	            <input type="text" disabled id="kotak" style="width:10px" value="6">
	            &nbsp;
	            <input type="text" disabled id="kotak" style="width:42px" value="712">
	            &nbsp;
	            <input type="text" disabled id="kotak" style="width:42px" value="000">
          	</td>
      	</tr>

      	<tr>
      		<td style="border:0">
      			D.5
      		</td>
      		<td style="border:0">
      			TANGGAL
      		</td>
      		<td style="border:0">
	           <input type="text" id="kotak" style="width:27px;" value="01">
	           &nbsp;
	           <input type="text" id="kotak" style="width:27px;" value="01">
    			&nbsp;
    			<input type="text" id="kotak" style="width:59px;" value="2077">
          	</td>
      	</tr>

      	<tr>
      		<td style="border:0">
      			D.6
      		</td>
      		<td style="border:0">
      			TEMPAT
      		</td>
      		<td style="border:0">
      			<input value="KAB. KOTAWARINGIN TIMUR" type="text" disabled style="width:300px;">
      		</td>
      	</tr>

      </table>



  </div>

</body>
</html>
