@extends('template')

@section('main')

  <div id="kelas">
    <h2 class="pb-3">Tambah Kelas</h2>

    <form method="POST" action="/kelas">
      @csrf
      
      <div class="form-group">
        <label for="nama_kelas">Nama Kelas :</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama kelas" value="{{ old('nama_kelas') }}">
        @if ($errors->has('nama_kelas'))
        <p class="errors">
          {{ $errors->first('nama_kelas') }}
        </p>
        @endif
      </div>

      <button type="submit" class="btn btn-primary mt-4">Tambah</button>
    </form>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection