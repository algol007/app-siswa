@extends('template')

@section('main')

  <div id="hobi">
    <h2 class="pb-3">Edit Hobi</h2>

    <form method="POST" action="/hobi/{{ $hobi->id }}">
      @method('patch')
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $hobi->id }}">
      <div class="form-group">
        <label for="nama_hobi">Nama Hobi :</label>
        <input type="text" class="form-control" id="nama_hobi" name="nama_hobi" value="{{ $hobi->nama_hobi }}">
        @if ($errors->has('nama_hobi'))
        <p class="errors">
          {{ $errors->first('nama_hobi') }}
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