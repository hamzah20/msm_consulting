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

    input[type=text], #kotak{
      border: 1px solid black;
      background: linear-gradient(to left, black 1px, transparent 0);
      background-size: 16px 1px;
      font: 10px monaco, monospace; 
      letter-spacing: 10.5px;
      text-indent: 2px;
      text-transform: uppercase;
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


  <div style="width:8.3in; height: 11.5in;" >

    <!-- Kepala Laporan ------------------------------------- -->
    <table class="new2" border style="border-collapse:collapse;">
      <tr>
        <td rowspan="2">
          <img src="<?php echo base_url('/assets/images/spt/kemenkeu.png'); ?>" style="height: 70px;margin:auto;" />
        </td>
        <td rowspan="2" style="width:1.5in;" class="text-center">
          <h2>
          DEPARTEMEN KEUANGAN R.I <br><br>
          DIREKTORAT JENDERAL PAJAK
          </h2>
        </td>
        <td style="width:3.8in;" class="text-center">
          <h1>SURAT PEMBERITAHUAN (SPT) MASA PAJAK PENGHASILAN PASAL 22</h1>
        </td>
        <td style="width:2in;">
          <div class="div-tengah">
            <input type="checkbox" disabled checked>
            <span>SPT Normal</span>
          </div>
          <div class="div-tengah">
            <input type="checkbox" disabled checked>
            <span>SPT Pembetulan Ke-</span>
          </div>
        </td>
      </tr>

      <tr>
        <td class="text-center">
          Formulir ini digunakan untuk melaporkan Pemungutan Pajak Penghasilan Pasal 22
        </td>
        <td class="text-center">
          <strong>Masa Pajak</strong> <br>
          <input type="text" disabled id="kotak" style="width:26px" value="99">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" disabled id="kotak" style="width:59px" value="2077">
        </td>
      </tr>
    </table>
    <!-- Kepala Laporan ------------------------------------- -->

    <!-- Bagian A. ------------------------------------- -->

    <strong>
      <p>BAGIAN A. IDENTITAS PEMUNGUT PAJAK/WAJIB PAJAK</p>
    </strong>

      <table class="new2" style="border:1px solid black;width:8.3in">
        <tr>
          <td>
            1. NPWP
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
            2. Nama
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled id="kotak" style="width:458px" value="PT. GADING SAWIT KENCANA">
          </td>
        </tr>

        <tr>
          <td>
            3. Alamat
          </td>
          <td>
            :
          </td>
          <td>
            <input type="text" disabled id="kotak" style="width:458px" value="Jl Rangkas 3 No 138 Kotawarin">
          </td>
        </tr>

      </table>
      <!-- Bagian A. ------------------------------------- -->


      <!-- Bagian B. ------------------------------------- -->
      <strong>
        <p>
          BAGIAN B. OBJEK PAJAK
        </p>
      </strong>
      <table class="new2" border style="border-collapse:collapse;width:8.3in">


        <tr class="bg-grey bold text-center">
          <td colspan="2">
            Uraian
          </td>
          <td>
            KAP/KJS
          </td>
          <td>
            Nilai Objek Pajak (Rp)
          </td>
          <td>
            PPh yang dipungut (Rp)
          </td>
        </tr>

        <tr class="bg-grey bold text-center">
          <td colspan="2">
            (1)
          </td>
          <td>
            (2)
          </td>
          <td>
            (3)
          </td>
          <td>
            (4)
          </td>
        </tr>

        <tr>
          <td class="no-border">
            1.
          </td>
          <td class="no-border">
            Badan Usaha Industri/Eksportir
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a1
          </td>
          <td class="text-right">
            b1
          </td>
        </tr>

        <tr>
          <td class="no-border">
            2.
          </td>
          <td class="no-border">
            Penjualan Barang yang tergolong Sangat Mewah
          </td>
          <td class="text-center bold no-border-vert">
            411122/403
          </td>
          <td class="text-right">
            a2
          </td>
          <td class="text-right">
            b2
          </td>
        </tr>

        <tr>
          <td class="no-border">
            3.
          </td>
          <td class="no-border">
            Pembelian Barang Oleh Bendaharawan/Badan Tertentu Yang Ditunjuk
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a3
          </td>
          <td class="text-right">
            b3
          </td>
        </tr>

        <tr>
          <td class="no-border">
            4
          </td>
          <td class="no-border">
            Nilai Impor Bank Devisa/Ditjen Bea dan Cukai *)
          </td>
          <td class="text-center no-border-vert">
            
          </td>
          <td class="text-right bg-grey">
            
          </td>
          <td class="text-right bg-grey">
            
          </td>
        </tr>

        <tr>
          <td class="no-border">
            
          </td>
          <td class="no-border">
            a. API
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a4
          </td>
          <td class="text-right">
            b4
          </td>
        </tr>

        <tr>
          <td class="no-border">
            
          </td>
          <td class="no-border">
            b. Non API
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a5
          </td>
          <td class="text-right">
            b5
          </td>
        </tr>

        <tr>
          <td class="no-border">
            5.
          </td>
          <td class="no-border">
            Hasil Lelang (Ditjen Bea dan Cukai)
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a6
          </td>
          <td class="text-right">
            b6
          </td>
        </tr>

        <tr>
          <td class="no-border">
            6.
          </td>
          <td class="no-border">
            Penjualan Migas Oleh Pertamina / Badan Usaha Selain Pertamina
          </td>
          <td class="text-center no-border-vert">
            
          </td>
          <td class="text-right bg-grey">
            
          </td>
          <td class="text-right bg-grey">
            
          </td>
        </tr>

        <tr>
          <td class="no-border">
            
          </td>
          <td class="no-border">
            a. SPBU/Agen/Penyalur (Final)
          </td>
          <td class="text-center bold no-border-vert">
            411122/401
          </td>
          <td class="text-right">
            a7
          </td>
          <td class="text-right">
            b7
          </td>
        </tr>

        <tr>
          <td class="no-border">
            
          </td>
          <td class="no-border">
            b. Pihak lain (Tidak Final)
          </td>
          <td class="text-center bold no-border-vert">
            411122/100
          </td>
          <td class="text-right">
            a8
          </td>
          <td class="text-right">
            b8
          </td>
        </tr>

        <tr>
          <td class="no-border">
            7.
          </td>
          <td class="no-border no-border-vert">
            
          </td>
          <td class="text-center no-border-vert">
            
          </td>
          <td class="text-right">
            
          </td>
          <td class="text-right">
            
          </td>
        </tr>

        <tr>
          <td colspan="2" class="text-center">
            JUMLAH
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
          <td colspan="5">
            Terbilang : <span style="color:white;background:magenta;">______ (Disebutkan jumlahnya pake bahsa indonesia)</span>
          </td>
        </tr>


      </table>
      *) Coret Yang Tidak Perlu.
      <!-- Bagian B. ------------------------------------- -->

      <!-- Bagian C. ------------------------------------- -->
      <strong><p>
        BAGIAN C. LAMPIRAN
      </p></strong>

      <table style="border:1px solid black" class="new2">

        <tr>
          <td>
            1.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
              Daftar Surat Setoran Pajak PPh Pasal 22 (Khusus untuk Bank Devisa, Bendaharawan/Badan Tertentu Yang Ditunjukdan Pertamina/Badan Usaha Selain Pertamina)
          </td>
        </tr>

         <tr>
          <td>
            2.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            <span>
              Surat Setoran Pajak  (SSP) yang disetor oleh Importir atau Pembeli Barang sebanyak &nbsp;
              <span style="border:1px solid black;padding-left: 5px;padding-right: 5px;">0</span>
              &nbsp; lembar Khusus untuk Bank Devisa, Bendaharawan/Badan Tertentu Yang Ditunjuk dan Pertamina/Badan Usaha Selain Pertamina)
            </span>
          </td>
        </tr>

        <tr>
          <td>
            3.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            <span>
              SSP yang disetor oleh Pemungut Pajak sebanyak: &nbsp;
              <span style="border:1px solid black;padding-left: 5px;padding-right: 5px;">0</span>
              &nbsp; lembar <br>(Khusus untuk Badan Usaha Industri/Eksportir Tertentu, Ditjen Bea dan Cukai)
            </span>
          </td>
        </tr>

        <tr>
          <td>
            4.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            Daftar Bukti Pemungutan PPh Pasal 22 (Khusus untuk Badan Usaha Industri/Eksportir Tertentu dan Ditjen Bea dan Cukai.)
          </td>
        </tr>

        <tr>
          <td>
            5.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            Bukti Pemungutan PPh Pasal 22,(Khusus untuk Badan Usaha Industri/Eksportir Tertentu dan Ditjen Bea dan Cukai.)
          </td>
        </tr>

        <tr>
          <td>
            6.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            Daftar rincian penjualan dan retur penjualan (dalam hal ada penjualan retur).
          </td>
        </tr>

        <tr>
          <td>
            7.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            Risalah lelang (dalam hal pelaksanaan lelang).
          </td>
        </tr>

        <tr>
          <td>
            8.
          </td>
          <td>
            <input type="checkbox" disabled checked class="m-lr-5">
          </td>
          <td>
            Surat Kuasa Khusus.
          </td>
        </tr>

      </table>
      <!-- Bagian C. ------------------------------------- -->

      <!-- Bagian D. ------------------------------------- -->
      <strong><p>BAGIAN D. PERNYATAAN DAN TANDA TANGAN</p></strong>

      <table border style="border-collapse:collapse" class="new2">
        <tr>
          <td colspan="2">
            Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuanperundang-undangan yang berlaku, saya menyatakan bahwa apa yag telah saya beritahukan di atas besertalampiran-lampirannya adalah benar, lengkap dan jelas.
            <hr>
            <table>

              <tr>
                <td colspan="2">
                  <div class="div-tengah">
                    <input type="checkbox" disabled checked>
                    <span>PEMUNGUT PAJAK/PIMPINAN</span>

                    <input type="checkbox" disabled checked style="margin-left:100px;">
                    <span>KUASA WAJIB PAJAK</span>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  Nama
                </td>
                <td style="padding-left: 30px;">
                  <input type="text" disabled id="kotak" style="width:330px" value="Budi Martono">
                </td>
              </tr>

              <tr>
                <td>
                  NPWP
                </td>
                <td style="padding-left: 30px;">
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

            </table>

          </td>
          <td style="width:1.2in;padding:0;">
            <div class="bg-grey text-center bold garis-bawah" style="padding:5px;">
              Diisi Oleh Petugas
            </div>
            &nbsp;SPT Masa Diterima :

            <div class="div-tengah">
              <input type="checkbox" disabled checked>
              <span>Langsung dari WP</span>
            </div>
            <div class="div-tengah">
              <input type="checkbox" disabled checked>
              <span>Melalui Pos</span>
            </div>
            <hr>
            Tanggal <br>
            <input type="text" disabled id="kotak" style="width:123px" value="12345678">
            <div style="height:26px"></div>



          </td>
        </tr>

        <tr style="vertical-align:top;">
          <td style="width:2.77in;height: 0.5in;">
            Tanda Tangan & Cap
          </td>
          <td style="width:2.77in">
            Tanggal &nbsp;<input type="text" disabled id="kotak" style="width:123px" value="12345678">
          </td>
          <td style="width:2.77in">
            Tanda Tangan
          </td>
        </tr>

      </table>
      <!-- Bagian D. ------------------------------------- -->

      <div style="font-weight:bold;margin-top:30px">
        <div class="f-l">
          F.1.1.32.02
        </div>
        <div class="f-r">
          Lampiran III. 1 Peraturan Direktur Jenderal Pajak Nomor PER-53/PJ2009
        </div>
      </div>


  </div>

</body>
</html>
