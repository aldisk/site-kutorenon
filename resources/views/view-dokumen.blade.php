<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>{{ $tabs }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1 class="py-4 text-center">Dokumen</h1>

        <div class="row row-cols-1 row-cols-md-3 p-5 g-4">
            @foreach($items as $item)
            <div class="col px-5">
                <div class="card h-100 border border-1 border-dark text-center">
                <div class="card-body">
                    <a href="{!! asset('/storage/'.strtolower($tabs).'/'.$item->id.'.pdf') !!}" class="text-wrap text-dark text-decoration-none">
                        <h5 class="card-title hoverable">{{ Str::limit($item->nama, 50) }}</h5>
                        <button class="btn btn-dark">Lihat</button>
                    </a>
                </div>
                </div>
            </div>
            @endforeach
        </div>

        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>