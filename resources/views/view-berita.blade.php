<html>
    <head>
        <title>{{ $item->judul }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1>{{ $item->judul }}</h1>
        <img src="{!! asset('storage/foto-berita/'.$item->id.'.jpg') !!}" alt="" width="500"> <br>
        {{ explode(' ', $item->created_at)[0] }} {{ $item->penulis }} <br>
        ----------------------------------------------------------------- <br>
        @foreach(explode(';', $item->isi) as $iter)
            {{ $iter }} <br>
        @endforeach
    </body>
</html>