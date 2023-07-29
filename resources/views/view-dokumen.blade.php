<html>
    <head>
        @include('plugin/bootstrap-open')
        @include('/plugin/hoverable')
        <title>{{ $tabs }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <div class="container">
        <h1 class="py-4 text-center">{{ $tabs }}</h1>
        <div class="row row-cols-1 row-cols-md-3 py-5 px-1 g-4">
            @foreach($items as $item)
            <div class="col">
                <div class="card h-100 text-center">
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
        </div>

        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>