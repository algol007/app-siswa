@extends('template')

@section('main')

  <div id="siswa">
    <h2 class="pb-3">Daftar Siswa</h2>

    @if(!empty($siswa_list))
      <table class="table">
        <thead>
          <tr>
            <th>NISM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($siswa_list as $siswa)
          <tr>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td><span class="badge badge-info"><a href="/siswa/{{ $siswa->id }}">Detail</a></span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data siswa.</p>
    @endif

    <div class="pull-left">
      <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
    </div>
  </div>

@endsection