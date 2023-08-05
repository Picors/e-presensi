@foreach ($presensi as $prs)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $prs->nik }}</td>
        <td>{{ $prs->nama_lengkap }}</td>
    </tr>
@endforeach