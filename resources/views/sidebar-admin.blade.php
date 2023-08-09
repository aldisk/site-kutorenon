<html>
    <head>
        @include('plugin/bootstrap-open')
        <link rel="stylesheet" href="{{ asset('cssfile/admin.css') }}">
    </head>
    <body>
    <script src="{{ asset('jsfile/admin.js') }}"></script>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/admin">Dashboard</a>
    <a href="/admin/berita">Berita</a>
    <a href="/admin/potensi">Potensi</a>
    <a href="/admin/dokumen">Dokumen</a>
    <a href="/admin/anggaran">Anggaran</a>
    <a href="/admin/lembaga">Lembaga</a>
    <a href="/admin/fasilitas">Fasilitas</a>
    <a href="/admin/layanan">Layanan</a>
    </div>

    <div id="main">
    <span style="font-size:30px;cursor:pointer;" onclick="openNav()" class="navbar navbar-dark bg-dark"><p class="me-auto mt-2 mx-3 text-light">&#9776; Desa Kutorenon</p></span>
        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        </div>
    </div>
    </body>
</html>