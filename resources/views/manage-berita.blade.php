<html>
    <head>
        <title>Dashboard | Manage Berita</title>
        @include('plugin/bootstrap-open')
    </head>
    <body>
        <div class = "container">
        <br>
        <h1>Manage Berita</h1> <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
            <form action="{{ route('BeritaManage') }}">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
                <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
                <input type="submit" value="Search">
                </div>
            </form>
                <a href="/admin/berita/insert" ><button class="btn btn-primary" type="button">Tambah Berita +</button></a>
            </div>
        <br>
        
        <table class="table">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Berita</th>
                <th scope="col">Handle</th>
            </tr>
            @foreach($beritas as $berita)
            <tr>
                    <td>{{ $berita->id }}</td>
                    <td>{{ $berita->judul }}</td>
                    <td><a href="/admin/berita/edit/{!! $berita->id !!}" class="btn btn-success" >Edit</a> <a href="/admin/berita/delete/{!! $berita->id !!}" class="btn btn-danger" >Delete</a> </td>
            </tr>
            @endforeach
        </table>
        
        </div>
    @include('plugin/bootstrap-close')   
    </body>
</html>