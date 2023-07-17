<html>
    <head>
        <title>Dashboard | Manage Potensi</title>
    </head>
    <body>
        <h1>Manage Potensi</h1>
        <a href="/admin/potensi/insert">Potensi Baru +</a>
        <form action="{{ route('PotensiManage') }}">
            <input type="text" name="searchToken" placeholder="Search">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Searchs">
        </form>
        @foreach($potensis as $potensi)
            {{ $potensi->nama }} <a href="/admin/potensi/edit/{!! $potensi->id !!}">Edit</a> <a href="/admin/potensi/delete/{!! $potensi->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>