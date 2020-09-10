@extends('template')

@section('main')

  <div id="siswa">
    <h2 class="pb-3">Edit Siswa</h2>

    <form method="POST" action="/siswa/{{ $siswa->id }}">
      @method('patch')
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $siswa->id }}">
      <div class="form-group">
        <label for="nisn">NISN :</label>
        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}">
        @if ($errors->has('nisn'))
        <p class="errors">
          {{ $errors->first('nisn') }}
        </p>
        @endif
      </div>
      <div class="form-group">
        <label for="nama_siswa">Nama Siswa :</label>
        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
        @if ($errors->has('nama_siswa'))
        <p class="errors">
          {{ $errors->first('nama_siswa') }}
        </p>
        @endif
      </div>
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
        @if ($errors->has('tanggal_lahir'))
        <p class="errors">
          {{ $errors->first('tanggal_lahir') }}
        </p>
        @endif
      </div>
      <div class="form-group">      
        <p>Jenis Kelamin :</p>
        @if ($siswa->jenis_kelamin == 'L')
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" checked>
          <label class="form-check-label" for="jenis_kelamin">
            Laki-Laki
          </label>
        </div>
        @else
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
          <label class="form-check-label" for="jenis_kelamin">
            Laki-Laki
          </label>
        </div>
        @endif

        @if ($siswa->jenis_kelamin == 'P')
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" checked>
          <label class="form-check-label" for="jenis_kelamin">
            Perempuan
          </label>
        </div>
        @else
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
          <label class="form-check-label" for="jenis_kelamin">
            Perempuan
          </label>
        </div>
        @endif
        @if ($errors->has('tanggal_lahir'))
        <p class="errors">
          {{ $errors->first('tanggal_lahir') }}
        </p>
        @endif
      </div>

      <div class="form-group">
        <label for="nomor_telepon">Telepon :</label>
        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $siswa->telepon->nomor_telepon }}">
        @if ($errors->has('nomor_telepon'))
        <p class="errors">
          {{ $errors->first('nomor_telepon') }}
        </p>
        @endif
      </div>

      <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection