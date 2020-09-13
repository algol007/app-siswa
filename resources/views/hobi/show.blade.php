@extends('template')

@section('main')

  <div id="hobi">
    <h2 class="pb-3">Detail Hobi</h2>
    <table class="table table-striped">
      <tr>
        <th>Nama hobi</th>
        <td>{{ $hobi->nama_hobi }}</td>
      </tr>
    </table>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection