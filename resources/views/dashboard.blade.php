<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Dashboard Desa Kutorenon</h1>
        @if(isset($mode))
            @if($mode == 'insert')
                @include('insert-berita')
            @endif
        @endif
    </body>
</html>