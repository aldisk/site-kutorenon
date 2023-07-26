<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>Lembaga Desa | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1>Lembaga Desa</h1>
        @foreach($items as $item)
            <a href="/lembaga/view/{!! $item->id !!}">{{ $item->nama }}</a> <br>
        @endforeach
        @include('plugin/bootstrap-close')
    </body>
</html>