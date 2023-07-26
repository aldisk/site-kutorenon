<html>
    <head>
        <title>Dashboard | Manage Fasilitas</title>
    </head>
    <body>
        <h1>Manage Fasilitas</h1>
        <a href="/admin/fasilitas/insert">Fasilitas Baru +</a>
        <form action="{{ route('FasilitasManage') }}">
            <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Search">
        </form>
        @foreach($items as $item)
            {{ $item->nama }}
            <a href="/admin/fasilitas/edit/{!! $item->id !!}">Edit</a>
            <a href="/admin/fasilitas/delete/{!! $item->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>