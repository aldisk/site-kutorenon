<html>
    <head>
        <title>Dashboard | Manage Anggaran</title>
    </head>
    <body>
        <h1>Manage Anggaran</h1>
        <a href="/admin/anggaran/insert">Anggaran Baru +</a>
        <form action="{{ route('AnggaranManage') }}">
            <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
            <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
            <input type="submit" value="Search">
        </form>
        @foreach($items as $item)
            {{ $item->nama }}
            <a href="/admin/anggaran/edit/{!! $item->id !!}">Edit</a>
            <a href="/admin/anggaran/delete/{!! $item->id !!}">Delete</a>  <br>
        @endforeach
    </body>
</html>