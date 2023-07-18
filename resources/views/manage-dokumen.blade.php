<html>
    <head>
        <title>Dashboard | Manage Dokumen</title>
    </head>
    <body>
        <h1>Manage Dokumen</h1>
        <a href="/admin/dokumen/insert">Dokumen Baru +</a>
        <form action="{{ route('DokumenManage') }}">
            <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Searchs">
        </form>
        @foreach($items as $item)
            {{ $item->nama }}
            <a href="/admin/dokumen/edit/{!! $item->id !!}">Edit</a>
            <a href="/admin/dokumen/delete/{!! $item->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>