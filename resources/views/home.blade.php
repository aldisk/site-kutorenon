<html>
    <head>
        <title>Home | Website Resmi Desa Kutorenon</title>
    </head>
    <body>
        <h1>Website Desa Kutorenon</h1>
    </body>
    <a href="/berita/search">Berita</a>
    <a href="/dokumen">Dokumen</a>
    <br> <br>
    Berita Terbaru <br>
    @foreach($items as $item)
        <a href="/berita/view/{!! $item->id !!}">{{ $item->judul }}</a> <br>
    @endforeach
</html>