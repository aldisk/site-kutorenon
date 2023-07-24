<html>
    <head>
        <title>Berita | Situs Resmi Desa Kutorenon</title>
    </head>
    <body>
        <h1>Berita Desa</h1>
        <form action="{{ route('searchBerita') }}">
        <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Search">
        </form>
        @foreach($items as $item)
            <a href="/berita/view/{!! $item->id !!}">{{ $item->judul }}</a> <br>
        @endforeach
    </body>
</html>