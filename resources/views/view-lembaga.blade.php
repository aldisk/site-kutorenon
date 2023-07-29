<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>{{ $item->nama }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <div class="container">
            <h1 class="px-3 py-4 mt-4 fs-2 text-center border-bottom">{{ $item->nama }}</h1>
            <div class="px-3 pt-4">
            <img src="{!! asset('storage/lembaga/'.$item->id.'.jpg') !!}" style="height: 40vh" class="d-block mx-auto img-thumbnail" alt="{!! $item->nama !!}">
            </div>
            <div class="text-break mt-4">
            @foreach(explode(';', $item->isi) as $iter)
                <h6 class="px-4 py-1 fs-6 text-center">{{ $iter }}</h6>
            @endforeach
            </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>