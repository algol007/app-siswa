@extends('template')

@section('main')

  <div id="kelas">
    <h2 class="pb-3">Edit Kelas</h2>

    <form method="POST" action="/kelas/{{ $kelas->id }}">
      @method('patch')
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $kelas->id }}">
      <div class="form-group">
        <label for="nama_kelas">Nama Kelas :</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
        @if ($errors->has('nama_kelas'))
        <p class="errors">
          {{ $errors->first('nama_kelas') }}
        </p>
        @endif
      </div>
      <button type="submit" class="btn btn-primary mt-4">Edit</button>
    </form>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection