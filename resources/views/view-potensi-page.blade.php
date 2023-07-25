<html>
    <head>
        <title>Potensi Desa | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1>Potensi Desa</h1>
        @foreach($items as $item)
            <a href="/potensi/view/{!! $item->slug !!}">{{ $item->nama }}</a> <br>
        @endforeach
    </body>
</html>