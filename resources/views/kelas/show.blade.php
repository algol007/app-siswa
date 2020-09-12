@extends('template')

@section('main')

  <div id="kelas">
    <h2 class="pb-3">Detail Kelas</h2>
    <table class="table table-striped">
      <tr>
        <th>Nama Kelas</th>
        <td>{{ $kelas->nama_kelas }}</td>
      </tr>
    </table>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection