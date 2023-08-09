<html>
    <head>
        <title>Dashboard | Manage Potensi</title>
        @include('plugin/bootstrap-open')
    </head>
    <body>
        <div class = "container">
        <br>
        <h1>Manage Potensi</h1> <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
            <form action="{{ route('PotensiManage') }}">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <input type="text" name="searchToken" placeholder="Search" value="{!! $searchToken !!}">
                <input type="number" name="page" placeholder="Page" value="{!! $page !!}" max="{!! $maxPage !!}" min="1">
                <input type="submit" value="Search">
                </div>
            </form>
                <a href="/admin/potensi/insert" ><button class="btn btn-primary" type="button">Potensi Baru +</button></a>
            </div>
        <br>
        
        <table class="table">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Potensi</th>
                <th scope="col">Handle</th>
            </tr>
            @foreach($potensis as $potensi)
            <tr>
                    <td>{{ $potensi->id }}</td>
                    <td>{{ $potensi->nama }}</td>
                    <td><a href="/admin/potensi/edit/{!! $potensi->id !!}" class="btn btn-success" >Edit</a> <a href="/admin/potensi/delete/{!! $potensi->id !!}" class="btn btn-danger" >Delete</a></td>
            </tr>
            @endforeach
        </table>
        
        </div>
    @include('plugin/bootstrap-close')   
    </body>
</html>