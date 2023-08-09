<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { 
      size: A4 
    }

    #title {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: bold;
     }
    .tabeldatakaryawan {
      margin-top: 30px;
    }
    
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table>
      <tr>
        <td style="width: 100px">
          <img src="{{ asset('assets/img/yodyakarya.png') }}" width="70" height="70" alt="">
        </td>
        <td>
          <span id="title">
            LAPORAN ABSENSI KARYAWAN<br/>
            PERIODE {{ strtoupper( $namabulan[$bulan] )  }} {{ $tahun }}<br/>
            PT.YODYA KARYA PERSERO <br/>
          </span>
          <span><i>Timur DKI Jakarta, Jl. Mayjen DI Panjaitan Kav 8 Cipinang Besar Selatan, RT.5/RW.11, Cipinang Cempedak, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13340</i></span>
        </td>
      </tr>
    </table>
    <table class="tabeldatakaryawan">
      <tr>
        <td rowspan="6">
          @php
              $path = Storage::url('uploads/karyawan/'. $karyawan->foto);
          @endphp
          <img src="{{ url($path) }}" width="120px" alt="">
        </td>
        <td>NIK</td>
        <td>:</td>
        <td>{{ $karyawan->nik }}</td>
      </tr>
      <tr>
        <td>Nama karyawan</td>
        <td>:</td>
        <td>{{ $karyawan->nama_lengkap }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $karyawan->jabatan }}</td>
      </tr>
      <tr>
        <td>Departemen</td>
        <td>:</td>
        <td>{{ $karyawan->nama_dept }}</td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td>{{ $karyawan->no_hp }}</td>
      </tr>
    </table>

  </section>

</body>

</html>