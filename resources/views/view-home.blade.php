<html>
    <head>
        <title>Home | Website Resmi Desa Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        Berita Terbaru <br>
        @foreach($items as $item)
            <a href="/berita/view/{!! $item->id !!}">{{ $item->judul }}</a> <br>
        @endforeach
    </body>
</html>