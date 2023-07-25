<html>
    <head>
        <title>{{ $item->nama }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1>{{ $item->nama }}</h1>
        <img src="{!! asset('storage/lembaga/'.$item->id.'.jpg') !!}" alt="" width="500"> <br>
        ----------------------------------------------------------------- <br>
        @foreach(explode(';', $item->isi) as $iter)
            {{ $iter }} <br>
        @endforeach
    </body>
</html>