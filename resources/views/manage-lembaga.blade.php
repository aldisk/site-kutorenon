<html>
    <head>
        <title>Dashboard | Manage Lembaga</title>
    </head>
    <body>
        <h1>Manage Lembaga</h1>
        <a href="/admin/lembaga/insert">Lembaga Baru +</a>
        <form action="{{ route('LembagaManage') }}">
            <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Searchs">
        </form>
        @foreach($items as $item)
            {{ $item->nama }}
            <a href="/admin/lembaga/edit/{!! $item->id !!}">Edit</a>
            <a href="/admin/lembaga/delete/{!! $item->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>