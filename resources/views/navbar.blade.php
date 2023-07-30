<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand px-2" href="/"> <img class="px-2 my-2" src="{!! asset('/storage/logo-desa.png') !!}" alt="" height="30"> <strong>Desa Kutorenon</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse px-3" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item px-1">
        <a class="nav-link" href="/">Beranda</a>
      </li>
      <li class="nav-item px-1 dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tentang Desa
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/profil">Profil Desa</a>
          <a class="dropdown-item" href="/lembaga">Lembaga</a>
          <a class="dropdown-item" href="/tugas">Tugas</a>
          <a class="dropdown-item" href="/pejabat">Pejabat Desa</a>
          <a class="dropdown-item" href="/anggaran">Anggaran</a>
        </div>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="/dokumen">Dokumen</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="/berita/search">Berita</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="/potensi">Potensi</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="/fasilitas">Fasilitas Umum</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="/layanan">Layanan Publik</a>
      </li>
    </ul>
  </div>

  </div>
</nav>