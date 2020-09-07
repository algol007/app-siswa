<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">  
    <a class="navbar-brand" href="/">Siswa App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @if (!empty($halaman) && $halaman == 'siswa')
        <li class="nav-item active">
          <a class="nav-link" href="/siswa">Siswa <span class="sr-only">(current)</span></a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/siswa">Siswa</a>
        </li>
        @endif

        @if (!empty($halaman) && $halaman == 'about')
        <li class="nav-item active">
          <a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        @endif
      </ul>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
