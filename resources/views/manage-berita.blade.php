<html>
    <head>
        <title>Dashboard | Manage Berita</title>
    </head>
    <body>
        <h1>Manage Berita</h1>
        <a href="/admin/berita/insert">Berita Baru +</a>
        <form action="{{ route('BeritaManage') }}">
            <input type="text" name="searchToken" placeholder="Search">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Searchs">
        </form>
        @foreach($beritas as $berita)
            {{ $berita->judul }} <a href="/admin/berita/edit/{!! $berita->id !!}">Edit</a> <a href="/admin/berita/delete/{!! $berita->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>