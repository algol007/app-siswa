@extends('template')

@section('main')

  <div id="kelas">
    <h2>Daftar Kelas</h2>

    <a href="/kelas/create" class="btn btn-primary my-3">Tambah Kelas</a>

    @if($jumlah_kelas !== 0)
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Kelas</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kelas_list as $kelas)
          <tr>
            <td>{{ $no++ ?? '' }}</td>
            <td>{{ $kelas->nama_kelas }}</td>
            <td>
              <a href="/kelas/{{ $kelas->id }}" class="btn btn-sm btn-info float-left m-1">Detail</a>
              <a href="/kelas/{{ $kelas->id }}/edit" class="btn btn-sm btn-warning float-left m-1">Edit</a>
              <form action="/kelas/{{ $kelas->id }}" method="POST">
                @method('delete')
                @csrf              
                <button type="submit" class="btn btn-sm btn-danger float-left m-1" onclick="return confirm('Yakin ingin menghapus kelas ?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <div class="row pt-3">    
      <div class="col-md-6">
        <strong>Jumlah Kelas : {{ $jumlah_kelas }}</strong>
      </div>
      <div class="col-md-6">
        {{ $kelas_list->links() }}
      </div>
    </div>

    @else
      <p>Tidak ada data kelas.</p>
    @endif

  </div>

@endsection

@section('footer')
  @include('footer')
@endsection