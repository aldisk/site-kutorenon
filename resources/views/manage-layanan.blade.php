<html>
    <head>
        <title>Dashboard | Manage Layanan</title>
    </head>
    <body>
        <h1>Manage Layanan</h1>
        <a href="/admin/layanan/insert">Layanan Baru +</a>
        <form action="{{ route('LayananManage') }}">
            <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Searchs">
        </form>
        @foreach($items as $item)
            {{ $item->nama }}
            <a href="/admin/layanan/edit/{!! $item->id !!}">Edit</a>
            <a href="/admin/layanan/delete/{!! $item->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>