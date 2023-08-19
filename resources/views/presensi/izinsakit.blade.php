@extends('layouts.admin.tabler');
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Izin / Sakit
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Status Approve</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinsakit as $is)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{date('d-m-Y',strtotime($is->tgl_izin)) }}</td>
                                <td>{{ $is->nik }}</td>
                                <td>{{ $is->nama_lengkap }}</td>
                                <td>{{ $is->jabatan }}</td>
                                <td>{{ $is->status == "i" ? "izin" : "Sakit" }}</td>
                                <td>{{ $is->keterangan }}</td>
                                <td>
                                    @if ($is->status_approved == 1)
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($is->status_approved ==2)
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                    <span class="badge bg-warning">Pending</span>                                
                                    @endif
                                </td>
                                <td>
                                    @if ($is->status_approved == 0)
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                                                <path d="M11 13l9 -9"></path>
                                                <path d="M15 4h5v5"></path>
                                             </svg>
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-sm bg-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                <path d="M10 10l4 4m0 -4l-4 4"></path>
                                             </svg>
                                             Batalkan
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection