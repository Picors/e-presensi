@extends('layouts.admin.tabler');
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Karyawan
          </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btntambahkaryawan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                     </svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/karyawan" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Karyawan" value="{{ Request('nama_lengkap') }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dept" class="form-select">
                                                    <option value="">Departemen</option>
                                                    @foreach ($departemen as $dept)
                                                        <option {{ Request('kode_dept')==$dept->kode_dept ? 'selected' : '' }} value="{{ $dept->kode_dept }}">{{ $dept->nama_dept }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>
                                                     Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No. HP</th>
                                            <th>Foto</th>
                                            <th>Departemen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawan as $kry)
                                        @php
                                            $path = Storage::url('uploads/karyawan/'.$kry->foto)
                                        @endphp
                                            <tr>
                                                <td>{{ $loop->iteration + $karyawan->firstItem()-1 }}</td>
                                                <td>{{ $kry->nik }}</td>
                                                <td>{{ $kry->nama_lengkap }}</td>
                                                <td>{{ $kry->jabatan }}</td>
                                                <td>{{ $kry->no_hp }}</td>
                                                <td>
                                                    @if (empty($kry->foto))
                                                        <img src="{{ asset('assets/img/nopoto.jpg') }}" class="avatar" alt="">
                                                    @else
                                                        <img src="{{ url($path) }}" class="avatar" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $kry->nama_dept }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            {{ $karyawan->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/karyawan/store" method="POST" id="formKaryawan" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                            <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                            <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                            <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M5 11h1v2h-1z"></path>
                            <path d="M10 11l0 2"></path>
                            <path d="M14 11h1v2h-1z"></path>
                            <path d="M19 11l0 2"></path>
                         </svg>
                        </span>
                        <input type="text" value="" id="nik" class="form-control" name="nik" placeholder="NIK">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                        </span>
                        <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Username">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z"></path>
                            <path d="M7 20l10 0"></path>
                            <path d="M9 16l0 4"></path>
                            <path d="M15 16l0 4"></path>
                            <path d="M8 12l3 -3l2 2l3 -3"></path>
                         </svg>
                        </span>
                        <input type="text" value="" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                         </svg>
                        </span>
                        <input type="text" value="" id="no_hp" class="form-control" name="no_hp" placeholder="No. HP">
                      </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <select name="kode_dept" id="kode_dept" class="form-select">
                        <option value="">Departemen</option>
                        @foreach ($departemen as $dept)
                            <option {{ Request('kode_dept')==$dept->kode_dept ? 'selected' : '' }} value="{{ $dept->kode_dept }}">{{ $dept->nama_dept }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 14l11 -11"></path>
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                             </svg>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
          </form>
        </div> 
      </div>
    </div>
  </div>
@endsection   

@push('myscript')
    <script>
        $(function(){
            $("#btntambahkaryawan").click(function(){
                $("#modal-inputkaryawan").modal("show");
            });

            $("#formKaryawan").submit(function(){
                var nik = $("#nik").val();
                var nama_lengkap = $("#nama_lengkap").val();
                var jabatan = $("#jabatan").val();
                var no_hp = $("#no_hp").val();
                var kode_dept = $("formKaryawan").find("#kode_dept").val();

                if(nik==""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Nik Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)-> {
                        $("#nik").focus();
                    });
                    return false;
                } else if (nama_lengkap) {
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Nama Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)-> {
                        $("#nama_lengkap").focus();
                    });
                    return false;
                } else if (jabatan = ""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Jabatan Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)-> {
                        $("#jabatan").focus();
                    });
                    return false;
                }else if (kode_dept = ""){
                    Swal.fire({
                    title: 'Warning !',
                    text: 'Kode Departemen Harus Diisi !!!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result)-> {
                        $("#kode_dept").focus();
                    });
                    return false;
                }
            });
        });
    </script>
@endpush