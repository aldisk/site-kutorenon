<html>
    <head>
        <title>Dashboard | Manage Dokumen</title>
        @include('plugin/bootstrap-open')
    </head>
    <body>
        <div class = "container">
        <br>
        <h1>Manage Dokumen</h1> <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
            <form action="{{ route('DokumenManage') }}">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
                <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
                <input type="submit" value="Search">
                </div>
            </form>
                <a href="/admin/dokumen/insert" ><button class="btn btn-primary" type="button">Dokumen Baru +</button></a>
            </div>
        <br>
        
        <table class="table">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Dokumen</th>
                <th scope="col">Handle</th>
            </tr>
            @foreach($items as $item)
            <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td><a href="/admin/dokumen/edit/{!! $item->id !!}" class="btn btn-success" >Edit</a> <a href="/admin/dokumen/delete/{!! $item->id !!}" class="btn btn-danger" >Delete</a></td>
            </tr>
            @endforeach
        </table>
        
        </div>
    @include('plugin/bootstrap-close')   
    </body>
</html>