<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>{{ $item->judul }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <div class="container">
            <h1 class="px-3 py-4 mt-4 fs-2">{{ $item->judul }}</h1>
            <h6 class="px-3 mb-4 pb-2 border-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="mx-1 mb-1 bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> {{ \Carbon\Carbon::parse($item->created_at)->format('d F o') }}
            </h6>
            <div class="px-3">
            <img src="{!! asset('storage/foto-berita/'.$item->id.'.jpg') !!}" class="d-block mx-auto img-thumbnail" alt="{!! $item->judul !!}">
            </div>
            <div class="text-break mt-4">
            @foreach(explode(';', $item->isi) as $iter)
                <h6 class="px-4 py-1 fs-6">{{ $iter }}</h6>
            @endforeach
            </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>