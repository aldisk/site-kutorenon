<html>
    <head>
        <title>Home | Website Resmi Desa Kutorenon</title>
    </head>
    <body>
        <h1>Website Desa Kutorenon</h1>
    </body>
    @foreach($items as $item)
        <a href="/berita/{!! $item->id !!}">{{ $item->judul }}</a> <br>
    @endforeach
</html>