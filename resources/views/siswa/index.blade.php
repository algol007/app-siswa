@extends('template')

@section('main')

  <div id="siswa">
    <h2>Daftar Siswa</h2>

    <a href="/siswa/create" class="btn btn-primary my-3">Tambah Siswa</a>

    @if(!empty($siswa_list))
      <table class="table">
        <thead>
          <tr>
            <th>NISN</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
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
            <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>
            <td>
              <a href="/siswa/{{ $siswa->id }}" class="btn btn-sm btn-info float-left m-1">Detail</a>
              <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-sm btn-warning float-left m-1">Edit</a>
              <form action="/siswa/{{ $siswa->id }}" method="POST">
                @method('delete')
                @csrf              
                <button type="submit" class="btn btn-sm btn-danger float-left m-1" onclick="return confirm('Yakin ingin menghapus siswa ?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data siswa.</p>
    @endif

    <div class="row pt-3">    
      <div class="col-md-6">
        <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
      </div>
      <div class="col-md-6">
        {{ $siswa_list->links() }}
      </div>
    </div>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection