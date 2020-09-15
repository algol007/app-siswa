@extends('template')

@section('main')

  <div id="siswa">
    <h2 class="pb-3">Tambah Siswa</h2>

    <form method="POST" action="/siswa">
      @csrf
      <div class="form-group">
        <label for="nisn">NISN :</label>
        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" value="{{ old('nisn') }}">
        @if ($errors->has('nisn'))
        <p class="errors">
          {{ $errors->first('nisn') }}
        </p>
        @endif
      </div>
      <div class="form-group">
        <label for="nama_siswa">Nama Siswa :</label>
        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" value="{{ old('nama_siswa') }}">
        @if ($errors->has('nama_siswa'))
        <p class="errors">
          {{ $errors->first('nama_siswa') }}
        </p>
        @endif
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
        @if ($errors->has('tanggal_lahir'))
        <p class="errors">
          {{ $errors->first('tanggal_lahir') }}
        </p>
        @endif
      </div>

      @if($jumlah_kelas !== 0)
      <div class="form-group">
        <label for="id_kelas">Kelas :</label>
        <select class="form-control" id="id_kelas" name="id_kelas">
          <option selected>Pilih Kelas...</option>
          @foreach($list_kelas as $kelas)
          <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
          @endforeach
        </select>
        @if ($errors->has('id_kelas'))
        <p class="errors">
          {{ $errors->first('id_kelas') }}
        </p>
        @endif
      </div>
      @else
      <div class="form-group">
        <label for="id_kelas">Kelas :</label>
        <input type="input" class="form-control" id="id_kelas" name="id_kelas" value="-" readonly>
      </div>
      @endif

      <div class="form-group">
        <p>Jenis Kelamin :</p>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
          <label class="form-check-label" for="jenis_kelamin">
            Laki-Laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
          <label class="form-check-label" for="jenis_kelamin">
            Perempuan
          </label>
        </div>
        @if ($errors->has('jenis_kelamin'))
        <p class="errors">
          {{ $errors->first('jenis_kelamin') }}
        </p>
        @endif
      </div>

      <div class="form-group">
        <label for="nomor_telepon">Telepon :</label>
        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon') }}">
        @if ($errors->has('nomor_telepon'))
        <p class="errors">
          {{ $errors->first('nomor_telepon') }}
        </p>
        @endif
      </div>

      <div class="form-group">
        <label for="hobi">Hobi :</label>
        @foreach($list_hobi as $key => $value)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="{{ $value->id }}" id="hobi" name="hobi[]">
          <label class="form-check-label" for="nama_hobi">
            {{ $value->nama_hobi }}
          </label>
        </div>
        @endforeach
      </div>

      <button type="submit" class="btn btn-primary mt-4">Tambah</button>
    </form>
  </div>

@endsection

@section('footer')
  @include('footer')
@endsection