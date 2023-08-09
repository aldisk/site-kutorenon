<html>
    <head>
        <title>Dashboard Admin</title>
        @include('plugin/bootstrap-open')
        @include('sidebar-admin')
    </head>
    <body>
        <br>

        @if(!isset($mode))
        <div class="row row-cols-1 row-cols-md-3 g-4 px-5">
        <!-- Card Berita-->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $berita }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Berita </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-newspaper b-3" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Potensi-->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $potensi }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Potensi </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
</svg>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Dokumen-->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $dokumen }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Dokumen </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Anggaran -->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $anggaran }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Anggaran </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
</svg>
                </div>
            </div>
            </div>
        </div>

        <!-- Card Lembaga -->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $lembaga }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Lembaga </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
</svg>
                </div>
            </div>
            </div>
        </div>
        <!-- Card Fasilitas-->
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h2 class="card-title">{{ $fasilitas }}</h2>
                <div class="d-flex justify-content-between">
                <h5 class="card-text mt-3">Total Fasilitas </h5>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
  <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
  <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
</svg>
                </div>
            </div>
            </div>
        </div>

        </div>
        @endif

        @if(isset($mode) && isset ($tab))
            @if($tab == 'berita')
                @if($mode == 'insert')
                    @include('insert-berita')
                @elseif($mode == 'manage')
                    @include('manage-berita')
                @elseif($mode == 'edit')
                    @include('edit-berita')
                @endif
            @elseif($tab == 'potensi')
                @if($mode == 'insert')
                    @include('insert-potensi')
                @elseif($mode == 'manage')
                    @include('manage-potensi')
                @elseif($mode == 'edit')
                    @include('edit-potensi')
                @endif
            @elseif($tab == 'dokumen')
                @if($mode == 'insert')
                    @include('insert-dokumen')
                @elseif($mode == 'manage')
                    @include('manage-dokumen')
                @elseif($mode == 'edit')
                    @include('edit-dokumen')
                @endif
            @elseif($tab =='anggaran')
                @if($mode == 'insert')
                    @include('insert-anggaran')
                @elseif($mode == 'manage')
                    @include('manage-anggaran')
                @elseif($mode == 'edit')
                    @include('edit-anggaran')
                @endif
            @elseif($tab =='lembaga')
                @if($mode == 'insert')
                    @include('insert-lembaga')
                @elseif($mode == 'manage')
                    @include('manage-lembaga')
                @elseif($mode == 'edit')
                    @include('edit-lembaga')
                @endif
            @elseif($tab =='fasilitas')
                @if($mode == 'insert')
                    @include('insert-fasilitas')
                @elseif($mode == 'manage')
                    @include('manage-fasilitas')
                @elseif($mode == 'edit')
                    @include('edit-fasilitas')
                @endif
            @elseif($tab =='layanan')
                @if($mode == 'insert')
                    @include('insert-layanan')
                @elseif($mode == 'manage')
                    @include('manage-layanan')
                @elseif($mode == 'edit')
                    @include('edit-layanan')
                @endif
            @endif
        @endif


    </body>
</html>