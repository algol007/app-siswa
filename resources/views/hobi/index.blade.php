@extends('template')

@section('main')

  <div id="hobi">
    <h2>Daftar Hobi</h2>

    <a href="/hobi/create" class="btn btn-primary my-3">Tambah Hobi</a>

    @if($jumlah_hobi !== 0)
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Hobi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($hobi_list as $hobi)
          <tr>
            <td>{{ $no++ ?? '' }}</td>
            <td>{{ $hobi->nama_hobi }}</td>
            <td>
              <!-- <a href="/hobi/{{ $hobi->id }}" class="btn btn-sm btn-info float-left m-1">Detail</a> -->
              <a href="/hobi/{{ $hobi->id }}/edit" class="btn btn-sm btn-warning float-left m-1">Edit</a>
              <form action="/hobi/{{ $hobi->id }}" method="POST">
                @method('delete')
                @csrf              
                <button type="submit" class="btn btn-sm btn-danger float-left m-1" onclick="return confirm('Yakin ingin menghapus hobi ?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <div class="row pt-3">    
      <div class="col-md-6">
        <strong>Jumlah Hobi : {{ $jumlah_hobi }}</strong>
      </div>
      <div class="col-md-6">
        {{ $hobi_list->links() }}
      </div>
    </div>

    @else
      <p>Tidak ada data hobi.</p>
    @endif

  </div>

@endsection

@section('footer')
  @include('footer')
@endsection